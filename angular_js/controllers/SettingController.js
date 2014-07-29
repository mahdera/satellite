'use strict';

adminDashboardApp.controller('SettingController', function SettingController($scope,$routeParams,$http){
    $scope.settingForm = {};
    $scope.usernameSettingForm = {};
    
    angular.element(document).ready(function () {        
        $http({
            method  : 'GET',
            url     : 'get_user_profile.php?uId='+[$routeParams.uId]           
        })
        .success(function(data) {
            if (!data.success) {
                $scope.message = "Could not find user with the given userId.";
            } else {
                // if successful, bind success message to message
                $scope.settingForm.userId = $routeParams.uId;                
                $scope.settingForm.currentEmail = data.email;                
            }
        }); 
        
    });//end document.ready function
    
    
    $scope.showEmailSettingForm = function(userId){        
        $http({
            method  : 'GET',
            url     : 'show_user_email_setting_form_via_click.php?uId='+userId           
        })
        .success(function(data) {
            //$scope.usernameSettingForm.userId = 2;//$routeParams.uId;
            //document.getElementById('innerSettingDiv').innerHTML = data;
            
            /*if (!data.success) {
                $scope.message = "Could not find user with the given userId.";
            } else {
                // if successful, bind success message to message
                $scope.settingForm.userId = $routeParams.uId;                
                $scope.settingForm.currentEmail = data.email;                
            }*/
        });
    };
    
    $scope.showPasswordSettingForm = function(){};
    
    
    $scope.updateEmailSetting = function(){        
        $http({
            method  : 'POST',
            url     : 'update_user_email_setting.php',
            data : serializeData($scope.settingForm),
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
    };
    
    
    $scope.showUsernameSettingForm = function(){
        $http({
            method  : 'GET',
            url     : 'show_user_name_setting_form.php?uId='+[$routeParams.uId]           
        })
        .success(function(data) {
            //$scope.usernameSettingForm.userId = 2;//$routeParams.uId;
            document.getElementById('innerSettingDiv').innerHTML = data;
            
            /*if (!data.success) {
                $scope.message = "Could not find user with the given userId.";
            } else {
                // if successful, bind success message to message
                $scope.settingForm.userId = $routeParams.uId;                
                $scope.settingForm.currentEmail = data.email;                
            }*/
        });
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
});//end controller...