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

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#navbar-appointment" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-components">
                      <i class="fas fa-notes-medical"></i>
                      <span class="nav-link-text">{{__('master.APPOINTMENTS')}}</span>
                    </a>
                    <div class="collapse show" id="navbar-appointment" style="">
                      <ul class="nav nav-sm flex-column">

                        <li class="nav-item">
                          <a href="{{route('doctor-appointment.today')}}" class="nav-link nav-link-sub {{request()->routeIs('doctor-appointment.today') ? 'active' : '' }}">
                            <i class="far fa-dot-circle"></i>
                            <span class="sidenav-normal"> {{__('master.TODAY')}}  </span>
                          </a>
                        </li>

                        <li class="nav-item">
                          <a href="{{route('doctor-appointment.done')}}" class="nav-link nav-link-sub {{request()->routeIs('doctor-appointment.done') ? 'active' : '' }}">
                            <i class="far fa-dot-circle"></i>
                            <span class="sidenav-normal"> {{__('master.DONE')}}  </span>
                          </a>
                        </li>

                        <li class="nav-item">
                          <a href="{{route('doctor-appointment.cancelled')}}" class="nav-link nav-link-sub {{request()->routeIs('doctor-appointment.cancelled') ? 'active' : '' }}">
                            <i class="far fa-dot-circle"></i>
                            <span class="sidenav-normal"> {{__('master.CANCELLED')}}  </span>
                          </a>
                        </li>

                        <li class="nav-item">
                          <a href="{{route('doctor-appointment.index')}}" class="nav-link nav-link-sub {{request()->routeIs('doctor-appointment.index') ? 'active' : '' }}">
                            <i class="far fa-dot-circle"></i>
                            <span class="sidenav-normal"> {{__('master.ALL')}}  </span>
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
                    <a class="nav-link {{request()->routeIs('doctor-doctors.profile') ? 'active' : '' }}" href="{{route('doctor-doctors.profile')}}">
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