<div class="navbar-brand">
    <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
    <a href="/admin/index"><img src="{{asset('assets/admin/images/logo.svg')}}" width="25" alt="Aero"><span
            class="m-l-10">Aero</span></a>
</div>
<div class="menu">
    <ul class="list">
        <li>
            <div class="user-info">
                <a style="pointer-events: none;cursor: default;" class="image" href="#"><img
                        src="https://scontent.fsgn2-1.fna.fbcdn.net/v/t1.0-9/p960x960/70906418_1350377618471842_1424057674697277440_o.jpg?_nc_cat=111&_nc_eui2=AeGObWaUlFEbhwnRbscEBPdhXizkRP6Vr6Q8abc_n2NyXXTk9cpSd_wJvfbXbxLtKEy8dT9xlnaKPxhMhHKRhjaXqyJmFHIl2esL_kSJV6-Z9Q&_nc_oc=AQmwosZEtqIrVaaOQolaOSW7GxKGUQ8hwaAyFDPm9dCxkq0ugwdvRzyt3D1EqaKJVwg&_nc_ht=scontent.fsgn2-1.fna&oh=fd233487b706c6d8722c2d05ba578781&oe=5E520E1B"
                        alt="User"></a>
                <div class="detail">
                    <h4>{{getUser()->name}}</h4>
                    <small>{{getUser()->email}}</small>
                </div>
            </div>
        </li>
        {{-- get URI menu check class active open --}}
        <?php
            $menu = Request::segment(2);
            $uri = Request::segment(3);
            $url = Request::segment(4);
        ?>
        <li class=""><a href="/admin/index"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
        <li class="<?php if($menu=='Users'){echo 'active open';}?>"><a href="{{url('admin/users')}}"><i
                    class="zmdi zmdi-account-circle"></i><span>Users</span></a></li>
        <li class="cl <?php if($menu=='category'){echo 'active open';}?>"><a href="{{url('admin/category')}}"><i
                    class="zmdi zmdi-hc-fw"></i><span>Category</span></a></li>
        <li class="cl <?php if($menu=='subcategory'){echo 'active open';}?>"><a href="javascript:void(0);"
                class="menu-toggle"><i class="zmdi zmdi-hc-fw"></i><span>Subcategory</span></a>
            <ul class="ml-menu">
                @foreach (Category() as $item)
                <li class="<?php if($item->url==$uri){echo 'active open';}?>"><a
                        href="/admin/subcategory/<?= $item->url?>"><span>{{$item->name}}</span></a></li>
                @endforeach
            </ul>
        </li>
        <li class="<?php if($menu=='brands'){echo 'active open';}?> promotions"><a href="{{url('admin/brand')}}"><i
            class="zmdi zmdi-flare"></i><span>Brands</span></a></li>
        <li class="<?php if($menu=='promotions'){echo 'active open';}?> promotions"><a
                href="{{url('admin/promotion')}}"><i class="zmdi zmdi-star-half"></i><span>Promotion</span></a></li>
        <li class="cl <?php if($menu=='series'){echo 'active open';}?>"><a href="javascript:void(0);"
            class="menu-toggle"><i class="zmdi zmdi-hc-fw"></i><span>Series</span></a>
            <ul class="ml-menu">
                @foreach (Brand() as $item)
                <li class="<?php if($item->url==$uri){echo 'active open';}?>"><a
                        href="/admin/series/<?= $item->url?>"><span>{{$item->name}}</span></a></li>
                @endforeach
            </ul>
        </li>
        <li class="cl <?php if($menu=='product'){echo 'active open';}?>"><a href="{{url('admin/product')}}"><i
                    class="zmdi zmdi-shopping-cart"></i><span>Product</span></a></li>
        <li class="<?php if($menu=='banner'){echo 'active open';}?> banner"><a href="{{url('admin/banner')}}"><i
            class="zmdi zmdi-collection-item"></i><span>Banner</span></a></li>
</div>
@section('bot')
<script>
    $(document).ready(function () {
            $('.cl').click(function (e) { 
                var userid=$(this).attr("value");
                $$.post("app.Helpers.Helper.php", {suggest: userid},
                    
                    "string"
                );
            });
        });
</script>
@endsection