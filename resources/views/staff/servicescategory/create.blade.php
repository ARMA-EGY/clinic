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
                  <li class="breadcrumb-item"><a href="{{route('staff-services.index')}}">{{__('master.SERVICES')}}</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{ isset($item) ? "Edit Category" : "Add New Category" }}</li>
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
      <div class="row">
        <div class="col-xl-12">
            <div class="card card-defualt">
                <div class="card-header">{{ isset($item) ? "Edit Category" : "Add New Category" }} </div>
        
                <div class="card-body">

                    <form action="{{ isset($item) ? route('staff-servicescategory.update', $item->id) : route('staff-servicescategory.store')  }}" method="post" enctype="multipart/form-data">
                        @csrf

                        @if (isset($item))
                           @method('PUT')
                        @endif
                        
                        <div class="row">

                            <!--=================  Name  =================-->
                            <div class="form-group col-md-6 mb-4 text-left">
                                <label class="font-weight-bold text-uppercase">{{__('master.NAME')}}</label>
                                <input type="text" name="name" class="@error('name') is-invalid @enderror form-control" placeholder="Category Name" value="{{ isset($item) ? $item->name : old('name') }}" required>
                            
                                @error('name')
                                    <div>
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>

                        </div>
        
                        <div class="form-group card-footer">
                        <button type="submit" class="btn btn-success">{{ isset($item) ?  __('master.SAVE'):__('master.ADD') }}</button>
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

@endsection
