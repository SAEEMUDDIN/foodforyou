@extends('layouts.dashboard_app')

@section('page_title')
{{ ('Paravel | Banner View') }}
@endsection

@section('banner')
active
@endsection

@section('dashboard_content')


  <!-- ########## START: MAIN PANEL ########## -->
   <div class="sl-mainpanel">
     <nav class="breadcrumb sl-breadcrumb">
       <a class="breadcrumb-item" href="{{ url('home') }}">Home</a>
       <span class="breadcrumb-item active">Banner</span>
     </nav>

     <div class="sl-pagebody">
       <div class="sl-page-title">
         <h5>Banner View Page</h5>
         <p>This is a Banner View Page</p>
       </div><!-- sl-page-title -->

       <div class="container-fluid">
         <div class="row">
           <div class="col-md-12">
              <h1 class = "text-center my-3">Banner View Page</h1>

              <div class="btn-group mb-2" role="group" aria-label="Basic example">
                <a href = "{{ route('banner.index') }}" type="button" class="btn btn-success">Add Banner</a>
                <a href = "{{ route('banner.trashall') }}" type="button" class="btn btn-danger">Trash Banner</a>
              </div>


           </div>
         </div>
           <div class="row">
              <div class="col-md-12">
                   <div class="card">
                       <div class="card-header">
                          <h2>Banner View</h2>
                          <hr>
                         {{-- <h4>Total Product : {{ $banners_total }}</h4> --}}
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
                         
                             <table class="table table-dark text-center" id = "data_tables_3">
                               <thead>
                                 <tr>
                                   <th>ID No.</th>
                                   <th>Banner Heading</th>
                                   <th>Banner Description</th>
                                   <th>Banner Button</th>
                                   <th>Button Link</th>
                                   <th>Banner Photo</th>
                                   <th>Action</th>
                                 </tr>
                               </thead>

                               <tbody>
                                 @forelse($banners_all as $banner)
                                 <tr>
                                   <td>{{ $banner->id }}</td>
                                   <td>{{ Str::limit($banner->banner_heading , 10) }}</td>
                                   <td>{{ Str::limit($banner->banner_description , 10) }}</td>
                                   <td>{{ $banner->banner_button }}</td>
                                   <td>{{ $banner->button_link }}</td>
                                   <td>
                                     <img src="{{ asset('uploads/banner_photos') }}/{{ $banner->banner_photo }}" alt="" width="100">
                                   </td>
                                   <td>
                                     <div class="btn-group" role="group" aria-label="Basic example">
                                       <a href = "{{ route('banner.edit' , $banner->id) }}" type="button" class="btn btn-primary">Edit</a>

                                       <a href = "{{ route('trash.banner' , $banner->id) }}" type="button" class="btn btn-warning">Trash</a>

                                     
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
    $('#data_tables_3').DataTable( {
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
    $('#data_tables_4').DataTable( {
        "scrollY":        "400px",
        "scrollCollapse": true,
        "paging":         false
    } );
} );
</script>

@endsection
