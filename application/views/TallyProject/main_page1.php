<!DOCTYPE html>
<html lang="en">
<head>
	<title>RMT Dashboard</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/js/all.min.js"
			integrity="sha512-YSdqvJoZr83hj76AIVdOcvLWYMWzy6sJyIMic2aQz5kh2bPTd9dzY3NtdeEAzPp/PhgZqr4aJObB3ym/vsItMg=="
			crossorigin="anonymous"></script>
	<script src="<?= base_url('assets/tree_node/js/d3-mitch-tree.min.js') ?>"></script>
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/tree_node/css/d3-mitch-tree.min.css') ?>">
	<link rel="stylesheet" type="text/css"
		  href="<?= base_url('assets/tree_node/css/d3-mitch-tree-theme-default.min.css') ?>">
	<script src="<?= base_url() ?>assets/scripts/jquery-2.1.3.js" type="text/javascript"></script>
	<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
	<script src="<?= base_url('assets/tree_node/sample_data.js') ?>"></script>
	<style>
		.complete {
			stroke: #3ac47d !important;
			fill: #3ac47d !important;
		}

		.node-details {
			stroke: #40b92e !important;
			fill: #3ac47d !important;
		}

		.node-title {
			fill: #5c55af !important;
			stroke: black !important;
		}

		.node-details-close {
			stroke: #b93a2e !important;
			fill: #c43a3a !important;
		}
	</style>
	<link href="<?= base_url() ?>main.87c0748b313a1dda75f5.css" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/dist/blink.css">
	<script src="<?= base_url(); ?>assets/dist/jquery.blink.js"></script>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<script>
		$(function () {
			$(window).resize(function () {
				if (window.matchMedia("(max-width: 768px)").matches) {

					window.location.replace("<?= base_url('dashboard'); ?>");

				} else {


				}
			});
			if (window.matchMedia("(max-width: 768px)").matches) {

				window.location.replace("<?= base_url('dashboard'); ?>");

			} else {


			}
		});
	</script>
	<style>

		body {
			background-color: #fffffff;
			height: 100vh;
		}

		.leftside {
			height: 100%;
			width: 25%;

			padding-bottom: 1%;

		/ / background-color: #44494e;

		}

		.leftside1 {
			height: 100%;
			width: 3%;
			//padding: 1%;
		/ / background-color: #44494e;
		    box-shadow: 1px 2px 6px 2px rgb(32 33 36 / 41%);
			margin-top: 13px;
			background-color: #891635;
		}

		.midddlediv {
			height: calc(90vh - 0px);
			width: 100%;

		/ / margin-top: 2.5 %;
			//margin-left: 1%;
			//margin-right: 1%;
		/ / padding-top: 1 %;
		//	box-shadow: 1px 1px 4px 2px rgb(32 33 36 / 41%);
		}

		.rightside {
			height: 100%;
			width: 70%;
			padding-top: 1%;
			padding-bottom: 1%;
			color: #68349a;
		/ / background-color: #ffffff;
			display:none;
			top:6%;
		}

		.rightside1 {
			height: 90vh;
			width: 25%;
			padding: 1%;
			color: #68349a;

		/ / background-color: #ffffff;

		}

		.rightside2 {
			height: 100%;
			width: 3%;
			//padding: 1%;
			//margin-top: 3%;
			color: #68349a;
		/ / background-color: #ffffff;
		    box-shadow: 1px 2px 6px 2px rgb(32 33 36 / 41%);
			margin-top: 13px;
			background-color: #891635;
			color: white;
		}

		.rightside3 {
			height: 100%;
			width: 40%;
			margin-top: 3%;
			color: #68349a;
		/ / background-color: #ffffff;

		}


		.tpdiv1 {
			background-color: #68349a;
			color: white;
			height: 8vh;
			padding-left: 1%;
			width: 10%;
		}

		.tpdiv {
			//background-color: #68349a;
			background-color:#891635;
			color: white;
			height: auto;
			width: 100%;
			display: flex;
			flex-direction: row;
			align-items: center;
			justify-content: space-between;
			//border-radius: 20px 20px 0px 0px;
		}

		.secondSection {
			display: flex;
			flex-direction: row;
			align-items: center;
			justify-content: center;
			width: 100%;
			overflow: hidden;
			height: 95vh;
			/*background-color:#d0bee1;*/
			/*background-color:#ffffff;*/
		}

		.left1 {
			margin-top: 1%;
			color: #68349a;
			padding: 8%;

			background-color: #ffffff;
			border-radius: 4px;
			box-shadow: 1px 1px 4px 2px rgb(32 33 36 / 41%);
		}

		.left2 {
		/ / color: #68349a;
			margin-top: 10%;
			background-color: #ffffff;
			border-radius: 4px;
			box-shadow: 1px 1px 4px 2px rgb(32 33 36 / 41%);
			padding: 8%;
		}

		.left2 h5 {
		/ / margin: 16 px;
			font-size: 16px;
			color: #2c2c2c;
		}

		.project_list {
		/ / margin: 4 px;
			font-size: 14px;
			color: #2c2c2c;
		}

		.left3 h5 {
			margin: 16px;
			font-size: 16px;
			color: #2c2c2c;

		}

		.left2 h4 {
			color: #891635;
		}

		.left3 h4 {
			color: #891635;

		}

		.left3 {
		/ / color: #68349a;
			margin-top: 10%;
			padding-top: 8%;
			padding-bottom: 8%;
			background-color: #ffffff;
			border-radius: 4px;
			box-shadow: 1px 1px 4px 2px rgb(32 33 36 / 41%);
			height: 400px;
			overflow-y: auto;
		}

		.right1 {
			margin-top: 2%;
			height: 100%;
			display: block;
			color: #891635;
			padding: 16px;
			padding-top: 3%;
			background-color: #ffffff;
			border-radius: 4px;
			text-decoration: none;

			box-shadow: 1px 1px 4px 2px rgb(32 33 36 / 41%);
		}

		.right1 img {
			height: 200px;
			width: 100%;
		}

		.right1 h5 {
			margin: 16px;

		}


		.right2 h5 {
			margin: 16px;
		}

		.right12 {
			margin-top: 1%;
			color: #891635;
			padding: 3%;
			background-color: #ffffff;
			border-radius: 4px;
			height: 100%;
			//box-shadow: 1px 1px 4px 2px rgb(32 33 36 / 41%);
			box-shadow:-1px 3px 11px 2px #000000;
		}

		.right2 {
			color: #68349a;
			height: 50%;
			background-color: #ffffff;
			border-radius: 4px;
			box-shadow: 0 1px 1px 0 rgba(0, 0, 0, -0.84), 0 1px 8px 0 rgba(0, 0, 0, 0.12) !important;
			padding: 3%;
		}

		.right3 {
			color: #68349a;
			margin-top: 10%;

			border-radius: 4px;
			/*box-shadow: 1px 1px 4px 2px rgb(32 33 36 / 41%);*/
		}

		.firstsection {
			display: flex;
			flex-direction: row;
			align-items: center;
			justify-content: center;
			flex: 1;
			box-shadow: 1px 2px 6px 2px rgb(32 33 36 / 41%);
			//border-radius: 20px 20px 0px 0px;
		}

		.left_icon {

			margin-right: 8px;
		}

		.right_icon {
			display: flex;
			flex-direction: row;
			align-items: center;
			//margin-left: 7%;
		}

		.image_div {
			height: 100%;
			width: 50px;
			padding: 2%;
			margin-left: 4px;
			margin-right: 4px;


		}

		.image_div1 {
			//height: 100%;
			height:25px;
			//width: 25%;
			//margin-left: 280%;
			//margin-left:92%;
			//margin-right: 50%;

		}

		#midddlediv1 {
			width: 100%;
			height: 100%;
			position: relative;
			top: 0;
			z-index: 99;
			opacity: 0;
		}

		#iframe_id {
			width: 100%;
			height: 100%;
			position: relative;
			border: none;


		}
		.iframe_id {
			width: 100%;
			height: 100%;
			position: relative;
			border: none;


		}

		#iframe_id1 {
			width: 100%;
			height: 93%;
			border: none;

		}
		#iframe_id6 {
			width: 100%;
			height: 100%;
			border: none;

		}

		#logo_img {
			//margin: 5%;
		}

		.icon_i {
			margin-right: 2%;
			font-size: 12px;
		}

		.mb-3 {
			font-size: 100px;
			margin-left: 35%;
		}

		.btn-icon-vertical .btn-icon-wrapper {

			font-size: 449%;
			margin: 0px 0;
			opacity: .6;
			margin-left: 35%;
		}

		.chat_head {
			display: flex;
			flex-direction: row;
			flex: 1;
			text-align: center;
			margin-bottom: 2%;
			background:#891635;
			color:white;
		}

		#news a {
			text-decoration: none;
		}

		.html_div {
			background-color: #8916351c;
			border-radius: 4px;
			border: 1px solid #dee0e4;
			padding: 8px;
			margin-bottom: 8px;
			margin-top: 8px;
			box-shadow: 0 1px 1px 0 rgba(0, 0, 0, -0.84), 0 1px 8px 0 rgba(0, 0, 0, 0.12) !important;
		}

		#news {
			display: flex;
			flex-direction: column;
			flex: 1;

			overflow-y: auto;
			overflow-x: hidden;
			height: calc(90vh - 150px);


		}

		.anchor_tag {
			padding-top: 8px;
			padding-bottom: 8px;
		}

		.
		anchor_tag1 {
			padding-top: 8px;
			padding-bottom: 8px;
		}

		::-webkit-scrollbar {
			width: 6px;
		}

		/* Track */
		::-webkit-scrollbar-track {
			background: #f1f1f1;
		}

		/* Handle */
		::-webkit-scrollbar-thumb {
			background: grey;
		}

		/* Handle on hover */
		::-webkit-scrollbar-thumb:hover {
			background: #555;
		}

	</style>
	<style>
		.mySlides {
			display: none;
		}

		#slidediv1 a {
			position: fixed;
			left: -334px;
			transition: 0.3s;
			padding-top: 15px;
			width: 300px;
			text-decoration: none;
			font-size: 20px;
			color: white;
			border-radius: 0 5px 5px 0;
		}

		#slidediv1 a:hover {

			z-index: 9999;
		}

		#slide_a {
			top: 120px;
			background-color: #4CAF50;

			width: 500px;
			font-size: 10px;
		}


		#slidediv3 a {
			position: fixed;
			right: -304px;
			transition: 0.3s;
			padding-top: 15px;
			width: 300px;
			text-decoration: none;
			font-size: 20px;
			color: black;
			border-radius: 0 5px 5px 0;
			box-shadow: 1px 1px 4px 2px rgb(32 33 36 / 41%);
		}

		#slidediv3 a:hover {
			right: 0;
		}

		#slide3_a {
			top: 120px;
			background-color: #ffffff;
			border: 1px solid #f5f5f5;
			width: 500px;
			font-size: 10px;
		}

		.select2-container {
			z-index: 9999999;
		}
		.float {
			    position: fixed;
				/* width: 60px; */
				height: 60px;
				bottom: 1%;
				right: 1%;
				/* background-color: #00c292; */
				z-index: 9999;
				display: block;
				color: #FFF;
				/* border-radius: 50px; */
				text-align: center;
				/* box-shadow: 2px 2px 3px #999; */
				cursor: pointer;
		}
		.my-float {
			margin-top: 22px;
		}
		#overlay_div {
		  position: fixed;
		  
		  width: 20%;
		  height: 91%;
		  
		 
		  right: 2%;
		  bottom: 0;
		  
		  z-index: 99999;
		  cursor: pointer;
		  float:right;
		}
		
		// .dropdown-menu.show {
			// position: absolute;
			// will-change: transform;
			// top: -30px;
			// left: 20px;
			// transform: translate3d(15px, 75px, 0px);
		// }
		.dropdown-menu{
			text-align:center;
			margin-left:20px;
			margin-top:-20px;
		}
		.dropdown-item 
		{
			padding:20px 50px 20px 50px;
			border:1px solid lightgray;
		}
		.dropdown-item active
		{
			background:#891635;
			color:white;
			
		}
		.dropdown-item:hover
		{
			background:#891635;
			color:white;
			
		}
		#dropdown_div
		{
			display:none;
		}
		.dropdown-toggle:hover
		{
			color:white;
		}
		#navbarDropdownMenuLink1:hover
		{
			border:none;
		}
		.nav>li>a {
			position: relative;
			display: block;
			//padding: 5px 10px 20px 10px;
			    padding: 0px 15px;
				font-size: 20px;
		}
		.nav-link:hover;
		{
			background:none;
		}
		.nav>li>a:hover
		{
			 text-decoration: none;
			background-color: #eee0;
			 color: white;
		}
		.search-wrapper.active .input-holder{
			background:#891635;
			color:white;
		}
		.close_button:hover{
			background:#891635;
			color:#ffffff;
			border:none;
			padding-top: 10px;
		}

	</style>
</head>
<body>

<div class="" style="">
	<div class=" firstsection">

		<div class="tpdiv">
			<div class="col-md-10 right_icon">
				<div class="col-md-6 dropdown" style="padding-left:7%">
					<button class="hamburger btn btn-link" type="button" id="menu1" onclick="drop_div()" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fa fa-th text-white" style="color:white;font-size:20px;margin-right:5%"></i>
					</button>
					
						<div class="dropdown-menu border-0" id="drop_div" role="menu" aria-labelledby="menu1" style="margin-top:-18px;">
						  <!--<a class="dropdown-item" href="#" onclick="dashboard_dekstop()">DASHBOARD</a>-->
						  <a class="dropdown-item" href="#" onclick="communication_dekstop()">COMMUNICATION</a>
						  <a class="dropdown-item" href="#" onclick="task_dekstop()">PROJECTS MANAGEMENT</a>
						  <a class="dropdown-item" href="#" onclick="others()">OTHERS</a>
						  <a class="dropdown-item" href="<?= base_url('InvoiceController/customer_account') ?>" target="_blank" onclick="financial_management()">FINANCIAL MANAGEMENT</a>
						  <a class="dropdown-item" href="https://payroll.docango.com">PAYROLL</a>
						
						</div>
					
				</div>
				
				<div class="col-md-6 image_div1">
					<img id="logo_img" src="<?= base_url('Images/mentor-lab-200-px.png'); ?>" width="150px"
						 height="30px" alt="Gold Berries">
				</div>


			</div>

			<div class="col-md-4 left_icon">
				<div>

					<button class="btn btn-link" data-toggle="modal" data-target="#advertisementModal"><i
								style="color:white;font-size:16px;" class="fa fa-bell"></i></button>
					

					<button class="btn btn-link" onclick="go_signout()">
						<i class="fas fa-sign-out-alt text-white"
						   style="color:white;font-size:16px;margin-right:5%"></i>
					</button>
					<img src="<?= base_url(); ?>/assets/images/photo_image1.png"
						 style="border-radius:50%;width:50px;height:100%;padding: 2%;" data-toggle="modal"
						 data-target="#exampleModal">
					<!--<div class="image_div" ></div>-->
				</div>
			</div>
		</div>
	</div>
	<div class=" secondSection">
		<div class="leftside1 ">
			<!--<div id="slidediv1" class="sidenav d-none">
				<a href="<?= base_url(); ?>view_contract" id="slide_a" target="_blank">
					<div class="col-sm-12" style="width:100%">
						<div class="col-sm-11" style="width:80%;height:300px;">1Hoverable Sidenav Buttons</div>
						<div class="col-sm-1" style="width:20%;float:right;heigh:100px;padding-top: 18px;">
						
								<button style="transform: rotate(90deg);color:white;width: 160px;border:none;background-color:#595959;">
								<i class="fa fa-tasks"></i> &nbsp;TASK - <span id="T_Task"></span></button>
						</div>
						<input type="hidden" name="p_count" id="p_count"/>
						<input type="hidden" name="Btask" id="Btask"/>
						<input type="hidden" name="Pro_task" id="Pro_task"/>
					</div>
				</a>
			</div>-->
		<div class="text-light" style="padding-top:100px;">
            
           <nav id="sidebarLeftMenu" class="d-md-block collapse pt-1 " style="top:0px;bottom:0;left:0;padding-top: 45px;z-index: 9;">
                
				<div class="sidebar-sticky">
                    
                    <ul class="nav flex-column align-content-around" id="dashboard_dekstop" style="display:none">
                        <li class="nav-item">
                            <a class="nav-link active" onclick="email_iframe()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><i class="fa fa-envelope"></i></svg>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" onclick="chat_iframe()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><i class="fa fa-comments"></i></svg>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" onclick="folder_iframe()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><i class="fa fa-folder"></i></svg>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" onclick="task_iframe()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><i class="fa fa-list"></i></svg>
                            </a>
                        </li>
						<li class="nav-item">
                            <a class="nav-link" onclick="board_iframe()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><i class="fa fa-address-card"></i></svg>
                            </a>
                        </li>
						<li class="nav-item">
                            <a class="nav-link" href="https://amgt.docango.com/" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><i class="fas fa-copy"></i></svg>
                            </a>
                        </li>
                    </ul>
					 <ul class="nav flex-column align-content-around" id="communication_dekstop" >
                        <li class="nav-item">
                            <a class="nav-link active" onclick="email_iframe()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><i class="fa fa-envelope"></i></svg>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" onclick="chat_iframe()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><i class="fa fa-comments"></i></svg>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" onclick="folder_iframe()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><i class="fa fa-folder"></i></svg>
                            </a>
						</li>
                      
                    </ul>
					<ul class="nav flex-column align-content-around" id="project_dekstop" style="display:none">
                         <li class="nav-item">
                            <a class="nav-link" onclick="task_iframe()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><i class="fa fa-list"></i></svg>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" onclick="board_iframe()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><i class="fa fa-address-card"></i></svg>
                            </a>
                        </li>
                        
                      
                    </ul>
                </div>
            </nav>
        </div>
		</div>
	
		<div class="midddlediv" id="midddlediv">


			


		</div>
		
		
		<!-- <div class="rightside3">
		<div class=" right2" onclick="go_kstore()">
		 <h4><center>Courses available</center></h4>
		 <h5>1.   Web Development</h5>
		<h5>2. PHP Development</h5>
		</div>

		<div class=" right3" >
		<div class="blink-slider">
		  <div class="blink-view" id="blink">

		  </div>

		</div>
		</div>
		</div> -->
		<div class="rightside2">
			<div class="" style="">
            <nav id="sidebarRightMenu" class="d-md-block collapse px-2 pr-2" style="top:0px;bottom:0;right:0;padding-top:100px">
                <div class="sidebar-sticky">
                    
                     <ul class="nav flex-column align-content-around">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><i class="fa fa-address-card"></i></svg>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><i class="fa fa-project-diagram"></i></svg>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><i class="fa fa-folder"></i></svg>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><i class="fa fa-briefcase"></i></svg>
                            </a>
                        </li>
						<li class="nav-item">
                            <a class="nav-link" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><i class="fa fa-hands-helping"></i></svg>
                            </a>
                        </li>
						
                    </ul>
                </div>
            </nav>
        </div>
		
			<div class="float" id="newChatbtn" onclick="on()">
				<i class="fa fa-comments my-float"></i>
			</div>
			<!--<div id="slidediv3" class="sidenav3">
				<a href="#" id="slide3_a">
					<div class="col-sm-12" style="width:100%">
						<div class="col-sm-1" style="width:20%;float:left;height:100px;padding-top: 18px;margin-left: -100px;"><button style="transform: rotate(90deg);color:white;width: 104px;border:none;background-color:#595959;"><i class="fa fa-tasks"></i> &nbsp;TASK</button></div>
						<div class="col-sm-11" style="width:80%;height:300px;overflow-y:auto;font-size:13px;">
							<p><button class="btn btn-primary" data-toggle="modal" data-target="#board_task_view_modal" ><i class="fa fa-tasks"></i>Board Task - <span id="Btask"></span></button></p>
							<p><button class="btn btn-primary" data-toggle="modal" data-target="#project_task_view_modal" ><i class="fa fa-tasks"></i>Project Task - <span id="Pro_task"></span></button></p>
							<p><button class="btn btn-primary" data-toggle="modal" data-target="#personal_task_view_modal" onclick="get_personalTask_button()"><i class="fa fa-tasks"></i> Personal Task </button></p>
							<p>
								<button class="btn btn-link"  data-toggle="modal" data-target="#personal_task_modal">
												  <i class="fa fa-book text-black" style="color:#68349a;font-size:16px;"></i>
											  </button>
											  <button class="btn btn-link"  data-toggle="modal" data-target="#forward_task_modal">
												  <i class="fa fa-book text-black" style="color:#68349a;font-size:16px;"></i>
											  </button>
											   <button class="btn btn-link"  data-toggle="modal" data-target="#forward_ptm">
												  <i class="fa fa-eye text-black" style="color:#68349a;font-size:16px;"></i>
											  </button>
							</p></div>

					</div>
				</a>
			</div>-->

		</div>
	</div>
	<div class="bottomsection"></div>
</div>
<!-- chat section start -->
<div class="rightside" id="overlay_div">
			<div class=" right12">
				<div class="chat_head">
					<div class="col-sm-10" align="center"><h4> Chat </h4></div>
					<div class="col-sm-2">
						
							<button class="btn btn-default close_button" onclick="off()" style="padding-top:10px;float: right;"><i class="fa fa-times" style="font-size:16px;color:white"></i></button>
						
					</div>
					<br>
				</div>

				<iframe src="https://rmt.docango.com/messenger" id="iframe_id1" title="Iframe Example"></iframe>
		</div>
</div>
<!-- chat section End -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Profile Modal</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="uploadImage">
				<div class="modal-body">

					<label>Profile Image</label>
					<input type="file" name="UImage[]" id="UImage" class="form-control">

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary" onclick="upload_image()">Upload</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="modal fade" id="advertisementModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Advertise Setting</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="uploadAdd">
				<div class="modal-body">

					<label>Advertise Image</label>
					<input type="file" name="UImage1[]" id="UImage1" class="form-control">

					<label>Page Link</label>
					<input type="text" class="form-control" id="linkpage" name="linkpage">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary" onclick="upload_advertise()">Update</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="personal_task_view_modal" tabindex="-1" role="dialog" aria-hidden="true"
	 style="height:100vh">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<!--<h5 class="modal-title" id="exampleModalLabel">Personal Task View</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>-->
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-12">
							<!-- <select class="form-control" id="filter_tbl" name='filter_tbl' onchange="get_filtered_data()">
								<option value='1'> All</option>
								<option value='5'> Pending</option>
								<option value='6'> Complete</option>
								<option value='2'> Close</option>
							</select> -->
							<div class="row align-items-center">
								<div class="col-md-10 pl-0">
									<div role="group" class="mb-2 btn-group btn-group-toggle" data-toggle="buttons">
										<label class="btn btn-outline-dark active" onclick="get_data(1)"
											   style="background-color:">
											<input type="radio" name="options" id="option144" autocomplete="off"
												   checked="" class="" value="1"> All
										</label>
										<label class="btn btn-outline-dark" onclick="get_data(5)">
											<input type="radio" name="options" id="option155" autocomplete="off"
												   value="5"> Pending
										</label>
										<label class="btn btn-outline-dark" onclick="get_data(6)">
											<input type="radio" name="options" id="option166" autocomplete="off"
												   value="6"> Complete
										</label>
										<label class="btn btn-outline-dark" onclick="get_data(2)">
											<input type="radio" name="options" id="option177" autocomplete="off"
												   value="2"> Close
										</label>
									</div>
									<input type="hidden" name="filter_type" id="filter_type" value="1">
									<input type="hidden" name="switch_type" id="switch_type" value="3">
									<div role="group" class="mb-2 btn-group btn-group-toggle" data-toggle="buttons">
										<label class="btn btn-outline-dark filter_data" onclick="get_data_assign(3)">
											<input type="radio" name="options1" id="option188" autocomplete="off"
												   checked="" class="filter_data" value="3"> Assign
										</label>
										<label class="btn btn-outline-dark filter_data" onclick="get_data_forward(4)">
											<input type="radio" name="options1" id="option199" autocomplete="off"
												   class="filter_data" value="4"> Forward
										</label>
									</div>
								</div>
								<div class="col-md-2">
									<button type="button" class="btn btn-primary mb-2 ml-5" data-toggle="modal"
											data-target="#personal_task_modal"
											style="float:right" onclick="get_upload_button()">
										<i class="fa fa-plus text-white" style="color:#ffffff;font-size:16px;"></i>
									</button>
								</div>

							</div>
							<div class="row">

							</div>
						</div>
					</div>
				</div>
			</div>
			<section id="p_list_view">

				<div class="modal-body">

					<div class="row" style="height: 70vh; overflow-y: auto;">
						<div class="col-md-12" id="graph_box">
							<table class="table todo-list-wrapper list-group-flush table-hover table-striped"
								   id="perosnalTaskTable" style="width:100%">
								<thead>
								<tr>
									<th>Task name</th>


								</tr>
								</thead>
								<tbody>

								</tbody>
								<tfoot>
								<tr>
									<th>Task name</th>


								</tr>
								</tfoot>

							</table>
						</div>
						<div class="col-md-6 d-none" id="comment_box">
							<section id="p_detail_view">
								<div class="row" id="detials_box">

								</div>
								<div class="row">
									<div class="col-md-12">
										<section id="visualisation" class="pt-2" style="border:1px solid black;">
										</section>
									</div>
									<div class="col-md-12">
										<section id="assignment_view">
											<div class="align-items-end justify-content-end pr-3 pt-2 row"
												 id="actionButtons">

											</div>
											<span onclick="toggleNodeComments()" style="cursor:pointer">Add Comments <i
														class="fa fa-comment"></i></span>
											<hr/>
											<div class="row d-none mb-2" id="toggleNodeCommentsId">
												<div class="col-md-12">
													<form id="personalTaskCommentUpload"
														  enctype="multipart/form-data" method="post"
														  novalidate="novalidate">
														<div class="form-group mb-0">
															<label>Comment To* :</label>
															<select class="form-control form-control-sm"
																	id="comment_assign_to"
																	name='comment_assign_to[]' multiple
																	data-placeholder="Select Users"
																	style="width: 100%;z-index:999999;"
																	placeholder=""></select>
															<span class="required" id="assign_to_error"></span>
														</div>
														<div class="form-group  mb-0">
															<label for="mywork_file"><b>Comment:</b></label>
															<textarea
																	class="mb-2 form-control-sm form-control valid"
																	name="new_texar_comment"
																	id="new_texar_comment"
																	aria-invalid="false"></textarea>
														</div>
														<div class="form-group mb-0">

															<label for="mywork_file"><b>Attch file:</b></label>
															<input type="file" class="form-control-file valid"
																   name="userfile[]"
																   id="mywork_file"
																   aria-invalid="false"><br>
															<input type="hidden" name="assign_task_id"
																   id="assign_task_id">
														</div>
														<div class="form-group">
															<button class="mb-2 mr-2 btn btn-primary float-right"
																	type="button"
																	onclick="save_comment()"><i
																		class="fa fa-save"></i> Save
															</button>
														</div>
													</form>
												</div>
											</div>
											<div id="commentSection">

											</div>
										</section>

									</div>

								</div>
							</section>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" id="perosnalTaskCloseButton"
							data-dismiss="modal">Close
					</button>

				</div>
				</form>
			</section>

		</div>
	</div>
</div>

<div class="modal fade" id="forward_task_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	 aria-hidden="true" style="z-index: 99999;">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Forward task</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="uploadForwardTask">
				<div class="modal-body">
					<select class="form-control" id="assign_to_em" name='assign_to_em'>

					</select>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal" id="f_close">Close</button>
					<button type="button" class="btn btn-primary" onclick="upload_forward_task()">Update</button>
				</div>
			</form>
		</div>
	</div>
</div>


<div class="modal fade" id="forward_ptm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	 aria-hidden="true" style="z-index: 99999;">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">View Assignment</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>


			<div class="modal-body" id="assignment_view1">
			</div>
			<div class="modal-footer">

			</div>

		</div>
	</div>
</div>
<div class="modal fade" id="personal_task_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	 aria-hidden="true" style="z-index:99999;height:100vh">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Action Details</h5> <!--		Personal Task Assignment-->
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="uploadPersonalTask">
				<div class="modal-body">
					<div class="position-relative form-group">
						<input type="hidden" name="forward_task" id="forward_task">
						<label>Task Name*</label>
						<input type="text" class="form-control" id="ptask_name" name="ptask_name">
						<span class="required error_msg" id="ptask_name_error"></span>
					</div>
					<div class="position-relative form-group" style="display:none;" id="div_assign">
						<label>Person Responsible</label>
						<select class="form-control form-control-sm" id="assign_to" name='assign_to[]' multiple
								data-placeholder="Select Users" style="width: 100%;z-index:999999;"
								placeholder=""></select>
						<span class="required" id="assign_to_error"></span>
					</div>
					<div class="position-relative form-group">
						<label>Completion Date</label>
						<input type="date" class="form-control" id="pdate_com" name="pdate_com">
						<span class="required" id="pdate_com_error"></span>
						<input type="hidden" class="form-control" id="ptask_type" name="ptask_type">
					</div>
					<div class="position-relative form-group">
						<label>Success Measure</label>
						<textarea type="text" class="form-control" id="ptask_details" name="ptask_details"></textarea>
						<span class="required" id="ptask_details_error"></span>
					</div>
					<div class="position-relative form-group">
						<label>File</label>
						<input type="file" class="form-control" id="ptask_file" name="ptask_file[]">
						<div style="display:none" id="div_FTask_id"><label>Old File</label>

							<i class="btn-icon-wrapper pe-7s-paperclip"> </i><a class="btn btn-icon btn-link mb-2 mr-2"
																				id="old_ptask_file" target="_blank"
																				style="word-wrap: break-word;">

							</a><a onclick="delete_task_file()" style="color:red;cursor:pointer">X</a></div>
						<span class="required" id="ptask_file_error"></span>
					</div>
					<div class="position-relative form-group">
						<label>Comment</label>
						<textarea type="text" class="form-control" id="ptask_scope" name="ptask_scope"></textarea>
						<span class="required" id="ptask_scope_error"></span>
					</div>
					<div class="position-relative form-group" style="display:none" id="div_dependency">
						<label>Dependency</label>
						<select class="form-control form-control-sm" id="dependency" name='dependency'
								data-placeholder="Select task" style="width: 100%;z-index:999999;"
								placeholder=""></select>
						<span class="required" id="dependency_error"></span>
					</div>
					<div class="position-relative form-group">
						<label>Priority</label>
						<select class="form-control" id="priority" name='priority'>
							<option selected="true" disabled="disabled">Select Priority</option>
							<option value="High">High</option>
							<option value="Medium">Medium</option>
							<option value="Low">Low</option>
						</select>
						<span class="required" id="priority_error"></span>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal" id="p_close">Close</button>
					<button type="submit" class="btn btn-primary" id="upload_personalTask_id"
					>Upload
					</button>
					<input type="hidden" name="update_task_id" id="update_task_id">
					<input type="hidden" name="update_task_root_id" id="update_task_root_id">
					<button type="button" class="btn btn-primary" id="update_personal_Task_id"
							onclick="update_personal_Task()" style="display:none">Update
					</button>
				</div>
			</form>
		</div>
	</div>
</div>


<div class="modal fade" id="task_complete_modal" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: 999999;
    opacity: 1;
    padding-top: 100px;height:100vh">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel12">Task Status</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="uploadTaskStatus">
				<input type="hidden" name="task_status" id="task_status">
				<div class="modal-body" style="text-align:center">

					<button type="button" class="btn btn-success" onclick="complete_task(2)">Complete</button>
					<button type="button" class="btn btn-danger" onclick="complete_task(3)">Close</button>

				</div>

			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="board_task_view_modal" tabindex="-1" role="dialog" aria-hidden="true" style="height:100vh">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Board Task View</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body" id="board_body">
				<br>
				<hr>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

			</div>

		</div>
	</div>
</div>

<div class="modal fade" id="project_task_view_modal" tabindex="-1" role="dialog" aria-hidden="true"
	 style="height:100vh">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Project Task View</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body" id="project_body">

				<br>
				<hr>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

			</div>

		</div>
	</div>
</div>
<div class="modal fade" id="treeModel" tabindex="-1" role="dialog" aria-hidden="true" style="height:100vh">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" id="project_body">


			</div>
		</div>
	</div>
</div>

<?php $this->view("layout_template/drawer_page1.php"); ?>

</body>
</html>
<script type="text/javascript" src="<?= base_url("assets/") ?>scripts/main.87c0748b313a1dda75f5.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
		integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
		crossorigin="anonymous"></script>
<link href="<?= base_url() . "assets/"; ?>scripts/datatables/datatables.min.css" rel="stylesheet" type="text/css"/>
<script src="<?= base_url() . "assets/"; ?>scripts/datatables/datatables.min.js" type="text/javascript"></script>

<script src="//cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@1.6.0/src/loadingoverlay.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet"/>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<script>
	$(document).ready(function () {
		get_all_images();
		
		$("#blink").blink();
		get_employee_information();
		get_no_task();
		get_no_project();
		get_today_news();
		get_board_task();
		get_users();
		email_iframe();
		//get_personal_task(1);
		get_total_personal_task_count();
		$("#overlay_div").hide();

		$('#commentTable').DataTable();
		$('#assign_to').select2();

		$('#personal_task_modal').on('show.bs.modal', function (e) {
			//$('#uploadPersonalTask').trigger('reset');

			$('#uploadPersonalTask')[0].reset();
			setTimeout(hideError, 100);
			var node_id = $(e.relatedTarget).data('forward_task');
			var node_id1 = $(e.relatedTarget).data('edit_task');
			var type = $(e.relatedTarget).data('type');
			if (type == 2) {
				get_forward_data(node_id);
			} else if (type == 3) {
				edit_task(node_id1);
			} else {
				get_upload_button();
			}


		});

		$('#personal_task_modal').on('hidden.bs.modal', function (e) {
			$("#personal_task_view_modal").modal('show');
		});


		var hideError = function () {
			$('span[class="error"]').html('');
		};

		$('#treeModel').on('hidden.bs.modal', function () {
			// Load up a new modal...
			$('#personal_task_view_modal').modal('show')
		});
		$('#personal_task_view_modal').on('hidden.bs.modal', function () {
			//remove the backdrop
			$('.modal-backdrop').remove();
		});

		$("#uploadPersonalTask").validate({

			rules: {
				ptask_name: 'required',
				pdate_com: 'required',

			},
			messages: {
				ptask_name: "Please Enter task name",
				pdate_com: "Please Select date completion",

			},
			errorElement: 'span',

			submitHandler: function (form) {
				var form_data = document.getElementById('uploadPersonalTask');
				var Form_data = new FormData(form_data);

				var root_node_id = $("#update_task_root_id").val();
				var forward_task = $("#forward_task").val();

				$.ajax({
					type: "POST",
					url: "<?= base_url("Iframe_controller/uploadPersonalTask") ?>",
					dataType: "json",
					data: Form_data,
					contentType: false,
					processData: false,
					success: function (result) {
//                                                                $("#loader12").hide();
						if (result.status === 200) {

							toastr.success('uploaded successfully');

							if (forward_task) {
								loadTree(root_node_id);
							}
							get_personal_task(1, 3);
							$('#uploadPersonalTask').trigger("reset");
							$('#p_close').click();
						} else {
							toastr.error('Not uploaded ');
						}
					},
					error: function (error) {
//                                                                $("#loader12").hide();
						toastr.error("something went wron please try again");
					}
				});
			}
		});


	});
	$("#blink").blink({
		speedIn: 600,
		speedOut: 500,
		viewTime: 6000
	});
	$("#blink").blink({

		// shows pagination
		// items: true,

		// shows navigation
		// navigation: true,

		// prev text
		//prevText: '◄ Prev',

		// next text
		//nextText: 'Next ►'

	});
	
	
	
	function get_data_forward(id) {
		var filter_type = $("#filter_type").val();
		var switch_type = $("#switch_type").val();
		get_personal_task(filter_type, switch_type);
		$("#switch_type").val(3);
	}

	function get_data_assign(id) {
		$("#switch_type").val(4);
		var filter_type = $("#filter_type").val();
		var switch_type = $("#switch_type").val();
		get_personal_task(filter_type, switch_type);
	}

	function show_editor() {
		$("#editor_div").show();
	}

	function get_prompt(id) {
		//alert(id);
		//alert('Do you want to complete or close the task?');
		$("#task_complete_modal").modal('show');
		$("#task_status").val(id);

	}

	function show_comments(id) {

		$.ajax({
			type: "POST",
			url: "<?= base_url("getcomments") ?>",
			dataType: "json",
			data: {id},

			success: function (result) {
				var user_data = result.data;

				//alert(result);
				$("#commentsection").show();
				if (result.status === 200) {

					$('#comment_details_div').html(user_data);

				} else {

					$('#comment_details_div').html(user_data);
				}
			}, error: function (error) {
				console.log('Something went wrong please try again');
			}
		});
	}

	function complete_task(status, task_id) {

		//alert(status);
		//var task_id=$("#task_status").val();
		$.ajax({
			type: "POST",
			url: "<?= base_url("Iframe_controller/change_p_taskstatus") ?>",
			dataType: "json",
			data: {task_id: task_id, status: status},

			success: function (result) {
				//var user_data = result.data;

				if (result.status === 200) {
					var root_node_id = result.data;
					loadTree(root_node_id);
					toastr.success("Status Changed Successfully.");
					get_personal_task(1, 3);
					get_assignment_view(task_id)
				} else {
					toastr.error("Something went wrong.");

				}
			}, error: function (error) {
				console.log('Something went wrong please try again');
			}
		});
	}

	function get_personalTask_button(id, switch_type) {
		var filter_type = $("#filter_type").val();
		var switch_type = $("#switch_type").val();
		get_personal_task(filter_type, switch_type);
	}

	function hideShow_left() {
		if ($('.leftside').css('display') == 'none') {
			//  $('.leftside').show();

			$('.leftside').fadeIn("slow");
		} else {
			// $('.leftside').hide();
			$('.leftside').fadeOut("slow");
		}
	}

	function hideShow_right() {
		if ($('.rightside').css('display') == 'none') {
			//  $('.rightside').show();
			$('.rightside').fadeIn("slow");
		} else {
			//  $('.rightside').hide();
			$('.rightside').fadeOut("slow");
		}
	}


	function hideShow_both() {
		if ($('.rightside').css('display') == 'none') {
			// $('.rightside').show();
			// $('.leftside').show();
			$('.leftside').fadeIn("slow");
			$('.rightside').fadeIn("slow");
		} else {
			// $('.rightside').hide();
			// $('.leftside').hide();
			$('.rightside').fadeOut("slow");
			$('.leftside').fadeOut("slow");
		}
	}

	/* function get_projectTask_button(){

		$.ajax({
			type: "POST",
			url: "<?= base_url("Iframe_controller/get_all_taskProject") ?>",
			dataType: "json"

			success: function (result) {
				var user_data = result.data;

				//alert(result);

				if (result.status === 200) {

					$('#project_body').html(user_data);

				} else {

					$('#project_body').html(user_data);
				}
			}, error: function (error) {
				console.log('Something went wrong please try again');
			}
		});
	}
	function get_boardTask_button(){

		$.ajax({
			type: "POST",
			url: "<?= base_url("Iframe_controller/get_all_taskBoard") ?>",
			dataType: "json"

			success: function (result) {
				var user_data = result.data;

				//alert(result);

				if (result.status === 200) {

					$('#board_body').html(user_data);

				} else {

					$('#board_body').html(user_data);
				}
			}, error: function (error) {
				console.log('Something went wrong please try again');
			}
		});
	} */


	/* $('#midddlediv1').on('click', function() {
	// $('.rightside').hide();
	 $('.rightside').fadeOut("slow");
	 $('.leftside').fadeOut("slow");
	 // $('.leftside').hide();
	  $("#iframe_id").css('z-index', 99);
	  $("#midddlediv1").css('z-index', 9);

	}); */


	// $(function () {
	// x=10;
	// $('#project_list li').slice(1, 10).show();
	// $('#loadMore').on('click', function (e) {
	// e.preventDefault();
	// x = x+5;
	// $('#project_list li').slice(0, x).slideDown();
	// });
	// });
	function get_data(id) {
		$("#filter_type").val(id);
		var filter_type = $("#filter_type").val();
		var switch_type = $("#switch_type").val();

		if (id == 2) {
			get_personalTask_button(filter_type, switch_type);
		} else if (id == 5) {
			get_personalTask_button(filter_type, switch_type);

		} else if (id == 6) {
			get_personalTask_button(filter_type, switch_type);
		} else {
			get_personalTask_button(filter_type, switch_type);
		}


	}

	function go_task() {
		window.open("<?= base_url("load_planning_dashboard") ?>");
	}

	function go_kstore() {
		window.open("http://kstore.docango.com/home");
	}

	function go_chat() {
		window.open("https://rmt.docango.com/messenger");
	}

	function go_news() {
		window.open("https://rmt.docango.com/news");
	}

	function go_signout() {
		window.location.href = "https://rmt.docango.com/login";
	}

	function get_employee_information() {
		$.ajax({
			type: "POST",
			url: "<?= base_url("Iframe_controller/get_employee_data") ?>",
			dataType: "json",

			success: function (result) {
				var user_data = result.data;


				if (result['status'] === 'success') {

					$('#user_id_mapp_ca').append(user_data);

				} else {

					$('#user_id_mapp_ca').append(user_data);
				}
			}, error: function (error) {
				toastr.info('Something went wrong please try again');
			}
		});
	}

	function get_no_task() {
		$.ajax({
			type: "POST",
			url: "<?= base_url("Iframe_controller/get_no_task") ?>",
			dataType: "json",

			success: function (result) {
				var user_data = result.data;
				//alert(user_data.data);
				//console.log(user_data.total_task);
				if (result['status'] === 'success') {

					$('#Ttask').html(user_data.total_task);
					$('#Ytask').html(user_data.yearly_task);
					$('#Ctask').html(user_data.completed);
					$('#Ptask').html(user_data.pending);
					$('#Etask').html(user_data.initiate);
				} else {


				}
			}, error: function (error) {
				toastr.info('Something went wrong please try again');
			}
		});
	}

	function get_all_images() {
		$.ajax({
			type: "POST",
			url: "<?= base_url("Iframe_controller/get_advertise") ?>",
			dataType: "json",

			success: function (result) {
				var user_data = result.data;
				//alert(user_data.data);
				//console.log(user_data.total_task);
				if (result['status'] == 200) {

					$('#blink').html(user_data);
				} else {

					$('#blink').html("");
				}
			}, error: function (error) {
				toastr.info('Something went wrong please try again');
			}
		});
	}

	function get_no_project() {
		$.ajax({
			type: "POST",
			url: "<?= base_url("Iframe_controller/get_no_project") ?>",
			dataType: "json",

			success: function (result) {
				var user_data = result.data;
				//alert(user_data.data);
				console.log(user_data);
				if (result['status'] === 'success') {

					$('#project_list').html(user_data);

				} else {


				}
			}, error: function (error) {
				toastr.info('Something went wrong please try again');
			}
		});
	}

	function upload_image() {
		var form_data = document.getElementById('uploadImage');
		var Form_data = new FormData(form_data);
		//alert(Form_data);
		$.ajax({
			type: "POST",
			url: "<?= base_url("Iframe_controller/upload_image") ?>",
			dataType: "json",
			data: Form_data,
			contentType: false,
			processData: false,
			success: function (result) {
				alert(result);
//
				if (result.status === 200) {

					// toastr.success(result.body);
					// $(location).attr('href', '<?= base_url("view_employee") ?>')
					alert('uploaded successfully');


				} else {
					// document.getElementById('loaders7').style.display = "none";
					// toastr.error(result.body);
					alert('Not uploaded ');
				}
			},
			error: function (error) {
//                                                           $("#loader12").hide();
				toastr.info('Something went wrong please try again');
			}
		});
	}

	function upload_advertise() {
		var form_data = document.getElementById('uploadAdd');
		var Form_data = new FormData(form_data);
		//alert(Form_data);
		$.ajax({
			type: "POST",
			url: "<?= base_url("Iframe_controller/uploadAdvertise") ?>",
			dataType: "json",
			data: Form_data,
			contentType: false,
			processData: false,
			success: function (result) {
				alert(result);
//
				if (result.status === 200) {

					// toastr.success(result.body);
					// $(location).attr('href', '<?= base_url("view_employee") ?>')
					toastr.success('uploaded successfully');


				} else {
					// document.getElementById('loaders7').style.display = "none";
					// toastr.error(result.body);
					toastr.error('Not uploaded ');
				}
			},
			error: function (error) {
//                                                                $("#loader12").hide();
				alert();
			}
		});
	}


	function get_upload_button() {
		document.getElementById('update_personal_Task_id').style.display = "none";
		document.getElementById('upload_personalTask_id').style.display = "block";
		document.getElementById('div_FTask_id').style.display = "none";
		document.getElementById('div_dependency').style.display = "none";
		document.getElementById('div_assign').style.display = "none";
		$("#ptask_type").val("0");
		$("#assign_to").val("");
	}

	function edit_task(id) {
		$.ajax({
			type: "POST",
			url: "<?= base_url("Iframe_controller/get_nodetask_all_deatils") ?>",
			dataType: "json",
			data: {node_id: id},
			success: function (result) {

				var user_data = result.data;
				var dep_data = result.dependency;
				//alert(result);
				$("#assign_to").val("");

				$('#update_task_id').val('');
				$('#update_task_id').val(id);
				document.getElementById('update_personal_Task_id').style.display = "block";
				document.getElementById('upload_personalTask_id').style.display = "none";
				document.getElementById('div_dependency').style.display = "block";
				document.getElementById('div_assign').style.display = "block";

				if (result.status == 200) {
					$("#dependency").html(dep_data);
					var len = user_data.length;
					for (var i = 0; i < len; i++) {
						$("#ptask_name").val(user_data[i]['task_name']);
						$("#ptask_details").val(user_data[i]['task_details']);
						$("#ptask_scope").val(user_data[i]['scope_of_project']);
						$("#priority").val(user_data[i]['priority']);
						$("#old_ptask_file").html(user_data[i]['task_file']);
						$("#update_task_root_id").val(user_data[i]['root_node_id']);
						var dep = user_data[i]['dependency_node_id'];
						$("#dependency option[value='" + dep + "']").prop("selected", true);
						$('#dependency').select2();

						if (user_data[i]['task_file'] == null || user_data[i]['task_file'] == "") {
							document.getElementById('div_FTask_id').style.display = "none";
						} else {
							document.getElementById('div_FTask_id').style.display = "block";
						}
						//$("#assign_to").val(user_data[0]['user_id']);
						var a = user_data[i]['user_id'];
						$("#assign_to option[value='" + a + "']").prop("selected", true);
						$('#assign_to').select2();

						var date = new Date(user_data[i]['date_completion']);
						console.log(date);
						date = formatDate(date, 2);
						console.log(date);
						//document.getElementById("pdate_com").value = date;
						$("#pdate_com").val(date);
						$("#ptask_type").val("2");


					}


				} else {

				}
			}, error: function (error) {
				toastr.info('Something went wrong please try again');
			}
		});
	}

	function delete_task_file() {
		var node_id = $('#update_task_id').val();
		$.ajax({
			type: "POST",
			url: "<?= base_url("Iframe_controller/delete_task_file") ?>",
			dataType: "json",
			data: {node_id: node_id},

			success: function (result) {

				if (result.status === 200) {
					toastr.success('uploaded successfully');

				} else {
					toastr.error('Not uploaded ');
				}
			},
			error: function (error) {
//                                                                $("#loader12").hide();
				toastr.info('Something went wrong please try again');
			}
		});
	}

	function display_alert() {
		setTimeout(function () {
			$(".error_msg").html('');
		}, 2000);

	}

	function update_personal_Task() {
		var check = 0;
		if ($("#ptask_name").val() == "") {
			$("#ptask_name_error").html("Please Enter Task Name");
			$("#ptask_name_error").css({'color': 'red'});
			check = 1;
		} else {
			check = 0;
		}
		if (check == 1) {

			display_alert();

		} else {
			var id = $('#update_task_id').val();
			var root_node_id = $("#update_task_root_id").val();
			if ($("#assign_to").val() == null) {
				toastr.error('select user to assign task');
			} else {
				var form_data = document.getElementById('uploadPersonalTask');
				var Form_data = new FormData(form_data);
				//alert(Form_data);
				$.ajax({
					type: "POST",
					url: "<?= base_url("Iframe_controller/update_Personal_Task") ?>",
					dataType: "json",
					data: Form_data,
					contentType: false,
					processData: false,
					success: function (result) {
						//alert(result);
						//
						if (result.status === 200) {

							// toastr.success(result.body);
							// $(location).attr('href', '<?= base_url("view_employee") ?>')
							toastr.success('uploaded successfully');

							get_personal_task(1, 3);
							$('#uploadPersonalTask').trigger("reset");
							$('#p_close').click();
							loadTree(root_node_id);
						} else {
							// document.getElementById('loaders7').style.display = "none";
							// toastr.error(result.body);
							toastr.error('Not uploaded ');
						}
					},
					error: function (error) {
						//                                                                $("#loader12").hide();
						toastr.info('Something went wrong please try again');
					}
				});
			}
		}

	}


	function upload_forward_task() {
		var form_data = document.getElementById('uploadForwardTask');
		var Form_data = new FormData(form_data);

		var root_node_id = $("#update_task_root_id").val();
		//alert(Form_data);
		$.ajax({
			type: "POST",
			url: "<?= base_url("Iframe_controller/uploadForwardTask") ?>",
			dataType: "json",
			data: Form_data,
			contentType: false,
			processData: false,
			success: function (result) {
				//alert(result);
//
				if (result.status === 200) {

					// toastr.success(result.body);
					// $(location).attr('href', '<?= base_url("view_employee") ?>')
					toastr.success('uploaded successfully');
					//$('#p_close').click();
					$('#uploadForwardTask').trigger("reset");
					$('#f_close').click();
					get_personal_task(1, 3);
					loadTree(root_node_id);

				} else {
					// document.getElementById('loaders7').style.display = "none";
					// toastr.error(result.body);
					//alert('Not uploaded ');
				}
			},
			error: function (error) {
//                                                                $("#loader12").hide();
				toastr.info('Something went wrong please try again');
			}
		});
	}

	function get_today_news() {
		$.ajax({
			type: "POST",
			url: "<?= base_url("Iframe_controller/get_today_news") ?>",
			dataType: "json",

			success: function (result) {
				var user_data = result.data;
				//alert(user_data.data);
				console.log(result);
				if (result['status'] == 200) {

					$('#news').html(user_data);
					get_date_time();

				} else {

					$('#news').html("");
				}
			}, error: function (error) {
				toastr.info('Something went wrong please try again');
			}
		});
	}

	function get_date_time() {

		var date = $(".time_div").each(function (e) {
			updateTime(this, $(this).attr("data-date"));
			let intervalHandler = setInterval(() => {

				updateTime(this, $(this).attr("data-date"))
			}, 10000);

		});

	}

	function get_users() {

		$.ajax({
			type: "POST",
			url: "<?= base_url("Iframe_controller/get_firm_users") ?>",
			dataType: "json",

			success: function (result) {
				//var user_data = result.data;
				//alert(result);
				//console.log(result);
				if (result.status == 200) {

					$('#assign_to').html(result.data);
					$('#assign_to_em').html(result.data);
					// get_date_time();

				} else {

					$('#assign_to').html("");
					$('#assign_to_em').html("");
				}
			}, error: function (error) {
				toastr.info('Something went wrong please try again');
			}
		});
	}

	function getTreeUsers(node_id) {

		$.ajax({
			type: "POST",
			url: "<?= base_url("employeeOfTreeInvolved") ?>",
			dataType: "json",
			data: {node_id: node_id},
			success: function (result) {
				if (result.status == 200) {
					let template = ``;
					template += result.body.map(e => {
						let assignTos = e.assign_to.split(',');
						for (let assignUser of assignTos) {
							if (assignUser === e.user_id)
								return `<option value="${e.user_id}" selected> ${e.user_name}</option>`
						}
						return `<option value="${e.user_id}"> ${e.user_name}</option>`
					}).join("");
					$('#comment_assign_to').empty();
					$('#comment_assign_to').append(template);
					$('#comment_assign_to').select2();
				} else {
					$('#comment_assign_to').empty();
					$('#comment_assign_to').append("<option disabled>No data Found</option>");
				}
			}, error: function (error) {
				toastr.info('Something went wrong please try again');
			}
		});
	}

	function get_personal_task(id, switch_type) {

		// $.ajax({
		// type: "POST",
		// url: "<?= base_url("Iframe_controller/get_personal_task/") ?>"+id,
		// dataType: "json",

		// success: function (result) {

		// if (result.status == 200) {
		// $('#personal_table').empty();
		// $('#personal_table').append(result.data);
		// $('#perosnalTaskTable').DataTable();
		// $('#p_count').val(result.p_count);
		// var P_task = $("#p_count").val();
		// $('#T_Task').html(P_task);
		// } else {
		// $('#personal_table').html("");
		// }
		// }, error: function (error) {
		// toastr.info('Something went wrong please try again');
		// }
		// });

		$('#perosnalTaskTable').DataTable({

			"destroy": true,
			"processing": true,
			"serverSide": true,
			"bLengthChange": false,
			"order": [],
			"bInfo": false,
			"select": {
				style: 'os',
				items: 'cell'
			},
			"ajax": {
				"url": '<?php base_url(); ?>Chat_Controller_Test/get_personal_task1/' + id,
				"type": "POST"
			},
			columns: [{data: "task_name"}]
			/** this will create datatable with above column data **/
		});
	}

	function get_total_personal_task_count() {
		$.ajax({
			type: "POST",
			url: "<?= base_url("Iframe_controller/get_totalPersonalTask_count") ?>",
			dataType: "json",
			success: function (result) {
				//var user_data = result.data;

				if (result.status === 200) {
					$("#T_Task").html(result.data);
				} else {
					toastr.error("Something went wrong.");

				}
			}, error: function (error) {
				console.log('Something went wrong please try again');
			}
		});
	}

	function get_forward_data(id) {
		//alert(id);


		$.ajax({
			type: "POST",
			url: "<?= base_url("Iframe_controller/get_nodetask_deatils") ?>",
			dataType: "json",
			data: {node_id: id},
			success: function (result) {
				var user_data = result.data;
				//alert(result);
				var dep_data = result.dependency;
				$('#uploadPersonalTask').trigger("reset");
				$('#forward_task').val('');
				$('#forward_task').val(id);
				document.getElementById('update_personal_Task_id').style.display = "none";
				document.getElementById('upload_personalTask_id').style.display = "block";
				document.getElementById('div_FTask_id').style.display = "none";
				document.getElementById('div_dependency').style.display = "block";
				document.getElementById('div_assign').style.display = "block";


				$("#assign_to").val("");
				$("#assign_to").select2("");
				if (result.status == 200) {
					$("#ptask_name").val(user_data[0]['task_name']);
					$("#priority").val(user_data[0]['priority']);
					$("#ptask_details").val(user_data[0]['task_details']);
					$("#ptask_scope").val(user_data[0]['scope_of_project']);
					$("#update_task_root_id").val(user_data[0]['root_node_id']);
					var date = new Date(user_data[0]['date_completion']);

					date = formatDate(date);
					$("#pdate_com").val(date, 2);
					console.log(date);
					$("#dependency").html(dep_data);
					$("#ptask_type").val("1");


				} else {

				}
			}, error: function (error) {
				toastr.info('Something went wrong please try again');
			}
		});
	}

	function formatDate(date, type = 1) {
		var d = new Date(date),
				month = '' + (d.getMonth() + 1),
				day = '' + d.getDate(),
				year = d.getFullYear();

		if (month.length < 2)
			month = '0' + month;
		if (day.length < 2)
			day = '0' + day;
		if (type == 1) {
			return [year, month, day].join('/');
		} else {
			return [year, month, day].join('-');
		}

	}

	function get_assignment_view(id) {


		//$.LoadingOverlay("show");
		$.ajax({
			type: "POST",
			url: "<?= base_url("getassignmentview") ?>",
			dataType: "json",
			data: {id},
			success: function (result) {
				//var user_data = result.data;
				//alert(result);
				//console.log(result);
				if (result.status == 200) {
					$.LoadingOverlay("hide");

					$('#detials_box').removeClass('d-none')
					$('#graph_box').removeClass('col-md-12');
					$('#graph_box').addClass('col-md-6');
					$('#comment_box').removeClass('d-none');
					$('#actionButtons').empty();
					$('#actionButtons').append(result.actionButton);
					$('#detials_box').empty();
					$('#detials_box').append(result.nodeDetails);
					$('#commentSection').empty();
					$('#commentSection').append(result.commentDetails);
					getTreeUsers(id);
					$('#assign_task_id').val(id);
					// get_date_time();

				} else {

					$('#assignment_view').html("");
					$('#task_details_view').html(result.data1);
				}
			}, error: function (error) {
				toastr.info('Something went wrong please try again');
			}
		});
	}

	function save_comment(user_id) {
		//var comment=$("#new_texar_comment").val();
		var comment = document.getElementById("new_texar_comment").value;
		if (comment == "") {
			toastr.error('Enter Comment');
		} else {
			var task_id = $('#assign_task_id').val();
			//var form_data = document.getElementById('personalTaskCommentUpload');
			//var Form_data = new FormData(form_data);
			var form_data = new FormData(document.getElementById("personalTaskCommentUpload"));
			//console.log(form_data);
			//alert(form_data);
			$.ajax({
				type: "POST",
				url: "<?= base_url("add_comment") ?>",
				dataType: "json",
				data: form_data,
				contentType: false,
				processData: false,
				success: function (result) {
					//var user_data = result.data;
					//alert(result);
					console.log(result);
					if (result.status == 200) {

						// $('#assignment_view').html(result.data);
						// get_date_time();

						$('#personalTaskCommentUpload').trigger("reset");
						show_comments(task_id);

					} else {

						// $('#assignment_view').html("");

					}
				}, error: function (error) {
					toastr.info('Something went wrong please try again');
				}
			});
		}
	}

	function timeSince(date) {
		date = new Date(date);
		var seconds = Math.floor((new Date() - date) / 1000);

		var interval = seconds / 31536000;

		if (interval > 1) {
			return Math.floor(interval) + " years ago";
		}
		interval = seconds / 2592000;
		if (interval > 1) {
			return Math.floor(interval) + " months ago";
		}
		interval = seconds / 86400;
		if (interval > 1) {
			return Math.floor(interval) + " days ago";
		}
		interval = seconds / 3600;
		if (interval > 1) {
			return Math.floor(interval) + " hours ago";
		}
		interval = seconds / 60;
		if (interval > 1) {
			return Math.floor(interval) + " minutes ago";
		}
		return "Just Now";
	}

	function updateTime(element, time) {
		let updateTime = timeSince(time);
		$(element).empty();
		$(element).append(updateTime);
	}

	function get_filtered_data() {
		var filter_id = $("#filter_tbl").val();
		var filter_type = $("#filter_type").val();
		var switch_type = $("#switch_type").val();
		if (filter_id == 1) {
			get_personalTask_button(filter_id, switch_type);
		} else if (filter_id == 2) {
			get_personalTask_button(filter_id, switch_type);

		} else if (filter_id == 3) {
			get_personalTask_button(filter_id, switch_type);
		} else if (filter_id == 4) {
			get_personalTask_button(filter_id, switch_type);
		} else if (filter_id == 5) {
			get_personalTask_button(filter_id, switch_type);
		} else {
			get_personalTask_button(filter_id, switch_type);
		}
	}

	function get_filtered_task(id) {
		$.ajax({
			type: "POST",
			url: "<?= base_url("Iframe_controller/get_filtered_task") ?>",
			dataType: "json",
			data: {id},
			success: function (result) {
				//var user_data = result.data;
				//alert(result);
				//console.log(result);
				$('#personal_table').html("");
				if (result.status == 200) {

					$('#personal_table').html(result.data);
					// get_date_time();
					$('#perosnalTaskTable').DataTable();

				} else {

					$('#personal_table').html("");
				}
			}, error: function (error) {
				toastr.info('Something went wrong please try again');
			}
		});
	}


</script>
<script>
	/* var myIndex = 0;


	function carousel() {
	  var i;
	  var x = document.getElementsByClassName("mySlides");

	  for (i = 0; i < x.length; i++) {
		x[i].style.display = "none";
	  }
	  myIndex++;
	  if (myIndex > x.length) {myIndex = 1}
	  x[myIndex-1].style.display = "block";
	  setTimeout(carousel, 5000); // Change image every 2 seconds
	} */
	function get_board_task() {
		$.ajax({
			type: "POST",
			url: "<?= base_url("Iframe_controller/get_board_task") ?>",
			dataType: "json",

			success: function (result) {
				//var user_data = result.data;
				//alert(result);
				//console.log(result);
				if (result['status'] === 'success') {

					$('#Btask').val(result.btask);
					$('#Pro_task').val(result.ptask);
					// $('#Ytask').html(user_data.yearly_task);
					// $('#Ctask').html(user_data.completed);
					// $('#Ptask').html(user_data.pending);
					// $('#Etask').html(user_data.initiate);
				} else {


				}
			}, error: function (error) {
				toastr.info('Something went wrong please try again');
			}
		});
	}
</script>
<script>


	function loadTree(id) {
		$.ajax({
			type: "POST",
			url: "<?= base_url("getTreeNodes") ?>",
			dataType: "json",
			data: {root_node_id: id},
			success: function (result) {
				if (result.status == 200) {
					//drowTree(result.data[0]);
					drowTree(manipulateTreeNodeData(result.data));
					//$("#personal_task_view_modal").modal('hide');
					//$('.modal-backdrop').remove();
					// $('#personal_task_view_modal').on('hidden.bs.modal', function(){

					// $('#personal_task_view_modal.modal-backdrop').remove();


					// })
					get_assignment_view(id);
					// document.getElementById('p_list_view').style.display = "none";
					document.getElementById('p_detail_view').style.display = "block";
				}
			}, error: function (error) {
				console.log('Something went wrong please try again');
			}
		});
	}


	function drowTree(data) {
		var treePlugin = new d3.mitchTree.boxedTree()
				.setData(data)
				.setElement(document.getElementById("visualisation"))
				.setIdAccessor(function (data) {
					return data.id;
				})
				.setChildrenAccessor(function (data) {
					// console.log(data);
					return data.children;
				})

				.setBodyDisplayTextAccessor(function (data) {
					// console.log(data);
					return data.description;
				})
				.setTitleDisplayTextAccessor(function (data) {
					// console.log(data);
					return data.name;
				}).on("nodeClick", function (event) {
					console.log('The event object:')
					console.log(event);
					get_assignment_view(event.data.id);

					console.log("Click event was triggered!");
					if (event.type == 'focus')
						console.log("Node is being focused");
					else if (event.type == 'collapse')
						console.log("Node is collapsing");
					else if (event.type == 'expand')
						console.log("Node is expanding");
				})
				.initialize();
		treePlugin.update = function (nodeDataItem) {
			// Call the original update method
			console.log(nodeDataItem);
			this.__proto__.update.call(this, nodeDataItem);
			updateTreeClasses(this);
		}
		var nodes = treePlugin.getNodes();
		nodes.forEach(function (node, index, arr) {
			treePlugin.expand(node);
		});
		treePlugin.update(treePlugin.getRoot());
	}

	function manipulateTreeNodeData(data) {
		const indexMapping = data.reduce((array, item, index) => {
			array[item.id] = index;
			return array;
		}, {});

		let root;

		data.forEach(item => {
			if (item.type === item.id) {
				root = item;
				return;
			}
			const parentEl = data[indexMapping[item.type]];
			parentEl.children = [...(parentEl.children || []), item];
		});

		return root;

	}


	function updateTreeClasses(treePlugin) {
		treePlugin.getPanningContainer().selectAll("g.node")
				.attr("class", function (data, index, arr) {
					var depthClass = "depth-" + data.depth;
					var existingClasses = this.getAttribute('class');
					if (data.data.status == 2) {
						this.children[0].children[0].classList.add("node-details")
						this.children[1].children[0].classList.add("node-title")


						//this.setAttribute("classList",data.data.id);
					} else if (data.data.status == 3) {
						this.children[0].children[0].classList.add("node-details-close")
						this.children[1].children[0].classList.add("node-title")
					}
					if(data.data.comment > 0){
						let commentNode =`<path  d="M14.9,6.707c-0.804-2.497-3.649-4.351-7.035-4.351c-4.008,0-7.27,2.594-7.27,5.782 c0,2.163,1.516,4.133,3.903,5.122v3.091c0,0.251,0.144,0.478,0.372,0.586c0.087,0.042,0.182,0.062,0.276,0.062
 c0.148,0,0.295-0.051,0.412-0.15l3.678-3.038c0.14-0.022,0.275-0.057,0.413-0.084c0.655,0.666,1.544,1.185,2.607,1.46
 c0.198,0.051,0.401,0.094,0.608,0.125l2.641,2.182c0.118,0.099,0.264,0.15,0.413,0.15c0.094,0,0.188-0.02,0.276-0.062
 c0.228-0.108,0.372-0.335,0.372-0.586v-2.135c1.74-0.761,2.84-2.231,2.84-3.846C19.405,8.862,17.456,7.073,14.9,6.707z
 M8.885,12.552c-0.019,0.003-0.032,0.018-0.051,0.022c-0.101,0.022-0.2,0.056-0.281,0.123l-2.76,2.28v-2.161
 c0-0.275-0.175-0.521-0.434-0.612C3.253,11.467,1.89,9.871,1.89,8.138c0-2.474,2.68-4.487,5.975-4.487
 c2.604,0,4.801,1.265,5.617,3.014c0.187,0.401,0.302,0.823,0.33,1.268c0.005,0.069,0.028,0.134,0.028,0.205
 c0,1.819-1.481,3.438-3.706,4.129c-0.115,0.037-0.224,0.08-0.343,0.111C9.497,12.455,9.196,12.513,8.885,12.552z M15.703,13.809
 c-0.259,0.091-0.434,0.336-0.434,0.612v1.199l-1.723-1.422c-0.095-0.079-0.211-0.129-0.333-0.144
 c-0.219-0.028-0.431-0.068-0.636-0.121c-0.545-0.14-1.023-0.364-1.433-0.64c2.423-0.969,3.99-2.942,3.99-5.155
 c0-0.024-0.004-0.047-0.005-0.071c1.718,0.385,2.98,1.553,2.98,2.948C18.11,12.202,17.165,13.299,15.703,13.809z" transform="translate(170, -30)"></path>`;
						this.children[0].insertAdjacentHTML('beforeend',commentNode);
					}

					if(data.data.dependencyNodeID !== 0){
						let transform =`transform="translate(175, -30)"`;
						if(data.data.comment>0){
							transform = `transform="translate(145, -30)"`;
						}
						let linkNode =`<path  d="M19.175,4.856L15.138,0.82c-0.295-0.295-0.817-0.295-1.112,0L8.748,6.098c-0.307,0.307-0.307,0.805,0,1.112l1.462,1.462l-1.533,1.535L7.215,8.746c-0.307-0.307-0.805-0.307-1.112,0l-5.278,5.276c-0.307,0.307-0.307,0.805,0,1.112l4.037,4.037c0.154,0.153,0.355,0.23,0.556,0.23c0.201,0,0.403-0.077,0.556-0.23l5.28-5.276c0.148-0.148,0.23-0.347,0.23-0.556c0-0.209-0.083-0.409-0.23-0.556l-1.464-1.464l1.533-1.535l1.462,1.462c0.153,0.153,0.355,0.23,0.556,0.23c0.201,0,0.402-0.077,0.556-0.23l5.278-5.278c0.147-0.147,0.23-0.347,0.23-0.556C19.406,5.203,19.322,5.004,19.175,4.856zM9.585,13.339l-4.167,4.164l-2.925-2.925l4.166-4.164l0.906,0.905l-0.67,0.668c-0.307,0.307-0.307,0.805,0,1.112c0.154,0.153,0.356,0.23,0.556,0.23c0.203,0,0.403-0.077,0.556-0.23l0.67-0.668L9.585,13.339z M13.341,9.578l-0.906-0.906l0.663-0.662c0.307-0.307,0.307-0.805,0-1.112c-0.307-0.307-0.805-0.307-1.112,0L11.322,7.56l-0.906-0.906l4.166-4.166l2.925,2.925L13.341,9.578z"
						${transform}>
<title>${data.data.depndencyNodeName}</title>
</path>`;
						this.children[0].insertAdjacentHTML('beforeend',linkNode);
					}
					if (!existingClasses)
						return depthClass;
					var hasDepthClassAlready = (' ' + existingClasses + ' ').indexOf(' ' + depthClass + ' ') > -1;
					if (hasDepthClassAlready)
						return existingClasses;
					return existingClasses + " " + depthClass;
				});
	}

	function getTreeUsers(node_id) {

		$.ajax({
			type: "POST",
			url: "<?= base_url("employeeOfTreeInvolved") ?>",
			dataType: "json",
			data: {node_id: node_id},
			success: function (result) {
				if (result.status == 200) {
					let template = ``;
					template += result.body.map(e => {
						let assignTos = e.assign_to.split(',');
						for (let assignUser of assignTos) {
							if (assignUser === e.user_id)
								return `<option value="${e.user_id}" selected> ${e.user_name}</option>`
						}
						return `<option value="${e.user_id}"> ${e.user_name}</option>`
					}).join("");
					$('#comment_assign_to').empty();
					$('#comment_assign_to').append(template);
					$('#comment_assign_to').select2();
				} else {
					$('#comment_assign_to').empty();
					$('#comment_assign_to').append("<option disabled>No data Found</option>");
				}
			}, error: function (error) {
				toastr.info('Something went wrong please try again');
			}
		});
	}

	function toggleNodeDescription() {
		$('#collapseExample123').toggleClass('d-none');
	}

	function toggleNodeComments() {
		$('#toggleNodeCommentsId').toggleClass('d-none');
	}
	
	function mark_as_read(id,task_id)
	{
		$.ajax({
			type: "POST",
			url: "<?= base_url("Iframe_controller/mark_as_read") ?>",
			dataType: "json",
			data:{id:id},

			success: function (result) {
				//var user_data = result.data;
				//alert(result);
				//console.log(result);
				if (result['status'] === 200) {
					show_comments(task_id);
					loadTree(task_id);
					var filter_type = $("#filter_type").val();
					var switch_type = $("#switch_type").val();
					get_personal_task(filter_type,switch_type);
					
				} else {
					toastr.info('Something went wrong please try again');

				}
			}, error: function (error) {
				toastr.info('Something went wrong please try again');
			}
		});
	}

</script>
<script>
function on() {
	
		$("#overlay_div").toggle();
	
  //document.getElementById("overlay").style.display = "block";
}

function off() {
  		$("#overlay_div").hide();
}

function drop_div()
{
	$("#drop_div").toggle();
}
function dashboard_dekstop()
{
	document.getElementById("dashboard_dekstop").style.display = "block";
	document.getElementById("communication_dekstop").style.display = "none";
	document.getElementById("project_dekstop").style.display = "none";
	$("#drop_div").toggle();
}
function communication_dekstop()
{
	document.getElementById("dashboard_dekstop").style.display = "none";
	document.getElementById("communication_dekstop").style.display = "block";
	document.getElementById("project_dekstop").style.display = "none";
	$("#drop_div").toggle();
}

function task_dekstop()
{
	document.getElementById("dashboard_dekstop").style.display = "none";
	document.getElementById("communication_dekstop").style.display = "none";
	document.getElementById("project_dekstop").style.display = "block";
	$("#drop_div").toggle();
}

function others()
{
	$("#drop_div").toggle();
}
$(document).click(function(){
  $("#drop_div").hide();
  
});




</script>
