$(document).ready(function() {
    $('#jabatan').change(function(){
        // alert("A");
        if ($('#jabatan').val() == 'sales') {
            textToRender = '<div class="item form-group">' +
                                '<label class="col-form-label col-md-3 col-sm-3 label-align" for="spv">Dibawah Pimpinan Supervisor 1 (Cabang)</label>' +
                                '<div class="col-md-6 col-sm-6 ">' +
                                    '<select style="border-radius: 6px; color: #495057;" id="spv" name="spv" class="form-control" data-error=".errorTxt6">'+
                                        '<option value="">Pilih Supervisor..</option>' +
                                        '<option value="spv1">Supervisor 1</option>' +
                                        '<option value="spv2">Supervisor 2</option>' +
                                        '<option value="spv3">Supervisor 3</option>' +
                                        '<option value="spv3">Supervisor 4</option>' +
                                    '</select>' +
                                    '<div style="color: red" class="errorTxt6"></div>' +
                                '</div>' +
                            '</div>';
            $('#salesSelected').html(textToRender);
        } else {
            $('#salesSelected').html('');
        }
    });    

    if($('#dataUser').length) {
        getDataUser();
    }

    if($('#formInputUser').length) {
        formInputUserValidation();
    }

    if($('#formEditUser').length) {
        formEditUserValidation();
    }
});

$('#deleteBtn').click(function(){
    if(confirm("Are you sure what to delete this data?")){
        alert("Deleted successfully!")
    }
})

function getDataUser() {
	$('#dataUser').DataTable({
        "scrollX":true
    });  
}

function formInputUserValidation(){
    $('#formInputUser').validate({
        rules: {
            npp: {
                required: true
            },
            nama: {
                required: true
            },
            wilayah: {
                required: true
            },
            cabang: {
                required: true
            },
            jabatan: {
                required: true
            },
            spv: {
                required: true
            },
        },
        messages: {
            npp: {
                required: 'NPP wajib diisi'
            },
            nama: {
                required: 'Nama wajib diisi'
            },
            wilayah: {
                required: 'Wilayah wajib diisi'
            },
            cabang: {
                required: 'Cabang wajib diisi'
            },
            jabatan: {
                required: 'Jabatan wajib diisi'
            },
            spv: {
                required: 'SPV wajib diisi'
            },
            
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

function formEditUserValidation(){
    $('#formEditUser').validate({
        rules: {
            npp: {
                required: true
            },
            nama: {
                required: true
            },
            wilayah: {
                required: true
            },
            cabang: {
                required: true
            },
            jabatan: {
                required: true
            },
            spv: {
                required: true
            },
        },
        messages: {
            npp: {
                required: 'NPP wajib diisi'
            },
            nama: {
                required: 'Nama wajib diisi'
            },
            wilayah: {
                required: 'Wilayah wajib diisi'
            },
            cabang: {
                required: 'Cabang wajib diisi'
            },
            jabatan: {
                required: 'Jabatan wajib diisi'
            },
            spv: {
                required: 'SPV wajib diisi'
            },
            
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
        // }
    });
}

function setDatePickerMeet()
{
	$('.datepicker').datepicker({
        format: 'dd/mm/yyyy'
        // showDropdowns: true
    }, function(start, end, label) {
        console.log(start);
        // alert(start.format('DD/MM/YYYY'));
    });

    $('.timepicker').datetimepicker({
        format: 'HH:mm'
    });
}