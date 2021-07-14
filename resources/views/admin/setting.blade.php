@extends('layouts.master')

@section('content')

    <!-- Header -->
    <div class="header bg-gradient-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7 text-left">
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('master.DASHBOARD')}}</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{__('master.SETTINGS')}}</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End: Header -->

    <!-- Page content -->
    <div class="container-fluid mt--6">
        
    <form class="setting_form">
        @csrf

        <div class="row">

                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-header"><i class="ni ni-settings"></i> {{__('master.SETTINGS')}} </div>

                        <div class="card-body">

                            <h6 class="heading-small text-muted font-weight-bold text-left mb-4"> {{__('master.HOSPITAL-NAME')}}  </h6>
                            <div class="px-lg-4">
                            <div class="row">

                                <div class="input-group col-12 mb-3 px-0">
                                    <div class="input-group-prepend">
                                        <label for="project_name" class="input-group-text"><i class="fas fa-fingerprint"></i></label>
                                    </div>
                                    <input id="project_name" class="form-control" type="text" name="project_name"  value="{{$setting->project_name}}" required>
                                </div>
                                
                            </div>
                            
                            </div>
                            <hr class="my-4" />

                            <h6 class="heading-small text-muted font-weight-bold text-left mb-4"> {{__('master.CONTRACT-EXPIRY-ALERT')}} </h6>
                            <div class="px-lg-4">
                            <div class="row">

                                <div class="input-group col-12 mb-3 px-0">
                                    <div class="input-group-prepend">
                                        <label for="contract_alert" class="input-group-text"><i class="fas fa-file-signature"></i></label>
                                    </div>

                                    <select id="contract_alert" class="form-control" name="contract_alert" required>
                                        <option value="7"  @if ($setting->contract_alert == 7) selected @endif >{{__('master.1-WEEK')}}</option>
                                        <option value="14"  @if ($setting->contract_alert == 14) selected @endif >{{__('master.2-WEEK')}}</option>
                                        <option value="21"  @if ($setting->contract_alert == 21) selected @endif >{{__('master.3-WEEK')}}</option>
                                        <option value="28"  @if ($setting->contract_alert == 28) selected @endif >{{__('master.4-WEEK')}}</option>
                                    </select>
                                </div>
                                
                            </div>
                            
                            </div>
                            <hr class="my-4" />

                            <h6 class="heading-small text-muted font-weight-bold text-left mb-4"> {{__('master.TAX')}} </h6>
                            <div class="px-lg-4">
                            <div class="row">

                                <div class="input-group col-12 mb-3 px-0">
                                    <div class="input-group-prepend">
                                        <label for="tax" class="input-group-text"><i class="fas fa-percent"></i></label>
                                    </div>
                                    <input id="tax" class="form-control" type="number" step="0.1" name="tax" value="{{$setting->tax}}" required>
                                </div>
                                
                            </div>
                            
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-xl-4">

                    <div class="card card-defualt">
                    <div class="card-header"><i class="far fa-id-badge"></i> {{__('master.LOGO')}} </div>
                        <div class="card-body px-3">
                            <div class="logo-preview" style="background-image: url({{ asset('storage/'.$setting->logo) }})"></div>
                            
                            <input class="d-none" type="file" accept="image/*" id="logo" name="logo" multiple="false" />
                            <label for="logo" class="btn btn-info btn-block btn-sm my-3"><i class="fa fa-image"></i> {{__('master.CHANGE')}}</label>
                        </div>
                    </div>

                </div>

                <div class="col-xl-12">
                    <div class="card card-defualt">
                        <div class="card-body">
                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-success btn-block submit">{{__('master.SAVE-CHANGES')}}</button>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
                    
    </form>

      <!-- Footer -->
      <footer class="footer pt-0">
      </footer>
    </div>

@endsection


@section('script')
    
<script>

    function readURL(input) 
    {
        if (input.files && input.files[0]) 
        {
            var reader = new FileReader();
            
            reader.onload = function (e) 
            {
                $('.logo-preview').css('background-image','url('+e.target.result+')');
            };
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#logo").change(function()
    {
        readURL(this);
    });

    // =============  Setting Form =============
    $(document).on('submit', '.setting_form', function(e)
    {
        e.preventDefault();
        let formData = new FormData(this);
        $('.submit').prop('disabled', true);
        
        var head1 	= "{{__('master.DONE')}}";
        var title1 	= "{{__('master.DATA-CHANGED-SUCCESSFULLY')}}";
        var head2 	= "{{__('master.OOPS')}}";
        var title2 	= "{{__('master.SOMETHING-WRONG')}}";

        $.ajax({
            url: 		"{{route('edit-setting')}}",
            method: 	'POST',
            data: formData,
            dataType: 	'json',
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

</script>

<script>



</script>

@endsection
