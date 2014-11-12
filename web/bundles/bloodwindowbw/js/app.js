'use strict';

/* App Module */

//angular.module('bloodWindow', ['ui.router', 'bloodWindowAnimations', 'bloodWindowControllers', 'bloodWindowServices' ])

angular.module('bloodWindow', ['ngRoute', 'ui.bootstrap', 'bloodWindowControllers', 'bloodWindowServices'])

    .config(['$routeProvider', function($routeProvider) {
      $routeProvider.
        when('/home/:cortoId?', { // The cortoID is optional, if the URL hast a cortoId the detail of the corto will be shown
          templateUrl: '/web/bundles/bloodwindowbw/templates/content.home.html',
          controller: 'HomeCtrl'
        }).
        when('/proyectos', {
          templateUrl: '/web/bundles/bloodwindowbw/templates/content.proyectos.html',
          controller: 'ProyectosCtrl'
        }).
        when('/proyecto/:proyectoId', {
          templateUrl: '/web/bundles/bloodwindowbw/templates/content.proyecto.detail.html',
          controller: 'ProyectoDetailCtrl'
        }).
        when('/works', {
          templateUrl: '/web/bundles/bloodwindowbw/templates/content.works.html',
          controller: 'WorksCtrl'
        }).
        when('/work/:workId', {
          templateUrl: '/web/bundles/bloodwindowbw/templates/content.work.detail.html',
          controller: 'WorkDetailCtrl'
        }).
        otherwise({
          redirectTo: '/home'
        });
    }])

    .run(['$rootScope', '$location', function($rootScope, $location) {
      //if($location.path())
      if($location.host() == "bloodwindow.tv") { // For production
        $rootScope.serverURL = "/web"; // URL for real app
        $rootScope.imagesSrc = "/uploads";
      } else { // For development
        $rootScope.serverURL = "/web/app_dev.php"; // URL for working local
        $rootScope.imagesSrc = "/uploads";
      }
    }]);
