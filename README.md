Demostración de API de SIITEC 2
=======================================

Este respositorio es un ejemplo del uso de la API de SIITEC 2.

Instalación
---------------------------------------

Este proyecto de demostración utiliza la herramienta
[composer](https://getcomposer.org) para hacer la carga automática de clases,
por lo que se requiere la instalación previo a continuar con este instructivo.

Ejecutar el siguiente comando para hacer la instalación asistida:
```bash
composer install
```

> Al ejecutar el comando anterior se realizará la descarga de paquetes y
> dependencias de la aplicación, estos serán almacenados en el directorio
> `vendor` del proyecto.

Configuración
---------------------------------------

Para la inicialización de parámetros predeterminados se recomienda utilizar
el archivo de configuración `.env`. En el actual proyecto se encuentra el
archivo de muestra `.env.dist` con los parámetros recomendados de configuración.

**En Windows**
```bash
copy .env.dist .env
```

**En Linux y Mac OS**
```bash
cp .env.dist. env
```

En el archivo `.env` se deberá modificar el valor de los parámeros
`SIITEC2_API_CLIENT_ID` y `SIITEC2_API_CLIENT_SECRET` con valores funcionales.

> Los valores de `<client_id>` y `<client_secret>` son proporcionados por el
> Departamento de Centro de Cómputo del Instituto Tecnológico de Colima.

Ejecución
---------------------------------------

Para probar la aplicación se puede utilizar el servidor integrado en php.

```bash
php -S localhost:8080 -t public
```

Una vez ejecutado el comando anterior se podrá acceder a la aplicación mediante
la dirección http://localhost:8080