<style>
	#btn_div {
		outline: none;
		background-color: #286090;
		text-align: center;
		color: white;
	}

	.modal-backdrop,
	.blockOverlay {
		display: none;
		z-index: 0 !important;
	}

	.modal {
		padding-top: 35px;
		z-index: 2040 !important;
	}

	.PS {
		background: none !important;
	}
</style>


<div class="card-title">
	<h5 class="card-header">
		Stock Summary
	</h5>
</div>

<div class="" style="padding:8px;background-color:#ffffff;">
	<form class="form-horizontal" id="add_stk_form" method="post" action="">
		<div class="form-group" >
			<div class="col-sm-12">
				<div class="col-sm-8 m-auto">
					<label for="group-name" class="control-label mb-1">Company Name</label>
					<select id='company_namestk' class="form-control" name='company_namestk' onchange="get_stockgrp_list()"></select>
				</div>
			</div>
		</div>

		<div class="form-group" >
			<div class="col-sm-12">
				<div class="col-sm-8 m-auto">
					<label for="item-name" class="control-label mb-1">Parent</label>
					<select id='stock_group' class="form-control" name='stock_group'>
						<option>Select Stock Group</option>
					</select>
					<button type="button" onclick="open_modal()" class="btn btn-link pb-0 pl-0">Add stock group</button>
				</div>
			</div>
		</div>

		<div class="form-group" >
			<div class="col-sm-12">
				<div class="col-sm-8 m-auto">
					<label for="item-name" class="control-label mb-1">Stock Item name</label>
					<input type="text" class="form-control" id="item_name" placeholder="Stock Item name" name="item_name" required>
				</div>
			</div>
		</div>
		<div class="form-group" >
			<div class="col-sm-12">
				<div class="col-sm-8 m-auto">
					<label for="item-name" class="control-label mb-1">Unit Of Measure</label>
					<select id='unitofM' class="form-control" name='unitofM'>
						<option>Select Unit Of Measure</option>
					</select>
				</div>
			</div>
		</div>


		<div class="form-group">
			<div class="col-sm-12">
				<div class="col-sm-8 m-auto">
					<label for="opening_value" class="control-label mb-1">Quantity</label>
					<input type="number" class="form-control" id="quantity" onkeyup="getFinalPrice()" ke placeholder="Item Quantity" name="quantity" required>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-12">
				<div class="col-sm-8 m-auto">
					<label for="opening_value" class="control-label mb-1">Unit Price</label>
					<input type="number" class="form-control" id="unit_price" onkeyup="getFinalPrice()" placeholder="Item Unit Price" name="unit_price" required>
				</div>
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-12">
				<div class="col-sm-8 m-auto">
					<label for="opening_balance" class="control-label mb-1">Opening Balance</label>
					<input type="number" class="form-control" id="opening_balance" placeholder="Opening Balance" name="opening_balance" required>
				</div>
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-6 col-sm-offset-4 m-auto text-center mt-3">
				<button type="button" onclick="insert_stock()" class="btn btn-primary">Insert</button>
			</div>
		</div>
	</form>
</div>

<div class="modal" id="stockgrpCrMdl" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" id="add_stckgrp_form" method="post" action="">
					<div class="form-group">
						<label for="group-name" class="col-sm-12 control-label">Company Name</label>
						<div class="col-sm-12">
							<select id='stckcompany_name' class="form-control" name='stckcompany_name'>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="Stock_group_name" class="col-sm-12 control-label">Stock Group Name</label>
						<div class="col-sm-12">
							<input type="text" class="form-control" id="Stock_group_name" placeholder="Stock Group Name" name="Stock_group_name" required>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" onclick="add_stock_group()" class="btn btn-primary">Save changes</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->


<script>
	$(document).ready(function() {
		get_company_list();
	});

	function open_modal() {

		$("#stockgrpCrMdl").modal('show');
	}

	function get_company_list() {

		$.ajax({
			type: "POST",
			url: "<?= base_url("ImportController/get_companies") ?>",
			dataType: "json",
			async: false,
			cache: false,
			success: function(result) {
				var data = result.company_list;
				console.log(data);
				if (result.status === 'true') {
					$('#stckcompany_name').html('');
					$('#company_namestk').html(data);
					$('#company_namestk').select2();
					$('#stckcompany_name').html(data);

				} else {
					$('#stckcompany_name').html('');
					$('#company_namestk').html(data);
					$('#company_namestk').select2();
					$('#stckcompany_name').html(data);

				}
			},
		});
	}


	function get_stockgrp_list() {
		var company_name = $("#company_namestk").val();
		get_unit_list();
		$.ajax({
			type: "POST",
			url: "<?= base_url("ImportController/get_stockgroups") ?>",
			dataType: "json",
			async: false,
			cache: false,
			data: {
				company_name
			},
			success: function(result) {
				var data = result.group_list;
				console.log(data);
				if (result.status === 'true') {
					$('#stock_group').html(data);
					$('#stock_group').select2();
				} else {
					$('#stock_group').html(data);
					$('#stock_group').select2();
				}
			},
		});
	}
	function get_unit_list() {
		var company_name = $("#company_namestk").val();

		$.ajax({
			type: "POST",
			url: "<?= base_url("ImportController/getUnitofMeasure") ?>",
			dataType: "json",
			async: false,
			cache: false,
			data: {
				company_name
			},
			success: function(result) {
				var data = result.unit_list;
				console.log(data);
				if (result.status === 'true') {
					$('#unitofM').html(data);
					$('#unitofM').select2();
				} else {
					$('#unitofM').html(data);
					$('#unitofM').select2();
				}
			},
		});
	}
	
	function getFinalPrice() {
		var quantity=$("#quantity").val();
		var unit_price=$("#unit_price").val();
		$("#opening_balance").val(quantity*unit_price);
	}

	function insert_stock() {
		//
		$.ajax({
			type: "POST",
			url: "<?= base_url("ImportController/add_stock") ?>",
			dataType: "json",
			data: $("#add_stk_form").serialize(),
			async: false,
			cache: false,
			success: function(result) {
				console.log(result.status);
				if (result.status == 200) {
					alert("Imported Successfully");
				} else {
					alert("Fail to import");
				}
			},
		});
	}

	function add_stock_group() {
		$.ajax({
			type: "POST",
			url: "<?= base_url("ImportController/add_stock_group") ?>",
			dataType: "json",
			data: $("#add_stckgrp_form").serialize(),
			async: false,
			cache: false,
			success: function(result) {
				console.log(result.status);
				if (result.status == 200) {
					alert("Imported Successfully");
					get_stockgrp_list();
				} else {
					alert("Fail to import");
				}
			},
		});
	}
</script>
