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
            //console.log($scope.formData);
            $http({
                method  : 'POST',
                url     : 'validate_admin.php',
                data : serializeData($scope.formData),
                headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
            })
            .success(function(data) {
                if (!data.success) {
                    $scope.message = "Invalid user credential! Try again.";
                } else {
                    // if successful, bind success message to message
                    //redirect the page to adminhome.php
                    window.location.href = "admin_dash_board.php";
                }
            });
        }
    };
    
    function serializeData( data ) {
        // If this is not an object, defer to native stringification.
        if ( ! angular.isObject( data ) ) {

            return( ( data === null ) ? "" : data.toString() );

        }

        var buffer = [];

        // Serialize each key in the object.
        for ( var name in data ) {

            if ( ! data.hasOwnProperty( name ) ) {

                continue;

            }

            var value = data[ name ];

            buffer.push(
                encodeURIComponent( name ) +
                "=" +
                encodeURIComponent( ( value === null ) ? "" : value )
            );

        }

        // Serialize the buffer and clean it up for transportation.
        var source = buffer
            .join( "&" )
            .replace( /%20/g, "+" )
        ;

        return( source );

    }
    
});