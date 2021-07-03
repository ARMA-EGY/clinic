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
                    <a class="nav-link" href="#">
                        <i class="fa fa-cubes"></i>
                        <span class="nav-link-text">{{__('admin.INVENTORY')}}</span>
                        <span class="badge badge-warning fs-9 p-1 mx-2">{{__('admin.PENDING')}}</span>
                    </a>
                </li>

                {{-- <li class="nav-item">
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
                </li> --}}

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#navbar-roles" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-components">
                      <i class="fas fa-user-tag"></i>
                      <span class="nav-link-text"> {{__('admin.ROLES')}}</span>
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