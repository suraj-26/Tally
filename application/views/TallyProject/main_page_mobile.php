<?php
$user_name = $this->session->user_session->user_name;
$this->db->select('firm_name');
$this->db->where('firm_id', $this->session->user_session->firm_id);
$result = $this->db->get('partner_header_all')->row();
?>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Language" content="en">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Financial Management</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"
              />
        <meta name="description" content="ArchitectUI HTML Bootstrap 4 Dashboard Template">
        <!-- Disable tap highlight on IE -->
        <meta name="msapplication-tap-highlight" content="no">

       <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?= base_url() ?>main.87c0748b313a1dda75f5.css" rel="stylesheet">
        <script src="<?= base_url() ?>assets/scripts/jquery-2.1.3.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets/scripts/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <link href="<?= base_url() ?>assets/scripts/toastr/toastr.css" rel="stylesheet" type="text/css"/>
        <script src="<?= base_url() ?>assets/scripts/toastr/toastr.min.js" type="text/javascript"></script>
        <link href="<?= base_url() . "assets/"; ?>scripts/datatables/datatables.min.css" rel="stylesheet" type="text/css"/>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" rel="stylesheet" type="text/css"/>
		
        <script src="<?= base_url() . "assets/"; ?>scripts/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="//cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@1.6.0/src/loadingoverlay.min.js"></script>
        
		
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
		 
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/js/all.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
</head>
<style>
#upper_div{
	display: flex;
    background: #891635;
    color: white;
	padding:2%;
	
}
.leftsidmenu_div{
	    height: 100vh;
    background: white;
    width: 50%;
	border-right: 1px solid grey;
	position: fixed;
    top: 5% !important;
}
.app-sidebar__heading{
	text-align: CENTER;
}
.middle_divtall{
	background: white;
	height:100%
	
}
.list_lis{
	padding :2px;
	margin-left: -16px;
}
::placeholder{
	font-size:11px;
}
.form-control {
	font-size:11px;
}
.card-header{
	font-size:14px;
}

</style>

<body style="font-size:12px !important;" >
<div id="upper_div">
<div class="col-md-8"><h5>Financial Management</h5></div>

<div class="col-md-4 "><button class=" btn btn-link" type="button" id="menu1" onclick="drop_div()" style="float:right;">
						<i class="fa fa-bars text-white" style="font-size:12px"></i>
					</button>
					
					</div>

</div>
<div class="middle_divtall" id="middle_divtall" >
 <?php
                    if (isset($load_view)) {
                        foreach ($load_view as $view) {
                            $this->load->view($view);
                        }
                    }
                    ?>

</div>
<div id="drop_div" class="leftsidmenu_div" style="display:none">
<ul class="vertical-nav-menu" style="">
<li align="center" class="app-sidebar__heading" style="font-size:16px;">Menu</li><hr>
									 <li class="list_lis" >
										<a href="<?php echo base_url("InvoiceController/customer_account"); ?>">
                                                <i class="fa fa-file" style=""> </i>
                                                Invoice Management</a>
												</li>
												<li class="app-sidebar__heading" style="color:#891635;font-size:14px;text-align: left;
    margin-left: 16px;">Master Data Entry</li>
									 <li class="list_lis" >
										<a href="<?php echo base_url("ImportController/add_ledger_page"); ?>">
                                                <i class="fa fa-tasks"> </i>
                                                Add Ledger</a>
												</li>
												 <li class="list_lis" >
													<a href="<?php echo base_url("ImportController/add_group_page"); ?>">
                                                <i class="fa fa-users"> </i>
                                                Add Group</a>
												</li>
												 <li  class="list_lis">
												<a href="<?php echo base_url("ImportController/add_stock_summary_page"); ?>">
                                                <i class="fa fa-table"> </i>
                                                Stock summary</a>
												</li>
									<li class="app-sidebar__heading" style="color:#891635;font-size:14px;text-align: left;
    margin-left: 16px;">Transaction Entry</li>
                                        <li class="list_lis" >
                                            <a href="<?php echo base_url("ImportController/journal_entry"); ?>">
                                                <i class="fa fa-file"> </i>
                                                Journal Entry</a>
                                        </li>
										<li class="list_lis" >
                                            <a href="<?php echo base_url("ImportController/sale_purchase"); ?>">
                                                <i class="fa fa-random"> </i>
                                                Sale/Purchase</a>
                                        </li>
										<li class="list_lis" >
                                            <a href="<?php echo base_url("ImportController/receipt_voucher"); ?>">
                                                <i class="fa fa-th-list"> </i>
                                                Other Entry</a>
                                        </li>
										<li  class="app-sidebar__heading" style="color:#891635;font-size:14px;text-align: left;
    margin-left: 16px;">Reports</li>
										<li class="list_lis" >
                                            <a href="<?php echo base_url("ImportController/balance_sheet_page"); ?>">
                                                <i class="fa fa-bars"> </i>
                                                Balance Sheet</a>
                                        </li >
										<li  class="list_lis">
                                            <a href="<?php echo base_url("ImportController/ratio_analysis_page"); ?>">
                                                <i class="fa fa-sitemap"> </i>
                                                Ratio Analysis</a>
                                        </li>
										<li class="list_lis" >
                                            <a href="<?php echo base_url("ImportController/profit_n_loss_page"); ?>">
                                                <i class="fa fa-calendar"> </i>
                                                Profit and Loss</a>
                                        </li>
</ul>
</div>


</body>
</html>
<script type="text/javascript"
        src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
		
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
function drop_div()
{

		if ($('#drop_div').css('display') != 'none') {
		
		$('#drop_div').hide("slide", {direction: "left" }, 70);
		$('#drop_div').css('z-index', -3000);
		$('#middle_divtall').css('z-index', +9999);
	}else{
		$('#drop_div').show("slide", { direction: "left" }, 70);
		$('#drop_div').css('z-index', 3000);
		$('#middle_divtall').css('z-index', -9999);
	}

}
$( document ).ready(function() {
    $("#drop_div").hide();
});
</script>
