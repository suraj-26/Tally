
<style>
	#btn_div {
		outline: none;
		background-color: #286090;
		text-align: center;
		color: white;
	}

</style>


<div class="card-title">
	<h5 class="card-header">
		Account Book
	</h5>
</div>

<div class="" style="padding:8px;background-color:#ffffff;">
	<div class="row">
		<div class="col-md-12">

			<div class="">
				<label for="group-name" >Company Name</label>
				<select id='company_name1' class="form-control" name='company_name1' onchange="get_ledger_list();get_groups()" >
				</select>
			</div>
			<div class="">
				<label>From Date:</label>
				<input type="date" id="fromDate" name="fromDate" class="form-control">
			</div>
			<div class="">
				<label>To Date:</label>
				<input type="date" id="toDate" name="toDate" class="form-control">
			</div><br>
			<div class="">
			<select class="form-control" id="reportName" name="reportName" onchange="getOtherData(this.value)">
				<option value="">Select Value</option>
				<option value="Bank Group summary">Cash/Bank Book</option>
				<option value="Group Summary">Group Summary</option>
				<option value="Group Vouchers">Group Voucher</option>
				<option value="Sales Register">Sales Register</option>
				<option value="Purchase Register">Purchase Register</option>
				<option value="Journal Register">Journal Register</option>
			</select>
			</div><br>
			<div class="ledgerWiseDiv" style="display: none">
				<label>Monthly Ledger Summary</label>
				<input type="radio" id="ledgerWise1" value="1" onclick="is_ledgerWise(1)" name="ledgerWise">Yes
				<input type="radio" id="ledgerWise2" value="0" onclick="is_ledgerWise(0)" checked name="ledgerWise">No
			</div>

			<br>
			<div class="ledgerWiseDiv1" id="ledgerDiv" style="display: none">
				<select class="form-control"  style="width: 100% !important;height: 36px;" id="ledgerName" name="ledgerName">

				</select>
			</div><br>
			<div class="" id="groupDiv" style="display: none">
				<select class="form-control"  style="width: 100% !important;height: 36px;" id="groupName" name="groupName">

				</select>
			</div><br>
			<div class="">
				<button type="button" class="btn btn-primary" onclick="get_trialBalance()">View</button>
				<button type="button" class="btn btn-primary" onclick="download_Excel()">Download</button>
			</div>
		</div>
		<div class="col-sm-12" id="div_bas" align="center" width="100%"></div>
	</div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->


<script>
	$(document).ready(function () {
		get_company_list();
	});
	function getOtherData(value) {

		if(value == 'Bank Group summary' || value=='Group Summary'){
			$(".ledgerWiseDiv").show();
			$('#groupDiv').hide();
		}else if(value == 'Group Vouchers'){
			$('#ledgerDiv').hide();
			$('#groupDiv').show();
			$(".ledgerWiseDiv").hide();
			get_groups();
		}else{
			$(".ledgerWiseDiv").hide();
			$("#ledgerDiv").hide();
			$('#groupDiv').hide();
		}
		$("#ledgerWise2").prop("checked", true);
	}
	function get_company_list() {

		$.ajax({
			type: "POST",
			url: "<?= base_url("ImportController/get_companies") ?>",
			dataType: "json",
			async: false,
			cache: false,
			success: function (result) {
				var data = result.company_list;
				console.log(data);
				if (result.status === 'true') {
					$('#company_name1').html(data);
					$('#company_name1').select2();

				} else {
					$('#company_name1').html(data);
					$('#company_name1').select2();

				}
			},
		});
	}


	function get_trialBalance() {
		var company_name = $("#company_name1").val();
		var fromDate = $("#fromDate").val();
		var toDate = $("#toDate").val();
		var reportName = $("#reportName").val();
		var ledgerWise = $('input[name="ledgerWise"]:checked').val();
		var ledger = $("#ledgerName").val();
		var groupName = $("#groupName").val();
		if(company_name == "" || fromDate== "" || toDate=="" || reportName==""){
			alert("Company Name,From Date and To Date are Mandatory!!");
		}else if(ledgerWise == 1 && ledgerName == ""){
			alert("Select Ledger");
		}else{
			$.ajax({
				type: "POST",
				url: "<?= base_url("ExportController/get_AccountBook") ?>",
				dataType: "json",
				async: false,
				cache: false,
				data: {company_name,fromDate,toDate,reportName,ledgerWise,ledger,groupName},
				success: function (result) {
					var data = result.data;
					console.log(data);
					$('#div_bas').html('');
					$('#div_bas').html(data);

				},
			});
		}


	}
	function is_ledgerWise(id) {
		if(id== 1){
			get_ledger_list();
			$("#ledgerDiv").show();

		}else{
			$("#ledgerDiv").hide();
		}
	}

	function get_ledger_list() {

		var company_name = $("#company_name1").val();
		$.ajax({
			type: "POST",
			url: "<?= base_url("ImportController/get_ledgers") ?>",
			dataType: "json",
			async: false,
			cache: false,
			data: {company_name},
			success: function (result) {
				var data = result.ledger_list;
				console.log(data);
				if (result.status === 'true') {
					$('#ledgerName').empty().append(data);
					$('#ledgerName').select2();
				} else {
					$('#ledgerName').empty().append(data);
					$('#ledgerName').select2();
				}

			},
		});
	}
	function get_groups() {

		var company_name = $("#company_name1").val();
		$.ajax({
			type: "POST",
			url: "<?= base_url("ImportController/get_groups") ?>",
			dataType: "json",
			async: false,
			cache: false,
			data: {company_name},
			success: function (result) {
				var data = result.group_list;
				console.log(data);
				if (result.status === 'true') {
					$('#groupName').empty().append(data);
					$('#groupName').select2();
				} else {
					$('#groupName').empty().append(data);
					$('#groupName').select2();
				}

			},
		});
	}
	function download_Excel() {
		var company_name = $("#company_name1").val();
		var fromDate = $("#fromDate").val();
		var toDate = $("#toDate").val();
		var reportName = $("#reportName").val();
		var ledgerWise = $('input[name="ledgerWise"]:checked').val();
		var ledger = $("#ledgerName").val();
		var groupName = $("#groupName").val();
		if(company_name == "" || fromDate== "" || toDate==""){
			alert("Company Name,From Date and To Date are Mandatory!!");
		}else{
			location.href = "<?= base_url() ?>"+"ExportController/download_ExcelStatementAccount?comp="+btoa(company_name)+"&fromDate="+
					btoa(fromDate)+"&toDate="+btoa(toDate)+"&reportName="+btoa(reportName)+"&ledgerWise="+btoa(ledgerWise)+"&ledger="+
					btoa(ledger)+"&groupName="+btoa(groupName);
		}

	}
</script>
