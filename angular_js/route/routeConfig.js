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
            templateUrl: 'setting.php',
            controller: 'SettingController'            
        }).
        when('/view/setting/email/:uId',{
            templateUrl: 'setting.php',
            controller: 'SettingController'
        }).
        when('/view/setting/username/:uId',{
            tempateUrl: 'usernamesetting.php',
            controller: 'SettingController'
        });        
                
        /*        
        otherwise({
            //do nothing
        });
        */
        
        
}]);
