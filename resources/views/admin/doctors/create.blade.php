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

        <form action="{{ isset($item) ? route('doctors.update', $item->id) : route('doctors.store')  }}" method="post" enctype="multipart/form-data">
            @csrf

            @if (isset($item))
               @method('PUT')
            @endif


            <div class="row">

                <div class="col-xl-8">

                    <div class="card card-defualt">
                        <div class="card-header"><i class="fa fa-info-circle"></i> {{__('admin.PERSONAL-INFORMATION')}} </div>
                        <div class="card-body">
                                
                                <div class="row">

                                    <!--=================  Name  =================-->
                                    <div class="form-group col-md-6 mb-2 {{$text}}">
                                        <label class="font-weight-bold text-uppercase">{{__('admin.NAME')}}</label>
                                        <input type="text" name="name" class="@error('name') is-invalid @enderror form-control" placeholder="{{__('admin.NAME')}}" value="{{ isset($item) ? $item->name : old('name') }}" required>
                                    
                                        @error('name')
                                            <div>
                                                <span class="text-danger">{{ $message }}</span>
                                            </div>
                                        @enderror
                    
                                    </div>
                
                                    <!--=================  Phone  =================-->
                                    <div class="form-group col-md-6 mb-2 {{$text}}">
                                        <label class="font-weight-bold text-uppercase">{{__('admin.PHONE')}} </label>
                                        <input type="number" name="phone" class="@error('phone') is-invalid @enderror form-control" placeholder="{{__('admin.PHONE')}}" value="{{ isset($item) ? $item->phone : old('phone') }}" required>
                                    
                                        @error('phone')
                                            <div>
                                                <span class="text-danger">{{ $message }}</span>
                                            </div>
                                        @enderror
                    
                                    </div>

                                </div>
                                <hr class="my-2">

                                <div class="row">

                                    <!--=================  E-mail  =================-->
                                    <div class="form-group col-md-6 mb-2 {{$text}}">
                                        <label class="font-weight-bold text-uppercase">{{__('admin.EMAIL')}}</label>
                                        <input type="email" name="email" class="@error('email') is-invalid @enderror form-control" placeholder="{{__('admin.EMAIL')}}" value="{{ isset($item) ? $item->email : old('email') }}" >
                                    
                                        @error('email')
                                            <div>
                                                <span class="text-danger">{{ $message }}</span>
                                            </div>
                                        @enderror
                    
                                    </div>
                
                                    <!--=================  Gender  =================-->
                                    <div class="form-group col-md-6 mb-2 {{$text}}">
                                        <label class="font-weight-bold text-uppercase">{{__('admin.GENDER')}}</label>

                                        <select class="form-control" name="gender" required>
                                            <option value="Male">{{__('admin.MALE')}}</option>
                                            <option value="Female">{{__('admin.FEMALE')}}</option>
                                        </select>

                                        @error('gender')
                                            <div>
                                                <span class="text-danger">{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>

                                </div>
                                <hr class="my-2">

                                <div class="row">

                                    <!--=================   Birthdate  =================-->
                                    <div class="form-group col-md-6 mb-2 {{$text}}">
                                        <label class="font-weight-bold text-uppercase">{{__('admin.BIRTHDATE')}}</label>
                                        <input type="date" name="birthdate" class="@error('birthdate') is-invalid @enderror form-control" placeholder="{{__('admin.BIRTHDATE')}}" value="{{ isset($item) ? $item->birthdate : old('birthdate') }}" >
                                    
                                        @error('birthdate')
                                            <div>
                                                <span class="text-danger">{{ $message }}</span>
                                            </div>
                                        @enderror
                    
                                    </div>

                                    <!--=================  Nationality  =================-->
                                    <div class="form-group col-md-6 mb-2 {{$text}}">
                                        <label class="font-weight-bold text-uppercase">{{__('admin.NATIONALITY')}}</label>
                                        <input type="text" name="nationality" class="@error('nationality') is-invalid @enderror form-control" placeholder="{{__('admin.NATIONALITY')}}" value="{{ isset($item) ? $item->nationality : old('nationality') }}" >
                                    
                                        @error('nationality')
                                            <div>
                                                <span class="text-danger">{{ $message }}</span>
                                            </div>
                                        @enderror
                    
                                    </div>

                                </div>

                        </div>
                    </div>

                    <div class="card card-defualt">
                        <div class="card-header"><i class="fas fa-briefcase"></i> {{__('admin.WORK-INFORMATION')}} </div>
                        <div class="card-body">

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
                
                                    <!--=================  Branches  =================-->
                                    <div class="form-group col-md-6 mb-2 {{$text}}">
                                        <label class="font-weight-bold text-uppercase">{{__('admin.BRANCH')}}</label>

                                        <select class="form-control" name="branch_id" required>
                                            @foreach ($branches as $branch)
                                                <option value="{{$branch->id}}" @if (isset($item))  @if ($item->branch_id == $branch->id ) selected @endif @endif>{{$branch->name}}</option>
                                            @endforeach
                                        </select>

                                        @error('branch_id')
                                            <div>
                                                <span class="text-danger">{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                
                                    <!--=================  Sector  =================-->
                                    <div class="form-group col-md-6 mb-2 {{$text}}">
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
                                <hr class="my-2">

                                <div class="row">
                
                                    <!--=================  Working Hours  =================-->
                                    <div class="form-group col-md-6 mb-2 {{$text}}">
                                        <label class="font-weight-bold text-uppercase">{{__('admin.WORKING-HOURS')}}</label>

                                        <select class="form-control" name="working_hours" required>
                                            <option value="1" @if (isset($item))  @if ($item->working_hours == 1) selected @endif @endif>{{__('admin.1-HOUR')}}</option>
                                            <option value="2" @if (isset($item))  @if ($item->working_hours == 2) selected @endif @endif>{{__('admin.2-HOURS')}}</option>
                                            <option value="3" @if (isset($item))  @if ($item->working_hours == 3) selected @endif @endif>{{__('admin.3-HOURS')}}</option>
                                            <option value="4" @if (isset($item))  @if ($item->working_hours == 4) selected @endif @endif>{{__('admin.4-HOURS')}}</option>
                                            <option value="5" @if (isset($item))  @if ($item->working_hours == 5) selected @endif @endif>{{__('admin.5-HOURS')}}</option>
                                            <option value="6" @if (isset($item))  @if ($item->working_hours == 6) selected @endif @endif>{{__('admin.6-HOURS')}}</option>
                                            <option value="7" @if (isset($item))  @if ($item->working_hours == 7) selected @endif @endif>{{__('admin.7-HOURS')}}</option>
                                            <option value="8" @if (isset($item))  @if ($item->working_hours == 8) selected @endif @endif>{{__('admin.8-HOURS')}}</option>
                                            <option value="9" @if (isset($item))  @if ($item->working_hours == 9) selected @endif @endif>{{__('admin.9-HOURS')}}</option>
                                            <option value="10" @if (isset($item))  @if ($item->working_hours == 10) selected @endif @endif>{{__('admin.10-HOURS')}}</option>
                                            <option value="11" @if (isset($item))  @if ($item->working_hours == 11) selected @endif @endif>{{__('admin.11-HOURS')}}</option>
                                            <option value="12" @if (isset($item))  @if ($item->working_hours == 12) selected @endif @endif>{{__('admin.12-HOURS')}}</option>
                                        </select>

                                        @error('working_hours')
                                            <div>
                                                <span class="text-danger">{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                
                                    <!--=================  Salary  =================-->
                                    <div class="form-group col-md-6 mb-2 {{$text}}">
                                        <label class="font-weight-bold text-uppercase">{{__('admin.SALARY')}}</label>
                                        <input type="number" step="0.1" name="salary" class="@error('salary') is-invalid @enderror form-control" placeholder="{{__('admin.SALARY')}}" value="{{ isset($item) ? $item->salary : old('salary') }}" required>

                                        @error('salary')
                                            <div>
                                                <span class="text-danger">{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>

                                </div>
                                <hr class="my-2">

                                <div class="row">

                                    <!--=================  Hiring Date  =================-->
                                    <div class="form-group col-md-6 mb-2 {{$text}}">
                                        <label class="font-weight-bold text-uppercase">{{__('admin.HIRING-DATE')}}</label>
                                        <input type="date" name="hiring_date" class="@error('hiring_date') is-invalid @enderror form-control" placeholder="{{__('admin.HIRING-DATE')}}" value="{{ isset($item) ? $item->hiring_date : old('hiring_date') }}" required>
                                    
                                        @error('hiring_date')
                                            <div>
                                                <span class="text-danger">{{ $message }}</span>
                                            </div>
                                        @enderror
                    
                                    </div>
                
                                    <!--=================  Profit Ratio  =================-->
                                    <div class="form-group col-md-6 mb-2 {{$text}}">
                                        <label class="font-weight-bold text-uppercase">{{__('admin.PROFIT-RATIO')}}</label>

                                        <select class="form-control" name="profit_ratio" required>
                                            <option value="0" @if (isset($item))  @if ($item->profit_ratio == 0) selected @endif @endif>0%</option>
                                            <option value="1" @if (isset($item))  @if ($item->profit_ratio == 1) selected @endif @endif>1%</option>
                                            <option value="2" @if (isset($item))  @if ($item->profit_ratio == 2) selected @endif @endif>2%</option>
                                            <option value="3" @if (isset($item))  @if ($item->profit_ratio == 3) selected @endif @endif>3%</option>
                                            <option value="4" @if (isset($item))  @if ($item->profit_ratio == 4) selected @endif @endif>4%</option>
                                            <option value="5" @if (isset($item))  @if ($item->profit_ratio == 5) selected @endif @endif>5%</option>
                                            <option value="6" @if (isset($item))  @if ($item->profit_ratio == 6) selected @endif @endif>6%</option>
                                            <option value="7" @if (isset($item))  @if ($item->profit_ratio == 7) selected @endif @endif>7%</option>
                                            <option value="8" @if (isset($item))  @if ($item->profit_ratio == 8) selected @endif @endif>8%</option>
                                            <option value="9" @if (isset($item))  @if ($item->profit_ratio == 9) selected @endif @endif>9%</option>
                                            <option value="10" @if (isset($item))  @if ($item->profit_ratio == 10) selected @endif @endif>10%</option>
                                            <option value="11" @if (isset($item))  @if ($item->profit_ratio == 11) selected @endif @endif>11%</option>
                                            <option value="12" @if (isset($item))  @if ($item->profit_ratio == 12) selected @endif @endif>12%</option>
                                            <option value="13" @if (isset($item))  @if ($item->profit_ratio == 13) selected @endif @endif>13%</option>
                                            <option value="14" @if (isset($item))  @if ($item->profit_ratio == 14) selected @endif @endif>14%</option>
                                            <option value="15" @if (isset($item))  @if ($item->profit_ratio == 15) selected @endif @endif>15%</option>
                                            <option value="16" @if (isset($item))  @if ($item->profit_ratio == 16) selected @endif @endif>16%</option>
                                            <option value="17" @if (isset($item))  @if ($item->profit_ratio == 17) selected @endif @endif>17%</option>
                                            <option value="18" @if (isset($item))  @if ($item->profit_ratio == 18) selected @endif @endif>18%</option>
                                            <option value="19" @if (isset($item))  @if ($item->profit_ratio == 19) selected @endif @endif>19%</option>
                                            <option value="20" @if (isset($item))  @if ($item->profit_ratio == 20) selected @endif @endif>20%</option>
                                        </select>

                                        @error('profit_ratio')
                                            <div>
                                                <span class="text-danger">{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>

                                </div>
                                <hr class="my-2">

                                <div class="row">

                                    <!--=================  License Number  =================-->
                                    <div class="form-group col-md-12 mb-2 {{$text}}">
                                        <label class="font-weight-bold text-uppercase">{{__('admin.LICENSE-NUMBER')}}</label>
                                        <input type="text" name="license_number" class="@error('license_number') is-invalid @enderror form-control" placeholder="{{__('admin.LICENSE-NUMBER')}}" value="{{ isset($item) ? $item->license_number : old('license_number') }}" required>
                                    
                                        @error('license_number')
                                            <div>
                                                <span class="text-danger">{{ $message }}</span>
                                            </div>
                                        @enderror
                    
                                    </div>

                                </div>

                        </div>
                    </div>

                    @isset($item)

                    @else
                        <div class="card card-defualt">
                            <div class="card-header"><i class="fas fa-lock"></i> {{__('admin.PASSWORD')}} </div>
                            <div class="card-body">
                                <div class="row">

                                    <!--=================  Password  =================-->
                                    <div class="form-group col-md-6 mb-2 {{$text}}">
                                        <label class="form-control-label" for="input-phone">{{__('admin.PASSWORD')}}</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
            
                                    <!--================= Confirm Password  =================-->
                                    <div class="form-group col-md-6 mb-2 {{$text}}">
                                        <label for="password-confirm" class="form-control-label">{{__('admin.CONFIRM-PASSWORD')}}</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
            
                                </div>
                                <div class="my-2 text-info {{$text}}">
                                    <small> {!! __('admin.PASSWORD-INFO') !!} </small> 
                                </div>
                            </div>
                        </div>  
                    @endisset

                </div>

                <div class="col-xl-4">

                    <div class="card card-defualt">
                        <div class="card-header"><i class="far fa-id-badge"></i> {{__('admin.PROFILE-PICTURE')}} </div>
                        <div class="card-body px-3">
                            <div class="avatar-preview" style="background-image: url({{ isset($item) ?  asset($item->avatar)  : asset('images/avatar.png') }})"></div>
                            <div class="my-2 {{$text}}">
                              <small> {!! __('admin.IMAGE-INFO') !!} </small> 
                            </div>
                            <input class="btn-info form-control form-control-sm" type="file" accept="image/*" id="avatar" name="avatar" multiple="false" />
                        </div>
                    </div>

                    <div class="card card-defualt">
                        <div class="card-header"><i class="fas fa-file-signature"></i> {{__('admin.CONTRACT')}} </div>
                        <div class="card-body px-3">
                            <div class="row">
                
                                <!--=================  Contract Duration  =================-->
                                <div class="form-group col-md-12 mb-2 {{$text}}">
                                    <label class="font-weight-bold text-uppercase">{{__('admin.CONTRACT-DURATION')}}</label>

                                    <select class="form-control" name="contract_duration" required>
                                        <option value="1" @if (isset($item))  @if ($item->contract_duration == 1) selected @endif @endif>{{__('admin.1-YEAR')}}</option>
                                        <option value="2" @if (isset($item))  @if ($item->contract_duration == 2) selected @endif @endif>{{__('admin.2-YEARS')}}</option>
                                        <option value="3" @if (isset($item))  @if ($item->contract_duration == 3) selected @endif @endif>{{__('admin.3-YEARS')}}</option>
                                        <option value="4" @if (isset($item))  @if ($item->contract_duration == 4) selected @endif @endif>{{__('admin.4-YEARS')}}</option>
                                        <option value="5" @if (isset($item))  @if ($item->contract_duration == 5) selected @endif @endif>{{__('admin.5-YEARS')}}</option>
                                    </select>

                                    @error('contract_duration')
                                        <div>
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>

                                <!--=================  Contract End Date  =================-->
                                <div class="form-group col-md-12 mb-2 {{$text}}">
                                    <label class="font-weight-bold text-uppercase">{{__('admin.CONTRACT-END-DATE')}}</label>
                                    <input type="date" name="contract_end_date" class="@error('contract_end_date') is-invalid @enderror form-control" placeholder="{{__('admin.CONTRACT-END-DATE')}}" value="{{ isset($item) ? $item->contract_end_date : old('contract_end_date') }}" required>
                                
                                    @error('contract_end_date')
                                        <div>
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                    @enderror
                
                                </div>

                                <!--=================  Contract File  =================-->
                                <div class="form-group col-md-12 mb-2 {{$text}}">
                                    <label class="font-weight-bold text-uppercase">{{__('admin.CONTRACT-FILE')}}</label>

                                    @if (isset($item))
                                        @if ($item->contract_file != '')
                                            <a href="{{asset('storage/'.$item->contract_file)}}" target="_blank" class="btn btn-secondary btn-block mb-3">{{__('admin.SHOW-FILE')}}</a>
                                        @endif
                                    @endif

                                    <input class="btn-info form-control form-control-sm" type="file" name="contract_file" multiple="false" />
                                
                                    @error('contract_file')
                                        <div>
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                    @enderror
                
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
                                @endif
                            @endif
                            <input class="btn-info form-control form-control-sm" type="file" name="certificate_file" multiple="false" />
                        </div>
                    </div>

                </div>

            </div>

            <div class="card card-defualt">
                <div class="card-body">
                    <div class="form-group mb-0">
                        <button type="submit" class="btn btn-success btn-block">{{ isset($item) ?  __('admin.SAVE'):__('admin.ADD') }}</button>
                    </div>
                </div>
            </div>

        </form>
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
