<div id="container" class="container-fluid">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Type of Issue','No of Issues'],
            ['Script Issue',8],
            ['Test Infra Issue',0],
            ['Functional Issue',7],
            ['Environment Issue',18],
            ['Code Issue',36],
            ['FrameWork Issue',16],
            ['Other',27]

           <?php 
            //  echo "['Total Count',".$failures['total'][0]->count."],";
              // echo "['Script Issue',".$failures['script'][0]->count."],";
              // echo "['Test Infra Issue',".$failures['tinfra'][0]->count."],";
              // echo "['Functional Issue',".$failures['fun'][0]->count."],";
              // echo "['Environment Issue',".$failures['env'][0]->count."],";
              // echo "['Code Issue',".$failures['code'][0]->count."],";
              // echo "['FrameWork Issue',".$failures['fw'][0]->count."],";
              // echo "['Other',".$failures['other'][0]->count."],";
            ?>
        ]);

        var options = {
          title: 'Failure Analysis Chart',
          is3D: true,
          titleTextStyle: { fontSize: 16, bold: true }
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
    <center>
        <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
    </center>
</div>

