if(document.URL.indexOf("#/")===-1){
  location.href="#/home";
}
define(function(){
    var adminModule = angular.module('adminModule', ['ui.router','ui.bootstrap','angularUtils.directives.dirPagination']);

    require(['adminReferences'], function(references){
        require(references,function(){
            angular.bootstrap(document, ['adminModule']);
        });
    });

    adminModule.config(function ($stateProvider) {
        $stateProvider.state('main', {
            url: '/home',
            templateUrl : 'home.html',
            controller:'homeController'
        })

        .state('usuarios', {
            url: '/admin/usuarios',
            templateUrl : 'usuario/list_usuario.html',
            controller:'usuarioController'
        })

        .state('registrar_usuario', {
            url: '/admin/registrar_usuario',
            templateUrl : 'usuario/registrar_usuario.html',
            controller:'usuarioController'
        });
    });

});