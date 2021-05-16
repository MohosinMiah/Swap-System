@extends('front.master')

@section('css')


<style>

  .variant-list-ramRom,.specification-list {
    text-decoration: none;
    list-style: none;
  }


  .list-inline-item a,.specification-list-item a {
    text-decoration: none;
    list-style: none;
    color: #212529;
    border: 1px aliceblue;
    border-radius: 10px;
    padding: 10px;
  }


  .specification-list-item {
    border-right: 1px solid #000;
    float:left;
    padding: 4px;

  }


   .specification-list, .variant-list-ramRom,.variant-list-sim {
 
    display: contents;
  }



/* Style the active class*/

    .active {
      background-color: #adafb2;
      opacity: 0.9;
      padding: 6px;

    }
    .sim-active {
      background-color: #adafb2;
      opacity: 0.9;
      padding: 6px;

    }
    {{--  Style Model Design   --}}

    .modal{
      margin-top: 15%;
    }



</style>


@stop




  @section('js')
  
<script>

  // Add active class to the current  RAM  | ROM

  var header = document.getElementById("variant-list-ram-rom");
  var btns = header.getElementsByClassName("variant-link-ram-rom");
  for (var i = 0; i < btns.length; i++) {
    btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");


 


    if (current.length > 0) { 
      current[0].className = current[0].className.replace(" active", "");
    }
    this.className += " active";
    });
  }


  // Add active class to the current  SIM

  var header = document.getElementById("variant-list-sim");


  if(document.getElementsByClassName("variant-link-sim") != null) { 

  var btns = header.getElementsByClassName("variant-link-sim");
  for (var i = 0; i < btns.length; i++) {
    btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("sim-active");
    if (current.length > 0) { 
      current[0].className = current[0].className.replace(" sim-active", "");
    }
    this.className += " sim-active";
    });
  }

}


  
  var ram_rom_id =null;
  var sim_id =null;

  $('.variant-link-ram-rom').click(function(){
    ram_rom_id = this.id;
    console.log("RAM ROM = "+ ram_rom_id);

});
   

  $('.variant-link-sim').click(function(){
    sim_id = this.id;
  console.log("SIM = "+ sim_id);

});






{{--  $(document).ready(function () {
  $("ul[id*=variant-list-sim] li").click(function () {
    sim_value =  $(this).text(); // gets text contents of clicked li
  });
});  --}}


{{--  console.log(sim_value);  --}}



  
  </script>



  @stop



@section('hero')
<section class="jumbotron text-center">
    <div class="container">
      <h1 class="jumbotron-heading">Apple iPhone XS Max</h1>
     
    </div>
  </section> 
@stop



@section('main')

<div class="container">
  <div class="row">

    <div class="col-md-6">
      <h1>{{ $data['mobiler_category_product']->mobile_model }}</h1>
      {{--  Chose a Varient ****************************  --}}
      <h2>Choose a variant</h2>

      @if (!empty($data['mobiler_category_product']->ram_rom))
        <input type="hidden" id="has_ram_rom" value="1" >
      <div class="ram_rom">
        <p>RAM | ROM </p>
        <ul class="variant-list-ramRom" id="variant-list-ram-rom">

          <?php $ram_rom_key = 0; ?>

           @foreach (explode(',', $data['mobiler_category_product']->ram_rom); as $ram_rom)
             
          <li class="list-inline-item" >
              <a class="variant-link-ram-rom" href="JavaScript:void(0)" id="{{ $ram_rom_key }}" value="{{  $ram_rom_key  }}" >
                   {{ $ram_rom }}
              </a>
          </li>
          <?php $ram_rom_key++; ?>

          @endforeach
        </ul>
      </div>

      
      @else   

      <ul class="variant-list-ramRom" id="variant-list-ram-rom">
        <span class="variant-link-ram-rom"></span>
        <span class="variant-link-ram-rom"></span>

    </ul>
          <input type="hidden" id="has_sim" value="0" >

      @endif


  <br>
  
  @if (!empty($data['mobiler_category_product']->sim))
  <input type="hidden" id="has_sim" value="1" >
      <div class="sim">
        <p> SIM </p>
        <ul class="variant-list-sim" id="variant-list-sim">

          <?php $sim_key = 0; ?>

           @foreach (explode(',', $data['mobiler_category_product']->sim); as $sim)
             
          
          <li class="list-inline-item">
              <a class="variant-link-sim" href="JavaScript:void(0)" id="{{ $sim_key }}">
                   {{ $sim }}
              </a>
          </li>

          <?php $sim_key++; ?>

          @endforeach
        </ul>
      </div>

     @else   
     <ul class="variant-list-sim" id="variant-list-sim">
      <span class="variant-link-sim"></span>
      <span class="variant-link-sim"></span>
     </ul>
        <input type="hidden" id="has_sim" value="0" >

      @endif
 

<br>
     
    {{--  Specification *****************************  --}}
    <h2>Specifications</h2>
    <ul class="specification-list">

      @if (!empty($data['mobiler_category_product']->specificationram_rom))
      <li class="specification-list-item" >
        <span class="specific-option">RAM | ROM</span>
        <br>
        <span class="specific-content">{{ $data['mobiler_category_product']->specificationram_rom }}</span>
      </li>
      @endif


      
      @if (!empty($data['mobiler_category_product']->specificationsim))
      <li class="specification-list-item" >
        <span class="specific-option">SIM</span>
        <br>
        <span class="specific-content">{{ $data['mobiler_category_product']->specificationsim }}</span>
      </li>
      @endif

      
      @if (!empty($data['mobiler_category_product']->specificationcamera))
      <li class="specification-list-item" >
        <span class="specific-option">Camera</span>
        <br>
        <span class="specific-content">{{ $data['mobiler_category_product']->specificationcamera }}</span>
      </li>
      @endif


      @if (!empty($data['mobiler_category_product']->specificationprocessor))
      <li class="specification-list-item" >
        <span class="specific-option">Processor</span>
        <br>
        <span class="specific-content">{{ $data['mobiler_category_product']->specificationprocessor }}</span>
      </li>
      @endif

      

      @if (!empty($data['mobiler_category_product']->specificationbattery))
      <li class="specification-list-item" >
        <span class="specific-option">Battery</span>
        <br>
        <span class="specific-content">{{ $data['mobiler_category_product']->specificationbattery }}</span>
      </li>
      @endif


      <li class="specification-list-item" >
        <span class="specific-option">Processor</span>
        <br>
        <span class="specific-content">{{ $data['mobiler_category_product']->specificationprocessor }}</span>
      </li>
    </ul> 

 
    <input type="hidden" id="category_id" value="{{  $data['mobiler_category_product']->category_id }}">
    <input type="hidden" id="brand_id" value="{{  $data['mobiler_category_product']->brand_id }}">
    <input type="hidden" id="product_id" value="{{  $data['mobiler_category_product']->id }}">
    <br>
    <br>
    <a class="btn btn-primary" id="get_estimated_value" style="position: absolute;display:block;margin-top:20px;">Get Value</a>
    {{--  href="{{ route('single_product_get_value',[Str::slug($data['category_name']),Str::slug($data['brand_name']),Str::slug($data['mobiler_category_product']->mobile_model)]) }}"   --}}
    <br>
    <br><br>

    <div id="get_up_to" class="row" style="display: none">
      <div class="col-md-12">
        <h3 id="get_up_to_value"></h3>
      </div>
      <div class="col-md-12">
        {{--  <a class="btn btn-primary" id="get_exact_value" >Get Exact Value</a>  --}}

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#get_exact_value">Get Exact Value</button>

        
        <!-- Modal -->
        <div class="modal fade" id="get_exact_value" tabindex="-1" role="dialog" aria-labelledby="get_exact_valueLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="get_exact_valueLabel">Please enter your phone number</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
               
                 {{--  Model Body Start  --}}
                 <form method="POST" action="{{ route('get_more_info_send_sms',[Str::slug($data['category_name']),Str::slug($data['brand_name']),Str::slug($data['mobiler_category_product']->mobile_model)] ) }}">
                   @csrf
                  <div class="form-group">
                    <label for="phone_number">Phone Number</label>
                    <input type="tel" id="phone_number" name="phone_number" pattern="[0-9]{11}"  class="form-control"  aria-describedby="phoneHelp" placeholder="Phone Number">
                    <small id="phoneHelp" class="form-text text-muted">We ll never share your phone number with anyone else.</small>
                  </div>
                  <input type="hidden" name="get_category_id" value="{{  $data['mobiler_category_product']->category_id }}">
                  <input type="hidden" name="get_brand_id" value="{{  $data['mobiler_category_product']->brand_id }}">
                  <input type="hidden" name="get_product_id" value="{{  $data['mobiler_category_product']->id }}">   
                  <input type="hidden" name="set_ram_rom_id" id="set_ram_rom_id" value="null">   
                  <input type="hidden" name="set_sim_id" id="set_sim_id" value="null">   

                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>

                {{--  Model Body End   --}}

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    </div>

    <div class="col-md-6">
      <img class="card-img-top" src="{{ url('/images/'.$data['mobiler_category_product']->image) }}"  alt="Single Product Design">

    </div>

  </div>
</div>

<!-- End of Main Content -->
<script type="text/javascript">

  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

  $(document).ready(function () {

  $('#get_estimated_value').on('click',function(e) {
        
    

    var get_ram_rom_id = ram_rom_id;
    var get_sim_id = sim_id;

    {{--  Check Varient is exict or not   --}}
    

    var  get_has_ram_rom = document.getElementById('has_ram_rom').value;
    var  get_has_sim = document.getElementById('has_sim').value;


    if(get_has_ram_rom == 1 ){ 
      if(get_ram_rom_id == null){
        all_next_step = false;
        alert("Please Select RAM | ROM ");
      }else{
        all_next_step = true;
        document.getElementById("set_ram_rom_id").value = get_ram_rom_id;

      }
}

    if(get_has_sim == 1 ){ 
      if(get_sim_id == null){ 
        all_next_step = false;
        alert("Please Select SIM ");

      }else{
        all_next_step = true;
        document.getElementById("set_sim_id").value = get_sim_id;

      }
    }
     



       if(all_next_step){ 

    $.ajax({
      url:"{{ route('get_val') }}",
      type:"POST",
      data: {
        _token: '{{csrf_token()}}',
        get_ram_rom_id: get_ram_rom_id,
        get_sim_id  : get_sim_id,
        category_id : document.getElementById('category_id').value,
        brand_id    :  document.getElementById('brand_id').value,
        product_id  :  document.getElementById('product_id').value,
      },
  success:function (data) {
    console.log("RAM | ROM =  "+get_ram_rom_id + " SIM "+ get_sim_id);
    console.log("Product ID =  "+data.product_id + " Category ID "+ data.category_id+ " Brand ID "+data.brand_id);
    console.log("Estimated Value " + data.estimated_value);

    {{--  Remove Get Value Button  ****   --}}
    {{--  $('#get_estimated_value').empty();  --}}
    $('#get_estimated_value').remove();
    {{--  $('#get_exact_value').append("Get Exact Value");  --}}
    $('#get_up_to_value').append('Get Up To '+data.estimated_value+" TK");

 
    $("#get_up_to").css("display", "");

    
  }  })
}

  
  });
  });
  </script>


  @stop