<?php
 session_start();
 $dataPoints = array();
foreach($_SESSION['grafico'] as $row){
    array_push($dataPoints, array("y"=>$row->contagem, "label" => $row->titulo));
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/material-components-web@5.0.0/dist/material-components-web.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>Gráfico</title>
    <script>
        window.onload = function() {
        
        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            theme: "light2",
            title:{
                text: "Categorias Livros"
            },
            axisY: {
                title: "Categorias Livros (quantidade)"
            },
            data: [{
                type: "column",
                yValueFormatString: "#,##0.## quantidade",
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart.render();
        
        }
</script>
</head>
<body>
<!-- <main> -->
<div id="container">
    <div id="menu"></div>
    <div id="cabecalho"></div>
    <main class="main-content col-xs-12 col-md-9 cel" id="main-content" >
        <div class="mdc-top-app-bar--fixed-adjust "  >
            <p style="text-align:center">
                Gráfico
            </p>
            <div id="chartContainer" style="height: 370px; width: 100%;"></div>
        </div>
    </main>
</div>
<script src="js/header.js"></script>
<script src="js/menu.js"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>
