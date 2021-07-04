@extends('layouts.master')


@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />

<style>
    .fc .fc-daygrid-day-top {
        display: flex;
        flex-direction: row-reverse;
        float: left;
        padding: .5rem;
    }

    .fc .fc-toolbar.fc-header-toolbar {
        margin-bottom: 1.5em;
    }

    .fc th {
        font-size: .75rem;
        font-weight: 600;
        padding: .75rem 1rem;
        text-transform: uppercase;
        color: #8898aa;
    }

    .fc-theme-standard td, .fc-theme-standard th {
        border: 1px solid #eff1f3;
    }

    .calendar td, .calendar th {
        border-color: #eff1f3;
    }


    .fc-row table {
        border-left: 0 hidden transparent;
        border-right: 0 hidden transparent;
        border-bottom: 0 hidden transparent;
    }

    .calendar .fc-day-number {
        box-sizing: border-box;
        width: 100%;
        padding: .5rem 1rem;
    }

    .btn-group-colors>.btn {
        position: relative;
        width: 30px;
        height: 30px;
        margin-right: .5rem;
        margin-bottom: .25rem;
        padding: 0;
        border-radius: 50%!important;
        box-shadow: none;
    }

    .btn-group-colors>.btn:before {
        font-family: NucleoIcons,sans-serif;
        font-size: 14px;
        line-height: 28px;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        content: '';
        transition: transform .2s,opacity .2s;
        transform: scale(0);
        opacity: 0;
        color: #fff;
    }

    .btn-group-colors>.btn.active:before {
        transform: scale(1);
        opacity: 1;
    }

</style>

@endsection

@section('content')


    <!-- Header -->
      <div class="header header-dark bg-gradient-primary pb-6 content__title content__title--calendar">
        <div class="container-fluid">
          <div class="header-body">
            <div class="row align-items-center py-4">
              <div class="col-lg-6">
                <nav aria-label="breadcrumb" class="d-none d-lg-inline-block ml-lg-4">
                  <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                    <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Calendar</li>
                  </ol>
                </nav>
              </div>
            </div>
            <div class="row align-items-center pb-4">
              <div class="col-lg-6">
                <h6 class="fullcalendar-title h2 text-white d-inline-block mb-0">Full calendar</h6>
              </div>
              <div class="col-lg-6 mt-3 mt-lg-0 text-lg-right">
                <a href="#" class="fullcalendar-btn-prev btn btn-sm btn-neutral">
                  <i class="fas fa-angle-left"></i>
                </a>
                <a href="#" class="fullcalendar-btn-next btn btn-sm btn-neutral">
                  <i class="fas fa-angle-right"></i>
                </a>
                <a href="#" class="btn btn-sm btn-neutral" data-calendar-view="month">Month</a>
                <a href="#" class="btn btn-sm btn-neutral" data-calendar-view="basicWeek">Week</a>
                <a href="#" class="btn btn-sm btn-neutral" data-calendar-view="basicDay">Day</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End: Header -->
  
  
      <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
          <div class="col">
            <!-- Fullcalendar -->
            <div class="card card-calendar">
              <!-- Card header -->
              <div class="card-header">
                <!-- Title -->
                <h5 class="h3 mb-0">Calendar</h5>
              </div>
              <!-- Card body -->
              <div class="card-body p-0">
                <div class="calendar" data-toggle="calendar" id="calendar"></div>
              </div>
            </div>
            <!-- Modal - Add new event -->
            <!--* Modal header *-->
            <!--* Modal body *-->
            <!--* Modal footer *-->
            <!--* Modal init *-->
            <div class="modal fade" id="new-event" tabindex="-1" role="dialog" aria-labelledby="new-event-label" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-secondary" role="document">
                <div class="modal-content">
                <form class="new-event--form">
                  <!-- Modal body -->
                  <div class="modal-body">
                      <div class="form-group">
                        <label class="form-control-label">Event title</label>
                        <input type="text" name="title" class="form-control form-control-alternative new-event--title" placeholder="Event Title" required>
                      </div>
                      <div class="form-group mb-0">
                        <label class="form-control-label d-block mb-3">Status color</label>
                        <div class="btn-group btn-group-toggle btn-group-colors event-tag" data-toggle="buttons">
                          <label class="btn bg-info active"><input type="radio" name="class_name" value="bg-info" autocomplete="off" checked></label>
                          <label class="btn bg-primary"><input type="radio" name="class_name" value="bg-primary" autocomplete="off"></label>
                          <label class="btn bg-purple"><input type="radio" name="class_name" value="bg-purple" autocomplete="off"></label>
                          <label class="btn bg-indigo"><input type="radio" name="class_name" value="bg-indigo" autocomplete="off"></label>
                          <label class="btn bg-success"><input type="radio" name="class_name" value="bg-success" autocomplete="off"></label>
                          <label class="btn bg-cyan"><input type="radio" name="class_name" value="bg-cyan" autocomplete="off"></label>
                          <label class="btn bg-pink"><input type="radio" name="class_name" value="bg-pink" autocomplete="off"></label>
                          <label class="btn bg-warning"><input type="radio" name="class_name" value="bg-warning" autocomplete="off"></label>
                          <label class="btn bg-danger"><input type="radio" name="class_name" value="bg-danger" autocomplete="off"></label>
                          <label class="btn bg-default"><input type="radio" name="class_name" value="bg-default" autocomplete="off"></label>
                          <label class="btn bg-gray"><input type="radio" name="class_name" value="bg-gray" autocomplete="off"></label>
                          <label class="btn bg-yellow"><input type="radio" name="class_name" value="bg-yellow" autocomplete="off"></label>
                        </div>
                      </div>
                      <input type="hidden" name="start_date" class="new-event--start" />
                      <input type="hidden" name="end_date" class="new-event--end" />
                      <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
                  </div>
                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary new-event--add">Add event</button>
                    <button type="button" class="btn btn-link ml-auto" data-dismiss="modal">Close</button>
                  </div>
                </form>
                </div>
              </div>
            </div>
            <!-- Modal - Edit event -->
            <!--* Modal body *-->
            <!--* Modal footer *-->
            <!--* Modal init *-->
            <div class="modal fade" id="edit-event" tabindex="-1" role="dialog" aria-labelledby="edit-event-label" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-secondary" role="document">
                <div class="modal-content">
                <form class="edit-event--form">
                  <!-- Modal body -->
                  <div class="modal-body">
                      <div class="form-group">
                        <label class="form-control-label">Event title</label>
                        <input type="text" name="title" class="form-control form-control-alternative edit-event--title" placeholder="Event Title">
                      </div>
                      <div class="form-group">
                        <label class="form-control-label d-block mb-3">Status color</label>
                        <div class="btn-group btn-group-toggle btn-group-colors event-tag mb-0" data-toggle="buttons">
                            <label class="btn bg-info active"><input type="radio" name="class_name" value="bg-info" autocomplete="off" checked></label>
                            <label class="btn bg-primary"><input type="radio" name="class_name" value="bg-primary" autocomplete="off"></label>
                            <label class="btn bg-purple"><input type="radio" name="class_name" value="bg-purple" autocomplete="off"></label>
                            <label class="btn bg-indigo"><input type="radio" name="class_name" value="bg-indigo" autocomplete="off"></label>
                            <label class="btn bg-success"><input type="radio" name="class_name" value="bg-success" autocomplete="off"></label>
                            <label class="btn bg-cyan"><input type="radio" name="class_name" value="bg-cyan" autocomplete="off"></label>
                            <label class="btn bg-pink"><input type="radio" name="class_name" value="bg-pink" autocomplete="off"></label>
                            <label class="btn bg-warning"><input type="radio" name="class_name" value="bg-warning" autocomplete="off"></label>
                            <label class="btn bg-danger"><input type="radio" name="class_name" value="bg-danger" autocomplete="off"></label>
                            <label class="btn bg-default"><input type="radio" name="class_name" value="bg-default" autocomplete="off"></label>
                            <label class="btn bg-gray"><input type="radio" name="class_name" value="bg-gray" autocomplete="off"></label>
                            <label class="btn bg-yellow"><input type="radio" name="class_name" value="bg-yellow" autocomplete="off"></label>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="form-control-label">Description</label>
                        <textarea name="description" class="form-control form-control-alternative edit-event--description textarea-autosize" placeholder="Event Desctiption"></textarea>
                        <i class="form-group--bar"></i>
                      </div>
                      <input type="hidden" name="event_id" class="edit-event--id">
                  </div>
                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button class="btn btn-primary" data-calendar="update"><i class="fa fa-edit"></i> Update</button>
                    <button class="btn btn-danger" data-calendar="delete"><i class="fa fa-trash-alt"></i> Delete</button>
                    <button class="btn btn-link ml-auto" data-dismiss="modal">Close</button>
                  </div>
                </form>
                </div>
              </div>
            </div>
          </div>
    </div>
  
  @endsection
  
  
  @section('script')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>

  <script>


	
            

    Fullcalendar = function(){
            var e,a,t=$('[data-toggle="calendar"]');
            t.length&&(a={header:{right:"",center:"",left:""},
            buttonIcons:{prev:"calendar--prev",next:"calendar--next"},
            theme:!1,selectable:true,selectHelper:true,editable:true,
            events:"{{route('get-event', Auth::user()->id)}}",
            select:function(e, end, allDay){
                var a=moment(e).toISOString();
                var n=moment(end).toISOString();
                $("#new-event").modal("show"),
                $(".new-event--title").val(""),
                $(".new-event--start").val(a),
                $(".new-event--end").val(n);
            },
            viewRender:function(a){
                e.fullCalendar("getDate").month(),
                $(".fullcalendar-title").html(a.title)},
                // DROP EVENT
                eventDrop:function(event)
                {
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");
                    var id = event.id;
                    $.ajax({
                            url: 		"{{route('update-event')}}",
                            method: 	'POST',
                            dataType: 	'text',
                            data:		{start_date:start, end_date:end, event_id:id},
                            success : 	function(response)
                                {}
                        });
                    console.log(id,start,end);
                },
                // RESIZE EVENT
                eventResize:function(event)
                {
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");
                    var id = event.id;
                    $.ajax({
                            url: 		"{{route('update-event')}}",
                            method: 	'POST',
                            dataType: 	'text',
                            data:		{start_date:start, end_date:end, event_id:id},
                            success : 	function(response)
                                {}
                        });
                    console.log(id,start,end);
                },
                // CLICK EVENT
                eventClick:function(e,a){
                    $("#edit-event input[value="+e.className+"]").prop("checked",!0),
                    $("#edit-event").modal("show"),
                    $(".edit-event--id").val(e.id),
                    $(".edit-event--title").val(e.title),
                    $(".edit-event--description").val(e.description)}},
                    (e=t).fullCalendar(a),
                    // ADD NEW EVENT
                    $("body").on('submit', '.new-event--form', function(a)
                    {
                        a.preventDefault();
                        $.ajax({
                            url: 		"{{route('add-event')}}",
                            method: 	'POST',
                            dataType: 	'text',
                            data:		$('.new-event--form').serialize(),
                            success : 	function(response)
                                {
                                    e.fullCalendar('refetchEvents');
                                    $("#new-event").modal("hide");
                                }
                        });
                    }),
                    // EDIT EVENT
                    $("body").on('submit', '.edit-event--form', function(a)
                    {
                        a.preventDefault();
                        $.ajax({
                            url: 		"{{route('edit-event')}}",
                            method: 	'POST',
                            dataType: 	'text',
                            data:		$('.edit-event--form').serialize(),
                            success : 	function(response)
                                {
                                    e.fullCalendar('refetchEvents');
                                    $("#edit-event").modal("hide");
                                }
                        });
                    }),
                    // UPDATE & DELETE EVENT
                    $("body").on("click","[data-calendar]",function(){
                        var a=$(this).data("calendar"),t=$(".edit-event--id").val(),
                        n=$(".edit-event--title").val(),
                        i=$(".edit-event--description").val(),o=$("#edit-event .event-tag input:checked").val(),
                        s=e.fullCalendar("clientEvents",t);
                        "update"===a&&(""!=n?(s[0].title=n,s[0].description=i,s[0].className=[o],console.log(o),e.fullCalendar("updateEvent",s[0]),
                            $("#edit-event").modal("hide")):($(".edit-event--title").closest(".form-group").addClass("has-error"),
                            $(".edit-event--title").focus())),
                        "delete"===a&&($("#edit-event").modal("hide"),setTimeout(function(){
                        Swal.fire({title:"Are you sure?",text:"You won't be able to revert this!",icon:"warning",showCancelButton:!0,buttonsStyling:!1,confirmButtonClass:"btn btn-danger",confirmButtonText:"Yes, delete it!",cancelButtonClass:"btn btn-secondary"}).then(a=>
                        {
                            $.ajax({
                                    url: 		"{{route('remove-event')}}",
                                    method: 	'POST',
                                    dataType: 	'json',
                                    data:		{id: t}	
                            }),
                            a.value&&(e.fullCalendar("removeEvents",t),
                            Swal.fire({title:"Deleted!",text:"The event has been deleted.",icon:"success",confirmButtonClass:"btn btn-primary"}))
                        })},200))}),
                    $("body").on("click","[data-calendar-view]",function(a){a.preventDefault(),$("[data-calendar-view]").removeClass("active"),$(this).addClass("active");var t=$(this).attr("data-calendar-view");e.fullCalendar("changeView",t)}),
                    $("body").on("click",".fullcalendar-btn-next",function(a){a.preventDefault(),e.fullCalendar("next")}),
                    $("body").on("click",".fullcalendar-btn-prev",function(a){a.preventDefault(),e.fullCalendar("prev")})
        )}()

        
	

</script>

  @endsection