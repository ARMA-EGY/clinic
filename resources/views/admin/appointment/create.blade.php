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

@extends('layouts.admin')

@section('style')

<style>

    .box-row 
    {
    display: flex;
    justify-content: space-between;
    width: 100%;
    margin: auto;
    }

    .box-button 
    {
    display: flex;
    align-items: center;
    }

    .box-label 
    {
    text-align: center;
    }

    .box 
    {
    display: flex;
    flex-direction: column;
    flex-grow: 1;
    transition: all 0.3s linear;
    }

    .box-icon 
    {
    width: 48px;
    height: 48px;
    padding: 8px;
    margin-bottom: 8px;
    border-radius: 50%;
    border: 3px solid #ccc;
    color: #000;
    transition: all 0.3s linear;
    }

    .box.active .box-icon
    {
    border: 3px solid #2bbaff;
    }

    .box-tag 
    {
    flex-grow: 1;
    min-width: 20px;
    height: 4px;
    background-color: #ccc;
    transition: all 0.3s linear;
    }

    .box.active .box-tag 
    {
    background-color: #2bbaff;
    }

    .box:first-child .box-tag-left 
    {
    background-color: white;
    }

    .box:last-child .box-tag-right 
    {
    background-color: white;
    }

    @media (max-width: 480px) 
    {
    .box 
    {
        width: 16px;
        height: 16px;
    }

    .box-icon 
    {
        width: unset;
        height: unset; 
        font-size: 10px;
        padding: 5px;
    }

    body 
    {
        font-size: 0.8em;
    }

    }

</style>

@endsection

@section('content')


    <!-- Header -->
    <div class="header bg-gradient-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-12 {{$text}}">
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('admin.DASHBOARD')}}</a></li>
                  <li class="breadcrumb-item"><a href="{{route('appointment.index')}}">{{__('admin.APPOINTMENTS')}}</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{  __('admin.CREATEE-NEW-APPOINTMENT') }}</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 {{$inverse_text}}">
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End: Header -->


    <!-- Page content -->
    <div class="container-fluid mt--6">

      <form action="{{ route('appointment.store')  }}" method="post" enctype="multipart/form-data">
        @csrf

          @if (isset($item))
             @method('PUT')
          @endif

          <div class="row">

              <div class="col-xl-12">

                  <div class="card card-defualt">

                      <div class="card-header">
                        <div class="box-row">

                            <div class="box active">
                                <div class="box-button">
                                    <div class="box-tag box-tag-left"></div>
                                    <div class="box-icon text-center">
                                    <i class="fas fa-clinic-medical"></i>
                                    </div>
                                    <div class="box-tag box-tag-right"></div>
                                </div>
                                <span class="box-label">{{__('admin.BRANCH')}}</span>
                            </div>

                            <div class="box">
                                <div class="box-button">
                                    <div class="box-tag box-tag-left"></div>
                                    <div class="box-icon text-center">
                                    <i class="fas fa-tooth"></i>
                                    </div>
                                    <div class="box-tag box-tag-right"></div>
                                </div>
                                <span class="box-label">{{__('admin.SECTOR')}}</span>
                            </div>

                            <div class="box">
                                <div class="box-button">
                                    <div class="box-tag box-tag-left"></div>
                                    <div class="box-icon text-center">
                                    <i class="fas fa-stethoscope"></i>
                                    </div>
                                    <div class="box-tag box-tag-right"></div>
                                </div>
                                <span class="box-label">{{__('admin.DOCTOR')}}</span>
                            </div>

                            <div class="box">
                                <div class="box-button">
                                    <div class="box-tag box-tag-left"></div>
                                    <div class="box-icon text-center">
                                    <i class="fas fa-syringe"></i>
                                    </div>
                                    <div class="box-tag box-tag-right"></div>
                                </div>
                                <span class="box-label">{{__('admin.PATIENT')}}</span>
                            </div>
                            
                        </div>
                      </div>

                      <div class="card-body mt-3 {{$text}}" id="card-body">
                            <label class="font-weight-bold text-uppercase">{{__('admin.SELECT-BRANCH')}}</label>
                            <div class="row justify-content-center">
                                <!--=================  Branches  =================-->

                                @if (isset($branches))
                                
                                    @foreach ($branches as $branch)
                                        
                                        <div class="col-xl-3 col-md-4 col-10">
                                            <div class="card card-defualt choose-card" data-step="1">
                                                <form id="form">
                                                    <input type="hidden" name="step" value="1">
                                                    <input type="hidden" name="branch" value="{{$branch->id}}">
                                                </form>
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

                                @endif

                            </div>

                            <div class="card-footer">
                              <div class="form-group mb-0 {{$inverse_text}}">
                                  <button type="submit" class="btn btn-success">{{ __('admin.NEXT') }}</button>
                              </div>
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

        $(document).on("click",".choose-card", function()
        {
            var loader 	  = $('#loader2').attr('data-load');
            var step 	  = $(this).attr('data-step');
            var active    = '.box:eq('+step+')';
            let formData = new FormData(document.getElementById("form"));

            $(active).addClass('active');
            $('#card-body').html(loader);

            $.ajax({
                    url: "{{route('appointment.next')}}",
                    type:"POST",
                    dataType: 'text',
                    data:    formData,
                    processData: false,
                    contentType: false,
                    success : function(response)
                        {
                            $('#card-body').html(response);
                        }  
                  })
        });

    </script>
@endsection
