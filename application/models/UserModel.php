<?php

/**
 * Description of UserModel
 *
 * @author Narendra Jadhav
 */
require_once 'DatatableModel.php';

class UserModel extends DatatableModel {

    function __construct() {
        // Set table name
        $this->table = 'user_header_all';
        // Set orderable column fields
        $this->column_order = array('user_name', 'email', 'mobile_no', 'is_active');
        // Set searchable column fields
        $this->column_search = array('user_name', 'email');
        // Set default order
        $this->order = array('user_name' => 'asc');
        $this->where = "";
    }

    public function user_details($username, $password) {


        try {
            return $this->db->select('firm_id,(select firm_name from partner_header_all p where p.firm_id=user_header_all.firm_id) as firm_name')->where(array("email" => $username, "password" => $password, "activity_status" => 1))->get("user_header_all")->result();
        } catch (Exception $exc) {
            log_message('error', $exc->getMessage());
            return null;
        }
    }

    public function login($username, $password, $firm_id) {

        try {
            if ($firm_id != null) {
                $where = array("email" => $username, "activity_status" => 1, "firm_id" => $firm_id);
            } else {
                $where = array("email" => $username, "activity_status" => 1);
            }
            $user_details = $this->db->select(array("id","user_id", "linked_with_boss_id", "user_type", "user_name", "mobile_no", "email", "e_folder_id", "password", "firm_id"))->where($where)->get($this->table)->row();
            if (is_null($user_details)) {
                $data["status"] = 201;
                $data["body"] = "Invalid username";
                return $data;
            } else {
                if ($user_details->password != $password) {
                    $data["status"] = 202;
                    $data["body"] = "Incorrect Password";
                    return $data;
                } else {
                    $permission_value = $this->db->select("*")->where("user_id", $user_details->user_id)->get('employee_permissions_master_data')->row();
                    $chat_group_value = $this->db->select(array("id","group_name","profile_image"))->where(array("create_by"=> $user_details->email,'type'=>1,'status'=>1))->get('chat_group_all')->row();
                    if(!is_null($chat_group_value)){
                        $data["group_id"]=$chat_group_value->id;
                        $data["group_name"]=$chat_group_value->group_name;
                        $data["group_image"]=$chat_group_value->profile_image;
                    }else{
                        $data["group_id"]=null;
                        $data["group_name"]=null;
                        $data["group_image"]=null;
                    }
                    if (!is_null($permission_value)) {
                        
                        $data["status"] = 200;
                        $data["planner_and_shedular"] = $permission_value->planner_and_shedular;
                        $data["task_permission"] = $permission_value->task_permission;
                        $data["designation_permission"] = $permission_value->designation_permission;
                        $data["invoice_mgt_permission"] = $permission_value->invoice_mgt_permission;
                        $data["service_offering_permission"] = $permission_value->service_offering_permission;
                        $data["body"] = $user_details;
                    } else {
                        $data["status"] = 200;
                        $data["planner_and_shedular"] = 0;
                        $data["task_permission"] = 0;
                        $data["designation_permission"] = 0;
                        $data["service_offering_permission"] = 0;
						$data["invoice_mgt_permission"] = 0;
                        $data["body"] = $user_details;
                        return $data;
                    }
                    return $data;
                }
            }
        } catch (Exception $exc) {
            log_message('error', $exc->getMessage());
            $data["status"] = 204;
            $data["body"] = $exc->getMessage();
            return $data;
        }
    }


    public function createToken($username, $user_id, $user_type) {
        try {
            $token = crypt(substr(md5(rand()), 0, 7), $username);
            $expired_at = date("Y-m-d H:i:s", strtotime('+8 hours'));
            $this->db->trans_start();
            $this->db->set(array("activity_status" => 1))->where("user_id", $user_id)->update($this->table);
            $this->db->insert('auth_information_all', array('user_id' => $user_id, 'token' => $token, 'expired_at' => $expired_at, 'user_type' => $user_type));
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                return false;
            } else {
                $this->db->trans_commit();
                return $token;
            }
        } catch (Exception $exc) {
            log_message('error', $exc->getMessage());
            return false;
        }
    }

    public function logout($user_id) {
        try {
            $this->db->trans_start();
            $this->db->where("user_id", $user_id)->delete("auth_information_all");
            $this->db->set(array("logstatus" => 0))->where("user_id", $user_id)->update($this->table);
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                log_message('info', "Logout Transaction Rollback");
                $result = FALSE;
            } else {
                $this->db->trans_commit();
                log_message('info', "Logout Transaction Commited");
                $result = TRUE;
            }
            $this->db->trans_complete();
        } catch (Exception $exc) {
            log_message('error', $exc->getMessage());
            $data["status"] = 204;
            $data["body"] = $exc->getMessage();
            $this->db->trans_complete();
            return $data;
        }
    }

    public function authentication($user_id, $token) {
        try {
            $auth_token = $this->db->select(array("expired_at"))->where(array("token" => $token, "user_id" => $user_id))->get("auth_information_all")->row();
            if (is_null($auth_token)) {
                $data["status"] = 201;
                $data["body"] = "Invalid token";
                return $data;
            } else {
                if ($auth_token->expired_at < date('Y-m-d H:i:s')) {
                    $data["status"] = 202;
                    $data["body"] = "token expired";
                    return $data;
                } else {
                    $data["status"] = 200;
                    $data["body"] = "valid token";
                    return $data;
                }
            }
        } catch (Exception $exc) {
            log_message('error', $exc->getMessage());
            $data["status"] = 204;
            $data["body"] = $exc->getMessage();
            return $data;
        }
    }

    public function add_user($permission_data) {
        try {
            $this->db->trans_start();
            $this->db->insert('employee_permissions_master_data', $permission_data);
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                log_message('info', "insert user Transaction Rollback");
                $result = FALSE;
            } else {
                $this->db->trans_commit();
                log_message('info', "insert user Transaction Commited");
                $result = TRUE;
            }
            $this->db->trans_complete();
        } catch (Exception $exc) {
            log_message('error', $exc->getMessage());
            $result = FALSE;
        }
        return $result;
    }

    //vishu
    public function add_emp($userDetails, $permission_data) {
        try {
            $this->db->trans_start();
            $this->db->insert($this->table, $userDetails);
            if ($permission_data != null) {
                $this->db->insert('employee_permissions_master_data', $permission_data);
            }

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                log_message('info', "insert user Transaction Rollback");
                $result = FALSE;
            } else {
                $this->db->trans_commit();
                log_message('info', "insert user Transaction Commited");
                $result = TRUE;
            }
            $this->db->trans_complete();
        } catch (Exception $exc) {
            log_message('error', $exc->getMessage());
            $result = FALSE;
        }
        return $result;
    }

    function is_email_available($email) {
        try {
            return $this->db->where('email', $email)->get("user_header_all")->row();
        } catch (Exception $exc) {
            log_message('error', $exc->getMessage());
            return null;
        }
    }

    function is_email_office_available($email) {
        try {
            return $this->db->where('firm_email_id', $email)->get("partner_header_all")->row();
        } catch (Exception $exc) {
            log_message('error', $exc->getMessage());
            return null;
        }
    }

    public function update_user($userDetails, $permission_data,$user_id ,$email='') {

        try {
            $this->db->trans_start();
            if($email==''){
            	$object=$this->db->select("email")->where('user_id',$user_id)->get($this->table)->row();
            	if($object!=null){
					$this->db->set($userDetails)->where("email", $object->email)->update($this->table);
				}

			}else{
				$this->db->set($userDetails)->where("email", $email)->update($this->table);
			}

            if ($permission_data != '') {
                $this->db->set($permission_data)->where("user_id", $user_id)->update('employee_permissions_master_data');
            }

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                log_message('info', "update user Transaction Rollback");
                $result = FALSE;
            } else {
                $this->db->trans_commit();
                log_message('info', "update user Transaction Commited");
                $result = TRUE;
            }
            $this->db->trans_complete();
        } catch (Exception $exc) {
            log_message('error', $exc->getMessage());
            $result = FALSE;
        }

        return $result;
    }

    public function update_customer($data_controller_update, $customer_id) {

        try {
            $this->db->trans_start();
            $this->db->set($data_controller_update)->where("customer_id", $customer_id)->update('customer_header_all');
            if ($this->db->affected_rows() > 0) {
                return TRUE;
            } else {
                return FALSE;
            }
        } catch (Exception $exc) {

        }
    }

    public function delete_user($user_id) {
        try {
            $this->db->trans_start();
            $this->db->set("is_active", 0)->where("user_id", $user_id)->update($this->table);
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                log_message('info', "delete user Transaction Rollback");
                $result = FALSE;
            } else {
                $this->db->trans_commit();
                log_message('info', "delete user Transaction Commited");
                $result = TRUE;
            }
            $this->db->trans_complete();
        } catch (Exception $exc) {
            log_message('error', $exc->getMessage());
            $result = FALSE;
        }
        return $result;
    }

    public function getUserById($user_id) {

        try {
            return $this->db->where("user_id", $user_id)->get($this->table)->row();
        } catch (Exception $exc) {
            log_message('error', $exc->getMessage());
            return null;
        }
    }

    public function getUserByEmail($email_id) {

        try {
            return $this->db->where("email", $email_id)->get($this->table)->row();
        } catch (Exception $exc) {
            log_message('error', $exc->getMessage());
            return null;
        }
    }

    public function generateUserID() {
        $id = 'Use_' . rand(100, 9999);
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('user_id', $id);
        $this->db->get();
        if ($this->db->affected_rows() > 0) {
            return $this->genrate_file_transaction_id();
        } else {
            return $id;
        }
    }

    public function getUSerDetails($user_id) {
        try {
            $result1 = $this->db->query("select firm_id from user_header_all where user_id='$user_id'")->result();
            $firm_id = $result1[0]->firm_id;
            $data["parnterDetails"] = $this->db->where(array("firm_id" => $firm_id))->get($this->table)->row();
            $data["userDetails"] = $this->db->where(array("firm_id" => $firm_id, "user_type" => 4, 'user_id' => $user_id))->get('user_header_all')->row();
            //echo $this->db->last_query();
            // $data["designationDetails"] = $this->db->where(array("firm_id" => $firm_id))->get($this->designationtable)->row();
            //$data["leaveDetails"] = $this->db->where(array("firm_id" => $firm_id))->get($this->leavetable)->row();
            $result = $data;
        } catch (Exception $exc) {
            log_message('error', $exc->getMessage());
            $result = false;
        }
        return $result;
    }

    public function getUserByDepart($firm_id,$id,$name,$parent){
        $resultObject =new stdClass();
        $departObject=$this->db->where(array('firm_id'=>$firm_id,'node_id'=>$id,'parent_id'=>$parent,'name'=>$name))
            ->get("department_data")->row();
        if($departObject!=null){
            $this->db->select( array('*', "(select designation_name from designation_header_all where designation_id=user_header_all.designation_id group by designation_name)as designation_name"));
            if((int)$parent==0){
                $this->db->where(array('firm_id'=>$firm_id,"user_type" => 4));

            }else{
                $this->db->where(array('firm_id'=>$firm_id,"user_type" => 4,"dept_id"=>$departObject->dep_id));
            }
            $result= $this->db->get("user_header_all")->result();
            $resultObject->last_query =$this->db->last_query();
            $resultObject->data =$result;
        }else{
            $resultObject->last_query =$this->db->last_query();
            $resultObject->data = array();
        }
        return $resultObject;
    }

}
