<!DOCTYPE html>
<html ng-app="slimApp">
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="<?= $this->base_url; ?>/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?= $this->base_url; ?>/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="<?= $this->base_url; ?>/css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:100,300,400" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.32/angular.min.js"></script>
	<script type="text/javascript" src="<?= $this->base_url; ?>/js/app.js"></script>
	<script type="text/javascript" src="<?= $this->base_url; ?>/js/controllers/userCtrl.js"></script>
	<script type="text/javascript" src="<?= $this->base_url; ?>/lib/ngCpfCnpj.js"></script>
	<script type="text/javascript" src="<?= $this->base_url; ?>/lib/mask.js"></script>
</head>
<body ng-controller="userCtrl">
	<input type="hidden" id="urlBase" value="<?= $this->base_url; ?>" />
	<div class="container">
		<div id="sidebar">
			<div id="avatar">
				<img src="<?= $this->base_url; ?>/img/avatar.png" alt="">
			</div>
			<div>
				<nav>
					<li class="active">
						<a href="<?= $this->base_url; ?>/users/"><i class="fa fa-user"></i> Lista de dados</a>
					</li>
					<li >
						<a href="<?= $this->base_url; ?>/users/edit"><i class="fa fa-pencil"></i> Alterar dados</a>
					</li>
					<li >
						<a href="<?= $this->base_url; ?>/logout"><i class="fa fa-sign-out"></i> Logout</a>
					</li>
				</nav>				
			</div>
		</div>
		<div id="main">
			<div class="header">
				<div class="row">
					<div class="col-md-8">
						<div>
							<h1>Lista de Dados</h1>
						</div>
						<div>
							Altere seus dados abaixo
						</div>										
					</div>
					<div class="col-md-4">
						<form name="buscaForm">
							<input id="busca" placeholder="Buscar..." />
							<button id="btn-buscar" type="button"><i class="fa fa-search"></i></button>
						</form>
					</div>
				</div>
			</div>
			<div class="content lista-dados">
				<div class="row">
					<div class="col-md-12 list-box">
						<div class="list-title">Nome</div>
						<div class="list-text">{{user.name}}</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 list-box">
						<div class="list-title">Email</div>
						<div class="list-text">{{user.email}}</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 list-box">
						<div class="list-title">CPF</div>
						<div class="list-text">{{user.cpf}}</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 list-box">
						<div class="list-title">CEP</div>
						<div class="list-text">{{user.cep}}</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 list-box">
						<div class="list-title">End.</div>
						<div class="list-text">
							{{user.address}}<span class="list-subtitle">núm.</span> {{user.number}} <span class="list-subtitle">compl.</span> {{user.complement}}
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 list-box">
						<div class="list-title">Cidade</div>
						<div class="list-text">{{user.city}}</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 list-box">
						<div class="list-title">Estado</div>
						<div class="list-text">{{user.state}}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>