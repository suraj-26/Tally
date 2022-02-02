<?php
class Invoicecontroller extends CI_Controller
{
	/*  private $conn_id;
		private $ftp_user_name;
		private $ftp_user_pass;
		private $ftp_server;
		private $ftp_root_folder; */
	function __construct()
	{
		parent::__construct();
//		$this->load->model('Global_model');
		/* if ($this->session->ftp_session != null) {
		 $this->ftp_server = $this->session->ftp_session->ftp_host;
		 $this->ftp_user_name = $this->session->ftp_session->user_name;
		 $this->ftp_user_pass = $this->session->ftp_session->password;
		 $this->ftp_root_folder=$this->session->ftp_session->root_folder;
		 $this->conn_id = ftp_connect($this->ftp_server) or die("Connection Error");
		 ftp_login($this->conn_id, $this->ftp_user_name, $this->ftp_user_pass) or die("Login Error");
		 ftp_pasv($this->conn_id, true);
	 }else{
		 echo json_encode(array('status'=>204,'body'=>"Folder Not Configured"));
		 exit();
	 } */

	}
	function index(){
		$this->load->view('Invoice_management/Invoice_management.php');
	}
	function customer_account(){
		$this->load->view('Invoice_management/customer_account.php');
	}
	function customer_login(){
		$this->load->view('Invoice_management/Customer_login.php');
	}
	function OTP_page($otp=""){
		$this->load->view('Invoice_management/otp_page.php');
	}
	function tally_report(){
		$this->load->view('Invoice_management/customer_tally_report.php');
	}
	function Logincustomer(){
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$otp=rand(1000,9999);
		$query=$this->db->query("select * from Customer_Login_table where customer_email='$username' AND password='$password'");
		if($this->db->affected_rows() > 0){
			$result=$query->row();
			$customer_id=$result->customer_id;
			$customer_email=$result->customer_email;
			$otp_data=array(
				"user_name"=>$customer_email,
				"user_otp"=>$otp,
				"created_on"=>date('Y-m-d h:i:s'),
			);
			$qrr=$this->db->query("select * from user_otp_master where user_name ='$customer_email'");
			if($this->db->affected_rows() > 0){

				$response['status']=202;
				$response['mail_id']=$customer_email;
				$_SESSION["customer_id"] =$customer_id;
				$_SESSION["customer_email"] =$customer_email;

			}else{

				$insert_otp=$this->db->insert("user_otp_master",$otp_data);
				$_SESSION["customer_id"] =$customer_id;
				$_SESSION["customer_email"] =$customer_email;
				$subject="OTP for AMGT";
				$message="Hello, <br> <p>Your otp is ".$otp.". please do not disclose.</p>";
				//$customer_email="poojalote123@gmail.com";
				if($insert_otp == true)
				{
					$mail=$this->sendEmail($customer_email, $subject, $message);
					if($mail == true)
					{
						$response['mail_id']=$customer_email;
						$response['status']=200;
					}else{
						$response['status']=201;
					}
				}else{
					$response['status']=202;
				}
			}

		}else{
			$response['status']=201;
		}  echo json_encode($response);
	}

	function logout(){
		// remove all session variables
		session_unset();

		// destroy the session
		session_destroy();
		$response['code']=200;
		echo json_encode($response);
	}
	public function Newotpverify(){
		$mail_id= $this->input->post("mail_id");
		$_SESSION["customer_email"] =$mail_id;
		$otp= $this->input->post("otp");
		$query=$this->db->query("select user_otp from user_otp_master where user_name='$mail_id'");
		if($this->db->affected_rows()>0){
			$result=$query->row();
			$user_otp=$result->user_otp;
			if($user_otp == $otp)
			{
				$response['status']=200;
			}else{
				$response['status']=201;
			}
		}else{
			$response['status']=202;
		} echo json_encode($response);
	}

	public function filePDFUpload() {
		$fileData = $this->input->post("fileBase64");
		$year = $this->input->post("year");
		$email_id=$_SESSION["customer_email"] ;
		$cust_id=$_SESSION["customer_id"] ;
		// $email_id = $this->input->post("email_id");
		$date = date('Y-m-d H:i:s');
		$randomdata = strtotime($date);
		// $email_id = "pooja@gbtech.in";
		define('UPLOAD_DIR', 'upload/');
		$fileData = str_replace('data:image/png;base64,', '', $fileData);
		$fileData = str_replace(' ', '+', $fileData);
		$data = base64_decode($fileData);
		$file = UPLOAD_DIR . 'Document_'.$randomdata . '.png';
		// $file = UPLOAD_DIR . uniqid() . '.png';
		$success = file_put_contents($file, $data);
		if ($success) {
			$data=array(
				"created_by"=>$email_id,
				"year" => $year,
				"customer_id"=>$cust_id,
				"file"=> base_url() . $file,
				"created_on"=> date('d-m-Y'),
			);
			$insert=$this->db->insert("document_management_table",$data);
			if($insert == true){
				$response["status"] = 200;
			}else{
				$response["status"] = 201;
			}
		} else {
			$response["thumb"] = 'Failed To Create';
		}
		echo json_encode($response);
	}

	public function fileUpload(){
		$upload_path="upload";
		$inputname="upload_file";
		$email_id=$_SESSION["customer_email"] ;
		$year = $this->input->post("year");
		$cust_id=$_SESSION["customer_id"] ;
		$file1=$this->Global_model->upload_multiple_file_new($upload_path, $inputname, 1);
		if($file1['status']==200){
			$file=$file1['body'][0];
		}else{
			$file=$upload_path;
		}
		$data=array(
			"created_by"=>$email_id,
			"year"=>$year,
			"customer_id"=>$cust_id,
			"file"=> base_url() . $file,
			"created_on"=> date('d-m-Y'),
		);
		$insert=$this->db->insert("document_management_table",$data);
		if($insert == true){
			$response["status"] = 200;
		}else{
			$response["status"] = 201;
		}echo json_encode($response);
	}

	public function createAccountNumber(){
		$cust_id=$this->input->post('cust_id');
		$query=$this->db->query("select Account_number from Customer_Login_table where customer_id='$cust_id'");
		if($this->db->affected_rows()>0){
			$result=$query->row();
			$Account_number=$result->Account_number;
		}else{
			$Account_number=$this->generate_account_number();
		}
		$response["account_number"] = $Account_number;
		echo json_encode($response);
	}

	function generate_account_number(){
		$Account_number=rand(100000,10000000);
		$this->db->select('*');
		$this->db->from('Customer_Login_table');
		$this->db->where('Account_number', $Account_number);
		$this->db->get();
		if ($this->db->affected_rows() > 0) {
			return generate_account_number();
		} else {
			return $Account_number;
		}
	}

	function SaveCustomer(){
		$customer_id=$this->input->post('customer_id');
		$account_number=$this->input->post('account_number');
		$query=$this->get_customer_email($customer_id);
		if($this->db->affected_rows()>0){
			$result=$query->row();
			$email_id=$result->customer_email_id;
		}else{
			$email_id="";
		}
		$link="http://amgt.ecovisrkca.com/";
		$password=rand(100,1000);
		$data=array(
			"customer_id"=>$customer_id,
			"customer_email"=> $email_id,
			"Account_number"=> $account_number,
			"password"=> $password,
			"created_on"=> date('d-m-Y'),
		);
		$insert=$this->db->insert('Customer_Login_table',$data);
		$subject="AMGT Login Credentials";
		$message="
			<p>Hello, <br>
			Below mention are the crendentials of your AMGT's Account.<br>
			
			User Name: ".$email_id."<br>
			Password: ".$password."<br>
			 Please go on below mention link to login <br>
			 <p>".$link."</p><br>
			 
			 Regards,<br>
			 AMGT Team
			</p>
			
			";
		if($insert== true){
			//$email_id="poojalote123@gmail.com";
			$mail=$this->sendEmail($email_id, $subject, $message);
			$response["status"] = 200;
			$response["body"] = "Account Created Successfully.";
		}else{
			$response["status"] = 201;
			$response["body"] = "Fail To create account.";
		}echo json_encode($response);
	}
	function sendEmail($to, $subject, $message) {
		$from_email = 'value@gbtech.in'; //change this to yours
		$this->load->library('email');
		//configure email settings
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'mail.gbtech.in'; //smtp host name
		$config['smtp_port'] = '587'; //smtp port number 587 on server
		$config['smtp_user'] = $from_email;
		$config['smtp_pass'] = 'gbtech@2019'; //$from_email password
		$config['mailtype'] = 'html';
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;
		$config['newline'] = "\r\n"; //use double quotes
		$this->email->initialize($config);

		//send mail
		$this->email->from($from_email, 'AMGT Team');
		$this->email->to($to);
		$this->email->subject($subject);
		$this->email->message($message);
		if ($this->email->send()) {
			return true;
		} else {
			return false;
		}
	}

	public function get_customer_email($cust_id) {   //get Customer_name
		$this->db->select('customer_email_id');
		$this->db->from('customer_master_data');
		$this->db->where('customer_id', $cust_id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query;
		} else {
			return FALSE;
		}
	}

	public function view_customerFiles(){
		$customer_id=$this->input->post('cust_id');
		$year=$this->input->post('year');
		$query=$this->db->query("select * from document_management_table where customer_id='$customer_id' AND year='$year'");
		$data='';
		if($this->db->affected_rows() > 0){
			$result=$query->result();

			foreach($result as $row){
				$file_name=$row->file;
				$explod=explode("/",$file_name);
				$file_name1=$explod[4];
				$created_on=$row->created_on;
				$data .='
				<div class="navbars-items f-align-items-center" onclick="openDocumentViewer(\''.$file_name.'\',\''.$file_name1.'\')">
				<div class="col-sm-8">
				 <div class="f-file-item-group">
				 '.$file_name1.'
				</div>
				</div>
				<div class="col-sm-4" >
				 <div class="f-file-item-group " style="float:right !important">
				 '.$created_on.'
				</div>
				</div>
				</div>
				';
			}
			$response["status"] = 200;
			$response["data"] = $data;
		}else{
			$response["status"] = 201;
			$response["data"] = $data;
		}echo json_encode($response);
	}
	function downloadFile() {
		$filename = $this->input->post('file_path');
		$name = $this->input->post('name');
		if (!empty($filename)) {
			$splitBasePath = explode("/", $filename);
			$filename = implode("/", $splitBasePath);
			$filename .= '/' . $name;
		}
		if(!is_dir("uploads/cache_folder/".$this->ftp_root_folder)){
			mkdir("uploads/cache_folder/".$this->ftp_root_folder);
		}
		$local_path="uploads/cache_folder/".$this->ftp_root_folder."/".$name;
		$fp = fopen($local_path, "w");
		if (ftp_fget($this->conn_id,$fp,$name,FTP_BINARY,0)) {
			$response['status'] = 200;
			$response['name'] = $name;
			$response['body'] = base_url($local_path);
			echo json_encode($response);
		} else {
			$response['status'] = 201;
			$response['body'] = 'file not found';
			echo json_encode($response);
		}
		fclose($fp);
	}

	function action_file(){
		$id = $this->input->post('id');
		$file = $this->input->post('file');
		$where=array(
			"file"=>$file,
		);
		$set=array(
			"status"=>$id,
		);
		$query=$this->db->update('document_management_table',$set,$where);
		if($query== true){
			$response["status"] = 200;
		}else{
			$response["status"] = 201;
		}echo json_encode($response);
	}
	public function getDocument()
	{
		//var_dump($_SESSION);
		$email_id=$_SESSION["customer_email"] ;
		$customer_id=$_SESSION["customer_id"] ;

		$Get_User_data = $this->db->query("SELECT * FROM document_management_table WHERE created_by='$email_id' AND customer_id='$customer_id'")->result();
		//print_r($Get_User_data);exit();

		$data = "";
		$k=0;
		if ($Get_User_data != FALSE) {
			foreach ($Get_User_data as $row) {
				$k=$k+1;
				if($row->status == 0)
				{
					$status="Pending";
				}
				else if($row->status == 1)
				{
					$status="Accepted";
				}
				else{
					$status="Rejected";
				}
				$file_name=$row->file;
				$explod=explode("/",$file_name);
				$file_name1=$explod[4];
				$data .= '<tr><td>'.$file_name1.'</td>
					<td>'.$row->year.'</td>
					<td>'.$row->created_on.'</td>
					<td>'.$status.'</td>
					<td><button class="btn btn-primary btn-link"  onclick="openDocumentViewer(\''.$file_name.'\',\''.$file_name1.'\')"><i class="fa fa-eye"></i></button></td>
					</tr>';
				$k++;

			}
			$response['code'] = 200;
			$response['data'] = $data;
		} else {
			$response['code'] = 201;
			$response['data'] = $data;
		}
		echo json_encode($response);
	}

	function get_customers_invoice(){
		$firm_id = $this->session->user_session->firm_id;

		$query=$this->db->query("select distinct customer_id,(select customer_name from customer_master_data cm where cm.customer_id = dm.customer_id 
		AND cm.customer_id in (select customer_id from customer_mapping_data where firm_id='$firm_id')) as customer_name from document_management_table dm");
		$option="<option value=''>Select Customer</option>";
		if($this->db->affected_rows() > 0){
			$result=$query->result();
			foreach($result as $row){
				if($row->customer_name != ""){
					$option .="<option value=".$row->customer_id.">".$row->customer_name."</option>";
				}
			}
			$response['code'] = 200;
			$response['option'] = $option;
		}else{
			$response['code'] = 201;
			$response['option'] = $option;
		}
		echo json_encode($response);
	}

	function check_file_accept_reject(){
		$id = $this->input->post('id');
		$query=$this->db->query("select status from document_management_table where file='$id'");
		if($this->db->affected_rows() > 0)
		{
			$result=$query->row();
			$status=$result->status;
			$response["status"] = 200;
			$response["data"] = $status;
		}else{
			$response["status"] = 201;
		}echo json_encode($response);
	}




}
