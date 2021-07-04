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
                            <li class="breadcrumb-item active" aria-current="page">number</li>
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
            <div class="col-xl-12">
                <div class="card bg-default shadow">
                    <div class="card-header bg-transparent border-0">
                        <div class="row">
                            <div class="col-md-8"><h3 class="text-white mb-0">Appointment #{{ $appointment->id }}</h3></div>
                        </div>
                    </div>


                    {{--ORDER INFO--}}
                    <div class="table-responsive ">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">Appointment ID: </th>
                                <td style="background-color: #fff; font-weight: bold;">{{ $appointment->id }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Patient Name: </th>
                                <td style="background-color: #fff; font-weight: bold;">{{ $appointment->patient->name }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Patient Gender: </th>
                                <td style="background-color: #fff; font-weight: bold;">{{ $appointment->patient->gender }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Patient Medical History: </th>
                                <td style="background-color: #fff; font-weight: bold;">{{ $appointment->patient->medical_history }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Doctor Name: </th>
                                <td style="background-color: #fff; font-weight: bold;">{{ $appointment->doctor->name }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Sector: </th>
                                <td style="background-color: #fff; font-weight: bold;">{{ $appointment->sector->name }}</td>
                            </tr>                            
                            <tr>
                                <th scope="col">Branch: </th>
                                <td style="background-color: #fff; font-weight: bold;">{{ $appointment->branch->name }}</td>
                            </tr>  
                            </thead>
                            <tbody>
                        </table>
                    </div>

                    <div class="card-header bg-transparent border-0 ">
                        <h3 class="text-white mb-0">Services</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-dark table-flush">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col" class="sort">#</th>
                                <th scope="col" class="sort" >{{__('master.NAME')}}</th>
                                <th scope="col" class="sort" >{{__('master.SERVICE-NUMBER')}}</th>
                                <th scope="col" class="sort" >{{__('master.PRICE')}}</th>
                                <th scope="col" class="sort" >{{__('master.SECTOR')}} </th>
                                <th scope="col" class="sort" >Status </th>
                                <th scope="col" class="sort" >Body Part </th>
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


        <div class="col-xl-12 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Add New Service</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
                    <form  class="add_service_form" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="appointment_id" value="{{ $appointment->id }}">

                        <div class="row">

                            <!--=================  Service  =================-->
                            <div class="form-group col-md-6 mb-2">
                            <label class="font-weight-bold text-uppercase" for="service">Service</label>
                                <select id="service" class="select2 form-control" name="service[]" multiple="multiple">
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
                            <div class="form-group col-md-6 mb-2">
                            <label class="font-weight-bold text-uppercase" for="body_part">Body Part</label>
                                <select class="form-control selectpicker" data-live-search="true" name="body_part">
                                    <option>-SELECT-</option>
                                  
                                        <option value="leg">Leg</option>
                                        <option value="arm">Arm</option>
                                        <option value="back">Back</option>
                                   
                                </select>

                                @error('body_part')
                                <div>
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                                @enderror

                            </div>
                        </div>
                      
                        <div class="form-group col-md-6 mb-1">
                                <button type="submit" class="btn btn-success">Add</button>
                            </div>


                    </form>              
            </div>
          </div>
        </div>


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
            var title1 	= 'Data Changed Successfully. ';
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
            });
    </script>
@endsection