
<?php
/**
 * Archivo: public/login_handler.php
 * Manejar la respuesta del servidor al iniciar sesión.
 */
// Cargar liberías
use ITColima\Siitec2\Api\Siitec2Api;

// Inicializar entorno de la aplicación.
require_once dirname(__DIR__).'/bootstrap.php';

// Para un correcto funcionamiento de la API se requiere contar con sesiones.
session_start();

// Inicializar instancia de API
$api = new Siitec2Api();

// Capturar la petición entrante y permitir a la librería gestionar el proceso.
$api->handleLogin();

// Una vez concluído el inicio de sesión, redirigir a principal.php
http_response_code(307);
header('Location:'.$api->getRedir($_ENV['BASE_URL'].'/index.php'));