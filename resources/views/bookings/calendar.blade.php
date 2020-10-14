@extends('layouts.master')

@section('content')

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
          <div class="col">
            <div id='calendar'></div>
          </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->

  @section('scripts')
  @parent
  <script src="{{ asset('ajax/js/fullcalendar.js') }}"></script>
  @endsection

@endsection
