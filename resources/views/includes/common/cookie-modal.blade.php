@php
try {
  $firstRowValue = App\Cookie::isActive()->firstOrFail();
} catch (\Throwable $th) {
  $firstRowValue = false;
}
@endphp

@if($firstRowValue)
<div class="modal fade" id="cookieModal" tabindex="-1" role="dialog" aria-labelledby="cookieModalLabel" aria-hidden="true">
    <div class="modal-dialog cookie-modal-dialog" role="document">
      <div class="modal-content cookie-modal-content">
        <div class="modal-body">
          <div class="notice d-flex justify-content-between align-items-center">
            <div class="cookie-text">{{ $firstRowValue->message_text ?? ''}}</div>
            <div class="buttons d-flex flex-column flex-lg-row">
              <a href="#" id="acceptModal" class="btn btn-success btn-sm mx-1" data-dismiss="modal">{{ $firstRowValue->button_text }}</a>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endif

@push('scripts')
<script src="{{ asset('js/cookie-content.js') }}"></script>
{{-- <script>
    var acceptCookie = document.getElementById('acceptModal');
    const getCookieValueFromStorage = localStorage.getItem('cookieAccepted');
    console.log(getCookieValueFromStorage);
    function toggle() {
        if(acceptCookie.click) {
            localStorage.setItem('cookieAccepted', 1);
        } else {
            localStorage.setItem('cookieAccepted', 0);
        }
    }
    $(document).ready(function() {
        if (getCookieValueFromStorage == 0 || getCookieValueFromStorage == null) {
            $('#cookieModal').modal('show');
        }
    });

    acceptCookie.addEventListener('click', toggle);
</script> --}}
@endpush