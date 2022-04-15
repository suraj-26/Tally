
    <style>
        #btn_div {
            outline: none;
            background-color: #286090;
            text-align: center;
            color: white;
        }
		
    </style>


             <div class="card-title">
                            <h5 class="card-header">
                                 Profit & Loss View
                            </h5>
                        </div>
                        
						<div class="" style="padding:8px;background-color:#ffffff;">
						<div class="row">
						<div class="col-sm-12" id="div_bas" align="center" width="100%"></div>
						</div>
						<div class="row">
							<div class="col-sm-12">
							<div class="form-group">
								<div class="col-sm-4">
								<label for="group-name" >Company Name</label>
									<select id='company_name_pl' class="form-control" name='company_name_pl' onchange="get_profitAndLoss()">


									</select>
								</div>
							</div>
						</div>
						<div class="col-sm-12" id="div_pl" align="center" width="100%"></div>
						</div>
					</div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

    
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
                                                $('#company_name_pl').html(data);
                                                $('#company_name_pl').select2();

                                            } else {
                                                $('#company_name_pl').html(data);
                                                $('#company_name_pl').select2();

                                            }
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
                           

</script>
