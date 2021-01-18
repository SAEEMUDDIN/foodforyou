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
         <div class="row">
           <div class="col-md-12">
              <h1 class = "text-center my-3">Product Page</h1>

              <div class="btn-group mb-2" role="group" aria-label="Basic example">
                <a href = "{{ route('product.index') }}" type="button" class="btn btn-success">Add Product</a>
                <a href = "{{ route('product.trashall') }}" type="button" class="btn btn-danger">Trash Product</a>
              </div>


           </div>
         </div>
           <div class="row">
              <div class="col-md-12">
                   <div class="card">
                       <div class="card-header">
                          <h2>Product View</h2>
                          <hr>
                         <h4>Total Product : {{ $total_product }}</h4>
                       </div>
                       <div class="card-body">
                         @if(session()->has('trash_status'))
                           <div class="alert alert-warning alert-dismissible fade show text-danger" role="alert">
                              {{ session()->get('trash_status') }}
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                             </button>
                           </div>
                         @endif

                         @if(session()->has('mark_trash'))
                         <div class="alert alert-warning alert-dismissible fade show text-danger" role="alert">
                            {{ session()->get('mark_trash') }}
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                           </button>
                         </div>
                       @endif

                         
                         <form action="{{ route('marktrash') }}" method="POST">
                           @csrf

                          <table class="table table-dark" id = "data_tables">
                            <thead>
                              <tr>

                               <th> 
                                 @if ($product_all->count() > 1)
                                 <input type="checkbox" id="checkall"> 
                                 @endif
                                Mark All
                               </th>

                                <th>SL No.</th>
                                <th>Product Name</th>
                                <th>Product Price</th>
                                <th>P.Q</th>
                                <th>A.Q</th>
                                <th>Product Short Description</th>
                                <th>Product Photo</th>
                                <th>Action</th>
                              </tr>
                            </thead>

                            <tbody>
                              @forelse($product_all as $product)

                              <tr class = " {{ ($product->product_quantity <= $product->alert_quantity) ? 'table-danger' : '' }}">

                                <td>
                                  <input type="checkbox" name="product_id[]" value="{{ $product->id }}" id = "checkItem">
                                </td>

                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ Str::limit($product->product_name , 10) }}</td>
                                
                                <td>{{ $product->product_price }}</td>
                                <td>{{ $product->product_quantity }}</td>
                                <td>{{ $product->alert_quantity }}</td>
                                <td>{{ Str::limit($product->product_short_description , 10) }}</td>
                                <td>
                                  <img src="{{ asset('uploads/product_photos') }}/{{ $product->product_photo }}" alt="" width="100">
                                </td>
                                <td>
                                  <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href = "{{ route('product.edit' , $product->id) }}" type="button" class="btn btn-primary">Edit</a>
                                    <a href = "{{ route('trashproduct' , $product->id) }}" type="button" class="btn btn-warning">Trash</a>
                                  </div>

                                </td>
                              </tr>
                              @empty
                                <tr>
                                  <td class = "text-danger text-center" colspan="50">No Data Available</td>
                                </tr>
                            @endforelse

                            </tbody>
                          </table>

                          @if ($product_all->count() > 1) 
                           <button class="btn btn-danger" type="submit">Trash All</button>
                          @endif
                          
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


<script>
  $("#checkAll").click(function () {
    $('input:checkbox').not(this).prop('checked', this.checked);
  });
  </script>
  
  <script>
  $("#checkall").click(function () {
    $('input:checkbox').not(this).prop('checked', this.checked);
  });
  </script>


@endsection
