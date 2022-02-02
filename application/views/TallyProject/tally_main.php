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
	<script src="<?= base_url() ?>assets/scripts/jquery-2.1.3.js" type="text/javascript"></script>
	<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
	

	<style>

		body {
			background-color: #f2eaea;
			height: 100vh;
		}

		

		.tpdiv {
			background-color: #68349a;
			color: white;
			height: auto;
			width: 100%;
			display: flex;
			flex-direction: row;
			align-items: center;
			justify-content: space-between;

		}

		

		.firstsection {
			display: flex;
			flex-direction: row;
			align-items: center;
			justify-content: center;
			flex: 1;
			box-shadow: 1px 2px 6px 2px rgb(32 33 36 / 41%);
		}

		.left_icon {

			margin-right: 8px;
		}

		.right_icon {
			display: flex;
			flex-direction: row;
			align-items: center;
			margin-left: 10%;
		}

		.image_div {
			height: 100%;
			width: 50px;
			padding: 2%;
			margin-left: 4px;
			margin-right: 4px;


		}

		.image_div1 {
			height: 100%;
			width: 25%;
			margin-left: 4px;
			margin-right: 50%;

		}

	

		#logo_img {
			margin: 5%;
		}

		.icon_i {
			margin-right: 2%;
			font-size: 12px;
		}

		

		.btn-icon-vertical .btn-icon-wrapper {

			font-size: 449%;
			margin: 0px 0;
			opacity: .6;
			margin-left: 35%;
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
		.bottom_section{
			    display: flex;
    flex-direction: row;
    flex: 1;
		}
		.leftside{
			background: #e8daee;
    height: 96vh;
    width: 15%; 
	border-radius: 4px;
    box-shadow: 1px 1px 4px 2px rgb(32 33 36 / 41%);
    
		}
		.rightside{
			
    height: 96vh;
    width: 85%; 
	border-radius: 4px;
   
    
		}
		ul{
			list-style-type: none;
			font-size: 18px;
    padding: 8px;
    margin-top: 40px;
	text-align:center;
	font-family: cursive;
		}
		#iframe_id {
			width: 100%;
			height: 100%;
			position: relative;
			border: none;


		}
		
	</style>
	
</head>
<body>

<div class="">
	<div class=" firstsection">

		<div class="tpdiv">
			<div class="right_icon">
				<div class="image_div1">
					<img id="logo_img" src="http://gbtech.in/images/logo/goldberries_logo_new.png" width="100%"
						 height="100%" alt="Gold Berries">
				</div>


			</div>

			<div class="left_icon">
				<div>

					
					<button class="hamburger hamburger--elastic open-right-drawer btn btn-link">
						<i class="fa fa-th text-white" style="color:white;font-size:16px;margin-right:5%"></i>
					</button>

					<button class="btn btn-link" onclick="go_signout()">
						<i class="fas fa-sign-out-alt text-white"
						   style="color:white;font-size:16px;margin-right:5%"></i>
					</button>
					
					<!--<div class="image_div" ></div>-->
				</div>
			</div>
		</div>
	</div>
	<div class="bottom_section">
	<div class="leftside">
	<div align="center">
	<h1 style="color:#68349a"> Ecovis RKCA</h1>
	
	</div> 
	<div class="menus">
	<ul ><hr>
	<li onclick="addiframe()"><i class="fa fa-plus"> </i> <span class="text-primary"   style="font-weight: 900;"> Add Data</span></li><hr>
	<li onclick="viewiframe()"><i class="fa fa-eye"> </i> <span class="text-primary" style="font-weight: 900;"> Reports</span></li><hr>
	</ul>
	</div>
	</div >
	<div class="rightside">
	
	 <iframe src="" id="iframe_id" title="description"></iframe>
	</div>
	</div>
	
</div>

<!-- Modal -->


<?php $this->view("layout_template/drawer_page1.php"); ?>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
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
	addiframe();
});
function addiframe(){
	var url="https://rmt.docango.com/Tally/add_tallydata/";
	$('#iframe_id').attr('src', url);
}
function viewiframe(){
	var url="https://rmt.docango.com/View_tallyData";
	$('#iframe_id').attr('src', url);
}
</script>
</html>

