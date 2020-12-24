function copyClipboardUrl() {

    /* Get the text field */
    const copyText = document.getElementById("copyLink").select();

    /* Copy the text inside the text field */
    const copied = document.execCommand("copy");

    successMessage(copied);
}

function successMessage(variable) {
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

    if (variable) {
        Toast.fire({
            icon: 'success',
            title: 'URL copied'
        })
    }
}