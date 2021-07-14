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
                    <li class="breadcrumb-item"><a href="{{asset('/')}}"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{asset('/')}}">{{__('master.DASHBOARD')}}</a></li>
                    <li class="breadcrumb-item"><a href="{{route('permissions.index')}}">{{__('master.ROLES')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{__('master.ADD-NEW-ROLE')}}</li>
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
                <div class="card-header">{{__('master.ADD-NEW-ROLE')}}</div>
        
                <div class="card-body">

                    <form action="{{ route('permissions.store')  }}" method="post" enctype="multipart/form-data">
                        @csrf


                        
                        <div class="row">

                            <!--=================  Name  =================-->
                            <div class="form-group col-md-6 mb-4 text-left">
                                <label class="font-weight-bold text-uppercase">{{__('master.NAME')}}</label>
                                <input type="text" name="name" class="@error('name') is-invalid @enderror form-control" placeholder="{{__('master.ROLE-NAME')}}" required>
                            
                                @error('name')
                                    <div>
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>

                        </div>
        
                        <div class="form-group card-footer">
                        <button type="submit" class="btn btn-success">{{ __('master.ADD') }}</button>
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
