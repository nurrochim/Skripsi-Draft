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
    
    // Priority
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
    
    // Modul
    $scope.optionsModul = [
        { name : 'All Modules', value : 'All Modules' },
        { name : 'BackEnd Tools', value : 'BackEnd Tools' },
        { name : 'Batch Process', value : 'Batch Process' },
        { name : 'CDB', value : 'CDB' },
        { name : 'Collection', value : 'Collection' },
        { name : 'Facility', value : 'Facility' },
        { name : 'Fixed Asset', value : 'Fixed Asset' },
        { name : 'Funding', value : 'Funding' },
        { name : 'General Setting', value : 'General Setting' },
        { name : 'General Ledger', value : 'General Ledger' },
        { name : 'Insurance', value : 'Insurance' },
        { name : 'Life Insurance Receive', value : 'Life Insurance Receive' },
        { name : 'Internal Payment', value : 'Internal Payment' },
        { name : 'Payment', value : 'Payment' },
        { name : 'CBCS', value : 'CBCS' },
        { name : 'Procurement', value : 'Procurement' },
        { name : 'Report', value : 'Report' },
        { name : 'General Issue', value : 'General Issue' },
        { name : 'Other', value : 'Other' },
        { name : 'Data', value : 'Data' }
    ];
    $scope.selectedOptionModule = $scope.optionsModul[0].value;
    
    // Sub Modul
    $scope.optionsSubModul = [
        { name : 'Update Additional Info', value : 'Update Additional Info' },
        { name : 'Insurance Payment', value : 'Insurance Payment' },
        { name : 'New Report', value : 'New Report' },
        { name : 'Cash Overbook', value : 'Cash Overbook' },
        { name : 'Insurance Payment', value : 'Insurance Payment' },
        { name : 'Payment', value : 'Payment' },
        { name : 'Facility Register', value : 'Facility Register' },
        { name : 'Inquiry', value : 'Inquiry' },
        { name : 'Cash / Transfer', value : 'Cash / Transfer' },
        { name : 'Facility Register', value : 'Facility Register' },
        { name : 'Request Disbursement', value : 'Request Disbursement' },
        { name : 'Virtual Payment', value : 'Virtual Payment' },
        { name : 'Request Disbursement', value : 'Request Disbursement' },
        { name : 'Finance Report', value : 'Finance Report' },
        { name : 'Payment', value : 'Payment' },
        { name : 'CDB', value : 'CDB' },
        { name : 'Cash / Transfer', value : 'Cash / Transfer' },
        { name : 'Other', value : 'Other' }
    ];
    $scope.selectedOptionSubModule = $scope.optionsSubModul[0].value;
    
    // PIC
    $scope.optionsPIC = [
    { name : 'Faisal Amir', value : 'Faisal Amir' },
    { name : 'Nurochim', value : 'Nurochim' },
    { name : 'Asvian', value : 'Asvian' },
    { name : 'Jumadi', value : 'Jumadi' },
    { name : 'Julda', value : 'Julda' },
    { name : 'Deny Ginanjar', value : 'Deny' },
    { name : 'Fatma Lifaraidlika', value : 'Fatma' },
    { name : 'Candra Yudhatama', value : 'Candra' },
    { name : 'Aulia Siahaan', value : 'Aulia' },
    { name : 'Iskandar', value : 'Iskandar' }

    ];
    $scope.selectedOptionPIC = $scope.optionsPIC[0].value;
    
    
    
    
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