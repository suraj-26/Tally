<?php
require 'vendor/autoload.php';
defined('BASEPATH') OR exit('No direct script access allowed');

class ExportController extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->db2=$this->load->database('db2',true);
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

<!--Specify the Report FORMAT here-->
<SVEXPORTFORMAT>$$SysName:HTML</SVEXPORTFORMAT>
<!--Specify the Period here-->
<COLUMNARDAYBOOK>Yes</COLUMNARDAYBOOK>

<!--Set the SVColumntype variable here -->
<SVCOLUMNTYPE>$$SysName:AllItems</SVCOLUMNTYPE>

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

	function checkString($string,$key){
		if(is_string($string)){
			$result=$string;
		}else{
			if(array_key_exists($key,$string)){
				$result=(!is_array($string[$key])) ? ($string[$key]) : ("--");
			}else{
				$result="--";
			}
		}
		return $result;
	}
	public function get_AccountBook() {
		$company_id = $this->input->post('company_name');
		$toDate = $this->input->post('toDate');
		$fromDate = $this->input->post('fromDate');
		$reportName = $this->input->post('reportName');
		$ledger = $this->input->post('ledger');
		$ledgerWise = $this->input->post('ledgerWise');
		$groupName = $this->input->post('groupName');
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
if($reportName == 'Group Vouchers'){
	$x='<STOCKITEM>Shan Tech Healthcare</STOCKITEM> ';
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
<STATICVARIABLES>

<!--Specify the period here-->
<SVFROMDATE>'.$fromDate.'</SVFROMDATE>
<SVTODATE>'.$toDate.'</SVTODATE>
<!--Specify the Ledger Name here-->
<GROUPNAME>'.$groupName.'</GROUPNAME>
<!-- Display Narration -->
<EXPLODENARRFLAG>Yes</EXPLODENARRFLAG>

<!--Specify the Export format here  HTML or XML or SDF-->
<SVEXPORTFORMAT>$$SysName:XML</SVEXPORTFORMAT>


</STATICVARIABLES>

<!--Specify the Report Name here-->
<REPORTNAME>Group Vouchers</REPORTNAME>

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
	$xml = simplexml_load_string($data);
	$json = json_encode($xml);
	$array = json_decode($json, TRUE);

	if(count($array) > 0){
		if(!array_key_exists('DSPVCHDATE',$array)){
			$response['data']='No Data Found';
			echo json_encode($response);
			exit;
		}
		$date=$array['DSPVCHDATE'];
		$particular=$array['DSPVCHLEDACCOUNT'];
		$voucherTypes=$array['DSPVCHTYPE'];
		$DebitAmount=$array['DSPVCHDRAMT'];
		$creditAmount=$array['DSPVCHCRAMT'];
		$voucherNumber=$array['DSPVCHNARR'];

		$html = '<table class="table">
<thead>
<tr>
<th>Date</th>
<th>Particulars</th>
<th>Voucher Type</th>
<th>Debit Amount</th>
<th>Credit Amount</th>
<th>Voucher Number</th>
</tr>
</thead>
<tbody>
';
		$key=0;
		foreach ($date as $d){

			if(is_array($d)){

			}else{





				$particular1=$this->checkString($particular,$key);
				$voucherTypes1=$this->checkString($voucherTypes,$key);
				$DebitAmount1=$this->checkString($DebitAmount,$key);
				$creditAmount1=$this->checkString($creditAmount,$key);
				$creditAmount1=$this->checkString($creditAmount,$key);
				$voucherNumber1=$this->checkString($voucherNumber,$key);




				$html .='<tr>
<td>'.$d.'</td>
<td>'.$particular1.'</td>
<td>'.$voucherTypes1.'</td>
<td>'.$DebitAmount1.'</td>
<td>'.$creditAmount1.'</td>
<td>'.$voucherNumber1.'</td>
</tr>';
				$key++;
			}

		}
		$html .= '</tbody></table>';
		if(count($date) > 0){
			$response['data']=$html;
		}else{
			$response['data']=$html;
		}
	}else{
		$response['data']='No Data Found';
	}

	echo json_encode($response);
}
else if($reportName == "Bank Group summary" || $reportName == "Group Summary"){

	if($ledgerWise == 1){
		$requestXML ='<ENVELOPE>
  <HEADER>
    <TALLYREQUEST>Export Data</TALLYREQUEST>
  </HEADER>
  <BODY>
    <EXPORTDATA>
      <REQUESTDESC>
        <STATICVARIABLES>

          <!--Specify the Report FORMAT here-->
          <SVEXPORTFORMAT>$$SysName:XML</SVEXPORTFORMAT>

          <!-- Show Opening balances -->
          <DSPSHOWOPENING>Yes</DSPSHOWOPENING>

          <!-- Show Dr/Cr totals or only NET balance of Dr/Cr -->
          <DSPSHOWNETT>No</DSPSHOWNETT>
          <DSPSHOWTRANS>Yes</DSPSHOWTRANS>

          <!-- Month,3 Month, 6 Month, 12 Month-->
          <!-- Or specify Day for Daily breakup report-->
          <SVPERIODICITY>Month</SVPERIODICITY>

          <!-- Required for Monthly Summary Report-->
          <DSPSHOWMONTHLY>Yes</DSPSHOWMONTHLY>
          <DSPSHOWALLACCOUNTS>Yes</DSPSHOWALLACCOUNTS>

          <!--Specify the Period here. -->
        <SVFROMDATE>'.$fromDate.'</SVFROMDATE>
<SVTODATE>'.$toDate.'</SVTODATE>

          <!-- Specify the LedgerName here -->
          <LEDGERNAME>' . $ledger . '</LEDGERNAME>
        </STATICVARIABLES>

        <!-- Report Name -->
        <REPORTNAME>Ledger Monthly Summary</REPORTNAME>
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
		$xml = simplexml_load_string($data);
		$json = json_encode($xml);
		$array = json_decode($json, TRUE);

		$period=$array['DSPPERIOD'];
		$DSPACCINFO=$array['DSPACCINFO'];
		$html = '<table class="table">
<thead>
<tr>
<th>Particulars</th>
<th>Debit Amount</th>
<th>Credit Amount</th>
<th>Closing Balance</th>
</tr>
</thead>
<tbody>
';
		$key=0;
		foreach ($period as $item){
			$debit=$DSPACCINFO[$key]['DSPDRAMT']['DSPDRAMTA'];
			if(is_array($debit)){
				$debit='';
			}
			$credit=$DSPACCINFO[$key]['DSPCRAMT']['DSPCRAMTA'];
			if(is_array($credit)){
				$credit='';
			}
			$closingBalance=$DSPACCINFO[$key]['DSPCLAMT']['DSPCLAMTA'];
			if(is_array($closingBalance)){
				$closingBalance='';
			}
			$html .='<tr>
<td>'.$item.'</td>
<td>'.$debit.'</td>
<td>'.$credit.'</td>
<td>'.$closingBalance.'</td>
</tr>';
			$key++;
		}
//echo '<pre>', htmlentities($data), '</pre>';

		$html .= '</tbody></table>';
		if (curl_errno($ch)) {
			print curl_error($ch);
			echo "  something went wrong..... try later";
			$response['data'] = $html;
		} else {
			$response['data'] = $html;
		}echo json_encode($response);
	}else{
		$requestXML = '
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
<SVEXPORTFORMAT>$$SysName:XML</SVEXPORTFORMAT>
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
		$headers = array("Content-type: application/json", "Accept: application/json", "Content-length:" . strlen($requestXML), "Connection: open");

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 100);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $requestXML);

		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		$data = curl_exec($ch);
		$xml = simplexml_load_string($data);
		$json = json_encode($xml);
		$array = json_decode($json, TRUE);

		$bankAccounts=$array['DSPACCNAME'];
		$DSPACCINFO=$array['DSPACCINFO'];

		$html = '<table class="table">
<thead>
<tr>
<th>Particulars</th>
<th>Debit Amount</th>
<th>Credit Amount</th>
</tr>
</thead>
<tbody>
';
		$key=0;
		foreach ($bankAccounts as $item){
			$bankAccName=$item['DSPDISPNAME'];
			$debitAmt=$DSPACCINFO[$key]['DSPCLDRAMT']['DSPCLDRAMTA'];
			$crediAMt=$DSPACCINFO[$key]['DSPCLCRAMT']['DSPCLCRAMTA'];
			if(is_array($crediAMt)){
				$crediAMt='--';
			}
			if(is_array($debitAmt)){
				$debitAmt = '--';
			}
			$html .='<tr>
<td>'.$bankAccName.'</td>
<td>'.$debitAmt.'</td>
<td>'.$crediAMt.'</td>
</tr>';
			$key++;
		}
		$html .= '</tbody></table>';
//echo '<pre>', htmlentities($data), '</pre>';


		if (curl_errno($ch)) {
			print curl_error($ch);
			echo "  something went wrong..... try later";
			$response['data'] = $html;
		} else {
			$response['data'] = $html;
		}echo json_encode($response);
	}
}else{

//check company id available


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
<SVEXPORTFORMAT>$$SysName:XML</SVEXPORTFORMAT>
<SVFROMDATE>'.$fromDate.'</SVFROMDATE>
<SVTODATE>'.$toDate.'</SVTODATE>
</STATICVARIABLES>
<REPORTNAME>'.$reportName.'</REPORTNAME>
</REQUESTDESC>
</EXPORTDATA>
</BODY>
</ENVELOPE>
    ';



	try{
		$headers = array("Content-type: application/json", "Accept: application/json", "Content-length:" . strlen($requestXML), "Connection: open");


		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $this->url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 100);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $requestXML);

		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		$data = curl_exec($ch);

		$xml = simplexml_load_string($data);
		$json = json_encode($xml);
		$array = json_decode($json, TRUE);
		$getRegisteredData=$this->getRegisteredData($array,$reportName);
		$particulars=$getRegisteredData[0];
		$creditArray=$getRegisteredData[1];
		$debitArray=$getRegisteredData[2];
		$closingBalance=$getRegisteredData[3];
		if($reportName != 'Journal Register'){
			$tr='<th>Particulars</th>
<th>Debit Amount</th>
<th>Credit Amount</th>
<th>Closing Balance</th>';
		}else{
			$tr='<th>Particulars</th>
<th>Debit Amount</th>
<th>Credit Amount</th>';
		}
		$html = '<table class="table">
<thead>
<tr>
'.$tr.'
</tr>
</thead>
<tbody>
';
		$key=0;
		foreach ($particulars as $item){
			$td='';
			if($reportName != 'Journal Register'){
				$td ='<td>'.$closingBalance[$key].'</td>';
			}
			$html .='<tr>
<td>'.$item.'</td>
<td>'.$debitArray[$key].'</td>
<td>'.$creditArray[$key].'</td>
'.$td.'
</tr>';
			$key++;
		}
		$html .= '</tbody></table>';
		if (curl_errno($ch))
		{
			print curl_error($ch);
			echo "  something went wrong..... try later";
			$response['data'] = $html;
		} else {
			$response['data'] = $html;
			$response['status'] = true;
		}

	}catch (Exception $e){
		$response['data'] = "Something went Wrong";
	}echo json_encode($response);
}


		//$server = '192.168.1.25:9000';

	}

	function getRegisteredData($array,$reportName){

		$particularsArr=$array['DSPPERIOD'];
		$AccountInfoArr=$array['DSPACCINFO'];
		$particulars=array();
		$debitArray=array();
		$creditArray=array();
		$closingBalance=array();
		foreach ($particularsArr as $key=>$item){
			$particulars[]=$item;
			$itemAccount=$AccountInfoArr[$key];
			$creditArray[]=$this->checkType($itemAccount['DSPCRAMT']['DSPCRAMTA']);
			$debitArray[]=$this->checkType($itemAccount['DSPDRAMT']['DSPDRAMTA']);
			if($reportName != 'Journal Register'){
				$closingBalance[]=$this->checkType($itemAccount['DSPCLAMT']['DSPCLAMTA']);
			}
		}
		return array($particulars,$creditArray,$debitArray,$closingBalance);
	}


	function CheckCompanyAvailable($company_name){
		$query=$this->db2->query("select id from company_master where company_name='".$company_name."'");
		if($this->db2->affected_rows() > 0){
			return $query->row()->id;
		}else{
			$this->db2->insert('company_master',array('company_name'=>$company_name));
			$insert_id=$this->db2->insert_id();
			return $insert_id;
		}

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
//echo '<pre>',get_AccountBook htmlentities($data), '</pre>';


		if (curl_errno($ch)) {
			print curl_error($ch);
			echo "  something went wrong..... try later";
			$response['data'] = $data;
		} else {
			$response['data'] = $data;
		}echo json_encode($response);
	}
	public function get_balancesheet()
	{
	//	require './assets/vchreg6.tdl';
		$company_id = $this->input->post('company_name');
		$fromDate = $this->input->post("fromDate");
		$toDate = $this->input->post("toDate");
		$toDate = date('d-M-Y', strtotime($toDate));
		$fromDate = date('d-M-Y', strtotime($fromDate));
//		<REPORTNAME>Balance Sheet</REPORTNAME>
		$requestXML = '

<ENVELOPE>
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
<SVFROMDATE>' . $fromDate . '</SVFROMDATE>
<SVTODATE>' . $toDate . '</SVTODATE>
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


	if (curl_errno($ch))
	{
	print curl_error($ch);
	echo "  something went wrong..... try later";
	$response['data'] = $data;
	} else {
		$response['data'] = $data;
		$response['status'] = true;
	}echo json_encode($response);
	}

	function LoadDBDATA(){
		$company_id=$this->input->post('company_id');
		$year=$this->input->post('year');
		$month=$this->input->post('month');
		$voucher_type=$this->input->post('voucher_type');
		$startDate= $year .'-'.$month.'-01';
		$date = strtotime($startDate);
		$lastdate = strtotime(date("Y-m-t", $date ));
		$endDate = date("Ymd", $lastdate);
		$compId=$this->CheckCompanyAvailable($company_id);
		$ExistingVoucherArray=$this->getVoucherNumbers($compId,$year,$month,$voucher_type);
		$startDate1= $year .$month.'01';
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
<REPORTNAME>Voucher Register</REPORTNAME>
<STATICVARIABLES>
<SVCURRENTCOMPANY>' . $company_id . '</SVCURRENTCOMPANY>
<SVEXPORTFORMAT>$$SysName:XML</SVEXPORTFORMAT>
<SVFROMDATE>'.$startDate1.'</SVFROMDATE>
<SVTODATE>'.$endDate.'</SVTODATE>
<VOUCHERTYPENAME>'.$voucher_type.'</VOUCHERTYPENAME>
</STATICVARIABLES>
 
</REQUESTDESC>
</EXPORTDATA>
</BODY>
</ENVELOPE>

    ';
		try{
			$headers = array("Content-type: application/json", "Accept: application/json", "Content-length:" . strlen($requestXML), "Connection: open");
			ini_set('display_errors', 1);
			ini_set('display_startup_errors', 1);
			error_reporting(E_ALL);
			//	ini_set('max_execution_time', '-1');
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $this->url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			//curl_setopt($ch, CURLOPT_TIMEOUT, 3600);
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $requestXML);

			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

			$data = curl_exec($ch);

			$data = str_replace("", "", $data);
			$data = str_replace('&#4;', '', $data);

			$xml = simplexml_load_string($data);
			$json = json_encode($xml);
			$array = json_decode($json, TRUE);
			/*var_dump($array);
			exit;*/
			$arrBody=$array['BODY']['IMPORTDATA']['REQUESTDATA'];
			$allVC=$arrBody['TALLYMESSAGE'];
			/*var_dump($allVC);
			exit;*/
			$finalArray=array();
			$transactionArray=array();
			//check Company Data Available
			//$deletePreviousData=$this->check_Company_data($month,$year,$voucher_type,$compId);
			$insert=false;
			foreach ($allVC as $key=>$row){

					if(array_key_exists('VOUCHER',$row)){

						$narration=$row['VOUCHER']['NARRATION'];
						$partyledger=$row['VOUCHER']['PARTYLEDGERNAME'];
						$vouchertype=$row['VOUCHER']['VOUCHERTYPENAME'];
						$reference=$row['VOUCHER']['REFERENCE'];
						$voucherNumber=$row['VOUCHER']['VOUCHERNUMBER'];
						$GSTIN=$row['VOUCHER']['PARTYGSTIN'];
						$pancard=$row['VOUCHER']['CASHPARTYPAN'];
						$date=$row['VOUCHER']['DATE'];


						$dispatchcity=$this->checkType($row['VOUCHER']['DISPATCHCITY']);
						$dispatch_pincode=$this->checkType($row['VOUCHER']['DISPATCHPINCODE']);
						$dispatch_date=$this->checkType($row['VOUCHER']['DISPATCHDATE']);
						$import_export_code=$row['VOUCHER']['IMPORTEREXPORTERCODE'];
						$shipping_billing_date=$row['VOUCHER']['SHIPPINGBILLDATE'];
						$port_code=$row['VOUCHER']['PORTCODE'];
						$authorityAddress=$row['VOUCHER']['AUTHORITYADDRESS'];

						//new variables
						$sales_tax_number=$row['VOUCHER']['BASICBUYERSSALESTAXNO'];
						$cst_number=$row['VOUCHER']['BUYERSCSTNUMBER'];
						$order_number=$row['VOUCHER']['PARTYORDERNO'];
						$place_of_receipt=$row['VOUCHER']['BASICPLACEOFRECEIPT'];
						$vesselNumber=$row['VOUCHER']['BASICSHIPVESSELNO'];
						$destination=$row['VOUCHER']['BASICFINALDESTINATION'];
						$port_of_loading=$row['VOUCHER']['BASICPORTOFLOADING'];
						$port_of_discharge=$row['VOUCHER']['BASICPORTOFDISCHARGE'];
						$country_to=$row['VOUCHER']['BASICDESTINATIONCOUNTRY'];


//					if(count($ExistingVoucherArray) > 0){
						if(!in_array($voucherNumber,$ExistingVoucherArray)){
							$data=array(
								"narration"=>$this->checkType($narration),
								"ledger"=>$this->checkType($partyledger),
								"party_address"=>$this->checkType($authorityAddress),
								"voucher_type"=>$this->checkType($vouchertype),
								"voucher_number"=>$this->checkType($voucherNumber),
								"buyer_name"=>$this->checkType($partyledger),
								"GSTIN"=>$this->checkType($GSTIN),
								"pan_number"=>$this->checkType($pancard),
								"dispatch_details"=>$dispatchcity."-".$dispatch_pincode."-".$dispatch_date,
								"import_export"=>$this->checkType($import_export_code),
								"shipping_data"=>$this->checkType($shipping_billing_date),
								"port_code"=>$this->checkType($port_code),
								"reference"=>$this->checkType($reference),
								"company_id"=>$this->checkType($compId),
								"year"=>$year,
								"month"=>$month,
								"date"=>$date,
								"sales_tax_number"=>$this->checkType($sales_tax_number),
								"cst_number"=>$this->checkType($cst_number),
								"order_number"=>$this->checkType($order_number),
								"place_of_receipt"=>$this->checkType($place_of_receipt),
								"vesselNumber"=>$this->checkType($vesselNumber),
								"destination"=>$this->checkType($destination),
								"port_of_loading"=>$this->checkType($port_of_loading),
								"port_of_discharge"=>$this->checkType($port_of_discharge),
								"country_to"=>$this->checkType($country_to),
							);
							//find data in detailing
							$insert=$this->db2->insert('voucher_transaction_table',$data);
							$insertId=$this->db2->insert_id();
						//	$insertId=1;
							$k='ALLLEDGERENTRIES.LIST';
							$itemName='LEDGERNAME';
							if($voucher_type == "Expenses"){
								$k='LEDGERENTRIES.LIST';
							}
							if( $voucher_type == "Purchase"){
								$k='INVENTORYENTRIES.LIST';
								//STOCKITEMNAME
								$itemName='STOCKITEMNAME';
							}

							if(array_key_exists($k,$row['VOUCHER'])){
								$allledgerlist=$row['VOUCHER'][$k];

								if($insert){ // insert data of transaction data
									$transArr=array();
									foreach ($allledgerlist as $led){
										$ledgerName= $this->checkType($led[$itemName]);
										$amount= $this->checkType($led['AMOUNT']);
										$rate='-';


										//var_dump($led);
										$qty1=0;
										$unit="";
										if(array_key_exists('INVENTORYALLOCATIONS.LIST',$led)) {
											foreach ($led['INVENTORYALLOCATIONS.LIST'] as $qty){ //to get Actual Quantity of the ledger


												if(is_array($qty) && array_key_exists('ACTUALQTY',$qty)) {
													$qty1 += (int) filter_var($qty['ACTUALQTY'], FILTER_SANITIZE_NUMBER_INT);
													$unit = preg_replace('/[^a-z-]/i', '', $qty['ACTUALQTY']);
												}else{
													$qty1 +=0;
												}
												if(is_array($qty) && array_key_exists('RATE',$qty)){
													$rate= $this->checkType($qty['RATE']);
												}

											}
										}
										//$quantity= $this->checkType($led['ACTUALQTY']);
										$transArr['ledger_name']=$ledgerName;
										$transArr['amount']=$amount;
										$transArr['insert_id']=$insertId;
										$transArr['quantity']=$qty1;
										$transArr['rate']=$rate;
										$transArr['unit']=$unit;
										array_push($finalArray,$transArr);
									}

								}
							}
						}

					}


			}
			$response['finalArray']=$finalArray;
			$inserBatch=false;
			if(count($finalArray) > 0 ){
				$inserBatch=$this->db2->insert_batch('voucher_detailed_transactions',$finalArray);
			}
			$response['inserBatch'] = $inserBatch;
			if($inserBatch == true || $insert != false){
				$response['data'] = "Inserted Successfully";

			}else{
				$response['data'] = "No new entries found.";
			}
		}catch (Exception $e){
			$response['data'] = "Something went Wrong";
		}echo json_encode($response);
	}

	function checkType($variable){
		if(is_array($variable)){
			return "";
		}else{
			return $variable;
		}
	}
	function check_Company_data($month,$year,$voucher_type,$company_id){
		$where=array(
			"voucher_type"=>$voucher_type,
			"company_id"=>$company_id,
			"year"=>$year,
			"month"=>$month,
		);
		$delete=$this->db2->delete("voucher_transaction_table",$where);
		return $delete;
	}
	function getVoucherNumbers($compId,$year,$month,$voucher_type){
		$this->db2->where('company_id',$compId);
		$this->db2->where('year',$year);
		$this->db2->where('month',$month);
		$this->db2->where('voucher_type',$voucher_type);
		$mbData = $this->db2
			->select(array("voucher_number"))
			->order_by('id','desc')
			->get("voucher_transaction_table vt")->result();
		$voucherArray = array();
		if (count($mbData) > 0) {
			foreach ($mbData as $voucher) {
				$voucherArray[]=$voucher->voucher_number;
			}
		}
		return $voucherArray;
	}
	function getDataFromDBVouchers(){
		$company_id=$this->input->post('company_id');
		$comp_id=$this->CheckCompanyAvailable($company_id);
		$year=$this->input->post('year');
		$month=$this->input->post('month');
		$voucher_type=$this->input->post('voucher_type');
			$this->db2->where('company_id',$comp_id);
			$this->db2->where('year',$year);
			$this->db2->where('month',$month);
			$this->db2->where('voucher_type',$voucher_type);
			$mbData = $this->db2
				->select(array("*","(select 
				sum(case when amount > 0 then amount else 0 end) 
				from voucher_detailed_transactions vd where vd.insert_id=vt.id) as totalAmount ","(select 
				sum(amount) 
				from voucher_detailed_transactions vd where vd.insert_id=vt.id) as totalAmountPurchase "))
				->order_by('id','desc')
				->get("voucher_transaction_table vt")->result();
			$tableRows = array();
			if (count($mbData) > 0) {
				$i=1;
				foreach ($mbData as $voucher) {
					if($voucher_type == "Purchase"){
						$voucher->totalAmount=$voucher->totalAmountPurchase;
					}
					array_push($tableRows, array(
							$voucher->id,
							date('d-m-Y',strtotime($voucher->date)),
							$voucher->buyer_name,
							$voucher->GSTIN,
							$voucher->voucher_number,
							$voucher->pan_number,
							$voucher->narration,
							$voucher->dispatch_details,
							$voucher->import_export,
							$voucher->shipping_data,
							$voucher->port_code,
							$voucher->year,
							$voucher->month,
							number_format($voucher->totalAmount,2),
							)
					);
					$i++;
				}
			}
			$results = array(
				"draw" => 1,
				"recordsTotal" => count($mbData),
				"recordsFiltered" => count($mbData),
				"data" => $tableRows
			);
			echo json_encode($results);
	}
	function getDetailedData(){
		$id=$this->input->post('id');
		$query=$this->db2->query("select * from voucher_detailed_transactions where insert_id=".$id);
		if($this->db->affected_rows() > 0){

		}else{

		}
		$this->db2->where('insert_id',$id);
		$mbData = $this->db2
			->select(array("*"))
			->order_by('id','asc')
			->get("voucher_detailed_transactions")->result();
		$tableRows = array();
		if (count($mbData) > 0) {
			$i=1;
			foreach ($mbData as $voucher) {
				$credit=0;
				$debit=0;
				if($voucher->amount > 0){
					$credit=$voucher->amount;
				}else{
					$debit=$voucher->amount;
				}
				array_push($tableRows, array(
						$voucher->id,
						$voucher->ledger_name,
						number_format($debit,2),
						number_format($credit,2),
					)
				);
				$i++;
			}
		}
		$results = array(
			"draw" => 1,
			"recordsTotal" => count($mbData),
			"recordsFiltered" => count($mbData),
			"data" => $tableRows
		);
		echo json_encode($results);
	}
	function ExcelDataDownload(){
		$companyName=base64_decode($this->input->post_get('comp'));
		$year=base64_decode($this->input->post_get('year'));
		$month=base64_decode($this->input->post_get('month'));
		$voucher_type=base64_decode($this->input->post_get('vtype'));
		$comp_id=$this->CheckCompanyAvailable($companyName);
		$this->db2->where('company_id',$comp_id);
		$this->db2->where('year',$year);
		$this->db2->where('month',$month);
		$this->db2->where('voucher_type',$voucher_type);
		$mbData = $this->db2
			->select(array("*",
				"(select sum(quantity) from voucher_detailed_transactions vd where vd.insert_id=vt.id) as TotalQty",
				"(select group_concat(case when unit != '' then unit else 1 end) from voucher_detailed_transactions vd where vd.insert_id=vt.id) as unit",
				"(select group_concat(ledger_name,'||',amount separator '#') from voucher_detailed_transactions where insert_id= vt.id)  as detailedData",
				"(select 
				sum(case when amount > 0 then amount else 0 end) 
				from voucher_detailed_transactions vd where vd.insert_id=vt.id) as totalAmount ","(select 
				sum(amount) 
				from voucher_detailed_transactions vd where vd.insert_id=vt.id) as totalAmountPurchase "))
			->order_by('id','desc')
			->get("voucher_transaction_table vt")->result();

		$objPHPExcel = new PHPExcel();
		$objPHPExcel->setActiveSheetIndex(0);

		if (count($mbData) > 0) {

			$cnt=1;
			$objPHPExcel->getActiveSheet()->SetCellValue('A'.$cnt, "Date");
			$objPHPExcel->getActiveSheet()->SetCellValue('B'.$cnt, "Particulars");
			$objPHPExcel->getActiveSheet()->SetCellValue('C'.$cnt, "Buyer Name");
			$objPHPExcel->getActiveSheet()->SetCellValue('D'.$cnt, "Address");
			$objPHPExcel->getActiveSheet()->SetCellValue('E'.$cnt, "Gross Total");
			$objPHPExcel->getActiveSheet()->SetCellValue('F'.$cnt, "Voucher Number");
			$objPHPExcel->getActiveSheet()->SetCellValue('G'.$cnt, "Voucher Type");
			$objPHPExcel->getActiveSheet()->SetCellValue('H'.$cnt, "GST Number");
			$objPHPExcel->getActiveSheet()->SetCellValue('I'.$cnt, "Sales Tax Number");
			$objPHPExcel->getActiveSheet()->SetCellValue('J'.$cnt, "Pan Number");
			$objPHPExcel->getActiveSheet()->SetCellValue('K'.$cnt, "Order Number");
			$objPHPExcel->getActiveSheet()->SetCellValue('L'.$cnt, "CST Number");
			$objPHPExcel->getActiveSheet()->SetCellValue('M'.$cnt, "Narration");
			$objPHPExcel->getActiveSheet()->SetCellValue('N'.$cnt, "Dispatch Details");
			$objPHPExcel->getActiveSheet()->SetCellValue('O'.$cnt, "Destination");
			$objPHPExcel->getActiveSheet()->SetCellValue('P'.$cnt, "Place of receipt by shipper");
			$objPHPExcel->getActiveSheet()->SetCellValue('Q'.$cnt, "Vessel/Flight Number");
			$objPHPExcel->getActiveSheet()->SetCellValue('R'.$cnt, "Port Of Loading");
			$objPHPExcel->getActiveSheet()->SetCellValue('S'.$cnt, "Port Of Discharge");
			$objPHPExcel->getActiveSheet()->SetCellValue('T'.$cnt, "Country To");
			$objPHPExcel->getActiveSheet()->SetCellValue('U'.$cnt, "Shipping date");
			$objPHPExcel->getActiveSheet()->SetCellValue('V'.$cnt, "Port Code");
			$objPHPExcel->getActiveSheet()->SetCellValue('W'.$cnt, "Quantity");
			$objPHPExcel->getActiveSheet()->SetCellValue('X'.$cnt, "Import/Export Details");
			$objPHPExcel->getActiveSheet()->SetCellValue('Y'.$cnt, "Shipping Details");
			$i=2;
			$totalAmount=array();
			$detailed_data=array();
			$positionArray=array();
			foreach ($mbData as $voucher) {
				$detailed_data[$voucher->buyer_name][]=$voucher->detailedData;
				$positionArray[$voucher->buyer_name][]=$i;
				if($voucher_type == "Purchase"){
					$voucher->totalAmount=$voucher->totalAmountPurchase;
				}
				$unit=$voucher->unit;
				/*$exp=explode(",",$unit);
				foreach ($exp as $e){

				}*/
				$totalAmount[]=$voucher->totalAmount;
				$objPHPExcel->getActiveSheet()->SetCellValue('A'.$i, date('d-m-Y',strtotime($voucher->date)));
				$objPHPExcel->getActiveSheet()->SetCellValue('B'.$i, $voucher->buyer_name);
				$objPHPExcel->getActiveSheet()->SetCellValue('C'.$i, $voucher->buyer_name);
				$objPHPExcel->getActiveSheet()->SetCellValue('D'.$i, $voucher->party_address);
				$objPHPExcel->getActiveSheet()->SetCellValue('E'.$i, number_format($voucher->totalAmount,2));
				$objPHPExcel->getActiveSheet()->SetCellValue('F'.$i, $voucher->voucher_number);
				$objPHPExcel->getActiveSheet()->SetCellValue('G'.$i, $voucher->voucher_type);
				$objPHPExcel->getActiveSheet()->SetCellValue('H'.$i, $voucher->GSTIN);
				$objPHPExcel->getActiveSheet()->SetCellValue('I'.$i, $voucher->sales_tax_number);
				$objPHPExcel->getActiveSheet()->SetCellValue('J'.$i, $voucher->pan_number);
				$objPHPExcel->getActiveSheet()->SetCellValue('K'.$i, $voucher->order_number);
				$objPHPExcel->getActiveSheet()->SetCellValue('L'.$i, $voucher->cst_number);
				$objPHPExcel->getActiveSheet()->SetCellValue('M'.$i, $voucher->narration);
				$objPHPExcel->getActiveSheet()->SetCellValue('N'.$i, $voucher->dispatch_details);
				$objPHPExcel->getActiveSheet()->SetCellValue('O'.$i, $voucher->destination);
				$objPHPExcel->getActiveSheet()->SetCellValue('P'.$i, $voucher->place_of_receipt);
				$objPHPExcel->getActiveSheet()->SetCellValue('Q'.$i, $voucher->vesselNumber);
				$objPHPExcel->getActiveSheet()->SetCellValue('R'.$i, $voucher->port_of_loading);
				$objPHPExcel->getActiveSheet()->SetCellValue('S'.$i, $voucher->port_of_discharge);
				$objPHPExcel->getActiveSheet()->SetCellValue('T'.$i, $voucher->country_to);
				$objPHPExcel->getActiveSheet()->SetCellValue('U'.$i, $voucher->shipping_data);
				$objPHPExcel->getActiveSheet()->SetCellValue('V'.$i, $voucher->port_code);
				$objPHPExcel->getActiveSheet()->SetCellValue('W'.$i, $voucher->TotalQty);
				$objPHPExcel->getActiveSheet()->SetCellValue('X'.$i, $voucher->import_export);
				$objPHPExcel->getActiveSheet()->SetCellValue('Y'.$i, $voucher->shipping_data);
				$i++;
			}
			$objPHPExcel->getActiveSheet()->SetCellValue('D'.$i, "Total");

			$objPHPExcel->getActiveSheet()->SetCellValue('E'.$i, number_format(array_sum($totalAmount)),2);

		}
		$onlyLedgerName=array();
		$LedgerWithValues=array();

		foreach ($detailed_data as $key=>$item){
			foreach ($item as $keyLedNew=>$ledVal){
				$ledgerDetails=explode("#",$ledVal);

				foreach ($ledgerDetails as $legerValue) {

					$value_seprate = explode("||", $legerValue);
					$leger = $value_seprate[0];
					$valueofledger = $value_seprate[1];
					if ($key != $leger) {
						$onlyLedgerName[] = $leger;
						$LedgerWithValues[$key][$leger][] = $valueofledger;
					}

				}
			}
		}

		$otherLedgers=array_values(array_unique($onlyLedgerName));
		$charPosition=array();
		$char='Z';
		foreach ($otherLedgers as $ledg){
			$charPosition[$ledg]=$char;
			$objPHPExcel->getActiveSheet()->SetCellValue($char."1", $ledg);
			$char++;
		}
		foreach ($LedgerWithValues as $keyComp=>$led_itemArr){
			foreach ($led_itemArr as $keyLedgName=>$item1){
				foreach ($item1 as $k=>$ii){
					$objPHPExcel->getActiveSheet()->SetCellValue($charPosition[$keyLedgName].$positionArray[$keyComp][$k],$ii);
				}

			}
		}
		ob_end_clean();
		$filename = "VoucherReport" . date("Y-m-d") . ".xls";

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="' . $filename . '"');
		header('Cache-Control: max-age=0');
		foreach (range('A', $objPHPExcel->getActiveSheet()->getHighestDataColumn()) as $col) {
			$objPHPExcel->getActiveSheet()
				->getColumnDimension($col)
				->setAutoSize(true);
		}
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');

		$objWriter->save('php://output');
	}
}
