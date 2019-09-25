<div class="navbar-brand">
    <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
    <a href="index.html"><img src="{{asset('assets/admin/images/logo.svg')}}" width="25" alt="Aero"><span class="m-l-10">Aero</span></a>
</div>
<div class="menu">
    <ul class="list">
        <li>
            <div class="user-info">
                <a class="image" href="profile.html"><img src="{{asset('assets/admin/images/profile_av.jpg')}}" alt="User"></a>
                <div class="detail">
                    <h4>admin</h4>
                    <small>admin@gmail.com</small>
                </div>
            </div>
        </li>
        <li class="active open"><a href="index.html"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
        <li class="active open"><a href="{{url('admin/category')}}"><i class="zmdi zmdi-hc-fw"></i><span>Category</span></a></li>
        <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-hc-fw"></i><span>Subcategory</span></a>
            <ul class="ml-menu">
            </ul>
        </li>
    </ul>
</div>