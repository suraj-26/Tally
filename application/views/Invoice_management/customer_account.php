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
<link href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
		integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
		crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
		integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
		crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
		integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
		crossorigin="anonymous"></script>


<style>
	.app_header_display1 {
		padding-top: 15%

	}

	.app-sidebar__inner {
		margin-top: 10%;
	}

	.app-sidebar sidebar-shadow {
		padding-top: 6%
	}

	.f-top-nav {
		margin-top: 2%;
	}

	#sidebarRightMenu {
		height: 100vh;
	}

	.form-control {
		font-size: 12px;
	}
</style>


<input type="hidden" name="firm_id" id="firm_id" value="<?= $this->session->user_session->firm_id ?>"/>
<input type="hidden" name="userEmail" id="userEmail" value="<?= $this->session->user_session->email ?>"/>
<input type="hidden" name="locationOfFolder" id="locationOfFolder"/>
<input type="hidden" name="currentLocation" id="currentLocation"/>


<div class="f-container">
	<div class="f-row">

		<div class="f-top-nav">

			<div class="card-title">
				<h5 class="card-header" style="background: white;">
					Customer Invoice Management
				</h5>
			</div>
			<div class="f-row" style="padding-left:20px;     background: white;">
				<div class="f-col-6" style="flex:0.4;height: calc(100vh - 45px)">
					<div class="navbars-header f-align-items-center f-shadow">
						<div class="col-sm-4">
							<select name="year" id="year" class="form-control" onchange="get_data()" style="">
								<option value="">Select Year</option>
								<option value="2020-2021">2020-2021</option>
								<option value="2021-2022">2021-2022</option>
								<option value="2022-2023">2022-2023</option>
								<option value="2023-2024">2023-2024</option>
								<option value="2024-2025">2024-2025</option>
							</select>

						</div>
						<div class="col-sm-4">
							<select id="customer_new" name="customer_new" class="form-control"
									onchange="get_customer_data()">
								<option>Select Customer</option>
							</select>
						</div>
						<div class="col-sm-4">
							<button class="btn btn-outline-dark btn-sm " type="button" id="createMenuButton"
									onclick="open_mdl()"
							>
								<i class="fa fa-plus mx-1"></i>
							</button>

							<!--<button class="btn btn-outline-dark btn-sm " onclick="go_tally()">
									  <i class="fa fa-forward mx-1"></i>Financial management
								  </button>-->

						</div>
					</div>
					<div class="navbars-header f-align-items-center border-bottom border-dark">
						<div class="col-sm-4">
							Name
						</div>

						<div class="col-sm-4 text-right">
							Action
						</div>
					</div>
					<div class="navbar-container" id="list_viewFiles1" style="height: calc(100vh - 185px);">

					</div>
				</div>
				<div class="f-col f-col-6" style="flex:1">


					<div class="navbar-container w-100 d-none" style="height: 100%;" id="documentViewerBody">

						<center>
							<div id="ac_rj_div">
								<button class="btn  btn-success " style="margin:2%;" onclick="action('1')">Accept
								</button>
								<button class="btn btn-danger " style="margin:2%;" onclick="action('2')">Reject</button>
							</div>
						</center>
						<input type="hidden" name="file_input" id="file_input">
						<div class="d-flex">
							<input type="hidden" id="documentViewerPath">
							<input type="hidden" id="documentViewerName">
							<div class="card-body">
								<div id="documentViewerSection" style="height:70vh;">
								</div>
							</div>
						</div>
					</div>

				</div>

			</div>
		</div>

		<!--Create Account Modal-->

		<div class="modal fade" id="fileCreateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
			 aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="staticBackdropLabel">Create Customer Account</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="customer_form" name="customer_form">
							<div class="form-group mx-3 mt-2">
								<label>Customer Name:</label>
								<select id="customer_id" name="customer_id" class="form-control">
									<option>Select Customer</option>
								</select>
							</div>
							<div class="form-group mr-3 ml-3">
								<!--<input type="text" id='account_number' class="form-control" name="account_number"readonly> -->
							</div>
							<div class="float-right  form-group ml-3 mr-3">
								<button type="button" data-dismiss="modal" class="btn btn-dark btn-sm">close</button>
								<button type="submit" class="btn btn-dark btn-sm">save</button>
							</div>
						</form>
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

		<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>

		<script>


			$(document).ready(function () {

				get_customers_invoice();
				get_customers().then(function (customer_data) {
					$('#customer_id').empty();
					$('#customer_id').append(customer_data);
				}).catch(function (e) {
					console.log(e);
					//                    reject(null);
				});
			});

			function open_mdl() {

				$("#fileCreateModal").modal('show');
				$(".modal-backdrop").hide();

			}

			function go_jv(id) {

				window.location.href = "<?= base_url("ImportController/journal_entry") ?>?id=" + id;
			}

			function go_sp(id) {

				window.location.href = "<?= base_url("ImportController/sale_purchase") ?>?id=" + id;
			}

			function go_rec(id) {

				window.location.href = "<?= base_url("ImportController/receipt_voucher") ?>?id=" + id;
			}

			function go_tally() {
				window.location.href = "<?= base_url("ImportController/main_page"); ?>";
			}

			function view_tallyData() {
				window.location.href = "<?= base_url("View_tallyData"); ?>";
			}

			function get_customers() {
				var promise = new Promise(function (resolve, reject) {
					$.ajax({
						type: "POST",
						url: "<?= base_url("ImportController/get_companies") ?>",
						dataType: "json",
						success: function (result) {
							var customer_Data = result.company_list;
							//                $('#customer_id').empty();
							if (result['message'] === 'success') {

								resolve(customer_Data);
							} else {
								resolve(customer_Data);
							}
						}, error: function (error) {
							toastr.info('Something went wrong please try again');
						}
					});
				});
				return promise;
			}

			function get_customers_invoice() {
				$.ajax({
					type: "POST",
					url: "<?= base_url("InvoiceController/get_customers_invoice") ?>",
					dataType: "json",
					success: function (result) {
						var customer_Data = result.option;
						//                $('#customer_id').empty();
						if (result['status'] === 200) {
							$("#customer_new").html(customer_Data);
						} else {
							$("#customer_new").html(customer_Data);
						}
					}, error: function (error) {
						toastr.info('Something went wrong please try again');
					}
				});
			}

			function get_data() {
				$("#customer_new").val("");
			}

			function get_customer_data() {
				var year = $("#year").val();
				if (year == "") {
					alert('Please select year.');
					$("#customer_new").val("");
				} else {
					var cust_id = $("#customer_new").val();
					get_customersFiles(cust_id, year);
				}
			}

			function get_customersFiles(cust_id, year) {
				$.ajax({
					type: "POST",
					url: "<?= base_url("InvoiceController/view_customerFiles") ?>",
					dataType: "json",
					data: {cust_id, year},
					success: function (result) {
						if (result['status'] === 200) {
							$("#list_viewFiles1").html(result.data);//list_viewFiles
						} else {
							$("#list_viewFiles1").html(result.data);//list_viewFiles
						}
					}, error: function (error) {
						toastr.info('Something went wrong please try again');
					}
				});
			}

			function Generate_account_number() {
				var cust_id = $("#customer_id").val();
				$.ajax({
					type: "POST",
					url: "<?= base_url("InvoiceController/createAccountNumber") ?>",
					dataType: "json",
					data: {cust_id},
					success: function (result) {
						$("#account_number").val(result.account_number);

					}, error: function (error) {
						toastr.info('Something went wrong please try again');
					}
				});
			}

			function action(id) {
				var file = $("#file_input").val();
				$.ajax({
					type: "POST",
					url: "<?= base_url("InvoiceController/action_file") ?>",
					dataType: "json",
					data: {id, file},
					success: function (result) {
						if (result.status == 200) {
							toastr.success('Succefully done');
							check_file_accept_reject(file);
						} else {
							toastr.success('Fail.please try again');
							check_file_accept_reject(file);
						}
					}, error: function (error) {
						toastr.info('Something went wrong please try again');
					}
				});
			}

			function check_file_accept_reject(id) {
				var file = $("#file_input").val();

				$.ajax({
					type: "POST",
					url: "<?= base_url("InvoiceController/check_file_accept_reject") ?>",
					dataType: "json",
					data: {id, file},
					success: function (result) {
						if (result.status == 200) {
							var data = result.data;
							if (data == 1) {
								$("#ac_rj_div").html("");
								$("#ac_rj_div").html("<br><span style='color:#309450'><b>Accepted</b><span>");

							} else if (data == 2) {
								$("#ac_rj_div").html("");
								$("#ac_rj_div").html("<br><span style='color:#c43625'><b>Rejected</b><span>");
							} else {
								$("#ac_rj_div").html("");
								$("#ac_rj_div").html('<button class="btn  btn-success " style="margin:2%;" onclick="action(' + 1 + ')">Accept</button><button class="btn btn-danger " style="margin:2%;" onclick="action(' + 2 + ')">Reject</button>');
							}
						} else {
							toastr.success('Fail.please try again');
						}
					}, error: function (error) {
						toastr.info('Something went wrong please try again');
					}
				});
			}

			$("#customer_form").validate({
				rules: {
					customer_id: {
						required: true
					},
					account_number: {
						required: true
					},

				},

				errorElement: "span",
				submitHandler: function (form) {
					$.ajax({
						url: '<?= base_url("InvoiceController/SaveCustomer") ?>',
						type: "POST",
						data: $("#customer_form").serialize(),
						success: function (success) {
							success = JSON.parse(success);
							if (success.status == 200) {
								toastr.success(success.body);
								//window.location.href = "<?= base_url("show_enquiry"); ?>";

							} else {
								toastr.error(success.body);  //toster.error
							}
						},
						error: function (error) {
							console.log(error);
							toastr.error("something went to wrong");
						}
					});
				}
			});


		</script>
		<script>
			function openDocumentViewer(basePath, name) {
				check_file_accept_reject(basePath);
				var str = name;
				$("#file_input").val(basePath);
				//let icon = getFileIcon(nameArray[nameArray.length - 1]);

				let path = basePath;
				var file = '';
				if (str.match(/.xls/g) !== null || str.match(/.XLSX/g) !== null ||
						str.match(/.docx/g) !== null || str.match(/.pptx/g) !== null ||
						str.match(/.csv/g) !== null || str.match(/.CSV/g) !== null ||
						str.match(/.PPTX/g) !== null || str.match(/.ppt/g) !== null || str.match(/.PPT/g) !== null) {
					file = `<iframe id="documentViewerPage" src='https://view.officeapps.live.com/op/embed.aspx?src=${path}' width='100%' height='100%' frameborder='0'> </iframe>`;
				} else if (str.match(/.png/g) != '' || str.match(/.jpeg/g) != '' || str.match(/.jpg/g) != '' || str.match(/.pdf/g) != '') {
					file = `<iframe id="documentViewerPage" src="${path}"  width='100%' height='100%' frameborder='0'></iframe>`;
				} else {
					file = `<iframe id="documentViewerPage" src="${path}"  width='100%' height='100%' frameborder='0'></iframe>`;
				}
				$("#documentViewerSection").empty();
				$("#documentViewerSection").append(file);
				$("#documentViewerBody").removeClass('d-none');

			}
		</script>
