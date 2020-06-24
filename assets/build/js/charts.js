
function init_charts() {

    // console.log('run_charts  typeof [' + typeof (Chart) + ']');

    if (typeof (Chart) === 'undefined') { return; }

    // Chart.defaults.global.legend.display = {
    //     enabled: false
    // };

    if ($('#nominalClose').length) {

        var ctx = document.getElementById("nominalClose");
        var mybarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [{
                    label: '# of Votes',
                    backgroundColor: "#26B99A",
                    data: [21, 30, 10, 28, 10, 30, 15]
                }, {
                    label: '# of Votes',
                    backgroundColor: "#03586A",
                    data: [11, 26, 25, 38, 22, 14, 12]
                }]
            },

            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                legend: {
                    display: true,
                    position: 'bottom',
                    align: 'center'
                }
            }
        });
    }

    if ($('#komposPotensiDana').length) {

        var ctx = document.getElementById("komposPotensiDana");
        var data = {
            labels: [
                // "Dark Grey",
                "Purple Color",
                "Gray Color",
                "Green Color",
                "Blue Color"
            ],
            datasets: [{
                data: [50, 140, 180, 100],
                backgroundColor: [
                    // "#455C73",
                    "#9B59B6",
                    "#BDC3C7",
                    "#26B99A",
                    "#3498DB"
                ],
                hoverBackgroundColor: [
                    // "#34495E",
                    "#B370CF",
                    "#CFD4D8",
                    "#36CAAB",
                    "#49A9EA"
                ]

            }],
        };

        var canvasDoughnut = new Chart(ctx, {
            type: 'doughnut',
            tooltipFillColor: "rgba(51, 51, 51, 0.55)",
            data: data,
            options: {
                legend: {
                    display: true,
                    position: 'bottom',
                    align: 'center'
                }
            }
        });
    }

    if ($('#komposRealisasiDana').length) {

        var ctx = document.getElementById("komposRealisasiDana");
        var data = {
            labels: [
                // "Dark Grey",
                "Purple Color",
                "Gray Color",
                "Green Color",
                "Blue Color"
            ],
            datasets: [{
                data: [50, 140, 180, 100],
                backgroundColor: [
                    // "#455C73",
                    "#9B59B6",
                    "#BDC3C7",
                    "#26B99A",
                    "#3498DB"
                ],
                hoverBackgroundColor: [
                    // "#34495E",
                    "#B370CF",
                    "#CFD4D8",
                    "#36CAAB",
                    "#49A9EA"
                ]

            }]
        };

        var canvasDoughnut = new Chart(ctx, {
            type: 'doughnut',
            tooltipFillColor: "rgba(51, 51, 51, 0.55)",
            data: data,
            options: {
                legend: {
                    display: true,
                    position: 'bottom',
                    align: 'center'
                }
            }
        });
    }

    if ($('#nasabahClose').length) {

        var ctx = document.getElementById("nasabahClose");
        var data = {
            datasets: [{
                data: [50, 140, 180, 100],
                backgroundColor: [
                    // "#455C73",
                    "#9B59B6",
                    "#BDC3C7",
                    "#26B99A",
                    "#3498DB"
                ],
                label: 'My dataset' // for legend
            }],
            labels: [
                // "Dark Gray",
                "Purple",
                "Gray",
                "Green",
                "Blue"
            ],
        };

        var pieChart = new Chart(ctx, {
            data: data,
            type: 'pie',
            options: {
                legend: {
                    display: true,
                    position: 'bottom',
                    align: 'center'
                }
            }
        });
    }

    // proses chart

    if ($('#callDariLead').length) {

        var ctx = document.getElementById("callDariLead");
        var data = {
            datasets: [{
                data: [50, 140, 180, 100],
                backgroundColor: [
                    // "#455C73",
                    "#9B59B6",
                    "#BDC3C7",
                    "#26B99A",
                    "#3498DB"
                ],
                label: 'My dataset' // for legend
            }],
            labels: [
                // "Dark Gray",
                "Purple",
                "Gray",
                "Green",
                "Blue"
            ],
        };

        var pieCharts = new Chart(ctx, {
            data: data,
            type: 'pie',
            options: {
                legend: {
                    display: true,
                    position: 'bottom',
                    align: 'center'
                }
            }
        });
    }

    if ($('#meetDariLead').length) {

        var ctx = document.getElementById("meetDariLead");
        var data = {
            datasets: [{
                data: [50, 140, 180, 100],
                backgroundColor: [
                    // "#455C73",
                    "#9B59B6",
                    "#BDC3C7",
                    "#26B99A",
                    "#3498DB"
                ],
                label: 'My dataset' // for legend
            }],
            labels: [
                // "Dark Gray",
                "Purple",
                "Gray",
                "Green",
                "Blue"
            ],
        };

        var pieChart = new Chart(ctx, {
            data: data,
            type: 'pie',
            options: {
                legend: {
                    display: true,
                    position: 'bottom',
                    align: 'center'
                }
            }
        });
    }

    if ($('#meetDariCall').length) {

        var ctx = document.getElementById("meetDariCall");
        var data = {
            datasets: [{
                data: [50, 140, 180, 100],
                backgroundColor: [
                    // "#455C73",
                    "#9B59B6",
                    "#BDC3C7",
                    "#26B99A",
                    "#3498DB"
                ],
                label: 'My dataset' // for legend
            }],
            labels: [
                // "Dark Gray",
                "Purple",
                "Gray",
                "Green",
                "Blue"
            ],
        };

        var pieChart = new Chart(ctx, {
            data: data,
            type: 'pie',
            options: {
                legend: {
                    display: true,
                    position: 'bottom',
                    align: 'center'
                }
            }
        });
    }

    if ($('#closeDariLead').length) {

        var ctx = document.getElementById("closeDariLead");
        var data = {
            datasets: [{
                data: [50, 140, 180, 100],
                backgroundColor: [
                    // "#455C73",
                    "#9B59B6",
                    "#BDC3C7",
                    "#26B99A",
                    "#3498DB"
                ],
                label: 'My dataset' // for legend
            }],
            labels: [
                // "Dark Gray",
                "Purple",
                "Gray",
                "Green",
                "Blue"
            ],
        };

        var pieChart = new Chart(ctx, {
            data: data,
            type: 'pie',
            options: {
                legend: {
                    display: true,
                    position: 'bottom',
                    align: 'center'
                }
            }
        });
    }

    if ($('#closeDariCall').length) {

        var ctx = document.getElementById("closeDariCall");
        var data = {
            datasets: [{
                data: [50, 140, 180, 100],
                backgroundColor: [
                    // "#455C73",
                    "#9B59B6",
                    "#BDC3C7",
                    "#26B99A",
                    "#3498DB"
                ],
                label: 'My dataset' // for legend
            }],
            labels: [
                // "Dark Gray",
                "Purple",
                "Gray",
                "Green",
                "Blue"
            ],
        };

        var pieChart = new Chart(ctx, {
            data: data,
            type: 'pie',
            options: {
                legend: {
                    display: true,
                    position: 'bottom',
                    align: 'center'
                }
            }
        });
    }

    if ($('#closeDariMeet').length) {

        var ctx = document.getElementById("closeDariMeet");
        var data = {
            datasets: [{
                data: [50, 140, 180, 100],
                backgroundColor: [
                    // "#455C73",
                    "#9B59B6",
                    "#BDC3C7",
                    "#26B99A",
                    "#3498DB"
                ],
                label: 'My dataset' // for legend
            }],
            labels: [
                // "Dark Gray",
                "Purple",
                "Gray",
                "Green",
                "Blue"
            ],
        };

        var pieChart = new Chart(ctx, {
            data: data,
            type: 'pie',
            options: {
                legend: {
                    display: true,
                    position: 'bottom',
                    align: 'center'
                }
            }
        });
    }


}