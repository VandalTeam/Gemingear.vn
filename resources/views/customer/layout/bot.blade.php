<!-- Plugins JS -->
<script src="{{asset('assets/customer/js/plugins.js')}}"></script>

<!-- Main JS -->
<script src="{{asset('assets/customer/js/main.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $('#login').click(function (e) { 
            e.preventDefault();
            $('#signupModalCenter').removeClass('fade');
            $('#signupModalCenter').modal('toggle');
            $('#exampleModalCenter').modal('show');
            $("#signupModalCenter").addClass('fade');
        });
    });
    $(document).ready(function () {
        $('#signup').click(function (e) { 
            e.preventDefault();
            $('#exampleModalCenter').removeClass('fade');
            $('#exampleModalCenter').modal('toggle');
            $('#signupModalCenter').modal('show');
            $("#exampleModalCenter").addClass('fade');
        });
    });
</script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function () {
        $('#register').click(function (e) { 
            e.preventDefault();
            $('.alert-danger').remove();
            $('.alert-success').remove();
            $.ajax({
                type: "post",
                url: "/customer/signup",
                data: {
                    last_name: $("input[name=last_name]").val(),
                    first_name: $("input[name=first_name]").val(),
                    email:  $("#signupModalCenter input[name=email]").val(),
                    password: $("#signupModalCenter input[name=password]").val(),
                },
                dataType: "json",
                success: function (data) {
                    if(typeof data.errors !== "undefined"){
                        jQuery.each(data.errors, function(key, value){
                  			$('.notify').show();
                  			$('.notify').append('<div class="alert alert-danger"><p>'+value+'</p></div>');
                  	    });
                    }else{
                        $('.notify').show();
                  		$('.notify').append('<div class="alert alert-success"><p>'+data.success+'</p></div>');
                        $("#form-signup")[0].reset();
                    }
                }
            });
        });
    });
    $(document).ready(function () {
        $('.mini_cart_inner').on('click', '.remove_cart', function() {
            var id = $(this).attr('data-id');
            $.ajax({
                type: "get",
                url: "/removecart",
                data: {
                    'rowId': id,
                },
                dataType: "json",
                success: function (data) {
                    location.reload(true);
                }
            });
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
       @if(Session:: has('fail'))
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        Toast.fire({
        type: 'error',
        title: '{{ Session:: get('fail') }}'
        });
       @endif
       @if(Session:: has('success'))
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        Toast.fire({
        type: 'success',
        title: '{{ Session:: get('success') }}'
        });
       @endif
       @if(Session:: has('login'))
        Swal.fire({
            type: 'success',
            title: '{{ Session:: get('login') }}',
            showConfirmButton: false,
        });
        @endif
    });
</script>
<script>
    $(document).ready(function () {
        $('#results').css("display","none");
        $('.col-lg-8 p-0').css("display","none");
        $("#search").on('keyup change click', function () {
            var product_name=$("#search").val();
            if(product_name==="")
            {
                $('#results').css("display","none");
                $('.col-lg-8 p-0').css("display","none");
            }
            $.ajax({
            type: "post",
            url: "/searchAjax",
            data: {
                'name': product_name
            },
            dataType: "json",
                success: function (response) {
                    $('#results').empty();
                    $('#results').css("display","block");
                    $('.col-lg-8 p-0').css("display","block");
                    for(var i=0;i<response.length;i++)
                    {
                        $('#results').append('<li ><a class="detail" href="'+response[i].url+'"><img height="100px" width="100px" src="'+response[i].image+'" alt="">'+response[i].name+' <span>'+response[i].price+'đ</span></a></li>');
                    }
                }
            });
        });
    });
</script>