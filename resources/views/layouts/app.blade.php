<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- May need more meta attributes for SEO optimization -->

    <!-- Title by AppServiceProvider method -->
    <title>{{ $pageTitle ?? config('app.name') }} | {{ config('app.name') }}</title>

    <!-- Custom css -->
    <link rel="stylesheet" href="{{ asset('be-assets/js-css/custom.css') }}">

    <!-- Fonts -->
    <link rel=" preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Alpine js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">

        <!-- alerts -->
        <x-alert type="success" :message="session('success')" />
        <x-alert type="error" :message="session('error')" />
        <x-alert type="info" :message="session('info')" />
        <x-alert type="warning" :message="session('warning')" />

        <!-- Page Content -->
        <main>
            @include('layouts.dashboard')
        </main>
    </div>

    <!-- custom js -->
    <script src="{{asset('be-assets/js-css/custom.js')}}"></script>
    <!-- flowbite js -->
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

</body>
</html>