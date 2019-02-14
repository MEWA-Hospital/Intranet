@extends('layouts.master')
@section('page-title' ) {{ str_replace('-', ' ', config('app.name')) }} | Upcoming Events  @stop

@section('page-header')  Events @stop
@section('page-header-desc')
    <small> Upcoming events</small> @stop
@section('content')

    <div class="card">
        <div class="card-header bg-white header-elements-inline">
            <h5 class="card-title">Calendar of Events</h5>
        </div>
        <div class="card-body">
            <div class="schedule"></div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="title"></h1>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <div class="modal-body">

                    Venue: <span id="venue"></span>
                    <br/>


                    Start Date: <span id="start_date"></span>
                    <br/>

                    End Date: <span id="end_date"></span>
                    <br/>

                    <hr>

                    <h6 class="font-weight-semibold">Description</h6>

                    <span id="description"></span>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
@stop

@push('js')
    <script src="{{ asset('global_assets/js/plugins/ui/moment/moment.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/ui/fullcalendar/fullcalendar.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('.schedule').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                // defaultDate: '2019-12-18',
                editable: true,
                events: [
                        @foreach($events as $event)
                    {
                        id: '{{ $event->id  }}',
                        title: '{{ $event->name  }}',
                        venue: '{{ $event->venue  }}',
                        description: '{!! $event->body !!}',
                        start: '{{ $event->start_date }}',
                        end: '{{ $event->end_date }}',
                    },
                    @endforeach
                ],

                eventClick: function (calEvent, jsEvent, view) {
                    $('#title').text(calEvent.title);
                    $('#venue').text(calEvent.venue);
                    $('#description').html(calEvent.description);
                    $('#start_date').text(moment(calEvent.start).format('YYYY-MM-DD HH:mm:ss'));
                    $('#end_date').text(moment(calEvent.end).format('YYYY-MM-DD HH:mm:ss'));
                    window.open(window.location.pathname + '/' + calEvent.id + '');
                    // $('#editModal').modal();
                }

            });
        })
    </script>
@endpush
