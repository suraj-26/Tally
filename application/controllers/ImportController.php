<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ImportController extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}

	public $url = SERVER_IP;

	public function import_legder()
	{
		$this->load->view('Import_data/import_ledger');
	}

	public function create_groups()
	{
		$this->load->view('Import_data/create_groups');
	}

	public function create_stock_summary()
	{
		$this->load->view('Import_data/create_stock_summary');
	}

	function customer_account()
	{


		$useragent = $_SERVER['HTTP_USER_AGENT'];

		if (preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"])) {
			$data["load_view"] = array("Invoice_management/customer_account_mobile.php");
			$this->load->view('TallyProject/main_page_mobile.php', $data);

		} else {
			$data["load_view"] = array("Invoice_management/customer_account.php");
			$this->load->view("TallyProject/main_page.php", $data);

		}


	}

//	public function main_page()
//	{
//		$data["load_view"] = array("TallyProject/add_ledger_page.php");
//		$this->load->view('TallyProject/main_page_mobile.php', $data);
//	}

	public function add_ledger_page()
	{
		$useragent = $_SERVER['HTTP_USER_AGENT'];
		$data["load_view"] = array("TallyProject/add_ledger_page.php");
		if (preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"])) {
			$this->load->view('TallyProject/main_page_mobile.php', $data);
		} else {
			$this->load->view("TallyProject/main_page.php", $data);
		}

	}

	public function add_group_page()
	{


		$useragent = $_SERVER['HTTP_USER_AGENT'];
		$data["load_view"] = array("TallyProject/add_group_page.php");
		if (preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"])) {
			$this->load->view('TallyProject/main_page_mobile.php', $data);
		} else {
			$this->load->view("TallyProject/main_page.php", $data);
		}
	}

	public function main1()
	{

		//$data["load_view"] = array("TallyProject/main_page1.php");
		$this->load->view("TallyProject/main_page1.php");
	}

	public function add_stock_summary_page()
	{

		$useragent = $_SERVER['HTTP_USER_AGENT'];
		$data["load_view"] = array("TallyProject/add_stock_summary_page.php");
		if (preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"])) {
			$this->load->view('TallyProject/main_page_mobile.php', $data);
		} else {
			$this->load->view("TallyProject/main_page.php", $data);
		}
	}

	public function balance_sheet_page()
	{

		$useragent = $_SERVER['HTTP_USER_AGENT'];
		$data["load_view"] = array("TallyProject/balance_sheet_page.php");
		if (preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"])) {
			$this->load->view('TallyProject/main_page_mobile.php', $data);
		} else {
			$this->load->view("TallyProject/main_page.php", $data);
		}
	}

	public function ratio_analysis_page()
	{


		$useragent = $_SERVER['HTTP_USER_AGENT'];
		$data["load_view"] = array("TallyProject/ratio_analysis_page.php");
		if (preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"])) {
			$this->load->view('TallyProject/main_page_mobile.php', $data);
		} else {
			$this->load->view("TallyProject/main_page.php", $data);
		}
	}

	public function profit_n_loss_page()
	{


		$useragent = $_SERVER['HTTP_USER_AGENT'];
		$data["load_view"] = array("TallyProject/profit_n_loss_page.php");
		if (preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"])) {
			$this->load->view('TallyProject/main_page_mobile.php', $data);
		} else {
			$this->load->view("TallyProject/main_page.php", $data);
		}
	}

	public function sale_purchase($id = '')
	{
		//  $this->load->view('TallyProject/sale_purchase');
		$data['file_id'] = $id;
		$useragent = $_SERVER['HTTP_USER_AGENT'];

		if (preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"])) {
			$data["load_view"] = array("TallyProject/sale_purchase_mobile.php");
			$this->load->view('TallyProject/main_page_mobile.php', $data);

		} else {
			$data["load_view"] = array("TallyProject/sale_purchase.php");
			$this->load->view("TallyProject/main_page.php", $data);

		}
	}

	public function tally_create_data()
	{
		$this->load->view('TallyProject/tally_create_data');
	}

	public function journal_entry($id = "")
	{
		$data['file_id'] = $id;
		//$this->load->view('TallyProject/journal_entry');


		$useragent = $_SERVER['HTTP_USER_AGENT'];

		if (preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"])) {
			$data["load_view"] = array("TallyProject/journal_entry_mobile.php");
			$this->load->view('TallyProject/main_page_mobile.php', $data);

		} else {
			$data["load_view"] = array("TallyProject/journal_entry.php");
			$this->load->view("TallyProject/main_page.php", $data);

		}
	}

	public function main_page()
	{
		$this->load->view('TallyProject/main_page');
	}

	public function receipt_voucher($id = '')
	{
		$data['file_id'] = $id;
		$useragent = $_SERVER['HTTP_USER_AGENT'];
		if (preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"])) {
			$data["load_view"] = array("TallyProject/receipt_voucher_mobile.php");
			$this->load->view('TallyProject/main_page_mobile.php', $data);
		} else {
			$data["load_view"] = array("TallyProject/receipt_voucher.php");
			$this->load->view("TallyProject/main_page.php", $data);

		}
		//   $this->load->view('TallyProject/receipt_voucher');
	}
	public function dayBook($id = '')
	{
		$data['file_id'] = $id;
		$useragent = $_SERVER['HTTP_USER_AGENT'];
		if (preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"])) {
			$data["load_view"] = array("TallyProject/dayBookPage.php");
			$this->load->view('TallyProject/main_page_mobile.php', $data);
		} else {
			$data["load_view"] = array("TallyProject/dayBookPage.php");
			$this->load->view("TallyProject/main_page.php", $data);

		}
		//   $this->load->view('TallyProject/receipt_voucher');
	}
	public function trialBalance($id = '')
	{
		$data['file_id'] = $id;
		$useragent = $_SERVER['HTTP_USER_AGENT'];
		if (preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"])) {
			$data["load_view"] = array("TallyProject/trialBalance.php");
			$this->load->view('TallyProject/main_page_mobile.php', $data);
		} else {
			$data["load_view"] = array("TallyProject/trialBalance.php");
			$this->load->view("TallyProject/main_page.php", $data);

		}
		//   $this->load->view('TallyProject/receipt_voucher');
	}
	public function accountBook($id = '')
	{
		$data['file_id'] = $id;
		$useragent = $_SERVER['HTTP_USER_AGENT'];
		if (preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"])) {
			$data["load_view"] = array("TallyProject/accountBook.php");
			$this->load->view('TallyProject/main_page_mobile.php', $data);
		} else {
			$data["load_view"] = array("TallyProject/accountBook.php");
			$this->load->view("TallyProject/main_page.php", $data);

		}
		//   $this->load->view('TallyProject/receipt_voucher');
	}
	public function statementAccount($id = '')
	{
		$data['file_id'] = $id;
		$useragent = $_SERVER['HTTP_USER_AGENT'];
		if (preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"])) {
			$data["load_view"] = array("TallyProject/statementAccount.php");
			$this->load->view('TallyProject/main_page_mobile.php', $data);
		} else {
			$data["load_view"] = array("TallyProject/statementAccount.php");
			$this->load->view("TallyProject/main_page.php", $data);

		}
		//   $this->load->view('TallyProject/receipt_voucher');
	}
	public function inventoryBooks($id = '')
	{
		$data['file_id'] = $id;
		$useragent = $_SERVER['HTTP_USER_AGENT'];
		if (preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"])) {
			$data["load_view"] = array("TallyProject/inventoryBooks.php");
			$this->load->view('TallyProject/main_page_mobile.php', $data);
		} else {
			$data["load_view"] = array("TallyProject/inventoryBooks.php");
			$this->load->view("TallyProject/main_page.php", $data);

		}
		//   $this->load->view('TallyProject/receipt_voucher');
	}
	public function statementsInventory($id = '')
	{
		$data['file_id'] = $id;
		$useragent = $_SERVER['HTTP_USER_AGENT'];
		if (preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"])) {
			$data["load_view"] = array("TallyProject/statementsInventory.php");
			$this->load->view('TallyProject/main_page_mobile.php', $data);
		} else {
			$data["load_view"] = array("TallyProject/statementsInventory.php");
			$this->load->view("TallyProject/main_page.php", $data);

		}
		//   $this->load->view('TallyProject/receipt_voucher');
	}
	public function cashfundflow($id = '')
	{
		$data['file_id'] = $id;
		$useragent = $_SERVER['HTTP_USER_AGENT'];
		if (preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"])) {
			$data["load_view"] = array("TallyProject/cashfundflow.php");
			$this->load->view('TallyProject/main_page_mobile.php', $data);
		} else {
			$data["load_view"] = array("TallyProject/cashfundflow.php");
			$this->load->view("TallyProject/main_page.php", $data);

		}
		//   $this->load->view('TallyProject/receipt_voucher');
	}
	public function listofAccounts($id = '')
	{
		$data['file_id'] = $id;
		$useragent = $_SERVER['HTTP_USER_AGENT'];
		if (preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"])) {
			$data["load_view"] = array("TallyProject/listofAccounts.php");
			$this->load->view('TallyProject/main_page_mobile.php', $data);
		} else {
			$data["load_view"] = array("TallyProject/listofAccounts.php");
			$this->load->view("TallyProject/main_page.php", $data);

		}
		//   $this->load->view('TallyProject/receipt_voucher');
	}
	public function exceptionReport($id = '')
	{
		$data['file_id'] = $id;
		$useragent = $_SERVER['HTTP_USER_AGENT'];
		if (preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"])) {
			$data["load_view"] = array("TallyProject/exceptionReport.php");
			$this->load->view('TallyProject/main_page_mobile.php', $data);
		} else {
			$data["load_view"] = array("TallyProject/exceptionReport.php");
			$this->load->view("TallyProject/main_page.php", $data);

		}
		//   $this->load->view('TallyProject/receipt_voucher');
	}

	public function create_voucher()
	{
		$this->load->view('Import_data/create_voucher');
	}

	public function View_tallyData()
	{
		$this->load->view('TallyProject/view_tallyData');
	}

	public function get_bs()
	{
		$this->load->view('TallyProject/get_bs');
	}

	public function get_companies1()
	{
		$session_data = $this->session->user_session;
		$user_id = $session_data->user_id;
		$query = $this->db->query("select tally_company from user_header_all where user_id='$user_id'");
		if ($this->db->affected_rows() > 0) {
			$result = $query->row();
			$tally_company = $result->tally_company;
			$data = explode("#", $tally_company);
			$optcompany = '<option value="">Select Company</option>';
			for ($i = 0; $i < count($data); $i++) {
				$optcompany .= "<option value='" . $data[$i] . "'>" . $data[$i] . "</option>";

			}
			$response['company_list'] = $optcompany;
		} else {
			$response['company_list'] = $optcompany;
		}

		echo json_encode($response);
	}

	public function get_companies()
	{
		$res_str = '
                <ENVELOPE>
                    <HEADER>
                        <TALLYREQUEST>Export Data</TALLYREQUEST>
                    </HEADER>
                    <BODY>
                        <EXPORTDATA>
                            <REQUESTDESC>
                                <REPORTNAME>List of Companies</REPORTNAME>
                                <STATICVARIABLES>
                                    <SVEXPORTFORMAT>$$SysName:XML</SVEXPORTFORMAT>
                                </STATICVARIABLES>
                            </REQUESTDESC>
                        </EXPORTDATA>
                    </BODY>
                </ENVELOPE>
                ';


		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $this->url);
		curl_setopt($ch, CURLOPT_POSTFIELDS, "xmlRequest=" . $res_str);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);

		$data = curl_exec($ch);


		curl_close($ch);
		$xml = simplexml_load_string($data);
		$json = json_encode($xml);
		$array = json_decode($json, TRUE);

		$optcompany = '<option value="">Select Company</option>';
		foreach ($array as $row) {
			//var_dump($row);
			if (count($row['COMPANYNAME']) == 1) {
				$optcompany .= "<option value='" . $row['COMPANYNAME'] . "'>" . $row['COMPANYNAME'] . "</option>";
			} else {
				foreach ($row['COMPANYNAME'] as $d) {
					$optcompany .= "<option value='" . $d . "'>" . $d . "</option>";
				}
			}
		}
		$response['company_list'] = $optcompany;
		echo json_encode($response);
	}

	public function get_ledgers()
	{
		$company_id = $this->input->post('company_name');
		$requestXML = '<ENVELOPE>
<HEADER>
<VERSION>1</VERSION>
<TALLYREQUEST>Export</TALLYREQUEST>
<TYPE>Collection</TYPE>
<ID>List of Ledgers</ID>
     </HEADER>
    <BODY>
        <DESC>
<STATICVARIABLES>
<SVCURRENTCOMPANY>' . $company_id . '</SVCURRENTCOMPANY>
</STATICVARIABLES>
        </DESC>
    </BODY>
</ENVELOPE>
    ';

		$headers = array("Content-type: application/json", "Accept: application/json", "Content-length:" . strlen($requestXML), "Connection: open");

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 100);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $requestXML);

		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		$data = curl_exec($ch);
//var_dump($data);


		if (curl_errno($ch)) {
			print curl_error($ch);
			echo "something went wrong..... try later";
		} else {
			// echo "request accepted";
			//echo $data;
			curl_close($ch);
			$xml = simplexml_load_string($data);
			$json = json_encode($xml);
			$array = json_decode($json, TRUE);
			//print_r($array);
			$p = 1;
			$option = "<option value=''>Select ledger</option>";
			foreach ($array as $row) {

//        var_dump($k1);
//        echo "<br>";
				$newarr = $row;
				$m = 0;
				foreach ($newarr as $r1) {
					if ($m == 1) {
						if (is_array($r1) || is_object($r1)) {
							foreach ($r1 as $r2) {
								foreach ($r2['LEDGER'] as $d) {
									foreach ($d as $d1) {
										//var_dump($d1);

										if (array_key_exists('NAME', $d1)) {
											$opt = $d1['NAME'];

											$option .= "<option value='" . $opt . "'>" . $opt . "</option>";
										}
									}
								}
							}
						}
					}
					$m++;
				}
			}

			$response['ledger_list'] = $option;
			echo json_encode($response);
		}
	}

	public function add_ledger()
	{
		$ledger_name = $this->input->post('ledger_name');
		$ledger_parent = $this->input->post('ledger_id');
		$opening_balance = $this->input->post('opening_balance');
		$company_id = $this->input->post('company_name');
		$gst = $this->input->post('gstin');
		$address = $this->input->post('address');
		$pan = $this->input->post('panno');
		$inventoryValuesAffected = $this->input->post('inventoryValuesAffected');
		$res_str = '
	  <ENVELOPE>
            <HEADER>
                <TALLYREQUEST>Import Data</TALLYREQUEST>
            </HEADER>
            <BODY>
            <IMPORTDATA>
            <REQUESTDESC>
            <REPORTNAME>All Masters</REPORTNAME>
            <STATICVARIABLES>
            <SVCURRENTCOMPANY>{' . $company_id . '}</SVCURRENTCOMPANY>
           </STATICVARIABLES>
            </REQUESTDESC>
            <REQUESTDATA>
            <TALLYMESSAGE xmlns:UDF="TallyUDF">
            <LEDGER NAME="' . $ledger_name . '" RESERVEDNAME="">
      <ADDRESS.LIST TYPE="String">
       <ADDRESS>' . $address . '</ADDRESS>
      </ADDRESS.LIST>
      <MAILINGNAME.LIST TYPE="String">
       <MAILINGNAME>' . $ledger_name . '</MAILINGNAME>
      </MAILINGNAME.LIST>
      <PRIORSTATENAME>Maharashtra</PRIORSTATENAME>
      <PINCODE>400021</PINCODE>
      <INCOMETAXNUMBER>' . $pan . '</INCOMETAXNUMBER>
      <COUNTRYNAME>India</COUNTRYNAME>
      <GSTREGISTRATIONTYPE>Regular</GSTREGISTRATIONTYPE>
      <VATDEALERTYPE>Regular</VATDEALERTYPE>
      <PARENT>' . $ledger_parent . '</PARENT>
	  <OPENINGBALANCE>' . $opening_balance . '</OPENINGBALANCE>
  		
      <COUNTRYOFRESIDENCE>India</COUNTRYOFRESIDENCE>
      <PARTYGSTIN>' . $gst . '</PARTYGSTIN>
      <LEDSTATENAME>Maharashtra</LEDSTATENAME>
      <INVENTORIESVALUEAFFECTED>' . $inventoryValuesAffected . '</INVENTORIESVALUEAFFECTED>
      <LANGUAGENAME.LIST>
       <NAME.LIST TYPE="String">
        <NAME>' . $ledger_name . '</NAME>
       </NAME.LIST>
       <LANGUAGEID> 1033</LANGUAGEID>
      </LANGUAGENAME.LIST>
     </LEDGER>
            </TALLYMESSAGE>
            </REQUESTDATA>
            </IMPORTDATA>
            </BODY>
            </ENVELOPE>
	 ';
		/* $res_str = <<<XML

			<ENVELOPE>
			<HEADER>
				<TALLYREQUEST>Import Data</TALLYREQUEST>
			</HEADER>
			<BODY>
			<IMPORTDATA>
			<REQUESTDESC>
			<REPORTNAME>All Masters</REPORTNAME>
			<STATICVARIABLES>
			<SVCURRENTCOMPANY>{$company_id}</SVCURRENTCOMPANY>
		   </STATICVARIABLES>
			</REQUESTDESC>
			<REQUESTDATA>
			<TALLYMESSAGE xmlns:UDF="TallyUDF">
			<LEDGER NAME="{$ledger_name}" ACTION="Create">
			<ADDRESS.LIST TYPE="String">
			  <ADDRESS>{$address}</ADDRESS>
			  <ADDRESS>Mumbai</ADDRESS>
			</ADDRESS.LIST>
			<NAME>{$ledger_name}</NAME>
			<PARENT>{$ledger_parent}</PARENT>
			<OPENINGBALANCE>{$opening_balance}</OPENINGBALANCE>
			  <PARTYGSTIN>ASDF234kl56</PARTYGSTIN>
			<ISBILLWISEON>Yes</ISBILLWISEON>
			</LEDGER>
			</TALLYMESSAGE>
			</REQUESTDATA>
			</IMPORTDATA>
			</BODY>
			</ENVELOPE>

XML; */
		// echo '<pre>', htmlentities($res_str), '</pre>';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->url);
// Following line is compulsary to add as it is:
		curl_setopt($ch, CURLOPT_POSTFIELDS, "xmlRequest=" . $res_str);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);
		$data = curl_exec($ch);
		//   var_dump($data);

		$xml = simplexml_load_string($data);
		$json = json_encode($xml);
		$array = json_decode($json, TRUE);
		//var_dump($array);
		if ($array['CREATED'] == 1) {
			$response['status'] = 200;
		} else {
			if (!array_key_exists('LINEERROR', $array)) {
				$response['error'] = "please try again later";
			} else {
				$response['error'] = $array['LINEERROR'];
			}
			$response['status'] = 201;
		}
		curl_close($ch);
		echo json_encode($response);
	}

	public function get_groups()
	{
		$company_id = $this->input->post('company_name');

		$requestXML = '<ENVELOPE>
<HEADER>
<VERSION>1</VERSION>
<TALLYREQUEST>Export</TALLYREQUEST>

<TYPE>Collection</TYPE>

<ID>List of Groups</ID>
     </HEADER>

    <BODY>

        <DESC>
<STATICVARIABLES>
<SVCURRENTCOMPANY>' . $company_id . '</SVCURRENTCOMPANY>
</STATICVARIABLES>
        </DESC>
    </BODY>
</ENVELOPE>
    ';

		$headers = array("Content-type: application/json", "Accept: application/json", "Content-length:" . strlen($requestXML), "Connection: open");

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 100);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $requestXML);

		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		$data = curl_exec($ch);

		$data = str_replace("", "", $data);
		$data = str_replace('&#4;', '', $data);
		if (curl_errno($ch)) {
			print curl_error($ch);
			echo "  something went wrong..... try later";
		} else {
			// echo "request accepted";
			//echo $data;
			curl_close($ch);
			$xml = simplexml_load_string($data);
			$json = json_encode($xml);
			$array = json_decode($json, TRUE);

			$p = 1;
			$option = "<option>Select Group</option>";
			foreach ($array as $row) {

//        var_dump($k1);
//        echo "<br>";
				$newarr = $row;
				$m = 0;
				foreach ($newarr as $r1) {
					if ($m == 1) {
						if (is_array($r1) || is_object($r1)) {
							foreach ($r1 as $r2) {
								foreach ($r2['GROUP'] as $d) {
									foreach ($d as $d1) {
										//var_dump($d1['NAME']);
										if (is_array($d1)) {
											if (array_key_exists('NAME', $d1)) {
												//echo $d1['NAME'] . "<br>";
												$opt = $d1['NAME'];
												$option .= "<option value='" . $opt . "'>" . $opt . "</option>";
											}
										}
									}
								}
							}
						}
					}
					$m++;
				}
			}
		}
		$response['group_list'] = $option;
		echo json_encode($response);
	}

	public function get_stockgroups()
	{
		$company_id = $this->input->post('company_name');
//<ID>List of Stock Groups</ID>
		$requestXML = '<ENVELOPE>
<HEADER>
<VERSION>1</VERSION>
<TALLYREQUEST>Export</TALLYREQUEST>

<TYPE>Collection</TYPE>


	<ID>List of Stock Groups</ID>
     </HEADER>

    <BODY>

        <DESC>
<STATICVARIABLES>
<SVCURRENTCOMPANY>' . $company_id . '</SVCURRENTCOMPANY>
</STATICVARIABLES>
        </DESC>
    </BODY>
</ENVELOPE>
    ';

		$headers = array("Content-type: application/json", "Accept: application/json", "Content-length:" . strlen($requestXML), "Connection: open");

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 100);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $requestXML);

		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		$data = curl_exec($ch);

		$data = str_replace("", "", $data);
		$data = str_replace('&#4;', '', $data);
		if (curl_errno($ch)) {
			print curl_error($ch);
			echo "  something went wrong..... try later";
		} else {
			// echo "request accepted";
			//echo $data;
			curl_close($ch);
			$xml = simplexml_load_string($data);
			$json = json_encode($xml);
			$array = json_decode($json, TRUE);

			$p = 1;
			$option = "<option>Select Group</option>";

			foreach ($array as $row) {

//        var_dump($k1);
//        echo "<br>";
				$newarr = $row;
				$m = 0;
				foreach ($newarr as $r1) {
					if ($m == 1) {
						if (is_array($r1) || is_object($r1)) {
							foreach ($r1 as $r2) {

								if (array_key_exists('STOCKGROUP', $r2)) {
									foreach ($r2['STOCKGROUP'] as $d) {
										foreach ($d as $d1) {
											//var_dump($d1['NAME']);
											if (is_array($d1)) {
												if (array_key_exists('NAME', $d1)) {
													//echo $d1['NAME'] . "<br>";
													$opt = $d1['NAME'];
													$option .= "<option value='" . $opt . "'>" . $opt . "</option>";
												}
											}
										}
									}
								}
							}
						}
					}
					$m++;
				}
			}
		}
		$response['group_list'] = $option;
		echo json_encode($response);
	}

	public function getUnitofMeasure()
	{
		$company_id = $this->input->post('company_name');
		$requestXML =
			"<ENVELOPE>" .
			"<HEADER>" .
			"<TALLYREQUEST>Export Data</TALLYREQUEST>" .
			"</HEADER>" .
			"<BODY>" .
			"<EXPORTDATA>" .
			"<REQUESTDESC>" .
			"<REPORTNAME>List of Accounts</REPORTNAME>" .
			"<STATICVARIABLES>" .
			"<SVEXPORTFORMAT>\$\$SysName:XML</SVEXPORTFORMAT>" .
			"<ACCOUNTTYPE>Units</ACCOUNTTYPE>" .
			"<SVCURRENTCOMPANY>' . $company_id . '</SVCURRENTCOMPANY>" .
			"<!--Other possible values for ACCOUNTTYPE tag are given below-->" .
			"<!--All Acctg. Masters, All Inventory Masters,All Statutory Masters-->" .
			"<!--Ledgers,Groups,Cost Categories,Cost Centres-->" .
			"<!--Units,Godowns,Stock Items,Stock Groups,Stock Categories-->" .
			"<!--Voucher types,Currencies,Employees,Budgets & Scenarios-->" .
			"</STATICVARIABLES>" .
			"</REQUESTDESC>" .
			"</EXPORTDATA>" .
			"</BODY>" .
			"</ENVELOPE>";
		$headers = array("Content-type: application/json", "Accept: application/json", "Content-length:" . strlen($requestXML), "Connection: open");

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 100);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $requestXML);

		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		$data = curl_exec($ch);

		$data = str_replace("", "", $data);
		$data = str_replace('&#4;', '', $data);
		if (curl_errno($ch)) {
			print curl_error($ch);
			echo "  something went wrong..... try later";
		} else {
			// echo "request accepted";
			//echo $data;
			curl_close($ch);
			$xml = simplexml_load_string($data);
			$json = json_encode($xml);
			$array = json_decode($json, TRUE);

			$p = 1;
			$option = "<option>Select Unit Of Measure</option>";

			foreach ($array as $row) {

//        var_dump($k1);
//        echo "<br>";
				$newarr = $row;
				$m = 0;
				foreach ($newarr as $r1) {
					if (is_array($r1)) {
						foreach ($r1 as $k) {
							foreach ($k as $m){
								if (is_array($m)) {
									foreach ($m as $n){
										if(is_array($n)){
											foreach ($n as $i){
												if(array_key_exists("@attributes",$i)){
													$arr=$i["@attributes"];
													foreach ($arr as $r2){
														if($r2 != ""){
															$option .= "<option value='".$r2."'>".$r2."</option>";
														}
													}
												}

											}
										}
									}
								}
							}
						}
					}

				}
			}
		}
		$response['unit_list'] = $option;
		echo json_encode($response);

	}

	public function get_stockItems()
	{
		$company_id = $this->input->post('company_name');
$requestXML = '
		<ENVELOPE>
<HEADER>
    <VERSION>1</VERSION>
    <TALLYREQUEST>Export</TALLYREQUEST>
    <TYPE>Collection</TYPE>
    <ID>Custom List of StockItems</ID>
</HEADER>

<BODY>
<DESC>
<STATICVARIABLES>
<EXPLODEFLAG>Yes</EXPLODEFLAG>
       
<SVCURRENTCOMPANY>' . $company_id . '</SVCURRENTCOMPANY>
</STATICVARIABLES>
 <TDL>
            <TDLMESSAGE>
                <COLLECTION ISMODIFY="No" ISFIXED="No" ISINITIALIZE="Yes" ISOPTION="No" ISINTERNAL="No" NAME="Custom List of StockItems">
                    <TYPE>StockItem</TYPE>
                    <NATIVEMETHOD>Name</NATIVEMETHOD>
                </COLLECTION>
            </TDLMESSAGE>
        </TDL>
</DESC>
</BODY>
</ENVELOPE>
';

		$headers = array("Content-type: application/json", "Accept: application/json", "Content-length:" . strlen($requestXML), "Connection: open");

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 100);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $requestXML);

		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		$data = curl_exec($ch);
		$data = str_replace("", "", $data);
		$data = str_replace('&#4;', '', $data);
		if (curl_errno($ch)) {
			print curl_error($ch);
			echo "  something went wrong..... try later";
		} else {
			// echo "request accepted";
			//echo $data;

			curl_close($ch);
			$xml = simplexml_load_string($data);
			$json = json_encode($xml);
			$array = json_decode($json, TRUE);

			$p = 1;
			$option = "<option>Select Item</option>";
			//var_dump();
			foreach ($array['BODY']['DATA']['COLLECTION']['STOCKITEM'] as $d){
				foreach ($d as $da){
					foreach ($da as $d1){
						if(!is_array($d1) && !is_numeric($d1) && !empty($d1)){
							$option .= "<option value='" . $d1 . "'>" . $d1 . "</option>";
						}
					}
				}
			}

		}
		$response['group_list'] = $option;
		echo json_encode($response);
	}

	public function add_group()
	{
		$ledger_parent = $this->input->post('parent_id');
		$company_id = $this->input->post('company_namegrp');
		$group_name = $this->input->post('group_name');
		$res_str = <<<XML
<ENVELOPE>
<HEADER>
<TALLYREQUEST>Import Data</TALLYREQUEST>
</HEADER>
<BODY>
<IMPORTDATA>
<REQUESTDESC>
<REPORTNAME>All Masters</REPORTNAME>
<STATICVARIABLES>
<SVCURRENTCOMPANY>{$company_id}</SVCURRENTCOMPANY>
</STATICVARIABLES>
</REQUESTDESC>
<REQUESTDATA>
<TALLYMESSAGE xmlns:UDF="TallyUDF">
<GROUP NAME="{$group_name}" ACTION="Create">
<NAME.LIST>
<NAME>{$group_name}</NAME>
</NAME.LIST>
<PARENT>{$ledger_parent}</PARENT>
<ISSUBLEDGER>No</ISSUBLEDGER>
<ISBILLWISEON>No</ISBILLWISEON>
<ISCOSTCENTRESON>No</ISCOSTCENTRESON>
</GROUP>
</TALLYMESSAGE>
</REQUESTDATA>
</IMPORTDATA>
</BODY>
</ENVELOPE>

XML;

		//var_dump($res_str);die;
		//setting the curl parameters.
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->url);
// Following line is compulsary to add as it is:
		curl_setopt($ch, CURLOPT_POSTFIELDS, "xmlRequest=" . $res_str);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);
		$data = curl_exec($ch);
		// var_dump($data);
		$xml = simplexml_load_string($data);
		$json = json_encode($xml);
		$array = json_decode($json, TRUE);
		//var_dump($array);
		if ($array['CREATED'] == 1) {
			$response['status'] = 200;
		} else {
			if (!array_key_exists('LINEERROR', $array)) {
				$response['error'] = "please try again later";
			} else {
				$response['error'] = $array['LINEERROR'];
			}
			$response['status'] = 201;
		}
		curl_close($ch);
		echo json_encode($response);
	}

	public function add_stock()
	{
		$company_id = $this->input->post('company_namestk');
		$group_name = $this->input->post('stock_group');
		$item_name = $this->input->post('item_name');
		$opening_balance = $this->input->post('opening_balance');
		$unit_price = $this->input->post('unit_price');
		$unitofM= $this->input->post('unitofM');
		$quantity = $this->input->post('quantity');
		$res_str = <<<XML
	<ENVELOPE>
<HEADER>
<TALLYREQUEST>Import Data</TALLYREQUEST>
</HEADER>
<BODY>
<IMPORTDATA>
<REQUESTDESC>
<REPORTNAME>All Masters</REPORTNAME>
<STATICVARIABLES>
<SVCURRENTCOMPANY>{$company_id}</SVCURRENTCOMPANY>
</STATICVARIABLES>
</REQUESTDESC>
<REQUESTDATA>
<!-- Create Stock Item named "$item_name" -->
<TALLYMESSAGE xmlns:UDF="TallyUDF">
<STOCKITEM NAME="{$item_name}" ACTION="Create">
<NAME.LIST>
<NAME>{$item_name}</NAME>
</NAME.LIST>
<PARENT>{$group_name}</PARENT>
<BASEUNITS>{$unitofM}</BASEUNITS>
<OPENINGBALANCE>{$quantity} NOS</OPENINGBALANCE> 
<OPENINGVALUE>{$opening_balance}</OPENINGVALUE>
<OPENINGRATE>{$unit_price}</OPENINGRATE>
<BATCHALLOCATIONS.LIST>
<NAME>Primary Batch</NAME>
<BATCHNAME>Primary Batch</BATCHNAME>
<GODOWNNAME>Main Location</GODOWNNAME>
<MFDON>20170120</MFDON>
<OPENINGBALANCE>{$quantity} NOS</OPENINGBALANCE> 
<OPENINGVALUE>{$opening_balance}</OPENINGVALUE>
<OPENINGRATE>{$unit_price}</OPENINGRATE>
</BATCHALLOCATIONS.LIST>
</STOCKITEM>
</TALLYMESSAGE>
</REQUESTDATA>
</IMPORTDATA>
</BODY>
</ENVELOPE>
XML;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->url);
// Following line is compulsary to add as it is:
		curl_setopt($ch, CURLOPT_POSTFIELDS, "xmlRequest=" . $res_str);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);
		$data = curl_exec($ch);
		//var_dump($data);
		$xml = simplexml_load_string($data);
		$json = json_encode($xml);
		$array = json_decode($json, TRUE);
		//var_dump($array);
		if ($array['CREATED'] == 1) {
			$response['status'] = 200;
		} else {
			if (!array_key_exists('LINEERROR', $array)) {
				$response['error'] = "please try again later";
			} else {
				$response['error'] = $array['LINEERROR'];
			}
			$response['status'] = 201;
		}
		curl_close($ch);
		echo json_encode($response);
	}

	public function add_stock_group()
	{
		$company_id = $this->input->post('stckcompany_name');
		$group_name = $this->input->post('Stock_group_name');

		$res_str = <<<XML
	<ENVELOPE>
<HEADER>
<TALLYREQUEST>Import Data</TALLYREQUEST>
</HEADER>


<BODY>
<IMPORTDATA>
<REQUESTDESC>
<REPORTNAME>All Masters</REPORTNAME>
                <STATICVARIABLES>
<SVCURRENTCOMPANY>{$company_id}</SVCURRENTCOMPANY>
</STATICVARIABLES>
</REQUESTDESC>
<REQUESTDATA>
<!-- Create Stock Group named "$group_name" -->
<TALLYMESSAGE xmlns:UDF="TallyUDF">
<STOCKGROUP NAME="{$group_name}" ACTION="Create">
<NAME.LIST>
<NAME>{$group_name}</NAME>
</NAME.LIST>
<PARENT/>
<ISADDABLE>Yes</ISADDABLE>
</STOCKGROUP>
</TALLYMESSAGE>

</REQUESTDATA>
</IMPORTDATA>
</BODY>
</ENVELOPE>
XML;

		//var_dump($res_str);die;
		//setting the curl parameters.
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->url);
// Following line is compulsary to add as it is:
		curl_setopt($ch, CURLOPT_POSTFIELDS, "xmlRequest=" . $res_str);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);
		$data = curl_exec($ch);
		//var_dump($data);
		$xml = simplexml_load_string($data);
		$json = json_encode($xml);
		$array = json_decode($json, TRUE);
		//var_dump($array);
		if ($array['CREATED'] == 1) {
			$response['status'] = 200;
		} else {
			if (!array_key_exists('LINEERROR', $array)) {
				$response['error'] = "please try again later";
			} else {
				$response['error'] = $array['LINEERROR'];
			}
			$response['status'] = 201;
		}
		curl_close($ch);
		echo json_encode($response);
	}

	public function get_voucher_type()
	{
		$company_id = $this->input->post('company_name');
		$requestXML1 = '<ENVELOPE>
<HEADER>
<VERSION>1</VERSION>
<TALLYREQUEST>Export</TALLYREQUEST>
<TYPE>Collection</TYPE>
<ID>List of Voucher Types</ID>
     </HEADER>
    <BODY>
        <DESC>
<STATICVARIABLES>
<SVCURRENTCOMPANY>' . $company_id . '</SVCURRENTCOMPANY>
</STATICVARIABLES>
        </DESC>
    </BODY>
</ENVELOPE>
    ';

		$headers = array("Content-type: application/json", "Accept: application/json", "Content-length:" . strlen($requestXML1), "Connection: open");

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 100);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $requestXML1);

		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		$data = curl_exec($ch);
//var_dump($data);

		if (curl_errno($ch)) {
			print curl_error($ch);
			echo "  something went wrong..... try later";
		} else {
			// echo "request accepted";
			//echo $data;
			curl_close($ch);
			$xml = simplexml_load_string($data);
			$json = json_encode($xml);
			$array = json_decode($json, TRUE);
			//print_r($array);

			$p = 1;
			//$option1 = "<select id='new_select'>";
			$option1 = "<option>Select Voucher Type</option>";
			foreach ($array as $row) {

				//ar_dump($row);
//        echo "<br>";
				$newarr = $row;
				$m = 0;
				foreach ($newarr as $r1) {


					if ($m == 1) {
						if (is_array($r1) || is_object($r1)) {
							foreach ($r1 as $r2) {
								//var_dump($r2['VOUCHERTYPE']);
								foreach ($r2['VOUCHERTYPE'] as $d) {
//                            var_dump($d);
//                            exit;
									foreach ($d as $d1) {
										if (is_array($d1)) {
											if (array_key_exists('NAME', $d1)) {
												$opt = $d1['NAME'];
												$option1 .= "<option value='" . $opt . "'>" . $opt . "</option>";
											}
										}
									}
								}
							}
						}
					}
					$m++;
				}
			}
//print_r($array['LEDGER']);
//echo count($array['BSNAME']);
		}
		$response['v_type_list'] = $option1;
		echo json_encode($response);
	}

	public function add_voucher()
	{
		$company_id = $this->input->post('company_namevc');

		$narration = $this->input->post('narration');
		$vouchername = $this->input->post('vouchername');
		$effectivedate = $this->input->post('effectivedate');
		$vouchernum = $this->voucher_number();
		$ledgername = $this->input->post('ledgername');
		$amount = $this->input->post('amount');
		$date2 = $this->input->post('date2');
		$Idate2 = $this->input->post('Idate2');
		$paymode = $this->input->post('paymode');
		$ledgername2 = $this->input->post('ledgername2');
		$tax_led1 = $this->input->post('tax_led1');
		$tax_led2 = $this->input->post('tax_led2');
		$tax_led3 = $this->input->post('tax_led3');
		$tax_led4 = $this->input->post('tax_led4');
		$taxamt1 = $this->input->post('taxamt1');
		$taxamt2 = $this->input->post('taxamt2');
		$taxamt3 = $this->input->post('taxamt3');
		$taxamt4 = $this->input->post('taxamt4');
		$taxxml1 = "";
		$taxxml2 = "";
		$taxxml3 = "";
		$taxxml4 = "";
		if (isset($tax_led1) && isset($taxamt1)) {
			$taxxml1 = $this->gettaxledger($tax_led1, $taxamt1);
		}
		if (isset($tax_led2) && isset($taxamt2)) {
			$taxxml2 = $this->gettaxledger($tax_led2, $taxamt2);
		}
		if (isset($tax_led3) && isset($taxamt3)) {
			$taxxml3 = $this->gettaxledger($tax_led3, $taxamt3);
		}
		if (isset($tax_led4) && isset($taxamt4)) {
			$taxxml4 = $this->gettaxledger($tax_led4, $taxamt4);
		}
		$amtt = $amount + $taxamt1 + $taxamt2 + $taxamt3 + $taxamt4;

		if ($vouchername == "Sales1") {

			if (isset($tax_led1) && isset($taxamt1)) {
				$taxxml1 = $this->gettaxledgersales($tax_led1, $taxamt1);
			}
			if (isset($tax_led2) && isset($taxamt2)) {
				$taxxml2 = $this->gettaxledgersales($tax_led2, $taxamt2);
			}
			if (isset($tax_led3) && isset($taxamt3)) {
				$taxxml3 = $this->gettaxledgersales($tax_led3, $taxamt3);
			}
			if (isset($tax_led4) && isset($taxamt4)) {
				$taxxml4 = $this->gettaxledgersales($tax_led4, $taxamt4);
			}
			$res_str = '<ENVELOPE>
 <HEADER>
  <TALLYREQUEST>Import Data</TALLYREQUEST>
 </HEADER>
 <BODY>
  <IMPORTDATA>
   <REQUESTDESC>
    <REPORTNAME>Vouchers</REPORTNAME>
    <STATICVARIABLES>
     <SVCURRENTCOMPANY>{' . $company_id . '}</SVCURRENTCOMPANY>
    </STATICVARIABLES>
   </REQUESTDESC>
   <REQUESTDATA>
    <TALLYMESSAGE xmlns:UDF="TallyUDF">
     <VOUCHER  VCHTYPE="Sales" ACTION="Create" OBJVIEW="Accounting Voucher View">
      
      <OLDAUDITENTRYIDS.LIST TYPE="Number">
       <OLDAUDITENTRYIDS>-1</OLDAUDITENTRYIDS>
      </OLDAUDITENTRYIDS.LIST>
      <DATE>' . $date2 . '</DATE>
      <GUID>66f8e992-76cf-41b2-a2c0-5882c63f7460-00000fab</GUID>
      <STATENAME>Maharashtra</STATENAME>
      <NARRATION>{' . $narration . '}</NARRATION>
      <CSTFORMISSUETYPE/>
      <CSTFORMRECVTYPE/>
      <FBTPAYMENTTYPE>Default</FBTPAYMENTTYPE>
      <BASICDATETIMEOFINVOICE>' . $date2 . '</BASICDATETIMEOFINVOICE>
      <BASICDATETIMEOFREMOVAL>' . $date2 . '</BASICDATETIMEOFREMOVAL>
      <ALLLEDGERENTRIES.LIST>
       <OLDAUDITENTRYIDS.LIST TYPE="Number">
        <OLDAUDITENTRYIDS>-1</OLDAUDITENTRYIDS>
       </OLDAUDITENTRYIDS.LIST>
       <LEDGERNAME>' . $ledgername . '</LEDGERNAME>
       <GSTCLASS/>
       <AMOUNT>-' . $amount . '</AMOUNT>
       <VATEXPAMOUNT>' . $amount . '</VATEXPAMOUNT>
      </ALLLEDGERENTRIES.LIST>
      ' . $taxxml1 . $taxxml2 . $taxxml3 . $taxxml4 . '
     </VOUCHER>
    </TALLYMESSAGE>
    
    
   </REQUESTDATA>
  </IMPORTDATA>
 </BODY>
</ENVELOPE>
';
		} else {
			$res_str = "
<ENVELOPE>
<HEADER>
<TALLYREQUEST>Import Data</TALLYREQUEST>
</HEADER>
<BODY>
<IMPORTDATA>
 <REQUESTDESC>
<REPORTNAME>Vouchers</REPORTNAME>
<STATICVARIABLES>
 <SVCURRENTCOMPANY>{$company_id}</SVCURRENTCOMPANY>
</STATICVARIABLES>
</REQUESTDESC>
<REQUESTDATA>
<TALLYMESSAGE xmlns:UDF='TallyUDF'>
 <VOUCHER  VCHTYPE='Receipt' ACTION='Create' OBJVIEW='Accounting Voucher View'>
  <DATE>20210301</DATE>
  <GUID>25636997-ae8d-4ba8-bbe7-9cc74518a9c5-00000000</GUID>
  <NARRATION>{$narration}</NARRATION>
  <VOUCHERTYPENAME>{$vouchername}</VOUCHERTYPENAME>
  <VOUCHERNUMBER>{$vouchernum}</VOUCHERNUMBER>
  <CSTFORMISSUETYPE/>
  <CSTFORMRECVTYPE/>
  <PERSISTEDVIEW>Accounting Voucher View</PERSISTEDVIEW>
  <VCHGSTCLASS/>
  <DIFFACTUALQTY>No</DIFFACTUALQTY>
  <ASORIGINAL>No</ASORIGINAL>
  <FORJOBCOSTING>No</FORJOBCOSTING>
  <ISOPTIONAL>No</ISOPTIONAL>
  <EFFECTIVEDATE>{$effectivedate}</EFFECTIVEDATE>
   <ALLLEDGERENTRIES.LIST>
   <LEDGERNAME>{$ledgername2}</LEDGERNAME>
   <VOUCHERFBTCATEGORY/>
   <GSTCLASS/>
   <ISDEEMEDPOSITIVE>No</ISDEEMEDPOSITIVE>
   <LEDGERFROMITEM>No</LEDGERFROMITEM>
   <ISPARTYLEDGER>No</ISPARTYLEDGER>
   <ISLASTDEEMEDPOSITIVE>No</ISLASTDEEMEDPOSITIVE>
   <AMOUNT>{$amtt}</AMOUNT>
   
  </ALLLEDGERENTRIES.LIST>
  <ALLLEDGERENTRIES.LIST>
   <LEDGERNAME>{$ledgername}</LEDGERNAME>
   <GSTCLASS/>
   <ISDEEMEDPOSITIVE>Yes</ISDEEMEDPOSITIVE>
   <LEDGERFROMITEM>No</LEDGERFROMITEM>
   <ISPARTYLEDGER>No</ISPARTYLEDGER>
   <ISLASTDEEMEDPOSITIVE>Yes</ISLASTDEEMEDPOSITIVE>
   <AMOUNT>-{$amount}</AMOUNT>
   <SERVICETAXDETAILS.LIST>       </SERVICETAXDETAILS.LIST>
   <CATEGORYALLOCATIONS.LIST>       </CATEGORYALLOCATIONS.LIST>
   <BANKALLOCATIONS.LIST>
    <DATE>{$date2}</DATE>
    <INSTRUMENTDATE>{$Idate2}</INSTRUMENTDATE>
    <NAME>dadd2b23-ed51-47cf-a3a8-b5c29b6061c8</NAME>
    <TRANSACTIONTYPE></TRANSACTIONTYPE>
    <PAYMENTFAVOURING></PAYMENTFAVOURING>
    <TRANSACTIONNAME/>
    <UNIQUEREFERENCENUMBER>3NaCH7BHvhd0vbES</UNIQUEREFERENCENUMBER>
    <STATUS>No</STATUS>
    <PAYMENTMODE>{$paymode}</PAYMENTMODE>
    <BANKPARTYNAME>{$ledgername}</BANKPARTYNAME>
    <CHEQUEPRINTED> 1</CHEQUEPRINTED>
    <AMOUNT>-{$amount}</AMOUNT>
    <CONTRACTDETAILS.LIST>        </CONTRACTDETAILS.LIST>
   </BANKALLOCATIONS.LIST>
  </ALLLEDGERENTRIES.LIST>
  " . $taxxml1 . $taxxml2 . $taxxml3 . $taxxml4 . "
 
  <VCHLEDTOTALTREE.LIST>      </VCHLEDTOTALTREE.LIST>
  <PAYROLLMODEOFPAYMENT.LIST>      </PAYROLLMODEOFPAYMENT.LIST>
  <ATTDRECORDS.LIST>      </ATTDRECORDS.LIST>
  </VOUCHER>
  </TALLYMESSAGE>
  </REQUESTDATA>
  </IMPORTDATA>
  </BODY>
  </ENVELOPE>
";
		}


		//$url = "192.168.1.11:9000";
//var_dump($res_str);
//setting the curl parameters.
//echo '<pre>', htmlentities($res_str), '</pre>';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->url);
// Following line is compulsary to add as it is:
		curl_setopt($ch, CURLOPT_POSTFIELDS, "xmlRequest=" . $res_str);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);
		$data = curl_exec($ch);
		$xml = simplexml_load_string($data);
		$json = json_encode($xml);
		$array = json_decode($json, TRUE);
		//var_dump($array);
		if ($array['CREATED'] == 1) {
			$response['status'] = 200;
		} else {
			if (!array_key_exists('LINEERROR', $array)) {
				$response['error'] = "please try again later";
			} else {
				$response['error'] = $array['LINEERROR'];
			}
			$response['status'] = 201;
		}
		curl_close($ch);
		echo json_encode($response);
//}
	}

	function gettaxledger($name, $amt)
	{

		$xml = '<ALLLEDGERENTRIES.LIST>
       <OLDAUDITENTRYIDS.LIST TYPE="Number">
        <OLDAUDITENTRYIDS>-1</OLDAUDITENTRYIDS>
       </OLDAUDITENTRYIDS.LIST>
       <LEDGERNAME>' . $name . '</LEDGERNAME>
       <GSTCLASS/>
       <ISDEEMEDPOSITIVE>Yes</ISDEEMEDPOSITIVE>
       <LEDGERFROMITEM>No</LEDGERFROMITEM>
       <REMOVEZEROENTRIES>No</REMOVEZEROENTRIES>
       <ISPARTYLEDGER>No</ISPARTYLEDGER>
       <ISLASTDEEMEDPOSITIVE>Yes</ISLASTDEEMEDPOSITIVE>
       <ISCAPVATTAXALTERED>No</ISCAPVATTAXALTERED>
       <ISCAPVATNOTCLAIMED>No</ISCAPVATNOTCLAIMED>
       <AMOUNT>-' . $amt . '</AMOUNT>
       <VATEXPAMOUNT>-' . $amt . '</VATEXPAMOUNT>
      </ALLLEDGERENTRIES.LIST>';
		return $xml;
	}

	function gettaxledgersales($name, $amt)
	{

		$xml = '
	  
	  <ALLLEDGERENTRIES.LIST>
       <LEDGERNAME>' . $name . '</LEDGERNAME>
       <AMOUNT>' . $amt . '</AMOUNT>
       <VATEXPAMOUNT>' . $amt . '</VATEXPAMOUNT>
      </ALLLEDGERENTRIES.LIST>
	  ';
		return $xml;
	}

	public function add_voucher_sales()
	{
		$company_id = $this->input->post('company_name');
		$narration = $this->input->post('narration');
		$vouchername = $this->input->post('vouchername');
		$effectivedate = $this->input->post('effectivedate');
		$vouchernum = $this->input->post('vouchernum');
		$ledgername = $this->input->post('ledgername');
		$amount = $this->input->post('amount');
		$date2 = $this->input->post('date2');
		$Idate2 = $this->input->post('Idate2');
		$paymode = $this->input->post('paymode');
		$ledgername2 = $this->input->post('ledgername2');
		$tax_led1 = $this->input->post('tax_led1');
		$tax_led2 = $this->input->post('tax_led2');
		$tax_led3 = $this->input->post('tax_led3');
		$tax_led4 = $this->input->post('tax_led4');
		$taxamt1 = $this->input->post('taxamt1');
		$taxamt2 = $this->input->post('taxamt2');
		$taxamt3 = $this->input->post('taxamt3');
		$taxamt4 = $this->input->post('taxamt4');
		$taxxml1 = "";
		$taxxml2 = "";
		$taxxml3 = "";
		$taxxml4 = "";
		if (isset($tax_led1) && isset($taxamt1)) {
			$taxxml1 = $this->gettaxledgersales($tax_led1, $taxamt1);
		}
		if (isset($tax_led2) && isset($taxamt2)) {
			$taxxml2 = $this->gettaxledgersales($tax_led2, $taxamt2);
		}
		if (isset($tax_led3) && isset($taxamt3)) {
			$taxxml3 = $this->gettaxledgersales($tax_led3, $taxamt3);
		}
		if (isset($tax_led4) && isset($taxamt4)) {
			$taxxml4 = $this->gettaxledgersales($tax_led4, $taxamt4);
		}
		$amtt = $amount + $taxamt1 + $taxamt2 + $taxamt3 + $taxamt4;

		$res_str = '<ENVELOPE>
<HEADER>
<TALLYREQUEST>Import Data</TALLYREQUEST>
</HEADER>
<BODY>
<IMPORTDATA>
<REQUESTDESC>
<REPORTNAME>All Masters</REPORTNAME>
</REQUESTDESC>
<REQUESTDATA>
<!-- Create Stock Item named "My Item1" -->


<!-- Create Sales Voucher -->
<TALLYMESSAGE xmlns:UDF="TallyUDF">
<VOUCHER  VCHTYPE="Sales" ACTION="Create">
<ISOPTIONAL>No</ISOPTIONAL>
<USEFORGAINLOSS>No</USEFORGAINLOSS>
<USEFORCOMPOUND>No</USEFORCOMPOUND>
<VOUCHERTYPENAME>Sales</VOUCHERTYPENAME>
<DATE>20210301</DATE>
<EFFECTIVEDATE>20210301</EFFECTIVEDATE>
<ISCANCELLED>No</ISCANCELLED>
<USETRACKINGNUMBER>No</USETRACKINGNUMBER>
<ISPOSTDATED>No</ISPOSTDATED>
<ISINVOICE>Yes</ISINVOICE>
<DIFFACTUALQTY>No</DIFFACTUALQTY>
<ASPAYSLIP>No</ASPAYSLIP>
<GUID>6593251k-803u-731g-953p-597825398422-I0000001</GUID>
<REFERENCE>S100</REFERENCE>
<PARTYLEDGERNAME>CASH</PARTYLEDGERNAME>
<NARRATION/>
<LEDGERENTRIES.LIST>
<REMOVEZEROENTRIES>No</REMOVEZEROENTRIES>
<ISDEEMEDPOSITIVE>Yes</ISDEEMEDPOSITIVE>
<LEDGERFROMITEM>No</LEDGERFROMITEM>
<LEDGERNAME>CASH</LEDGERNAME>
<AMOUNT>-200.00</AMOUNT>
</LEDGERENTRIES.LIST>
<ALLINVENTORYENTRIES.LIST>
<ISDEEMEDPOSITIVE>No</ISDEEMEDPOSITIVE>
<STOCKITEMNAME>MY ITEM1</STOCKITEMNAME>
<AMOUNT>96.150</AMOUNT>
<ACTUALQTY>1.000</ACTUALQTY>
<BILLEDQTY>1.000</BILLEDQTY>
<RATE>96.150</RATE>
<ACCOUNTINGALLOCATIONS.LIST>
<REMOVEZEROENTRIES>No</REMOVEZEROENTRIES>
<ISDEEMEDPOSITIVE>No</ISDEEMEDPOSITIVE>
<LEDGERFROMITEM>No</LEDGERFROMITEM>
<TAXCLASSIFICATIONNAME/>
<LEDGERNAME>SALE OF SPARES @4%</LEDGERNAME>
<AMOUNT>96.150</AMOUNT>
</ACCOUNTINGALLOCATIONS.LIST>
<BATCHALLOCATIONS.LIST>
<TRACKINGNUMBER/>
<BATCHNAME>Primary Batch</BATCHNAME>
<GODOWNNAME>Main Location</GODOWNNAME>
<MFDON>20070401</MFDON>
<EXPIRYPERIOD/>
<AMOUNT>96.150</AMOUNT>
<ACTUALQTY>1.000</ACTUALQTY>
<BILLEDQTY>1.000</BILLEDQTY>
<ORDERNO/>
</BATCHALLOCATIONS.LIST>
</ALLINVENTORYENTRIES.LIST>
<ALLINVENTORYENTRIES.LIST>
<ISDEEMEDPOSITIVE>No</ISDEEMEDPOSITIVE>
<STOCKITEMNAME>MY ITEM2</STOCKITEMNAME>
<AMOUNT>96.150</AMOUNT>
<ACTUALQTY>1.000</ACTUALQTY>
<BILLEDQTY>1.000</BILLEDQTY>
<RATE>96.154</RATE>
<ACCOUNTINGALLOCATIONS.LIST>
<REMOVEZEROENTRIES>No</REMOVEZEROENTRIES>
<ISDEEMEDPOSITIVE>No</ISDEEMEDPOSITIVE>
<LEDGERFROMITEM>No</LEDGERFROMITEM>
<TAXCLASSIFICATIONNAME/>
<LEDGERNAME>SALE OF SPARES @4%</LEDGERNAME>
<AMOUNT>96.150</AMOUNT>
</ACCOUNTINGALLOCATIONS.LIST>
<BATCHALLOCATIONS.LIST>
<TRACKINGNUMBER/>
<BATCHNAME>Primary Batch</BATCHNAME>
<GODOWNNAME>Main Location</GODOWNNAME>
<MFDON>20070401</MFDON>
<EXPIRYPERIOD/>
<AMOUNT>96.150</AMOUNT>
<ACTUALQTY>1.000</ACTUALQTY>
<BILLEDQTY>1.000</BILLEDQTY>
<ORDERNO/>
</BATCHALLOCATIONS.LIST>
</ALLINVENTORYENTRIES.LIST>
<LEDGERENTRIES.LIST>
<REMOVEZEROENTRIES>No</REMOVEZEROENTRIES>
<ISDEEMEDPOSITIVE>No</ISDEEMEDPOSITIVE>
<LEDGERFROMITEM>No</LEDGERFROMITEM>
<LEDGERNAME>VAT OUTPUT 4%</LEDGERNAME>

<UDF:RATEOFINVOICETAX.LIST DESC="RATEOFINVOICETAX" ISLIST="YES">
<UDF:RATEOFINVOICETAX DESC="`RATEOFINVOICETAX`">4.000</UDF:RATEOFINVOICETAX>
</UDF:RATEOFINVOICETAX.LIST>
<AMOUNT>7.7</AMOUNT>
<VATASSESSABLEVALUE>192.3</VATASSESSABLEVALUE>
</LEDGERENTRIES.LIST>
<INVOICEDELNOTES.LIST/>
</VOUCHER>
</TALLYMESSAGE>
</REQUESTDATA>
</IMPORTDATA>
</BODY>
</ENVELOPE>

';

		//$url = "192.168.1.11:9000";
//var_dump($res_str);
//setting the curl parameters.
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->url);
// Following line is compulsary to add as it is:
		curl_setopt($ch, CURLOPT_POSTFIELDS, "xmlRequest=" . $res_str);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);
		$data = curl_exec($ch);
		$xml = simplexml_load_string($data);
		$json = json_encode($xml);
		$array = json_decode($json, TRUE);
		//var_dump($array);
		if ($array['CREATED'] == 1) {
			$response['status'] = 200;
		} else {
			if (!array_key_exists('LINEERROR', $array)) {
				$response['error'] = "please try again later";
			} else {
				$response['error'] = $array['LINEERROR'];
			}
			$response['status'] = 201;
		}
		curl_close($ch);
		echo json_encode($response);
//}
	}

	function add_sale_purchase_data()
	{
		$company_id = $this->input->post('company_name');
		$party_ledger = $this->input->post('party_ledger');
		$date = $this->input->post('date');
		$invoiceno = $this->input->post('invoiceno');
		$amount = $this->input->post('amount');
		$narration = $this->input->post('narration');
		$div_count = ($this->input->post('div_count1')) + 1;
		$get_all_xml = "";
		$get_tax_xml = "";
		$get_tax_xml1 = "";

		// var_dump($party_ledger);
		//$party_ledger = "Cash";
		//echo $get_all_xml;
		$type = 'sales';
		if ($type == 'sales') {
			for ($i = 0; $i < $div_count; $i++) {
				$ledger = $this->input->post('ledger' . $i);
				//array of all items details
				$item_name = $this->input->post('item_name' . $i);
				$quantity = $this->input->post('quantity' . $i);
				$rate = $this->input->post('rate' . $i);
				$amt = $this->input->post('amt' . $i);
				$allamt = array_sum($amt);
				$get_item_xml = "";
				for ($m = 0; $m < count($item_name); $m++) {
					if ($item_name[$m] == "" && $amt[$m] != "") {
						$get_tax_xml .= $this->get_only_led($ledger, $amt[$m], $amount);
						//echo $get_tax_xml .=$this->get_tax_xml($ledger,"",$amt[$m],"");
					} else {
						$get_item_xml .= $this->get_item_xml($item_name[$m], $quantity[$m], $rate[$m], $amt[$m], $ledger);
					}
					//$get_item_xml .=$this->get_item_xml($item_name[$m],$quantity[$m],$rate[$m],$amt[$m],$ledger);

				}
				//taxasation details
				$taxname = $this->input->post('taxname' . $i);
				$taxper = $this->input->post('taxper' . $i);
				$taxamt = $this->input->post('taxamt' . $i);

				for ($n = 0; $n < count($taxname); $n++) {
					if ($taxname[$n] == "") {

					} else {
						$get_tax_xml .= $this->get_tax_xml($taxname[$n], $taxper[$n], $taxamt[$n], $amount);
					}

				}
				$get_all_xml .= $get_item_xml . $get_tax_xml;


			}
			$res_str = '<ENVELOPE>
<HEADER>
<TALLYREQUEST>Import Data</TALLYREQUEST>
</HEADER>
<BODY>
<IMPORTDATA>
<REQUESTDESC>
<REPORTNAME>All Masters</REPORTNAME>
<STATICVARIABLES>
<SVCURRENTCOMPANY>{' . $company_id . '}</SVCURRENTCOMPANY>
</STATICVARIABLES>
</REQUESTDESC>

<REQUESTDATA>
<TALLYMESSAGE xmlns:UDF="TallyUDF">
<VOUCHER  VCHTYPE="Sales" ACTION="Create">
<ISOPTIONAL>No</ISOPTIONAL>
<USEFORGAINLOSS>No</USEFORGAINLOSS>
<USEFORCOMPOUND>No</USEFORCOMPOUND>
<VOUCHERTYPENAME>Sales</VOUCHERTYPENAME>
<DATE>' . $date . '</DATE>
<EFFECTIVEDATE>' . $date . '</EFFECTIVEDATE>
<ISCANCELLED>No</ISCANCELLED>
<USETRACKINGNUMBER>No</USETRACKINGNUMBER>
<ISPOSTDATED>No</ISPOSTDATED>
<ISINVOICE>Yes</ISINVOICE>
<DIFFACTUALQTY>No</DIFFACTUALQTY>
<ASPAYSLIP>No</ASPAYSLIP>
<REFERENCE>' . $invoiceno . '</REFERENCE>
<VOUCHERNUMBER>' . $this->voucher_number() . '</VOUCHERNUMBER>
<PARTYLEDGERNAME>' . $party_ledger . '</PARTYLEDGERNAME>
<NARRATION/>
<LEDGERENTRIES.LIST>
<REMOVEZEROENTRIES>No</REMOVEZEROENTRIES>
<ISDEEMEDPOSITIVE>Yes</ISDEEMEDPOSITIVE>
<LEDGERFROMITEM>No</LEDGERFROMITEM>
<LEDGERNAME>' . $party_ledger . '</LEDGERNAME>
<AMOUNT>-' . $amount . '</AMOUNT>
</LEDGERENTRIES.LIST>
' . $get_all_xml . '

<INVOICEDELNOTES.LIST/>
</VOUCHER>
</TALLYMESSAGE>
</REQUESTDATA>
</IMPORTDATA>
</BODY>
</ENVELOPE>';
		} else {
			for ($i = 0; $i < $div_count; $i++) {
				$ledger = $this->input->post('ledger' . $i);
				//array of all items details
				$item_name = $this->input->post('item_name' . $i);
				$quantity = $this->input->post('quantity' . $i);
				$rate = $this->input->post('rate' . $i);
				$amt = $this->input->post('amt' . $i);
				$allamt = array_sum($amt);
				$get_item_xml = "";
				for ($m = 0; $m < count($item_name); $m++) {
					if ($item_name[$m] == "" && $amt[$m] != "") {
						//$get_tax_xml .=$this->get_only_led($ledger,$amt[$m]);
						$get_tax_xml .= $this->get_only_led($ledger, "", $amt[$m], "");
					} else {
						$get_item_xml .= $this->get_item_xml1($item_name[$m], $quantity[$m], $rate[$m], $amt[$m], $ledger);
					}
					//$get_item_xml .=$this->get_item_xml($item_name[$m],$quantity[$m],$rate[$m],$amt[$m],$ledger);

				}
				//taxasation details
				$taxname = $this->input->post('taxname' . $i);
				$taxper = $this->input->post('taxper' . $i);
				$taxamt = $this->input->post('taxamt' . $i);

				for ($n = 0; $n < count($taxname); $n++) {
					if ($taxname[$n] == "") {

					} else {
						$get_tax_xml .= $this->get_tax_xml1($taxname[$n], $taxper[$n], $taxamt[$n], $amount);
					}

				}
				$get_all_xml .= $get_item_xml . $get_tax_xml;


			}
			$res_str = '<ENVELOPE>
<HEADER>
<TALLYREQUEST>Import Data</TALLYREQUEST>
</HEADER>
<BODY>
<IMPORTDATA>
<REQUESTDESC>
<REPORTNAME>All Masters</REPORTNAME>
<STATICVARIABLES>
<SVCURRENTCOMPANY>{' . $company_id . '}</SVCURRENTCOMPANY>
</STATICVARIABLES>
</REQUESTDESC>

<REQUESTDATA>
<TALLYMESSAGE xmlns:UDF="TallyUDF">
<VOUCHER  VCHTYPE="Purchase" ACTION="Create">
<ISOPTIONAL>No</ISOPTIONAL>
<USEFORGAINLOSS>No</USEFORGAINLOSS>
<USEFORCOMPOUND>No</USEFORCOMPOUND>
<VOUCHERTYPENAME>Purchase</VOUCHERTYPENAME>
<DATE>' . $date . '</DATE>
<EFFECTIVEDATE>' . $date . '</EFFECTIVEDATE>
<ISCANCELLED>No</ISCANCELLED>
<USETRACKINGNUMBER>No</USETRACKINGNUMBER>
<ISPOSTDATED>No</ISPOSTDATED>
<ISINVOICE>Yes</ISINVOICE>
<DIFFACTUALQTY>No</DIFFACTUALQTY>
<ASPAYSLIP>No</ASPAYSLIP>
<REFERENCE>' . $invoiceno . '</REFERENCE>
<VOUCHERNUMBER>' . $this->voucher_number() . '</VOUCHERNUMBER>
<PARTYLEDGERNAME>' . $party_ledger . '</PARTYLEDGERNAME>
<NARRATION/>
<LEDGERENTRIES.LIST>
<REMOVEZEROENTRIES>No</REMOVEZEROENTRIES>
<ISDEEMEDPOSITIVE>Yes</ISDEEMEDPOSITIVE>
<LEDGERFROMITEM>No</LEDGERFROMITEM>
<LEDGERNAME>' . $party_ledger . '</LEDGERNAME>
<AMOUNT>' . $amount . '</AMOUNT>
</LEDGERENTRIES.LIST>
' . $get_all_xml . '

<INVOICEDELNOTES.LIST/>
</VOUCHER>
</TALLYMESSAGE>
</REQUESTDATA>
</IMPORTDATA>
</BODY>
</ENVELOPE>';
		}

		//echo $res_str;

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->url);
// Following line is compulsary to add as it is:
		curl_setopt($ch, CURLOPT_POSTFIELDS, "xmlRequest=" . $res_str);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);
		$data = curl_exec($ch);
		$xml = simplexml_load_string($data);
		$json = json_encode($xml);
		$array = json_decode($json, TRUE);
		//var_dump($array);
		if ($array['CREATED'] == 1) {
			$response['status'] = 200;
		} else {
			if (!array_key_exists('LINEERROR', $array)) {
				$response['error'] = "please try again later";
			} else {
				$response['error'] = $array['LINEERROR'];
			}
			$response['status'] = 201;
		}
		curl_close($ch);
		echo json_encode($response);
	}


	function get_only_led($ledger, $amt, $allamt)
	{

		$xml = '<ALLLEDGERENTRIES.LIST>
   <LEDGERNAME>' . $ledger . '</LEDGERNAME>
   <GSTCLASS/>
   <ISDEEMEDPOSITIVE>Yes</ISDEEMEDPOSITIVE>
   <LEDGERFROMITEM>No</LEDGERFROMITEM>
   <ISPARTYLEDGER>No</ISPARTYLEDGER>
   <ISLASTDEEMEDPOSITIVE>Yes</ISLASTDEEMEDPOSITIVE>
   <AMOUNT>' . $amt . '</AMOUNT>
   <SERVICETAXDETAILS.LIST>       </SERVICETAXDETAILS.LIST>
   <CATEGORYALLOCATIONS.LIST>       </CATEGORYALLOCATIONS.LIST>
  
  </ALLLEDGERENTRIES.LIST>';
		return $xml;
	}

	function get_tax_xml($taxname, $taxper, $taxamt, $allamt)
	{
		$xml = '<LEDGERENTRIES.LIST>
<REMOVEZEROENTRIES>No</REMOVEZEROENTRIES>
<ISDEEMEDPOSITIVE>No</ISDEEMEDPOSITIVE>
<LEDGERFROMITEM>No</LEDGERFROMITEM>
<LEDGERNAME>' . $taxname . '</LEDGERNAME>
<UDF:RATEOFINVOICETAX.LIST DESC="RATEOFINVOICETAX" ISLIST="YES">
<UDF:RATEOFINVOICETAX DESC="`RATEOFINVOICETAX`">' . $taxper . '</UDF:RATEOFINVOICETAX>
</UDF:RATEOFINVOICETAX.LIST>
<AMOUNT>' . $taxamt . '</AMOUNT>
<VATASSESSABLEVALUE>' . $allamt . '</VATASSESSABLEVALUE>
</LEDGERENTRIES.LIST>';
		return $xml;
	}

	function get_tax_xml1($taxname, $taxper, $taxamt, $allamt)
	{
		$xml = '<LEDGERENTRIES.LIST>
<REMOVEZEROENTRIES>No</REMOVEZEROENTRIES>
<ISDEEMEDPOSITIVE>No</ISDEEMEDPOSITIVE>
<LEDGERFROMITEM>No</LEDGERFROMITEM>
<LEDGERNAME>' . $taxname . '</LEDGERNAME>
<UDF:RATEOFINVOICETAX.LIST DESC="RATEOFINVOICETAX" ISLIST="YES">
<UDF:RATEOFINVOICETAX DESC="`RATEOFINVOICETAX`">' . $taxper . '</UDF:RATEOFINVOICETAX>
</UDF:RATEOFINVOICETAX.LIST>
<AMOUNT>-' . $taxamt . '</AMOUNT>
<VATASSESSABLEVALUE>' . $allamt . '</VATASSESSABLEVALUE>
</LEDGERENTRIES.LIST>';
//echo $xml;
		return $xml;
	}

	function get_item_xml($item_name, $quantity, $rate, $amt, $ledger)
	{

		$xml = '<ALLINVENTORYENTRIES.LIST>
<ISDEEMEDPOSITIVE>No</ISDEEMEDPOSITIVE>
<STOCKITEMNAME>' . $item_name . '</STOCKITEMNAME>
<AMOUNT>' . $amt . '</AMOUNT>
<ACTUALQTY>' . $quantity . '</ACTUALQTY>
<BILLEDQTY>' . $quantity . '</BILLEDQTY>
<RATE>' . $rate . '</RATE>
<ACCOUNTINGALLOCATIONS.LIST>
<REMOVEZEROENTRIES>No</REMOVEZEROENTRIES>
<ISDEEMEDPOSITIVE>No</ISDEEMEDPOSITIVE>
<LEDGERFROMITEM>No</LEDGERFROMITEM>
<TAXCLASSIFICATIONNAME/>
<LEDGERNAME>' . $ledger . '</LEDGERNAME>
<AMOUNT>' . $amt . '</AMOUNT>
</ACCOUNTINGALLOCATIONS.LIST>
<BATCHALLOCATIONS.LIST>
<TRACKINGNUMBER/>
<BATCHNAME>Primary Batch</BATCHNAME>
<GODOWNNAME>Main Location</GODOWNNAME>
<EXPIRYPERIOD/>
<AMOUNT>' . $amt . '</AMOUNT>
<ACTUALQTY>' . $quantity . '</ACTUALQTY>
<BILLEDQTY>' . $quantity . '</BILLEDQTY>
<ORDERNO/>
</BATCHALLOCATIONS.LIST>
</ALLINVENTORYENTRIES.LIST>';
		return $xml;
	}

	function get_item_xml1($item_name, $quantity, $rate, $amt, $ledger)
	{

		$xml = '<ALLINVENTORYENTRIES.LIST>
<ISDEEMEDPOSITIVE>No</ISDEEMEDPOSITIVE>
<STOCKITEMNAME>' . $item_name . '</STOCKITEMNAME>
<AMOUNT>-' . $amt . '</AMOUNT>
<ACTUALQTY>' . $quantity . '</ACTUALQTY>
<BILLEDQTY>' . $quantity . '</BILLEDQTY>
<RATE>' . $rate . '</RATE>
<ACCOUNTINGALLOCATIONS.LIST>
<REMOVEZEROENTRIES>No</REMOVEZEROENTRIES>
<ISDEEMEDPOSITIVE>No</ISDEEMEDPOSITIVE>
<LEDGERFROMITEM>No</LEDGERFROMITEM>
<TAXCLASSIFICATIONNAME/>
<LEDGERNAME>' . $ledger . '</LEDGERNAME>
<AMOUNT>-' . $amt . '</AMOUNT>
</ACCOUNTINGALLOCATIONS.LIST>
<BATCHALLOCATIONS.LIST>
<TRACKINGNUMBER/>
<BATCHNAME>Primary Batch</BATCHNAME>
<GODOWNNAME>Main Location</GODOWNNAME>
<EXPIRYPERIOD/>
<AMOUNT>-' . $amt . '</AMOUNT>
<ACTUALQTY>' . $quantity . '</ACTUALQTY>
<BILLEDQTY>' . $quantity . '</BILLEDQTY>
<ORDERNO/>
</BATCHALLOCATIONS.LIST>
</ALLINVENTORYENTRIES.LIST>';
		return $xml;
	}

	function getXmlForSale()
	{
		$xml = '<ENVELOPE>
 <HEADER>
  <TALLYREQUEST>Import Data</TALLYREQUEST>
 </HEADER>
 <BODY>
  <IMPORTDATA>
   <REQUESTDESC>
    <REPORTNAME>Vouchers</REPORTNAME>
    <STATICVARIABLES>
     <SVCURRENTCOMPANY>' . $company_id . '</SVCURRENTCOMPANY>
    </STATICVARIABLES>
   </REQUESTDESC>
   <REQUESTDATA>
    <TALLYMESSAGE xmlns:UDF="TallyUDF">
     <VOUCHER  VCHTYPE="Sales" ACTION="Create" OBJVIEW="Accounting Voucher View">
      <OLDAUDITENTRYIDS.LIST TYPE="Number">
       <OLDAUDITENTRYIDS>-1</OLDAUDITENTRYIDS>
      </OLDAUDITENTRYIDS.LIST>
      <DATE>' . $date . '</DATE>
	  <NARRATION>{' . $narration . '}</NARRATION>
      <PARTYLEDGERNAME>' . $party_ledger . '</PARTYLEDGERNAME>
      <VOUCHERTYPENAME>Sales</VOUCHERTYPENAME>
      <REFERENCE>22</REFERENCE>
      <VOUCHERNUMBER>' . $vc_num = $this->voucher_number() . '</VOUCHERNUMBER>
      <CSTFORMISSUETYPE/>
      <CSTFORMRECVTYPE/>
      <VCHGSTCLASS/>
      <VOUCHERTYPEORIGNAME>Sales</VOUCHERTYPEORIGNAME>
      <EFFECTIVEDATE>' . $date . '</EFFECTIVEDATE>
      <ALLLEDGERENTRIES.LIST>
       <OLDAUDITENTRYIDS.LIST TYPE="Number">
        <OLDAUDITENTRYIDS>-1</OLDAUDITENTRYIDS>
       </OLDAUDITENTRYIDS.LIST>
	   <ISPARTYLEDGER>Yes</ISPARTYLEDGER>
       <LEDGERNAME>' . $party_ledger . '</LEDGERNAME>
       <GSTCLASS/>
	   <ISDEEMEDPOSITIVE>Yes</ISDEEMEDPOSITIVE>
       <LEDGERFROMITEM>No</LEDGERFROMITEM>
       <REMOVEZEROENTRIES>No</REMOVEZEROENTRIES>
       <ISPARTYLEDGER>Yes</ISPARTYLEDGER>
       <ISLASTDEEMEDPOSITIVE>Yes</ISLASTDEEMEDPOSITIVE>
       <ISCAPVATTAXALTERED>No</ISCAPVATTAXALTERED>
       <ISCAPVATNOTCLAIMED>No</ISCAPVATNOTCLAIMED>
       <AMOUNT>-' . $amount . '</AMOUNT>
      </ALLLEDGERENTRIES.LIST>
		' . $get_all_xml . '
      
      <PAYROLLMODEOFPAYMENT.LIST>      </PAYROLLMODEOFPAYMENT.LIST>
      <ATTDRECORDS.LIST>      </ATTDRECORDS.LIST>
     </VOUCHER>
    </TALLYMESSAGE>
    
   </REQUESTDATA>
  </IMPORTDATA>
 </BODY>
</ENVELOPE>

';
		return $xml;
	}

	function getXmlForSaleItemN($company_id, $date, $narration, $party_ledger, $amount, $get_all_xml, $vc_num)
	{

		$xml = '<ENVELOPE>
 <HEADER>
  <TALLYREQUEST>Import Data</TALLYREQUEST>
 </HEADER>
 <BODY>
  <IMPORTDATA>
   <REQUESTDESC>
    <REPORTNAME>Vouchers</REPORTNAME>
    <STATICVARIABLES>
     <SVCURRENTCOMPANY>' . $company_id . '</SVCURRENTCOMPANY>
    </STATICVARIABLES>
   </REQUESTDESC>
   <REQUESTDATA>
    <TALLYMESSAGE xmlns:UDF="TallyUDF">
     <VOUCHER  VCHTYPE="Sales" ACTION="Create" OBJVIEW="Accounting Voucher View">
      <OLDAUDITENTRYIDS.LIST TYPE="Number">
       <OLDAUDITENTRYIDS>-1</OLDAUDITENTRYIDS>
      </OLDAUDITENTRYIDS.LIST>
      <DATE>' . $date . '</DATE>
	  <NARRATION>{' . $narration . '}</NARRATION>
      <PARTYLEDGERNAME>' . $party_ledger . '</PARTYLEDGERNAME>
      <VOUCHERTYPENAME>Sales</VOUCHERTYPENAME>
      <REFERENCE>22</REFERENCE>
      <VOUCHERNUMBER>' . $vc_num . '</VOUCHERNUMBER>
      <CSTFORMISSUETYPE/>
      <CSTFORMRECVTYPE/>
      <VCHGSTCLASS/>
      <VOUCHERTYPEORIGNAME>Sales</VOUCHERTYPEORIGNAME>
      <EFFECTIVEDATE>' . $date . '</EFFECTIVEDATE>
      <ALLLEDGERENTRIES.LIST>
       <OLDAUDITENTRYIDS.LIST TYPE="Number">
        <OLDAUDITENTRYIDS>-1</OLDAUDITENTRYIDS>
       </OLDAUDITENTRYIDS.LIST>
	   <ISPARTYLEDGER>Yes</ISPARTYLEDGER>
       <LEDGERNAME>' . $party_ledger . '</LEDGERNAME>
       <GSTCLASS/>
	   <ISDEEMEDPOSITIVE>Yes</ISDEEMEDPOSITIVE>
       <LEDGERFROMITEM>No</LEDGERFROMITEM>
       <REMOVEZEROENTRIES>No</REMOVEZEROENTRIES>
       <ISPARTYLEDGER>Yes</ISPARTYLEDGER>
       <ISLASTDEEMEDPOSITIVE>Yes</ISLASTDEEMEDPOSITIVE>
       <ISCAPVATTAXALTERED>No</ISCAPVATTAXALTERED>
       <ISCAPVATNOTCLAIMED>No</ISCAPVATNOTCLAIMED>
       <AMOUNT>-' . $amount . '</AMOUNT>
      </ALLLEDGERENTRIES.LIST>
		' . $get_all_xml . '
      
      <PAYROLLMODEOFPAYMENT.LIST>      </PAYROLLMODEOFPAYMENT.LIST>
      <ATTDRECORDS.LIST>      </ATTDRECORDS.LIST>
     </VOUCHER>
    </TALLYMESSAGE>
    
   </REQUESTDATA>
  </IMPORTDATA>
 </BODY>
</ENVELOPE>

';
		return $xml;
	}

	function getXmlForSaleAcc($company_id, $date, $narration, $party_ledger, $amount, $get_all_xml, $vc_num)
	{

		$xml = '<ENVELOPE>
 <HEADER>
  <TALLYREQUEST>Import Data</TALLYREQUEST>
 </HEADER>
 <BODY>
  <IMPORTDATA>

   <REQUESTDESC>
    <REPORTNAME>Vouchers</REPORTNAME>
    <STATICVARIABLES>
     <SVCURRENTCOMPANY>' . $company_id . '</SVCURRENTCOMPANY>
    </STATICVARIABLES>
   </REQUESTDESC>
   <REQUESTDATA>
    <TALLYMESSAGE xmlns:UDF="TallyUDF">
     <VOUCHER  VCHTYPE="Sales" ACTION="Create" OBJVIEW="Accounting Voucher View">
      <OLDAUDITENTRYIDS.LIST TYPE="Number">
       <OLDAUDITENTRYIDS>-1</OLDAUDITENTRYIDS>
      </OLDAUDITENTRYIDS.LIST>
      <DATE>' . $date . '</DATE>
	  <NARRATION>{' . $narration . '}</NARRATION>
      <PARTYLEDGERNAME>' . $party_ledger . '</PARTYLEDGERNAME>
      <VOUCHERTYPENAME>Sales</VOUCHERTYPENAME>
      <REFERENCE>22</REFERENCE>
      <VOUCHERNUMBER>' . $vc_num . '</VOUCHERNUMBER>
      <CSTFORMISSUETYPE/>
      <CSTFORMRECVTYPE/>
      <VCHGSTCLASS/>
      <VOUCHERTYPEORIGNAME>Sales</VOUCHERTYPEORIGNAME>
      <EFFECTIVEDATE>' . $date . '</EFFECTIVEDATE>
      <LEDGERENTRIES.LIST>
       <OLDAUDITENTRYIDS.LIST TYPE="Number">
        <OLDAUDITENTRYIDS>-1</OLDAUDITENTRYIDS>
       </OLDAUDITENTRYIDS.LIST>
	   <ISPARTYLEDGER>Yes</ISPARTYLEDGER>
       <LEDGERNAME>' . $party_ledger . '</LEDGERNAME>
       <GSTCLASS/>
	   <ISDEEMEDPOSITIVE>Yes</ISDEEMEDPOSITIVE>
       <LEDGERFROMITEM>No</LEDGERFROMITEM>
       <REMOVEZEROENTRIES>No</REMOVEZEROENTRIES>
       <ISPARTYLEDGER>Yes</ISPARTYLEDGER>
       <ISLASTDEEMEDPOSITIVE>Yes</ISLASTDEEMEDPOSITIVE>
       <ISCAPVATTAXALTERED>No</ISCAPVATTAXALTERED>
       <ISCAPVATNOTCLAIMED>No</ISCAPVATNOTCLAIMED>
       <AMOUNT>-' . $amount . '</AMOUNT>
      </LEDGERENTRIES.LIST>
		' . $get_all_xml . '
      
      <PAYROLLMODEOFPAYMENT.LIST>      </PAYROLLMODEOFPAYMENT.LIST>
      <ATTDRECORDS.LIST>      </ATTDRECORDS.LIST>
     </VOUCHER>
    </TALLYMESSAGE>
    
   </REQUESTDATA>
  </IMPORTDATA>
 </BODY>
</ENVELOPE>

';
		return $xml;
	}

	function getXmlForSaleExp($company_id, $date, $narration, $party_ledger, $amount, $get_all_xml, $vc_num)
	{
		$xml = '<ENVELOPE>
 <HEADER>
  <TALLYREQUEST>Import Data</TALLYREQUEST>
 </HEADER>
 <BODY>
  <IMPORTDATA>

   <REQUESTDESC>
    <REPORTNAME>Vouchers</REPORTNAME>
    <STATICVARIABLES>
     <SVCURRENTCOMPANY>' . $company_id . '</SVCURRENTCOMPANY>
    </STATICVARIABLES>
   </REQUESTDESC>
   <REQUESTDATA>
    <TALLYMESSAGE xmlns:UDF="TallyUDF">
     <VOUCHER  VCHTYPE="Expenses" ACTION="Create" OBJVIEW="Invoice Voucher View">
      <OLDAUDITENTRYIDS.LIST TYPE="Number">
       <OLDAUDITENTRYIDS>-1</OLDAUDITENTRYIDS>
      </OLDAUDITENTRYIDS.LIST>
      <DATE>' . $date . '</DATE>
	  <NARRATION>{' . $narration . '}</NARRATION>
      <PARTYLEDGERNAME>' . $party_ledger . '</PARTYLEDGERNAME>
      <PARTYNAME>' . $party_ledger . '</PARTYNAME>
      <VOUCHERTYPENAME>Expenses</VOUCHERTYPENAME>
      <VOUCHERNUMBER>' . $vc_num . '</VOUCHERNUMBER>
      <CSTFORMISSUETYPE/>
      <CSTFORMRECVTYPE/>
      <PERSISTEDVIEW>Invoice Voucher View</PERSISTEDVIEW>
      <VCHGSTCLASS/>
      <VOUCHERTYPEORIGNAME>Expenses</VOUCHERTYPEORIGNAME>
      <EFFECTIVEDATE>' . $date . '</EFFECTIVEDATE>
      <LEDGERENTRIES.LIST>
       <OLDAUDITENTRYIDS.LIST TYPE="Number">
        <OLDAUDITENTRYIDS>-1</OLDAUDITENTRYIDS>
       </OLDAUDITENTRYIDS.LIST>
	   <ISPARTYLEDGER>Yes</ISPARTYLEDGER>
       <LEDGERNAME>' . $party_ledger . '</LEDGERNAME>
       <GSTCLASS/>
	   <ISDEEMEDPOSITIVE>No</ISDEEMEDPOSITIVE>
       <LEDGERFROMITEM>No</LEDGERFROMITEM>
       <REMOVEZEROENTRIES>No</REMOVEZEROENTRIES>
       <ISPARTYLEDGER>Yes</ISPARTYLEDGER>
       <ISLASTDEEMEDPOSITIVE>Yes</ISLASTDEEMEDPOSITIVE>
       <ISCAPVATTAXALTERED>No</ISCAPVATTAXALTERED>
       <ISCAPVATNOTCLAIMED>No</ISCAPVATNOTCLAIMED>
      <AMOUNT>' . $amount . '</AMOUNT>
      <BILLALLOCATIONS.LIST>
        <NAME>1</NAME>
        <BILLTYPE>New Ref</BILLTYPE>
        <TDSDEDUCTEEISSPECIALRATE>No</TDSDEDUCTEEISSPECIALRATE>
        <AMOUNT>' . $amount . '</AMOUNT>
        <INTERESTCOLLECTION.LIST>        </INTERESTCOLLECTION.LIST>
        <STBILLCATEGORIES.LIST>        </STBILLCATEGORIES.LIST>
       </BILLALLOCATIONS.LIST>
      </LEDGERENTRIES.LIST>
		 ' . $get_all_xml . '
      
      <PAYROLLMODEOFPAYMENT.LIST>      </PAYROLLMODEOFPAYMENT.LIST>
      <ATTDRECORDS.LIST>      </ATTDRECORDS.LIST>
     </VOUCHER>
    </TALLYMESSAGE>
    
   </REQUESTDATA>
  </IMPORTDATA>
 </BODY>
</ENVELOPE>

';
		return $xml;
	}

	function getXmlForSalePUR($company_id, $date, $narration, $party_ledger, $amount, $get_all_xml, $vc_num)
	{

		$xml = '<ENVELOPE>
 <HEADER>
  <TALLYREQUEST>Import Data</TALLYREQUEST>
 </HEADER>
 <BODY>
  <IMPORTDATA>
   <REQUESTDESC>
    <REPORTNAME>Vouchers</REPORTNAME>
    <STATICVARIABLES>
     <SVCURRENTCOMPANY>' . $company_id . '</SVCURRENTCOMPANY>
    </STATICVARIABLES>
   </REQUESTDESC>
   <REQUESTDATA>
    <TALLYMESSAGE xmlns:UDF="TallyUDF">
     <VOUCHER  VCHTYPE="Purchase" ACTION="Create" OBJVIEW="Accounting Voucher View">
      <OLDAUDITENTRYIDS.LIST TYPE="Number">
       <OLDAUDITENTRYIDS>-1</OLDAUDITENTRYIDS>
      </OLDAUDITENTRYIDS.LIST>
      <DATE>' . $date . '</DATE>
	  <NARRATION>{' . $narration . '}</NARRATION>
      <PARTYLEDGERNAME>' . $party_ledger . '</PARTYLEDGERNAME>
      <VOUCHERTYPENAME>Purchase</VOUCHERTYPENAME>
      <REFERENCE>22</REFERENCE>
      <VOUCHERNUMBER>' . $vc_num . '</VOUCHERNUMBER>
      <CSTFORMISSUETYPE/>
      <CSTFORMRECVTYPE/>
      <VCHGSTCLASS/>
      <VOUCHERTYPEORIGNAME>Purchase</VOUCHERTYPEORIGNAME>
      <EFFECTIVEDATE>' . $date . '</EFFECTIVEDATE>
      <ALLLEDGERENTRIES.LIST>
       <OLDAUDITENTRYIDS.LIST TYPE="Number">
        <OLDAUDITENTRYIDS>-1</OLDAUDITENTRYIDS>
       </OLDAUDITENTRYIDS.LIST>
	   <ISPARTYLEDGER>Yes</ISPARTYLEDGER>
       <LEDGERNAME>' . $party_ledger . '</LEDGERNAME>
       <GSTCLASS/>
	   <ISDEEMEDPOSITIVE>No</ISDEEMEDPOSITIVE>
       <LEDGERFROMITEM>No</LEDGERFROMITEM>
       <REMOVEZEROENTRIES>No</REMOVEZEROENTRIES>
       <ISPARTYLEDGER>Yes</ISPARTYLEDGER>
       <ISLASTDEEMEDPOSITIVE>Yes</ISLASTDEEMEDPOSITIVE>
       <ISCAPVATTAXALTERED>No</ISCAPVATTAXALTERED>
       <ISCAPVATNOTCLAIMED>No</ISCAPVATNOTCLAIMED>
       <AMOUNT>' . $amount . '</AMOUNT>
      </ALLLEDGERENTRIES.LIST>
		' . $get_all_xml . '
      
      <PAYROLLMODEOFPAYMENT.LIST>      </PAYROLLMODEOFPAYMENT.LIST>
      <ATTDRECORDS.LIST>      </ATTDRECORDS.LIST>
     </VOUCHER>
    </TALLYMESSAGE>
    
   </REQUESTDATA>
  </IMPORTDATA>
 </BODY>
</ENVELOPE>

';
		return $xml;
	}


	function getXmlForPurchaseItem($company_id, $date, $narration, $party_ledger, $amount, $get_all_xml, $vc_num)
	{
		$xml = '<ENVELOPE>
 <HEADER>
  <TALLYREQUEST>Import Data</TALLYREQUEST>
 </HEADER>
 <BODY>
  <IMPORTDATA>
   <REQUESTDESC>
    <REPORTNAME>Vouchers</REPORTNAME>
    <STATICVARIABLES>
     <SVCURRENTCOMPANY>' . $company_id . '</SVCURRENTCOMPANY>
    </STATICVARIABLES>
   </REQUESTDESC>
   <REQUESTDATA>
    <TALLYMESSAGE xmlns:UDF="TallyUDF">
     <VOUCHER  VCHTYPE="Purchase" ACTION="Create" OBJVIEW="Accounting Voucher View">
      <OLDAUDITENTRYIDS.LIST TYPE="Number">
       <OLDAUDITENTRYIDS>-1</OLDAUDITENTRYIDS>
      </OLDAUDITENTRYIDS.LIST>
      <DATE>' . $date . '</DATE>
	  <NARRATION>{' . $narration . '}</NARRATION>
      <PARTYLEDGERNAME>' . $party_ledger . '</PARTYLEDGERNAME>
      <VOUCHERTYPENAME>Purchase</VOUCHERTYPENAME>
      <REFERENCE>22</REFERENCE>
      <VOUCHERNUMBER>' . $vc_num . '</VOUCHERNUMBER>
      <CSTFORMISSUETYPE/>
      <CSTFORMRECVTYPE/>
      <VCHGSTCLASS/>
      <VOUCHERTYPEORIGNAME>Purchase</VOUCHERTYPEORIGNAME>
      <EFFECTIVEDATE>' . $date . '</EFFECTIVEDATE>
      <ALLLEDGERENTRIES.LIST>
       <OLDAUDITENTRYIDS.LIST TYPE="Number">
        <OLDAUDITENTRYIDS>-1</OLDAUDITENTRYIDS>
       </OLDAUDITENTRYIDS.LIST>
	   <ISPARTYLEDGER>Yes</ISPARTYLEDGER>
       <LEDGERNAME>' . $party_ledger . '</LEDGERNAME>
       <GSTCLASS/>
	   <ISDEEMEDPOSITIVE>No</ISDEEMEDPOSITIVE>
       <LEDGERFROMITEM>No</LEDGERFROMITEM>
       <REMOVEZEROENTRIES>No</REMOVEZEROENTRIES>
       <ISPARTYLEDGER>Yes</ISPARTYLEDGER>
       <ISLASTDEEMEDPOSITIVE>Yes</ISLASTDEEMEDPOSITIVE>
       <ISCAPVATTAXALTERED>No</ISCAPVATTAXALTERED>
       <ISCAPVATNOTCLAIMED>No</ISCAPVATNOTCLAIMED>
       <AMOUNT>' . $amount . '</AMOUNT>
      </ALLLEDGERENTRIES.LIST>
		' . $get_all_xml . '
      
      <PAYROLLMODEOFPAYMENT.LIST>      </PAYROLLMODEOFPAYMENT.LIST>
      <ATTDRECORDS.LIST>      </ATTDRECORDS.LIST>
     </VOUCHER>
    </TALLYMESSAGE>
    
   </REQUESTDATA>
  </IMPORTDATA>
 </BODY>
</ENVELOPE>

';
		return $xml;
	}

	public function test_tally()
	{
		$company_id = $this->input->post('company_name');
		$party_ledger = $this->input->post('party_ledger');
		$date = $this->input->post('date');
		$date = date('Ymd', strtotime($date));
		$invoiceno = $this->input->post('invoiceno');
		$amount = $this->input->post('amount');
		$narration = $this->input->post('narration');
		$acc_item_invoice = $this->input->post('acc_item_invoice');
		$div_count = ($this->input->post('div_count1')) + 1;
		$get_item_xml = "";
		$get_tax_xml = "";
		$get_all_xml = "";

		$vc_num = $this->voucher_number();
		$type = $this->input->post('vctype');;
		if ($type == "Sales") {
			for ($i = 0; $i < $div_count; $i++) {
				$ledger = $this->input->post('ledger' . $i);
				//array of all items details
				$item_name = $this->input->post('item_name' . $i);
				$quantity = $this->input->post('quantity' . $i);
				$rate = $this->input->post('rate' . $i);
				$amt = $this->input->post('amt' . $i);
				$allamt = array_sum($amt);
				if ($acc_item_invoice == 1) {
					$amt = $amt[0];
				}
				$get_item_xml .= $this->get_ledger_with_item_xml($ledger, $item_name, $rate, $quantity, $amt, $allamt, $type, $acc_item_invoice);
				//taxasation details
				$taxname = $this->input->post('taxname' . $i);
				$taxper = $this->input->post('taxper' . $i);
				$taxamt = $this->input->post('taxamt' . $i);

				for ($n = 0; $n < count($taxname); $n++) {
					if ($taxname[$n] == "") {

					} else {
						$get_tax_xml .= $this->get_tax_xml_new($taxname[$n], $taxper[$n], $taxamt[$n], $allamt, $type, $acc_item_invoice);
					}
				}
				$get_all_xml .= $get_item_xml . $get_tax_xml;
			}
			if ($acc_item_invoice == 2) {
				$xml = $this->getXmlForSaleItemN($company_id, $date, $narration, $party_ledger, $amount, $get_all_xml, $vc_num);
			} else {
				$xml = $this->getXmlForSaleAcc($company_id, $date, $narration, $party_ledger, $amount, $get_all_xml, $vc_num);

			}


		} else if ($type == "Expense") {
			for ($i = 0; $i < $div_count; $i++) {
				$ledger = $this->input->post('ledger' . $i);
				//array of all items details
				$item_name = $this->input->post('item_name' . $i);
				$quantity = $this->input->post('quantity' . $i);
				$rate = $this->input->post('rate' . $i);
				$amt = $this->input->post('amt' . $i);
				$allamt = array_sum($amt);
				$get_item_xml .= $this->get_ledger_with_item_xmlEXP($ledger, $item_name, $rate, $quantity, $amt[0], $allamt, $type, $acc_item_invoice);
				//taxasation details
				$taxname = $this->input->post('taxname' . $i);
				$taxper = $this->input->post('taxper' . $i);
				$taxamt = ($this->input->post('taxamt' . $i));

				for ($n = 0; $n < count($taxname); $n++) {
					if ($taxname[$n] == "") {

					} else {
						$get_tax_xml .= $this->get_tax_xml_newEXP($taxname[$n], $taxper[$n], $taxamt[$n], $allamt, $type);
					}
				}
				$get_all_xml .= $get_item_xml . $get_tax_xml;
			}
			$xml = $this->getXmlForSaleExp($company_id, $date, $narration, $party_ledger, $amount, $get_all_xml, $vc_num);

		} else {
			for ($i = 0; $i < $div_count; $i++) {
				$ledger = $this->input->post('ledger' . $i);
				//array of all items details
				$item_name = $this->input->post('item_name' . $i);
				$quantity = $this->input->post('quantity' . $i);
				$rate = $this->input->post('rate' . $i);
				$amt = $this->input->post('amt' . $i);
				$allamt = array_sum($amt);
				if ($acc_item_invoice == 1) {
					$amt = $amt[0];
				}
				$get_item_xml .= $this->get_ledger_with_item_xml($ledger, $item_name, $rate, $quantity, $amt, $allamt, $type, $acc_item_invoice);


				//taxasation details
				$taxname = $this->input->post('taxname' . $i);
				$taxper = $this->input->post('taxper' . $i);
				$taxamt = $this->input->post('taxamt' . $i);

				for ($n = 0; $n < count($taxname); $n++) {
					if ($taxname[$n] == "") {

					} else {
						$get_tax_xml .= $this->get_tax_xml_new($taxname[$n], $taxper[$n], $taxamt[$n], $allamt, $type, $acc_item_invoice);
					}

				}
				$get_all_xml .= $get_item_xml . $get_tax_xml;

			}
			if ($acc_item_invoice == 2) {
				$xml = $this->getXmlForPurchaseItem($company_id, $date, $narration, $party_ledger, $amount, $get_all_xml, $vc_num);
			} else {
				$xml = $this->getXmlForSalePUR($company_id, $date, $narration, $party_ledger, $amount, $get_all_xml, $vc_num);

			}

		}

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->url);
// Following line is compulsary to add as it is:
		curl_setopt($ch, CURLOPT_POSTFIELDS, "xmlRequest=" . $xml);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);
		$data = curl_exec($ch);
		// var_dump($data);

		$xml = simplexml_load_string($data);
		$json = json_encode($xml);
		$array = json_decode($json, TRUE);
		//var_dump($array);
		if ($array['CREATED'] == 1) {
			$response['status'] = 200;
			$user_id = $this->session->user_session->user_id;
			$file_id = $this->input->post('file_id');
			$data = array("voucher_id" => $vc_num,
				"user_id" => $user_id,
				"file_id" => $file_id
			);
			$insert = $this->db->insert("tally_user_combo_table", $data);
		} else {
			if (!array_key_exists('LINEERROR', $array)) {
				$response['error'] = "please try again later";
			} else {
				$response['error'] = $array['LINEERROR'];
			}
			$response['status'] = 201;
		}
		curl_close($ch);
		echo json_encode($response);
	}

	public function test_tallyNEW()
	{
		$company_id = $this->input->post('company_name');
		$party_ledger = $this->input->post('party_ledger');
		$date = $this->input->post('date');
		$invoiceno = $this->input->post('invoiceno');
		$amount = $this->input->post('amount');
		$narration = $this->input->post('narration');
		$div_count = ($this->input->post('div_count1')) + 1;
		$get_item_xml = "";
		$get_tax_xml = "";
		$get_all_xml = "";


		$type = $this->input->post('vctype');
		//$type = 'Expense';
		$acc_item_invoice = $this->input->post('acc_item_invoice');;
		if ($type == "Sales") {
			for ($i = 0; $i < $div_count; $i++) {
				$ledger = $this->input->post('ledger' . $i);
				//array of all items details
				$item_name = $this->input->post('item_name' . $i);
				$quantity = $this->input->post('quantity' . $i);
				$rate = $this->input->post('rate' . $i);
				$amt = $this->input->post('amt' . $i);
				$allamt = array_sum($amt);

				$get_item_xml .= $this->get_ledger_with_item_xml($ledger, $item_name, $rate, $quantity, $amt, $allamt, $type);

				//taxasation details
				$taxname = $this->input->post('taxname' . $i);
				$taxper = $this->input->post('taxper' . $i);
				$taxamt = $this->input->post('taxamt' . $i);

				for ($n = 0; $n < count($taxname); $n++) {
					if ($taxname[$n] == "") {

					} else {
						$get_tax_xml .= $this->get_tax_xml_newItem($taxname[$n], $taxper[$n], $taxamt[$n], $allamt, $type);

					}

				}
				$get_all_xml .= $get_item_xml . $get_tax_xml;


			}
			$xml = $this->getXmlForSale($get_all_xml);
		} else if ($type == "Expense") {
			for ($i = 0; $i < $div_count; $i++) {
				$ledger = $this->input->post('ledger' . $i);
				//array of all items details
				$item_name = $this->input->post('item_name' . $i);
				$quantity = $this->input->post('quantity' . $i);
				$rate = $this->input->post('rate' . $i);
				$amt = $this->input->post('amt' . $i);
				$allamt = array_sum($amt);

				$get_item_xml .= $this->get_ledger_with_item_xml($ledger, $item_name, $rate, $quantity, $amt, $allamt, $type);

				//taxasation details
				$taxname = $this->input->post('taxname' . $i);
				$taxper = $this->input->post('taxper' . $i);
				$taxamt = $this->input->post('taxamt' . $i);

				for ($n = 0; $n < count($taxname); $n++) {
					if ($taxname[$n] == "") {

					} else {
						$get_tax_xml .= $this->get_tax_xml_newItem($taxname[$n], $taxper[$n], $taxamt[$n], $allamt, $type);

					}

				}
				$get_all_xml .= $get_item_xml . $get_tax_xml;


			}
			$xml = '<ENVELOPE>
 <HEADER>
  <TALLYREQUEST>Import Data</TALLYREQUEST>
 </HEADER>
 <BODY>
  <IMPORTDATA>
<REQUESTDESC>
    <REPORTNAME>Vouchers</REPORTNAME>
    <STATICVARIABLES>
     <SVCURRENTCOMPANY>' . $company_id . '</SVCURRENTCOMPANY>
    </STATICVARIABLES>
   </REQUESTDESC>
    <REQUESTDATA> 
	<TALLYMESSAGE xmlns:UDF="TallyUDF">
	<VOUCHER VCHTYPE="Expenses" ACTION="Create" OBJVIEW="Invoice Voucher View">
	<DATE>' . $date . '</DATE>
      <REFERENCEDATE>' . $date . '</REFERENCEDATE>
      <STATENAME>Maharashtra</STATENAME>
      <NARRATION>{' . $narration . '}</NARRATION>
      <PARTYNAME>' . $party_ledger . '</PARTYNAME>
      <VOUCHERTYPENAME>Expenses</VOUCHERTYPENAME>
      <VOUCHERNUMBER>' . $vc_num = $this->voucher_number() . '</VOUCHERNUMBER>
      <PARTYLEDGERNAME>' . $party_ledger . '</PARTYLEDGERNAME>
      <BASICBASEPARTYNAME>' . $party_ledger . '</BASICBASEPARTYNAME>
      <CSTFORMISSUETYPE/>
      <CSTFORMRECVTYPE/>
      <FBTPAYMENTTYPE>Default</FBTPAYMENTTYPE>
      <PERSISTEDVIEW>Invoice Voucher View</PERSISTEDVIEW>
      <BASICBUYERNAME>' . $company_id . '</BASICBUYERNAME>
      <VCHGSTCLASS/>
      <ENTEREDBY>rkabra</ENTEREDBY>
      ' . $get_all_xml . '
	</TALLYMESSAGE>
	
	</REQUESTDATA>
  </IMPORTDATA>
 </BODY>
 </ENVELOPE>';
		} else {
			for ($i = 0; $i < $div_count; $i++) {
				$ledger = $this->input->post('ledger' . $i);
				//array of all items details
				$item_name = $this->input->post('item_name' . $i);
				$quantity = $this->input->post('quantity' . $i);
				$rate = $this->input->post('rate' . $i);
				$amt = $this->input->post('amt' . $i);
				$allamt = array_sum($amt);

				//$get_item_xml .= $this->get_ledger_with_item_xml_purchase($ledger, $item_name, $rate, $quantity, $amt, $allamt, $type);
				if ($acc_item_invoice == 1) {
					$get_item_xml .= $this->get_ledger_with_item_xml_purchase($ledger, $item_name, $rate, $quantity, $amt, $allamt, $type);
				} else {
					$get_item_xml .= $this->get_ledger_with_item_xml_purchaseITEM($ledger, $item_name, $rate, $quantity, $amt, $allamt, $type);
					//$get_tax_xml .= $this->get_tax_xml_newItem($taxname[$n], $taxper[$n], $taxamt[$n], $allamt, $type);
				}


				//taxasation details
				$taxname = $this->input->post('taxname' . $i);
				$taxper = $this->input->post('taxper' . $i);
				$taxamt = $this->input->post('taxamt' . $i);

				for ($n = 0; $n < count($taxname); $n++) {
					if ($taxname[$n] == "") {

					} else {
						$get_tax_xml .= $this->get_tax_xml_new($taxname[$n], $taxper[$n], $taxamt[$n], $allamt, $type);
					}

				}
				$get_all_xml .= $get_item_xml . $get_tax_xml;


			}
			if ($acc_item_invoice == 1) {
				$xml = '<ENVELOPE>
 <HEADER>
  <TALLYREQUEST>Import Data</TALLYREQUEST>
 </HEADER>
 <BODY>
  <IMPORTDATA>
   <REQUESTDESC>
    <REPORTNAME>Vouchers</REPORTNAME>
    <STATICVARIABLES>
     <SVCURRENTCOMPANY>' . $company_id . '</SVCURRENTCOMPANY>
    </STATICVARIABLES>
   </REQUESTDESC>
   <REQUESTDATA>
    <TALLYMESSAGE xmlns:UDF="TallyUDF">
     <VOUCHER  VCHTYPE="Purchase" ACTION="Create" OBJVIEW="Accounting Voucher View">
      <OLDAUDITENTRYIDS.LIST TYPE="Number">
       <OLDAUDITENTRYIDS>-1</OLDAUDITENTRYIDS>
      </OLDAUDITENTRYIDS.LIST>
      <DATE>' . $date . '</DATE>
	  <NARRATION>{' . $narration . '}</NARRATION>
      <PARTYLEDGERNAME>' . $party_ledger . '</PARTYLEDGERNAME>
      <VOUCHERTYPENAME>Purchase</VOUCHERTYPENAME>
      <REFERENCE>22</REFERENCE>
      <VOUCHERNUMBER>' . $vc_num = $this->voucher_number() . '</VOUCHERNUMBER>
      <CSTFORMISSUETYPE/>
      <CSTFORMRECVTYPE/>
      <VCHGSTCLASS/>
      <VOUCHERTYPEORIGNAME>Purchase</VOUCHERTYPEORIGNAME>
      <EFFECTIVEDATE>' . $date . '</EFFECTIVEDATE>
      <ALLLEDGERENTRIES.LIST>
       <OLDAUDITENTRYIDS.LIST TYPE="Number">
        <OLDAUDITENTRYIDS>-1</OLDAUDITENTRYIDS>
       </OLDAUDITENTRYIDS.LIST>
	   <ISPARTYLEDGER>Yes</ISPARTYLEDGER>
       <LEDGERNAME>' . $party_ledger . '</LEDGERNAME>
       <GSTCLASS/>
	   <ISDEEMEDPOSITIVE>Yes</ISDEEMEDPOSITIVE>
       <LEDGERFROMITEM>No</LEDGERFROMITEM>
       <REMOVEZEROENTRIES>No</REMOVEZEROENTRIES>
       <ISPARTYLEDGER>Yes</ISPARTYLEDGER>
       <ISLASTDEEMEDPOSITIVE>Yes</ISLASTDEEMEDPOSITIVE>
       <ISCAPVATTAXALTERED>No</ISCAPVATTAXALTERED>
       <ISCAPVATNOTCLAIMED>No</ISCAPVATNOTCLAIMED>
       <AMOUNT>' . $amount . '</AMOUNT>
      </ALLLEDGERENTRIES.LIST>
		' . $get_all_xml . '
      
      <PAYROLLMODEOFPAYMENT.LIST>      </PAYROLLMODEOFPAYMENT.LIST>
      <ATTDRECORDS.LIST>      </ATTDRECORDS.LIST>
     </VOUCHER>
    </TALLYMESSAGE>
    
   </REQUESTDATA>
  </IMPORTDATA>
 </BODY>
</ENVELOPE>

';
			} else {
				$xml = '
				<ENVELOPE>
 <HEADER>
  <TALLYREQUEST>Import Data</TALLYREQUEST>
 </HEADER>
 <BODY>
  <IMPORTDATA>
   <REQUESTDESC>
    <REPORTNAME>Vouchers</REPORTNAME>
    <STATICVARIABLES>
     <SVCURRENTCOMPANY>' . $company_id . '</SVCURRENTCOMPANY>
    </STATICVARIABLES>
   </REQUESTDESC>
   <REQUESTDATA>
    <TALLYMESSAGE xmlns:UDF="TallyUDF">
     <VOUCHER  VCHTYPE="Purchase" ACTION="Create" OBJVIEW="Invoice Voucher View">

      <OLDAUDITENTRYIDS.LIST TYPE="Number">
       <OLDAUDITENTRYIDS>-1</OLDAUDITENTRYIDS>
      </OLDAUDITENTRYIDS.LIST>
      <DATE>' . $date . '</DATE>
      <REFERENCEDATE>' . $date . '</REFERENCEDATE>
      <NARRATION>{' . $narration . '}</NARRATION>
      <COUNTRYOFRESIDENCE>India</COUNTRYOFRESIDENCE>
      <PARTYNAME>' . $party_ledger . '</PARTYNAME>
      <VOUCHERTYPENAME>Purchase</VOUCHERTYPENAME>
      <REFERENCE>1</REFERENCE>
      <VOUCHERNUMBER>' . $vc_num = $this->voucher_number() . '</VOUCHERNUMBER>
      <PARTYLEDGERNAME>' . $party_ledger . '</PARTYLEDGERNAME>
      <BASICBASEPARTYNAME>' . $party_ledger . '</BASICBASEPARTYNAME>
      <CSTFORMISSUETYPE/>
      <CSTFORMRECVTYPE/>
      <FBTPAYMENTTYPE>Default</FBTPAYMENTTYPE>
      <PERSISTEDVIEW>Invoice Voucher View</PERSISTEDVIEW>
      <PLACEOFSUPPLY>Haryana</PLACEOFSUPPLY>
      <CONSIGNEEGSTIN>07AATCA0578P1ZV</CONSIGNEEGSTIN>
      <BASICBUYERNAME>' . $company_id . '</BASICBUYERNAME>
      <VCHGSTCLASS/>
      <CONSIGNEESTATENAME>Delhi</CONSIGNEESTATENAME>
      <DIFFACTUALQTY>No</DIFFACTUALQTY>
      <ISMSTFROMSYNC>No</ISMSTFROMSYNC>
      <ASORIGINAL>No</ASORIGINAL>
      <AUDITED>No</AUDITED>
      <FORJOBCOSTING>No</FORJOBCOSTING>
      <ISOPTIONAL>No</ISOPTIONAL>
      <EFFECTIVEDATE>' . $date . '</EFFECTIVEDATE>
      <LEDGERENTRIES.LIST>
       <OLDAUDITENTRYIDS.LIST TYPE="Number">
        <OLDAUDITENTRYIDS>-1</OLDAUDITENTRYIDS>
       </OLDAUDITENTRYIDS.LIST>
       <LEDGERNAME>' . $party_ledger . '</LEDGERNAME>
       <GSTCLASS/>
       <ISDEEMEDPOSITIVE>No</ISDEEMEDPOSITIVE>
       <LEDGERFROMITEM>No</LEDGERFROMITEM>
       <REMOVEZEROENTRIES>No</REMOVEZEROENTRIES>
       <ISPARTYLEDGER>Yes</ISPARTYLEDGER>
       <ISLASTDEEMEDPOSITIVE>No</ISLASTDEEMEDPOSITIVE>
       <ISCAPVATTAXALTERED>No</ISCAPVATTAXALTERED>
       <ISCAPVATNOTCLAIMED>No</ISCAPVATNOTCLAIMED>
       <AMOUNT>' . $amount . '</AMOUNT>
       
      </LEDGERENTRIES.LIST>
      ' . $get_all_xml . '
     </VOUCHER>
    </TALLYMESSAGE>
    
   
   </REQUESTDATA>
  </IMPORTDATA>
 </BODY>
</ENVELOPE>
				';

			}

		}
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->url);
// Following line is compulsary to add as it is:
		curl_setopt($ch, CURLOPT_POSTFIELDS, "xmlRequest=" . $xml);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);
		$data = curl_exec($ch);
		// var_dump($data);

		$xml = simplexml_load_string($data);
		$json = json_encode($xml);

		$array = json_decode($json, TRUE);

		if ($array['CREATED'] == 1) {
			$response['status'] = 200;
			$user_id = $this->session->user_session->user_id;
			$file_id = $this->input->post('file_id');
			$data = array("voucher_id" => $vc_num,
				"user_id" => $user_id,
				"file_id" => $file_id
			);
			$insert = $this->db->insert("tally_user_combo_table", $data);
		} else {
			if (!array_key_exists('LINEERROR', $array)) {
				$response['error'] = "please try again later";
			} else {
				$response['error'] = $array['LINEERROR'];
			}
			$response['status'] = 201;
		}
		curl_close($ch);
		echo json_encode($response);
	}

	function get_ledger_with_item_xml($ledger, $item_arr, $rate_arr, $quantity_arr, $amt_arr, $allamt, $type, $acc_item_invoice)
	{
		/* <ACTUALQTY>'.$quantity.'</ACTUALQTY>
	<BILLEDQTY>'.$quantity.'</BILLEDQTY>
	<RATE>'.$rate.'</RATE> */

		$bxml = "";
		if ($acc_item_invoice == 1) {
			$isDeem=' <ISDEEMEDPOSITIVE>No</ISDEEMEDPOSITIVE>';
			if ($type == "Purchase") {
				$amt_arr = "-" . $amt_arr;
				$isDeem=' <ISDEEMEDPOSITIVE>Yes</ISDEEMEDPOSITIVE>';
			}
			$xml = '<LEDGERENTRIES.LIST>
       <OLDAUDITENTRYIDS.LIST TYPE="Number">
        <OLDAUDITENTRYIDS>-1</OLDAUDITENTRYIDS>
       </OLDAUDITENTRYIDS.LIST>
       <LEDGERNAME>' . $ledger . '</LEDGERNAME>
       <GSTCLASS/>
      '.$isDeem.'
       <LEDGERFROMITEM>No</LEDGERFROMITEM>
       <REMOVEZEROENTRIES>No</REMOVEZEROENTRIES>
       <ISPARTYLEDGER>No</ISPARTYLEDGER>
       <ISLASTDEEMEDPOSITIVE>Yes</ISLASTDEEMEDPOSITIVE>
       <ISCAPVATTAXALTERED>No</ISCAPVATTAXALTERED>
       <ISCAPVATNOTCLAIMED>No</ISCAPVATNOTCLAIMED>
       <AMOUNT>' . $amt_arr . '</AMOUNT>
       <VATEXPAMOUNT>' . $amt_arr . '</VATEXPAMOUNT>
      </LEDGERENTRIES.LIST>';
			return $xml;
		}
		$count = count($item_arr);
		for ($i = 0; $i < $count; $i++) {
			$quantity = $quantity_arr[$i];
			$rate = $rate_arr[$i];
			$item = $item_arr[$i];
			$amt = $amt_arr[$i];
			$isDeem=' <ISDEEMEDPOSITIVE>No</ISDEEMEDPOSITIVE>';
			if ($type == "Purchase") {
				$amt = "-" . $amt_arr[$i];
				$isDeem=' <ISDEEMEDPOSITIVE>Yes</ISDEEMEDPOSITIVE>';
			}

			if ($item_arr[0] == "" && $amt_arr[0] != "") {

				$xml = '  <ALLLEDGERENTRIES.LIST>
       <OLDAUDITENTRYIDS.LIST TYPE="Number">
        <OLDAUDITENTRYIDS>-1</OLDAUDITENTRYIDS>
       </OLDAUDITENTRYIDS.LIST>
	   <ISPARTYLEDGER>No</ISPARTYLEDGER>
       <LEDGERNAME>' . $ledger . '</LEDGERNAME>
       <GSTCLASS/>
	   
       <ISDEEMEDPOSITIVE>No</ISDEEMEDPOSITIVE>
       <LEDGERFROMITEM>No</LEDGERFROMITEM>
       <REMOVEZEROENTRIES>No</REMOVEZEROENTRIES>
       <ISPARTYLEDGER>No</ISPARTYLEDGER>
       <ISLASTDEEMEDPOSITIVE>No</ISLASTDEEMEDPOSITIVE>
       <ISCAPVATTAXALTERED>No</ISCAPVATTAXALTERED>
       <ISCAPVATNOTCLAIMED>No</ISCAPVATNOTCLAIMED>
       <AMOUNT>' . $amt . '</AMOUNT>
      </ALLLEDGERENTRIES.LIST>';
				return $xml;
			} else {
				$bxml .= '
			<INVENTORYALLOCATIONS.LIST>
			<STOCKITEMNAME>' . $item . '</STOCKITEMNAME>
			'.$isDeem.'
        <ISAUTONEGATE>No</ISAUTONEGATE>
        <ISCUSTOMSCLEARANCE>No</ISCUSTOMSCLEARANCE>
        <ISTRACKCOMPONENT>No</ISTRACKCOMPONENT>
        <ISTRACKPRODUCTION>No</ISTRACKPRODUCTION>
        <ISPRIMARYITEM>No</ISPRIMARYITEM>
        <ISSCRAP>No</ISSCRAP>
			<AMOUNT>' . $amt . '</AMOUNT>
			<ACTUALQTY>' . $quantity . '</ACTUALQTY>
			<BILLEDQTY>' . $quantity . '</BILLEDQTY>
			<RATE>' . $rate . '</RATE>
			<BATCHALLOCATIONS.LIST>
			 <GODOWNNAME>Main Location</GODOWNNAME>
			 <BATCHNAME>Primary Batch</BATCHNAME>
			 <INDENTNO/>
			 <ORDERNO/>
			 <TRACKINGNUMBER/>
			 <DYNAMICCSTISCLEARED>No</DYNAMICCSTISCLEARED>
			 <AMOUNT>'.$amt.'</AMOUNT>
			</BATCHALLOCATIONS.LIST>
		   </INVENTORYALLOCATIONS.LIST>
			';
			}
		}
		$isDeem=' <ISDEEMEDPOSITIVE>No</ISDEEMEDPOSITIVE>';
		if ($type == "Purchase") {
			$isDeem=' <ISDEEMEDPOSITIVE>Yes</ISDEEMEDPOSITIVE>';
		}
		$xml = '<ALLLEDGERENTRIES.LIST>
       <OLDAUDITENTRYIDS.LIST TYPE="Number">
        <OLDAUDITENTRYIDS>-1</OLDAUDITENTRYIDS>
       </OLDAUDITENTRYIDS.LIST>
       <LEDGERNAME>' . $ledger . '</LEDGERNAME>
       <GSTCLASS/>
	   
       '.$isDeem.'
       <LEDGERFROMITEM>No</LEDGERFROMITEM>
       <REMOVEZEROENTRIES>No</REMOVEZEROENTRIES>
       <ISPARTYLEDGER>No</ISPARTYLEDGER>
       <ISLASTDEEMEDPOSITIVE>No</ISLASTDEEMEDPOSITIVE>
       <ISCAPVATTAXALTERED>No</ISCAPVATTAXALTERED>
       <ISCAPVATNOTCLAIMED>No</ISCAPVATNOTCLAIMED>
       <AMOUNT>' . $allamt . '</AMOUNT>
       ' . $bxml . '
      </ALLLEDGERENTRIES.LIST>';
		return $xml;
	}

	function get_ledger_with_item_xmlEXP($ledger, $item_arr, $rate_arr, $quantity_arr, $amt_arr, $allamt, $type, $acc_item_invoice)
	{
		/* <ACTUALQTY>'.$quantity.'</ACTUALQTY>
	<BILLEDQTY>'.$quantity.'</BILLEDQTY>
	<RATE>'.$rate.'</RATE> */
//		$count = count($item_arr);
		$bxml = "";

		$xml = '<LEDGERENTRIES.LIST>
       <OLDAUDITENTRYIDS.LIST TYPE="Number">
        <OLDAUDITENTRYIDS>-1</OLDAUDITENTRYIDS>
       </OLDAUDITENTRYIDS.LIST>
       <LEDGERNAME>' . $ledger . '</LEDGERNAME>
       <GSTCLASS/>
       <ISDEEMEDPOSITIVE>Yes</ISDEEMEDPOSITIVE>
       <LEDGERFROMITEM>No</LEDGERFROMITEM>
       <REMOVEZEROENTRIES>No</REMOVEZEROENTRIES>
       <ISPARTYLEDGER>No</ISPARTYLEDGER>
       <ISLASTDEEMEDPOSITIVE>Yes</ISLASTDEEMEDPOSITIVE>
       <ISCAPVATTAXALTERED>No</ISCAPVATTAXALTERED>
       <ISCAPVATNOTCLAIMED>No</ISCAPVATNOTCLAIMED>
       <AMOUNT>-' . $amt_arr . '</AMOUNT>
       <VATEXPAMOUNT>-' . $amt_arr . '</VATEXPAMOUNT>
      </LEDGERENTRIES.LIST>';
		return $xml;

	}

	function get_tax_xml_new($taxname, $taxper, $taxamt, $amount, $type, $acc_item_invoice)
	{
		if ($type == "Purchase") {
			$taxamt = "-" . $taxamt;
		}
		if ($acc_item_invoice == 2) {
			$xml = '<ALLLEDGERENTRIES.LIST>
       <OLDAUDITENTRYIDS.LIST TYPE="Number">
        <OLDAUDITENTRYIDS>-1</OLDAUDITENTRYIDS>
       </OLDAUDITENTRYIDS.LIST>
	   <ISPARTYLEDGER>No</ISPARTYLEDGER>
       <LEDGERNAME>' . $taxname . '</LEDGERNAME>
	   <GSTCLASS/>
       <ISDEEMEDPOSITIVE>No</ISDEEMEDPOSITIVE>
       <LEDGERFROMITEM>No</LEDGERFROMITEM>
       <REMOVEZEROENTRIES>No</REMOVEZEROENTRIES>
       <ISPARTYLEDGER>No</ISPARTYLEDGER>
       <ISLASTDEEMEDPOSITIVE>No</ISLASTDEEMEDPOSITIVE>
       <ISCAPVATTAXALTERED>No</ISCAPVATTAXALTERED>
       <ISCAPVATNOTCLAIMED>No</ISCAPVATNOTCLAIMED>
       <UDF:RATEOFINVOICETAX.LIST DESC="RATEOFINVOICETAX" ISLIST="YES">
<UDF:RATEOFINVOICETAX DESC="`RATEOFINVOICETAX`">' . $taxper . '</UDF:RATEOFINVOICETAX>
</UDF:RATEOFINVOICETAX.LIST>
       <AMOUNT>' . $taxamt . '</AMOUNT>
       <VATASSESSABLEVALUE>' . $amount . '</VATASSESSABLEVALUE>
      </ALLLEDGERENTRIES.LIST>';
		} else {
			$xml = '<LEDGERENTRIES.LIST>
       <OLDAUDITENTRYIDS.LIST TYPE="Number">
        <OLDAUDITENTRYIDS>-1</OLDAUDITENTRYIDS>
       </OLDAUDITENTRYIDS.LIST>
	   <ISPARTYLEDGER>No</ISPARTYLEDGER>
       <LEDGERNAME>' . $taxname . '</LEDGERNAME>
	   <GSTCLASS/>
       <ISDEEMEDPOSITIVE>No</ISDEEMEDPOSITIVE>
       <LEDGERFROMITEM>No</LEDGERFROMITEM>
       <REMOVEZEROENTRIES>No</REMOVEZEROENTRIES>
       <ISPARTYLEDGER>No</ISPARTYLEDGER>
       <ISLASTDEEMEDPOSITIVE>No</ISLASTDEEMEDPOSITIVE>
       <ISCAPVATTAXALTERED>No</ISCAPVATTAXALTERED>
       <ISCAPVATNOTCLAIMED>No</ISCAPVATNOTCLAIMED>
       <UDF:RATEOFINVOICETAX.LIST DESC="RATEOFINVOICETAX" ISLIST="YES">
<UDF:RATEOFINVOICETAX DESC="`RATEOFINVOICETAX`">' . $taxper . '</UDF:RATEOFINVOICETAX>
</UDF:RATEOFINVOICETAX.LIST>
       <AMOUNT>' . $taxamt . '</AMOUNT>
       <VATASSESSABLEVALUE>' . $taxamt . '</VATASSESSABLEVALUE> </LEDGERENTRIES.LIST>';
		}

		return $xml;
	}

	function get_tax_xml_newEXP($taxname, $taxper, $taxamt, $amount, $type)
	{
		if ($type == "Purchase") {
			$taxamt = "-" . $taxamt;
		}
		$xml = '<LEDGERENTRIES.LIST>
       <OLDAUDITENTRYIDS.LIST TYPE="Number">
        <OLDAUDITENTRYIDS>-1</OLDAUDITENTRYIDS>
       </OLDAUDITENTRYIDS.LIST>
	   <ISPARTYLEDGER>No</ISPARTYLEDGER>
       <LEDGERNAME>' . $taxname . '</LEDGERNAME>
	   <GSTCLASS/>
       <ISDEEMEDPOSITIVE>No</ISDEEMEDPOSITIVE>
       <LEDGERFROMITEM>No</LEDGERFROMITEM>
       <REMOVEZEROENTRIES>No</REMOVEZEROENTRIES>
       <ISPARTYLEDGER>No</ISPARTYLEDGER>
       <ISLASTDEEMEDPOSITIVE>No</ISLASTDEEMEDPOSITIVE>
       <ISCAPVATTAXALTERED>No</ISCAPVATTAXALTERED>
       <ISCAPVATNOTCLAIMED>No</ISCAPVATNOTCLAIMED>
       <UDF:RATEOFINVOICETAX.LIST DESC="RATEOFINVOICETAX" ISLIST="YES">
<UDF:RATEOFINVOICETAX DESC="`RATEOFINVOICETAX`">' . $taxper . '</UDF:RATEOFINVOICETAX>
</UDF:RATEOFINVOICETAX.LIST>
       <AMOUNT>-' . $taxamt . '</AMOUNT>
       <VATASSESSABLEVALUE>-' . $taxamt . '</VATASSESSABLEVALUE>
      </LEDGERENTRIES.LIST>';
		return $xml;
	}

	function get_tax_xml_newItem($taxname, $taxper, $taxamt, $amount, $type)
	{
		if ($type == "Purchase") {
			$taxamt = "-" . $taxamt;
		}


		$xml = '<ALLINVENTORYENTRIES.LIST>
       <STOCKITEMNAME>' . $taxname . '</STOCKITEMNAME>
       <ISDEEMEDPOSITIVE>Yes</ISDEEMEDPOSITIVE>
       <ISLASTDEEMEDPOSITIVE>Yes</ISLASTDEEMEDPOSITIVE>
       <ISAUTONEGATE>No</ISAUTONEGATE>
       <ISCUSTOMSCLEARANCE>No</ISCUSTOMSCLEARANCE>
       <ISTRACKCOMPONENT>No</ISTRACKCOMPONENT>
       <ISTRACKPRODUCTION>No</ISTRACKPRODUCTION>
       <ISPRIMARYITEM>No</ISPRIMARYITEM>
       <ISSCRAP>No</ISSCRAP>
       <RATE></RATE>
       <AMOUNT>' . $amount . '</AMOUNT>
       <ACTUALQTY>' . $taxper . ' </ACTUALQTY>
       <BILLEDQTY>' . $taxper . ' </BILLEDQTY>
       <BATCHALLOCATIONS.LIST>
        <GODOWNNAME>Main Location</GODOWNNAME>
        <BATCHNAME>Primary Batch</BATCHNAME>
        <INDENTNO/>
        <ORDERNO/>
        <TRACKINGNUMBER/>
        <DYNAMICCSTISCLEARED>No</DYNAMICCSTISCLEARED>
        <AMOUNT>' . $amount . '</AMOUNT>
        <ACTUALQTY> ' . $taxper . '</ACTUALQTY>
        <BILLEDQTY> ' . $taxper . '</BILLEDQTY>
        <ADDITIONALDETAILS.LIST>        </ADDITIONALDETAILS.LIST>
        <VOUCHERCOMPONENTLIST.LIST>        </VOUCHERCOMPONENTLIST.LIST>
       </BATCHALLOCATIONS.LIST>
       <ACCOUNTINGALLOCATIONS.LIST>
        <OLDAUDITENTRYIDS.LIST TYPE="Number">
         <OLDAUDITENTRYIDS>-1</OLDAUDITENTRYIDS>
        </OLDAUDITENTRYIDS.LIST>
        <GSTCLASS/>
        <ISDEEMEDPOSITIVE>Yes</ISDEEMEDPOSITIVE>
        <LEDGERFROMITEM>No</LEDGERFROMITEM>
        <REMOVEZEROENTRIES>No</REMOVEZEROENTRIES>
        <ISPARTYLEDGER>No</ISPARTYLEDGER>
        <ISLASTDEEMEDPOSITIVE>Yes</ISLASTDEEMEDPOSITIVE>
        <ISCAPVATTAXALTERED>No</ISCAPVATTAXALTERED>
        <ISCAPVATNOTCLAIMED>No</ISCAPVATNOTCLAIMED>
        <AMOUNT>' . $amount . '</AMOUNT>
       </ACCOUNTINGALLOCATIONS.LIST>
      </ALLINVENTORYENTRIES.LIST>';

		return $xml;
	}

	function get_ledger_with_item_xml_purchase($ledger, $item_arr, $rate_arr, $quantity_arr, $amt_arr, $allamt, $type)
	{
		/* <ACTUALQTY>'.$quantity.'</ACTUALQTY>
	<BILLEDQTY>'.$quantity.'</BILLEDQTY>
	<RATE>'.$rate.'</RATE> */
		$count = count($item_arr);
		$bxml = "";

		for ($i = 0; $i < $count; $i++) {
			$quantity = $quantity_arr[$i];
			$rate = $rate_arr[$i];
			$item = $item_arr[$i];
			$amt = $amt_arr[$i];
			if ($type == "Purchase") {
				$amt = "-" . $amt_arr[$i];
			}
			if ($item_arr[0] == "" && $amt_arr[0] != "") {

				$xml = '  <ALLLEDGERENTRIES.LIST>
       <OLDAUDITENTRYIDS.LIST TYPE="Number">
        <OLDAUDITENTRYIDS>-1</OLDAUDITENTRYIDS>
       </OLDAUDITENTRYIDS.LIST>
	   <ISPARTYLEDGER>No</ISPARTYLEDGER>
       <LEDGERNAME>' . $ledger . '</LEDGERNAME>
       <GSTCLASS/>
	   
       <ISDEEMEDPOSITIVE>No</ISDEEMEDPOSITIVE>
       <LEDGERFROMITEM>No</LEDGERFROMITEM>
       <REMOVEZEROENTRIES>No</REMOVEZEROENTRIES>
       <ISPARTYLEDGER>No</ISPARTYLEDGER>
       <ISLASTDEEMEDPOSITIVE>No</ISLASTDEEMEDPOSITIVE>
       <ISCAPVATTAXALTERED>No</ISCAPVATTAXALTERED>
       <ISCAPVATNOTCLAIMED>No</ISCAPVATNOTCLAIMED>
       <AMOUNT>' . $amt . '</AMOUNT>
      </ALLLEDGERENTRIES.LIST>';
				return $xml;
			} else {
				$bxml .= '
			<INVENTORYALLOCATIONS.LIST>
			<STOCKITEMNAME>' . $item . '</STOCKITEMNAME>
			<ISDEEMEDPOSITIVE>No</ISDEEMEDPOSITIVE>
        <ISLASTDEEMEDPOSITIVE>No</ISLASTDEEMEDPOSITIVE>
        <ISAUTONEGATE>No</ISAUTONEGATE>
        <ISCUSTOMSCLEARANCE>No</ISCUSTOMSCLEARANCE>
        <ISTRACKCOMPONENT>No</ISTRACKCOMPONENT>
        <ISTRACKPRODUCTION>No</ISTRACKPRODUCTION>
        <ISPRIMARYITEM>No</ISPRIMARYITEM>
        <ISSCRAP>No</ISSCRAP>
			<AMOUNT>' . $amt . '</AMOUNT>
			<ACTUALQTY>' . $quantity . '</ACTUALQTY>
			<BILLEDQTY>' . $quantity . '</BILLEDQTY>
			<RATE>' . $rate . '</RATE>
			<BATCHALLOCATIONS.LIST>
			 <GODOWNNAME>Main Location</GODOWNNAME>
			 <BATCHNAME>Primary Batch</BATCHNAME>
			 <INDENTNO/>
			 <ORDERNO/>
			 <TRACKINGNUMBER/>
			 <DYNAMICCSTISCLEARED>No</DYNAMICCSTISCLEARED>
			 <AMOUNT>100.00</AMOUNT>
			</BATCHALLOCATIONS.LIST>
		   </INVENTORYALLOCATIONS.LIST>
			';
			}
		}
		$xml = '<ALLLEDGERENTRIES.LIST>
       <OLDAUDITENTRYIDS.LIST TYPE="Number">
        <OLDAUDITENTRYIDS>-1</OLDAUDITENTRYIDS>
       </OLDAUDITENTRYIDS.LIST>
       <LEDGERNAME>' . $ledger . '</LEDGERNAME>
       <GSTCLASS/>
	   
     <ISDEEMEDPOSITIVE>Yes</ISDEEMEDPOSITIVE>
       <LEDGERFROMITEM>No</LEDGERFROMITEM>
       <REMOVEZEROENTRIES>No</REMOVEZEROENTRIES>
       <ISPARTYLEDGER>No</ISPARTYLEDGER>
       <ISLASTDEEMEDPOSITIVE>Yes</ISLASTDEEMEDPOSITIVE>
       <ISCAPVATTAXALTERED>No</ISCAPVATTAXALTERED>
       <ISCAPVATNOTCLAIMED>No</ISCAPVATNOTCLAIMED>
       <AMOUNT>' . $allamt . '</AMOUNT>
       ' . $bxml . '
      </ALLLEDGERENTRIES.LIST>';
		return $xml;
	}

	function get_ledger_with_item_xml_purchaseITEM($ledger, $item_arr, $rate_arr, $quantity_arr, $amt_arr, $allamt, $type)
	{

		$count = count($item_arr);
		$bxml = "";

		for ($i = 0; $i < $count; $i++) {
			$quantity = $quantity_arr[$i];
			$rate = $rate_arr[$i];
			$item = $item_arr[$i];
			$amt = $amt_arr[$i];
			if ($type == "Purchase") {
				$amt = "-" . $amt_arr[$i];
			}
			$bxml .= '<ALLINVENTORYENTRIES.LIST>
       <STOCKITEMNAME>' . $ledger . '</STOCKITEMNAME>
       <ISDEEMEDPOSITIVE>Yes</ISDEEMEDPOSITIVE>
       <ISLASTDEEMEDPOSITIVE>Yes</ISLASTDEEMEDPOSITIVE>
       <ISAUTONEGATE>No</ISAUTONEGATE>
       <ISCUSTOMSCLEARANCE>No</ISCUSTOMSCLEARANCE>
       <ISTRACKCOMPONENT>No</ISTRACKCOMPONENT>
       <ISTRACKPRODUCTION>No</ISTRACKPRODUCTION>
       <ISPRIMARYITEM>No</ISPRIMARYITEM>
       <ISSCRAP>No</ISSCRAP>
       <RATE>' . $rate . '</RATE>
       <AMOUNT>' . $amt . '</AMOUNT>
       <ACTUALQTY>' . $quantity . ' </ACTUALQTY>
       <BILLEDQTY>' . $quantity . ' </BILLEDQTY>
       <BATCHALLOCATIONS.LIST>
        <GODOWNNAME>Main Location</GODOWNNAME>
        <BATCHNAME>Primary Batch</BATCHNAME>
        <INDENTNO/>
        <ORDERNO/>
        <TRACKINGNUMBER/>
        <DYNAMICCSTISCLEARED>No</DYNAMICCSTISCLEARED>
        <AMOUNT>' . $amt . '</AMOUNT>
        <ACTUALQTY> ' . $quantity . '</ACTUALQTY>
        <BILLEDQTY> ' . $quantity . '</BILLEDQTY>
        <ADDITIONALDETAILS.LIST>        </ADDITIONALDETAILS.LIST>
        <VOUCHERCOMPONENTLIST.LIST>        </VOUCHERCOMPONENTLIST.LIST>
       </BATCHALLOCATIONS.LIST>
       <ACCOUNTINGALLOCATIONS.LIST>
        <OLDAUDITENTRYIDS.LIST TYPE="Number">
         <OLDAUDITENTRYIDS>-1</OLDAUDITENTRYIDS>
        </OLDAUDITENTRYIDS.LIST>
        <GSTCLASS/>
        <ISDEEMEDPOSITIVE>Yes</ISDEEMEDPOSITIVE>
        <LEDGERFROMITEM>No</LEDGERFROMITEM>
        <REMOVEZEROENTRIES>No</REMOVEZEROENTRIES>
        <ISPARTYLEDGER>No</ISPARTYLEDGER>
        <ISLASTDEEMEDPOSITIVE>Yes</ISLASTDEEMEDPOSITIVE>
        <ISCAPVATTAXALTERED>No</ISCAPVATTAXALTERED>
        <ISCAPVATNOTCLAIMED>No</ISCAPVATNOTCLAIMED>
        <AMOUNT>' . $allamt . '</AMOUNT>
       </ACCOUNTINGALLOCATIONS.LIST>
      </ALLINVENTORYENTRIES.LIST>';
		}

		return $bxml;
	}

	function get_tax_xml_new_purchase($taxname, $taxper, $taxamt, $amount, $type)
	{

		$xml = '<ALLLEDGERENTRIES.LIST>
       <OLDAUDITENTRYIDS.LIST TYPE="Number">
        <OLDAUDITENTRYIDS>-1</OLDAUDITENTRYIDS>
       </OLDAUDITENTRYIDS.LIST>
	   <ISPARTYLEDGER>No</ISPARTYLEDGER>
       <LEDGERNAME>' . $taxname . '</LEDGERNAME>
	   <GSTCLASS/>
       <ISDEEMEDPOSITIVE>Yes</ISDEEMEDPOSITIVE>
       <LEDGERFROMITEM>No</LEDGERFROMITEM>
       <REMOVEZEROENTRIES>No</REMOVEZEROENTRIES>
       <ISPARTYLEDGER>No</ISPARTYLEDGER>
       <ISLASTDEEMEDPOSITIVE>Yes</ISLASTDEEMEDPOSITIVE>
       <ISCAPVATTAXALTERED>No</ISCAPVATTAXALTERED>
       <ISCAPVATNOTCLAIMED>No</ISCAPVATNOTCLAIMED>
       <UDF:RATEOFINVOICETAX.LIST DESC="RATEOFINVOICETAX" ISLIST="YES">
<UDF:RATEOFINVOICETAX DESC="`RATEOFINVOICETAX`">' . $taxper . '</UDF:RATEOFINVOICETAX>
</UDF:RATEOFINVOICETAX.LIST>
       <AMOUNT>' . $taxamt . '</AMOUNT>
       <VATEXPAMOUNT>' . $taxamt . '</VATEXPAMOUNT>
      </ALLLEDGERENTRIES.LIST>';
		return $xml;
	}

	public function voucher_number()
	{
		$random_number = rand(1000, 100000);
		$query = $this->db->query("select voucher_id from tally_user_combo_table where voucher_id='$random_number'");
		if ($this->db->affected_rows() > 0) {
			$voucher_number = $this->voucher_number();
		} else {
			$voucher_number = $random_number;
		}
		return $voucher_number;
	}

	public function add_journal()
	{
		$company_id = $this->input->post('Jcompany_name');
		$date = $this->input->post('Jdate');
		$date = date('Ymd', strtotime($date));
		$narration = $this->input->post('Jnarration');
		$count = $this->input->post('Jdiv_count') + 1;

		$voucher_number = $this->voucher_number();
		$md_xml = '';
		for ($i = 0; $i < $count; $i++) {
			$type = $this->input->post('Jvctype' . $i);//Jvctype
			$Amount = $this->input->post('JVamt' . $i);//Jvctype
			$ledger = $this->input->post('jledger' . $i);//Jvctype
			if ($type == 'dr') {
				$md_xml .= '<ALLLEDGERENTRIES.LIST> 
       <OLDAUDITENTRYIDS.LIST TYPE="Number">
        <OLDAUDITENTRYIDS>-1</OLDAUDITENTRYIDS>
       </OLDAUDITENTRYIDS.LIST>
       <LEDGERNAME>' . $ledger . '</LEDGERNAME>
       <GSTCLASS/>
       <ISDEEMEDPOSITIVE>Yes</ISDEEMEDPOSITIVE>
       <LEDGERFROMITEM>No</LEDGERFROMITEM>
       <REMOVEZEROENTRIES>No</REMOVEZEROENTRIES>
       <ISPARTYLEDGER>No</ISPARTYLEDGER>
       <ISLASTDEEMEDPOSITIVE>Yes</ISLASTDEEMEDPOSITIVE>
       <ISCAPVATTAXALTERED>No</ISCAPVATTAXALTERED>
       <ISCAPVATNOTCLAIMED>No</ISCAPVATNOTCLAIMED>
       <AMOUNT>-' . $Amount . '</AMOUNT>
       <VATEXPAMOUNT>-' . $Amount . '</VATEXPAMOUNT>
		</ALLLEDGERENTRIES.LIST>';
			} else {
				$md_xml .= ' <ALLLEDGERENTRIES.LIST>
       <OLDAUDITENTRYIDS.LIST TYPE="Number">
        <OLDAUDITENTRYIDS>-1</OLDAUDITENTRYIDS>
       </OLDAUDITENTRYIDS.LIST>
       <LEDGERNAME>' . $ledger . '</LEDGERNAME>
       <GSTCLASS/>
       <ISDEEMEDPOSITIVE>No</ISDEEMEDPOSITIVE>
       <LEDGERFROMITEM>No</LEDGERFROMITEM>
       <REMOVEZEROENTRIES>No</REMOVEZEROENTRIES>
       <ISPARTYLEDGER>No</ISPARTYLEDGER>
       <ISLASTDEEMEDPOSITIVE>No</ISLASTDEEMEDPOSITIVE>
       <ISCAPVATTAXALTERED>No</ISCAPVATTAXALTERED>
       <ISCAPVATNOTCLAIMED>No</ISCAPVATNOTCLAIMED>
       <AMOUNT>' . $Amount . '</AMOUNT>
       <VATEXPAMOUNT>' . $Amount . '</VATEXPAMOUNT>
       
      </ALLLEDGERENTRIES.LIST>';
			}
		}

		$xml = '<ENVELOPE>
 <HEADER>
  <TALLYREQUEST>Import Data</TALLYREQUEST>
 </HEADER>
 <BODY>
  <IMPORTDATA>
   <REQUESTDESC>
    <REPORTNAME>Vouchers</REPORTNAME>
    <STATICVARIABLES>
     <SVCURRENTCOMPANY>' . $company_id . '</SVCURRENTCOMPANY>
    </STATICVARIABLES>
   </REQUESTDESC>
   <REQUESTDATA>
    <TALLYMESSAGE xmlns:UDF="TallyUDF">
     <VOUCHER  VCHTYPE="Journal" ACTION="Create" OBJVIEW="Accounting Voucher View">
      <OLDAUDITENTRYIDS.LIST TYPE="Number">
       <OLDAUDITENTRYIDS>-1</OLDAUDITENTRYIDS>
      </OLDAUDITENTRYIDS.LIST>
      <DATE>' . $date . '</DATE>
      <GUID>66f8e992-76cf-41b2-a2c0-5882c63f7460-00000f52</GUID>
	  <NARRATION>' . $narration . '</NARRATION>
      <VOUCHERTYPENAME>Journal</VOUCHERTYPENAME>
      <VOUCHERNUMBER>' . $voucher_number . '</VOUCHERNUMBER>
      <CSTFORMISSUETYPE/>
      <CSTFORMRECVTYPE/>
      <VCHGSTCLASS/>
      <EFFECTIVEDATE>' . $date . '</EFFECTIVEDATE>
      ' . $md_xml . '
     
      
     </VOUCHER>
    </TALLYMESSAGE>
    
   </REQUESTDATA>
  </IMPORTDATA>
 </BODY>
</ENVELOPE>
';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->url);
// Following line is compulsary to add as it is:
		curl_setopt($ch, CURLOPT_POSTFIELDS, "xmlRequest=" . $xml);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);
		$data = curl_exec($ch);
		//var_dump($data);

		$xml = simplexml_load_string($data);
		$json = json_encode($xml);
		$array = json_decode($json, TRUE);

		if ($array['CREATED'] == 1) {
			$response['status'] = 200;
			$user_id = $this->session->user_session->user_id;
			$file_id = $this->input->post('file_id');
			$data = array("voucher_id" => $voucher_number,
				"user_id" => $user_id,
				"file_id" => $file_id
			);
			$insert = $this->db->insert("tally_user_combo_table", $data);
		} else {
			if (!array_key_exists('LINEERROR', $array)) {
				$response['error'] = "please try again later";
			} else {
				$response['error'] = $array['LINEERROR'];
			}

			$response['status'] = 201;
		}
		curl_close($ch);
		echo json_encode($response);
	}

	function add_receipt()
	{
		$company_id = $this->input->post('company_name');
		$party_ledger = $this->input->post('party_ledger');

		$date = $this->input->post('date');
		$date = date('Ymd', strtotime($date));
		$invoiceno = $this->input->post('invoiceno');
		$amount = $this->input->post('amount');
		$narration = $this->input->post('narration');
		$bank_name = $this->input->post('bank_name');
		$vtype = $this->input->post('vtype');
		$invoice = $this->input->post('invoice');
		$div_count = ($this->input->post('div_count1')) + 1;
		$get_item_xml = '';
		for ($i = 0; $i < $div_count; $i++) {
			$ledger = $this->input->post('ledger' . $i);
			//array of all items details
			$item_name = $this->input->post('item_name' . $i);
			$quantity = $this->input->post('quantity' . $i);
			$rate = $this->input->post('rate' . $i);
			$amt = $this->input->post('amt' . $i);
			$Rtype = $this->input->post('Rtype' . $i);
			$allamt = array_sum($amt);
			if ($vtype == "Debit Note" || $vtype == "Credit Note") {
				$get_item_xml .= $this->get_ledger_receipt($ledger, $item_name, $rate, $quantity, $amt, $allamt, $Rtype);
			} else {
				$get_item_xml .= $this->get_ledger_receiptoth($ledger, $item_name, $rate, $quantity, $amt[0], $allamt, $Rtype);
			}

		}
		if ($vtype == "Debit Note" || $vtype == "Credit Note") {

			$xml = '<ENVELOPE>
 <HEADER>
  <TALLYREQUEST>Import Data</TALLYREQUEST>
 </HEADER>
 <BODY>
  <IMPORTDATA>
   <REQUESTDESC>
    <REPORTNAME>Vouchers</REPORTNAME>
    <STATICVARIABLES>
	
     <SVCURRENTCOMPANY>' . $company_id . '</SVCURRENTCOMPANY>
    </STATICVARIABLES>
   </REQUESTDESC>
   <REQUESTDATA>
    <TALLYMESSAGE xmlns:UDF="TallyUDF">
     <VOUCHER  VCHTYPE="' . $vtype . '" ACTION="Create" OBJVIEW="Accounting Voucher View">
     
      <OLDAUDITENTRYIDS.LIST TYPE="Number">
       <OLDAUDITENTRYIDS>-1</OLDAUDITENTRYIDS>
      </OLDAUDITENTRYIDS.LIST>
      <DATE>' . $date . '</DATE>
      
      <GUID>66f8e992-76cf-41b2-a2c0-5882c63f7460-00000f63</GUID>
      <STATENAME>Maharashtra</STATENAME>
      <COUNTRYOFRESIDENCE>India</COUNTRYOFRESIDENCE>
      <PLACEOFSUPPLY>Maharashtra</PLACEOFSUPPLY>
      <PARTYLEDGERNAME>' . $party_ledger . '</PARTYLEDGERNAME>
      <VOUCHERTYPENAME>' . $vtype . '</VOUCHERTYPENAME>
      <REFERENCE>' . $invoice . '</REFERENCE>
      <VOUCHERNUMBER>' . $this->voucher_number() . '</VOUCHERNUMBER>
      <BASICBASEPARTYNAME>' . $party_ledger . '</BASICBASEPARTYNAME>
      <CSTFORMISSUETYPE/>
      <CSTFORMRECVTYPE/>
      <FBTPAYMENTTYPE>Default</FBTPAYMENTTYPE>
      <PERSISTEDVIEW>Accounting Voucher View</PERSISTEDVIEW>
      <BASICBUYERNAME>' . $party_ledger . '</BASICBUYERNAME>
      <VCHGSTCLASS/>
	  ' . $get_item_xml . '
	  
	  <PAYROLLMODEOFPAYMENT.LIST>      </PAYROLLMODEOFPAYMENT.LIST>
      <ATTDRECORDS.LIST>      </ATTDRECORDS.LIST>
      <GSTEWAYCONSIGNORADDRESS.LIST>      </GSTEWAYCONSIGNORADDRESS.LIST>
      <GSTEWAYCONSIGNEEADDRESS.LIST>      </GSTEWAYCONSIGNEEADDRESS.LIST>
      <TEMPGSTRATEDETAILS.LIST>      </TEMPGSTRATEDETAILS.LIST>
     </VOUCHER>
    </TALLYMESSAGE>
	</REQUESTDATA>
  </IMPORTDATA>
 </BODY>
</ENVELOPE>
	';
		} else {

			$xml = '<ENVELOPE>
 <HEADER>
  <TALLYREQUEST>Import Data</TALLYREQUEST>
 </HEADER>
 <BODY>
  <IMPORTDATA>
   <REQUESTDESC>
    <REPORTNAME>Vouchers</REPORTNAME>
    <STATICVARIABLES>
     <SVCURRENTCOMPANY>' . $company_id . '</SVCURRENTCOMPANY>
    </STATICVARIABLES>
   </REQUESTDESC>
   <REQUESTDATA>
    <TALLYMESSAGE xmlns:UDF="TallyUDF">
     <VOUCHER  VCHTYPE="' . $vtype . '" ACTION="Create" OBJVIEW="Accounting Voucher View">
      <OLDAUDITENTRYIDS.LIST TYPE="Number">
       <OLDAUDITENTRYIDS>-1</OLDAUDITENTRYIDS>
      </OLDAUDITENTRYIDS.LIST>
      <DATE>' . $date . '</DATE>
      <GUID>66f8e992-76cf-41b2-a2c0-5882c63f7460-00000f5a</GUID>
      <NARRATION>' . $narration . '</NARRATION>
      <PARTYLEDGERNAME>' . $party_ledger . '</PARTYLEDGERNAME>
      <VOUCHERTYPENAME>' . $vtype . '</VOUCHERTYPENAME> 
	  <REFERENCE>' . $invoice . '</REFERENCE>
      <VOUCHERNUMBER>' . $voucher_number = $this->voucher_number() . '</VOUCHERNUMBER>
      <CSTFORMISSUETYPE/>
      <CSTFORMRECVTYPE/>
      <FBTPAYMENTTYPE>Default</FBTPAYMENTTYPE>
      <PERSISTEDVIEW>Accounting Voucher View</PERSISTEDVIEW>
      <VCHGSTCLASS/>
      ' . $get_item_xml . '
    
      <PAYROLLMODEOFPAYMENT.LIST>      </PAYROLLMODEOFPAYMENT.LIST>
      <ATTDRECORDS.LIST>      </ATTDRECORDS.LIST>
      <GSTEWAYCONSIGNORADDRESS.LIST>      </GSTEWAYCONSIGNORADDRESS.LIST>
      <GSTEWAYCONSIGNEEADDRESS.LIST>      </GSTEWAYCONSIGNEEADDRESS.LIST>
      <TEMPGSTRATEDETAILS.LIST>      </TEMPGSTRATEDETAILS.LIST>
     </VOUCHER>
    </TALLYMESSAGE>
    
    
   </REQUESTDATA>
  </IMPORTDATA>
 </BODY>
</ENVELOPE>
';

		}


		/*echo $xml;
		exit;*/

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->url);
// Following line is compulsary to add as it is:
		curl_setopt($ch, CURLOPT_POSTFIELDS, "xmlRequest=" . $xml);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);
		$data = curl_exec($ch);
		// var_dump($data);
		$xml = simplexml_load_string($data);
		$json = json_encode($xml);
		$array = json_decode($json, TRUE);
		//var_dump($array);
		if ($array['CREATED'] == 1) {
			$response['status'] = 200;
			$user_id = $this->session->user_session->user_id;
			$file_id = $this->input->post('file_id');
			$data = array("voucher_id" => $voucher_number,
				"user_id" => $user_id,
				"file_id" => $file_id
			);
			$insert = $this->db->insert("tally_user_combo_table", $data);
		} else {
			if (!array_key_exists('LINEERROR', $array)) {
				$response['error'] = "please try again later";
			} else {
				$response['error'] = $array['LINEERROR'];
			}
			$response['status'] = 201;
		}
		curl_close($ch);
		echo json_encode($response);
	}

	function get_ledger_receipt($ledger, $item_arr, $rate, $quantity, $amt_arr, $allamt, $type)
	{
		$count = count($item_arr);
		$bxml = "";

		for ($i = 0; $i < $count; $i++) {
			$item = $item_arr[$i];
			$amt = $amt_arr[$i];
			$aa = '<ISDEEMEDPOSITIVE>No</ISDEEMEDPOSITIVE>
       <LEDGERFROMITEM>No</LEDGERFROMITEM>
       <REMOVEZEROENTRIES>No</REMOVEZEROENTRIES>
       <ISPARTYLEDGER>No</ISPARTYLEDGER>
       <ISLASTDEEMEDPOSITIVE>No</ISLASTDEEMEDPOSITIVE>
       <ISCAPVATTAXALTERED>No</ISCAPVATTAXALTERED>
       <ISCAPVATNOTCLAIMED>No</ISCAPVATNOTCLAIMED>';
			$pp = ' <ISDEEMEDPOSITIVE>No</ISDEEMEDPOSITIVE>
        <ISLASTDEEMEDPOSITIVE>No</ISLASTDEEMEDPOSITIVE>
        <ISAUTONEGATE>No</ISAUTONEGATE>
        <ISCUSTOMSCLEARANCE>No</ISCUSTOMSCLEARANCE>
        <ISTRACKCOMPONENT>No</ISTRACKCOMPONENT>
        <ISTRACKPRODUCTION>No</ISTRACKPRODUCTION>
        <ISPRIMARYITEM>No</ISPRIMARYITEM>';
			if ($type == "dr") {
				$amt = "-" . $amt_arr[$i];
				$aa = '<ISDEEMEDPOSITIVE>Yes</ISDEEMEDPOSITIVE>
       <LEDGERFROMITEM>No</LEDGERFROMITEM>
       <REMOVEZEROENTRIES>No</REMOVEZEROENTRIES>
       <ISPARTYLEDGER>No</ISPARTYLEDGER>
       <ISLASTDEEMEDPOSITIVE>Yes</ISLASTDEEMEDPOSITIVE>
       <ISCAPVATTAXALTERED>No</ISCAPVATTAXALTERED>
       <ISCAPVATNOTCLAIMED>No</ISCAPVATNOTCLAIMED>';
				$pp = ' <ISDEEMEDPOSITIVE>Yes</ISDEEMEDPOSITIVE>
        <ISLASTDEEMEDPOSITIVE>Yes</ISLASTDEEMEDPOSITIVE>
        <ISAUTONEGATE>No</ISAUTONEGATE>
        <ISCUSTOMSCLEARANCE>No</ISCUSTOMSCLEARANCE>
        <ISTRACKCOMPONENT>No</ISTRACKCOMPONENT>
        <ISTRACKPRODUCTION>No</ISTRACKPRODUCTION>
        <ISPRIMARYITEM>No</ISPRIMARYITEM>';
			}

			if ($item_arr[0] == "" && $amt_arr[0] != "") {

				$xml = ' 
	    <ALLLEDGERENTRIES.LIST>
       <OLDAUDITENTRYIDS.LIST TYPE="Number">
        <OLDAUDITENTRYIDS>-1</OLDAUDITENTRYIDS>
       </OLDAUDITENTRYIDS.LIST>
       <LEDGERNAME>' . $ledger . '</LEDGERNAME>
       <GSTCLASS/>
       ' . $aa . '
       <AMOUNT>' . $amt . '</AMOUNT>
       <VATEXPAMOUNT>' . $amt . '</VATEXPAMOUNT>
      </ALLLEDGERENTRIES.LIST>';
				return $xml;
			} else {

				$bxml .= '
			  <INVENTORYALLOCATIONS.LIST>
        <STOCKITEMNAME>' . $item . '</STOCKITEMNAME>
       ' . $pp . '
        <ISSCRAP>No</ISSCRAP>
        <AMOUNT>' . $amt . '</AMOUNT>
        <BATCHALLOCATIONS.LIST>
         <GODOWNNAME>Main Location</GODOWNNAME>
         <BATCHNAME>Primary Batch</BATCHNAME>
         <INDENTNO/>
         <ORDERNO/>
         <TRACKINGNUMBER/>
         <DYNAMICCSTISCLEARED>No</DYNAMICCSTISCLEARED>
         <AMOUNT>' . $amt . '</AMOUNT>
         <ADDITIONALDETAILS.LIST>         </ADDITIONALDETAILS.LIST>
         <VOUCHERCOMPONENTLIST.LIST>         </VOUCHERCOMPONENTLIST.LIST>
        </BATCHALLOCATIONS.LIST>
       </INVENTORYALLOCATIONS.LIST>
			';
			}
		}


		$xml = '<ALLLEDGERENTRIES.LIST>
       <OLDAUDITENTRYIDS.LIST TYPE="Number">
        <OLDAUDITENTRYIDS>-1</OLDAUDITENTRYIDS>
       </OLDAUDITENTRYIDS.LIST>
       <LEDGERNAME>' . $ledger . '</LEDGERNAME>
       <GSTCLASS/>
       <AMOUNT>' . $allamt . '</AMOUNT>
       <VATEXPAMOUNT>' . $allamt . '</VATEXPAMOUNT>
	   ' . $bxml . '
      </ALLLEDGERENTRIES.LIST>';
		return $xml;
	}

	function get_ledger_receiptoth($ledger, $item_arr, $rate, $quantity, $amt_arr, $allamt, $type)
	{
		//$count = count($item_arr);
		$bxml = "";
		if ($type == "dr") {
			$amt = "-" . $amt_arr;
		} else {
			$amt = $amt_arr;
		}


		$xml = '<ALLLEDGERENTRIES.LIST>
       <OLDAUDITENTRYIDS.LIST TYPE="Number">
        <OLDAUDITENTRYIDS>-1</OLDAUDITENTRYIDS>
       </OLDAUDITENTRYIDS.LIST>
       <LEDGERNAME>' . $ledger . '</LEDGERNAME>
       <GSTCLASS/>
       <AMOUNT>' . $amt . '</AMOUNT>
       <VATEXPAMOUNT>' . $amt . '</VATEXPAMOUNT>
      </ALLLEDGERENTRIES.LIST>';
		return $xml;
	}

	function get_customers_invoice()
	{
		$firm_id = $this->session->user_session->firm_id;

		$query = $this->db->query("select distinct customer_id,(select customer_name from customer_master_data cm where cm.customer_id = dm.customer_id 
		AND cm.customer_id=(select customer_id from customer_mapping_data where firm_id='$firm_id')) as customer_name from document_management_table dm");
		$option = "<option value=''>Select Customer</option>";
		if ($this->db->affected_rows() > 0) {
			$result = $query->result();
			foreach ($result as $row) {
				if ($row->customer_name != "") {
					$option .= "<option value=" . $row->customer_id . ">" . $row->customer_name . "</option>";
				}
			}
			$response['code'] = 200;
			$response['option'] = $option;
		} else {
			$response['code'] = 201;
			$response['option'] = $option;
		}
		echo json_encode($response);
	}


}
