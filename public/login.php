<?php
/**
 * Archivo: public/login.php
 * Establecer la URI como manejadora del inicio de sesión.
 */
// Cargar liberías

use Francerz\Http\HttpFactory;
use Francerz\Http\Server;
use Francerz\Http\Utils\HttpHelper;
use ITColima\Siitec2\Api\Scopes;
use ITColima\Siitec2\Api\Siitec2Api;

// Inicializar entorno de la aplicación.
require_once dirname(__DIR__).'/bootstrap.php';

// Para un correcto funcionamiento de la API se requiere contar con sesiones.
session_start();

// Inicializar instancia de API
$api = new Siitec2Api();

$http = HttpFactory::getHelper();

// Verificar si hay sesión iniciada, si es así redirigir a donde señale el
// parámetro `redir` de la URL o a "index.php"
if ($api->isLoggedIn()) {
    $response = $http->makeRedirect($api->getRedir($_ENV['BASE_URL'].'/index.php'));
    Server::new()->emitResponse($response);
    return;
}

// Estableceer URL donde se recibirá el inicio de sesión de SIITEC 2
$loginHandlerUri = $_ENV['BASE_URL'].'/login_handler.php';
$logoutUri = $_ENV['BASE_URL'].'/logout.php';
$scopes = [Scopes::GET_USUARIO_PERFIL_OWN];
$csrfKey = '';
$response = $api->login($loginHandlerUri, $logoutUri, $scopes, $csrfKey);
Server::new()->emitResponse($response);