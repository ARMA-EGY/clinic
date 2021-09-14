@extends('layouts.master')

@section('style')
    
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.0.3/css/dataTables.dateTime.min.css">

<style>
  .search_number input
  {
    width: 40px;
  }

  .inside-hidden input
  {
    display: none;
  }
  .nav-tabs 
  {
    border-bottom: 1px solid #7764e4;
  }
  .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active 
  {
    color: #7764e4;
    background-color: #fff;
    border-color: #7764e4 #7665e4 #fff;
  }

</style>

@endsection

@section('content')

    <!-- Header -->
    <div class="header bg-gradient-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">

            <div class="col-lg-12 col-12 text-left">
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">{{__('master.REPORTS')}}</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{__('master.STAFF-ACTIONS')}}</li>
                </ol>
              </nav>
            </div>

          </div>


          <div class="row justify-content-center pb-4">
              <!--=================  Doctor  =================-->
              <div class="form-group col-md-3 mb-2 text-left">
                  <label class="font-weight-bold text-uppercase text-white" >{{__('master.STAFF')}}</label>
                      <select name="user_id" id="user_id" class="form-control form-control-sm">
                        <option value="0">{{__('master.SELECT')}}</option>
                          @foreach ($users as $user)
                              <option value="{{$user->id}}">{{$user->name}}</option>
                          @endforeach
                      </select>
              </div>
          </div>

        </div>
      </div>
    </div>
    <!-- End: Header -->


    <!-- Page content -->
    <div class="container-fluid mt--6">

      <div id="report_content">

      </div>


      <!-- Footer -->
      <footer class="footer pt-0">
      </footer>
    </div>
  

@endsection



@section('script')

<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/datetime/1.0.3/js/dataTables.dateTime.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.20/api/sum().js"></script>

<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

<script>


  $.ajax({
        url: 		"{{route('staff.actions.data')}}",
        method: 	'POST',
        dataType: 	'text',
        data:		  {id: $('#user_id').val()}	,
        success : function(response)
        {
          $('#report_content').html(response);
        }
  });


    $(document).on("change","#doctor_id", function()
    {
        $.ajax({
            url: 		"{{route('staff.actions.data')}}",
            method: 	'POST',
            dataType: 	'text',
            data:		  {id: $('#user_id').val()}	,
            success : function(response)
                {
                  $('#report_content').html(response);
                }
          });
    });

</script>
    
@endsection