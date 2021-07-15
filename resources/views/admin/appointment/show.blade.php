@extends('layouts.master')

@section('style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')

    <!-- Header -->
    <div class="header bg-gradient-primary hide-for-print pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-md-7">
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('master.DASHBOARD')}}</a></li>
                            <li class="breadcrumb-item"><a href="{{route('appointment.index')}}">{{__('master.APPOINTMENTS')}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $appointment->id }}</li>
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
    <div class="container-fluid hide-for-print mt--6">
        <div class="row">

            <!-- Patient Info -->
            <div class="col-xl-12">
                <div class="card bg-default shadow">

                    <div class="card-header bg-transparent border-0">
                        <div class="row">
                            <div class="col-md-8"><h3 class="text-white mb-0">{{__('master.APPOINTMENT')}} #{{ $appointment->id }}</h3></div>
                        </div>
                    </div>

                    <div class="table-responsive ">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">                         
                            <tr>
                                <th scope="col">{{__('master.BRANCH')}} </th>
                                <td style="background-color: #fff; font-weight: bold;">{{ $appointment->branch->name }}</td>
                            </tr> 
                            <tr>
                                <th scope="col">{{__('master.SECTOR')}} </th>
                                <td style="background-color: #fff; font-weight: bold;">{{ $appointment->sector->name }}</td>
                            </tr>   
                            <tr>
                                <th scope="col">{{__('master.APPOINTMENT-NUMBER')}} </th>
                                <td style="background-color: #fff; font-weight: bold;">{{ $appointment->id }}</td>
                            </tr>
                            <tr>
                                <th scope="col">{{__('master.DOCTOR-NAME')}} </th>
                                <td style="background-color: #fff; font-weight: bold;">{{ $appointment->doctor->name }}</td>
                            </tr> 
                            <tr>
                                <th scope="col">{{__('master.PATIENT-NAME')}} </th>
                                <td style="background-color: #fff; font-weight: bold;"><a class="font-weight-bold text-primary" href="{{ route('patient.profile',$appointment->patient->id) }}">{{ $appointment->patient->name }}</a></td>
                               </tr>
                            <tr>
                                <th scope="col">{{__('master.GENDER')}} </th>
                                <td style="background-color: #fff; font-weight: bold;">{{ $appointment->patient->gender }}</td>
                            </tr>
                            </thead>
                            <tbody>
                        </table>
                    </div>
                    
                </div>
            </div>

            <!-- Medical History -->
            <div class="col-xl-12">
                <div class="card card-defualt">
                    <div class="card-header"> {{__('master.MEDICAL-HISTORY')}} </div>

                    <div class="card-body">
                        <div class="col-md-12 mb-2 text-left">
                                {!! $appointment->patient->medical_history !!}
                        </div>
                    </div>

                </div>
            </div>

            <!-- Services -->
            <div class="col-xl-12">
                <div class="card bg-default shadow">

                    
                    <div class="card-header bg-transparent border-0 ">
                        <h3 class="text-white mb-0">{{__('master.SERVICES')}}</h3>
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-light table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort">#</th>
                                <th scope="col" class="sort" >{{__('master.NAME')}}</th>
                                <th scope="col" class="sort" >{{__('master.SERVICE-NUMBER')}}</th>
                                <th scope="col" class="sort" >{{__('master.PRICE')}}</th>
                                <th scope="col" class="sort" >{{__('master.SECTOR')}} </th>
                                <th scope="col" class="sort" >{{__('master.STATUS')}} </th>
                                <th scope="col" class="sort" >{{__('master.BODY-PARTS')}} </th>
                            </tr>
                            </thead>
                            <tbody class="list">

                           @foreach($appointmentServices as $appointmentService)
                                <tr class="parent">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{$appointmentService->service->name}}</td>
                                    <td>{{$appointmentService->service->number}}</td>
                                    <td>{{$appointmentService->service->price}}</td>
                                    <td>{{$appointmentService->service->sector->name}}</td>
                                    <td>{{$appointmentService->status}}</td>
                                    <td>{{$appointmentService->body_part}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>

            @if($appointment->status == "pending")
                @if(count($services) > 0)
                    <div class="col-xl-12 order-xl-1">
                        <div class="card">
                            <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                <h3 class="mb-0">{{__('master.ADD-NEW-SERVICE')}}</h3>
                                </div>
                            </div>
                            </div>
                            <div class="card-body">
                                    <form  class="add_service_form" enctype="multipart/form-data">
                                        @csrf

                                        <input type="hidden" name="appointment_id" value="{{ $appointment->id }}">

                                        <div class="row">

                                            <!--=================  Service  =================-->
                                            <div class="form-group col-md-4 mb-2">
                                            <label class="font-weight-bold text-uppercase" for="service">{{__('master.SERVICES')}}</label>
                                                <select id="service" class="form-control" name="service" required>
                                                        @foreach($services as $service)
                                                            <option value="{{ $service->id }}">{{ $service->name }}</option>
                                                        @endforeach
                                                </select>

                                                @error('service')
                                                <div>
                                                    <span class="text-danger">{{ $message }}</span>
                                                </div>
                                                @enderror

                                            </div>

                                            <!--=================  Body Part  =================-->
                                            <div class="form-group col-md-4 mb-2">
                                            <label class="font-weight-bold text-uppercase" for="body_part">{{__('master.BODY-PARTS')}}</label>
                                                <select class="form-control selectpicker" data-live-search="true" name="body_part">
                                                    <option value="">{{__('master.SELECT')}}</option>
                                                    @foreach($bodyparts as $bodypart)
                                                    
                                                        <option value="{{$bodypart->name}}">{{$bodypart->name}}</option>
                                                    
                                                    @endforeach

                                                </select>

                                                @error('body_part')
                                                <div>
                                                    <span class="text-danger">{{ $message }}</span>
                                                </div>
                                                @enderror

                                            </div>

                                            <!--=================  Notes  =================-->
                                            <div class="form-group col-md-4 mb-4 text-left">
                                                <label class="font-weight-bold text-uppercase">{{__('master.NOTES')}}</label>
                                                <input type="text" name="notes" placeholder="Add notes" class="@error('name') is-invalid @enderror form-control" >
                                            
                                                @error('notes')
                                                    <div>
                                                        <span class="text-danger">{{ $message }}</span>
                                                    </div>
                                                @enderror
                            
                                            </div>
                                        </div>
                                    
                                        <div class="form-group col-md-6 mb-1">
                                                <button type="submit" class="btn btn-success">{{__('master.ADD')}}</button>
                                            </div>


                                    </form>              
                            </div>
                        </div>
                    </div>
                @endif
                    <div class="col-xl-12 order-xl-1">
                        <div class="card">
                            <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                <h3 class="mb-0">{{__('master.ADD-NEW-NOTES')}}</h3>
                                </div>
                            </div>
                            </div>
                            <div class="card-body">
                                    <form  class="add_notes_form" enctype="multipart/form-data">
                                        @csrf

                                        <input type="hidden" name="appointment_id" value="{{ $appointment->id }}">

                                        <div class="row">
                                            <!--=================  Notes  =================-->
                                            <div class="form-group col-md-12 mb-2">
                                                <label class="font-weight-bold text-uppercase" for="notes">{{__('master.NOTES')}}</label>
                                                <input id="x" type="hidden" name="notes" value="{{$appointment->notes}}">
                                                    <trix-editor input="x"></trix-editor>
                                            </div>
                                        </div>
                                    
                                        <div class="form-group col-md-6 mb-1">
                                                <button type="submit" class="btn btn-success">{{__('master.ADD')}}</button>
                                            </div>


                                    </form>              
                            </div>
                        </div>
                    </div>        
            @else 

                    <div class="col-xl-12">
                        <!--================= NOTES  =================-->
                        <div class="card card-defualt">
                            <div class="card-header"><i class="fa fa-info-circle"></i> {{__('master.NOTES')}} </div>

                            <div class="card-body">
                                <div class="col-md-12 mb-2 text-left">
                                        {!! $appointment->notes !!}
                                </div>
                            </div>

                        </div>

                    </div>

            @endif

        </div>



        
    </div>


@endsection

@section('script')


  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
  <script>
        $(document).ready(function() {
                $('.select2').select2();


        $(document).on('submit', '.add_service_form', function(e)
        {
            e.preventDefault();
            let formData = new FormData(this);
            $('.submit').prop('disabled', true);

            var head1 	= 'Done';
            var title1 	= 'Service Added Successfully. ';
            var head2 	= 'Oops...';
            var title2 	= 'Something went wrong, please try again later.';

            $.ajax({
                url: 		"{{route('AppointmentServices.store')}}",
                method: 	'POST',
                data: formData,
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
                            setTimeout(function() {window.location.reload();}, 2000);
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
        
        $(document).on('submit', '.add_notes_form', function(e)
        {
            e.preventDefault();
            let formData = new FormData(this);
            $('.submit').prop('disabled', true);

            var head1 	= 'Done';
            var title1 	= 'Data Changed Successfully. ';
            var head2 	= 'Oops...';
            var title2 	= 'Something went wrong, please try again later.';

            $.ajax({
                url: 		"{{route('admin-appointment-addnotes')}}",
                method: 	'POST',
                data: formData,
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
                            setTimeout(function() {window.location.reload();}, 2000);
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
            });
    </script>
@endsection