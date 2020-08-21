{{-- @if ($errors->any())
@foreach ($errors->all() as $error)
<script>
    $(function(){
        var error = "{{ $error }}";
        console.log(error);
        const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 300000
        });
        Toast.fire({
            icon: 'success',
            title: error
        })

    });
</script>
@endforeach
@endif --}}

<script>
    $(function(){
        var message = "{{session('message')}}";
        var information = "{{session('info')}}";
        var errors = "{{ $errors->any() }}";
        var viewerror = "{{ session('error') }}";

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
            onOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });
        if (message) {
            Toast.fire({
                icon: 'success',
                title: message
            })
        } else if(errors) {
                Toast.fire({
                icon: 'error',
                title: 'Whoops 😟 something went wrong!'
            })
        } else if(information) {
            Toast.fire({
                icon: 'info',
                title: information
            })
        } else if(viewerror) {
            Toast.fire({
                icon: 'error',
                title: viewerror
            })

        }
    });
</script>
