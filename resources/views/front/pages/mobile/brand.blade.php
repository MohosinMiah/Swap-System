@extends('front.master')



@section('hero')
<section class="jumbotron text-center">
    <div class="container">
      <h1 class="jumbotron-heading">Popular Product Name(Ex , Iphone 11)</h1>
      <p>
        <a href="#" class="btn btn-secondary my-2">Exchange Now</a>
      </p>
    </div>
  </section> 
@stop



@section('main')
<div class="row">
 
  @foreach ($data['products'] as $product)
    

  <div class="col-md-4">
    <div class="card mb-4 box-shadow">
      <a href="{{ route('single_product',[Str::slug($data['category_name']),Str::slug($data['brand_name']),Str::slug($product->mobile_model)]) }}" > <img class="card-img-top" src="{{ url('/images/'.$product->image) }}"  alt="{{ $product->mobile_model }}">  </a>
      <div class="card-body">
        <p class="card-text">{{ $product->mobile_model }}</p>
      
      </div>
    </div>
  </div>

  @endforeach

</div>
  @stop