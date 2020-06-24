$(document).ready(function(){

    if($('#dataMessage').length){
        getDataMessage();
    }

    if($('#formInputMsgContent').length) {
        formInputMsgContentValidation();
    }

    
    if($('#formEditMsgContent').length) {
        formEditMsgContentValidation();
    }

    if($('#msgCategory').val() == ''){
        $('#btnMsgContent').attr('disabled','disabled');
    }

    $('#msgCategory').change(function(){
        if($('#msgCategory').val() == '') {
            $('#btnMsgContent').attr('disabled','disabled');
        } else {
            $('#btnMsgContent').removeAttr('disabled');
        }
    });    
});

$('#deleteBtn').click(function(){
    if(confirm("Are you sure what to delete this data?")){
        alert("Deleted successfully!")
    }
})

function getDataMessage(){
    $('#dataMessage').DataTable();
}

function formInputMsgContentValidation(){
    $("#formInputMsgContent").validate({
        rules: {
            msgContent: {
                required: true
            }
        },
        messages: {
            msgContent: {
                required: 'Message content wajib diisi'
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

        }
    });
}

function formEditMsgContentValidation(){
    $("#formEditMsgContent").validate({
        rules: {
            msgContent: {
                required: true
            }
        },
        messages: {
            msgContent: {
                required: 'Message content wajib diisi'
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

        }
    });
}