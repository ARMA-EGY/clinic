<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="ARMA Software">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>اقرار عام</title>
  <!-- Favicon -->
  <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
  <!-- Page plugins --> 
  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

</head>

<body>

    <!-- Main content -->
    <div class="main-content py-4">
        <div class="container" dir="rtl">
            <hr>
            <h3 class="text-center"> اقرار عام</h3>
            <h4>اقر انا /   {{$pledge->patient->name}}</h4>
                <br>
            <h4 class="text-center">تحت اشراف الطبيبة وأتيت الى العيادة وأنا بجميع قواي العقلية دون ضغوط من احد.</h4>
                <br>
            <h4>وقد اخبرتني بالتعليمات والمحاذير وكيفية الاجراء والفائدة والاعراض الجانبية التي تنتج عنها وهي:</h4>
                <br>

            <ul style=" list-style: arabic-indic;font-size: 1.3rem;">
                <li>عدم التعرض لاشعة الشمس المباشرة.</li>
                <li>عدم التعرض لأي حمام بخار او ماء ساخن او أي مصدر حرارة.</li>
                <li>عدم وضع ورق حماية للمنطقة يجب ازالتة عند الوصول للمنزل مباشرة.</li>
                <li>عدم استخدام أي مقشرات او حمامات مغربية او سكراب.</li>
                <li>عدم ازالة الشعر للمنطقة سواء باليزر او الموس او أي طريقة أخري.</li>
            </ul>

                <br>
            <h4 class="text-center">ولا اعاني من مرضي الضغط والسكر او أي امراض عضوية.</h4>
                <br>

                <br>
            <h4 class="text-center">وقد وافقت على هذا الاجراء ،،،</h4>
                <br>
                <br>

            <form class="pledge_form">

                <!--=================  Name  =================-->
                <div class="row">
                    <div class="form-group col-md-4 mb-2 text-left">
                        <label class="font-weight-bold text-uppercase">الاسم</label>
                        <input type="text" name="name" class="form-control" value="{{$pledge->patient->name}}" disabled>
                    </div>
                </div>

                <!--=================  Signature  =================-->
                <div class="row">
                    <div class="form-group col-md-4 mb-2 text-left">
                        <label class="font-weight-bold text-uppercase">التوقيع</label>
                        <input type="text" name="signature" class="form-control" required>
                    </div>
                </div>

                <!--=================  Date  =================-->
                <div class="row">
                    <div class="form-group col-md-4 mb-2 text-left">
                        <label class="font-weight-bold text-uppercase">التاريخ</label>
                        <input type="date" name="name" class="form-control" value="{{$pledge->created_at->format('Y-m-d')}}" disabled>
                    </div>
                </div>
                <hr class="my-3">  
                
                <div class="form-group text-center">
                @if ($pledge->status == 0)
                    <button type="submit" class="btn btn-primary">موافق</button>
                @elseif ($pledge->status == 1)  
                    <button type="submit" class="btn btn-primary" disabled>تمت الموافقة</button>
                @endif
                </div>

            </form>

        </div>

    </div>


    <script src="{{ asset('admin_assets/vendor/jquery/dist/jquery.min.js') }}" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="{{ asset('admin_assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    </script>

</body>
</html>