<div id="container" class="container-fluid">
			<div class="row flex-xl-nowrap">
			<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
			<script type="text/javascript" src="https://www.google.com/jsapi"></script>
			<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
			<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
			<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
			<script type="text/javascript">
		      google.charts.load('current', {'packages':['table']});
      google.charts.setOnLoadCallback(drawTable);

      function drawTable() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Time Stamp');
        data.addColumn('string', 'Tenant');
        data.addColumn('string', 'User');
        data.addColumn('string', 'Module');
        data.addColumn('string', 'Application Log Error');        
        data.addRows([
          <?php
          foreach ($resp_body as $value) {
          echo "['".$value->_source->timestamp."','".$value->_source->Tanent."','".$value->_source->Username."','".$value->_source->Module."','".$value->_source->Error_message."'],";
          }
          ?>
        ]);

        var table = new google.visualization.Table(document.getElementById('table_div'));

        table.draw(data, {showRowNumber: true, width: '100%', height: '100%'});
      }
		
		</script>
				<div class="col-12 app-content"><br>
					<center>
					<h2 class="main-title">Application Log Error Dashboard</h2><br>
						<div align="center" id="table_div" style="width: 1000px; height: 400px;"></div>
					</center>
				</div>
			</div>
		</div>
