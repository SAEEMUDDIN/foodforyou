@extends('layouts.dashboard_app')

@section('page_title')
 {{ ('Paravel | Product Add ') }}
@endsection

@section('product')
 active
@endsection

@section('dashboard_content')
  <!-- ########## START: MAIN PANEL ########## -->
   <div class="sl-mainpanel">
     <nav class="breadcrumb sl-breadcrumb">
       <a class="breadcrumb-item" href="{{ url('home') }}">Home</a>
       <span class="breadcrumb-item active">Product</span>
     </nav>

     <div class="sl-pagebody">
       <div class="sl-page-title">
         <h5>Product Page</h5>
         <p>This is a Product Page</p>
       </div><!-- sl-page-title -->

       <div class="container-fluid">
         <div class="row justify-content-center">
           <div class="col-md-8">
              <h1 class = "text-center my-3">Product Page</h1>

              <div class="btn-group mb-2" role="group" aria-label="Basic example">
                <a href = "{{ route('product.viewall') }}" type="button" class="btn btn-primary">All Product</a>
                <a href = "{{ route('product.trashall') }}" type="button" class="btn btn-danger">Trash Product</a>
              </div>

           </div>

         </div>
           <div class="row justify-content-center">

              <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                       <h2>Product Add</h2>
                    </div>
                    <div class="card-body">

                      <form method="post" action = "{{ route('product.store') }}" enctype="multipart/form-data">
                        @csrf

                        @if(session()->has('success_status'))
                          <div class="alert alert-success alert-dismissible fade show" role="alert">
                             {{ session()->get('success_status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        @endif

                        @if(session()->has('success_message'))
                          <div class="alert alert-success alert-dismissible fade show" role="alert">
                             {{ session()->get('success_message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        @endif


                        <div class="form-group">
                          <label>Product Name</label>
                          <input type="text" class="form-control" placeholder="Product Name" name = "product_name" value = "{{ old('product_name') }}">
                          @error ('product_name')
                            <span class = "text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                        
                        <div class="form-group">
                          <label>Product Price</label>
                          <input type="number" class="form-control" placeholder="Product Price" name = "product_price" value = "{{ old('product_price') }}">
                          @error ('product_price')
                            <span class = "text-danger">{{ $message }}</span>
                          @enderror
                        </div>

                    
                        <div class="form-group">
                          <label>Product Description</label>
                          <textarea name="product_long_description" rows="4" class="form-control" placeholder="Product Long Description">{{ old('product_long_description') }}</textarea>
                          @error ('product_long_description')
                            <span class = "text-danger">{{ $message }}</span>
                          @enderror
                        </div>

                        <div class="form-group">
                          <label>Product Quantity</label>
                          <input type="number" class="form-control" placeholder="Product Quantity" name = "product_quantity" value = "{{ old('product_quantity') }}">
                          @error ('product_quantity')
                            <span class = "text-danger">{{ $message }}</span>
                          @enderror
                        </div>

                        <div class="form-group">
                          <label>Alert Quantity</label>
                          <input type="number" class="form-control" placeholder="Alert Quantity" name = "alert_quantity" value = "{{ old('alert_quantity') }}">
                          @error ('alert_quantity')
                            <span class = "text-danger">{{ $message }}</span>
                          @enderror
                        </div>

                        <div class="form-group">
                          <label>Product Photo</label>
                          <input type="file" class="form-control" name="product_photo">
                        </div>

                        <button type="submit" class="btn btn-primary">Add Product</button>
                      </form>

                    </div>
               </div>
              </div>

           </div>
       </div>

     </div><!-- sl-pagebody -->
   </div><!-- sl-mainpanel -->
  <!-- ########## END: MAIN PANEL ########## -->

@endsection

@section('footer_scripts')

<script>
// $(document).ready(function() {
//     $('#data_tables').DataTable();
// } );
$(document).ready(function() {
    $('#data_tables').DataTable( {
        "scrollY":        "400px",
        "scrollCollapse": true,
        "paging":         false
    } );
} );
</script>

<script>
// $(document).ready(function() {
//     $('#data_tables').DataTable();
// } );
$(document).ready(function() {
    $('#data_tables_2').DataTable( {
        "scrollY":        "400px",
        "scrollCollapse": true,
        "paging":         false
    } );
} );
</script>
@endsection
