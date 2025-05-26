@extends('templates.mainTemplatedUser')

@section('title', 'Kontak')

@section('konten')
<!-- Page Title -->
<div class="page-title light-background">
    <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Akun</h1>
        <nav class="breadcrumbs">
            <ol>
                <li><a href="/home">Beranda</a></li>
                <li class="current">Akuun</li>
            </ol>
        </nav>
    </div>
</div><!-- End Page Title -->

<section id="account" class="account section">

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <!-- Mobile Menu Toggle -->
        <div class="mobile-menu d-lg-none mb-4">
            <button class="mobile-menu-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#profileMenu">
                <i class="bi bi-grid"></i>
                <span>Menu</span>
            </button>
        </div>

        <div class="row g-4">
            <!-- Profile Menu -->
            <div class="col-lg-3">
                <div class="profile-menu collapse d-lg-block" id="profileMenu">
                    <!-- User Info -->
                    <div class="user-info" data-aos="fade-right">
                        <div class="user-avatar">
                            <img src="{{ $userProfile && $userProfile->foto_profil ? asset('img/user/profile/' . $userProfile->foto_profil) : asset('img/user/profile/default.png') }}"
                                alt="Profile">
                        </div>
                        <h4>{{ old('nama_panjang', $userProfile->nama_panjang ?? '') }}</h4>
                    </div>

                    <!-- Navigation Menu -->
                    <nav class="menu-nav">
                        <ul class="nav flex-column" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#orders">
                                    <i class="bi bi-box-seam"></i>
                                    <span>Pesanan Saya</span>
                                    <span class="badge">3</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#wishlist">
                                    <i class="bi bi-heart"></i>
                                    <span>Daftar Suka</span>
                                    <span class="badge">12</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#reviews">
                                    <i class="bi bi-star"></i>
                                    <span>Ulasan Saya</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#settings">
                                    <i class="bi bi-gear"></i>
                                    <span>Pengaturan Akun</span>
                                </a>
                            </li>
                        </ul>

                        <div class="menu-footer">
                            <a href="#" class="logout-link">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Keluar</span>
                            </a>
                        </div>
                    </nav>
                </div>
            </div>

            <!-- Content Area -->
            <div class="col-lg-9">
                <div class="content-area">
                    <div class="tab-content">
                        <!-- Orders Tab -->
                        <div class="tab-pane fade show active" id="orders">
                            <div class="section-header" data-aos="fade-up">
                                <h2>Pesanan Saya</h2>
                                <div class="header-actions">
                                    <div class="dropdown">
                                        <button class="filter-btn" data-bs-toggle="dropdown">
                                            <i class="bi bi-funnel"></i>
                                            <span>Filter</span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">All Orders</a></li>
                                            <li><a class="dropdown-item" href="#">Diproses</a></li>
                                            <li><a class="dropdown-item" href="#">Dikirim</a></li>
                                            <li><a class="dropdown-item" href="#">Diterima</a></li>
                                            <li><a class="dropdown-item" href="#">Dibatalkan</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="orders-grid">
                                <!-- Order Card 1 -->
                                <div class="order-card" data-aos="fade-up" data-aos-delay="100">
                                    <div class="order-header">
                                        <div class="order-id">
                                            <span class="label">Order ID:</span>
                                            <span class="value">#ORD-2024-1278</span>
                                        </div>
                                        <div class="order-date">Feb 20, 2025</div>
                                    </div>
                                    <div class="order-content">
                                        <div class="product-grid">
                                            <img src="" alt="Product" loading="lazy">
                                            <img src="" alt="Product" loading="lazy">
                                            <img src="" alt="Product" loading="lazy">
                                        </div>
                                        <div class="order-info">
                                            <div class="info-row">
                                                <span>Status</span>
                                                <span class="status processing">Processing</span>
                                            </div>
                                            <div class="info-row">
                                                <span>Items</span>
                                                <span>3 items</span>
                                            </div>
                                            <div class="info-row">
                                                <span>Total</span>
                                                <span class="price">$789.99</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="order-footer">
                                        <button type="button" class="btn-track" data-bs-toggle="collapse"
                                            data-bs-target="#tracking1" aria-expanded="false">Lacak Pesanan</button>
                                        <button type="button" class="btn-details" data-bs-toggle="collapse"
                                            data-bs-target="#details1" aria-expanded="false">Lihat Detail</button>
                                    </div>

                                    <!-- Order Tracking -->
                                    <div class="collapse tracking-info" id="tracking1">
                                        <div class="tracking-timeline">
                                            <div class="timeline-item completed">
                                                <div class="timeline-icon">
                                                    <i class="bi bi-check-circle-fill"></i>
                                                </div>
                                                <div class="timeline-content">
                                                    <h5>Order Confirmed</h5>
                                                    <p>Your order has been received and confirmed</p>
                                                    <span class="timeline-date">Feb 20, 2025 - 10:30 AM</span>
                                                </div>
                                            </div>

                                            <div class="timeline-item completed">
                                                <div class="timeline-icon">
                                                    <i class="bi bi-check-circle-fill"></i>
                                                </div>
                                                <div class="timeline-content">
                                                    <h5>Processing</h5>
                                                    <p>Your order is being prepared for shipment</p>
                                                    <span class="timeline-date">Feb 20, 2025 - 2:45 PM</span>
                                                </div>
                                            </div>

                                            <div class="timeline-item active">
                                                <div class="timeline-icon">
                                                    <i class="bi bi-box-seam"></i>
                                                </div>
                                                <div class="timeline-content">
                                                    <h5>Packaging</h5>
                                                    <p>Your items are being packaged for shipping</p>
                                                    <span class="timeline-date">Feb 20, 2025 - 4:15 PM</span>
                                                </div>
                                            </div>

                                            <div class="timeline-item">
                                                <div class="timeline-icon">
                                                    <i class="bi bi-truck"></i>
                                                </div>
                                                <div class="timeline-content">
                                                    <h5>In Transit</h5>
                                                    <p>Expected to ship within 24 hours</p>
                                                </div>
                                            </div>

                                            <div class="timeline-item">
                                                <div class="timeline-icon">
                                                    <i class="bi bi-house-door"></i>
                                                </div>
                                                <div class="timeline-content">
                                                    <h5>Delivery</h5>
                                                    <p>Estimated delivery: Feb 22, 2025</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Order Details -->
                                    <div class="collapse order-details" id="details1">
                                        <div class="details-content">
                                            <div class="detail-section">
                                                <h5>Order Information</h5>
                                                <div class="info-grid">
                                                    <div class="info-item">
                                                        <span class="label">Payment Method</span>
                                                        <span class="value">Credit Card (**** 4589)</span>
                                                    </div>
                                                    <div class="info-item">
                                                        <span class="label">Shipping Method</span>
                                                        <span class="value">Express Delivery (2-3 days)</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="detail-section">
                                                <h5>Items (3)</h5>
                                                <div class="order-items">
                                                    <div class="item">
                                                        <img src="" alt="Product" loading="lazy">
                                                        <div class="item-info">
                                                            <h6>Lorem ipsum dolor sit amet</h6>
                                                            <div class="item-meta">
                                                                <span class="sku">SKU: PRD-001</span>
                                                                <span class="qty">Qty: 1</span>
                                                            </div>
                                                        </div>
                                                        <div class="item-price">$899.99</div>
                                                    </div>

                                                    <div class="item">
                                                        <img src="" alt="Product" loading="lazy">
                                                        <div class="item-info">
                                                            <h6>Consectetur adipiscing elit</h6>
                                                            <div class="item-meta">
                                                                <span class="sku">SKU: PRD-002</span>
                                                                <span class="qty">Qty: 2</span>
                                                            </div>
                                                        </div>
                                                        <div class="item-price">$599.95</div>
                                                    </div>

                                                    <div class="item">
                                                        <img src="" alt="Product" loading="lazy">
                                                        <div class="item-info">
                                                            <h6>Sed do eiusmod tempor</h6>
                                                            <div class="item-meta">
                                                                <span class="sku">SKU: PRD-003</span>
                                                                <span class="qty">Qty: 1</span>
                                                            </div>
                                                        </div>
                                                        <div class="item-price">$129.99</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="detail-section">
                                                <h5>Price Details</h5>
                                                <div class="price-breakdown">
                                                    <div class="price-row">
                                                        <span>Subtotal</span>
                                                        <span>$1,929.93</span>
                                                    </div>
                                                    <div class="price-row">
                                                        <span>Shipping</span>
                                                        <span>$15.99</span>
                                                    </div>
                                                    <div class="price-row">
                                                        <span>Tax</span>
                                                        <span>$159.98</span>
                                                    </div>
                                                    <div class="price-row total">
                                                        <span>Total</span>
                                                        <span>$2,105.90</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="detail-section">
                                                <h5>Shipping Address</h5>
                                                <div class="address-info">
                                                    <p>Sarah Anderson<br>123 Main Street<br>Apt 4B<br>New York, NY
                                                        10001<br>United States</p>
                                                    <p class="contact">+1 (555) 123-4567</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Order Card 2 -->
                                <div class="order-card" data-aos="fade-up" data-aos-delay="200">
                                    <div class="order-header">
                                        <div class="order-id">
                                            <span class="label">Order ID:</span>
                                            <span class="value">#ORD-2024-1265</span>
                                        </div>
                                        <div class="order-date">Feb 15, 2025</div>
                                    </div>
                                    <div class="order-content">
                                        <div class="product-grid">
                                            <img src="" alt="Product" loading="lazy">
                                            <img src="" alt="Product" loading="lazy">
                                        </div>
                                        <div class="order-info">
                                            <div class="info-row">
                                                <span>Status</span>
                                                <span class="status shipped">Shipped</span>
                                            </div>
                                            <div class="info-row">
                                                <span>Items</span>
                                                <span>2 items</span>
                                            </div>
                                            <div class="info-row">
                                                <span>Total</span>
                                                <span class="price">$459.99</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="order-footer">
                                        <button type="button" class="btn-track" data-bs-toggle="collapse"
                                            data-bs-target="#tracking2" aria-expanded="false">Lacak Pesanan</button>
                                        <button type="button" class="btn-details" data-bs-toggle="collapse"
                                            data-bs-target="#details2" aria-expanded="false">Lihat Detail</button>
                                    </div>

                                    <!-- Order Tracking -->
                                    <div class="collapse tracking-info" id="tracking2">
                                        <div class="tracking-timeline">
                                            <div class="timeline-item completed">
                                                <div class="timeline-icon">
                                                    <i class="bi bi-check-circle-fill"></i>
                                                </div>
                                                <div class="timeline-content">
                                                    <h5>Order Confirmed</h5>
                                                    <p>Your order has been received and confirmed</p>
                                                    <span class="timeline-date">Feb 15, 2025 - 9:15 AM</span>
                                                </div>
                                            </div>

                                            <div class="timeline-item completed">
                                                <div class="timeline-icon">
                                                    <i class="bi bi-check-circle-fill"></i>
                                                </div>
                                                <div class="timeline-content">
                                                    <h5>Processing</h5>
                                                    <p>Your order is being prepared for shipment</p>
                                                    <span class="timeline-date">Feb 15, 2025 - 11:30 AM</span>
                                                </div>
                                            </div>

                                            <div class="timeline-item completed">
                                                <div class="timeline-icon">
                                                    <i class="bi bi-check-circle-fill"></i>
                                                </div>
                                                <div class="timeline-content">
                                                    <h5>Packaging</h5>
                                                    <p>Your items have been packaged for shipping</p>
                                                    <span class="timeline-date">Feb 15, 2025 - 2:45 PM</span>
                                                </div>
                                            </div>

                                            <div class="timeline-item active">
                                                <div class="timeline-icon">
                                                    <i class="bi bi-truck"></i>
                                                </div>
                                                <div class="timeline-content">
                                                    <h5>In Transit</h5>
                                                    <p>Package in transit with carrier</p>
                                                    <span class="timeline-date">Feb 16, 2025 - 10:20 AM</span>
                                                    <div class="shipping-info">
                                                        <span>Tracking Number: </span>
                                                        <span class="tracking-number">1Z999AA1234567890</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="timeline-item">
                                                <div class="timeline-icon">
                                                    <i class="bi bi-house-door"></i>
                                                </div>
                                                <div class="timeline-content">
                                                    <h5>Delivery</h5>
                                                    <p>Estimated delivery: Feb 18, 2025</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Order Details -->
                                    <div class="collapse order-details" id="details2">
                                        <div class="details-content">
                                            <div class="detail-section">
                                                <h5>Order Information</h5>
                                                <div class="info-grid">
                                                    <div class="info-item">
                                                        <span class="label">Payment Method</span>
                                                        <span class="value">Credit Card (**** 7821)</span>
                                                    </div>
                                                    <div class="info-item">
                                                        <span class="label">Shipping Method</span>
                                                        <span class="value">Standard Shipping (3-5 days)</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="detail-section">
                                                <h5>Items (2)</h5>
                                                <div class="order-items">
                                                    <div class="item">
                                                        <img src="" alt="Product" loading="lazy">
                                                        <div class="item-info">
                                                            <h6>Ut enim ad minim veniam</h6>
                                                            <div class="item-meta">
                                                                <span class="sku">SKU: PRD-004</span>
                                                                <span class="qty">Qty: 1</span>
                                                            </div>
                                                        </div>
                                                        <div class="item-price">$299.99</div>
                                                    </div>

                                                    <div class="item">
                                                        <img src="" alt="Product" loading="lazy">
                                                        <div class="item-info">
                                                            <h6>Quis nostrud exercitation</h6>
                                                            <div class="item-meta">
                                                                <span class="sku">SKU: PRD-005</span>
                                                                <span class="qty">Qty: 1</span>
                                                            </div>
                                                        </div>
                                                        <div class="item-price">$159.99</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="detail-section">
                                                <h5>Price Details</h5>
                                                <div class="price-breakdown">
                                                    <div class="price-row">
                                                        <span>Subtotal</span>
                                                        <span>$459.98</span>
                                                    </div>
                                                    <div class="price-row">
                                                        <span>Shipping</span>
                                                        <span>$9.99</span>
                                                    </div>
                                                    <div class="price-row">
                                                        <span>Tax</span>
                                                        <span>$38.02</span>
                                                    </div>
                                                    <div class="price-row total">
                                                        <span>Total</span>
                                                        <span>$459.99</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="detail-section">
                                                <h5>Shipping Address</h5>
                                                <div class="address-info">
                                                    <p>Sarah Anderson<br>123 Main Street<br>Apt 4B<br>New York, NY
                                                        10001<br>United States</p>
                                                    <p class="contact">+1 (555) 123-4567</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Order Card 3 -->
                                <div class="order-card" data-aos="fade-up" data-aos-delay="300">
                                    <div class="order-header">
                                        <div class="order-id">
                                            <span class="label">Order ID:</span>
                                            <span class="value">#ORD-2024-1252</span>
                                        </div>
                                        <div class="order-date">Feb 10, 2025</div>
                                    </div>
                                    <div class="order-content">
                                        <div class="product-grid">
                                            <img src="" alt="Product" loading="lazy">
                                        </div>
                                        <div class="order-info">
                                            <div class="info-row">
                                                <span>Status</span>
                                                <span class="status delivered">Delivered</span>
                                            </div>
                                            <div class="info-row">
                                                <span>Items</span>
                                                <span>1 item</span>
                                            </div>
                                            <div class="info-row">
                                                <span>Total</span>
                                                <span class="price">$129.99</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="order-footer">
                                        <button type="button" class="btn-review">Tulis Ulasan</button>
                                        <button type="button" class="btn-details">Lihat Detail</button>
                                    </div>
                                </div>

                                <!-- Order Card 4 -->
                                <div class="order-card" data-aos="fade-up" data-aos-delay="400">
                                    <div class="order-header">
                                        <div class="order-id">
                                            <span class="label">Order ID:</span>
                                            <span class="value">#ORD-2024-1245</span>
                                        </div>
                                        <div class="order-date">Feb 5, 2025</div>
                                    </div>
                                    <div class="order-content">
                                        <div class="product-grid">
                                            <img src="" alt="Product" loading="lazy">
                                            <img src="" alt="Product" loading="lazy">
                                            <img src="" alt="Product" loading="lazy">
                                            <span class="more-items">+2</span>
                                        </div>
                                        <div class="order-info">
                                            <div class="info-row">
                                                <span>Status</span>
                                                <span class="status cancelled">Cancelled</span>
                                            </div>
                                            <div class="info-row">
                                                <span>Items</span>
                                                <span>5 items</span>
                                            </div>
                                            <div class="info-row">
                                                <span>Total</span>
                                                <span class="price">$1,299.99</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="order-footer">
                                        <button type="button" class="btn-reorder">Beli Lagi</button>
                                        <button type="button" class="btn-details">Lihat Detail</button>
                                    </div>
                                </div>
                            </div>

                            <!-- Pagination -->
                            <div class="pagination-wrapper" data-aos="fade-up">
                                <button type="button" class="btn-prev" disabled="">
                                    <i class="bi bi-chevron-left"></i>
                                </button>
                                <div class="page-numbers">
                                    <button type="button" class="active">1</button>
                                    <button type="button">2</button>
                                    <button type="button">3</button>
                                    <span>...</span>
                                    <button type="button">12</button>
                                </div>
                                <button type="button" class="btn-next">
                                    <i class="bi bi-chevron-right"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Wishlist Tab -->
                        <div class="tab-pane fade" id="wishlist">
                            <div class="section-header" data-aos="fade-up">
                                <h2>Daftar Suka</h2>
                                <div class="header-actions">
                                    <button type="button" class="btn-add-all">Add All to Cart</button>
                                </div>
                            </div>

                            <div class="wishlist-grid">
                                <!-- Wishlist Item 1 -->
                                <div class="wishlist-card" data-aos="fade-up" data-aos-delay="100">
                                    <div class="wishlist-image">
                                        <img src="" alt="Product" loading="lazy">
                                        <button class="btn-remove" type="button" aria-label="Remove from wishlist">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                        <div class="sale-badge">-20%</div>
                                    </div>
                                    <div class="wishlist-content">
                                        <h4>Lorem ipsum dolor sit amet</h4>
                                        <div class="product-meta">
                                            <div class="rating">
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-half"></i>
                                                <span>(4.5)</span>
                                            </div>
                                            <div class="price">
                                                <span class="current">$79.99</span>
                                                <span class="original">$99.99</span>
                                            </div>
                                        </div>
                                        <button type="button" class="btn-add-cart">Add to Cart</button>
                                    </div>
                                </div>

                                <!-- Wishlist Item 2 -->
                                <div class="wishlist-card" data-aos="fade-up" data-aos-delay="200">
                                    <div class="wishlist-image">
                                        <img src="" alt="Product" loading="lazy">
                                        <button class="btn-remove" type="button" aria-label="Remove from wishlist">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                    <div class="wishlist-content">
                                        <h4>Consectetur adipiscing elit</h4>
                                        <div class="product-meta">
                                            <div class="rating">
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star"></i>
                                                <span>(4.0)</span>
                                            </div>
                                            <div class="price">
                                                <span class="current">$149.99</span>
                                            </div>
                                        </div>
                                        <button type="button" class="btn-add-cart">Add to Cart</button>
                                    </div>
                                </div>

                                <!-- Wishlist Item 3 -->
                                <div class="wishlist-card" data-aos="fade-up" data-aos-delay="300">
                                    <div class="wishlist-image">
                                        <img src="" alt="Product" loading="lazy">
                                        <button class="btn-remove" type="button" aria-label="Remove from wishlist">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                        <div class="out-of-stock-badge">Out of Stock</div>
                                    </div>
                                    <div class="wishlist-content">
                                        <h4>Sed do eiusmod tempor</h4>
                                        <div class="product-meta">
                                            <div class="rating">
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <span>(5.0)</span>
                                            </div>
                                            <div class="price">
                                                <span class="current">$199.99</span>
                                            </div>
                                        </div>
                                        <button type="button" class="btn-notify">Notify When Available</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Reviews Tab -->
                        <div class="tab-pane fade" id="reviews">
                            <div class="section-header" data-aos="fade-up">
                                <h2>Ulasan Saya</h2>
                                <div class="header-actions">
                                    <div class="dropdown">
                                        <button class="filter-btn" data-bs-toggle="dropdown">
                                            <i class="bi bi-funnel"></i>
                                            <span>Sort by: Recent</span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Recent</a></li>
                                            <li><a class="dropdown-item" href="#">Highest Rating</a></li>
                                            <li><a class="dropdown-item" href="#">Lowest Rating</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="reviews-grid">
                                <!-- Review Card 1 -->
                                <div class="review-card" data-aos="fade-up" data-aos-delay="100">
                                    <div class="review-header">
                                        <img src="" alt="Product" class="product-image" loading="lazy">
                                        <div class="review-meta">
                                            <h4>Lorem ipsum dolor sit amet</h4>
                                            <div class="rating">
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <span>(5.0)</span>
                                            </div>
                                            <div class="review-date">Reviewed on Feb 15, 2025</div>
                                        </div>
                                    </div>
                                    <div class="review-content">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua.</p>
                                    </div>
                                    <div class="review-footer">
                                        <button type="button" class="btn-edit">Edit Review</button>
                                        <button type="button" class="btn-delete">Delete</button>
                                    </div>
                                </div>

                                <!-- Review Card 2 -->
                                <div class="review-card" data-aos="fade-up" data-aos-delay="200">
                                    <div class="review-header">
                                        <img src="" alt="Product" class="product-image" loading="lazy">
                                        <div class="review-meta">
                                            <h4>Consectetur adipiscing elit</h4>
                                            <div class="rating">
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star"></i>
                                                <span>(4.0)</span>
                                            </div>
                                            <div class="review-date">Reviewed on Feb 10, 2025</div>
                                        </div>
                                    </div>
                                    <div class="review-content">
                                        <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                            aliquip ex ea commodo consequat.</p>
                                    </div>
                                    <div class="review-footer">
                                        <button type="button" class="btn-edit">Edit Review</button>
                                        <button type="button" class="btn-delete">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Settings Tab -->
                        <div class="tab-pane fade" id="settings">
                            <div class="section-header" data-aos="fade-up">
                                <h2>Pengaturan Akun</h2>
                            </div>

                            <div class="settings-content">
                                <!-- Personal Information -->
                                <div class="settings-section" data-aos="fade-up">
                                    <h3>Informasi Personal</h3>
                                    {{-- Jika Ada Error --}}
                                    @if ($errors->any())
                                    <div class="alert alert-danger mt-3 alert-dismissible fade show" role="alert"
                                        style="width: 100%">
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-exclamation-circle-fill me-2"></i>
                                            <div>
                                                @foreach ($errors->all() as $error)
                                                <p class="m-0">{{ $error }}</p>
                                                @endforeach
                                            </div>
                                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                    @endif

                                    {{-- Jika Sukses Login --}}
                                    @if (session('success'))
                                    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert"
                                        style="width: 100%">
                                        <i class="bi bi-check-circle-fill me-2"></i>
                                        {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                    @endif

                                    {{-- Jika Password Telah Diubah --}}
                                    @if (session('status'))
                                    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert"
                                        style="width: 100%">
                                        <i class="bi bi-check-circle-fill me-2"></i>
                                        {{ session('status') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                    @endif

                                    <form class="settings-form" action="{{ route('account.update') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <!-- Foto Profil + Aksi -->
                                        <div class="profile-photo-wrapper text-center mb-4">
                                            <div class="profile-photo">
                                                <img src="{{ $userProfile && $userProfile->foto_profil ? asset('img/user/profile/' . $userProfile->foto_profil) : asset('img/user/profile/default.png') }}"
                                                    alt="Profile" class="profile-img">
                                            </div>
                                            <div class="profile-photo-actions mt-2">
                                                <!-- Tombol Upload -->
                                                <label for="foto_profil"
                                                    class="d-inline-block bg-primary link-light lh-1 p-2 rounded"
                                                    style="cursor: pointer;">
                                                    <i class="bi bi-pencil-fill"></i> Edit
                                                </label>
                                                <input type="file" name="foto_profil" id="foto_profil" class="d-none">

                                                <!-- Tombol Hapus (opsional fungsinya via JS) -->
                                                <label for="hapusFoto"
                                                    class="d-inline-block bg-danger link-light lh-1 p-2 rounded border-0">
                                                    <i class="bi bi-trash-fill"></i> Hapus
                                                </label>
                                            </div>
                                        </div>

                                        <!-- Form Input -->
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label for="nama_panjang" class="form-label">Nama Lengkap</label>
                                                <input type="text" class="form-control" id="firstName"
                                                    value="{{ old('nama_panjang', $userProfile->nama_panjang ?? '') }}"
                                                    placeholder="Masukkan nama lengkap" name="nama_panjang"
                                                    id="nama_panjang">
                                            </div>

                                            <div class="col-md-6">
                                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                                <input class="form-control" id="tanggal_lahir" type="date"
                                                    name="tanggal_lahir"
                                                    value="{{ old('tanggal_lahir', $userProfile->tanggal_lahir ?? '') }}">
                                            </div>

                                            <div class="col-md-6">
                                                <label class="form-label d-block">Jenis Kelamin</label>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="jenis_kelamin"
                                                        id="genderMale" value="Laki-laki"
                                                        {{ old('jenis_kelamin', $userProfile->jenis_kelamin ?? '') === 'Laki-laki' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="genderMale">Laki-laki</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="jenis_kelamin"
                                                        id="genderFemale" value="Perempuan"
                                                        {{ old('jenis_kelamin', $userProfile->jenis_kelamin ?? '') === 'Perempuan' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="genderFemale">Perempuan</label>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="email"
                                                    value="{{ old('email', $user->email ?? '') }}"
                                                    placeholder="Masukkan email" readonly>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="phone" class="form-label">No Handphone</label>
                                                <input class="form-control" type="text" name="noHp" id="noHp"
                                                    value="{{ old('noHp', $userProfile->noHp ?? '') }}"
                                                    placeholder="Masukkan nomor telepon">
                                            </div>
                                        </div>

                                        <!-- Tombol Simpan -->
                                        <div class="form-buttons mt-4">
                                            <button type="submit" class="btn-save">Simpan Perubahan</button>
                                        </div>
                                    </form>
                                </div>

                                <!-- Alamat Pengiriman -->
                                <div class="settings-section" data-aos="fade-up" data-aos-delay="100">
                                    <h3>Alamat Pengiriman</h3>

                                    <!-- Daftar Alamat -->
                                    <div class="list-group mb-3" id="address-list">
                                        @foreach ($alamats as $index => $alamat)
                                        <div class="list-group-item d-flex justify-content-between align-items-start">
                                            <div>
                                                <div class="fw-bold">Alamat {{ $index + 1 }}</div>
                                                {{ $alamat->alamat }}
                                            </div>
                                            <div>
                                                <!-- Tombol Edit (ikon pensil) -->
                                                <button type="button" class="btn btn-sm btn-outline-primary me-1"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editAddressModal{{ $alamat->id }}">
                                                    <i class="bi bi-pencil"></i>
                                                </button>

                                                <!-- Modal Edit Alamat -->
                                                <div class="modal fade" id="editAddressModal{{ $alamat->id }}"
                                                    tabindex="-1"
                                                    aria-labelledby="editAddressModalLabel{{ $alamat->id }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="editAddressModalLabel{{ $alamat->id }}">Edit
                                                                    Alamat</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Tutup"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="POST"
                                                                    action="{{ url('/alamat/' . $alamat->id) }}">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="mb-3">
                                                                        <label for="newAddress{{ $alamat->id }}"
                                                                            class="form-label">Alamat Lengkap</label>
                                                                        <textarea class="form-control"
                                                                            id="newAddress{{ $alamat->id }}" rows="3"
                                                                            placeholder="Masukkan alamat lengkap"
                                                                            name="alamat">{{ $alamat->alamat }}</textarea>
                                                                    </div>
                                                                    <div class="modal-footer px-0">
                                                                        <button type="button"
                                                                            class="btn btn-secondary btn-sm"
                                                                            data-bs-dismiss="modal">Batal</button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary btn-sm">Simpan
                                                                            Perubahan Alamat</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Tombol Hapus -->
                                                <form action="{{ url('/alamat/' . $alamat->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                        @endforeach

                                    </div>

                                    <!-- Tombol Tambah Alamat -->
                                    <button class="btn btn-sm btn-outline-success mb-3" data-bs-toggle="collapse"
                                        data-bs-target="#addAddressForm" aria-expanded="false">
                                        <i class="bi bi-plus-circle"></i> Tambah Alamat
                                    </button>

                                    <!-- Form Tambah Alamat -->
                                    <div class="collapse" id="addAddressForm">
                                        <form method="POST" action="{{url('/alamat')}}" class="">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="newAddress" class="form-label">Alamat Lengkap</label>
                                                <textarea class="form-control" id="newAddress" rows="3"
                                                    placeholder="Masukkan alamat lengkap" name="alamat"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-sm">Simpan Alamat</button>
                                        </form>
                                    </div>
                                </div>

                                <!-- Security Settings -->
                                <div class="settings-section" data-aos="fade-up" data-aos-delay="200">
                                    <h3>Security</h3>
                                    <form class="php-email-form settings-form">
                                        <div class="row g-3">
                                            <div class="col-md-12">
                                                <label for="currentPassword" class="form-label">Current Password</label>
                                                <input type="password" class="form-control" id="currentPassword"
                                                    required>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="newPassword" class="form-label">New Password</label>
                                                <input type="password" class="form-control" id="newPassword" required>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="confirmPassword" class="form-label">Confirm Password</label>
                                                <input type="password" class="form-control" id="confirmPassword"
                                                    required>
                                            </div>
                                        </div>

                                        <!-- Tombol Simpan -->
                                        <div class="form-buttons mt-4">
                                            <button type="submit" class="btn-save">Update Password</button>
                                        </div>

                                        <!-- Feedback -->
                                        <div class="loading">Loading</div>
                                        <div class="error-message"></div>
                                        <div class="sent-message">Your password has been updated successfully!</div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</section><!-- /Account Section -->
@endsection
