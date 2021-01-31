<?php
/**
 * Archivo: logout.php
 * Revoca las claves y perfil de usuario identificado.
 */
// Cargar liberías
use ITColima\Siitec2\Api\Siitec2Api;

// Inicializar entorno de la aplicación.
require_once dirname(__DIR__).'/bootstrap.php';

// Para un correcto funcionamiento de la API se requiere utilizar sesiones.
session_start();

// Inicializar instancia de la API.
$api = new Siitec2Api();

// Revocar el Access Token y datos del perfil de usuario identificado.
$api->revoke();

// Redirigir a la página principal (index.php)
http_response_code(307);
header('Location:'.$api->getRedir($_ENV['BASE_URL'].'/index.php'));