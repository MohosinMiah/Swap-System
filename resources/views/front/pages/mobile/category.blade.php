@extends('front.master')



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

  @foreach ($data['brands'] as $brand )
  
  <div class="col-md-4">
    <div class="card mb-4 box-shadow">
      <a href="{{ route('single_brand',[Str::slug($data['category_name']),Str::slug($brand->name)]) }}" > <img class="card-img-top" src="{{ url('/images/'.$brand->image) }}" height="196px" alt="{{ $brand->name }}">  </a>
      <div class="card-body">
        <p class="card-text">{{ $brand->name }}</p>
      
      </div>
    </div>
  </div>

  @endforeach


</div>
  @stop