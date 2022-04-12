<div id="container" class="container-fluid">
			<div class="row flex-xl-nowrap">
			<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
			<script type="text/javascript" src="https://www.google.com/jsapi"></script>
			<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
			<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
			<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
			<script type="text/javascript">
		   google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Time of Day');
      data.addColumn('number', '#Hits');

      data.addRows([
        <?php 
        $counter=0;
            foreach ($resp_timestamp as $timestamp) {
              
            echo "['".$timestamp."',".$resp_counter[$counter]."],";
            $counter++;
          }
            ?>
      ]);

      var options = {
        title: 'Total Hits Received Throughout the Day',
        height: 450
      };

      var chart = new google.charts.Bar(document.getElementById('chart_div'));

      chart.draw(data, google.charts.Bar.convertOptions(options));

       google.visualization.events.addListener(chart, 'select', selectHandler);

       function selectHandler(e) {
            var selection = chart.getSelection();
            document.location.href = "<?php echo site_url();?>/loganalytics/reconcile";
        }
    }

    
		
		</script>
				<div class="col-12 app-content"><br>  
					<center>
					<h2 class="main-title">Error Charts</h2><br>
						<div align="center" id="chart_div" style="width: 1000px; height: 400px;"></div>
					</center> 
          <br>                
				</div>        
			</div>
		</div>
