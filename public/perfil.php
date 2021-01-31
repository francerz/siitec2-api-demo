<?php
/**
 * Archivo: public/perfil.php
 * Recupera los datos de perfil y los presenta en formato JSON.
 */
// Cargar liberías.
use ITColima\Siitec2\Api\Siitec2Api;

// Inicializar entorno de la aplicación.
require_once dirname(__DIR__).'/bootstrap.php';

// Para un correcto funcionamiento de la API se requiere utilizar sesiones.
session_start();

// Inicializar instancia de la API.
$api = new Siitec2Api();

// Recuperar objeto del perfil de usuario identificado.
$perfil = $api->getPerfil();

// Si el perfil no está disponible, se requiere inicio de sesión.
if (!$perfil) {
    http_response_code(307); //Temporary Redirect
    header('Location:'.$api->redirectAuthUri($_ENV['BASE_URL'].'/login.php'));
    return;
}

// Despliega los datos del perfil en formato JSON.
header('Content-Type:application/json');
echo json_encode($perfil);