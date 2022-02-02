<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ExportController extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('url');
	}

	public $url = "65.2.57.255:9000";

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
		$mon=$this->input->post('mon');
		$company_id=$this->input->post('company_name');
		$mon = str_pad($mon, 2, "0", STR_PAD_LEFT);
		$year = date("Y");
		$a_date = $year."-".$mon."-01";
		$last_date= date("Ymt", strtotime($a_date));
		$a_date = $year.$mon."01";
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
<SVFROMDATE>'.$a_date.'</SVFROMDATE>
<SVTODATE>'.$last_date.'</SVTODATE>

<VOUCHERTYPENAME>Journal</VOUCHERTYPENAME>

<!--Detailed or Condensed Format-->
<EXPLODEFLAG>Yes</EXPLODEFLAG>

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
		$mon=$this->input->post('mon');
		$company_id=$this->input->post('company_name');
		$vctype1=$this->input->post('vctype1');
		$mon = str_pad($mon, 2, "0", STR_PAD_LEFT);
		$year = date("Y");
		$a_date = $year."-".$mon."-01";
		$last_date= date("Ymt", strtotime($a_date));
		$a_date = $year.$mon."01";
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
<SVFROMDATE>'.$a_date.'</SVFROMDATE>
<SVTODATE>'.$last_date.'</SVTODATE>

<VOUCHERTYPENAME>'.$vctype1.'</VOUCHERTYPENAME>

<!--Detailed or Condensed Format-->
<EXPLODEFLAG>Yes</EXPLODEFLAG>

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

	public function get_balancesheet() {
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

	public function get_ratioan() {
		$company_id = $this->input->post('company_name');
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

}
