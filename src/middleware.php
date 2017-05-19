<?php
// Application middleware

// e.g: $app->add(new \Slim\Csrf\Guard);

namespace src\Middleware;
class LoginMiddleware {
	public function __invoke($request, $response, $next){
		 $session = new \SlimSession\Helper; // or $this->session if registered

		if(!$session->exists("usuario_logado") OR empty($session->get("usuario_logado"))){
			//echo "redirecionamento para ". $request->getUri()->getBasePath(); exit();
			return $response->withRedirect( $request->getUri()->getBasePath()); 
		}
		
		return $next($request, $response);
	}
}
