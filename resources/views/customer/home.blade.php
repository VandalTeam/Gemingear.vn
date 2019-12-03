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
    <div class="product_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_header" >
                        <div class="section_title">
                            <h2>Laptop Gaming</h2>
                        </div>
                        <div class="product_tab_btn">
                            <ul class="nav" role="tablist">
                                <li>
                                    <a data-toggle="tab" href="#Audio" role="tab" aria-controls="Audio"
                                        aria-selected="false">
                                        Xem tất cả
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-content" id="tag_container">
                @include('customer.layout.pagination')
            </div>
        </div>
    </div>
    <!--product area end-->
    <!--product area start-->
    <div class="product_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_header" >
                        <div class="section_title">
                            <h2>Laptop Gaming</h2>
                        </div>
                        <div class="product_tab_btn">
                            <ul class="nav" role="tablist">
                                <li>
                                    <a data-toggle="tab" href="#Audio" role="tab" aria-controls="Audio"
                                        aria-selected="false">
                                        Xem tất cả
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-content" id="tag_container">
                @include('customer.layout.pagination')
            </div>
        </div>
    </div>
    <!--product area end-->
</div>
<!--home section bg area end-->
<script type="text/javascript">
    $(document).ready(function()
    {
        $(document).on('click', '.pagination a',function(event)
        {
            event.preventDefault();
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