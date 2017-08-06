$( document ).ready(function(){
    //Scripts para gráficos
    //valores por defecto para el grafico de temperatura
    var gaugeOptions = {
    
        chart: {
            type: 'solidgauge'
        },
    
        title: null,
    
        pane: {
            center: ['50%', '85%'],
            size: '140%',
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
    
    // The temperature gauge
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
    
    // The relativa gauge
    var relativaChart = Highcharts.chart('container-relativa', Highcharts.merge(gaugeOptions, {
        yAxis: {
            min: 0,
            max: 50,
            title: {
                text: 'Húmedad relativa'
            }
        },
    
        credits: {
            enabled: false
        },
    
        series: [{
            name: 'relativa',
            data: [0],
            dataLabels: {
                format: '<div style="text-align:center"><span style="font-size:25px;color:' +
                    ((Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black') + '">{y}</span><br/>' +
                       '<span style="font-size:12px;color:silver">%</span></div>'
            },
            tooltip: {
                valueSuffix: '%'
            }
        }]
    
    }));

    // The relativa gauge
    var radiacionChart = Highcharts.chart('container-radiacion', Highcharts.merge(gaugeOptions, {
        yAxis: {
            min: 0,
            max: 50,
            title: {
                text: 'Radiación'
            }
        },
    
        credits: {
            enabled: false
        },
    
        series: [{
            name: 'radiacion',
            data: [0],
            dataLabels: {
                format: '<div style="text-align:center"><span style="font-size:25px;color:' +
                    ((Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black') + '">{y}</span><br/>' +
                       '<span style="font-size:12px;color:silver">1 m2 mol</span></div>'
            },
            tooltip: {
                valueSuffix: '1 m2 mol'
            }
        }]
    
    }));
    
    // The humedad suelo gauge
    var sueloChart = Highcharts.chart('container-suelo', Highcharts.merge(gaugeOptions, {
        yAxis: {
            min: 0,
            max: 50,
            title: {
                text: 'Húmedad suelo'
            }
        },
    
        credits: {
            enabled: false
        },
    
        series: [{
            name: 'suelo',
            data: [0],
            dataLabels: {
                format: '<div style="text-align:center"><span style="font-size:25px;color:' +
                    ((Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black') + '">{y}</span><br/>' +
                       '<span style="font-size:12px;color:silver">%</span></div>'
            },
            tooltip: {
                valueSuffix:'%'
            }
        }]
    
    }));    
    
    
    
    //Conexión a la BD, se instancia acá porque depende de la carga del chart
    var ref = firebase.database().ref('/datos');
    ref.on('child_added', function(snapshot) {
        pointTemp = temperatureChart.series[0].points[0];
        pointRel = relativaChart.series[0].points[0];
        pointRad = radiacionChart.series[0].points[0];
        pointSuelo = sueloChart.series[0].points[0];

        pointTemp.update(snapshot.val().sensors_values.temperatura);
        pointRel.update(snapshot.val().sensors_values.humedad_relativa);
        pointRad.update(snapshot.val().sensors_values.luz);
        pointSuelo.update(snapshot.val().sensors_values.humedad_suelo);
    });
    
});


