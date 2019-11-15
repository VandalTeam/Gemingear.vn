<script src="{{asset('assets/admin/bundles/libscripts.bundle.js')}}"></script>
<script src="{{asset('assets/admin/bundles/vendorscripts.bundle.js')}}"></script>
<script src="{{asset('assets/admin/bundles/mainscripts.bundle.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/async/3.1.0/async.js"></script>

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
        $('.delete').click(async function (e) { 
            e.preventDefault();
            var href = $(this).attr('href');
            const { value: success } = await Swal.fire({
            title: 'Bạn có chắc muốn xóa?',
            text: "Dữ liệu sẽ bị mất hoàn toàn!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Trở về',
            })

            if (success) {
                window.location = href;
            }
        });
    });
</script> 

