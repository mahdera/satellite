'use strict';

adminDashboardApp.controller('InboxMailController', function InboxMailController($scope, $http, $routeParams){

	angular.element(document).ready(function () {        
        
        //$scope.inboxMailList = MailService.getAllSentMails($routeParams.uId);        

    });//end document.ready function


    $scope.showMailContentDetail = function(mailId){
    	$http({
            method  : 'GET',
            url     : 'get_mail_detail.php?mailId=' + mailId           
        })
        .success(function(data) {          
            	
            document.getElementById('inboxMailDetailDiv').innerHTML = data;
            
        }); 
    };

});//end controller