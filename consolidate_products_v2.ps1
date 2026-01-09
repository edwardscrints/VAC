# Generar productos_consolidated_v2.json con logica mejorada
$jsonPath = "c:\Users\edwar\Working\vac\database\seeders\data\products.json"
$outputPath = "c:\Users\edwar\Working\vac\database\seeders\data\products_consolidated_v2.json"

$products = Get-Content $jsonPath -Raw | ConvertFrom-Json

function Get-BaseName { param($name); ($name -replace '\s+\d+(\.\d+)?\s*(ml|ML|l|L|gr?|GR?|g|G)\s*$', '').Trim() }
function Get-Presentation { param($name); if ($name -match '\s+(\d+(\.\d+)?\s*(ml|ML|l|L|gr?|GR?|g|G))\s*$') { $matches[1] -replace '\s+', '' } else { $null } }

$grouped = @{}
foreach ($product in $products) {
    $baseName = Get-BaseName $product.attributes.name
    $presentation = Get-Presentation $product.attributes.name
    $brand = $product.brand
    $groupKey = "$brand|$baseName"
    
    if (-not $grouped.ContainsKey($groupKey)) {
        $grouped[$groupKey] = @{ BaseName = $baseName; Brand = $brand; Description = $product.attributes.description; Collections = $product.collections; Image = $product.image; Variants = @() }
    }
    $grouped[$groupKey].Variants += @{ SKU = $product.sku; Price = $product.price; Presentation = if ($presentation) { $presentation } else { "Unica" }; OriginalName = $product.attributes.name }
}

$consolidated = @()
$baseSkuCounter = 1

foreach ($key in $grouped.Keys | Sort-Object) {
    $group = $grouped[$key]
    $uniquePresentations = $group.Variants | ForEach-Object { $_.Presentation } | Select-Object -Unique
    
    # SI SOLO HAY 1 VARIANTE O TODAS SON "Unica" -> PRODUCTO SIMPLE
    if ($group.Variants.Count -eq 1 -or ($uniquePresentations.Count -eq 1 -and $uniquePresentations[0] -eq "Unica")) {
        foreach ($variant in $group.Variants) {
            $consolidated += [PSCustomObject]@{
                attributes = @{ name = $variant.OriginalName; description = $group.Description }
                brand = $group.Brand
                collections = $group.Collections
                sku = $variant.SKU
                price = $variant.Price
                image = $group.Image
            }
        }
    }
    # SI HAY MULTIPLES PRESENTACIONES REALES -> PRODUCTO CON VARIANTES
    else {
        $presentations = $uniquePresentations | Where-Object { $_ -ne "Unica" } | Sort-Object
        $brandPrefix = switch ($group.Brand) { "Lissia" { "LIS" }; "Lehit" { "LEH" }; "Pal Pluss" { "PAL" }; "Tio Nacho" { "TNA" }; "Naissant" { "NAI" }; "L'Oreal" { "LOR" }; "L'Oreal Elvive" { "LOR" }; "Recamier" { "REC" }; "Schwarzkopf" { "SCH" }; default { "PRD" } }
        $baseSku = "$brandPrefix-BASE-{0:D3}" -f $baseSkuCounter++
        $variantsData = @(); foreach ($variant in $group.Variants) { $variantsData += [PSCustomObject]@{ sku = $variant.SKU; price = $variant.Price; values = @($variant.Presentation) } }
        $consolidated += [PSCustomObject]@{
            attributes = @{ name = $group.BaseName; description = $group.Description }
            brand = $group.Brand
            collections = $group.Collections
            sku = $baseSku
            image = $group.Image
            options = @( @{ name = "Presentacion"; values = @($presentations) } )
            variants = $variantsData
        }
    }
}

$consolidated | ConvertTo-Json -Depth 10 | Set-Content $outputPath -Encoding UTF8
$simpleProducts = ($consolidated | Where-Object { -not $_.options }).Count
$variantProducts = ($consolidated | Where-Object { $_.options }).Count
Write-Host "Generado: $outputPath" -ForegroundColor Green
Write-Host "Productos simples: $simpleProducts, Con variantes: $variantProducts"
