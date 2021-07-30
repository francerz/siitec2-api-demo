<?php
/**
 * Archivo: logout.php
 * Revoca las claves y perfil de usuario identificado.
 */
// Cargar liberías
use ITColima\SiitecApi\SiitecApi;

// Inicializar entorno de la aplicación.
require_once dirname(__DIR__).'/bootstrap.php';

// Inicializar instancia de la API.
$siitecApi = new SiitecApi();

// Revocar el Access Token y datos del perfil de usuario identificado.
$response = $siitecApi->handleLogout();

// Redirigir a la página principal (index.php)
$siitecApi->emitResponse($response);
