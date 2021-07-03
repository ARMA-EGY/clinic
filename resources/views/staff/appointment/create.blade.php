@if (LaravelLocalization::getCurrentLocale() == 'ar')
    @php
    $dir   = 'rtl';
    $text  = 'text-right';
    $inverse_text  = 'text-left';
    $lang  = 'ar';
    @endphp
@elseif (LaravelLocalization::getCurrentLocale() == 'en')  
    @php
    $dir    = 'ltr';
    $text   = '';
    $inverse_text  = 'text-right';
    $lang   = 'en';
    @endphp
@endif

@extends('layouts.admin')

@section('style')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">

<style>

    .box-row 
    {
    display: flex;
    justify-content: space-between;
    width: 100%;
    margin: auto;
    }

    .box-button 
    {
    display: flex;
    align-items: center;
    }

    .box-label 
    {
    text-align: center;
    }

    .box 
    {
    display: flex;
    flex-direction: column;
    flex-grow: 1;
    transition: all 0.3s linear;
    }

    .box-icon 
    {
    width: 48px;
    height: 48px;
    padding: 8px;
    margin-bottom: 8px;
    border-radius: 50%;
    border: 3px solid #ccc;
    color: #000;
    transition: all 0.3s linear;
    }

    .box.active .box-icon
    {
    border: 3px solid #2bbaff;
    }

    .box-tag 
    {
    flex-grow: 1;
    min-width: 20px;
    height: 4px;
    background-color: #ccc;
    transition: all 0.3s linear;
    }

    .box.active .box-tag 
    {
    background-color: #2bbaff;
    }

    .box:first-child .box-tag-left 
    {
    background-color: white;
    }

    .box:last-child .box-tag-right 
    {
    background-color: white;
    }

    @media (max-width: 480px) 
    {
    .box 
    {
        width: 16px;
        height: 16px;
    }

    .box-icon 
    {
        width: unset;
        height: unset; 
        font-size: 10px;
        padding: 5px;
    }

    body 
    {
        font-size: 0.8em;
    }

    }

</style>

@endsection

@section('content')


    <!-- Header -->
    <div class="header bg-gradient-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-12 {{$text}}">
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('admin.DASHBOARD')}}</a></li>
                  <li class="breadcrumb-item"><a href="{{route('appointment.index')}}">{{__('admin.APPOINTMENTS')}}</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{  __('admin.CREATEE-NEW-APPOINTMENT') }}</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 {{$inverse_text}}">
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

                      <div class="card-header">
                        <div class="box-row">

                            <div class="box active">
                                <div class="box-button">
                                    <div class="box-tag box-tag-left"></div>
                                    <div class="box-icon text-center">
                                    <i class="fas fa-clinic-medical"></i>
                                    </div>
                                    <div class="box-tag box-tag-right"></div>
                                </div>
                                <span class="box-label">{{__('admin.BRANCH')}}</span>
                            </div>

                            <div class="box">
                                <div class="box-button">
                                    <div class="box-tag box-tag-left"></div>
                                    <div class="box-icon text-center">
                                    <i class="fas fa-tooth"></i>
                                    </div>
                                    <div class="box-tag box-tag-right"></div>
                                </div>
                                <span class="box-label">{{__('admin.SECTOR')}}</span>
                            </div>

                            <div class="box">
                                <div class="box-button">
                                    <div class="box-tag box-tag-left"></div>
                                    <div class="box-icon text-center">
                                    <i class="fas fa-stethoscope"></i>
                                    </div>
                                    <div class="box-tag box-tag-right"></div>
                                </div>
                                <span class="box-label">{{__('admin.DOCTOR')}}</span>
                            </div>

                            <div class="box">
                                <div class="box-button">
                                    <div class="box-tag box-tag-left"></div>
                                    <div class="box-icon text-center">
                                    <i class="fas fa-notes-medical"></i>
                                    </div>
                                    <div class="box-tag box-tag-right"></div>
                                </div>
                                <span class="box-label">{{__('admin.APPOINTMENT')}}</span>
                            </div>
                            
                        </div>
                      </div>

                      <div class="card-body mt-3 {{$text}}" id="card-body">
                            <label class="font-weight-bold text-uppercase">{{__('admin.SELECT-BRANCH')}}</label>
                            <div class="row justify-content-center">
                                <!--=================  Branches  =================-->

                                @if (isset($branches))
                                
                                    @foreach ($branches as $branch)
                                        
                                        <div class="col-xl-3 col-md-4 col-10">
                                            <div class="card card-defualt choose-card" data-step="1" data-all='{"step":"1", "branch":"{{$branch->id}}"}'>
                                                <div class="card-body px-3">
                                                    <img class="img-fluid px-4" src="{{asset('images/hospital.png')}}" alt="">
                                                    <div class="text-center">
                                                        <h3 class="mt-2">
                                                            <b>{{$branch->name}}</b>
                                                        </h3>
                                                        <div class="my-2">
                                                            <small> <b> <i class="fas fa-tooth"></i> {{__('admin.SECTORS')}} :  {{$branch->sectors()->count()}}  </b> </small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    @endforeach

                                @endif

                            </div>

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
          <h5 class="modal-title">{{__('admin.ALL-PATIENTS')}}</h5>
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
                        <h3 class="mb-0">{{__('admin.ALL-PATIENTS')}} <span class="badge badge-primary p-2">{{$patients_count}}</span></h3>
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
                            <th scope="col" class="sort" >{{__('admin.NAME')}}</th>
                            <th scope="col" class="sort" >{{__('admin.PHONE')}}</th>                   
                            <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="sortable">
        
                            @foreach ($patients as $patient)
        
                            <tr class="parent">
                            <td>{{ $loop->iteration }}</td>
                            <td><b> {{  $patient->name }} </b></td>
                            <td>{{ $patient->phone }}</td>
                            <td>
                                <a class="btn btn-primary btn-sm mx-1 select_patient" data-id="{{ $patient->id }}"> {{__('admin.SELECT')}}  </a>
                            </td>
                            </tr>
        
                            @endforeach
                        
                        </tbody>
                        </table>
                    </div>

                @else 
                    <p class="text-center"> {{__('admin.NO-PATIENTS-AVAILABLE')}} </p>
                @endif
    
                <!-- Card footer -->
                <div class="card-footer py-2">
                </div>
    
                </div>
            </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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

        $(document).on("click",".choose-card", function()
        {
            var loader 	  = $('#loader2').attr('data-load');
            var step 	  = $(this).attr('data-step');
            var all 	  = $(this).attr('data-all');
            var active    = '.box:eq('+step+')';

            var all_objects = JSON.parse(decodeURIComponent(all));

            $(active).addClass('active');
            $('#card-body').html(loader);

            $.ajax({
                    url: "{{route('appointment.next')}}",
                    type:"POST",
                    dataType: 'text',
                    data:    all_objects,
                    success : function(response)
                        {
                            $('#card-body').html(response);
                        }  
                  })
        });

        $(document).on("click",".prev-step", function()
        {
            var loader 	  = $('#loader2').attr('data-load');
            var step 	  = $(this).attr('data-step');
            var all 	  = $(this).attr('data-all');
            var active    = '.box:eq('+step+')';

            var all_objects = JSON.parse(decodeURIComponent(all));

            $(active).removeClass('active');
            $('#card-body').html(loader);

            $.ajax({
                    url: "{{route('appointment.prev')}}",
                    type:"POST",
                    dataType: 'text',
                    data:    all_objects,
                    success : function(response)
                        {
                            $('#card-body').html(response);
                        }  
                })
        });

        $(document).on("click",".available-time", function()
        {
            $(this).addClass('btn-success');
            $(this).siblings().removeClass('btn-success');
            $('#appointment_number').val($(this).attr('data-value'));
        });

        $(document).on("change",".doctor_date", function()
        {
            var date 	  = $(this).val();
            var doctor 	  = $(this).attr('data-doctor');

            $.ajax({
                    url: "{{route('appointment.schedule')}}",
                    type:"POST",
                    dataType: 'text',
                    data:    {date:date, doctor:doctor},
                    success : function(response)
                        {
                            $('#available-schedule').html(response);
                            $('#appointment_number').val('');
                        }  
                })
            
        });

        $(document).on("click",".select_patient", function()
        {
            var id 	  = $(this).attr('data-id');

            $.ajax({
                    url: "{{route('patient-info')}}",
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

        // =============  Appointment Form =============
        $(document).on('submit', '.appointment_form', function(e)
        {
            e.preventDefault();
            let formData = new FormData(this);
            $('.submit').prop('disabled', true);
            
            var head1 	= "{{__('admin.DONE')}}";
            var title1 	= "{{__('admin.APPOINTMENT-FINISHED')}}";
            var head2 	= "{{__('admin.OOPS')}}";
            var title2 	= "{{__('admin.SOMETHING-WRONG')}}";

            $.ajax({
                url: 		"{{route('appointment.store')}}",
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
                                window.location.href = "{{route('appointment.index')}}";
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
