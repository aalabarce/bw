'use strict';

/* Controllers */

angular.module('bloodWindowControllers', [])

.controller('SidebarCtrl', ['$scope', '$http', '$rootScope', '$location', function($scope, $http, $rootScope, $location) {
  
  // Set the value to variable for updating class active in header menu
  $rootScope.currentUrl = $location.path();
  $scope.isCollapsed = true; // Bootstrap header setting
   
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

.controller('languageCtrl', ['$scope', '$http', '$rootScope', function($scope, $http, $rootScope) {
  
  $rootScope.language = "esp"; // Set default language to Spanish

  // ***** SET LENGUAGUE *****
  $scope.setLanguage = function(thisLanguage) {
    $rootScope.language = thisLanguage;
    $http({
    method: 'GET',
    url: "/web/bundles/bloodwindowbw/languages/" + thisLanguage + ".json"
    })
    .success(function(data, status){
        $rootScope.languageHeader = data.header; // All tags used in SidebarCtrl
        $rootScope.languageHome = data.home; // All tags used in HomeCtrl
        $rootScope.languageCortoDetail = data.cortoDetail; // All tags used in CortoDetailCtrl
        $rootScope.languageProyectos = data.proyectos; // All tags used in ProyectosCtrl
        $rootScope.languageProyectoDetail = data.proyectoDetail; // All tags used in ProyectoDetailCtrl
        $rootScope.languageWorks = data.works; // All tags used in WorksCtrl
        $rootScope.languageWorkDetail = data.workDetail; // All tags used in WorkDetailCtrl

        console.log("Resultado de consulta por nombre de usuario: " + data);  //remove for production
    })
    .error(function(data, status){
        console.log(data, status); //remove for production
    });
  }
  // ***** END SET LENGUAGUE *****

  // ***** START API ***** Get curren user name
  $scope.getUserName = function() {
    $http({
    method: 'POST',
    url: $rootScope.serverURL + "/buscar/usuario"
    })
    .success(function(data, status){
        //$scope.slides = data;
        console.log(data, status);  //remove for production
    })
    .error(function(data, status){
        console.log(data, status); //remove for production
    });
  }
  // ***** END API *****

  $scope.setLanguage("esp"); // Set default language to Spanish
  $scope.getUserName(); // Get current user name
  
}])

.controller('HomeCtrl', ['$scope', '$http', '$rootScope', '$modal', '$location', '$routeParams', function($scope, $http, $rootScope, $modal, $location, $routeParams) {
  // Set the value to variable for updating class active in header menu
  // In this case harcode the URL for showing active HOME in menu, besides the cortoID (if any)
  $rootScope.currentUrl = "/home";
  window.scrollTo(0,0);

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
  $scope.filterCortos = true; // Set var to true for not showing error message
  $scope.getFilterCortos = function() {
    $scope.showPreloader = true; // Show preloader gif
    $scope.searchGenero = ""; // Edit stored parameters
    $scope.sendToAPI = '{"inputBuscador": "' + $scope.searchBuscador + '", "genero": "' + $scope.searchGenero + '", "festival": "' + $scope.searchFestival + '"}'; // inputBuscador take the value of 'titulo', 'anio' and 'director'
    $http({
        method: 'POST',
        url: $rootScope.serverURL + "/buscar/corto",
        data: $scope.sendToAPI
    })
    .success(function(data, status){
        $scope.filterCortos = data;
        $scope.showPreloader = false; // Hide preloader gif
        console.log(data, status);  //remove for production
    })
    .error(function(data, status){
        $scope.filterCortos = ""; // Set var to lenght cero for showing error message
        $scope.showPreloader = false; // Hide preloader gif
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

  // ***** START SHOW PARAMETER CORTO ID DETAIL *****
  $scope.id = $routeParams.cortoId;
  if($scope.id) {
    $scope.openCortoDetail($scope.id);
  }
  // ***** END SHOW PARAMETER CORTO ID DETAIL *****

}])

.controller('CortoDetailCtrl', ['$scope', '$routeParams', '$http', '$rootScope', '$modalInstance', '$location', 'cortoId', '$sce', function($scope, $routeParams, $http, $rootScope, $modalInstance, $location, cortoId, $sce) {

  $scope.id = cortoId; // cortoId value is set in the function 'openCortoDetail' located in 'HomeCtrl'
  
  //$location.path("/home/" + $scope.id).replace(); // Change URL to HOME for deleting crotId parameter (if exists) 
  
  // ***** START API ***** Get corto detail
  $scope.showPreloader = true; // Show preloader gif
  $scope.cortoResult = true; // Set to true for showing label titles in pop up
  $scope.sendToAPI = '{"id": "' + $scope.id + '" }';
  $http({
      method: 'POST',
      url: $rootScope.serverURL + "/corto",
      data: $scope.sendToAPI
  })
  .success(function(data, status){
      $scope.cortoResult = data[0];
      $scope.showPreloader = false; // Hide preloader gif
      console.log(data, status);  //remove for production
  })
  .error(function(data, status){
      $scope.cortoResult = false; // Set to false for showing error pop up
      $scope.showPreloader = false; // Hide preloader gif
      console.log(data, status); //remove for production
  });
  // ***** END API *****

  // ***** START MODAL CLOSE FUNCTIONS *****
  $scope.ok = function () {
    $modalInstance.close();
    $location.path("/home").replace(); // Change URL to HOME for deleting crotId parameter (if exists)
  };

  $scope.cancel = function () {
    $modalInstance.dismiss('cancel');
  };
  // ***** END MODAL CLOSE FUNCTIONS *****

  // ***** START VIMEP VALIDATION URL *****
  $scope.trustSrc = function(src) {
    return $sce.trustAsResourceUrl("//player.vimeo.com/video/" + src);
  }
  // ***** END VIMEP VALIDATION URL *****

}])

.controller('ProyectosCtrl', ['$scope', '$http', '$rootScope', '$location', function($scope, $http, $rootScope, $location) {
  // Set the value to variable for updating class active in header menu
  $rootScope.currentUrl = $location.path();
  window.scrollTo(0,0);

  // ***** START API ***** Get All Proyectos with filters
  $scope.orderBy = "anio"; // Edit stored parameters
  $scope.orderBy = "financiacion"; // Edit stored parameters

  $scope.getAllProyectos = function() {
    $scope.sendToAPI = '{"orderBy": "' + $scope.orderBy + '"}';
    $http({
        method: 'POST',
        url: $rootScope.serverURL + "/industria/proyectos",
        data: $scope.sendToAPI
    })
    .success(function(data, status){

        console.log(data, status);  //remove for production
        
        // Split the results in arrays of 4 elements
        $scope.proyectos = [];
        while (data.length > 0)
        $scope.proyectos.push(data.splice(0, 4));
        
    })
    .error(function(data, status){
        console.log(data, status); //remove for production
    });
  }
  // ***** END API *****
  $scope.getAllProyectos();
}])

.controller('ProyectoDetailCtrl', ['$scope', '$routeParams', '$http', '$rootScope', '$location', function($scope, $routeParams, $http, $rootScope, $location) {

  // Set the value to variable for updating class active in header menu
  // In this case harcode the URL for showing active PROYECTOS in menu
  $rootScope.currentUrl = "/proyectos";
  window.scrollTo(0,0);

  $scope.id = $routeParams.proyectoId;

  // ***** START API ***** Get proyecto detail
  $scope.showPreloader = true; // Show preloader gif
  $scope.proyectoResult = true; // Set to true for showing label titles
  $scope.sendToAPI = '{"id": "' + $scope.id + '" }';
  $http({
      method: 'POST',
      url: $rootScope.serverURL + "/industria/proyecto",
      data: $scope.sendToAPI
  })
  .success(function(data, status){
      $scope.proyectoResult = data[0];
      $scope.showPreloader = false; // Hide preloader gif
      console.log(data, status);  //remove for production

  })
  .error(function(data, status){
      $scope.proyectoResult = false; // Set to false for showing error pop up
      $scope.showPreloader = false; // Hide preloader gif
      console.log(data, status); //remove for production
  });
  // ***** END API *****

}])

.controller('WorksCtrl', ['$scope', '$http', '$rootScope', '$location', function($scope, $http, $rootScope, $location) {
  // Set the value to variable for updating class active in header menu
  $rootScope.currentUrl = $location.path();
  window.scrollTo(0,0);

  // ***** START API ***** Get All Works with filters
  $scope.orderBy = ""; // Edit stored parameters

  $scope.getAllWorks = function() {
    $scope.sendToAPI = '{"orderBy": "' + $scope.orderBy + '"}';
    $http({
        method: 'POST',
        url: $rootScope.serverURL + "/industria/works",
        data: $scope.sendToAPI
    })
    .success(function(data, status){

        console.log(data, status);  //remove for production

        // Split the results in arrays of 4 elements
        $scope.works = [];
        while (data.length > 0)
        $scope.works.push(data.splice(0, 4));

    })
    .error(function(data, status){
        console.log(data, status); //remove for production
    });
  }
  // ***** END API *****
  
  $scope.getAllWorks();

}])

.controller('WorkDetailCtrl', ['$scope', '$routeParams', '$http', '$rootScope', '$location', '$sce', function($scope, $routeParams, $http, $rootScope, $location, $sce) {

  // Set the value to variable for updating class active in header menu
  // In this case harcode the URL for showing active WORKS in menu
  $rootScope.currentUrl = "/works";
  window.scrollTo(0,0);

  $scope.id = $routeParams.workId;

  // ***** START API ***** Get work detail
  $scope.showPreloader = true; // Show preloader gif
  $scope.workResult = true; // Set to true for showing label titles
  $scope.sendToAPI = '{"id": "' + $scope.id + '" }';
  $http({
      method: 'POST',
      url: $rootScope.serverURL + "/industria/work",
      data: $scope.sendToAPI
  })
  .success(function(data, status){
      $scope.workResult = data[0];
      $scope.showPreloader = false; // Hide preloader gif
      console.log(data, status);  //remove for production

  })
  .error(function(data, status){
      $scope.workResult = false; // Set to false for showing error pop up
      $scope.showPreloader = false; // Hide preloader gif
      console.log(data, status); //remove for production
  });
  // ***** END API *****

  // ***** START VIMEP VALIDATION URL *****
  $scope.trustSrc = function(src) {
    return $sce.trustAsResourceUrl("//player.vimeo.com/video/" + src);
  }
  // ***** END VIMEP VALIDATION URL *****

}]);