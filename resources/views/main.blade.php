<!DOCTYPE html>
<html lang="en">

@include('includes.head')

  <body>
  
        @include('includes.nav') 
        @yield('slide')
        
        <div class="container">

            @include('includes.message')
            @yield('content')
       
        </div>
       

        @include('includes.footer')
        @include('includes.script')
        @yield('scripts')

       <button onclick="topFunction()"  id="myBtn" title="Go to top">Top</button>
  </body>

</html>
