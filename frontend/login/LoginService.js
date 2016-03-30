var LoginModule = angular.module('LoginModule');

LoginModule.factory("LoginService", ['$http', function($http) {
    // var obj = {};
    // var serviceBase=SERVICE_URLS.SERVICE_BASE;
    // var api_key_value = REQUEST_HEADERS.API_KEY_VALUE;
    // var content_type = REQUEST_HEADERS.CONTENT_TYPE_VALUE;

    // obj.login = function(data){
    //     var request = {
    //         method : 'POST',
    //             url : serviceBase+'security/access_token',
    //             headers: {
    //                 'Content-Type': content_type,
    //                 'X-Az-API-Key': api_key_value
    //             },
    //             data : data
    //       };
    //         return $http(request)
    //         .error(function(data, status){
    //                 if(status==401){
    //                 swal({
    //                         title:'Acceso no autorizado',
    //                         text: 'Por favor, introduzca credenciales válidas',
    //                         type: 'warning'
    //                   });
    //             }
    //         });
    // };
    // return obj;
}]);