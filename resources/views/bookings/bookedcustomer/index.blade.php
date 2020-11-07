@extends('layouts.master')

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Confirmed Customers</h1>
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
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Customer Name</th>
                                <th>Event Joined</th>
                                <th>Consultant</th>
                                <th>Booking Scheduled</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($customers as $bookedCustomer)
                            <tr>
                                <td>
                                    {{ $bookedCustomer->customer_name }}
                                </td>
                                <td>
                                    {{ $bookedCustomer->bookingEvent->event_name }}
                                </td>
                                <td>
                                    {{ $bookedCustomer->user->name }}
                                </td>
                                <td>
                                    {{ $bookedCustomer->start_from }}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center" colspan="10">
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


    @endsection
@endsection
