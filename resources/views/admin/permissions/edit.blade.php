@if (LaravelLocalization::getCurrentLocale() == 'ar')
    @php
    $dir   = 'rtl';
    $text  = 'text-right';
    $inverse_text  = 'text-left';
    $lang  = 'ar';
    $margin  = 'mr-auto';
    @endphp
@elseif (LaravelLocalization::getCurrentLocale() == 'en')  
    @php
    $dir    = 'ltr';
    $text   = '';
    $inverse_text  = 'text-right';
    $lang   = 'en';
    $margin  = 'ml-auto';
    @endphp
@endif

@extends('layouts.admin')

@section('content')    <!-- Header -->
<div class="header bg-gradient-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-12 {{$text}}">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="{{asset('/')}}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{asset('/')}}">{{__('admin.DASHBOARD')}}</a></li>
                            <li class="breadcrumb-item"><a href="{{route('permissions.index')}}">{{__('admin.ROLES')}}</a></li>
                            <li class="breadcrumb-item active"
                                aria-current="page"> {{__('admin.PERMISSIONS')}} ( {{$role->name}} )</li>
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
                <div class="card-header bg-light"> {{__('admin.PERMISSIONS')}} ( {{$role->name}} ) </div>

                <div class="card-body">
                    <form
                        action="{{ route('permissions.update', $role->id)  }}"  method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row {{$text}}">

                            @foreach($permissions as $permission)
                                <div class="col-md-4">
                                    <label class="checkbox checkbox-outline-primary">
                                        <input name="permissions[]" class="form-check-input p-2 mx-2 position-relative" type="checkbox" @foreach($rolePermissions as $rolePermission) @if($rolePermission->id == $permission->id) checked @endif @endforeach value="{{$permission->name}}"> 
                                        <span style="text-transform: uppercase;line-height: 2;">{{__('admin.'.$permission->name)}}</span> 
                                    </label>
                                </div> 
                            @endforeach

                        </div>                       
                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-success">{{__('admin.SAVE')}}</button>
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
