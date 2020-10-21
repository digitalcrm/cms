@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 mt-5 mb-3">
            <div class="card">
                <div class="card-header">
                    {{ $bookevent->event_name }}
                </div>
                <div class="card-body">
                    <form action="{{ route('event.store', ['bookservice' =>$bookevent->bookingService->service_name, 'bookevent'=>$bookevent->id]) }}"
                            method="POST"
                            enctype="multipart/form-data" id="form">
                        @csrf
                        <input type="hidden" name="eventId" value="{{ $bookevent->id }}">
                        <div class="form-group">
                            <label>Date Checks:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="far fa-calendar-alt"></i>
                                    </span>
                                </div>
                                <input
                                type="text"
                                class="form-control float-right"
                                id="booking_date"
                                name="booking_date"
                                />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="customer_name" class="col-form-label">Name:</label>
                            <input type="text" class="form-control" id="customer_name" name="customer_name">
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-form-label">Email:</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="mobile_number" class="col-form-label">Mobile:</label>
                            <input type="tel" class="form-control" id="mobile_number" name="mobile_number">
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-form-label">Description:</label>
                            <textarea class="form-control" id="description" name="description"></textarea>
                        </div>

                        {{-- <div class="form-group">
                            <div
                                class="g-recaptcha"
                                data-sitekey="{{ env('CAPTCHA_SITE_KEY') }}"
                                data-error-callback="Fill the recaptcha"
                                data-expired-callback="Your Recaptcha has expired, please verify it again !">
                            </div>
                        </div> --}}

                    <div class="card-footer">
                        <a class="btn btn-info" href="{{ url()->previous() }}">Back</a>
                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                    </div>
                </div>
            </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</div>
    @section('scripts')
    @parent
        <script src="{{ asset('assets/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/moment.min.js') }}"></script>
        <script src="{{ asset('assets/daterangepicker.min.js') }}"></script>

        <script>
        $(function () {
                //Below Started_at
                $("#booking_date").daterangepicker({

                    startDate: moment().startOf('hour'),
                    minYear: 1901,
                    showDropdowns: true,
                    singleDatePicker: true,
                    timePicker: true,
                    timePicker24Hour: false,
                    timePickerIncrement: 05,
                    drops:"down",
                    locale: {
                        format: 'MM/DD/YYYY hh:mm A'
                    }
                });

                //Timepicker
                $("#timepicker").datetimepicker({
                    format: "LT",
                });

        });
        </script>
    @endsection

@endsection


