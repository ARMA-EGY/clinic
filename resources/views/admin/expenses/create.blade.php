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
                  <li class="breadcrumb-item"><a href="{{route('expenses.index')}}">{{__('master.EXPENSES')}}</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{ isset($item) ? __('master.EDIT-EXPENSES') : __('master.ADD-NEW-EXPENSES') }}</li>
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
                <div class="card-header">{{ isset($item) ? __('master.EDIT-EXPENSES') : __('master.ADD-NEW-EXPENSES') }} </div>
        
                <div class="card-body">
                    <form action="{{ isset($item) ? route('expenses.update', $item->id) : route('expenses.store')  }}" method="post" enctype="multipart/form-data">
                        @csrf

                        @if (isset($item))
                           @method('PUT')
                        @endif
                        
                        <div class="row">

                            <!--=================  Name  =================-->
                            <div class="form-group col-md-6 mb-4 text-left">
                                <label class="font-weight-bold text-uppercase">{{__('master.NAME')}}</label>
                                <input type="text" name="name" class="@error('name') is-invalid @enderror form-control" placeholder="{{__('master.NAME')}}" value="{{ isset($item) ? $item->name : old('name') }}" required>
                            
                                @error('name')
                                    <div>
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
            
                            </div>
        
                            <!--=================  Price  =================-->
                            <div class="form-group col-md-6 mb-4 text-left">
                                <label class="font-weight-bold text-uppercase">{{__('master.PRICE')}}</label>
                                <input type="number" step="0.1" name="price" class="@error('price') is-invalid @enderror form-control" placeholder="{{__('master.PRICE')}}" value="{{ isset($item) ? $item->price : old('price') }}" required>
                            
                                @error('price')
                                    <div>
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
            
                            </div>

                        <hr class="my-3">

                        <div class="row">

                            <!--=================  Sectors  =================-->
                                <div class="form-group col-md-12 mb-4 text-left">
                                    <label class="font-weight-bold text-uppercase" for="sectors">{{__('master.CATEGORY')}}</label>
                                    <select id="sectors" class=" form-control" name="category_id" required>
                                        @foreach ($Categories as $Category)
                                            <option value="{{$Category->id}}" @if (isset($item))  @if ($item->category_id == $Category->id) selected @endif @endif>{{$Category->name}}</option>
                                        @endforeach
                                    </select>
            
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
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
  <script>
        $(document).ready(function() {
                $('.select2').select2();
            });
    </script>
@endsection
