@if (LaravelLocalization::getCurrentLocale() == 'ar')
    @php
    $dir   = 'rtl';
    $text  = 'text-right';
    $inverse_text  = 'text-left';
    $lang  = 'ar';
    @endphp
@elseif (LaravelLocalization::getCurrentLocale() == 'en')  
    @php
    $dir    = 'ltr';
    $text   = '';
    $inverse_text  = 'text-right';
    $lang   = 'en';
    @endphp
@endif

@extends('layouts.admin')

@section('style')
    
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">

@endsection

@section('content')

    <!-- Header -->
    <div class="header bg-gradient-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">

            <div class="col-lg-6 col-7 {{$text}}">
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Patients</li>
                </ol>
              </nav>
            </div>

            <div class="col-lg-6 col-5 {{$inverse_text}}">
              <a href="{{ route('patients.create')}}" class="btn btn-sm btn-neutral"><i class="fa fa-plus"></i>ADD New</a>
            </div>

            @if(session()->has('success'))	
                <div class="alert alert-success alert-dismissible fade show m-auto" role="alert">
                    {{ session()->get('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            @endif

          </div>
        </div>
      </div>
    </div>
    <!-- End: Header -->


    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Total Patients<span class="badge badge-primary p-2">{{$patients_count}}</span></h3>
                </div>
              </div>
            </div>

            @if ($patients->count() > 0)

            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush display nowrap" id="example">
                <thead class="thead-light">
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">#</th>
                    <th scope="col" class="sort" >name</th>
                    <th scope="col" class="sort" >phone</th>
                    <th scope="col" class="sort" >identifiation</th>
                    <th scope="col" class="sort" >dateofbirth </th>
                    <th scope="col" class="sort" >age</th>
                    <th scope="col" class="sort" >gender</th>
                    <th scope="col" class="sort" >nationality</th>                    
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody class="sortable">

                  @foreach ($patients as $patient)

                  <tr class="parent" data-index="{{ $patient->id }}">
                    <td class="pointer"><i class="fas fa-arrows-alt-v"></i></td>
                    <td>{{ $loop->iteration }}</td>
                    <td><b> {{  $patient->name }} </b></td>
                    <td>{{ $patient->phone }}</td>
                    <td>{{ $patient->identifiation }}</td>
                    <td>{{ $patient->dateofbirth }}  </td>
                    <td>{{ $patient->age }}  </td>
                    <td> {{ $patient->gender }} </td>
                    <td>{{ $patient->nationality }}  </td>
                    <td>
                      <a href="{{ route('patients.edit', $patient->id)}}" class="btn btn-primary btn-sm mx-1"><i class="fa fa-edit"></i>Edit </a>
                    </td>
                  </tr>

                  @endforeach
                 
                </tbody>
              </table>
            </div>


            @else 
                <p class="text-center"> No Patients Found</p>
            @endif

            <!-- Card footer -->
            <div class="card-footer py-2">
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
   

<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>


<script>
$('#example').DataTable( {
    "pagingType": "numbers"
  } );
  
	
 

</script>
    
@endsection