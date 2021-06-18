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
                  <li class="breadcrumb-item"><a href="{{route('services.index')}}">{{__('admin.SERVICES')}}</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{ isset($item) ? __('admin.EDIT-SERVICE') : __('admin.ADD-NEW-SERVICE') }}</li>
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
                <div class="card-header">{{ isset($item) ? __('admin.EDIT-SERVICE') : __('admin.ADD-NEW-SERVICE') }} </div>
        
                <div class="card-body">
                    <form action="{{ isset($item) ? route('services.update', $item->id) : route('services.store')  }}" method="post" enctype="multipart/form-data">
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
        
                            <!--=================  Number  =================-->
                            <div class="form-group col-md-6 mb-4 {{$text}}">
                                <label class="font-weight-bold text-uppercase">{{__('admin.SERVICE-NUMBER')}} </label>
                                <input type="text" name="number" class="@error('number') is-invalid @enderror form-control" placeholder="{{__('admin.SERVICE-NUMBER')}}" value="{{ isset($item) ? $item->number : old('number') }}" required>
                            
                                @error('number')
                                    <div>
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
            
                            </div>

                        </div>
                        <hr class="my-3">

                        <div class="row">

                            <!--=================  Price  =================-->
                            <div class="form-group col-md-6 mb-4 {{$text}}">
                                <label class="font-weight-bold text-uppercase">{{__('admin.PRICE')}}</label>
                                <input type="number" step="0.1" name="price" class="@error('price') is-invalid @enderror form-control" placeholder="{{__('admin.PRICE')}}" value="{{ isset($item) ? $item->price : old('price') }}" >
                            
                                @error('price')
                                    <div>
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
            
                            </div>
        
                            <!--=================  Sector  =================-->
                            <div class="form-group col-md-6 mb-4 {{$text}}">
                                <label class="font-weight-bold text-uppercase">{{__('admin.SECTOR')}}</label>

                                <select class="form-control" name="sector_id" required>
                                    @foreach ($sectors as $sector)
                                        <option value="{{$sector->id}}" @if (isset($item))  @if ($item->sector_id == $sector->id ) selected @endif @endif>{{$sector->name}}</option>
                                    @endforeach
                                </select>

                                @error('sector_id')
                                    <div>
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>

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
