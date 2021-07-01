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

@elseif ($request->step == 2)

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
    
@elseif ($request->step == 3)

        <!--=================  Appointments  =================-->
        
    <form class="appointment_form">
        @csrf
        <div class="row ">
                        
            <div class="col-xl-3 col-md-4 col-10">
                <div class="card card-defualt">
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
                            
            <div class="col-xl-9 col-md-8 col-10">

                <div class="form-group col-md-12 mb-4">
                    <label class="font-weight-bold text-uppercase">{{__('admin.SELECT-DATE')}}</label>
                    <input type="date" name="appointment_date" class="form-control doctor_date" value="{{$today}}" data-doctor="{{$doctor->id}}" required>
                    <input type="hidden" name="appointment_number" id="appointment_number">
                    <input type="hidden" name="branch_id" value="{{$branch->id}}">
                    <input type="hidden" name="sector_id" value="{{$sector->id}}">
                    <input type="hidden" name="doctor_id" value="{{$doctor->id}}">
                </div>

                <div class="form-group col-md-12 mb-4">
                    <label class="font-weight-bold text-uppercase">{{__('admin.AVAILABLE-SCHEDULE')}}</label>
                    <div class="time-serial-parent mt-3" id="available-schedule">
                        @foreach(range(1, 50) as $n)
                            @if (in_array($n, $appointments))
                                <a href="javascript:void(0)" class="btn mx-1 mb-2 btn-grey disabled">{{$n}}</a>
                            @else 
                                <a href="javascript:void(0)" class="btn mx-1 mb-2 available-time" data-value="{{$n}}">{{$n}}</a>
                            @endif
                        @endforeach
                    </div>
                </div>
                
            </div>

            <div class="col-xl-12">
                <h3><i class="fa fa-info-circle"></i> {{__('admin.PATIENT-INFORMATION')}}</h3>

                <div class="col-12 {{$inverse_text}}">
                    <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#patientsModal"> {{__('admin.EXIST-PATIENT')}}</a>
                </div>

                <div class="p-4" id="patient_info">
                        <div class="row">
                            <!--=================  Name  =================-->
                            <div class="form-group col-md-4 mb-2">
                                <label class="font-weight-bold text-uppercase">{{__('admin.NAME')}}</label>
                                <input type="text" name="name" class="form-control" placeholder="{{__('admin.NAME')}}" required>
                            </div>

                            <!--=================  Phone  =================-->
                            <div class="form-group col-md-4 mb-2">
                                <label class="font-weight-bold text-uppercase">{{__('admin.PHONE')}}</label>
                                <input type="number" name="phone" class="form-control" placeholder="{{__('admin.PHONE')}}" required>
                            </div>

                            <!--================= identifiation  =================-->
                            <div class="form-group col-md-4 mb-2">
                                <label class="font-weight-bold text-uppercase">{{__('admin.IDENTIFICATION')}}</label>
                                <input type="text" name="identifiation" class="form-control" placeholder="{{__('admin.IDENTIFICATION')}}" required>
                            </div>


                        </div>
                        <hr class="my-3">

                        <div class="row">

                            <!--=================  dateofbirth  =================-->
                            <div class="form-group col-md-4 mb-2">
                                <label class="font-weight-bold text-uppercase">{{__('admin.BIRTHDATE')}}</label>
                                <input type="date" name="dateofbirth" class="form-control" placeholder="{{__('admin.BIRTHDATE')}}" required>
                            </div>

                            <!--================= gender  =================-->
                            <div class="form-group col-md-4 mb-2">
                                <label class="font-weight-bold text-uppercase">{{__('admin.GENDER')}}</label>
                                <select class="form-control" name="gender" required>
                                    <option value="Male"> {{__('admin.MALE')}} </option>
                                    <option value="Female">{{__('admin.FEMALE')}} </option>                                   
                                </select>
                            </div>

                            <!--=================  age  =================-->
                            <div class="form-group col-md-4 mb-2">
                                <label class="font-weight-bold text-uppercase">{{__('admin.AGE')}}</label>
                                <input type="number" name="age" class="form-control" placeholder="{{__('admin.AGE')}}" required>
                            </div>

                        </div>
                        <hr class="my-3">

                        <div class="row">

                            <!--================= nationality  =================-->
                            <div class="form-group col-md-4 mb-2">
                                <label class="font-weight-bold text-uppercase">{{__('admin.NATIONALITY')}}</label>
                                <input type="text" name="nationality" class="form-control" placeholder="{{__('admin.NATIONALITY')}}" required>
                            </div>

                            <!--================= relationship  =================-->
                            <div class="form-group col-md-4 mb-2">
                                <label class="font-weight-bold text-uppercase">{{__('admin.RELATIONSHIP-STATUS')}}</label>
                                <select class="form-control" name="relationship" required>
                                    <option value="Single">{{__('admin.SINGLE')}}</option>    
                                    <option value="Engaged">{{__('admin.ENGAGED')}}</option>                                 
                                    <option value="Married">{{__('admin.MARRIED')}}</option>                                                              
                                </select>
                            </div>

                            <!--================= job  =================-->
                            <div class="form-group col-md-4 mb-2">
                                <label class="font-weight-bold text-uppercase">{{__('admin.JOB')}}</label>
                                <input type="text" name="job" class="form-control" placeholder="{{__('admin.JOB')}}" required>
                            </div>

                        </div>
                        <hr class="my-3">  

                        <div class="row">

                            <!--================= Medical History  =================-->
                            <div class="form-group col-md-12 mb-2">
                                <label class="font-weight-bold text-uppercase">{{__('admin.MEDICAL-HISTORY')}}</label>
                                <input id="x" type="hidden" name="medical_history">
                                <trix-editor input="x"></trix-editor>
                            </div>

                        </div>
                </div>

            </div>
    
        </div>

        <div class="card-footer">
            <div class="form-group mb-0 d-flex justify-content-between">
                <a class="btn btn-info prev-step" data-step="3" data-all='{"step":"3", "branch":"{{$branch->id}}", "sector": "{{$sector->id}}"}'>{{ __('admin.BACK') }}</a>
                <button type="submit" class="btn btn-success submit" >{{ __('admin.FINISH') }}</button>
            </div>
        </div>
    </form>
    
@endif