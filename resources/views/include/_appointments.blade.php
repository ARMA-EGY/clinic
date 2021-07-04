
            @if ($items->count() > 0)

            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush display nowrap" id="example">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col" class="sort" >{{__('master.PATIENT-NAME')}}</th>
                    <th scope="col" class="sort" >{{__('master.DOCTOR-NAME')}}</th>
                    <th scope="col" class="sort" >{{__('master.APPOINTMENT-NUMBER')}}</th>
                    <th scope="col" class="sort" >{{__('master.APPOINTMENT-DATE')}}</th>
                    <th scope="col" class="sort" >{{__('master.BRANCH')}}</th>
                    <th scope="col" class="sort" >{{__('master.SECTOR')}}</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>

                  @foreach ($items as $item)

                  <tr class="parent">
                    <td>{{ $loop->iteration }}</td>
                    <td><b> {{$item->patient->name}} </b></td>
                    <td><b> {{$item->doctor->name}} </b></td>
                    <td><b> {{$item->appointment_number}} </b></td>
                    <td><b> {{$item->appointment_date}} </b></td>
                    <td><b> {{$item->branch->name}} </b></td>
                    <td><b> {{$item->sector->name}} </b></td>
                    <td>
                      <a data-toggle="tooltip" data-placement="top" title="{{__('master.DETAILS')}}" href="{{route('appointment.show',$item->id)}}" class="btn btn-warning btn-sm mx-1 px-3"> <i class="fa fa-tv"></i> </a>
                      <a data-toggle="tooltip" data-placement="top" title="{{__('master.CANCEL')}}" href="#" class="btn btn-danger btn-sm mx-1 px-3"> <i class="fa fa-trash"></i> </a>
                    </td>
                  </tr>

                  @endforeach
                 
                </tbody>
              </table>
            </div>


            @else 
                <p class="text-center"> {{__('master.NO-APPOINTMENTS-AVAILABLE')}} </p>
            @endif

            <!-- Card footer -->
            <div class="card-footer py-2">
            </div>