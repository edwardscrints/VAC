<!-- Estilo Cyberpunk: neones, colores vibrantes, efectos de brillo -->
<div class="min-h-screen py-12 px-2 relative overflow-hidden" style="background-color: rgb(5 7 17 / 41%);">
    <!-- Efectos de fondo cyberpunk -->
    <div class="absolute inset-0 bg-cyber-gradient"></div>
    <div class="absolute top-0 left-1/4 w-96 h-96 bg-cyber-pink rounded-full filter blur-[150px] animate-pulse"></div>
    <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-cyber-yellow rounded-full filter blur-[150px] animate-pulse" style="animation-delay: 1s;"></div>
    
    <div class="w-full max-w-[1920px] mx-auto relative z-10">
        <div class="flex flex-col md:flex-row gap-10 mb-12">
            <!-- Instagram Widget -->
            <div class="embedsocial-hashtag" data-ref="747e7f6ca855f4c9f7b7a64ec7e64972202d6faa"> <a class="feed-powered-by-es feed-powered-by-es-feed-img es-widget-branding" href="https://embedsocial.com/social-media-aggregator/" target="_blank" title="Instagram widget"> <img src="https://embedsocial.com/cdn/icon/embedsocial-logo.webp" alt="EmbedSocial"> <div class="es-widget-branding-text">Instagram widget</div> </a> </div> <script> (function(d, s, id) { var js; if (d.getElementById(id)) {return;} js = d.createElement(s); js.id = id; js.src = "https://embedsocial.com/cdn/ht.js"; d.getElementsByTagName("head")[0].appendChild(js); }(document, "script", "EmbedSocialHashtagScript")); </script>

            <!-- Visores PDF -->
            <div class="w-full cyber-card p-16 flex flex-col items-center justify-center transition-all duration-500 mb-8">
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-cyber-pink to-transparent"></div>
                <h4 class="text-2xl cyber-text-pink mb-6">VAC LA REVISTA</h4><br>
                <div class="w-full flex flex-col gap-8">
                    <div class="w-full flex flex-col md:flex-row gap-6 justify-center items-start">
                        <div class="flex-1 min-w-0 relative group cyber-glow">
                            <div class="relative">
                                <h3 class="text-lg font-bold text-cyber-yellow mb-2 text-center drop-shadow-cyber-yellow uppercase">EDICION 00</h3>
                                <div class="overflow-hidden rounded-xl border-2 border-cyber-yellow shadow-lg shadow-cyber-yellow/30">
                                    <iframe src="/storage/Revista_00.pdf#view=FitH" class="w-full" style="height: 800px;" frameborder="0" scrolling="no"></iframe>
                                </div>
                            </div>
                        </div>
                        <div class="flex-1 min-w-0 relative group cyber-glow">
                            <div class="relative">
                                <h3 class="text-lg font-bold text-cyber-pink mb-2 text-center drop-shadow-cyber-pink uppercase">EDICION 01</h3>
                                <div class="overflow-hidden rounded-xl border-2 border-cyber-pink shadow-lg shadow-cyber-pink/30">
                                    <iframe src="/storage/Revista_01.pdf#view=FitH" class="w-full" style="height: 800px;" frameborder="0" scrolling="no"></iframe>
                                </div>
                            </div>
                        </div>
                        <div class="flex-1 min-w-0 relative group cyber-glow">
                            <div class="relative">
                                <h3 class="text-lg font-bold text-cyber-bright-yellow mb-2 text-center drop-shadow-cyber-bright uppercase">EDICION 02</h3>
                                <div class="overflow-hidden rounded-xl border-2 border-cyber-bright-yellow shadow-lg shadow-cyber-bright-yellow/30">
                                    <iframe src="/storage/Revista_02.pdf#view=FitH" class="w-full" style="height: 800px;" frameborder="0" scrolling="no"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        
        <!-- Productos por Categoría -->
        <div class="w-full cyber-card-yellow p-8 mt-8">
            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-cyber-yellow via-cyber-pink to-cyber-bright-yellow"></div>
            <h2 class="text-2xl cyber-text-yellow mb-6">Creamos, Producimos y Circulamos Saberes</h2><br>
            <div class="grid md:grid-cols-2 gap-10">
                @foreach($categories as $category)
                    <div class="mb-8 w-full">
                        <h3 class="text-xl font-bold text-cyber-pink mb-4 uppercase drop-shadow-cyber-pink">{{ $category->translateAttribute('name') }}</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                            @foreach($category->products as $product)
                            <div class="relative group cyber-glow">
                                <div class="relative bg-cyber-dark border-2 border-cyber-yellow rounded-2xl p-4 flex flex-col items-center shadow-xl transform hover:scale-105 hover:rotate-1 transition duration-300">
                                    <div class="w-20 h-20 rounded-xl mb-2 overflow-hidden border-2 border-cyber-pink shadow-cyber-glow-pink">
                                        <img src="{{ $product->thumbnail?->getUrl('medium') ?? asset('storage/placeholder.jpg') }}" alt="{{ $product->translateAttribute('name') }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                                    </div>
                                    <span class="font-bold text-cyber-yellow text-center drop-shadow-cyber-yellow">{{ $product->translateAttribute('name') }}</span>
                                    <span class="text-cyber-bright-yellow font-bold drop-shadow-cyber-bright">${{ number_format($product->prices->first()->price->value ?? 0, 0, ',', '.') }}</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>