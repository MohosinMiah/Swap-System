 
@extends('dashboard.index')

@section('title') Mobile Category Latest Order @stop

@section("header_style")

    <style type="text/css">
      .label {
        display: inline-block;
        padding: .25em .4em;
        background-color: #dddfeb;
        font-weight: 700;
        line-height: 1;
        color: #2c95ad;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: .25rem;
       
    }
  </style>
  

@stop 



@section('main_body')
 
 <!-- Main Content -->
 <div id="content">

    <!-- Topbar -->
    
    {{--  Include Toolbar   --}}

    @include('dashboard.include.toolbar')

  <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">



         {{-- Display Error Message  --}}
         <div class="row">
            <div class="col-md-12">
        
               {{-- Display Error Message  --}}
              @include('admin.error.error')
            
            </div>
          </div>
          

        <div class="row">
            <div class="col-md-12">

             <table id="example" class="display">
              <thead>
                  <tr>
                      <th>ID</th>
                      <th>Model Name</th>
                      <thCustomer Num.</th>
                      <th>Date</th>
                      <th>Brand</th>
                      <th>Date</th>
                      <th>Status</th>
                      <th>Short Description</th>
                      <th>Product Image</th>
                      <th> Action </th>
                  </tr>
              </thead>
              <tbody>
                 @foreach ($data['mobile_category_latest_orders'] as $mobile_orders)
                
                 <?php 
                 $product = DB::table('mobile_categories')->where('id',$mobile_orders->product_id)->first();
                 $brand = DB::table('brands')->where('id',$product->brand_id)->first();
                 
                 $class_name = "#e645251a";
                 $status = "New";
                 switch ($mobile_orders->status) {

                  case 1:
                      $class_name = "#afb7c329";
                      $status = "Working";

                      break;
                  
                  case 2:
                      $status = "Done";
                      $class_name = "#00800042";
                      break;
                      
                  case 3:
                      $status = "Canceled";
                      $class_name = "#c3ba110a";
                      break;
                  
                  default:
                  $status = "New";
                  $class_name = "#e645251a";
                      break;

               }

                 ?>
                
                  <tr style="background-color: {{  $class_name }}">
                     <td>{{$mobile_orders->id}}</td>
                     <td>
                       <a href="{{route('admin.mobile_order_details',$mobile_orders->id)}}" class="text-success" target="__blank" data-toggle="tooltip" data-placement="top" title="Product Details"> {{ $product->mobile_model }}</a>
                      </td>
                      <td>{{ $mobile_orders->phone_number }}</td>
                      <td>{{ $brand->name }}</td>
                      <td>
                        <?php 
                        $mytime = Carbon\Carbon::now();
                        $start = date('Y-m-d',strtotime($mobile_orders->created_at));
                        $end = strtotime(date('Y-m-d'));

                        ?>
                      {{ "(Y-M-D)"}}
                      <br>
                        {{date('Y-m-d',strtotime($mobile_orders->created_at)) }}
                      
                      </td>
                      <td>{{ $status }}</td>
                      <td>
                      <?php 
                      $ram_rom_array = explode(',', $product->ram_rom);
                      $sim_array = explode(',', $product->sim);

                      $specificationcamera_array = explode(',',$product->specificationcamera);
                      $specificationprocessor_array = explode(',',$product->specificationprocessor);
                      ?>
                      <h5>Variant</h5>
                      <p>RAM | ROM : @foreach ($ram_rom_array as $ram_rom )
                        <span class="label">{{ $ram_rom }} </span>
                      @endforeach</p>
                      <p>SIM : @foreach ($sim_array as $sim )
                        <span class="label"> {{ $sim }} </span>
                      @endforeach</p>
                      <hr>
                      <h5>Specifications</h5>
                      <p>Camera : @foreach ($specificationcamera_array as $specificationcamera )
                        <span class="label"> {{ $specificationcamera }} </span>
                      @endforeach</p>
                      <p>Processor : @foreach ($specificationprocessor_array as $specificationprocessor )
                        <span class="label"> {{ $specificationprocessor }} </span>
                      @endforeach</
                    </td>
                     <td>
                      <img src="{{url('/images/'.$product->image)}}" alt="{{ $product->mobile_model }}" width="320" height="250">
                     </td>
                     <td>
       
                     <form action="{{ route('admin.generic_update_order_status') }}" method="POST">
                       @csrf
                      <select name="order_status_value" class="form-select"  aria-label="Default select example" required>
                        <option value="0">ACTION</option>
                        <option value="1" class="text-info" @if ($mobile_orders->status == 1) selected @endif>Processing</option>
                        <option value="2" class="text-success" @if ($mobile_orders->status == 2) selected @endif>Success</option>
                        <option value="3" class="text-danger" @if ($mobile_orders->status == 3) selected @endif>Cancel</option>
                      </select>
                      <input type="hidden" name="order_id" value="{{ $mobile_orders->id}}">
                      <input type="hidden" name="phone_number" value="{{ $mobile_orders->phone_number }}">
                      <button type="submit" id="update_order_status" >Update</button>

                     </form>
                      </td>
                  </tr>
               <span style="margin-top: 5px"></span>
                    @endforeach 
             
              </tbody>
              <tfoot>
                <tr>
                      <th>ID</th>
                      <th>Model Name</th>
                      <thCustomer Num.</th>
                      <th>Date</th>
                      <th>Brand</th>
                      <th>Date</th>
                      <th>Status</th>
                      <th>Short Description</th>
                      <th>Product Image</th>
                      <th> Action </th>
              </tr>
              </tfoot>
          </table>
            </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->



 @stop
 