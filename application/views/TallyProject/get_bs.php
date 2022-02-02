<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Tally</title>

        <!-- Bootstrap -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>


        <div class="container">

            <div class="col-md-6 col-md-offset-3" style="margin-top:20px">

                <h3>Export Balance Sheet</h3>
                <hr>

                <form class="form-horizontal" id="add_led_form"method="post" action="">
                    <div class="form-group">
                        <label for="group-name" class="col-sm-4 control-label">Company Name</label>
                        <div class="col-sm-6">
                            <select id='company_name' class="form-control" name='company_name' onchange="get_balancesheet()">


                            </select>
                        </div>
                    </div>




                </form>

            </div>
            <div id="div_bs"></div>
        </div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

    </body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
                                                $('#company_name').html(data);
                                            } else {
                                                $('#company_name').html(data);
                                            }
                                        },
                                    });
                                }

                                function get_balancesheet() {
                                    var company_name = $("#company_name").val();
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
                                            $('#div_bs').html(data);

                                        },
                                    });
                                }
</script>