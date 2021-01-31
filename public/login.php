<?php
/**
 * Archivo: public/login.php
 * Establecer la URI como manejadora del inicio de sesión.
 */
// Cargar liberías
use ITColima\Siitec2\Api\Siitec2Api;

// Inicializar entorno de la aplicación.
require_once dirname(__DIR__).'/bootstrap.php';

// Para un correcto funcionamiento de la API se requiere contar con sesiones.
session_start();

// Inicializar instancia de API
$api = new Siitec2Api();

// Verificar si hay sesión iniciada, si es así redirigir a donde señale el
// parámetro `redir` de la URL o a "index.php"
if ($api->getPerfil()) {
    http_response_code(307);
    header('Location:'.$api->getRedir($_ENV['BASE_URL'].'/index.php'));
    return;
}

// Estableceer URL donde se recibirá el inicio de sesión de SIITEC 2
$api->setLoginHandlerUri($_ENV['BASE_URL'].'/login_handler.php');

// Realizar inicio de sesión con $scopes y $csrfKey opcionales.
$api->performLogin();