# Script para consolidar productos por presentacion
$jsonPath = "c:\Users\edwar\Working\vac\database\seeders\data\products.json"
$outputPath = "c:\Users\edwar\Working\vac\database\seeders\data\products_consolidated.json"

Write-Host "Leyendo productos..." -ForegroundColor Cyan
$products = Get-Content $jsonPath -Raw | ConvertFrom-Json
Write-Host "Total de productos: $($products.Count)" -ForegroundColor Green

function Get-BaseName {
    param($name)
    $baseName = $name -replace '\s+\d+(\.\d+)?\s*(ml|ML|l|L|gr?|GR?|g|G)\s*$', ''
    return $baseName.Trim()
}

function Get-Presentation {
    param($name)
    if ($name -match '\s+(\d+(\.\d+)?\s*(ml|ML|l|L|gr?|GR?|g|G))\s*$') {
        return $matches[1] -replace '\s+', ''
    }
    return $null
}

Write-Host "Agrupando productos..." -ForegroundColor Cyan
$grouped = @{}

foreach ($product in $products) {
    $baseName = Get-BaseName $product.attributes.name
    $presentation = Get-Presentation $product.attributes.name
    $brand = $product.brand
    $groupKey = "$brand|$baseName"
    
    if (-not $grouped.ContainsKey($groupKey)) {
        $grouped[$groupKey] = @{
            BaseName = $baseName
            Brand = $brand
            Description = $product.attributes.description
            Collections = $product.collections
            Image = $product.image
            Variants = @()
        }
    }
    
    $grouped[$groupKey].Variants += @{
        SKU = $product.sku
        Price = $product.price
        Presentation = if ($presentation) { $presentation } else { "Unica" }
        OriginalName = $product.attributes.name
    }
}

Write-Host "Grupos encontrados: $($grouped.Count)" -ForegroundColor Green
Write-Host "Generando JSON consolidado..." -ForegroundColor Cyan

$consolidated = @()
$baseSkuCounter = 1

foreach ($key in $grouped.Keys | Sort-Object) {
    $group = $grouped[$key]
    
    if ($group.Variants.Count -eq 1 -and $group.Variants[0].Presentation -eq "Unica") {
        $variant = $group.Variants[0]
        $consolidated += [PSCustomObject]@{
            attributes = @{
                name = $variant.OriginalName
                description = $group.Description
            }
            brand = $group.Brand
            collections = $group.Collections
            sku = $variant.SKU
            price = $variant.Price
            image = $group.Image
        }
    }
    else {
        $presentations = $group.Variants | ForEach-Object { $_.Presentation } | Sort-Object -Unique
        $brandPrefix = switch ($group.Brand) {
            "Lissia" { "LIS" }
            "Lehit" { "LEH" }
            "Pal Pluss" { "PAL" }
            "Tio Nacho" { "TNA" }
            "Naissant" { "NAI" }
            "L'Oreal" { "LOR" }
            "Recamier" { "REC" }
            "Schwarzkopf" { "SCH" }
            default { "PRD" }
        }
        
        $baseSku = "$brandPrefix-BASE-{0:D3}" -f $baseSkuCounter
        $baseSkuCounter++
        
        $variantsData = @()
        foreach ($variant in $group.Variants) {
            $variantsData += [PSCustomObject]@{
                sku = $variant.SKU
                price = $variant.Price
                values = @($variant.Presentation)
            }
        }
        
        $consolidated += [PSCustomObject]@{
            attributes = @{
                name = $group.BaseName
                description = $group.Description
            }
            brand = $group.Brand
            collections = $group.Collections
            sku = $baseSku
            image = $group.Image
            options = @(
                @{
                    name = "Presentacion"
                    values = @($presentations)
                }
            )
            variants = $variantsData
        }
    }
}

Write-Host "Productos consolidados: $($consolidated.Count)" -ForegroundColor Green
Write-Host "Guardando archivo..." -ForegroundColor Cyan
$consolidated | ConvertTo-Json -Depth 10 | Set-Content $outputPath -Encoding UTF8
Write-Host "Archivo generado exitosamente" -ForegroundColor Green

$simpleProducts = ($consolidated | Where-Object { -not $_.options }).Count
$variantProducts = ($consolidated | Where-Object { $_.options }).Count
Write-Host ""
Write-Host "=== ESTADISTICAS ===" -ForegroundColor Yellow
Write-Host "Productos simples: $simpleProducts"
Write-Host "Productos con variantes: $variantProducts"
Write-Host "Total antes: $($products.Count)"
Write-Host "Total despues: $($consolidated.Count)"
