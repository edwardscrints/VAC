#!/bin/bash

# Script de despliegue para Vida Arte y Cultura
# Ejecutar en el servidor después de subir los archivos

echo "🚀 Iniciando despliegue..."

# Directorio de la aplicación
cd /home/u193853464/domains/vidaarteycultura.com || exit

# Instalar dependencias de Composer
echo "📦 Instalando dependencias de Composer..."
composer install --optimize-autoloader --no-dev

# Configurar permisos
echo "🔐 Configurando permisos..."
chmod -R 755 storage bootstrap/cache
chmod -R 775 storage/app
chmod -R 775 storage/framework
chmod -R 775 storage/logs

# Limpiar cachés
echo "🧹 Limpiando cachés..."
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Optimizar para producción
echo "⚡ Optimizando aplicación..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Crear enlace simbólico de storage
echo "🔗 Creando enlace simbólico de storage..."
php artisan storage:link

# Ejecutar migraciones
echo "💾 Ejecutando migraciones..."
php artisan migrate --force

echo "✅ Despliegue completado exitosamente!"
