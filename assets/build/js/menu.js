$(document).ready(function() {
    if($('#dataMenu').length) {
        getDataMenu();
    }

    if($('#formInputMenu').length) {
        formInputMenuValidation();
    }

    if($('#formEditMenu').length) {
        formEditMenuValidation();
    }   

    $('#yaSubmenu').prop('checked',true);    
    $('#active').prop('checked',true);
});

$('#statusset input[type=radio]').change(function(){
    alert ( $(this).val() ) 
});

$('#submenuset input[type=radio]').change(function(){
    // alert ( $(this).val() );
    if($(this).val() == 'tidak') {
        $('#parent').prop('disabled',true);
    } else if ($(this).val() == 'ya') {
        $('#parent').prop('disabled',false);
    }
});

$(function() {
    $('button#select_all').on('click',function(){
        var len = $(':checkbox:not(:checked)').length;
        $(':checkbox').prop('checked',len>0);

        countUnchecked();
    });

    $(".sub").on("click",function() {
        var parent = $(this).parent().parent().find('input.parent');
        var sub = $(this).parent().parent().find(".sub:checked").length;

        parent.prop("checked",sub>0);

        countUnchecked();
    });
    $(".parent").on("click",function() {
       $(this).parent().parent().find(".sub").prop("checked",this.checked);

        countUnchecked();
    });
});

$('#deleteBtn').click(function(){
    if(confirm("Are you sure what to delete this data?")){
        alert("Deleted successfully!")
    }
})

$('#roles').on('change',function(){
    var id = $(this).val();
    $('input[name="roles"]').val(id);

    checkPermission(id);
});

function getDataMenu() {
	$('#dataMenu').DataTable({
        "scrollX":true
    });  
}

function countUnchecked()
{
    var id = $('input[name="roles"]').val();
    var len = $(':checkbox:not(:checked)').length;
    var checked = $(':checkbox:checked').length;

    if(len == 0){
        $('button#select_all').html('Unselect All')
    }else{
        $('button#select_all').html('Select All')
    }

    if(checked>0 && id!=''){
        $('#btn_save').prop('disabled',false);
    }else{
        $('#btn_save').prop('disabled',true);
    }
}

function checkPermission(user_id)
{
    $('input:checkbox').removeAttr('checked');
    $('#btn_save').prop('disabled',false);
    $.ajax({
        url : './menu_permission/getUserPermission',
        type : 'POST',
        data : {
            'user_id':user_id
        },
        success:function(result){
            $.each(result,function(i,v){
                $('#'+v.id_menu).prop("checked",true);
            });

            countUnchecked();
        }
    });
}

function formInputMenuValidation(){
    $('#formInputMenu').validate({
        rules: {
            namamenu: {
                required: true
            },
            parent: {
                required: true
            },
            sequence: {
                required: true
            },
            link: {
                required: true
            },
            ikon: {
                required: true
            },
        },
        messages: {
            namamenu: {
                required: 'Menu wajib diisi'
            },
            parent: {
                required: 'Parent wajib diisi'
            },
            sequence: {
                required: 'Sequence wajib diisi'
            },
            link: {
                required: 'Link wajib diisi'
            },
            ikon: {
                required: 'Ikon wajib diisi'
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

function formEditMenuValidation(){
    $('#formEditMenu').validate({
        rules: {
            namamenu: {
                required: true
            },
            parent: {
                required: true
            },
            sequence: {
                required: true
            },
            link: {
                required: true
            },
            ikon: {
                required: true
            },
        },
        messages: {
            namamenu: {
                required: 'Menu wajib diisi'
            },
            parent: {
                required: 'Parent wajib diisi'
            },
            sequence: {
                required: 'Sequence wajib diisi'
            },
            link: {
                required: 'Link wajib diisi'
            },
            ikon: {
                required: 'Ikon wajib diisi'
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
        submitHandler: function(form) {
            alert("submitted");
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