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
                  <li class="breadcrumb-item"><a href="{{route('xrays.index')}}">{{__('master.RAYS')}}</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{ isset($item) ? __('master.EDIT-RAY') : __('master.ADD-NEW-RAYS') }}</li>
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
                <div class="card-header">{{ isset($item) ? __('master.EDIT-RAY') : __('master.ADD-NEW-RAYS') }} </div>
        
                <div class="card-body">
                    <form class="xrays_form" data-url="{{ isset($item) ? route('xrays.update', $item->id) : route('xrays.store')  }}" enctype="multipart/form-data">
                        @csrf

                        @if (isset($item))
                           @method('PUT')
                        @endif

                        <!--=================  X-RAY NAME  =================-->
                        <div class="row">
                            <div class="form-group col-md-12 mb-4 text-left">
                                <label class="font-weight-bold text-uppercase">{{__('master.XRAY-NAME')}}</label>
                                <input type="text" name="name" class="@error('name') is-invalid @enderror form-control" placeholder="{{__('master.XRAY-NAME')}}" value="{{ isset($item) ? $item->name : old('name') }}" required>
                            
                                @error('name')
                                    <div>
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
            
                            </div>
                        </div>
                        <hr class="my-3">

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
                                            @if (isset($item))
                                                <tr class="parent">
                                                    <td><b> {{ $patient->name }} </b></td>
                                                    <td>{{ $patient->phone }}</td>
                                                    <td>{{ $patient->age }}  </td>
                                                    <td>{{__('master.'.$patient->gender )}} </td>
                                                    <td>{{__('nationality.'.$patient->nationality )}} </td>
                                                </tr>
                                                <input type="hidden" name="patient_id" value="{{$patient->id}}">
                                            @else
                                                <tr class="parent">
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <hr class="my-3">

                        <!--=================  APPOINTMENT  =================-->
                        <div class="row">
                            <h3 class="text-left"><i class="fas fa-notes-medical"></i> {{__('master.APPOINTMENT')}}</h3>

                            <div id="appointment_info" class="py-4">
                                
                                <div class="table-responsive rounded">
                                    <table class="table align-items-center table-dark table-flush">
                                        <thead class="thead-dark">
                                        <tr>
                                            <th scope="col" class="sort">#</th>
                                            <th scope="col" class="sort" >{{__('master.APPOINTMENT-DATE')}}</th>
                                            <th scope="col" class="sort" >{{__('master.APPOINTMENT-NUMBER')}}</th>
                                            <th scope="col" class="sort" >{{__('master.DOCTOR-NAME')}}</th>
                                            <th scope="col" class="sort" >{{__('master.BRANCH')}}</th>
                                            <th scope="col" class="sort" >{{__('master.SECTOR')}}</th>
                                            <th scope="col">{{__('master.SELECT')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody class="list">
                                            @if (isset($item))
                                                @foreach ($appointments as $appointment)
                                                    <tr class="parent">
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td><b> {{$appointment->appointment_date}} </b></td>
                                                        <td><b> {{$appointment->appointment_number}} </b></td>
                                                        <td><b> {{$appointment->doctor->name}} </b></td>
                                                        <td><b> {{$appointment->branch->name}} </b></td>
                                                        <td><b> {{$appointment->sector->name}} </b></td>
                                                        <td>
                                                            <div class="form-check"> 
                                                                <input class="form-check-input" type="radio" name="appointment_id" value="{{$appointment->id}}" @if ($appointment->id == $item->appointment_id) checked @endif required>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr class="parent">
                                                    <td></td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <hr class="my-3">

                        <!--=================  IMAGES  =================-->
                        <div class="form-group">
                            <h3 class="text-left"><i class="fas fa-images"></i> {{__('master.IMAGES')}}</h3>

                            <div class="text-right">
                                <a class="btn btn-sm btn-primary text-white add_image"><i class="fa fa-plus"></i> {{__('master.IMAGE')}} </a>
                            </div>

                            <div id="append_images">

                                @if (isset($xray_images))
                                    <div class="row">
                                        @foreach ($xray_images as $xray_image)

                                            <div class="parent col-md-3 text-center m-2">
                                                <div class="row image-card">

                                                    <div class="form-group col-md-12">
                                                        <img src="{{ asset($xray_image->image) }}" class="img-fluid" width="100%" alt="">
                                                    </div>

                                                    <div class="form-group col-md-12 m-auto text-center">
                                                        <a href="{{asset($xray_image->image)}}" target="_blank" class="btn btn-sm btn-warning text-white"><i class="fa fa-eye "></i></a>
                                                        <a class="btn btn-sm btn-danger remove_item text-white" data-id="{{$xray_image->id}}" data-url="{{route('remove-xray-image')}}"><i class="fa fa-trash "></i></a>
                                                    </div>

                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                @else 

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <input type="file" accept="image/*" class="form-control form-control-sm" name="image[]" required>
                                        </div>
                                    </div>

                                @endif

                            </div>
                        </div>

                        <div class="form-group card-footer">
                        <button type="submit" class="btn btn-success submit">{{ isset($item) ?  __('master.SAVE'):__('master.ADD') }}</button>
                        </div>
        
                    </form>
                </div>
        
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


        $('.add_image').click(function()
        {
            $("#append_images").append('<div class="form-row parent"><div class="form-group col-md-6"><input type="file" accept="image/*" class="form-control form-control-sm" name="image[]" required></div> <div class="form-group col-md-2 m-auto"><a class="btn btn-sm btn-danger remove text-white"><i class="fa fa-trash "></i></a></div></div>');
        });

        $(document).on("click",".remove", function()
        {
            $(this).parents('.parent').remove();
        });

        // =============  Xray Form =============
        $(document).on('submit', '.xrays_form', function(e)
        {
            e.preventDefault();
            let formData = new FormData(this);
            $('.submit').prop('disabled', true);
            var url 	  = $(this).attr('data-url');
            
            var head1 	= "{{__('master.DONE')}}";
            var title1 	= "{{__('master.XRAYS-FINISHED')}}";
            var head2 	= "{{__('master.OOPS')}}";
            var title2 	= "{{__('master.SOMETHING-WRONG')}}";

            $.ajax({
                url: 		url,
                method: 	'POST',
                data: formData,
                dataType: 	'json',
                contentType: false,
                processData: false,
                success : function(data)
                    {
                        $('.submit').prop('disabled', false);
                        
                        if (data['status'] == 'true')
                        {
                            Swal.fire(
                                    head1,
                                    title1,
                                    'success'
                                    )
                            $('.modal').modal('hide');
                            window.setTimeout(function() 
                            {
                                window.location.href = "{{route('xrays.index')}}";
                            }, 1000);
                        }
                        else if (data['status'] == 'false')
                        {
                            Swal.fire(
                                    head2,
                                    title2,
                                    'error'
                                    )
                        }
                    },
                    error : function(reject)
                    {
                        $('.submit').prop('disabled', false);

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

        });

    </script>
@endsection
