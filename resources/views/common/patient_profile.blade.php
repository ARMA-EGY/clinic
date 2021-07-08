@extends('layouts.master')

@section('style')

@endsection

@section('content')    <!-- Header -->
<div class="header bg-gradient-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">

                <div class="col-lg-12 text-left">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('master.DASHBOARD')}}</a></li>
                            <li class="breadcrumb-item"><a href="{{route('patients.index')}}">{{__('master.PATIENTS')}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{__('master.PROFILE')}}</li>
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

            <!-- Personal Information -->
            <div class="card card-defualt">
                <div class="card-header"><i class="fa fa-info-circle"></i> {{__('master.PERSONAL-INFORMATION')}} </div>

                <div class="card-body">

                        <div class="row">
                            <!--=================  Name  =================-->
                            <div class="form-group col-md-4 mb-2 text-left">
                                <label class="font-weight-bold text-uppercase">{{__('master.NAME')}}</label>
                                <input type="text" name="name" class="form-control" value="{{ $patient->name }}" disabled>
                            </div>

                            <!--=================  Phone  =================-->
                            <div class="form-group col-md-4 mb-2 text-left">
                                <label class="font-weight-bold text-uppercase">{{__('master.PHONE')}}</label>
                                <input type="number" class="form-control" value="{{ $patient->phone  }}" disabled>
                            </div>

                            <!--================= identifiation  =================-->
                            <div class="form-group col-md-4 mb-2 text-left">
                                <label class="font-weight-bold text-uppercase">{{__('master.IDENTIFICATION')}}</label>
                                <input type="text" class="form-control" value="{{ $patient->identifiation }}" disabled>
                            </div>
                        </div>
                        <hr class="my-3">


                        <div class="row">
                            <!--=================  dateofbirth  =================-->
                            <div class="form-group col-md-4 mb-2 text-left">
                                <label class="font-weight-bold text-uppercase">{{__('master.BIRTHDATE')}}</label>
                                <input type="date" class="form-control" value="{{ $patient->dateofbirth }}" disabled>
                            </div>

                            <!--================= gender  =================-->
                            <div class="form-group col-md-4 mb-2 text-left">
                                <label class="font-weight-bold text-uppercase">{{__('master.GENDER')}}</label>

                                <select class="form-control" name="gender" id="input-gender" disabled>
                                    <option value="Male" @if ($patient->gender == "Male") selected @endif> {{__('master.MALE')}}</option>
                                    <option value="Female" @if ($patient->gender == "Female") selected @endif> {{__('master.FEMALE')}}  </option>                                   
                                </select>
                            </div>

                            <!--=================  age  =================-->
                            <div class="form-group col-md-4 mb-2 text-left">
                                <label class="font-weight-bold text-uppercase">{{__('master.AGE')}}</label>
                                <input type="number" class="form-control" value="{{  $patient->age }}" disabled>
                            </div>
                        </div>
                        <hr class="my-3">


                        <div class="row">
                            <!--================= nationality  =================-->
                            <div class="form-group col-md-4 mb-2 text-left">
                                <label class="font-weight-bold text-uppercase">{{__('master.NATIONALITY')}}</label> 
                                <input type="text" class="form-control" value="{{__('nationality.'.$patient->nationality)}}" disabled>
                            </div>

                            <!--================= relationship  =================-->
                            <div class="form-group col-md-4 mb-2 text-left">
                                <label class="font-weight-bold text-uppercase">{{__('master.RELATIONSHIP-STATUS')}}</label>
                                <select class="form-control" disabled>
                                    <option value="Single" @if ($patient->relationship == "Single") selected @endif> {{__('master.SINGLE')}} </option>    
                                    <option value="Engaged" @if ($patient->relationship == "Engaged") selected @endif>{{__('master.ENGAGED')}} </option>                                 
                                    <option value="Married" @if ($patient->relationship == "Married") selected @endif> {{__('master.MARRIED')}} </option>                                                              
                                </select>

                            </div>

                            <!--================= job  =================-->
                            <div class="form-group col-md-4 mb-2 text-left">
                                <label class="font-weight-bold text-uppercase">{{__('master.JOB')}}</label>
                                <input type="text" class="form-control" value="{{ $patient->job }}" disabled>
                            </div>
                        </div>
                        <hr class="my-3">  


                        <div class="row">
                            <!--================= Medical History  =================-->
                            <div class="form-group col-md-12 mb-2 text-left">
                                <label class="font-weight-bold text-uppercase">{{__('master.MEDICAL-HISTORY')}}</label>
                                <div class="form-control">
                                    {!! $patient->medical_history !!}
                                </div>
                            </div>

                        </div>

                </div>

            </div>

             <!-- Pledges -->
            <div class="card card-defualt">
                <div class="card-header"><i class="fas fa-file-contract"></i> {{__('master.PLEDGES')}} </div>

                <div class="card-body">
                        <p class="text-center"> {{__('master.NO-PLEDGES')}} </p>
                </div>

            </div>

            <!-- X-Rays -->
            <div class="card card-defualt">
                <div class="card-header"><i class="fas fa-x-ray"></i> {{__('master.RAYS')}} </div>

                <div class="card-body">
                        <p class="text-center"> {{__('master.NO-RAYS')}} </p>
                </div>

            </div>

            <!-- Appointments -->
            <div class="card card-defualt">
                <div class="card-header"><i class="fas fa-notes-medical"></i> {{__('master.APPOINTMENTS-HISTORY')}} </div>

                <div class="card-body">
                    
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        @foreach ($sectors as $sector)
                            <li class="nav-item" role="presentation">
                                <a class="nav-link @if($loop->index == 0) active @endif" id="S{{$sector->id}}-tab" data-toggle="tab" href="#S{{$sector->id}}" role="tab" aria-controls="S{{$sector->id}}" aria-selected="true">{{$sector->name}}</a>
                            </li>
                        @endforeach
                    </ul>

                    <div class="tab-content py-4" id="myTabContent">
                        @foreach ($sectors as $sector)
                            <div class="tab-pane fade @if($loop->index == 0) show active @endif" id="S{{$sector->id}}" role="tabpanel" aria-labelledby="S{{$sector->id}}-tab">
                                
                                <div class="table-responsive rounded">
                                    <table class="table align-items-center table-dark table-flush">
                                        <thead class="thead-dark">
                                        <tr>
                                            <th scope="col" class="sort">#</th>
                                            <th scope="col" class="sort" >{{__('master.APPOINTMENT-DATE')}}</th>
                                            <th scope="col" class="sort" >{{__('master.APPOINTMENT-NUMBER')}}</th>
                                            <th scope="col" class="sort" >{{__('master.DOCTOR-NAME')}}</th>
                                            <th scope="col" class="sort" >{{__('master.BRANCH')}}</th>
                                            <th scope="col"></th>
                                        </tr>
                                        </thead>
                                        <tbody class="list">

                                        @foreach ($appointments as $appointment)
                                            @if($appointment->sector_id == $sector->id)
                                                <tr class="parent">
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td><b> {{$appointment->appointment_date}} </b></td>
                                                    <td><b> {{$appointment->appointment_number}} </b></td>
                                                    <td><b> {{$appointment->doctor->name}} </b></td>
                                                    <td><b> {{$appointment->branch->name}} </b></td>
                                                    <td>
                                                    <a data-toggle="tooltip" data-placement="top" title="{{__('master.DETAILS')}}" href="{{route('appointment.show',$appointment->id)}}" class="btn btn-warning btn-sm mx-1 px-3"> <i class="fa fa-tv"></i> </a>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        @endforeach
                    </div>

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

@endsection