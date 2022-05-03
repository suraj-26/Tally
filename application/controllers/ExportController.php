<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ExportController extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('url');
	}

	public $url = SERVER_IP;

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 * 	- or -
	 * 		http://example.com/index.php/welcome/index
	 * 	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function getbs() {
		$this->load->view('Export_data/get_balancesheet');
	}

	public function getratioanalysis() {
		$this->load->view('Export_data/get_ratioanalysis');
	}

	public function profitlossac() {
		$this->load->view('Export_data/get_profitloss');
	}

	public function exportgeneral(){
		$from_date=$this->input->post('from_date');
		$to_date=$this->input->post('to_date');
		$company_id=$this->input->post('company_name');
		/*$mon = str_pad($mon, 2, "0", STR_PAD_LEFT);
		$year = date("Y");
		$a_date = $year."-".$mon."-01";
		$last_date= date("Ymt", strtotime($a_date));
		$a_date = $year.$mon."01";*/
		$requestXML='<!--Option: Gateway of Tally @Display @Account Books @Journal Register-->
<ENVELOPE>
<HEADER>
<TALLYREQUEST>Export Data</TALLYREQUEST>
</HEADER>
<BODY>
<EXPORTDATA>
<REQUESTDESC>
<STATICVARIABLES>
            <SVCURRENTCOMPANY>{'.$company_id.'}</SVCURRENTCOMPANY>
<!--Specify the Period here-->
<SVFROMDATE>'.date('d-M-Y',strtotime($from_date)).'</SVFROMDATE>
<SVTODATE>'.date('d-M-Y',strtotime($to_date)).'</SVTODATE>


<VOUCHERTYPENAME>Journal</VOUCHERTYPENAME>

<!--Detailed or Condensed Format-->
<EXPLODEFLAG>No</EXPLODEFLAG>

<!--Specify the Report FORMAT here-->
<SVEXPORTFORMAT>$$SysName:HTML</SVEXPORTFORMAT>
</STATICVARIABLES>

<!--Specify the Report Name here-->
<REPORTNAME>Voucher Register</REPORTNAME>
</REQUESTDESC>
</EXPORTDATA>
</BODY>
</ENVELOPE>';
		$headers = array("Content-type: application/json", "Accept: application/json", "Content-length:" . strlen($requestXML), "Connection: open");

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 100);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $requestXML);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		$data = curl_exec($ch);
		if (curl_errno($ch)) {
			print curl_error($ch);
			echo "  something went wrong..... try later";
			$response['data'] = $data;
		} else {
			$response['data'] = $data;
			$response['status'] = true;
		}echo json_encode($response);
	}
	public function exportsalepurchase(){
		$from_date=$this->input->post('from_date');
		$to_date=$this->input->post('to_date');
		$company_id=$this->input->post('company_name');
		$vctype1=$this->input->post('vctype1');
		/*$mon = str_pad($mon, 2, "0", STR_PAD_LEFT);
		$year = date("Y");
		$a_date = $year."-".$mon."-01";
		$last_date= date("Ymt", strtotime($a_date));
		$a_date = $year.$mon."01";*/
		$requestXML1='<!--Option: Gateway of Tally @Display @Account Books @Journal Register-->
<ENVELOPE>
<HEADER>
<TALLYREQUEST>Export Data</TALLYREQUEST>
</HEADER>
<BODY>
<EXPORTDATA>
<REQUESTDESC>
<STATICVARIABLES>
<SVFROMDATE>'.date('d-M-Y',strtotime($from_date)).'</SVFROMDATE>
<SVTODATE>'.date('d-M-Y',strtotime($to_date)).'</SVTODATE>
            <SVCURRENTCOMPANY>{'.$company_id.'}</SVCURRENTCOMPANY>
            <VOUCHERTYPENAME>'.$vctype1.'</VOUCHERTYPENAME>

<!--Detailed or Condensed Format-->
<EXPLODEFLAG>Yes</EXPLODEFLAG>
<DBBILLEXPLODEFLAG>Yes</DBBILLEXPLODEFLAG>
<DBINVEXPLODEFLAG>Yes</DBINVEXPLODEFLAG>

<!--Specify the Report FORMAT here-->
<SVEXPORTFORMAT>$$SysName:HTML</SVEXPORTFORMAT>
<!--Specify the Period here-->


</STATICVARIABLES>

<!--Specify the Report Name here-->
<REPORTNAME>Voucher Register</REPORTNAME>
</REQUESTDESC>
</EXPORTDATA>
</BODY>
</ENVELOPE>


';
		$requestXML='<!--Option: Gateway of Tally @Display @Account Books @Journal Register-->
<ENVELOPE>
<HEADER>
<TALLYREQUEST>Export Data</TALLYREQUEST>
</HEADER>
<BODY>
<EXPORTDATA>
<REQUESTDESC>
<STATICVARIABLES>
<SVFROMDATE>'.date('d-M-Y',strtotime($from_date)).'</SVFROMDATE>
<SVTODATE>'.date('d-M-Y',strtotime($to_date)).'</SVTODATE>
            <SVCURRENTCOMPANY>{'.$company_id.'}</SVCURRENTCOMPANY>
            <VOUCHERTYPENAME>'.$vctype1.'</VOUCHERTYPENAME>

<!--Detailed or Condensed Format-->
<EXPLODEFLAG>Yes</EXPLODEFLAG>
<DBBILLEXPLODEFLAG>Yes</DBBILLEXPLODEFLAG>
<DBINVEXPLODEFLAG>Yes</DBINVEXPLODEFLAG>

<!--Specify the Report FORMAT here-->
<SVEXPORTFORMAT>$$SysName:HTML</SVEXPORTFORMAT>
<!--Specify the Period here-->

<COLUMNARDAYBOOK>Yes</COLUMNARDAYBOOK>

</STATICVARIABLES>

<!--Specify the Report Name here-->
<REPORTNAME>Voucher Register</REPORTNAME>
</REQUESTDESC>
</EXPORTDATA>
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
		if (curl_errno($ch)) {
			print curl_error($ch);
			echo "  something went wrong..... try later";
			$response['data'] = $data;
		} else {
			$response['data'] = $data;
			$response['status'] = true;
		}echo json_encode($response);
	}

	public function get_balancesheet() {
		$company_id = $this->input->post('company_name');
		$fromDate = $this->input->post("fromDate");
		$toDate = $this->input->post("toDate");
		$toDate=date('d-M-Y',strtotime($toDate));
		$fromDate=date('d-M-Y',strtotime($fromDate));
//		<REPORTNAME>Balance Sheet</REPORTNAME>
		$requestXML = '<ENVELOPE>
<HEADER>
<TALLYREQUEST>Export Data</TALLYREQUEST>
</HEADER>
<BODY>
<EXPORTDATA>
<REQUESTDESC>
<STATICVARIABLES>

<!--To Fetch data in XML format-->
<SVCURRENTCOMPANY>' . $company_id . '</SVCURRENTCOMPANY>
<SVEXPORTFORMAT>$$SysName:HTML</SVEXPORTFORMAT>

<!--Specify the Period here-->
<SVFROMDATE>'.$fromDate.'</SVFROMDATE>
<SVTODATE>'.$toDate.'</SVTODATE>
<!--To Fetch data in HTML format, change the SVEXPORTFORMAT Tag value as -->
<!--$$SysName:HTML-->

</STATICVARIABLES>
<REPORTNAME>Balance Sheet</REPORTNAME>
</REQUESTDESC>
</EXPORTDATA>
</BODY>
</ENVELOPE>
    ';

		//$server = '192.168.1.25:9000';
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
//echo '<pre>', htmlentities($data), '</pre>';


		if (curl_errno($ch)) {
			print curl_error($ch);
			echo "  something went wrong..... try later";
			$response['data'] = $data;
		} else {
			$response['data'] = $data;
		}echo json_encode($response);
	}


	public function get_inventoryBooks() {
		$reportName = $this->input->post('reportName');
		$company_id = $this->input->post('company_name');
		$fromDate = $this->input->post("fromDate");
		$toDate = $this->input->post("toDate");
		$toDate=date('d-M-Y',strtotime($toDate));
		$fromDate=date('d-M-Y',strtotime($fromDate));
//		<REPORTNAME>Balance Sheet</REPORTNAME>
		$requestXML = '<ENVELOPE>
<HEADER>
<TALLYREQUEST>Export Data</TALLYREQUEST>
</HEADER>
<BODY>
<EXPORTDATA>
<REQUESTDESC>
<STATICVARIABLES>

<!--To Fetch data in XML format-->
<SVCURRENTCOMPANY>' . $company_id . '</SVCURRENTCOMPANY>
<SVEXPORTFORMAT>$$SysName:HTML</SVEXPORTFORMAT>

<!--Specify the Period here-->
<SVFROMDATE>'.$fromDate.'</SVFROMDATE>
<SVTODATE>'.$toDate.'</SVTODATE>

<!--To Fetch data in HTML format, change the SVEXPORTFORMAT Tag value as -->
<!--$$SysName:HTML-->
</STATICVARIABLES>
<REPORTNAME>'.$reportName.'</REPORTNAME>

</REQUESTDESC>
</EXPORTDATA>
</BODY>
</ENVELOPE>
    ';

		//$server = '192.168.1.25:9000';
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
//echo '<pre>', htmlentities($data), '</pre>';


		if (curl_errno($ch)) {
			print curl_error($ch);
			echo "  something went wrong..... try later";
			$response['data'] = $data;
		} else {
			$response['data'] = $data;
		}echo json_encode($response);
	}
	public function getListOFAccounts() {
		$company_id = $this->input->post('company_name');
		$requestXML = '<ENVELOPE>
<HEADER>
<TALLYREQUEST>Export Data</TALLYREQUEST>
</HEADER>
<BODY>
<EXPORTDATA>
<REQUESTDESC>
<STATICVARIABLES>

<!--To Fetch data in XML format-->
<SVCURRENTCOMPANY>' . $company_id . '</SVCURRENTCOMPANY>
<SVEXPORTFORMAT>$$SysName:HTML</SVEXPORTFORMAT>

<!--To Fetch data in HTML format, change the SVEXPORTFORMAT Tag value as -->
<!--$$SysName:HTML-->

</STATICVARIABLES>
<REPORTNAME>List of Accounts</REPORTNAME>
</REQUESTDESC>
</EXPORTDATA>
</BODY>
</ENVELOPE>
    ';
		//$server = '192.168.1.25:9000';
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
//echo '<pre>', htmlentities($data), '</pre>';


		if (curl_errno($ch)) {
			print curl_error($ch);
			echo "  something went wrong..... try later";
			$response['data'] = $data;
		} else {
			$response['data'] = $data;
		}echo json_encode($response);
	}
	public function get_DayBook() {
		$company_id = $this->input->post('company_name');
		$toDate = $this->input->post('toDate');
		$fromDate = $this->input->post('fromDate');
		 $toDate=date('d-M-Y',strtotime($toDate));
		 $fromDate=date('d-M-Y',strtotime($fromDate));
		$requestXML = '<ENVELOPE>
<HEADER>
<TALLYREQUEST>Export Data</TALLYREQUEST>
</HEADER>
<BODY>
<EXPORTDATA>
<REQUESTDESC>
<STATICVARIABLES>
<SVCURRENTCOMPANY>' . $company_id . '</SVCURRENTCOMPANY>
<SVEXPORTFORMAT>$$SysName:HTML</SVEXPORTFORMAT>
<!--Specify the Period here-->
<SVFROMDATE>'.$fromDate.'</SVFROMDATE>
<SVTODATE>'.$toDate.'</SVTODATE>
</STATICVARIABLES>
<!--Specify the Report Name here-->
<REPORTNAME>Voucher Register</REPORTNAME>
</REQUESTDESC>
</EXPORTDATA>
</BODY>
</ENVELOPE>
    ';
		//$server = '192.168.1.25:9000';
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
//echo '<pre>', htmlentities($data), '</pre>';


		if (curl_errno($ch)) {
			print curl_error($ch);
			echo "  something went wrong..... try later";
			$response['data'] = $data;
		} else {
			$response['data'] = $data;
		}echo json_encode($response);
	}

	public function get_TrialBalance() {
		$company_id = $this->input->post('company_name');
		$toDate = $this->input->post('toDate');
		$fromDate = $this->input->post('fromDate');
		 $toDate=date('d-M-Y',strtotime($toDate));
		 $fromDate=date('d-M-Y',strtotime($fromDate));
		$requestXML = '
<!--THIS WILL FETCH TRIAL BALANCE DETAILS PROGRAMMATICALLY-->
<!--WHICH IS EQUIVALENT TO USING THE FOLLOWING OPTION MANUALLY IN TALLY-->
<!--OPTION:-->
<!--Gateway of Tally @Display @Trial Balance-->
<ENVELOPE>
<HEADER>
<TALLYREQUEST>Export Data</TALLYREQUEST>
</HEADER>
<BODY>
<EXPORTDATA>
<REQUESTDESC>
<!--Specify the Report Name here-->
<REPORTNAME>Trial Balance</REPORTNAME>
<STATICVARIABLES>
<SVCURRENTCOMPANY>' . $company_id . '</SVCURRENTCOMPANY>


<!--This will fetch detailed TB-->


<EXPLODEALLLEVELS>YES</EXPLODEALLLEVELS>

<EXPLODEFLAG>YES</EXPLODEFLAG>
<SVEXPORTFORMAT>$$SysName:HTML</SVEXPORTFORMAT>
<SVFROMDATE>'.$fromDate.'</SVFROMDATE>
<SVTODATE>'.$toDate.'</SVTODATE>
</STATICVARIABLES>
</REQUESTDESC>
</EXPORTDATA>
</BODY>
</ENVELOPE>

    ';
		//$server = '192.168.1.25:9000';
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
//echo '<pre>', htmlentities($data), '</pre>';


		if (curl_errno($ch)) {
			print curl_error($ch);
			echo "  something went wrong..... try later";
			$response['data'] = $data;
		} else {
			$response['data'] = $data;
		}echo json_encode($response);
	}
	public function get_AccountBook() {
		$company_id = $this->input->post('company_name');
		$toDate = $this->input->post('toDate');
		$fromDate = $this->input->post('fromDate');
		$reportName = $this->input->post('reportName');
		$ledger = $this->input->post('ledger');
		$x='';
		if($ledger != ""){
			$x='<STOCKITEM>' . $ledger . '</STOCKITEM> ';
		}

		$exp=explode('-',$reportName);
		$reportName=$exp[0];
		$voucherType='';
		if(array_key_exists(1,$exp)){
			$voucherType=$exp[1];
		}

		 $toDate=date('d-M-Y',strtotime($toDate));
		 $fromDate=date('d-M-Y',strtotime($fromDate));
		$requestXML = '
<!--THIS WILL FETCH TRIAL BALANCE DETAILS PROGRAMMATICALLY-->
<!--WHICH IS EQUIVALENT TO USING THE FOLLOWING OPTION MANUALLY IN TALLY-->
<!--OPTION:-->
<!--Gateway of Tally @Display @Trial Balance-->
<ENVELOPE>
<HEADER>
<TALLYREQUEST>Export Data</TALLYREQUEST>
</HEADER>
<BODY>
<EXPORTDATA>
<REQUESTDESC>
<!--Specify the Report Name here-->
<REPORTNAME>'.$reportName.'</REPORTNAME>
<STATICVARIABLES>
<SVCURRENTCOMPANY>' . $company_id . '</SVCURRENTCOMPANY>
<SVEXPORTFORMAT>$$SysName:HTML</SVEXPORTFORMAT>
<SVFROMDATE>'.$fromDate.'</SVFROMDATE>
<SVTODATE>'.$toDate.'</SVTODATE>
<VOUCHERTYPENAME>'.$voucherType.'</VOUCHERTYPENAME>
'.$x.'
</STATICVARIABLES>
</REQUESTDESC>
</EXPORTDATA>
</BODY>
</ENVELOPE>

    ';
		//$server = '192.168.1.25:9000';
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
//echo '<pre>', htmlentities($data), '</pre>';


		if (curl_errno($ch)) {
			print curl_error($ch);
			echo "  something went wrong..... try later";
			$response['data'] = $data;
		} else {
			$response['data'] = $data;
		}echo json_encode($response);
	}

	public function get_ratioan() {
		$company_id = $this->input->post('company_name');
		$fromDate = $this->input->post('fromDate');
		$toDate = $this->input->post('toDate');
		$toDate=date('d-M-Y',strtotime($toDate));
		$fromDate=date('d-M-Y',strtotime($fromDate));
		$requestXML = '<!--THIS WILL FETCH RATIO ANALYSIS DETAILS PROGRAMMATICALLY-->
<!--WHICH IS EQUIVALENT TO USING THE FOLLOWING OPTION MANUALLY IN TALLY-->
<!--OPTION:-->
<!--Gateway of Tally @Ratio Analysis-->
<ENVELOPE>
<HEADER>
<TALLYREQUEST>Export Data</TALLYREQUEST>
</HEADER>
<BODY>
<EXPORTDATA>
<REQUESTDESC>
<STATICVARIABLES>
<SVCURRENTCOMPANY>' . $company_id . '</SVCURRENTCOMPANY>
<SVEXPORTFORMAT>$$SysName:HTML</SVEXPORTFORMAT>
<SVFROMDATE>'.$fromDate.'</SVFROMDATE>
<SVTODATE>'.$toDate.'</SVTODATE>
</STATICVARIABLES>
<REPORTNAME>Ratio Analysis</REPORTNAME>
</REQUESTDESC>
</EXPORTDATA>
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
//echo '<pre>', htmlentities($data), '</pre>';


		if (curl_errno($ch)) {
			print curl_error($ch);
			echo "  something went wrong..... try later";
			$response['data'] = $data;
		} else {
			$response['data'] = $data;
		}echo json_encode($response);
	}

	public function get_profitloss() {
		$company_id = $this->input->post('company_name');
		$requestXML = '<ENVELOPE>
  <HEADER>
    <TALLYREQUEST>Export Data</TALLYREQUEST>
  </HEADER>
  <BODY>
    <EXPORTDATA>
      <REQUESTDESC>
        <STATICVARIABLES>
        <SVCURRENTCOMPANY>' . $company_id . '</SVCURRENTCOMPANY>
          <SVEXPORTFORMAT>$$SysName:HTML</SVEXPORTFORMAT>
          <!--Specify the FROM DATE here -->
          <SVFROMDATE>20200401</SVFROMDATE>
          <!--Specify the TO DATE here -->
          <SVTODATE>20210430</SVTODATE>

        </STATICVARIABLES>
        <REPORTNAME>Profit and Loss</REPORTNAME>
      </REQUESTDESC>
    </EXPORTDATA>
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
//echo '<pre>', htmlentities($data), '</pre>';


		if (curl_errno($ch)) {
			print curl_error($ch);
			echo "  something went wrong..... try later";
			$response['data'] = $data;
		} else {
			$response['data'] = $data;
		}echo json_encode($response);
	}
	public function get_ledger_details() {
		$company_id = $this->input->post('company_name');
		$ledger_value = $this->input->post('value');
		$toDate = $this->input->post('toDate');
		$fromDate = $this->input->post('fromDate');
		$toDate=date('d-M-Y',strtotime($toDate));
		$fromDate=date('d-M-Y',strtotime($fromDate));
		$requestXML = '
<ENVELOPE> 
<HEADER> 
<TALLYREQUEST>Export Data</TALLYREQUEST> 
</HEADER> 
<BODY> 
<EXPORTDATA> 
<REQUESTDESC> 
<STATICVARIABLES> 
<SVCURRENTCOMPANY>' . $company_id . '</SVCURRENTCOMPANY>
<SVEXPORTFORMAT>$$SysName:HTML</SVEXPORTFORMAT>
<!-- Specify the period here -->
<SVFROMDATE>'.$fromDate.'</SVFROMDATE>
<SVTODATE>'.$toDate.'</SVTODATE>

<!-- F12 @ Show billwise is set to Yes -->
<DBBILLEXPLODEFLAG>YES</DBBILLEXPLODEFLAG>

<!-- Specify the Ledger Name here -->
<LEDGERNAME>' . $ledger_value . '</LEDGERNAME> 

</STATICVARIABLES>
<REPORTNAME>Ledger Vouchers</REPORTNAME>
</REQUESTDESC> 
</EXPORTDATA> 
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
//echo '<pre>', htmlentities($data), '</pre>';


		if (curl_errno($ch)) {
			print curl_error($ch);
			echo "  something went wrong..... try later";
			$response['data'] = $data;
		} else {
			$response['data'] = $data;
		}echo json_encode($response);
	}

	public function get_statutaryReport(){
//		var_dump($_POST);exit;
		$company_id = $this->input->post('company_name');
		$ledger_value = $this->input->post('value');
		$ledger_id = $this->input->post('ledger_id');
		$ledger = $this->input->post('ledger');
		$reportName = $this->input->post('reportName');
		$toDate = $this->input->post('toDate');
		$fromDate = $this->input->post('fromDate');
		$toDate=date('d-M-Y',strtotime($toDate));
		$fromDate=date('d-M-Y',strtotime($fromDate));
//		<REPORTNAME>'.$reportName.'</REPORTNAME>
		$requestXML = '
<ENVELOPE> 
<HEADER> 
<TALLYREQUEST>Export Data</TALLYREQUEST> 
</HEADER> 
<BODY> 
<EXPORTDATA> 
<REQUESTDESC> 
<STATICVARIABLES> 
<SVCURRENTCOMPANY>' . $company_id . '</SVCURRENTCOMPANY>
<SVEXPORTFORMAT>$$SysName:HTML</SVEXPORTFORMAT>
<!-- Specify the period here -->
<SVFROMDATE>'.$fromDate.'</SVFROMDATE>
<SVTODATE>'.$toDate.'</SVTODATE>

<!-- F12 @ Show billwise is set to Yes -->
<DBBILLEXPLODEFLAG>YES</DBBILLEXPLODEFLAG>

<!-- Specify the Ledger Name here -->
<LEDGERNAME>' . $ledger_id . '</LEDGERNAME> 

</STATICVARIABLES>
<REPORTNAME>'.$reportName.'</REPORTNAME>
</REQUESTDESC> 
</EXPORTDATA> 
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
//echo '<pre>', htmlentities($data), '</pre>';


		if (curl_errno($ch)) {
			print curl_error($ch);
			echo "  something went wrong..... try later";
			$response['data'] = $data;
		} else {
			$response['data'] = $data;
		}echo json_encode($response);
	}
}
