<!DOCTYPE html>
<html ng-app="slimApp">
<head>
	<title>Alterar Dados</title>
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
					<li >
						<a href="<?= $this->base_url; ?>/users/"><i class="fa fa-user"></i> Lista de dados</a>
					</li>
					<li class="active">
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
							<h1>Alterar Dados</h1>
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
			<div id="exibir-mensagem" ng-class="messageType" class="alert" ng-show="exibirMensagem">
				{{message}}
			</div>
			<div class="content">
				<div class="row">
					<div class="col-md-12">
						<!-- <form class="form-horizontal" action="<?= $this->base_url; ?>/users/edit" method="POST"> -->

						<div id="message-box">
							<div class="alert alert-danger" ng-show="userForm.name.$error.required && userForm.name.$dirty">O campo nome é obrigatório</div>
							<div class="alert alert-danger" ng-show="userForm.email.$error.required && userForm.email.$dirty">O campo email é obrigatório</div>
							<div class="alert alert-danger" ng-show="userForm.email.$error.email && userForm.email.$dirty">O campo email deve conter um email válido</div>
							<div class="alert alert-danger" ng-show="userForm.cpf.$error.required && userForm.cpf.$dirty">O campo cpf é obrigatório</div>
							<div class="alert alert-danger" ng-show="userForm.cep.$error.required && userForm.cep.$dirty">O campo cep é obrigatório</div>
							<div class="alert alert-danger" ng-show="userForm.address.$error.required && userForm.address.$dirty">O campo endereço é obrigatório</div>
							<div class="alert alert-danger" ng-show="userForm.city.$error.required && userForm.city.$dirty">O campo cidade é obrigatório</div>
							<div class="alert alert-danger" ng-show="userForm.state.$error.required && userForm.state.$dirty">O campo estado é obrigatório</div>
						</div>
						<form name="userForm">
							<div >
								<div class="form-group" style="width: 300px;">
									<label for="nome" class="control-label">Nome</label>
									<div class="form-box">
										<input name="name" ng-model="user.name" type="text" class="form-control" ng-required="true" campo="Nome">
									</div>
								</div>									
							</div>
							<div>
								<div class="form-group" style="width: 300px;">
									<label for="nome" class="control-label">Email</label>
									<div class="form-box">
										<input ng-model="user.email" type="Email" class="form-control" id="email" name="email" value="<?= $usuario_logado->email; ?>" ng-required="true" campo="Email"> 
									</div>
								</div>									
							</div>
							<div>
								<div class="form-group" style="width: 250px;">
									<label for="nome" class="control-label">CPF</label>
									<div class="form-box">
										<input ng-model="user.cpf" type="text" class="form-control" id="cpf" name="cpf" value="<?= $usuario_logado->cpf; ?>" ng-required="true" ui-mask="999.999.999-99" ng-cpf>
									</div>
								</div>									
							</div>
							<div>
								<div class="form-group" style="width: 200px;">
									<label for="cep" class="control-label">CEP</label>
									<div class="form-box">
										<input ng-model="user.cep" type="text" class="form-control" id="cep" name="cep" value="<?= $usuario_logado->cep; ?>" ng-required="true" ui-mask="99999-999">
									</div>
								</div>									
							</div>
							<div>
								<div class="form-subcontainer" style="width: 300px;">
									<div class="form-group" >
										<label for="endereco" class="control-label">Endereço</label>
										<div class="form-box">
											<input  ng-model="user.address" type="text" class="form-control" id="address" name="address" value="<?= $usuario_logado->address; ?>" ng-required="true">
										</div>
									</div>																		
								</div>
								<div class="form-subcontainer" style="width: 200px;">
									<div class="form-group" >
										<label for="numero" class="control-label">Número</label>
										<div class="form-box">
											<input ng-model="user.number" type="text" class="form-control" id="number" name="number" value="<?= $usuario_logado->number; ?>">
										</div>
									</div>																		
								</div>
								<div class="form-subcontainer" style="width: 300px;">
									<div class="form-group">
										<label for="complemento" class="control-label" style="width: 110px;">Complemento</label>
										<div class="form-box" style="width: calc(100% - 110px)">
											<input ng-model="user.complement" type="text" class="form-control" id="complement" name="complement" value="<?= $usuario_logado->complement; ?>">
										</div>
									</div>																		
								</div>
								
							</div>
							<div>
								<div class="form-subcontainer" style="width: 250px;">
									<div class="form-group" >
										<label for="cidade" class="control-label">Cidade</label>
										<div class="form-box">
											<input ng-model="user.city" type="text" class="form-control" id="city" name="city" value="<?= $usuario_logado->city; ?>" ng-required="true">
										</div>
									</div>																		
								</div>
								<div class="form-subcontainer" style="width: 250px;">
									<div class="form-group" >
										<label for="numero" class="control-label">Estado</label>
										<div class="form-box">
											<select ng-model="user.state" class="form-control" id="state" name="state" ng-required="true">
												<option></option>
												<?php 
													if(!empty($estados)){
														foreach ($estados as $estado) {
															$selected = ($estado->name == $usuario_logado->state) ? "selected='selected'" : '';
												?>
												<option value="<?= $estado->name; ?>" <?= $selected; ?>><?= $estado->name; ?></option>
												<?php
														}
													}
												?>
											</select>
										</div>
									</div>																		
								</div>
							</div>
							<div>
								<div id="nova-senha" class="form-group password-box" style="width: 250px;">
									<label for="nova-senha-input" class="control-label">Nova Senha</label>
									<div class="form-box">
										<input name="password" ng-model="user.password" type="password" class="form-control" id="nova-senha-input" ng-pattern="/^(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{2,}$/">
									</div>
								</div>
								<div class="password-message" ng-show="userForm.password.$error.pattern"><i class="fa fa-exclamation-circle"></i> Sua senha precisa ter pelo menos uma letra maiúscula e um número</div>
							</div>
							<div>
								<div id="repetir-senha" class="form-group  password-box" style="width: 250px;">
									<label for="repetir-senha-input" class="control-label">Repetir Senha</label>
									<div class="form-box">
										<input type="password" class="form-control" id="repetir-senha-input" ng-pattern="/^(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{2,}$/">
									</div>
								</div>									
							</div>
							<div>
								<button type="button" class="btn btn-success" ng-disabled="userForm.$invalid" ng-click="editarUser(user)">ALTERAR</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>