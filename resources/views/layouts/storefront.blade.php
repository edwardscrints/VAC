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
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link
        rel="icon"
        href="{{ asset('favicon.jpg') }}"
    >
    @livewireStyles
    <style>
        body {
            background-color: rgb(5 7 17 / 41%) !important;
            color: #ffffff;
            min-height: 100vh;
        }
    </style>
</head>

<body class="antialiased relative overflow-x-hidden">
    <!-- Efectos de fondo cyberpunk -->
    <div class="fixed inset-0 bg-gradient-to-br from-cyber-pink/10 via-transparent to-cyber-yellow/10 pointer-events-none z-0"></div>
    
    <!-- Orbes de luz cyberpunk con efectos de neón -->
    <div class="fixed top-20 left-1/4 w-96 h-96 bg-cyber-pink rounded-full filter blur-[150px] animate-pulse pointer-events-none z-0"></div>
    <div class="fixed bottom-20 right-1/4 w-96 h-96 bg-cyber-yellow rounded-full filter blur-[150px] animate-pulse pointer-events-none z-0" style="animation-delay: 1s;"></div>
    <div class="fixed top-1/2 left-1/2 w-80 h-80 bg-cyber-bright-yellow rounded-full filter blur-[120px] animate-pulse pointer-events-none z-0" style="animation-delay: 0.5s;"></div>
    
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
