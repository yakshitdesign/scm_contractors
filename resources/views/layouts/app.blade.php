<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      x-data="{ isDark: localStorage.getItem('theme') === 'dark', isExpanded: localStorage.getItem('sidebarExpanded') === 'true' ?? true }"
      x-init="$watch('isDark', value => {
                  localStorage.setItem('theme', value ? 'dark' : 'light');
                  document.documentElement.classList.toggle('dark', value);
              });
              $watch('isExpanded', val => localStorage.setItem('sidebarExpanded', val));
              document.documentElement.classList.toggle('dark', isDark);">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="@yield('description', 'Default description')">
        <meta name="keywords" content="SCM Contractors">
        <meta name="author" content="Genieus Studio">

        <title>@yield('title', config('app.name', 'SCM Contractors'))</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Schibsted+Grotesk:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">

        <!-- Styles -->
        @vite(['resources/scss/app.scss', 'resources/js/app.js'])
        
        <!-- FontAwesome for icons -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
        <!-- Flag Icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css">
    </head>
    <body :class="{ 'dark': isDark }">
        <div class="flex">
            <!-- Side Nav -->
            @if (!in_array(Route::currentRouteName(), ['login', 'register', 'password.request', 'password.reset']))
                <div class="sticky top-0 h-screen">
                    @include('layouts.partials._sidebar')
                </div>
            @endif

            <!-- Page Content -->
            <div class="flex flex-col w-full" :class="{ 'bg-gray-800': isDark, 'bg-white': !isDark }">
                <!-- Header -->
                @if (!in_array(Route::currentRouteName(), ['login', 'register', 'password.request', 'password.reset']))
                    <div class="sticky top-0 z-10">
                        @include('layouts.partials._header')
                    </div>
                @endif

                <!-- Main Content -->
                <main class="h-full" :class="{ 'bg-neutral-900 text-white': isDark, 'bg-neutral-50 text-neutral-900': !isDark }">
                    @yield('content')
                </main>
            </div>
        </div>

        <!-- Bootstrap JS and dependencies (if needed) -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <!-- Alpine.js -->
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.10.2/dist/cdn.min.js" defer></script>
    </body>
</html>
