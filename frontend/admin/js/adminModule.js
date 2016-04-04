if(document.URL.indexOf("#/")===-1){
  location.href="#/home";
}
define(function(){
    var adminModule = angular.module('adminModule', ['ui.router','ui.bootstrap']);

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
        });
    });

});