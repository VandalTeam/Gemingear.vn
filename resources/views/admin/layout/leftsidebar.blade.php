<div class="navbar-brand">
    <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
    <a href="index.html"><img src="{{asset('assets/admin/images/logo.svg')}}" width="25" alt="Aero"><span
            class="m-l-10">Aero</span></a>
</div>
<div class="menu">
    <ul class="list">
        <li>
            <div class="user-info">
                <a class="image" href="profile.html"><img src="{{asset('assets/admin/images/profile_av.jpg')}}"
                        alt="User"></a>
                <div class="detail">
                <h4 >{{getUser()->name}}</h4>
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
        <li class=""><a href="index.html"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
        <li class="<?php if($menu=='Users'){echo 'active open';}?>"><a href="{{url('admin/Users')}}"><i
                    class="zmdi zmdi-hc-fw"></i><span>Users</span></a></li>
        <li class="cl <?php if($menu=='category'){echo 'active open';}?>" ><a href="{{url('admin/category')}}"><i
                    class="zmdi zmdi-hc-fw"></i><span>Category</span></a></li>
        <li class="cl <?php if($menu=='subcategory'){echo 'active open';}?>" ><a href="javascript:void(0);"
                class="menu-toggle"><i class="zmdi zmdi-hc-fw"></i><span>Subcategory</span></a>
            <ul class="ml-menu">
                @foreach (Category() as $item)
                <li class="<?php if($item->url==$uri){echo 'active open';}?>"><a
                        href="/admin/subcategory/<?= $item->url?>"><i
                            class="zmdi zmdi-hc-fw"></i><span>{{$item->name}}</span></a></li>
                @endforeach
            </ul>
        </li>
        <li class="cl <?php if($menu=='product'){echo 'active open';}?>" ><a href="{{url('admin/product')}}"><i
            class="zmdi zmdi-hc-fw"></i><span>Product</span></a></li>
        <li class="<?php if($menu=='promotions'){echo 'active open';}?> promotions"><a href="{{url('admin/promotion')}}"><i
            class="zmdi zmdi-hc-fw"></i><span>Promotion</span></a></li>
        <li class="<?php if($menu=='brands'){echo 'active open';}?> promotions"><a href="{{url('admin/brand')}}"><i
            class="zmdi zmdi-hc-fw"></i><span>Brands</span></a></li>
        <li class="<?php if($menu=='banner'){echo 'active open';}?> banner"><a href="{{url('admin/banner')}}"><i
            class="zmdi zmdi-hc-fw"></i><span>Banner</span></a></li>
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