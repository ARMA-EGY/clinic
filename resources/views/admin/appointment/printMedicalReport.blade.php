@extends('layouts.master')

@section('style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
<script>
              
        function printDiv() {
            var divContents = document.getElementById("printDiv").innerHTML;
            var a = window.open('', '', 'height=500, width=500');
            a.document.write('<html>');
            a.document.write('<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">');
            a.document.write('<body >');
            a.document.write(divContents);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }
</script>    
    <!-- Header -->
    <div class="header bg-gradient-primary hide-for-print pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-md-7">
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('master.DASHBOARD')}}</a></li>
                            <li class="breadcrumb-item"><a href="{{route('appointment.index')}}">{{__('master.APPOINTMENTS')}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $appointment->id }}</li>
                            </ol>
                        </nav>
                    </div>

            <div class="col-lg-6 col-5 text-right">
              <a href="#" onclick="printDiv()" class="btn btn-sm btn-neutral"><i class="fa fa-print"></i> {{__('master.PRINT')}}</a>
            </div>
            
                    @if(session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show m-auto" role="alert">
                            {{ session()->get('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
    <!-- End: Header -->


    <!-- Page content -->
    <div class="container-fluid">
        <div class="row" id="printDiv">

            <div style="padding: 30px 10px;">
                <h3 style="text-align: center;border: 2px solid #000;width: fit-content; margin: 10px auto; padding: 5px 20px; border-radius: 10px;">{{__('master.ADD-MEDICAL-REPORT')}}</h3>

                
                <div style="padding: 10px;border: 2px solid #000; border-radius: 10px; height: 900px;">
                    <div class="row" @if (LaravelLocalization::getCurrentLocale() == 'ar') dir="rtl" style="text-align: right"  @elseif (LaravelLocalization::getCurrentLocale() == 'en')  dir="ltr" style="text-align: left"  @endif>
                        <h4 class="col-12">{{__('master.PATIENT-NAME')}}: {{$appointment->patient->name}} </h4>
                        <h4 class="col-12">{{__('master.FILE-NUMBER')}}: {{$appointment->patient->file_no}}  </h4>
                        <h4 class="col-12">{{__('master.AGE')}}: {{$appointment->patient->age}} </h4>
                        <h4 class="col-12">{{__('master.NATIONALITY')}}: {{$appointment->patient->nationality}} </h4>
                        <h4 class="col-12">{{__('master.JOB')}}: {{$appointment->patient->job}} </h4>
                        <h4 class="col-12">{{__('master.DATE-HOSPITAL-VISIT')}}: {{$appointment->hospital_visit_date}} </h4>
                        <h4 class="col-12">{{__('master.DATE-ADMISSION')}}: {{$appointment->report_admission_date}}  </h4>
                        <h4 class="col-12">{{__('master.DATE-DISCHARGE')}}: {{$appointment->report_date_discharge}} </h4>
                    </div>
                    <hr style="margin-top: 2rem; margin-bottom: 2rem; border: 0; border-top: 2px solid rgba(0, 0, 0, .1);">
                    <div class="row" @if (LaravelLocalization::getCurrentLocale() == 'ar') dir="rtl" style="text-align: right"  @elseif (LaravelLocalization::getCurrentLocale() == 'en')  dir="ltr" style="text-align: left"  @endif>
                        <h4 class="col-6">{{__('master.DIAGNOSIS')}}  </h4>
                    </div>
                    <div class="py-4">
                    {!! $appointment->report_diagnosis !!}
                    </div>
                    <hr style="margin-top: 2rem; margin-bottom: 2rem; border: 0; border-top: 2px solid rgba(0, 0, 0, .1);">
                    <div class="row" @if (LaravelLocalization::getCurrentLocale() == 'ar') dir="rtl" style="text-align: right"  @elseif (LaravelLocalization::getCurrentLocale() == 'en')  dir="ltr" style="text-align: left"  @endif>
                        
                        <h4 class="col-12">{{__('master.SICK-LEAVE-PERIOD')}}: {{$appointment->report_sick_leave_period}} </h4>
                        <h4 class="col-12">{{__('master.FROM-DATE')}}:  <span class="mx-2"></span> /<span class="mx-2"></span>/   </h4>
                        <h4 class="col-6">{{__('master.DOCTOR-NAME')}}: {{$appointment->doctor->name}} </h4>
                        <h4 class="col-6">{{__('master.SIGNATURE')}}:  </h4>
                        <h4 class="col-6">{{__('master.MEDICAL-MANAGER')}}:  </h4>
                        <h4 class="col-6">{{__('master.GENERAL-MANAGER')}}:  </h4>
                    </div>
                </div>
            </div>

        </div>



        
    </div>


@endsection

@section('script')


  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
  <script>
        $(document).ready(function() {
                $('.select2').select2();





        $(document).on('submit', '.add_service_form', function(e)
        {
            e.preventDefault();
            let formData = new FormData(this);
            $('.submit').prop('disabled', true);

            var head1 	= 'Done';
            var title1 	= 'Service Added Successfully. ';
            var head2 	= 'Oops...';
            var title2 	= 'Something went wrong, please try again later.';

            $.ajax({
                url: 		"{{route('AppointmentServices.store')}}",
                method: 	'POST',
                data: formData,
                contentType: false,
                processData: false,
                success : function(data)
                    {
                        $('.submit').prop('disabled', false);
                        
                        if (data['status'] == 'true')
                        {
                            Swal.fire(
                                    head1,
                                    title1,
                                    'success'
                                    )
                            setTimeout(function() {window.location.reload();}, 2000);
                        }
                        else if (data['status'] == 'false')
                        {
                            Swal.fire(
                                    head2,
                                    title2,
                                    'error'
                                    )
                        }
                    },
                    error : function(reject)
                    {
                        $('.submit').prop('disabled', false);

                        var response = $.parseJSON(reject.responseText);
                        $.each(response.errors, function(key, val)
                        {
                            Swal.fire(
                                    head2,
                                    val[0],
                                    'error'
                                    )
                        });
                    }
                
                
            });

        });
        
        $(document).on('submit', '.add_notes_form', function(e)
        {
            e.preventDefault();
            let formData = new FormData(this);
            $('.submit').prop('disabled', true);

            var head1 	= 'Done';
            var title1 	= 'Data Changed Successfully. ';
            var head2 	= 'Oops...';
            var title2 	= 'Something went wrong, please try again later.';

            $.ajax({
                url: 		"{{route('admin-appointment-addnotes')}}",
                method: 	'POST',
                data: formData,
                contentType: false,
                processData: false,
                success : function(data)
                    {
                        $('.submit').prop('disabled', false);
                        
                        if (data['status'] == 'true')
                        {
                            Swal.fire(
                                    head1,
                                    title1,
                                    'success'
                                    )
                            setTimeout(function() {window.location.reload();}, 2000);
                        }
                        else if (data['status'] == 'false')
                        {
                            Swal.fire(
                                    head2,
                                    title2,
                                    'error'
                                    )
                        }
                    },
                    error : function(reject)
                    {
                        $('.submit').prop('disabled', false);

                        var response = $.parseJSON(reject.responseText);
                        $.each(response.errors, function(key, val)
                        {
                            Swal.fire(
                                    head2,
                                    val[0],
                                    'error'
                                    )
                        });
                    }
                
                
            });

        }); 
        
        
        
        $(document).on('submit', '.add_prescription_form', function(e)
        {
            e.preventDefault();
            let formData = new FormData(this);
            $('.submit').prop('disabled', true);

            var head1 	= 'Done';
            var title1 	= 'Data Changed Successfully. ';
            var head2 	= 'Oops...';
            var title2 	= 'Something went wrong, please try again later.';

            $.ajax({
                url: 		"{{route('admin-appointment-prescription')}}",
                method: 	'POST',
                data: formData,
                contentType: false,
                processData: false,
                success : function(data)
                    {
                        $('.submit').prop('disabled', false);
                        
                        if (data['status'] == 'true')
                        {
                            Swal.fire(
                                    head1,
                                    title1,
                                    'success'
                                    )
                            setTimeout(function() {window.location.reload();}, 2000);
                        }
                        else if (data['status'] == 'false')
                        {
                            Swal.fire(
                                    head2,
                                    title2,
                                    'error'
                                    )
                        }
                    },
                    error : function(reject)
                    {
                        $('.submit').prop('disabled', false);

                        var response = $.parseJSON(reject.responseText);
                        $.each(response.errors, function(key, val)
                        {
                            Swal.fire(
                                    head2,
                                    val[0],
                                    'error'
                                    )
                        });
                    }
                
                
            });

        });
            });
    </script>
@endsection