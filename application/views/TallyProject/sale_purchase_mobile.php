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
    flex-direction: column;
    flex: 1;
	background-color:#ffffff;
	">
<div class="col-md-12">
<br>

        <h3>Create Sale/Purchase Voucher</h3>
        <hr>

        <form class="form-horizontal" id="add_led_formsale"method="post" action="">
		<input type="hidden" id="file_id" name="file_id" value="<?php $file_id ?>">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-sm-6">
                        <label for="group-name" class=" control-label">Company Name</label>
                        <select id='company_name' class="form-control" name='company_name' onchange="get_ledger_list('party_ledger');get_ledger_list1()">
                            <option>Select Value</option>
                        </select>
                    </div>

                    <div class="col-sm-6">
                        <label for="group-name" class=" control-label">Party Ledger</label>
                        <select id='party_ledger' class="form-control" name='party_ledger' >
                            <option>Select Value</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="col-sm-6">
                        <label for="group-name" class=" control-label">Date</label>
                        <input type="text" class="form-control" id="date" placeholder="Date (YYYYMMDD)" name="date" >
                    </div>

                    <div class="col-sm-6">
                        <label for="group-name" class=" control-label">Amount</label>
                        <input type="text" class="form-control" id="amount" placeholder="Total Amount" name="amount" >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="col-sm-6">
                        <label for="group-name" class=" control-label">Invoice No</label>
                        <input type="text" class="form-control" id="invoiceno" placeholder="Invoice No" name="invoiceno" >
                    </div>

                    <div class="col-sm-6">
                        <label for="group-name" class=" control-label">Narration</label>
                        <input type="text" class="form-control" id="narration" placeholder="Narration" name="narration" >
                    </div>
                </div>
            </div>
			<div class="row"><br>
                <div class="col-md-12">
                    <div class="col-sm-6">
					<input type="radio" checked id="sales" name="vctype" value="Sales">
                       <label for="vehicle1">Sales</label>
					   <input type="radio" id="purchase" name="vctype" value="Purchase">
						<label for="vehicle2">Purchase</label>
                    </div>
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
                    <div class="col-md-12">
                        <div class="col-sm-6">
                            <label for="group-name" class=" control-label">Ledger</label>
                            <select id='ledger0' class="form-control" name='ledger0' >
                                <option>Select Value</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div id="item_div0" class="row">
                    <input type="hidden" id="div_count" name="div_count"value="0">
                    <div class="col-md-12">
                        <div class="col-sm-3">
                            <label for="group-name" class=" control-label">Item Name</label>
                            <input type="text" class="form-control" id="item_name" placeholder="Item Name" name="item_name0[]" >
                        </div>
                        <div class="col-sm-3">
                            <label for="group-name" class=" control-label">Quantity</label>
                            <input type="text" class="form-control" id="quantity" placeholder="Quantity" name="quantity0[]" >
                        </div>
                        <div class="col-sm-3">
                            <label for="group-name" class=" control-label">Rate</label>
                            <input type="text" class="form-control" id="rate" placeholder="Rate" name="rate0[]" >
                        </div>
                        <div class="col-sm-2">
                            <label for="group-name" class=" control-label">Amount</label>
                            <input type="text" class="form-control" id="amt" placeholder="Amount" name="amt0[]" >
							
                        </div>
						
						<div class="col-sm-1">
                            <label for="group-name" class=" control-label">  </label>
                            <button type="button" class="btn btn-link" onclick="remove_div(0)" style=""><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                </div>
                <div id="dynamic_div0"></div>
                <div class="col-sm-12"><br>
				<input type="hidden" id="tax_inp" name="tax_inp" value="1">
                    <button type="button" class="btn btn-link" style="outline: none;"onclick="repeat_div(0)">Add Items<i class="fa fa-plus" ></i></button>
                </div>
                <div class="row"> <hr>
                    <div class="col-md-12">
                        <div class="">
                            <h5> &nbsp;&nbsp;&nbsp;Taxation</h5></div>
							
                        <div class="col-sm-3">
                           
							<label for="group-name" class=" control-label">Name</label>
                            <select id='taxname0' class="form-control" name='taxname0[]' >
                                <option>Select Value</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label for="group-name" class=" control-label">Percent</label>
                            <input type="text" class="form-control" id="taxper" placeholder="Percent" name="taxper0[]" >
                        </div>
                        <div class="col-sm-3">
                            <label for="group-name" class=" control-label">Amount</label>
                            <input type="text" class="form-control" id="taxamt" placeholder="Rate" name="taxamt0[]" >
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-sm-3">
                           
							<label for="group-name" class=" control-label">Name</label>
                            <select id='taxname1' class="form-control" name='taxname0[]' >
                                <option>Select Value</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label for="group-name" class=" control-label">Percent</label>
                            <input type="text" class="form-control" id="taxper" placeholder="Percent" name="taxper0[]" >
                        </div>
                        <div class="col-sm-3">
                            <label for="group-name" class=" control-label">Amount</label>
                            <input type="text" class="form-control" id="taxamt" placeholder="Rate" name="taxamt0[]" >
                        </div>
                    </div>

                </div>


            </div> <hr>
            <div id="dynamic_div_n1"></div>
            <div class="row">
                <div class="col-sm-12 "  >
                    <div class="col-sm-4 "  ></div>
                    <div class="col-sm-4 " align="center" >
                        <button type="button" id="btn_div" class="btn btn-link " style="color: white;" onclick="repeat_div1()">Add more..</button></div>
                    <div class="col-sm-4 "  ></div>
                </div>
            </div>
		<div class="row"><br>
                <div class="col-sm-12 "  >
                    <div class="col-sm-4 "  ></div>
                    <div class="col-sm-4 " align="center" >
                        <button type="button" id="btn_div" class="btn btn-link " style="color: white;width:100%;background-color:grey" onclick="add_voucher()">Add Voucher</button></div>
                    <div class="col-sm-4 "  ></div>
                </div>
            </div>
        </form>
</div>
<div class="col-md-12"><br><br><br>
<div class="row">
<h3>View Sale/Purchase Entry </h3>
        <hr>
<div class="col-md-6">
 
 <input type="radio" checked id="sales1" name="vctype1" value="Sales">
                       <label for="vehicle1">Sales</label>
					   <input type="radio" id="purchase1" name="vctype1" value="Purchase">
						<label for="vehicle2">Purchase</label>

</div>
<div class="col-md-6">
 
<select id="month11" name="month11"  class="form-control" Onchange="get_sale_purchase_data()">
<option value="0">select month</option>
</select>
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
							function get_mon(){
								const monthNames = ["January", "February", "March", "April", "May", "June",
  "July", "August", "September", "October", "November", "December"
];		
							var num=01;
							var a='<option value="0">select month</option>';
							for(var i=0;i<=11;i++){
								 a += "<option value='"+num+"'>"+monthNames[i]+"</option>";
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
                                        console.log(data);
                                        if (result.status === 'true') {
                                            $('#company_name').html(data);
                                        } else {
                                            $('#company_name').html(data);
                                        }
                                    },
                                });
                            }
							function get_sale_purchase_data() {
								
								var mon=$("#month11").val();
								var company_name=$("#company_name").val();
								//var vctype1=$("#vctype1").val();
								
								var vctype1=$('input[name=vctype1]:checked').val();
								if(company_name == "" || mon == ""){
									alert('please select company/Month name');
									var mon=$("#month11").val("0");
									
									return;
								}else{
									 $.ajax({
                                    type: "POST",
                                    url: "<?= base_url("ExportController/exportsalepurchase") ?>",
                                    dataType: "json",
                                    async: false,
                                    cache: false,
									data:{mon,company_name,vctype1},
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
							function add_voucher(){
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
                                            alert('Something went wrong');
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

                                        } else {
                                            $('#' + id).html(data);

                                        }

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
                                            $('#taxname1').html(data);

                                        } else {
                                            $('#ledger0').html(data);
                                            $('#taxname0').html(data);
                                            $('#taxname1').html(data);

                                        }

                                    },
                                });
                            }
							
							function remove_div(id){
								$( "#item_div"+id ).remove();
							}
                            function repeat_div(id) {
								
                                let div_count = $('#div_count').val();
                                div_count = (div_count) * 1 + 1;
                                var task_data1 = '<div id="item_div' + div_count + '" class="row">' +
                                        '<div class="col-md-12">' +
                                        '<div class="col-sm-3">' +
                                        ' <label for="group-name" class=" control-label">Item Name</label>' +
                                        '<input type="text" class="form-control" id="item_name" placeholder="Item Name" name="item_name' + id + '[]" >' +
                                        '</div>' +
                                        '<div class="col-sm-3">' +
                                        '<label for="group-name" class=" control-label">Quantity</label>' +
                                        '<input type="text" class="form-control" id="quantity" placeholder="Quantity" name="quantity' + id + '[]" >' +
                                        '</div>' +
                                        '<div class="col-sm-3">' +
                                        '<label for="group-name" class=" control-label">Rate</label>' +
                                        '<input type="text" class="form-control" id="rate" placeholder="Rate" name="rate' + id + '[]" >' +
                                        ' </div>' +
                                        '<div class="col-sm-2">' +
                                        ' <label for="group-name" class=" control-label">Amount</label>' +
                                        '<input type="text" class="form-control" id="amt" placeholder="Amount" name="amt' + id + '[]" >' +
                                        '</div>' +
										'<div class="col-sm-1">'+
                            '<label for="group-name" class=" control-label">  </label>'+
                            '<button type="button" class="btn btn-link" onclick="remove_div('+div_count+')" style=""><i class="fa fa-times"></i></button>'+
                        '</div>'+
                                        '</div>' +
                                        '</div>';
                                $('#dynamic_div' + id).append(task_data1);

                                $('#div_count').val(div_count);
                            }

                            function repeat_div1() {

                                let div_count1 = $('#div_count1').val();
                                let tax_inp = $('#tax_inp').val();
                                div_count1 = (div_count1) * 1 + 1;
                                tax_inp = (tax_inp) * 1 + 1;

                                var task_data2 = '<div id="common_div' + div_count1 + '">' +
                                        '<div class="row">' +
                                        '<div class="col-md-12">' +
                                        '<div class="col-sm-6">' +
                                        '<label for="group-name" class=" control-label">Ledger</label>' +
                                        '<select id="ledger' + div_count1 + '" class="form-control" name="ledger' + div_count1 + '" >' +
                                        '<option>Select Value</option>' +
                                        '</select>' +
                                        '</div>' +
                                        '</div>' +
                                        '</div>' +
                                        '<div id="item_div'+div_count1+'" class="row">' +
                                        '<input type="hidden" id="div_count" value="0">' +
                                        '<div class="col-md-12">' +
                                        '<div class="col-sm-3">' +
                                        '<label for="group-name" class=" control-label">Item Name</label>' +
                                        '<input type="text" class="form-control" id="item_name" placeholder="Item Name" name="item_name' + div_count1 + '[]" >' +
                                        ' </div>' +
                                        '<div class="col-sm-3">' +
                                        ' <label for="group-name" class=" control-label">Quantity</label>' +
                                        '<input type="text" class="form-control" id="quantity" placeholder="Quantity" name="quantity' + div_count1 + '[]" >' +
                                        '</div>' +
                                        '<div class="col-sm-3">' +
                                        '<label for="group-name" class=" control-label">Rate</label>' +
                                        '<input type="text" class="form-control" id="rate" placeholder="Rate" name="rate' + div_count1 + '[]" >' +
                                        '</div>' +
                                        '<div class="col-sm-2">' +
                                        '<label for="group-name" class=" control-label">Amount</label>' +
                                        '<input type="text" class="form-control" id="amt" placeholder="Amount" name="amt' + div_count1 + '[]" >' +
                                        '</div>' +
										'<div class="col-sm-1">'+
                            '<label for="group-name" class=" control-label">  </label>'+
                            '<button type="button" class="btn btn-link" onclick="remove_div('+div_count1+')" style=""><i class="fa fa-times"></i></button>'+
                        '</div>'+
                                        '</div>' +
                                        '</div>' +
                                        '<div id="dynamic_div' + div_count1 + '"></div>' +
                                        '<div class="col-sm-12"><br>' +
                                        '<button type="button" class="btn btn-link" style="outline: none;" onclick="repeat_div(' + div_count1 + ')">Add Items<i class="fa fa-plus"></i></button>' +
                                        ' </div>' +
                                        '<div class="row"> <hr>' +
                                        '<div class="col-md-12">' +
                                        '<div class="">' +
                                        '<h5> &nbsp;&nbsp;&nbsp;Taxation</h5></div>' +
                                        '<div class="col-sm-3">' +
                                        '<label for="group-name" class=" control-label">Name</label>' +
                                        '<select id="taxname'+tax_inp+'" class="form-control" name="taxname'+div_count1+'[]" >'+
										'<option>Select Value</option>'+
										'</select>' +
										'</div>' ;
										var first=tax_inp;
										
                                        task_data2 += '<div class="col-sm-3">' +
                                        '<label for="group-name" class=" control-label">Percent</label>' +
                                        '<input type="text" class="form-control" id="taxper" placeholder="Percent" name="taxper' + div_count1 + '[]" >' +
                                        '</div>' +
                                        '<div class="col-sm-3">' +
                                        '<label for="group-name" class=" control-label">Amount</label>' +
                                        '<input type="text" class="form-control" id="taxamt" placeholder="Rate" name="taxamt' + div_count1 + '[]" >' +
                                        '</div>' +
                                        '</div>' +
                                        '</div>' +
                                        '<div class="row">' +
                                        '<div class="col-md-12">' +
                                        '<div class="col-sm-3">' +
                                        '<label for="group-name" class=" control-label">Name</label>' +
                                        '<select id="taxname'+(tax_inp = (tax_inp) * 1 + 1)+'" class="form-control" name="taxname'+div_count1+'[]" >'+
										'<option>Select Value</option>'+
										'</select>' +
                                        '</div>' ;
										
                                       task_data2 +=  '<div class="col-sm-3">' +
                                        '<label for="group-name" class=" control-label">Percent</label>' +
                                        '<input type="text" class="form-control" id="taxper" placeholder="Percent" name="taxper' + div_count1 + '[]" >' +
                                        '</div>' +
                                        '<div class="col-sm-3">' +
                                        '<label for="group-name" class=" control-label">Amount</label>' +
                                        '<input type="text" class="form-control" id="taxamt" placeholder="Rate" name="taxamt' + div_count1 + '[]" >' +
                                        '</div>' +
                                        '</div>' +
                                        '</div>' +
                                        '</div><hr></br>';

                                $('#dynamic_div_n1').append(task_data2);

                                get_ledger_list('ledger' + div_count1);
								get_ledger_list('taxname' + first);
								get_ledger_list('taxname' + tax_inp);
                                $('#div_count1').val(div_count1);
                                $('#tax_inp').val(tax_inp);

                            }

</script>