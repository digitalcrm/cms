<div class="modal fade" id="cookieModal" tabindex="-1" role="dialog" aria-labelledby="cookieModalLabel" aria-hidden="true">
    <div class="modal-dialog cookie-modal-dialog" role="document">
      <div class="modal-content cookie-modal-content">
        <div class="modal-body">
          <div class="notice d-flex justify-content-between align-items-center">
            <div class="cookie-text">This website uses cookies to personalize content and analyse traffic in order to offer you a better experience.</div>
            <div class="buttons d-flex flex-column flex-lg-row">
              <a href="#" id="acceptModal" class="btn btn-success btn-sm mx-1" data-dismiss="modal">I accept</a>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

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