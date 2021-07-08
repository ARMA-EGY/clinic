@extends('layouts.master')

@section('style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
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
                  <li class="breadcrumb-item"><a href="{{route('inventory.index')}}">{{__('master.BRANCHES')}}</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{ isset($item) ? 'Edit Item' : 'Add New Item' }}</li>
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
                <div class="card-header">{{ isset($item) ? 'Edit Item' : 'Add New Item' }} </div>
        
                <div class="card-body">
                    <form action="{{ isset($item) ? route('inventory.update', $item->id) : route('inventory.store')  }}" method="post" enctype="multipart/form-data">
                        @csrf

                        @if (isset($item))
                           @method('PUT')
                        @endif
                        
                        <div class="row">

                            <!--=================  Name  =================-->
                            <div class="form-group col-md-6 mb-4 text-left">
                                <label class="font-weight-bold text-uppercase">English Name</label>
                                <input type="text" name="name_en" class="@error('name_en') is-invalid @enderror form-control" placeholder="English Name" value="{{ isset($item) ? $item->name_en : old('name_en') }}" required>
                            
                                @error('name_en')
                                    <div>
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
            
                            </div>
        
                            <!--=================  Phone  =================-->
                            <div class="form-group col-md-6 mb-4 text-left">
                                <label class="font-weight-bold text-uppercase">Arabic Name</label>
                                    <input type="text" name="name_ar" class="@error('namname_are') is-invalid @enderror form-control" placeholder="Arabic Name" value="{{ isset($item) ? $item->name_ar : old('name_ar') }}" required>
                                
                                    @error('name_ar')
                                        <div>
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                    @enderror
            
                            </div>

                        </div>
                        <hr class="my-3">

                        <div class="row">

                            <!--=================  Stock  =================-->
                            <div class="form-group col-md-6 mb-4 text-left">
                                <label class="font-weight-bold text-uppercase">Stock</label>
                                <input type="number" name="stock" class="@error('stock') is-invalid @enderror form-control"  value="{{ isset($item) ? $item->stock : old('stock') }}" >
                            
                                @error('stock')
                                    <div>
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
            
                            </div>
        

                        </div>
                        <hr class="my-3">
        
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
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
  <script>
        $(document).ready(function() {
                $('.select2').select2();
            });
    </script>
@endsection
