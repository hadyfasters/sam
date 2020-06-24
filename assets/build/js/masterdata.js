$(document).ready(function () {
    if($('#daterange1').length) {
        setDateRangePickerMasterData();
    }

    if($('#dataUserHistory').length) {
        renderDataUserHistory();
    }

    if($('#dataActivityLog').length) {
        renderDataActivityLog();
    }
});

function setDateRangePickerMasterData()
{
	$('#daterange1').daterangepicker({
        locale: {
            format: 'DD/MM/YYYY'
        },
        // showDropdowns: true
    }, function(start, end, label) {
        console.log(start);
        // alert(start.format('DD/MM/YYYY'));
    });
}

function renderDataUserHistory()
{
    $('#dataUserHistory').dataTable();
}

function renderDataActivityLog()
{
    $('#dataActivityLog').dataTable();
}


