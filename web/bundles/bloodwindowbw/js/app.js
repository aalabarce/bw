'use strict';

/* App Module */

//angular.module('bloodWindow', ['ui.router', 'bloodWindowAnimations', 'bloodWindowControllers', 'bloodWindowServices' ])

angular.module('bloodWindow', ['ngRoute', 'ui.bootstrap', 'bloodWindowControllers', 'bloodWindowServices'])

    .config(['$routeProvider', function($routeProvider) {
      $routeProvider.
        when('/home', {
          templateUrl: 'templates/content.home.html',
          controller: 'HomeCtrl'
        }).
        when('/industria', {
          templateUrl: 'templates/content.industria.html',
          controller: 'IndustriaCtrl'
        }).
        when('/proyecto/:proyectoId', {
          templateUrl: 'templates/content.proyecto.detail.html',
          controller: 'ProyectoDetailCtrl'
        }).
        when('/work/:workId', {
          templateUrl: 'templates/content.work.detail.html',
          controller: 'WorkDetailCtrl'
        }).
        otherwise({
          redirectTo: '/home'
        });
    }])

    .run(['$rootScope', function($rootScope) {
       $rootScope.serverURL = "web/app_dev.php"; // Change URL
    }]);
