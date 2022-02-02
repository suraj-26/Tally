
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
                                Create Group
                            </h5>
                        </div>
                        
						<div class="" style="padding:8px;background-color:#ffffff;">
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
                                                $('#company_namegrp').html(data);
                                                
                                            } else {
                                                $('#company_namegrp').html(data);
                                                
                                            }
                                        },
                                    });
                                }

							function get_ledger_list() {
                                    var company_name = $("#company_namegrp").val();
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
                                                $('#parent_id').html(data);
                                            } else {
                                                $('#parent_id').html(data);
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
                           

</script>