'use strict';

/* Controllers */

angular.module('bloodWindowControllers', [])

.controller('SidebarCtrl', ['$scope', function($scope) {
  $scope.isCollapsed = true;
  $scope.content = ['home', 'industria', 'proyecto/1', 'work/1'];
}])

.controller('HomeCtrl', ['$scope', '$http', '$rootScope', '$modal', function($scope, $http, $rootScope, $modal) {

  // ***** START API ***** Get All Cortos with filters
  $scope.searchTitulo = "example titulo"; // Edit stored parameters
  $scope.searchAno = "example anio"; // Edit stored parameters
  $scope.searchDirector = "example director"; // Edit stored parameters
  $scope.searchGenero = "example genero"; // Edit stored parameters
  $scope.searchFestival = "example festival"; // Edit stored parameters

  $scope.sendToAPI = '{"titulo": "' + $scope.searchTitulo + '", "anio": "' + $scope.searchAno + '", "director": "' + $scope.searchDirector + '", "genero": "' + $scope.searchGenero + '", "festival": "' + $scope.searchFestival + '"}';
  $http({
      method: 'POST',
      url: $rootScope.serverURL + "/buscar",
      data: $scope.sendToAPI
  })
  .success(function(data, status){
      console.log(data, status);  //remove for production

  })
  .error(function(data, status){
      console.log(data, status); //remove for production
  });
  // ***** END API *****

  // ***** START OPEN MODAL CORTO DETAIL *****
  $scope.openCortoDetail = function (cortoId) {

    var modalInstance = $modal.open({
      templateUrl: 'templates/modals/modal.corto.detail.html',
      controller: 'CortoDetailCtrl',
      size: 'lg',
      resolve: {
        cortoId: function () {
          return cortoId;
        }
      }
    });

    /*
    modalInstance.result.then(function (selectedItem) {
      $scope.selected = selectedItem;
    }, function () {
      $log.info('Modal dismissed at: ' + new Date());
    });
    */
  };
  // ***** END OPEN MODAL CORTO DETAIL *****

  $scope.myInterval = 5000;
  $scope.slides = [
    {'id' : '1',
    'image': 'http://placekitten.com/605/300',
    'text' : 'Alexia',
    'small' : 'A pesar de que Alexia, la ex novia de Franco, ha fallecido hace algún tiempo.'},
    {'id' : '2',
    'image': 'http://placekitten.com/601/300',
    'text' : 'Otra Pelicula',
    'small' : 'Franco aún conserva su contacto en las redes sociales. Cuando se decide a eliminar'}
  ];

}])

.controller('IndustriaCtrl', ['$scope', '$http', '$rootScope', function($scope, $http, $rootScope) {
  
  // ***** START API ***** Get All Proyectos with filters
  $scope.orderBy = "anio"; // Edit stored parameters
  $scope.orderBy = "financiacion"; // Edit stored parameters

  $scope.sendToAPI = '{"orderBy": "' + $scope.orderBy + '"}';
  $http({
      method: 'POST',
      url: $rootScope.serverURL + "/industria/proyectos",
      data: $scope.sendToAPI
  })
  .success(function(data, status){
      console.log(data, status);  //remove for production

  })
  .error(function(data, status){
      console.log(data, status); //remove for production
  });
  // ***** END API *****

  // ***** START API ***** Get All Works with filters
  $scope.orderBy = ""; // Edit stored parameters

  $scope.sendToAPI = '{"orderBy": "' + $scope.orderBy + '"}';
  $http({
      method: 'POST',
      url: $rootScope.serverURL + "/industria/works",
      data: $scope.sendToAPI
  })
  .success(function(data, status){
      console.log(data, status);  //remove for production

  })
  .error(function(data, status){
      console.log(data, status); //remove for production
  });
  // ***** END API *****

}])

.controller('CortoDetailCtrl', ['$scope', '$routeParams', '$http', '$rootScope', '$modalInstance', 'cortoId', function($scope, $routeParams, $http, $rootScope, $modalInstance, cortoId) {

  $scope.id = cortoId; // cortoId value is set in the function 'openCortoDetail' located in 'HomeCtrl'
  
  // ***** START API ***** Get corto detail
  $scope.sendToAPI = '{"id": "' + $scope.id + '" }';
  $http({
      method: 'POST',
      url: $rootScope.serverURL + "/corto",
      data: $scope.sendToAPI
  })
  .success(function(data, status){
      console.log(data, status);  //remove for production

  })
  .error(function(data, status){
      console.log(data, status); //remove for production
  });
  // ***** END API *****

  // ***** START MODAL CLOSE FUNCTIONS *****
  $scope.ok = function () {
    $modalInstance.close();
  };

  $scope.cancel = function () {
    $modalInstance.dismiss('cancel');
  };
  // ***** END MODAL CLOSE FUNCTIONS *****

}])

.controller('ProyectoDetailCtrl', ['$scope', '$routeParams', '$http', '$rootScope', function($scope, $routeParams, $http, $rootScope) {
  $scope.id = $routeParams.proyectoId;

  // ***** START API ***** Get proyecto detail
  $scope.sendToAPI = '{"id": "' + $scope.id + '" }';
  $http({
      method: 'POST',
      url: $rootScope.serverURL + "/proyecto",
      data: $scope.sendToAPI
  })
  .success(function(data, status){
      console.log(data, status);  //remove for production

  })
  .error(function(data, status){
      console.log(data, status); //remove for production
  });
  // ***** END API *****

}])

.controller('WorkDetailCtrl', ['$scope', '$routeParams', '$http', '$rootScope', function($scope, $routeParams, $http, $rootScope) {
  $scope.id = $routeParams.workId;

  // ***** START API ***** Get work detail
  $scope.sendToAPI = '{"id": "' + $scope.id + '" }';
  $http({
      method: 'POST',
      url: $rootScope.serverURL + "/work",
      data: $scope.sendToAPI
  })
  .success(function(data, status){
      console.log(data, status);  //remove for production

  })
  .error(function(data, status){
      console.log(data, status); //remove for production
  });
  // ***** END API *****

}]);