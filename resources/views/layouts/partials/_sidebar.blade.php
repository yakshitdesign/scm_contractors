<div class="flex flex-col h-screen transition-all duration-300 bg-white dark:bg-neutral-800 text-neutral-800 dark:text-white border-r border-neutral-200 dark:border-neutral-700"
     :class="{
         'w-72': isExpanded,
         'w-20': !isExpanded
     }">

    <!-- Sidebar Top -->
    <div class="p-2 border-b border-neutral-200 dark:border-neutral-700">
        <div class="p-[12px] flex items-center justify-start">
            <img x-show="isExpanded" src="{{ asset('img/brand/logo-full-dark.svg') }}" alt="Logo" class="transition-opacity duration-300 dark:hidden">
            <img x-show="isExpanded" src="{{ asset('img/brand/logo-full-white.svg') }}" alt="Logo" class="transition-opacity duration-300 hidden dark:block">
            <img x-show="!isExpanded" src="{{ asset('img/brand/logo-icon-dark.svg') }}" alt="Logo" class="transition-opacity duration-300 dark:hidden">
            <img x-show="!isExpanded" src="{{ asset('img/brand/logo-icon-white.svg') }}" alt="Logo" class="transition-opacity duration-300 hidden dark:block">
        </div>
    </div>

    <!-- Navigation Links -->
    <nav class="flex flex-col flex-grow p-[20px] gap-[20px]">
        <!-- Main Menu -->
        <div class="flex flex-col gap-[6px]">
            <div class="flex px-2 py-1 text-xs font-medium text-neutral-400 uppercase tracking-wider"
                 :class="{
                       'justify-start': isExpanded,
                       'justify-center': !isExpanded,
                       'items-center': !isExpanded
                   }">
                <span x-show="isExpanded">Main</span>
                <span x-show="!isExpanded" class="block w-2 h-2 bg-neutral-300 rounded-full"></span>
            </div>
            <div class="flex flex-col gap-1">
                <!-- Dashboard Menu Item -->
                <a href="{{ route('dashboard') }}" 
                   class="flex items-center px-[12px] py-[8px] gap-1 rounded no-underline text-current hover:no-underline focus:outline-none hover:bg-neutral-100 dark:hover:bg-neutral-800"
                   :class="{
                       'justify-between': isExpanded,
                       'justify-center': !isExpanded,
                       'bg-neutral-100 dark:bg-neutral-700': {{ Request::routeIs('dashboard') ? 'true' : 'false' }},
                       'text-neutral-800 dark:text-white': {{ Request::routeIs('dashboard') ? 'true' : 'false' }},
                       'hover:text-neutral-950 dark:hover:text-white': true
                   }">
                    <div class="flex items-center">
                        <div class="menu-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" class="text-current" fill="none">
                                <circle opacity="0.4" cx="6.25" cy="6.25" r="4.25" fill="currentColor" />
                                <circle opacity="0.4" cx="17.75" cy="17.75" r="4.25" fill="currentColor" />
                                <circle cx="17.75" cy="6.25" r="4.25" stroke="currentColor" stroke-width="1.5" />
                                <circle cx="6.25" cy="6.25" r="4.25" stroke="currentColor" stroke-width="1.5" />
                                <circle cx="17.75" cy="17.75" r="4.25" stroke="currentColor" stroke-width="1.5" />
                                <circle cx="6.25" cy="17.75" r="4.25" stroke="currentColor" stroke-width="1.5" />
                            </svg>
                        </div>
                        <span x-show="isExpanded" 
                              x-transition:enter="transition ease-out duration-300"
                              x-transition:enter-start="opacity-0"
                              x-transition:enter-end="opacity-100"
                              class="ml-2">Dashboard</span>
                    </div>
                    <!-- Right-side icon, visible only when active -->
                    <div x-show="isExpanded && {{ Request::routeIs('dashboard') ? 'true' : 'false' }}" 
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" class="text-current" fill="none">
                            <path d="M9.00005 6L15 12L9 18" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="16" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <!-- Right Line -->
                    <div x-show="isExpanded && {{ Request::routeIs('dashboard') ? 'true' : 'false' }}" 
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100"
                        class="absolute left-0">
                        <svg width="4" height="26" viewBox="0 0 4 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0V0C2.20914 0 4 1.79086 4 4V22C4 24.2091 2.20914 26 0 26V26V0Z" fill="currentColor"/>
                        </svg>
                    </div> 
                </a>

                <!-- Employee Menu Item -->
                <a href="{{ route('employee') }}" 
                   class="flex items-center px-[12px] py-[8px] gap-1 rounded no-underline text-current hover:no-underline focus:outline-none hover:bg-neutral-100 dark:hover:bg-neutral-800"
                   :class="{
                       'justify-between': isExpanded,
                       'justify-center': !isExpanded,
                       'bg-neutral-100 dark:bg-neutral-700': {{ Request::routeIs('employee') ? 'true' : 'false' }},
                       'text-neutral-800 dark:text-white': {{ Request::routeIs('employee') ? 'true' : 'false' }},
                       'hover:text-neutral-950 dark:hover:text-white': true
                   }">
                    <div class="flex items-center">
                        <div class="menu-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" class="text-current" fill="none">
                                <path opacity="0.4" d="M4.48131 16.1112C3.30234 16.743 0.211137 18.0331 2.09388 19.6474C3.01359 20.436 4.03791 21 5.32572 21H12.6743C13.9621 21 14.9864 20.436 15.9061 19.6474C17.7889 18.0331 14.6977 16.743 13.5187 16.1112C10.754 14.6296 7.24599 14.6296 4.48131 16.1112Z" fill="currentColor" />
                                <path opacity="0.4" d="M19.5 8C19.5 9.65685 18.1569 11 16.5 11C14.8431 11 13.5 9.65685 13.5 8C13.5 6.34315 14.8431 5 16.5 5C18.1569 5 19.5 6.34315 19.5 8Z" fill="currentColor" />
                                <path d="M18.6161 20H19.1063C20.2561 20 21.1707 19.4761 21.9919 18.7436C24.078 16.8826 19.1741 15 17.5 15M15.5 5.06877C15.7271 5.02373 15.9629 5 16.2048 5C18.0247 5 19.5 6.34315 19.5 8C19.5 9.65685 18.0247 11 16.2048 11C15.9629 11 15.7271 10.9763 15.5 10.9312" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                <path d="M4.48131 16.1112C3.30234 16.743 0.211137 18.0331 2.09388 19.6474C3.01359 20.436 4.03791 21 5.32572 21H12.6743C13.9621 21 14.9864 20.436 15.9061 19.6474C17.7889 18.0331 14.6977 16.743 13.5187 16.1112C10.754 14.6296 7.24599 14.6296 4.48131 16.1112Z" stroke="currentColor" stroke-width="1.5" />
                                <path d="M13 7.5C13 9.70914 11.2091 11.5 9 11.5C6.79086 11.5 5 9.70914 5 7.5C5 5.29086 6.79086 3.5 9 3.5C11.2091 3.5 13 5.29086 13 7.5Z" stroke="currentColor" stroke-width="1.5" />
                            </svg>
                        </div>
                        <span x-show="isExpanded" 
                              x-transition:enter="transition ease-out duration-300"
                              x-transition:enter-start="opacity-0"
                              x-transition:enter-end="opacity-100"
                              class="ml-2">Employee</span>
                    </div>
                    <!-- Right-side icon, visible only when active -->
                    <div x-show="isExpanded && {{ Request::routeIs('employee') ? 'true' : 'false' }}" 
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0"
                         x-transition:enter-end="opacity-100">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" class="text-current" fill="none">
                            <path d="M9.00005 6L15 12L9 18" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="16" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <!-- Right Line -->
                    <div x-show="isExpanded && {{ Request::routeIs('employee') ? 'true' : 'false' }}" 
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100"
                        class="absolute left-0">
                        <svg width="4" height="26" viewBox="0 0 4 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0V0C2.20914 0 4 1.79086 4 4V22C4 24.2091 2.20914 26 0 26V26V0Z" fill="currentColor"/>
                        </svg>
                    </div> 
                </a>

                <!-- Projects Menu Item -->
                <a href="{{ route('projects.index') }}" 
                   class="flex items-center px-[12px] py-[8px] gap-1 rounded no-underline text-current hover:no-underline focus:outline-none hover:bg-neutral-100 dark:hover:bg-neutral-800"
                   :class="{
                       'justify-between': isExpanded,
                       'justify-center': !isExpanded,
                       'bg-neutral-100 dark:bg-neutral-700': {{ Request::routeIs('projects.index') ? 'true' : 'false' }},
                       'text-neutral-800 dark:text-white': {{ Request::routeIs('projects.index') ? 'true' : 'false' }},
                       'hover:text-neutral-950 dark:hover:text-white': true
                   }">
                    <div class="flex items-center">
                        <div class="menu-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" class="text-current" fill="none">
                                <path opacity="0.4" d="M12 21.5C17.2467 21.5 21.5 17.2467 21.5 12C21.5 11.6584 21.482 11.3211 21.4468 10.9888C21.4001 11.1668 21.3213 11.3456 21.2052 11.5336C21.1848 11.5667 21.1469 11.6234 21.1241 11.655C20.5146 12.5 19.5708 12.5 17.6831 12.5H15.5725C13.6527 12.5 12.6928 12.5 12.0964 11.9036C11.5 11.3072 11.5 10.3473 11.5 8.42748V6.31686C11.5 4.42922 11.5 3.4854 12.345 2.87587C12.3766 2.85309 12.4333 2.81523 12.4664 2.79477C12.6544 2.67867 12.8332 2.59988 13.0112 2.55318C12.6789 2.51803 12.3416 2.5 12 2.5C6.75329 2.5 2.5 6.75329 2.5 12C2.5 17.2467 6.75329 21.5 12 21.5Z" fill="currentColor" />
                                <path d="M20.5 15.8278C17.9985 21.756 9.86407 23.4835 5.20143 18.8641C0.629484 14.3347 2.04493 6.12883 8.05653 3.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                <path d="M17.6831 12.5C19.5708 12.5 20.5146 12.5 21.1241 11.655C21.1469 11.6234 21.1848 11.5667 21.2052 11.5336C21.7527 10.6471 21.4705 9.966 20.9063 8.60378C20.3946 7.36853 19.6447 6.24615 18.6993 5.30073C17.7538 4.35531 16.6315 3.60536 15.3962 3.0937C14.034 2.52946 13.3529 2.24733 12.4664 2.79477C12.4333 2.81523 12.3766 2.85309 12.345 2.87587C11.5 3.4854 11.5 4.42922 11.5 6.31686V8.42748C11.5 10.3473 11.5 11.3072 12.0964 11.9036C12.6928 12.5 13.6527 12.5 15.5725 12.5H17.6831Z" stroke="currentColor" stroke-width="1.5" />
                            </svg>
                        </div>
                        <span x-show="isExpanded" 
                              x-transition:enter="transition ease-out duration-300"
                              x-transition:enter-start="opacity-0"
                              x-transition:enter-end="opacity-100"
                              class="ml-2">Projects</span>
                    </div>
                    <!-- Right-side icon, visible only when active -->
                    <div x-show="isExpanded && {{ Request::routeIs('projects.index') ? 'true' : 'false' }}"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0"
                         x-transition:enter-end="opacity-100">
                         <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" class="text-current" fill="none">
                            <path d="M9.00005 6L15 12L9 18" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="16" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <!-- Right Line -->
                    <div x-show="isExpanded && {{ Request::routeIs('projects.index') ? 'true' : 'false' }}" 
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100"
                        class="absolute left-0">
                        <svg width="4" height="26" viewBox="0 0 4 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0V0C2.20914 0 4 1.79086 4 4V22C4 24.2091 2.20914 26 0 26V26V0Z" fill="currentColor"/>
                        </svg>
                    </div> 
                </a>

                <!-- Transactions Menu Item -->
                <a href="{{ route('transactions.index') }}" 
                   class="flex items-center px-[12px] py-[8px] gap-1 rounded no-underline text-current hover:no-underline focus:outline-none hover:bg-neutral-100 dark:hover:bg-neutral-800"
                   :class="{
                       'justify-between': isExpanded,
                       'justify-center': !isExpanded,
                       'bg-neutral-100 dark:bg-neutral-700': {{ Request::routeIs('transactions') ? 'true' : 'false' }},
                       'text-neutral-800 dark:text-white': {{ Request::routeIs('transactions') ? 'true' : 'false' }},
                       'hover:text-neutral-950 dark:hover:text-white': true
                   }">
                    <div class="flex items-center">
                        <div class="menu-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" class="text-current" fill="none">
                                <path opacity="0.4" d="M4.31802 19.682C3 18.364 3 16.2426 3 12C3 7.75736 3 5.63604 4.31802 4.31802C5.63604 3 7.75736 3 12 3C16.2426 3 18.364 3 19.682 4.31802C21 5.63604 21 7.75736 21 12C21 16.2426 21 18.364 19.682 19.682C18.364 21 16.2426 21 12 21C7.75736 21 5.63604 21 4.31802 19.682Z" fill="currentColor" />
                                <path d="M4.31802 19.682C3 18.364 3 16.2426 3 12C3 7.75736 3 5.63604 4.31802 4.31802C5.63604 3 7.75736 3 12 3C16.2426 3 18.364 3 19.682 4.31802C21 5.63604 21 7.75736 21 12C21 16.2426 21 18.364 19.682 19.682C18.364 21 16.2426 21 12 21C7.75736 21 5.63604 21 4.31802 19.682Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M7 14L9.79289 11.2071C10.1834 10.8166 10.8166 10.8166 11.2071 11.2071L12.7929 12.7929C13.1834 13.1834 13.8166 13.1834 14.2071 12.7929L17 10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <span x-show="isExpanded" 
                              x-transition:enter="transition ease-out duration-300"
                              x-transition:enter-start="opacity-0"
                              x-transition:enter-end="opacity-100"
                              class="ml-2">Transactions</span>
                    </div>
                    <!-- Right-side icon, visible only when active -->
                    <div x-show="isExpanded && {{ Request::routeIs('transactions') ? 'true' : 'false' }}"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0"
                         x-transition:enter-end="opacity-100">
                         <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" class="text-current" fill="none">
                            <path d="M9.00005 6L15 12L9 18" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="16" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <!-- Right Line -->
                    <div x-show="isExpanded && {{ Request::routeIs('transactions') ? 'true' : 'false' }}" 
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100"
                        class="absolute left-0">
                        <svg width="4" height="26" viewBox="0 0 4 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0V0C2.20914 0 4 1.79086 4 4V22C4 24.2091 2.20914 26 0 26V26V0Z" fill="currentColor"/>
                        </svg>
                    </div> 
                </a>

                <!-- Contractors Menu Item -->
                <a href="{{ route('contractors.index') }}" 
                   class="flex items-center px-[12px] py-[8px] gap-1 rounded no-underline text-current hover:no-underline focus:outline-none hover:bg-neutral-100 dark:hover:bg-neutral-800"
                   :class="{
                       'justify-between': isExpanded,
                       'justify-center': !isExpanded,
                       'bg-neutral-100 dark:bg-neutral-700': {{ Request::routeIs('contractors.index') ? 'true' : 'false' }},
                       'text-neutral-800 dark:text-white': {{ Request::routeIs('contractors.index') ? 'true' : 'false' }},
                       'hover:text-neutral-950 dark:hover:text-white': true
                   }">
                    <div class="flex items-center">
                        <div class="menu-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" class="text-current" fill="none">
                                <path opacity="0.4" fill-rule="evenodd" clip-rule="evenodd" d="M22 12C22 14.837 20.8186 17.398 18.921 19.218C18.6043 18.4167 17.4037 17.7616 16.5924 17.3189C16.454 17.2434 16.3268 17.174 16.2174 17.1112C13.6371 15.6296 10.3629 15.6296 7.78256 17.1112C7.67312 17.174 7.54602 17.2434 7.40759 17.3189C6.59628 17.7616 5.39574 18.4167 5.07897 19.218C3.18136 17.398 2 14.837 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12ZM12 13.5C13.933 13.5 15.5 11.933 15.5 10C15.5 8.067 13.933 6.5 12 6.5C10.067 6.5 8.5 8.067 8.5 10C8.5 11.933 10.067 13.5 12 13.5Z" fill="currentColor" />
                                <path d="M7.78256 17.1112C6.68218 17.743 3.79706 19.0331 5.55429 20.6474C6.41269 21.436 7.36872 22 8.57068 22H15.4293C16.6313 22 17.5873 21.436 18.4457 20.6474C20.2029 19.0331 17.3178 17.743 16.2174 17.1112C13.6371 15.6296 10.3629 15.6296 7.78256 17.1112Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M15.5 10C15.5 11.933 13.933 13.5 12 13.5C10.067 13.5 8.5 11.933 8.5 10C8.5 8.067 10.067 6.5 12 6.5C13.933 6.5 15.5 8.067 15.5 10Z" stroke="currentColor" stroke-width="1.5" />
                                <path d="M2.854 16C2.30501 14.7664 2 13.401 2 11.9646C2 6.46129 6.47715 2 12 2C17.5228 2 22 6.46129 22 11.9646C22 13.401 21.695 14.7664 21.146 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                        </div>
                        <span x-show="isExpanded" 
                              x-transition:enter="transition ease-out duration-300"
                              x-transition:enter-start="opacity-0"
                              x-transition:enter-end="opacity-100"
                              class="ml-2">Contractors</span>
                    </div>
                    <!-- Right-side icon, visible only when active -->
                    <div x-show="isExpanded && {{ Request::routeIs('contractors.index') ? 'true' : 'false' }}"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0"
                         x-transition:enter-end="opacity-100">
                         <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" class="text-current" fill="none">
                            <path d="M9.00005 6L15 12L9 18" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="16" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <!-- Right Line -->
                    <div x-show="isExpanded && {{ Request::routeIs('contractors.index') ? 'true' : 'false' }}" 
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100"
                        class="absolute left-0">
                        <svg width="4" height="26" viewBox="0 0 4 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0V0C2.20914 0 4 1.79086 4 4V22C4 24.2091 2.20914 26 0 26V26V0Z" fill="currentColor"/>
                        </svg>
                    </div> 
                </a>

                <!-- Accounting Menu Item -->
                <a href="{{ route('accounting.index') }}" 
                   class="flex items-center px-[12px] py-[8px] gap-1 rounded no-underline text-current hover:no-underline focus:outline-none hover:bg-neutral-100 dark:hover:bg-neutral-800"
                   :class="{
                       'justify-between': isExpanded,
                       'justify-center': !isExpanded,
                       'bg-neutral-100 dark:bg-neutral-700': {{ Request::routeIs('accounting') ? 'true' : 'false' }},
                       'text-neutral-800 dark:text-white': {{ Request::routeIs('accounting') ? 'true' : 'false' }},
                       'hover:text-neutral-950 dark:hover:text-white': true
                   }">
                    <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" class="text-current" fill="none">
                                <path opacity="0.4" d="M4 18.6458V8.05426C4 5.20025 4 3.77325 4.87868 2.88663C5.75736 2 7.17157 2 10 2H14C16.8284 2 18.2426 2 19.1213 2.88663C20 3.77325 20 5.20025 20 8.05426V18.6458C20 20.1575 20 20.9133 19.538 21.2108C18.7831 21.6971 17.6161 20.6774 17.0291 20.3073C16.5441 20.0014 16.3017 19.8485 16.0325 19.8397C15.7417 19.8301 15.4949 19.9768 14.9709 20.3073L13.06 21.5124C12.5445 21.8374 12.2868 22 12 22C11.7132 22 11.4555 21.8374 10.94 21.5124L9.02913 20.3073C8.54415 20.0014 8.30166 19.8485 8.03253 19.8397C7.74172 19.8301 7.49493 19.9768 6.97087 20.3073C6.38395 20.6774 5.21687 21.6971 4.46195 21.2108C4 20.9133 4 20.1575 4 18.6458Z" fill="currentColor" />
                                <path d="M4 18.6458V8.05426C4 5.20025 4 3.77325 4.87868 2.88663C5.75736 2 7.17157 2 10 2H14C16.8284 2 18.2426 2 19.1213 2.88663C20 3.77325 20 5.20025 20 8.05426V18.6458C20 20.1575 20 20.9133 19.538 21.2108C18.7831 21.6971 17.6161 20.6774 17.0291 20.3073C16.5441 20.0014 16.3017 19.8485 16.0325 19.8397C15.7417 19.8301 15.4949 19.9768 14.9709 20.3073L13.06 21.5124C12.5445 21.8374 12.2868 22 12 22C11.7132 22 11.4555 21.8374 10.94 21.5124L9.02913 20.3073C8.54415 20.0014 8.30166 19.8485 8.03253 19.8397C7.74172 19.8301 7.49493 19.9768 6.97087 20.3073C6.38395 20.6774 5.21687 21.6971 4.46195 21.2108C4 20.9133 4 20.1575 4 18.6458Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M11 11H8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M14 7L8 7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        <span x-show="isExpanded" 
                              x-transition:enter="transition ease-out duration-300"
                              x-transition:enter-start="opacity-0"
                              x-transition:enter-end="opacity-100"
                              class="ml-2">Accounting</span>
                    </div>
                    <!-- Right-side icon, visible only when active -->
                    <div x-show="isExpanded && {{ Request::routeIs('accounting') ? 'true' : 'false' }}" 
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0"
                         x-transition:enter-end="opacity-100">
                         <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" class="text-current" fill="none">
                            <path d="M9.00005 6L15 12L9 18" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="16" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <!-- Right Line -->
                    <div x-show="isExpanded && {{ Request::routeIs('accounting') ? 'true' : 'false' }}" 
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100"
                        class="absolute left-0">
                        <svg width="4" height="26" viewBox="0 0 4 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0V0C2.20914 0 4 1.79086 4 4V22C4 24.2091 2.20914 26 0 26V26V0Z" fill="currentColor"/>
                        </svg>
                    </div> 
                </a>
            </div>
        </div>
        <!-- Other Menu -->
         <div class="flex flex-col gap-[6px]">
            <div class="flex px-2 py-1 text-xs font-medium text-neutral-400 uppercase tracking-wider"
                 :class="{
                       'justify-start': isExpanded,
                       'justify-center': !isExpanded,
                       'items-center': !isExpanded
                   }">
                <span x-show="isExpanded">Other</span>
                <span x-show="!isExpanded" class="block w-2 h-2 bg-neutral-300 rounded-full"></span>
            </div>
            <div class="flex flex-col gap-1">
                <!-- Notifications Menu Item -->
                <a href="{{ route('notifications.index') }}" 
                    class="flex items-center px-[12px] py-[8px] gap-1 rounded no-underline text-current hover:no-underline focus:outline-none hover:bg-neutral-100 dark:hover:bg-neutral-800"
                    :class="{
                       'justify-between': isExpanded,
                       'justify-center': !isExpanded,
                       'bg-neutral-100 dark:bg-neutral-700': {{ Request::routeIs('notifications') ? 'true' : 'false' }},
                       'text-neutral-800 dark:text-white': {{ Request::routeIs('notifications') ? 'true' : 'false' }},
                       'hover:text-neutral-950 dark:hover:text-white': true
                    }">
                    <div class="flex items-center">
                        <div class="menu-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" class="text-current" fill="none">
                                <path opacity="0.4" d="M2.52992 14.7696C2.31727 16.1636 3.268 17.1312 4.43205 17.6134C8.89481 19.4622 15.1052 19.4622 19.5679 17.6134C20.732 17.1312 21.6827 16.1636 21.4701 14.7696C21.3394 13.9129 20.6932 13.1995 20.2144 12.5029C19.5873 11.5793 19.525 10.5718 19.5249 9.5C19.5249 5.35786 16.1559 2 12 2C7.84413 2 4.47513 5.35786 4.47513 9.5C4.47503 10.5718 4.41272 11.5793 3.78561 12.5029C3.30684 13.1995 2.66061 13.9129 2.52992 14.7696Z" fill="currentColor" />
                                <path d="M2.52992 14.7696C2.31727 16.1636 3.268 17.1312 4.43205 17.6134C8.89481 19.4622 15.1052 19.4622 19.5679 17.6134C20.732 17.1312 21.6827 16.1636 21.4701 14.7696C21.3394 13.9129 20.6932 13.1995 20.2144 12.5029C19.5873 11.5793 19.525 10.5718 19.5249 9.5C19.5249 5.35786 16.1559 2 12 2C7.84413 2 4.47513 5.35786 4.47513 9.5C4.47503 10.5718 4.41272 11.5793 3.78561 12.5029C3.30684 13.1995 2.66061 13.9129 2.52992 14.7696Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M8 19C8.45849 20.7252 10.0755 22 12 22C13.9245 22 15.5415 20.7252 16 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <span x-show="isExpanded" 
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0"
                            x-transition:enter-end="opacity-100"
                            class="ml-2">Notifications</span>
                    </div>
                    <!-- Right-side icon, visible only when active -->
                    <div x-show="isExpanded && {{ Request::routeIs('notifications') ? 'true' : 'false' }}" 
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" class="text-current" fill="none">
                            <path d="M9.00005 6L15 12L9 18" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="16" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <!-- Right Line -->
                    <div x-show="isExpanded && {{ Request::routeIs('notifications') ? 'true' : 'false' }}" 
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100"
                        class="absolute left-0">
                        <svg width="4" height="26" viewBox="0 0 4 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0V0C2.20914 0 4 1.79086 4 4V22C4 24.2091 2.20914 26 0 26V26V0Z" fill="currentColor"/>
                        </svg>
                    </div> 
                </a>
                <!-- Admin Menu Item -->
                <a href="{{ route('admin.index') }}" 
                    class="flex items-center px-[12px] py-[8px] gap-1 rounded no-underline text-current hover:no-underline focus:outline-none hover:bg-neutral-100 dark:hover:bg-neutral-800"
                    :class="{
                       'justify-between': isExpanded,
                       'justify-center': !isExpanded,
                       'bg-neutral-100 dark:bg-neutral-700': {{ Request::routeIs('admin') ? 'true' : 'false' }},
                       'text-neutral-800 dark:text-white': {{ Request::routeIs('admin') ? 'true' : 'false' }},
                       'hover:text-neutral-950 dark:hover:text-white': true
                    }">
                    <div class="flex items-center">
                        <div class="menu-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" class="text-current" fill="none">
                                <path opacity="0.4" d="M6.57757 15.4816C5.1628 16.324 1.45336 18.0441 3.71266 20.1966C4.81631 21.248 6.04549 22 7.59087 22H16.4091C17.9545 22 19.1837 21.248 20.2873 20.1966C22.5466 18.0441 18.8372 16.324 17.4224 15.4816C14.1048 13.5061 9.89519 13.5061 6.57757 15.4816Z" fill="currentColor" />
                                <path d="M6.57757 15.4816C5.1628 16.324 1.45336 18.0441 3.71266 20.1966C4.81631 21.248 6.04549 22 7.59087 22H16.4091C17.9545 22 19.1837 21.248 20.2873 20.1966C22.5466 18.0441 18.8372 16.324 17.4224 15.4816C14.1048 13.5061 9.89519 13.5061 6.57757 15.4816Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M16.5 6.5C16.5 8.98528 14.4853 11 12 11C9.51472 11 7.5 8.98528 7.5 6.5C7.5 4.01472 9.51472 2 12 2C14.4853 2 16.5 4.01472 16.5 6.5Z" stroke="currentColor" stroke-width="1.5" />
                            </svg>
                        </div>
                        <span x-show="isExpanded" 
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0"
                            x-transition:enter-end="opacity-100"
                            class="ml-2">Admin</span>
                    </div>
                    <!-- Right-side icon, visible only when active -->
                    <div x-show="isExpanded && {{ Request::routeIs('admin') ? 'true' : 'false' }}" 
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" class="text-current" fill="none">
                            <path d="M9.00005 6L15 12L9 18" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="16" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <!-- Right Line -->
                    <!-- Right Line -->
                    <div x-show="isExpanded && {{ Request::routeIs('admin') ? 'true' : 'false' }}" 
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100"
                        class="absolute left-0">
                        <svg width="4" height="26" viewBox="0 0 4 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0V0C2.20914 0 4 1.79086 4 4V22C4 24.2091 2.20914 26 0 26V26V0Z" fill="currentColor"/>
                        </svg>
                    </div> 
                </a>
                <!-- Settings Menu Item -->
                <a href="#" 
                    class="flex items-center px-[12px] py-[8px] gap-1 rounded no-underline text-current hover:no-underline focus:outline-none hover:bg-neutral-100 dark:hover:bg-neutral-800"
                    :class="{
                       'justify-between': isExpanded,
                       'justify-center': !isExpanded,
                       'bg-neutral-100 dark:bg-neutral-700': {{ Request::routeIs('settings') ? 'true' : 'false' }},
                       'text-neutral-800 dark:text-white': {{ Request::routeIs('settings') ? 'true' : 'false' }},
                       'hover:text-neutral-950 dark:hover:text-white': true
                    }">
                    <div class="flex items-center">
                        <div class="menu-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" class="text-current" fill="none">
                            <path opacity="0.4" fill-rule="evenodd" clip-rule="evenodd" d="M20.8239 6.28479L21.3175 7.14139C21.6674 7.74864 21.8423 8.05227 21.8084 8.37549C21.7744 8.69871 21.5402 8.95918 21.0718 9.48012L20.0407 10.6328C19.7888 10.9518 19.6098 11.5078 19.6098 12.0077C19.6098 12.5078 19.7887 13.0636 20.0407 13.3827L21.0718 14.5354C21.5402 15.0564 21.7744 15.3168 21.8084 15.6401C21.8423 15.9633 21.6674 16.2669 21.3175 16.8741L20.8239 17.7307C20.4506 18.3785 20.264 18.7025 19.9464 18.8316C19.6288 18.9608 19.2696 18.8589 18.5513 18.655L17.3311 18.3113C16.8724 18.2055 16.3912 18.2656 15.9724 18.4808L15.6356 18.6752C15.2765 18.9052 15.0004 19.2442 14.8476 19.6428L14.5136 20.6403C14.294 21.3003 14.1842 21.6303 13.9228 21.8191C13.6615 22.0078 13.3143 22.0078 12.6199 22.0078H11.5051C10.8108 22.0078 10.4636 22.0078 10.2022 21.8191C9.94085 21.6303 9.83106 21.3003 9.61149 20.6403L9.2775 19.6428C9.12464 19.2442 8.84851 18.9052 8.4895 18.6752L8.15267 18.4808C7.73387 18.2656 7.25263 18.2055 6.79394 18.3113L5.57377 18.655C4.85542 18.8589 4.49625 18.9608 4.17867 18.8316C3.86109 18.7025 3.67443 18.3785 3.30114 17.7307L2.80757 16.8741C2.45766 16.2669 2.2827 15.9633 2.31666 15.6401C2.35062 15.3168 2.58483 15.0564 3.05326 14.5354L4.08433 13.3827C4.33636 13.0636 4.51521 12.5078 4.51521 12.0077C4.51521 11.5078 4.3363 10.9518 4.0843 10.6328L3.05326 9.48012C2.58483 8.95918 2.35061 8.69871 2.31666 8.37549C2.2827 8.05227 2.45766 7.74864 2.80757 7.14139L3.30115 6.28479C3.67445 5.63696 3.86109 5.31305 4.17867 5.18388C4.49625 5.05472 4.85541 5.15664 5.57375 5.36048L6.79398 5.70418C7.25259 5.80994 7.73374 5.74994 8.15249 5.53479L8.48937 5.34042C8.84845 5.11043 9.12465 4.77133 9.27753 4.37274L9.61149 3.37536C9.83106 2.71534 9.94085 2.38533 10.2022 2.19657C10.4636 2.00781 10.8108 2.00781 11.5051 2.00781H12.6199C13.3143 2.00781 13.6615 2.00781 13.9228 2.19657C14.1842 2.38533 14.294 2.71534 14.5136 3.37536L14.8475 4.37274C15.0004 4.77133 15.2766 5.11043 15.6357 5.34042L15.9726 5.53479C16.3913 5.74994 16.8725 5.80994 17.3311 5.70418L18.5513 5.36048C19.2696 5.15664 19.6288 5.05472 19.9464 5.18388C20.264 5.31305 20.4506 5.63696 20.8239 6.28479ZM12.0195 15.5C13.9525 15.5 15.5195 13.933 15.5195 12C15.5195 10.067 13.9525 8.5 12.0195 8.5C10.0865 8.5 8.51953 10.067 8.51953 12C8.51953 13.933 10.0865 15.5 12.0195 15.5Z" fill="currentColor" />
                            <path d="M21.3175 7.14139L20.8239 6.28479C20.4506 5.63696 20.264 5.31305 19.9464 5.18388C19.6288 5.05472 19.2696 5.15664 18.5513 5.36048L17.3311 5.70418C16.8725 5.80994 16.3913 5.74994 15.9726 5.53479L15.6357 5.34042C15.2766 5.11043 15.0004 4.77133 14.8475 4.37274L14.5136 3.37536C14.294 2.71534 14.1842 2.38533 13.9228 2.19657C13.6615 2.00781 13.3143 2.00781 12.6199 2.00781H11.5051C10.8108 2.00781 10.4636 2.00781 10.2022 2.19657C9.94085 2.38533 9.83106 2.71534 9.61149 3.37536L9.27753 4.37274C9.12465 4.77133 8.84845 5.11043 8.48937 5.34042L8.15249 5.53479C7.73374 5.74994 7.25259 5.80994 6.79398 5.70418L5.57375 5.36048C4.85541 5.15664 4.49625 5.05472 4.17867 5.18388C3.86109 5.31305 3.67445 5.63696 3.30115 6.28479L2.80757 7.14139C2.45766 7.74864 2.2827 8.05227 2.31666 8.37549C2.35061 8.69871 2.58483 8.95918 3.05326 9.48012L4.0843 10.6328C4.3363 10.9518 4.51521 11.5078 4.51521 12.0077C4.51521 12.5078 4.33636 13.0636 4.08433 13.3827L3.05326 14.5354C2.58483 15.0564 2.35062 15.3168 2.31666 15.6401C2.2827 15.9633 2.45766 16.2669 2.80757 16.8741L3.30114 17.7307C3.67443 18.3785 3.86109 18.7025 4.17867 18.8316C4.49625 18.9608 4.85542 18.8589 5.57377 18.655L6.79394 18.3113C7.25263 18.2055 7.73387 18.2656 8.15267 18.4808L8.4895 18.6752C8.84851 18.9052 9.12464 19.2442 9.2775 19.6428L9.61149 20.6403C9.83106 21.3003 9.94085 21.6303 10.2022 21.8191C10.4636 22.0078 10.8108 22.0078 11.5051 22.0078H12.6199C13.3143 22.0078 13.6615 22.0078 13.9228 21.8191C14.1842 21.6303 14.294 21.3003 14.5136 20.6403L14.8476 19.6428C15.0004 19.2442 15.2765 18.9052 15.6356 18.6752L15.9724 18.4808C16.3912 18.2656 16.8724 18.2055 17.3311 18.3113L18.5513 18.655C19.2696 18.8589 19.6288 18.9608 19.9464 18.8316C20.264 18.7025 20.4506 18.3785 20.8239 17.7307L21.3175 16.8741C21.6674 16.2669 21.8423 15.9633 21.8084 15.6401C21.7744 15.3168 21.5402 15.0564 21.0718 14.5354L20.0407 13.3827C19.7887 13.0636 19.6098 12.5078 19.6098 12.0077C19.6098 11.5078 19.7888 10.9518 20.0407 10.6328L21.0718 9.48012C21.5402 8.95918 21.7744 8.69871 21.8084 8.37549C21.8423 8.05227 21.6674 7.74864 21.3175 7.14139Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            <path d="M15.5195 12C15.5195 13.933 13.9525 15.5 12.0195 15.5C10.0865 15.5 8.51953 13.933 8.51953 12C8.51953 10.067 10.0865 8.5 12.0195 8.5C13.9525 8.5 15.5195 10.067 15.5195 12Z" stroke="currentColor" stroke-width="1.5" />
                        </svg>
                        </div>
                        <span x-show="isExpanded" 
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0"
                            x-transition:enter-end="opacity-100"
                            class="ml-2">Settings</span>
                    </div>
                    <!-- Right-side icon, visible only when active -->
                    <div x-show="isExpanded && {{ Request::routeIs('settings') ? 'true' : 'false' }}" 
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" class="text-current" fill="none">
                            <path d="M9.00005 6L15 12L9 18" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="16" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <!-- Right Line -->
                    <div x-show="isExpanded && {{ Request::routeIs('settings') ? 'true' : 'false' }}" 
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100"
                        class="absolute left-0">
                        <svg width="4" height="26" viewBox="0 0 4 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0V0C2.20914 0 4 1.79086 4 4V22C4 24.2091 2.20914 26 0 26V26V0Z" fill="currentColor"/>
                        </svg>
                    </div> 
                </a>
            </div>
         </div>
    </nav>

    <!-- Side Navigation Bottom -->

    <div class="sidebar-bottom p-2 border-t border-neutral-200 dark:border-neutral-700">
    <div x-data="{ open: false }" class="relative">
        <!-- User Profile Section -->
        <div @click="open = !open" class="sidebar-action-item flex items-center rounded-md justify-start p-[12px] gap-[12px] cursor-pointer hover:bg-neutral-100 dark:hover:bg-neutral-700 transition-colors duration-200">
            <img class="h-10 w-10 rounded-full object-cover" 
                 src="{{ Auth::user()->avatar ?? asset('img/misc/default-avatar.png') }}" 
                 alt="User avatar">
            <div class="flex flex-col min-w-0 gap-[2px] flex-grow">
                <div class="flex items-center justify-start gap-1">
                    <p class="text-md font-medium truncate m-0">
                        {{ Auth::user()->name }}
                    </p>
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.75431 3.81504C7.87834 3.53147 6.92607 3.92591 6.50716 4.74584L6.00355 5.73158C5.94371 5.8487 5.84846 5.94396 5.73133 6.00379L4.7456 6.50741C3.92566 6.92631 3.53123 7.87858 3.81479 8.75456L4.15571 9.80768C4.19621 9.93281 4.19621 10.0676 4.15571 10.1927L3.81479 11.2458C3.53123 12.1218 3.92566 13.0741 4.7456 13.493L5.73133 13.9966C5.84846 14.0564 5.94371 14.1517 6.00355 14.2688L6.50716 15.2546C6.92607 16.0745 7.87834 16.4689 8.75431 16.1854L9.80744 15.8444C9.93256 15.8039 10.0673 15.8039 10.1924 15.8444L11.2456 16.1854C12.1216 16.4689 13.0738 16.0745 13.4928 15.2546L13.9963 14.2688C14.0562 14.1517 14.1514 14.0564 14.2686 13.9966L15.2543 13.493C16.0743 13.0741 16.4687 12.1218 16.1851 11.2458L15.8442 10.1927C15.8037 10.0676 15.8037 9.93281 15.8442 9.80768L16.1851 8.75456C16.4687 7.87858 16.0743 6.92631 15.2543 6.50741L14.2686 6.00379C14.1514 5.94396 14.0562 5.8487 13.9963 5.73158L13.4928 4.74584C13.0738 3.92591 12.1216 3.53147 11.2456 3.81504L10.1924 4.15595C10.0673 4.19645 9.93256 4.19646 9.80744 4.15595L8.75431 3.81504ZM6.72479 9.84849L7.60868 8.96456L9.37644 10.7324L12.912 7.19684L13.7959 8.08072L9.37644 12.5001L6.72479 9.84849Z" fill="#35B9E9"/>
                    </svg>
                </div>
                <p class="text-xs truncate m-0 text-neutral-500 dark:text-neutral-400">
                    {{ Auth::user()->role ?? 'No Role assigned' }}
                </p>
            </div>
            <div x-show="isExpanded">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.50004 5L12.5 10L7.5 15" stroke="currentColor" stroke-width="1.25" stroke-miterlimit="16" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
        </div>
        <!-- Dropdown Menu -->
        <ul x-show="open" class="dropdown-menu custom-shadow absolute min-w-[240px] bg-white dark:bg-neutral-800 rounded-md z-10 border border-neutral-200 dark:border-neutral-700"
            @click.away="open = false" style="margin: 0; padding: 0; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);">
            <li class="menu-item-header">
                <div class="p-3 flex items-center gap-2">
                    <span class="avatar avatar-circle avatar-md">
                        <img class="h-10 w-10 rounded-full object-cover" 
                             src="{{ Auth::user()->avatar ?? asset('img/misc/default-avatar.png') }}" 
                             alt="User avatar" loading="lazy">
                    </span>
                    <div>
                        <p class="text-md font-medium truncate m-0 text-neutral-800 dark:text-white">
                            {{ Auth::user()->name }}
                        </p>
                        <p class="text-xs truncate m-0 text-neutral-500 dark:text-neutral-400">
                            {{ Auth::user()->role ?? 'No Role assigned' }}
                        </p>
                    </div>
                </div>
            </li>
            <li class="menu-item-divider border-t border-neutral-200 dark:border-neutral-700" style="margin: 0;"></li>
            <li class="menu-item hover:bg-neutral-100 dark:hover:bg-neutral-700 transition-colors duration-200" style="padding: 12px;">
                <a class="flex gap-2 items-center text-neutral-800 dark:text-white" href="{{ route('settings') }}">
                    <span class="text-xl opacity-50">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" class="text-neutral-800 dark:text-white" fill="none">
                            <path opacity="0.4" d="M6.57757 15.4816C5.1628 16.324 1.45336 18.0441 3.71266 20.1966C4.81631 21.248 6.04549 22 7.59087 22H16.4091C17.9545 22 19.1837 21.248 20.2873 20.1966C22.5466 18.0441 18.8372 16.324 17.4224 15.4816C14.1048 13.5061 9.89519 13.5061 6.57757 15.4816Z" fill="currentColor" />
                            <path d="M6.57757 15.4816C5.1628 16.324 1.45336 18.0441 3.71266 20.1966C4.81631 21.248 6.04549 22 7.59087 22H16.4091C17.9545 22 19.1837 21.248 20.2873 20.1966C22.5466 18.0441 18.8372 16.324 17.4224 15.4816C14.1048 13.5061 9.89519 13.5061 6.57757 15.4816Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M16.5 6.5C16.5 8.98528 14.4853 11 12 11C9.51472 11 7.5 8.98528 7.5 6.5C7.5 4.01472 9.51472 2 12 2C14.4853 2 16.5 4.01472 16.5 6.5Z" stroke="currentColor" stroke-width="1.5" />
                        </svg>
                    </span>
                    <span>Profile</span>
                </a>
            </li>
            <li class="menu-item hover:bg-neutral-100 dark:hover:bg-neutral-700 transition-colors duration-200" style="padding: 12px;">
                <a class="flex gap-2 items-center text-neutral-800 dark:text-white" href="{{ route('settings') }}">
                    <span class="text-xl opacity-50">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" class="text-neutral-800 dark:text-white" fill="none">
                            <path opacity="0.4" d="M17 10.8045C17 10.4588 17 10.286 17.052 10.132C17.2032 9.68444 17.6018 9.51076 18.0011 9.32888C18.45 9.12442 18.6744 9.02219 18.8968 9.0042C19.1493 8.98378 19.4022 9.03818 19.618 9.15929C19.9041 9.31984 20.1036 9.62493 20.3079 9.87302C21.2513 11.0188 21.7229 11.5918 21.8955 12.2236C22.0348 12.7334 22.0348 13.2666 21.8955 13.7764C21.6438 14.6979 20.8485 15.4704 20.2598 16.1854C19.9587 16.5511 19.8081 16.734 19.618 16.8407C19.4022 16.9618 19.1493 17.0162 18.8968 16.9958C18.6744 16.9778 18.45 16.8756 18.0011 16.6711C17.6018 16.4892 17.2032 16.3156 17.052 15.868C17 15.714 17 15.5412 17 15.1955V10.8045Z" fill="currentColor" />
                            <path opacity="0.4" d="M7 10.8046C7 10.3694 6.98778 9.97821 6.63591 9.6722C6.50793 9.5609 6.33825 9.48361 5.99891 9.32905C5.55001 9.12458 5.32556 9.02235 5.10316 9.00436C4.43591 8.9504 4.07692 9.40581 3.69213 9.87318C2.74875 11.019 2.27706 11.5919 2.10446 12.2237C1.96518 12.7336 1.96518 13.2668 2.10446 13.7766C2.3562 14.6981 3.15152 15.4705 3.74021 16.1856C4.11129 16.6363 4.46577 17.0475 5.10316 16.996C5.32556 16.978 5.55001 16.8757 5.99891 16.6713C6.33825 16.5167 6.50793 16.4394 6.63591 16.3281C6.98778 16.0221 7 15.631 7 15.1957V10.8046Z" fill="currentColor" />
                            <path d="M17 10.8045C17 10.4588 17 10.286 17.052 10.132C17.2032 9.68444 17.6018 9.51076 18.0011 9.32888C18.45 9.12442 18.6744 9.02219 18.8968 9.0042C19.1493 8.98378 19.4022 9.03818 19.618 9.15929C19.9041 9.31984 20.1036 9.62493 20.3079 9.87302C21.2513 11.0188 21.7229 11.5918 21.8955 12.2236C22.0348 12.7334 22.0348 13.2666 21.8955 13.7764C21.6438 14.6979 20.8485 15.4704 20.2598 16.1854C19.9587 16.5511 19.8081 16.734 19.618 16.8407C19.4022 16.9618 19.1493 17.0162 18.8968 16.9958C18.6744 16.9778 18.45 16.8756 18.0011 16.6711C17.6018 16.4892 17.2032 16.3156 17.052 15.868C17 15.714 17 15.5412 17 15.1955V10.8045Z" stroke="currentColor" stroke-width="1.5" />
                            <path d="M7 10.8046C7 10.3694 6.98778 9.97821 6.63591 9.6722C6.50793 9.5609 6.33825 9.48361 5.99891 9.32905C5.55001 9.12458 5.32556 9.02235 5.10316 9.00436C4.43591 8.9504 4.07692 9.40581 3.69213 9.87318C2.74875 11.019 2.27706 11.5919 2.10446 12.2237C1.96518 12.7336 1.96518 13.2668 2.10446 13.7766C2.3562 14.6981 3.15152 15.4705 3.74021 16.1856C4.11129 16.6363 4.46577 17.0475 5.10316 16.996C5.32556 16.978 5.55001 16.8757 5.99891 16.6713C6.33825 16.5167 6.50793 16.4394 6.63591 16.3281C6.98778 16.0221 7 15.631 7 15.1957V10.8046Z" stroke="currentColor" stroke-width="1.5" />
                            <path d="M5 9C5 5.68629 8.13401 3 12 3C15.866 3 19 5.68629 19 9" stroke="currentColor" stroke-width="1.5" stroke-linecap="square" stroke-linejoin="round" />
                            <path d="M19 17V17.8C19 19.5673 17.2091 21 15 21H13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                    <span>Support</span>
                </a>
            </li>
            <li class="menu-item-divider border-t border-neutral-200 dark:border-neutral-700" style="margin: 0;"></li>
            <li class="menu-item hover:bg-neutral-100 dark:hover:bg-neutral-700 transition-colors duration-200" style="padding: 12px;">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex gap-2 items-center w-full text-left text-neutral-800 dark:text-white">
                        <span class="text-xl opacity-50">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" class="text-neutral-800 dark:text-white" fill="none">
                                <path opacity="0.4" d="M3 11.1627V12.8373C3 14.0944 3 14.723 3.10956 15.2815C3.70555 18.3203 6.18961 19.6768 9.05112 20.484C10.2401 20.8194 10.8346 20.987 11.3156 20.9988C13.3831 21.0494 14.9264 19.4769 15 17.625V6.37501C14.9264 4.52307 13.3831 2.95061 11.3156 3.00119C10.8346 3.01295 10.2401 3.18064 9.05112 3.51603C6.18961 4.32316 3.70555 5.67965 3.10956 8.71846C3 9.27705 3 9.90561 3 11.1627Z" fill="currentColor" />
                                <path d="M15 17.625C14.9264 19.4769 13.3831 21.0494 11.3156 20.9988C10.8346 20.987 10.2401 20.8194 9.05112 20.484C6.18961 19.6768 3.70555 18.3203 3.10956 15.2815C3 14.723 3 14.0944 3 12.8373L3 11.1627C3 9.90561 3 9.27705 3.10956 8.71846C3.70555 5.67965 6.18961 4.32316 9.05112 3.51603C10.2401 3.18064 10.8346 3.01295 11.3156 3.00119C13.3831 2.95061 14.9264 4.52307 15 6.37501" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                <path d="M21 12H10M21 12C21 11.2998 19.0057 9.99153 18.5 9.5M21 12C21 12.7002 19.0057 14.0085 18.5 14.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                        <span>Sign Out</span>
                    </button>
                </form>
            </li>
        </ul>
    </div>
</div>
</div>