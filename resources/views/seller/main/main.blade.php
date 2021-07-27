<!DOCTYPE html>
<html lang="en">
<head>
  <title>Live Link BD Dashboard - @yield('title')</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  {{-- Style Files *************************    --}}

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="{{ URL::asset('/css/global.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('/css/admin/login.css') }}">

  <link rel="icon" href="{{ URL::asset('/images/logo.png') }}" type="image/gif" sizes="16x16">


</head>
<body>

  {{-- Header Section  --}}

 
  {{-- Header Section  --}}

<div class="jumbotron text-center top-header">
  <h1>Live Link BD Dashboard</h1>

  <div class="logo">
    <a href="{{ route('adminpanel_dashboard') }}" style="
      color: #ffffff;
      text-decoration: none;
      background-color: transparent;
      font-size: 20px;
  ">Back To Login</a>
    <h1> <h1>Live Link BD Software Dashboard</h1> </h1>
  </div>

  <div class="notice">
    <h3><marquee>Welcome to Live Link BD Dashboard. Admin says "We  are commited for bettter service because we belive customer is the king."</marquee></h3>

  </div>

</div>
  

{{-- Main Body  --}}

@yield('main_body')


{{-- Footer Section  --}}

<div class="container-fluid footer">
  <div class="row">
    <div class="col-sm-12 col-md-12">

      <p><strong>All Right Preserved &copy;<a href="#" class="copy_right_link"> Live Link BD Dashboard </a></strong></p>
    </div>

  </div>
</div>


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
