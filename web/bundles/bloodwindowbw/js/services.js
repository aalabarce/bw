'use strict';

/* Services */

angular.module('bloodWindowServices', [])
    .factory('Home', ['$http', function($http) {

    var urlBase = '/192.168.0.116:80/bw';
    var Home = {};

    Home.test = function () {
    	return 'hola';
    };

    Corto.getCortoId = function (json) {
        return $http.post(urlBase, json);
    };

    return Corto;
}]);
