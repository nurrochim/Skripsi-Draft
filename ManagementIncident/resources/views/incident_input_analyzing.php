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
            <a class="menucurrent" href="incidentAnalyzing">Incident Analyzing</a>
            <a href="incidentMonitoring">Monitoring Incident</a>
        </div>
        <div class="row contentautomatic">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-10 text-left"> 
                <h1 style="border-bottom:#e8491d 3px solid;margin-bottom: 30px;text-align: center;">Incident List Analyzing</h1>
                <div  ng-controller="incidentController">


                    <!-- Table-to-load-the-data Part -->
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Raise Date</th>
                                        <th>Priority & Modul</th>
                                        <th>Issue Analyzing</th>

                                        <th><button id="btn-add" class="btn btn-primary btn-xs">Action</button></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="incident in incidents">
                                        <td>{{ incident.id}}</td>
                                        <td style="width: 100px">{{ incident.raise_date}}</td>
                                        <td style="width: 200px">
                                                 <text class="fieldintable">Priority : </text>{{ incident.priority}} 
                                            </br><text class="fieldintable">Module : </text>{{ incident.module}}
                                                 </br><text class="fieldintable">Sub Module : </text>{{ incident.sub_module}}
                                            </br><text class="fieldintable">Category Group : </text>{{ incident.category_group}} 
                                            </br><text class="fieldintable">Root Cause : </text>{{ incident.category_root_cause}}
                                        </td>
                                        <td>
                                            <text class="fieldintableincident">Issue Descriptions : </text> </br>{{ incident.issue_description}} 
                                            </br><text class="fieldintableincident">Suspected Reason : </text></br>{{ incident.suspected_reason}}
                                            </br><text class="fieldintableincident">Respon Taken : </text></br>{{ incident.respon_taken}} 
                                            </br><text class="fieldintableincident">Decided solution : </text></br>{{ incident.decided_solution}}
                                        </td>
                                       
                                        <td>
                                            <button class="btn btn-default btn-xs btn-detail" ng-click="toggle('edit', incident.id)">Edit</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
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
                                            <label class="col-sm-4 control-label">Issue Descriptions</label>
                                            <div class="col-sm-8">
                                                <textarea type="text" class="form-control has-error" rows="3" id="issuedesc" name="issuedesc" placeholder="Issue descriptions" value="{{issue_description}}" 
                                                          ng-model="incident.issue_description" ng-required="true"
                                                          style="pointer-events: none"
                                                          ></textarea>
                                                <span class="help-inline" 
                                                      ng-show="frmIncident.issuedesc.$invalid && frmIncident.issuedesc.$touched">Issue Description field is required</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Category Group</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" id="categorySelect" 
                                                        ng-model="incident.category_group"
                                                        ng-options="option.value as option.name for option in optionsCategory">
                                                </select>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Category Root Cause</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" id="rootcauseSelect" 
                                                        ng-model="incident.category_root_cause"
                                                        ng-options="option.value as option.name for option in optionsRootCause">
                                                </select>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Suspected Reason</label>
                                            <div class="col-sm-8">
                                                <textarea type="text" class="form-control has-error" rows="3" id="issuedesc" name="issuedesc"  value="{{issue_description}}" 
                                                          ng-model="incident.suspected_reason" ng-required="true"
                                                          ></textarea>
                                                <span class="help-inline" 
                                                      ng-show="frmIncident.issuedesc.$invalid && frmIncident.issuedesc.$touched">Issue Description field is required</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Respon Taken</label>
                                            <div class="col-sm-8">
                                                <textarea type="text" class="form-control has-error" rows="3" id="issuedesc" name="issuedesc"  value="{{issue_description}}" 
                                                          ng-model="incident.respon_taken" ng-required="true"
                                                          ></textarea>
                                                <span class="help-inline" 
                                                      ng-show="frmIncident.issuedesc.$invalid && frmIncident.issuedesc.$touched">Issue Description field is required</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Solution</label>
                                            <div class="col-sm-8">
                                                <textarea type="text" class="form-control has-error" rows="3" id="issuedesc" name="issuedesc" value="{{issue_description}}" 
                                                          ng-model="incident.decided_solution" ng-required="true"
                                                          ></textarea>
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
        <script src="app/controllers/incidentsAnalyzing.js"></script>
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