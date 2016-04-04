define(function(){

var LoginModule = angular.module('LoginModule');

    LoginModule.controller("LoginController",function($scope, LoginService, $http){
        
        $scope.login = function(data) {
            LoginService.login(data).then(function(response){
                login = response.data.mensaje;
                sessionStorage.token = login.token;
                swal({
                    title:'Acceso autorizado',
                    text: 'Bienvenido al sistema Web Live',
                    type: MESSAGE_TYPE.SUCCESS
                },
                function(){
                    location.href="admin/index.html";
                });
            });
        };
    });
});
