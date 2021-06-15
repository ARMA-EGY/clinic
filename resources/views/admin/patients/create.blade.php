@extends('layouts.admin')

@section('content')    <!-- Header -->
<div class="header bg-gradient-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-md-7">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="{{asset('/')}}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{asset('/')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{route('patients.index')}}">patients</a></li>
                            <li class="breadcrumb-item active"
                                aria-current="page">{{ isset($patient) ?  "Edit patient" : "Add New patient" }}</li>
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
                <div class="card-header">{{ isset($patient) ?  "Edit patient" : "Add New patient" }} </div>

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
                            <div class="form-group col-md-6 mb-2">
                                <label class="font-weight-bold text-uppercase">Name</label>
                                <input type="text" name="name" class="@error('name') is-invalid @enderror form-control"
                                       placeholder="patient Name"
                                       value="{{ isset($patient) ? $patient->name : old('name') }}">

                                @error('name')
                                <div>
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                                @enderror

                            </div>

                            <!--=================  Phone  =================-->
                            <div class="form-group col-md-6 mb-2">
                                <label class="font-weight-bold text-uppercase">Phone</label>
                                <input type="number" name="phone"
                                       class="@error('phone') is-invalid @enderror form-control"
                                       placeholder="Phone Number "
                                       value="{{ isset($patient) ? $patient->phone : old('phone') }}" required>

                                @error('phone')
                                <div>
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                                @enderror

                            </div>


                        </div>
                        <hr class="my-3">


                        <div class="row">

                            <!--================= identifiation  =================-->
                            <div class="form-group col-md-6 mb-2">
                                <label class="font-weight-bold text-uppercase">Identifiation</label>
                                <input type="text" name="identifiation"
                                       class="@error('identifiation') is-invalid @enderror form-control"
                                       placeholder="patient identifiation"
                                       value="{{ isset($patient) ? $patient->identifiation : old('identifiation') }}">

                                @error('identifiation')
                                <div>
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                                @enderror

                            </div>

                            <!--=================  dateofbirth  =================-->
                            <div class="form-group col-md-6 mb-2">
                                <label class="font-weight-bold text-uppercase">Date of Birth</label>
                                <input type="date" name="dateofbirth" class="@error('dateofbirth') is-invalid @enderror form-control" placeholder="Date of Birth" value="{{ isset($patient) ? $patient->dateofbirth : old('dateofbirth') }}" required>

                                @error('dateofbirth')
                                <div>
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                                @enderror
                           
                            </div>

                        </div>
                        <hr class="my-3">

                        <div class="row">

                            <!--================= gender  =================-->
                            <div class="form-group col-md-6 mb-2">
                                <label class="font-weight-bold text-uppercase">gender</label>

                                <select class="form-control" name="gender" id="input-gender" required>
                                    <option value="male"
                                            @isset($patient) @if ($patient->gender == "male") selected @endif @endisset >
                                        Male
                                    </option>
                                    <option value="female"
                                            @isset($patient) @if ($patient->gender == "female") selected @endif @endisset>
                                        Female
                                    </option>                                   
                                </select>

                                @error('gender')
                                <div>
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                                @enderror

                            </div>
                            <!--=================  age  =================-->
                            <div class="form-group col-md-6 mb-2">
                                <label class="font-weight-bold text-uppercase">age</label>
                                <input type="number" name="age"
                                       class="@error('age') is-invalid @enderror form-control"
                                       placeholder="patient age"
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
                            <div class="form-group col-md-6 mb-2">
                                <label class="font-weight-bold text-uppercase">nationality</label>
                                <input type="text" name="nationality"
                                       class="@error('nationality') is-invalid @enderror form-control"
                                       placeholder="patient nationality"
                                       value="{{ isset($patient) ? $patient->nationality : old('nationality') }}">

                                @error('nationality')
                                <div>
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                                @enderror

                            </div>


                        </div>
                        <hr class="my-3">                        
                        <div class="form-group">
                            <button type="submit"
                                    class="btn btn-success">{{ isset($patient) ? 'Save' : 'Add' }}</button>
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
