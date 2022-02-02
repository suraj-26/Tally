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

       <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
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
        <style>
            .modal-backdrop, .blockOverlay{
                display: none;
                z-index:-99!important;
            }
            .modal {
                padding-top:35px;
                z-index: 2040!important;
            }
            .PS {
                background: none !important;
            }


            .loader12 {
                position: fixed;
                display:none;
                left: 0px;
                top: 0px;
                width: 100%;
                height: 100%;
                z-index: 9999;
                background: url('<?= base_url() . "assets/"; ?>images/loading1.gif') 50% 50% no-repeat rgb(249,249,249);
            }
            .vertical-nav-menu i.metismenu-state-icon, .vertical-nav-menu i.metismenu-icon {
                opacity: 1;
            }
			vertical-nav-menu li a {
			color: #4167ca !important;

			}
			.app-sidebar__heading{
				margin-left: 8px;
			}
			.list_lis{
				padding:8px;
				color:red important;
				font-size:14px;
				margin-left: -30px;
			}
			.app-sidebar{
				min-width: 9%;
			}
			.fixed-sidebar .app-main .app-main__outer {
    padding-left:20px;
	padding-right:20px;

}
.app-theme-white .app-header {
    background: #891635;
}
.app-theme-white.fixed-header .app-header__logo {
     background: #891635;

}
.fixed-header .app-header{
width: 108%;
}
	.card-header{
		font-size:16px;
	}
.dphdr{
	  padding: 17px !important;
    margin: 1%;
    font-size: 14px !important;
    border-bottom: 2px solid #d3d3d3 !important;
    width: 250px !important;
	padding-left: 15% !important;
}
.dphdr:hover {
  background-color: #891635 !important;
  color:white !important;
}
        </style>
    </head>
    <body style="font-size:12px !important;">
<!--	--><?php //$this->load->view('test/rmt_header'); ?>
<?php //$this->view("test/rmt_leftSection.php"); ?>
        <div id="loader12" class="loader12"></div>
        <div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar" style="  width: 100%;">
            <?php
            if ($this->session->user_session->user_type == '6') {
                $app_header_display = 'style="display: none !important;"';
                $side_menu_display = 'style="z-index: 9 !important;padding-left: 0!important;"';
                $side_menu_display2 = 'style="padding-top: 0px; !important;"';
            } else {
                $app_header_display = '';
                $side_menu_display = '';
                $side_menu_display2 = '';
            }
            ?>

            <div class="app-main" id="">
                <div class="app-sidebar sidebar-shadow" id="" style="width:8%">
                    <div class="app-header__logo">
                        <div class="logo-src"></div>
                        <div class="header__pane ml-auto">
                            <div>
                                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="app-header__mobile-menu">
                        <div>
                            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="app-header__menu">
                        <span>
                            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
                    </div>
                    <?php if ($this->session->user_session) { ?>
                        <div class="" id="app_header_display1" style="widht:9%;">
                            <div class="app-sidebar__inner">
                                <ul class="vertical-nav-menu" style="margin-left: 40px;">
									<marquee><span style="font-size:16px;color:#891635">Welcome to Financial Management<span></marquee>
                                    <li align="center" class="app-sidebar__heading" style="font-size:16px;">Menu</li><hr>
									 <li class="list_lis" >
										<a href="<?php echo base_url("InvoiceController/customer_account"); ?>">
                                                <i class="fa fa-file"> </i>
                                                Invoice Management</a>
												</li>
									<li class="app-sidebar__heading" style="color:#891635;font-size:14px">Master Data Entry</li>
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
									<li class="app-sidebar__heading" style="color:#891635;font-size:14px">Transaction Entry</li>
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
										<li  class="app-sidebar__heading" style="color:#891635;font-size:14px">Reports</li>
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
                        </div>
                        <?php
                    } else {
//                        redirect("login");
                    }
                    ?>
                </div>
                <div class="app-main__outer" id="side_menu_display">

                    <?php
                    if (isset($load_view)) {
                        foreach ($load_view as $view) {
                            $this->load->view($view);
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="modal fade bd-example-modal-lg" id="confirm_msg_modal" tabindex="-1" role="dialog" >
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmHeader"></h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <p id="confirmBody"></p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btn_confirm_dismiss" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button id="btn_confrim_ok" name="btn_add_service" class="btn btn-primary">Ok</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-drawer-overlay d-none animated fadeIn"></div>
        <script type="text/javascript" src="<?= base_url("assets/") ?>scripts/main.87c0748b313a1dda75f5.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<?php //$this->view("test/rmt_rightSection.php"); ?>
<?php //$this->view("test/rmt_bottomSection.php"); ?>
<?php //$this->load->view('test/rmt_footer'); ?>
    </body>
</html>



<script type="text/javascript"
        src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
</script>

<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
    }


</script>



<script>
    function toggleFullscreen() {
        let elem = document.querySelector("body");

        if (!document.fullscreenElement) {
            elem.requestFullscreen().catch(err => {
                alert(`Error attempting to enable full-screen mode: ${err.message} (${err.name})`);
            });
        } else {
            toggleFullscreen();
//            document.exitFullscreen();
        }
    }
    $(document).ready(function () {
//        googleTranslateElementInit();

    });


</script>
