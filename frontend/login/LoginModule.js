define(function(){
    var LoginModule = angular.module('LoginModule', []);

    require(['LoginReferences'], function(references){
        require(references,function(){
            angular.bootstrap(document, ['LoginModule']);
        });
    });

});