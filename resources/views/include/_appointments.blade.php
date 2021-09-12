
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
                    <th scope="col" class="sort" >{{__('master.STATUS')}}</th>
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
                      @if ($item->status == 'pending')
                          <span class="badge badge-yellow category-badge">  {{__('master.PENDING')}}</span>
                      @elseif ($item->status == 'paid')
                          <span class="badge badge-success category-badge">  {{__('master.PAID')}}</span>
                      @elseif ($item->status == 'cancelled')
                          <span class="badge badge-danger category-badge">  {{__('master.CANCELLED')}}</span>
                      @endif
                    </td>
                    <td>
                      @if(auth()->user()->role == "Admin")
                          <a data-toggle="tooltip" data-placement="top" title="{{__('master.DETAILS')}}" href="{{route('appointment.show',$item->id)}}" class="btn btn-warning btn-sm mx-1 px-3"> <i class="fa fa-tv"></i> </a>

                        @if ($item->status == 'pending')
                          <button data-toggle="tooltip" data-placement="top" title="{{__('master.CHECKOUT')}}" class="btn btn-success btn-sm mx-1 px-3 get-checkout" data-id="{{$item->id}}" @if ($item->status == 'paid') disabled @endif> @if ($item->status == 'paid') <i class="fas fa-check-circle"></i> @else <i class="fas fa-money-bill-wave"></i> @endif  </button>
                          <button data-toggle="tooltip" data-placement="top" title="{{__('master.CANCEL')}}" class="btn btn-danger btn-sm mx-1 px-3 cancel-appointment" data-id="{{$item->id}}" @if ($item->status == 'cancelled') disabled @endif> <i class="fa fa-trash"></i> </button>
                        @elseif ($item->status == 'paid')
                          <button data-toggle="tooltip" data-placement="top" title="{{__('master.CHECKOUT')}}" class="btn btn-success btn-sm mx-1 px-3 get-checkout" data-id="{{$item->id}}" @if ($item->status == 'paid') disabled @endif> @if ($item->status == 'paid') <i class="fas fa-check-circle"></i> @else <i class="fas fa-money-bill-wave"></i> @endif  </button>
                        @endif

                      @elseif(auth()->user()->role == "Staff")
                        <a data-toggle="tooltip" data-placement="top" title="{{__('master.DETAILS')}}" href="{{route('staff-appointment.show',$item->id)}}" class="btn btn-warning btn-sm mx-1 px-3"> <i class="fa fa-tv"></i> </a>

                        @if ($item->status == 'pending')
                          <button data-toggle="tooltip" data-placement="top" title="{{__('master.CHECKOUT')}}" class="btn btn-success btn-sm mx-1 px-3 get-checkout" data-id="{{$item->id}}" @if ($item->status == 'paid') disabled @endif> @if ($item->status == 'paid') <i class="fas fa-check-circle"></i> @else <i class="fas fa-money-bill-wave"></i> @endif  </button>
                          <button data-toggle="tooltip" data-placement="top" title="{{__('master.CANCEL')}}" class="btn btn-danger btn-sm mx-1 px-3 cancel-appointment" data-id="{{$item->id}}" @if ($item->status == 'cancelled') disabled @endif> <i class="fa fa-trash"></i> </button>
                        @elseif ($item->status == 'paid')
                          <button data-toggle="tooltip" data-placement="top" title="{{__('master.CHECKOUT')}}" class="btn btn-success btn-sm mx-1 px-3 get-checkout" data-id="{{$item->id}}" @if ($item->status == 'paid') disabled @endif> @if ($item->status == 'paid') <i class="fas fa-check-circle"></i> @else <i class="fas fa-money-bill-wave"></i> @endif  </button>
                        @endif
                        
                      @elseif(auth()->user()->role == "Doctor")
                        <a data-toggle="tooltip" data-placement="top" title="{{__('master.DETAILS')}}" href="{{route('doctor-appointment.show',$item->id)}}" class="btn btn-warning btn-sm mx-1 px-3"> <i class="fa fa-tv"></i> </a>
                      @endif
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