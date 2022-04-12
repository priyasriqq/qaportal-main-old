<div id="container" class="container-fluid">
    <div class="row flex-xl-nowrap">
        <div class="col-12 col-md-9 col-xl-8 py-md-3 pl-md-5 app-content">
            <div>
            <body onload="hideDate()" >
                <form method="POST" id="idForm" action="">
                    <div style="margin-top:20px">
                        <label style="margin-left:90px">Period: </label>
                        <select id="period" name="period" onchange="hideDate()" style="width:200px;margin-left:36px" >
                            <?php 
                                if (!isset( $_POST['period'])){
                                    $_POST['period'] = "Quarterly";
                                }
                            ?>
                            <option selected="selected" <?php if(isset($_POST['period'])){echo $_POST['period'] == 'Quarterly'?'selected="selected"':'';} ?>>Quarterly</option>          
                            <option <?php if(isset($_POST['period'])){echo $_POST['period'] == 'Monthly'?'selected="selected"':'';} ?>>Monthly</option>
                            <option <?php if(isset($_POST['period'])){echo $_POST['period'] == "Weekly"?'selected="selected"':'';} ?>>Weekly</option>
                        </select>
                        <label style="margin-left:110px">Module: </label>
                            <select id="module" name="module" style="width:200px; margin-left:20px" >
                                <option value = "All" > All </option>
                                <?php foreach ($modules as $module){
                                    if (!isset( $_POST['module'])){
                                        $_POST['module'] = " All ";
                                    }
                                    if ($module['Module'] === " All "){ ?>
                                        <option selected="selected" value = "All" > All </option>
                                    <?php }else{ ?>
                                        <option <?php echo $_POST['module'] == $module['Module'] ? 'selected="selected"' : '' ?>> <?php echo $module['Module']; ?> </option>
                                <?php }}?>
                            </select>
                        <div style="display:inline-block;margin-left:10px">
                            <button type="button" onclick="submit() ">Go</button>
                        </div>
                        <div id="date">
                            <label style="margin-left:90px">Start date:</label>
                            <input id="startDate" type="date" name="startDate" style="width:200px; margin-left:15px" value="<?php if(isset($_POST['startDate'])) { echo $_POST['startDate']; }else{$date = strtotime("-6 day", time());echo date("Y-m-d",$date);}?>" />
                            <label style="margin-left:110px">End date:</label>
                            <input id="endDate" type="date"  name="endDate" style="width:200px; margin-left:10px" value="<?php if(isset($_POST['endDate'])) { echo $_POST['endDate']; }else{echo date("Y-m-d");}?>" />
                        </div>
                    </div>
                </form> 
             </body>   
                <script>
                    function hideDate() {
                        var period = document.getElementById("period").value;
                        if(period!="Weekly"){
                            document.getElementById("date").style = "display:none;";
                        }else{
                            // var a = jQuery('<label style="margin-left:90px">Start date:</label>\
                            //                 <input id="startDate" type="date" name="startDate" style="width:200px; margin-left:15px" value="<?php if(isset($_POST['startDate'])) { echo $_POST['startDate']; }else{$date = strtotime("-6 day", time());echo date("Y-m-d",$date);}?>" />\
                            //                 <label style="margin-left:110px">End date:</label>\
                            //                 <input id="endDate" type="date"  name="endDate" style="width:200px; margin-left:10px" value="<?php if(isset($_POST['endDate'])) { echo $_POST['endDate']; }else{echo date("Y-m-d");}?>" />');
                            // $('#date').append(a);
                            document.getElementById("date").style = "display:block;";
                        }
                    }
                </script>
            </div>
            
            <h3 style = "margin-top:60px "><?php echo $title; ?></h3>
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">

                google.charts.load('current', {'packages':['corechart']});
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {
                    var dataTable = google.visualization.arrayToDataTable([
                        ['Date', '<?php echo $_POST['module']?>',{ role: 'annotation' } ],
                        <?php 
                            $counter=0;
                            $mod = $_POST['module'];
                            foreach($status as $s){
                            
                            if($s['Date'] > date("Y-m-d"))   
                            {

                            echo "['".date("Y-m-d")."',".$s[$mod].",''],";
                            }
                            else{
                            echo "['".$s['Date']."',".$s[$mod].",''],";
                            }
                            $counter++;
                            if($counter>= 12)
                            break;
                            }
                        ?>
                    ]);

                    var view = new google.visualization.DataView(dataTable);

                    view.setColumns([0,1 ,{calc: "stringify", sourceColumn:1,type: "string",role: "annotation" }]);

                    var options = { 
                        // title: 'Automation Status',
                        // backgroundColor: '#F5F5F5',
                        chartArea:{
                            height: 350,
                            width: 700,
                        },
                        annotations: {
                            alwaysOutside: true,
                            textStyle: {
                                fontSize: 14,
                                color: 'black',
                                auraColor: 'none',
                                stroke:'none'
                            }
                        },
                        bar: {groupWidth: "40%"},
                        series: {1: {type: 'line'}},
                        isStacked: true                 
                    };
                    
                    var chart = new google.visualization.ColumnChart(document.getElementById('columnchart_material'));

                    chart.draw(view, options);
                }
            </script>

            <div id="columnchart_material" style="height: 500px; width: 1200px;"></div>
        </div>
    </div>

    <div>
    <div id="container" class="container-fluid">
	<div class="row flex-xl-nowrap">
    <div id="content">
		<table class="table table-striped table-hover" cellpadding="5" style="margin-left:34px; border-collapse:collapse; ">
            <thead style="background-color: #e6e6e6; align:center; text-align: center;">
                <tr >
                    <th scope="col" >Date</th>
                    <th scope="col" ><?php echo $mod;?></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $counter=0;
                    foreach($status as $s) : 
                    $counter++;
                ?>
                <tr>
                    <td align="center" ><?php if($s['Date'] > date("Y-m-d")){echo date("Y-m-d");} else{echo $s['Date'];} ?></td>
                    <td align="center" ><?php echo $s[$mod]; ?></td>
                </tr>
                <?php 
                    if($counter>11)
                        break;
                    endforeach; 
                ?>
            </tbody>
        </table>
    </div>
	</div>
	</div>
    </div>
</div>