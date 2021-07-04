@extends('layouts.master')

@section('content')


    <!-- Header -->
    <div class="header bg-gradient-primary pb-6">
        <div class="container-fluid">
          <div class="header-body">
            <div class="row align-items-center py-4">
              <div class="col-lg-6 col-7">
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                  <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                    <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Logo</li>
                  </ol>
                </nav>
              </div>
              <div class="col-lg-6 col-5 text-right">
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End: Header -->

<div class="container-fluid mt--6">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Logo</div>

                <div class="card-body">
                    <form method="post" action="{{route('changelogo')}}" enctype="multipart/form-data">
                        @csrf

                        @if (isset($logo))
                            <div class="form-group">
                                <img src="{{ asset('storage/'.$logo->logo) }}" alt="" width="100%">
                            </div>
                        @endif

                        <div class="form-group">
                          <label for="change_logo">Change Logo</label>
                          <input id="change_logo" type="file" name="logo" class=" form-control" required>
                        </div>

                        @error('logo')
                            <div>
                                <span class="text-danger">{{ $message }}</span>
                            </div>
                        @enderror

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary submit">
                                    Upload
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection


@section('script')
    
<script>

// $(document).on('submit', '.logo_form', function(e)
// 	{
//         e.preventDefault();
//         $('.submit').prop('disabled', true);

//         var head1 	= 'Done';
//         var title1 	= 'Data Changed Successfully. ';
//         var head2 	= 'Oops...';
//         var title2 	= 'Something went wrong, please try again later.';


//         $.ajax({
//             url: 		"{{route('changelogo')}}",
//             method: 	'POST',
//             data:		$(this).serialize()	,
//             contentType: false,
//             processData: false,
//             success : function(data)
//                 {
//                     $('.submit').prop('disabled', false);
                    
//                     if (data['status'] == 'true')
//                     {
//                         Swal.fire(
//                                 head1,
//                                 title1,
//                                 'success'
//                                 )
//                         $('.modal').modal('hide');
//                     }
//                     else if (data['status'] == 'false')
//                     {
//                         Swal.fire(
//                                 head2,
//                                 title2,
//                                 'error'
//                                 )
//                     }
//                 },
//                 error : function(reject)
//                 {
//                     $('.submit').prop('disabled', false);

//                     var response = $.parseJSON(reject.responseText);
//                     $.each(response.errors, function(key, val)
//                     {
//                         Swal.fire(
//                                 head2,
//                                 val[0],
//                                 'error'
//                                 )
//                     });
//                 }
            
            
//         });

//   });
</script>

@endsection