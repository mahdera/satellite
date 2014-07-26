'use strict';

adminLoginApp.controller('AdminLoginController', function AdminLoginController($scope, $http){    
    
    $scope.validateForm = function() {   
        $scope.message = "";                     
            
        if(!$scope.formData.username){
            $scope.message = 'Enter your username!';
            document.getElementById('username').focus();
        }else if(!$scope.formData.email){
            $scope.message = 'Enter your email address!';
            document.getElementById('email').focus();
        }else if(!$scope.formData.password){
            $scope.message = "Enter your password!"
            document.getElementById('password').focus();
        }else{            
            //and submit the form to be server side authentication...            
            console.log($scope.formData);
            $http({
                method  : 'POST',
                url     : 'process.php',
                data    : $.param($scope.formData),  // pass in data as strings
                headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
            })
            .success(function(data) {
                if (!data.success) {
                    // if not successful, bind errors to error variables
                    $scope.errorName = data.errors.name;
                    $scope.errorSuperhero = data.errors.superheroAlias;
                } else {
                    // if successful, bind success message to message
                    //redirect the page to adminhome.php
                    window.location.href = "adminhome.php";
                }
            });
        }
    };
    
    //now define a function that deals with form submission...mahder
});