$( document ).ready(function(){
    //Scripts para gráficos
    //valores por defecto para el grafico de temperatura
    var gaugeOptions = {
    
        chart: {
            type: 'solidgauge'
        },
    
        title: null,
    
        pane: {
            startAngle: -90,
            endAngle: 90,
            background: {
                backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || '#EEE',
                innerRadius: '60%',
                outerRadius: '100%',
                shape: 'arc'
            }
        },
    
        tooltip: {
            enabled: false
        },
    
        // the value axis
        yAxis: {
            stops: [
                [0.1, '#55BF3B'], // green
                [0.5, '#DDDF0D'], // yellow
                [0.9, '#DF5353'] // red
            ],
            lineWidth: 0,
            minorTickInterval: null,
            tickAmount: 2,
            title: {
                y: -70
            },
            labels: {
                y: 16
            }
        },
    
        plotOptions: {
            solidgauge: {
                dataLabels: {
                    y: 5,
                    borderWidth: 0,
                    useHTML: true
                }
            }
        }
    };
    
    // The speed gauge
    var temperatureChart = Highcharts.chart('container-temperatura', Highcharts.merge(gaugeOptions, {
        yAxis: {
            min: 0,
            max: 50,
            title: {
                text: 'Temperatura'
            }
        },
    
        credits: {
            enabled: false
        },
    
        series: [{
            name: 'Temperatura',
            data: [0],
            dataLabels: {
                format: '<div style="text-align:center"><span style="font-size:25px;color:' +
                    ((Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black') + '">{y}</span><br/>' +
                       '<span style="font-size:12px;color:silver">°C</span></div>'
            },
            tooltip: {
                valueSuffix: '°C'
            }
        }]
    
    }));
        point = temperatureChart.series[0].points[0];
        point.update(12);
});


