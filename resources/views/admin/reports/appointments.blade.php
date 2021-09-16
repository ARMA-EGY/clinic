@extends('layouts.master')

@section('style')
    
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.0.3/css/dataTables.dateTime.min.css">

<style>
  .search_number input
  {
    width: 40px;
  }
</style>

@endsection

@section('content')

    <!-- Header -->
    <div class="header bg-gradient-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">

            <div class="col-lg-12 col-12 text-left">
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">{{__('master.REPORTS')}}</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{__('master.APPOINTMENTS')}}</li>
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
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">{{__('master.APPOINTMENTS')}} <span class="badge badge-primary p-2">{{$total_rows}}</span></h3>
                </div>
              </div>
            </div>

            @if ($items->count() > 0)
            
            <div class="row justify-content-center">

                <div class="form-group col-md-3 mb-2 ">
                    <label class="font-weight-bold">{{__('master.DATE-FROM')}}:</label>
                    <input class="form-control form-control-sm" type="text" id="min" name="min" autocomplete="off">
                </div>

                <div class="form-group col-md-3 mb-2 ">
                    <label class="font-weight-bold">{{__('master.DATE-TO')}}:</label>
                    <input class="form-control form-control-sm" type="text" id="max" name="max" autocomplete="off">
                </div>

            </div>

            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush display nowrap" id="example">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col" class="sort" >{{__('master.APPOINTMENT-DATE')}}</th>
                    <th scope="col" class="sort" >{{__('master.APPOINTMENT-NUMBER')}}</th>
                    <th scope="col" class="sort" >{{__('master.PATIENT-NAME')}}</th>
                    <th scope="col" class="sort" >{{__('master.DOCTOR-NAME')}}</th>
                    <th scope="col" class="sort" >{{__('master.SECTOR')}}</th>
                    <th scope="col" class="sort" >{{__('master.BRANCH')}}</th>
                    <th scope="col" class="sort" >{{__('master.STATUS')}}</th> 
                  </tr>
                </thead>
                <tbody>

                  @foreach ($items as $item)

                  <tr class="parent">
                    <td>{{ $loop->iteration }}</td>
                    <td><strong> {{$item->appointment_date}} </strong></td>
                    <td><strong> {{$item->appointment_number}} </strong></td>
                    <td><strong> {{$item->patient->name}} </strong></td>
                    <td><strong> {{$item->doctor->name}} </strong></td>
                    <td><strong> {{$item->sector->name}} </strong></td>
                    <td><strong> {{$item->branch->name}} </strong></td>
                    <td>
                      @if ($item->status == 'pending')
                          <span class="badge badge-yellow category-badge">  {{__('master.PENDING')}}</span>
                      @elseif ($item->status == 'partial_paid')
                          <span class="badge badge-info category-badge">  {{__('master.PARTIAL-PAID')}}</span>
                      @elseif ($item->status == 'paid')
                          <span class="badge badge-success category-badge">  {{__('master.PAID')}}</span>
                      @elseif ($item->status == 'cancelled')
                          <span class="badge badge-danger category-badge">  {{__('master.CANCELLED')}}</span>
                      @endif
                    </td>
                  </tr>

                  @endforeach
                 
                </tbody>
                <tfoot>
                    <tr>
                        <th class="p-2 search_number"></th>
                        <th scope="col" class="sort p-2" >{{__('master.APPOINTMENT-DATE')}}</th>
                        <th scope="col" class="sort p-2" >{{__('master.APPOINTMENT-NUMBER')}}</th>
                        <th scope="col" class="sort p-2" >{{__('master.PATIENT-NAME')}}</th>
                        <th scope="col" class="sort p-2" >{{__('master.DOCTOR-NAME')}}</th>
                        <th scope="col" class="sort p-2" >{{__('master.SECTOR')}}</th>
                        <th scope="col" class="sort p-2" >{{__('master.BRANCH')}}</th>
                        <th scope="col" class="sort p-2" >{{__('master.STATUS')}}</th> 
                    </tr>
                </tfoot>
              </table>
            </div>


            @else 
                <p class="text-center"> {{__('master.NO-DATA-AVAILABLE')}} </p>
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
<script src="https://cdn.datatables.net/datetime/1.0.3/js/dataTables.dateTime.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.20/api/sum().js"></script>

<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

<script>

var minDate, maxDate;
   
   // Custom filtering function which will search data in column four between two values
   $.fn.dataTable.ext.search.push(
       function( settings, data, dataIndex ) {
           var min = minDate.val();
           var max = maxDate.val();
           var date = new Date( data[1] );
    
           if (
               ( min === null && max === null ) ||
               ( min === null && date <= max ) ||
               ( min <= date   && max === null ) ||
               ( min <= date   && date <= max )
           ) {
               return true;
           }
           return false;
       }
   );
    
   $(document).ready(function() {
       // Create date inputs
       minDate = new DateTime($('#min'), {
           format: 'MMMM Do YYYY'
       });
       maxDate = new DateTime($('#max'), {
           format: 'MMMM Do YYYY'
       });
       
      // Setup - add a text input to each footer cell
      $('#example tfoot th').each( function () {
             var title = $(this).text();
             $(this).html( '<input type="text" placeholder=" '+title+'" />' );
         } );
     
         // DataTable
         var table = $('#example').DataTable({
             initComplete: function () {
                 // Apply the search
                 this.api().columns().every( function () {
                     var that = this;
     
                     $( 'input', this.footer() ).on( 'keyup change clear', function () {
                         if ( that.search() !== this.value ) {
                             that
                                 .search( this.value )
                                 .draw();
                         }
                     } );
                 } );
             },
             "pagingType": "numbers",
            dom: 'Blfrtip',
            
            buttons: [
                        { extend: 'copy', className: 'btn btn-sm btn-warning' },
                        { extend: 'csv', className: 'btn btn-sm btn-info' },
                        { extend: 'excel', title: 'Appointments Report', className: 'btn btn-sm btn-success' },
                        { extend: 'print', text: '{{__("master.PRINT")}}', title: 'Appointments Report', className: 'btn btn-sm btn-primary' },
                    ]
         });
    
       // Refilter the table
       $('#min, #max').on('change', function () {
           table.draw();
       });
   
   });


</script>
    
@endsection