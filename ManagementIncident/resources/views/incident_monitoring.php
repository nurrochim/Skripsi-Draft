<!DOCTYPE html>
<html lang="en-US" ng-app="employeeRecords">
    <head>
        <title>E-Commerce Pizza</title>

        <!-- Load Bootstrap CSS -->
        <link href="css/style.css" rel="stylesheet">
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">

    </head>
    <body>
        <header>
            <div class="container">
                <div id="branding">
                    <img src="http://localhost:8000/storage/fujitsu_icon.png" style="width: 130px">
                </div>
                <div id="name">
                    Management Incident
                </div>
            </div>
        </header>
        <div class="menu">
            <a href="index.php">User List</a>
            <a href="incidentInput">Incident List</a>
            <a class="menucurrent" href="incidentMonitoring">Incident Monitoring</a>
        </div>
        <div class="row contentautomatic">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-10 text-left"> 
                <h1 style="border-bottom:#e8491d 3px solid;margin-bottom: 30px;text-align: center;">Incident Monitoring</h1>
                <div  ng-controller="incidentController">


                    <!-- Table-to-load-the-data Part -->
                    <ul class="block-grid-xs-1 panel panel-default">
                        <div class="product-image panel-body" >
                            <img src="http://localhost:8000/storage/graph1.png" >
                        </div>
                        
                    </ul>
                    <ul class="block-grid-xs-1 panel panel-default">
                        <div class="product-image panel-body" >
                            <img src="http://localhost:8000/storage/graph3.png" style="width: 900px">
                        </div>
                    </ul>
                    
                </div>
            </div>
        </div>
    </div>
    <footer class="container-fluid bg-4 text-center">
        <p>Nurochim (nurochim@ymail.com)</p>
        <p>Copyright © 2017</p>

    </footer>

    <!-- Load Javascript Libraries (AngularJS, JQuery, Bootstrap) -->
    <script src="https://code.angularjs.org/1.5.0/angular.js"></script>
<!--        <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>-->
    <!--<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>-->
    <!--<script src="js/bootstrap-datetimepicker.js"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="http://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>

    <!-- AngularJS Application Scripts -->
    <script src="app/app.js"></script>
    <script src="app/controllers/incidents.js"></script>
    <!--<script src="js/bootstrap-datepicker.js"></script>-->

<!--        <script type="text/javascript">
                                        $(document).ready(function() {
                                            $('#raisedate').datepicker({
                                                format: "dd/mm/yyyy"
                                            });
                                        });
</script>-->
</body>
</html>