<!DOCTYPE html>
<html lang="en">
    @include('frontend.layout.head')
    
    <body>
        @include('frontend.layout.header')

        @include('frontend.layout.sidebar')

        @yield('content')

        @include('frontend.layout.footer') 
        
        @yield('js_content')     
        
    </body>
</html>
