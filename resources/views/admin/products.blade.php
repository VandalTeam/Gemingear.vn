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

  

<div class="container-fluid">
    <!-- Basic Examples -->
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="header">
                    <h2><strong>Basic</strong> Examples </h2>
                    <div class="float-right">
                        <form action="{{ url('admin/product/new')}}" method="post">
                            @csrf
                            <button type="submit" style="margin-top: -50px;"
                                class=" btn btn-primary waves-effect waves-light"><i class="fa fa-cog mr-1"></i>
                                Thêm</button>
                        </form>
                    </div>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá sản phẩm</th>
                                    <th>Loại sản phẩm</th>
                                    <th>Hãng sản xuất</th>
                                    <th>Khuyến mãi</th>
                                    <th>Tình trạng</th>
                                    <th>Chức năng</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1?> @foreach ($product as $item)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->price}}</td>
                                    <td>{{$item->in_stock}}</td>
                                    <td>{{$item->subcategory_name}}</td>
                                    <td>{{$item->promotion_name}}</td>
                                    <td>{{$item->brand_name}}</td>
   
                                    <td width="30%" class="footable-last-visible" style="display: table-cell;">
                                        <form action="/admin/products/edit/{{$item->id}}" method="post">
                                            @csrf
                                            <button class="btn btn-primary btn-sm editproduct" data-id="{{$item->id}}"><i
                                                    class="zmdi zmdi-edit"></i> Sửa</button>
                                             <button class="btn btn-danger btn-sm delete" data-id="{{$item->id}}">
                                                            <i class="zmdi zmdi-delete"></i>Xóa</button>
                                        </form>
                                        
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
<script src="{{asset('assets/admin/js/pages/tables/jquery-datatable.js')}}"></script>

<script>
    $(document).ready(function(){
            $('.insertcategory').click(function (e) { 
                e.preventDefault();
                $(".modal-body :nth-child(1) input").val('');
            });
        });
</script>
<script>
    $(document).ready(function()
        {
            $('.delete').click(function (e) { 
                e.preventDefault();
                var idPro = $(this).attr('data-id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '<a href="/admin/product/delete/'+idPro+'" style="color:white;">Yes, delete it!</a>'
                    }).then((result) => {
                    if (result.value) {
                        Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                        )
                    }
                    })
            });
        });
</script>
{{-- <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            $('.editproduct').click(function(e) {
                e.preventDefault();
                var idProduct = $(this).attr('data-id');
                alert(idProduct);
                $.ajax({
                    type: "post",
                    url: "/admin/category/edit",
                    data: {
                        'id': idCategory
                    },
                    dataType: "json",
                    success: function(res) {

                        $(".modal-body :nth-child(1) input").val(res[0].name);
                        $("#exampleModal form").attr('action', document.URL+'/update/'+res[0].id);
                    }
                });
            });
        });
    </script> --}}
@endsection