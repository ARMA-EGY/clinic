    <!-- Sidenav -->
    <nav class="sidenav navbar navbar-vertical  fixed-left navbar-expand-xs navbar-dark bg-dark" id="sidenav-main">
        <div class="scrollbar-inner">
          <!-- Brand -->
          <div class="sidenav-header align-items-center">
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
                          <span class="nav-link-text">{{__('master.HOME')}}</span>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a class="nav-link collapsed" href="#navbar-branches" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-components">
                        <i class="fas fa-clinic-medical"></i>
                        <span class="nav-link-text">{{__('master.BRANCHES')}}</span>
                      </a>
                      <div class="collapse" id="navbar-branches" style="">
                        <ul class="nav nav-sm flex-column">
                          <li class="nav-item">
                              <a href="{{ route('branches.create')}}" class="nav-link nav-link-sub {{request()->routeIs('branches.create') ? 'active' : '' }}">
                                <i class="far fa-dot-circle"></i>
                                <span class="sidenav-normal"> {{__('master.ADD-NEW-BRANCH')}} </span>
                              </a>
                          </li>

                          <li class="nav-item">
                            <a href="{{route('branches.index')}}" class="nav-link nav-link-sub {{request()->routeIs('branches.index') ? 'active' : '' }}">
                              <i class="far fa-dot-circle"></i>
                              <span class="sidenav-normal"> {{__('master.ALL-BRANCHES')}} </span>
                            </a>
                          </li>

                          <li class="nav-item">
                            <a href="{{ route('active-branches')}}" class="nav-link nav-link-sub {{request()->routeIs('active-branches') ? 'active' : '' }}">
                              <i class="far fa-dot-circle"></i>
                              <span class="sidenav-normal"> {{__('master.ACTIVE-BRANCHES')}} </span>
                            </a>
                          </li>

                          <li class="nav-item">
                              <a href="{{ route('deactive-branches')}}" class="nav-link nav-link-sub {{request()->routeIs('deactive-branches') ? 'active' : '' }}">
                              <i class="far fa-dot-circle"></i>
                              <span class="sidenav-normal"> {{__('master.DEACTIVATED-BRANCHES')}} </span>
                            </a>
                          </li>
                          
                        </ul>
                      </div>
                  </li>

                  <li class="nav-item">
                      <a class="nav-link collapsed" href="#navbar-sectors" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-components">
                        <i class="fas fa-tooth"></i>
                        <span class="nav-link-text">{{__('master.SECTORS')}}</span>
                      </a>
                      <div class="collapse" id="navbar-sectors" style="">
                        <ul class="nav nav-sm flex-column">
                          <li class="nav-item">
                            <a href="{{route('sectors.create')}}" class="nav-link nav-link-sub {{request()->routeIs('sectors.create') ? 'active' : '' }}">
                              <i class="far fa-dot-circle"></i>
                              <span class="sidenav-normal"> {{__('master.ADD-NEW-SECTOR')}} </span>
                            </a>
                          </li>

                          <li class="nav-item">
                            <a href="{{route('sectors.index')}}" class="nav-link nav-link-sub {{request()->routeIs('sectors.index') ? 'active' : '' }}">
                              <i class="far fa-dot-circle"></i>
                              <span class="sidenav-normal"> {{__('master.ALL-SECTORS')}} </span>
                            </a>
                          </li>

                          <li class="nav-item">
                            <a href="{{ route('active-sectors')}}" class="nav-link nav-link-sub {{request()->routeIs('active-sectors') ? 'active' : '' }}">
                              <i class="far fa-dot-circle"></i>
                              <span class="sidenav-normal"> {{__('master.ACTIVE-SECTORS')}} </span>
                            </a>
                          </li>

                          <li class="nav-item">
                            <a href="{{ route('deactive-sectors')}}" class="nav-link nav-link-sub {{request()->routeIs('deactive-sectors') ? 'active' : '' }}">
                              <i class="far fa-dot-circle"></i>
                              <span class="sidenav-normal"> {{__('master.DEACTIVATED-SECTORS')}} </span>
                            </a>
                          </li>
                        </ul>
                      </div>
                  </li>

                  <li class="nav-item">
                      <a class="nav-link collapsed" href="#navbar-doctors" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-components">
                        <i class="fas fa-stethoscope"></i>
                        <span class="nav-link-text">{{__('master.DOCTORS')}}</span>
                      </a>
                      <div class="collapse" id="navbar-doctors" style="">
                        <ul class="nav nav-sm flex-column">
                          <li class="nav-item">
                            <a href="{{ route('doctors.create')}}" class="nav-link nav-link-sub {{request()->routeIs('doctors.create') ? 'active' : '' }}">
                              <i class="far fa-dot-circle"></i>
                              <span class="sidenav-normal"> {{__('master.ADD-NEW-DOCTOR')}} </span>
                            </a>
                          </li>

                          <li class="nav-item">
                            <a href="{{ route('doctors.index')}}" class="nav-link nav-link-sub {{request()->routeIs('doctors.index') ? 'active' : '' }}">
                              <i class="far fa-dot-circle"></i>
                              <span class="sidenav-normal"> {{__('master.ALL-DOCTORS')}} </span>
                            </a>
                          </li>

                          <li class="nav-item">
                            <a href="{{ route('active-doctors')}}" class="nav-link nav-link-sub {{request()->routeIs('active-doctors') ? 'active' : '' }}">
                              <i class="far fa-dot-circle"></i>
                              <span class="sidenav-normal"> {{__('master.ACTIVE-DOCTORS')}} </span>
                            </a>
                          </li>

                          <li class="nav-item">
                            <a href="{{ route('deactive-doctors')}}" class="nav-link nav-link-sub {{request()->routeIs('deactive-doctors') ? 'active' : '' }}">
                              <i class="far fa-dot-circle"></i>
                              <span class="sidenav-normal"> {{__('master.BANNED-DOCTORS')}} </span>
                            </a>
                          </li>

                        </ul>
                      </div>
                  </li>

                  <li class="nav-item">
                      <a class="nav-link collapsed" href="#navbar-staff" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-components">
                        <i class="fa fa-users"></i>
                        <span class="nav-link-text">{{__('master.STAFF')}}</span>
                      </a>
                      <div class="collapse" id="navbar-staff" style="">
                        <ul class="nav nav-sm flex-column">
                          <li class="nav-item">
                            <a href="{{ route('staff.create')}}" class="nav-link nav-link-sub {{request()->routeIs('staff.create') ? 'active' : '' }}">
                              <i class="far fa-dot-circle"></i>
                              <span class="sidenav-normal"> {{__('master.ADD-NEW-STAFF')}} </span>
                            </a>
                          </li>
                   
                          <li class="nav-item">
                            <a href="{{route('staff.index')}}" class="nav-link nav-link-sub {{request()->routeIs('staff.index') ? 'active' : '' }}">
                              <i class="far fa-dot-circle"></i>
                              <span class="sidenav-normal"> {{__('master.ALL-STAFF')}} </span>
                            </a>
                          </li>

                          <li class="nav-item">
                            <a href="{{ route('active-staff')}}" class="nav-link nav-link-sub {{request()->routeIs('active-staff') ? 'active' : '' }}">
                              <i class="far fa-dot-circle"></i>
                              <span class="sidenav-normal"> {{__('master.ACTIVE-STAFF')}} </span>
                            </a>
                          </li>

                          <li class="nav-item">
                            <a href="{{ route('deactive-staff')}}" class="nav-link nav-link-sub {{request()->routeIs('deactive-staff') ? 'active' : '' }}">
                              <i class="far fa-dot-circle"></i>
                              <span class="sidenav-normal"> {{__('master.BANNED-STAFF')}} </span>
                            </a>
                          </li>

                        </ul>
                      </div>
                  </li>

                  <li class="nav-item">
                      <a class="nav-link collapsed" href="#navbar-patients" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-components">
                        <i class="fas fa-syringe"></i>
                        <span class="nav-link-text">{{__('master.PATIENTS')}}</span>
                      </a>
                      <div class="collapse" id="navbar-patients" style="">
                        <ul class="nav nav-sm flex-column">
                          <li class="nav-item">
                            <a href="{{route('patients.create')}}" class="nav-link nav-link-sub {{request()->routeIs('patients.create') ? 'active' : '' }}">
                              <i class="far fa-dot-circle"></i>
                              <span class="sidenav-normal"> {{__('master.ADD-NEW-PATIENT')}} </span>
                            </a>
                          </li>
                     
                          <li class="nav-item">
                            <a href="{{route('patients.index')}}" class="nav-link nav-link-sub {{request()->routeIs('patients.index') ? 'active' : '' }}">
                              <i class="far fa-dot-circle"></i>
                              <span class="sidenav-normal"> {{__('master.ALL-PATIENTS')}} </span>
                            </a>
                          </li>
                          
                        </ul>
                      </div>
                  </li>

                  <li class="nav-item">
                      <a class="nav-link collapsed" href="#navbar-appointment" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-components">
                        <i class="fas fa-notes-medical"></i>
                        <span class="nav-link-text">{{__('master.APPOINTMENTS')}}</span>
                      </a>
                      <div class="collapse" id="navbar-appointment" style="">
                        <ul class="nav nav-sm flex-column">

                          <li class="nav-item">
                            <a href="{{route('appointment.create')}}" class="nav-link nav-link-sub {{request()->routeIs('appointment.create') ? 'active' : '' }}">
                              <i class="far fa-dot-circle"></i>
                              <span class="sidenav-normal"> {{__('master.CREATEE')}}  </span>
                            </a>
                          </li>

                          <li class="nav-item">
                            <a href="{{route('appointment.today')}}" class="nav-link nav-link-sub {{request()->routeIs('appointment.today') ? 'active' : '' }}">
                              <i class="far fa-dot-circle"></i>
                              <span class="sidenav-normal"> {{__('master.TODAY')}}  </span>
                            </a>
                          </li>

                          <li class="nav-item">
                            <a href="{{route('appointment.done')}}" class="nav-link nav-link-sub {{request()->routeIs('appointment.done') ? 'active' : '' }}">
                              <i class="far fa-dot-circle"></i>
                              <span class="sidenav-normal"> {{__('master.DONE')}}  </span>
                            </a>
                          </li>

                          <li class="nav-item">
                            <a href="{{route('appointment.cancelled')}}" class="nav-link nav-link-sub {{request()->routeIs('appointment.cancelled') ? 'active' : '' }}">
                              <i class="far fa-dot-circle"></i>
                              <span class="sidenav-normal"> {{__('master.CANCELLED')}}  </span>
                            </a>
                          </li>

                          <li class="nav-item">
                            <a href="{{route('appointment.index')}}" class="nav-link nav-link-sub {{request()->routeIs('appointment.index') ? 'active' : '' }}">
                              <i class="far fa-dot-circle"></i>
                              <span class="sidenav-normal"> {{__('master.ALL')}}  </span>
                            </a>
                          </li>

                        </ul>
                      </div>
                  </li>

                  <li class="nav-item">
                      <a class="nav-link collapsed" href="#navbar-services" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-components">
                        <i class="fas fa-briefcase-medical"></i>
                        <span class="nav-link-text">{{__('master.SERVICES')}}</span>
                      </a>
                      <div class="collapse" id="navbar-services" style="">
                        <ul class="nav nav-sm flex-column">

                          <li class="nav-item">
                            <a href="{{ route('servicescategory.create')}}" class="nav-link nav-link-sub {{request()->routeIs('servicescategory.create') ? 'active' : '' }}">
                              <i class="far fa-dot-circle"></i>
                              <span class="sidenav-normal"> {{__('master.ADD-NEW-CATEGORY')}} </span>
                            </a>
                          </li>
                          
                          <li class="nav-item">
                            <a href="{{ route('servicescategory.index')}}" class="nav-link nav-link-sub {{request()->routeIs('servicescategory.index') ? 'active' : '' }}">
                              <i class="far fa-dot-circle"></i>
                              <span class="sidenav-normal"> {{__('master.ALL-CATEGORIES')}} </span>
                            </a>
                          </li>

                          <li class="nav-item">
                            <a href="{{ route('services.create')}}" class="nav-link nav-link-sub {{request()->routeIs('services.create') ? 'active' : '' }}">
                              <i class="far fa-dot-circle"></i>
                              <span class="sidenav-normal"> {{__('master.ADD-NEW-SERVICE')}} </span>
                            </a>
                          </li>

                          <li class="nav-item">
                            <a href="{{ route('services.index')}}" class="nav-link nav-link-sub {{request()->routeIs('services.index') ? 'active' : '' }}">
                              <i class="far fa-dot-circle"></i>
                              <span class="sidenav-normal"> {{__('master.ALL-SERVICES')}} </span>
                            </a>
                          </li>
                          
                        </ul>
                      </div>
                  </li>

                  <li class="nav-item">
                      <a class="nav-link collapsed" href="#navbar-xrays" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-components">
                        <i class="fas fa-x-ray"></i>
                        <span class="nav-link-text">{{__('master.RAYS')}}</span>
                      </a>
                      <div class="collapse" id="navbar-xrays" style="">
                        <ul class="nav nav-sm flex-column">

                          <li class="nav-item">
                            <a href="{{ route('xrays.create')}}" class="nav-link nav-link-sub {{request()->routeIs('xrays.create') ? 'active' : '' }}">
                              <i class="far fa-dot-circle"></i>
                              <span class="sidenav-normal"> {{__('master.ADD-NEW-RAYS')}} </span>
                            </a>
                          </li>

                          <li class="nav-item">
                            <a href="{{ route('xrays.index')}}" class="nav-link nav-link-sub {{request()->routeIs('xrays.index') ? 'active' : '' }}">
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
                            <a href="{{ route('pledges.create')}}" class="nav-link nav-link-sub {{request()->routeIs('pledges.create') ? 'active' : '' }}">
                              <i class="far fa-dot-circle"></i>
                              <span class="sidenav-normal"> {{__('master.ADD-NEW-PLEDGE')}} </span>
                            </a>
                          </li>

                          <li class="nav-item">
                            <a href="{{ route('pledges.index')}}" class="nav-link nav-link-sub {{request()->routeIs('pledges.index') ? 'active' : '' }}">
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
                            <a href="{{ route('inventory.index')}}" class="nav-link nav-link-sub {{request()->routeIs('inventory.index') ? 'active' : '' }}">
                              <i class="far fa-dot-circle"></i>
                              <span class="sidenav-normal"> {{__('master.ALL-ITEMS')}} </span>
                            </a>
                          </li>

                          <li class="nav-item">
                            <a href="{{ route('active-inventory')}}" class="nav-link nav-link-sub {{request()->routeIs('active-inventory') ? 'active' : '' }}">
                              <i class="far fa-dot-circle"></i>
                              <span class="sidenav-normal"> {{__('master.ACTIVE-ITEMS')}}  </span>
                            </a>
                          </li>

                          <li class="nav-item">
                            <a href="{{ route('deactive-inventory')}}" class="nav-link nav-link-sub {{request()->routeIs('deactive-inventory') ? 'active' : '' }}">
                              <i class="far fa-dot-circle"></i>
                              <span class="sidenav-normal"> {{__('master.DEACTIVE-ITEMS')}} </span>
                            </a>
                          </li>
                          
                          <li class="nav-item">
                            <a href="{{ route('inventory.create')}}" class="nav-link nav-link-sub {{request()->routeIs('inventory.create') ? 'active' : '' }}">
                              <i class="far fa-dot-circle"></i>
                              <span class="sidenav-normal"> Add New Item </span>
                            </a>
                          </li>


                          <li class="nav-item">
                            <a href="{{ route('index-adjustment')}}" class="nav-link nav-link-sub {{request()->routeIs('index-adjustment') ? 'active' : '' }}">
                              <i class="far fa-dot-circle"></i>
                              <span class="sidenav-normal">All Adjustments </span>
                            </a>
                          </li>
                    
                          <li class="nav-item">
                            <a href="{{ route('create-adjustment')}}" class="nav-link nav-link-sub {{request()->routeIs('create-adjustment') ? 'active' : '' }}">
                              <i class="far fa-dot-circle"></i>
                              <span class="sidenav-normal">Add New Adjustment </span>
                            </a>
                          </li>
                          
                        </ul>
                      </div>
                  </li>

                  <li class="nav-item">
                      <a class="nav-link collapsed" href="#navbar-roles" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-components">
                        <i class="fas fa-user-tag"></i>
                        <span class="nav-link-text"> {{__('master.ROLES')}}</span>
                      </a>
                      <div class="collapse" id="navbar-roles" style="">
                        <ul class="nav nav-sm flex-column">
                          
                          <li class="nav-item">
                              <a href="{{ route('permissions.create')}}" class="nav-link nav-link-sub {{request()->routeIs('permissions.create') ? 'active' : '' }}">
                                <i class="far fa-dot-circle"></i>
                                <span class="sidenav-normal"> {{__('master.ADD-NEW-ROLE')}} </span>
                              </a>
                          </li>
                          
                          <li class="nav-item">
                              <a href="{{route('permissions.index')}}" class="nav-link nav-link-sub {{request()->routeIs('permissions.index') ? 'active' : '' }}">
                                <i class="far fa-dot-circle"></i>
                                <span class="sidenav-normal"> {{__('master.ALL-ROLES')}} </span>
                              </a>
                          </li>
                          
                        </ul>
                      </div>
                  </li>

                  <li class="nav-item">
                      <a class="nav-link collapsed" href="#navbar-reports" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-components">
                        <i class="far fa-chart-bar"></i>
                        <span class="nav-link-text"> {{__('master.REPORTS')}}</span>
                        <span class="badge badge-warning fs-9 p-1 mx-2">{{__('master.PENDING')}}</span>
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
                      <a class="nav-link collapsed" href="#navbar-settings" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-components">
                        <i class="ni ni-settings"></i>
                        <span class="nav-link-text"> {{__('master.SETTINGS')}}</span>
                        <span class="badge badge-warning fs-9 p-1 mx-2">{{__('master.PENDING')}}</span>
                      </a>
                      <div class="collapse" id="navbar-settings" style="">
                        <ul class="nav nav-sm flex-column">
                          
                          <li class="nav-item">
                            <a class="nav-link nav-link-sub {{request()->routeIs('admin-logo') ? 'active' : '' }}" href="{{route('admin-logo')}}">
                                <i class="ni ni-planet text-pink"></i>
                                <span class="nav-link-text">{{__('master.LOGO')}}</span>
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