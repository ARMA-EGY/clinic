@extends('layouts.admin')

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
                    <li class="breadcrumb-item"><a href="{{route('admin-members')}}">Members</a></li>
                    <li class="breadcrumb-item active" aria-current="page">New Member</li>
                  </ol>
                </nav>
              </div>
              <div class="col-lg-6 col-5 text-right">
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End: Header -->

<div class="container-fluid mt--6">
    <div class="row justify-content-center">
        <div class="col-xl-12 order-xl-1">
            <div class="card">
              <div class="card-header">
                <div class="row align-items-center">
                  <div class="col-8">
                    <h3 class="mb-0">Add New Member </h3>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                  <div class="pl-lg-4">
                    <div class="row">

                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-username">Username</label>
                          <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                          @error('name')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-email">Email address</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                      </div>

                    </div>

                    <div class="row">
  
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label class="form-control-label" for="input-phone">Phone</label>
                            <input type="number" name="phone" id="input-phone" class="form-control" placeholder="Phone Number"  >
                          </div>
                        </div>

                        <div class="col-lg-6">
                          <div class="form-group">
                              <label class="form-control-label" for="input-gender">Gender</label>
                              <select class="form-control" name="gender" id="input-gender" required>
                                  <option value="Female">Female</option>
                                  <option value="Male">Male</option>
                              </select>
                          </div>
                        </div>

                  </div>

                    <div class="row">

                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-phone">Password</label>
                          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                          @error('password')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="form-group">
                            <label for="password-confirm" class="form-control-label">{{ __('Confirm Password') }}</label>
                             <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                      </div>

                    </div>

                    <div class="row">
  
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label class="form-control-label" for="input-role">Role</label>
                              <select class="form-control" name="role" id="input-role" required>
                                <option>Admin</option>
                                <option>Author</option>
                              </select>
                            </div>
                          </div>
  
                    </div>

                  </div>
                  <hr class="my-4" />
                  <!-- Save -->
                  <div class="col-12 text-right">
                    <button type="submit" class="btn btn-success submit">Add</button>
                  </div>
                </form>
              </div>
        </div>


    </div>
</div>
@endsection
