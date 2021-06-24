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
            <div class="col-lg-6 col-12 {{$text}}">
              <nav aria-label="breadcrumb" class="d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('admin.DASHBOARD')}}</a></li>
                  <li class="breadcrumb-item"><a href="{{route('doctors.index')}}">{{__('admin.DOCTORS')}}</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{__('admin.DOCTOR-DETAILS')}}</li>
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

                <div class="col-xl-4">

                    <div class="card card-defualt">
                        <div class="card-body px-3">
                            <div class="avatar-preview" style="background-image: url({{ asset($item->avatar)}})"></div>

                            <div class="text-center">
                                <h3 class="mt-2">
                                    <b>{{$item->name}}</b>
                                </h3>

                                <div class="my-2">
                                    <small> <b>{{__('admin.HIRING-DATE')}}</b>  {{ date('d M, Y', strtotime($item->hiring_date)) }}</small>
                                </div>
                                
                                @if ($item->disable == 0)
                                    <div class="btn btn-sm btn-success">{{__('admin.ACTIVE')}}</div>
                                @else
                                    <div class="btn btn-sm btn-danger">{{__('admin.BANNED')}}</div>
                                @endif
                                    
                            </div>
                            
                        </div>
                    </div>

                    <div class="card card-defualt">
                        <div class="card-header"><i class="fas fa-file-signature"></i> {{__('admin.CONTRACT')}} </div>
                        <div class="card-body px-3">
                            <div class="row">
                
                                <!--=================  Contract Duration  =================-->
                                <div class="form-group col-md-12 mb-2 {{$text}}">
                                    <label class="font-weight-bold text-uppercase">{{__('admin.CONTRACT-DURATION')}}</label>

                                    <select class="form-control" name="contract_duration" disabled>
                                        <option value="1" @if (isset($item))  @if ($item->contract_duration == 1) selected @endif @endif>{{__('admin.1-YEAR')}}</option>
                                        <option value="2" @if (isset($item))  @if ($item->contract_duration == 2) selected @endif @endif>{{__('admin.2-YEARS')}}</option>
                                        <option value="3" @if (isset($item))  @if ($item->contract_duration == 3) selected @endif @endif>{{__('admin.3-YEARS')}}</option>
                                        <option value="4" @if (isset($item))  @if ($item->contract_duration == 4) selected @endif @endif>{{__('admin.4-YEARS')}}</option>
                                        <option value="5" @if (isset($item))  @if ($item->contract_duration == 5) selected @endif @endif>{{__('admin.5-YEARS')}}</option>
                                    </select>
                                </div>

                                <!--=================  Contract End Date  =================-->
                                <div class="form-group col-md-12 mb-2 {{$text}}">
                                    <label class="font-weight-bold text-uppercase">{{__('admin.CONTRACT-END-DATE')}}</label>
                                    <input type="date" name="contract_end_date" class="@error('contract_end_date') is-invalid @enderror form-control" placeholder="{{__('admin.CONTRACT-END-DATE')}}" value="{{ isset($item) ? $item->contract_end_date : old('contract_end_date') }}" disabled>
                                </div>

                                <!--=================  Contract File  =================-->
                                <div class="form-group col-md-12 mb-2 {{$text}}">
                                    <label class="font-weight-bold text-uppercase">{{__('admin.CONTRACT-FILE')}}</label>

                                    @if (isset($item))
                                        @if ($item->contract_file != '')
                                            <a href="{{asset('storage/'.$item->contract_file)}}" target="_blank" class="btn btn-secondary btn-block mb-3">{{__('admin.SHOW-FILE')}}</a>
                                        @else
                                            <p class="text-center">{{__('admin.NO-FILE')}}</p>
                                        @endif
                                    @endif
                
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="card card-defualt">
                        <div class="card-header"><i class="fas fa-graduation-cap"></i> {{__('admin.CERTIFICATE-FILE')}} </div>
                        <div class="card-body px-3">
                            @if (isset($item))
                                @if ($item->certificate_file != '')
                                    <a href="{{asset('storage/'.$item->certificate_file)}}" target="_blank" class="btn btn-secondary btn-block mb-3">{{__('admin.SHOW-FILE')}}</a>
                                @else
                                    <p class="text-center">{{__('admin.NO-FILE')}}</p>
                                @endif
                            @endif
                        </div>
                    </div>

                </div>

                <div class="col-xl-8">

                    <div class="row justify-content-center">
        
                        <div class="col-xl-6 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">{{__('admin.PATIENTS')}}</h5>
                                    <span class="h2 font-weight-bold mb-0">0</span>
                                    </div>
                                    <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-primary text-white rounded-circle shadow">
                                        <i class="fas fa-syringe"></i>
                                    </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                </p>
                                </div>
                            </div>
                        </div>
        
                        <div class="col-xl-6 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">{{__('admin.PATIENTS')}}</h5>
                                    <span class="h2 font-weight-bold mb-0">0</span>
                                    </div>
                                    <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-primary text-white rounded-circle shadow">
                                        <i class="fas fa-syringe"></i>
                                    </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                </p>
                                </div>
                            </div>
                        </div>
        
                        <div class="col-xl-6 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">{{__('admin.TODAY-APPOINTMENTS')}}</h5>
                                    <span class="h2 font-weight-bold mb-0">0</span>
                                    </div>
                                    <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-danger text-white rounded-circle shadow">
                                        <i class="fas fa-notes-medical"></i>
                                    </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                </p>
                                </div>
                            </div>
                        </div>
        
                        <div class="col-xl-6 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">{{__('admin.TODAY-APPOINTMENTS')}}</h5>
                                    <span class="h2 font-weight-bold mb-0">0</span>
                                    </div>
                                    <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-danger text-white rounded-circle shadow">
                                        <i class="fas fa-notes-medical"></i>
                                    </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                </p>
                                </div>
                            </div>
                        </div>
        
                    </div>

                    <div class="card card-defualt">
                        <div class="card-header"><i class="fa fa-info-circle"></i> {{__('admin.PERSONAL-INFORMATION')}} </div>
                        <div class="card-body">
                                
                                <div class="row">

                                    <!--=================  Name  =================-->
                                    <div class="form-group col-md-6 mb-2 {{$text}}">
                                        <label class="font-weight-bold text-uppercase">{{__('admin.NAME')}}</label>
                                        <input type="text" class="form-control" value="{{ $item->name }}" disabled>
                                    </div>
                
                                    <!--=================  Phone  =================-->
                                    <div class="form-group col-md-6 mb-2 {{$text}}">
                                        <label class="font-weight-bold text-uppercase">{{__('admin.PHONE')}} </label>
                                        <input type="text" class="form-control" value="{{ $item->phone }}" disabled>
                                    </div>

                                </div>
                                <hr class="my-2">

                                <div class="row">

                                    <!--=================  E-mail  =================-->
                                    <div class="form-group col-md-6 mb-2 {{$text}}">
                                        <label class="font-weight-bold text-uppercase">{{__('admin.EMAIL')}}</label>
                                        <input type="text" class="form-control" value="{{ $item->email }}" disabled>
                                    </div>
                
                                    <!--=================  Gender  =================-->
                                    <div class="form-group col-md-6 mb-2 {{$text}}">
                                        <label class="font-weight-bold text-uppercase">{{__('admin.GENDER')}}</label>

                                        <select class="form-control" disabled>
                                            <option value="Male" @if ($item->gender == 'Male') selected @endif>{{__('admin.MALE')}}</option>
                                            <option value="Female" @if ($item->gender == 'Female') selected @endif>{{__('admin.FEMALE')}}</option>
                                        </select>
                                    </div>

                                </div>
                                <hr class="my-2">

                                <div class="row">

                                    <!--=================   Birthdate  =================-->
                                    <div class="form-group col-md-6 mb-2 {{$text}}">
                                        <label class="font-weight-bold text-uppercase">{{__('admin.BIRTHDATE')}}</label>
                                        <input type="date" class="form-control" value="{{ $item->birthdate }}" disabled>
                                    </div>

                                    <!--=================  Nationality  =================-->
                                    <div class="form-group col-md-6 mb-2 {{$text}}">
                                        <label class="font-weight-bold text-uppercase">{{__('admin.NATIONALITY')}}</label>
                                        <input type="text" class="form-control" value="{{ $item->nationality }}" disabled>
                                    </div>

                                </div>

                        </div>
                    </div>

                    <div class="card card-defualt">
                        <div class="card-header"><i class="fas fa-briefcase"></i> {{__('admin.WORK-INFORMATION')}} </div>
                        <div class="card-body">

                                <div class="row">
                
                                    <!--=================  Branches  =================-->
                                    <div class="form-group col-md-6 mb-2 {{$text}}">
                                        <label class="font-weight-bold text-uppercase">{{__('admin.BRANCH')}}</label>
                                        <input type="text" class="form-control" value="{{ $item->branch->name }}" disabled>
                                    </div>
                
                                    <!--=================  Sector  =================-->
                                    <div class="form-group col-md-6 mb-2 {{$text}}">
                                        <label class="font-weight-bold text-uppercase">{{__('admin.SECTOR')}}</label>
                                        <input type="text" class="form-control" value="{{ $item->sector->name }}" disabled>
                                    </div>

                                </div>
                                <hr class="my-2">

                                <div class="row">
                
                                    <!--=================  Working Hours  =================-->
                                    <div class="form-group col-md-6 mb-2 {{$text}}">
                                        <label class="font-weight-bold text-uppercase">{{__('admin.WORKING-HOURS')}}</label>

                                        <select class="form-control" disabled>
                                            <option value="1" @if ($item->working_hours == 1) selected @endif >{{__('admin.1-HOUR')}}</option>
                                            <option value="2" @if ($item->working_hours == 2) selected @endif >{{__('admin.2-HOURS')}}</option>
                                            <option value="3" @if ($item->working_hours == 3) selected @endif >{{__('admin.3-HOURS')}}</option>
                                            <option value="4" @if ($item->working_hours == 4) selected @endif >{{__('admin.4-HOURS')}}</option>
                                            <option value="5" @if ($item->working_hours == 5) selected @endif >{{__('admin.5-HOURS')}}</option>
                                            <option value="6" @if ($item->working_hours == 6) selected @endif >{{__('admin.6-HOURS')}}</option>
                                            <option value="7" @if ($item->working_hours == 7) selected @endif >{{__('admin.7-HOURS')}}</option>
                                            <option value="8" @if ($item->working_hours == 8) selected @endif >{{__('admin.8-HOURS')}}</option>
                                            <option value="9" @if ($item->working_hours == 9) selected @endif >{{__('admin.9-HOURS')}}</option>
                                            <option value="10" @if ($item->working_hours == 10) selected @endif >{{__('admin.10-HOURS')}}</option>
                                            <option value="11" @if ($item->working_hours == 11) selected @endif >{{__('admin.11-HOURS')}}</option>
                                            <option value="12" @if ($item->working_hours == 12) selected @endif >{{__('admin.12-HOURS')}}</option>
                                        </select>
                                    </div>
                
                                    <!--=================  Salary  =================-->
                                    <div class="form-group col-md-6 mb-2 {{$text}}">
                                        <label class="font-weight-bold text-uppercase">{{__('admin.SALARY')}}</label>
                                        <input type="text" class="form-control" value="{{ $item->salary }}" disabled>
                                    </div>

                                </div>
                                <hr class="my-2">

                                <div class="row">

                                    <!--=================  Hiring Date  =================-->
                                    <div class="form-group col-md-6 mb-2 {{$text}}">
                                        <label class="font-weight-bold text-uppercase">{{__('admin.HIRING-DATE')}}</label>
                                        <input type="date" class="form-control" value="{{ $item->hiring_date }}" disabled>
                                    </div>
                
                                    <!--=================  Profit Ratio  =================-->
                                    <div class="form-group col-md-6 mb-2 {{$text}}">
                                        <label class="font-weight-bold text-uppercase">{{__('admin.PROFIT-RATIO')}}</label>

                                        <select class="form-control" disabled>
                                            <option value="0" @if ($item->profit_ratio == 0) selected @endif >0%</option>
                                            <option value="1" @if ($item->profit_ratio == 1) selected @endif >1%</option>
                                            <option value="2" @if ($item->profit_ratio == 2) selected @endif >2%</option>
                                            <option value="3" @if ($item->profit_ratio == 3) selected @endif >3%</option>
                                            <option value="4" @if ($item->profit_ratio == 4) selected @endif >4%</option>
                                            <option value="5" @if ($item->profit_ratio == 5) selected @endif >5%</option>
                                            <option value="6" @if ($item->profit_ratio == 6) selected @endif >6%</option>
                                            <option value="7" @if ($item->profit_ratio == 7) selected @endif >7%</option>
                                            <option value="8" @if ($item->profit_ratio == 8) selected @endif >8%</option>
                                            <option value="9" @if ($item->profit_ratio == 9) selected @endif >9%</option>
                                            <option value="10" @if ($item->profit_ratio == 10) selected @endif >10%</option>
                                            <option value="11" @if ($item->profit_ratio == 11) selected @endif >11%</option>
                                            <option value="12" @if ($item->profit_ratio == 12) selected @endif >12%</option>
                                            <option value="13" @if ($item->profit_ratio == 13) selected @endif >13%</option>
                                            <option value="14" @if ($item->profit_ratio == 14) selected @endif >14%</option>
                                            <option value="15" @if ($item->profit_ratio == 15) selected @endif >15%</option>
                                            <option value="16" @if ($item->profit_ratio == 16) selected @endif >16%</option>
                                            <option value="17" @if ($item->profit_ratio == 17) selected @endif >17%</option>
                                            <option value="18" @if ($item->profit_ratio == 18) selected @endif >18%</option>
                                            <option value="19" @if ($item->profit_ratio == 19) selected @endif >19%</option>
                                            <option value="20" @if ($item->profit_ratio == 20) selected @endif >20%</option>
                                        </select>
                                    </div>

                                </div>
                                <hr class="my-2">

                                <div class="row">

                                    <!--=================  License Number  =================-->
                                    <div class="form-group col-md-12 mb-2 {{$text}}">
                                        <label class="font-weight-bold text-uppercase">{{__('admin.LICENSE-NUMBER')}}</label>
                                        <input type="text" class="form-control" value="{{ $item->license_number }}" disabled>
                                    </div>

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
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
  <script>
        $(document).ready(function() 
        {
            $('.select2').select2();
        });

        function readURL(input) 
        {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (e) 
                {
                    $('.avatar-preview').css('background-image','url('+e.target.result+')');
                };
                
                reader.readAsDataURL(input.files[0]);
            }
        }
        
        $("#avatar").change(function()
        {
            readURL(this);
        });

    </script>
@endsection
