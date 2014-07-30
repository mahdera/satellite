'use strict';
//This file is responsible to configuring the link navigation system of my application.
//this is very similar to the DispatcherServlet of SpringMVC...
adminDashboardApp.config(['$routeProvider',
    function($routeProvider) {
    $routeProvider.
        when('/view/adminProfile/:uId', {
            templateUrl: 'admin_user_profile.php',
            controller: 'AdminUserProfileController'
        }).
        when('/view/setting/:uId', {//this is how you pass parameters....you can add more routeParams e.g/:id/:name/:city ...etc
            templateUrl: 'setting.php',//used this for email setting...its default
            controller: 'EmailSettingController'            
        }).
        when('/view/setting/username/:uId',{
            templateUrl: 'show_user_name_setting_form.php',
            controller: 'UsernameSettingController'
        }).
        when('/view/setting/password/:uId',{
            templateUrl: 'show_user_password_setting_form.php',
            controller: 'PasswordSettingController'
        }).
        when('/view/mail/compose/:uId',{
            templateUrl: 'show_compose_mail_form.php',
            controller: 'ComposeMailController'
        }).
        when('/view/mail/sent/:uId',{
            templateUrl: 'show_list_of_sent_mails.php',
            controller: 'SentMailController'
        }).
        when('/view/mail/inbox/:uId',{
            templateUrl: 'show_list_of_inbox_mails.php',
            controller: 'InboxMailController'
        });
        
        
        
        
        
                
        /*        
        otherwise({
            //do nothing
        });
        */
        
        
}]);//end configuration...
