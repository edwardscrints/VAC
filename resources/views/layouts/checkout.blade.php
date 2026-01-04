<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >
    <title>VAC - Checkout</title>
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
    @stripeScripts
    <style>
        body {
            background-color: rgb(5 7 17 / 41%) !important;
        }
    </style>
</head>

<body class="antialiased text-white relative overflow-hidden">
    <!-- Efectos de fondo cyberpunk -->
    <div class="fixed inset-0 bg-gradient-to-br from-cyber-pink/10 via-transparent to-cyber-yellow/10 pointer-events-none z-0"></div>
    <div class="fixed top-20 left-1/4 w-96 h-96 bg-cyber-pink rounded-full filter blur-[150px] animate-pulse pointer-events-none z-0"></div>
    <div class="fixed bottom-20 right-1/4 w-96 h-96 bg-cyber-yellow rounded-full filter blur-[150px] animate-pulse pointer-events-none z-0" style="animation-delay: 1s;"></div>
    
    <div class="relative z-10">
    <header class="relative border-b border-gray-100">
        <div class="flex items-center h-16 px-4 mx-auto max-w-screen-2xl sm:px-6 lg:px-8">
            <a
                class="flex items-center flex-shrink-0"
                href="{{ url('/') }}"
            >
                <span class="sr-only">Home</span>

                <x-brand.logo class="w-auto h-6 text-indigo-600" />
            </a>
        </div>
    </header>


    <main>
        {{ $slot }}
    </main>

    <x-footer />

    @livewireScripts
    </div>
</body>

</html>
