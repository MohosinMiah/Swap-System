@extends('front.master')



@section('slider')

<div class="row">
  <div class="col-md-12" >
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="{{ url('/images/slider_one.jpg')}}" alt="First slide" height="600">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="{{ url('/images/slider_two.jpg')}}" alt="Second slide" height="600">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="{{ url('/images/slider_three.jpg')}}" alt="Third slide" height="600">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
</div>

  @stop


@section('hero')
<section class="jumbotron text-center">
    <div class="container">
      <h1 class="jumbotron-heading">SMART PHONE</h1>
      <p class="lead text-muted">SELL YOUR SMART PHONE FOR QUICK CASH.</p>
      <img src="{{ url('/images/apple_fav.PNG') }}" alt="Smart Phone">
    </div>
  </section> 
@stop



@section('main')
<div class="row">
 

  @foreach ($data['categories'] as $category)

    <div class="col-md-4">
      <div class="card mb-4 box-shadow">
        <a href="{{ route('single_category',Str::slug($category->name)) }}" > <img class="card-img-top" src="{{ url('/images/'.$category->image) }}" alt="{{ $category->name }}"> </a>
        <div class="card-body">
          <p class="card-text">{{ $category->name }}</p>
         
        </div>
      </div>
    </div>
   
    @endforeach


  @stop