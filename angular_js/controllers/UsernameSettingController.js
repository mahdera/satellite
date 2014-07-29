'use strict';

adminDashboardApp.controller('UsernameSettingController', function UsernameSettingController($scope, $routeParams, $http){
    $scope.usernameSettingForm = {};
    
    angular.element(document).ready(function () {        
        $scope.usernameSettingForm.userId = $routeParams.uId;
    });//end document.ready function
    
    $scope.updateUsernameSetting = function(){
        //make sure if the forms have datavalue and submit it...
        if(!$scope.usernameSettingForm.currentUsername){
            $scope.message = "Enter you current username";            
            document.getElementById('currentUsername').focus();
        }else if(!$scope.usernameSettingForm.newUsername){
            $scope.message = 'Enter your new username!';       
            document.getElementById('newUsername').focus();
        }else if(!$scope.usernameSettingForm.currentEmail){
            $scope.message = "Enter your current email address!"            
            document.getElementById('currentEmail').focus();
        }else if(!$scope.usernameSettingForm.password){
            $scope.message = "Enter your password!";
            document.getElementById('password').focus();
        }else{            
            //and submit the form to be server side authentication...            
            //console.log($scope.formData);
            $http({
                method  : 'POST',
                url     : 'update_username_setting.php',
                data : serializeData($scope.usernameSettingForm),
                headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
            })
            .success(function(data) {
                if (!data.success) {
                    //$scope.message = "Error while updating user email address.";
                    document.getElementById('processStatusDiv').innerHTML = data.message;
                } else {                    
                    document.getElementById('processStatusDiv').innerHTML = data.message;
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
    
});//end controller