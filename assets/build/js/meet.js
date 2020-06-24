$(document).ready(function() {

    if($('#dataMeet').length) {
        getDataMeet();
    }

    if($('#dataApproveMeet').length) {
        getDataApproveMeet();
    }

    if($('#formInputMeet').length) {
        formInputMeetValidation();
    }

    if($('#formEditMeet').length) {
        formEditMeetValidation();
    }

    if($('#datemeet').length) {
        setDatePickerMeet();
    }

    if($('#timemeet').length) {
        setDatePickerMeet();
    }


});

function getDataMeet() {
	$('#dataMeet').DataTable();  
}

function getDataApproveMeet() {
	$('#dataApproveMeet').DataTable();  
}

function formInputMeetValidation(){
    $("#formInputMeet").validate({
        rules: {
            kategorinasabah: {
                required: true
            },
            namaprospect: {
                required: true
            },
            jenisnasabah: {
                required: true
            },
            alamat: {
                required: true
            },
            provinsi: {
                required: true
            },
            kota: {
                required: true
            },
            kecamatan: {
                required: true
            },
            kelurahan: {
                required: true
            },
            contactperson: {
                required: true
            },
            contactnumber: {
                required: true
            },
            potensidana: {
                required: true
            },
            produksumberdana: {
                required: true
            },
            meet_ke: {
                required: true
            },
            datemeet: {
                required: true
            },
            timemeet: {
                required: true
            },
            call_ke: {
                required: true
            }
        },
        messages: {
            kategorinasabah: {
                required: 'Kategori Nasabah wajib diisi'
            },
            namaprospect: {
                required: 'Nama prospect wajib diisi'
            },
            jenisnasabah: {
                required: 'Jenis Nasabah wajib diisi'
            },
            alamat: {
                required: 'Alamat wajib diisi'
            },
            provinsi: {
                required: 'Provinsi wajib diisi'
            },
            kota: {
                required: 'Kota wajib diisi'
            },
            kecamatan: {
                required: 'Kecamatan wajib diisi'
            },
            kelurahan: {
                required: 'Kelurahan wajib diisi'
            },
            contactperson: {
                required: 'Contact person wajib diisi'
            },
            contactnumber: {
                required: 'Contact number wajib diisi'
            },
            potensidana: {
                required: 'Potensi dana wajib diisi'
            },
            produksumberdana: {
                required: 'Produk sumber dana wajib diisi'
            },
            meet_ke: {
                required: 'Meet ke- wajib diisi'
            },
            datemeet: {
                required: 'Date Meet wajib diisi'
            },
            timemeet: {
                required: 'Time Meet wajib diisi'
            },
            call_ke: {
                required: 'Call ke- wajib diisi'
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
        submitHandler: function(form) {
            alert("submitted");
            console.log(form);
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
        }
    });
}

function formEditMeetValidation(){
    $("#formEditMeet").validate({
        rules: {
            kategorinasabah: {
                required: true
            },
            namaprospect: {
                required: true
            },
            jenisnasabah: {
                required: true
            },
            alamat: {
                required: true
            },
            provinsi: {
                required: true
            },
            kota: {
                required: true
            },
            kecamatan: {
                required: true
            },
            kelurahan: {
                required: true
            },
            contactperson: {
                required: true
            },
            contactnumber: {
                required: true
            },
            potensidana: {
                required: true
            },
            produksumberdana: {
                required: true
            },
            meet_ke: {
                required: true
            },
            datemeet: {
                required: true
            },
            timemeet: {
                required: true
            },
            call_ke: {
                required: true
            }
        },
        messages: {
            kategorinasabah: {
                required: 'Kategori Nasabah wajib diisi'
            },
            namaprospect: {
                required: 'Nama prospect wajib diisi'
            },
            jenisnasabah: {
                required: 'Jenis Nasabah wajib diisi'
            },
            alamat: {
                required: 'Alamat wajib diisi'
            },
            provinsi: {
                required: 'Provinsi wajib diisi'
            },
            kota: {
                required: 'Kota wajib diisi'
            },
            kecamatan: {
                required: 'Kecamatan wajib diisi'
            },
            kelurahan: {
                required: 'Kelurahan wajib diisi'
            },
            contactperson: {
                required: 'Contact person wajib diisi'
            },
            contactnumber: {
                required: 'Contact number wajib diisi'
            },
            potensidana: {
                required: 'Potensi dana wajib diisi'
            },
            produksumberdana: {
                required: 'Produk sumber dana wajib diisi'
            },
            meet_ke: {
                required: 'Meet ke- wajib diisi'
            },
            datemeet: {
                required: 'Date Meet wajib diisi'
            },
            timemeet: {
                required: 'Time Meet wajib diisi'
            },
            call_ke: {
                required: 'Call ke- wajib diisi'
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
        submitHandler: function(form) {
            alert("submitted");
            console.log(form);
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
        }
    });
}

function attachment(){
    var input = document.getElementById( 'attach' );
    var infoArea = document.getElementById( 'file-name' );
    
    input.addEventListener('change', showFileName );
    
    function showFileName( event ) {
      
      // the change event gives us the input it occurred in 
      var input = event.srcElement;
      
      // the input has an array of files in the `files` property, each one has a name that you can use. We're just using the name here.
      var fileName = input.files[0].name;
      
      // use fileName however fits your app best, i.e. add it into a div
      infoArea.textContent = fileName;
    }

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