'use strict';

/* Controllers */

angular.module('bloodWindowControllers', [])

.controller('SidebarCtrl', ['$scope', function($scope) {
  $scope.content = ['home', 'corto/1', 'industria', 'proyecto/1', 'work/1'];
}])

.controller('HomeCtrl', ['$scope', function($scope) {
  // Do something
}])

.controller('IndustriaCtrl', ['$scope', function($scope) {
  // Do something
}])

.controller('CortoDetailCtrl', ['$scope', '$routeParams', '$http', function($scope, $routeParams, $http) {
  $scope.id = $routeParams.cortoId;

$http({
     method: 'POST',
     url: 'web/app_dev.php/corto',
     data: '{"id": "' + $scope.id + '" }'
 })
 .success(function(data, status){
     console.log(data, status);  //remove for production
     //$location.path('success');

 })
 .error(function(data, status){
     console.log(data, status); //remove for production
 })
 }])

.controller('ProyectoDetailCtrl', ['$scope', '$routeParams', function($scope, $routeParams) {
  $scope.id = $routeParams.proyectoId;
}])

.controller('WorkDetailCtrl', ['$scope', '$routeParams', function($scope, $routeParams) {
  $scope.id = $routeParams.workId;
}]);