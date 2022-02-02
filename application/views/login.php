<!doctype html>
<html lang="en">
<!-- Mirrored from demo.dashboardpack.com/architectui-html-pro/pages-login-boxed.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 06 Jan 2020 10:17:28 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<!-- /Added by HTTrack -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Language" content="en">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link href="<?= base_url() ?>main.87c0748b313a1dda75f5.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
	<title>Sign in</title>
	<style>
		body {
			background-color: #f2e5e9;
			font-family: 'Ubuntu', sans-serif;
		}

		.main {
			background-color: #FFFFFF;
			width: 400px;
			height: 400px;
			margin: 7em auto;
			border-radius: 1.5em;
			box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);
		}

		.sign {
			padding-top: 40px;
			color: #891635;
			font-family: 'Ubuntu', sans-serif;
			font-weight: bold;
			font-size: 23px;
		}

		.un {
			width: 76%;
			color: rgb(38, 50, 56);
			font-weight: 700;
			font-size: 14px;
			letter-spacing: 1px;
			background: rgba(136, 126, 126, 0.04);
			padding: 10px 20px;
			border: none;
			border-radius: 20px;
			outline: none;
			box-sizing: border-box;
			border: 2px solid rgba(0, 0, 0, 0.02);
			margin-bottom: 50px;
			margin-left: 46px;
			text-align: center;
			margin-bottom: 27px;
			font-family: 'Ubuntu', sans-serif;
		}

		form.form1 {
			padding-top: 40px;
		}

		.pass {
			width: 76%;
			color: rgb(38, 50, 56);
			font-weight: 700;
			font-size: 14px;
			letter-spacing: 1px;
			background: rgba(136, 126, 126, 0.04);
			padding: 10px 20px;
			border: none;
			border-radius: 20px;
			outline: none;
			box-sizing: border-box;
			border: 2px solid rgba(0, 0, 0, 0.02);
			margin-bottom: 50px;
			margin-left: 46px;
			text-align: center;
			margin-bottom: 27px;
			font-family: 'Ubuntu', sans-serif;
		}


		.un:focus, .pass:focus {
			border: 2px solid rgba(0, 0, 0, 0.18) !important;

		}

		.submit {
			cursor: pointer;
			border-radius: 5em;
			color: #fff;
			background: linear-gradient(to right, #891635, #891635);
			border: 0;
			padding-left: 40px;
			padding-right: 40px;
			padding-bottom: 10px;
			padding-top: 10px;
			font-family: 'Ubuntu', sans-serif;
			margin-left: 35%;
			font-size: 13px;
			box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.04);
		}

		.forgot {
			text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
			color: #891635;
			padding-top: 15px;
		}

		a {
			text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
			color: #891635;
			text-decoration: none
		}
		.footer {
			position: fixed;
			text-align: center;
			bottom: 0px;
			width: 100%;
			margin: 0;
			padding: 0;
			left: 0;
			right: 0;
		}

		@media (max-width: 600px) {
			.main {
				border-radius: 1.5em;
				width:95%;
			}
			.sign
			{
				padding-top: 40px;
			}
			form.form1
			{
				padding-top: 30px;
			}
		}

	</style>
</head>
<body>
<div class="main">
	<p class="sign" align="center"><img id="logo_img" src="https://gbtech.in/wp-content/uploads/elementor/thumbs/GBT-Logo-pb6aaz3tk8zujck85gf83t01gtnv4kti5umsp0vgnc.png" width="80px" height="50px" alt="Gold Berries"></p>
	<form class="form1" id="login_form">
		<input type="hidden" name="index" id="index" value="1">
		<input class="un " type="text" align="center" name="username" id="exampleEmail" placeholder="Email">
		<input class="pass" type="password" align="center" name="password" id="examplePassword" placeholder="Password">
		<button class="submit" type="submit" align="center" style="color:white">Sign in</button>
		<p class="forgot" align="center"><a href="<?= base_url("recover_password") ?>">Forgot Password?</a></p>
	</form>

</div>
<div class="modal fade bd-example-modal-lg" id="view_branch" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">

	<div class="modal-dialog modal-l">
		<div class="modal-content">
			<div class="modal-header" id="service_action"> Sign in with Branch</div>
			<div class="modal-body">
				<form id="login_branch" name="login_branch" method="post">
					<input type="hidden" name="index" id="index" value="2">
					<input type="hidden" name="email_id" id="email_id" value="">
					<input type="hidden" name="emp_password" id="emp_password" value="">

					<div class="form-group">
						<div class="position-relative form-group">
							<label for="firm_id">Office Name</label>
							<select class="form-control-sm mb-2 form-control" id="firm_id" name="firm_id">

							</select>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>
<div class=" footer"> <div style="box-shadow: 3px 0px 3px #000000;padding: 4px;margin: 0px;">Copyright © DocanGo <?= date('Y') ?></div></div>

</body>
<script src="<?= base_url() ?>assets/scripts/jquery-2.1.3.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/scripts/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>

<script type="text/javascript" src="<?= base_url("assets/") ?>scripts/main.87c0748b313a1dda75f5.js"></script>
<link href="<?= base_url() ?>assets/scripts/toastr/toastr.css" rel="stylesheet" type="text/css"/>
<script src="<?= base_url() ?>assets/scripts/toastr/toastr.min.js" type="text/javascript"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script>

	$(document).ready(function () {


	});

	$('#view_branch').on('shown.bs.modal', function (e) {

		var email_id = $('#exampleEmail').val();
		var password = $('#examplePassword').val();
		$('#email_id').val(email_id);
		$('#emp_password').val(password);

	});

	console.log((typeof window.orientation !== "undefined") || (navigator.userAgent.indexOf('IEMobile') !== -1));
	$("#login_form").validate({
		rules: {
			username: {required: true},
			password: {required: true}
		},
		messages: {
			username: {required: "Enter Username"},
			password: {required: "Enter Password "}
		},
		errorElement: 'span',
		submitHandler: function (form) {

			$.ajax({
				url: '<?= base_url('user_data') ?>',
				type: "POST",
				data: new FormData(form),
				contentType: false,
				cache: false,
				processData: false,
				success: function (success) {
					success = JSON.parse(success);
					firm_data = success.firm_data;

					$('#firm_id').empty();
					if (success.status === true) {
						$('#view_branch').modal("toggle");
						$('#firm_id').append(firm_data);
					} else {
						login(1);

					}
				},
				error: function (error) {
					toastr.error(error.body);
					console.log(error);
				}
			});

		}
	});

	$("#firm_id").change(function () {
		var firm_id = $('#firm_id').val();
		if (firm_id != null) {
			firm_id = $('#firm_id').val();
			login(2);

		} else {
			firm_id = "0";
		}

	});

	function login(index) {
		var form_id = "";
		if (index == 1) {
			form_id = document.getElementById('login_form');
		} else {
			form_id = document.getElementById('login_branch');
		}

		$.ajax({
			url: '<?= base_url('login_validation') ?>',
			type: "POST",
			data: new FormData(form_id),
			contentType: false,
			cache: false,
			processData: false,
			success: function (success) {
				success = JSON.parse(success);
				if (success.status === 200) {
					$(location).attr('href', '<?= base_url("home") ?>');

				}else {
					toastr.error(success.body);//exampleEmail-error
				}
			},
			error: function (error) {
				toastr.error(error.body);
				console.log(error);
			}
		});
	}




</script>

</html>
