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
                            <a href=""><img src="<?=$item->url?>" class="d-block w-100"></a>
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
                        <a href="#"><img
                                src="https://theme.hstatic.net/1000026716/1000440777/14/solid2.jpg?v=7887"
                                alt=""></a>
                    </div>
                    <div class="single_categories_product banner_thumb" style="width:50%">
                        <a href="#"><img
                                src="https://theme.hstatic.net/1000026716/1000440777/14/solid3.jpg?v=7887"
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
                            <a href="#"><img src="<?=$item->url?>" alt=""></a>
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
                        <h4><a href="/may-bo-pc"> Máy Bộ PC</a></h4>
                    </div>
                    <div class="categories_product_thumb">
                        <a href="/may-bo-pc"><img class="category-img" style="height: 104px;"
                                src="{{asset('assets/customer/img/s-product/category11.gif')}}" alt=""></a>
                    </div>
                </div>
                <div class="single_categories_product">
                    <div class="categories_product_content">
                        <h4><a href="/man-hinh"> Màn Hình</a></h4>
                    </div>
                    <div class="categories_product_thumb">
                        <a href="/man-hinh"><img class="category-img" style="height: 104px;"
                                src="{{asset('assets/customer/img/s-product/category2.jpg')}}" alt=""></a>
                    </div>
                </div>
                <div class="single_categories_product">
                    <div class="categories_product_content">
                        <h4><a href="/laptop"> Laptop</a></h4>
                    </div>
                    <div class="categories_product_thumb">
                        <a href="/laptop"><img class="category-img" style="height: 104px;"
                                src="{{asset('assets/customer/img/s-product/category3.jpg')}}" alt=""></a>
                    </div>
                </div>
                <div class="single_categories_product">
                    <div class="categories_product_content">
                        <h4><a href="/ghe-gaming"> Ghế Gaming</a></h4>
                    </div>
                    <div class="categories_product_thumb">
                        <a href="/ghe-gaming"><img class="category-img" style="height: 104px;"
                                src="{{asset('assets/customer/img/s-product/category4.png')}}" alt=""></a>
                    </div>
                </div>
                <div class="single_categories_product">
                    <div class="categories_product_content">
                        <h4><a href="/tai-nghe">Tai Nghe</a></h4>
                    </div>
                    <div class="categories_product_thumb">
                        <a href="/tai-nghe"><img class="category-img" style="height: 104px;"
                                src="{{asset('assets/customer/img/s-product/category5.png')}}" alt=""></a>
                    </div>
                </div>
                <div class="single_categories_product">
                    <div class="categories_product_content">
                        <h4><a href="/lot-chuot"> Lót Chuột</a></h4>
                    </div>
                    <div class="categories_product_thumb">
                        <a href="/lot-chuot"><img src="{{asset('assets/customer/img/s-product/category6.jpg')}}"
                                alt=""></a>
                    </div>
                </div>
                <div class="single_categories_product">
                    <div class="categories_product_content">
                        <h4><a href="/chuot"> Chuột</a></h4>
                    </div>
                    <div class="categories_product_thumb">
                        <a href="/chuot"><img src="{{asset('assets/customer/img/s-product/category7.png')}}"
                                alt=""></a>
                    </div>
                </div>
                <div class="single_categories_product">
                    <div class="categories_product_content">
                        <h4><a href="/loa-bluetooth"> Loa Bluetooth</a></h4>
                    </div>
                    <div class="categories_product_thumb">
                        <a href="/loa-bluetooth"><img src="{{asset('assets/customer/img/s-product/category10.jpg')}}"
                                alt=""></a>
                    </div>
                </div>
                <div class="single_categories_product">
                    <div class="categories_product_content">
                        <h4><a href="/linh-kien"> Linh Kiện</a></h4>
                    </div>
                    <div class="categories_product_thumb">
                        <a href="/linh-kien"><img src="{{asset('assets/customer/img/s-product/category9.png')}}"
                                alt=""></a>
                    </div>
                </div>
                <div class="single_categories_product">
                    <div class="categories_product_content">
                        <h4><a href="/ban-phim"> Bàn Phím</a></h4>
                    </div>
                    <div class="categories_product_thumb">
                        <a href="/ban-phim"><img src="{{asset('assets/customer/img/s-product/category8.png')}}"
                                alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Categories product area end-->

    <!--product area start-->
    <div class="product_area ">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_header" >
                        <div class="section_title">
                            <h2>Laptop Gaming</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-content LapTop" data-id="3" >
                <div class="product">
                    <div class="container">
                        <div class="row">
                            @foreach ($LapTop as $item)
                            <div class="col-lg-3 col-sm-12">
                                <article class="single_product" >
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="{{$item->url}}"><img src="{{$item->image}}" alt=""></a>
                                            <a class="secondary_img" href="{{$item->url}}"><img src="{{$item->image}}" alt=""></a>
                                            <div class="label_product">
                                                @if ($item->price_sale != $item->price)
                                                    <span class="label_sale">Sale</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <div class="product_content_inner" ">
                                                <h4 class="product_name" style="height:30%; text-overflow: clip;"><a href="{{$item->url}}">{{$item->name}}</a></h4>
                                                <div class="price_box">
                                                    @if ($item->price_sale == $item->price)
                                                        <span class="current_price">{{number_format($item->price_sale)}} đ</span>
                                                    @else
                                                        <span class="old_price">{{number_format($item->price)}} đ</span>
                                                        <span class="current_price">{{number_format($item->price_sale)}} đ</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="add_to_cart" data-id="{{$item->id}}"
                                            data-price="{{$item->price_sale}}" data-name="{{$item->name}}" data-image="{{$item->image}}">
                                                <a style="font-family:arial;">Thêm sản phẩm</a>
                                            </div>
                                        </div>
                                    </figure>
                                </article>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="shop_toolbar t_bottom">{{$LapTop->render()}}</div>
            </div>
        </div>
    </div>
    <div class="product_area ">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_header" >
                        <div class="section_title">
                            <h2>Màn hình</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-content ManHinh" data-id="13" id="tag_container">
                <div class="product">
                    <div class="container">
                        <div class="row">
                            @foreach ($ManHinh as $item)
                            <div class="col-lg-3 col-sm-12">
                                <article class="single_product" >
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="{{$item->url}}"><img src="{{$item->image}}" alt=""></a>
                                            <a class="secondary_img" href="{{$item->url}}"><img src="{{$item->image}}" alt=""></a>
                                            <div class="label_product">
                                                @if ($item->price_sale != $item->price)
                                                    <span class="label_sale">Sale</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <div class="product_content_inner" ">
                                                <h4 class="product_name" style="height:30%; text-overflow: clip;"><a href="{{$item->url}}">{{$item->name}}</a></h4>
                                                <div class="price_box">
                                                    @if ($item->price_sale == $item->price)
                                                        <span class="current_price">{{number_format($item->price_sale)}} đ</span>
                                                    @else
                                                        <span class="old_price">{{number_format($item->price)}} đ</span>
                                                        <span class="current_price">{{number_format($item->price_sale)}} đ</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="add_to_cart" data-id="{{$item->id}}"
                                            data-price="{{$item->price_sale}}" data-name="{{$item->name}}" data-image="{{$item->image}}">
                                                <a style="font-family:arial;">Thêm sản phẩm</a>
                                            </div>
                                        </div>
                                    </figure>
                                </article>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="shop_toolbar t_bottom">{{$ManHinh->render()}}</div>
            </div>
        </div>
    </div>
    <div class="product_area ">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_header" >
                        <div class="section_title">
                            <h2>Tai nghe</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-content TaiNghe" data-id="17" >
                <div class="product">
                    <div class="container">
                        <div class="row">
                            @foreach ($TaiNghe as $item)
                            <div class="col-lg-3 col-sm-12">
                                <article class="single_product" >
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="{{$item->url}}"><img src="{{$item->image}}" alt=""></a>
                                            <a class="secondary_img" href="{{$item->url}}"><img src="{{$item->image}}" alt=""></a>
                                            <div class="label_product">
                                                @if ($item->price_sale != $item->price)
                                                    <span class="label_sale">Sale</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <div class="product_content_inner" ">
                                                <h4 class="product_name" style="height:30%; text-overflow: clip;"><a href="{{$item->url}}">{{$item->name}}</a></h4>
                                                <div class="price_box">
                                                    @if ($item->price_sale == $item->price)
                                                        <span class="current_price">{{number_format($item->price_sale)}} đ</span>
                                                    @else
                                                        <span class="old_price">{{number_format($item->price)}} đ</span>
                                                        <span class="current_price">{{number_format($item->price_sale)}} đ</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="add_to_cart" data-id="{{$item->id}}"
                                            data-price="{{$item->price_sale}}" data-name="{{$item->name}}" data-image="{{$item->image}}">
                                                <a style="font-family:arial;">Thêm sản phẩm</a>
                                            </div>
                                        </div>
                                    </figure>
                                </article>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="shop_toolbar t_bottom">{{$TaiNghe->render()}}</div>
            </div>
        </div>
    </div>
    <div class="product_area ">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_header" >
                        <div class="section_title">
                            <h2>Máy bộ GearVN</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-content GVN" data-id="2" >
                <div class="product">
                    <div class="container">
                        <div class="row">
                            @foreach ($GVN as $item)
                            <div class="col-lg-3 col-sm-12">
                                <article class="single_product" >
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="{{$item->url}}"><img src="{{$item->image}}" alt=""></a>
                                            <a class="secondary_img" href="{{$item->url}}"><img src="{{$item->image}}" alt=""></a>
                                            <div class="label_product">
                                                @if ($item->price_sale != $item->price)
                                                    <span class="label_sale">Sale</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <div class="product_content_inner" ">
                                                <h4 class="product_name" style="height:30%; text-overflow: clip;"><a href="{{$item->url}}">{{$item->name}}</a></h4>
                                                <div class="price_box">
                                                    @if ($item->price_sale == $item->price)
                                                        <span class="current_price">{{number_format($item->price_sale)}} đ</span>
                                                    @else
                                                        <span class="old_price">{{number_format($item->price)}} đ</span>
                                                        <span class="current_price">{{number_format($item->price_sale)}} đ</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="add_to_cart" data-id="{{$item->id}}"
                                            data-price="{{$item->price_sale}}" data-name="{{$item->name}}" data-image="{{$item->image}}">
                                                <a style="font-family:arial;">Thêm sản phẩm</a>
                                            </div>
                                        </div>
                                    </figure>
                                </article>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="shop_toolbar t_bottom">{{$GVN->render()}}</div>
            </div>
        </div>
    </div>
    <div class="product_area ">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_header" >
                        <div class="section_title">
                            <h2>Bàn phím</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-content BanPhim" data-id="14" >
                <div class="product">
                    <div class="container">
                        <div class="row">
                            @foreach ($BanPhim as $item)
                            <div class="col-lg-3 col-sm-12">
                                <article class="single_product" >
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="{{$item->url}}"><img src="{{$item->image}}" alt=""></a>
                                            <a class="secondary_img" href="{{$item->url}}"><img src="{{$item->image}}" alt=""></a>
                                            <div class="label_product">
                                                @if ($item->price_sale != $item->price)
                                                    <span class="label_sale">Sale</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <div class="product_content_inner" ">
                                                <h4 class="product_name" style="height:30%; text-overflow: clip;"><a href="{{$item->url}}">{{$item->name}}</a></h4>
                                                <div class="price_box">
                                                    @if ($item->price_sale == $item->price)
                                                        <span class="current_price">{{number_format($item->price_sale)}} đ</span>
                                                    @else
                                                        <span class="old_price">{{number_format($item->price)}} đ</span>
                                                        <span class="current_price">{{number_format($item->price_sale)}} đ</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="add_to_cart" data-id="{{$item->id}}"
                                            data-price="{{$item->price_sale}}" data-name="{{$item->name}}" data-image="{{$item->image}}">
                                                <a style="font-family:arial;">Thêm sản phẩm</a>
                                            </div>
                                        </div>
                                    </figure>
                                </article>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="shop_toolbar t_bottom">{{$BanPhim->render()}}</div>
            </div>
        </div>
    </div>
    <!--product area end--
</div>
<!--home section bg area end-->
<script type="text/javascript">
    
    $(document).ready(function()
    {
        $(document).on('click', '.LapTop .shop_toolbar .pagination a',function(event)
        {
            event.preventDefault();
            var idcategory=$('.LapTop').attr('data-id');
            $('li').removeClass('active');
            $(this).parent('li').addClass('active');
            var myurl = $(this).attr('href');
            var page=$(this).attr('href').split('page=')[1];
            getData(page,idcategory,'.LapTop');
            
        });
        $(document).on('click', '.ManHinh .shop_toolbar .pagination a',function(event)
        {
            event.preventDefault();
            var idcategory=$('.ManHinh').attr('data-id');
            $('li').removeClass('active');
            $(this).parent('li').addClass('active');
            var myurl = $(this).attr('href');
            var page=$(this).attr('href').split('page=')[1];
            getData(page,idcategory,'.ManHinh');
            
        });
        $(document).on('click', '.TaiNghe .shop_toolbar .pagination a',function(event)
        {
            event.preventDefault();
            var idcategory=$('.TaiNghe').attr('data-id');
            $('li').removeClass('active');
            $(this).parent('li').addClass('active');
            var myurl = $(this).attr('href');
            var page=$(this).attr('href').split('page=')[1];
            getData(page,idcategory,'.TaiNghe');
            
        });
        $(document).on('click', '.GVN .shop_toolbar .pagination a',function(event)
        {
            event.preventDefault();
            var idcategory=$('.GVN').attr('data-id');
            $('li').removeClass('active');
            $(this).parent('li').addClass('active');
            var myurl = $(this).attr('href');
            var page=$(this).attr('href').split('page=')[1];
            getData(page,idcategory,'.GVN');
            
        });
        $(document).on('click', '.BanPhim .shop_toolbar .pagination a',function(event)
        {
            event.preventDefault();
            var idcategory=$('.BanPhim').attr('data-id');
            $('li').removeClass('active');
            $(this).parent('li').addClass('active');
            var myurl = $(this).attr('href');
            var page=$(this).attr('href').split('page=')[1];
            getData(page,idcategory,'.BanPhim');
            
        });
    });
  
    function getData(page,idcategory,namecategory){
        $.ajax(
                {
                    url: '/home/'+idcategory+'/?page=' + page,
                    type: "get",
                    datatype: "html"
                    }).done(function(data){
                        $(namecategory).empty().html(data);
                    }).fail(function(jqXHR, ajaxOptions, thrownError){
                        alert('No response from server');
            });
    }
</script>
{{-- <script>
    $(document).ready(function () {
        $('.add_to_cart').click(function (e) { 
            e.preventDefault();
            var id = $(this).attr('data-id');
			var name = $(this).attr('data-name');
			var image = $(this).attr('data-image');
			var price = $(this).attr('data-price');
			var qty = 1;
			$.ajax({
				type: "post",
				url: "/addcart",
				data: {
					'id': id,
					'name':name,
					'image': image,
					'price': price,	
					'qty': qty
				},
                dataType: "json",
				success: function(data) {
                    $('.cart_price').text(data.total);
                    $('.cart_count').text(data.total_item);
                    var str="";
                    $.each(data.product, function(i, item) {
                        str +=`<div class="cart_item">
                                            <div class="cart_img">
                                                <a href="#"><img src="${item.options.size}" alt=""></a>
                                            </div>
                                            <div class="cart_info">
                                                <a href="#">${item.name}</a>
                                                <p>Qty: ${item.qty} X <span>${item.price}</span></p>
                                            </div>
                                            <div class="cart_remove remove_cart" data-id="${item.rowId}">
                                                <a><i class="ion-android-close"></i></a>
                                            </div>
                                        </div>`
                    });
                    $('.mini_cart_inner').html(str+`<div class="mini_cart_table">
                                            <div class="cart_total">
                                                <span>Tổng tiền:</span>
                                                <span class="price">${data.total}</span>
                                            </div>
                                            <div class="cart_total mt-10">
                                                <span>Thành tiền:</span>
                                                <span class="price">${data.total}</span>
                                            </div>
                                        </div>`);
                    // location.reload(true);
				}
			});
        });
    });
</script> --}}
@endsection