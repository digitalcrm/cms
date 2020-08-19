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

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-left',
            showConfirmButton: false,
            timer: 3000
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
        }
    });
</script>
