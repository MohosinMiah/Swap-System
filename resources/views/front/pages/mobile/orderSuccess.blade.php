@extends('front.master')



@section('hero')
<section class="jumbotron text-center">
    <div class="container">
      <h1 class="text-danger">Your Order Place Successfully. We will contact with you within 24 Hours</h1>
      <h1> 
          <a href="/">Back To Home</a>
      </h1>
    </div>
  </section> 
@stop



@section('main')
<div class="row">
 
  <div class="col-md-6">

   
    <img class="card-img-top" src="{{ url('/images/contact_phone.gif') }}"  alt="Contact With Phone">

  </div>
  <div class="col-md-6" style="padding: 3%">
    <h2>Contact With Us</h2>
    <p>
        Phone:  <a href="tel:+8801857126452">01857126452</a>
    </p> 

    <p>
        Address: <a href="#">House-39,Road-10,Sector-10,Uttara,Dhaka</a>
    </p>

    <p>
        Email: <a href="mailto:webmaster@example.com">webmaster@example.com</a>
    </p>

   <p class="text-danger">
       We always promising for better customer services.We belive customer is the king.
   </p>

  </div>
</div>


  @stop