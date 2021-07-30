<?php
/**
 * Archivo: index.php
 * Muestra un menú de opciones, además de incluir el nombre de usuario identificado.
 */
// Cargar librería
use ITColima\SiitecApi\SiitecApi;

// Inicializar entorno de la aplicación.
require_once dirname(__DIR__).'/bootstrap.php';

// Inicializar instancia de la API.
$siitecApi = new SiitecApi();
?>
<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demostración API de SIITEC</title>
</head>
<body>
    <h1>Demostración de API de SIITEC</h1>
    <?php if ($perfil = $siitecApi->getPerfil()): ?>
    <p>Identificado como: <strong><?=$perfil->usuario?></strong></p>
    <?php else: ?>
    <p>Identificado como: <strong>Nadie</strong></p>
    <?php endif; ?>
    <ul>
        <li><a href="./login.php">Inicio de sesión</a></li>
        <li><a href="./perfil.php">Mostrar perfil de usuario</a></li>
        <li><a href="./logout.php">Cierre de sesión</a></li>
    </ul>
</body>
</html>