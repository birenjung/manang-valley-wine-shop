@extends('layouts.master')

@section('content')
    <div class="owl-carousel hero-slide owl-style">
        {{-- Hero Carousel items --}}
        <div class="intro-section container" style="background-image: url('/fe-assets/images/hero_1.jpg');">
            <div class="row justify-content-center text-center align-items-center">
                <div class="col-md-8">
                    <span class="sub-title">Royal Wine</span>
                    <h1>Grape Wine</h1>
                </div>
            </div>
        </div>
        <div class="intro-section container" style="background-image: url('/fe-assets/images/hero_2.jpg');">
            <div class="row justify-content-center text-center align-items-center">
                <div class="col-md-8">
                    <span class="sub-title">Welcome</span>
                    <h1>Wines For Everyone</h1>
                </div>
            </div>
        </div>
        <div class="intro-section container" style="background-image: url('/fe-assets/images/hero_3.jpg');">
            <div class="row justify-content-center text-center align-items-center">
                <div class="col-md-8">
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
                    <p><a href="#">View All Products <span class="icon-long-arrow-right"></span></a></p>
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
@endsection

@section('scripts')
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
                    0: { items: 1 },
                    600: { items: 2 },
                    992: { items: 3 }
                }
            });
        });
    </script>
@endsection