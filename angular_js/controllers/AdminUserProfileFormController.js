'use strict';

adminDashboardApp.controller('AdminUserProfileFormController', function AdminUserProfileFormController($scope,$routeParams,$http){
    $scope.adminProfileForm = {};
    angular.element(document).ready(function () {
        //now based on the routeParam value, I need to read the record from 
        //database and populate the form accordingly...
        
        $http({
            method  : 'GET',
            url     : 'get_admin_user_profile.php?uId='+[$routeParams.uId]            
        })
        .success(function(data) {
            if (!data.success) {
                $scope.message = "Could not find user with the given userId.";
            } else {
                // if successful, bind success message to message
                $scope.adminProfileForm.userid = $routeParams.uId;
                $scope.adminProfileForm.usertype = data.user_type;
                $scope.adminProfileForm.username = data.username;
                $scope.adminProfileForm.fullname = data.user_full_name;
                $scope.adminProfileForm.userstatus = data.user_status;
                $scope.adminProfileForm.email = data.email;
                $scope.adminProfileForm.usercreatedate = data.user_create_date;
                $scope.adminProfileForm.modificationdate = data.modification_date;
            }
        });       
    });
    
    $scope.updateAdminProfile = function(){
            $http({
                method  : 'POST',
                url     : 'save_admin_profile.php',
                data : serializeData($scope.adminProfileForm),
                headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
            })
            .success(function(data) {
                if (!data.success) {
                    $scope.message = "Invalid user credential! Try again.";
                } else {                    
                    document.getElementById('processStatusDiv').innerHTML = data.message;
                }
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
    
});//end controller