


<div class="modal-content">
    <div class="modal-header bg-blue">
        <h4 class="modal-title text-white text-left"><i class="fas fa-money-bill-wave"></i> {{__('master.CHECKOUT')}}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    </div>

    <div class="modal-body">	
        <form class="checkout_form" enctype="multipart/form-data">
            @csrf

                    <div class="table-responsive">
                        <table class="table align-items-center table-dark table-flush">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col" class="sort">#</th>
                                <th scope="col" class="sort" >{{__('master.NAME')}}</th>
                                <th scope="col" class="sort" >{{__('master.SERVICE-NUMBER')}}</th>
                                <th scope="col" class="sort" >{{__('master.SECTOR')}} </th>
                                <th scope="col" class="sort" >{{__('master.PRICE')}}</th>
                            </tr>
                            </thead>
                            <tbody class="list">

                           @foreach($appointmentServices as $appointmentService)
                                <tr class="parent">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{$appointmentService->service->name}}</td>
                                    <td>{{$appointmentService->service->number}}</td>
                                    <td>{{$appointmentService->service->sector->name}}</td>
                                    <td>{{$appointmentService->service->price}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>


                    <div class="form-group col-md-6 mb-4 text-left">
                        <label class="font-weight-bold text-uppercase">{{__('master.PAYMENT-METHOD')}}</label>

                        <select class="form-control" name="payment_method" required>
                            <option value="">{{__('master.SELECT-PAYMENT-METHOD')}}</option>
                            <option value="cash">Cash</option>
                            <option value="visa">Visa</option>
                        </select>
    
                    </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-success btn-sm submit">{{__('master.CONFIRM')}}</button>
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">{{__('master.CANCEL')}}</button>
            </div>
        </form>
    </div>
</div>
