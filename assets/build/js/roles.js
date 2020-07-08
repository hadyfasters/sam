$(document).ready(function(){
    if($('#dataRoles').length) {
        getDataRoles();
    }
});

function getDataRoles() {
	$('#dataRoles').DataTable({
        "scrollX":true
    });  
}