<!-- Plugins JS -->
<script src="{{asset('assets/customer/js/plugins.js')}}"></script>

<!-- Main JS -->
<script src="{{asset('assets/customer/js/main.js')}}"></script>

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
</script>
<script>
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
                  		$('.notify').append('<div class="alert alert-danger"><p>'+data.success+'</p></div>');
                        $("#form-signup")[0].reset();
                    }
                }
            });
        });
    });
</script>