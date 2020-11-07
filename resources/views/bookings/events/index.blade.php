@extends('layouts.master')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Book Events</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-8">
                                <a
                                href="{{ route('bookevents.index') }}"
                                class="btn btn-sm btn-outline-secondary mr-1 {{ request('events') == '' ? 'active' : '' }}">
                                All
                            </a>
                            {{-- <a
                                href="{{ route('bookevents.index',['events'=>'today']) }}"
                                class="btn btn-sm btn-outline-secondary mr-1 {{ request('events') == 'today' ? 'active' : '' }}">
                                Today
                            </a> --}}
                            <a
                            href="{{ route('bookevents.index',['events'=>'upcoming']) }}"
                            class="btn btn-sm btn-outline-secondary mr-1 {{ request('events') == 'upcoming' ? 'active' : '' }}">
                            Upcoming
                        </a>
                        <a
                        href="{{ route('bookevents.index',['events'=>'completed']) }}"
                        class="btn btn-sm btn-outline-secondary mr-1 {{ request('events') == 'completed' ? 'active' : '' }}">
                        Completed
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="{{ route('bookevents.create') }}" class="btn btn-primary btn-sm float-right">Add New</a>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Consultant</th>
                        <th>Services</th>
                        <th>Customer Registered</th>
                        <th>Event Session</th>
                        <th>Activity Type</th>
                        <th>Price</th>
                        <th>Active</th>
                        <th>Event Start</th>
                        <th>Event End</th>
                        <th>Action</th>
                        <th>Event Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bookevents as $event)
                    <tr>
                        <td>
                            <a href="{{ route('bookevents.show', $event->id) }}">
                                {{ $event->event_name ?? '' }}
                            </a>
                        </td>
                        <td>{{ $event->user->name ?? '' }}</td>
                        <td>{{ $event->bookingService->service_name ?? '' }}</td>

                        <td>
                            <a href="{{ ($event->bookingCustomers()->count() > 0) ? route('bookevents.show', $event->id) : '#' }}">
                                {{  $event->bookingCustomers()->count() }}
                            </a>
                        </td>


                        <td>{{ $event->duration ?? '' }}</td>

                        <td>{{ $event->bookingActivity->title ?? '' }}</td>

                        <td>{{ $event->price ?? '' }}</td>
                        <td>
                            <input data-id="{{ $event->id }}" class="toggle-class" type="checkbox"
                            data-onstyle="info" data-style="ios" data-offstyle="warning"
                            data-toggle="toggle" data-on="Active" data-size="small" data-off="Block"
                            {{ $event->isActive ? 'checked' : '' }}>
                        </td>

                        <td>
                            {{-- @dump($event->event_start) --}}
                            {{ $event->event_start->isoFormat('Do MMMM YYYY hh:mm a') ?? ''}}
                        </td>

                        <td>
                            {{ $event->event_end->isoFormat('Do MMMM YYYY hh:mm a') ?? ''}}
                        </td>

                        <td>
                            <div class="btn-group">
                                <button
                                type="button"
                                class="btn btn-outline-primary dropdown-toggle"
                                data-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false">
                            </button>
                            <div class="dropdown-menu">
                                <small>
                                    <a class="dropdown-item" href="{{ route('bookevents.edit', $event->id) }}" class="btn btn-primary btn-sm">
                                        Edit
                                    </a>
                                </small>
                                <small>
                                    <a
                                    class="dropdown-item"
                                    href=""
                                    onclick="event.preventDefault();
                                    if(confirm('Are you sure!')){
                                        $('#form-delete-{{$event->id}}').submit();
                                    }
                                    ">
                                    Delete
                                </a>
                                <form id="form-delete-{{ $event->id }}"
                                    action="{{ route('bookevents.destroy', $event->id) }}"
                                    method="post" style="display: none">
                                    @csrf
                                    @method('delete')
                                </form>
                            </small>
                        </div>
                    </div>
                </td>

                <td>{{ $event->eventStatus() }}</td>

            </tr>
            @empty
            <tr>
                <td class="text-center" colspan="15">
                    No data available in table
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
<!-- /.card-body -->
</div>
<!-- /.card -->
</div>
</div>
<!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@section('scripts')
@parent
<script src="{{ asset('ajax/js/bookingevent_toggle.js') }}"></script>


@endsection
@endsection
