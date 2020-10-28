$(function() {
    $('.toggle-class').change(function() {
        var eventStatus = $(this).prop('checked') == true ? 1 : 0;
        var eventId = $(this).data('id');
        //    console.log(eventStatus);
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/eventStatus',
            data: {'eventStatus': eventStatus, 'eventId': eventId},
            success: function(data){
                // console.log(data.success)
                //success message toaster
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
                Toast.fire({
                    icon: 'success',
                    title: data.success
                })
            }
        });
    })
});
