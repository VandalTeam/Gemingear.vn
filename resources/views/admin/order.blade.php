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
                        <label>Tên khách hàng</label>
                        <input type="text" class="form-control tenDN" name="name_customer" />
                        <label>Số điện thoại</label>
                        <input type="text" class="form-control phone" name="phone" />
                        <label>Địa chỉ</label>
                        <input type="text" class="form-control address" name="address" />
                        <label>Tổng tiền</label>
                        <input type="number" class="form-control total" name="total">
                        <label for="status">Trạng thái</label>
                        <select class="form-control role show-tick ms" name="status" id="status">
                                <option value="1">Đã giao hàng</option>
                                <option value="0">Đã xác nhận</option>
                            </select>
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
                                            <th>STT</th>
                                            <th>Tên khách hàng</th>
                                            <th>Số điện thoại</th>
                                            <th>Địa điểm</th>
                                            <th>Tổng tiền</th>
                                            <th>Chi tiết</th>
                                            <th>Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1?> @foreach ($order as $item)
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>{{$item->name_customer}}</td>
                                            <td>{{$item->phone}}</td>
                                            <td>{{$item->address}}</td>
                                            <td>{{$item->total}}</td>
                                            <td><a href="/admin/order_detail/{{$item->id}}" class="view">view</a></td>
                                            <td width="15%" class="footable-last-visible" style="display: table-cell;">
                                                <a><button class="btn btn-primary btn-sm editorder"
                                                        data-id="{{$item->id}}" data-toggle="modal"
                                                        data-target="#exampleModal"><i class="zmdi zmdi-edit"></i>
                                                        Sửa</button></a>
                                                <a class="delete" href="/admin/order/delete/{{$item->id}}"><button
                                                        class="btn btn-danger btn-sm"><i class="zmdi zmdi-delete"></i>
                                                        Xóa</button></a>
                                            </td>
                                        </tr>
                                        <?php $i++?> @endforeach
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
                $('.editorder').click(function(e) {
                    e.preventDefault();
                    var idOr = $(this).attr('data-id');
                    $.ajax({
                        type: "post",
                        url: "/admin/order/edit",
                        data: {
                            'id': idOr
                        },
                        dataType: "json",
                        success: function(res) {
                            $(".tenDN").val(res[0].name_customer);
                            $(".phone").val(res[0].phone);
                            $(".address").val(res[0].address);
                            $('.total').val(res[0].total);
                            //$(".status").val(res[0].status);
                            $("#status option[value="+res[0].status+"]").attr('selected','selected');
                            $("#exampleModal form").attr('action', document.URL+'/update/'+res[0].id);
                        }
                    });
                });
            });
    </script>
@endsection