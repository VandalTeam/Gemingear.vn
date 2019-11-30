@extends('admin.template.admin_template')
@section('head')
<link rel="stylesheet" href="{{asset('assets/admin/plugins/jquery-datatable/dataTables.bootstrap4.min.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
<div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Jquery DataTables</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Aero</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Tables</a></li>
                        <li class="breadcrumb-item active">Normal Tables</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i
                            class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i
                            class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
            <!-- The Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm mục người dùng</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('admin/users/insert')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Số hóa đơn</label>
                        <input type="text" class="form-control order_id" name="order_id" />
                        <label>Tên sản phẩm</label>
                        <input type="text" class="form-control product" name="product" />
                        <label>Giá</label>
                        <input type="text" class="form-control price" name="price" />
                        <label>Số lượng</label>
                        <input type="number" class="form-control qty" name="qty">
                        <label>giá sale</label>
                        <input type="number" class="form-control price_sale" name="price_sale">
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </form>
        </div>
    </div>
</div>
        <div class="container-fluid">
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Số hóa đơn</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Giá</th>
                                            <th>Số lượng</th>
                                            <th>Giá sale</th>
                                            <th>Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach ($order as $item)
                                        <tr>
                                            <td>{{$item->order_id}}</td>
                                            <td>{{$item->product_name}}</td>
                                            <td>{{$item->price}}</td>
                                            <td>{{$item->qty}}</td>
                                            <td>{{$item->price_sale}}</td>
                                            <td width="15%" class="footable-last-visible" style="display: table-cell;">
                                                <a><button class="btn btn-primary btn-sm editorder_detail"
                                                        data-id="{{$item->id}}" data-order="{{$item->order_id}}" data-toggle="modal"
                                                        data-target="#exampleModal"><i class="zmdi zmdi-edit"></i>
                                                        Sửa</button></a>
                                                <a class="delete" href="/admin/order_detai/delete/{{$item->id}}"><button
                                                        class="btn btn-danger btn-sm"><i class="zmdi zmdi-delete"></i>
                                                        Xóa</button></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('bot')
<script src="{{asset('assets/admin/bundles/datatablescripts.bundle.js')}}"></script>
<script src="{{asset('assets/admin/plugins/jquery-datatable/buttons/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/admin/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/admin/plugins/jquery-datatable/buttons/buttons.colVis.min.js')}}"></script>
<script src="{{asset('assets/admin/plugins/jquery-datatable/buttons/buttons.flash.min.js')}}"></script>
<script src="{{asset('assets/admin/plugins/jquery-datatable/buttons/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/admin/plugins/jquery-datatable/buttons/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/admin/js/pages/tables/jquery-datatable.js')}}"></script>
<script>
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).ready(function() {
                $('.editorder_detail').click(function(e) {
                    e.preventDefault();
                    var idOr_dt = $(this).attr('data-id');
                        $.ajax({
                        type: "post",
                        url: "/admin/order_detail/edit",
                        data: {
                            'id': idOr_dt
                        },
                        dataType: "json",
                        success: function(res) {
                            $(".order_id").val(res[0].order_id);
                             $(".product").val(res[0].product_name);
                             $(".price").val(res[0].price);
                             $('.qty').val(res[0].qty);
                             $('.price_sale').val(res[0].price_sale);
                            $("#exampleModal form").attr('action', '/admin/order_detail/update/'+res[0].id);
                        }
                    });
                });
            });
    </script>
@endsection