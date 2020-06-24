$(document).ready(function() {
    if($('#dataUserPosition').length) {
        getDataUserPosition();
    }

    if($('#formInputUserPosition').length) {
        formInputUserValidation();
    }

});

$('#deleteBtn').click(function(){
    if(confirm("Are you sure what to delete this data?")){
        alert("Deleted successfully!")
    }
})

function getDataUserPosition() {
	$('#dataUserPosition').DataTable();  
}

function formInputUserValidation(){
    $("#formInputUserPosition").validate({
        rules: {
            userposition: {
                required: true
            },
            password: {
                required: true
            }
        },
        messages: {
            userposition: {
                required: 'User wajib diisi'
            },
            password: {
                required: 'Password wajib diisi'
            }
        },
        errorElement: 'div',
        errorPlacement: function (error, element) {
            let placement = $(element).data('error');
            if (placement) {
                $(placement).append(error)
            } else {
                error.insertAfter(element);
            }
        },
        // submitHandler: function(form) {
        //     alert("submitted");
        //     console.log(form);
        //     $.ajax({
        //         url : '/' + base_url[1] + '/' + base_url[2] + '/meeting/save',
        //         type: 'POST',
        //         data: new FormData(form),
        //         mimeType: "multipart/form-data",
        //         contentType: false,
        //         cache: false,
        //         processData: false,
        //         success: function(response) {
        //             data = JSON.parse(response);
                    
        //             if (data.status) {
        //                 swal("Sukses!", data.message, "success");
        //                 table.destroy();
        //                 table = getDatatableData();
        //             } else {
        //                 swal({
        //                     title: data.errorDescriptions,
        //                     icon: 'error'
        //                 });
        //             }
    
        //             $('#modalAdd').modal('close');
        //         }
        //     });
        // }
    });
}
