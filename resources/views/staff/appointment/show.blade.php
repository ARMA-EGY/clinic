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
                            <li class="breadcrumb-item"><a href="{{route('staff-appointment.index')}}">{{__('master.INTERNAL-APPOINTMENTS')}}</a></li>
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
                                    <td>
                                        @if ($appointmentService->status == 'pending')
                                            <span class="badge badge-yellow category-badge">  {{__('master.PENDING')}}</span>
                                        @elseif ($appointmentService->status == 'paid')
                                            <span class="badge badge-success category-badge">  {{__('master.PAID')}}</span>
                                        @elseif ($appointmentService->status == 'cancelled')
                                            <span class="badge badge-danger category-badge">  {{__('master.CANCELLED')}}</span>
                                        @endif
                                    </td>
                                    <td>{{$appointmentService->body_part}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>


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

        </div>



        
    </div>


@endsection

@section('script')


  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
  <script>
        $(document).ready(function() {
                $('.select2').select2();               
            });
    </script>
@endsection