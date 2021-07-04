@extends('layouts.master')

@section('content')

    <!-- Header -->
    <div class="header bg-gradient-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Setting</li>
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
        <div class="col-xl-12 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Edit profile </h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form class="user_info_form">
                @csrf
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Username</label>
                        <input type="text" id="input-username" name="name" class="form-control" value="{{ Auth::user()->name }}" required>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <input type="email" name="email" id="input-email" class="form-control" value="{{ Auth::user()->email }}" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-gender">Gender</label>
                        <select class="form-control" name="gender" id="input-gender" required>
                          <option value="Female" @if(Auth::user()->gender == 'Female') selected @endif>Female</option>
                          <option value="Male" @if(Auth::user()->gender == 'Male') selected @endif>Male</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-phone">Phone</label>
                        <input type="number" name="phone" id="input-phone" class="form-control" placeholder="Phone Number" value="{{ Auth::user()->phone }}" required>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Save -->
                <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                <div class="col-12 text-right">
                  <button type="submit" class="btn btn-sm btn-success submit">Save Changes</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="col-xl-12 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Password</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form class="change_password_form">
                @csrf
                <!-- password -->
                <h6 class="heading-small text-muted mb-4">Change Password</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-password">Current Password</label>
                        <input id="input-password" class="form-control" name="oldpassword" type="password" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-password2">New Password</label>
                        <input id="input-password2" class="form-control" name="newpassword" type="password" required>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Save -->
                <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                <div class="col-12 text-right">
                  <button type="submit" class="btn btn-sm btn-danger submit">Change Password</button>
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
<script>

  // ==========================  Edit User Info ==========================

  $(document).on('submit', '.user_info_form', function(e)
	{
        e.preventDefault();
        let formData = new FormData(this);
        $('.submit').prop('disabled', true);

        var head1 	= 'Done';
        var title1 	= 'Data Changed Successfully. ';
        var head2 	= 'Oops...';
        var title2 	= 'Something went wrong, please try again later.';

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

</script>
@endsection
