<!DOCTYPE html>
<html ng-app="slimApp">
	<head>
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link href="https://fonts.googleapis.com/css?family=Montserrat:100,300,400" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.32/angular.min.js"></script>
		<script type="text/javascript" src="<?= $this->base_url; ?>/js/app.js"></script>
		<script type="text/javascript" src="<?= $this->base_url; ?>/js/controllers/userCtrl.js"></script>
		<script type="text/javascript" src="<?= $this->base_url; ?>/lib/ngCpfCnpj.js"></script>
		<script type="text/javascript" src="<?= $this->base_url; ?>/lib/mask.js"></script>
	</head>
	<body class="login" ng-controller="userCtrl">
		<input type="hidden" id="urlBase" value="<?= $this->base_url; ?>" />
		<div>
		<div class="login-box">
			<div>
				<div class="login-header">
					<i class="fa fa-times-circle-o"></i>
				</div>
				<div class="">
					<!-- <form action="/slim/public/" method="POST"> -->
						<form name="loginForm">
						<div class="login-content">
							<div id="avatar">
								<img src="img/avatar.png" alt="">
							</div>
							<div ng-class="messageType" class="alert" ng-show="exibirMensagem">
								{{message}}
							</div>
							<div class="input-box">
								<div>
									<i class="fa fa-user-circle-o"></i> <input type="text" name="email" placeholder="usuário" ng-model="user.email" />				
								</div>
							</div>
							<div class="input-box">
								<div>
									<i class="fa fa-unlock-alt"></i> <input type="password" name="password" placeholder="senha" ng-model="user.password" />				
								</div>
							</div>
						</div>
						<div>
							<button class="btn-entrar" ng-click="fazerLogin(user)" type="button">ENTRAR</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		</div>

	</body>
</html>