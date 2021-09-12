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

              <div class="col-xl-3 col-md-6">
                <div class="card card-stats">
                  <!-- Card body -->
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">{{__('master.BRANCHES')}}</h5>
                        <span class="h2 font-weight-bold mb-0">{{number_format($branches_count)}}</span>
                      </div>
                      <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-warning text-white rounded-circle shadow">
                          <i class="fas fa-clinic-medical"></i>
                        </div>
                      </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                    </p>
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-md-6">
                <div class="card card-stats">
                  <!-- Card body -->
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">{{__('master.SECTORS')}}</h5>
                        <span class="h2 font-weight-bold mb-0">{{number_format($sectors_count)}}</span>
                      </div>
                      <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                          <i class="fas fa-tooth"></i>
                        </div>
                      </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                    </p>
                  </div>
                </div>
              </div>

            </div>

            <div class="row justify-content-center">

              <div class="col-xl-3 col-md-6">
                <div class="card card-stats">
                  <!-- Card body -->
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">{{__('master.DOCTORS')}}</h5>
                        <span class="h2 font-weight-bold mb-0">{{number_format($doctors_count)}}</span>
                      </div>
                      <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-success text-white rounded-circle shadow">
                          <i class="fas fa-stethoscope"></i>
                        </div>
                      </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                    </p>
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-md-6">
                <div class="card card-stats">
                  <!-- Card body -->
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">{{__('master.STAFF')}}</h5>
                        <span class="h2 font-weight-bold mb-0">{{number_format($staff_count)}}</span>
                      </div>
                      <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-dark text-white rounded-circle shadow">
                          <i class="fa fa-users"></i>
                        </div>
                      </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                    </p>
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-md-6">
                <div class="card card-stats">
                  <!-- Card body -->
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">{{__('master.PATIENTS')}}</h5>
                        <span class="h2 font-weight-bold mb-0">{{number_format($patients_count)}}</span>
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

          <!-- Monthly Appointments -->
          <div class="card bg-default shadow">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-muted ls-1 mb-1">{{__('master.APPOINTMENTS')}}</h6>
                  <h5 class="h3 mb-0 text-white">{{__('master.MONTHLY-APPOINTMENTS')}}</h5>
                </div>
              </div>
            </div>
            <div class="card-body">
              <!-- Chart -->
              <div class="chart">
                <canvas id="chart-bars" class="chart-canvas"></canvas>
              </div>
            </div>
          </div>

        </div>

        <!-- Second Half -->
        <div class="col-xl-6">

            <!-- No.Appointments in each Sector -->
            <div class="card bg-default shadow">
              <div class="card-header bg-transparent">
                <div class="row align-items-center">
                  <div class="col">
                    <h6 class="text-uppercase text-muted ls-1 mb-1">{{__('master.SECTORS')}}</h6>
                    <h5 class="h3 mb-0 text-white">{{__('master.MONTHLY-SECTORS')}}</h5>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <!-- Chart -->
                <div class="chart">
                  <canvas id="chart-pie" class="chart-canvas"></canvas>
                </div>
              </div>
            </div>

        </div>

        <!-- Full Width -->
        <div class="col-12">

            <!-- Latest Appointments -->
            <div class="card bg-default shadow">
              <div class="card-header bg-transparent border-0">
                <div class="row align-items-center">
                  <div class="col">
                    <h3 class="text-white mb-0">{{__('master.LATEST-APPOINTMENTS')}}</h3>
                  </div>
                </div>
              </div>
              <div class="table-responsive">
                <!-- table -->
                <table class="table align-items-center table-dark table-flush">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col" class="sort" >{{__('master.PATIENT-NAME')}}</th>
                      <th scope="col" class="sort" >{{__('master.DOCTOR-NAME')}}</th>
                      <th scope="col" class="sort" >{{__('master.APPOINTMENT-NUMBER')}}</th>
                      <th scope="col" class="sort" >{{__('master.APPOINTMENT-DATE')}}</th>
                      <th scope="col" class="sort" >{{__('master.BRANCH')}}</th>
                      <th scope="col" class="sort" >{{__('master.SECTOR')}}</th>
                      <th scope="col" class="sort" >{{__('master.STATUS')}}</th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody class="list">

                    @foreach ($latest_appointments as $latest_appointment)

                    <tr class="parent">
                      <td>{{ $loop->iteration }}</td>
                      <td><b> {{$latest_appointment->patient->name}} </b></td>
                      <td><b> {{$latest_appointment->doctor->name}} </b></td>
                      <td><b> {{$latest_appointment->appointment_number}} </b></td>
                      <td><b> {{$latest_appointment->appointment_date}} </b></td>
                      <td><b> {{$latest_appointment->branch->name}} </b></td>
                      <td><b> {{$latest_appointment->sector->name}} </b></td>
                      <td>
                        @if ($latest_appointment->status == 'pending')
                            <span class="badge badge-yellow category-badge">  {{__('master.PENDING')}}</span>
                        @elseif ($latest_appointment->status == 'paid')
                            <span class="badge badge-success category-badge">  {{__('master.PAID')}}</span>
                        @elseif ($latest_appointment->status == 'cancelled')
                            <span class="badge badge-danger category-badge">  {{__('master.CANCELLED')}}</span>
                        @endif
                      </td>
                      
                      <td>
                          <a data-toggle="tooltip" data-placement="top" title="{{__('master.DETAILS')}}" href="{{route('appointment.show',$latest_appointment->id)}}" class="btn btn-warning btn-sm mx-1 px-3"> <i class="fa fa-tv"></i> </a>
                      </td>
                    </tr>

                    @endforeach
                  
                    
                  </tbody>
                </table>
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

  // Bars chart
  var BarsChart = (function() {

    var $chart = $('#chart-bars');

    // Init chart
    function initChart($chart) {

      // Create chart
      var ordersChart = new Chart($chart, {
        type: 'bar',
        data: {
          labels: {!! json_encode($appointment_months)!!},
          datasets: [{
            label: "{{__('master.APPOINTMENT')}}",
            data: {!! json_encode($appointment_month_count)!!}
          }]
        }
      });

      // Save to jQuery object
      $chart.data('chart', ordersChart);
    }

    // Init chart
    if ($chart.length) {
      initChart($chart);
    }
  })();

  // Pie chart
  PieChart = function(){
    var e,a,t,n = $("#chart-pie");
    n.length&&(e=n, a = function(){return Math.round(100*Math.random())},
    t = new Chart(e,{
      type:"pie",
      data: {
        labels:{!! json_encode($sector_name)!!},
        datasets:[{
            data:{!! json_encode($sector_appointment_count)!!},
            backgroundColor:[Charts.colors.theme.danger,Charts.colors.theme.warning,Charts.colors.theme.success,Charts.colors.theme.primary,Charts.colors.theme.info]
            ,label:"Dataset 1"
            }]
            },
        options:{responsive:!0,legend:{position:"top"},
        animation:{animateScale:!0,animateRotate:!0}}}),
        e.data("chart",t)
        )
  }();

</script>

@endsection