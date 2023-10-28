
    @include('header') <!-- Include the header section -->
    
    <div class="page-wrap">
        @include('left-sidebar') <!-- Include the left sidebar section -->
          @yield('content')
        @include('right-sidebar') <!-- Include the right sidebar section -->
    </div>
