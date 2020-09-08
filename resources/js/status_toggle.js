$(function() {
    $('.toggle-class').change(function() {
        var userStatus = $(this).prop('checked') == true ? 1 : 0;
        var userId = $(this).data('id');
        //    console.log(userStatus);
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/userStatus',
            data: {'userStatus': userStatus, 'userId': userId},
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
})
