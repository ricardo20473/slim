define(function(){
    var adminModule = angular.module('adminModule');

    adminModule.controller('usuarioController', function($scope, $location, usuarioService, $stateParams, $state, $rootScope){
        // sessionStorage.token
        console.log('hola');

        $scope.listarUsuario = function(pagina){ 
            usuarioService.getUsuario(sessionStorage.token).then(function(response){
                
                $scope.maxPages = 5;
                
                /**Validación de paginación personalizada por módulo**/
                $scope.numPerPage = 1;

                $scope.usuario = response.data.mensaje;
            });
        };

        $scope.listarUsuario();
    });
});