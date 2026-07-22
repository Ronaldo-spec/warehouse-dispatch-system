param(
    [int] $Port = 8000
)

$ErrorActionPreference = 'Stop'

$projectRoot = (Resolve-Path (Join-Path $PSScriptRoot '..')).Path
Set-Location $projectRoot

function Assert-CommandExists {
    param([Parameter(Mandatory = $true)][string] $Name)

    if (-not (Get-Command $Name -ErrorAction SilentlyContinue)) {
        throw "Perintah '$Name' tidak ditemukan. Pastikan $Name sudah terpasang dan tersedia di PATH."
    }
}

Assert-CommandExists -Name 'php'
Assert-CommandExists -Name 'composer'
Assert-CommandExists -Name 'npm'

if (-not (Test-Path (Join-Path $projectRoot 'artisan'))) {
    throw 'File artisan tidak ditemukan. Jalankan perintah ini dari project Laravel.'
}

Write-Host ''
Write-Host 'Warehouse Dispatch System - Public Preview' -ForegroundColor Magenta
Write-Host 'Preview ini hanya untuk demo dan pengujian, bukan deployment production.' -ForegroundColor Yellow
Write-Host ''

if (-not (Test-Path (Join-Path $projectRoot 'vendor/autoload.php'))) {
    Write-Host 'Dependency Composer belum tersedia. Menjalankan composer install...' -ForegroundColor Cyan
    composer install
}

if (-not (Test-Path (Join-Path $projectRoot 'public/build/manifest.json'))) {
    Write-Host 'Asset production belum tersedia. Menjalankan npm install dan npm run build...' -ForegroundColor Cyan

    if (-not (Test-Path (Join-Path $projectRoot 'node_modules'))) {
        npm install
    }

    npm run build
}

$toolsDirectory = Join-Path $projectRoot '.tools'
$cloudflaredPath = Join-Path $toolsDirectory 'cloudflared.exe'

if (-not (Test-Path $cloudflaredPath)) {
    New-Item -ItemType Directory -Path $toolsDirectory -Force | Out-Null

    $downloadUrl = 'https://github.com/cloudflare/cloudflared/releases/latest/download/cloudflared-windows-amd64.exe'
    Write-Host 'Mengunduh cloudflared resmi untuk Windows 64-bit...' -ForegroundColor Cyan
    Invoke-WebRequest -Uri $downloadUrl -OutFile $cloudflaredPath
}

Write-Host 'Membersihkan cache konfigurasi Laravel...' -ForegroundColor Cyan
php artisan config:clear

$previousAppDebug = $env:APP_DEBUG
$previousAppEnv = $env:APP_ENV
$env:APP_DEBUG = 'false'
$env:APP_ENV = 'local'

$serverProcess = $null

try {
    Write-Host "Menjalankan Laravel pada http://127.0.0.1:$Port ..." -ForegroundColor Cyan
    $serverProcess = Start-Process \
        -FilePath 'php' \
        -ArgumentList @('artisan', 'serve', '--host=127.0.0.1', "--port=$Port") \
        -WorkingDirectory $projectRoot \
        -NoNewWindow \
        -PassThru

    Start-Sleep -Seconds 2

    if ($serverProcess.HasExited) {
        throw 'Laravel development server gagal dijalankan. Periksa apakah port sedang digunakan.'
    }

    Write-Host ''
    Write-Host 'Membuat URL publik sementara...' -ForegroundColor Cyan
    Write-Host 'Salin URL https://*.trycloudflare.com yang tampil di bawah.' -ForegroundColor Green
    Write-Host 'Jangan tutup terminal ini selama URL masih digunakan.' -ForegroundColor Yellow
    Write-Host 'Tekan Ctrl+C untuk menghentikan preview.' -ForegroundColor Yellow
    Write-Host ''

    & $cloudflaredPath tunnel --url "http://127.0.0.1:$Port"
}
finally {
    if ($null -ne $serverProcess -and -not $serverProcess.HasExited) {
        Write-Host ''
        Write-Host 'Menghentikan Laravel development server...' -ForegroundColor Cyan
        Stop-Process -Id $serverProcess.Id -Force -ErrorAction SilentlyContinue
    }

    $env:APP_DEBUG = $previousAppDebug
    $env:APP_ENV = $previousAppEnv
}
