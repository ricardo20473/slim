require.config({
    paths: {
        'angular': '../componentes/angular/angular.min',
        'jquery': '../componentes/js/jquery.min',
        'sweetalert': '../componentes/js/sweetalert2',
        'bootstrap': '../componentes/bootstrap/js/bootstrap',
        'LoginModule': 'LoginModule'
    },
    shim: { 
        'angular':{
            deps:['jquery']
        },

        'bootstrap':{
            deps:['jquery']
        },

        'LoginModule': {
            deps: ['angular', 'sweetalert','bootstrap']
        }
    }
});

require(['LoginModule'], function(){

});