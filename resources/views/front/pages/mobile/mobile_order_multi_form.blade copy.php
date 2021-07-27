@extends('front.master')


@section('css')

<style>
  .short_note_style{
    width: 85%;
  }

  #four_short_note {
    display: none;
    width: 90%;
  }
</style>

<style>
 
  body {
    background-color: #f1f1f1;
  }
  
  #regForm {
    {{-- background-color: #ffffff;
    margin: 100px auto;
    font-family: Raleway;
    padding: 40px;
    width: 70%;
    min-width: 300px; --}}
  }
  
  h1 {
    text-align: center;  
  }
  
  input {
    padding: 10px;
    font-size: 17px;
    font-family: Raleway;
    border: 1px solid #aaaaaa;
  }
  
  /* Mark input boxes that gets an error on validation: */
  input.invalid {
    background-color: #ffdddd;
  }
  
  /* Hide all steps by default: */
  .tab {
    display: none;
  }
  
  button {
    background-color: #04AA6D;
    color: #ffffff;
    border: none;
    padding: 10px 20px;
    font-size: 17px;
    font-family: Raleway;
    cursor: pointer;
  }
  
  button:hover {
    opacity: 0.8;
  }
  
  #prevBtn {
    background-color: #bbbbbb;
  }
  
  /* Make circles that indicate the steps of the form: */
  .step {
    height: 15px;
    width: 15px;
    margin: 0 2px;
    background-color: #bbbbbb;
    border: none;  
    border-radius: 50%;
    display: inline-block;
    opacity: 0.5;
  }
  
  .step.active {
    opacity: 1;
  }
  
  /* Mark the steps that are finished and valid: */
  .step.finish {
    background-color: #04AA6D;
  }
  </style>
  
@stop


@section('js')

<script>
  $(document).ready(function(){

   
 
    var four_extra = false;



 

$(function(){

  

  {{--  Question One   --}}
  $('input[name="one"]').click(function(){
    var error = document.getElementById("error_one");
    error.textContent = "";
  
  });


  {{--  Question Two   --}}
  $('input[name="two"]').click(function(){
    var error = document.getElementById("error_two");
    error.textContent = "";
  
  });


  {{--  Question Three   --}}
  $('input[name="three"]').click(function(){
    var error = document.getElementById("error_three");
    error.textContent = "";
  
  });
  

  {{--  Question Four   --}}
  $('input[name="four"]').click(function(){
    var error = document.getElementById("error_four");
    error.textContent = "";
  
    var four_seleceted_value = $("input[name='four']:checked").val();


    if(four_seleceted_value == "YES"){
      document.getElementById("four_short_note").style.display = "block";
      console.log("YES YES ____________");
  
    }else{
      document.getElementById("four_short_note").style.display = "none";
  
    }
    });



  






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





      <form id="regForm" method="POST" action="{{ route('mobile_order_success' ) }}"  enctype="multipart/form-data" onsubmit="check_otp_value_form()">
        @csrf
 
        <input type="hidden" name="phone_number" value="{{ $data['phone_number'] }}" >
        <input type="hidden" name="product_id" value="{{ $data['mobiler_category_product']->id }}" >
        <input type="hidden" name="category_type" value="mobile_category" >
  
      <!-- One "tab" for each step in the form: -->
      <div class="tab">
        <input type="hidden" name="phone_number" value="{{ $data['phone_number'] }}" >
        <input type="hidden" name="product_id" value="{{ $data['mobiler_category_product']->id }}" >
        <input type="hidden" name="category_type" value="mobile_category" >

        
          <h4 class="text-center text-uppercase">Tell Us About Your Phone</h4>

        <div class="form-check form-switch">
          {{-- <input class="form-check-input" type="checkbox" name="one" id="one" value="Yes"> --}}
          <label class="form-check-label" for="one">1) ফোনের সাথে IEMI matched বক্স এবং চার্জার আছে? *</label>
                      <br>
          <label class="radio-inline">
            <input type="radio" name="one" value="YES"> YES
          </label>
          <label class="radio-inline">
            <input type="radio" name="one" value="NO" required> NO
          </label>
          <p id="error_one"></p>


        </div>

        <div class="form-check form-switch">
          {{-- <input class="form-check-input" type="checkbox" id="two" name="two" value="Yes"> --}}
          <label class="form-check-label" for="two">2) ফোনে কোন প্রকার দাগ অথবা কোন ডেন্ট আছে? *</label>
          <br>
          <label class="radio-inline">
            <input type="radio" name="two" value="Screatch" > Screatch
          </label>
          <label class="radio-inline">
            <input type="radio" name="two" value="Dent"> Dent
          </label>
          <label class="radio-inline">
            <input type="radio" name="two" value="NO" required> NO
          </label>
          <p id="error_two"></p>

        </div>

        <div class="form-check form-switch">
          {{-- <input class="form-check-input" type="checkbox" id="three" value="Yes"> --}}
          <label class="form-check-label" for="three">3) ফোনের কোন পার্টস চেঞ্জ করা হয়েছে অথবা খোলা হয়েছে? *</label>
          <br>
          <label class="radio-inline">
            <input type="radio" name="three" value="YES" > YES
          </label>
          <label class="radio-inline">
            <input type="radio" name="three" value="NO" required> NO
          </label>

          <p id="error_three"></p>


        </div>

        <div class="form-check form-switch">
          {{-- <input class="form-check-input" type="checkbox" id="four"> --}}
          <label class="form-check-label" for="four">4) ফোনে কোন ধরনের সমস্যা আছে? (নেটওয়ার্ক সিগ্যানাল এবং হ্যার্ডওয়্যার)  *</label>
          <br>
          <label class="radio-inline">
            <input type="radio" name="four" value="YES" id="question_four_yes"> YES
          </label>
          <label class="radio-inline">
            <input type="radio" name="four" value="NO" required> NO
          </label>
          <input type="text"  name="network_issue_short_notes" id="four_short_note" class="four_short_note" >
          <p id="error_four"></p>

        </div>


      <div class="row">
        <div class="col-md-12">
          <h4 class="text-center text-uppercase">Mobile Phone Images</h4>
        </div>
        <div class="col-md-6"> 
          <div class="form-check form-switch">
            <label class="form-check-label" for="front_phone_image"> Front Image *</label>
            <br>
              <input type="file" class="form-control" id="front_phone_image" name="front_phone_image" required> 
              <p id="front_image"></p>

          </div>
        </div>
        

        <div class="col-md-6">
          <div class="form-check form-switch">
            <label class="form-check-label" for="back_phone_image"> Back Image *</label>
            <br>
              <input type="file" class="form-control" id="back_phone_image" name="back_phone_image" required> 
              <p id="back_image"></p>

          </div>
        </div>

        
        <div class="col-md-6">
          <div class="form-check form-switch">
            <label class="form-check-label" for="top"> Top Image </label>
            <br>
              <input type="file" class="form-control" name="top" > 
          </div>
        </div>

      <div class="col-md-6">
        <div class="form-check form-switch">
          <label class="form-check-label" for="bottom"> Bottom Image </label>
          <br>
            <input type="file" class="form-control" name="bottom" > 
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-check form-switch">
          <label class="form-check-label" for="left"> Left Image </label>
          <br>
            <input type="file" class="form-control" name="left" > 
        </div>
      </div>


      <div class="col-md-6">
        <div class="form-check form-switch">
          <label class="form-check-label" for="right"> Right Image </label>
          <br>
            <input type="file" class="form-control" name="right" > 
        </div>
      </div>  
      <br>
      </div>
      </div>
      <div class="tab"> 
        <div class="col-md-12">
         <h4 class="text-center text-uppercase">Address</h4>

        </div>
        <div class="form-group">
          <label for="customer_division">  Select Division *</label>
          <select class="form-control" name="customer_division" id="customer_division" required>
            <option value="">Select Your Division</option>
            <option value="Barisal">Barisal</option>
            <option value="Chittagong">Chittagong</option>
            <option  value="Dhaka">Dhaka</option>
            <option value="Khulna">Khulna</option>
            <option value="Mymensingh">Mymensingh</option>
            <option value="Rajshahi">Rajshahi</option>
            <option value="Rangpur">Rangpur</option>
            <option value="Sylhet">Sylhet</option>
          </select>
          <p id="customer_division"></p>

        </div>
    
        <div class="form-group">
          <label for="customer_address">Customer Address *</label>
          <textarea class="form-control" name="customer_address" id="customer_address" rows="3" required></textarea>
          <p id="customer_address"></p>
           <hr>
          <p class="text-center text-danger text-justify">আপনার মোবাইল ফোনের সব কিছু ঠিক থাকলে (বক্স, চার্জার বা অন্য কোনো ধরনের সমস্যা না থাকলে)  প্রথমে যে মূল্য দেখেছেন সে মূল্য পাবেন।
যদি কোন ধরনের সমস্যা থাকে তাহলে আমাদের এজেন্ট আপনার কাছে গিয়ে চেক করে মূল্য নির্ধারণ করবে!এ শর্তে সম্মত হলে পরবর্তী ধাপে যান/সাবমিট করুন/সেল রিকোয়েস্ট রাখুন।</p>
         
           <input type="checkbox" value="agree" name="termandcondition" > I Agree All Terms and Condition
        </div>
      
      </div>
      <br>

      <div style="overflow:auto;">
        <div style="float:right;">
          <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
          <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
        </div>
      </div>
      <!-- Circles which indicates the steps of the form: -->
      <div style="text-align:center;margin-top:40px;">
        <span class="step"></span>
        <span class="step"></span>
        
      </div>
    </form>

    

     
     
                     {{--  Model Body End   --}}
     

  </div>
  <div class="col-md-6">
    <img class="card-img-top" src="{{ url('/images/'.$data['mobiler_category_product']->image) }}"  alt="Single Product Design">

  </div>
</div>


<script>
  var currentTab = 0; // Current tab is set to be the first tab (0)
  showTab(currentTab); // Display the current tab
  
  function showTab(n) {
    // This function will display the specified tab of the form...
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    //... and fix the Previous/Next buttons:
    if (n == 0) {
      document.getElementById("prevBtn").style.display = "none";
    } else {
      document.getElementById("prevBtn").style.display = "inline";
    }
    if (n == (x.length - 1)) {
      document.getElementById("nextBtn").innerHTML = "Submit";
    } else {
      document.getElementById("nextBtn").innerHTML = "Next";
    }
    //... and run a function that will display the correct step indicator:
    fixStepIndicator(n)
  }
  
  function nextPrev(n) {
    // This function will figure out which tab to display
    var x = document.getElementsByClassName("tab");
    // Exit the function if any field in the current tab is invalid:

      {{--  Question One   --}}
    var one_seleceted_value = $("input[name='one']:checked").val();
    console.log(one_seleceted_value);
    if (one_seleceted_value == null){
      var error = document.getElementById("error_one");
      error.textContent = "Please Select. This field is Required";
      error.style.color = "red";
      return false;

    }

    {{--  Question Two   --}}
    var two_seleceted_value = $("input[name='two']:checked").val();
    console.log(two_seleceted_value);
    if (two_seleceted_value == null){
      var error = document.getElementById("error_two");
      error.textContent = "Please Select. This field is Required";
      error.style.color = "red";
      return false;

    }

    {{--  Question Three   --}}
    var three_seleceted_value = $("input[name='three']:checked").val();
    console.log(three_seleceted_value);
    if (three_seleceted_value == null){
      var error = document.getElementById("error_three");
      error.textContent = "Please Select. This field is Required";
      error.style.color = "red";
      return false;

    }

    {{--  Question Four   --}}
    var four_seleceted_value = $("input[name='four']:checked").val();
    console.log(four_seleceted_value);
    if (four_seleceted_value == null){
      var error = document.getElementById("error_four");
      error.textContent = "Please Select. This field is Required";
      error.style.color = "red";
      return false;

    }

    {{--  Front Image   --}}
    var front_phone_image_selected = document.getElementById("front_phone_image");
    if( front_phone_image_selected.files.length == 0 ){
     front_phone_image_selected.style.color = "red";
     return false;
   }

   {{--  Front Image   --}}
   var front_phone_image_selected = document.getElementById("back_phone_image");
   if( front_phone_image_selected.files.length == 0 ){
    front_phone_image_selected.style.color = "red";
    return false;
  }
    
  if (n == 0 && !validateForm()) return false;



  
    // Hide the current tab:
    x[currentTab].style.display = "none";
    // Increase or decrease the current tab by 1:
    currentTab = currentTab + n;
    // if you have reached the end of the form...
    if (currentTab >= x.length) {
      // ... the form gets submitted:
      document.getElementById("regForm").submit();
      return false;
    }
    // Otherwise, display the correct tab:
    showTab(currentTab);
  }
  
  function validateForm() {
    // This function deals with validation of the form fields
    var x, y, i, valid = true;
    x = document.getElementsByClassName("tab");
    y = x[currentTab].getElementsByTagName("input");
    // A loop that checks every input field in the current tab:
    for (i = 0; i < y.length; i++) {
      // If a field is empty...
      if (y[i].value == "") {
        // add an "invalid" class to the field:
        y[i].className += " invalid";
        // and set the current valid status to false
        valid = false;
      }
    }
    // If the valid status is true, mark the step as finished and valid:
    if (valid) {
      document.getElementsByClassName("step")[currentTab].className += " finish";
    }
    return valid; // return the valid status
  }
  
  function fixStepIndicator(n) {
    // This function removes the "active" class of all steps...
    var i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
      x[i].className = x[i].className.replace(" active", "");
    }
    //... and adds the "active" class on the current step:
    x[n].className += " active";
  }

 

 
  
  </script>
  @stop