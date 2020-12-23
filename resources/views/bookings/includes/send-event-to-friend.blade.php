<!-- Modal -->
<div class="modal fade" id="sendLinkModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{ $bookevent->event_name }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('booking_shares.store') }}" method="post" id="form1">
              @csrf
              <input type="hidden" name="eventId" value="{{ $bookevent->id }}">
              <input type="hidden" name="eventURL" value="{{ Request::url() }}">
            <div class="form-group">
                <label for="sender_name" class="col-form-label">Your Name:</label>
                <input type="text"
                class="form-control required @error('sender_name') is-invalid @enderror"
                id="sender_name" name="sender_name"
                value="{{ old('sender_name') }}"
                required>
                @error('sender_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="sender_email" class="col-form-label">Your Email:</label>
                <input type="email"
                class="form-control required @error('sender_email') is-invalid @enderror"
                id="sender_email" name="sender_email"
                value="{{ old('sender_email') }}"
                required>
                @error('sender_email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="receiver_name" class="col-form-label">Receiver Name:</label>
                <input type="text"
                class="form-control required @error('receiver_name') is-invalid @enderror"
                id="receiver_name" name="receiver_name"
                value="{{ old('receiver_name') }}"
                required>
                @error('receiver_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="receiver_email" class="col-form-label">Receiver Email:</label>
                <input type="text"
                class="form-control required @error('receiver_email') is-invalid @enderror"
                id="receiver_email" name="receiver_email"
                value="{{ old('receiver_email') }}"
                required>
                @error('receiver_email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="message" class="col-form-label">Message:</label>
                <textarea
                class="form-control required"
                id="message"
                name="message"
                >{{ old('message') }}</textarea>
            </div>

            <div class="form-group">
                <div
                name="cap"
                id="cap"
                class="g-recaptcha"
                data-sitekey="{{ config('services.recaptcha.sitekey') }}"
                data-error-callback="Fill the recaptcha"
                data-expired-callback="Your Recaptcha has expired, please verify it again !">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
      </div>
    </div>
  </div>
