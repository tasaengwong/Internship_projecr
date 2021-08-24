var app = angular.module('myApp', []);
app.controller('Ctrl', function ($scope, $http, $log) {
    $scope.$log = $log;
    $scope.Reg = {};
    $scope.x = {};
    $scope.record = {};
    $scope.show_message = "";

    $scope.selecttest = function () {
        $http({
            method: "post",
            url: "select.php",
            data: { "Reg": '' },
            headers: { 'Content-type': 'application/x-www-form-urlencoded' }
        }).then(
            function mySuccess(response) {
                $scope.record = response.data;
                $scope.Reg = {};
            }
            , function myError(response) { i }
        );

    }//selecttest
    
    $scope.selectdedit = function (select_id){

        $http({
            method:"post",
            url:"show.php",
            data: {"Reg":select_id},
            headers: {'Content-type':'application/x-www-form-urlencoded'}
        }).then (
            function mySuccess(response){
                $scope.Reg.Reg = response.data[0].Reg;
                $scope.Reg.Id_students = response.data[0].Id_students;
                $scope.Reg.titlename = response.data[0].titlename;
                $scope.Reg.name = response.data[0].name;
                $scope.Reg.lastname = response.data[0].lastname;
                $scope.Reg.major = response.data[0].major;
                $scope.Reg.year = response.data[0].year;
                $scope.Reg.address = response.data[0].address;
                $scope.Reg.provinces = response.data[0].provinces;
                $scope.Reg.amphures = response.data[0].amphures;
                $scope.Reg.district = response.data[0].district;
                $scope.Reg.zipcode = response.data[0].zipcode;
                $scope.Reg.phone = response.data[0].phone;
                $scope.Reg.mail = response.data[0].mail;
                $scope.Reg.contract_person =  response.data[0].contract_person;
                $scope.Reg.contract_position = response.data[0].contract_position;
                $scope.Reg.industry_name = response.data[0].industry_name;
                $scope.Reg.industry_address = response.data[0].industry_address;
                $scope.Reg.industry_provinces = response.data[0].industry_provinces;
                $scope.Reg.industry_zipcode = response.data[0].industry_zipcode;
                $scope.Reg.contract_phone = response.data[0].contract_phone;
                $scope.Reg.contract_mail = response.data[0].contract_mail;
                $scope.Reg.contract_FAx = response.data[0].contract_FAx;
               
            },
    
            function myError(response){
            }
        );
        // alert('Update Mode');
    
    }//reccordedit

    

    
}
);
const searchButton = document.getElementById('search-button');
const searchInput = document.getElementById('search-input');
searchButton.addEventListener('click', () => {
  const inputValue = searchInput.value;
  alert(inputValue);
});


