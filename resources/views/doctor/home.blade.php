@extends('layouts.master')

@section('content')

    <!-- Header -->
    <div class="header bg-gradient-primary pb-6">
        <div class="container-fluid">
          <div class="header-body">
            <div class="row align-items-center py-4">
              <div class="col-lg-6 col-7 text-left">
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                  <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                    <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('master.DASHBOARD')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{__('master.HOME')}}</li>
                  </ol>
                </nav>
              </div>
            </div>
            <!-- Card stats -->

            <div class="row justify-content-center">

              <div class="col-xl-4 col-md-6">
                <div class="card card-stats">
                  <!-- Card body -->
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">{{__('master.ALL-APPOINTMENTS')}}</h5>
                        <span class="h2 font-weight-bold mb-0">{{number_format($total_appointments)}}</span>
                      </div>
                      <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-pink text-white rounded-circle shadow">
                          <i class="fas fa-notes-medical"></i>
                        </div>
                      </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                    </p>
                  </div>
                </div>
              </div>

              <div class="col-xl-4 col-md-6">
                <div class="card card-stats">
                  <!-- Card body -->
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">{{__('master.DONE-APPOINTMENTS')}}</h5>
                        <span class="h2 font-weight-bold mb-0">{{number_format($done_appointments)}}</span>
                      </div>
                      <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-light text-white rounded-circle shadow">
                          <i class="fas fa-notes-medical"></i>
                        </div>
                      </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                    </p>
                  </div>
                </div>
              </div>

              <div class="col-xl-4 col-md-6">
                <div class="card card-stats">
                  <!-- Card body -->
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">{{__('master.TODAY-APPOINTMENTS')}}</h5>
                        <span class="h2 font-weight-bold mb-0">{{number_format($today_appointments)}}</span>
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

          </div>
        </div>
    </div>

    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row justify-content-center">

        <!-- First Half -->
        <div class="col-xl-6">

        </div>


        <!-- Second Half -->
        <div class="col-xl-6">

        </div>

        <!-- Full Width -->
        <div class="col-12">

        </div>

      </div>
      
      
      <!-- Footer -->
      <footer class="footer pt-0">
      </footer>
    </div>

@endsection


@section('script')

@endsection