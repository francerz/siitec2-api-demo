<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
/**
 * Archivo: public/login_handler.php
 * Manejar la respuesta del servidor al iniciar sesión.
 */
// Cargar liberías
use ITColima\SiitecApi\SiitecApi;

// Inicializar entorno de la aplicación.
require_once dirname(__DIR__).'/bootstrap.php';

// Inicializar instancia de API
$siitecApi = new SiitecApi();

// Capturar la petición entrante y permitir a la librería gestionar el proceso.
$siitecApi->handleLogin();

// Una vez concluído el inicio de sesión, redirigir a principal.php
$response = $siitecApi->redirectTo($siitecApi->getRedir($siitecApi->baseUrl()));
$siitecApi->emitResponse($response);