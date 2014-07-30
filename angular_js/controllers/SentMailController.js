'use strict';

adminDashboardApp.controller('SentMailController', function SentMailController($scope, $routeParams, $http, MailService){	

	var sentMailList = {};

	angular.element(document).ready(function () {        
        
        $scope.sentMailList = MailService.getAllSentMails($routeParams.uId);        

    });//end document.ready function

    $scope.showMailContentDetail = function(mailId){
    	$http({
            method  : 'GET',
            url     : 'get_mail_detail.php?mailId=' + mailId           
        })
        .success(function(data) {          
            	
            document.getElementById('sentMailDetailDiv').innerHTML = data;
            
        }); 
    };

});//end controller