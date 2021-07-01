@if (LaravelLocalization::getCurrentLocale() == 'ar')
    @php
    $dir   = 'rtl';
    $text  = 'text-right';
    $inverse_text  = 'text-left';
    $lang  = 'ar';
    @endphp
@elseif (LaravelLocalization::getCurrentLocale() == 'en')  
    @php
    $dir    = 'ltr';
    $text   = '';
    $inverse_text  = 'text-right';
    $lang   = 'en';
    @endphp
@endif

@if ($request->step == 1)

    <label class="font-weight-bold text-uppercase">{{__('admin.SELECT-BRANCH')}}</label>
    <div class="row justify-content-center">
    <!--=================  Branches  =================-->
    
        @foreach ($branches as $branch)
                                            
            <div class="col-xl-3 col-md-4 col-10">
                <div class="card card-defualt choose-card" data-step="1" data-all='{"step":"1", "branch":"{{$branch->id}}"}'>
                    <div class="card-body px-3">
                        <img class="img-fluid px-4" src="{{asset('images/hospital.png')}}" alt="">
                        <div class="text-center">
                            <h3 class="mt-2">
                                <b>{{$branch->name}}</b>
                            </h3>
                            <div class="my-2">
                                <small> <b> <i class="fas fa-tooth"></i> {{__('admin.SECTORS')}} :  {{$branch->sectors()->count()}}  </b> </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach

    </div>

@elseif ($request->step == 2)

    <label class="font-weight-bold text-uppercase">{{__('admin.SELECT-SECTOR')}}</label>
    <div class="row justify-content-center">
    <!--=================  Sectors  =================-->

        @foreach ($sectors as $sector)

            @if ($branch->hasSector($sector->id))
                    
                    <div class="col-xl-3 col-md-4 col-10">
                        <div class="card card-defualt choose-card" data-step="2" data-all='{"step":"2", "branch":"{{$branch->id}}", "sector": "{{$sector->id}}"}'>
                            <div class="card-body px-3">
                                <img class="img-fluid px-4" src="{{asset($sector->image)}}" alt="">
                                <div class="text-center">
                                    <h3 class="mt-2">
                                        <b>{{$sector->name}}</b>
                                    </h3>
                                    <div class="my-2">
                                        <small> <b> <i class="fas fa-stethoscope"></i> {{__('admin.DOCTORS')}} : {{$sector->user()->where('disable', 0)->where('role', 'Doctor')->where('branch_id', $request->branch)->count()}} </b> </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            
            @endif 
            
        @endforeach

    </div>

    <div class="card-footer">
        <div class="form-group mb-0">
            <a class="btn btn-info prev-step" data-step="1" data-all='{"step":"1"}'>{{ __('admin.BACK') }}</a>
        </div>
    </div>

@elseif ($request->step == 3)

    <label class="font-weight-bold text-uppercase">{{__('admin.SELECT-DOCTOR')}}</label>
    <div class="row justify-content-center">
    <!--=================  Doctors  =================-->

        @foreach ($doctors as $doctor)
                    
                <div class="col-xl-3 col-md-4 col-10">
                    <div class="card card-defualt choose-card" data-step="3" data-all='{"step":"3", "branch":"{{$branch->id}}", "sector": "{{$sector->id}}", "doctor": "{{$doctor->id}}"}'>
                        <div class="card-body px-3 text-center">
                            <img class="doctor-img px-4" src="{{asset($doctor->avatar)}}" alt="">
                            <div class="text-center">
                                <h3 class="mt-2">
                                    <b>{{$doctor->name}}</b>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            
        @endforeach

    </div>

    <div class="card-footer">
        <div class="form-group mb-0">
            <a class="btn btn-info prev-step" data-step="2" data-all='{"step":"2", "branch":"{{$branch->id}}"}'>{{ __('admin.BACK') }}</a>
        </div>
    </div>

    
@endif