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

    <style>
        header.site-navbar {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            background: transparent;
            z-index: 10;
        }
    </style>
</head>

<body class="retro-neon-theme" data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    <div class="site-wrap">
        {{-- Include the header component --}}
        <header class="site-navbar py-2 js-sticky-header site-navbar-target d-block" role="banner">
            <div class="container">
                <div class="d-flex align-items-center">

                    <div class="col-lg-3">
                        <a href="index.html" class="site-logo">
                            <img src="{{ asset('fe-assets/images/logo.png') }}" alt="Manang Wine" class="img-fluid">
                        </a>
                    </div>

                    <div class="col-lg-6 d-none d-lg-block text-center">
                        <nav class="site-navigation position-relative text-left" role="navigation">
                            <ul class="site-menu main-menu js-clone-nav mx-auto d-none pl-0 d-lg-block border-none">
                                <li class="{{ request()->routeIs('home') ? 'active' : '' }}">
                                    <a href="{{ url('/') }}" class="nav-link text-left">Home</a>
                                </li>
                                <li>
                                    <a href="" class="nav-link text-left">About</a>
                                </li>
                                {{--
 <li class="{{ request()->routeIs('about') ? 'active' : '' }}">
                                <a href="{{ route('about') }}" class="nav-link text-left">About</a>
                                </li>

                                <li class="{{ request()->routeIs('contact') ? 'active' : '' }}">
                                    <a href="{{ route('contact') }}" class="nav-link text-left">Contact</a>
                                </li>
                                --}}

                                <li class="{{ request()->routeIs('all.products') ? 'active' : '' }}">
                                    <a href="{{ route('all.products') }}" class="nav-link text-left">Wines</a>
                                </li>
                                <li>
                                    <a href="" class="nav-link text-left">Contact</a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                    <div class="col-lg-3 d-flex justify-content-end align-items-center">
                        <a href="#" class="mx-auto d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a>
                    </div>

                </div>
            </div>
        </header>

        <div class="owl-carousel hero-slide owl-style mt-0">
            {{-- Hero Carousel items --}}
            <div class="intro-section w-100" style="background-image: url('/fe-assets/images/hero_1.jpg');">
                <div class="row justify-content-center text-center align-items-center">
                    <div class="col-md-12">
                        <span class="sub-title">Royal Wine</span>
                        <h1>Grape Wine</h1>
                    </div>
                </div>
            </div>
            <div class="intro-section w-100" style="background-image: url('/fe-assets/images/hero_2.jpg');">
                <div class="row justify-content-center text-center align-items-center">
                    <div class="col-md-12">
                        <span class="sub-title">Welcome</span>
                        <h1>Wines For Everyone</h1>
                    </div>
                </div>
            </div>
            <div class="intro-section w-100" style="background-image: url('/fe-assets/images/hero_3.jpg');">
                <div class="row justify-content-center text-center align-items-center">
                    <div class="col-md-12">
                        <span class="sub-title">Discover</span>
                        <h1>Fine Selections</h1>
                    </div>
                </div>
            </div>
        </div>


        <div class="site-section mt-5">
            <div class="container">
                {{-- Products Section --}}
                <div class="row mb-5">
                    <div class="col-12 section-title text-center mb-5">
                        <h2 class="d-block">Our Products</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi, perspiciatis!</p>
                        <p><a href="{{ route('all.products') }}">View All Products <span class="icon-long-arrow-right"></span></a></p>
                    </div>
                </div>
                <div class="row">
                    {{-- Product 1 --}}
                    <div class="col-lg-4 mb-5 col-md-6">
                        <div class="wine_v_1 text-center pb-4">
                            <a href="shop-single.html" class="thumbnail d-block mb-4"><img src="{{ asset('fe-assets/images/wine_2.png') }}" alt="Image" class="img-fluid"></a>
                            <div>
                                <h3 class="heading mb-1"><a href="#">Trius Cabernet France 2011</a></h3>
                                <span class="price">$629.00</span>
                            </div>
                            <div class="wine-actions">
                                <h3 class="heading-2"><a href="#">Trius Cabernet France 2011</a></h3>
                                <span class="price d-block">$629.00</span>
                                <div class="rating">
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star-o"></span>
                                </div>
                                <a href="#" class="btn add"><span class="icon-shopping-bag mr-3"></span> Add to Cart</a>
                            </div>
                        </div>
                    </div>
                    {{-- Product 2 --}}
                    <div class="col-lg-4 mb-5 col-md-6">
                        <div class="wine_v_1 text-center pb-4">
                            <a href="shop-single.html" class="thumbnail d-block mb-4"><img src="{{ asset('fe-assets/images/wine_3.png') }}" alt="Image" class="img-fluid"></a>
                            <div>
                                <h3 class="heading mb-1"><a href="#">Trius Cabernet France 2011</a></h3>
                                <span class="price">$629.00</span>
                            </div>
                            <div class="wine-actions">
                                <h3 class="heading-2"><a href="#">Trius Cabernet France 2011</a></h3>
                                <span class="price d-block"><del>$900.00</del> $629.00</span>
                                <div class="rating">
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star-o"></span>
                                </div>
                                <a href="#" class="btn add"><span class="icon-shopping-bag mr-3"></span> Add to Cart</a>
                            </div>
                        </div>
                    </div>
                    {{-- Product 3 --}}
                    <div class="col-lg-4 mb-5 col-md-6">
                        <div class="wine_v_1 text-center pb-4">
                            <a href="shop-single.html" class="thumbnail d-block mb-4"><img src="{{ asset('fe-assets/images/wine_1.png') }}" alt="Image" class="img-fluid"></a>
                            <div>
                                <h3 class="heading mb-1"><a href="#">Trius Cabernet France 2011</a></h3>
                                <span class="price">$629.00</span>
                            </div>
                            <div class="wine-actions">
                                <h3 class="heading-2"><a href="#">Trius Cabernet France 2011</a></h3>
                                <span class="price d-block"><del>$900.00</del> $629.00</span>
                                <div class="rating">
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star-o"></span>
                                </div>
                                <a href="#" class="btn add"><span class="icon-shopping-bag mr-3"></span> Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="hero-2" style="background-image: url('/fe-assets/images/hero_2.jpg');">
            <div class="container">
                <div class="row justify-content-center text-center align-items-center">
                    <div class="col-md-8">
                        <span class="sub-title">Welcome</span>
                        <h2>Wines For Everyone</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="site-section bg-dark">
            <div class="container">
                <h2 class="text-center mb-5">What Our Customers Say</h2>
                <div class="owl-carousel owl-slide-3 owl-theme">
                    {{-- Testimonial 1 --}}
                    <blockquote class="testimony">
                        <img src="{{ asset('fe-assets/images/person_2.jpg') }}" alt="Collin Miller">
                        <p>&ldquo;The selection at this wine shop is unparalleled! Every bottle I've tried has been exquisite. Highly recommend for any wine enthusiast.&rdquo;</p>
                        <p class="small text-primary">&mdash; Collin Miller</p>
                    </blockquote>
                    {{-- Testimonial 2 --}}
                    <blockquote class="testimony">
                        <img src="{{ asset('fe-assets/images/person_1.jpg') }}" alt="Harley Perkins">
                        <p>&ldquo;Fantastic service and even better wines. They helped me pick the perfect bottle for a special occasion. I'll definitely be back!&rdquo;</p>
                        <p class="small text-primary">&mdash; Harley Perkins</p>
                    </blockquote>
                    {{-- Testimonial 3 --}}
                    <blockquote class="testimony">
                        <img src="{{ asset('fe-assets/images/person_2.jpg') }}" alt="Levi Morris">
                        <p>&ldquo;As a Laravel developer building scalable applications for global clients, I appreciate well-structured code. This shop's digital experience is as smooth as their Merlot!&rdquo;</p>
                        <p class="small text-primary">&mdash; Levi Morris</p>
                    </blockquote>
                    {{-- Testimonial 4 --}}
                    <blockquote class="testimony">
                        <img src="{{ asset('fe-assets/images/person_1.jpg') }}" alt="Allie Smith">
                        <p>&ldquo;Their online ordering process is seamless, and delivery was quick. The wines arrived perfectly packaged. A truly professional operation.&rdquo;</p>
                        <p class="small text-primary">&mdash; Allie Smith</p>
                    </blockquote>
                </div>
            </div>
        </div>

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
    <script>
        $(document).ready(function() {
            // Initialize Hero Section Carousel
            $(".owl-carousel.hero-slide").owlCarousel({
                items: 1, // Display one item at a time
                loop: true, // Enable looping
                margin: 0, // No margin between items
                nav: false, // Hide navigation arrows for the hero section
                dots: true, // Show navigation dots
                autoplay: true, // Auto play carousel
                autoplayTimeout: 5000, // Time between slides
                smartSpeed: 800, // Speed of slide transition
            });

            // Initialize Testimonial Section Carousel
            $(".owl-carousel.owl-slide-3").owlCarousel({
                loop: true, // Enable continuous loop           
                margin: 0, // Margin between items
                nav: false, // Hide navigation arrows for testimonials
                dots: true, // Show navigation dots
                autoplay: true, // Autoplay the carousel
                autoplayTimeout: 7000, // Time between slides
                smartSpeed: 800, // Speed of the transition between slides
                responsive: { // Responsive settings for different screen sizes
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    992: {
                        items: 3
                    }
                }
            });
        });
    </script>
</body>

</html>