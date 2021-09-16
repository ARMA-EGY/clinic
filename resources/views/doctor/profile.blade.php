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
                  <li class="breadcrumb-item active" aria-current="page">Profile</li>
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
    <div class="container-fluid mt--6">

            <div class="row">

                <div class="col-xl-4">

                    <div class="card card-defualt">
                        <div class="card-body px-3">
                        <div class="avatar-preview" style="background-image: url({{   asset($item->avatar)  }})"></div>
                            <div class="my-2 text-left">
                              <small> {!! __('master.IMAGE-INFO') !!} </small> 
                            </div>
                            <input class="btn-info form-control form-control-sm" type="file" accept="image/*" id="avatar" name="avatar" multiple="false" />
                            <div class="text-center">
                                <h3 class="mt-2">
                                    <b>{{$item->name}}</b>
                                </h3>

                                <div class="my-2">
                                    <small> <b>{{__('master.HIRING-DATE')}}</b>  {{ date('d M, Y', strtotime($item->hiring_date)) }}</small>
                                </div>
                                
                                @if ($item->disable == 0)
                                    <div class="btn btn-sm btn-success">{{__('master.ACTIVE')}}</div>
                                @else
                                    <div class="btn btn-sm btn-danger">{{__('master.BANNED')}}</div>
                                @endif
                                    
                            </div>
                            
                        </div>
                    </div>

                    <div class="card card-defualt">
                        <div class="card-header"><i class="fas fa-file-signature"></i> {{__('master.CONTRACT')}} </div>
                        <div class="card-body px-3">
                            <div class="row">
                
                                <!--=================  Contract Duration  =================-->
                                <div class="form-group col-md-12 mb-2 text-left">
                                    <label class="font-weight-bold text-uppercase">{{__('master.CONTRACT-DURATION')}}</label>

                                    <select class="form-control" name="contract_duration" disabled>
                                        <option value="1" @if (isset($item))  @if ($item->contract_duration == 1) selected @endif @endif>{{__('master.1-YEAR')}}</option>
                                        <option value="2" @if (isset($item))  @if ($item->contract_duration == 2) selected @endif @endif>{{__('master.2-YEARS')}}</option>
                                        <option value="3" @if (isset($item))  @if ($item->contract_duration == 3) selected @endif @endif>{{__('master.3-YEARS')}}</option>
                                        <option value="4" @if (isset($item))  @if ($item->contract_duration == 4) selected @endif @endif>{{__('master.4-YEARS')}}</option>
                                        <option value="5" @if (isset($item))  @if ($item->contract_duration == 5) selected @endif @endif>{{__('master.5-YEARS')}}</option>
                                    </select>
                                </div>

                                <!--=================  Contract End Date  =================-->
                                <div class="form-group col-md-12 mb-2 text-left">
                                    <label class="font-weight-bold text-uppercase">{{__('master.CONTRACT-END-DATE')}}</label>
                                    <input type="date" name="contract_end_date" class="@error('contract_end_date') is-invalid @enderror form-control" placeholder="{{__('master.CONTRACT-END-DATE')}}" value="{{ isset($item) ? $item->contract_end_date : old('contract_end_date') }}" disabled>
                                </div>

                                <!--=================  Contract File  =================-->
                                <div class="form-group col-md-12 mb-2 text-left">
                                    <label class="font-weight-bold text-uppercase">{{__('master.CONTRACT-FILE')}}</label>

                                    @if (isset($item))
                                        @if ($item->contract_file != '')
                                            <a href="{{asset('storage/'.$item->contract_file)}}" target="_blank" class="btn btn-secondary btn-block mb-3">{{__('master.SHOW-FILE')}}</a>
                                        @else
                                            <p class="text-center">{{__('master.NO-FILE')}}</p>
                                        @endif
                                    @endif
                
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
                                @else
                                    <p class="text-center">{{__('master.NO-FILE')}}</p>
                                @endif
                            @endif
                        </div>
                    </div>

                </div>

                <div class="col-xl-8">

                    <div class="row justify-content-center">
        
        
                    </div>

                    <div class="card card-defualt">
                        <div class="card-header"><i class="fa fa-info-circle"></i> {{__('master.PERSONAL-INFORMATION')}} </div>
                        <div class="card-body">
                                
                                <div class="row">

                                    <!--=================  Name  =================-->
                                    <div class="form-group col-md-6 mb-2 text-left">
                                        <label class="font-weight-bold text-uppercase">{{__('master.NAME')}}</label>
                                        <input type="text" class="form-control" value="{{ $item->name }}" disabled>
                                    </div>
                
                                    <!--=================  Phone  =================-->
                                    <div class="form-group col-md-6 mb-2 text-left">
                                        <label class="font-weight-bold text-uppercase">{{__('master.PHONE')}} </label>
                                        <input type="text" class="form-control" value="{{ $item->phone }}" disabled>
                                    </div>

                                </div>
                                <hr class="my-2">

                                <div class="row">

                                    <!--=================  E-mail  =================-->
                                    <div class="form-group col-md-6 mb-2 text-left">
                                        <label class="font-weight-bold text-uppercase">{{__('master.EMAIL')}}</label>
                                        <input type="text" class="form-control" value="{{ $item->email }}" disabled>
                                    </div>
                
                                    <!--=================  Gender  =================-->
                                    <div class="form-group col-md-6 mb-2 text-left">
                                        <label class="font-weight-bold text-uppercase">{{__('master.GENDER')}}</label>

                                        <select class="form-control" disabled>
                                            <option value="Male" @if ($item->gender == 'Male') selected @endif>{{__('master.MALE')}}</option>
                                            <option value="Female" @if ($item->gender == 'Female') selected @endif>{{__('master.FEMALE')}}</option>
                                        </select>
                                    </div>

                                </div>
                                <hr class="my-2">

                                <div class="row">

                                    <!--=================   Birthdate  =================-->
                                    <div class="form-group col-md-6 mb-2 text-left">
                                        <label class="font-weight-bold text-uppercase">{{__('master.BIRTHDATE')}}</label>
                                        <input type="date" class="form-control" value="{{ $item->birthdate }}" disabled>
                                    </div>

                                    <!--=================  Nationality  =================-->
                                    <div class="form-group col-md-6 mb-2 text-left">
                                        <label class="font-weight-bold text-uppercase">{{__('master.NATIONALITY')}}</label>
                                        <input type="text" class="form-control" value="{{ $item->nationality }}" disabled>
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
                                        <input type="text" class="form-control" value="{{ $item->branch->name }}" disabled>
                                    </div>
                
                                    <!--=================  Sector  =================-->
                                    <div class="form-group col-md-6 mb-2 text-left">
                                        <label class="font-weight-bold text-uppercase">{{__('master.SECTOR')}}</label>
                                        <input type="text" class="form-control" value="{{ $item->sector->name }}" disabled>
                                    </div>

                                </div>
                                <hr class="my-2">

                                <div class="row">
                
                                    <!--=================  Working Hours  =================-->
                                    <div class="form-group col-md-6 mb-2 text-left">
                                        <label class="font-weight-bold text-uppercase">{{__('master.WORKING-HOURS')}}</label>

                                        <select class="form-control" disabled>
                                            <option value="1" @if ($item->working_hours == 1) selected @endif >{{__('master.1-HOUR')}}</option>
                                            <option value="2" @if ($item->working_hours == 2) selected @endif >{{__('master.2-HOURS')}}</option>
                                            <option value="3" @if ($item->working_hours == 3) selected @endif >{{__('master.3-HOURS')}}</option>
                                            <option value="4" @if ($item->working_hours == 4) selected @endif >{{__('master.4-HOURS')}}</option>
                                            <option value="5" @if ($item->working_hours == 5) selected @endif >{{__('master.5-HOURS')}}</option>
                                            <option value="6" @if ($item->working_hours == 6) selected @endif >{{__('master.6-HOURS')}}</option>
                                            <option value="7" @if ($item->working_hours == 7) selected @endif >{{__('master.7-HOURS')}}</option>
                                            <option value="8" @if ($item->working_hours == 8) selected @endif >{{__('master.8-HOURS')}}</option>
                                            <option value="9" @if ($item->working_hours == 9) selected @endif >{{__('master.9-HOURS')}}</option>
                                            <option value="10" @if ($item->working_hours == 10) selected @endif >{{__('master.10-HOURS')}}</option>
                                            <option value="11" @if ($item->working_hours == 11) selected @endif >{{__('master.11-HOURS')}}</option>
                                            <option value="12" @if ($item->working_hours == 12) selected @endif >{{__('master.12-HOURS')}}</option>
                                        </select>
                                    </div>
                
                                    <!--=================  Salary  =================-->
                                    <div class="form-group col-md-6 mb-2 text-left">
                                        <label class="font-weight-bold text-uppercase">{{__('master.SALARY')}}</label>
                                        <input type="text" class="form-control" value="{{ $item->salary }}" disabled>
                                    </div>

                                </div>
                                <hr class="my-2">

                                <div class="row">

                                    <!--=================  Hiring Date  =================-->
                                    <div class="form-group col-md-6 mb-2 text-left">
                                        <label class="font-weight-bold text-uppercase">{{__('master.HIRING-DATE')}}</label>
                                        <input type="date" class="form-control" value="{{ $item->hiring_date }}" disabled>
                                    </div>
                
                                    <!--=================  Profit Ratio  =================-->
                                    <div class="form-group col-md-6 mb-2 text-left">
                                        <label class="font-weight-bold text-uppercase">{{__('master.PROFIT-RATIO')}}</label>

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
                                    <div class="form-group col-md-12 mb-2 text-left">
                                        <label class="font-weight-bold text-uppercase">{{__('master.LICENSE-NUMBER')}}</label>
                                        <input type="text" class="form-control" value="{{ $item->license_number }}" disabled>
                                    </div>

                                </div>

                        </div>
                    </div>




                    <div class="card card-defualt">
                        <div class="card-header"><i class="fas fa-briefcase"></i> {{__('master.EXPENSES')}} </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <!-- Projects table -->
                                <table class="table align-items-center table-flush display nowrap" id="example">
                                    <thead class="thead-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col" class="sort" >{{__('master.PRICE')}}</th>
                                        <th scope="col" class="sort" >{{__('master.DATE')}} </th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach ($expenses as $expense)

                                    <tr class="parent">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $expense->price }} </td>
                                        <td>{{ $expense->month_year }} </td>
                                    </tr>

                                    @endforeach
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>













                    <div class="card card-defualt">
                        <div class="card-header"><i class="fas fa-briefcase"></i> Change Password </div>
                        <div class="card-body">

                        <form method="post" action="{{ route('doctor-changepassword') }}" class="">
                            @csrf
                            <!-- password -->
                            <h6 class="heading-small text-muted mb-4 ">Change Password</h6>
                            <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="form-control-label" for="input-password">Password</label>
                                    <input id="input-password" class="form-control" name="password" type="password" required>
                                    @error('password')
                                    <div>
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                    @enderror
                                </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="form-control-label" for="input-password2">Confirm Password</label>
                                    <input id="input-password2" class="form-control" name="password_confirmation" type="password" required>
                                </div>
                                </div>
                            </div>
                            </div>
                            <hr class="my-4" />
                            <!-- Save -->
                            <div class="col-12 ">
                            <button type="submit" class="btn btn-sm btn-danger submit">Save Changes</button>
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
