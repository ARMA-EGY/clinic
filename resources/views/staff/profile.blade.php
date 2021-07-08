@extends('layouts.master')

@section('style')
@endsection

@section('content')


    <!-- Header -->
    <div class="header bg-gradient-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">

            <div class="col-lg-6 col-12 text-left">
              <nav aria-label="breadcrumb" class="d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('master.DASHBOARD')}}</a></li>
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

                <div class="col-xl-4">

                    <div class="card card-defualt">
                      <div class="card-header"><i class="far fa-id-badge"></i> {{__('master.PROFILE-PICTURE')}} </div>
                        <div class="card-body px-3">
                            <div class="avatar-preview" style="background-image: url({{ asset(Auth::user()->avatar)}})"></div>
        
                            <div class="my-2 text-left">
                              <small> {!! __('master.IMAGE-INFO') !!} </small> 
                            </div>
        
                            <form class="profile_picture_form">
                              @csrf
                              <input class="d-none" type="file" accept="image/*" id="avatar" name="avatar" multiple="false" />
                              <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                              <label for="avatar" class="btn btn-info btn-block btn-sm"><i class="fa fa-image"></i> {{__('master.CHANGE-PROFILE-PICTURE')}}</label>
                            </form>
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
                                        <option value="1" @if (Auth::user()->contract_duration == 1) selected @endif >{{__('master.1-YEAR')}}</option>
                                        <option value="2" @if (Auth::user()->contract_duration == 2) selected @endif >{{__('master.2-YEARS')}}</option>
                                        <option value="3" @if (Auth::user()->contract_duration == 3) selected @endif >{{__('master.3-YEARS')}}</option>
                                        <option value="4" @if (Auth::user()->contract_duration == 4) selected @endif >{{__('master.4-YEARS')}}</option>
                                        <option value="5" @if (Auth::user()->contract_duration == 5) selected @endif >{{__('master.5-YEARS')}}</option>
                                    </select>
                                </div>

                                <!--=================  Contract End Date  =================-->
                                <div class="form-group col-md-12 mb-2 text-left">
                                    <label class="font-weight-bold text-uppercase">{{__('master.CONTRACT-END-DATE')}}</label>
                                    <input type="date" name="contract_end_date" class="form-control" value="{{ Auth::user()->contract_end_date }}" disabled>
                                </div>

                                <!--=================  Contract File  =================-->
                                <div class="form-group col-md-12 mb-2 text-left">
                                    <label class="font-weight-bold text-uppercase">{{__('master.CONTRACT-FILE')}}</label>

                                        @if (Auth::user()->contract_file != '')
                                            <a href="{{asset('storage/'.Auth::user()->contract_file)}}" target="_blank" class="btn btn-secondary btn-block mb-3">{{__('master.SHOW-FILE')}}</a>
                                        @else
                                            <p class="text-center">{{__('master.NO-FILE')}}</p>
                                        @endif
                
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="card card-defualt">
                        <div class="card-header"><i class="fas fa-graduation-cap"></i> {{__('master.CERTIFICATE-FILE')}} </div>
                        <div class="card-body px-3">
                                @if (Auth::user()->certificate_file != '')
                                    <a href="{{asset('storage/'.Auth::user()->certificate_file)}}" target="_blank" class="btn btn-secondary btn-block mb-3">{{__('master.SHOW-FILE')}}</a>
                                @else
                                    <p class="text-center">{{__('master.NO-FILE')}}</p>
                                @endif
                        </div>
                    </div>

                </div>

                <div class="col-xl-8">

                    <form class="user_info_form">
                      @csrf
                      <div class="card card-defualt">
                          <div class="card-header"><i class="fa fa-info-circle"></i> {{__('master.PERSONAL-INFORMATION')}} </div>
                          <div class="card-body">
                                  
                                  <div class="row">
          
                                      <!--=================  Name  =================-->
                                      <div class="form-group col-md-6 mb-2 text-left">
                                          <label class="font-weight-bold text-uppercase">{{__('master.NAME')}}</label>
                                          <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}" >
                                      </div>
                  
                                      <!--=================  Phone  =================-->
                                      <div class="form-group col-md-6 mb-2 text-left">
                                          <label class="font-weight-bold text-uppercase">{{__('master.PHONE')}} </label>
                                          <input type="number" name="phone" class="form-control" value="{{ Auth::user()->phone }}" >
                                      </div>
          
                                  </div>
                                  <hr class="my-2">
          
                                  <div class="row">
          
                                      <!--=================  E-mail  =================-->
                                      <div class="form-group col-md-6 mb-2 text-left">
                                          <label class="font-weight-bold text-uppercase">{{__('master.EMAIL')}}</label>
                                          <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}">
                                      </div>
                  
                                      <!--=================  Gender  =================-->
                                      <div class="form-group col-md-6 mb-2 text-left">
                                          <label class="font-weight-bold text-uppercase">{{__('master.GENDER')}}</label>
          
                                          <select class="form-control" name="gender">
                                              <option value="Male" @if (Auth::user()->gender == 'Male') selected @endif>{{__('master.MALE')}}</option>
                                              <option value="Female" @if (Auth::user()->gender == 'Female') selected @endif>{{__('master.FEMALE')}}</option>
                                          </select>
                                      </div>
          
                                  </div>
                                  <hr class="my-2">
          
                                  <div class="row">
          
                                      <!--=================   Birthdate  =================-->
                                      <div class="form-group col-md-6 mb-2 text-left">
                                          <label class="font-weight-bold text-uppercase">{{__('master.BIRTHDATE')}}</label>
                                          <input type="date" name="birthdate" class="form-control" value="{{ Auth::user()->birthdate }}" >
                                      </div>
          
                                      <!--=================  Nationality  =================-->
                                      <div class="form-group col-md-6 mb-2 text-left">
                                          <label class="font-weight-bold text-uppercase">{{__('master.NATIONALITY')}}</label>
                                          <select class="form-control selectpicker" name="nationality" data-live-search="true" required>
                                            @foreach ($countries as $country)
                                                <option value="{{$country->country_Nationality}}"  @if (Auth::user()->nationality == $country->country_Nationality ) selected @endif >{{__('nationality.'.$country->country_Nationality)}}</option>
                                            @endforeach
                                        </select>
                                      </div>
          
                                  </div>
                          </div>
                          
                          <!-- Save -->
                          <div class="card-footer">
                            <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                            <div class="col-12 text-right">
                              <button type="submit" class="btn btn-sm btn-success submit">{{__('master.SAVE-CHANGES')}}</button>
                            </div>
                          </div>
                      </div>
                    </form>

                    <div class="card card-defualt">
                        <div class="card-header"><i class="fas fa-briefcase"></i> {{__('master.WORK-INFORMATION')}} </div>
                        <div class="card-body">

                                <div class="row">
                
                                    <!--=================  Branches  =================-->
                                    <div class="form-group col-md-6 mb-2 text-left">
                                        <label class="font-weight-bold text-uppercase">{{__('master.BRANCH')}}</label>
                                        <input type="text" class="form-control" value="{{ Auth::user()->branch->name }}" disabled>
                                    </div>

                                    <!--=================  Role  =================-->
                                    <div class="form-group col-md-6 mb-2 text-left">
                                        <label class="font-weight-bold text-uppercase">{{__('master.ROLE')}}</label>
                                        <input type="text" class="form-control" value="{{ Auth::user()->roleName->name }}" disabled>                    
                                    </div> 

                                </div>
                                <hr class="my-2">

                                <div class="row">
                
                                    <!--=================  Working Hours  =================-->
                                    <div class="form-group col-md-6 mb-2 text-left">
                                        <label class="font-weight-bold text-uppercase">{{__('master.WORKING-HOURS')}}</label>

                                        <select class="form-control" disabled>
                                            <option value="1" @if (Auth::user()->working_hours == 1) selected @endif >{{__('master.1-HOUR')}}</option>
                                            <option value="2" @if (Auth::user()->working_hours == 2) selected @endif >{{__('master.2-HOURS')}}</option>
                                            <option value="3" @if (Auth::user()->working_hours == 3) selected @endif >{{__('master.3-HOURS')}}</option>
                                            <option value="4" @if (Auth::user()->working_hours == 4) selected @endif >{{__('master.4-HOURS')}}</option>
                                            <option value="5" @if (Auth::user()->working_hours == 5) selected @endif >{{__('master.5-HOURS')}}</option>
                                            <option value="6" @if (Auth::user()->working_hours == 6) selected @endif >{{__('master.6-HOURS')}}</option>
                                            <option value="7" @if (Auth::user()->working_hours == 7) selected @endif >{{__('master.7-HOURS')}}</option>
                                            <option value="8" @if (Auth::user()->working_hours == 8) selected @endif >{{__('master.8-HOURS')}}</option>
                                            <option value="9" @if (Auth::user()->working_hours == 9) selected @endif >{{__('master.9-HOURS')}}</option>
                                            <option value="10" @if (Auth::user()->working_hours == 10) selected @endif >{{__('master.10-HOURS')}}</option>
                                            <option value="11" @if (Auth::user()->working_hours == 11) selected @endif >{{__('master.11-HOURS')}}</option>
                                            <option value="12" @if (Auth::user()->working_hours == 12) selected @endif >{{__('master.12-HOURS')}}</option>
                                        </select>
                                    </div>
                
                                    <!--=================  Salary  =================-->
                                    <div class="form-group col-md-6 mb-2 text-left">
                                        <label class="font-weight-bold text-uppercase">{{__('master.SALARY')}}</label>
                                        <input type="text" class="form-control" value="{{ Auth::user()->salary }}" disabled>
                                    </div>

                                </div>
                                <hr class="my-2">

                                <div class="row">

                                    <!--=================  Hiring Date  =================-->
                                    <div class="form-group col-md-6 mb-2 text-left">
                                        <label class="font-weight-bold text-uppercase">{{__('master.HIRING-DATE')}}</label>
                                        <input type="date" class="form-control" value="{{ Auth::user()->hiring_date }}" disabled>
                                    </div>
                
                                    <!--=================  Profit Ratio  =================-->
                                    <div class="form-group col-md-6 mb-2 text-left">
                                        <label class="font-weight-bold text-uppercase">{{__('master.PROFIT-RATIO')}}</label>
                                        <input type="text" class="form-control" value="{{Auth::user()->profit_ratio}}%" disabled>
                                    </div>

                                </div>

                        </div>
                    </div>


                    <form class="change_password_form">
                      @csrf
                      <div class="card card-defualt">
                          <div class="card-header"><i class="fas fa-lock"></i> {{__('master.PASSWORD')}} </div>
                          <div class="card-body">
                              <div class="row">
          
                                  <!--=================  Current Password  =================-->
                                  <div class="form-group col-md-6 mb-2 text-left">
                                      <label for="password" class="form-control-label" for="input-phone">{{__('master.CURRENT-PASSWORD')}}</label>
                                      <input id="password" type="password" class="form-control" name="oldpassword" required autocomplete="new-password">
                                  </div>
          
                                  <!--================= New Password  =================-->
                                  <div class="form-group col-md-6 mb-2 text-left">
                                      <label for="password-new" class="form-control-label">{{__('master.NEW-PASSWORD')}}</label>
                                      <input id="password-new" type="password" class="form-control" name="newpassword" required autocomplete="new-password">
                                  </div>
          
                              </div>
                              <div class="my-2 text-info text-left">
                                  <small> {!! __('master.PASSWORD-INFO') !!} </small> 
                              </div>
                          </div>
                          
                          <!-- Save -->
                          <div class="card-footer">
                            <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                            <div class="col-12 text-right">
                              <button type="submit" class="btn btn-sm btn-danger submit">{{__('master.CHANGE-PASSWORD')}}</button>
                            </div>
                          </div>
                      </div>  
                    </form>

                </div>

            </div>


      <!-- Footer -->
      <footer class="footer pt-0">
      </footer>
    </div>

@endsection



@section('script')
<script>

  // ==========================  Edit User Info ==========================
  $(document).on('submit', '.user_info_form', function(e)
	{
        e.preventDefault();
        let formData = new FormData(this);
        $('.submit').prop('disabled', true);

        $.ajax({
            url: 		"{{route('edit-info')}}",
            method: 	'POST',
            data: formData,
            contentType: false,
            processData: false,
            success : function(data)
                {
                    $('.submit').prop('disabled', false);
                    
                    if (data['status'] == 'true')
                    {
                        Swal.fire(
                                "{{__('master.DONE')}}",
                                "{{__('master.DATA-CHANGED-SUCCESSFULLY')}}",
                                'success'
                                )
                    }
                    else if (data['status'] == 'false')
                    {
                        Swal.fire(
                                "{{__('master.OOPS')}}",
                                "{{__('master.SOMETHING-WRONG')}}",
                                'error'
                                )
                    }
                },
                error : function(reject)
                {
                    $('.submit').prop('disabled', false);

                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function(key, val)
                    {
                        Swal.fire(
                                head2,
                                val[0],
                                'error'
                                )
                    });
                }
            
            
        });

  });

  // ==========================  Change Passowrd ==========================
  $(document).on('submit', '.change_password_form', function(e)
	{
        e.preventDefault();
        let formData = new FormData(this);
        $('.submit').prop('disabled', true);

        var head1 	= 'Done';
        var title1 	= 'Data Changed Successfully. ';
        var head2 	= 'Oops...';
        var title2 	= 'Something went wrong, please try again later.';

        $.ajax({
            url: 		"{{route('change-password')}}",
            method: 	'POST',
            data: formData,
            contentType: false,
            processData: false,
            success : function(data)
                {
                    $('.submit').prop('disabled', false);
                    
                    if (data['status'] == 'true')
                    {
                        Swal.fire(
                                head1,
                                title1,
                                'success'
                                )
                    }
                    else if (data['status'] == 'false')
                    {
                        Swal.fire(
                                head2,
                                title2,
                                'error'
                                )
                    }
                    else if (data['status'] == 'error')
                    {
                        Swal.fire(
                                head2,
                                data['msg'],
                                'error'
                                )
                    }
                },
                error : function(reject)
                {
                    $('.submit').prop('disabled', false);

                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function(key, val)
                    {
                        Swal.fire(
                                head2,
                                val[0],
                                'error'
                                )
                    });
                }
            
            
        });

  });

  // ==========================  Change Avatar ==========================
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
      $('.profile_picture_form').submit();

  });
  
  $(document).on('submit', '.profile_picture_form', function(e)
	{
        e.preventDefault();
        let formData = new FormData(this);

        $.ajax({
            url: 		"{{route('change-profile-picture')}}",
            method: 	'POST',
            data: formData,
            contentType: false,
            processData: false,
            success : function(data)
                {
                    if (data['status'] == 'true')
                    {
                        Swal.fire(
                                "{{__('master.DONE')}}",
                                "{{__('master.DATA-CHANGED-SUCCESSFULLY')}}",
                                'success'
                                )
                    }
                    else if (data['status'] == 'false')
                    {
                        Swal.fire(
                                "{{__('master.OOPS')}}",
                                "{{__('master.SOMETHING-WRONG')}}",
                                'error'
                                )
                    }
                },
                error : function(reject)
                {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function(key, val)
                    {
                        Swal.fire(
                                head2,
                                val[0],
                                'error'
                                )
                    });
                }
            
        });
  });

</script>
@endsection
