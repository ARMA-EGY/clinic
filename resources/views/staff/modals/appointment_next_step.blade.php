

@if ($request->step == 1)

    <label class="font-weight-bold text-uppercase">{{__('master.SELECT-DOCTOR')}}</label>
    <div class="row justify-content-center">
    <!--=================  Doctors  =================-->

        @foreach ($doctors as $doctor)
                    
                <div class="col-xl-3 col-md-4 col-10">
                    <div class="card card-defualt choose-card" data-step="2" data-all='{"step":"2", "branch":"{{$branch->id}}", "sector": "{{$sector->id}}", "doctor": "{{$doctor->id}}"}'>
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
            <a class="btn btn-info prev-step" data-step="1" data-all='{"step":"1", "branch":"{{$branch->id}}"}'>{{ __('master.BACK') }}</a>
        </div>
    </div>
    
@elseif ($request->step == 2)

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
                    <label class="font-weight-bold text-uppercase">{{__('master.SELECT-DATE')}}</label>
                    <input type="date" name="appointment_date" class="form-control doctor_date" value="{{$today}}" data-doctor="{{$doctor->id}}" required>
                    <input type="hidden" name="appointment_number" id="appointment_number">
                    <input type="hidden" name="branch_id" value="{{$branch->id}}">
                    <input type="hidden" name="sector_id" value="{{$sector->id}}">
                    <input type="hidden" name="doctor_id" value="{{$doctor->id}}">
                </div>

                <div class="form-group col-md-12 mb-4">
                    <label class="font-weight-bold text-uppercase">{{__('master.AVAILABLE-SCHEDULE')}}</label>
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
                <h3><i class="fa fa-info-circle"></i> {{__('master.PATIENT-INFORMATION')}}</h3>

                <div class="col-12 text-right">
                    <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#patientsModal"> {{__('master.EXIST-PATIENT')}}</a>
                </div>

                <div class="p-4" id="patient_info">
                        <div class="row">
                            <!--=================  Name  =================-->
                            <div class="form-group col-md-4 mb-2">
                                <label class="font-weight-bold text-uppercase">{{__('master.NAME')}}</label>
                                <input type="text" name="name" class="form-control" placeholder="{{__('master.NAME')}}" required>
                            </div>

                            <!--=================  Phone  =================-->
                            <div class="form-group col-md-4 mb-2">
                                <label class="font-weight-bold text-uppercase">{{__('master.PHONE')}}</label>
                                <input type="number" name="phone" class="form-control" placeholder="{{__('master.PHONE')}}" required>
                            </div>

                            <!--================= identifiation  =================-->
                            <div class="form-group col-md-4 mb-2">
                                <label class="font-weight-bold text-uppercase">{{__('master.IDENTIFICATION')}}</label>
                                <input type="text" name="identifiation" class="form-control" placeholder="{{__('master.IDENTIFICATION')}}" required>
                            </div>


                        </div>
                        <hr class="my-3">

                        <div class="row">

                            <!--=================  dateofbirth  =================-->
                            <div class="form-group col-md-4 mb-2">
                                <label class="font-weight-bold text-uppercase">{{__('master.BIRTHDATE')}}</label>
                                <input type="date" name="dateofbirth" class="form-control" placeholder="{{__('master.BIRTHDATE')}}" required>
                            </div>

                            <!--================= gender  =================-->
                            <div class="form-group col-md-4 mb-2">
                                <label class="font-weight-bold text-uppercase">{{__('master.GENDER')}}</label>
                                <select class="form-control" name="gender" required>
                                    <option value="Male"> {{__('master.MALE')}} </option>
                                    <option value="Female">{{__('master.FEMALE')}} </option>                                   
                                </select>
                            </div>

                            <!--=================  age  =================-->
                            <div class="form-group col-md-4 mb-2">
                                <label class="font-weight-bold text-uppercase">{{__('master.AGE')}}</label>
                                <input type="number" name="age" class="form-control" placeholder="{{__('master.AGE')}}" required>
                            </div>

                        </div>
                        <hr class="my-3">

                        <div class="row">

                            <!--================= nationality  =================-->
                            <div class="form-group col-md-4 mb-2">
                                <label class="font-weight-bold text-uppercase">{{__('master.NATIONALITY')}}</label>
                                <select class="@error('nationality') is-invalid @enderror form-control selectpicker" name="nationality" data-live-search="true" required>
                                    @foreach ($countries as $country)
                                        <option value="{{$country->country_Nationality}}" @if (isset($patient))  @if ($patient->nationality == $country->country_Nationality ) selected @endif @endif>{{__('nationality.'.$country->country_Nationality)}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!--================= relationship  =================-->
                            <div class="form-group col-md-4 mb-2">
                                <label class="font-weight-bold text-uppercase">{{__('master.RELATIONSHIP-STATUS')}}</label>
                                <select class="form-control" name="relationship" required>
                                    <option value="Single">{{__('master.SINGLE')}}</option>    
                                    <option value="Engaged">{{__('master.ENGAGED')}}</option>                                 
                                    <option value="Married">{{__('master.MARRIED')}}</option>                                                              
                                </select>
                            </div>

                            <!--================= job  =================-->
                            <div class="form-group col-md-4 mb-2">
                                <label class="font-weight-bold text-uppercase">{{__('master.JOB')}}</label>
                                <input type="text" name="job" class="form-control" placeholder="{{__('master.JOB')}}" required>
                            </div>

                        </div>
                        <hr class="my-3">  

                        <div class="row">
                            <!--=================  File Number  =================-->
                            <div class="form-group col-md-4 mb-2 text-left">
                                <label class="font-weight-bold text-uppercase">{{__('master.FILE-NUMBER')}}</label>
                                <input type="text" name="file_no" class="form-control" placeholder="{{__('master.FILE-NUMBER')}}" required>
                            </div>

                            <!--=================  Insurance Number  =================-->
                            <div class="form-group col-md-4 mb-2 text-left">
                                <label class="font-weight-bold text-uppercase">{{__('master.INSURANCE-NUMBER')}}</label>
                                <input type="text" name="insurance_no" class="@error('insurance_no') is-invalid @enderror form-control"  placeholder="{{__('master.INSURANCE-NUMBER')}}" required>
                            </div>

                        </div>
                        <hr class="my-3">

                        <div class="row">

                            <!--================= Medical History  =================-->
                            <div class="form-group col-md-12 mb-2">
                                <label class="font-weight-bold text-uppercase">{{__('master.MEDICAL-HISTORY')}}</label>
                                <input id="x" type="hidden" name="medical_history">
                                <trix-editor input="x"></trix-editor>
                            </div>

                        </div>
                </div>

            </div>
    
        </div>

        <div class="card-footer">
            <div class="form-group mb-0 d-flex justify-content-between">
                <a class="btn btn-info prev-step" data-step="2" data-all='{"step":"2", "branch":"{{$branch->id}}", "sector": "{{$sector->id}}"}'>{{ __('master.BACK') }}</a>
                <button type="submit" class="btn btn-success submit" >{{ __('master.FINISH') }}</button>
            </div>
        </div>
    </form>


    <script>
        $(function() 
        {
            $('.selectpicker').selectpicker();
        });
    </script>
    
@endif