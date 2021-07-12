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

            <div class="col-lg-6 text-left">
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('master.DASHBOARD')}}</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{__('master.ALL-APPOINTMENTS')}}</li>
                </ol>
              </nav>
            </div>

            <div class="col-lg-6 col-5 text-right">
              <a href="{{ route('appointment.create')}}" class="btn btn-sm btn-neutral"><i class="fa fa-plus"></i> {{__('master.CREATEE-NEW-APPOINTMENT')}}</a>
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
                  <h3 class="mb-0">{{__('master.ALL-APPOINTMENTS')}} <span class="badge badge-primary p-2">{{$total_rows}}</span></h3>
                </div>
              </div>
            </div>
              
                <!-- Include Appointments -->
                @include('include._appointments')

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


  // =============  Cancel Appintment =============
  $(document).on('click', '.cancel-appointment', function() {
      
      var item 	= $(this).attr('data-id');
      var url 	= $(this).attr('data-url');

      Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, Cancel it!'
      }).then((result) => {
          if (result.isConfirmed) {
          Swal.fire(
              'Cancelled!',
              'Appointment has been Cancelled.',
              'success'
          )

          $.ajax({
                      url: 		"{{route('appointment.cancel')}}",
                      method: 	'POST',
                      dataType: 	'json',
                      data:		{id: item}	
              });
              
              $(this).prop('disabled', true);
          }
      })
      
  });

</script>
    
@endsection