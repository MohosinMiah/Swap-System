<!DOCTYPE html>
<html lang="en">
<head>
  <title>Swap Dashboard - @yield('title')</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  {{-- Style Files *************************    --}}
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{ URL::asset('assets/css/main.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('/css/global.css') }}">
  
  

</head>
<body>

  <!-- Header -->
    <header id="header">
      <div class="inner">
        <a href="/" class="logo" > <img src="{{  URL::asset('/images/swap-logo.png') }}" alt="Swap Dashboard "> </a>
        <nav id="nav">
          <a href="https://www.swap.com/" target="_blank">Visit Website</a>
     
        </nav>
        <a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
      </div>
    </header>

  <!-- Banner -->
    <section id="banner">
      <div class="inner">
        <header>
          <h1>Welcome to Swap Dashboard</h1>
        </header>

        <div class="flex ">

          <div>
            <i class="fa fa-user" style="font-size:55px;color:green" data-toggle="tooltip" data-placement="top" title="Admin Login"></i>
            <a href="{{ route('admin.loginadmin_login') }}"> <h3>Admin Login</h3> </a>
            <p>Login for Manage Sellers and Consumers</p>
          </div>

          <div>
            <i class="fa fa-user" style="font-size:55px" data-toggle="tooltip" data-placement="top" title="Sellers Login"></i>
            <a href="{{ route('seller.loginseller_login') }}"> <h3>Seller Login</h3> </a>
            <p>Login for Manage Consumers or Customers</p>
          </div>


        </div>

      </div>
    </section>


  <!-- Footer -->
    <footer id="footer">
      <div class="inner">

        <h3>Contact With Us</h3>
         <h3><a href="tel:+01857126452"> <i class="fa fa-phone" aria-hidden="true"> </i> 
          01857126452 </a>
         </h3>

         <h3> <a href="mailto:query@swap.com"><i class="fa fa-envelope" aria-hidden="true"></i>
          query@swap.com</a> 
         </h3>

        <div class="copyright">
          &copy; swap All Right Preserved  <a href="https://www.swap.com/"></a>
        </div>

      </div>
    </footer>



  <!-- Scripts -->
    <script src="{{ URL::asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/skel.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/util.js') }}"></script>
    <script src="{{ URL::asset('assets/js/main.js') }}"></script>


  {{-- Javascript  Files *************************    --}}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  {{-- Javascript  For Tool Tip *************************    --}}
<script>
    $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>



</body>
</html>
