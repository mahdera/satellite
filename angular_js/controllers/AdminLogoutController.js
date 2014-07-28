'use strict';

var AdminLogoutController = adminDashboardApp.controller('AdminLogoutController', function AdminLogoutController($scope, $http){
	$http({
        method  : 'POST',
        url     : 'logout.php',        
        //data : serializeData($scope.formData),
        headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
    })
    .success(function(data) {
        /*if (!data.success) {
            $scope.message = "Invalid user credential! Try again.";
        } else {
            // if successful, bind success message to message
            //redirect the page to adminhome.php
            window.location.href = "admindashboard.php";
        }*/
    });
});