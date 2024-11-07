<div class="flex justify-between items-center p-5 border-b"
     :class="{ 
         'border-neutral-700 bg-neutral-800': isDark, 
         'border-neutral-200 bg-white': !isDark 
     }">
    <!-- Left Section -->
    <div class="flex items-center gap-3">
        <!-- Sidebar Toggle Button -->
        <button @click="isExpanded = !isExpanded"
                class="p-2 rounded h-10 w-10 flex items-center justify-center" 
                :class="{ 'hover:bg-neutral-700': isDark, 'hover:bg-neutral-100': !isDark, 'text-neutral-300': isDark, 'text-neutral-600': !isDark }" 
                title="Toggle Sidebar">
            <div class="text-2xl">
                <svg x-show="isExpanded" stroke="currentColor" fill="none" stroke-width="0" viewBox="0 0 24 24" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path>
                </svg>
                <svg x-show="!isExpanded" stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </div>
        </button>

        <!-- Search Bar with Shortcut -->
        <div x-data="{ isSearchOpen: false }" 
             @keydown.window.meta.k.prevent="isSearchOpen = true"
             @keydown.window.ctrl.k.prevent="isSearchOpen = true"
             x-effect="isSearchOpen && $refs.searchInput.focus()">
            <div class="relative flex items-center">
                <!-- SVG Icon on the Left -->
                <div class="absolute left-2.5">
                    <svg class="w-5 h-5" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" :class="{ 'text-neutral-300': isDark, 'text-neutral-600': !isDark }">
                        <g clip-path="url(#clip0_159_5678)">
                            <path d="M13.6667 13.6667L16.6667 16.6667" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M13.6667 13.6667L16.6667 16.6667" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M15.3333 9.33325C15.3333 6.01955 12.647 3.33325 9.33325 3.33325C6.01955 3.33325 3.33325 6.01955 3.33325 9.33325C3.33325 12.647 6.01955 15.3333 9.33325 15.3333C12.647 15.3333 15.3333 12.647 15.3333 9.33325Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_159_5678">
                                <rect width="16" height="16" fill="white" transform="translate(2 2)"/>
                            </clipPath>
                        </defs>
                    </svg>
                </div>

                <!-- Search Input -->
                <input type="text" 
                       placeholder="Search..."
                       class="pl-10 pr-2.5 py-1 h-10 w-full rounded-md border focus:outline-none focus:ring-2 focus:ring-blue-500 transition-colors duration-200"
                       :class="{ 'bg-neutral-700 !border-neutral-600 text-neutral-300': isDark, 'bg-neutral-50 !border-neutral-300 text-neutral-700': !isDark }"
                       @click="isSearchOpen = true"
                       x-ref="searchInput">
                
                <!-- Badge on the Right -->
                <div class="absolute right-2.5 text-xs px-2 py-1 rounded-full border"
                    :class="{ 
                        'bg-neutral-700 text-neutral-300 !border-neutral-600': isDark, 
                        'bg-neutral-200 text-neutral-700 !border-neutral-300': !isDark 
                    }">
                    <span x-text="navigator.platform.includes('Mac') ? 'Cmd + K' : 'Ctrl + K'"></span>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Section -->
    <div class="flex items-center space-x-6">
        <!-- Icons Section -->
        <div class="flex items-center space-x-2">
            <button class="p-2 rounded-lg transition-colors duration-200" 
                    :class="{ 'hover:bg-neutral-700': isDark, 'hover:bg-neutral-200': !isDark }"
                    @click="isDark = !isDark"
                    title="Toggle Theme">
                <!-- Moon Icon for Dark Mode -->
                <svg x-show="!isDark" xmlns="http://www.w3.org/2000/svg" class="text-neutral-600 w-6 h-6" viewBox="0 0 24 24" fill="none">
                    <path opacity="0.4" d="M20.5 14.469C19.3635 15.0758 18.0654 15.4199 16.687 15.4199C12.2097 15.4199 8.58014 11.7903 8.58014 7.31302C8.58014 5.9346 8.92416 4.63654 9.53102 3.5C5.50093 4.44451 2.5 8.0617 2.5 12.3798C2.5 17.4167 6.58325 21.5 11.6202 21.5C15.9383 21.5 19.5555 18.4991 20.5 14.469Z" fill="currentColor" />
                    <path d="M20.5 14.469C19.3635 15.0758 18.0654 15.4199 16.687 15.4199C12.2097 15.4199 8.58014 11.7903 8.58014 7.31302C8.58014 5.9346 8.92416 4.63654 9.53102 3.5C5.50093 4.44451 2.5 8.0617 2.5 12.3798C2.5 17.4167 6.58325 21.5 11.6202 21.5C15.9383 21.5 19.5555 18.4991 20.5 14.469Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M21.5 12C21.5 6.75329 17.2467 2.5 12 2.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <!-- Sun Icon for Light Mode -->
                <svg x-show="isDark" xmlns="http://www.w3.org/2000/svg" class="text-neutral-300 w-6 h-6" viewBox="0 0 24 24" fill="none">
                    <path opacity="0.4" d="M17 12C17 14.7614 14.7614 17 12 17C9.23858 17 7 14.7614 7 12C7 9.23858 9.23858 7 12 7C14.7614 7 17 9.23858 17 12Z" fill="currentColor" />
                    <path d="M17 12C17 14.7614 14.7614 17 12 17C9.23858 17 7 14.7614 7 12C7 9.23858 9.23858 7 12 7C14.7614 7 17 9.23858 17 12Z" stroke="currentColor" stroke-width="1.5" />
                    <path d="M11.9955 3H12.0045M11.9961 21H12.0051M18.3588 5.63599H18.3678M5.63409 18.364H5.64307M5.63409 5.63647H5.64307M18.3582 18.3645H18.3672M20.991 12.0006H21M3 12.0006H3.00898" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>
            
            <button class="p-2 rounded-lg transition-colors duration-200 relative" 
                    :class="{ 'hover:bg-neutral-700 text-neutral-300': isDark, 'hover:bg-neutral-200 text-neutral-600': !isDark }"
                    title="Messages">
                <!-- Message Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6" fill="none">
                    <path opacity="0.4" d="M14.1706 20.8905C18.3536 20.6125 21.6856 17.2332 21.9598 12.9909C22.0134 12.1607 22.0134 11.3009 21.9598 10.4707C21.6856 6.22838 18.3536 2.84913 14.1706 2.57107C12.7435 2.47621 11.2536 2.47641 9.8294 2.57107C5.64639 2.84913 2.31441 6.22838 2.04024 10.4707C1.98659 11.3009 1.98659 12.1607 2.04024 12.9909C2.1401 14.536 2.82343 15.9666 3.62791 17.1746C4.09501 18.0203 3.78674 19.0758 3.30021 19.9978C2.94941 20.6626 2.77401 20.995 2.91484 21.2351C3.05568 21.4752 3.37026 21.4829 3.99943 21.4982C5.24367 21.5285 6.08268 21.1757 6.74868 20.6846C7.1264 20.4061 7.31527 20.2668 7.44544 20.2508C7.5756 20.2348 7.83177 20.3403 8.34401 20.5513C8.8044 20.7409 9.33896 20.8579 9.8294 20.8905C11.2536 20.9852 12.7435 20.9854 14.1706 20.8905Z" fill="currentColor" />
                    <path d="M8.5 14.5H15.5M8.5 9.5H12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M14.1706 20.8905C18.3536 20.6125 21.6856 17.2332 21.9598 12.9909C22.0134 12.1607 22.0134 11.3009 21.9598 10.4707C21.6856 6.22838 18.3536 2.84913 14.1706 2.57107C12.7435 2.47621 11.2536 2.47641 9.8294 2.57107C5.64639 2.84913 2.31441 6.22838 2.04024 10.4707C1.98659 11.3009 1.98659 12.1607 2.04024 12.9909C2.1401 14.536 2.82343 15.9666 3.62791 17.1746C4.09501 18.0203 3.78674 19.0758 3.30021 19.9978C2.94941 20.6626 2.77401 20.995 2.91484 21.2351C3.05568 21.4752 3.37026 21.4829 3.99943 21.4982C5.24367 21.5285 6.08268 21.1757 6.74868 20.6846C7.1264 20.4061 7.31527 20.2668 7.44544 20.2508C7.5756 20.2348 7.83177 20.3403 8.34401 20.5513C8.8044 20.7409 9.33896 20.8579 9.8294 20.8905C11.2536 20.9852 12.7435 20.9854 14.1706 20.8905Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                </svg>
                <!-- Status Dot -->
                <div class="absolute top-1.5 right-1.5 w-3 h-3 bg-red-600 rounded-full border-2 border-white"></div>
            </button>

            <button class="p-2 rounded-lg transition-colors duration-200 relative" 
                    :class="{ 'hover:bg-neutral-700': isDark, 'hover:bg-neutral-200': !isDark }"
                    title="Notifications">
                <!-- Notification Bell Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" :class="{ 'text-neutral-300': isDark, 'text-neutral-600': !isDark }" viewBox="0 0 24 24" fill="none">
                    <path opacity="0.4" d="M18.7491 9.70957V9.00497C18.7491 5.13623 15.7274 2 12 2C8.27256 2 5.25087 5.13623 5.25087 9.00497V9.70957C5.25087 10.5552 5.00972 11.3818 4.5578 12.0854L3.45036 13.8095C2.43882 15.3843 3.21105 17.5249 4.97036 18.0229C9.57274 19.3257 14.4273 19.3257 19.0296 18.0229C20.789 17.5249 21.5612 15.3843 20.5496 13.8095L19.4422 12.0854C18.9903 11.3818 18.7491 10.5552 18.7491 9.70957Z" fill="currentColor"/>
                    <path d="M18.7491 9.70957V9.00497C18.7491 5.13623 15.7274 2 12 2C8.27256 2 5.25087 5.13623 5.25087 9.00497V9.70957C5.25087 10.5552 5.00972 11.3818 4.5578 12.0854L3.45036 13.8095C2.43882 15.3843 3.21105 17.5249 4.97036 18.0229C9.57274 19.3257 14.4273 19.3257 19.0296 18.0229C20.789 17.5249 21.5612 15.3843 20.5496 13.8095L19.4422 12.0854C18.9903 11.3818 18.7491 10.5552 18.7491 9.70957Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M7.5 19C8.15503 20.7478 9.92246 22 12 22C14.0775 22 15.845 20.7478 16.5 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <!-- Status Dot -->
                <div class="absolute top-1.5 right-1.5 w-3 h-3 bg-red-600 rounded-full border-2 border-white"></div>
            </button>
        </div>

        <!-- Add Task Button -->
        <div>
            <button class="p-2.5 rounded-md transition-colors duration-200 flex items-center gap-1"
                    :class="{ 
                        'bg-neutral-900 text-white hover:bg-neutral-700': !isDark, 
                        'bg-white text-black hover:bg-neutral-300': isDark 
                    }">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
                <span class="text-sm px-1">Add Task</span>
            </button>
        </div>
    </div>
</div>
