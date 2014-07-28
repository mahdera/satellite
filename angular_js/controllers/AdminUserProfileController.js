'use strict';

adminDashboardApp.controller('AdminUserProfileController', function AdminUserProfileController($scope, $routeParams){
    //alert($routeParams.uId);
    $scope.userId = [$routeParams.uId];
});