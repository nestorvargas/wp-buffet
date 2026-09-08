# Despliegue en producción — ADA Abogados (wp-buffet)

## Servidor

- **IP**: 68.183.135.65 (DigitalOcean Droplet, Ubuntu 24.04 LTS, NYC1)
- **Usuario SSH**: root
- **Llave SSH**: `~/.ssh/id_rsa`
- **Dominio**: https://adaderecholaboral.com (SSL con Let's Encrypt / Certbot, autorenovación activa)
- **Ruta del sitio**: `/var/www/adaderecholaboral.com/html`

Conexión:
```
ssh -i ~/.ssh/id_rsa root@68.183.135.65
```

## Stack instalado

- Nginx 1.24 (ya existía, config en `/etc/nginx/sites-available/adaderecholaboral.com`)
- PHP 8.3-FPM (`php8.3-fpm`, socket en `/run/php/php8.3-fpm.sock`)
- MariaDB 10.11 (`mariadb-server`)

## Base de datos

- **DB_NAME**: `wp_ada`
- **DB_USER**: `wp_ada_user`
- **DB_PASSWORD**: ver `/var/www/adaderecholaboral.com/html/wp-config.php` en el servidor (no se guarda en texto plano en este repo)
- **DB_HOST**: `localhost`
- **Prefijo de tablas**: `wp_`

Dump usado para la carga inicial: `dumps/bd_sql.sql.gz` (el otro dump, `dumps/bd_buffet.sql.gz`, no se usó). Al importar se reemplazó la URL local de ddev (`https://wp-buffet.ddev.site:8577`) por `https://adaderecholaboral.com` en `siteurl`/`home`.

## Usuario admin de WordPress (del dump importado)

- **user_login**: `admin`
- **user_email**: nestorfabian.92@gmail.com
- La contraseña es la que ya tenía el usuario en la base de datos importada (no se reseteó). Si no se recuerda, resetear desde `wp-login.php` → "¿Olvidaste tu contraseña?" o vía `wp-cli`/SQL en el servidor.

## wp-config.php de producción

Generado manualmente (no es el de ddev). Diferencias clave respecto al local:
- Credenciales de DB reales (arriba).
- `WP_HOME` y `WP_SITEURL` fijados a `https://adaderecholaboral.com`.
- Salts/keys de autenticación regenerados desde la API oficial de WordPress.
- `FS_METHOD` en `direct` (permite actualizar plugins/temas desde el admin sin pedir FTP).

## Nginx

Se agregó bloque PHP-FPM al server block existente (antes era sitio estático). Backup de la config anterior en el propio servidor: `/etc/nginx/sites-available/adaderecholaboral.com.bak-<timestamp>`.

## Permisos

- Propietario de todo `/var/www/adaderecholaboral.com/html`: `www-data:www-data`.
- Directorios `755`, archivos `644`, `wp-config.php` en `640`.
- `wp-content/uploads` confirmado con permiso de escritura para `www-data`.

## Pendientes / recomendaciones

- No se instaló WP-CLI en el servidor — si se necesita, `wp-cli.phar` facilita mantenimiento (updates, resets de password, etc.).
- No se configuró backup automático de la base de datos ni de archivos en el servidor.
- Revisar/renombrar el usuario `admin` y su contraseña por una más segura si viene de un entorno de desarrollo.
- El segundo dump (`dumps/bd_buffet.sql.gz`) quedó sin usar; confirmar si corresponde a otra versión/entorno antes de descartarlo.
