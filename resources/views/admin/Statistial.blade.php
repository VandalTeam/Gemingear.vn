@extends('admin.template.admin_template')
@section('head')
<link rel="stylesheet" href="{{asset('assets/admin/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/admin/plugins/charts-c3/plugin.css')}}" />
<link rel="stylesheet" href="{{asset('assets/admin/plugins/morrisjs/morris.min.css')}}" />
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <div class="row">
                            <div class="col-lg-6">
                                <h2><strong><i class="zmdi zmdi-chart"></i> Thống kê doanh thu theo tháng</strong></h2>
                            </div>
                            <div class="col-lg-2 text-center m-auto">
                                
                            </div>
                            <div class="col-lg-3 text-center m-auto">
                                <select name="Year" class="form-control show-tick ms" id="year">
                                    
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="body">
                        <div id="chart-area-spline-sracked" class="c3_chart d_sales"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-8 col-md-6 col-sm-6">

                <div class="row clearfix">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="card mcard_4">
                            <div class="header">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h2><strong><i class="zmdi zmdi-chart"></i>Top các sản phẩm bán chạy</strong>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                            <div class="body">
                                <div class="img">
                                    <img src="https://scontent.fsgn2-4.fna.fbcdn.net/v/t1.0-9/p960x960/70906418_1350377618471842_1424057674697277440_o.jpg?_nc_cat=111&_nc_ohc=gASbpV3SdEwAQn3d5Yag5wae77JzIhn6MK-kTs-hfD90YHiwdcDSz589g&_nc_ht=scontent.fsgn2-4.fna&oh=59ad32d1bb1a5ef7f507a2c39ca6e87d&oe=5E799B1B"
                                        class="rounded-circle" alt="profile-image">
                                </div>
                                <div class="user">
                                    <h5 class="mt-3 mb-1">Eliana Smith</h5>
                                    <small class="text-muted">UI/UX Desiger</small>
                                </div>
                                <ul class="list-unstyled social-links">
                                    <li><a href="javascript:void(0);"><i class="zmdi zmdi-dribbble"></i></a></li>
                                    <li><a href="javascript:void(0);"><i class="zmdi zmdi-behance"></i></a></li>
                                    <li><a href="javascript:void(0);"><i class="zmdi zmdi-pinterest"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="card w_data_1">
                            <div class="body">
                                <div class="w_icon pink"><i class="zmdi zmdi-bug"></i></div>
                                <h4 class="mt-3 mb-0">12.1k</h4>
                                <span class="text-muted">Bugs Fixed</span>
                                <div class="w_description text-success">
                                    <i class="zmdi zmdi-trending-up"></i>
                                    <span>15.5%</span>
                                </div>
                            </div>
                        </div>
                        <div class="card w_data_1">
                            <div class="body">
                                <div class="w_icon cyan"><i class="zmdi zmdi-ticket-star"></i></div>
                                <h4 class="mt-3 mb-1">01.8k</h4>
                                <span class="text-muted">Submitted Tickers</span>
                                <div class="w_description text-success">
                                    <i class="zmdi zmdi-trending-up"></i>
                                    <span>95.5%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Phân bổ</strong></h2>
                    </div>
                    <div class="body text-center">
                        <div id="chart-pie" class="c3_chart d_distribution"></div>
                        <button class="btn btn-primary mt-4 mb-4">View More</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('bot')
<script src="{{asset('assets/admin/bundles/jvectormap.bundle.js')}}"></script>
<script src="{{asset('assets/admin/bundles/sparkline.bundle.js')}}"></script>
<script src="{{asset('assets/admin/bundles/c3.bundle.js')}}"></script>
{{-- <script src="{{asset('assets/admin/js/pages/index.js')}}"></script> --}}
<script>
    $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
    $(document).ready(function(){
            var chart = c3.generate({
                bindto: '#chart-pie', // id of chart wrapper
                data: {
                    columns: [
                        // each columns data
                        ['data1', 55],
                        ['data2', 25],
                        ['data3', 20],
                    ],
                    type: 'pie', // default type of chart
                    colors: {
                        'data1': Aero.colors["lime"],
                        'data2': Aero.colors["teal"],
                        'data3': Aero.colors["gray"],
                    },
                    names: {
                        // name of each serie
                        'data1': 'Arizona',
                        'data2': 'Florida',
                        'data3': 'Texas',
                    }
                },
                axis: {
                },
                legend: {
                    show: true, //hide legend
                },
                padding: {
                    bottom: 0,
                    top: 0
                },
            });
        });
        var DS=['data1',0,0,0,0,0,0,0,0,0,0,0,0];
    $(document).ready(function(){
            var year= new Date().getFullYear();
            $('#year').append(`
                            <option selected disabled value="">-->   Chọn năm   <--</option>
                            <option>`+ (parseInt(year)-1)+`</option>
                            <option  >`+parseInt(year)+`</option>
                            <option >`+(parseInt(year)+1)+`</option>
                            `);
            $('#year').change(function (e) { 
                e.preventDefault();
                var Y= $(this).children("option:selected").val();
                        $.ajax({
                                    type: "post",
                                    url: "Dashboard/Year",
                                    data: {
                                            'year': Y
                                            },
                                    dataType: "json",
                                    success: function (response) {
                                        for(var i=1;i<DS.length;i++)
                                        {
                                            if(response[i-1]!=undefined)
                                            {
                                                DS[response[i-1].month]=response[i-1].DoanhThu;
                                            }
                                        }
                                        var chart = c3.generate({
                                            bindto: '#chart-area-spline-sracked', // id of chart wrapper
                                            data: {
                                                columns: [
                                                    // each columns data
                                                    DS,
                                                ],
                                                type: 'area-spline', // default type of chart
                                                groups: [
                                                    [ 'data1']
                                                ],
                                                colors: {
                                                    'data1': Aero.colors["blue"],
                                                },
                                                names: {
                                                    // name of each serie
                                                    'data1': 'Doanh thu theo năm '+Y+' ',
                                                }
                                            },
                                            axis: {
                                                x: {
                                                    type: 'category',
                                                    // name of each category
                                                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July', 'Aug', 'Sept', 'Oct','Nov','Dec']
                                                },
                                            },
                                            legend: {
                                                show: true, //hide legend
                                            },
                                            padding: {
                                                bottom: 0,
                                                top: 0
                                            },
                                        });  
                                    }
                        });

                 
            });
            
            var chart = c3.generate({
                bindto: '#chart-area-spline-sracked', // id of chart wrapper
                data: {
                    columns: [
                        // each columns data
                        DS,
                    ],
                    type: 'area-spline', // default type of chart
                    groups: [
                        [ 'data1']
                    ],
                    colors: {
                        'data1': Aero.colors["blue"],
                    },
                    names: {
                        // name of each serie
                        'data1': 'Doanh thu theo năm ',
                    }
                },
                axis: {
                    x: {
                        type: 'category',
                        // name of each category
                        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July', 'Aug', 'Sept', 'Oct','Nov','Dec']
                    },
                },
                legend: {
                    show: true, //hide legend
                },
                padding: {
                    bottom: 0,
                    top: 0
                },
            });
            
        });    
</script>
<script>
</script>
@endsection