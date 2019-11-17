@extends('customer.template.customer_template')
@section('slider')
<!--slider area start-->
<section class="slider_section slider_s_one mb-60 mt-20">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-12">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <?php $i=0;?>
                        @foreach ($banner as $item)
                        @if ($item->role == 2)
                        <li data-target="#carouselExampleIndicators" data-slide-to="<?=$i?>"
                            class="<?php if($i==0){echo 'active';}?>"></li>
                        <?php $i++?>
                        @endif
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                        <?php $i=0;?>
                        @foreach ($banner as $item)
                        @if ($item->role == 2)
                        <div class="carousel-item <?php if($i==0){echo 'active';}?>">
                            <a href=""><img src="http://doanweb1234.com/storage/<?=$item->url?>" class="d-block w-100"></a>
                        </div>
                        <?php $i++;?>
                        @endif
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <div class="categories_product_inner">
                    <div class="single_categories_product banner_thumb" style="width:50%">
                        <a href="shop.html"><img
                                src="http://theme.hstatic.net/1000026716/1000440777/14/slideshow_1.jpg?v=7857"
                                alt=""></a>
                    </div>
                    <div class="single_categories_product banner_thumb" style="width:50%">
                        <a href="shop.html"><img
                                src="http://theme.hstatic.net/1000026716/1000440777/14/slideshow_1.jpg?v=7857"
                                alt=""></a>
                    </div>
                </div>
            </div>
            <div class="s_banner col-lg-3 col-md-12">
                <!--banner area start-->
                <div class="sidebar_banner_area">
                    @foreach ($banner as $item)
                    @if ($item->role==1)
                    <figure class="single_banner mb-20">
                        <div class="banner_thumb" style="width:100%">
                            <a href="shop.html"><img src="http://gemingear.vn/storage/<?=$item->url?>" alt=""></a>
                        </div>
                    </figure>
                    @endif
                    @endforeach
                </div>
                <!--banner area end-->
            </div>
        </div>
    </div>
</section>
<!--slider area end-->
@endsection
@section('content')
<!--home section bg area start-->
<div class="home_section_bg">
    <!--Categories product area start-->
    <div class="categories_product_area mb-55">
        <div class="container">
            <div class="categories_product_inner">
                <div class="single_categories_product">
                    <div class="categories_product_content">
                        <h4><a href="shop.html"> Cells & Tablets</a></h4>
                        <p>12 Products</p>
                    </div>
                    <div class="categories_product_thumb">
                        <a href="shop.html"><img class="category-img" style="height: 104px;"
                                src="{{asset('assets/customer/img/s-product/category11.gif')}}" alt=""></a>
                    </div>
                </div>
                <div class="single_categories_product">
                    <div class="categories_product_content">
                        <h4><a href="shop.html"> Cells & Tablets</a></h4>
                        <p>12 Products</p>
                    </div>
                    <div class="categories_product_thumb">
                        <a href="shop.html"><img class="category-img" style="height: 104px;"
                                src="{{asset('assets/customer/img/s-product/category2.jpg')}}" alt=""></a>
                    </div>
                </div>
                <div class="single_categories_product">
                    <div class="categories_product_content">
                        <h4><a href="shop.html"> Cells & Tablets</a></h4>
                        <p>12 Products</p>
                    </div>
                    <div class="categories_product_thumb">
                        <a href="shop.html"><img class="category-img" style="height: 104px;"
                                src="{{asset('assets/customer/img/s-product/category3.jpg')}}" alt=""></a>
                    </div>
                </div>
                <div class="single_categories_product">
                    <div class="categories_product_content">
                        <h4><a href="shop.html"> Cells & Tablets</a></h4>
                        <p>12 Products</p>
                    </div>
                    <div class="categories_product_thumb">
                        <a href="shop.html"><img class="category-img" style="height: 104px;"
                                src="{{asset('assets/customer/img/s-product/category4.png')}}" alt=""></a>
                    </div>
                </div>
                <div class="single_categories_product">
                    <div class="categories_product_content">
                        <h4><a href="shop.html"> Cells & Tablets</a></h4>
                        <p>12 Products</p>
                    </div>
                    <div class="categories_product_thumb">
                        <a href="shop.html"><img class="category-img" style="height: 104px;"
                                src="{{asset('assets/customer/img/s-product/category5.png')}}" alt=""></a>
                    </div>
                </div>
                <div class="single_categories_product">
                    <div class="categories_product_content">
                        <h4><a href="shop.html"> Computer</a></h4>
                        <p>24 Products</p>
                    </div>
                    <div class="categories_product_thumb">
                        <a href="shop.html"><img src="{{asset('assets/customer/img/s-product/category6.jpg')}}"
                                alt=""></a>
                    </div>
                </div>
                <div class="single_categories_product">
                    <div class="categories_product_content">
                        <h4><a href="shop.html"> Computer</a></h4>
                        <p>24 Products</p>
                    </div>
                    <div class="categories_product_thumb">
                        <a href="shop.html"><img src="{{asset('assets/customer/img/s-product/category7.png')}}"
                                alt=""></a>
                    </div>
                </div>
                <div class="single_categories_product">
                    <div class="categories_product_content">
                        <h4><a href="shop.html"> Computer</a></h4>
                        <p>24 Products</p>
                    </div>
                    <div class="categories_product_thumb">
                        <a href="shop.html"><img src="{{asset('assets/customer/img/s-product/category10.jpg')}}"
                                alt=""></a>
                    </div>
                </div>
                <div class="single_categories_product">
                    <div class="categories_product_content">
                        <h4><a href="shop.html"> Computer</a></h4>
                        <p>24 Products</p>
                    </div>
                    <div class="categories_product_thumb">
                        <a href="shop.html"><img src="{{asset('assets/customer/img/s-product/category9.png')}}"
                                alt=""></a>
                    </div>
                </div>
                <div class="single_categories_product">
                    <div class="categories_product_content">
                        <h4><a href="shop.html"> Computer</a></h4>
                        <p>24 Products</p>
                    </div>
                    <div class="categories_product_thumb">
                        <a href="shop.html"><img src="{{asset('assets/customer/img/s-product/category8.png')}}"
                                alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Categories product area end-->
    <!--product area start-->
    <div class="product_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_header">
                        <div class="section_title">
                            <h2>Sản phẩm khuyến mãi</h2>

                        </div>
                        <div class="product_tab_btn">
                            <ul class="nav" role="tablist">
                                <li>
                                    <a style="color:blue;" data-toggle="tab" href="#Computer" role="tab"
                                        aria-controls="Computer" aria-selected="true">
                                        Xem tất cả
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="Computer" role="tabpanel">
                    <div class="product_carousel product_style product_column5 owl-carousel">
                        <article class="single_product">
                            <figure>
                                <div class="product_thumb">
                                    <a class="primary_img" href="product-details.html"><img
                                            src="assets/customer/img/product/product1.jpg" alt=""></a>
                                    <a class="secondary_img" href="product-details.html"><img
                                            src="assets/customer/img/product/product2.jpg" alt=""></a>
                                    <div class="label_product">
                                        <span class="label_sale">Sale</span>
                                    </div>
                                    <div class="action_links">
                                        <ul>
                                            <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                        class="ion-android-favorite-outline"></i></a></li>
                                            <li class="compare"><a href="#" title="Add to Compare"><i
                                                        class="ion-ios-settings-strong"></i></a></li>
                                            <li class="quick_button"><a href="#" data-toggle="modal"
                                                    data-target="#modal_box" title="quick view"><i
                                                        class="ion-ios-search-strong"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product_content">
                                    <div class="product_content_inner">
                                        <h4 class="product_name"><a href="product-details.html">Eodem modo vel
                                                mattis ante facilisis nec porttitor efficitur</a></h4>
                                        <div class="price_box">
                                            <span class="old_price">$86.00</span>
                                            <span class="current_price">$79.00</span>
                                        </div>
                                    </div>
                                    <div class="add_to_cart">
                                        <a href="cart.html" title="Add to cart">Add to cart</a>
                                    </div>
                                </div>
                            </figure>
                        </article>  
                    </div>
                </div>
                <div class="tab-pane fade" id="Networking" role="tabpanel">
                    <div class="product_carousel product_style product_column5 owl-carousel">
                        <article class="single_product">
                            <figure>
                                <div class="product_thumb">
                                    <a class="primary_img" href="product-details.html"><img
                                            src="assets/img/product/product9.jpg" alt=""></a>
                                    <a class="secondary_img" href="product-details.html"><img
                                            src="assets/img/product/product10.jpg" alt=""></a>
                                    <div class="label_product">
                                        <span class="label_sale">Sale</span>
                                    </div>
                                    <div class="action_links">
                                        <ul>
                                            <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                        class="ion-android-favorite-outline"></i></a></li>
                                            <li class="compare"><a href="#" title="Add to Compare"><i
                                                        class="ion-ios-settings-strong"></i></a></li>
                                            <li class="quick_button"><a href="#" data-toggle="modal"
                                                    data-target="#modal_box" title="quick view"><i
                                                        class="ion-ios-search-strong"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product_content">
                                    <div class="product_content_inner">
                                        <h4 class="product_name"><a href="product-details.html">Mirum est notare tellus
                                                eu nibh iaculis pretium</a></h4>
                                        <div class="price_box">
                                            <span class="old_price">$72.00</span>
                                            <span class="current_price">$70.00</span>
                                        </div>
                                    </div>
                                    <div class="add_to_cart">
                                        <a href="cart.html" title="Add to cart">Add to cart</a>
                                    </div>

                                </div>
                            </figure>
                        </article>
                        <article class="single_product">
                            <figure>
                                <div class="product_thumb">
                                    <a class="primary_img" href="product-details.html"><img
                                            src="assets/img/product/product11.jpg" alt=""></a>
                                    <a class="secondary_img" href="product-details.html"><img
                                            src="assets/img/product/product12.jpg" alt=""></a>
                                    <div class="label_product">
                                        <span class="label_sale">Sale</span>
                                    </div>
                                    <div class="action_links">
                                        <ul>
                                            <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                        class="ion-android-favorite-outline"></i></a></li>
                                            <li class="compare"><a href="#" title="Add to Compare"><i
                                                        class="ion-ios-settings-strong"></i></a></li>
                                            <li class="quick_button"><a href="#" data-toggle="modal"
                                                    data-target="#modal_box" title="quick view"><i
                                                        class="ion-ios-search-strong"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product_content">
                                    <div class="product_content_inner">
                                        <h4 class="product_name"><a href="product-details.html">Mirum est notare tellus
                                                eu nibh iaculis pretium</a></h4>
                                        <div class="price_box">
                                            <span class="old_price">$65.00</span>
                                            <span class="current_price">$60.00</span>
                                        </div>
                                    </div>
                                    <div class="add_to_cart">
                                        <a href="cart.html" title="Add to cart">Add to cart</a>
                                    </div>

                                </div>
                            </figure>
                        </article>
                        <article class="single_product">
                            <figure>
                                <div class="product_thumb">
                                    <a class="primary_img" href="product-details.html"><img
                                            src="assets/img/product/product13.jpg" alt=""></a>
                                    <a class="secondary_img" href="product-details.html"><img
                                            src="assets/img/product/product14.jpg" alt=""></a>
                                    <div class="label_product">
                                        <span class="label_sale">Sale</span>
                                    </div>
                                    <div class="action_links">
                                        <ul>
                                            <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                        class="ion-android-favorite-outline"></i></a></li>
                                            <li class="compare"><a href="#" title="Add to Compare"><i
                                                        class="ion-ios-settings-strong"></i></a></li>
                                            <li class="quick_button"><a href="#" data-toggle="modal"
                                                    data-target="#modal_box" title="quick view"><i
                                                        class="ion-ios-search-strong"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product_content">
                                    <div class="product_content_inner">
                                        <h4 class="product_name"><a href="product-details.html">Nostrum exercitationem
                                                itae neque nulla nec posuere sem</a></h4>
                                        <div class="price_box">
                                            <span class="old_price">$70.00</span>
                                            <span class="current_price">$68.00</span>
                                        </div>
                                    </div>
                                    <div class="add_to_cart">
                                        <a href="cart.html" title="Add to cart">Add to cart</a>
                                    </div>

                                </div>
                            </figure>
                        </article>
                        <article class="single_product">
                            <figure>
                                <div class="product_thumb">
                                    <a class="primary_img" href="product-details.html"><img
                                            src="assets/img/product/product15.jpg" alt=""></a>
                                    <a class="secondary_img" href="product-details.html"><img
                                            src="assets/img/product/product16.jpg" alt=""></a>
                                    <div class="label_product">
                                        <span class="label_sale">Sale</span>
                                    </div>
                                    <div class="action_links">
                                        <ul>
                                            <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                        class="ion-android-favorite-outline"></i></a></li>
                                            <li class="compare"><a href="#" title="Add to Compare"><i
                                                        class="ion-ios-settings-strong"></i></a></li>
                                            <li class="quick_button"><a href="#" data-toggle="modal"
                                                    data-target="#modal_box" title="quick view"><i
                                                        class="ion-ios-search-strong"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product_content">
                                    <div class="product_content_inner">
                                        <h4 class="product_name"><a href="product-details.html">Porro quisquam eget
                                                feugiat pretium posuere maximus</a></h4>
                                        <div class="price_box">
                                            <span class="old_price">$65.00</span>
                                            <span class="current_price">$60.00</span>
                                        </div>
                                    </div>
                                    <div class="add_to_cart">
                                        <a href="cart.html" title="Add to cart">Add to cart</a>
                                    </div>

                                </div>
                            </figure>
                        </article>
                        <article class="single_product">
                            <figure>
                                <div class="product_thumb">
                                    <a class="primary_img" href="product-details.html"><img
                                            src="assets/img/product/product17.jpg" alt=""></a>
                                    <a class="secondary_img" href="product-details.html"><img
                                            src="assets/img/product/product18.jpg" alt=""></a>
                                    <div class="label_product">
                                        <span class="label_sale">Sale</span>
                                    </div>
                                    <div class="action_links">
                                        <ul>
                                            <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                        class="ion-android-favorite-outline"></i></a></li>
                                            <li class="compare"><a href="#" title="Add to Compare"><i
                                                        class="ion-ios-settings-strong"></i></a></li>
                                            <li class="quick_button"><a href="#" data-toggle="modal"
                                                    data-target="#modal_box" title="quick view"><i
                                                        class="ion-ios-search-strong"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product_content">
                                    <div class="product_content_inner">
                                        <h4 class="product_name"><a href="product-details.html">Cras neque honcus
                                                consectetur magna imperdiet</a></h4>
                                        <div class="price_box">
                                            <span class="old_price">$65.00</span>
                                            <span class="current_price">$60.00</span>
                                        </div>
                                    </div>
                                    <div class="add_to_cart">
                                        <a href="cart.html" title="Add to cart">Add to cart</a>
                                    </div>

                                </div>
                            </figure>
                        </article>
                        <article class="single_product">
                            <figure>
                                <div class="product_thumb">
                                    <a class="primary_img" href="product-details.html"><img
                                            src="assets/img/product/product19.jpg" alt=""></a>
                                    <a class="secondary_img" href="product-details.html"><img
                                            src="assets/img/product/product20.jpg" alt=""></a>
                                    <div class="label_product">
                                        <span class="label_sale">Sale</span>
                                    </div>
                                    <div class="action_links">
                                        <ul>
                                            <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                        class="ion-android-favorite-outline"></i></a></li>
                                            <li class="compare"><a href="#" title="Add to Compare"><i
                                                        class="ion-ios-settings-strong"></i></a></li>
                                            <li class="quick_button"><a href="#" data-toggle="modal"
                                                    data-target="#modal_box" title="quick view"><i
                                                        class="ion-ios-search-strong"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product_content">
                                    <div class="product_content_inner">
                                        <h4 class="product_name"><a href="product-details.html">Donec eu libero ac
                                                dapibus urna consectetur rhoncus</a></h4>
                                        <div class="price_box">
                                            <span class="old_price">$65.00</span>
                                            <span class="current_price">$60.00</span>
                                        </div>
                                    </div>
                                    <div class="add_to_cart">
                                        <a href="cart.html" title="Add to cart">Add to cart</a>
                                    </div>

                                </div>
                            </figure>
                        </article>
                    </div>
                </div>
                <div class="tab-pane fade" id="Computer2" role="tabpanel">
                    <div class="product_carousel product_style product_column5 owl-carousel">
                        <article class="single_product">
                            <figure>
                                <div class="product_thumb">
                                    <a class="primary_img" href="product-details.html"><img
                                            src="assets/img/product/product17.jpg" alt=""></a>
                                    <a class="secondary_img" href="product-details.html"><img
                                            src="assets/img/product/product18.jpg" alt=""></a>
                                    <div class="label_product">
                                        <span class="label_sale">Sale</span>
                                    </div>
                                    <div class="action_links">
                                        <ul>
                                            <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                        class="ion-android-favorite-outline"></i></a></li>
                                            <li class="compare"><a href="#" title="Add to Compare"><i
                                                        class="ion-ios-settings-strong"></i></a></li>
                                            <li class="quick_button"><a href="#" data-toggle="modal"
                                                    data-target="#modal_box" title="quick view"><i
                                                        class="ion-ios-search-strong"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product_content">
                                    <div class="product_content_inner">
                                        <h4 class="product_name"><a href="product-details.html">Cras neque honcus
                                                consectetur magna imperdiet</a></h4>
                                        <div class="price_box">
                                            <span class="old_price">$65.00</span>
                                            <span class="current_price">$60.00</span>
                                        </div>
                                    </div>
                                    <div class="add_to_cart">
                                        <a href="cart.html" title="Add to cart">Add to cart</a>
                                    </div>

                                </div>
                            </figure>
                        </article>
                    </div>
                </div>
                <div class="tab-pane fade" id="Audio" role="tabpanel">
                    <div class="product_carousel product_style product_column5 owl-carousel">
                        <article class="single_product">
                            <figure>
                                <div class="product_thumb">
                                    <a class="primary_img" href="product-details.html"><img
                                            src="assets/img/product/product9.jpg" alt=""></a>
                                    <a class="secondary_img" href="product-details.html"><img
                                            src="assets/img/product/product10.jpg" alt=""></a>
                                    <div class="label_product">
                                        <span class="label_sale">Sale</span>
                                    </div>
                                    <div class="action_links">
                                        <ul>
                                            <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                        class="ion-android-favorite-outline"></i></a></li>
                                            <li class="compare"><a href="#" title="Add to Compare"><i
                                                        class="ion-ios-settings-strong"></i></a></li>
                                            <li class="quick_button"><a href="#" data-toggle="modal"
                                                    data-target="#modal_box" title="quick view"><i
                                                        class="ion-ios-search-strong"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product_content">
                                    <div class="product_content_inner">
                                        <h4 class="product_name"><a href="product-details.html">Mirum est notare tellus
                                                eu nibh iaculis pretium</a></h4>
                                        <div class="price_box">
                                            <span class="old_price">$72.00</span>
                                            <span class="current_price">$70.00</span>
                                        </div>
                                    </div>
                                    <div class="add_to_cart">
                                        <a href="cart.html" title="Add to cart">Add to cart</a>
                                    </div>

                                </div>
                            </figure>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--product area end-->
    <!--product area start-->
    <div class="product_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_header">
                        <div class="section_title">
                            <h2>Featured Products</h2>

                        </div>
                        <div class="product_tab_btn">
                            <ul class="nav" role="tablist">
                                <li>
                                    <a data-toggle="tab" href="#Audio" role="tab" aria-controls="Audio"
                                        aria-selected="false">
                                        Television & Audio
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="Computer" role="tabpanel">
                    <div class="product_carousel product_style product_column5 owl-carousel">
                        <div class="product_items">
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a class="primary_img" href="product-details.html"><img
                                                src="assets/customer/img/product/product1.jpg" alt=""></a>
                                        <a class="secondary_img" href="product-details.html"><img
                                                src="assets/customer/img/product/product2.jpg" alt=""></a>
                                        <div class="label_product">
                                            <span class="label_sale">Sale</span>
                                        </div>
                                        <div class="action_links">
                                            <ul>
                                                <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                            class="ion-android-favorite-outline"></i></a></li>
                                                <li class="compare"><a href="#" title="Add to Compare"><i
                                                            class="ion-ios-settings-strong"></i></a></li>
                                                <li class="quick_button"><a href="#" data-toggle="modal"
                                                        data-target="#modal_box" title="quick view"><i
                                                            class="ion-ios-search-strong"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product_content">
                                        <div class="product_content_inner">
                                            <h4 class="product_name"><a href="product-details.html">Eodem modo vel
                                                    mattis ante facilisis nec porttitor efficitur</a></h4>
                                            <div class="price_box">
                                                <span class="old_price">$86.00</span>
                                                <span class="current_price">$79.00</span>
                                            </div>
                                        </div>
                                        <div class="add_to_cart">
                                            <a href="cart.html" title="Add to cart">Add to cart</a>
                                        </div>
                                    </div>
                                </figure>
                            </article>
                        </div>
                    </div>
                </div>
                
            </div>

        </div>
    </div>
    <!--product area end-->

</div>
<!--home section bg area end-->
@endsection