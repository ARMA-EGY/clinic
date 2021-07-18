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
                            <li class="breadcrumb-item"><a href="{{route('staff-patients.index')}}">{{__('master.PATIENTS')}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ isset($patient) ? __('master.EDIT-PATIENT') : __('master.ADD-NEW-PATIENT') }}</li>
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
                <div class="card-header">{{ isset($patient) ? __('master.EDIT-PATIENT') : __('master.ADD-NEW-PATIENT') }} </div>

                <div class="card-body">
                    <form
                        action="{{ isset($patient) ? route('staff-patients.update', $patient->id) : route('staff-patients.store')  }}"
                        method="post" enctype="multipart/form-data">
                        @csrf

                        @if (isset($patient))
                            @method('PUT')
                        @endif

                        <div class="row">
                            <!--=================  Name  =================-->
                            <div class="form-group col-md-4 mb-2 text-left">
                                <label class="font-weight-bold text-uppercase">{{__('master.NAME')}}</label>
                                <input type="text" name="name" class="@error('name') is-invalid @enderror form-control"
                                       placeholder="{{__('master.NAME')}}"
                                       value="{{ isset($patient) ? $patient->name : old('name') }}">

                                @error('name')
                                <div>
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                                @enderror

                            </div>

                            <!--=================  Phone  =================-->
                            <div class="form-group col-md-4 mb-2 text-left">
                                <label class="font-weight-bold text-uppercase">{{__('master.PHONE')}}</label>
                                <input type="number" name="phone"
                                       class="@error('phone') is-invalid @enderror form-control"
                                       placeholder="{{__('master.PHONE')}}"
                                       value="{{ isset($patient) ? $patient->phone : old('phone') }}" required>

                                @error('phone')
                                <div>
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                                @enderror

                            </div>

                            <!--================= identifiation  =================-->
                            <div class="form-group col-md-4 mb-2 text-left">
                                <label class="font-weight-bold text-uppercase">{{__('master.IDENTIFICATION')}}</label>
                                <input type="text" name="identifiation"
                                       class="@error('identifiation') is-invalid @enderror form-control"
                                       placeholder="{{__('master.IDENTIFICATION')}}"
                                       value="{{ isset($patient) ? $patient->identifiation : old('identifiation') }}">

                                @error('identifiation')
                                <div>
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                                @enderror

                            </div>


                        </div>
                        <hr class="my-3">


                        <div class="row">

                            <!--=================  dateofbirth  =================-->
                            <div class="form-group col-md-4 mb-2 text-left">
                                <label class="font-weight-bold text-uppercase">{{__('master.BIRTHDATE')}}</label>
                                <input type="date" name="dateofbirth" class="@error('dateofbirth') is-invalid @enderror form-control" placeholder="{{__('master.BIRTHDATE')}}" value="{{ isset($patient) ? $patient->dateofbirth : old('dateofbirth') }}" required>

                                @error('dateofbirth')
                                <div>
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                                @enderror
                           
                            </div>

                            <!--================= gender  =================-->
                            <div class="form-group col-md-4 mb-2 text-left">
                                <label class="font-weight-bold text-uppercase">{{__('master.GENDER')}}</label>

                                <select class="form-control" name="gender" id="input-gender" required>
                                    <option value="Male"
                                            @isset($patient) @if ($patient->gender == "Male") selected @endif @endisset >
                                        {{__('master.MALE')}}
                                    </option>
                                    <option value="Female"
                                            @isset($patient) @if ($patient->gender == "Female") selected @endif @endisset>
                                        {{__('master.FEMALE')}}
                                    </option>                                   
                                </select>

                                @error('gender')
                                <div>
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                                @enderror

                            </div>

                            <!--=================  age  =================-->
                            <div class="form-group col-md-4 mb-2 text-left">
                                <label class="font-weight-bold text-uppercase">{{__('master.AGE')}}</label>
                                <input type="number" name="age"
                                       class="@error('age') is-invalid @enderror form-control"
                                       placeholder="{{__('master.AGE')}}"
                                       value="{{ isset($patient) ? $patient->age : old('age') }}">

                                @error('age')
                                <div>
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                                @enderror
                           
                            </div>

                        </div>
                        <hr class="my-3">


                        <div class="row">

                            <!--================= nationality  =================-->
                            <div class="form-group col-md-4 mb-2 text-left">
                                <label class="font-weight-bold text-uppercase">{{__('master.NATIONALITY')}}</label> 
                                <select class="@error('nationality') is-invalid @enderror form-control selectpicker" name="nationality" data-live-search="true" required>
                                    @foreach ($countries as $country)
                                        <option value="{{$country->country_Nationality}}" @if (isset($patient))  @if ($patient->nationality == $country->country_Nationality ) selected @endif @endif>{{__('nationality.'.$country->country_Nationality)}}</option>
                                    @endforeach
                                </select>

                                @error('nationality')
                                <div>
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                                @enderror

                            </div>

                            <!--================= relationship  =================-->
                            <div class="form-group col-md-4 mb-2 text-left">
                                <label class="font-weight-bold text-uppercase">{{__('master.RELATIONSHIP-STATUS')}}</label>

                                <select class="form-control" name="relationship" id="input-relationship" required>
                                    <option value="Single" @isset($patient) @if ($patient->relationship == "Single") selected @endif @endisset >
                                        {{__('master.SINGLE')}}
                                    </option>    
                                    <option value="Engaged" @isset($patient) @if ($patient->relationship == "Engaged") selected @endif @endisset >
                                        {{__('master.ENGAGED')}}
                                    </option>                                 
                                    <option value="Married" @isset($patient) @if ($patient->relationship == "Married") selected @endif @endisset >
                                        {{__('master.MARRIED')}}
                                    </option>                                                              
                                </select>

                                @error('relationship')
                                <div>
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                                @enderror

                            </div>

                            <!--================= job  =================-->
                            <div class="form-group col-md-4 mb-2 text-left">
                                <label class="font-weight-bold text-uppercase">{{__('master.JOB')}}</label>
                                <input type="text" name="job"
                                       class="@error('job') is-invalid @enderror form-control"
                                       placeholder="{{__('master.JOB')}}"
                                       value="{{ isset($patient) ? $patient->job : old('job') }}" required>

                                @error('job')
                                <div>
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                                @enderror

                            </div>

                        </div>
                        <hr class="my-3">  


                        <div class="row">

                            <!--================= Medical History  =================-->
                            <div class="form-group col-md-12 mb-2 text-left">
                                <label class="font-weight-bold text-uppercase">{{__('master.MEDICAL-HISTORY')}}</label>

                                <input id="x" type="hidden" name="medical_history" value="{{ isset($patient) ? $patient->medical_history : old('medical_history') }}">
                                <trix-editor input="x"></trix-editor>
        
                                @error('medical_history')
                                    <div>
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror

                            </div>

                        </div>
                        <hr class="my-3">  
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">{{ isset($patient) ?  __('master.SAVE'):__('master.ADD')  }}</button>
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

@endsection    


@section('script')

@endsection