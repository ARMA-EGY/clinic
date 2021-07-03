<input type="hidden" name="patient_id" value="{{$patient->id}}">
<div class="row">
    <!--=================  Name  =================-->
    <div class="form-group col-md-4 mb-2">
        <label class="font-weight-bold text-uppercase">{{__('admin.NAME')}}</label>
        <input type="text" name="name" class="form-control" placeholder="{{__('admin.NAME')}}" value="{{$patient->name}}" required>
    </div>

    <!--=================  Phone  =================-->
    <div class="form-group col-md-4 mb-2">
        <label class="font-weight-bold text-uppercase">{{__('admin.PHONE')}}</label>
        <input type="number" name="phone" class="form-control" placeholder="{{__('admin.PHONE')}}" value="{{$patient->phone}}" required>
    </div>

    <!--================= identifiation  =================-->
    <div class="form-group col-md-4 mb-2">
        <label class="font-weight-bold text-uppercase">{{__('admin.IDENTIFICATION')}}</label>
        <input type="text" name="identifiation" class="form-control" placeholder="{{__('admin.IDENTIFICATION')}}" value="{{$patient->identifiation}}" required>
    </div>

</div>
<hr class="my-3">

<div class="row">

    <!--=================  dateofbirth  =================-->
    <div class="form-group col-md-4 mb-2">
        <label class="font-weight-bold text-uppercase">{{__('admin.BIRTHDATE')}}</label>
        <input type="date" name="dateofbirth" class="form-control" placeholder="{{__('admin.BIRTHDATE')}}" value="{{$patient->dateofbirth}}" required>
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
        <input type="number" name="age" class="form-control" placeholder="{{__('admin.AGE')}}" value="{{$patient->age}}" required>
    </div>

</div>
<hr class="my-3">

<div class="row">

    <!--================= nationality  =================-->
    <div class="form-group col-md-4 mb-2">
        <label class="font-weight-bold text-uppercase">{{__('admin.NATIONALITY')}}</label>
        <input type="text" name="nationality" class="form-control" placeholder="{{__('admin.NATIONALITY')}}" value="{{$patient->nationality}}" required>
    </div>

    <!--================= relationship  =================-->
    <div class="form-group col-md-4 mb-2">
        <label class="font-weight-bold text-uppercase">{{__('admin.RELATIONSHIP-STATUS')}}</label>
        <select class="form-control" name="relationship" id="input-relationship" required>
            <option value="Single" @isset($patient) @if ($patient->relationship == "Single") selected @endif @endisset >
                {{__('admin.SINGLE')}}
            </option>    
            <option value="Engaged" @isset($patient) @if ($patient->relationship == "Engaged") selected @endif @endisset >
                {{__('admin.ENGAGED')}}
            </option>                                 
            <option value="Married" @isset($patient) @if ($patient->relationship == "Married") selected @endif @endisset >
                {{__('admin.MARRIED')}}
            </option>                                                              
        </select>
    </div>

    <!--================= job  =================-->
    <div class="form-group col-md-4 mb-2">
        <label class="font-weight-bold text-uppercase">{{__('admin.JOB')}}</label>
        <input type="text" name="job" class="form-control" placeholder="{{__('admin.JOB')}}" value="{{$patient->job}}" required>
    </div>

</div>
<hr class="my-3">  

<div class="row">

    <!--================= Medical History  =================-->
    <div class="form-group col-md-12 mb-2">
        <label class="font-weight-bold text-uppercase">{{__('admin.MEDICAL-HISTORY')}}</label>
        <input id="x" type="hidden" name="medical_history" value="{{ $patient->medical_history }}">
        <trix-editor input="x"></trix-editor>
    </div>

</div>