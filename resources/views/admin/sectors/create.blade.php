@extends('layouts.master')

@section('style')

@endsection

@section('content')

    <!-- Header -->
    <div class="header bg-gradient-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">

            <div class="col-lg-12 text-left">
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('master.DASHBOARD')}}</a></li>
                  <li class="breadcrumb-item"><a href="{{route('sectors.index')}}">{{__('master.SECTORS')}}</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{ isset($item) ? __('master.EDIT-SECTOR') : __('master.ADD-NEW-SECTOR') }}</li>
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

      <form action="{{ isset($item) ? route('sectors.update', $item->id) : route('sectors.store')  }}" method="post" enctype="multipart/form-data">
        @csrf

          @if (isset($item))
             @method('PUT')
          @endif


          <div class="row">

              <div class="col-xl-8">

                  <div class="card card-defualt">
                      <div class="card-header"><i class="fa fa-info-circle"></i> {{__('master.INFORMATION')}} </div>
                      <div class="card-body">
                              
                              <div class="row">

                                  <!--=================  Name  =================-->
                                  <div class="form-group col-md-12 mb-2 text-left">
                                      <label class="font-weight-bold text-uppercase">{{__('master.NAME')}}</label>
                                      <input type="text" name="name" class="@error('name') is-invalid @enderror form-control" placeholder="{{__('master.NAME')}}" value="{{ isset($item) ? $item->name : old('name') }}" required>
                                  
                                      @error('name')
                                          <div>
                                              <span class="text-danger">{{ $message }}</span>
                                          </div>
                                      @enderror
                  
                                  </div>

                              </div>
                              <hr class="my-2">

                              <div class="row">

                                  <!--=================  Description  =================-->
                                  <div class="form-group col-md-12 mb-2 text-left">
                                      <label class="font-weight-bold text-uppercase">{{__('master.DESCRIPTION')}}</label>
                                      <textarea name="description" class="form-control" cols="30" rows="10">{{ isset($item) ? $item->description : old('description') }}</textarea>
                                  
                                      @error('description')
                                          <div>
                                              <span class="text-danger">{{ $message }}</span>
                                          </div>
                                      @enderror
                  
                                  </div>

                              </div>

                      </div>
                  </div>

              </div>

              <div class="col-xl-4">

                  <div class="card card-defualt">
                      <div class="card-header"><i class="far fa-image"></i> {{__('master.PICTURE')}} </div>
                      <div class="card-body px-3">
                          <div class="avatar-preview" style="background-image: url({{ isset($item) ?  asset($item->image)  : asset('images/sector.png') }})"></div>
                          <div class="my-2 text-left">
                            <small> {!! __('master.IMAGE-INFO') !!} </small> 
                          </div>
                          <input class="btn-info form-control form-control-sm" type="file" accept="image/*" id="image" name="image" multiple="false" />
                      </div>
                  </div>

              </div>

          </div>

          <div class="card card-defualt">
              <div class="card-body">
                  <div class="form-group mb-0">
                      <button type="submit" class="btn btn-success btn-block">{{ isset($item) ?  __('master.SAVE'):__('master.ADD') }}</button>
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
  $(document).ready(function() 
  {
      $('.select2').select2();
  });

  function readURL(input) 
  {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          
          reader.onload = function (e) 
          {
              $('.avatar-preview').css('background-image','url('+e.target.result+')');
          };
          
          reader.readAsDataURL(input.files[0]);
      }
  }
  
  $("#image").change(function()
  {
      readURL(this);
  });

</script>
@endsection
