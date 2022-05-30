<style>
	#btn_div {
		outline: none;
		background-color: #286090;
		text-align: center;
		color: white;
	}
</style>


<div class="" style="display: flex;
    flex-direction: row;
    flex: 1;
	background-color:#ffffff;
	">
	<div class="col-md-12"><br>


		<h5>Create Receipt/Payment Voucher</h5>
		<hr>
		<form class="form-horizontal" id="add_led_formsale" method="post" action="">
			<input type="hidden" id="file_id" name="file_id" value="<?php $file_id ?>">
			<div class="row">
				<div class="col-sm-6">
					<label for="group-name" class=" control-label">Company Name</label>
					<select id='company_name' class="form-control" name='company_name'
							onchange="get_ledger_list('party_ledger');get_ledger_list1()">
						<option>Select Value</option>
					</select>
				</div>
				<div class="col-sm-6">
					<label for="group-name" class=" control-label">Party Ledger</label>
					<select id='party_ledger' class="form-control" name='party_ledger'>
						<option>Select Value</option>
					</select>
				</div>

				<div class="col-sm-6">
					<label for="group-name" class=" control-label">Date</label>
					<input type="date" class="form-control" id="date" placeholder="Date (YYYYMMDD)" name="date">
				</div>
				<div class="col-sm-6">
					<label for="group-name" class=" control-label">Invoice Number</label>
					<input type="text" class="form-control" id="invoice" placeholder="Invoice No" name="invoice">
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="col-sm-12"><br>
						<input type="radio" checked id="rece" name="vtype" value="Receipt" onchange="disabledClicks()">
						<label for="vehicle1">Receipt</label>
						<input type="radio" id="pay" name="vtype" value="Payment" onchange="disabledClicks()">
						<label for="vehicle2">Payment</label>
						<input type="radio" id="contra" name="vtype" value="Contra" onchange="disabledClicks()">
						<label for="vehicle2">Contra</label>
						<input type="radio" id="debit_nt" name="vtype" value="Debit Note" onchange="disabledClicks()">
						<label for="vehicle2">Debit Note</label>
						<input type="radio" id="credit_nt" name="vtype" value="Credit Note" onchange="disabledClicks()">
						<label for="vehicle2">Credit Note</label>
					</div>

					<div class="col-sm-6">
						<label for="group-name" class=" control-label">Narration</label>
						<input type="text" class="form-control" id="narration" placeholder="Narration" name="narration">
					</div>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-md-12">
					<div class="col-sm-12">
						<h4>Item Entries</h4>
					</div>
				</div>
			</div>
			<div id="common_div">
				<input type="hidden" id="div_count1" name="div_count1" value="0">
				<div class="row">
					<div class="col-sm-12">
						<label for="group-name" class=" control-label">Ledger</label>
						<select id='ledger0' class="form-control" name='ledger0'>
							<option>Select Value</option>
						</select>
					</div>
					<div class="col-sm-6"><br>
						<input type="radio" checked id="credit" name="Rtype0" value="cr">
						<label for="vehicle1">Credit</label>
						<input type="radio" id="debit" name="Rtype0" value="dr">
						<label for="vehicle2">Debit</label>
					</div>
				</div>
				<div id="item_div0" class="row">
					<input type="hidden" id="div_count" name="div_count" value="0">
					<div class="col-md-12">
						<div class="col-sm-2 float-right">
							<label for="group-name" class=" control-label"> </label>
							<button type="button" class="btn btn-link" onclick="remove_div(0)" style="margin-top:42%;">
								<i class="fa fa-close"></i></button>
						</div>

						<div class="col-sm-8" style="padding: 5px">
							<label for="group-name" class=" control-label">Item Name</label>
							<select id='item_name00' class="form-control disvc" name='item_name0[]'>
								<option>Select Value</option>
							</select>
						</div>
					</div>
					<div class="col-sm-4">
						<label for="group-name" class=" control-label">Quantity</label>
						<input type="text" class="form-control disvc" id="quantity00" placeholder="Quantity"
							   name="quantity0[]" onkeyup="getFinalAmount('00')">
					</div>
					<div class="col-sm-4">
						<label for="group-name" class=" control-label">Rate</label>
						<input type="text" class="form-control disvc" id="rate00" placeholder="Rate" name="rate0[]" onkeyup="getFinalAmount('00')">
					</div>
					<div class="col-sm-4">
						<label for="group-name" class=" control-label">Amount</label>
						<input type="text" class="form-control " id="amt00" placeholder="Amount" name="amt0[]">

					</div>
				</div>
				<div id="dynamic_div0"></div>
				<div class="col-sm-12"><br>
					<input type="hidden" id="tax_inp" name="tax_inp" value="1">
					<button type="button" class="btn btn-link disvc" style="outline: none;" onclick="repeat_div(0)">Add Entries <i class="fa fa-plus"></i></button>
				</div>
			</div>
			<hr>
			<div id="dynamic_div_n1"></div>
			<div class="row">
				<div class="col-sm-6">
					<button type="button" id="btn_div" class="btn btn-link " style="color: white;"
							onclick="repeat_div1()">Add more..
					</button>
				</div>
				<div class="col-sm-6">
					<button type="button" id="btn_div" class="btn btn-link "
							style="color: white;width:100%;background-color:grey" onclick="add_voucher()">Add
						Voucher
					</button>
				</div>
			</div>
		</form>
	</div>
	<!--<div class="col-md-6"><br>
		<div class="row">
			<h5>View Receipt/Payment/Contra/Debit/Credit Note Entry </h5>
			<hr>
			<div class="col-md-6">

				<input type="radio" checked id="rece" name="vtype1" value="Receipt">
				<label for="vehicle1">Receipt</label>
				<input type="radio" id="pay1" name="vtype1" value="Payment">
				<label for="vehicle2">Payment</label>
				<input type="radio" id="contra1" name="vtype1" value="Contra">
				<label for="vehicle2">Contra</label>
				<input type="radio" id="debit_nt1" name="vtype1" value="Debit Note">
				<label for="vehicle2">Debit Note</label>
				<input type="radio" id="credit_nt1" name="vtype1" value="Credit Note">
				<label for="vehicle2">Credit Note</label>

			</div>
			<div class="col-md-6">

				<select id="month11" name="month11" class="form-control" Onchange="get_sale_purchase_data()">
					<option value="0">select month</option>
				</select>
			</div>

			<div class="col-md-6">
				<label>From Date:</label>
				<input type="date" id="from_date" name="from_date" class="form-control">
				<label>To Date:</label>
				<input type="date" id="to_date" name="to_date" class="form-control">
			</div>
			<div class="col-md-2">
				<button type="button" id="btnview" class="btn btn-primary" onclick="get_sale_purchase_data()">View</button>
			</div>
		</div>

			<div class="col-md-12" id="jdata" style="overflow: scroll;height:700px">


			</div>
		</div>-->
	</div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

<script>
	$(document).ready(function () {
		get_company_list();
		get_mon();
		disabledClicks();

	});
	function disabledClicks() {
		var vtype=$('input[name="vtype"]:checked').val();
		//disvc
		if(vtype == "Debit Note" || vtype== "Credit Note"){
			$(".disvc").attr('disabled',false);
		}else{
			$(".disvc").attr('disabled','disabled');
		}

	}
	function getFinalAmount(id) {
		console.log(id);
		var q=$("#quantity"+id).val();
		var r=$("#rate"+id).val();
		$("#amt"+id).val(q*r);

	}

	function get_mon() {
		const monthNames = ["January", "February", "March", "April", "May", "June",
			"July", "August", "September", "October", "November", "December"
		];
		var num = 01;
		var a = '<option value="0">select month</option>';
		for (var i = 0; i <= 11; i++) {
			a += "<option value='" + num + "'>" + monthNames[i] + "</option>";
			num++;
		}

		$("#month11").html(a);

	}

	function get_sale_purchase_data() {

		var from_date = $("#from_date").val();
		var to_date = $("#to_date").val();
		var company_name = $("#company_name").val();


		var vctype1 = $('input[name=vtype1]:checked').val();

		if (company_name == "" || mon == "") {
			alert('please select company/Month name');
			var mon = $("#month11").val("0");

			return;
		} else {
			$.ajax({
				type: "POST",
				url: "<?= base_url("ExportController/exportsalepurchase") ?>",
				dataType: "json",
				async: false,
				cache: false,
				data: {from_date,to_date, company_name, vctype1},
				success: function (result) {
					var data = result.data;
					console.log(data);
					if (result.status === 'true') {
						$('#jdata').html(data);
					} else {
						$('#jdata').html(data);
					}
				},
			});
		}

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

	function add_voucher() {
		//add_sale_purchase_data
		$.ajax({
			type: "POST",
			// url: "<?= base_url("ImportController/add_sale_purchase_data") ?>",
			url: "<?= base_url("ImportController/add_receipt") ?>",
			dataType: "json",
			async: false,
			cache: false,
			data: $("#add_led_formsale").serialize(),
			success: function (result) {
				var data = result.company_list;
				console.log(data);
				if (result.status == 200) {
					alert('Voucher Added Successfully');
					tallyTransaction();
				} else {
					alert('Something went wrong...ERROR : ' + result.error);
				}
			},
		});
	}


	function tallyTransaction() {
		var company_name = $("#Jcompany_name").val();
		$.ajax({
			type: "POST",
			url: "<?= base_url("ImportController/tallyTransaction") ?>",
			dataType: "json",
			data: $("#add_led_formsale").serialize()+'&formName=3',
			success: function (result) {
				if (result.status == 200){
					console.log('Added');
				}else{
					console.log("something went wrong.");
				}
			},
		});
	}

	function get_ledger_list(id) {
		get_stockItems_list('00');
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

				if (result.status === 'true') {
					$('#' + id).html(data);

				} else {
					$('#' + id).html(data);

				}
				$('#' + id).select2();

			},
		});
	}

	function get_ledger_list1() {
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
					$('#ledger0').html(data);
					$('#ledger0').select2();
					$('#bank_name').html(data);
					$('#taxname1').html(data);
					$('#party_ledger').html(data);

				} else {
					$('#ledger0').html(data);
					$('#ledger0').select2();
					$('#bank_name').html(data);
					$('#taxname0').html(data);
					$('#taxname1').html(data);
					$('#party_ledger').html(data);

				}

			},
		});
	}

	function remove_div(id) {
		$("#item_div" + id).remove();
	}

	function repeat_div(id) {

		let div_count = $('#div_count').val();
		div_count = (div_count) * 1 + 1;
		var task_data1 = '<hr><div id="item_div' + div_count + '" class="row">' +
				'<div class="col-md-12">' +
				'<div class="col-sm-2 float-right">' +
				'<label for="group-name" class=" control-label">  </label>' +
				'<button type="button" class="btn btn-link" onclick="remove_div(' + div_count + ')" style="margin-top:42%;"><i class="fa fa-close"></i></button>' +
				'</div>' +
				'<div class="col-sm-8" style="padding: 5px">' +
				' <label for="group-name" class=" control-label">Item Name</label>' +
				'<select id="item_name'+id+div_count+'" class="form-control disvc" name="item_name' + id + '[]"> <option>Select Value</option> </select>' +
				'</div>' +
				'<div class="row">'+
				'<div class="col-sm-4">' +
				'<label for="group-name" class=" control-label">Quantity</label>' +
				'<input type="text" class="form-control disvc" id="quantity'+id+div_count+'" placeholder="Quantity" name="quantity' + id + '[]" onkeyup="getFinalAmount(\''+id+div_count+'\')">' +
				'</div>' +
				'<div class="col-sm-4">' +
				'<label for="group-name" class=" control-label">Rate</label>' +
				'<input type="text" class="form-control disvc" id="rate'+id+div_count+'" placeholder="Rate" name="rate' + id + '[]" onkeyup="getFinalAmount(\''+id+div_count+'\')">' +
				' </div>' +
				'<div class="col-sm-4">' +
				' <label for="group-name" class=" control-label">Amount</label>' +
				'<input type="text" class="form-control" id="amt'+id+div_count+'" placeholder="Amount" name="amt' + id + '[]" >' +
				'</div>' +
				'</div>' +
				'</div>';
		$('#dynamic_div' + id).append(task_data1);

		$('#div_count').val(div_count);
		get_stockItems_list(''+ id +div_count);
	}

	function repeat_div1() {

		let div_count1 = $('#div_count1').val();
		let tax_inp = $('#tax_inp').val();
		div_count1 = (div_count1) * 1 + 1;
		tax_inp = (tax_inp) * 1 + 1;

		var task_data2 = '<hr><div id="common_div' + div_count1 + '">' +
				'<div class="row">' +
				'<div class="col-sm-12">' +
				'<label for="group-name" class=" control-label">Ledger</label>' +
				'<select id="ledger' + div_count1 + '" class="form-control" name="ledger' + div_count1 + '" >' +
				'<option>Select Value</option>' +
				'</select>' +
				'</div>' +
				'<div class="col-sm-12">' +
				'<br>' +
				'<input type="radio" checked id="credit" name="Rtype' + div_count1 + '" value="cr">' +
				'<label for="vehicle1">Credit</label> ' +
				'<input type="radio" id="debit" name="Rtype' + div_count1 + '" value="dr">' +
				'<label for="vehicle2">Debit</label>' +
				'</div>' +
				'</div>' +
				'</div>' +
				'<div id="item_div' + div_count1 + '" class="row">' +
				'<input type="hidden" id="div_count" value="0">' +
				'<div class="col-md-12">' +
				'<div class="col-sm-2 float-right">' +
				'<label for="group-name" class=" control-label">  </label>' +
				'<button type="button" class="btn btn-link" onclick="remove_div(' + div_count1 + ')" style="margin-top:42%;"><i class="fa fa-close"></i></button>' +
				'</div>' +
				'<div class="col-sm-8" style="padding: 5px;">' +
				'<label for="group-name" class=" control-label">Item Name</label>' +
				'<select id="item_name'+div_count1+'" class="form-control disvc" name="item_name' + div_count1 + '[]"> <option>Select Value</option> </select>' +
				' </div>' +
				'<div class="row">'+
				'<div class="col-sm-4">' +
				' <label for="group-name" class=" control-label">Quantity</label>' +
				'<input type="text" class="form-control disvc" id="quantity'+div_count1+'" placeholder="Quantity" name="quantity' + div_count1 + '[]" onkeyup="getFinalAmount(\''+div_count1+'\')" >' +
				'</div>' +
				'<div class="col-sm-4">' +
				'<label for="group-name" class=" control-label">Rate</label>' +
				'<input type="text" class="form-control disvc" id="rate'+div_count1+'" placeholder="Rate" name="rate' + div_count1 + '[]" onkeyup="getFinalAmount(\''+div_count1+'\')" >' +
				'</div>' +
				'<div class="col-sm-4">' +
				'<label for="group-name" class=" control-label">Amount</label>' +
				'<input type="text" class="form-control" id="amt'+div_count1+'" placeholder="Amount" name="amt' + div_count1 + '[]" >' +
				'</div>' +
				'</div>' +
				'</div>' +
				'<div id="dynamic_div' + div_count1 + '"></div>' +
				'<div class="col-sm-12"><br>' +
				'<button type="button" class="btn btn-link disvc" style="outline: none;" onclick="repeat_div(' + div_count1 + ')">Add Entries <i class="fa fa-plus"></i></button>' +
				' </div>';


		$('#dynamic_div_n1').append(task_data2);

		get_ledger_list('ledger' + div_count1);
		$('#div_count1').val(div_count1);
		$('#tax_inp').val(tax_inp);
		disabledClicks();
		get_stockItems_list(div_count1);

	}

	function get_stockItems_list(id) {
		var company_name = $("#company_name").val();
		console.log(id);
		$.ajax({
			type: "POST",
			url: "<?= base_url("ImportController/get_stockItems") ?>",
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
					$('#item_name' + id).html(data);
					$('#item_name' + id).select2();
				} else {
					$('#item_name' + id).html(data);
					$('#item_name' + id).select2();
				}
			},
		});
	}

</script>
