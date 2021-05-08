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

  
  var ram_rom_id =0;
  var sim_id =0;

  $('.variant-link-ram-rom').click(function(){
    ram_rom_id = this.id;
    console.log("RAM ROM = "+ ram_rom_id);

});
   

  $('.variant-link-sim').click(function(){
  sim_id = this.id;
  console.log("SIM = "+ sim_id);

});

$('#get_exact_value').click(function(){
console.log("Get Exact Value");
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

    @endif

  <br>
  
  @if (!empty($data['mobiler_category_product']->sim))

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
    <script>
      var res = "success";
   </script>
   <?php
      $name = "<script>document.writeln(res);</script>";
   ?>
    <br>
    <br>
    <a class="btn btn-primary" id="get_exact_value" href="{{ route('single_product_get_value',[Str::slug($data['category_name']),Str::slug($name),Str::slug($data['mobiler_category_product']->mobile_model)]) }}" style="position: absolute;display:block;margin-top:20px;">Get Value</a>


    </div>

    <div class="col-md-6">
      <img class="card-img-top" src="{{ url('/images/'.$data['mobiler_category_product']->image) }}"  alt="Single Product Design">

    </div>

  </div>
</div>


  @stop