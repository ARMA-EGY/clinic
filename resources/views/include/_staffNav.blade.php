    <!-- Sidenav -->
    <nav class="sidenav navbar navbar-vertical  fixed-left navbar-expand-xs navbar-dark bg-dark" id="sidenav-main">
      <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center">
            <a class="navbar-brand" href="javascript:void(0)">
                @isset($setting->logo)
                    <img src="{{ asset('storage/'.$setting->logo) }}" class="navbar-brand-img" alt="Logo" style="width: 130px;">
                @else
                    <h3 class="text-white"> {{$setting->project_name}}</h3>
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
                        <span class="nav-link-text">{{__('master.HOME')}}</span>
                    </a>
                </li>

                @if(auth()->user()->can('create doctors') 
                || auth()->user()->can('all doctors') 
                || auth()->user()->can('active doctors') 
                || auth()->user()->can('deactivated doctors'))
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#navbar-doctors" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-components">
                      <i class="fas fa-stethoscope"></i>
                      <span class="nav-link-text">{{__('master.DOCTORS')}}</span>
                    </a>
                    <div class="collapse" id="navbar-doctors" style="">
                      <ul class="nav nav-sm flex-column">
                      @if(auth()->user()->can('create doctors'))
                        <li class="nav-item">
                          <a href="{{ route('staff-doctors.create')}}" class="nav-link nav-link-sub {{request()->routeIs('staff-doctors.create') ? 'active' : '' }}">
                            <i class="far fa-dot-circle"></i>
                            <span class="sidenav-normal"> {{__('master.ADD-NEW-DOCTOR')}} </span>
                          </a>
                        </li>
                      @endif 

                      @if(auth()->user()->can('all doctors'))
                        <li class="nav-item">
                          <a href="{{ route('staff-doctors.index')}}" class="nav-link nav-link-sub {{request()->routeIs('staff-doctors.index') ? 'active' : '' }}">
                            <i class="far fa-dot-circle"></i>
                            <span class="sidenav-normal"> {{__('master.ALL-DOCTORS')}} </span>
                          </a>
                        </li>
                      @endif 

                      @if(auth()->user()->can('active doctors'))
                        <li class="nav-item">
                          <a href="{{ route('staff-active-doctors')}}" class="nav-link nav-link-sub {{request()->routeIs('staff-active-doctors') ? 'active' : '' }}">
                            <i class="far fa-dot-circle"></i>
                            <span class="sidenav-normal"> {{__('master.ACTIVE-DOCTORS')}} </span>
                          </a>
                        </li>
                      @endif

                      @if(auth()->user()->can('deactivated doctors'))
                        <li class="nav-item">
                          <a href="{{ route('staff-deactive-doctors')}}" class="nav-link nav-link-sub {{request()->routeIs('staff-deactive-doctors') ? 'active' : '' }}">
                            <i class="far fa-dot-circle"></i>
                            <span class="sidenav-normal"> {{__('master.BANNED-DOCTORS')}} </span>
                          </a>
                        </li>
                      @endif  

                      </ul>
                    </div>
                </li>
                @endif 

                @if(auth()->user()->can('create staff') 
                || auth()->user()->can('all staff') 
                || auth()->user()->can('active staff') 
                || auth()->user()->can('deactivated staff'))
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#navbar-staff" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-components">
                      <i class="fa fa-users"></i>
                      <span class="nav-link-text">{{__('master.STAFF')}}</span>
                    </a>
                    <div class="collapse" id="navbar-staff" style="">
                      <ul class="nav nav-sm flex-column">
                      @if(auth()->user()->can('create staff'))
                        <li class="nav-item">
                          <a href="{{ route('staff-staff.create')}}" class="nav-link nav-link-sub {{request()->routeIs('staff-staff.create') ? 'active' : '' }}">
                            <i class="far fa-dot-circle"></i>
                            <span class="sidenav-normal"> {{__('master.ADD-NEW-STAFF')}} </span>
                          </a>
                        </li>
                      @endif

                      @if(auth()->user()->can('all staff'))                      
                        <li class="nav-item">
                          <a href="{{route('staff-staff.index')}}" class="nav-link nav-link-sub {{request()->routeIs('staff-staff.index') ? 'active' : '' }}">
                            <i class="far fa-dot-circle"></i>
                            <span class="sidenav-normal"> {{__('master.ALL-STAFF')}} </span>
                          </a>
                        </li>
                      @endif

                      @if(auth()->user()->can('active staff')) 
                        <li class="nav-item">
                          <a href="{{ route('staff-active-staff')}}" class="nav-link nav-link-sub {{request()->routeIs('staff-active-staff') ? 'active' : '' }}">
                            <i class="far fa-dot-circle"></i>
                            <span class="sidenav-normal"> {{__('master.ACTIVE-STAFF')}} </span>
                          </a>
                        </li>
                      @endif

                      @if(auth()->user()->can('deactivated staff')) 
                        <li class="nav-item">
                          <a href="{{ route('staff-deactive-staff')}}" class="nav-link nav-link-sub {{request()->routeIs('staff-deactive-staff') ? 'active' : '' }}">
                            <i class="far fa-dot-circle"></i>
                            <span class="sidenav-normal"> {{__('master.BANNED-STAFF')}} </span>
                          </a>
                        </li>
                      @endif

                      </ul>
                    </div>
                </li>
                @endif 

                @if(auth()->user()->can('create patients') 
                || auth()->user()->can('all patients') )
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#navbar-patients" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-components">
                      <i class="fas fa-syringe"></i>
                      <span class="nav-link-text">{{__('master.PATIENTS')}}</span>
                    </a>
                    <div class="collapse" id="navbar-patients" style="">
                      <ul class="nav nav-sm flex-column">
                      @if(auth()->user()->can('create patients')) 
                        <li class="nav-item">
                          <a href="{{route('staff-patients.create')}}" class="nav-link nav-link-sub {{request()->routeIs('staff-patients.create') ? 'active' : '' }}">
                            <i class="far fa-dot-circle"></i>
                            <span class="sidenav-normal"> {{__('master.ADD-NEW-PATIENT')}} </span>
                          </a>
                        </li>
                      @endif

                      @if(auth()->user()->can('all patients'))                       
                        <li class="nav-item">
                          <a href="{{route('staff-patients.index')}}" class="nav-link nav-link-sub {{request()->routeIs('staff-patients.index') ? 'active' : '' }}">
                            <i class="far fa-dot-circle"></i>
                            <span class="sidenav-normal"> {{__('master.ALL-PATIENTS')}} </span>
                          </a>
                        </li>
                      @endif
                        
                      </ul>
                    </div>
                </li>
                @endif 

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#navbar-appointment" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-components">
                      <i class="fas fa-notes-medical"></i>
                      <span class="nav-link-text">{{__('master.INTERNAL-APPOINTMENTS')}}</span>
                    </a>
                    <div class="collapse" id="navbar-appointment" style="">
                      <ul class="nav nav-sm flex-column">

                        <li class="nav-item">
                          <a href="{{route('staff-appointment.create')}}" class="nav-link nav-link-sub {{request()->routeIs('staff-appointment.create') ? 'active' : '' }}">
                            <i class="far fa-dot-circle"></i>
                            <span class="sidenav-normal"> {{__('master.CREATEE')}}  </span>
                          </a>
                        </li>

                        <li class="nav-item">
                          <a href="{{route('staff-appointment.today')}}" class="nav-link nav-link-sub {{request()->routeIs('staff-appointment.today') ? 'active' : '' }}">
                            <i class="far fa-dot-circle"></i>
                            <span class="sidenav-normal"> {{__('master.TODAY')}}  </span>
                          </a>
                        </li>

                        <li class="nav-item">
                          <a href="{{route('staff-appointment.done')}}" class="nav-link nav-link-sub {{request()->routeIs('staff-appointment.done') ? 'active' : '' }}">
                            <i class="far fa-dot-circle"></i>
                            <span class="sidenav-normal"> {{__('master.DONE')}}  </span>
                          </a>
                        </li>

                        <li class="nav-item">
                          <a href="{{route('staff-appointment.cancelled')}}" class="nav-link nav-link-sub {{request()->routeIs('staff-appointment.cancelled') ? 'active' : '' }}">
                            <i class="far fa-dot-circle"></i>
                            <span class="sidenav-normal"> {{__('master.CANCELLED')}}  </span>
                          </a>
                        </li>

                        <li class="nav-item">
                          <a href="{{route('staff-appointment.index')}}" class="nav-link nav-link-sub {{request()->routeIs('staff-appointment.index') ? 'active' : '' }}">
                            <i class="far fa-dot-circle"></i>
                            <span class="sidenav-normal"> {{__('master.ALL')}}  </span>
                          </a>
                        </li>

                      </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#navbar-external-appointment" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-components">
                      <i class="fas fa-notes-medical"></i>
                      <span class="nav-link-text">{{__('master.EXTERNAL-APPOINTMENTS')}}</span>
                    </a>
                    <div class="collapse" id="navbar-external-appointment" style="">
                      <ul class="nav nav-sm flex-column">

                        <li class="nav-item">
                          <a href="{{route('staff-external-appointment.create')}}" class="nav-link nav-link-sub {{request()->routeIs('staff-external-appointment.create') ? 'active' : '' }}">
                            <i class="far fa-dot-circle"></i>
                            <span class="sidenav-normal"> {{__('master.CREATEE')}}  </span>
                          </a>
                        </li>

                        <li class="nav-item">
                          <a href="{{route('staff-external-appointment.today')}}" class="nav-link nav-link-sub {{request()->routeIs('staff-external-appointment.today') ? 'active' : '' }}">
                            <i class="far fa-dot-circle"></i>
                            <span class="sidenav-normal"> {{__('master.TODAY')}}  </span>
                          </a>
                        </li>

                        <li class="nav-item">
                          <a href="{{route('staff-external-appointment.done')}}" class="nav-link nav-link-sub {{request()->routeIs('staff-external-appointment.done') ? 'active' : '' }}">
                            <i class="far fa-dot-circle"></i>
                            <span class="sidenav-normal"> {{__('master.DONE')}}  </span>
                          </a>
                        </li>

                        <li class="nav-item">
                          <a href="{{route('staff-external-appointment.cancelled')}}" class="nav-link nav-link-sub {{request()->routeIs('staff-external-appointment.cancelled') ? 'active' : '' }}">
                            <i class="far fa-dot-circle"></i>
                            <span class="sidenav-normal"> {{__('master.CANCELLED')}}  </span>
                          </a>
                        </li>

                        <li class="nav-item">
                          <a href="{{route('staff-external-appointment.index')}}" class="nav-link nav-link-sub {{request()->routeIs('staff-external-appointment.index') ? 'active' : '' }}">
                            <i class="far fa-dot-circle"></i>
                            <span class="sidenav-normal"> {{__('master.ALL')}}  </span>
                          </a>
                        </li>

                      </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{request()->routeIs('staff-index-transactions') ? 'active' : '' }}" href="{{route('staff-index-transactions')}}">
                        <i class="fas fa-money-bill-wave"></i>
                        <span class="nav-link-text">{{__('master.TRANSACTIONS')}}</span>
                    </a>
                </li>

                @if(auth()->user()->can('create services') 
                || auth()->user()->can('all services') )
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#navbar-services" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-components">
                      <i class="fas fa-briefcase-medical"></i>
                      <span class="nav-link-text">{{__('master.SERVICES')}}</span>
                    </a>
                    <div class="collapse" id="navbar-services" style="">
                      <ul class="nav nav-sm flex-column">

                        <li class="nav-item">
                          <a href="{{ route('staff-servicescategory.create')}}" class="nav-link nav-link-sub {{request()->routeIs('staff-servicescategory.create') ? 'active' : '' }}">
                            <i class="far fa-dot-circle"></i>
                            <span class="sidenav-normal"> {{__('master.ADD-NEW-CATEGORY')}} </span>
                          </a>
                        </li>
                        
                        <li class="nav-item">
                          <a href="{{ route('staff-servicescategory.index')}}" class="nav-link nav-link-sub {{request()->routeIs('staff-servicescategory.index') ? 'active' : '' }}">
                            <i class="far fa-dot-circle"></i>
                            <span class="sidenav-normal"> {{__('master.ALL-CATEGORIES')}} </span>
                          </a>
                        </li>

                      @if(auth()->user()->can('create services'))
                        <li class="nav-item">
                          <a href="{{ route('staff-services.create')}}" class="nav-link nav-link-sub {{request()->routeIs('staff-services.create') ? 'active' : '' }}">
                            <i class="far fa-dot-circle"></i>
                            <span class="sidenav-normal"> {{__('master.ADD-NEW-SERVICE')}} </span>
                          </a>
                        </li>
                      @endif

                      @if(auth()->user()->can('all services'))
                        <li class="nav-item">
                          <a href="{{ route('staff-services.index')}}" class="nav-link nav-link-sub {{request()->routeIs('staff-services.index') ? 'active' : '' }}">
                            <i class="far fa-dot-circle"></i>
                            <span class="sidenav-normal"> {{__('master.ALL-SERVICES')}} </span>
                          </a>
                        </li>
                      @endif
                        
                      </ul>
                    </div>
                </li>
                @endif 


                <li class="nav-item">
                    <a class="nav-link collapsed" href="#navbar-xrays" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-components">
                      <i class="fas fa-x-ray"></i>
                      <span class="nav-link-text">{{__('master.RAYS')}}</span>
                    </a>
                    <div class="collapse" id="navbar-xrays" style="">
                      <ul class="nav nav-sm flex-column">

                        <li class="nav-item">
                          <a href="{{ route('staff-xrays.create')}}" class="nav-link nav-link-sub {{request()->routeIs('staff-xrays.create') ? 'active' : '' }}">
                            <i class="far fa-dot-circle"></i>
                            <span class="sidenav-normal"> {{__('master.ADD-NEW-RAYS')}} </span>
                          </a>
                        </li>

                        <li class="nav-item">
                          <a href="{{ route('staff-xrays.index')}}" class="nav-link nav-link-sub {{request()->routeIs('staff-xrays.index') ? 'active' : '' }}">
                            <i class="far fa-dot-circle"></i>
                            <span class="sidenav-normal"> {{__('master.ALL-RAYS')}} </span>
                          </a>
                        </li>
                        
                      </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#navbar-pledges" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-components">
                      <i class="fas fa-file-contract"></i>
                      <span class="nav-link-text">{{__('master.PLEDGES')}}</span>
                    </a>
                    <div class="collapse" id="navbar-pledges" style="">
                      <ul class="nav nav-sm flex-column">

                        <li class="nav-item">
                          <a href="{{ route('staff-pledges.create')}}" class="nav-link nav-link-sub {{request()->routeIs('staff-pledges.create') ? 'active' : '' }}">
                            <i class="far fa-dot-circle"></i>
                            <span class="sidenav-normal"> {{__('master.ADD-NEW-PLEDGE')}} </span>
                          </a>
                        </li>

                        <li class="nav-item">
                          <a href="{{ route('staff-pledges.index')}}" class="nav-link nav-link-sub {{request()->routeIs('staff-pledges.index') ? 'active' : '' }}">
                            <i class="far fa-dot-circle"></i>
                            <span class="sidenav-normal"> {{__('master.ALL-PLEDGES')}} </span>
                          </a>
                        </li>
                        
                      </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#navbar-inventory" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-components">
                        <i class="fa fa-cubes"></i>
                        <span class="nav-link-text">{{__('master.INVENTORY')}}</span>
                    </a>
                    <div class="collapse" id="navbar-inventory" style="">
                      <ul class="nav nav-sm flex-column">

                        <li class="nav-item">
                          <a href="{{ route('staff-inventory.index')}}" class="nav-link nav-link-sub {{request()->routeIs('staff-inventory.index') ? 'active' : '' }}">
                            <i class="far fa-dot-circle"></i>
                            <span class="sidenav-normal"> {{__('master.ALL-ITEMS')}} </span>
                          </a>
                        </li>

                        <li class="nav-item">
                          <a href="{{ route('staff-active-inventory')}}" class="nav-link nav-link-sub {{request()->routeIs('staff-active-inventory') ? 'active' : '' }}">
                            <i class="far fa-dot-circle"></i>
                            <span class="sidenav-normal"> {{__('master.ACTIVE-ITEMS')}}  </span>
                          </a>
                        </li>

                        <li class="nav-item">
                          <a href="{{ route('staff-deactive-inventory')}}" class="nav-link nav-link-sub {{request()->routeIs('staff-deactive-inventory') ? 'active' : '' }}">
                            <i class="far fa-dot-circle"></i>
                            <span class="sidenav-normal"> {{__('master.DEACTIVE-ITEMS')}} </span>
                          </a>
                        </li>
                        
                        <li class="nav-item">
                          <a href="{{ route('staff-inventory.create')}}" class="nav-link nav-link-sub {{request()->routeIs('staff-inventory.create') ? 'active' : '' }}">
                            <i class="far fa-dot-circle"></i>
                            <span class="sidenav-normal"> Add New Item </span>
                          </a>
                        </li>


                        <li class="nav-item">
                          <a href="{{ route('staff-index-adjustment')}}" class="nav-link nav-link-sub {{request()->routeIs('staff-index-adjustment') ? 'active' : '' }}">
                            <i class="far fa-dot-circle"></i>
                            <span class="sidenav-normal">All Adjustments </span>
                          </a>
                        </li>
                  
                        <li class="nav-item">
                          <a href="{{ route('staff-create-adjustment')}}" class="nav-link nav-link-sub {{request()->routeIs('staff-create-adjustment') ? 'active' : '' }}">
                            <i class="far fa-dot-circle"></i>
                            <span class="sidenav-normal">Add New Adjustment </span>
                          </a>
                        </li>
                        
                      </ul>
                    </div>
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
                      <span class="nav-link-text">{{__('master.LANGUAGE')}}</span>
                    </a>
                    <div class="collapse" id="navbar-lang" style="">
                      <ul class="nav nav-sm flex-column">

                        @if (LaravelLocalization::getCurrentLocale() == 'ar')

                                <li class="nav-item">
                                    <a href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}" class="nav-link nav-link-sub">
                                    <img class="w-20 mx-2" src="{{ asset('admin_assets/flags/en.png')}}" alt="English">
                                    <span class="sidenav-normal"> {{__('master.ENGLISH')}}</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link nav-link-sub active">
                                    <img class="w-20 mx-2" src="{{ asset('admin_assets/flags/ar.png')}}" alt="Arabic">
                                    <span class="sidenav-normal">{{__('master.ARABIC')}}  </span>
                                    </a>
                                </li>

                        @elseif (LaravelLocalization::getCurrentLocale() == 'en')  

                                <li class="nav-item">
                                    <a href="#" class="nav-link nav-link-sub active">
                                    <img class="w-20 mx-2" src="{{ asset('admin_assets/flags/en.png')}}" alt="English">
                                    <span class="sidenav-normal"> {{__('master.ENGLISH')}}</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}" class="nav-link nav-link-sub ">
                                    <img class="w-20 mx-2" src="{{ asset('admin_assets/flags/ar.png')}}" alt="Arabic">
                                    <span class="sidenav-normal">{{__('master.ARABIC')}}  </span>
                                    </a>
                                </li>
                        @endif
                        
                      </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{request()->routeIs('profile') ? 'active' : '' }}" href="{{route('profile')}}">
                        <i class="fa fa-user-circle"></i>
                        <span class="nav-link-text">{{__('master.PROFILE')}}</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span class="nav-link-text">{{__('master.LOGOUT')}} </span>
                    </a>
                </li>
            </ul>
            </div>
        </div>
      </div>
  </nav>