 
@extends('dashboard.index')

@section('title') Add New Brand @stop


@section('main_body')
 
 <!-- Main Content -->
 <div id="content">

     {{--  Include Toolbar   --}}
  
     @include('dashboard.include.toolbar')


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

          <h2 class="text-center">Add New Brand</h2>
                  <!-- Content Row -->
            <div class="card">
                <div class="card-body">
                   
            <form method="POST" action="{{ route('admin.brand_create_store')}}" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                  <label for="name">Brand Name *</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Brand Name" required>
                </div>

                <div class="form-group">
                  <label for="category">Category *</label>
                  <select class="form-control" id="category" name="category_id">
                    <option selected>Select Category</option>
                         
                    @foreach ($categories as $category)

                    <option value="{{ $category->id }}">{{ $category->name }}</option>

                    @endforeach
                    
           
                  </select>
                </div>


                <div class="form-group">
                  <label for="name">Brand Image *</label>
                  <input type="file" class="form-control" id="image" name="image"  required>
                </div>




                <button type="submit" class="btn btn-primary">ADD Brand</button>
              </form>

       
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
 