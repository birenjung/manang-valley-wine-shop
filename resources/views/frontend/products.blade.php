@extends('layouts.master')
@section('content')

<!-- Add custom styles for this page -->
<style>
    /* Enhanced Wine Products Styles */
    .wines-hero {
        background: linear-gradient(135deg, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.5)),
                    url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 300"><path d="M0,100 Q250,50 500,100 T1000,100 L1000,300 L0,300 Z" fill="%23111"/></svg>');
        background-size: cover;
        padding: 4rem 0;
        margin-bottom: 3rem;
        border-radius: 20px;
        position: relative;
        overflow: hidden;
    }
    
    .wines-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg, transparent 30%, rgba(0, 212, 255, 0.1) 50%, transparent 70%);
        animation: shimmer 3s infinite;
    }
    
    @keyframes shimmer {
        0% { transform: translateX(-100%); }
        100% { transform: translateX(100%); }
    }
    
    .wines-hero h1 {
        font-size: 3.5rem;
        font-weight: 700;
        background: linear-gradient(135deg, #ffd700 0%, #00d4ff 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        text-align: center;
        margin-bottom: 1rem;
        position: relative;
        z-index: 1;
    }
    
    .wines-subtitle {
        text-align: center;
        color: #ccc;
        font-size: 1.2rem;
        max-width: 600px;
        margin: 0 auto;
        position: relative;
        z-index: 1;
    }
    
    /* Enhanced Product Cards */
    .wine_v_1 {
        background: linear-gradient(145deg, #1a1a1a 0%, #2d2d2d 100%);
        border-radius: 24px;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        border: 1px solid rgba(255, 255, 255, 0.1);
        position: relative;
        height: 100%;
        display: flex;
        flex-direction: column;
        backdrop-filter: blur(10px);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
    }
    
    .wine_v_1:hover {
        transform: translateY(-12px);
        box-shadow: 0 20px 60px rgba(0, 212, 255, 0.15);
        border-color: rgba(0, 212, 255, 0.3);
    }
    
    /* Image Wrapper Enhancements */
    .product-image-container {
        position: relative;
        height: 320px;
        overflow: hidden;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border-radius: 20px 20px 0 0;
    }
    
    .product-image-container img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        padding: 2rem;
        transition: transform 0.6s ease;
    }
    
    .wine_v_1:hover .product-image-container img {
        transform: scale(1.05);
    }
    
    /* Image Overlay */
    .image-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.7);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
        border-radius: 20px 20px 0 0;
    }
    
    .wine_v_1:hover .image-overlay {
        opacity: 1;
    }
    
    .overlay-content {
        text-align: center;
        color: white;
        transform: translateY(20px);
        transition: transform 0.3s ease;
    }
    
    .wine_v_1:hover .overlay-content {
        transform: translateY(0);
    }
    
    .overlay-content i {
        font-size: 2rem;
        margin-bottom: 8px;
        display: block;
    }
    
    /* Quick Actions */
    .quick-actions {
        position: absolute;
        top: 1rem;
        right: 1rem;
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
        opacity: 0;
        transform: translateX(20px);
        transition: all 0.3s ease;
        z-index: 10;
    }
    
    .wine_v_1:hover .quick-actions {
        opacity: 1;
        transform: translateX(0);
    }
    
    .quick-action-btn {
        width: 42px;
        height: 42px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.95);
        border: none;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
        color: #333;
    }
    
    .quick-action-btn:hover {
        background: white;
        transform: scale(1.1);
        color: #00d4ff;
    }
    
    /* Product Info Section */
    .product-info {
        padding: 2rem;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        text-align: left;
    }
    
    .product-category {
        color: #00d4ff;
        font-size: 0.85rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 0.75rem;
    }
    
    .heading, .heading-2 {
        margin: 0 0 1rem 0;
        font-size: 1.25rem;
        font-weight: 700;
        line-height: 1.3;
    }
    
    .heading a, .heading-2 a {
        color: #ffffff;
        text-decoration: none;
        transition: color 0.3s ease;
    }
    
    .heading a:hover, .heading-2 a:hover {
        color: #00d4ff;
    }
    
    /* Price Styling */
    .price {
        font-size: 1.5rem;
        font-weight: 700;
        color: #ffd700;
        margin-bottom: 1.5rem;
    }
    
    /* Rating Enhancement */
    .rating {
        display: flex;
        align-items: center;
        gap: 0.25rem;
        margin-bottom: 1.5rem;
    }
    
    .rating .icon-star,
    .rating .icon-star-o {
        color: #ffc107;
        font-size: 1.1rem;
    }
    
    .rating .icon-star-o {
        color: #666;
    }
    
    /* Enhanced Add to Cart Button */
    .btn.add {
        width: 100%;
        background: linear-gradient(45deg, #00d4ff, #0099cc);
        border: none;
        border-radius: 25px;
        color: white;
        font-weight: 600;
        padding: 0.875rem 1.5rem;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        text-decoration: none;
        margin-top: auto;
    }
    
    .btn.add:hover {
        background: linear-gradient(45deg, #0099cc, #00d4ff);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 212, 255, 0.4);
        color: white;
        text-decoration: none;
    }
    
    .btn.add:active {
        transform: translateY(0);
    }
    
    /* Carousel Enhancements */
    .carousel-inner {
        border-radius: 20px 20px 0 0;
    }
    
    .carousel-item {
        border-radius: 20px 20px 0 0;
    }
    
    .carousel-control-prev,
    .carousel-control-next {
        width: 50px;
        height: 50px;
        background: rgba(255, 255, 255, 0.9);
        border-radius: 50%;
        top: 50%;
        transform: translateY(-50%);
        opacity: 0;
        transition: all 0.3s ease;
    }
    
    .wine_v_1:hover .carousel-control-prev,
    .wine_v_1:hover .carousel-control-next {
        opacity: 1;
    }
    
    .carousel-control-prev {
        left: 1rem;
    }
    
    .carousel-control-next {
        right: 1rem;
    }
    
    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        background-size: 50%;
        filter: invert(1);
    }
    
    /* No Products Alert Enhancement */
    .alert-info {
        background: linear-gradient(135deg, #00d4ff20, #0099cc20);
        border: 1px solid rgba(0, 212, 255, 0.3);
        color: #00d4ff;
        border-radius: 15px;
        padding: 2rem;
        font-size: 1.1rem;
    }
    
    /* Pagination Enhancement */
    .pagination {
        justify-content: center;
        gap: 0.5rem;
    }
    
    .page-link {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.2);
        color: #fff;
        border-radius: 50%;
        width: 45px;
        height: 45px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }
    
    .page-link:hover,
    .page-item.active .page-link {
        background: #00d4ff;
        color: #000;
        border-color: #00d4ff;
    }
    
    /* Loading Animation */
    .loading-wine {
        animation: wine-pulse 1.5s infinite;
    }
    
    @keyframes wine-pulse {
        0% { opacity: 1; }
        50% { opacity: 0.7; }
        100% { opacity: 1; }
    }
    
    /* Responsive Design */
    @media (max-width: 768px) {
        .wines-hero h1 {
            font-size: 2.5rem;
        }
        
        .product-image-container {
            height: 250px;
        }
        
        .product-info {
            padding: 1.5rem;
        }
        
        .quick-actions {
            display: none;
        }
    }
    
    @media (max-width: 576px) {
        .wines-hero {
            padding: 2rem 0;
        }
        
        .wines-hero h1 {
            font-size: 2rem;
        }
        
        .col-lg-4.col-md-6 {
            margin-bottom: 2rem;
        }
    }
</style>

<!-- Hero Section -->
<div class="wines-hero">
    <h1>Our Wines</h1>
    <p class="wines-subtitle">Discover our carefully curated collection of premium wines from the beautiful valleys</p>
</div>

<div class="container my-5">
    @if($products->isEmpty())
        <div class="alert alert-info text-center">
            <i class="fas fa-wine-bottle mb-3" style="font-size: 3rem;"></i>
            <h4>No wines available at the moment</h4>
            <p class="mb-0">Please check back later for our latest collection.</p>
        </div>
    @else
        <div class="row">
            @foreach($products as $product)
                @php
                    $photos = is_array($product->product_photo)
                        ? $product->product_photo
                        : json_decode($product->product_photo ?? '[]', true);
                @endphp
                
                <div class="col-lg-4 mb-5 col-md-6">
                    <div class="wine_v_1">
                        <!-- Product Image Section -->
                        <div class="product-image-container">
                            @if(!empty($photos))
                                @if(count($photos) > 1)
                                    <!-- Multiple Images - Carousel -->
                                    <div id="carouselProduct{{ $product->id }}" class="carousel slide h-100" data-ride="carousel" data-interval="false">
                                        <div class="carousel-inner h-100">
                                            @foreach($photos as $index => $photo)
                                                <div class="carousel-item h-100 {{ $loop->first ? 'active' : '' }}">
                                                    <a href="{{ route('single.product', $product->id) }}">
                                                        <img src="{{ asset($photo) }}" alt="{{ $product->product_name }}" class="d-block">
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                        
                                        <!-- Carousel Controls -->
                                        <a class="carousel-control-prev" href="#carouselProduct{{ $product->id }}" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselProduct{{ $product->id }}" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                @else
                                    <!-- Single Image -->
                                    <a href="{{ route('single.product', $product->id) }}">
                                        <img src="{{ asset($photos[0]) }}" alt="{{ $product->product_name }}">
                                    </a>
                                @endif
                            @else
                                <!-- No Image Placeholder -->
                                <a href="{{ route('single.product', $product->id) }}">
                                    <img src="https://via.placeholder.com/400x300/2a2a2a/666666?text=No+Image+Available" alt="No Image">
                                </a>
                            @endif
                            
                            <!-- Image Overlay -->
                            <div class="image-overlay">
                                <div class="overlay-content">
                                   <span class="fa fa-eye"></span>
                                    <span>View Details</span>
                                </div>
                            </div>
                            
                            <!-- Quick Actions -->
                            <div class="quick-actions">
                                <button class="quick-action-btn wishlist-btn" data-product-id="{{ $product->id }}" title="Add to Wishlist">
                                    <i class="fa fa-heart"></i>
                                </button>
                                <button class="quick-action-btn quick-view-btn" data-product-id="{{ $product->id }}" title="Quick View">
                                    <i class="fa fa-search-plus"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Product Information -->
                        <div class="product-info">
                            <!-- Product Category (if available) -->
                            @if(isset($product->category))
                                <div class="product-category">{{ $product->category->name ?? 'Wine' }}</div>
                            @endif
                            
                            <!-- Product Name -->
                            <h3 class="heading">
                                <a href="{{ route('single.product', $product->id) }}">{{ $product->product_name }}</a>
                            </h3>
                            
                            <!-- Product Description (if available) -->
                            @if(isset($product->product_description))
                                <p class="product-description text-muted mb-3">
                                    {{ Str::limit($product->product_description, 100) }}
                                </p>
                            @endif
                            
                            <!-- Price -->
                            <div class="mb-3">
                                @if(isset($product->original_price) && $product->original_price > $product->product_price)
                                    <span class="text-muted text-decoration-line-through me-2">
                                        ${{ number_format($product->original_price, 2) }}
                                    </span>
                                @endif
                                <span class="price">${{ number_format($product->product_price, 2) }}</span>
                                @if(isset($product->original_price) && $product->original_price > $product->product_price)
                                    <span class="badge bg-danger ms-2">
                                        {{ round((($product->original_price - $product->product_price) / $product->original_price) * 100) }}% OFF
                                    </span>
                                @endif
                            </div>
                            
                            <!-- Rating -->
                            <div class="rating mb-3">
                                @php
                                    $rating = $product->average_rating ?? 4; // Default to 4 if no rating
                                    $fullStars = floor($rating);
                                    $hasHalfStar = $rating - $fullStars >= 0.5;
                                @endphp
                                
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $fullStars)
                                       <span class="fa fa-star"></span>
                                    @elseif($i == $fullStars + 1 && $hasHalfStar)
                                        <span class="fa fa-star-o"></span>
                                    @else
                                       <span class="fa fa-star"></span>
                                    @endif
                                @endfor
                                <span class="text-muted ms-2">({{ $product->reviews_count ?? 0 }} reviews)</span>
                            </div>
                            
                            <!-- Add to Cart Button -->
                            <a href="#" class="btn add add-to-cart-btn" data-product-id="{{ $product->id }}">
                                <i class="fa fa-shopping-cart"></i>
                                <span class="btn-text">Add to Cart</span>
                            </a>
                        </div>
                        
                        <!-- Stock Status (if available) -->
                        @if(isset($product->stock) && $product->stock <= 5 && $product->stock > 0)
                            <div class="position-absolute top-0 start-0 m-3">
                                <span class="badge bg-warning">Only {{ $product->stock }} left!</span>
                            </div>
                        @elseif(isset($product->stock) && $product->stock == 0)
                            <div class="position-absolute top-0 start-0 m-3">
                                <span class="badge bg-danger">Out of Stock</span>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Enhanced Pagination -->
        <div class="d-flex justify-content-center mt-5">
            {{ $products->links('pagination::bootstrap-4') }}
        </div>
    @endif
</div>



@endsection