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

              <div class="col-xl-4 col-md-6">
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

              <div class="col-xl-4 col-md-6">
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

            </div>

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

          <!-- No.Posts in each category -->
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
          labels: ['Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
          datasets: [{
            label: "{{__('master.APPOINTMENT')}}",
            data: [25, 20, 30, 22, 17, 29]
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
        labels:['اسنان', 'ليزر', 'تجميل', 'جلدية'],
        datasets:[{
            data:[25, 20, 30, 22],
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