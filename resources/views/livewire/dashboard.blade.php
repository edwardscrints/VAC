<!-- Estilo Cyberpunk: neones, colores vibrantes, efectos de brillo -->
<div class="min-h-screen bg-[#050711] py-12 px-2 relative overflow-hidden">
    <!-- Efectos de fondo cyberpunk -->
    <div class="absolute inset-0 bg-gradient-to-br from-[#ff00ff]/10 via-transparent to-[#ccff00]/10"></div>
    <div class="absolute top-0 left-1/4 w-96 h-96 bg-[#ff00ff] rounded-full filter blur-[150px] animate-pulse"></div>
    <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-[#ccff00] rounded-full filter blur-[150px] animate-pulse" style="animation-delay: 1s;"></div>
    
    <div class="w-full max-w-5xl mx-auto relative z-10">
        <div class="flex flex-col md:flex-row gap-10 mb-12">
            <!-- Instagram Widget -->
            <div class="flex-1 bg-[#0d1128]/90 backdrop-blur-sm rounded-3xl shadow-2xl border-2 border-[#ccff00] p-8 flex flex-col items-center justify-center transform hover:scale-105 hover:rotate-1 transition duration-500 relative overflow-hidden" style="box-shadow: 0 0 30px rgba(157, 255, 0, 0.82), 0 0 60px rgba(204, 255, 0, 0.1);">
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-[#ccff00] to-transparent"></div>
                <!-- LightWidget WIDGET --><script src="https://cdn.lightwidget.com/widgets/lightwidget.js"></script><iframe src="//lightwidget.com/widgets/29c85d174ab65383876b8a16facf5594.html" scrolling="no" allowtransparency="true" class="lightwidget-widget" style="width:100%;border:0;overflow:hidden;"></iframe>
            </div>

            <!-- Visores PDF -->
            <div class="w-full bg-[#0d1128]/90 backdrop-blur-sm rounded-3xl shadow-2xl border-2 border-[#ff00ff] p-8 flex flex-col items-center justify-center transform hover:scale-105 hover:-rotate-1 transition duration-500 mb-8 relative overflow-hidden" style="box-shadow: 0 0 30px rgba(255, 0, 255, 0.55), 0 0 60px rgba(255, 0, 255, 0.1);">
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-[#ff00ff] to-transparent"></div>
                <h2 class="text-2xl font-extrabold mb-6 text-[#ff00ff] tracking-widest drop-shadow-[0_0_10px_rgba(255,0,255,0.8)] uppercase">VAC LA REVISTA</h2><br>
                <div class="w-full flex flex-col gap-8">
                    <div class="w-full flex flex-row gap-6 justify-center items-start">
                        <div class="flex-1 min-w-0 relative group">
                            <div class="absolute -inset-1 bg-gradient-to-r from-[#ccff00] to-[#ff00ff] rounded-xl blur opacity-25 group-hover:opacity-50 transition duration-300"></div>
                            <div class="relative">
                                <h3 class="text-lg font-bold text-[#ccff00] mb-2 text-center drop-shadow-[0_0_8px_rgba(204,255,0,0.8)]">EDICION 00</h3>
                                <iframe src="/storage/Revista_00.pdf#zoom=85" class="w-full rounded-xl border-2 border-[#ccff00] shadow-lg shadow-[#ccff00]/30" style="height: 800px;" frameborder="0"></iframe>
                            </div>
                        </div>
                        <div class="flex-1 min-w-0 relative group">
                            <div class="absolute -inset-1 bg-gradient-to-r from-[#ff00ff] to-[#ffff00] rounded-xl blur opacity-25 group-hover:opacity-50 transition duration-300"></div>
                            <div class="relative">
                                <h3 class="text-lg font-bold text-[#ff00ff] mb-2 text-center drop-shadow-[0_0_8px_rgba(255,0,255,0.8)]">EDICION 01</h3>
                                <iframe src="/storage/Revista_01.pdf#zoom=85" class="w-full rounded-xl border-2 border-[#ff00ff] shadow-lg shadow-[#ff00ff]/30" style="height: 800px;" frameborder="0"></iframe>
                            </div>
                        </div>
                        <div class="flex-1 min-w-0 relative group">
                            <div class="absolute -inset-1 bg-gradient-to-r from-[#ffff00] to-[#ccff00] rounded-xl blur opacity-25 group-hover:opacity-50 transition duration-300"></div>
                            <div class="relative">
                                <h3 class="text-lg font-bold text-[#ffff00] mb-2 text-center drop-shadow-[0_0_8px_rgba(255,255,0,0.8)]">EDICION 02</h3>
                                <iframe src="/storage/Revista_02.pdf#zoom=85" class="w-full rounded-xl border-2 border-[#ffff00] shadow-lg shadow-[#ffff00]/30" style="height: 800px;" frameborder="0"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        
        <!-- Productos por Categoría -->
        <div class="w-full bg-[#0d1128]/90 backdrop-blur-sm rounded-3xl shadow-2xl border-2 border-[#ccff00] p-8 mt-8 relative overflow-hidden" style="box-shadow: 0 0 30px rgba(204, 255, 0, 0.87), 0 0 60px rgba(255, 0, 255, 0.1);">
            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-[#ccff00] via-[#ff00ff] to-[#ffff00]"></div>
            <h2 class="text-2xl font-extrabold mb-6 text-[#ccff00] tracking-widest drop-shadow-[0_0_10px_rgba(204,255,0,0.8)] uppercase">Creamos, Producimos y Circulamos Saberes</h2><br>
            <div class="grid md:grid-cols-2 gap-10">
                @foreach($categories as $category)
                    <div class="mb-8 w-full">
                        <h3 class="text-xl font-bold text-[#ff00ff] mb-4 uppercase drop-shadow-[0_0_10px_rgba(255,0,255,0.8)]">{{ $category->translateAttribute('name') }}</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                            @foreach($category->products as $product)
                            <div class="relative group">
                                <!-- Glow effect cyberpunk -->
                                <div class="absolute -inset-0.5 bg-gradient-to-r from-[#ccff00] via-[#ff00ff] to-[#ffff00] rounded-2xl blur opacity-30 group-hover:opacity-75 transition duration-300"></div>
                                
                                <div class="relative bg-[#050711] border-2 border-[#ccff00] rounded-2xl p-4 flex flex-col items-center shadow-xl transform hover:scale-105 hover:rotate-1 transition duration-300">
                                    <div class="w-20 h-20 rounded-xl mb-2 overflow-hidden border-2 border-[#ff00ff] shadow-[0_0_15px_rgba(255,0,255,0.5)]">
                                        <img src="{{ $product->thumbnail?->getUrl('medium') ?? asset('storage/placeholder.jpg') }}" alt="{{ $product->translateAttribute('name') }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                                    </div>
                                    <span class="font-bold text-[#ccff00] text-center drop-shadow-[0_0_5px_rgba(204,255,0,0.8)]">{{ $product->translateAttribute('name') }}</span>
                                    <span class="text-[#ffff00] font-bold drop-shadow-[0_0_8px_rgba(255,255,0,0.8)]">${{ number_format($product->prices->first()->price->value ?? 0, 0, ',', '.') }}</span>
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