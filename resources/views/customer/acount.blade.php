@extends('customer.template.customer_template')
@section('content')
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="index.html">home</a></li>
                        <li>My account</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!-- my account start  -->
<div class="account_page_bg">
    <div class="container">
        <section class="main_content_area">
            <div class="account_dashboard">
                <div class="row">
                    <div class="col-sm-12 col-md-3 col-lg-12 ">
                        <!-- Nav tabs -->
                        <div class="dashboard_tab_button">
                            <ul role="tablist" class="nav  dashboard-list text-center">
                                <li ><a href="#account-details" data-toggle="tab" class="nav-link active">Account
                                        details</a></li>
                                <li style="width: 140px;"> <a href="#orders" data-toggle="tab" class="nav-link">Orders</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 col-md-8 col-lg-8">
                                <!-- Tab panes -->
                                <div class="tab-content dashboard_content">
                                    <div class="tab-pane fade" id="orders">
                                                    <h3>Orders</h3>
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>Số hóa đơn</th>
                                                                    <th>Tên khách hàng</th>
                                                                    <th>Trạng thái</th>
                                                                    <th>Tổng tiền</th>
                                                                    <th>Chi tiết</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach (order(getUser()->id) as $item)
                                                                <tr>
                                                                        <td>{{$item->id}}</td>
                                                                        <td>{{$item->name_customer}}</td>
                                                                        <td><span class="success"><?php if($item->status==1) {echo "Hoàn thành";} else{ echo "Đang duyệt";}?></span></td>
                                                                        <td>{{$item->total}}</td>
                                                                        <td><a href="/cart" class="view">view</a></td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                    <div class="tab-pane fade show active" id="account-details">
                                        <h3 class="text-center">Account details </h3>
                                        <div class="login">
                                            <div class="login_form_container">
                                                <div class="account_login_form">
                                                    <form action="/admin/users/update/{{getUser()->id}}" method="POST">
                                                        @csrf
                                                        <p class="text-center">Already have an account? <a href="#">Log
                                                                in
                                                                instead!</a></p>
                                                        <div class="input-radio text-center">
                                                            <span class="custom-radio"><input type="radio" value="1"
                                                                    name="id_gender"> Mr.</span>
                                                            <span class="custom-radio"><input type="radio" value="1"
                                                                    name="id_gender"> Mrs.</span>
                                                        </div>
                                                        <br>
                                                        <label>Name</label>
                                                        <input type="text" name="name" value="{{getUser()->name}}">
                                                        <label>Phone</label>
                                                        <input type="text" name="phone" value="{{getUser()->phone}}">
                                                        <label>Email</label>
                                                        <input type="text" name="email" value="{{getUser()->email}}">
                                                        <label>Password</label>
                                                        <input type="password" name="password">
                                                        <div class="save_button primary_btn default_button text-center">
                                                            <button type="submit">Thay đổi</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 info col-4 " style="font-family:Comfortaa,sans-serif;">
                                <div class="row">
                                    <div class="card text-center col-9 m-auto">
                                        <a href="#" class="profile"><img height="200px" width="200px"
                                                src="https://scontent.fsgn5-3.fna.fbcdn.net/v/t1.0-9/p960x960/70906418_1350377618471842_1424057674697277440_o.jpg?_nc_cat=111&_nc_ohc=zXyHG-hMceAAQmjwhzFGPGVGmG102dTpuhm0S4QnBWgyG1Etpg_6YNn7w&_nc_ht=scontent.fsgn5-3.fna&oh=4b542ef9296b2148bf3608351df51875&oe=5E799B1B"
                                                class="rounded-circle shadow " alt="profile-image"></a>
                                        <div class="card-body">
                                            <h3 class="card-title text-center">{{getUser()->name}}</h3>
                                            <div class="row">
                                                <div class="col-12">
                                                    <p class="text-muted">HCMC National University Dormitory - Zone B
                                                    </p>
                                                </div>
                                                <div class="col-4">
                                                    <small>Following</small>
                                                    <h5>852</h5>
                                                </div>
                                                <div class="col-4">
                                                    <small>Followers</small>
                                                    <h5>13k</h5>
                                                </div>
                                                <div class="col-4">
                                                    <small>Post</small>
                                                    <h5>234</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- </div> --}}
                </div>
        </section>
    </div>
</div>
@endsection