@extends('front.master')


@section('css')

<style>
  .short_note_style{
    width: 85%;
  }
</style>

@stop


@section('js')

<script>
  $(document).ready(function(){

   
    var two_extra = false;
    var three_extra = false;
    var four_extra = false;

$('#two').click(function(){

  two_extra = !two_extra; 
  if(two_extra){
    $('#two_short_note').css('display','');

  }else{
    $('#two_short_note').css('display','none');

  }

});



$('#three').click(function(){

  three_extra = !three_extra; 
  if(three_extra){
    $('#three_short_note').css('display','');

  }else{
    $('#three_short_note').css('display','none');

  }
  
});


$('#four').click(function(){

  four_extra = !four_extra; 
  if(four_extra){
    $('#four_short_note').css('display','');

  }else{
    $('#four_short_note').css('display','none');

  }
  
});










   
});
</script>




@stop



@section('hero')
<section class="jumbotron text-center">
    <div class="container">
      <h1 class="jumbotron-heading">{{ $data['mobiler_category_product']->mobile_model }}</h1>
      
    </div>
  </section> 
@stop



@section('main')
<div class="row">
 
  <div class="col-md-6">

    @include('front.error.error')
      {{--  Model Body Start  --}}
      <form method="POST" action="{{ route('mobile_order_success' ) }}">
        @csrf
 
        <input type="hidden" name="temporary_order_id" value="{{ $data['temporary_order_id'] }}" >
        <input type="hidden" name="phone_number" value="{{ $data['phone_number'] }}" >
        <input type="hidden" name="product_id" value="{{ $data['mobiler_category_product']->id }}" >
        <input type="hidden" name="category_type" value="mobile_category" >
        <input type="hidden" name="sended_otp_code" id="sended_otp_code" value="{{ $data['sended_otp_code'] }}">

        <div class="form-group">
          <label for="otp_code">OTP Code</label>
          <input type="tel" id="otp_code" name="otp_code" pattern="[0-9]{4}"  onchange="check_otp_value()"  class="form-control"  aria-describedby="otp_codeHelp" placeholder="OTP Code">
          <small id="phoneHelp" class="form-text text-muted">We send <strong>OTP Code  {{ $data['phone_number'] }} </strong> Number,Pls Check</small>
        </div>

        <div class="form-check form-switch">
          <input class="form-check-input" type="checkbox" name="one" id="one" value="Yes">
          <label class="form-check-label" for="one">ফোনের সাথে IEMI matched বক্স এবং চার্জার আছে? </label>
        </div>

        <div class="form-check form-switch">
          <input class="form-check-input" type="checkbox" id="two" name="two" value="Yes">
          <label class="form-check-label" for="two">ফোনে কোন প্রকার দাগ অথবা কোন ডেন্ট আছে? </label>
          <br>
          <label for="two_short_note">Short Note</label>

          <input type="text" id="two_short_note" name="two_short_note" class="short_note_style" style="display: none">
        </div>

        <div class="form-check form-switch">
          <input class="form-check-input" type="checkbox" id="three" value="Yes">
          <label class="form-check-label" for="three">ফোনের কোন পার্টস চেঞ্জ করা হয়েছে অথবা খোলা হয়েছে? </label>
          <br>
          <label for="three_short_note">Short Note</label>

          <input type="text" id="three_short_note" name="three_short_note" class="short_note_style" style="display: none">

        </div>

        <div class="form-check form-switch">
          <input class="form-check-input" type="checkbox" id="four">
          <label class="form-check-label" for="four">ফোনে কোন ধরনের সমস্যা আছে? (নেটওয়ার্ক সিগ্যানাল এবং হ্যার্ডওয়্যার)  </label>
          <br>
          <label for="four_short_note">Short Note</label>

          <input type="text" id="four_short_note" name="four_short_note"  class="short_note_style" style="display: none">

        </div>

  	
      <br>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
     
                     {{--  Model Body End   --}}
     

  </div>
  <div class="col-md-6">
    <img class="card-img-top" src="{{ url('/images/'.$data['mobiler_category_product']->image) }}"  alt="Single Product Design">

  </div>
</div>


<script>
  
function check_otp_value(){
  var actual_otp_value = document.getElementById('sended_otp_code').value;
  var inserted_otp_value =  document.getElementById('otp_code').value;


  console.log(actual_otp_value);
  console.log(inserted_otp_value);
  
  if(actual_otp_value != inserted_otp_value){
    alert("Please Enter Write OTP Code.Check your Phone Number Pls");

  }

}

</script>
  @stop