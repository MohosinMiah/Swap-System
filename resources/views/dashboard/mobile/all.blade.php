 
@extends('dashboard.index')

@section('title') Admin @stop

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
                      <th>Category</th>
                      <th>Brand</th>
                      <th>Model</th>
                      <th>Details</th>
                      <th>Image</th> 
                      <th> Action </th>
                  </tr>
              </thead>
              <tbody>
                 @foreach ($mobileCategories as $mobileCategory)
                     
                
                  <tr>
                      <td>{{$mobileCategory->id}}</td>
                      <td>{{$mobileCategory->category->name}}</td>
                      <td>{{$mobileCategory->brand->name}}</td>
                      <td>{{$mobileCategory->mobile_model}}</td>
                      <td>
                        <?php 
                        $ram_rom_array = explode(',', $mobileCategory->ram_rom);
                        $sim_array = explode(',', $mobileCategory->sim);

                        $specificationcamera_array = explode(',',$mobileCategory->specificationcamera);
                        $specificationprocessor_array = explode(',',$mobileCategory->specificationprocessor);
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
                        <img src="{{url('/images/'.$mobileCategory->image)}}" alt="{{ $mobileCategory->image }}" width="350" height="300">
                      </td>
                      <td>
                        <div class="action">

                          {{-- Check Seller or Not  --}}
                            <a href="{{route('admin.mobileCategory_edit',$mobileCategory->id)}}"><i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="mobileCategory Edit"></i></a>
                            <a href="{{route('admin.mobileCategory_show',$mobileCategory->id)}}" class="text-success"><i class="fas fa-eye" data-toggle="tooltip" data-placement="top" title="Seller View"></i></a>
                            <a href="{{ route('admin.mobileCategory_destroy',$mobileCategory->id) }}" onclick="return confirm('Are You Sure to Delete?')" class="text-warning"><i class="fas fa-trash-alt" data-toggle="tooltip" data-placement="top" title="Seller Delete"></i></a>
                        </div>
                      </td>
                  </tr>
             
                  @endforeach
             
              </tbody>
              <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Category</th>
                  <th>Brand</th>
                  <th>Model</th>
                  <th>Details</th>
                  <th>Image</th> 
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
 