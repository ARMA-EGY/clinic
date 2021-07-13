<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="ARMA Software">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{$setting->project_name}}</title>
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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />

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
    @if(auth()->user()->role == "Admin")

      @include('include._adminNav')

    @elseif(auth()->user()->role == "Staff")

      @include('include._staffNav')

    @elseif(auth()->user()->role == "Doctor")

      @include('include._doctorNav')

    @endif
    <!-- Sidenav -->

    <!-- Main content -->
    <div class="main-content" id="panel">
        <!-- Topnav -->
        <nav class="navbar navbar-top navbar-expand navbar-dark bg-gradient-primary border-bottom">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Navbar links -->
                
                <ul class="navbar-nav align-items-center ml-auto">

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
                            <small>{{__('master.CALENDAR')}}</small>
                            </a>
                            <a href="#!" class="col-4 shortcut-item show-todo py-0">
                            <span class="shortcut-media avatar rounded-circle bg-gradient-purple">
                                <i class="ni ni-bullet-list-67"></i>
                            </span>
                            <small>{{__('master.TO-DO')}}</small>
                            </a>
                            <a href="#!" class="col-4 shortcut-item show-notes py-0">
                            <span class="shortcut-media avatar rounded-circle bg-gradient-orange">
                                <i class="fa fa-sticky-note"></i>
                            </span>
                            <small>{{__('master.NOTES')}}</small>
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
                                <h6 class="text-overflow m-0">{{__('master.WELCOME')}}</h6>
                            </div>

                            <a href="{{route('profile')}}" class="dropdown-item">
                                <i class="fa fa-user-circle"></i>
                                <span>{{__('master.PROFILE')}}</span>
                            </a>

                            <div class="dropdown-divider"></div>
                            <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                <i class="ni ni-user-run"></i>
                                <span>{{__('master.LOGOUT')}}</span>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

    <script src="https://cdn.tiny.cloud/1/mq6umcdg6y938v1c32lokocdpgrgp5g2yl794h4y1braa6j6/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <!-- JQUERY UI -->
    <script src="{{ asset('admin_assets/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('admin_assets/js/jquery.ui.touch-punch.min.js') }}"></script>

    <script src="{{ asset('admin_assets/js/trix.min.js') }}" ></script>
    <script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

    <script>

        $(function() 
        {
            $('.selectpicker').selectpicker();
        });

        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
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

    </script>

    @yield('script')
</body>