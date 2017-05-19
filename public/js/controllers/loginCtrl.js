angular.module("slimApp").controller("loginCtrl", function($scope, $http, $location, $browser, $window){
	var domainBase = new $window.URL($location.absUrl()).origin;//pega o domínio base
	var urlBase = document.getElementById('urlBase');//pega o caminho base
	var url = domainBase + urlBase.value //seta a url de base

	$scope.exibirMensagem = false;
	$scope.fazerLogin = function (login) {
		$http.post(url+"/", login).success(function (data) {

			if(data.success == true){//vai setar o tipo de alerta
				$scope.messageType = "alert-success";
			} else {
				$scope.messageType = "alert-danger";
			}
			$scope.user.success = data.success;//seta se foi bem sucessido o login

			$scope.message = data.message;//atribui mensagem
			$scope.exibirMensagem = true;//seta se vai exibir a mensagem
			
			if(data.success == true){
				window.location = url+'/users/'; //faz o redirecionamento para exibir os dados do usuário
			}
			
		});
	};
});