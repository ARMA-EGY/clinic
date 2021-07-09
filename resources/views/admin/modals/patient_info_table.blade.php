

        <div class="table-responsive rounded">
            <table class="table align-items-center table-dark table-flush">
                <thead class="thead-dark">
                <tr>
                    <th scope="col" class="sort" >{{__('master.NAME')}}</th>
                    <th scope="col" class="sort" >{{__('master.PHONE')}}</th>
                    <th scope="col" class="sort" >{{__('master.AGE')}}</th>
                    <th scope="col" class="sort" >{{__('master.GENDER')}}</th>
                    <th scope="col" class="sort" >{{__('master.NATIONALITY')}}</th> 
                </tr>
                </thead>
                <tbody class="list">

                        <tr class="parent">
                            <td><b> {{  $patient->name }} </b></td>
                            <td>{{ $patient->phone }}</td>
                            <td>{{ $patient->age }}  </td>
                            <td>{{__('master.'.$patient->gender )}} </td>
                            <td>{{__('nationality.'.$patient->nationality )}} </td>
                        </tr>
                        <input type="hidden" name="patient_id" value="{{$patient->id}}">
                </tbody>
            </table>
        </div>