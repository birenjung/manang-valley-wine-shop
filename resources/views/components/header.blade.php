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