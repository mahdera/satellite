'use strict';

adminDashboardApp.controller('ComposeMailController', function($scope, $routeParams, $http){
	$scope.composeMailForm = {};
    
    angular.element(document).ready(function () {        
        $scope.composeMailForm.userId = $routeParams.uId;
    });//end document.ready function

    $scope.sendMail = function(){    		
    	if(!$scope.composeMailForm.mailTo){
    		$scope.message = "Enter mail receipent(s).";
    		document.getElementById('mailTo').focus();
    	}else if(!$scope.composeMailForm.mailTitle){
    		$scope.message = "Enter mail title.";
    		document.getElementById('mailTitle').focus();
    	}else if(!document.getElementById('mailContent').value){
    		$scope.message = "Enter your message";
    		document.getElementById('mailContent').focus();
    	}else{
    		//and submit the form to be server side authentication...            
            //console.log($scope.formData);
            //do the binding for the jquery.textarea component manually yourself...
            $scope.composeMailForm.mailContent = document.getElementById('mailContent').value;
            $http({
                method  : 'POST',
                url     : 'send_mail.php',
                data : serializeData($scope.composeMailForm),
                headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
            })
            .success(function(data) {            	
                if (!data.success) {                    
                    document.getElementById('processStatusDiv').innerHTML = data.message;

                } else {        
                //now clear the form for new insertion...that is the beauty of two-way-binding...
                    $scope.composeMailForm.mailTo = "";
                    $scope.composeMailForm.mailTitle = "";
                    document.getElementById('mailContent').innerHTML = "";
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