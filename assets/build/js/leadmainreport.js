$(document).ready(function() {
    $('#dataLeadMainReport').DataTable( {
        order: [[0, 'asc']],
        rowGroup: {
            startRender: null,
            endRender: function ( rows, group ) {
                
                var totalLead = rows
                    .data()
                    .pluck(5)
                    .reduce( function (a, b) {
                        return a + b*1;
                    }, 0);
 
                var forcastIncome = rows
                    .data()
                    .pluck(7)
                    .reduce( function (a, b) {
                        return a + b*1;
                    }, 0);

                var totalCall = rows
                    .data()
                    .pluck(8)
                    .reduce( function (a, b) {
                        return a + b*1;
                    }, 0);

                var callPercAvg = rows
                    .data()
                    .pluck(9)
                    .reduce( function (a, b) {
                        return a + b.replace(/[^\d]/g, '')*1;
                    }, 0) / rows.count();
                
                var totalMeet = rows
                    .data()
                    .pluck(10)
                    .reduce( function (a, b) {
                        return a + b*1;
                    }, 0);
                    
                var meetPercAvg = rows
                    .data()
                    .pluck(11)
                    .reduce( function (a, b) {
                        return a + b.replace(/[^\d]/g, '')*1;
                    }, 0) / rows.count();
                
                var totalClose = rows
                    .data()
                    .pluck(12)
                    .reduce( function (a, b) {
                        return a + b*1;
                    }, 0);

                var closePercAvg = rows
                    .data()
                    .pluck(13)
                    .reduce( function (a, b) {
                        return a + b.replace(/[^\d]/g, '')*1;
                    }, 0) / rows.count();   
                
                var actualIncome = rows
                    .data()
                    .pluck(14)
                    .reduce( function (a, b) {
                        return a + b*1;
                    }, 0);
                
                var actualPercAvg = rows
                    .data()
                    .pluck(13)
                    .reduce( function (a, b) {
                        return a + b.replace(/[^\d]/g, '')*1;
                    }, 0) / rows.count();   

                forcastIncome = $.fn.dataTable.render.number(',', '.', 0, 'Rp.').display( forcastIncome );
                actualIncome = $.fn.dataTable.render.number(',', '.', 0, 'Rp.').display( actualIncome );
 
                return $('<tr/>')
                    .append( '<td colspan="5">Group for '+group+'</td>' )
                    .append( '<td>'+totalLead.toFixed(0)+'</td>' )
                    .append( '<td/>' )
                    .append( '<td>'+forcastIncome+'</td>' )
                    .append( '<td>'+totalCall+'</td>' )
                    .append( '<td>'+callPercAvg+'%</td>' )
                    .append( '<td>'+totalMeet+'</td>' )
                    .append( '<td>'+meetPercAvg+'%</td>' )
                    .append( '<td>'+totalClose+'</td>' )
                    .append( '<td>'+closePercAvg+'%</td>' )
                    .append( '<td>'+actualIncome+'</td>' )
                    .append( '<td>'+actualPercAvg+'%</td>' );
                    
            },
            dataSrc: 1
        }
    } );
} );