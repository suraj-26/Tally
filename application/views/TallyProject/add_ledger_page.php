<style>
	#btn_div {
		outline: none;
		background-color: #286090;
		text-align: center;
		color: white;
	}

	.modal-backdrop {
		z-index: 0 !important;
	}

</style>
<div class="card-title">
	<h5 class="card-header">
		Create Ledgers
	</h5>
</div>

<div class="" style="padding:8px;background-color:#ffffff;">
	<form class="form-horizontal" id="add_led_form" method="post" action="">
		<div class="row">
			<div class="col-sm-6">
				<div class="col-sm-12">
					<div class="form-group">
						<label for="group-name">Company Name</label>
						<select id='company_name' class="form-control" name='company_name'
								onchange="get_ledger_list();">
						</select>
					</div>
					<div class="form-group">
						<label for="group-name">Ledger Name</label>
						<input type="text" class="form-control" id="ledger_name" placeholder="Stock Group name"
							   name="ledger_name" required>
					</div>
					<div class="form-group">
						<label for="item-name">Parent</label>
						<select id='ledger_id' class="form-control" name='ledger_id'>
							<option>Select Parent Group</option>
						</select>
					</div>
					<div class="form-group">
						<label for="opening_balance">Opening Balance</label>
						<input type="text" class="form-control" id="opening_balance" placeholder="Item Quantity"
							   name="opening_balance" required>
					</div>
				</div>
				<div class="col-sm-12">
					<div class="form-group">
						<label for="item-name">GSTIN</label>
						<input type="text" class="form-control" id="gstin" placeholder="GSTIN" name="gstin">
					</div>
					<div class="form-group">
						<label for="item-name">Address</label>
						<input type="text" class="form-control" id="address" placeholder="Address" name="address">
					</div>
					<div class="form-group">
						<label for="item-name">PAN No</label>
						<input type="text" class="form-control" id="panno" placeholder="PAN No" name="panno">
					</div>
					<div class="form-group">
						<label for="item-name">Inventory Values Affected?</label>
						<select class="form-control" id="inventoryValuesAffected" name="inventoryValuesAffected">
							<option value="No" selected>No</option>
							<option value="Yes" >Yes</option>
						</select>
					</div>
				</div>
				<div class="form-group w-100 mt-3">
					<div class="col-sm-12" align="center">
						<button type="button" onclick="insert_ledger()" class="btn btn-primary">Insert</button>
					</div>
				</div>
			</div>
			<div class="card-title col-lg-6">
				<h5 class="card-header">
					View Ledgers Vochers
				</h5>
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
					<button type="button" class="btn btn-primary" onclick="getLedgerData()">View</button>
					<button type="button" class="btn btn-primary" onclick="download_Excel()">Download</button>
				</div>
				<div id="ledger_Details"></div>
			</div>



		</div>
	</form>
</div>

<div id="ledger_list" style="padding:8px;background-color:#ffffff;">

</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->


<script>
	$(document).ready(function () {
		get_company_list();
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
					$('#company_name').html(data);
					$('#company_name').select2();

				} else {
					$('#company_name').html(data);
					$('#company_name').select2();

				}
			},
		});
	}

	function ledger_list() {
		var company_name = $("#company_name").val();
		$.ajax({
			type: "POST",
			url: "<?= base_url("ExportController/get_ledger_html") ?>",
			dataType: "json",
			async: false,
			cache: false,
			data: {company_name},
			success: function (result) {
				var data = result.data;
				console.log(data);
				if (result.status === 'true') {
					$('#ledger_list').html(data);

				} else {
					$('#ledger_list').html(data);

				}
			},
		});
	}

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
					$('#ledger_id').html(data);
					$('#ledger_id').select2();
				} else {
					$('#ledger_id').html(data);
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
					$('#ledger_id1').html(data);
					$('#ledger_id1').select2();
				} else {
					$('#ledger_id1').html(data);
					$('#ledger_id1').select2();
				}

			},
		});
	}

	function getLedgerData(value) {
		var company_name = $("#company_name").val();
		var value = $("#ledger_id1").val();
		var fromDate = $("#fromDate").val();
		var toDate = $("#toDate").val();
		if(value == "" || fromDate== "" || toDate==""){
			alert("Company Name,From Date and To Date are Mandatory!!");
		}else{
			$.ajax({
				type: "POST",
				url: "<?= base_url("ExportController/get_ledger_details") ?>",
				dataType: "json",
				async: false,
				cache: false,
				data: {company_name,value,fromDate,toDate},
				success: function (result) {
					var data = result.data;
					console.log(data);
					if (result.status === 'true') {
						$('#ledger_Details').html(data);
						$("#TableData").dataTable();
					} else {
						$('#ledger_Details').html(data);
						$("#TableData").dataTable();

					}
				},
			});
		}

	}
	function download_Excel() {
		var company_name = $("#company_name").val();
		var value = $("#ledger_id1").val();
		var fromDate = $("#fromDate").val();
		var toDate = $("#toDate").val();
		if(value == "" || fromDate== "" || toDate==""){
			alert("Company Name,From Date and To Date are Mandatory!!");
		}else{
			location.href = "<?= base_url() ?>"+"ExportController/download_LedgerDetails?comp="+btoa(company_name)+"&fromDate="+
					btoa(fromDate)+"&toDate="+btoa(toDate)+"&value="+btoa(value);
		}

	}

	function insert_ledger() {
		//
		$.ajax({
			type: "POST",
			url: "<?= base_url("ImportController/add_ledger") ?>",
			dataType: "json",
			data: $("#add_led_form").serialize(),
			async: false,
			cache: false,
			success: function (result) {
				console.log(result.status);
				if (result.status == 200) {
					alert("Imported Successfully");
				} else {
					alert("Fail to import");
				}
			},
		});
	}


</script>
