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
@endsection

@section('content')


    <!-- Header -->
    <div class="header bg-gradient-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7 {{$text}}">
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('admin.DASHBOARD')}}</a></li>
                  <li class="breadcrumb-item"><a href="{{route('doctors.index')}}">{{__('admin.DOCTORS')}}</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{ isset($item) ? __('admin.EDIT-DOCTOR') : __('admin.ADD-NEW-DOCTOR') }}</li>
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
                <div class="card-header">{{ isset($item) ? __('admin.EDIT-DOCTOR') : __('admin.ADD-NEW-DOCTOR') }} </div>
        
                <div class="card-body">
                    <form action="{{ isset($item) ? route('doctors.update', $item->id) : route('doctors.store')  }}" method="post" enctype="multipart/form-data">
                        @csrf

                        @if (isset($item))
                           @method('PUT')
                        @endif
                        
                        <div class="row">

                            <!--=================  Name  =================-->
                            <div class="form-group col-md-6 mb-4 {{$text}}">
                                <label class="font-weight-bold text-uppercase">{{__('admin.NAME')}}</label>
                                <input type="text" name="name" class="@error('name') is-invalid @enderror form-control" placeholder="{{__('admin.NAME')}}" value="{{ isset($item) ? $item->name : old('name') }}" required>
                            
                                @error('name')
                                    <div>
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
            
                            </div>
        
                            <!--=================  Phone  =================-->
                            <div class="form-group col-md-6 mb-4 {{$text}}">
                                <label class="font-weight-bold text-uppercase">{{__('admin.PHONE')}} </label>
                                <input type="text" name="phone" class="@error('phone') is-invalid @enderror form-control" placeholder="{{__('admin.PHONE')}}" value="{{ isset($item) ? $item->phone : old('phone') }}" required>
                            
                                @error('phone')
                                    <div>
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
            
                            </div>

                        </div>
                        <hr class="my-3">

                        <div class="row">

                            <!--=================  E-mail  =================-->
                            <div class="form-group col-md-6 mb-4 {{$text}}">
                                <label class="font-weight-bold text-uppercase">{{__('admin.EMAIL')}}</label>
                                <input type="email" name="email" class="@error('email') is-invalid @enderror form-control" placeholder="{{__('admin.EMAIL')}}" value="{{ isset($item) ? $item->email : old('email') }}" >
                            
                                @error('email')
                                    <div>
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
            
                            </div>
        
                            <!--=================  Gender  =================-->
                            <div class="form-group col-md-6 mb-4 {{$text}}">
                                <label class="font-weight-bold text-uppercase">{{__('admin.GENDER')}}</label>

                                <select class="form-control" name="gender" required>
                                    <option value="Female">{{__('admin.FEMALE')}}</option>
                                    <option value="Male">{{__('admin.MALE')}}</option>
                                </select>

                                @error('gender')
                                    <div>
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>

                        </div>
                        <hr class="my-3">

                    @isset($item)

                    @else

                        <div class="row">

                            <!--=================  Password  =================-->
                            <div class="form-group col-md-6 mb-4 {{$text}}">
                                <label class="form-control-label" for="input-phone">{{__('admin.PASSWORD')}}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
    
                            <!--================= Confirm Password  =================-->
                            <div class="form-group col-md-6 mb-4 {{$text}}">
                                <label for="password-confirm" class="form-control-label">{{__('admin.CONFIRM-PASSWORD')}}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
    
                        </div>
                        <hr class="my-3">
                            
                    @endisset


                        <div class="row">

                            <!--=================  Role  =================-->
                            <input type="hidden" name="role" value="Doctor">

                            {{-- <div class="form-group col-md-6 mb-4 {{$text}}">
                                <label class="font-weight-bold text-uppercase">{{__('admin.ROLE')}}</label>
                                <select class="form-control" name="role" required>
                                    <option>Admin</option>
                                    <option>Staff</option>
                                </select>
                            
                                @error('role')
                                    <div>
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
            
                            </div> --}}
        
                            <!--=================  Certificate  =================-->
                            <div class="form-group col-md-6 mb-4 {{$text}}">
                                <label class="font-weight-bold text-uppercase">{{__('admin.CERTIFICATE')}}</label>
                                <input type="text" name="certificate" class="@error('certificate') is-invalid @enderror form-control" placeholder="{{__('admin.CERTIFICATE')}}" value="{{ isset($item) ? $item->certificate : old('certificate') }}" >

                                @error('certificate')
                                    <div>
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
        
                            <!--=================  Sector  =================-->
                            <div class="form-group col-md-6 mb-4 {{$text}}">
                                <label class="font-weight-bold text-uppercase">{{__('admin.SECTOR')}}</label>

                                <select class="form-control" name="sector_id" required>
                                    @foreach ($sectors as $sector)
                                        <option value="{{$sector->id}}" @if (isset($item))  @if ($item->sector_id == $sector->id ) selected @endif @endif>{{$sector->name}}</option>
                                    @endforeach
                                </select>

                                @error('sector_id')
                                    <div>
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>

                        </div>
                        <hr class="my-3">

                        <div class="row">

                            <!--=================  Nationality  =================-->
                            <div class="form-group col-md-6 mb-4 {{$text}}">
                                <label class="font-weight-bold text-uppercase">{{__('admin.NATIONALITY')}}</label>
                                <input type="text" name="nationality" class="@error('nationality') is-invalid @enderror form-control" placeholder="{{__('admin.NATIONALITY')}}" value="{{ isset($item) ? $item->nationality : old('nationality') }}" >
                            
                                @error('nationality')
                                    <div>
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
            
                            </div>
        
                            <!--=================  Salary  =================-->
                            <div class="form-group col-md-6 mb-4 {{$text}}">
                                <label class="font-weight-bold text-uppercase">{{__('admin.SALARY')}}</label>
                                <input type="number" step="0.1" name="salary" class="@error('salary') is-invalid @enderror form-control" placeholder="{{__('admin.SALARY')}}" value="{{ isset($item) ? $item->salary : old('salary') }}" >

                                @error('salary')
                                    <div>
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>

                        </div>
                        <hr class="my-3">

                        <div class="row">

                            <!--=================  Hiring Date  =================-->
                            <div class="form-group col-md-6 mb-4 {{$text}}">
                                <label class="font-weight-bold text-uppercase">{{__('admin.HIRING-DATE')}}</label>
                                <input type="date" name="hiring_date" class="@error('hiring_date') is-invalid @enderror form-control" placeholder="{{__('admin.HIRING-DATE')}}" value="{{ isset($item) ? $item->hiring_date : old('hiring_date') }}" >
                            
                                @error('hiring_date')
                                    <div>
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
            
                            </div>
        
                            <!--=================  Contract Duration  =================-->
                            <div class="form-group col-md-6 mb-4 {{$text}}">
                                <label class="font-weight-bold text-uppercase">{{__('admin.CONTRACT-DURATION')}}</label>
                                <input type="text" name="contract_duration" class="@error('contract_duration') is-invalid @enderror form-control" placeholder="{{__('admin.CONTRACT-DURATION')}}" value="{{ isset($item) ? $item->contract_duration : old('contract_duration') }}" >

                                @error('contract_duration')
                                    <div>
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>

                        </div>
                        <hr class="my-3">

                        <div class="row">

                            <!--=================   Birthdate  =================-->
                            <div class="form-group col-md-6 mb-4 {{$text}}">
                                <label class="font-weight-bold text-uppercase">{{__('admin.BIRTHDATE')}}</label>
                                <input type="date" name="birthdate" class="@error('birthdate') is-invalid @enderror form-control" placeholder="{{__('admin.BIRTHDATE')}}" value="{{ isset($item) ? $item->birthdate : old('birthdate') }}" >
                            
                                @error('birthdate')
                                    <div>
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
            
                            </div>
        
                            <!--=================  Working Hours  =================-->
                            <div class="form-group col-md-6 mb-4 {{$text}}">
                                <label class="font-weight-bold text-uppercase">{{__('admin.WORKING-HOURS')}}</label>
                                <input type="number" name="working_hours" class="@error('working_hours') is-invalid @enderror form-control" placeholder="{{__('admin.WORKING-HOURS')}}" value="{{ isset($item) ? $item->working_hours : old('working_hours') }}" >

                                @error('working_hours')
                                    <div>
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>

                        </div>

        
                        <div class="form-group card-footer">
                        <button type="submit" class="btn btn-success">{{ isset($item) ?  __('admin.SAVE'):__('admin.ADD') }}</button>
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
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
  <script>
        $(document).ready(function() {
                $('.select2').select2();
            });
    </script>
@endsection
