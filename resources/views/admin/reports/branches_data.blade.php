



        <!-- Card stats -->
        <div class="row justify-content-center">

          <div class="col-xl-4 col-md-6">
            <div class="card card-stats">
              <!-- Card body -->
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0">{{__('master.APPOINTMENTS')}}</h5>
                    <span class="h2 font-weight-bold mb-0">{{number_format($appointments->count())}}</span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-success text-white rounded-circle shadow">
                      <i class="ni ni-money-coins"></i>
                    </div>
                  </div>
                </div>
                <p class="mt-3 mb-0 text-sm">
                  <span class="text-nowrap text-success">{{$transactions->sum('total')}} <i class="fa fa-dollar-sign"></i></span>
                </p>
              </div>
            </div>
          </div>
          
          <div class="col-xl-4 col-md-6">
            <div class="card card-stats">
              <!-- Card body -->
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0">{{__('master.EXPENSES')}}</h5>
                    <span class="h2 font-weight-bold mb-0">{{number_format($expenses->count())}}</span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-warning text-white rounded-circle shadow">
                      <i class="fas fa-wallet"></i>
                    </div>
                  </div>
                </div>
                <p class="mt-3 mb-0 text-sm">
                  <span class="text-nowrap text-warning">{{$expenses->sum('price')}} <i class="fa fa-dollar-sign"></i></span>
                </p>
              </div>
            </div>
          </div>

        </div>

        <ul class="nav nav-tabs mt-4" id="myTab" role="tablist">

          <li class="nav-item" role="presentation">
            <a class="nav-link active" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="one" aria-selected="true">{{__('master.APPOINTMENTS')}}</a>
          </li>

          <li class="nav-item" role="presentation">
            <a class="nav-link" id="two-tab" data-toggle="tab" href="#two" role="tab" aria-controls="two" aria-selected="false">{{__('master.TRANSACTIONS')}}</a>
          </li>

          <li class="nav-item" role="presentation">
            <a class="nav-link" id="three-tab" data-toggle="tab" href="#three" role="tab" aria-controls="three" aria-selected="false">{{__('master.EXPENSES')}}</a>
          </li>
          
        </ul>

        <div class="tab-content" id="myTabContent">

          <div class="tab-pane fade show active" id="one" role="tabpanel" aria-labelledby="one-tab">

            <div class="row">
              <div class="col-xl-12">
                <div class="card">
                  <div class="card-header border-0">
                    <div class="row align-items-center">
                      <div class="col">
                      </div>
                    </div>
                  </div>
      
                  @if ($appointments->count() > 0)

                  <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush display nowrap" id="example">
                      <thead class="thead-light">
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col" class="sort" >{{__('master.PATIENT-NAME')}}</th>
                          <th scope="col" class="sort" >{{__('master.DOCTOR-NAME')}}</th>
                          <th scope="col" class="sort" >{{__('master.APPOINTMENT-NUMBER')}}</th>
                          <th scope="col" class="sort" >{{__('master.APPOINTMENT-DATE')}}</th>
                          <th scope="col" class="sort" >{{__('master.BRANCH')}}</th>
                          <th scope="col" class="sort" >{{__('master.SECTOR')}}</th>
                          <th scope="col" class="sort" >{{__('master.STATUS')}}</th>
                        </tr>
                      </thead>
                      <tbody>
      
                        @foreach ($appointments as $appointment)
      
                        <tr class="parent">
                          <td>{{ $loop->iteration }}</td>
                          <td><b> {{$appointment->patient->name}} </b></td>
                          <td><b> {{$appointment->doctor->name}} </b></td>
                          <td><b> {{$appointment->appointment_number}} </b></td>
                          <td><b> {{$appointment->appointment_date}} </b></td>
                          <td><b> {{$appointment->branch->name}} </b></td>
                          <td><b> {{$appointment->sector->name}} </b></td>
                          <td>
                            @if ($appointment->status == 'pending')
                                <span class="badge badge-yellow category-badge">  {{__('master.PENDING')}}</span>
                            @elseif ($appointment->status == 'paid')
                                <span class="badge badge-success category-badge">  {{__('master.PAID')}}</span>
                            @elseif ($appointment->status == 'cancelled')
                                <span class="badge badge-danger category-badge">  {{__('master.CANCELLED')}}</span>
                            @endif
                          </td>
                        </tr>
      
                        @endforeach
                       
                      </tbody>
                      <tfoot>
                          <tr>
                              <th class="p-2 search_number"></th>
                              <th scope="col" class="sort p-2" >{{__('master.PATIENT-NAME')}}</th>
                              <th scope="col" class="sort p-2" >{{__('master.DOCTOR-NAME')}}</th>
                              <th scope="col" class="sort p-2" >{{__('master.APPOINTMENT-NUMBER')}}</th>
                              <th scope="col" class="sort p-2" >{{__('master.APPOINTMENT-DATE')}}</th>
                              <th scope="col" class="sort p-2" >{{__('master.BRANCH')}}</th>
                              <th scope="col" class="sort p-2" >{{__('master.SECTOR')}}</th>
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

          </div>

          <div class="tab-pane fade" id="two" role="tabpanel" aria-labelledby="two-tab">

            <div class="row">
              <div class="col-xl-12">
                <div class="card">
                  <div class="card-header border-0">
                    <div class="row align-items-center">
                      <div class="col">
                      </div>
                    </div>
                  </div>
      
                  @if ($transactions->count() > 0)


                  <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush display nowrap" id="example2">
                      <thead class="thead-light">
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col" class="sort" >{{__('master.APPOINTMENT-DATE')}}</th>
                          <th scope="col" class="sort" >{{__('master.APPOINTMENT-NUMBER')}}</th>
                          <th scope="col" class="sort" >{{__('master.PATIENT-NAME')}}</th>
                          <th scope="col" class="sort" >{{__('master.SUB-TOTAL')}}</th>
                          <th scope="col" class="sort" >{{__('master.TAX')}}</th>
                          <th scope="col" class="sort" >{{__('master.TAX-PERCENTAGE')}}</th>
                          <th scope="col" class="sort" >{{__('master.TOTAL')}}</th>
                          <th scope="col" class="sort" >{{__('master.PAYMENT-METHOD')}}</th>
                        </tr>
                      </thead>
                      <tbody>

                        @foreach ($transactions as $transaction)

                        <tr class="parent">
                          <td>{{ $loop->iteration }}</td>
                          <td><strong>{{$transaction->appointment->appointment_date}} </strong></td>
                          <td><strong>{{ $transaction->appointment->appointment_number}}</strong></td>
                          <td>{{ $transaction->Patient->name }} </td>
                          <td>{{ $transaction->sub_total }}</td>
                          <td>{{ $transaction->tax }}</td>
                          <td>{{ $transaction->tax_percentage }} %</td>
                          <td>{{ $transaction->total }} </td>
                          <td>{{__('master.'.$transaction->payment_method)}}</td>
                        </tr>

                        @endforeach
                      
                      </tbody>
                      <tfoot>
                          <tr>
                              <th class="p-2 search_number"></th>
                              <th scope="col" class="sort p-2" >{{__('master.APPOINTMENT-DATE')}}</th>
                              <th scope="col" class="sort p-2" >{{__('master.APPOINTMENT-NUMBER')}}</th>
                              <th scope="col" class="sort p-2" >{{__('master.PATIENT-NAME')}}</th>
                              <th scope="col" class="sort p-2" >{{__('master.SUB-TOTAL')}}</th>
                              <th scope="col" class="sort p-2" >{{__('master.TAX')}}</th>
                              <th scope="col" class="sort p-2" >{{__('master.TAX-PERCENTAGE')}}</th>
                              <th scope="col" class="sort p-2" >{{__('master.TOTAL')}}</th>
                              <th scope="col" class="sort p-2" >{{__('master.PAYMENT-METHOD')}}</th>
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

          </div>

          <div class="tab-pane fade" id="three" role="tabpanel" aria-labelledby="three-tab">
        
            <div class="row">
              <div class="col-xl-12">
                <div class="card">
                  <div class="card-header border-0">
                    <div class="row align-items-center">
                      <div class="col">
                      </div>
                    </div>
                  </div>
      
                  @if ($expenses->count() > 0)
      
                  <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush display nowrap" id="example3">
                      <thead class="thead-light">
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col" class="sort" >{{__('master.PRICE')}}</th>
                        </tr>
                      </thead>
                      <tbody>

                        @foreach ($expenses as $expense)
      
                        <tr class="parent">
                          <td>{{ $loop->iteration }}</td>
                          <td><b>{{ $expense->price }} </b></td>
                        </tr>
      
                        @endforeach
                      
                      </tbody>
                      <tfoot>
                          <tr>
                              <th class="p-2 search_number"></th>
                              <th scope="col" class="sort p-2" >{{__('master.PRICE')}}</th>
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

          </div>

        </div>

        
<script>

    
   $(document).ready(function() {
       
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


      // Setup - add a text input to each footer cell
      $('#example2 tfoot th').each( function () {
             var title = $(this).text();
             $(this).html( '<input type="text" placeholder=" '+title+'" />' );
         } );
     
         // DataTable
         var table2 = $('#example2').DataTable({
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
                        { extend: 'excel', title: 'Transactions Report', className: 'btn btn-sm btn-success' },
                        { extend: 'print', text: '{{__("master.PRINT")}}', title: 'Transactions Report', className: 'btn btn-sm btn-primary' },
                    ]
      });


        // Setup - add a text input to each footer cell
        $('#example3 tfoot th').each( function () {
              var title = $(this).text();
              $(this).html( '<input type="text" placeholder=" '+title+'" />' );
          } );

          // DataTable
          var table3 = $('#example3').DataTable({
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
                          { extend: 'excel', title: 'Expenses Report', className: 'btn btn-sm btn-success' },
                          { extend: 'print', text: '{{__("master.PRINT")}}', title: 'Expenses Report', className: 'btn btn-sm btn-primary' },
                      ]
        });


   
   });


</script>
    