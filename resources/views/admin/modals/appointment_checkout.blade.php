


<div class="modal-content">
    <div class="modal-header bg-blue">
        <h4 class="modal-title text-white text-left"><i class="fas fa-money-bill-wave"></i> @if ($appointment->status == 'paid') {{__('master.TRANSACTION')}} @else {{__('master.CHECKOUT')}}  @endif </h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    </div>

    <div class="modal-body">	
        <form class="checkout_form" enctype="multipart/form-data">
            @csrf

            @if ($appointmentServices->count() > 0)

                    <div class="table-responsive rounded">
                        <table class="table align-items-center table-dark table-flush rounded">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col" class="sort">#</th>
                                <th scope="col" class="sort" >{{__('master.NAME')}}</th>
                                <th scope="col" class="sort" >{{__('master.SECTOR')}} </th>
                                <th scope="col" class="sort" ></th>
                                <th scope="col" class="sort" >{{__('master.PRICE')}}</th>
                            </tr>
                            </thead>
                            <tbody class="list">


                           @foreach($appointmentServices as $appointmentService)
                                <tr class="parent">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{$appointmentService->service->name}}</td>
                                    <td>{{$appointmentService->service->sector->name}}</td>
                                    <td></td>
                                    <td>{{$appointmentService->service->price}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="table-responsive rounded">
                        <table class="table align-items-center table-light table-flush rounded">
                            <tbody class="list">
                                    <tr class="parent">
                                        <td></td>
                                        <td><b>{{__('master.SUB-TOTAL')}}</b></td>
                                        <td></td>
                                        <td></td>
                                        <td>{{$subtotal}}</td>
                                    </tr>
                                    <tr class="parent">
                                        <td></td>
                                        <td><b>{{__('master.TAX')}}</b></td>
                                        <td></td>
                                        <td>{{$setting->tax}}%</td>
                                        <td>{{$tax}}</td>
                                    </tr>
                                    <tr class="parent">
                                        <td></td>
                                        <td><b>{{__('master.TOTAL')}}</b></td>
                                        <td></td>
                                        <td></td>
                                        <td>{{$total}}</td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>

                    @if (!empty($appointment->transaction))
                        <div class="table-responsive rounded">
                            <table class="table align-items-center table-light table-flush rounded">
                                <tbody class="list">
                                        <tr class="parent">
                                            <td></td>
                                            <td><b>{{__('master.PAID')}}</b></td>
                                            <td></td>
                                            <td></td>
                                            <td>{{$appointment->transaction->paid}}</td>
                                        </tr>
                                        <tr class="parent">
                                            <td></td>
                                            <td><b>{{__('master.REMAIN')}}</b></td>
                                            <td></td>
                                            <td></td>
                                            <td>{{$appointment->transaction->remain}}</td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    @endif

                    <input type="hidden" name="appointment_id" value="{{$appointment->id}}">

                    @if ($appointment->status == 'paid')
                    @else 
                    <div class="row">
                        <div class="form-group col-md-6 mb-4 text-left">
                            <label class="font-weight-bold text-uppercase">{{__('master.PAYMENT-METHOD')}}</label>
                                <select class="form-control" name="payment_method" required>
                                    <option value="">{{__('master.SELECT-PAYMENT-METHOD')}}</option>
                                    <option value="cash">{{__('master.CASH')}}</option>
                                    <option value="visa">{{__('master.VISA')}}</option>
                                    <option value="mada">{{__('master.MADA')}}</option>
                                    <option value="sadad">{{__('master.SADAD')}}</option>
                                </select>
                        </div>
                        <div class="form-group col-md-6 mb-4 text-left">
                            <label class="font-weight-bold text-uppercase">{{__('master.AMOUNT')}}</label>
                            <input type="number" step="0.1" min="1" placeholder="0.00"  max="{{ !empty($appointment->transaction) ? $appointment->transaction->remain: $total }}" class="form-control" name="paid" required>
                        </div>
                    </div>
                    @endif

            @else 
                <p class="text-center"> {{__('master.NO-SERVICES-ADDED-YET')}} </p>
            @endif

            <div class="modal-footer">
                @if ($appointmentServices->count() > 0)
                    @if ($appointment->status == 'paid')
                    @else
                        <button type="submit" class="btn btn-success btn-sm submit">{{__('master.PAY')}}</button>
                    @endif
                @endif
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">{{__('master.CANCEL')}}</button>
            </div>
        </form>
    </div>
</div>
