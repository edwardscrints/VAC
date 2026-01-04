# Guía de Despliegue - Vida Arte y Cultura

## Desarrollo Local

### Configuración de Base de Datos Local
El archivo `.env` está configurado para desarrollo local con MySQL. Si no tienes MySQL instalado, tienes dos opciones:

**Opción 1: Instalar MySQL/MariaDB localmente**
- Descargar: https://dev.mysql.com/downloads/installer/
- Crear base de datos: `CREATE DATABASE vac_local;`
- Actualizar `.env` con tus credenciales MySQL locales

**Opción 2: Usar el .env de producción temporalmente**
```bash
# Respaldar .env actual
cp .env .env.local

# Copiar configuración de producción
cp .env.production .env

# Cuando termines de desarrollar, restaurar
cp .env.local .env
```

### Iniciar servidor de desarrollo
```bash
php artisan serve
```

---

## Conexión SSH
```bash
ssh -p 65002 u193853464@195.179.239.202
# Contraseña: key.Master:2024**
```

## Paso 1: Subir archivos al servidor

Desde tu computadora local, usa rsync para subir los archivos:

```bash
rsync -avz -e "ssh -p 65002" \
  --exclude='.git' \
  --exclude='node_modules' \
  --exclude='.env.dev' \
  --exclude='storage/logs/*' \
  --exclude='storage/framework/cache/*' \
  --exclude='storage/framework/sessions/*' \
  --exclude='storage/framework/views/*' \
  ./ u193853464@195.179.239.202:/home/u193853464/domains/vidaarteycultura.com/
```

## Paso 2: Configurar la estructura

En el servidor, los archivos deben estar así:
```
/home/u193853464/domains/vidaarteycultura.com/
├── app/
├── bootstrap/
├── config/
├── database/
├── public/          ← Este es el DocumentRoot
├── resources/
├── routes/
├── storage/
├── vendor/
├── .env
├── artisan
├── composer.json
└── deploy.sh
```

El servidor debe apuntar a: `/home/u193853464/domains/vidaarteycultura.com/public`

## Paso 3: Ejecutar el script de despliegue

Conéctate por SSH y ejecuta:
```bash
cd /home/u193853464/domains/vidaarteycultura.com
chmod +x deploy.sh
./deploy.sh
```

## Paso 4: Verificar configuración

1. Verificar .env:
```bash
cat .env | grep APP_ENV
# Debe mostrar: APP_ENV=production
```

2. Verificar permisos:
```bash
ls -la storage/
ls -la bootstrap/cache/
```

3. Verificar conexión a base de datos:
```bash
php artisan migrate:status
```

## Configuración del servidor web

### Si usas Apache (.htaccess)

Asegúrate de que el DocumentRoot apunte a:
```
/home/u193853464/domains/vidaarteycultura.com/public
```

Y que el archivo `public/.htaccess` exista con:
```apache
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteRule ^(.*)$ public/$1 [L]
</IfModule>
```

## Comandos útiles

Limpiar cachés:
```bash
php artisan optimize:clear
```

Ver logs:
```bash
tail -f storage/logs/laravel.log
```

Regenerar APP_KEY (si es necesario):
```bash
php artisan key:generate --force
```

## Troubleshooting

### Error 500
- Verificar permisos: `chmod -R 775 storage bootstrap/cache`
- Ver logs: `tail -f storage/logs/laravel.log`
- Verificar .env

### Error de base de datos
- Verificar credenciales en .env
- Probar conexión: `php artisan tinker` → `DB::connection()->getPdo();`

### Assets no cargan
- Verificar que exista: `public/build/manifest.json`
- Ejecutar: `php artisan storage:link`
- Verificar ruta en .env: `APP_URL=https://vidaarteycultura.com`
