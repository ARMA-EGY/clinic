@extends('layouts.master')

@section('style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')


    <!-- Header -->
    <div class="header bg-gradient-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">

            <div class="col-lg-12 text-left">
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('master.DASHBOARD')}}</a></li>
                  <li class="breadcrumb-item"><a href="{{route('inventory.index')}}">Inventory</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Create Adjustment</li>
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
            <div class="card card-defualt">
                <div class="card-header">Create Adjustment </div>
        
                <div class="card-body">
                    <form action="{{  route('store-adjustment')  }}" method="post" enctype="multipart/form-data">
                        @csrf


                        
                        <div class="row">

                            <!--=================  Name  =================-->
                            <div class="form-group col-md-6 mb-4 text-left">
                            <!--=================  Sectors  =================-->
                            @if ($items->count() > 0)
                                <div class="form-group col-md-12 mb-4 text-left">
                                    <label class="font-weight-bold text-uppercase" for="sectors">items</label>
                                    <select id="item" class=" form-control item" name="item">
                                        @foreach ($items as $item)
                                            <option value="{{$item->id}}" data-url="{{route('inventory.show',$item->id)}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
            
                                </div>
                            @endif
            
                            </div>
        
                            <!--=================  Notes  =================-->
                            <div class="form-group col-md-6 mb-4 text-left">
                                <label class="font-weight-bold text-uppercase">Notes</label>
                                <input type="text" name="notes" class="@error('notes') is-invalid @enderror form-control" placeholder="notes">
                            
                                @error('notes')
                                    <div>
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
            
                            </div>

                        </div>
                        <hr class="my-3">

                        <div class="row">


                        <div class="table-responsive">
                            <!-- Projects table -->
                            <table class="table align-items-center table-flush display nowrap" id="example">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="sort" >Item Code</th>
                                    <th scope="col" class="sort" >Item Name</th>
                                    <th scope="col" class="sort" >Stock</th>
                                    <th scope="col" class="sort" >Quantity</th>
                                    <th scope="col" class="sort" >Type</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody id="changed_items">
                                </tbody>
                            </table>
                        </div>
        

                        </div>
                        <hr class="my-3">
        
                        <div class="form-group card-footer">
                        <button type="submit" class="btn btn-success">{{ __('master.SAVE') }}</button>
                        </div>
        
                    </form>
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
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
  <script>
        $(document).ready(function() {
                $('.select2').select2();
            });

        $(document).ready(function() 
        {
            $('#item').change(function() 
            {
                
                var url = $(this).find(':selected').data('url');
                $('option:selected', this).remove();
                $.ajax({
                    url: url,
                    type:"GET",
                    dataType: 'text',
                    success : function(response)
                        {
                            $('#changed_items').append(response)
                        }  
                  })
            });

            $('.typechs').change(function() {
                if($(this).val() == "subtraction")
                {
                    var id = $(this).find(':selected').data('id');
                    var stock = $('#stock_'+id);
                    $('#quantity_'+id).attr({
                        "max" : stock
                    });
                }
            });

            $(document).on("change",".typechs", function()
            {
                    if($(this).val() == "subtraction")
                    {
                        var id = $(this).find(':selected').data('id');
                        var stock = $('#stock_'+id).html();
                        $('#quantity_'+id).attr({
                            "max" : stock
                        });
                        if(stock < $('#quantity_'+id).val())
                        {
                            $('#quantity_'+id).val(stock);
                        }
                        
                    }
                
            });


            $(document).on("click",".trash-item", function()
            { 
                var id = $(this).data("id");
                var name = $(this).data("itemname");
                var url = $(this).data("url");
                var option = '  <option value="'+id+'" data-url="'+url+'">'+name+'</option>';
                $('#item').append(option);
                $(this).parents('.parent').remove();
            });

        });


    </script>
@endsection
