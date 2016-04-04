require.config({
    paths: {
        'angular': '../../componentes/angular/angular.min',
        'jquery': '../../componentes/js/jquery.min',
        'sweetalert': '../../componentes/js/sweetalert2',
        'bootstrap': '../../componentes/bootstrap/js/bootstrap',
        'angular-ui-router': '../../componentes/js/angular-ui-router',
        'bootstrap-ui': '../../componentes/js/ui-bootstrap-tpls-1.1.2.min',
        'adminModule': 'adminModule'
    },
    shim: { 
        'angular':{
            deps:['jquery']
        },

        'bootstrap':{
            deps:['jquery']
        },

        'angular-ui-router':{
            deps:['angular']
        },

        'bootstrap-ui':{
            deps:['angular']
        },

        'adminModule': {
            deps: ['angular', 'sweetalert','bootstrap','angular-ui-router','bootstrap-ui']
        }
    }
});

require(['adminModule'], function(){
    
});