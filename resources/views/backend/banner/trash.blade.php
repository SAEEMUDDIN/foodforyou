@extends('layouts.dashboard_app')

@section('page_title')
{{ ('Paravel | Banner Trash') }}
@endsection

@section('banner')
active
@endsection

@section('dashboard_content')


  <!-- ########## START: MAIN PANEL ########## -->
   <div class="sl-mainpanel">
     <nav class="breadcrumb sl-breadcrumb">
       <a class="breadcrumb-item" href="{{ url('home') }}">Home</a>
       <span class="breadcrumb-item active">Banner Trash</span>
     </nav>

     <div class="sl-pagebody">
       <div class="sl-page-title">
         <h5>Banner Trash Page</h5>
         <p>This is a Banner Trash Page</p>
       </div><!-- sl-page-title -->

       <div class="container-fluid">
         <div class="row">
           <div class="col-md-12">
              <h1 class = "text-center my-3">Banner Trash Page</h1>

              <div class="btn-group mb-2" role="group" aria-label="Basic example">
                <a href = "{{ route('banner.index') }}" type="button" class="btn btn-success">Add Banner</a>
                <a href = "{{ route('banner.viewall') }}" type="button" class="btn btn-primary">All Banner</a>
              </div>


           </div>
         </div>
           <div class="row">
             
              <div class="col-md-12">
                   <div class="card">
                       <div class="card-header">
                          <h2>Trash View</h2>
                          <hr>
                         {{-- <h4>Delete Banner : {{ $banner_deleted_total }}</h4> --}}
                       </div>
                       <div class="card-body">
                         @if(session()->has('restore_status'))
                           <div class="alert alert-success alert-dismissible fade show" role="alert">
                              {{ session()->get('restore_status') }}
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                             </button>
                           </div>
                         @endif
                         @if(session()->has('delete_status'))
                           <div class="alert alert-danger alert-dismissible fade show" role="alert">
                              {{ session()->get('delete_status') }}
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                             </button>
                           </div>
                         @endif
                        

                         <form action="{{ route('markrestoredelete') }}" method="post">
                           @csrf
                           <table class="table table-dark" id = "data_tables_4">
                             <thead>
                               <tr>
                                 <th>Mark</th>
                                 <th>SL No.</th>
                                 <th>Banner Heading</th>
                                 <th>Banner Description</th>
                                 <th>Banner Button</th>
                                 <th>Button link</th>
                                 <th>Action</th>
                               </tr>
                             </thead>

                             <tbody>
                               @forelse($banner_deleted as $banner_delete)
                               <tr>
                                 <td>
                                   <input type="checkbox" name="banner_id[]" value="{{ $banner_delete->id }}">
                                 </td>
                                 <td>{{ $loop->index + 1 }}</td>
                                 <td>{{ Str::limit($banner_delete->banner_heading , 10) }}</td>
                                 <td>{{ Str::limit($banner_delete->banner_description , 10) }}</td>
                                 <td>{{ $banner_delete->banner_button }}</td>
                                 <td>{{ $banner_delete->button_link }}</td>
                                 <td>
                                   <img src="{{ asset('uploads/banner_photos') }}/{{ $banner_delete->banner_photo }}" alt="" width="100">
                                 </td>
                                 <td>
                                   <div class="btn-group" role="group" aria-label="Basic example">
                                     <a href="{{ route('bannerrestore' , $banner_delete->id) }}" class="btn btn-success">Restore</a>
                                     <a href="{{ route('bannerdelete' , $banner_delete->id) }}" class="btn btn-danger">Delete</a>
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
