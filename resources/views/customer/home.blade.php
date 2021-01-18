@extends('layouts.dashboard_app')
@section('page_title')
    {{ ('Paravel | Customer Dashboard ') }}
@endsection
@section('home')
  active
@endsection

@section('dashboard_content')

 <!-- ########## START: MAIN PANEL ########## -->
  <div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <span class="breadcrumb-item active">Customer Dashboard</span>
    </nav>

    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>Customer Dashboard </h5>
        <p>This is a Customer Dashboard Page</p>

        <h2>
          @if (Auth::user()->role == 1)
            Your Are Admin
          @else
            Your Are Customer
          @endif
        </h2>
      </div><!-- sl-page-title -->

      <div class="container-fluid">
       <div class="row justify-content-center">
         
         <div class="col-lg-12">
          <div class="card">
              <div class="card-header">
                Customer Dashboard
              </div>

              <div class="card-body">
                  @if (session('status'))
                      <div class="alert alert-success" role="alert">
                          {{ session('status') }}
                      </div>
                  @endif

                  <table class="table table-dark">
                    <thead>
                      <tr>
                        <th scope="col">SL No.</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Payment Option</th>
                        <th scope="col">Subtotal</th>
                        <th scope="col">Total</th>
                        <th scope="col">Action</th>

                      </tr>
                    </thead>

                    <tbody>
                      @forelse ($order_info as $order)
                      <tr>
                        <td>{{ $loop->index+1}}</td>
                        <td>{{ Auth::user()->name}}</td>
                        
                        <td>
                          @if ($order->payment_option == 1)
                          Cash On Delivery 
                     @else
                          Creadit Cart 
                     @endif
                        </td>

                      
                        <td>$ {{ $order->sub_total}}</td>
  
                        <td>$ {{ $order->total}}</td>
                      

                        <td>

                          <td>
                         
                            <div class="btn-group" role="group" aria-label="Basic example">

                                @if ($order->payment_status != 2)
                                <form action="{{ route('order.update' , $order->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class = "btn btn-sm btn-success"> Paid </button>
                                </form>  
                                @endif

                                @if ($order->payment_status == 1)
                                 <a href="{{ route('order.cancel',$order->id) }}" class = "btn btn-sm btn-danger"> Cancel </a>
                                @endif

                                
          
                              </div>   
                        </td>

                      </tr>

                      <tr>
                        <td colspan="50">
                          @foreach($order->order_detail as $detail)
                              <p>{{ $detail->product['product_name'] }}</p>
                          @endforeach
                        </td>
                      </tr>

                      @empty

                      <tr>
                        <td colspan="50" class = "text-danger text-center">
                          <h5>Nothing has been bought yet</h5>
                        </td>
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
