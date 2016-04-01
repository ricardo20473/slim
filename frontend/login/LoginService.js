var LoginModule = angular.module('LoginModule');

LoginModule.factory("LoginService", ['$http', function($http) {
    var obj = {};
    var serviceBase = SERVICE_URLS.SERVICE_BASE;
    var api_key_value = REQUEST_HEADERS.API_KEY_VALUE;
    var content_type = REQUEST_HEADERS.CONTENT_TYPE_VALUE;
    var method = HTTP_METHODS;

    obj.login = function(data){
        var request = {
            method : method.POST,
                url : serviceBase+'security/access_token',
                headers: {
                    'Content-Type': content_type,
                    'Api-Key': api_key_value
                },
                data : data
          };
            return $http(request)
            .error(function(data, status){
                if(status==401){
                    swal({
                        title: data.resultado,
                        text: data.mensaje,
                        type: 'warning'
                    });
                }

                if (status==404) {
                    swal({
                        title: data.resultado,
                        text: data.mensaje,
                        type: 'warning'
                    });
                }

                if (status==500) {
                    swal({
                        title: data.resultado,
                        text: data.mensaje,
                        type: 'warning'
                    });
                }
            });
    };
    return obj;
}]);