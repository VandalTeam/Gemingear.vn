@extends('admin.template.admin_template')
@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{asset('assets/admin/plugins/summernote/dist/summernote.css')}}" />
<link rel="stylesheet" href="{{asset('assets/admin/plugins/dropify/css/dropify.min.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
<div class="body_scroll">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2></h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Aero</a></li>
                    <li class="breadcrumb-item"><a href="/admin/products">Product</a></li>
                    <li class="breadcrumb-item active">
                    </li>
                </ul>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i
                        class="zmdi zmdi-arrow-right"></i></button>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="body">
                        <h2 class="card-inside-title">
                        </h2>
                        <div class="row clearfix">

                            <form action="/admin/Products/{{$method}}" method="post">
                                @csrf
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Tên sản phẩm</label>
                                        <input type="text" class="form-control" name="name" value=" {{$products->name}}"
                                            required />
                                    </div>
                                    <div class="body">
                                        <div class="row clearfix">
                                            <div class="col-sm-6">
                                                <label>Mục hàng</label>
                                                <select class="form-control ms" id="select-category" name="category_id"
                                                    required>
                                                    <option selected disabled>--> Chọn mục hàng <--</option>
                                                            <?php foreach (Category() as $item) {?> <option 
                                                            @if(($item->id == $products->category_id)&&($products->category_id!=0))
                                                            selected
                                                            @endif
                                                            value="<?= $item->id?>"><?= $item->name?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Loại hàng</label>
                                                <select class="form-control ms" id="select-subcategory"
                                                    name="menu_id" selected>
                                                    @if(($item->id ==$products->subcategory_id)&&($products->subcategory_id!=0))
                                                    <option selected value="{{$item->id}}"" name=" subcategory_id">
                                                        {{$item->name}}
                                                    </option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="body">
                                        <div class="row clearfix">

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Giá sản phẩm</label>
                                                    <div class="input-group masked-input mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                            class="zmdi zmdi-money"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control"
                                                            placeholder="Ex: 100,000,000,000 vnđ" name="price" required value="{{$products->price}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Giá khuyến mãi</label>
                                                    <div class="input-group masked-input mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="zmdi zmdi-money"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control"
                                                            placeholder="Ex: 100,000,000,000 vnđ" name="sale_price" value="{{$products->sale_price}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="header">
                                            <h2><strong >Mô tả</strong></h2>
                                        </div>
                                        <textarea class="summernote" name="description" >
                                                <?php echo $products->description; ?>
                                        </textarea>
                                    </div>
                                    <div class="header">
                                        <h2><strong>Hoạt động khuyến mãi</strong></h2>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-sm-6">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="zmdi zmdi-calendar"></i></span>
                                                </div>
                                                <input type="date" class="form-control" name="date_start"
                                                    value="{{ $products->date_start}}?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="zmdi zmdi-calendar"></i></span>
                                                </div>
                                                <input type="date" class="form-control "
                                                    value="{{ $products->date_end}}?>" name="date_end">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="header">
                                        <h2>Hình ảnh sản phẩm</h2>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-sm-3">
                                            <div class="card">
                                                <div class="body">
                                                    <input type="file" class="dropify" title="ảnh 1" name="image1"
                                                        data-default-file="" data-allowed-file-extensions="jpg png">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="card">
                                                <div class="body">
                                                    <input type="file" class="dropify" title="ảnh 2" name="image2"
                                                        data-default-file="" data-allowed-file-extensions="jpg png">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="card">
                                                <div class="body">
                                                    <input type="file" class="dropify" title="ảnh 3" name="image3"
                                                        data-default-file="" data-allowed-file-extensions="jpg png">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="card">
                                                <div class="body">
                                                    <input type="file" class="dropify"
                                                        data-allowed-file-extensions="jpg png">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-sm-6">
                                            <label>Loại hàng</label>
                                            <select class="form-control show-tick ms" name="instock" required>
                                                <option value="" selected disabled>-->Chọn loại hàng <--</option>
                                                @if ($method==="insert")
                                                <option value="0" >Còn hàng</option>
                                                <option value="1" style="color:red;" >Hết hàng</option>
                                                @else
                                                    @if ($products->instock==0)
                                                    <option value="0" selected>Còn hàng</option>
                                                    <option value="1" style="color:red;" >Hết hàng</option>
                                                    @else
                                                    <option value="0" >Còn hàng</option>
                                                    <option value="1" style="color:red;" selected>Hết hàng</option>
                                                    @endif
                                                @endif 
                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>URL image</label>
                                                <input type="text" class="form-control" name="url"
                                                    value="{{$products->url}}">
                                            </div>
                                        </div>
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
            </div>
        </div>
    </div>

</div>
@endsection
@section('bot')


<script src="{{asset('assets/admin/plugins/dropify/js/dropify.min.js')}}"></script>

<script src="{{asset('assets/admin/js/pages/forms/dropify.js')}}"></script>


<script src="{{asset('assets/admin/plugins/summernote/dist/summernote.js')}}"></script>

<script>
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function () {
            $("#select-category").change(function (e) { 
                e.preventDefault();
                var selectedCategory = $(this).children("option:selected").val();
                $.ajax({
                    type: "post",
                    url: "/admin/Products/loadsub",
                    data: {
                        'category_id': selectedCategory
                    },
                    dataType: "text",
                    success: function(res) {
                        $("#select-subcategory").attr('disabled', false);
                        $("#select-subcategory").empty();
                            $("#select-subcategory").append(res);
                    }
                });
            });
        });
</script>
@endsection