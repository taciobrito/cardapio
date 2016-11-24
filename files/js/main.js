angular.module('app', ['ngRoute', 'ngResource'])
.config(function ($routeProvider) {
	$routeProvider.when('/categorias', {
		templateUrl : 'categorias/lista.html',
		controller : 'categoriasController'
	});
	
	$routeProvider.otherwise({redirectTo: '/'});
});