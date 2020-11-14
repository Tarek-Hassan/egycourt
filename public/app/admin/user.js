$(function(){
    var form = $('#createForm');
    var roles = $("#role");
    var acceptWarning = false;
    form.on('submit',function(e){

        if(!roles.val() && !acceptWarning){
            swal({
                title: alertTitle,
                text: alertCreateUser,
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: createUser,
                cancelButtonText: cancel,
                padding: '2em'
              }).then(function(result) {
                if (result.value) {
                    acceptWarning = true;
                    form.submit();
                }
              });
              return false;
        }

        return true;
    });
});
