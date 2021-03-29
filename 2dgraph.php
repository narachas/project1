    <?php
     $dataPoints = array
	 (
    	array("x" => 10 , "y" => 38.3),
    	array("x" => 15 , "y" => 27.0),
    	array("x" => 20 , "y" => 28.4),
    	array("x" => 25 , "y" => 23.9),
    	array("x" => 30 , "y" => 26.1),
    	array("x" => 35 , "y" => 28.2),
    	array("x" => 40 , "y" => 30.0),
    	array("x" => 45 , "y" => 33.9),
    	array("x" => 50 , "y" => 35.0),
     );

    ?>
    <!DOCTYPE HTML>
    <html>
    <head>
    <script>
    window.onload = function () {
     
    var chart = new CanvasJS.Chart("chartContainer", {
    	animationEnabled: true,
    	title:{
    		text: "Company Revenue by Year"
    	},
    	axisY: {
    		title: "Revenue in USD",
    		valueFormatString: "#0,,.",
    		suffix: "mn",
    		prefix: "$"
    	},
    	data: [{
    		type: "spline",
    		markerSize: 5,
    		xValueFormatString: "YYYY",
    		yValueFormatString: "00.0",
    		xValueType: "date ",
    		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
    	}]
    });
     
    chart.render();
     
    }
    </script>
    </head>
    <body>
    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    </body>
    </html>                              