
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
			  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
  
  <style>
	#div_pl
	{
		padding:0% 5% 25% 5%;
	}
	#div_pl table
	{
		width:100%;
	}
	.tab_pan
	{
		height:100vh;
		overflow-y:auto;
		
	}
	#div_ra
	{
		padding:0% 5% 25% 5%;
	}
	#div_ra table
	{
		width:100%;
	}
	#div_bas
	{
		padding:0% 5% 25% 5%;
	}
	#div_bas table
	{
		width:100%;
	}
  </style>
</head>
<body>

<input type="hidden" name="firm_id" id="firm_id" value="<?= $this->session->user_session->firm_id ?>"/>
<input type="hidden" name="userEmail" id="userEmail" value="<?= $this->session->user_session->email ?>"/>
<input type="hidden" name="locationOfFolder" id="locationOfFolder"/>
<input type="hidden" name="currentLocation" id="currentLocation"/>


<div class="f-container">
    <div class="f-row">
       
        <div class="f-top-nav">
            
            <div class="col-md-12" style="align:center"> <br>
				<ul class="nav nav-tabs">
                   <li class="nav-item"><a data-toggle="tab" href="#tab-eg10-0" class="active nav-link">Profit and Loss</a></li>
                    <li class="nav-item"><a data-toggle="tab" href="#tab-eg10-1" class="nav-link">Ratio Analysis</a></li>
					<li class="nav-item"><a data-toggle="tab" href="#tab-eg10-3" class="nav-link">Balance Sheet</a></li>
                </ul>
				<div class="tab-content">
                    <div class="tab-pane active" id="tab-eg10-0" role="tabpanel">
                        <div class="card-title">
                            <h5 class="card-header">
                                Profit & Loss View
                            </h5>
                        </div>
                        <div class="row">
						
							<div class="col-md-12 ">
							<div class="col-sm-6 form-group">
								<label for="group-name" class="col-sm-4 control-label">Company Name</label>
								<div class="col-sm-12">
									<select id='company_name_pl' class="form-control" name='company_name_pl' onchange="get_profitAndLoss()">


									</select>
								</div>
							</div>
							
						</div>
						<div class="col-md-12 tab_pan" id="div_pl"></div>
						
						
						</div>
                        

                    </div>
                    <div class="tab-pane" id="tab-eg10-1" role="tabpanel">
                        <div class="card-title">
                            <h5 class="card-header">
                               Ratio Analysis View
                            </h5>
                        </div>
                        <div class="row">
							<div class="col-sm-12">
							<div class="form-group">
								<label for="group-name" class="col-sm-4 control-label">Company Name</label>
								<div class="col-sm-6">
									<select id='company_name_ra' class="form-control" name='company_name_ra' onchange="get_ratioAnalysis()">


									</select>
								</div>
							</div>
						</div>
						<div class="col-sm-12" id="div_ra"></div>
						</div>
                        

                    </div>
					
					 <div class="tab-pane" id="tab-eg10-3" role="tabpanel">
                        <div class="card-title">
                            <h5 class="card-header">
                                Balance Sheet View
                            </h5>
                        </div>
                        <div class="row">
							<div class="col-sm-12">
							<div class="form-group">
								<label for="group-name" class="col-sm-4 control-label">Company Name</label>
								<div class="col-sm-6">
									<select id='company_name1' class="form-control" name='company_name1' onchange="get_balancesheet()">


									</select>
								</div>
							</div>
						</div>
						<div class="col-sm-12" id="div_bas"></div>
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
<script src="<?= base_url() ?>assets/js/folder_managmenet_ftp.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>

</body>
<script>
$(document).ready(function () {
	get_company_list();
            });
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
                                                $('#company_name1').html(data);
												$('#company_name_pl').html(data);
												$('#company_name_ra').html(data);
                                            } else {
                                                $('#company_name1').html(data);
												$('#company_name_pl').html(data);
												$('#company_name_ra').html(data);
                                            }
                                        },
                                    });
                                }
                                function get_ledger_list() {
                                    var company_name = $("#company_name").val();
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
								function get_balancesheet() {
                                    var company_name = $("#company_name1").val();
                                     $.ajax({
                                        type: "POST",
                                        url: "<?= base_url("ExportController/get_balancesheet") ?>",
                                        dataType: "json",
                                        async: false,
                                        cache: false,
                                        data: {company_name},
                                        success: function (result) {
                                            var data = result.data;
                                            console.log(data);
                                            $('#div_bas').html(data);

                                        },
                                    });
                                }
								
								function get_profitAndLoss() {
                                    var company_name = $("#company_name_pl").val();
                                    $.ajax({
                                        type: "POST",
                                        url: "<?= base_url("ExportController/get_profitloss") ?>",
                                        dataType: "json",
                                        async: false,
                                        cache: false,
                                        data: {company_name},
                                        success: function (result) {
                                            var data = result.data;
                                            console.log(data);
                                            $('#div_pl').html(data);

                                        },
                                    });
                                }
								
								function get_ratioAnalysis()
								{
									var company_name = $("#company_name_ra").val();
                                    $.ajax({
                                        type: "POST",
                                        url: "<?= base_url("ExportController/get_ratioan") ?>",
                                        dataType: "json",
                                        async: false,
                                        cache: false,
                                        data: {company_name},
                                        success: function (result) {
                                            var data = result.data;
                                            console.log(data);
                                            $('#div_ra').html(data);

                                        },
                                    });
								}

</script>
</html>