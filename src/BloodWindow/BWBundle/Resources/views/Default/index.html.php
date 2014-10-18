<!doctype html>
<html lang="en" ng-app="bloodWindow">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
  <title>:: Home   |   Blood Window ::</title>

	<!-- AngularJS -->
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.0/angular.min.js"></script>

	<!-- Angular Modules -->
  <script src="/web/bundles/bloodwindowbw/js/app.js"></script>
  <script src="/web/bundles/bloodwindowbw/js/controllers.js"></script>
	<script src="/web/bundles/bloodwindowbw/js/services.js"></script>
	<script src="/web/bundles/bloodwindowbw/js/angular-route.js"></script>
	<script src="/web/bundles/bloodwindowbw/js/ui-bootstrap-tpls-0.11.0.min.js"></script>
  <!--   <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.0/angular-animate.js"></script> -->
  

  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="/web/bundles/bloodwindowbw/theme/css/bootstrap.css" media="all" /> <!-- llamado al CSS de BOOTSTRAP -->
  <link rel="stylesheet" type="text/css" href="/web/bundles/bloodwindowbw/theme/css/fontello.css" media="all" /> <!-- llamado a FONTELLO -->
  <link rel="stylesheet" type="text/css" href="/web/bundles/bloodwindowbw/theme/css/styles.css" media="all" /> <!-- llamado a MIS STYLES -->
  <link rel="stylesheet" type="text/css" href="/web/bundles/bloodwindowbw/css/martin-styles.css" media="all" /> <!-- llamado a MARTIN STYLES -->
  <link href='http://fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'> <!-- GOOGLE FONT OSWALD -->
  <!-- JQUERY -->
  <script src="/web/bundles/bloodwindowbw/theme/js/respond.js"></script> <!-- llamado a RESPOND para hacer que IE viejos entienda la semantica de HTML5. ESTE VA ARRIBA -->
  <script>
    function toggleCodes(on) {
      var obj = document.getElementById('icons');
      
      if (on) {
        obj.className += ' codesOn';
      } else {
        obj.className = obj.className.replace(' codesOn', '');
      }
    }
    
  </script>

</head>

<body>

  <div class="container-fluid"> <!-- contenedor principal -->
    <header class="navbar navbar-default navbar-fixed-top headerMain" ng-controller="SidebarCtrl">
      <div class="row">
        <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12 logoHeader">
          <a class="navbar-brand" href="#/home">
            <img class="img-responsive" src="/web/bundles/bloodwindowbw/theme/images/logo.png" alt="" />
          </a>
        </div>
        <div class="col-lg-8 col-md-9 col-sm-9 col-xs-12 menuHeader">
          <div class="hidden-xs buscador" ng-class="'/home' != currentUrl && 'vis-hidden'">
            <input type="search" class="form-control" placeholder="{{languageHeader.inputSearch}}" ng-model="searchInput" ng-change="change()">
            <a class="glyphicon glyphicon-search btn-lupa"></a>
          </div>
          <button type="button" class="navbar-toggle" ng-init="isCollapsed = true" ng-click="isCollapsed = !isCollapsed">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="clearfix"></div>
          <div class="navbar-collapse collapse menuAl" ng-class="{collapse: isCollapsed}">
            <ul class="nav navbar-nav navbar-right">
              <li ng-repeat="page in languageHeader.menu" ng-class="{active: '/{{page.url}}' == currentUrl}"><a href="#{{page.url}}" alt="{{page.title}}">{{page.title}}</a></li>
              <!--
              <li class="active"><a href="#" alt="Todos">Todos</a></li>
              <li><a href="#" alt="Horror">Horror</a></li>
              <li><a href="#" alt="Gore">Gore</a></li>
              <li><a href="#" alt="Sci-fi">Sci-fi</a></li>
              <li><a href="#" alt="Thrillers">Thrillers</a></li>
              <li><a href="#" alt="Comedias negras">Comedias negras</a></li>
              <li><a href="#" alt="Industria">Industria</a></li>
              -->
            </ul>
          </div>
        </div>
      </div>
    </header>
    
    <div class="clearfix"></div>
    
    <section class="main-cont">
      <!--idioma -->
      <div ng-controller="languageCtrl" class="idioma col-lg-12 col-md-12 col-sm-12 col-xs-12 hidden-sm hidden-xs">
        <a class="ico-en pull-right" ng-click="setLanguage('eng')"><img class="img-responsive" src="/web/bundles/bloodwindowbw/theme/images/ico-eng.png" alt="" /></a>
        <a class="ico-es pull-right" ng-click="setLanguage('esp')"><img class="img-responsive" src="/web/bundles/bloodwindowbw/theme/images/ico-esp.png" alt="" /></a>
      </div>
      <div class="clearfix"></div>

      <!-- Here is where the HTML is load depending on the URL -->
      <div ng-view class="fade-in">
      </div>

    </section>

    <div class="clearfix"></div>
    
    <footer class="navbar navbar-default redes" ng-controller="SidebarCtrl">
      <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">&nbsp;</div>
      <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 text-center">
        <a href="#">
          <div class="item-red">
            <i class="icon-facebook text-center" href="#" alt="Facebook"></i>
          </div>
        </a>
      </div>
      <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 text-center">
        <a href="#">
          <div class="item-red">
            <i class="icon-twitter text-center" href="#" alt="Facebook"></i>
          </div>
        </a>
      </div>
      <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 text-center">
        <a href="#">
          <div class="item-red">
            <i class="icon-instagram text-center" href="#" alt="Facebook"></i>
          </div>
        </a>
      </div>
      <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 text-center">
        <a href="#">        
          <div class="item-red">
            <i class="icon-youtube text-center" href="#" alt="Facebook"></i>
          </div>
        </a>
      </div>
      <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">&nbsp;</div>

      <div class="clearfix"></div>

      <div class="col-lg-2 col-md-2 col-sm-2 hidden-xs">&nbsp;</div>
      <nav class="menufut col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <ul class="list-inline text-center">
          <li ng-repeat="page in languageHeader.menu" class="text-center"><a href="#{{page.url}}" alt="{{page.title}}">{{page.title}}</a></li>
          <!--
          <li class="active text-center"><a href="#" alt="Todos">Todos</a></li>
          <li class="text-center"><a href="#" alt="Horror">Horror</a></li>
          <li class="text-center"><a href="#" alt="Gore">Gore</a></li>
          <li class="text-center"><a href="#" alt="Sci-fi">Sci-fi</a></li>
          <li class="text-center"><a href="#" alt="Thrillers">Thrillers</a></li>
          <li class="text-center"><a href="#" alt="Comedias negras">Comedias negras</a></li>
          <li class="text-center"><a href="#" alt="Industria">Industria</a></li>
          -->
        </ul> 
      </nav>
      <div class="col-lg-2 col-md-2 col-sm-2 hidden-xs">&nbsp;</div>
    </footer>
    <div class="clearfix"></div>
    <p class="copyright text-center">
      Copyright © 2014  - All rights reserved
    </p>
  </div>
	
</body>
</html>