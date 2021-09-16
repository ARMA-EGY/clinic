<input type="hidden" name="patient_id" value="{{$patient->id}}">
<div class="row">
    <!--=================  Name  =================-->
    <div class="form-group col-md-4 mb-2">
        <label class="font-weight-bold text-uppercase">{{__('master.NAME')}}</label>
        <input type="text" name="name" class="form-control" placeholder="{{__('master.NAME')}}" value="{{$patient->name}}" required>
    </div>

    <!--=================  Phone  =================-->
    <div class="form-group col-md-4 mb-2">
        <label class="font-weight-bold text-uppercase">{{__('master.PHONE')}}</label>
        <input type="number" name="phone" class="form-control" placeholder="{{__('master.PHONE')}}" value="{{$patient->phone}}" required>
    </div>

    <!--================= identifiation  =================-->
    <div class="form-group col-md-4 mb-2">
        <label class="font-weight-bold text-uppercase">{{__('master.IDENTIFICATION')}}</label>
        <input type="text" name="identifiation" class="form-control" placeholder="{{__('master.IDENTIFICATION')}}" value="{{$patient->identifiation}}" required>
    </div>

</div>
<hr class="my-3">

<div class="row">

    <!--=================  dateofbirth  =================-->
    <div class="form-group col-md-4 mb-2">
        <label class="font-weight-bold text-uppercase">{{__('master.BIRTHDATE')}}</label>
        <input type="date" name="dateofbirth" class="form-control" placeholder="{{__('master.BIRTHDATE')}}" value="{{$patient->dateofbirth}}" required>
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
        <input type="number" name="age" class="form-control" placeholder="{{__('master.AGE')}}" value="{{$patient->age}}" required>
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
        <select class="form-control" name="relationship" id="input-relationship" required>
            <option value="Single" @isset($patient) @if ($patient->relationship == "Single") selected @endif @endisset >
                {{__('master.SINGLE')}}
            </option>    
            <option value="Engaged" @isset($patient) @if ($patient->relationship == "Engaged") selected @endif @endisset >
                {{__('master.ENGAGED')}}
            </option>                                 
            <option value="Married" @isset($patient) @if ($patient->relationship == "Married") selected @endif @endisset >
                {{__('master.MARRIED')}}
            </option>                                                              
        </select>
    </div>

    <!--================= job  =================-->
    <div class="form-group col-md-4 mb-2">
        <label class="font-weight-bold text-uppercase">{{__('master.JOB')}}</label>
        <input type="text" name="job" class="form-control" placeholder="{{__('master.JOB')}}" value="{{$patient->job}}" required>
    </div>

</div>
<hr class="my-3">  

<div class="row">
    <!--=================  File Number  =================-->
    <div class="form-group col-md-4 mb-2 text-left">
        <label class="font-weight-bold text-uppercase">{{__('master.FILE-NUMBER')}}</label>
        <input type="text" name="file_no" class="form-control" placeholder="{{__('master.FILE-NUMBER')}}"  value="{{$patient->file_no}}" required>

    </div>

    <!--=================  Insurance Number  =================-->
    <div class="form-group col-md-4 mb-2 text-left">
        <label class="font-weight-bold text-uppercase">{{__('master.INSURANCE-NUMBER')}}</label>
        <input type="text" name="insurance_no" class="@error('insurance_no') is-invalid @enderror form-control" placeholder="{{__('master.INSURANCE-NUMBER')}}" value="{{$patient->insurance_no}}" required>

    </div>

</div>
<hr class="my-3">

<div class="row">

    <!--================= Medical History  =================-->
    <div class="form-group col-md-12 mb-2">
        <label class="font-weight-bold text-uppercase">{{__('master.MEDICAL-HISTORY')}}</label>
        <input id="x" type="hidden" name="medical_history" value="{{ $patient->medical_history }}">
        <trix-editor input="x"></trix-editor>
    </div>

</div>


<script>
    $(function() 
    {
        $('.selectpicker').selectpicker();
    });
</script>