'use strict';

/* Controllers */

angular.module('bloodWindowControllers', [])

.controller('SidebarCtrl', ['$scope', '$rootScope', '$location', function($scope, $rootScope, $location) {
  
  // Set the value to variable for updating class active in header menu
  $rootScope.currentUrl = $location.path();

  $scope.isCollapsed = true;
  $scope.content = ['home', 'industria', 'proyecto/1', 'work/1'];

  $scope.change = function () {
    $rootScope.searchInputText = $scope.searchInput;
  }
  

}])

.controller('HomeCtrl', ['$scope', '$http', '$rootScope', '$modal', '$location', function($scope, $http, $rootScope, $modal, $location) {
  // Set the value to variable for updating class active in header menu
  $rootScope.currentUrl = $location.path();

  // Get value from input search and get data from API
   $scope.showCarousel = true;
   $scope.$watch('searchInputText', function() {
      if($rootScope.searchInputText) $scope.showCarousel = false;
      else $scope.showCarousel = true;
   });

  // ***** START API ***** Get All Cortos with filters
  //$scope.searchTitulo = "example titulo"; // Edit stored parameters
  //$scope.searchAno = "example anio"; // Edit stored parameters
  //$scope.searchDirector = "example director"; // Edit stored parameters
  $scope.searchGenero = "1"; // Edit stored parameters
  $scope.searchFestival = "1"; // Edit stored parameters

  $scope.inputBuscador = "example buscador"; // Edit stored parameters

  //$scope.sendToAPI = '{"titulo": "' + $scope.searchTitulo + '", "anio": "' + $scope.searchAno + '", "director": "' + $scope.searchDirector + '", "genero": "' + $scope.searchGenero + '", "festival": "' + $scope.searchFestival + '"}';
  $scope.sendToAPI = '{"inputBuscador": "' + $scope.inputBuscador + '", "genero": "' + $scope.searchGenero + '", "festival": "' + $scope.searchFestival + '"}'; // inputBuscador take the value of 'titulo', 'anio' and 'director'
  $http({
      method: 'POST',
      url: $rootScope.serverURL + "/buscar/corto",
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
      templateUrl: '/web/bundles/bloodwindowbw/templates/modals/modal.corto.detail.html',
      controller: 'CortoDetailCtrl',
      size: 'lg',
      resolve: {
        cortoId: function () {
          return cortoId;
        }
      }
    });

  };
  // ***** END OPEN MODAL CORTO DETAIL *****

  // ***** START CAROUSEL *****
  $scope.myInterval = 5000;
  $scope.slides = [
    {
    'id' : '1',
    'image': '/web/bundles/bloodwindowbw/theme/images/blue.jpg',
    'title' : 'American Horror Story',
    'name' : 'American Horror Story\: Murder House',
    'synopsis' : 'American Horror Story es una serie televisiva dramática y de terror creada y producida por Ryan Murphy y Brad Falchuk. Se ha descrito como una serie antológica, ya que cada temporada se ha concebido como una miniserie independiente, con un grupo de personajes y escenarios distintos, y una trama que tiene su propio comienzo, parte central y final.',
    'director' : 'Ryan Murphy and Brad Falchuk',
    'duration' : '45 mins',
    'festival' : 'Cannes, Valparaiso'
    }, {
    'id' : '2',
    'image': '/web/bundles/bloodwindowbw/theme/images/purple.jpg',
    'title' : 'American Horror Story',
    'name' : 'American Horror Story\: Murder House',
    'synopsis' : 'American Horror Story es una serie televisiva dramática y de terror creada y producida por Ryan Murphy y Brad Falchuk. Se ha descrito como una serie antológica, ya que cada temporada se ha concebido como una miniserie independiente, con un grupo de personajes y escenarios distintos, y una trama que tiene su propio comienzo, parte central y final.',
    'director' : 'Ryan Murphy and Brad Falchuk',
    'duration' : '45 mins',
    'festival' : 'Cannes, Valparaiso'
    }, {
    'id' : '3',
    'image': '/web/bundles/bloodwindowbw/theme/images/red.jpg',
    'title' : 'American Horror Story',
    'name' : 'American Horror Story\: Murder House',
    'synopsis' : 'American Horror Story es una serie televisiva dramática y de terror creada y producida por Ryan Murphy y Brad Falchuk. Se ha descrito como una serie antológica, ya que cada temporada se ha concebido como una miniserie independiente, con un grupo de personajes y escenarios distintos, y una trama que tiene su propio comienzo, parte central y final.',
    'director' : 'Ryan Murphy and Brad Falchuk',
    'duration' : '45 mins',
    'festival' : 'Cannes, Valparaiso'
    }
  ];
  // ***** END CAROUSEL *****

  // ***** START RESULT TABS *****
  // ***** END RESULT TABS *****

}])

.controller('IndustriaCtrl', ['$scope', '$http', '$rootScope', '$location', function($scope, $http, $rootScope, $location) {
  
  // Set the value to variable for updating class active in header menu
  $rootScope.currentUrl = $location.path();

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

.controller('ProyectoDetailCtrl', ['$scope', '$routeParams', '$http', '$rootScope', '$location', function($scope, $routeParams, $http, $rootScope, $location) {

  // Set the value to variable for updating class active in header menu
  $rootScope.currentUrl = $location.path();

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

.controller('WorkDetailCtrl', ['$scope', '$routeParams', '$http', '$rootScope', '$location', function($scope, $routeParams, $http, $rootScope, $location) {

  // Set the value to variable for updating class active in header menu
  $rootScope.currentUrl = $location.path();

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