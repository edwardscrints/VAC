# Sistema de Variantes de Productos

Este proyecto implementa el sistema de variantes de Lunar para productos con múltiples opciones (tallas, colores, presentaciones, etc.).

## 📦 Estado Actual

- **360 productos** en base de datos
- **1 producto con variantes**: Schwarzkopf Igora Royal (17 tonalidades de color)
- **Seeder completamente funcional** con soporte para variantes

## 🗂️ Estructura del JSON

### Producto Simple (sin variantes)
```json
{
  "attributes": {
    "name": "Nombre del Producto",
    "description": "Descripción del producto"
  },
  "brand": "Marca",
  "collections": ["coleccion-1", "coleccion-2"],
  "sku": "SKU-001",
  "price": "15000",
  "image": "placeholder.jpg"
}
```

### Producto con Variantes
```json
{
  "attributes": {
    "name": "Schwarzkopf Igora Royal Tintura Permanente",
    "description": "Coloración profesional permanente..."
  },
  "brand": "Schwarzkopf",
  "collections": ["cuidado-capilar", "schwarzkopf", "tinturas"],
  "sku": "IGR-BASE",
  "image": "placeholder.jpg",
  "options": [
    {
      "name": "Tonalidad",
      "values": [
        "1-1 Azul Negro",
        "2-1 Negro Azulado",
        "3-0 Castaño Oscuro"
      ]
    }
  ],
  "variants": [
    {"sku": "IGR-001", "price": "32900", "values": ["1-1 Azul Negro"]},
    {"sku": "IGR-002", "price": "32900", "values": ["2-1 Negro Azulado"]},
    {"sku": "IGR-003", "price": "32900", "values": ["3-0 Castaño Oscuro"]}
  ]
}
```

### Campos Requeridos para Variantes

#### `options[]`
- **name**: Nombre de la opción (ej: "Tonalidad", "Talla", "Presentación")
- **values[]**: Array con los valores disponibles

#### `variants[]`
- **sku**: SKU único para la variante
- **price**: Precio de la variante (string)
- **values[]**: Array con los valores que aplican (deben coincidir con los de `options.values`)

## 🚀 Comandos Artisan

### Importar Productos
```bash
php artisan products:import
```
Importa todos los productos desde `database/seeders/data/products.json`

### Crear Igora Royal (Ejemplo)
```bash
php artisan products:create-igora
```
Crea el producto Schwarzkopf Igora Royal con 17 variantes de color

## 🔄 Seeding Completo

```bash
php artisan migrate:fresh --seed
```

Ejecuta en orden:
1. LanguageSeeder
2. CurrencySeeder
3. CollectionSeeder
4. AttributeSeeder
5. TaxSeeder
6. ProductSeeder (con soporte de variantes)

## 📝 Archivos Modificados

### `database/seeders/ProductSeeder.php`
- ✅ Detecta automáticamente productos con variantes (`isset($product->variants)`)
- ✅ Crea `ProductOption` y `ProductOptionValue`
- ✅ Vincula variantes con valores mediante pivot table
- ✅ Sincroniza con MeiliSearch

### `database/seeders/TaxSeeder.php`
- ✅ Usa `firstOrCreate()` en lugar de factories
- ✅ No requiere Faker
- ✅ Incluye campo `price_display` obligatorio

### `database/seeders/data/products.json`
- ✅ 360 productos (359 originales + Igora Royal)
- ✅ Encoding UTF-8 (compatible con PHP)
- ✅ Backup disponible: `products_BACKUP_20260108_190448.json`

## 🔍 Verificación

### Ver producto en frontend
```
http://127.0.0.1:8000/products/schwarzkopf-igora-royal-tintura-permanente
```

### Ver en admin
```
http://127.0.0.1:8000/admin
```

## 💡 Agregar Más Productos con Variantes

1. Editar `database/seeders/data/products.json`
2. Agregar producto con estructura de variantes (ver ejemplo arriba)
3. Ejecutar: `php artisan migrate:fresh --seed`

O crear comando personalizado como `CreateIgoraRoyal.php`

## ⚠️ Notas Importantes

- **Encoding**: El JSON debe guardarse en **UTF-8** (usar PHP para escribir JSON, no PowerShell)
- **SKUs únicos**: Cada variante debe tener un SKU diferente
- **Valores coincidentes**: Los `values` en variantes deben existir en `options.values`
- **MeiliSearch**: Debe estar corriendo en http://127.0.0.1:7700

## 📦 Backups

- `products_BACKUP_20260108_190448.json` - 359 productos originales sin variantes
- Restaurar backup: `Copy-Item database/seeders/data/products_BACKUP_*.json database/seeders/data/products.json`
