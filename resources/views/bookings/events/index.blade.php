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
                    <a href="{{ route('bookevents.create') }}" class="btn btn-primary btn-sm float-right">Add New</a>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                          <thead>
                              <tr>
                                  <th>Name</th>
                                  <th>Consultant</th>
                                  <th>Services</th>
                                  <th>Customer Booked</th>
                                  <th>Event Session</th>
                                  <th>Activity Type</th>
                                  <th>Price</th>
                                  <th>Active</th>
                                  <th>Created</th>
                                  <th>Action</th>
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
                                    <a href="{{ route('bookevents.show', $event->id) }}">
                                        {{  $event->bookingcustomers->count() }}
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
                                  <td>{{ $event->created_at->toDateString() ?? ''}}</td>
                                  <td>
                                      <a href="{{ route('bookevents.edit', $event->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                      <a
                                        class="btn btn-danger btn-sm"
                                        href=""
                                        onclick="event.preventDefault();
                                        if(confirm('Are you sure!')){
                                            $('#form-delete-{{$event->id}}').submit();
                                        }
                                        ">Delete</a>

                                    <form id="form-delete-{{ $event->id }}"
                                        action="{{ route('bookevents.destroy', $event->id) }}"
                                        method="post" style="display: none">
                                    @csrf
                                    @method('delete')
                                    </form>
                                  </td>
                              </tr>
                              @empty
                              <tr>
                                  <td class="text-center" colspan="9">
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
