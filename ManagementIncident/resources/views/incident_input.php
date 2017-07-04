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
            <a class="menucurrent" href="incidentInput">Incident List</a>
            <a href="orderlist">Monitoring Incident</a>
        </div>
        <div class="row content">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-8 text-left"> 
                <h1 style="border-bottom:#e8491d 3px solid;margin-bottom: 30px;text-align: center;">User List</h1>
                <div  ng-controller="incidentController">


                    <!-- Table-to-load-the-data Part -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Raise Date</th>
                                <th>Priority</th>
                                <th>Issue Descriptiont</th>

                                <th><button id="btn-add" class="btn btn-primary btn-xs" ng-click="toggle('add', 0)">Add New Incident</button></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="incident in incidents">
                                <td>{{ incident.id}}</td>
                                <td>{{ incident.raise_date}}</td>
                                <td>{{ incident.priority}}</td>
                                <td>{{ incident.issue_description}}</td>
                                <td>
                                    <button class="btn btn-default btn-xs btn-detail" ng-click="toggle('edit', incident.id)">Edit</button>

                                    <button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(incident.id)">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- End of Table-to-load-the-data Part -->
                    <!-- Modal (Pop up when detail button clicked) -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">{{form_title}}</h4>
                                </div>
                                <div class="modal-body">
                                    <form name="frmIncident" class="form-horizontal" novalidate="">
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Raise Date</label>
                                            <div class="col-sm-5">
<!--                                                <input type="text" class="form-control has-error" id="raisedates" name="raisedates" placeholder="Raise Date" value="{{raise_date}}" 
                                                       ng-model="incident.raise_date" ng-required="true">
                                                <span class="help-inline" 
                                                      ng-show="frmIncident.raisedates.$invalid && frmIncident.raisedates.$touched">Raise Date field is required</span>-->
                                                <div class='input-group date' id="raisedatePicker" name="raisedatePicker" ng-model="incident.raise_date" date-picker>
                                                    <input id="raisedateInput" name="raisedateInput"  type='text' class="form-control netto-input" value="{{raise_date}}" 
                                                           ng-model="incident.raise_date" date-picker-input>
                                                    <span class="input-group-addon">
                                                        <span class="glyphicon glyphicon-calendar"></span>
                                                    </span>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Priority</label>
                                            <div class="col-sm-8">
<!--                                                <input type="text" class="form-control has-error" id="priority" name="priority" placeholder="Priority" value="{{priority}}" 
                                                       ng-model="incident.priority" ng-required="true">
                                                <span class="help-inline" 
                                                      ng-show="frmIncident.priority.$invalid && frmIncident.priority.$touched">Priority field is required</span>-->
                                                <select class="form-control" id="sel1" 
                                                        ng-model="incident.priority"
                                                        ng-options="option.value as option.name for option in options">
                                                    <option>Critical</option>
                                                    <option>High</option>
                                                    <option>Medium</option>
                                                    <option>Low</option>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Issue Descriptions</label>
                                            <div class="col-sm-8">
                                                <textarea type="text" class="form-control has-error" rows="5" id="issuedesc" name="issuedesc" placeholder="Issue descriptions" value="{{issue_description}}" 
                                                          ng-model="incident.issue_description" ng-required="true"></textarea>
                                                <span class="help-inline" 
                                                      ng-show="frmIncident.issuedesc.$invalid && frmIncident.issuedesc.$touched">Issue Description field is required</span>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, id)" ng-disabled="frmIncident.$invalid">Save changes</button>
                                </div>
                            </div>
                        </div>
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