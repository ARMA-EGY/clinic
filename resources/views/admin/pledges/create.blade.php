@extends('layouts.master')

@section('style')
<!-- DATATABLE CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
@endsection

@section('content')


    <!-- Header -->
    <div class="header bg-gradient-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">

            <div class="col-lg-12 text-left">
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('master.DASHBOARD')}}</a></li>
                  <li class="breadcrumb-item"><a href="{{route('pledges.index')}}">{{__('master.PLEDGES')}}</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{  __('master.ADD-NEW-PLEDGE') }}</li>
                </ol>
              </nav>
            </div>
            
          </div>
        </div>
      </div>
    </div>
    <!-- End: Header -->


    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-12">
            <div class="card card-defualt">
                <div class="card-header">{{__('master.ADD-NEW-PLEDGE')}} </div>
        
                <div class="card-body">
                    <form class="pledge_form" data-url="{{ route('pledges.store') }}" enctype="multipart/form-data">
                        @csrf

                        <!--=================  PATIENT  =================-->
                        <div class="row">
                            <h3 class="text-left"><i class="fa fa-info-circle"></i> {{__('master.PATIENT-INFORMATION')}}</h3>
            
                            <div class="col-12 text-right">
                                <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#patientsModal"> {{__('master.SELECT-PATIENT')}}</a>
                            </div>

                            <div id="patient_info" class="py-4">

                                <div class="table-responsive rounded">
                                    <table class="table align-items-center table-dark table-flush">
                                        <thead class="thead-dark">
                                        <tr>
                                            <th scope="col" class="sort" >{{__('master.NAME')}}</th>
                                            <th scope="col" class="sort" >{{__('master.PHONE')}}</th>
                                            <th scope="col" class="sort" >{{__('master.AGE')}}</th>
                                            <th scope="col" class="sort" >{{__('master.GENDER')}}</th>
                                            <th scope="col" class="sort" >{{__('master.NATIONALITY')}}</th> 
                                        </tr>
                                        </thead>
                                        <tbody class="list">
                                            <tr class="parent">
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                            </tr>
                                            <input type="hidden" name="patient_id" id="patient_id" required>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <hr class="my-3">

                        <!--=================  FILE NAME  =================-->
                        <div class="row">
                            <div class="form-group col-md-12 mb-4 text-left">
                                <h3 class="text-left"><i class="fas fa-file-contract"></i> {{__('master.PLEDGE-FILE')}}</h3>
                                <select name="file_id" class="form-control" required>
                                    @foreach ($files as $file)
                                        <option value="{{$file->id}}">{{$file->name}}</option>
                                    @endforeach
                                        
                                </select>
            
                            </div>
                        </div>
                        <hr class="my-3">
                        

                        <div class="form-group text-right">
                        <button type="submit" class="btn btn-success btn-sm submit">{{__('master.CREATEE')}}</button>
                        </div>
        
                    </form>
                </div>
                <div class="card-footer text-center" id="card-footer"></div>
        
            </div>
        </div>
      </div>
      <!-- Footer -->
      <footer class="footer pt-0">
      </footer>
    </div>

    <!-- All Patients Modal -->
    <div class="modal" id="patientsModal" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">{{__('master.ALL-PATIENTS')}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              
              <div class="col-xl-12">
                  <div class="card">
                  <div class="card-header border-0">
                      <div class="row align-items-center">
                      <div class="col">
                          <h3 class="mb-0">{{__('master.ALL-PATIENTS')}} <span class="badge badge-primary p-2">{{$patients_count}}</span></h3>
                      </div>
                      </div>
                  </div>
      
                  @if ($patients->count() > 0)
      
                      <div class="table-responsive">
                          <!-- Projects table -->
                          <table class="table align-items-center table-flush display nowrap" id="example">
                          <thead class="thead-light">
                              <tr>
                              <th scope="col">#</th>
                              <th scope="col" class="sort" >{{__('master.NAME')}}</th>
                              <th scope="col" class="sort" >{{__('master.PHONE')}}</th>  
                              <th scope="col" class="sort" >{{__('master.APPOINTMENTS')}}</th>                   
                              <th scope="col"></th>
                              </tr>
                          </thead>
                          <tbody class="sortable">
          
                              @foreach ($patients as $patient)
          
                              <tr class="parent">
                              <td>{{ $loop->iteration }}</td>
                              <td><b> {{  $patient->name }} </b></td>
                              <td>{{ $patient->phone }}</td>
                              <td>{{ $patient->appointment()->count() }}</td>
                              <td>
                                  <button class="btn btn-primary btn-sm mx-1 select_patient" data-id="{{ $patient->id }}" @if ($patient->appointment()->count() == 0) disabled @endif> {{__('master.SELECT')}}  </button>
                              </td>
                              </tr>
          
                              @endforeach
                          
                          </tbody>
                          </table>
                      </div>
  
                  @else 
                      <p class="text-center"> {{__('master.NO-PATIENTS-AVAILABLE')}} </p>
                  @endif
      
                  <!-- Card footer -->
                  <div class="card-footer py-2">
                  </div>
      
                  </div>
              </div>
  
          </div>
  
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('master.CANCEL')}}</button>
          </div>
        </div>
      </div>
    </div>

@endsection


@section('script')

<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

  <script>

    $('#example').DataTable( {
        "pagingType": "numbers"
      } );

      $(document).on("click",".select_patient", function()
        {
            var id 	  = $(this).attr('data-id');
            $.ajax({
                    url: "{{route('patient-info-table')}}",
                    type:"POST",
                    dataType: 'text',
                    data:    {id:id},
                    success : function(response)
                        {
                            $('.modal').modal('hide');
                            $('#patient_info').html(response);
                        }  
                })
        });

      $(document).on("click",".select_patient", function()
        {
            var id 	  = $(this).attr('data-id');
            $.ajax({
                    url: "{{route('appointment-info-table')}}",
                    type:"POST",
                    dataType: 'text',
                    data:    {id:id},
                    success : function(response)
                        {
                            $('#appointment_info').html(response);
                        }  
                })
        });

        // =============  QR Form =============
        $(document).on('submit', '.pledge_form', function(e)
        {
            e.preventDefault();
            let formData = new FormData(this);
            $('.submit').prop('disabled', true);
            var url 	  = $(this).attr('data-url');
            var loader 	= $('#loader2').attr('data-load');
            var head2 	= "{{__('master.OOPS')}}";
            var title2 	= "{{__('master.SOMETHING-WRONG')}}";
            var title3 	= "{{__('master.PATIENT-REQUIRED')}}";

            if($('#patient_id').val() == '')
            {
                Swal.fire(
                        head2,
                        title3,
                        'error'
                        )
                $('.submit').prop('disabled', false);
            }
            else
            {
                $('#card-footer').html(loader);

                $.ajax({
                    url: 		url,
                    method: 	'POST',
                    data: formData,
                    dataType: 	'text',
                    contentType: false,
                    processData: false,
                    success : function(response)
                        {
                            $('.submit').prop('disabled', false);
                            $('#card-footer').html(response);
                        },
                        error : function(reject)
                        {
                            $('.submit').prop('disabled', false);
                            $('#card-footer').html('');

                            var response = $.parseJSON(reject.responseText);
                            $.each(response.errors, function(key, val)
                            {
                                Swal.fire(
                                        head2,
                                        val[0],
                                        'error'
                                        )
                            });
                        }
                    
                    
                });
                
            }
            

        });

    </script>
@endsection
