<div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">{{__('admin.ALL-APPOINTMENTS')}} <span class="badge badge-primary p-2">{{$total_rows}}</span></h3>
                </div>
              </div>
            </div>

            @if ($items->count() > 0)

            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush display nowrap" id="example">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col" class="sort" >{{__('admin.PATIENT-NAME')}}</th>
                    <th scope="col" class="sort" >{{__('admin.DOCTOR-NAME')}}</th>
                    <th scope="col" class="sort" >{{__('admin.APPOINTMENT-NUMBER')}}</th>
                    <th scope="col" class="sort" >{{__('admin.APPOINTMENT-DATE')}}</th>
                    <th scope="col" class="sort" >{{__('admin.BRANCH')}}</th>
                    <th scope="col" class="sort" >{{__('admin.SECTOR')}}</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>

                  @foreach ($items as $item)

                  <tr class="parent">
                    <td>{{ $loop->iteration }}</td>
                    <td><b> {{$item->patient_id}} </b></td>
                    <td><b> {{$item->doctor_id}} </b></td>
                    <td><b> {{$item->appointment_number}} </b></td>
                    <td><b> {{$item->appointment_date}} </b></td>
                    <td><b> {{$item->branch_id}} </b></td>
                    <td><b> {{$item->sector_id}} </b></td>
                    <td>
                      <a data-toggle="tooltip" data-placement="top" title="{{__('admin.DETAILS')}}" href="{{route('appointment.show',$item->id)}}" class="btn btn-warning btn-sm mx-1 px-3"> <i class="fa fa-tv"></i> </a>
                      <a data-toggle="tooltip" data-placement="top" title="{{__('admin.CANCEL')}}" href="#" class="btn btn-danger btn-sm mx-1 px-3"> <i class="fa fa-trash"></i> </a>
                    </td>
                  </tr>

                  @endforeach
                 
                </tbody>
              </table>
            </div>


            @else 
                <p class="text-center"> {{__('admin.NO-SECTORS-AVAILABLE')}} </p>
            @endif

            <!-- Card footer -->
            <div class="card-footer py-2">
            </div>

          </div>
        </div>
      </div>
      <!-- Footer -->
      <footer class="footer pt-0">
      </footer>
    </div>