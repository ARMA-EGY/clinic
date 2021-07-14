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
                  <li class="breadcrumb-item"><a href="{{route('inventory.index')}}">{{__('master.INVENTORY')}}</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{ isset($item) ? __('master.EDIT-ITEM') : __('master.ADD-NEW-ITEM') }}</li>
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
                <div class="card-header">{{ isset($item) ? __('master.EDIT-ITEM') : __('master.ADD-NEW-ITEM') }} </div>
        
                <div class="card-body">
                    <form action="{{ isset($item) ? route('inventory.update', $item->id) : route('inventory.store')  }}" method="post" enctype="multipart/form-data">
                        @csrf

                        @if (isset($item))
                           @method('PUT')
                        @endif
                        
                        <div class="row">

                            <!--=================  Name  =================-->
                            <div class="form-group col-md-6 mb-4 text-left">
                                <label class="font-weight-bold text-uppercase">{{__('master.NAME')}}</label>
                                <input type="text" name="name" class="@error('name_en') is-invalid @enderror form-control" placeholder="{{__('master.NAME')}}" value="{{ isset($item) ? $item->name : old('name') }}" required>
                            
                                @error('name')
                                    <div>
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
            
                            </div>
        
                            <!--=================  Stock  =================-->
                            <div class="form-group col-md-6 mb-4 text-left">
                              <label class="font-weight-bold text-uppercase">{{__('master.STOCK')}}</label>
                              <input type="number" name="stock" class="@error('stock') is-invalid @enderror form-control"  value="{{ isset($item) ? $item->stock : old('stock') }}" >
                          
                              @error('stock')
                                  <div>
                                      <span class="text-danger">{{ $message }}</span>
                                  </div>
                              @enderror
          
                          </div>

                        </div>
                        <hr class="my-3">

                        <div class="row">

                            <!--=================  Price  =================-->
                            <div class="form-group col-md-6 mb-4 text-left">
                                <label class="font-weight-bold text-uppercase">{{__('master.PRICE')}}</label>
                                <input type="number" step="0.1" name="price" class="@error('price') is-invalid @enderror form-control"  value="{{ isset($item) ? $item->price : old('price') }}" >
                            
                                @error('price')
                                    <div>
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
            
                            </div>

                            <!--=================  Expire Date  =================-->
                            <div class="form-group col-md-6 mb-4 text-left">
                                <label class="font-weight-bold text-uppercase">{{__('master.EXPIRE-DATE')}}</label>
                                <input type="date" name="expire_date" class="@error('expire_date') is-invalid @enderror form-control"  value="{{ isset($item) ? $item->expire_date : old('expire_date') }}" >
                            
                                @error('expire_date')
                                    <div>
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
            
                            </div>
        

                        </div>

                        <hr class="my-3">
                        <div class="row">
                            <!--=================  Branch  =================-->
                            <div class="form-group col-md-6 mb-2">
                            <label class="font-weight-bold text-uppercase" for="body_part">{{__('master.SELECT-BRANCH')}}</label>
                                <select class="form-control selectpicker" data-live-search="true" name="branch_id">
                                    <option>-{{__('master.SELECT')}}-</option>
                  
                                    @if(isset($item))
                                      @foreach($branches as $branch)
                                        <option value="{{$branch->id}}" {{ $branch->id == $item->branch_id ? 'selected' : ''}}>{{$branch->name}}</option>
                                      @endforeach
                                    @else
                                      @foreach($branches as $branch)

                                        <option value="{{$branch->id}}" >{{$branch->name}}</option>
                                      @endforeach
                                    @endif
                                </select>

                                @error('branch_id')
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
