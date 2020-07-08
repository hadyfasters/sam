$(document).ready(function () {

    if($('#rentangwaktu').length){
        renderOnDemand();
    }

    if($('#dataActivityReport').length){
        setDataActivityReport();
    }

    if($('#dataPerformanceReport').length){
        setDataPerformanceReport();
    }
});

function renderOnDemand(){
	$('#rentangwaktu').change(function(){
	    if ($('#rentangwaktu').val() == 3) {
	        textToRender = '<div class="item form-group">' +
	                            '<label class="col-form-label col-md-3 col-sm-3 label-align" for="rentangwaktu">Pilih Tanggal</label>' +
	                            '<div class="col-md-9 col-sm-9">' +
	                                '<input class="form-control" id="date1" name="date1" style="border-radius: 6px;" type="text" />'+
	                            '</div>' +
	                        '</div>';
	        $('#onDemandSelected').html(textToRender);
	    } else {
	        $('#onDemandSelected').html('');
	    }          
	});

	$('#rentangwaktu').click(function(){
	    setDateRangePicker();
	});
}

function setDataActivityReport(){
    $('#dataActivityReport').dataTable({
    	"scrollX":true
    });
}

function setDataPerformanceReport(){
    $('#dataPerformanceReport').dataTable();
}

function setDatePicker(){
	$('#date1').datepicker({
		format: 'dd/mm/yyyy'
	});
	$('#date1').datepicker('show');
}

function setDateRangePicker(){
	$('#date1').daterangepicker({
        locale: {
            format: 'DD/MM/YYYY'
        },
        // showDropdowns: true
    }, function(start, end, label) {
        console.log(start);
        // alert(start.format('DD/MM/YYYY'));
    });
}
