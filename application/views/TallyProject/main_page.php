<?php
$user_name = $this->session->user_session->user_name;
$this->db->select('firm_name');
$this->db->where('firm_id', $this->session->user_session->firm_id);
$result = $this->db->get('partner_header_all')->row();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/style.css">

	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?= base_url() ?>main.87c0748b313a1dda75f5.css" rel="stylesheet">
	<script src="<?= base_url() ?>assets/scripts/jquery-2.1.3.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>assets/scripts/jquery-validation/js/jquery.validate.min.js"
			type="text/javascript"></script>
	<link href="<?= base_url() ?>assets/scripts/toastr/toastr.css" rel="stylesheet" type="text/css"/>
	<script src="<?= base_url() ?>assets/scripts/toastr/toastr.min.js" type="text/javascript"></script>
	<link href="<?= base_url() . "assets/"; ?>scripts/datatables/datatables.min.css" rel="stylesheet" type="text/css"/>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" rel="stylesheet"
		  type="text/css"/>

	<script src="<?= base_url() . "assets/"; ?>scripts/datatables/datatables.min.js" type="text/javascript"></script>
	<script src="//cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@1.6.0/src/loadingoverlay.min.js"></script>


	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
			integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
			crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
			integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
			crossorigin="anonymous"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/js/all.min.js"></script>

	<!-- Boxiocns CDN Link -->
	<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
		  integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
		  crossorigin="anonymous" referrerpolicy="no-referrer"
	/>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
			integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
			crossorigin="anonymous" referrerpolicy="no-referrer"></script>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
	/* Google Fonts Import Link */

	@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

	* {
		margin: 0;
		padding: 0;
		box-sizing: border-box;
		font-family: 'Poppins', sans-serif;
	}

	.sidebar {
		/* position: fixed; */
		top: 0;
		left: 0;
		height: 100%;
		width: 306px;
		background: #fff;
		z-index: 100;
		transition: all 0.5s ease;
		box-shadow: #d6d6d687 1px 1px 6px;
	}

	.sidebar.close {
		width: 78px;
	}

	.sidebar .logo-details {
		height: 60px;
		margin-left: 0.65rem;
		/* margin-top: 0.7rem; */
		padding-top: 20px;
	}

	.sidebar .logo-details .logo_name {
		line-height: 1.1;
		font-size: 22px;
		transition: 0.3s ease;
		transition-delay: 0.1s;
	}

	.sidebar.close .logo-details .logo_name {
		transition-delay: 0s;
		opacity: 0;
		pointer-events: none;
	}

	.sidebar .nav-links {
		/* height: 100%; */
		padding: 30px 0 150px 0;
		overflow: auto;
	}

	.sidebar.close .nav-links {
		overflow: visible;
	}

	.sidebar .nav-links::-webkit-scrollbar {
		display: none;
	}

	.sidebar .nav-links li {
		position: relative;
		list-style: none;
		transition: all 0.4s ease;
	}

	.sidebar .nav-links li:hover {
		background: #ffd96fa6;
	}

	.sidebar .nav-links li .iocn-link {
		display: flex;
		align-items: center;
		justify-content: space-between;
	}

	.sidebar.close .nav-links li .iocn-link {
		display: block
	}

	.sidebar .nav-links li i {
		height: 50px;
		min-width: 78px;
		text-align: center;
		line-height: 50px;
		color: #000;
		font-size: 20px;
		cursor: pointer;
		transition: all 0.3s ease;
	}

	.sidebar .nav-links li.showMenu i.arrow {
		transform: rotate(-180deg);
	}

	.sidebar.close .nav-links i.arrow {
		display: none;
	}

	.sidebar .nav-links li a {
		display: flex;
		align-items: center;
		text-decoration: none;
	}

	.sidebar .nav-links li a .link_name {
		text-transform: uppercase;
		font-size: 15px;
		font-weight: 400;
		color: #000;
		transition: all 0.4s ease;
	}

	.sidebar.close .nav-links li a .link_name {
		opacity: 0;
		pointer-events: none;
	}

	.sidebar .nav-links li .sub-menu {
		/* padding: 6px 6px 14px 80px; */
		margin-top: -10px;
		background: #ffe6a1;
		display: none;
	}

	.sidebar .nav-links li.showMenu .sub-menu {
		display: block;
	}

	.sidebar .nav-links li .sub-menu a {
		color: #000;
		font-size: 15px;
		padding: 5px 0;
		opacity: 1 !important;
		white-space: nowrap;
		opacity: 0.6;
		transition: all 0.3s ease;
	}

	.sidebar .nav-links li .sub-menu a:hover {
		/* opacity: 1; */
	}

	.sidebar.close .nav-links li .sub-menu {
		position: absolute;
		left: 100%;
		top: -10px;
		margin-top: 0;
		padding: 10px 20px;
		border-radius: 0 6px 6px 0;
		opacity: 0;
		display: block;
		pointer-events: none;
		transition: 0s;
	}

	.sidebar.close .nav-links li:hover .sub-menu {
		top: 0;
		opacity: 1;
		pointer-events: auto;
		transition: all 0.4s ease;
	}

	.sidebar .nav-links li .sub-menu .link_name {
		display: none;
	}

	.sidebar.close .nav-links li .sub-menu .link_name {
		font-size: 15px;
		opacity: 1;
		display: block;
	}

	.sidebar .nav-links li .sub-menu.blank {
		opacity: 1;
		pointer-events: auto;
		padding: 3px 20px 6px 16px;
		opacity: 0;
		pointer-events: none;
	}

	.sidebar .nav-links li:hover .sub-menu.blank {
		top: 50%;
		transform: translateY(-50%);
	}

	.sidebar .profile-details {
		position: fixed;
		bottom: 0;
		width: 260px;
		display: flex;
		align-items: center;
		justify-content: space-between;
		background: #1d1b31;
		padding: 12px 0;
		transition: all 0.5s ease;
	}

	.sidebar.close .profile-details {
		background: none;
	}

	.sidebar.close .profile-details {
		width: 78px;
	}

	.sidebar .profile-details .profile-content {
		display: flex;
		align-items: center;
	}

	.sidebar .profile-details img {
		height: 52px;
		width: 52px;
		object-fit: cover;
		border-radius: 16px;
		margin: 0 14px 0 12px;
		background: #1d1b31;
		transition: all 0.5s ease;
	}

	.sidebar.close .profile-details img {
		padding: 10px;
	}

	.sidebar .profile-details .profile_name,
	.sidebar .profile-details .job {
		color: #fff;
		font-size: 18px;
		font-weight: 500;
		white-space: nowrap;
	}

	.sidebar.close .profile-details i,
	.sidebar.close .profile-details .profile_name,
	.sidebar.close .profile-details .job {
		display: none;
	}

	.sidebar .profile-details .job {
		font-size: 12px;
	}

	.home-section {
		position: relative;
		background: white;
		height: 100vh;
		left: 300px;
		width: calc(100% - 306px);
		transition: all 0.5s ease;
	}

	.sidebar.close ~ .home-section {
		left: 78px;
		width: calc(100% - 78px);
	}

	.home-section .home-content .bx-menu,
	.home-section .home-content .text {
		color: #11101d;
		font-size: 25px;
	}

	.home-section .home-content .bx-menu {
		margin-left: 33px;
		cursor: pointer;
	}

	.home-section .home-content .text {
		font-size: 26px;
		font-weight: 600;
	}

	@media (max-width: 420px) {
		.sidebar.close .nav-links li .sub-menu {
			display: none;
		}
	}
</style>

<body>
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
<?php if ($this->session->user_session) { ?>
	<div class="sidebar position-fixed" style="opacity: 1;">
		<div class="align-items-center d-flex logo-details w-100">
			<img src="<?php echo base_url(); ?>images/finance_management_logo.png" style="width: 75%; max-width: 75px ;"
				 alt="">
			<span class="font-weight-normal logo_name ml-3 text-dark text-uppercase">finance management</span>
		</div>
		<ul class="nav-links h-100">
			<li class="position-relative">
				<a href="<?php echo base_url("InvoiceController/customer_account"); ?>">
					<i class='bx bx-line-chart'></i>
					<span class="link_name">
                        Invoice Management</span></a>
			</li>
			<li class="position-relative">
				<div class="iocn-link">
					<a href="#">
						<i class='bx bx-pie-chart-alt-2'></i>
						<span class="link_name">MASTER DATA ENTRY</span>
					</a>
					<i class='bx bxs-chevron-down arrow'></i>
				</div>
				<ul class="sub-menu">
					<li style="display: flex; padding-left: 21px;">
						<a href="<?php echo base_url("ImportController/add_ledger_page"); ?>">
							<i class='bx bx-list-ul'></i>
							Add Ledger</a>
					</li>
					<li style="display: flex; padding-left: 21px;">
						<i class='bx bx-group'></i>
						<a href="<?php echo base_url("ImportController/add_group_page"); ?>">Add Group</a>
					</li>
					<li style="display: flex; padding-left: 21px;">
						<i class='bx bx-bar-chart-square'></i>
						<a href="<?php echo base_url("ImportController/add_stock_summary_page"); ?>">
							Stock summary</a>
					</li>
				</ul>
			</li>
			<li class="position-relative">
				<div class="iocn-link">
					<a href="#">
						<i class='bx bx-book-alt'></i>
						<span class="link_name">Transaction Entry</span>
					</a>
					<i class='bx bxs-chevron-down arrow'></i>
				</div>
				<ul class="sub-menu">
					<li><a class="link_name" href="#">Transaction Entry</a></li>
					<li style="display: flex; padding-left: 21px;">
						<i class='bx bx-list-ul'></i>
						<a href="<?php echo base_url("ImportController/journal_entry"); ?>">
							Journal Entry</a>
					</li>
					<li style="display: flex; padding-left: 21px;">
						<i class='bx bx-credit-card'></i>
						<a href="<?php echo base_url("ImportController/sale_purchase"); ?>">
							Sale/Purchase</a>
					</li>
					<li style="display: flex; padding-left: 21px;">
						<i class='bx bx-line-chart'></i>
						<a href="<?php echo base_url("ImportController/receipt_voucher"); ?>">
							Other Entry</a>
					</li>
				</ul>
			</li>
			<li class="position-relative">
				<div class="iocn-link">
					<a href="#">
						<i class='bx bx-plug'></i>
						<span class="link_name">Reports</span>
					</a>
					<i class='bx bxs-chevron-down arrow'></i>
				</div>
				<ul class="sub-menu">
					<li><a class="link_name" href="#">Reports</a></li>
					<li style="display: flex; padding-left: 21px; "><i class='bx bx-spreadsheet'></i>
						<a href="<?php echo base_url("ImportController/balance_sheet_page"); ?>">
							Balance Sheet</a>
					</li>
					<li style="display: flex; padding-left: 21px;"><i class='bx bx-sitemap'></i>
						<a href="<?php echo base_url("ImportController/ratio_analysis_page"); ?>">
							Ratio Analysis</a>
					</li>
					<li style="display: flex; padding-left: 21px;"><i class='bx bx-trending-up'></i>
						<a href="<?php echo base_url("ImportController/profit_n_loss_page"); ?>">
							Profit and Loss</a>
					</li>
				</ul>
			</li>
		</ul>
	</div>
<?php } else {
	redirect('login');
}; ?>
<section class="home-section">
	<div class="home-content">
		<div class="row header">
			<div class="align-items-center col-md-12 d-flex justify-content-between p-3 pl-4">
				<div class="d-flex align-items-center ">
					<i class='bx bx-menu' id="menu_btn"></i>
					<span><h5 class="logo_name pl-2 mb-0 font-weight-bold text-uppercase" id="logo_name">finance management</h5></span>
				</div>
				<div class="float-right logout mr-3">
					<span><b>Logout</b><i class="fas fa-sign-out-alt pl-2" style="transform: rotate(0deg);"></i></span>
				</div>
			</div>
		</div>
	</div>
	<div class="body-content m-1">
		<?php
		if (isset($load_view)) {
			foreach ($load_view as $view) {
				$this->load->view($view);
			}
		}
		?>
	</div>
</section>


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


<script src="<?= base_url() ?>assets/javascript.js"></script>
<script type="text/javascript" src="<?= base_url("assets/") ?>scripts/main.87c0748b313a1dda75f5.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script>
	let arrow = document.querySelectorAll(".iocn-link");
	for (var i = 0; i < arrow.length; i++) {
		arrow[i].addEventListener("click", (e) => {
			let arrowParent = e.target.parentElement.parentElement.parentElement; //selecting main parent of arrow
			
			arrowParent.classList.toggle("showMenu");
			// $(".logo_name").toggle();
		});
	}
	let sidebar = document.querySelector(".sidebar");
	let sidebarBtn = document.querySelector(".bx-menu");
	console.log(sidebarBtn);
	sidebarBtn.addEventListener("click", () => {
		sidebar.classList.toggle("close");

	});
	$('#menu_btn').click(function () {
		$('#logo_name').toggle();
	});
</script>
<script type="text/javascript">
	function googleTranslateElementInit() {
		new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
	}


</script>
</body>
</html>
