<?php
/**
 * Archivo: public/perfil.php
 * Recupera los datos de perfil y los presenta en formato JSON.
 */

// Cargar liberías.
use ITColima\SiitecApi\SiitecApi;

// Inicializar entorno de la aplicación.
require_once dirname(__DIR__).'/bootstrap.php';

// Inicializar instancia de la API.
$siitecApi = new SiitecApi();

// Si no hay sesión disponible, se requiere inicio de sesión.
if (!$siitecApi->isLoggedIn()) {
    $response = $siitecApi->redirectTo(
        $siitecApi->redirectAuthUri($siitecApi->baseUrl('login.php'))
    );
    $siitecApi->emitResponse($response);
    exit;
}

// Recuperar objeto del perfil de usuario identificado.
$perfil = $siitecApi->getPerfil();

// Despliega los datos del perfil en formato JSON.
header('Content-Type:application/json');
echo json_encode($perfil);