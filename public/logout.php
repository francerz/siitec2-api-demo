<?php
/**
 * Archivo: logout.php
 * Revoca las claves y perfil de usuario identificado.
 */
// Cargar liberías

use Francerz\Http\Server;
use ITColima\Siitec2\Api\Siitec2Api;

// Inicializar entorno de la aplicación.
require_once dirname(__DIR__).'/bootstrap.php';

// Para un correcto funcionamiento de la API se requiere utilizar sesiones.
session_start();

// Inicializar instancia de la API.
$api = new Siitec2Api();

// Revocar el Access Token y datos del perfil de usuario identificado.
$response = $api->handleLogout();

// Redirigir a la página principal (index.php)
Server::new()->emitResponse($response);
