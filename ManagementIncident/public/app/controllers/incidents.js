app.controller('incidentController', function($scope, $http, API_URL) {
    
    var incident = this;
    incident.raise_date = "2017-07-21T18:25:43-05:00";
    
    //retrieve employees listing from API
    $http.get(API_URL + "incidents")
            .success(function(response) {
                $scope.incidents = response;
            });
    
    //show modal form
    $scope.toggle = function(modalstate, id) {
        $scope.modalstate = modalstate;

        switch (modalstate) {
            case 'add':
                $scope.form_title = "Add New Incident";
                break;
            case 'edit':
                $scope.form_title = "Incident Detail";
                $scope.id = id;
                $http.get(API_URL + 'incidents/' + id)
                        .success(function(response) {
                            console.log(response);
                            $scope.incident = response;
                        });
                break;
            default:
                break;
        }
        console.log(id);
        $('#myModal').modal('show');
    }

    //save new record / update existing record
    $scope.save = function(modalstate, id) {
        var url = API_URL + "incidents";
        
        //append employee id to the URL if the form is in edit mode
        if (modalstate === 'edit'){
            url += "/" + id;
        }
        
        $http({
            method: 'POST',
            url: url,
            data: $.param($scope.incident),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function(response) {
            console.log(response);
            location.reload();
        }).error(function(response) {
            console.log(response);
            alert('This is embarassing. An error has occured. Please check the log for details');
        });
    }

    //delete record
    $scope.confirmDelete = function(id) {
        var isConfirmDelete = confirm('Are you sure you want this record?');
        if (isConfirmDelete) {
            $http({
                method: 'DELETE',
                url: API_URL + 'incidents/' + id
            }).
                    success(function(data) {
                        console.log(data);
                        location.reload();
                    }).
                    error(function(data) {
                        console.log(data);
                        alert('Unable to delete');
                    });
        } else {
            return false;
        }
    }
    
    $scope.options = [
        {
          name: 'Critical',
          value: 'Critical'
        }, 
        {
          name: 'High',
          value: 'High'
        }, 
        {
          name: 'Medium',
          value: 'Medium'
        }, 
        {
          name: 'Low',
          value: 'Low'
        }
    ];
    $scope.selectedOption = $scope.options[0].value;
    
//    $(function() {
//       $('#raisedate').datepicker({
//            format: "dd/mm/yyyy",
//            autoclose: true
//        }).on('changeDate', function(e) {
//            // Revalidate the date field
//            $scope.incident.raise_date = $("#raisedate").val();
//            alert("selected date is " + $scope.incident.raise_date);
//        });
//
//    });
});

// DatePicker -> NgModel
app.directive('datePicker', function () {
    return {
        require: 'ngModel',
        link: function (scope, element, attr, ngModel) {
            $(element).datetimepicker({
                
                format: 'YYYY-MM-DD',
                parseInputDate: function (data) {
                    if (data instanceof Date) {
                        return moment(data);
                    } else {
                        return moment(new Date(data));
                    }
                }
            });

            $(element).on("dp.change", function (e) {
                ngModel.$viewValue = e.date.toISOString().slice(0,10);;
                ngModel.$commitViewValue();
            });
        }
    };
});

// DatePicker Input NgModel->DatePicker
app.directive('datePickerInput', function() {
    return {
        require: 'ngModel',
        link: function (scope, element, attr, ngModel) {
            // Trigger the Input Change Event, so the Datepicker gets refreshed
            scope.$watch(attr.ngModel, function (value) {
                if (value) {
                    element.trigger("change");
                }
            });
        }
    };
});