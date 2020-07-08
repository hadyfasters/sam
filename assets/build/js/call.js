$(document).ready(function() {
    $('#namaprospect').select2({
        placeHolder:'Nama Prospek'
    });

    if($('#dataCall').length) {
        getDataCall();
    }

    if($('#dataApproveCall').length) {
        getDataApproveCall();
    }

    if($('#formInputCall').length) {
        formInputCallValidation();
    }
    
    if($('#formEditCall').length) {
        formEditCallValidation();
    }

    if($('#datecall').length) {
        $('#datecall').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true
        });
    }

    if($('#timecall').length) {
        $('#timecall').datetimepicker({
            format: 'HH:mm'
        });
    }
});

$('#kategorinasabah').on('change',function(){
    var kategorinasabah = $(this).val();

    $.ajax({
        url : './getNamaProspek',
        type : 'POST',
        data : {
            'kategori_nasabah':kategorinasabah
        },
        success:function(result){
            var html = '';
            $.each(result,function(i,v){
                html += '<option value="'+v.lead_id+'">'+v.nama_prospek+'</option>';
            });
            $('#namaprospect')
                .find('option:not(:first)')
                .remove()
                .end()
                .append(html);
        }
    });
});

$('#namaprospect').on('change',function(){
    var prospect = $(this).val();

    $.ajax({
        url : './getDetailProspek',
        type : 'POST',
        data : {
            'id':prospect
        },
        success:function(result){
            generateRegency(result.provinsi_id,result.kota_kabupaten_id);
            generateDistrict(result.kota_kabupaten_id,result.kecamatan_id);
            generateVillage(result.kecamatan_id,result.kelurahan_id);
            $('#lead_id').val(result.lead_id);
            $('#alamat').val(result.alamat);
            $('#provinsi').val(result.provinsi_id);
            $('#jenisnasabah').val(result.jenis_nasabah);
            $('#contactperson').val(result.kontak_person);
            $('#contactnumber').val(result.no_kontak);
            $('#potensidana').val(result.potensi_dana);
            $('#produksumberdana').val(result.produk);

            generateAttempt(result.lead_id);
        }
    });
});

function getDataCall() {
	$('#dataCall').DataTable({
        "scrollX":true
    });  
}

function getDataApproveCall() {
	$('#dataApproveCall').DataTable();  
}
function formInputCallValidation(){
    $('#formInputCall').validate({
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
            call_ke: {
                required: true
            },
            datecall: {
                required: true
            },
            timecall: {
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
            call_ke: {
                required: 'Call-ke wajib diisi'
            },
            datecall: {
                required: 'Date Call wajib diisi'
            },
            timecall: {
                required: 'Time Call wajib diisi'
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
            // alert("submitted");
            // console.log(form);
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
function formEditCallValidation(){
    $('#formEditCall').validate({
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
            call_ke: {
                required: true
            },
            datecall: {
                required: true
            },
            timecall: {
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
            call_ke: {
                required: 'Call-ke wajib diisi'
            },
            datecall: {
                required: 'Date Call wajib diisi'
            },
            timecall: {
                required: 'Time Call wajib diisi'
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

function setDatePickerCall()
{
	$('#datecall').datepicker({
        format: 'dd/mm/yyyy',
        autoclose: true
        // showDropdowns: true
    });

    $('#timecall').datetimepicker({
        format: 'HH:mm',
        autoclose: true
    });
}

function generateRegency(id,selectedId)
{
    $.ajax({
        url : '../lead/getRegency',
        type : 'POST',
        data : {
            'province':id
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
                .append(html)
                .val(selectedId);
        }
    });
}

function generateDistrict(id,selectedId)
{
    $.ajax({
        url : '../lead/getDistrict',
        type : 'POST',
        data : {
            'regency':id
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
                .append(html)
                .val(selectedId);
        }
    });
}

function generateVillage(id,selectedId)
{
    $.ajax({
        url : '../lead/getVillage',
        type : 'POST',
        data : {
            'district':id
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
                .append(html)
                .val(selectedId);
        }
    });
}

function generateAttempt(id)
{
    $.ajax({
        url : './getAttempt',
        type : 'POST',
        data : {
            'id':id
        },
        success:function(result){
            $('#call_ke').val(parseInt(result)+1);
        }
    });
}