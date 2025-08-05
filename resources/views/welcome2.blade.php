
       
   

    <div class="owl-carousel hero-slide owl-theme">
        <div class="intro-section container-fluid" style="background-image: url('/fe-assets/images/hero_1.jpg');">
            <div class="row justify-content-center text-center align-items-center w-100">
                <div class="col-md-8">
                    <span class="sub-title">Royal Wine</span>
                    <h1>Grape Wine</h1>
                </div>
            </div>
        </div>

        <div class="intro-section container-fluid" style="background-image: url('/fe-assets/images/hero_2.jpg');">
            <div class="row justify-content-center text-center align-items-center w-100">
                <div class="col-md-8">
                    <span class="sub-title">Welcome</span>
                    <h1>Wines For Everyone</h1>
                </div>
            </div>
        </div>

        <div class="intro-section container-fluid" style="background-image: url('/fe-assets/images/hero_3.jpg');">
            <div class="row justify-content-center text-center align-items-center w-100">
                <div class="col-md-8">
                    <span class="sub-title">Taste the Difference</span>
                    <h1>Premium Quality</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section bg-light">
        <div class="container">
            <h2 class="text-center mb-5">What Our Customers Say</h2>
            <div class="owl-carousel owl-slide-3 owl-theme">

                <blockquote class="testimony">
                    <img src="/fe-assets/images/person_1.jpg" alt="Collin Miller">
                    <p>&ldquo;The selection at this wine shop is unparalleled! Every bottle I've tried has been exquisite. Highly recommend for any wine enthusiast.&rdquo;</p>
                    <p class="small text-primary">&mdash; Collin Miller</p>
                </blockquote>
                <blockquote class="testimony">
                    <img src="/fe-assets/images/person_2.jpg" alt="Harley Perkins">
                    <p>&ldquo;Fantastic service and even better wines. They helped me pick the perfect bottle for a special occasion. I'll definitely be back!&rdquo;</p>
                    <p class="small text-primary">&mdash; Harley Perkins</p>
                </blockquote>
                <blockquote class="testimony">
                    <img src="/fe-assets/images/person_3.jpg" alt="Levi Morris">
                    <p>&ldquo;As a Laravel developer building scalable applications for global clients, I appreciate well-structured code. This shop's digital experience is as smooth as their Merlot!&rdquo;</p>
                    <p class="small text-primary">&mdash; Levi Morris</p>
                </blockquote>
                <blockquote class="testimony">
                    <img src="/fe-assets/images/person_1.jpg" alt="Allie Smith">
                    <p>&ldquo;Their online ordering process is seamless, and delivery was quick. The wines arrived perfectly packaged. A truly professional operation.&rdquo;</p>
                    <p class="small text-primary">&mdash; Allie Smith</p>
                </blockquote>
                <blockquote class="testimony">
                    <img src="/fe-assets/images/person_2.jpg" alt="Jane Doe">
                    <p>&ldquo;I found my new favorite vineyard through this shop. The descriptions are accurate, and the customer support is top-notch.&rdquo;</p>
                    <p class="small text-primary">&mdash; Jane Doe</p>
                </blockquote>
            </div>
        </div>
    </div>

    <div class="container my-5 text-center">
        <h2>Your Wine Shop Content Here</h2>
        <p>This is where the rest of your beautiful wine shop website will go.</p>
        <p>Remember to customize styles in `fe-assets/css/style.css` and use your own images.</p>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="fe-assets/js/owl.carousel.min.js"></script>

    <script>
        $(document).ready(function(){
            // Initialize Hero Section Carousel
            $(".owl-carousel.hero-slide").owlCarousel({
                items: 1,           // Display one item at a time
                loop: true,         // Enable looping
                margin: 0,          // No margin between items
                nav: true,          // Show navigation arrows
                dots: true,         // Show navigation dots
                autoplay: true,     // Auto play carousel
                autoplayTimeout: 5000, // Time between slides (5 seconds)
                smartSpeed: 800,    // Speed of slide transition
                navText: ["<span class='icon-keyboard_arrow_left'></span>", "<span class='icon-keyboard_arrow_right'></span>"], // Example if using custom nav icons
                // responsive: { /* You can add responsive settings if needed for this carousel */ }
            });

            // Initialize Testimonial Section Carousel
            $(".owl-carousel.owl-slide-3").owlCarousel({
                loop: true,           // Enable continuous loop
                margin: 20,           // Margin between items
                nav: false,           // Hide navigation arrows for testimonials (common design choice)
                dots: true,           // Show navigation dots
                autoplay: true,       // Autoplay the carousel
                autoplayTimeout: 7000, // Time between slides in milliseconds (7 seconds)
                smartSpeed: 800,      // Speed of the transition between slides
                responsive:{          // Responsive settings for different screen sizes
                    0:{
                        items: 1      // 1 item for screens smaller than 600px
                    },
                    600:{
                        items: 2      // 2 items for screens 600px and up
                    },
                    992:{
                        items: 3      // 3 items for screens 992px and up
                    }
                }
            });
        });
    </script>

