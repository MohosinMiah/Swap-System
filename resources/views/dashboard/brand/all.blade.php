 
@extends('dashboard.index')

@section('title') Admin @stop


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
                      <th>Name</th>
                      <th>Image</th> 
                      <th> Action </th>
                  </tr>
              </thead>
              <tbody>
                 @foreach ($brands as $brand)
                     
                
                  <tr>
                      <td>{{$brand->id}}</td>
                      <td>{{$brand->category->name}}</td>
                      <td>{{$brand->name}}</td>
                      <td>
                        <img src="{{url('/images/'.$brand->image)}}" alt="{{ $brand->image }}" width="350" height="300">
                      </td>
                      <td>
                        <div class="action">

                          {{-- Check Seller or Not  --}}
                            <a href="{{route('admin.brand_edit',$brand->id)}}"><i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="brand Edit"></i></a>
                            <a href="{{route('admin.brand_show',$brand->id)}}" class="text-success"><i class="fas fa-eye" data-toggle="tooltip" data-placement="top" title=" View"></i></a>
                            <a href="{{ route('admin.brand_destroy',$brand->id) }}" onclick="return confirm('Are You Sure to Delete?')" class="text-warning"><i class="fas fa-trash-alt" data-toggle="tooltip" data-placement="top" title=" Delete"></i></a>
                        </div>
                      </td>
                  </tr>
             
                  @endforeach
             
              </tbody>
              <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Category</th>
                    <th>Name</th>
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
 