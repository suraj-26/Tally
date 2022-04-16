
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
		Statutory Report
	</h5>
</div>

<div class="" style="padding:8px;background-color:#ffffff;">
	<div class="row">
		<div class="col-md-12">

			<div class="">
				<label for="group-name" >Company Name</label>
<!--				<select id='company_name1' class="form-control" name='company_name1' >-->
<!--				</select>-->
				<select id='company_name' class="form-control" name='company_name'
						onchange="get_ledger_list();">
				</select>
			</div>
			<div class="form-group">
				<label for="item-name">Parent</label>
				<select id='ledger_id1' class="form-control" name='ledger_id1' >
					<option>Select Ledger</option>
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
				<label>GST Report </label>
				<select class="form-control" id="reportName" name="reportName">
<!--					<option value="GSTR 1">GSTR 1</option>-->
					<option value="Challan Recon">Challan Reconciliation</option>
					<option value="GST Rate Setup">GST Rate Setup</option>
				</select>
			</div><br>
			<div class="">
				<button type="button" class="btn btn-primary" onclick="get_statutaryReport()">View</button>
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

	function get_ledger_list() {
		var company_name = $("#company_name").val();
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

					$('#ledger_id').empty().html(data);
					$('#ledger_id').select2();
				} else {
					$('#ledger_id').empty().html(data);
					$('#ledger_id').select2();
				}
			},
		});
		var company_name = $("#company_name").val();
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
					$('#ledger_id1').empty().append(data);
					$('#ledger_id1').select2();
				} else {
					$('#ledger_id1').empty().append(data);
					$('#ledger_id1').select2();
				}

			},
		});
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
					$('#company_name').html(data);
					$('#company_name').select2();

				} else {
					$('#company_name').html(data);
					$('#company_name').select2();

				}
			},
		});
	}


	function get_statutaryReport() {
		var company_name = $("#company_name").val();
		// alert(company_name);
		var fromDate = $("#fromDate").val();
		var toDate = $("#toDate").val();
		var ledger_id = $("#ledger_id1").val();
		var reportName = $("#reportName").val();
		var ledger='Mantram Healthtech';
		if(company_name == "" || reportName=="" || ledger_id =="" || fromDate =="" || toDate == ""){
			alert("Company Name,Ledger and Report Name are Mandatory!!");
		}else{
			$.ajax({
				type: "POST",
				url: "<?= base_url("ExportController/get_statutaryReport") ?>",
				dataType: "json",
				async: false,
				cache: false,
				data: {company_name,ledger_id,reportName,ledger,fromDate,toDate},
				success: function (result) {
					var data = result.data;
					console.log(data);
					$('#div_bas').empty();
					$('#div_bas').html(data);

				},
			});
		}


	}


</script>
