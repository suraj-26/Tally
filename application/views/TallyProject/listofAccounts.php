
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
		Cash / Funds Flow
	</h5>
</div>

<div class="" style="">
	<div class="row">

			<div class="col-md-4">
				<label for="group-name" >Company Name</label>
				<select id='company_name1' class="form-control" name='company_name1' >
				</select>
			</div>
			<div class="col-md-4 m-4">
				<button type="button" class="btn btn-primary" onclick="get_report()">View</button>
			</div>

	</div>
	<div class="col-sm-12" id="div_bas" align="center" width="100%"></div>
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
					$('#company_name1').html(data);
					$('#company_name1').select2();

				} else {
					$('#company_name1').html(data);
					$('#company_name1').select2();

				}
			},
		});
	}


	function get_report() {
		var company_name = $("#company_name1").val();
		var fromDate = $("#fromDate").val();
		var toDate = $("#toDate").val();
		var reportName = $("#reportName").val();
		if(company_name == "" || fromDate== "" || toDate=="" || reportName==""){
			alert("Company Name,From Date and To Date are Mandatory!!");
		}else{
			$.ajax({
				type: "POST",
				url: "<?= base_url("ExportController/getListOFAccounts") ?>",
				dataType: "json",
				async: false,
				cache: false,
				data: {company_name,fromDate,toDate,reportName},
				success: function (result) {
					var data = result.data;
					console.log(data);
					$('#div_bas').html(data);

				},
			});
		}


	}


</script>
