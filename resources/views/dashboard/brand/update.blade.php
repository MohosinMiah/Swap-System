 
@extends('dashboard.index')

@section('title') Add Customer @stop


@section('main_body')
 
 <!-- Main Content -->
 <div id="content">

    <!-- Topbar -->
    {{--  Include Toolbar   --}}

    @include('dashboard.include.toolbar')


  <!-- End of Topbar -->
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">



         {{-- Display Error Message  --}}
         <div class="row">
            <div class="col-md-12">
        
               {{-- Display Error Message  --}}
              @include('seller.error.error')
            
            </div>
          </div>
          

        <div class="row">

        <div class="col-md-2"></div>
        <div class="col-md-8">

          <h2 class="text-center">Update Brand</h2>
                  <!-- Content Row -->
                  <?php 
                  $brand = $data['brand'];
                  ?>
            <div class="card">
                <div class="card-body">
                   
                <form method="POST" action="{{ route('admin.brand_update',$brand->id)}}" enctype="multipart/form-data">
                 @csrf


                 <div class="form-group">
                  <label for="name">brand Name *</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{ $brand->name }}" required>
                </div>


                <div class="form-group">
                  <label for="category">Category *</label>
                  <select class="form-control" id="category" name="category_id">
                         <?php 

                         ?>
                       @foreach ($data['categories'] as $category )
                         
                    <option value="{{ $category->id}}" @if($category->id == $brand->category_id) selected @endif>{{ $category->name }}</option>

                    @endforeach
                    
           
                  </select>
                </div>


                <div class="form-group">
                  <label for="name">brand Image *</label>
                  <input type="file" class="form-control" id="image" name="image" >

                  <img src="{{url('/images/'.$brand->image)}}" alt="{{ $brand->image }}" width="200" height="200">
                </div>



                <button type="submit" class="btn btn-primary">Update brand</button>
             
              </form>
              <br>
              <a class="btn btn-primary" href="{{ route('admin.brand_all') }}">Back To List</a>

       
            </div>
        </div>
    </div>
        </div>
  
        <div class="col-md-2">

        </div>

    

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->



 @stop
 