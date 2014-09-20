'use strict';

/* Services */

angular.module('bloodWindow', ['ngResource']);

.factory('Corto', ['$resource',
  function($resource){
    return $resource('phones/:phoneId.json', {}, {
      query: {method:'GET', params:{phoneId:'phones'}, isArray:true}
    });
  }]);