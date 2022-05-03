
    <style>
        #btn_div {
            outline: none;
            background-color: #286090;
            text-align: center;
            color: white;
        }
		
    </style>
    <body>



<div class="" style="display: flex;
    flex-direction: column;
    flex: 1;
	background-color:#ffffff;
	">

<div class="col-md-12"><br>
        <h3>Create Journal Entry </h3>
        <hr>

        <form class="form-horizontal" id="add_led_formsale"method="post" action="">
		<input type="hidden" id="file_id" name="file_id" value="<?php $file_id ?>">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-sm-6">
                        <label for="group-name" class=" control-label">Company Name</label>
                        <select id='Jcompany_name' class="form-control" name='Jcompany_name' onchange="get_ledger_list('party_ledger');get_ledger_list1()">
                            <option>Select Value</option>
                        </select>
                    </div>

                    <div class="col-sm-6">
                        <label for="group-name" class=" control-label">Date</label>
                        <input type="text" class="form-control" id="Jdate" placeholder="Date (YYYYMMDD)" name="Jdate" >
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                  
                    <div class="col-sm-6">
                        <label for="group-name" class=" control-label">Narration</label>
                        <input type="text" class="form-control" id="Jnarration" placeholder="Narration" name="Jnarration" >
                    </div>
                </div>
            </div>
			
            <hr>

            <div class="row">
                <div class="col-md-12">
                    <div class="col-sm-6">
                        <h4>Item Entries</h4>
                    </div>
                </div>
            </div>
            <div id="common_div">
                
                <div class="row">
                    <div class="col-md-12">
                        
                    </div>
                </div>
                <div id="item_div0" class="row">
                    <input type="hidden" id="Jdiv_count" name="Jdiv_count"value="0">
                    <div class="col-md-12">
					<div class="col-sm-2">
					 <br>
					<input type="radio" checked id="credit0" name="Jvctype0" value="cr">
                       <label for="vehicle1">Credit</label>
					   <input type="radio" id="debit0" name="Jvctype0" value="dr">
						<label for="vehicle2">Debit</label>
					</div>
                        <div class="col-sm-4">
                            <label for="group-name" class=" control-label">Ledger</label>
                            <select id='jledger0' class="form-control" name='jledger0' >
                                <option>Select Value</option>
                            </select>
                        </div>
                        <div class="col-sm-5">
                            <label for="group-name" class=" control-label">Amount</label>
                            <input type="text" class="form-control" id="JVamt0" placeholder="Amount" name="JVamt0" >
							
                        </div>
						
						<div class="col-sm-1">
                            <label for="group-name" class=" control-label">  </label>
                            <button type="button" class="btn btn-link" onclick="remove_div(0)" style=""><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                </div>
                <div id="Jdynamic_div0"></div>
                <div class="col-sm-12"><br>
				<input type="hidden" id="tax_inp" name="tax_inp" value="1">
                    <button type="button" class="btn btn-link" style="outline: none;"onclick="repeat_div(0)">Add Items<i class="fa fa-plus" ></i></button>
                </div>
                
		<div class="row"><br>
                <div class="col-sm-12 "  >
                    <div class="col-sm-4 "  ></div>
                    <div class="col-sm-4 " align="center" >
                        <button type="button" id="btn_div" class="btn btn-link " style="color: white;width:100%;background-color:grey" onclick="add_journal()">Add Voucher</button></div>
                    <div class="col-sm-4 "  ></div>
                </div>
            </div>
        </form>
</div>
</div>
<div class="col-md-12"><br><br><br>
<div class="row">
<div class="col-md-12">
  <h3>View Journal Entry </h3>
        <hr>
<select id="month11" name="month11"  class="form-control" Onchange="get_journal_entry_data()">
<option value="0">select month</option>
</select>
</div>
<div class="col-md-12" id="jdata" style="overflow: scroll;height:700px">
  
</select>
</div>
</div>
</div>
</div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

    
<script>
                            $(document).ready(function () {
								
                                get_company_list();
								get_mon();
								
                            });
							

							function get_mon(){
								const monthNames = ["January", "February", "March", "April", "May", "June",
  "July", "August", "September", "October", "November", "December"
];		
							var num=01;
							var a='<option value="0">select month</option>';
							for(var i=0;i<=11;i++){
								 a += "<option value='"+num+"'>"+monthNames[i]+"</option>";
								 num++;
							}
							
							$("#month11").html(a);
							
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
                                            $('#Jcompany_name').html(data);
                                        } else {
                                            $('#Jcompany_name').html(data);
                                        }
                                    },
                                });
                            } 
							function get_journal_entry_data() {
								
								var mon=$("#month11").val();
								var company_name=$("#Jcompany_name").val();
								if(company_name == ""){
									alert('please select company name');
									var mon=$("#month11").val("0");
									return;
								}else{
									 $.ajax({
                                    type: "POST",
                                    url: "<?= base_url("ExportController/exportgeneral") ?>",
                                    dataType: "json",
                                    async: false,
                                    cache: false,
									data:{mon,company_name},
                                    success: function (result) {
                                        var data = result.data;
                                        console.log(data);
                                        if (result.status === 'true') {
                                            $('#jdata').html(data);
                                        } else {
                                            $('#jdata').html(data);
                                        }
                                    },
                                });
								}
                               
                            }
							function add_journal(){
								//add_sale_purchase_data
								$.ajax({
                                    type: "POST",
                                    // url: "<?= base_url("ImportController/add_sale_purchase_data") ?>",
                                    url: "<?= base_url("ImportController/add_journal") ?>",  
                                    dataType: "json",
                                    async: false,
                                    cache: false,
									data: $("#add_led_formsale").serialize(),
                                    success: function (result) {
                                        var data = result.company_list;
                                        console.log(data);
                                        if (result.status == 200) {
                                            alert('Voucher Added Successfully');
                                            tallyTransaction();
										//	location.reload();
                                        } else {
                                            alert('Something went wrong');
											//location.reload();
                                        }
                                    },
                                });
							}


							function tallyTransaction() {
								var company_name = $("#Jcompany_name").val();
								$.ajax({
									type: "POST",
									url: "<?= base_url("ImportController/tallyTransaction") ?>",
									dataType: "json",
									data: $("#add_led_formsale").serialize()+'&formName=1',
									success: function (result) {
										if (result.status == 200){
											console.log('Added');
										}else{
											console.log("something went wrong.");
										}
									},
								});
							}
                            function get_ledger_list(id) {
								
                                var company_name = $("#Jcompany_name").val();
                                $.ajax({
                                    type: "POST",
                                    url: "<?= base_url("ImportController/get_ledgers") ?>",
                                    dataType: "json",
                                    async: false,
                                    cache: false,
                                    data: {company_name},
                                    success: function (result) {
                                        var data = result.ledger_list;

                                        if (result.status === 'true') {
                                            $('#' + id).html(data);

                                        } else {
                                            $('#' + id).html(data);

                                        }

                                    },
                                });
                            }
                            function get_ledger_list1() {
                                var company_name = $("#Jcompany_name").val();
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
                                            $('#jledger0').html(data);
                                        } else {
                                            $('#jledger0').html(data);
                                        }

                                    },
                                });
                            }
							
							function remove_div(id){
								$( "#item_div"+id ).remove();
							}
                            function repeat_div(id) {
								
                                let div_count = $('#Jdiv_count').val();
                                div_count = (div_count) * 1 + 1;
                                var task_data1 = '<div id="item_div' + div_count + '" class="row">' +
                                        '<div class="col-md-12">' +
                                        '<div class="col-sm-2"> <br>' +
                                        ' <input type="radio" checked id="credit'+div_count+'" name="Jvctype'+div_count+'" value="cr"> <label for="vehicle1">Credit</label>' +
                                        ' <input type="radio" id="debit'+div_count+'" name="Jvctype'+div_count+'" value="dr"><label for="vehicle2">Debit</label>' +
                                        '</div>' +
                                        '<div class="col-sm-4">' +
                                        '<label for="group-name" class=" control-label">Ledger</label>' +
                                        '<select id="jledger'+div_count+'" class="form-control" name="jledger'+div_count+'" ><option>Select Value</option> </select>' +
                                        '</div>' +
                                        '<div class="col-sm-5">' +
                                        ' <label for="group-name" class=" control-label">Amount</label>' +
                                        '<input type="text" class="form-control" id="JVamt'+div_count+'" placeholder="Amount" name="JVamt'+div_count+'" >' +
                                        '</div>' +
										'<div class="col-sm-1">'+
                            '<label for="group-name" class=" control-label">  </label>'+
                            '<button type="button" class="btn btn-link" onclick="remove_div('+div_count+')" style=""><i class="fa fa-times"></i></button>'+
                        '</div>'+
                                        '</div>' +
                                        '</div>';
                                $('#Jdynamic_div' + id).append(task_data1);
								get_ledger_list("jledger"+div_count);	
                                $('#Jdiv_count').val(div_count);
                            }

                           

</script>
