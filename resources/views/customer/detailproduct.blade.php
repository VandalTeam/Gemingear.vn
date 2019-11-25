@extends('customer.template.customer_template')
@section('content')
<div class="product_page_bg">
    <div class="container">
        <div class="product_details_wrapper mb-55">
            <!--product details start-->
            <div class="product_details">
                <div class="row">
                    <div class="col-lg-5 col-md-6">
                        <div class="main">
                            <?php $image = explode('&',$product->image);?>
                            <div class="slider slider-for">
                                @foreach ($image as $item)
                                <div class="single-zoom zoom"><img src="{{$item}}"
                                    data-zoom-image="{{$item}}">
                                </div>
                                @endforeach
                            </div>
                            <div class="slider slider-nav">
                                @foreach ($image as $item)
                                <div><img src="{{$item}}" data-zoom-image="{{$item}}" alt="big-1">
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-6">
                        <div class="product_d_right">
                            <form action="#">
                                <h3><b>{{$product->name}}</b></h3>
                                <div class="price_box">
                                    @if(isset($product->price_sale))<h3><b>Giá Cũ:</b><span class="old_price">
                                            {{$product->price}}</span></h3>@endif
                                    @if(isset($product->price_sale))<h3><b>Giá KM:</b><span
                                            class="current_price">{{$product->price_sale}}</h3>@else
                                    <h3><b>Giá: </b><span class="current_price">{{$product->price}}</h3>
                                    @endif
                                </div>
                                <div class="product_desc">
<<<<<<< HEAD
                                    <h3><b>Nhà sản xuất:</b> Asus</h3>
                                    <h3><b>Tình trạng:</b> <?php if($product->instock==0){echo 'Còn hàng';}else{echo 'Hết hàng';}?></h3>
=======
                                    <h3><b>Nhà sản xuất:</b> {{$product->brand_name}}</h3>
                                    <h3><b>Tình trạng:</b>
                                        <?php if($product->instock==0){echo 'Còn hàng';}else{echo 'Hết hàng';}?></h3>
>>>>>>> Ben_DevPHP
                                </div>
                                <div class="product_variant quantity">
                                    <label>quantity</label>
                                    <input min="1" max="100" value="1" type="number">
                                    <button class="button" type="submit">Mua sản phẩm</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--product details end-->

            <!--product info start-->
            <div class="product_d_info">
                <div class="row">
                    <div class="col-12">
                        <div class="product_d_inner">
                            <div class="product_info_button">
                                <ul class="nav" role="tablist">
                                    <li>
                                        <a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info"
                                            aria-selected="false">Mô tả sản phẩm</a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews"
                                            aria-selected="false">Đánh giá sản phẩm</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="info" role="tabpanel">
                                    <div class="product_info_content">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue
                                            nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi
                                            ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate
                                            adipiscing cursus eu, suscipit id nulla.</p>
                                        <p>Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem,
                                            quis fermentum turpis eros eget velit. Donec ac tempus ante. Fusce ultricies
                                            massa massa. Fusce aliquam, purus eget sagittis vulputate, sapien libero
                                            hendrerit est, sed commodo augue nisi non neque. Lorem ipsum dolor sit amet,
                                            consectetur adipiscing elit. Sed tempor, lorem et placerat vestibulum, metus
                                            nisi posuere nisl, in accumsan elit odio quis mi. Cras neque metus,
                                            consequat et blandit et, luctus a nunc. Etiam gravida vehicula tellus, in
                                            imperdiet ligula euismod eget.</p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="reviews" role="tabpanel">
                                    <div class="reviews_wrapper">
                                        <h2>1 review for Donec eu furniture</h2>
                                        <div class="reviews_comment_box">
                                            <div class="comment_thmb">
                                                <img src="{{asset('assets/customer/img/blog/comment2.jpg')}}" alt="">
                                            </div>
                                            <div class="comment_text">
                                                <div class="reviews_meta">
                                                    <div class="product_rating">
                                                        <ul>
                                                            <li><a href="#"><i class="ion-android-star-outline"></i></a>
                                                            </li>
                                                            <li><a href="#"><i class="ion-android-star-outline"></i></a>
                                                            </li>
                                                            <li><a href="#"><i class="ion-android-star-outline"></i></a>
                                                            </li>
                                                            <li><a href="#"><i class="ion-android-star-outline"></i></a>
                                                            </li>
                                                            <li><a href="#"><i class="ion-android-star-outline"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <p><strong>admin </strong>- September 12, 2018</p>
                                                    <span>roadthemes</span>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="comment_title">
                                            <h2>Add a review </h2>
                                            <p>Your email address will not be published. Required fields are marked </p>
                                        </div>
                                        <div class="product_rating mb-10">
                                            <h3>Your rating</h3>
                                            <ul>
                                                <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product_review_form">
                                            <form action="#">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <label for="review_comment">Your review </label>
                                                        <textarea name="comment" id="review_comment"></textarea>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <label for="author">Name</label>
                                                        <input id="author" type="text">

                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <label for="email">Email </label>
                                                        <input id="email" type="text">
                                                    </div>
                                                </div>
                                                <button type="submit">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--product info end-->
        </div>
<<<<<<< HEAD

        <!--product area start-->
        <section class="product_area related_products">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2>Related Products </h2>
                    </div>
                </div>
            </div>
            <div class="product_carousel product_style product_column5 owl-carousel">
                <article class="single_product">
                    <figure>

                        <div class="product_thumb">
                            <a class="primary_img" href="product-details.html"><img
                                    src="{{asset('assets/customer/img/product/product14.jpg')}}" alt=""></a>
                            <a class="secondary_img" href="product-details.html"><img
                                    src="{{asset('assets/customer/img/product/product13.jpg')}}" alt=""></a>
                            <div class="label_product">
                                <span class="label_sale">Sale</span>
                            </div>
                            <div class="action_links">
                                <ul>
                                    <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                class="ion-android-favorite-outline"></i></a></li>
                                    <li class="compare"><a href="#" title="Add to Compare"><i
                                                class="ion-ios-settings-strong"></i></a></li>
                                    <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box"
                                            title="quick view"><i class="ion-ios-search-strong"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="product_content">
                            <div class="product_content_inner">
                                <h4 class="product_name"><a href="product-details.html">Natus erro at congue massa
                                        commodo sit Natus erro</a></h4>
                                <div class="price_box">
                                    <span class="old_price">$80.00</span>
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
                                    src="{{asset('assets/customer/img/product/product17.jpg')}}" alt=""></a>
                            <a class="secondary_img" href="product-details.html"><img
                                    src="{{asset('assets/customer/img/product/product18.jpg')}}" alt=""></a>
                            <div class="label_product">
                                <span class="label_sale">Sale</span>
                            </div>
                            <div class="action_links">
                                <ul>
                                    <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                class="ion-android-favorite-outline"></i></a></li>
                                    <li class="compare"><a href="#" title="Add to Compare"><i
                                                class="ion-ios-settings-strong"></i></a></li>
                                    <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box"
                                            title="quick view"><i class="ion-ios-search-strong"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="product_content">
                            <div class="product_content_inner">
                                <h4 class="product_name"><a href="product-details.html">Nullam maximus eget nisi
                                        dignissim sodales eget tempor</a></h4>
                                <div class="price_box">
                                    <span class="old_price">$76.00</span>
                                    <span class="current_price">$75.00</span>
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
                                    src="{{asset('assets/customer/img/product/product19.jpg')}}" alt=""></a>
                            <a class="secondary_img" href="product-details.html"><img
                                    src="{{asset('assets/customer/img/product/product20.jpg')}}" alt=""></a>
                            <div class="label_product">
                                <span class="label_sale">Sale</span>
                            </div>
                            <div class="action_links">
                                <ul>
                                    <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                class="ion-android-favorite-outline"></i></a></li>
                                    <li class="compare"><a href="#" title="Add to Compare"><i
                                                class="ion-ios-settings-strong"></i></a></li>
                                    <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box"
                                            title="quick view"><i class="ion-ios-search-strong"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="product_content">
                            <div class="product_content_inner">
                                <h4 class="product_name"><a href="product-details.html">Eodem modo vel mattis ante
                                        facilisis nec porttitor efficitur</a></h4>
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
                <article class="single_product">
                    <figure>

                        <div class="product_thumb">
                            <a class="primary_img" href="product-details.html"><img
                                    src="{{asset('assets/customer/img/product/product22.jpg')}}" alt=""></a>
                            <a class="secondary_img" href="product-details.html"><img
                                    src="{{asset('assets/customer/img/product/product23.jpg')}}" alt=""></a>
                            <div class="label_product">
                                <span class="label_sale">Sale</span>
                            </div>
                            <div class="action_links">
                                <ul>
                                    <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                class="ion-android-favorite-outline"></i></a></li>
                                    <li class="compare"><a href="#" title="Add to Compare"><i
                                                class="ion-ios-settings-strong"></i></a></li>
                                    <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box"
                                            title="quick view"><i class="ion-ios-search-strong"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="product_content">
                            <div class="product_content_inner">
                                <h4 class="product_name"><a href="product-details.html">Donec tempus pretium arcu et
                                        faucibus commodo</a></h4>
                                <div class="price_box">
                                    <span class="old_price">$82.00</span>
                                    <span class="current_price">$75.00</span>
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
                                    src="{{asset('assets/customer/img/product/product24.jpg')}}" alt=""></a>
                            <a class="secondary_img" href="product-details.html"><img
                                    src="{{asset('assets/customer/img/product/product25.jpg')}}" alt=""></a>
                            <div class="label_product">
                                <span class="label_sale">Sale</span>
                            </div>
                            <div class="action_links">
                                <ul>
                                    <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                class="ion-android-favorite-outline"></i></a></li>
                                    <li class="compare"><a href="#" title="Add to Compare"><i
                                                class="ion-ios-settings-strong"></i></a></li>
                                    <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box"
                                            title="quick view"><i class="ion-ios-search-strong"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="product_content">
                            <div class="product_content_inner">
                                <h4 class="product_name"><a href="product-details.html">Mirum est notare tellus eu nibh
                                        iaculis pretium</a></h4>
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
                                    src="{{asset('assets/customer/img/product/product26.jpg')}}" alt=""></a>
                            <a class="secondary_img" href="product-details.html"><img
                                    src="{{asset('assets/customer/img/product/product27.jpg')}}" alt=""></a>
                            <div class="label_product">
                                <span class="label_sale">Sale</span>
                            </div>
                            <div class="action_links">
                                <ul>
                                    <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                class="ion-android-favorite-outline"></i></a></li>
                                    <li class="compare"><a href="#" title="Add to Compare"><i
                                                class="ion-ios-settings-strong"></i></a></li>
                                    <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box"
                                            title="quick view"><i class="ion-ios-search-strong"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="product_content">
                            <div class="product_content_inner">
                                <h4 class="product_name"><a href="product-details.html">Mirum est notare tellus eu nibh
                                        iaculis pretium</a></h4>
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

        </section>
        <!--product area end-->

=======
>>>>>>> Ben_DevPHP
        <!--product area start-->
        <section class="product_area upsell_products">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2>Upsell Products </h2>
                    </div>
                </div>
            </div>
            <div class="product_carousel product_style product_column5 owl-carousel">
                @foreach (product_random() as $item)
                <article class="single_product">
                    <figure>
<<<<<<< HEAD

                        <div class="product_thumb">
                            <a class="primary_img" href="product-details.html"><img
                                    src="{{asset('assets/customer/img/product/product28.jpg')}}" alt=""></a>
                            <a class="secondary_img" href="product-details.html"><img
                                    src="{{asset('assets/customer/img/product/product29.jpg')}}" alt=""></a>
                            <div class="label_product">
                                <span class="label_sale">Sale</span>
                            </div>
                            <div class="action_links">
                                <ul>
                                    <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                class="ion-android-favorite-outline"></i></a></li>
                                    <li class="compare"><a href="#" title="Add to Compare"><i
                                                class="ion-ios-settings-strong"></i></a></li>
                                    <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box"
                                            title="quick view"><i class="ion-ios-search-strong"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="product_content">
                            <div class="product_content_inner">
                                <h4 class="product_name"><a href="product-details.html">Natus erro at congue massa
                                        commodo sit Natus erro</a></h4>
                                <div class="price_box">
                                    <span class="old_price">$80.00</span>
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
                                    src="{{asset('assets/customer/img/product/product7.jpg')}}" alt=""></a>
                            <a class="secondary_img" href="product-details.html"><img
                                    src="{{asset('assets/customer/img/product/product8.jpg')}}" alt=""></a>
                            <div class="label_product">
                                <span class="label_sale">Sale</span>
                            </div>
                            <div class="action_links">
                                <ul>
                                    <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                class="ion-android-favorite-outline"></i></a></li>
                                    <li class="compare"><a href="#" title="Add to Compare"><i
                                                class="ion-ios-settings-strong"></i></a></li>
                                    <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box"
                                            title="quick view"><i class="ion-ios-search-strong"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="product_content">
                            <div class="product_content_inner">
                                <h4 class="product_name"><a href="product-details.html">Nullam maximus eget nisi
                                        dignissim sodales eget tempor</a></h4>
                                <div class="price_box">
                                    <span class="old_price">$76.00</span>
                                    <span class="current_price">$75.00</span>
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
                                    src="{{asset('assets/customer/img/product/product9.jpg')}}" alt=""></a>
                            <a class="secondary_img" href="product-details.html"><img
                                    src="{{asset('assets/customer/img/product/product10.jpg')}}" alt=""></a>
                            <div class="label_product">
                                <span class="label_sale">Sale</span>
                            </div>
                            <div class="action_links">
                                <ul>
                                    <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                class="ion-android-favorite-outline"></i></a></li>
                                    <li class="compare"><a href="#" title="Add to Compare"><i
                                                class="ion-ios-settings-strong"></i></a></li>
                                    <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box"
                                            title="quick view"><i class="ion-ios-search-strong"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="product_content">
                            <div class="product_content_inner">
                                <h4 class="product_name"><a href="product-details.html">Mirum est notare tellus eu nibh
                                        iaculis pretium</a></h4>
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
                                    src="{{asset('assets/customer/img/product/product11.jpg')}}" alt=""></a>
                            <a class="secondary_img" href="product-details.html"><img
                                    src="{{asset('assets/customer/img/product/product12.jpg')}}" alt=""></a>
                            <div class="label_product">
                                <span class="label_sale">Sale</span>
                            </div>
                            <div class="action_links">
                                <ul>
                                    <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                class="ion-android-favorite-outline"></i></a></li>
                                    <li class="compare"><a href="#" title="Add to Compare"><i
                                                class="ion-ios-settings-strong"></i></a></li>
                                    <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box"
                                            title="quick view"><i class="ion-ios-search-strong"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="product_content">
                            <div class="product_content_inner">
                                <h4 class="product_name"><a href="product-details.html">Mirum est notare tellus eu nibh
                                        iaculis pretium</a></h4>
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
                                    src="{{asset('assets/customer/img/product/product13.jpg')}}" alt=""></a>
                            <a class="secondary_img" href="product-details.html"><img
                                    src="{{asset('assets/customer/img/product/product4.jpg')}}" alt=""></a>
                            <div class="label_product">
                                <span class="label_sale">Sale</span>
                            </div>
                            <div class="action_links">
                                <ul>
                                    <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                class="ion-android-favorite-outline"></i></a></li>
                                    <li class="compare"><a href="#" title="Add to Compare"><i
                                                class="ion-ios-settings-strong"></i></a></li>
                                    <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box"
                                            title="quick view"><i class="ion-ios-search-strong"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="product_content">
                            <div class="product_content_inner">
                                <h4 class="product_name"><a href="product-details.html">Eodem modo vel mattis ante
                                        facilisis nec porttitor efficitur</a></h4>
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
                <article class="single_product">
                    <figure>

                        <div class="product_thumb">
                            <a class="primary_img" href="product-details.html"><img
                                    src="{{asset('assets/customer/img/product/product15.jpg')}}" alt=""></a>
                            <a class="secondary_img" href="product-details.html"><img
                                    src="{{asset('assets/customer/img/product/product16.jpg')}}" alt=""></a>
=======
                        <div class="product_thumb">
                            <a class="primary_img" href="product-details.html"><img src="{{$item->image}}" alt=""></a>
                            <a class="secondary_img" href="product-details.html"><img src="{{$item->image}}" alt=""></a>
>>>>>>> Ben_DevPHP
                            <div class="label_product">
                                <span class="label_sale">Sale</span>
                            </div>
                            <div class="action_links">
                                <ul>
                                    <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                class="ion-android-favorite-outline"></i></a></li>
                                    <li class="compare"><a href="#" title="Add to Compare"><i
                                                class="ion-ios-settings-strong"></i></a></li>
                                    <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box"
                                            title="quick view"><i class="ion-ios-search-strong"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="product_content">
                            <div class="product_content_inner">
                                <h4 class="product_name"><a href="product-details.html">{{$item->name}}</a></h4>
                                <div class="price_box">
                                    @if (isset($item->price_sale))
                                    <span class="old_price">{{$item->price}}</span>
                                    <span class="current_price">{{$item->price_sale}}</span>
                                    @else
                                    <span class="current_price">{{$item->price}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="add_to_cart">
                                <a href="cart.html" title="Add to cart">Add to cart</a>
                            </div>

                        </div>
                    </figure>
                </article>
                @endforeach
            </div>
        </section>
        <!--product area end-->
    </div>
</div>
<script>
    $(document).ready(function () {
    $('.slider-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: '.slider-nav'
    });
 $('.slider-nav').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '.slider-for',
        // dots: true,
        focusOnSelect: true
    });
    });
</script>
@endsection