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


<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="ARMA Software">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Clinic System</title>
  <!-- Favicon -->
  <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="{{ asset('admin_assets/vendor/nucleo/css/nucleo.css') }}" type="text/css">
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
  <!-- Page plugins --> 
  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{ asset('admin_assets/css/argon.css?v=1.2.0') }}" type="text/css">
  <!-- Bootstrap switch toggle button -->
  <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
  <!-- Google Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <!-- Material Design Bootstrap -->
  {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet"> --}}
  <link rel="stylesheet" href="{{ asset('admin_assets/css/mdbootstrap.css') }}" type="text/css">
 
  {{-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> --}}
  <!-- JQUERY UI -->
  <link rel="stylesheet" href="{{ asset('admin_assets/css/jquery-ui.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">
  <link rel="stylesheet" href="{{ asset('admin_assets/css/trix.min.css') }}" type="text/css">

  @if (LaravelLocalization::getCurrentLocale() == 'ar')
    <!-- RTL CSS -->
    <link rel="stylesheet" href="{{ asset('admin_assets/css/rtl.css') }}" type="text/css">
  @endif



  @yield('style')
</head>
<body>

    <!-- Sidenav -->
    <nav class="sidenav navbar navbar-vertical  fixed-left navbar-expand-xs navbar-dark bg-dark" id="sidenav-main">
        <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center">
            <a class="navbar-brand" href="javascript:void(0)">
                @isset($logo)
                 <img src="{{ asset('storage/'.$logo->logo) }}" class="navbar-brand-img" alt="Logo" style="width: 130px;">
                 @else
                    <h3 class="text-white"> Clinic System</h3>
                 @endisset
            </a>
        </div>
        <div class="navbar-inner">
            <!-- Collapse --><div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Nav items -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{request()->routeIs('home') ? 'active' : '' }}" href="{{route('home')}}">
                        <i class="fas fa-th-large"></i>
                        <span class="nav-link-text">{{__('admin.HOME')}}</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#navbar-branches" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-components">
                      <i class="fas fa-clinic-medical"></i>
                      <span class="nav-link-text">{{__('admin.BRANCHES')}}</span>
                    </a>
                    <div class="collapse" id="navbar-branches" style="">
                      <ul class="nav nav-sm flex-column">
                      @if(auth()->user()->can('create branch'))
                        <li class="nav-item">
                            <a href="{{ route('branches.create')}}" class="nav-link nav-link-sub {{request()->routeIs('branches.create') ? 'active' : '' }}">
                              <i class="far fa-dot-circle"></i>
                              <span class="sidenav-normal"> {{__('admin.ADD-NEW-BRANCH')}} </span>
                            </a>
                        </li>
                      @endif

                      @if(auth()->user()->can('all branches'))
                        <li class="nav-item">
                          <a href="{{route('branches.index')}}" class="nav-link nav-link-sub {{request()->routeIs('branches.index') ? 'active' : '' }}">
                            <i class="far fa-dot-circle"></i>
                            <span class="sidenav-normal"> {{__('admin.ALL-BRANCHES')}} </span>
                          </a>
                        </li>
                      @endif

                      @if(auth()->user()->can('active branches'))
                        <li class="nav-item">
                          <a href="{{ route('active-branches')}}" class="nav-link nav-link-sub {{request()->routeIs('active-branches') ? 'active' : '' }}">
                            <i class="far fa-dot-circle"></i>
                            <span class="sidenav-normal"> {{__('admin.ACTIVE-BRANCHES')}} </span>
                          </a>
                        </li>
                      @endif  

                      @if(auth()->user()->can('deactivated branches'))
                        <li class="nav-item">
                            <a href="{{ route('deactive-branches')}}" class="nav-link nav-link-sub {{request()->routeIs('deactive-branches') ? 'active' : '' }}">
                            <i class="far fa-dot-circle"></i>
                            <span class="sidenav-normal"> {{__('admin.DEACTIVATED-BRANCHES')}} </span>
                          </a>
                        </li>
                      @endif  
                        
                      </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#navbar-sectors" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-components">
                      <i class="fas fa-tooth"></i>
                      <span class="nav-link-text">{{__('admin.SECTORS')}}</span>
                    </a>
                    <div class="collapse" id="navbar-sectors" style="">
                      <ul class="nav nav-sm flex-column">
                      @if(auth()->user()->can('create sectors'))
                        <li class="nav-item">
                          <a href="{{route('sectors.create')}}" class="nav-link nav-link-sub {{request()->routeIs('sectors.create') ? 'active' : '' }}">
                            <i class="far fa-dot-circle"></i>
                            <span class="sidenav-normal"> {{__('admin.ADD-NEW-SECTOR')}} </span>
                          </a>
                        </li>
                      @endif 

                      @if(auth()->user()->can('all sectors'))
                        <li class="nav-item">
                          <a href="{{route('sectors.index')}}" class="nav-link nav-link-sub {{request()->routeIs('sectors.index') ? 'active' : '' }}">
                            <i class="far fa-dot-circle"></i>
                            <span class="sidenav-normal"> {{__('admin.ALL-SECTORS')}} </span>
                          </a>
                        </li>
                      @endif

                      @if(auth()->user()->can('active sectors'))
                        <li class="nav-item">
                          <a href="{{ route('active-sectors')}}" class="nav-link nav-link-sub {{request()->routeIs('active-sectors') ? 'active' : '' }}">
                            <i class="far fa-dot-circle"></i>
                            <span class="sidenav-normal"> {{__('admin.ACTIVE-SECTORS')}} </span>
                          </a>
                        </li>
                      @endif

                      @if(auth()->user()->can('deactivated sectors'))
                        <li class="nav-item">
                          <a href="{{ route('deactive-sectors')}}" class="nav-link nav-link-sub {{request()->routeIs('deactive-sectors') ? 'active' : '' }}">
                            <i class="far fa-dot-circle"></i>
                            <span class="sidenav-normal"> {{__('admin.DEACTIVATED-SECTORS')}} </span>
                          </a>
                        </li>
                      @endif  
                      </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#navbar-doctors" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-components">
                      <i class="fas fa-stethoscope"></i>
                      <span class="nav-link-text">{{__('admin.DOCTORS')}}</span>
                    </a>
                    <div class="collapse" id="navbar-doctors" style="">
                      <ul class="nav nav-sm flex-column">
                      @if(auth()->user()->can('create doctors'))
                        <li class="nav-item">
                          <a href="{{ route('doctors.create')}}" class="nav-link nav-link-sub {{request()->routeIs('doctors.create') ? 'active' : '' }}">
                            <i class="far fa-dot-circle"></i>
                            <span class="sidenav-normal"> {{__('admin.ADD-NEW-DOCTOR')}} </span>
                          </a>
                        </li>
                      @endif 

                      @if(auth()->user()->can('all doctors'))
                        <li class="nav-item">
                          <a href="{{ route('doctors.index')}}" class="nav-link nav-link-sub {{request()->routeIs('doctors.index') ? 'active' : '' }}">
                            <i class="far fa-dot-circle"></i>
                            <span class="sidenav-normal"> {{__('admin.ALL-DOCTORS')}} </span>
                          </a>
                        </li>
                      @endif 

                      @if(auth()->user()->can('active doctors'))
                        <li class="nav-item">
                          <a href="{{ route('active-doctors')}}" class="nav-link nav-link-sub {{request()->routeIs('active-doctors') ? 'active' : '' }}">
                            <i class="far fa-dot-circle"></i>
                            <span class="sidenav-normal"> {{__('admin.ACTIVE-DOCTORS')}} </span>
                          </a>
                        </li>
                      @endif

                      @if(auth()->user()->can('deactivated doctors'))
                        <li class="nav-item">
                          <a href="{{ route('deactive-doctors')}}" class="nav-link nav-link-sub {{request()->routeIs('deactive-doctors') ? 'active' : '' }}">
                            <i class="far fa-dot-circle"></i>
                            <span class="sidenav-normal"> {{__('admin.BANNED-DOCTORS')}} </span>
                          </a>
                        </li>
                      @endif  

                      </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#navbar-staff" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-components">
                      <i class="fa fa-users"></i>
                      <span class="nav-link-text">{{__('admin.STAFF')}}</span>
                    </a>
                    <div class="collapse" id="navbar-staff" style="">
                      <ul class="nav nav-sm flex-column">
                      @if(auth()->user()->can('create staff'))
                        <li class="nav-item">
                          <a href="{{ route('staff.create')}}" class="nav-link nav-link-sub {{request()->routeIs('staff.create') ? 'active' : '' }}">
                            <i class="far fa-dot-circle"></i>
                            <span class="sidenav-normal"> {{__('admin.ADD-NEW-STAFF')}} </span>
                          </a>
                        </li>
                      @endif

                      @if(auth()->user()->can('all staff'))                      
                        <li class="nav-item">
                          <a href="{{route('staff.index')}}" class="nav-link nav-link-sub {{request()->routeIs('staff.index') ? 'active' : '' }}">
                            <i class="far fa-dot-circle"></i>
                            <span class="sidenav-normal"> {{__('admin.ALL-STAFF')}} </span>
                          </a>
                        </li>
                      @endif

                      @if(auth()->user()->can('active staff')) 
                        <li class="nav-item">
                          <a href="{{ route('active-staff')}}" class="nav-link nav-link-sub {{request()->routeIs('active-staff') ? 'active' : '' }}">
                            <i class="far fa-dot-circle"></i>
                            <span class="sidenav-normal"> {{__('admin.ACTIVE-STAFF')}} </span>
                          </a>
                        </li>
                      @endif

                      @if(auth()->user()->can('deactivated staff')) 
                        <li class="nav-item">
                          <a href="{{ route('deactive-staff')}}" class="nav-link nav-link-sub {{request()->routeIs('deactive-staff') ? 'active' : '' }}">
                            <i class="far fa-dot-circle"></i>
                            <span class="sidenav-normal"> {{__('admin.BANNED-STAFF')}} </span>
                          </a>
                        </li>
                      @endif

                      </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#navbar-patients" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-components">
                      <i class="fas fa-syringe"></i>
                      <span class="nav-link-text">{{__('admin.PATIENTS')}}</span>
                    </a>
                    <div class="collapse" id="navbar-patients" style="">
                      <ul class="nav nav-sm flex-column">
                      @if(auth()->user()->can('create patients')) 
                        <li class="nav-item">
                          <a href="{{route('patients.create')}}" class="nav-link nav-link-sub {{request()->routeIs('patients.create') ? 'active' : '' }}">
                            <i class="far fa-dot-circle"></i>
                            <span class="sidenav-normal"> {{__('admin.ADD-NEW-PATIENT')}} </span>
                          </a>
                        </li>
                      @endif

                      @if(auth()->user()->can('all patients'))                       
                        <li class="nav-item">
                          <a href="{{route('patients.index')}}" class="nav-link nav-link-sub {{request()->routeIs('patients.index') ? 'active' : '' }}">
                            <i class="far fa-dot-circle"></i>
                            <span class="sidenav-normal"> {{__('admin.ALL-PATIENTS')}} </span>
                          </a>
                        </li>
                      @endif
                        
                      </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#navbar-appointment" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-components">
                      <i class="fas fa-notes-medical"></i>
                      <span class="nav-link-text">{{__('admin.APPOINTMENTS')}}</span>
                    </a>
                    <div class="collapse" id="navbar-appointment" style="">
                      <ul class="nav nav-sm flex-column">

                        <li class="nav-item">
                          <a href="{{route('appointment.create')}}" class="nav-link nav-link-sub {{request()->routeIs('appointment.create') ? 'active' : '' }}">
                            <i class="far fa-dot-circle"></i>
                            <span class="sidenav-normal"> {{__('admin.CREATEE')}}  </span>
                          </a>
                        </li>

                        <li class="nav-item">
                          <a href="{{route('appointment.today')}}" class="nav-link nav-link-sub {{request()->routeIs('appointment.today') ? 'active' : '' }}">
                            <i class="far fa-dot-circle"></i>
                            <span class="sidenav-normal"> {{__('admin.TODAY')}}  </span>
                          </a>
                        </li>

                        <li class="nav-item">
                          <a href="{{route('appointment.done')}}" class="nav-link nav-link-sub {{request()->routeIs('appointment.done') ? 'active' : '' }}">
                            <i class="far fa-dot-circle"></i>
                            <span class="sidenav-normal"> {{__('admin.DONE')}}  </span>
                          </a>
                        </li>

                        <li class="nav-item">
                          <a href="{{route('appointment.cancelled')}}" class="nav-link nav-link-sub {{request()->routeIs('appointment.cancelled') ? 'active' : '' }}">
                            <i class="far fa-dot-circle"></i>
                            <span class="sidenav-normal"> {{__('admin.CANCELLED')}}  </span>
                          </a>
                        </li>

                        <li class="nav-item">
                          <a href="{{route('appointment.index')}}" class="nav-link nav-link-sub {{request()->routeIs('appointment.index') ? 'active' : '' }}">
                            <i class="far fa-dot-circle"></i>
                            <span class="sidenav-normal"> {{__('admin.ALL')}}  </span>
                          </a>
                        </li>

                      </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#navbar-services" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-components">
                      <i class="fas fa-briefcase-medical"></i>
                      <span class="nav-link-text">{{__('admin.SERVICES')}}</span>
                    </a>
                    <div class="collapse" id="navbar-services" style="">
                      <ul class="nav nav-sm flex-column">
                      @if(auth()->user()->can('create services'))
                        <li class="nav-item">
                          <a href="{{ route('services.create')}}" class="nav-link nav-link-sub {{request()->routeIs('services.create') ? 'active' : '' }}">
                            <i class="far fa-dot-circle"></i>
                            <span class="sidenav-normal"> {{__('admin.ADD-NEW-SERVICE')}} </span>
                          </a>
                        </li>
                      @endif

                      @if(auth()->user()->can('all services'))
                        <li class="nav-item">
                          <a href="{{ route('services.index')}}" class="nav-link nav-link-sub {{request()->routeIs('services.index') ? 'active' : '' }}">
                            <i class="far fa-dot-circle"></i>
                            <span class="sidenav-normal"> {{__('admin.ALL-SERVICES')}} </span>
                          </a>
                        </li>
                      @endif
                        
                      </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#navbar-rays" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-components">
                      <i class="fas fa-x-ray"></i>
                      <span class="nav-link-text">{{__('admin.RAYS')}}</span>
                      <span class="badge badge-warning fs-9 p-1 mx-2">{{__('admin.PENDING')}}</span>
                    </a>
                    <div class="collapse" id="navbar-rays" style="">
                      <ul class="nav nav-sm flex-column">

                        <li class="nav-item">
                          <a href="#" class="nav-link nav-link-sub">
                            <i class="far fa-dot-circle"></i>
                            <span class="sidenav-normal"> {{__('admin.ADD-NEW-RAYS')}} </span>
                          </a>
                        </li>

                        <li class="nav-item">
                          <a href="#" class="nav-link nav-link-sub">
                            <i class="far fa-dot-circle"></i>
                            <span class="sidenav-normal"> {{__('admin.ALL-RAYS')}} </span>
                          </a>
                        </li>
                        
                      </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#navbar-roles" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-components">
                      <i class="fas fa-user-tag"></i>
                      <span class="nav-link-text"> {{__('admin.ROLES')}}</span>
                      <span class="badge badge-info fs-9 p-1 mx-2">{{__('admin.INPROGRESS')}}</span>
                    </a>
                    <div class="collapse" id="navbar-roles" style="">
                      <ul class="nav nav-sm flex-column">
                        
                        <li class="nav-item">
                            <a href="#" class="nav-link nav-link-sub">
                              <i class="far fa-dot-circle"></i>
                              <span class="sidenav-normal"> {{__('admin.ADD-NEW-ROLE')}} </span>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="{{route('permissions.index')}}" class="nav-link nav-link-sub">
                              <i class="far fa-dot-circle"></i>
                              <span class="sidenav-normal"> {{__('admin.ALL-ROLES')}} </span>
                            </a>
                        </li>
                        
                      </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#navbar-reports" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-components">
                      <i class="far fa-chart-bar"></i>
                      <span class="nav-link-text"> {{__('admin.REPORTS')}}</span>
                      <span class="badge badge-warning fs-9 p-1 mx-2">{{__('admin.PENDING')}}</span>
                    </a>
                    <div class="collapse" id="navbar-reports" style="">
                      <ul class="nav nav-sm flex-column">
                        
                        <li class="nav-item">
                            <a href="#" class="nav-link nav-link-sub">
                              <i class="far fa-dot-circle"></i>
                              <span class="sidenav-normal"> Report 1 </span>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="#" class="nav-link nav-link-sub">
                              <i class="far fa-dot-circle"></i>
                              <span class="sidenav-normal"> Report 2 </span>
                            </a>
                        </li>
                        
                      </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{request()->routeIs('admin-logo') ? 'active' : '' }}" href="{{route('admin-logo')}}">
                        <i class="ni ni-planet text-pink"></i>
                        <span class="nav-link-text">{{__('admin.LOGO')}}</span>
                    </a>
                </li>
            </ul>
            <!-- Divider -->
            <hr class="my-3">
            <!-- Heading -->
            <h6 class="navbar-heading p-0 text-muted">
            </h6>
            <!-- Navigation -->
            <ul class="navbar-nav mb-md-3">


                <li class="nav-item">
                    <a class="nav-link collapsed" href="#navbar-lang" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-components">
                      <i class="fas fa-language"></i>
                      <span class="nav-link-text">{{__('admin.LANGUAGE')}}</span>
                    </a>
                    <div class="collapse" id="navbar-lang" style="">
                      <ul class="nav nav-sm flex-column">

                        @if (LaravelLocalization::getCurrentLocale() == 'ar')

                                <li class="nav-item">
                                    <a href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}" class="nav-link nav-link-sub">
                                    <img class="w-20 mx-2" src="{{ asset('admin_assets/flags/en.png')}}" alt="English">
                                    <span class="sidenav-normal"> {{__('admin.ENGLISH')}}</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link nav-link-sub active">
                                    <img class="w-20 mx-2" src="{{ asset('admin_assets/flags/ar.png')}}" alt="Arabic">
                                    <span class="sidenav-normal">{{__('admin.ARABIC')}}  </span>
                                    </a>
                                </li>

                        @elseif (LaravelLocalization::getCurrentLocale() == 'en')  

                                <li class="nav-item">
                                    <a href="#" class="nav-link nav-link-sub active">
                                    <img class="w-20 mx-2" src="{{ asset('admin_assets/flags/en.png')}}" alt="English">
                                    <span class="sidenav-normal"> {{__('admin.ENGLISH')}}</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}" class="nav-link nav-link-sub ">
                                    <img class="w-20 mx-2" src="{{ asset('admin_assets/flags/ar.png')}}" alt="Arabic">
                                    <span class="sidenav-normal">{{__('admin.ARABIC')}}  </span>
                                    </a>
                                </li>
                        @endif
                        
                      </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{request()->routeIs('admin-setting') ? 'active' : '' }}" href="{{route('admin-setting')}}">
                        <i class="ni ni-settings"></i>
                        <span class="nav-link-text">{{__('admin.SETTINGS')}}</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span class="nav-link-text">{{__('admin.LOGOUT')}} </span>
                    </a>
                </li>
            </ul>
            </div>
        </div>
        </div>
    </nav>

    <!-- Main content -->
    <div class="main-content" id="panel">
        <!-- Topnav -->
        <nav class="navbar navbar-top navbar-expand navbar-dark bg-gradient-primary border-bottom">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Navbar links -->
                
                <ul class="navbar-nav align-items-center {{$margin}}">

                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="ni ni-ungroup"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-dark dropdown-menu-right ">
                        <div class="row shortcuts px-4">
                            <a href="{{route('calendar')}}" class="col-4 shortcut-item py-0">
                            <span class="shortcut-media avatar rounded-circle bg-gradient-red">
                                <i class="ni ni-calendar-grid-58"></i>
                            </span>
                            <small>{{__('admin.CALENDAR')}}</small>
                            </a>
                            <a href="#!" class="col-4 shortcut-item show-todo py-0">
                            <span class="shortcut-media avatar rounded-circle bg-gradient-purple">
                                <i class="ni ni-bullet-list-67"></i>
                            </span>
                            <small>{{__('admin.TO-DO')}}</small>
                            </a>
                            <a href="#!" class="col-4 shortcut-item show-notes py-0">
                            <span class="shortcut-media avatar rounded-circle bg-gradient-orange">
                                <i class="fa fa-sticky-note"></i>
                            </span>
                            <small>{{__('admin.NOTES')}}</small>
                            </a>
        
                        </div>
                        </div>
                    </li>

                    <li class="nav-item d-xl-none">
                        <!-- Sidenav toggler -->
                        <div class="px-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                            <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item dropdown">

                        <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="media align-items-center">
                            <span class="avatar avatar-sm rounded-circle">
                                <img alt="Image placeholder" src="{{ asset(Auth::user()->avatar) }}">
                            </span>
                            <div class="media-body  ml-2  d-none d-lg-block">
                                <span class="mb-0 text-sm  font-weight-bold">{{ Auth::user()->name }}</span>
                            </div>
                            </div>
                        </a>

                        <div class="dropdown-menu  dropdown-menu-right ">
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow m-0">{{__('admin.WELCOME')}}</h6>
                            </div>

                            <a href="{{route('admin-setting')}}" class="dropdown-item">
                                <i class="ni ni-settings-gear-65"></i>
                                <span>{{__('admin.SETTINGS')}}</span>
                            </a>

                            <div class="dropdown-divider"></div>
                            <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                <i class="ni ni-user-run"></i>
                                <span>{{__('admin.LOGOUT')}}</span>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                        </div>
                    </li>
                </ul>
                </div>
            </div>
        </nav>

        <!-- Page content -->
            @yield('content')
        <!-- end: Page content -->

    </div>
    <!-- end: Main content -->



    <!-- Popup Modal -->
    <div class="modal fade" id="popup" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-wrapper">
          <div class="modal-dialog modal-lg" id="modal_body">
            
          </div>
        </div>
    </div>


    <div class="row justify-content-center">

            <!--============== Start To-Do List App ==============-->
            <div class="col-lg-4 col-sm-6 features draggable">
                <div class="todo">
                    <div class="close1"><i class="fa fa-times-circle"></i></div>
                    <div class="move"><i class="fas fa-arrows-alt"></i></div>
                    <div class="todo-header">
                        <div class="text-center"><span id="date1"></span></div>
                        
                        <div class="counts">
                            <div class="left float-left">
                                <p id="total"></p>
                                <p>Total</p>
                            </div>
                            
                            <div class="middle">
                                <p id="remain"></p>
                                <p>Remain</p>
                            </div>
                            
                            <div class="right float-right">
                                <p id="done"></p>
                                <p>Done</p>
                            </div>
                        </div>

                    </div>

                    <div class="todo-body">
                        <p class="todo-title">To-Do List</p>
                        <ul id="todo_list" data-url="{{route('get-todo')}}" data-id="{{ Auth::user()->id }}">
                        
                        
                        </ul>
                    </div>

                    <div class="todo-footer mt-3">
                        <form id="todo-form" data-url="{{route('add-todo')}}">
                            <input id="todo-task"  class="form-control" type="text" name="task" placeholder="Write New Task"  required>
                            <input  type="hidden" name="user_id" value="{{ Auth::user()->id }}" >
                            <button class="btn btn-primary" type="submit">Add</button>	
                        </form>
                    </div>	


                </div>
            </div>


            <!--============== Start Notes App ==============-->	
            <div class="col-lg-4 col-sm-6 features draggable">
                <div id="notes" class="resizable">
                <div class="close1"><i class="fa fa-times-circle"></i></div>
                <div class="move"><i class="fas fa-arrows-alt"></i></div>
                <h3 class="text-center"><strong>Notes</strong></h3> 
                    
                <div class="notes-header">
                    <h6>Take a note... </h6>
                    <button type="submit" class="btn btn-warning btn-sm float-right create-note" data-url="{{route('create-note')}}"><i class="fa fa-plus"></i></button>
                </div>
                <div class="notes-body">
                    <div id="get-notes" data-url="{{route('get-note')}}" data-id="{{ Auth::user()->id }}">
                        
                    </div>
                </div>
                
                </div>
            </div>
        
    </div>


    <div id="loader" data-load='<div class="divload"><img src="{{asset("images/load.gif")}}" width="50" class="m-auto"></div>'></div>
    <div id="loader2" data-load='<div class="d-flex"><img src="{{asset("images/loader.gif")}}" width="50" class="m-auto"></div>'></div>


    <script src="{{ asset('admin_assets/vendor/jquery/dist/jquery.min.js') }}" ></script>

    {{-- <script type="application/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="{{ asset('admin_assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/js-cookie/js.cookie.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
    <script type="application/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <!-- Optional JS -->
    <script src="{{ asset('admin_assets/vendor/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/chart.js/dist/Chart.extension.js') }}"></script>
    <!-- Argon JS -->
    <script src="{{ asset('admin_assets/js/argon.js?v=1.2.0') }}"></script>
    
    <!--Bootstrap switch files-->
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

    <script src="https://cdn.tiny.cloud/1/mq6umcdg6y938v1c32lokocdpgrgp5g2yl794h4y1braa6j6/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    {{-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script> --}}
   
    <!-- JQUERY UI -->
    <script src="{{ asset('admin_assets/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('admin_assets/js/jquery.ui.touch-punch.min.js') }}"></script>

    <script src="{{ asset('admin_assets/js/trix.min.js') }}" ></script>
    <script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>

    <script>
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        // =============  Remove Item =============
        $(document).on('click', '.remove_item', function() {
            
            var item 	= $(this).attr('data-id');
            var url 	= $(this).attr('data-url');

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                Swal.fire(
                    'Deleted!',
                    'Item has been deleted.',
                    'success'
                )

                $.ajax({
                            url: 		url,
                            method: 	'POST',
                            dataType: 	'json',
                            data:		{id: item}	
                    });

                    $(this).parents('.parent').remove();
                }
            })
            
        });




        $(document).on("change",".item_check", function()
        {
            var id 	  = $(this).attr('data-id');
            var url 	= $(this).attr('data-url');

            $.ajax({
                    url: url,
                    type:"POST",
                    dataType: 'text',
                    data:    {"_token": "{{ csrf_token() }}",
                                id: id},
                    success : function(response)
                        {
                          
                        }  
                  })
        });
    </script>

    @yield('script')
</body>