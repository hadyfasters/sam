$(document).ready(function() {

    if($('#dataOutletWilayah').length) {
        getDataOutletWilayah();
    }

    if($('#dataOutletCabang').length) {
        getDataOutletCabang();
    }

    if($('#formInputOutletWilayah').length) {
        formInputOutletWilayahValidation();
    }

    if($('#formInputOutletCabang').length) {
        formInputOutletCabangValidation();
    }

    // if($('.datepicker').length) {
    //     setDatePickerOutlet();
    // }
    if($('#startdate').length) {
        $('#startdate').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true
        });
    }
    if($('#enddate').length) {
        $('#enddate').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true,
            setDate: $('#startdate').val()
        });
    }
});

$('#deleteBtn').click(function(){
    if(confirm("Are you sure what to delete this data?")){
        alert("Deleted successfully!")
    }
})

function getDataOutletWilayah(){
    $('#dataOutletWilayah').DataTable({
        "scrollX":true
    });  
}

function getDataOutletCabang(){
    $('#dataOutletCabang').DataTable({
        "scrollX":true
    });  
}

function formInputOutletWilayahValidation(){
    $('#formInputOutletWilayah').validate({
        rules: {
            kodewilayah: {
                required: true
            },
            namawilayah: {
                required: true
            },
            startdate: {
                required: true
            },
            enddate: {
                required: true
            }
        },
        messages: {
            kodewilayah: {
                required: 'Kode wilayah wajib diisi'
            },
            namawilayah: {
                required: 'Nama wilayah wajib diisi'
            },
            startdate: {
                required: 'Start date wajib diisi'
            },
            enddate: {
                required: 'End date wajib diisi'
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

function formInputOutletCabangValidation(){
    $('#formInputOutletCabang').validate({
        rules: {
            kodecabang: {
                required: true
            },
            namacabang: {
                required: true
            },
            wilayah: {
                required: true
            },
            startdate: {
                required: true
            },
            enddate: {
                required: true
            }
        },
        messages: {
            kodecabang: {
                required: 'Kode wilayah wajib diisi'
            },
            namacabang: {
                required: 'Nama wilayah wajib diisi'
            },
            wilayah: {
                required: 'Wilayah wajib diisi'
            },
            startdate: {
                required: 'Start date wajib diisi'
            },
            enddate: {
                required: 'End date wajib diisi'
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

function setDatePickerOutlet()
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