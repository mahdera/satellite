'use strict';

adminDashboardApp.controller('PasswordSettingController', function($scope, $routeParams, $http){
    $scope.passwordSettingForm = {};
    
    angular.element(document).ready(function () {        
        $scope.passwordSettingForm.userId = $routeParams.uId;
    });//end document.ready function
    
    $scope.updatePasswordSetting = function(){
        //make sure if the forms have datavalue and submit it...
        if(!$scope.passwordSettingForm.currentUsername){
            $scope.message = "Enter you current username";            
            document.getElementById('currentUsername').focus();
        }else if(!$scope.passwordSettingForm.currentPassword){
            $scope.message = 'Enter your current password!';       
            document.getElementById('currentPassword').focus();
        }else if(!$scope.passwordSettingForm.newPassword){
            $scope.message = "Enter your new password!";            
            document.getElementById('newPassword').focus();
        }else if(!$scope.passwordSettingForm.confirmationPassword){
            $scope.message = "Enter confirmation password (Repeat new password)!";
            document.getElementById('confirmationPassword').focus();
        }else if($scope.passwordSettingForm.newPassword !== $scope.passwordSettingForm.confirmationPassword){
            $scope.message = "New and Confirmation password not Identical!";
            document.getElementById('newPassword').focus();
        }else{            
            //and submit the form to be server side authentication...            
            //console.log($scope.formData);
            $http({
                method  : 'POST',
                url     : 'update_password_setting.php',
                data : serializeData($scope.passwordSettingForm),
                headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
            })
            .success(function(data) {
                if (!data.success) {                    
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