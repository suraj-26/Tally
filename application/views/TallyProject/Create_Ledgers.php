
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer Account Management</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="<?= base_url() ?>assets/css/folder-desktop-view.css" rel="stylesheet" type="text/css"/>
    <link href="<?= base_url() ?>assets/scripts/toastr/toastr.css" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
            integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
  
</head>
<body>

<input type="hidden" name="firm_id" id="firm_id" value="<?= $this->session->user_session->firm_id ?>"/>
<input type="hidden" name="userEmail" id="userEmail" value="<?= $this->session->user_session->email ?>"/>



<div class="f-container"><br>
    <div class="f-row">
        
        <div class="f-top-nav">
            
            <div class="col-md-12" style="align:center">
			<ul class="nav nav-tabs">
                    <li class="nav-item"><a data-toggle="tab" href="#tab-eg10-0" class="active nav-link">Ledger Creation</a></li>
                    <li class="nav-item"><a data-toggle="tab" href="#tab-eg10-1" class="nav-link">Group Creation</a></li>
                    <li class="nav-item"><a data-toggle="tab" href="#tab-eg10-2" class="nav-link">Stock Summary Creation</a></li>
					<li class="nav-item"><a data-toggle="tab" href="#tab-eg10-3" class="nav-link">Voucher Creation</a></li>

                </ul>
				<div class="tab-content">
                    <div class="tab-pane active " id="tab-eg10-0" role="tabpanel">
                        <div class="card-title">
                            <h5 class="card-header">
                                Create Ledgers
                            </h5>
                        </div>
                        <div class="row"></div>
						
						<form class="form-horizontal" id="add_led_form"method="post" action="">
                    <div class="form-group">
                        <label for="group-name" class="col-sm-4 control-label">Company Name</label>
                        <div class="col-sm-6">
                            <select id='company_name' class="form-control" name='company_name' onchange="get_ledger_list()">


                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="group-name" class="col-sm-4 control-label">Ledger Name</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="ledger_name" placeholder="Stock Group name" name="ledger_name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="item-name" class="col-sm-4 control-label">Parent</label>
                        <div class="col-sm-6">
                            <select id='ledger_id' class="form-control" name='ledger_id' >
                                <option>Select Parent Group</option>

                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="opening_balance" class="col-sm-4 control-label">Opening Balance</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="opening_balance" placeholder="Item Quantity" name="opening_balance" required>
                        </div>
                    </div>
					<div class="row">
						<div class="col-md-12" style="display: flex;">
						<div class="col-sm-3">
                        <label for="item-name" class="col-sm-4 control-label">GSTIN</label>
                        
                                <input type="text" class="form-control" id="gstin" placeholder="GSTIN" name="gstin" >
						</div>
						<div class="col-sm-3">
                        <label for="item-name" class="col-sm-4 control-label">Address</label>
						 <input type="text" class="form-control" id="address" placeholder="Address" name="address" >
						</div>
						
						</div>
						
						</div>
						<div class="row">
						<div class="col-md-12" style="display: flex;">
						<div class="col-sm-3">
                        <label for="item-name" class="col-sm-4 control-label">PAN No</label>
                        
                                <input type="text" class="form-control" id="panno" placeholder="PAN No" name="panno" >
						</div>
						
						
						</div>
						
						</div><br>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-6">
                            <button type="button" onclick="insert_ledger()"class="btn btn-primary">Insert</button>
                        </div>
                    </div>
                </form>
                        

                    </div>
                    <div class="tab-pane" id="tab-eg10-1" role="tabpanel">
                        <div class="card-title">
                            <h5 class="card-header">
                                Create Group
                            </h5>
                        </div>
                        <div class="row"></div>
                        <form class="form-horizontal" id="add_grp_form"method="post" action="">
                    <div class="form-group">
                        <label for="group-name" class="col-sm-4 control-label">Company Name</label>
                        <div class="col-sm-6">
                            <select id='company_namegrp' class="form-control" name='company_namegrp' onchange="get_ledger_list()">


                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="group-name" class="col-sm-4 control-label">Group Name</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="group_name" placeholder="Stock Group name" name="group_name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="item-name" class="col-sm-4 control-label">Parent</label>
                        <div class="col-sm-6">
                            <select id='parent_id' class="form-control" name='parent_id' >
                                <option>Select Parent Group</option>

                            </select>
                        </div>
                    </div>
					

                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-6">
                            <button type="button" onclick="insert_group()"class="btn btn-primary">Insert</button>
                        </div>
                    </div>
                </form>

                    </div>
                    <div class="tab-pane" id="tab-eg10-2" role="tabpanel">
						<div class="card-title">
                            <h5 class="card-header">
                                Create Stock Summary
                            </h5>
                        </div>
                        <div class="row"></div>
                        <form class="form-horizontal" id="add_stk_form"method="post" action="">
                    <div class="form-group">
                        <label for="group-name" class="col-sm-4 control-label">Company Name</label>
                        <div class="col-sm-6">
                            <select id='company_namestk' class="form-control" name='company_namestk' onchange="get_stockgrp_list()">


                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="item-name" class="col-sm-4 control-label">Parent</label>
                        <div class="col-sm-6">
                            <select id='stock_group' class="form-control" name='stock_group' >
                                <option>Select Stock Group</option>

                            </select><button type="button" onclick="open_modal()" class="btn btn-link">Add stock group</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="item-name" class="col-sm-4 control-label">Stock Item name</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="item_name" placeholder="Stock Item name" name="item_name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="opening_balance" class="col-sm-4 control-label">Opening Balance</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="opening_balance" placeholder="Opening Balance" name="opening_balance" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="opening_value" class="col-sm-4 control-label">Unit Price</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="opening_value" placeholder="Item Unit Price" name="opening_value" required>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-6">
                            <button type="button" onclick="insert_stock()"class="btn btn-primary">Insert</button>
                        </div>
                    </div>
                </form>
                        
						</div>
						 <div class="tab-pane" id="tab-eg10-3" role="tabpanel">
							<div class="card-title">
                            <h5 class="card-header">
                                Create Voucher
                            </h5>
                        </div>
                        <div class="row"></div>
						<button class="btn btn-primary" onclick="go_sale_purchase()">Create Sale/PurchaseVoucher</button>
						<button class="btn btn-primary" onclick="go_journal()">Create Journal Entry</button>
						<button class="btn btn-primary" onclick="go_all_vc()">Create Receipt/Contra/Credit Note/Debit Note</button>
                        
						</div>
                </div>
                    
				
              
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
                        <form class="form-horizontal" id="add_stckgrp_form"method="post" action="">
                            <div class="form-group">
                                <label for="group-name" class="col-sm-4 control-label">Company Name</label>
                                <div class="col-sm-6">
                                    <select id='stckcompany_name' class="form-control" name='stckcompany_name' >
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Stock_group_name" class="col-sm-4 control-label">Stock Group Name</label>
                                <div class="col-sm-6">
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
        </div>
		
        
		
        
    </div>
</div>




<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/js/all.min.js"
        integrity="sha512-YSdqvJoZr83hj76AIVdOcvLWYMWzy6sJyIMic2aQz5kh2bPTd9dzY3NtdeEAzPp/PhgZqr4aJObB3ym/vsItMg=="
        crossorigin="anonymous"></script>
<script src="<?= base_url() ?>assets/scripts/toastr/toastr.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/scripts/jquery-validation/js/jquery.validate.min.js"
        type="text/javascript"></script>
<script src="//cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@1.6.0/src/loadingoverlay.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>

</body>
<script>
$(document).ready(function () {
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
                                        success: function (result) {
                                            var data = result.company_list;
                                            console.log(data);
                                            if (result.status === 'true') {
                                                $('#company_name').html(data);
                                                $('#company_namegrp').html(data);
                                                $('#company_namestk').html(data);
                                                $('#stckcompany_name').html(data);
                                                $('#company_namevc').html(data);
                                            } else {
                                                $('#company_name').html(data);
                                                $('#company_namegrp').html(data);
                                                $('#company_namestk').html(data);
                                                $('#stckcompany_name').html(data);
                                                $('#company_namevc').html(data);
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
								function get_stockgrp_list() {
                                var company_name = $("#company_namestk").val();
								
                                $.ajax({
                                    type: "POST",
                                    url: "<?= base_url("ImportController/get_stockgroups") ?>",
                                    dataType: "json",
                                    async: false,
                                    cache: false,
                                    data: {company_name},
                                    success: function (result) {
                                        var data = result.group_list;
                                        console.log(data);
                                        if (result.status === 'true') {
                                            $('#stock_group').html(data);
                                        } else {
                                            $('#stock_group').html(data);
                                        }
                                    },
                                });
                            }
							function get_ledger_list1(){
								 var company_name = $("#company_namevc").val();
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
                                                $('#ledgername').html(data);
                                                $('#ledgername2').html(data);
                                                $('#tax_led1').html(data);
                                                $('#tax_led2').html(data);
                                                $('#tax_led3').html(data);
                                                $('#tax_led4').html(data);
												
                                            } else {
                                                $('#ledgername').html(data);
                                                $('#ledgername2').html(data);
                                                $('#tax_led1').html(data);
                                                $('#tax_led2').html(data);
                                                $('#tax_led3').html(data);
                                                $('#tax_led4').html(data);
                                            }
                                        },
                                    });
							}
                                function get_ledger_list() {
                                    var company_name = $("#company_name").val();
									if(company_name == "")
									{
                                    var company_name = $("#company_namegrp").val();
									}
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
                                                $('#parent_id').html(data);
												
                                            } else {
                                                $('#ledger_id').html(data);
                                                $('#parent_id').html(data);
                                            }
                                        },
                                    });
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
								function insert_group() {
                                    //
                                    $.ajax({
                                        type: "POST",
                                        url: "<?= base_url("ImportController/add_group") ?>",
                                        dataType: "json",
                                        data: $("#add_grp_form").serialize(),
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
								
								function insert_stock() {
                                //
                                $.ajax({
                                    type: "POST",
                                    url: "<?= base_url("ImportController/add_stock") ?>",
                                    dataType: "json",
                                    data: $("#add_stk_form").serialize(),
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
							function insert_voucher() {
                                    //
                                    $.ajax({
                                        type: "POST",
                                        url: "<?= base_url("ImportController/add_voucher") ?>",
                                        dataType: "json",
                                        data: $("#add_vc_form").serialize(),
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
								 function get_voucher_types() {
                                    var company_name = $("#company_namevc").val();
                                    $.ajax({
                                        type: "POST",
                                        url: "<?= base_url("ImportController/get_voucher_type") ?>",
                                        dataType: "json",
                                        async: false,
                                        cache: false,
                                        data: {company_name},
                                        success: function (result) {
                                            var data = result.v_type_list;
                                            console.log(data);
                                            if (result.status === 'true') {
                                                $('#vouchername').html(data);
                                            } else {
                                                $('#vouchername').html(data);
                                            }
                                        },
                                    });
                                }
								
								
								function go_sale_purchase(){
									window.location.assign("<?= base_url("ImportController/sale_purchase") ?>");
								}
								function go_journal(){
									window.location.assign("<?= base_url("ImportController/journal_entry") ?>");
								}
								function go_all_vc(){
									window.location.assign("<?= base_url("ImportController/receipt_voucher") ?>");
								}

</script>
</html>