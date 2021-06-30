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
    <link rel="stylesheet" href="{{ asset('admin_assets/css/trix.min.css') }}" type="text/css">
@endsection

@section('content')    <!-- Header -->
<div class="header bg-gradient-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-md-7 {{$text}}">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('admin.DASHBOARD')}}</a></li>
                            <li class="breadcrumb-item"><a href="{{route('patients.index')}}">{{__('admin.PATIENTS')}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ isset($patient) ? __('admin.EDIT-PATIENT') : __('admin.ADD-NEW-PATIENT') }}</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-left">
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
                <div class="card-header">{{ isset($patient) ? __('admin.EDIT-PATIENT') : __('admin.ADD-NEW-PATIENT') }} </div>

                <div class="card-body">
                    <form
                        action="{{ isset($patient) ? route('patients.update', $patient->id) : route('patients.store')  }}"
                        method="post" enctype="multipart/form-data">
                        @csrf

                        @if (isset($patient))
                            @method('PUT')
                        @endif

                        <div class="row">
                            <!--=================  Name  =================-->
                            <div class="form-group col-md-4 mb-2 {{$text}}">
                                <label class="font-weight-bold text-uppercase">{{__('admin.NAME')}}</label>
                                <input type="text" name="name" class="@error('name') is-invalid @enderror form-control"
                                       placeholder="{{__('admin.NAME')}}"
                                       value="{{ isset($patient) ? $patient->name : old('name') }}">

                                @error('name')
                                <div>
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                                @enderror

                            </div>

                            <!--=================  Phone  =================-->
                            <div class="form-group col-md-4 mb-2 {{$text}}">
                                <label class="font-weight-bold text-uppercase">{{__('admin.PHONE')}}</label>
                                <input type="number" name="phone"
                                       class="@error('phone') is-invalid @enderror form-control"
                                       placeholder="{{__('admin.PHONE')}}"
                                       value="{{ isset($patient) ? $patient->phone : old('phone') }}" required>

                                @error('phone')
                                <div>
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                                @enderror

                            </div>

                            <!--================= identifiation  =================-->
                            <div class="form-group col-md-4 mb-2 {{$text}}">
                                <label class="font-weight-bold text-uppercase">{{__('admin.IDENTIFICATION')}}</label>
                                <input type="text" name="identifiation"
                                       class="@error('identifiation') is-invalid @enderror form-control"
                                       placeholder="{{__('admin.IDENTIFICATION')}}"
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
                            <div class="form-group col-md-4 mb-2 {{$text}}">
                                <label class="font-weight-bold text-uppercase">{{__('admin.BIRTHDATE')}}</label>
                                <input type="date" name="dateofbirth" class="@error('dateofbirth') is-invalid @enderror form-control" placeholder="{{__('admin.BIRTHDATE')}}" value="{{ isset($patient) ? $patient->dateofbirth : old('dateofbirth') }}" required>

                                @error('dateofbirth')
                                <div>
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                                @enderror
                           
                            </div>

                            <!--================= gender  =================-->
                            <div class="form-group col-md-4 mb-2 {{$text}}">
                                <label class="font-weight-bold text-uppercase">{{__('admin.GENDER')}}</label>

                                <select class="form-control" name="gender" id="input-gender" required>
                                    <option value="Male"
                                            @isset($patient) @if ($patient->gender == "Male") selected @endif @endisset >
                                        {{__('admin.MALE')}}
                                    </option>
                                    <option value="Female"
                                            @isset($patient) @if ($patient->gender == "Female") selected @endif @endisset>
                                        {{__('admin.FEMALE')}}
                                    </option>                                   
                                </select>

                                @error('gender')
                                <div>
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                                @enderror

                            </div>

                            <!--=================  age  =================-->
                            <div class="form-group col-md-4 mb-2 {{$text}}">
                                <label class="font-weight-bold text-uppercase">{{__('admin.AGE')}}</label>
                                <input type="number" name="age"
                                       class="@error('age') is-invalid @enderror form-control"
                                       placeholder="{{__('admin.AGE')}}"
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
                            <div class="form-group col-md-4 mb-2 {{$text}}">
                                <label class="font-weight-bold text-uppercase">{{__('admin.NATIONALITY')}}</label>
                                <input type="text" name="nationality"
                                       class="@error('nationality') is-invalid @enderror form-control"
                                       placeholder="{{__('admin.NATIONALITY')}}"
                                       value="{{ isset($patient) ? $patient->nationality : old('nationality') }}">

                                @error('nationality')
                                <div>
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                                @enderror

                            </div>

                            <!--================= relationship  =================-->
                            <div class="form-group col-md-4 mb-2 {{$text}}">
                                <label class="font-weight-bold text-uppercase">{{__('admin.RELATIONSHIP-STATUS')}}</label>

                                <select class="form-control" name="relationship" id="input-relationship" required>
                                    <option value="Single" @isset($patient) @if ($patient->relationship == "Single") selected @endif @endisset >
                                        {{__('admin.SINGLE')}}
                                    </option>    
                                    <option value="Engaged" @isset($patient) @if ($patient->relationship == "Engaged") selected @endif @endisset >
                                        {{__('admin.ENGAGED')}}
                                    </option>                                 
                                    <option value="Married" @isset($patient) @if ($patient->relationship == "Married") selected @endif @endisset >
                                        {{__('admin.MARRIED')}}
                                    </option>                                                              
                                </select>

                                @error('relationship')
                                <div>
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                                @enderror

                            </div>

                            <!--================= job  =================-->
                            <div class="form-group col-md-4 mb-2 {{$text}}">
                                <label class="font-weight-bold text-uppercase">{{__('admin.JOB')}}</label>
                                <input type="text" name="job"
                                       class="@error('job') is-invalid @enderror form-control"
                                       placeholder="{{__('admin.JOB')}}"
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
                            <div class="form-group col-md-12 mb-2 {{$text}}">
                                <label class="font-weight-bold text-uppercase">{{__('admin.MEDICAL-HISTORY')}}</label>

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
                            <button type="submit" class="btn btn-success">{{ isset($patient) ?  __('admin.SAVE'):__('admin.ADD')  }}</button>
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
    <script src="{{ asset('admin_assets/js/trix.min.js') }}" ></script>
@endsection