@extends('layout.template')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Sample')

@section('content')

    <div class="main-container">
        <div class="xs-pd-20-10 pd-ltr-20">
            <div class="title pb-20">
                <h2 class="h3 mb-0">Event List</h2>
            </div>
        </div>

        <div class="pd-20 card-box mb-30">
            <div class="calendar-wrap">
                <div id="calendar"></div>
            </div>
            <!-- calendar modal -->
            <div
                id="modal-view-event"
                class="modal modal-top fade calendar-modal"
            >
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <h4 class="h4">
											<span class="event-icon weight-400 mr-3"></span
                                            ><span class="event-title"></span>
                            </h4>
                            <div class="event-body"></div>
                        </div>
                        <div class="modal-footer">
                            <button
                                type="button"
                                class="btn btn-warning"
                                id="btn-del"
                            >
                                Delete
                            </button>
                            <button
                                type="button"
                                class="btn btn-primary"
                                data-dismiss="modal"
                            >
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div
                id="modal-view-event-add"
                class="modal modal-top fade calendar-modal"
            >
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form id="add-event">
                            <div class="modal-body">
                                <h4 class="text-blue h4 mb-10">Add Event Detail</h4>
                                <div class="form-group">
                                    <label>Event name</label>
                                    <input type="text" class="form-control" name="ename" />
                                </div>
                                <div class="form-group">
                                    <label>Event Date</label>
                                    <input
                                        type="text"
                                        class="datetimepicker form-control"
                                        name="edate"
                                    />
                                </div>
                                <div class="form-group">
                                    <label>Event Description</label>
                                    <textarea class="form-control" name="edesc"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Event Color</label>
                                    <select class="form-control" name="ecolor">
                                        <option value="fc-bg-default">fc-bg-default</option>
                                        <option value="fc-bg-blue">fc-bg-blue</option>
                                        <option value="fc-bg-lightgreen">
                                            fc-bg-lightgreen
                                        </option>
                                        <option value="fc-bg-pinkred">fc-bg-pinkred</option>
                                        <option value="fc-bg-deepskyblue">
                                            fc-bg-deepskyblue
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Event Icon</label>
                                    <select class="form-control" name="eicon">
                                        <option value="circle">circle</option>
                                        <option value="cog">cog</option>
                                        <option value="group">group</option>
                                        <option value="suitcase">suitcase</option>
                                        <option value="calendar">calendar</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                                <button
                                    type="button"
                                    class="btn btn-primary"
                                    data-dismiss="modal"
                                >
                                    Close
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('links')
    <link rel="stylesheet" href="{{ url('resources/assets/admin/src/plugins/fullcalendar/fullcalendar.css') }}">
@endsection

@section('scripts')
    <script src="{{ url('resources/assets/admin/src/plugins/fullcalendar/fullcalendar.min.js') }}"></script>
    <script>
        // var myCal = $('#calendar');
        // myCal.fullCalendar();

        jQuery(document).ready(function () {

            jQuery("#add-event").submit(function (e) {
                e.preventDefault();
                var values = {};
                $.each($("#add-event").serializeArray(), function (i, field) {
                    values[field.name] = field.value;
                });
                values['created_by'] = "{{ Auth('admin')->user()->name }}";
                $.ajax({
                    url: "{{ url('/api/event') }}",
                    type:'post',
                    dataType:'json',
                    data:values,
                    success:function(data){
                        jQuery("#modal-view-event-add").modal('hide');
                    }
                })
            });
            getDatas();
        });

        function getDatas(){
            $.ajax({
                url: "{{ url('/api/event') }}",
                type: 'get',
                dataType: 'json',
                success:function(data){
                    console.log(data.data);
                    myCalendar(data.data)
                }
            })
        }

        function myCalendar(evt){

            jQuery("#calendar").fullCalendar({
                themeSystem: "bootstrap4",
                // emphasizes business hours
                businessHours: false,
                defaultView: "month",
                // event dragging & resizing
                editable: true,
                // header
                header: {
                    left: "title",
                    center: "month,agendaWeek,agendaDay",
                    right: "today prev,next",
                },
                events: evt,
                dayClick: function () {
                    jQuery("#modal-view-event-add").modal();
                },
                eventClick: function (event, jsEvent, view) {
                    console.log('events',event.id)
                    jQuery(".event-icon").html("<i class='fa fa-" + event.icon + "'></i>");
                    jQuery(".event-title").html(event.title);
                    jQuery(".event-body").html(event.description);
                    jQuery(".eventUrl").attr("href", event.url);
                    jQuery("#modal-view-event").modal();
                    $('#btn-del').attr({'data':event.id});
                },
            });

        }


        $('#btn-del').on('click',function(){
            var id = $(this).attr('data');
            $.ajax({
                url:"{{ url('/api/event-rem') }}/"+id,
                type:'post',
                success:function(data){
                    console.log(data);
                    jQuery("#modal-view-event").modal('hide');
                    $("#calendar").refetchEvents();
                }
            })
        });

    </script>
@endsection
