var app = angular.module('app')
.controller('categoriasController', function($scope, $http, $resource) {
	$scope.categorias = [];
	$scope.filtro = '';
	$scope.categoria = {};
	$scope.mensagem = '';
	
	$http.get('categorias').success(function(retorno){
		console.log(retorno);
		$scope.mensagem = "Lista de Categorias";
		$scope.categorias = retorno;
	}).error(function(erro){
		console.log(erro);
	});
});