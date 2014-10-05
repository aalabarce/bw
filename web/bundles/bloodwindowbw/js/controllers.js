'use strict';

/* Controllers */

angular.module('bloodWindowControllers', [])

.controller('SidebarCtrl', ['$scope', '$rootScope', '$location', function($scope, $rootScope, $location) {
  
  // Set the value to variable for updating class active in header menu
  $rootScope.currentUrl = $location.path();

  $scope.isCollapsed = true;
  $scope.content = ['home', 'industria', 'proyecto/1', 'work/1'];

  $rootScope.searchInputText = ""; // Set var to emty string, because if not is 'undefined'
  $scope.change = function () {
    if (angular.isUndefined($scope.searchInput) || $scope.searchInput == null) {
      $rootScope.searchInputText = "";
    }
    else {
      $rootScope.searchInputText = $scope.searchInput;
    }
  }
  

}])

.controller('HomeCtrl', ['$scope', '$http', '$rootScope', '$modal', '$location', function($scope, $http, $rootScope, $modal, $location) {
  // Set the value to variable for updating class active in header menu
  $rootScope.currentUrl = $location.path();

  // ***** START API ***** Get Carousel Cortos
  $scope.slides = "";
  $scope.getCarouselCortos = function() {
    $http({
    method: 'POST',
    url: $rootScope.serverURL + "/buscar/corto/carousel"
    })
    .success(function(data, status){
        $scope.slides = data;
        console.log(data, status);  //remove for production
    })
    .error(function(data, status){
        console.log(data, status); //remove for production
    });
  }
  // ***** END API *****

  // ***** START API ***** Get All Cortos with filters
  $scope.filterCortos = "";
  $scope.getFilterCortos = function() {
    $scope.searchGenero = ""; // Edit stored parameters
    $scope.sendToAPI = '{"inputBuscador": "' + $scope.searchBuscador + '", "genero": "' + $scope.searchGenero + '", "festival": "' + $scope.searchFestival + '"}'; // inputBuscador take the value of 'titulo', 'anio' and 'director'
    $http({
        method: 'POST',
        url: $rootScope.serverURL + "/buscar/corto",
        data: $scope.sendToAPI
    })
    .success(function(data, status){
        $scope.filterCortos = data;
        console.log(data, status);  //remove for production

    })
    .error(function(data, status){
        console.log(data, status); //remove for production
    });
  }
  // ***** END API *****

  // ***** START API ***** Get all Festivals for filter
  $scope.festivals = "";
  $scope.getAllFestivals = function() {
    $http({
    method: 'POST',
    url: $rootScope.serverURL + "/buscar/festival"
    })
    .success(function(data, status){
        $scope.festivals = data;
        console.log(data, status);  //remove for production
    })
    .error(function(data, status){
        console.log(data, status); //remove for production
    });
  }
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
  $scope.getCarouselCortos();
  $scope.myInterval = 5000;

  // ***** END CAROUSEL *****

  // ***** START INPUT SEARCH RESULT *****
  // Get value from input search and get data from API
  $scope.showCarousel = true;
  $scope.$watch('searchInputText', function() {
    window.scrollTo(0,0);
    if($rootScope.searchInputText) $scope.showCarousel = false;
    else $scope.showCarousel = true;
    //$scope.searchFestival = ""; uncoment for reseting festivals to all
    $scope.searchBuscador = $rootScope.searchInputText;
    $scope.getFilterCortos(); // This function will be call when controller is called and when $rootScope.searchInputText changes.

  });
  // ***** END INPUT SEARCH RESULT *****

  // ***** START RESULT TABS *****
  $scope.searchFestival = "";
  $scope.searchBuscador = "";
  $scope.getAllFestivals();
  $scope.setCurrentFestival = function(value) {
    $scope.searchFestival = value;
    $scope.getFilterCortos();
  }
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
  $scope.cortoResult = "";
  $scope.sendToAPI = '{"id": "' + $scope.id + '" }';
  $http({
      method: 'POST',
      url: $rootScope.serverURL + "/corto",
      data: $scope.sendToAPI
  })
  .success(function(data, status){
      $scope.cortoResult = data[0];
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