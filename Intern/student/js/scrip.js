var app = angular.module('myApp',[]);
app.controller('Ctrl',function($scope, $http, $log){
    $scope.$log = $log;
    $scope.Reg = {};
    $scope.x = {};
    $scope.record = {};



    $scope.save = function() {
        $http({
            method: "post",
            url: "insert.php",
            data: [$scope.Reg],
            headers: {'Content-type':'application/x-www-form-urlencoded'}
        }).then(
            function mySuccess(response){
                $scope.record = response.data;
                $scope.intern = {};
            }
            ,function myError(response) {
            }
        );
    }//savetest

    $scope.deletetest = function(delete_id){
        $http({
            method: "post",
            url: "del.php",
            data: {"Rec_id":delete_id},
            headers: {'Content-type':'application/x-www-form-urlencoded'}
        }).then(
            function mySuccess(response){
                $scope.record = response.data;
                $scope.work = {};
            }
            ,function myError(response) {
            }
        );
    }//deletetest

    $scope.selecttest = function(){
        $http({
            method: "post",
            url: "selects.php",
            data: {"Rec_id":''},
            headers: {'Content-type':'application/x-www-form-urlencoded'}
        }).then(
            function mySuccess(response){
                $scope.record = response.data;
                $scope.work = {};
            }
            ,function myError(response) {
           i }
        );
    }//selecttest

    $scope.edittest = function(){
        $http({
            method:"post",
            url:"Edit.php",
            data:[$scope.student_data],
            headers:{'Content-Type':'application/x-www-form-urlencoded'}
        }).then(
            function mySuccess(response){
                $scope.records=response.data;
                $scope.test={};
            },
            function myError(response){
            }
        );
        }//Edittest

         
}
);
