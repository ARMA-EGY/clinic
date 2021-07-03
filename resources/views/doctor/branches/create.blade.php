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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')


    <!-- Header -->
    <div class="header bg-gradient-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7 {{$text}}">
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('admin.DASHBOARD')}}</a></li>
                  <li class="breadcrumb-item"><a href="{{route('branches.index')}}">{{__('admin.BRANCHES')}}</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{ isset($item) ? __('admin.EDIT-BRANCH') : __('admin.ADD-NEW-BRANCH') }}</li>
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
      <div class="row">
        <div class="col-xl-12">
            <div class="card card-defualt">
                <div class="card-header">{{ isset($item) ? __('admin.EDIT-BRANCH') : __('admin.ADD-NEW-BRANCH') }} </div>
        
                <div class="card-body">
                    <form action="{{ isset($item) ? route('branches.update', $item->id) : route('branches.store')  }}" method="post" enctype="multipart/form-data">
                        @csrf

                        @if (isset($item))
                           @method('PUT')
                        @endif
                        
                        <div class="row">

                            <!--=================  Name  =================-->
                            <div class="form-group col-md-6 mb-4 {{$text}}">
                                <label class="font-weight-bold text-uppercase">{{__('admin.NAME')}}</label>
                                <input type="text" name="name" class="@error('name') is-invalid @enderror form-control" placeholder="{{__('admin.NAME')}}" value="{{ isset($item) ? $item->name : old('name') }}" required>
                            
                                @error('name')
                                    <div>
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
            
                            </div>
        
                            <!--=================  Phone  =================-->
                            <div class="form-group col-md-6 mb-4 {{$text}}">
                                <label class="font-weight-bold text-uppercase">{{__('admin.PHONE')}} </label>
                                <input type="text" name="phone" class="@error('phone') is-invalid @enderror form-control" placeholder="{{__('admin.PHONE')}}" value="{{ isset($item) ? $item->phone : old('phone') }}" required>
                            
                                @error('phone')
                                    <div>
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
            
                            </div>

                        </div>
                        <hr class="my-3">

                        <div class="row">

                            <!--=================  City  =================-->
                            <div class="form-group col-md-6 mb-4 {{$text}}">
                                <label class="font-weight-bold text-uppercase">{{__('admin.CITY')}}</label>
                                <input type="text" name="city" class="@error('city') is-invalid @enderror form-control" placeholder="{{__('admin.CITY')}}" value="{{ isset($item) ? $item->city : old('city') }}" >
                            
                                @error('city')
                                    <div>
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
            
                            </div>
        
                            <!--=================  Address  =================-->
                            <div class="form-group col-md-6 mb-4 {{$text}}">
                                <label class="font-weight-bold text-uppercase">{{__('admin.ADDRESS')}}</label>
                                <input type="text" name="address" class="@error('address') is-invalid @enderror form-control" placeholder="{{__('admin.ADDRESS')}}" value="{{ isset($item) ? $item->address : old('address') }}" >
                            
                                @error('address')
                                    <div>
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
            
                            </div>

                        </div>
                        <hr class="my-3">

                        <div class="row">

                            <!--=================  Sectors  =================-->
                            @if ($sectors->count() > 0)
                                <div class="form-group col-md-12 mb-4 {{$text}}">
                                    <label class="font-weight-bold text-uppercase" for="sectors">{{__('admin.SECTORS')}}</label>
                                    <select id="sectors" class="select2 form-control" name="sectors[]" multiple="multiple">
                                        @foreach ($sectors as $sector)
                                            <option value="{{$sector->id}}" @if (isset($item))  @if ($item->hasSector($sector->id)) selected @endif @endif>{{$sector->name}}</option>
                                        @endforeach
                                    </select>
            
                                </div>
                            @endif
                            
                        </div>
        
                        <div class="form-group card-footer">
                        <button type="submit" class="btn btn-success">{{ isset($item) ?  __('admin.SAVE'):__('admin.ADD') }}</button>
                        </div>
        
                    </form>
                </div>
        
            </div>
        </div>
      </div>
      <!-- Footer -->
      <footer class="footer pt-0">
      </footer>
    </div>

@endsection


@section('script')
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
  <script>
        $(document).ready(function() {
                $('.select2').select2();
            });
    </script>
@endsection
