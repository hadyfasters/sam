$(document).ready(function() {
    $('#namaprospect').select2({
        placeHolder:'Nama Prospek'
    });

    if($('#dataClose').length) {
        getDataClose();
    }

    if($('#dataApproveClose').length) {
        getDataApproveClose();
    }

    if($('#formInputClose').length) {
        formInputCloseValidation();
    }

    if($('#dateclose').length) {
        $('#dateclose').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true
        });
    }

    if($('#timeclose').length) {
        $('#timeclose').datetimepicker({
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
                html += '<option value="'+v.meet_id+'">'+v.nama_prospek+'</option>';
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
            $('#call_id').val(result.call_id);
            $('#meet_id').val(result.meet_id);
            $('#alamat').val(result.alamat);
            $('#provinsi').val(result.provinsi_id);
            $('#jenisnasabah').val(result.jenis_nasabah);
            $('#contactperson').val(result.kontak_person);
            $('#contactnumber').val(result.no_kontak);
            $('#potensidana').val(result.potensi_dana);
            $('#produksumberdana').val(result.produk);

            generateCallAttempt(result.lead_id);
            generateMeetAttempt(result.lead_id);
        }
    });
});

function getDataClose() {
	$('#dataClose').DataTable({
        "scrollX":true
    });  
}

function getDataApproveClose() {
	$('#dataApproveClose').DataTable();  
}

function formInputCloseValidation(){
    $("#formInputClose").validate({
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
            accountnumber: {
                required: true
            },
            potensidana: {
                required: true
            },
            realisasidana: {
                required: true
            },
            produksumberdana: {
                required: true
            },
            dateclose: {
                required: true
            },
            timeclose: {
                required: true
            },
            meet_ke: {
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
            accountnumber: {
                required: 'No. rekening wajib diisi'
            },
            potensidana: {
                required: 'Potensi dana wajib diisi'
            },
            realisasidana: {
                required: 'Realisasi dana wajib diisi'
            },
            produksumberdana: {
                required: 'Produk sumber dana wajib diisi'
            },
            dateclose: {
                required: 'Date Close wajib diisi'
            },
            timeclose: {
                required: 'Time Close wajib diisi'
            },
            meet_ke: {
                required: 'Meet ke- wajib diisi'
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

function setDatePickerClose()
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

function generateCallAttempt(id)
{
    $.ajax({
        url : '../meet/getCallAttempt',
        type : 'POST',
        data : {
            'id':id
        },
        success:function(result){
            $('#call_ke').val(parseInt(result));
        }
    });
}

function generateMeetAttempt(id)
{
    $.ajax({
        url : '../meet/getMeetAttempt',
        type : 'POST',
        data : {
            'id':id
        },
        success:function(result){
            $('#meet_ke').val(parseInt(result));
        }
    });
}