$(document).ready(function() {
    if($('#dataLead').length) {
        getDataLead();
    }

    if($('#dataApproveLead').length) {
        getDataApproveLead();
    }

    if($('#formInputLead').length) {
        formInputLeadValidation();
    }

    if($('#formEditLead').length) {
        formEditLeadValidation();
    }
});

$('#provinsi').on('change',function(){
    var provinsi = $(this).val();
    $.ajax({
        url : './getRegency',
        type : 'POST',
        data : {
            'province':provinsi
        },
        success:function(result){
            var html = '';
            $.each(result,function(i,v){
                html += '<option value="'+v.id+'">'+v.name+'</option>';
            });
            $('#kota')
                .find('option:not(:first)')
                .remove()
                .end()
                .append(html);
        }
    })
});

$('#kota').on('change',function(){
    var regency = $(this).val();
    $.ajax({
        url : './getDistrict',
        type : 'POST',
        data : {
            'regency':regency
        },
        success:function(result){
            var html = '';
            $.each(result,function(i,v){
                html += '<option value="'+v.id+'">'+v.name+'</option>';
            });
            $('#kecamatan')
                .find('option:not(:first)')
                .remove()
                .end()
                .append(html);
        }
    })
});

$('#kecamatan').on('change',function(){
    var district = $(this).val();
    $.ajax({
        url : './getVillage',
        type : 'POST',
        data : {
            'district':district
        },
        success:function(result){
            var html = '';
            $.each(result,function(i,v){
                html += '<option value="'+v.id+'">'+v.name+'</option>';
            });
            $('#kelurahan')
                .find('option:not(:first)')
                .remove()
                .end()
                .append(html);
        }
    })
});

function getDataLead() {
	$('#dataLead').DataTable({searching: false});  
}

function getDataApproveLead() {
	$('#dataApproveLead').DataTable();  
}

function formInputLeadValidation(){
    $("#formInputLead").validate({
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
        //     var object = {};
        //     var formData = $('form#formInputLead').serializeArray();
        //     formData.forEach((value, key) => {
        //         // Reflect.has in favor of: object.hasOwnProperty(key)
        //         if(!Reflect.has(object, key)){
        //             object[key] = value;
        //             return;
        //         }
        //         if(!Array.isArray(object[key])){
        //             object[key] = [object[key]];    
        //         }
        //         object[key].push(value);
        //     });
        //     var json = JSON.stringify(object);
        //     console.log(json);
            // $.ajax({
            //     url : './saveLead',
            //     type: 'POST',
            //     data: JSON.stringify(formdata),
            //     contentType: 'application/json',
            //     success: function(response) {
            //         console.log(response);
            //     }
            // });
        // }
    });
}

function formEditLeadValidation(){
    $('#formEditLead').validate({
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
            datelead: {
                required: true
            },
            timelead: {
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
            datelead: {
                required: 'Date lead wajib diisi'
            },
            timelead: {
                required: 'Time lead sumber dana wajib diisi'
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

function resetForm()
{
    alert("Masuk nih 1");
    $('select#produksumberdana').prop('selectedIndex', -1);
    $('input#namaprospek').val(" ");
    $('select#kategorinasabah').prop('selectedIndex', -1);
    $('select#jenisnasabah').prop('selectedIndex', -1);
}