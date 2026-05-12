<section class="py-12 bg-white border-b border-gray-100 overflow-hidden" id="clients">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-8">
        <p class="text-center text-sm font-semibold text-gray-500 uppercase tracking-wider">
            Trusted by innovative teams worldwide
        </p>
    </div>

    <div class="swiper clients-swiper w-full">
        <div class="swiper-wrapper items-center">
            <!-- Client Logos -->
            @for ($i = 1; $i <= 8; $i++)
            <div class="swiper-slide flex justify-center">
                <div class="w-32 h-12 bg-gray-200 rounded animate-pulse grayscale opacity-60 hover:opacity-100 transition-opacity flex items-center justify-center text-gray-400 font-bold text-lg">
                    LOGO {{ $i }}
                </div>
            </div>
            @endfor
            @for ($i = 1; $i <= 4; $i++)
            <div class="swiper-slide flex justify-center">
                <div class="w-32 h-12 bg-gray-200 rounded animate-pulse grayscale opacity-60 hover:opacity-100 transition-opacity flex items-center justify-center text-gray-400 font-bold text-lg">
                    LOGO {{ $i }}
                </div>
            </div>
            @endfor
        </div>
    </div>
</section>
