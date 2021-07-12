


<div class="modal-content">
    <div class="modal-header bg-blue">
        <h4 class="modal-title text-white text-left"><i class="fas fa-cubes"></i> {{__('master.ADJUSTMENTS')}}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    </div>

    <div class="modal-body">	

            <div class="table-responsive">
                <table class="table align-items-center table-dark table-flush">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col" class="sort">#</th>
                        <th scope="col" class="sort" >{{__('master.ITEM')}}</th>
                        <th scope="col" class="sort" >{{__('master.QUANTITY')}}</th>
                        <th scope="col" class="sort" >{{__('master.TYPE')}} </th>
                    </tr>
                    </thead>
                    <tbody class="list">

                    @foreach($adjustments as $adjustment)
                        <tr class="parent">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{$adjustment->Inventory->name}}</td>
                            <td>{{$adjustment->quantity}}</td>
                            <td>{{__('master.'.$adjustment->type) }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>


            <div class="row">
                <div class="col-xl-12">
                <div class="card">
                    <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                        <h3 class="mb-0">{{__('master.NOTES')}}</h3>
                        </div>
                    </div>
                    </div>
                    <div class="card-body text-left">
                        {{$transaction->notes}}
                    </div>

                </div>
                </div>
            </div>

    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">{{__('master.CANCEL')}}</button>
    </div>
</div>
