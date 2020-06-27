$(document).ready(function() {
    if($('#dataUser').length) {
        getDataUser();
    }
});

function getDataUser() {
	$('#dataUser').DataTable({
        "scrollX":true
    });  
}