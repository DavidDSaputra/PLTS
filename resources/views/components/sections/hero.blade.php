<section class="relative min-h-[90vh] flex items-center overflow-hidden bg-primary-950" id="hero">
    <!-- Abstract Pattern Background -->
    <div class="absolute inset-0 z-0 opacity-20 pointer-events-none">
        <svg class="absolute inset-0 w-full h-full" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <pattern id="grid-pattern" width="40" height="40" patternUnits="userSpaceOnUse">
                    <path d="M0 40L40 0H20L0 20M40 40V20L20 40" fill="none" stroke="currentColor" stroke-opacity="0.2" stroke-width="1"/>
                </pattern>
                <linearGradient id="gradient-fade" x1="0%" y1="0%" x2="0%" y2="100%">
                    <stop offset="0%" stop-color="#020617" stop-opacity="0.8" />
                    <stop offset="100%" stop-color="#020617" stop-opacity="1" />
                </linearGradient>
            </defs>
            <rect width="100%" height="100%" fill="url(#grid-pattern)" class="text-accent-500"/>
            <rect width="100%" height="100%" fill="url(#gradient-fade)"/>
            
            <!-- Animated subtle lines using GSAP -->
            <path class="hero-line" d="M -100 200 Q 300 -100 800 300 T 1500 100" fill="none" stroke="#06b6d4" stroke-opacity="0.3" stroke-width="1" />
            <path class="hero-line" d="M -100 400 Q 400 100 900 500 T 1600 300" fill="none" stroke="#3b82f6" stroke-opacity="0.2" stroke-width="1" />
        </svg>
    </div>

    <!-- Content -->
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-20">
        <div class="max-w-3xl">
            <div data-aos="fade-up" data-aos-duration="1000" class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary-900/50 border border-primary-800 backdrop-blur-sm text-accent-400 text-sm font-medium mb-6">
                <span class="w-2 h-2 rounded-full bg-accent-500 animate-pulse"></span>
                Pioneering Spatial Intelligence
            </div>
            
            <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold tracking-tight text-white mb-8 leading-tight hero-title">
                Mapping the <br/>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-accent-400 to-primary-400">Future of Enterprise.</span>
            </h1>
            
            <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200" class="text-xl text-primary-200 mb-10 leading-relaxed max-w-2xl">
                JRWN delivers high-precision GIS mapping, drone surveying, and spatial analysis to transform how your business interacts with the physical world.
            </p>
            
            <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400" class="flex flex-col sm:flex-row gap-4">
                <a href="#services" class="inline-flex items-center justify-center px-8 py-4 text-base font-semibold text-primary-950 bg-white rounded-lg shadow-sm hover:bg-gray-50 hover:shadow-md transition-all group">
                    Explore Solutions
                    <svg class="ml-2 w-5 h-5 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
                <a href="#contact" class="inline-flex items-center justify-center px-8 py-4 text-base font-semibold text-white border border-primary-700 bg-primary-900/30 backdrop-blur-sm rounded-lg hover:bg-primary-800 transition-all">
                    Talk to an Expert
                </a>
            </div>
        </div>

        <!-- Statistics -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mt-24 border-t border-primary-800/50 pt-12" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600">
            <div>
                <p class="text-4xl font-bold text-white mb-2">
                    <span class="counter" data-target="500">0</span>+
                </p>
                <p class="text-sm font-medium text-primary-300">Projects Completed</p>
            </div>
            <div>
                <p class="text-4xl font-bold text-white mb-2">
                    <span class="counter" data-target="150">0</span>+
                </p>
                <p class="text-sm font-medium text-primary-300">Enterprise Clients</p>
            </div>
            <div>
                <p class="text-4xl font-bold text-white mb-2">
                    <span class="counter" data-target="10">0</span>m+
                </p>
                <p class="text-sm font-medium text-primary-300">Hectares Mapped</p>
            </div>
            <div>
                <p class="text-4xl font-bold text-white mb-2">
                    <span class="counter" data-target="99">0</span>%
                </p>
                <p class="text-sm font-medium text-primary-300">Accuracy Rate</p>
            </div>
        </div>
    </div>
</section>
