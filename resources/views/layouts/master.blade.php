<!DOCTYPE html>
<html lang="en">

<head>
    <title>Manang Valley Wine Shop</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   
    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Playfair+Display:wght@400;700&family=Poppins:wght@400;700&display=swap" rel="stylesheet">

    {{-- Third-Party CSS --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    {{-- Project CSS --}}
    <link rel="stylesheet" href="{{ asset('fe-assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fe-assets/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fe-assets/css/style.css') }}">

    

    {{-- Yield any page-specific CSS --}}
    @yield('styles')
</head>

<body class="retro-neon-theme" data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    <div class="site-wrap">
        {{-- Include the header component --}}
        @include('components.header')

        {{-- The main content section --}}
        @yield('content')

        {{-- Include the footer component --}}
        @include('components.footer')
    </div>

    {{-- Third-Party JS --}}
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

    {{-- Project JS --}}
    <script src="{{ asset('fe-assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('fe-assets/js/main.js') }}"></script>

    {{-- Yield any page-specific scripts --}}
    @yield('scripts')
</body>

</html>