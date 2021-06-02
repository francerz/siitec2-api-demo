<?php
/**
 * Archivo: public/perfil.php
 * Recupera los datos de perfil y los presenta en formato JSON.
 */
// Cargar liberías.

use Francerz\Http\HttpFactory;
use Francerz\Http\Server;
use Francerz\Http\Utils\HttpHelper;
use ITColima\Siitec2\Api\Siitec2Api;

// Inicializar entorno de la aplicación.
require_once dirname(__DIR__).'/bootstrap.php';

// Para un correcto funcionamiento de la API se requiere utilizar sesiones.
session_start();

// Inicializar instancia de la API.
$api = new Siitec2Api();

$http = HttpFactory::getHelper();
// Si no hay sesión disponible, se requiere inicio de sesión.
if (!$api->isLoggedIn()) {
    $response = $http->makeRedirect($api->redirectAuthUri($_ENV['BASE_URL'].'/login.php'));
    Server::new()->emitResponse($response);
    return;
}

// Recuperar objeto del perfil de usuario identificado.
$perfil = $api->getPerfil();

// Despliega los datos del perfil en formato JSON.
header('Content-Type:application/json');
echo json_encode($perfil);