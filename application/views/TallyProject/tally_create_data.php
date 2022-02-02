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
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>

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
	<h1 style="color:#68349a"> Tally</h1>
	
	</div>
	<div class="menus">
	<ul ><hr>
	<li onclick="addiframe()"><i class="fa fa-plus"> </i> <span class="text-primary"   style="font-weight: 900;"> Add Data</span></li><hr>
	<li onclick="viewiframe()"><i class="fa fa-eye"> </i> <span class="text-primary" style="font-weight: 900;"> Reports</span></li><hr>
	</ul>
	</div>
	</div >
	<div class="rightside">
	<div class="col-md-12" style="align:center">
	<ul class="nav nav-tabs">
                    <li class="nav-item"><a data-toggle="tab" href="#tab-eg10-0" class="active nav-link">Ledger Creation</a></li>
                    <li class="nav-item"><a data-toggle="tab" href="#tab-eg10-1" class="nav-link">Group Creation</a></li>
                    <li class="nav-item"><a data-toggle="tab" href="#tab-eg10-2" class="nav-link">Stock Summary Creation</a></li>
					<li class="nav-item"><a data-toggle="tab" href="#tab-eg10-3" class="nav-link">Voucher Creation</a></li>

                </ul>
				<div class="tab-content">
				<div class="tab-pane active " id="tab-eg10-0" role="tabpanel">
                        <div >
                            <h4 >
                                Create Ledgers
                            </h4>
                        </div><hr>
                        
						
						<form class="form-horizontal" id="add_led_form"method="post" action="">
                    <div class="form-group">
                        <div class="col-sm-4">
						<label for="group-name" >Company Name</label>
                            <select id='company_name' class="form-control" name='company_name' onchange="get_ledger_list()">


                            </select>
                        </div>
						<div class="col-sm-4">
						<label for="group-name">Ledger Name</label>
                            <input type="text" class="form-control" id="ledger_name" placeholder="Stock Group name" name="ledger_name" required>
                        </div>
						<div class="col-sm-4">
						<label for="item-name" >Parent</label>
                            <select id='ledger_id' class="form-control" name='ledger_id' >
                                <option>Select Parent Group</option>

                            </select>
                        </div>
                    </div>
                    

                    <div class="form-group">
					 <div class="col-sm-4">
                        <label for="opening_balance" >Opening Balance</label>
                       
                            <input type="text" class="form-control" id="opening_balance" placeholder="Item Quantity" name="opening_balance" required>
                        </div>
						<div class="col-sm-4">
                        <label for="item-name" >GSTIN</label>
                        <input type="text" class="form-control" id="gstin" placeholder="GSTIN" name="gstin" >
						</div>
						<div class="col-sm-4">
                        <label for="item-name" >Address</label>
						 <input type="text" class="form-control" id="address" placeholder="Address" name="address" >
						</div>
                    </div>
					<div class="form-group">
						<div class="col-sm-4">
                        <label for="item-name" >PAN No</label>
                                <input type="text" class="form-control" id="panno" placeholder="PAN No" name="panno" >
						</div><br><br>
						<div class=" col-sm-4" align="center">
                            <button type="button" onclick="insert_ledger()"class="btn btn-primary">Insert</button>
                        </div>
                </form>
                        

                    </div>
				</div>
				<div class="tab-pane" id="tab-eg10-1" role="tabpanel">
                        <div class="card-title">
                            <h4 class="card-header">
                                Create Group
                            </h5>
                        </div><hr>
                        
                        <form class="form-horizontal" id="add_grp_form"method="post" action="">
                    <div class="form-group">
                        
                        <div class="col-sm-4">
						<label for="group-name" class="">Company Name</label>
                            <select id='company_namegrp' class="form-control" name='company_namegrp' onchange="get_ledger_list()">
                            </select>
                        </div>
						<div class="col-sm-4">
						<label for="group-name" >Group Name</label>
                            <input type="text" class="form-control" id="group_name" placeholder="Stock Group name" name="group_name" required>
                        </div>
						<div class="col-sm-4">
						 <label for="item-name">Parent</label>
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
	</div>
	 
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

</script>
</html>

