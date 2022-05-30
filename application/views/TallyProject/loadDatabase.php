
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
		Load All Vouchers Details
	</h5>
</div>

<div class="" style="padding:8px;background-color:#ffffff;">
	<div class="row">
		<div class="col-md-12">
			<div class="row">
			<div class="col-md-3">
				<label for="group-name" >Company Name</label>
				<select id='company_name1' class="form-control" name='company_name1'  >
				</select>
			</div>
			<div class="col-md-3">
				<label for="group-name" >Select Voucher Type</label>
				<select id="voucher_type" name="voucher_type" class="form-control">
					<option selected disabled value="">Select Voucher Type</option>
					<option value="Sales">Sales</option>
					<option value="Expenses">Expense</option>
					<option value="Purchase">Purchase</option>
					<option value="Journal">Journal</option>
					<option value="Receipt">Receipt</option>
					<option value="Payment">Payment</option>
					<option value="Contra">Contra</option>
					<option value="Debit Note">Debit Note</option>
					<option value="Credit Note">Credit Note</option>
					<option value="Narration">Narration</option>
				</select>
			</div>
				<div class="col-md-3">
					<label for="group-name" >Select Year</label>
					<select id="year" name="year" class="form-control">
						<option selected disabled value="">Select Year</option>
						<option value="2019">2019</option>
						<option value="2020">2020</option>
						<option value="2021">2021</option>
						<option value="2022">2022</option>
						<option value="2023">2023</option>
					</select>
				</div>
				<div class="col-md-3">
					<label for="group-name" >Select Month</label>
					<select id="month" name="month" class="form-control">
						<option selected disabled value="">Select Month</option>
						<option  value='01'>Janaury</option>
						<option value='02'>February</option>
						<option value='03'>March</option>
						<option value='04'>April</option>
						<option value='05'>May</option>
						<option value='06'>June</option>
						<option value='07'>July</option>
						<option value='08'>August</option>
						<option value='09'>September</option>
						<option value='10'>October</option>
						<option value='11'>November</option>
						<option value='12'>December</option>
					</select>
				</div>
			</div>
			<div class="row mt-3" >
			<div class="mr-4" style=" margin-left: auto;float: left; ">
				<button type="button" class="btn btn-primary" onclick="getTableView()">View</button>
				<button type="button" class="btn btn-primary" onclick="getTableDB()">Refresh & View</button>
				<button type="button" class="btn btn-primary" onclick="DownloadExcel()">Download Excel</button>
			</div>
			</div>
		</div>
		<div class="col-sm-12" id="div_bas" align="center" width="100%"></div>
	</div>
	<div class="col-md-12 mt-2">
		<table class="table" id="VoucherTable">
			<thead>
			<tr>
				<th>Date</th>
				<th>Buyer Name</th>
				<th>Amount</th>
				<th>GSTIN</th>
				<th>Voucher Number</th>
				<th>Pan Number</th>
				<th>Narration</th>
				<th>Dispatch Details</th>
				<th>Import/Export Details</th>
				<th>Shipping Data</th>
				<th>Port Code</th>
				<th>View Details</th>
			</tr>
			</thead>
		</table>
	</div>
</div>

<div class="modal" id="Voucher_Details" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Voucher Details</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div >
					<table class="table" id="tableVoucherDetails">
						<thead>
						<tr>
							<th>Ledger</th>
							<th>Debit</th>
							<th>Credit</th>
						</tr>
						</thead>
					</table>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
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

	function getTableDB() {
		var company_id=$("#company_name1").val();
		var year=$("#year").val();
		var month=$("#month").val();
		var voucher_type=$("#voucher_type").val();
		if(company_id == "" || year==""||month==""||voucher_type==""){
			alert('Company Name,Year,Month,Voucher Type is compulsory!!');
			return;
		}
		$.ajax({
			type: "POST",
			url: "<?= base_url("ExportController/LoadDBDATA") ?>",
			dataType: "json",
			data: {company_id,year,month,voucher_type},
			success: function (result) {
				var data = result.group_list;
				console.log(data);
				alert(result.data);
				getTableView();

			},
		});
	}
	
	function getTableView() {
		var company_id=$("#company_name1").val();
		var year=$("#year").val();
		var month=$("#month").val();
		var voucher_type=$("#voucher_type").val();
		if(company_id == "" || year==""||month==""||voucher_type==""){
			alert('Company Name,Year,Month,Voucher Type is compulsory!!');
			return;
		}
		$.ajax({
			type: "POST",
			url: "<?= base_url("ExportController/getDataFromDBVouchers") ?>",
			dataType: "json",
			data: {company_id,year,month,voucher_type},
			success: function (res) {
				$("#VoucherTable").DataTable({
					destroy: true,
					order: [],
					data:res.data,
					"pagingType": "simple_numbers",
					columns:[

						{data: 1},
						{data: 2},
						{data: 13},
						{data: 3},
						{data: 4},
						{data: 5},
						{data: 6},
						{data: 7},
						{data: 8},
						{data: 9},
						{data: 10},
						{
							data: 0,
							render: (d, t, r, m) => {
								return `<button class="btn btn-link" onclick="getDetailedData(${d})"><i class="fa fa-eye"></i></button>`
							}
						},
					],
					fnRowCallback:(nRow, aData, iDisplayIndex, iDisplayIndexFull) => {

						$('td:eq(11)', nRow).html(`<button class="btn btn-link" onclick="getDetailedData(${aData[0]})"><i class="fa fa-eye"></i></button>`);
					}
				});

			},
		});
	}
	function getDetailedData(id) {
		$("#Voucher_Details").modal('show');
		$.ajax({
			type: "POST",
			url: "<?= base_url("ExportController/getDetailedData") ?>",
			dataType: "json",
			data: {id},
			success: function (res) {
				$("#tableVoucherDetails").DataTable({
					destroy: true,
					order: [],
					data:res.data,
					"pagingType": "simple_numbers",
					columns:[

						{data: 1},
						{data: 2},
						{data: 3},
					],
				});

			},
		});
	}
	function DownloadExcel() {
		var company_id=$("#company_name1").val();
		var year=$("#year").val();
		var month=$("#month").val();
		var voucher_type=$("#voucher_type").val();
		if(company_id == "" || year==""||month==""||voucher_type==""){
			alert('Company Name,Year,Month,Voucher Type is compulsory!!');
			return;
		}
		location.href = "<?= base_url() ?>"+"ExportController/ExcelDataDownload?comp="+btoa(company_id)+"&year="+btoa(year)+"&month="+btoa(month)+"&vtype="+btoa(voucher_type);
	}



</script>
