
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
		Day Book
	</h5>
</div>

<div class="" style="padding:8px;background-color:#ffffff;">
	<div class="row">
		<div class="col-md-12">

				<div class="">
					<label for="group-name" >Company Name</label>
					<select id='company_name1' class="form-control" name='company_name1' >
					</select>
				</div>
				<div class="">
					<label>From Date:</label>
					<input type="date" id="fromDate" name="fromDate" class="form-control">
				</div>
				<div class="">
					<label>To Date:</label>
					<input type="date" id="toDate" name="toDate" class="form-control">
				</div><br>
				<div class="">
					<button type="button" class="btn btn-primary" onclick="get_balancesheet()">View</button>

					<button type="button" id="DownloadPDF" class="btn btn-primary" style="display: none" onclick="DownloadPDF()">DownloadPDF</button>

				</div>
		</div>
		<div class="col-sm-12" id="div_bas" align="center" width="100%"></div>
	</div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->


<script>
	$(document).ready(function () {
		$("#DownloadPDF").hide();
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
					$('#company_name1').select2();

				} else {
					$('#company_name1').html(data);
					$('#company_name1').select2();

				}
			},
		});
	}


	function get_balancesheet() {
		$("#DownloadPDF").hide();
		var company_name = $("#company_name1").val();
		var fromDate = $("#fromDate").val();
		var toDate = $("#toDate").val();
		if(company_name == "" || fromDate== "" || toDate==""){
			alert("Company Name,From Date and To Date are Mandatory!!");
		}else{
			$.ajax({
				type: "POST",
				url: "<?= base_url("ExportController/get_DayBook") ?>",
				dataType: "json",
				async: false,
				cache: false,
				data: {company_name,fromDate,toDate},
				success: function (result) {
					var data = result.data;
					console.log(data);
					$('#div_bas').html(data);
					$("#DownloadPDF").show();

				},
			});
		}


	}
	function DownloadPDF() {
		//div_pl
		let divName="#div_bas";
		$('#DownloadPDF').toggleClass('d-none');
		var printContents = document.querySelector(divName).innerHTML;
		var originalContents = document.body.innerHTML;
		document.body.innerHTML = printContents;
		window.print();
		document.body.innerHTML = originalContents;
		$('#DownloadPDF').toggleClass('d-none');
	}

</script>
