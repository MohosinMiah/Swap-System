@extends('front.master')




@section('hero')
<section class="jumbotron text-center">
    <div class="container">
      <h1 class="jumbotron-heading text-uppercase"> {{ $data['brand_name'] }} </h1>
     
    </div>
  </section> 
@stop



@section('main')
<div class="row">
   
  <div class="col-md-12">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item "><a href="{{ route('single_category',Str::slug($data['category_name'])) }}">{{ Str::slug($data['category_name']) }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ ucfirst($data['brand_name']) }}</li>
      </ol>
    </nav>
    <h2 class="text-center">Select Your Brand</h2>
  
<br>

  </div>
   

  @foreach ($data['products'] as $product)
    

  <div class="col-6 col-sm-6 col-md-2 col-lg-2">
    <div class="card mb-2 box-shadow">
      <a href="{{ route('single_product',[Str::slug($data['category_name']),Str::slug($data['brand_name']),Str::slug($product->mobile_model)]) }}" > <img class="card-img-top" src="{{ url('/images/'.$product->image) }}"  alt="{{ $product->mobile_model }}"> 
      <div class="card-body">
        <p class="card-text">{{ $product->mobile_model }}</p>
      
      </div>
    </a>
    </div>
  </div>

  @endforeach

</div>



  @stop

  