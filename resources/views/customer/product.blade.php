@extends('customer.template.customer_template')
@section('content')
<div class="shop_area shop_fullwidth">
    <div class="container">
        <div class="row">
            <div class="col-12">

                <!--shop banner area start-->
                <div class="shop_banner_area mb-30">
                    <div class="row">
                        <div class="col-12">
                            <div class="shop_banner_thumb">
                                <img src="{{asset('assets/customer/img/bg/banner16.jpg')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <!--shop banner area end-->
                <!--shop toolbar start-->
                <div class="shop_toolbar_wrapper">
                    <div class="shop_toolbar_btn">
                        <button data-role="grid_4" type="button" class=" btn-grid-4 active" data-toggle="tooltip"
                            title="4"></button>
                        <button data-role="grid_list" type="button" class="btn-list" data-toggle="tooltip"
                            title="List"></button>
                    </div>
                    <div class=" niceselect_option">
                        <form class="select_option" action="#">
                            <select name="orderby" id="short">

                                <option selected value="1">Sort by average rating</option>
                                <option value="2">Sort by popularity</option>
                                <option value="3">Sort by newness</option>
                                <option value="4">Sort by price: low to high</option>
                                <option value="5">Sort by price: high to low</option>
                                <option value="6">Product Name: Z</option>
                            </select>
                        </form>
                    </div>
                    <div class="page_amount">
                        <p>Showing 1–9 of 21 results</p>
                    </div>
                </div>
                <!--shop toolbar end-->

                <!--shop wrapper start-->
                <div id="tag_container" class="row no-gutters shop_wrapper grid_4">
                    @foreach ($product as $item)
                    <div class="col-lg-3 col-md-4 col-sm-6 ">
                        <article class="single_product">
                            <figure>
                                <div class="product_thumb">
                                    <a class="primary_img" href="{{ $item->url}}"><img
                                            src="{{$item->image}}" alt=""></a>
                                            @php
                                            if($item->price_sale!=null) echo '<div class="label_product"><span class="label_sale">Sale</span></div>';
                                        @endphp
                                </div>

                                <div class="product_content grid_content">
                                    <div class="product_content_inner">
                                    <h4 class="product_name"><a href="product-details.html">{{$item->name}}</a></h4>
                                        <div class="price_box">
                                            <span class="old_price">{{$item->price}}</span>
                                            <span class="current_price">{{$item->price_sale}}</span>
                                        </div>
                                    </div>
                                    <div class="add_to_cart">
                                        <a href="cart.html" title="Add to cart">Add to cart</a>
                                    </div>
                                </div>
                                <div class="product_content list_content">
                                    <h4 class="product_name"><a href="product-details.html">{{$item->name}}</a></h4>
                                    <div class="product_rating">
                                        <ul>
                                            <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                            <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                            <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                            <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                            <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="price_box">
                                            <span class="old_price">{{$item->price}}</span>
                                            <span class="current_price">{{$item->price_sale}}</span>
                                    </div>
                                    <div class="product_desc">
                                    <p>{{$item->description}}</p>
                                    </div>
                                    <div class="add_to_cart">
                                        <a href="cart.html" title="Add to cart">Add to cart</a>
                                    </div>
                                    <div class="action_links">
                                        <ul>
                                            <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                        class="ion-android-favorite-outline"></i> Add to Wishlist</a>
                                            </li>
                                            <li class="compare"><a href="#" title="Add to Compare"><i
                                                        class="ion-ios-settings-strong"></i> Compare</a></li>
                                            <li class="quick_button"><a href="#" data-toggle="modal"
                                                    data-target="#modal_box" title="quick view"><i
                                                        class="ion-ios-search-strong"></i> quick view</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </figure>
                        </article>
                    </div>
                    @endforeach
                </div>   
                <div class="shop_toolbar t_bottom ">
                    <div class="shop_toolbar t_bottom">{{$product->render()}}</div>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    
    $(document).ready(function()
    {
        $(document).on('click', '.pagination a',function(event)
        {
            event.preventDefault();
            $("#tag_container").removeClass('grid_list');
            $("#tag_container").removeClass('grid_4');
            $('.btn-list').removeClass('active');
            $('.btn-grid-4').addClass('active');
            $('li').removeClass('active');
            $(this).parent('li').addClass('active');
            
            var myurl = $(this).attr('href');
            var page=myurl.split('page=')[1];

            getData(page);
        });
  
    });
  
    function getData(page){
        $.ajax(
        {
            url: '?page=' + page,
            type: "get",
            datatype: "html"
        }).done(function(data){
            $("#tag_container").empty().html(data);
        }).fail(function(jqXHR, ajaxOptions, thrownError){
              alert('No response from server');
        });
    }
</script>
@endsection