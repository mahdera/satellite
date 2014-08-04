'use strict';

adminDashboardApp.controller('ListDeleteImageSliderController', function ListDeleteImageSliderController($scope, $http){
    $scope.deleteThisSliderPicture = function(fileName){
        if(window.confirm("Are you sure you want to delete this picture?")){
            $http({
                method  : 'GET',
                url     : 'delete_slider_picture.php?fileName='+fileName
            })
            .success(function(data) {          
                    
                //alert('Slider image delete successfully!');
                window.location.reload();
                
            });
        }//end confirmation window
    }    
});//end controller