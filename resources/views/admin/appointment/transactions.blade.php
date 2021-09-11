@extends('layouts.master')

@section('style')
    
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">

@endsection

@section('content')

    <!-- Header -->
    <div class="header bg-gradient-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">

            <div class="col-lg-6 col-7 text-left">
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('master.DASHBOARD')}}</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{__('master.TRANSACTIONS')}}</li>
                </ol>
              </nav>
            </div>


            @if(session()->has('success'))	
                <div class="alert alert-success alert-dismissible fade show m-auto" role="alert">
                    {{ session()->get('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            @endif

          </div>
        </div>
      </div>
    </div>
    <!-- End: Header -->


    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">{{__('master.ALL-TRANSACTIONS')}} <span class="badge badge-primary p-2">{{$items_count}}</span></h3>
                </div>
              </div>
            </div>

            @if ($items->count() > 0)

            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush display nowrap" id="example">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col" class="sort" >{{__('master.APPOINTMENT-DATE')}}</th>
                    <th scope="col" class="sort" >{{__('master.APPOINTMENT-NUMBER')}}</th>
                    <th scope="col" class="sort" >{{__('master.PATIENT-NAME')}}</th>
                    <th scope="col" class="sort" >{{__('master.SUB-TOTAL')}}</th>
                    <th scope="col" class="sort" >{{__('master.TAX')}}</th>
                    <th scope="col" class="sort" >{{__('master.TAX-PERCENTAGE')}}</th>
                    <th scope="col" class="sort" >{{__('master.TOTAL')}}</th>
                    <th scope="col" class="sort" >{{__('master.PAYMENT-METHOD')}}</th>
                    <th scope="col" class="sort" > </th>
                  </tr>
                </thead>
                <tbody>

                  @foreach ($items as $item)

                  <tr class="parent">
                    <td>{{ $loop->iteration }}</td>
                    <td><strong>{{$item->appointment->appointment_date}} </strong></td>
                    <td><strong>{{ $item->appointment->appointment_number}}</strong></td>
                    <td>{{ $item->Patient->name }} </td>
                    <td>{{ $item->sub_total }}</td>
                    <td>{{ $item->tax }}</td>
                    <td>{{ $item->tax_percentage }} %</td>
                    <td>{{ $item->total }} </td>
                    <td>{{__('master.'.$item->payment_method)}}</td>
                    <td>
                      <a data-toggle="tooltip" data-placement="top" title="{{__('master.DETAILS')}}" href="#" class="btn btn-warning btn-sm mx-1 px-3 get-checkout" data-id="{{$item->appointment_id}}"> <i class="fa fa-tv"></i> </a>
                    </td>
                  </tr>

                  @endforeach
                 
                </tbody>
              </table>
            </div>


            @else 
                <p class="text-center"> {{__('master.NO-ITEMS-AVAILABLE')}} </p>
            @endif

            <!-- Card footer -->
            <div class="card-footer py-2">
            </div>

          </div>
        </div>
      </div>
      <!-- Footer -->
      <footer class="footer pt-0">
      </footer>
    </div>
  

@endsection



@section('script')
   

<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>


<script>

$('#example').DataTable( {
    "pagingType": "numbers"
  } );


  // =============  Get Checkout Data =============
  $('.get-checkout').click(function()
  {
      var id 	        = $(this).attr('data-id');
      var loader 	    = $('#loader2').attr('data-load');

      $('#popup').modal('show');
      $('#modal_body').html(loader);
      
      $.ajax({
          url:"{{route('appointment.checkout')}}",
          type:"POST",
          dataType: 'text',
          data:    {"_token": "{{ csrf_token() }}",
                      id: id},
          success : function(response)
              {
              $('#modal_body').html(response);
              }  
          })

  });

</script>
    
@endsection