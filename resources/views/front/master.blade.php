
{{--  Header Included   --}}

@include('front.include.header')
    <main role="main">

    
  
  {{--  Footer Included   --}}
  @include('front.include.slider')


 {{--  Hero Section   --}}
  @include('front.include.hero')

      <div class="album py-5 bg-light">
        <div class="container">

           @yield('main')
        </div>
      </div>

    </main>

  {{--  Footer Included   --}}
  @include('front.include.footer')