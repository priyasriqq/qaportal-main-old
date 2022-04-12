		<div id="container" class="container-fluid">
			<div class="row flex-xl-nowrap">
			<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
			<script type="text/javascript" src="https://www.google.com/jsapi"></script>
			<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
			<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
			<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
			<script type="text/javascript">
		google.charts.load('current', {'packages':['corechart']});
      	google.charts.setOnLoadCallback(drawVisualization);

		function drawVisualization() {
			// Some raw data (not necessarily accurate)
			var data = google.visualization.arrayToDataTable([
			['Month', 'Passed', 'Failed', 'Not Run',   'TotalTCAutomated'],
			['2018/05/01',  965,      138,         22,             614.6],
			['2018/05/02',  935,      120,        99,             682],
			['2018/05/03',  957,      167,        87,             623],
			['2018/05/04',  939,      110,        15,             609.4],
			['2018/05/05',  936,      191,         29,             569.6]
			]);	  

			var options = {
			title : 'Daily Execution trends',
			vAxis: {title: 'Test Case Count'},
			hAxis: {title: 'Date'},
			seriesType: 'bars',
			series: {3: {type: 'line'}},
			animation: {"startup": true}
			};

			var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
			chart.draw(data, options);

			var jsonData = <?php echo file_get_contents("C:/wamp64/www/automation-dashboard/data/Trends_Data.json");?>;
			//   alert(JSON.stringify(jsondata));

			chartData = new google.visualization.DataTable(jsonData);

			var view = new google.visualization.DataView(chartData);

			var options1 = {
						title: 'Daily execution trends', 
						vAxis: { title: "Test Cases Count",viewWindow: {min: 0},titleTextStyle : {color: '#FF8C00', fontSize: 16, bold: true}},
						hAxis: { title: "Date",titleTextStyle : {color: '#FF8C00', fontSize: 16, bold: true}},
						annotations:{stem:{color: 'red',length: 0},
						textStyle: {fontName: 'Times-Roman',fontSize: 13,bold: true,italic: true}},
						fontSize: 14, backgroundColor: '#90f4e9', height: 400, isStacked: false, series: {3: {type: 'line'}}
					};
			view.setColumns([0, 1,2,3,4,5,6,7,{ calc: "stringify",
								sourceColumn: 7,
								type: "string",
								role: "annotation" }]);
			var chart1 = new google.visualization.ColumnChart(document.getElementById('chart_div1'));
			chart1.draw(view, options);
		}
		</script>
				<div class="col-12 app-content"><br>
					<center>
					<h2 class="main-title">Execute Tests Page</h2><br>
						<div align="center" id="chart_div" style="width: 1000px; height: 400px;"></div>
						<br><br>
						<div align="center" id="chart_div1" style="width: 1000px; height: 400px;"></div>
					</center>
				</div>
			</div>
		</div>
