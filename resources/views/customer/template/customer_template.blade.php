<!DOCTYPE html>
<html class="no-js" lang="en">
@include('customer.layout.head')
<body>
    @include('customer.layout.menu')
    @yield('slider')
    @yield('content')
    @include('customer.layout.footer')
    @include('customer.layout.bot')
</body>
</html>