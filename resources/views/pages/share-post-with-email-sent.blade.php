{{-- Modal Start --}}
<div class="modal fade" id="sendposttofriend" tabindex="-1" aria-labelledby="sendposttofriendLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="sendposttofriendLabel">{{ $post->title }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('article_share.store') }}" method="post">
            @csrf
            <div class="modal-body">
                <input type="hidden" name="currentPageURL" value="{{ url()->current() }}">
                <div class="form-group">
                    <label for="post_sender_email" class="col-form-label">Sender Email:</label>
                    <input type="email"
                    class="form-control required @error('post_sender_email') is-invalid @enderror"
                    id="post_sender_email" name="post_sender_email"
                    value="{{ old('post_sender_email') }}"
                    required>
                    @error('post_sender_email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <label for="post_receiver_email" class="col-form-label">Receiver Email:</label>
                    <input type="email"
                    class="form-control required @error('post_receiver_email') is-invalid @enderror"
                    id="post_receiver_email" name="post_receiver_email"
                    value="{{ old('post_receiver_email') }}"
                    required>
                    @error('post_receiver_email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Send</button>
            </div>
        </form>
      </div>
    </div>
</div>
{{-- Modal End --}}
