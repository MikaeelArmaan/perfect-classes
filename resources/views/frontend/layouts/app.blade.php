<!DOCTYPE html>
<html lang="en">
    @include('frontend.partials.head')
<body>
    @include('frontend.partials.menu')
    @include('frontend.partials.header')
    @yield('content')
    @include('frontend.partials.footer')
    @include('frontend.partials.footer_script')
</body>
</html>


