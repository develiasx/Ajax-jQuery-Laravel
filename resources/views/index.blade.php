<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
        crossorigin="anonymous"></script>
    <script src="assets/js/jquery.serializejson.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js"
        integrity="sha512-3dZ9wIrMMij8rOH7X3kLfXAzwtcHpuYpEgQg1OA4QAob1e81H8ntUQmQm3pBudqIoySO5j0tHN4ENzA6+n2r4w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <title>Ajax Teste</title>

</head>


<body>
    <div class=" container text-center mt-5">
        <!-- Styles -->
        <style>
            #chartdiv {
                width: 100%;
                height: 500px;
            }
        </style>

        <!-- Resources -->
        <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
        <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
        <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

        <!-- Chart code -->
        <script>
            am5.ready(function() {

                // Create root element
                // https://www.amcharts.com/docs/v5/getting-started/#Root_element
                var root = am5.Root.new("chartdiv");


                // Set themes
                // https://www.amcharts.com/docs/v5/concepts/themes/
                root.setThemes([
                    am5themes_Animated.new(root)
                ]);


                // Create chart
                // https://www.amcharts.com/docs/v5/charts/xy-chart/
                var chart = root.container.children.push(am5xy.XYChart.new(root, {
                    panX: true,
                    panY: true,
                    wheelX: "panX",
                    wheelY: "zoomX",
                    pinchZoomX: true
                }));

                // Add cursor
                // https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
                var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
                cursor.lineY.set("visible", false);


                // Create axes
                // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
                var xRenderer = am5xy.AxisRendererX.new(root, {
                    minGridDistance: 30
                });
                xRenderer.labels.template.setAll({
                    rotation: -90,
                    centerY: am5.p50,
                    centerX: am5.p100,
                    paddingRight: 15
                });

                xRenderer.grid.template.setAll({
                    location: 1
                })

                var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
                    maxDeviation: 0.3,
                    categoryField: "month",
                    renderer: xRenderer,
                    tooltip: am5.Tooltip.new(root, {})
                }));

                var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
                    maxDeviation: 0.3,
                    renderer: am5xy.AxisRendererY.new(root, {
                        strokeOpacity: 0.1
                    })
                }));


                // Create series
                // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
                var series = chart.series.push(am5xy.ColumnSeries.new(root, {
                    name: "Series 1",
                    xAxis: xAxis,
                    yAxis: yAxis,
                    valueYField: "value",
                    sequencedInterpolation: true,
                    categoryXField: "month",
                    tooltip: am5.Tooltip.new(root, {
                        labelText: "{valueY}"
                    })
                }));

                series.columns.template.setAll({
                    cornerRadiusTL: 5,
                    cornerRadiusTR: 5,
                    strokeOpacity: 0
                });
                series.columns.template.adapters.add("fill", function(fill, target) {
                    return chart.get("colors").getIndex(series.columns.indexOf(target));
                });

                series.columns.template.adapters.add("stroke", function(stroke, target) {
                    return chart.get("colors").getIndex(series.columns.indexOf(target));
                });


                // Set data
                var data = [{
                        month: "JANEIRO",
                        value: "{{$Janeiro}}"
                }, {
                    month: "FEVEREIRO",
                    value: "{{$Fevereiro}}"
                }, {
                    month: "MARÇO",
                    value: "{{$Marco}}"
                }, {
                    month: "ABRIL",
                    value: "{{$Abril}}"
                }, {
                    month: "MAIO",
                    value: "{{$Maio}}"
                }, {
                    month: "JUNHO",
                    value: "{{$Junho}}"
                }, {
                    month: "JULHO",
                    value: "{{$Julho}}"
                }, {
                    month: "AGOSTO",
                    value: "{{$Agosto}}"
                }, {
                    month: "SETEMBRO",
                    value: 800
                }, {
                    month: "OUTUBRO",
                    value: "{{$Outubro}}"
                },{
                    month: "NOVEMBRO",
                    value: "{{$Novembro}}"
                }, {
                    month: "DEZEMBRO",
                    value: 341
                }];

                xAxis.data.setAll(data);
                series.data.setAll(data);


                // Make stuff animate on load
                // https://www.amcharts.com/docs/v5/concepts/animations/
                series.appear(1000);
                chart.appear(1000, 100);

            }); // end am5.ready()
        </script>

        <!-- HTML -->
        <div id="chartdiv"></div>


    </div>
    <script>
        $("#botao").on('click', function(e) {
            console.log('botao apertado')
            e.preventDefault();

            $.ajax({
                url: "{{ route('people.store') }}",
                type: "POST",
                data: {
                    "form": $("#cadastro").serializeJSON(),

                    "_token": "{{ csrf_token() }}",
                    dataType: "json"
                },
                success: function(result, status) {
                    console.log(status);
                    console.log(result);
                }
            });



        });
    </script>



</body>

</html>
