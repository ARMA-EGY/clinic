@extends('layouts.master')

@section('content')

    <!-- Header -->
    <div class="header bg-gradient-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-12 text-left">
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
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
                                <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}" required>
                            </div>
        
                            <!--=================  Phone  =================-->
                            <div class="form-group col-md-6 mb-2 text-left">
                                <label class="font-weight-bold text-uppercase">{{__('master.PHONE')}} </label>
                                <input type="number" name="phone" class="form-control" value="{{ Auth::user()->phone }}" required>
                            </div>

                        </div>
                        <hr class="my-2">

                        <div class="row">

                            <!--=================  E-mail  =================-->
                            <div class="form-group col-md-6 mb-2 text-left">
                                <label class="font-weight-bold text-uppercase">{{__('master.EMAIL')}}</label>
                                <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}" required>
                            </div>
        
                            <!--=================  Gender  =================-->
                            <div class="form-group col-md-6 mb-2 text-left">
                                <label class="font-weight-bold text-uppercase">{{__('master.GENDER')}}</label>

                                <select class="form-control" name="gender" required>
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
                                <input type="date" name="birthdate" class="form-control" value="{{ Auth::user()->birthdate }}" required>
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
