

        <div class="table-responsive rounded">
            <table class="table align-items-center table-dark table-flush">
                <thead class="thead-dark">
                <tr>
                    <th scope="col" class="sort">#</th>
                    <th scope="col" class="sort" >{{__('master.APPOINTMENT-DATE')}}</th>
                    <th scope="col" class="sort" >{{__('master.APPOINTMENT-NUMBER')}}</th>
                    <th scope="col" class="sort" >{{__('master.DOCTOR-NAME')}}</th>
                    <th scope="col" class="sort" >{{__('master.BRANCH')}}</th>
                    <th scope="col" class="sort" >{{__('master.SECTOR')}}</th>
                    <th scope="col">{{__('master.SELECT')}}</th>
                </tr>
                </thead>
                <tbody class="list">

                @foreach ($appointments as $appointment)
                        <tr class="parent">
                            <td>{{ $loop->iteration }}</td>
                            <td><b> {{$appointment->appointment_date}} </b></td>
                            <td><b> {{$appointment->appointment_number}} </b></td>
                            <td><b> {{$appointment->doctor->name}} </b></td>
                            <td><b> {{$appointment->branch->name}} </b></td>
                            <td><b> {{$appointment->sector->name}} </b></td>
                            <td>
                                <div class="form-check"> 
                                    <input class="form-check-input" type="radio" name="appointment_id" value="{{$appointment->id}}" required>
                                </div>
                            </td>
                        </tr>
                @endforeach
                </tbody>
            </table>
        </div>