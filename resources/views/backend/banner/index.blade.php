@extends('layouts.dashboard_app')

@section('page_title')
{{ ('Paravel | Banner Add') }}
@endsection

@section('banner')
active
@endsection

@section('dashboard_content')


  <!-- ########## START: MAIN PANEL ########## -->
   <div class="sl-mainpanel">
     <nav class="breadcrumb sl-breadcrumb">
       <a class="breadcrumb-item" href="{{ url('home') }}">Home</a>
       <span class="breadcrumb-item active">Banner Insert</span>
     </nav>

     <div class="sl-pagebody">
       <div class="sl-page-title">
         <h5>Banner Add Page</h5>
         <p>This is a Banner Add Page</p>
       </div><!-- sl-page-title -->

       <div class="container-fluid">
         <div class="row justify-content-center">
           <div class="col-md-8">
              <h1 class = "text-center my-3">Banner Add Page</h1>

              <div class="btn-group mb-2" role="group" aria-label="Basic example">
                <a href = "{{ route('banner.viewall') }}" type="button" class="btn btn-primary">All Banner</a>
                <a href = "{{ route('banner.trashall') }}" type="button" class="btn btn-danger">Trash Banner</a>
              </div>

           </div>
         </div>
           <div class="row justify-content-center">
             
              <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                       <h2>Banner Add</h2>
                    </div>
                    <div class="card-body">

                      <form method="post" action = "{{ route('banner.store') }}" enctype="multipart/form-data">
                        @csrf

                        @if(session()->has('success_status'))
                          <div class="alert alert-success alert-dismissible fade show" role="alert">
                             {{ session()->get('success_status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        @endif

                        <div class="form-group">
                          <label>Banner Heading</label>
                          <input type="text" class="form-control" placeholder="Banner Heading" name = "banner_heading" value = "{{ old('banner_heading') }}">
                          @error ('banner_heading')
                            <span class = "text-danger">{{ $message }}</span>
                          @enderror
                        </div>

                        <div class="form-group">
                          <label>Banner Description</label>
                          <input type="text" class="form-control" placeholder="Banner Description" name = "banner_description" value = "{{ old('banner_description') }}">
                          @error ('banner_description')
                            <span class = "text-danger">{{ $message }}</span>
                          @enderror
                        </div>

                        <div class="form-group">
                          <label>Banner Button</label>
                          <input type="text" class="form-control" placeholder="Banner Button" name = "banner_button" value = "{{ old('banner_button') }}">
                          @error ('banner_button')
                            <span class = "text-danger">{{ $message }}</span>
                          @enderror
                        </div>

                        <div class="form-group">
                          <label>Button Link</label>
                          <input type="text" class="form-control" placeholder="Button Link" name = "button_link" value = "{{ old('button_link') }}">
                          @error ('button_link')
                            <span class = "text-danger">{{ $message }}</span>
                          @enderror
                        </div>

                        <div class="form-group">
                          <label>Banner Photo</label>
                          <input type="file" class="form-control" name="banner_photo">
                        </div>

                        <button type="submit" class="btn btn-primary">Add Banner</button>
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
