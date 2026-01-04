<footer class="bg-cyber-dark/80 backdrop-blur-sm border-t-2 border-cyber-pink relative overflow-hidden">
    <!-- Efectos de brillo en el borde superior -->
    <div class="absolute top-0 left-0 w-full h-0.5 bg-gradient-to-r from-cyber-yellow via-cyber-pink to-cyber-bright-yellow"></div>
    
    <div class="max-w-screen-xl px-4 py-12 mx-auto sm:px-6 lg:px-8 relative z-10">
        <x-brand.logo class="w-auto h-8 text-cyber-pink drop-shadow-cyber-pink" />

        <p class="max-w-sm mt-4 text-cyber-yellow drop-shadow-cyber-yellow">
            @vacultura
            🌐Agenciamiento Cultural.
            <br> 
            Divulgamos, Creamos, Producimos y Circulamos Saberes
        </p>

        <p class="pt-4 mt-4 text-sm text-cyber-pink/80 border-t border-cyber-pink/30">
            &copy; {{ now()->year }} VAC - Todos los derechos reservados.
        </p>
    </div>
    
    <!-- Efecto de brillo sutil en el fondo -->
    <div class="absolute bottom-0 right-1/4 w-64 h-64 bg-cyber-pink/10 rounded-full filter blur-[100px] pointer-events-none"></div>
</footer>
