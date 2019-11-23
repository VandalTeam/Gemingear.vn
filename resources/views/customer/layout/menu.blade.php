<!--header area start-->

<!--Offcanvas menu area start-->
<div class="off_canvars_overlay">

</div>
<header>
    <div class="main_header">
        <div class="container">
            <!--header top start-->
            <div class="header_top">
                <div class="row align-items-center">
                    <div class="col-lg-12 col-md-7">
                        <div class="header_top_settings text-right main_menu menu_position">
                            <ul>
                                <li><a href="#"><i class="far fa-question-circle"></i>Trợ giúp</a></li>
                                <li><a href="#"><i class="fas fa-bell"></i>Thông báo</a></li>
                                @if (isset(getUser()->name))
                                <li>
                                    <img style="border-radius: 50%;"
                                        src="https://scontent.fsgn2-1.fna.fbcdn.net/v/t1.0-9/p960x960/70906418_1350377618471842_1424057674697277440_o.jpg?_nc_cat=111&_nc_eui2=AeGObWaUlFEbhwnRbscEBPdhXizkRP6Vr6Q8abc_n2NyXXTk9cpSd_wJvfbXbxLtKEy8dT9xlnaKPxhMhHKRhjaXqyJmFHIl2esL_kSJV6-Z9Q&_nc_oc=AQlQRcdKUJqI7daplq6AmTxkE5uQe3TZtHeaqtqc-IUpK4tkaYrg5taRdg0KrZoeyR0&_nc_ht=scontent.fsgn2-1.fna&oh=3d61076fd88d28c9c3ce6519350c7e84&oe=5E520E1B"
                                        alt="Smiley face" width="30" height="30">
                                    <a href="#" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">{{getUser()->name}}<i class="fa fa-angle-down"></i></a>
                                    <div class="dropdown" style="position: initial;">
                                        <div class="dropdown-menu" style="margin-top: 16px;"
                                            aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#">Đơn mua</a>
                                            <a class="dropdown-item" href="/customer/logout">Đăng xuất</a>
                                        </div>
                                </li>
                                @else
                                <li><a href="#" data-toggle="modal" data-target="#exampleModalCenter">Đăng nhập</a></li>
                                <li><a href="#" data-toggle="modal" data-target="#signupModalCenter">Đăng ký</a></li>
                                @endif
                                <li></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--header top start-->

            <!--header middel start-->
            <div class="header_middle sticky-header">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-md-6">
                        <div class="logo">
                            <a href="http://gemingear.vn/"><img src="{{asset('assets/customer/img/logo/logo.png')}}"
                                    alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12">
                        <div class="main_menu menu_position text-center">
                            <nav>
                                <ul>
                                    <li>
                                        <button type="button" class="btn btn-outline-danger"><img
                                                style="max-width: 18px;max-height: 18px;"
                                                src="//theme.hstatic.net/1000026716/1000440777/14/xk1s.png?v=7930">Tổng
                                            hợp khuyến mãi</button>
                                    </li>
                                    <li>
                                        <button type="button" class="btn btn-outline-danger"><img
                                                style="max-width: 18px;max-height: 18px;"
                                                src="//theme.hstatic.net/1000026716/1000440777/14/xk2s.png?v=7989">
                                            Hướng dẫn thanh toán</button>
                                    </li>
                                    <li>
                                        <button type="button" class="btn btn-outline-danger"><img
                                                style="max-width: 18px;max-height: 18px;"
                                                src="//theme.hstatic.net/1000026716/1000440777/14/xk4s.png?v=7989">
                                            Chính sách bảo hành</button>
                                    </li>
                                    <li>
                                        <button type="button" class="btn btn-outline-danger"><img
                                                style="max-width: 18px;max-height: 18px;"
                                                src="//theme.hstatic.net/1000026716/1000440777/14/xk5s.png?v=7989">
                                            Chính sách vấn chuyển</button>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="header_configure_area">
                            <div class="mini_cart_wrapper">
                                <a href="javascript:void(0)">
                                    <i class="fa fa-shopping-bag"></i>
                                    <span class="cart_price">{{Cart::total()}}<i class="ion-ios-arrow-down"></i></span>
                                    <span class="cart_count">{{Cart::count()}}</span>

                                </a>
                                <!--mini cart-->
                                <div class="mini_cart" style="overflow:auto;">
                                    <div class="mini_cart_inner">
                                        @foreach (Cart::content() as $item)
                                        <div class="cart_item">
                                                <div class="cart_img">
                                                    <a href="#"><img src="{{$item->options->size}}" alt=""></a>
                                                </div>
                                                <div class="cart_info">
                                                    <a href="#">{{$item->name}}</a>
                                                    <p>Qty: {{$item->qty}} X <span>{{$item->price}}</span></p>
                                                </div>
                                                <div class="cart_remove" data-id="{{$item->rowId}}">
                                                    <a href="#"><i class="ion-android-close"></i></a>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="mini_cart_table">
                                            <div class="cart_total">
                                                <span>Sub total:</span>
                                                <span class="price">{{Cart::subtotal()}}</span>
                                            </div>
                                            <div class="cart_total mt-10">
                                                <span>total:</span>
                                                <span class="price">{{Cart::total()}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mini_cart_footer">
                                        <div class="cart_button">
                                            <a href="cart.html">View cart</a>
                                        </div>
                                        <div class="cart_button">
                                            <a href="checkout.html">Checkout</a>
                                        </div>

                                    </div>
                                </div>
                                <!--mini cart end-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--header middel end-->
            <?php $uri = Request::segment(1);?>
            <!--header bottom satrt-->
            <div class="header_bottom">
                <div class="row align-items-center">
                    <div class="column1 col-lg-3 col-md-6">
                        <div class="categories_menu">
                            <div class="categories_title ">
                                <h2 class="categori_toggle">Danh mục sản phẩm</h2>
                            </div>
                            <div class="categories_menu_toggle"
                                style="<?php if($uri=='products'){echo 'display: none;';}?>">
                                <ul>
                                    @foreach (Category() as $category)
                                    <li class="menu_item_children"><a href="#">{{$category->name}} <i
                                                class="fa fa-angle-right"></i></a>
                                        <ul class="categories_mega_menu">
                                            @foreach (Subcategory_id($category->id) as $subcategory)
                                            <li class="menu_item_children"><a href="#">{{$subcategory->name}}</a>
                                                <ul class="categorie_sub_menu">
                                                    @foreach (Brand_sub($subcategory->id) as $brand)
                                                    <li value="{{$subcategory->id."-".$brand->brand_id}}"><a
                                                            href="/{{$category->url."/".$subcategory->url."/".$brand->brand_url}}">{{$brand->brand_name}}</a>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                            @endforeach
                                            <li class="menu_item_children"><a href="#">Giá tiền</a>
                                                <ul class="categorie_sub_menu">
                                                    <li value="8-11"><a href="#">Từ 8 đến 11 triệu</a></li>
                                                    <li value="12-16"><a href="#">Từ 12 đến 16 triệu</a></li>
                                                    <li value="17-25"><a href="#">Từ 17 đến 25 triệu</a></li>
                                                    <li value="26-30"><a href="#">Từ 26 đến 30 triệu</a></li>
                                                    <li value="30"><a href="#">Trên 30 triệu</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="column2 col-lg-6 ">
                        <div class="search_container">
                            <form action="#">
                                <div class="hover_category">
                                    <select class="select_option" name="select" id="categori2">
                                        <option selected value="1">All Categories</option>
                                        @foreach (Category() as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="search_box">
                                    <input placeholder="Search product..." type="text">
                                    <button type="submit">Search</button>
                                </div>
                            </form>
                        </div>

                    </div>
                    <div class="column3 col-lg-3 col-md-6">
                        <div class="header_bigsale">
                            <a href="#">BIG SALE BLACK FRIDAY</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--header bottom end-->
        </div>
    </div>
</header>
<!--header area end-->