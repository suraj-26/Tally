
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
		Statements of Inventory
	</h5>
</div>

<div class="" style="padding:8px;background-color:#ffffff;">
	<div class="row">
		<div class="col-md-12">

			<div class="">
				<label for="group-name" >Company Name</label>
				<select id='company_name1' class="form-control" name='company_name1' >
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
			<select class="form-control" id="reportName" name="reportName">
				<option value="Stock Query">Stock Query</option>
<!--				<option value="cost">Cost Estimation</option>-->
				<option value="Statistics">Statistics</option>
			</select>
			<div class="">
				<button type="button" class="btn btn-primary" onclick="get_trialBalance()">View</button>
				<button type="button" class="btn btn-primary" id="downloadexcel" onclick="DownloadExcel()">DownLoadExcel</button>
			</div>
		</div>
		<div class="col-sm-12" id="div_bas" align="center" width="100%"></div>
	</div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->


<script>
	$(document).ready(function () {
		get_company_list();
		$('#reportName').change(function(){
			$('#downloadexcel')[ ($("option[value='Statistics']").is(":checked"))? "show" : "hide" ]();
		});
	});
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
		var ledger='Aerogen Controller Cable (AG-AP1085)';
		if(company_name == "" || fromDate== "" || toDate=="" || reportName==""){
			alert("Company Name,From Date and To Date are Mandatory!!");
		}else{
			$.ajax({
				type: "POST",
				url: "<?= base_url("getInventoryReports") ?>",
				dataType: "json",
				async: false,
				cache: false,
				data: {company_name,fromDate,toDate,reportName,ledger},
				success: function (result) {
					var data = result.data;
					console.log(data);
					$('#div_bas').html(data);
					$("#FundFlowTable").dataTable(
							{
								"ordering": false

							}
					);
				},
			});
		}


	}
	function DownloadExcel() {
		var company_name = $("#company_name1").val();
		var fromDate = $("#fromDate").val();
		var toDate = $("#toDate").val();
		var reportName = $("#reportName").val();
		if(company_name == "" || fromDate== "" || toDate==""){
			alert("Company Name,From Date and To Date are Mandatory!!");
		}else{
			location.href = "<?= base_url() ?>"+"ExportController/DownLoadExcelStatementInventory?comp="+btoa(company_name)+"&fromDate="+btoa(fromDate)+"&toDate="+btoa(toDate)+"&reportName="+btoa(reportName);
		}
	}

</script>
