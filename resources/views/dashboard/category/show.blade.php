 
@extends('dashboard.index')

@section('title') View Customer @stop


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
              @include('seller.error.error')
            
            </div>
          </div>
          

        <div class="row">

        <div class="col-md-2"></div>
        <div class="col-md-8">

          <h2 class="text-center">Show Category</h2>
                  <!-- Content Row -->
            <div class="card">
                <div class="card-body">
                   
            <form method="POST">
                @csrf



                <div class="form-group">
                  <label for="name">Category Name *</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" readonly>
                </div>

                <div class="form-group">
                  <label for="name">Category Image *</label>
                  <img src="{{url('/images/'.$category->image)}}" alt="{{ $category->image }}" width="400" height="300">
                </div>



                <a class="btn btn-primary" href="{{ route('admin.category_all') }}">Back To List</a>
            
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
 