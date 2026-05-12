<section class="py-24 bg-white border-t border-gray-100" id="faq">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold text-primary-900 mb-4 tracking-tight">Frequently Asked Questions</h2>
            <p class="text-lg text-gray-600">
                Everything you need to know about our services and process.
            </p>
        </div>

        <div class="space-y-4" x-data="{ selected: 1 }">
            
            <!-- FAQ 1 -->
            <div data-aos="fade-up" data-aos-delay="100" class="border border-gray-200 rounded-lg bg-white overflow-hidden transition-all duration-300" :class="selected == 1 ? 'shadow-md border-accent-200' : 'hover:border-gray-300'">
                <button type="button" class="flex justify-between items-center w-full px-6 py-5 text-left focus:outline-none" x-on:click="selected !== 1 ? selected = 1 : selected = null">
                    <span class="font-bold text-primary-900 text-lg">What kind of accuracy can you achieve with drone surveying?</span>
                    <span class="ml-6 flex-shrink-0 text-accent-500 transition-transform duration-300" :class="{'rotate-180': selected == 1}">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                    </span>
                </button>
                <div class="px-6 pb-5 text-gray-600 relative overflow-hidden transition-all max-h-0 duration-300" style="" x-ref="container1" x-bind:style="selected == 1 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
                    <p class="pt-2 border-t border-gray-100 mt-2">
                        Using our advanced RTK/PPK enabled drones combined with strategically placed Ground Control Points (GCPs), we routinely achieve absolute global accuracy of 1-3 centimeters horizontally and 2-5 centimeters vertically.
                    </p>
                </div>
            </div>

            <!-- FAQ 2 -->
            <div data-aos="fade-up" data-aos-delay="200" class="border border-gray-200 rounded-lg bg-white overflow-hidden transition-all duration-300" :class="selected == 2 ? 'shadow-md border-accent-200' : 'hover:border-gray-300'">
                <button type="button" class="flex justify-between items-center w-full px-6 py-5 text-left focus:outline-none" x-on:click="selected !== 2 ? selected = 2 : selected = null">
                    <span class="font-bold text-primary-900 text-lg">What deliverables do you provide?</span>
                    <span class="ml-6 flex-shrink-0 text-accent-500 transition-transform duration-300" :class="{'rotate-180': selected == 2}">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                    </span>
                </button>
                <div class="px-6 pb-5 text-gray-600 relative overflow-hidden transition-all max-h-0 duration-300" style="" x-ref="container2" x-bind:style="selected == 2 ? 'max-height: ' + $refs.container2.scrollHeight + 'px' : ''">
                    <p class="pt-2 border-t border-gray-100 mt-2">
                        We provide a wide range of industry-standard outputs including High-Resolution Orthomosaics, Digital Elevation Models (DEM/DSM/DTM), 3D Point Clouds (LAS/LAZ), 3D Mesh Models, Topographic Contours, and interactive Web GIS dashboards.
                    </p>
                </div>
            </div>

            <!-- FAQ 3 -->
            <div data-aos="fade-up" data-aos-delay="300" class="border border-gray-200 rounded-lg bg-white overflow-hidden transition-all duration-300" :class="selected == 3 ? 'shadow-md border-accent-200' : 'hover:border-gray-300'">
                <button type="button" class="flex justify-between items-center w-full px-6 py-5 text-left focus:outline-none" x-on:click="selected !== 3 ? selected = 3 : selected = null">
                    <span class="font-bold text-primary-900 text-lg">Do you operate globally?</span>
                    <span class="ml-6 flex-shrink-0 text-accent-500 transition-transform duration-300" :class="{'rotate-180': selected == 3}">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                    </span>
                </button>
                <div class="px-6 pb-5 text-gray-600 relative overflow-hidden transition-all max-h-0 duration-300" style="" x-ref="container3" x-bind:style="selected == 3 ? 'max-height: ' + $refs.container3.scrollHeight + 'px' : ''">
                    <p class="pt-2 border-t border-gray-100 mt-2">
                        Yes, our enterprise solutions are available globally. We have teams ready for international deployment and often partner with local certified operators to ensure compliance with regional aviation regulations while maintaining our strict quality standards.
                    </p>
                </div>
            </div>

            <!-- FAQ 4 -->
            <div data-aos="fade-up" data-aos-delay="400" class="border border-gray-200 rounded-lg bg-white overflow-hidden transition-all duration-300" :class="selected == 4 ? 'shadow-md border-accent-200' : 'hover:border-gray-300'">
                <button type="button" class="flex justify-between items-center w-full px-6 py-5 text-left focus:outline-none" x-on:click="selected !== 4 ? selected = 4 : selected = null">
                    <span class="font-bold text-primary-900 text-lg">How do you ensure data security?</span>
                    <span class="ml-6 flex-shrink-0 text-accent-500 transition-transform duration-300" :class="{'rotate-180': selected == 4}">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                    </span>
                </button>
                <div class="px-6 pb-5 text-gray-600 relative overflow-hidden transition-all max-h-0 duration-300" style="" x-ref="container4" x-bind:style="selected == 4 ? 'max-height: ' + $refs.container4.scrollHeight + 'px' : ''">
                    <p class="pt-2 border-t border-gray-100 mt-2">
                        Data security is our top priority. All spatial data is processed and stored on SOC2 compliant, enterprise-grade cloud servers with end-to-end encryption. We also offer on-premise deployment options for clients with strict security requirements.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>
