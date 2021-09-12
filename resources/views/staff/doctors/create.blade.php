@extends('layouts.master')

@section('style')
@endsection

@section('content')


    <!-- Header -->
    <div class="header bg-gradient-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">

            <div class="col-lg-12 text-left">
              <nav aria-label="breadcrumb" class="d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('master.DASHBOARD')}}</a></li>
                  <li class="breadcrumb-item"><a href="{{route('staff-doctors.index')}}">{{__('master.DOCTORS')}}</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{ isset($item) ? __('master.EDIT-DOCTOR') : __('master.ADD-NEW-DOCTOR') }}</li>
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

        <form action="{{ isset($item) ? route('staff-doctors.update', $item->id) : route('staff-doctors.store')  }}" method="post" enctype="multipart/form-data">
            @csrf

            @if (isset($item))
               @method('PUT')
            @endif


            <div class="row">

                <div class="col-xl-8">

                    <div class="card card-defualt">
                        <div class="card-header"><i class="fa fa-info-circle"></i> {{__('master.PERSONAL-INFORMATION')}} </div>
                        <div class="card-body">
                                
                                <div class="row">

                                    <!--=================  Name  =================-->
                                    <div class="form-group col-md-6 mb-2 text-left">
                                        <label class="font-weight-bold text-uppercase">{{__('master.NAME')}}</label>
                                        <input type="text" name="name" class="@error('name') is-invalid @enderror form-control" placeholder="{{__('master.NAME')}}" value="{{ isset($item) ? $item->name : old('name') }}" required>
                                    
                                        @error('name')
                                            <div>
                                                <span class="text-danger">{{ $message }}</span>
                                            </div>
                                        @enderror
                    
                                    </div>
                
                                    <!--=================  Phone  =================-->
                                    <div class="form-group col-md-6 mb-2 text-left">
                                        <label class="font-weight-bold text-uppercase">{{__('master.PHONE')}} </label>
                                        <input type="number" name="phone" class="@error('phone') is-invalid @enderror form-control" placeholder="{{__('master.PHONE')}}" value="{{ isset($item) ? $item->phone : old('phone') }}" required>
                                    
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
                                    <div class="form-group col-md-6 mb-2 text-left">
                                        <label class="font-weight-bold text-uppercase">{{__('master.EMAIL')}}</label>
                                        <input type="email" name="email" class="@error('email') is-invalid @enderror form-control" placeholder="{{__('master.EMAIL')}}" value="{{ isset($item) ? $item->email : old('email') }}" >
                                    
                                        @error('email')
                                            <div>
                                                <span class="text-danger">{{ $message }}</span>
                                            </div>
                                        @enderror
                    
                                    </div>
                
                                    <!--=================  Gender  =================-->
                                    <div class="form-group col-md-6 mb-2 text-left">
                                        <label class="font-weight-bold text-uppercase">{{__('master.GENDER')}}</label>

                                        <select class="form-control" name="gender" required>
                                            <option value="Male" @isset($item) @if ($item->gender == "Male") selected @endif @endisset>{{__('master.MALE')}}</option>
                                            <option value="Female" @isset($item) @if ($item->gender == "Female") selected @endif @endisset>{{__('master.FEMALE')}}</option>
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
                                    <div class="form-group col-md-6 mb-2 text-left">
                                        <label class="font-weight-bold text-uppercase">{{__('master.BIRTHDATE')}}</label>
                                        <input type="date" name="birthdate" class="@error('birthdate') is-invalid @enderror form-control" placeholder="{{__('master.BIRTHDATE')}}" value="{{ isset($item) ? $item->birthdate : old('birthdate') }}" >
                                    
                                        @error('birthdate')
                                            <div>
                                                <span class="text-danger">{{ $message }}</span>
                                            </div>
                                        @enderror
                    
                                    </div>

                                    <!--=================  Nationality  =================-->
                                    <div class="form-group col-md-6 mb-2 text-left">
                                        <label class="font-weight-bold text-uppercase">{{__('master.NATIONALITY')}}</label> 
                                        <select class="@error('nationality') is-invalid @enderror form-control selectpicker" name="nationality" data-live-search="true" required>
                                            @foreach ($countries as $country)
                                                <option value="{{$country->country_Nationality}}" @if (isset($item))  @if ($item->nationality == $country->country_Nationality ) selected @endif @endif>{{__('nationality.'.$country->country_Nationality)}}</option>
                                            @endforeach
                                        </select>
                                        
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
                        <div class="card-header"><i class="fas fa-briefcase"></i> {{__('master.WORK-INFORMATION')}} </div>
                        <div class="card-body">

                                <div class="row">
                
                                    <!--=================  Branches  =================-->
                                    <div class="form-group col-md-6 mb-2 text-left">
                                        <label class="font-weight-bold text-uppercase">{{__('master.BRANCH')}}</label>

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
                                    <div class="form-group col-md-6 mb-2 text-left">
                                        <label class="font-weight-bold text-uppercase">{{__('master.SECTOR')}}</label>

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
                                    <div class="form-group col-md-6 mb-2 text-left">
                                        <label class="font-weight-bold text-uppercase">{{__('master.WORKING-HOURS')}}</label>

                                        <select class="form-control" name="working_hours" required>
                                            <option value="1" @if (isset($item))  @if ($item->working_hours == 1) selected @endif @endif>{{__('master.1-HOUR')}}</option>
                                            <option value="2" @if (isset($item))  @if ($item->working_hours == 2) selected @endif @endif>{{__('master.2-HOURS')}}</option>
                                            <option value="3" @if (isset($item))  @if ($item->working_hours == 3) selected @endif @endif>{{__('master.3-HOURS')}}</option>
                                            <option value="4" @if (isset($item))  @if ($item->working_hours == 4) selected @endif @endif>{{__('master.4-HOURS')}}</option>
                                            <option value="5" @if (isset($item))  @if ($item->working_hours == 5) selected @endif @endif>{{__('master.5-HOURS')}}</option>
                                            <option value="6" @if (isset($item))  @if ($item->working_hours == 6) selected @endif @endif>{{__('master.6-HOURS')}}</option>
                                            <option value="7" @if (isset($item))  @if ($item->working_hours == 7) selected @endif @endif>{{__('master.7-HOURS')}}</option>
                                            <option value="8" @if (isset($item))  @if ($item->working_hours == 8) selected @endif @endif>{{__('master.8-HOURS')}}</option>
                                            <option value="9" @if (isset($item))  @if ($item->working_hours == 9) selected @endif @endif>{{__('master.9-HOURS')}}</option>
                                            <option value="10" @if (isset($item))  @if ($item->working_hours == 10) selected @endif @endif>{{__('master.10-HOURS')}}</option>
                                            <option value="11" @if (isset($item))  @if ($item->working_hours == 11) selected @endif @endif>{{__('master.11-HOURS')}}</option>
                                            <option value="12" @if (isset($item))  @if ($item->working_hours == 12) selected @endif @endif>{{__('master.12-HOURS')}}</option>
                                        </select>

                                        @error('working_hours')
                                            <div>
                                                <span class="text-danger">{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                
                                    <!--=================  Salary  =================-->
                                    <div class="form-group col-md-6 mb-2 text-left">
                                        <label class="font-weight-bold text-uppercase">{{__('master.SALARY')}}</label>
                                        <input type="number" step="0.1" name="salary" class="@error('salary') is-invalid @enderror form-control" placeholder="{{__('master.SALARY')}}" value="{{ isset($item) ? $item->salary : old('salary') }}" required>

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
                                    <div class="form-group col-md-6 mb-2 text-left">
                                        <label class="font-weight-bold text-uppercase">{{__('master.HIRING-DATE')}}</label>
                                        <input type="date" name="hiring_date" class="@error('hiring_date') is-invalid @enderror form-control" placeholder="{{__('master.HIRING-DATE')}}" value="{{ isset($item) ? $item->hiring_date : old('hiring_date') }}" required>
                                    
                                        @error('hiring_date')
                                            <div>
                                                <span class="text-danger">{{ $message }}</span>
                                            </div>
                                        @enderror
                    
                                    </div>
                
                                    <!--=================  Profit Ratio  =================-->
                                    <div class="form-group col-md-6 mb-2 text-left">
                                        <label class="font-weight-bold text-uppercase">{{__('master.PROFIT-RATIO')}}</label>

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
                                    <div class="form-group col-md-12 mb-2 text-left">
                                        <label class="font-weight-bold text-uppercase">{{__('master.LICENSE-NUMBER')}}</label>
                                        <input type="text" name="license_number" class="@error('license_number') is-invalid @enderror form-control" placeholder="{{__('master.LICENSE-NUMBER')}}" value="{{ isset($item) ? $item->license_number : old('license_number') }}" required>
                                    
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
                            <div class="card-header"><i class="fas fa-lock"></i> {{__('master.PASSWORD')}} </div>
                            <div class="card-body">
                                <div class="row">

                                    <!--=================  Password  =================-->
                                    <div class="form-group col-md-6 mb-2 text-left">
                                        <label class="form-control-label" for="input-phone">{{__('master.PASSWORD')}}</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
            
                                    <!--================= Confirm Password  =================-->
                                    <div class="form-group col-md-6 mb-2 text-left">
                                        <label for="password-confirm" class="form-control-label">{{__('master.CONFIRM-PASSWORD')}}</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
            
                                </div>
                                <div class="my-2 text-info text-left">
                                    <small> {!! __('master.PASSWORD-INFO') !!} </small> 
                                </div>
                            </div>
                        </div>  
                    @endisset

                </div>

                <div class="col-xl-4">

                    <div class="card card-defualt">
                        <div class="card-header"><i class="far fa-id-badge"></i> {{__('master.PROFILE-PICTURE')}} </div>
                        <div class="card-body px-3">
                            <div class="avatar-preview" style="background-image: url({{ isset($item) ?  asset($item->avatar)  : asset('images/avatar.png') }})"></div>
                            <div class="my-2 text-left">
                              <small> {!! __('master.IMAGE-INFO') !!} </small> 
                            </div>
                            <input class="btn-info form-control form-control-sm" type="file" accept="image/*" id="avatar" name="avatar" multiple="false" />
                        </div>
                    </div>

                    <div class="card card-defualt">
                        <div class="card-header"><i class="fas fa-file-signature"></i> {{__('master.CONTRACT')}} </div>
                        <div class="card-body px-3">
                            <div class="row">
                
                                <!--=================  Contract Duration  =================-->
                                <div class="form-group col-md-12 mb-2 text-left">
                                    <label class="font-weight-bold text-uppercase">{{__('master.CONTRACT-DURATION')}}</label>

                                    <select class="form-control" name="contract_duration" required>
                                        <option value="1" @if (isset($item))  @if ($item->contract_duration == 1) selected @endif @endif>{{__('master.1-YEAR')}}</option>
                                        <option value="2" @if (isset($item))  @if ($item->contract_duration == 2) selected @endif @endif>{{__('master.2-YEARS')}}</option>
                                        <option value="3" @if (isset($item))  @if ($item->contract_duration == 3) selected @endif @endif>{{__('master.3-YEARS')}}</option>
                                        <option value="4" @if (isset($item))  @if ($item->contract_duration == 4) selected @endif @endif>{{__('master.4-YEARS')}}</option>
                                        <option value="5" @if (isset($item))  @if ($item->contract_duration == 5) selected @endif @endif>{{__('master.5-YEARS')}}</option>
                                    </select>

                                    @error('contract_duration')
                                        <div>
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>

                                <!--=================  Contract End Date  =================-->
                                <div class="form-group col-md-12 mb-2 text-left">
                                    <label class="font-weight-bold text-uppercase">{{__('master.CONTRACT-END-DATE')}}</label>
                                    <input type="date" name="contract_end_date" class="@error('contract_end_date') is-invalid @enderror form-control" placeholder="{{__('master.CONTRACT-END-DATE')}}" value="{{ isset($item) ? $item->contract_end_date : old('contract_end_date') }}" required>
                                
                                    @error('contract_end_date')
                                        <div>
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                    @enderror
                
                                </div>

                                <!--=================  Contract File  =================-->
                                <div class="form-group col-md-12 mb-2 text-left">
                                    <label class="font-weight-bold text-uppercase">{{__('master.CONTRACT-FILE')}}</label>

                                    @if (isset($item))
                                        @if ($item->contract_file != '')
                                            <a href="{{asset('storage/'.$item->contract_file)}}" target="_blank" class="btn btn-secondary btn-block mb-3">{{__('master.SHOW-FILE')}}</a>
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
                        <div class="card-header"><i class="fas fa-graduation-cap"></i> {{__('master.CERTIFICATE-FILE')}} </div>
                        <div class="card-body px-3">
                            @if (isset($item))
                                @if ($item->certificate_file != '')
                                    <a href="{{asset('storage/'.$item->certificate_file)}}" target="_blank" class="btn btn-secondary btn-block mb-3">{{__('master.SHOW-FILE')}}</a>
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
                        <button type="submit" class="btn btn-success btn-block">{{ isset($item) ?  __('master.SAVE'):__('master.ADD') }}</button>
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
