<?php
$file_id
?>
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
	<div class="col-md-6">
		<br>
		<h3>Create Sale/Purchase Voucher</h3>
		<hr>
		<form class="form-horizontal" id="add_led_formsale" method="post" action="">
			<input type="hidden" id="file_id" name="file_id" value="<?php $file_id ?>">
			<div class="row m-2"><br>
				<div class="col-sm-6">
					<input type="radio"  id="sales" name="vctype" value="Sales" onclick="changesState('1')" >
					<label for="vehicle1">Sales</label>
					<input type="radio" id="purchase" name="vctype" value="Purchase" onclick="changesState('2')" >
					<label for="vehicle2">Purchase</label>
					<input type="radio" id="expense" name="vctype" value="Expense" onclick="changesState('3')">
					<label for="vehicle2">Expense</label>
				</div>
				<div class="col-sm-6" id="PurchaseInvoiceInput" style="">
					<input type="radio" checked id="item_invoice" name="acc_item_invoice" value="2" onclick="getStockorledger(2)">
					<label for="vehicle2">Item Invoice</label>
					<input type="radio"  id="acc_invoice" name="acc_item_invoice" value="1"  onclick="getStockorledger(1)">
					<label for="vehicle1">Accounting Invoice</label>



				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<label for="group-name" class=" control-label">Company Name</label>
					<select id='company_name' class="form-control" name='company_name'
							onchange="checkSelectionType();">
						<option>Select Value</option>
					</select>
				</div>

				<div class="col-sm-6">
					<label for="group-name" class=" control-label">Party Ledger</label>
					<select id='party_ledger' class="form-control" name='party_ledger'>
						<option>Select Value</option>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<label for="group-name" class=" control-label">Date</label>
					<input type="date" class="form-control" id="date" placeholder="Date (YYYYMMDD)" name="date">
				</div>

				<div class="col-sm-6">
					<label for="group-name" class=" control-label">Amount</label>
					<input type="text" class="form-control" id="amount" placeholder="Total Amount" name="amount">
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<label for="group-name" class=" control-label">Invoice No</label>
					<input type="text" class="form-control" id="invoiceno" placeholder="Invoice No"
						   name="invoiceno">
				</div>

				<div class="col-sm-6">
					<label for="group-name" class=" control-label">Narration</label>
					<input type="text" class="form-control" id="narration" placeholder="Narration" name="narration">
				</div>
			</div>

			<hr>
			<div class="row">
				<div class="col-md-12">
					<div class="col-sm-6">
						<h4>Item Entries</h4>
					</div>
				</div>
			</div>
			<div id="common_div">
				<input type="hidden" id="div_count1" name="div_count1" value="0">
				<div class="row">
					<div class="col-sm-6">
						<label for="group-name" class=" control-label">Ledger</label>
						<select id='ledger0' class="form-control" name='ledger0'>
							<option>Select Value</option>
						</select>
					</div>
				</div>
				<div id="item_div0" class="row">
					<input type="hidden" id="div_count" name="div_count" value="0">
					<div class="col-md-12 p-0">
						<div class="col-sm-2 float-right">
							<label for="group-name" class=" control-label"> </label>
							<button type="button" class="btn btn-link" onclick="remove_div(0,this)" style="margin-top:42%;">
								<i class="fa fa-close"></i></button>
						</div>
						<div class="col-sm-10" style="padding:5px">
							<label for="group-name" class=" control-label">Item Name</label>

							<select id='item_name00' class="form-control itemClass" name='item_name0[]'>
								<option>Select Value</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4">
							<label for="group-name" class=" control-label">Quantity</label>
							<input type="text" class="form-control" id="quantity00" placeholder="Quantity"
								   name="quantity0[]" onKeyup="changeTotal('00')">
						</div>
						<div class="col-sm-4">
							<label for="group-name" class=" control-label">Rate</label>
							<input type="text" class="form-control" id="rate00" placeholder="Rate" name="rate0[]" onKeyup="changeTotal('00')">
						</div>
						<div class="col-sm-4">
							<label for="group-name" class=" control-label">Amount</label>
							<input type="text" class="form-control amt0" value="0" onKeyup="getValue(this)" id="amt00" placeholder="Amount" name="amt0[]">

						</div>
					</div>
				</div>
				<div id="dynamic_div0"></div>
				<div class="col-sm-12"><br>
					<input type="hidden" id="tax_inp" name="tax_inp" value="1">
					<button type="button" class="btn btn-link itemClass" style="outline: none;" onclick="repeat_div(0)">Add
						Entries <i class="fa fa-plus"></i></button>
				</div>
				<div class="row">
					<hr>
					<div class="col-sm-12">
						<h5> &nbsp;&nbsp;&nbsp;Taxation</h5>
					</div>
					<div class="col-sm-4">
						<label for="group-name" class=" control-label">Name</label>
						<select id='taxname0' class="form-control" name='taxname0[]'>
							<option>Select Value</option>
						</select>
					</div>
					<div class="col-sm-4">
						<label for="group-name" class=" control-label">Percent</label>
						<input type="text" class="form-control taxper0" onKeyup="getTotal(this)" value="0" id="taxper" placeholder="Percent" name="taxper0[]">
					</div>
					<div class="col-sm-4">
						<label for="group-name" class=" control-label">Amount</label>
						<input type="text" class="form-control taxamt0" value="0" id="taxamt" placeholder="Amount" name="taxamt0[]">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<label for="group-name" class=" control-label">Name</label>
						<select id='taxname1' class="form-control" name='taxname0[]'>
							<option>Select Value</option>
						</select>
					</div>
					<div class="col-sm-4">
						<label for="group-name" class=" control-label">Percent</label>
						<input type="text" class="form-control taxper10" onKeyup="getTotal(this)" value="0" id="taxper" placeholder="Percent" name="taxper0[]">
					</div>
					<div class="col-sm-4">
						<label for="group-name" class=" control-label">Amount</label>
						<input type="text" class="form-control taxamt10"  value="0" id="taxamt" placeholder="Amount" name="taxamt0[]">
					</div>
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
	<div class="col-md-6"><br>
		<div class="row">
			<h3>View Sale/Purchase Entry </h3>
			<hr>
			<div class="row">
			<div class="col-md-5">

				<input type="radio" checked id="sales1" name="vctype1" value="Sales">
				<label for="vehicle1">Sales</label>
				<input type="radio" id="purchase1" name="vctype1" value="Purchase">
				<label for="vehicle2">Purchase</label>
				<input type="radio" id="expense1" name="vctype1" value="Expenses">
				<label for="vehicle2">Expense</label>

			</div>
			<div class="col-md-5">
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
		</div>
	</div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script>
	$(document).ready(function () {
		get_company_list();
		get_mon();
	});
	function checkSelectionType(){
		if ($('input[name=vctype]:checked').length > 0) {
			get_ledger_list('party_ledger');get_ledger_list1();get_stockItems_list('item_name00')
		}else{
			alert("Select Type of Entry!!");
			$("#company_name").val("");
		}


	}
	function changesState(id) {
		if(id == 3){
			$('.itemClass').attr("disabled","disabled");
			$('#item_invoice').attr("disabled","disabled");
			$('#item_invoice').attr("checked",false);
			$('#acc_invoice').attr("checked",true);
		}else{
			$('.itemClass').attr("disabled",false);
			$('#item_invoice').attr("disabled",false);
		}

	}

/*	function SelectInvoiceFormat(id) {
		if(id==1){
		$("#PurchaseInvoiceInput").hide();
		}else{
		$("#PurchaseInvoiceInput").show();
		}
	}*/
	
	function getStockorledger(id) {
		if(id == 1){
			$('.itemClass').attr("disabled","disabled");
		}else{
			$('.itemClass').attr("disabled",false);
		}
	}

	function get_mon() {
		const monthNames = ["January", "February", "March", "April", "May", "June",
			"July", "August", "September", "October", "November", "December"
		];
		var num = 1;
		var a = '<option value="0">select month</option>';
		for (var i = 0; i <= 11; i++) {
			a += "<option value='" + num + "'>" + monthNames[i] + "</option>";
			num++;
		}

		$("#month11").html(a);

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

	function get_sale_purchase_data() {

		var from_date = $("#from_date").val();
		var to_date = $("#to_date").val();
		var company_name = $("#company_name").val();
		//var vctype1=$("#vctype1").val();

		var vctype1 = $('input[name=vctype1]:checked').val();
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

	function add_voucher() {
		//add_sale_purchase_data
		$.ajax({
			type: "POST",
			// url: "<?= base_url("ImportController/add_sale_purchase_data") ?>",
			url: "<?= base_url("ImportController/test_tally") ?>",
			dataType: "json",
			async: false,
			cache: false,
			data: $("#add_led_formsale").serialize(),
			success: function (result) {
				var data = result.company_list;
				console.log(data);
				if (result.status == 200) {
					alert('Voucher Added Successfully');
				} else {
					alert('Something went wrong...ERROR : ' + result.error);
				}
			},
		});
	}

	function get_ledger_list(id) {

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
					$('#' + id).select2();

				} else {
					$('#' + id).html(data);
					$('#' + id).select2();

				}


			},
		});
	}
	function get_stockgrp_list(id) {
		var company_name = $("#company_name").val();

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
					$('#' + id).html(data);
				} else {
					$('#' + id).html(data);
				}
			},
		});
	}
	function get_stockItems_list(id) {
		var company_name = $("#company_name").val();

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
					$('#' + id).html(data);
				} else {
					$('#' + id).html(data);
				}
				$('#' + id).select2();
			},
		});
	}


	function get_ledger_list1() {
		var acc_item_invoice=$('input[name="acc_item_invoice"]:checked').val();

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
					$('#taxname0').html(data);
					$('#taxname1').html(data);
						$('#ledger0').html(data);
						$('#ledger0').select2();
						$('#taxname0').select2();
						$('#taxname1').select2();

				},
			});


	}

	function remove_div(id,val) {
		var cl_id = '';
		var parent_div = $(val).parent().parent().parent()[0].id;
		if(parent_div.search(/item_div0/) === 1){
			cl_id = 0;
		}else{
			if(parent_div.includes('item_div')){
				var pd = $(val).parent().parent().parent().parent()[0].id;
				cl_id = pd.slice(-1);
			}else {
				cl_id = parent_div.slice(-1);
			}
		}
		$("#item_div" + id).remove();
		var all = [];
		var sum = 0;
		// var cl_id = '';
		// var parent = $('#item_div'+id).parent();
		// var parent_id = parent[0].id;
		// var p_id = parent_id.slice(-1);
		$('.amt'+cl_id).map(function () {
			all.push(this.value);
		}).get();
		if(all.length > 0){
			sum = eval(all.join("+"));
		}
		var percent = $('.taxper'+cl_id).val();
		var percent1 = $('.taxper1'+cl_id).val();

		var total = 0;
		var total1 = 0;

		total = parseInt(percent) / 100 * sum;
		total1 = parseInt(percent1) / 100 * sum;
		if(Number.isNaN(total)){
			total = 0;
		}
		if(Number.isNaN(total1)){
			total1 = 0;
		}
		$('.taxamt'+cl_id).val(total);
		$('.taxamt1'+cl_id).val(total1);
	}

	function repeat_div(id) {

		let div_count = $('#div_count').val();
		div_count = (div_count) * 1 + 1;
		var task_data1 = '<hr><div id="item_div' + div_count + '" class="row">' +
				'<div class="col-md-12 p-0">' +
				'<div class="col-sm-2 float-right">' +
				'<label for="group-name" class=" control-label">  </label>' +
				'<button type="button" class="btn btn-link" onclick="remove_div(' + div_count + ',this)"><i class="fa fa-close"></i></button>' +
				'</div>' +
				'<div class="col-sm-10" style="padding: 5px;">' +
				' <label for="group-name" class=" control-label">Item Name</label>' +
				'<select id="item_name' + id + div_count + '"class="form-control itemClass" name="item_name' + id + '[]"> <option>Select Value</option> </select>' +
				'</div>' +
				'<div class="row">' +
				'<div class="col-sm-4">' +
				'<label for="group-name" class=" control-label">Quantity</label>' +
				'<input type="text" class="form-control" id="quantity' + id + div_count + '" placeholder="Quantity" name="quantity' + id + '[]" onKeyup="changeTotal(\'' + id + div_count + '\')">' +
				'</div>' +
				'<div class="col-sm-4">' +
				'<label for="group-name" class=" control-label">Rate</label>' +
				'<input type="text" class="form-control" id="rate' + id + div_count + '" placeholder="Rate" name="rate' + id + '[]" onKeyup="changeTotal(\'' + id + div_count + '\')">' +
				' </div>' +
				'<div class="col-sm-4">' +
				' <label for="group-name" class=" control-label">Amount</label>' +
				'<input type="text" class="form-control amt' + id + '" onKeyup="getValue(this)" value="0" id="amt' + id + div_count + '" placeholder="Amount" name="amt' + id + '[]" >' +
				'</div>' +
				'</div>' +
				'</div>';
		$('#dynamic_div' + id).append(task_data1);
		get_stockItems_list('item_name' + id + div_count);
		$('#div_count').val(div_count);
	}

	function repeat_div1() {

		let div_count1 = $('#div_count1').val();
		let tax_inp = $('#tax_inp').val();
		div_count1 = (div_count1) * 1 + 1;
		tax_inp = (tax_inp) * 1 + 1;

		var task_data2 = '<hr><div id="common_div' + div_count1 + '">' +
				'<div class="row">' +
				'<div class="col-sm-6">' +
				'<label for="group-name" class=" control-label">Ledger</label>' +
				'<select id="ledger' + div_count1 + '" class="form-control" name="ledger' + div_count1 + '" >' +
				'<option>Select Value</option>' +
				'</select>' +
				'</div>' +
				'</div>' +
				'<div id="item_div' + div_count1 + '" class="row">' +
				'<input type="hidden" id="div_count" value="0">' +
				'<div class="col-md-12 p-0">' +
				'<div class="col-sm-2 float-right">' +
				'<label for="group-name" class=" control-label">  </label>' +
				'<button type="button" class="btn btn-link" onclick="remove_div(' + div_count1 + ',this)" style="margin-top:42%;"><i class="fa fa-close"></i></button>' +
				'</div>' +
				'<div class="col-sm-10" style="padding:5px">' +
				'<label for="group-name" class=" control-label">Item Name</label>' +
				'<select id="item_name' + div_count1 + '"class="form-control itemClass" name="item_name' + div_count1 + '[]"> <option>Select Value</option> </select>' +
				' </div>' +
				'</div>' +
				'<div class="row">' +
				'<div class="col-sm-4">' +
				' <label for="group-name" class=" control-label">Quantity</label>' +
				'<input type="text" class="form-control" id="quantity' + div_count1 + '" placeholder="Quantity" name="quantity' + div_count1 + '[]" onKeyup="changeTotal(\''+div_count1+'\')">' +
				'</div>' +
				'<div class="col-sm-4">' +
				'<label for="group-name" class=" control-label">Rate</label>' +
				'<input type="text" class="form-control" id="rate' + div_count1 + '" placeholder="Rate" name="rate' + div_count1 + '[]" onKeyup="changeTotal(\''+div_count1+'\')">' +
				'</div>' +
				'<div class="col-sm-4">' +
				'<label for="group-name" class=" control-label">Amount</label>' +
				'<input type="text" class="form-control amt' + div_count1 + '" onKeyup="getValue(this)"  value="0" id="amt' + div_count1 + '" placeholder="Amount" name="amt' + div_count1 + '[]" >' +
				'</div>' +
				'</div>' +
				'</div>' +
				'<div id="dynamic_div' + div_count1 + '"></div>' +
				'<div class="col-sm-12">' +
				'<button type="button" class="btn btn-link itemClass" style="outline: none;" onclick="repeat_div(' + div_count1 + ')">Add Entries <i class="fa fa-plus"></i></button>' +
				' </div>' +
				'<div class="row"> <hr>' +
				'<div class="col-sm-12">' +
				'<h5> &nbsp;&nbsp;&nbsp;Taxation</h5></div>' +
				'<div class="col-sm-4">' +
				'<label for="group-name" class=" control-label">Name</label>' +
				'<select id="taxname' + tax_inp + '" class="form-control" name="taxname' + div_count1 + '[]" >' +
				'<option>Select Value</option>' +
				'</select>' +
				'</div>';
		var first = tax_inp;

		task_data2 += '<div class="col-sm-4">' +
				'<label for="group-name" class=" control-label">Percent</label>' +
				'<input type="text" class="form-control taxper'+div_count1+'" id="taxper" onKeyup="getTotal(this)" value="0" placeholder="Percent" name="taxper' + div_count1 + '[]" >' +
				'</div>' +
				'<div class="col-sm-4">' +
				'<label for="group-name" class=" control-label">Amount</label>' +
				'<input type="text" class="form-control taxamt'+div_count1+'" id="taxamt" value="0" placeholder="Amount" name="taxamt' + div_count1 + '[]" >' +
				'</div>' +
				'</div>' +
				'</div>' +
				'<div class="row">' +
				'<div class="col-sm-4">' +
				'<label for="group-name" class=" control-label">Name</label>' +
				'<select id="taxname' + (tax_inp = (tax_inp) * 1 + 1) + '" class="form-control" name="taxname' + div_count1 + '[]" >' +
				'<option>Select Value</option>' +
				'</select>' +
				'</div>';

		task_data2 += '<div class="col-sm-4">' +
				'<label for="group-name" class=" control-label">Percent</label>' +
				'<input type="text" class="form-control taxper1'+div_count1+'" value="0" onKeyup="getTotal(this)" " id="taxper" placeholder="Percent" name="taxper' + div_count1 + '[]" >' +
				'</div>' +
				'<div class="col-sm-4">' +
				'<label for="group-name" class=" control-label">Amount</label>' +
				'<input type="text" class="form-control taxamt1'+div_count1+'"  value="0" id="taxamt" placeholder="Amount" name="taxamt' + div_count1 + '[]" >' +
				'</div>' +
				'</div>' +
				'</div><hr>';

		$('#dynamic_div_n1').append(task_data2);
		var acc_item_invoice=$('input[name="acc_item_invoice"]:checked').val();
		if(acc_item_invoice == 1){
			get_ledger_list('ledger' + div_count1);
			$('#ledger' + div_count1).select2();
			get_ledger_list('taxname' + first);
			get_ledger_list('taxname' + tax_inp);
		}else{
			get_stockgrp_list('ledger' + div_count1);
			$('#ledger' + div_count1).select2();
			get_ledger_list('taxname' + first);
			get_ledger_list('taxname' + tax_inp);

		}
		get_stockItems_list('item_name' + div_count1);
		$('#div_count1').val(div_count1);
		$('#tax_inp').val(tax_inp);
		if ($('#expense').is(":checked"))
		{
			$('.itemClass').attr("disabled","disabled");
		}
		if ($('#acc_invoice').is(":checked"))
		{
			$('.itemClass').attr("disabled","disabled");
		}

	}

	function changeTotal(id) {
		console.log(id);
		var quantity=$("#quantity"+id).val();
		var rate=$("#rate"+id).val();
		$("#amt"+id).val(quantity*rate);

	}

	function getValue(val) {
		var cl = val.className.split(" ")[1];
		var all = [];
		let sum = 0;
		$('.'+cl).map(function () {
			all.push(this.value);
		}).get();
		if(all.length > 0){
			sum = eval(all.join("+"));
		}
		var id = cl.slice(-1);
		var percent = $('.taxper'+id).val();
		var percent1 = $('.taxper1'+id).val();

		var total = 0;
		var total1 = 0;

		total = parseInt(percent) / 100 * sum;
		total1 = parseInt(percent1) / 100 * sum;

		if(Number.isNaN(total)){
			total = 0;
		}
		if(Number.isNaN(total1)){
			total1 = 0;
		}
		$('.taxamt'+id).val(total);
		$('.taxamt1'+id).val(total1);
	}

	function getTotal(val) {
		var cl = val.className.split(" ")[1];
		var all = [];
		let sum = 0;
		var id = cl.slice(-1);
		$('.amt'+id).map(function () {
			all.push(this.value);
		}).get();
		if(all.length > 0){
			sum = eval(all.join("+"));
		}
		var percent = $('.taxper'+id).val();
		var percent1 = $('.taxper1'+id).val();

		var total = 0;
		var total1 = 0;

		total = parseInt(percent) / 100 * sum;
		total1 = parseInt(percent1) / 100 * sum;
		if(Number.isNaN(total)){
			total = 0;
		}
		if(Number.isNaN(total1)){
			total1 = 0;
		}
		$('.taxamt'+id).val(total);
		$('.taxamt1'+id).val(total1);
	}

</script>
