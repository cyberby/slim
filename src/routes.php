<?php
use src\Middleware\Login;
// Routes

$app->get('/', function ($request, $response, $args) use ($app){
    if($this->session->exists("usuario_logado") OR !empty($this->session->get("usuario_logado"))){
        return $response->withRedirect( $request->getUri()->getBasePath() . '/users/');
    }

    $this->logger->info("Slim-Skeleton '/' route");
    $db = $app->getContainer()->get('db');
    return $this->renderer->render($response, 'index.php', $args);

});

$app->post('/', function ($request, $response, $args) use ($app) {
    $message = "";
    $email = $request->getParsedBodyParam("email");
    $password = $request->getParsedBodyParam("password");

    if($this->session->exists("usuario_logado")){
        return json_encode(array(
            'success' => true,
            'message' => "Você já está logado no sistema."
        ));
    }

    if(!empty($email) and !empty($password)){
        $db = $app->getContainer()->get('db');
        $this->logger->info("Slim-Skeleton '/' route");
        $user = $db->table("users")
                ->where("email", $email)
                ->where("password", $password)
                ->get()->first();
        if(!empty($user)){
            $this->session->set("usuario_logado", $user);
            return json_encode(array(
                'success' => true,
                'message' => 'Login efetuado com sucesso'
            ));
        } else{
            $message = "Email ou senha inválido";
        }
    } else {
        $message = "Insira o email e senha";

    }
    return json_encode(array(
        'success' => false,
        'message' => $message
    ));

});

$app->get("/logout", function ($request, $response, $args) use ($app) {
    if($this->session->exists("usuario_logado")){
        $this->session->delete("usuario_logado");
    }
    return $response->withRedirect( $request->getUri()->getBasePath()); 
});


$app->get('/users/', function ($request, $response, $args) use ($app) {
    if(empty($request->getQueryParam("ajax"))){
        return $this->renderer->render($response, 'users_index.php', $args);        
    } else {
        $usuario_logado = $this->session->get("usuario_logado");
        $db = $app->getContainer()->get('db');
        $user = $db->table("users")
                ->where("id", $usuario_logado->id)
                ->get()->first();
        unset($user->id);
        unset($user->password);

        return json_encode(array(
            'success' => true,
            'record' => $user
        ));
    }
})->add(src\Middleware\LoginMiddleware::class);

$app->get('/users/edit', function ($request, $response, $args) use ($app) {
    $args['usuario_logado'] = $this->session->get("usuario_logado");
    $db = $app->getContainer()->get('db');
    $estados = $db->table("states")->get()->all();
    if(!empty($estados)){
        $args['estados'] = $estados;
    }
    return $this->renderer->render($response, 'users_edit.php', $args);
})->add(src\Middleware\LoginMiddleware::class);

$app->post('/users/edit', function ($request, $response, $args) use ($app) {
    $message = '';
    $args['usuario_logado'] = $usuario_logado = $this->session->get("usuario_logado");

    $db = $app->getContainer()->get('db');
    $params = $request->getParsedBody();
    $data = array();

    foreach ($params as $key => $param) {
        if($key == "password" and $param == "") continue;
        $data[$key] = $param;
    }


    $salvo = $db
            ->table('users')
            ->where('id', $usuario_logado->id)
            ->update($data);
            
            
    if(!empty($salvo)){
        $args['mensagem'] = "Salvo com sucesso";

        $user = $db->table("users")
                ->where("id", $usuario_logado->id)
                ->get()->first();
        //$this->session->set("usuario_logado", $usuario_logado);
        $user_data = new stdClass();
        foreach ($user as $key => $value) {
            if($key == "password" || $key == "id") continue;
            $user_data->{$key} = $value;
        }
        
        $this->session->set("usuario_logado", $user);
        return json_encode(array(
            'success' => true,
            'message' => 'Salvo com successo!',
            'record' => $user_data
        ));

    } else {
        $message = "Ocorreu um erro. Tente novamente";
    }
    return json_encode(array(
        'success' => false,
        'message' => $message
    ));
})->add(src\Middleware\LoginMiddleware::class);;