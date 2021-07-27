@extends('front.master')


@section('css')

<style>
  #again_verify_otp {
    visibility: hidden;
  }
</style>

@stop


@section('js')

<script type="text/javascript">
  $(window).on('load', function() {
      $('#myModal').modal('show');
  });
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
     
 


      {{--  <div class="modal hide fade" id="myModal">  --}}
        <div id="myModal" class="modal fade">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title">Verify Your Otp</h5>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                      <p><small id="phoneHelp" class="form-text text-muted">We send <strong>OTP Code  {{ $data->phone }} </strong> Number,Pls Check</small></p>
                      <form method="POST" action="{{ route('otp_verifier_check' ) }}"    >
                        @csrf
                          <div class="form-group">
                            <input type="tel" id="otp_code" name="otp_code" pattern="[0-9]{4}"    class="form-control"  aria-describedby="otp_codeHelp" placeholder="OTP Code" required>
                          </div>
                          <button type="submit" class="btn btn-primary">Verify Otp</button>
                      </form>
                  </div>
              </div>
          </div>
      </div>

      <button type="button" class="btn btn-primary" id="again_verify_otp" data-toggle="modal" data-target="#myModal">Verify Your Otp</button>

                     {{--  Model Body End   --}}
     

  </div>
  <div class="col-md-6">
    {{--  <img class="card-img-top" src="{{ url('/images/'.$data['mobiler_category_product']->image) }}"  alt="Single Product Design">  --}}

  </div>
</div>


<script>

  $("#myModal").on('hide.bs.modal', function(){
    $("#again_verify_otp").css("visibility", "visible");
    {{--  alert("Hello");  --}}
    
  });

  $("#again_verify_otp").click(function(){
    $("#again_verify_otp").css("visibility", "hidden");

  });


{{--    
function check_otp_value(){

  var actual_otp_value = document.getElementById('sended_otp_code').value;

  var inserted_otp_value =  document.getElementById('otp_code').value;

  console.log(actual_otp_value);

  console.log(inserted_otp_value);
  
  if(actual_otp_value != inserted_otp_value){

    alert("Please Enter Write OTP Code.Check your Phone Number Pls");

  }


}

  
function check_otp_value_form(){

  var actual_otp_value = document.getElementById('sended_otp_code').value;

  var inserted_otp_value =  document.getElementById('otp_code').value;

  console.log(actual_otp_value);

  console.log(inserted_otp_value);
  
  if(actual_otp_value != inserted_otp_value){

    alert("Please Enter Write OTP Code.Check your Phone Number Pls");
    event.preventDefault();

  }


}  --}}



</script>
  @stop