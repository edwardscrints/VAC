<footer class="bg-white border-t border-gray-200">
    <div class="max-w-screen-xl px-4 py-12 mx-auto sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
            <!-- Logo y descripción -->
            <div>
                <x-brand.logo class="w-auto h-8 text-gray-800" />
                <p class="max-w-sm mt-4 text-sm text-gray-600 leading-relaxed">
                    @vacultura
                    <br>
                    🌐 Agenciamiento Cultural
                    <br> 
                    Divulgamos, Creamos, Producimos y Circulamos Saberes
                </p>
            </div>

            <!-- Enlaces rápidos -->
            <div class="grid grid-cols-2 gap-8 lg:col-span-2">
                <div>
                    <p class="font-semibold text-gray-900 text-sm uppercase tracking-wider">Productos</p>
                    <nav class="flex flex-col mt-4 space-y-2 text-sm text-gray-600">
                        <a class="hover:text-gray-900 transition-colors" href="/collections/cuidado-capilar">Cuidado Capilar</a>
                        <a class="hover:text-gray-900 transition-colors" href="/collections/tintes">Tintes</a>
                        <a class="hover:text-gray-900 transition-colors" href="/collections/hidratacion">Hidratación</a>
                        <a class="hover:text-gray-900 transition-colors" href="/collections/reparacion">Reparación</a>
                    </nav>
                </div>

                <div>
                    <p class="font-semibold text-gray-900 text-sm uppercase tracking-wider">Información</p>
                    <nav class="flex flex-col mt-4 space-y-2 text-sm text-gray-600">
                        <a class="hover:text-gray-900 transition-colors" href="#">Sobre Nosotros</a>
                        <a class="hover:text-gray-900 transition-colors" href="#">Términos y Condiciones</a>
                        <a class="hover:text-gray-900 transition-colors" href="#">Política de Privacidad</a>
                        <a class="hover:text-gray-900 transition-colors" href="#">Contacto</a>
                    </nav>
                </div>
            </div>
        </div>

        <div class="pt-8 mt-8 border-t border-gray-200">
            <p class="text-xs text-center text-gray-500">
                &copy; {{ now()->year }} VAC - Vida Arte y Cultura. Todos los derechos reservados.
            </p>
        </div>
    </div>
</footer>
