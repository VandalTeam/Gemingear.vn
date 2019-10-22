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
                    <h4>admin</h4>
                    <small>admin@gmail.com</small>
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
        <li class="<?php if($menu=='category'){echo 'active open';}?>"><a href="{{url('admin/category')}}"><i
                    class="zmdi zmdi-hc-fw"></i><span>Category</span></a></li>
        <li class="<?php if($menu=='Products'){echo 'active open';}?>"><a href="{{url('admin/Products')}}"><i
                    class="zmdi zmdi-hc-fw"></i><span>Products</span></a></li>
        <li class="<?php if($menu=='subcategory'){echo 'active open';}?>"><a href="javascript:void(0);"
                class="menu-toggle"><i class="zmdi zmdi-hc-fw"></i><span>Subcategory</span></a>
            <ul class="ml-menu">
                @foreach (Category() as $item)
                <li class="<?php if($item->url==$uri){echo 'active open';}?>"><a
                        href="/admin/subcategory/<?= $item->url?>"><i
                            class="zmdi zmdi-hc-fw"></i><span>{{$item->name}}</span></a></li>
                @endforeach
            </ul>
        </li>
        <li class="<?php if($menu=='menu'){echo 'active open';}?>"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-hc-fw"></i><span>Menu</span></a>
            <ul class="ml-menu">
                @foreach (Category() as $item)
                <li class="<?php if($uri==$item->url){echo 'active open';}?>"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-hc-fw"></i><span>{{$item->name}}</span></a>
                    <ul class="ml-menu test" style="margin-left: 45px;">
                        @foreach (Subcategory1($item->id) as $item1)
                            <li class="<?php if($url==$item1->url){echo 'active open';}?>"><a href="/admin/menu/<?= $item->url?>/<?= $item1->url?>"><i class="zmdi zmdi-hc-fw"></i><span>{{$item1->name}}</span></a></li>
                        @endforeach
                    </ul>
                <li>
                @endforeach
            </ul>
        </li>
    </ul>
</div>