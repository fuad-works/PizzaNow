<!DOCTYPE html>
<html dir="rtl" lang="ar">
  @include('layouts.parts.head')
<body>
    <div class="wrapper">

      @include('layouts.parts.sidebar')

        <div id="content">

            @include('layouts.parts.navbar')

            <h4 class="h4 mb-4 text-center">@yield('page-head-title')</h3>
            @yield('page-content')
        </div>
    </div>

    @include('layouts.parts.footer')

</body>
</html>
