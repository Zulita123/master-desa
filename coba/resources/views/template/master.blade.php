<!DOCTYPE html>
<html>
<head>
@include('template.head')
</head>
<body class="theme-red">
    @include('template.navbar')
    <section>
       @include('template.sidebar')
    </section>
    <section class="content">
    
    @yield('content')
    </section>

    
    @yield('scripts')
</body>

</html>
