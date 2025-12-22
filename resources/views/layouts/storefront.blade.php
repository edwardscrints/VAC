<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >
    <title>VAC</title>
    <meta
        name="description"
        content="Creamos, Producimos y Circulamos Saberes."
    >
    <link
        href="{{ asset('css/app.css') }}"
        rel="stylesheet"
    >

    <link
        rel="icon"
        href="{{ asset('favicon.jpg') }}"
    >
    @livewireStyles
    <style>
        body {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 50%, #dee2e6 100%) !important;
            color: #212529;
            min-height: 100vh;
        }
        /* Pattern overlay sutil */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                linear-gradient(rgba(247, 152, 30, 0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(44, 83, 100, 0.03) 1px, transparent 1px);
            background-size: 50px 50px;
            pointer-events: none;
            z-index: 1;
        }
    </style>
</head>

<body class="antialiased relative overflow-x-hidden">
    <!-- Efectos de fondo suaves con colores VAC -->
    <div class="fixed inset-0 bg-gradient-to-br from-orange-100/30 via-teal-50/20 to-amber-100/30 pointer-events-none z-0"></div>
    
    <!-- Orbes de luz suaves con colores del logo VAC -->
    <div class="fixed top-20 left-1/4 w-[500px] h-[500px] bg-orange-200/20 rounded-full filter blur-[100px] animate-pulse pointer-events-none z-0"></div>
    <div class="fixed bottom-20 right-1/4 w-[500px] h-[500px] bg-teal-200/20 rounded-full filter blur-[100px] animate-pulse pointer-events-none z-0" style="animation-delay: 1.5s;"></div>
    <div class="fixed top-1/2 left-1/2 w-[400px] h-[400px] bg-amber-200/15 rounded-full filter blur-[90px] animate-pulse pointer-events-none z-0" style="animation-delay: 0.8s;"></div>
    
    <div class="relative z-10">
        @livewire('components.navigation')

        <main>
            {{ $slot }}
        </main>

        <x-footer />
    </div>

    @livewireScripts
</body>

</html>
