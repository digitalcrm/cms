@extends('layouts.master')

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Booking Edit</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
        <div class="card card-default">
            <form method="post" action="{{ route('bookevents.update', $bookevent->id) }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Event Name</label>
                                <input
                                type="text"
                                class="form-control {{ $errors->first('event_name', 'is-invalid') }}"
                                name="event_name"
                                id="event_name"
                                aria-describedby="helpId"
                                value="{{ old('event_name', $bookevent->event_name) }}"
                                placeholder=""
                                />
                                <small class="text-danger">{{ $errors->first('event_name') }}</small>
                            </div>
                            <div class="form-group">
                                <label for="name">Conslutant</label>
                                <input
                                type="text"
                                class="form-control {{ $errors->first('user_id', 'is-invalid') }}"
                                name="user_id"
                                id="user_id"
                                aria-describedby="helpId"
                                value="{{ auth()->user()->email }}"
                                readonly
                                />
                                <small class="text-danger">{{ $errors->first('user_id') }}</small>
                            </div>
                            <div class="form-group">
                                <label for="booking_service_id">Services</label>
                                <select id="booking_service_id"
                                    class="custom-select {{ $errors->first('booking_service_id', 'is-invalid') }}"
                                    name="booking_service_id">
                                    <option value="0">Select Field</option>
                                    @foreach ($services as $service)
                                    <option
                                    value="{{$service->id}}" {{ old('booking_service_id', $service->id) == $service->id  ? 'selected' : '' }}>
                                        {{$service->service_name}}
                                    </option>
                                    @endforeach
                                </select>
                                <small class="text-danger">{{ $errors->first('booking_service_id') }}</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="duration">Duration</label>
                                <select id="duration"
                                    class="custom-select {{ $errors->first('duration', 'is-invalid') }}"
                                    name="duration">
                                    <option value="0">Select Field</option>
                                    @foreach ($timeDuration as $time)
                                    <option
                                    value="{{$time}}" {{ old('duration', $time) == $time  ? 'selected' : '' }}>
                                        {{ $time }} {{ __('Hours') }}
                                    </option>
                                    @endforeach
                                </select>
                                <small class="text-danger">{{ $errors->first('duration') }}</small>
                            </div>
                            <div class="form-group">
                                <label for="name">Price</label>
                                <input
                                type="text"
                                class="form-control {{ $errors->first('price', 'is-invalid') }}"
                                name="price"
                                id="price"
                                aria-describedby="helpId"
                                value="{{ old('price', $bookevent->price) }}"
                                placeholder=""
                                />
                                <small class="text-danger">{{ $errors->first('price') }}</small>
                            </div>

                            <div class="form-group">
                                <label for="event_description">Description</label>
                                <textarea
                                id="event_description"
                                class="form-control {{ $errors->first('event_description', 'is-invalid')}}"
                                name="event_description"
                                rows="3"
                                >{{ old('event_description', $bookevent->event_description) }}</textarea>
                                <small class="text-danger">{{ $errors->first('event_description') }}</small>
                            </div>

                            <button type="submit" class="btn btn-primary btn-sm float-right">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->

@endsection
