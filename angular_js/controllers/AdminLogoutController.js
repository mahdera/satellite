'use strict';

adminDashboardApp.controller('AdminLogoutController', function AdminLogoutController($scope, $http){
    $scope.logout = function(){
	$http({
        method  : 'POST',
        url     : 'logout.php',        
        //data : serializeData($scope.formData),
        headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
        })
        .success(function(data) {            
            window.location.href = "index.php";
        });
    };
});