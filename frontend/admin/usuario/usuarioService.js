var adminModule = angular.module('adminModule');

adminModule.factory("usuarioService", ['$http', '$rootScope', '$cacheFactory', '$interval', '$state', function($http, $rootScope, $cacheFactory,  $interval, $state){
    var obj = {};
    var serviceBase = SERVICE_URLS.SERVICE_BASE;
    var api_key_value = REQUEST_HEADERS.API_KEY_VALUE;
    var content_type = REQUEST_HEADERS.CONTENT_TYPE_VALUE;
    var method = HTTP_METHODS;
    var module_url_name = 'usuarios/';

    obj.getUsuario = function(token){
        var request = {
            method : method.GET,
            url : serviceBase+module_url_name,
            headers: {
                'Content-Type': content_type,
                'Api-Key': api_key_value,
                'Token':token
            }
        };
        return $http(request)
        .error(function(data, status){
            if(status===401){
                swal({
                    title: data.resultado,
                    text: data.mensaje,
                    type: 'warning'
                },
                function(){
                    location.href = url_index;
                });
            }
        });
    };

    return obj;
}]);