@extends('layouts.master')

@section('style')
    
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">

@endsection

@section('content')

    <!-- Header -->
    <div class="header bg-gradient-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">

            <div class="col-lg-6 col-7 text-left">
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('master.DASHBOARD')}}</a></li>

                  @if($type == "all")
                  <li class="breadcrumb-item active" aria-current="page">{{__('master.ALL-ITEMS')}}</li>
                  @elseif($type == "active")
                  <li class="breadcrumb-item active" aria-current="page">{{__('master.ACTIVE-ITEMS')}}</li>
                  @elseif($type == "deactive")
                  <li class="breadcrumb-item active" aria-current="page">{{__('master.DEACTIVE-ITEMS')}}</li>
                  @endif
                </ol>
              </nav>
            </div>

            @if($type == "all")
            <div class="col-lg-6 col-5 text-right">
              <a href="{{ route('inventory.create')}}" class="btn btn-sm btn-neutral"><i class="fa fa-plus"></i> {{__('master.ADD-NEW-ITEM')}}</a>
            </div>
            @endif

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
                @if($type == "all")
                  <h3 class="mb-0">{{__('master.ALL-ITEMS')}} <span class="badge badge-primary p-2">{{$items_count}}</span></h3>
                  @elseif($type == "active")
                  <h3 class="mb-0">{{__('master.ACTIVE-ITEMS')}} <span class="badge badge-primary p-2">{{$items_count}}</span></h3>
                  @elseif($type == "deactive")
                  <h3 class="mb-0">{{__('master.DEACTIVE-ITEMS')}} <span class="badge badge-primary p-2">{{$items_count}}</span></h3>
                  @endif
                 
                </div>
              </div>
            </div>

            @if ($items->count() > 0)

            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush display nowrap" id="example">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col" class="sort" >{{__('master.NAME')}}</th>
                    <th scope="col" class="sort" >{{__('master.STOCK')}}</th>
                    <th scope="col" class="sort" >{{__('master.PRICE')}}</th>
                    <th scope="col" class="sort" >{{__('master.EXPIRE-DATE')}}</th>
                    <th scope="col" class="sort" >{{__('master.BRANCH')}}</th>
                    <th scope="col">{{__('master.STATUS')}}</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>

                  @foreach ($items as $item)

                  <tr class="parent">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->stock }} </td>
                    <td>{{ $item->price }} </td>
                    <td>{{ $item->expire_date }} </td>
                    <td>{{ $item->branch->name }} </td>
                    <td>
                      <div class="col-3">
                        <input type="checkbox" class="check_off item_check" data-id="{{$item->id}}" data-url="{{route('inventory-disable')}}" data-toggle="toggle" data-size="sm"  @if ($item->disable == '0') checked @endif>
                      </div>
                    </td>
                    <td>
                      <a data-toggle="tooltip" data-placement="top" title="{{__('master.EDIT')}}" href="{{ route('inventory.edit', $item->id)}}" class="btn btn-secondary btn-sm mx-1 px-3"> <i class="fa fa-edit"></i> </a>
                    </td>
                  </tr>

                  @endforeach
                 
                </tbody>
              </table>
            </div>


            @else 
                <p class="text-center"> No Items Available </p>
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