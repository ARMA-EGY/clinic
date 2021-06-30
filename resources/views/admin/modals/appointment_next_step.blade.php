

@if ($request->step == 1)

    <label class="font-weight-bold text-uppercase">{{__('admin.SELECT-SECTOR')}}</label>
    <div class="row justify-content-center">
    <!--=================  Sectors  =================-->

        @foreach ($sectors as $sector)

            @if ($branch->hasSector($sector->id))
                    
                    <div class="col-xl-3 col-md-4 col-10">
                        <div class="card card-defualt choose-card" data-step="2">
                            <form id="form">
                                <input type="hidden" name="step" value="2">
                                <input type="hidden" name="branch" value="{{$request->branch}}">
                                <input type="hidden" name="sector" value="{{$sector->id}}">
                            </form>
                            <div class="card-body px-3">
                                <img class="img-fluid px-4" src="{{asset($sector->image)}}" alt="">
                                <div class="text-center">
                                    <h3 class="mt-2">
                                        <b>{{$sector->name}}</b>
                                    </h3>
                                    <div class="my-2">
                                        <small> <b> <i class="fas fa-stethoscope"></i> {{__('admin.DOCTORS')}} : {{$sector->user()->where('role', 'Doctor')->where('branch_id', $request->branch)->count()}} </b> </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            
            @endif 
            
        @endforeach

    </div>
    
@endif