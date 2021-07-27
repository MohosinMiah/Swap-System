@extends('front.master')


@section('css')

<style>
  
</style>

@stop


@section('js')

<script type="text/javascript">
 
</script>
@stop



@section('hero')
<section class="jumbotron text-center">
    <div class="container">
      {{--  <h1 class="jumbotron-heading">{{ $data['mobiler_category_product']->mobile_model }}</h1>  --}}
      
    </div>
  </section> 
@stop



@section('main')
<div class="row">
 
  <div class="col-md-6">

    @include('front.error.error')
      {{--  Model Body Start  --}}
     
 

      <div class="alert alert-danger">
        <h1>Inserted Otp Code is Wrong.</h1>
        <h2>Would you pls check. Otp Code that sended <strong>{{ $data->phone }}</strong> </h2>
        <a href="{{ route('display_otp_form') }}"  >Back to Insert Again</a>
      </div>
     

  </div>
  <div class="col-md-6">
    {{--  <img class="card-img-top" src="{{ url('/images/'.$data['mobiler_category_product']->image) }}"  alt="Single Product Design">  --}}

  </div>
</div>


<script>



</script>
  @stop