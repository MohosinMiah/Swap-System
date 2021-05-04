
{{--  Header Included   --}}

@include('front.include.header')
    <main role="main">



  {{--  Footer Included   --}}
  @yield('slider')


 {{--  Hero Section   --}}
  @yield('hero')

      <div class="album py-5 bg-light">
        <div class="container">

           @yield('main')
        </div>
      </div>

    </main>

  {{--  Footer Included   --}}
  @include('front.include.footer') 