'use strict';

adminDashboardApp.service('MailService',function($http){
    
    this.getAllSentMails = function( userId ){        
        //return {"0":{"mail_id":"1","from_user_id":"1","to_user_id":"2","mail_date":"2014-07-29 02:41:59","mail_title":"this is the title","mail_content":"this is the message<br>","mail_status":"Unread"},"1":{"mail_id":"2","from_user_id":"1","to_user_id":"3","mail_date":"2014-07-29 02:41:59","mail_title":"this is the title","mail_content":"this is the message<br>","mail_status":"Unread"},"success":true};
        /*
        $http({
            method  : 'GET',
            url     : 'get_all_sent_mails_of_user.php?uId='+userId
            //data : 'uId='+userId            
        }).success(function(data) {
            if (!data.success) {
                alert('Error reading all sent mails...in MailService');
            } else {
                return data;
            }
        });
        */      

    };

    
});//end service