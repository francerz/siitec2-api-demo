<?php
/**
 * Archivo: public/login.php
 * Establecer la URI como manejadora del inicio de sesión.
 */
// Cargar libería de SiitecApi
use ITColima\SiitecApi\SiitecApi;

// Inicializar entorno de la aplicación.
require_once dirname(__DIR__).'/bootstrap.php';

// Inicializar instancia de API
$siitecApi = new SiitecApi();

// Verificar si hay sesión iniciada, si es así redirigir a donde señale el
// parámetro `redir` de la URL o a "index.php"
if ($siitecApi->isLoggedIn()) {
    $response = $siitecApi->redirectTo($siitecApi->getRedir($siitecApi->baseUrl()));
    $siitecApi->emitResponse($response);
    exit;
}

// Estableceer URL donde se recibirá el inicio de sesión de SIITEC
$response = $siitecApi->login(
    $siitecApi->baseUrl('login_handler.php'),
    $siitecApi->baseUrl('logout.php')
);
$siitecApi->emitResponse($response);