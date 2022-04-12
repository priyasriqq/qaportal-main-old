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
                                if(!isset( $_POST['period'])){
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
                                    <option <?php echo $_POST['module'] == $module ? 'selected="selected"' : '' ?>> <?php echo $module['Module']; ?> </option>
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
                    ['Date', 'Common Areas', 'DI', 'Consolidation', 'Reporting','Operational Planning', 'Workforce Planning',  'EUB',{ role: 'annotation' } ],
                    <?php 
                        $counter=0;
                        foreach($status as $s){
                        if($s['Date'] > date("Y-m-d"))   
                        {
                            echo "['".date("Y-m-d")."',".$s['CommonAreas'].",".$s['DI'].",".$s['Consolidation'].",".$s['Reporting'].",".$s['OperationalPlanning'].",".$s['WorkforcePlanning'].",".$s['EUB'].",''],";
                        }
                        else{
                        echo "['".$s['Date']."',".$s['CommonAreas'].",".$s['DI'].",".$s['Consolidation'].",".$s['Reporting'].",".$s['OperationalPlanning'].",".$s['WorkforcePlanning'].",".$s['EUB'].",''],";
                        }
                        $counter++;
                        if($counter>= 12)
                        break;
                        }
                    ?>
                ]);
                    
                var view = new google.visualization.DataView(dataTable);

                view.setColumns([0,
                    {sourceColumn:1,type: "number",role: "annotation"},1,
                    {sourceColumn:2,type: "number",role: "annotation"},2,
                    {sourceColumn:3,type: "number",role: "annotation"},3,
                    {sourceColumn:4,type: "number",role: "annotation"},4,
                    {sourceColumn:5,type: "number",role: "annotation"},5,
                    {sourceColumn:6,type: "number",role: "annotation"},6,
                    {sourceColumn:7,type: "number",role: "annotation"},7,
                    {calc: Total, type:"number", label:'Total',role: "annotation"},
                    {calc: "stringify", sourceColumn:8,type: "string",role: "annotation" }  
                ]);

                function Total(dataTable, rowNum){
                    return (dataTable.getValue(rowNum, 1)+dataTable.getValue(rowNum, 2)+dataTable.getValue(rowNum, 3)+dataTable.getValue(rowNum, 4)+dataTable.getValue(rowNum, 5)+dataTable.getValue(rowNum, 6)+dataTable.getValue(rowNum, 7));
                }

                var options = { 
                    // title: 'Automation Status',
                    // backgroundColor: '#F5F5F5',
                    // ticks: [4000,8000,12000,16000,20000,24000],
                    chartArea:{
                        height: 400,
                        width: 800,
                    },
                    vAxis:{
                        mirrorLog: true,
                        viewWindowMode: 'pretty', 
                        // maxValue: 25000,
                        gridlines:{count:10},
                    }, 
                    annotations: {
                        style: 'point',
                        highContrast: true,
                        alwaysOutside: true,
                        textStyle: {
                            fontSize: 14,
                            color: 'black',
                            auraColor: 'none',
                            stroke:'none'
                        },
                        datum: {
                            stem:{
                                // color: 'white',
                                length: 2,
                            },
                        },
                    },
                    bar: {groupWidth: "40%"},
                    series: {7: {type: 'line'}},
                    isStacked: true, 
                    // height:400                
                };
                var chart = new google.visualization.ColumnChart(document.getElementById('columnchart_material'));

                chart.draw(view, options);
            }
        </script>
        <div id="columnchart_material" style="height: 500px; width: 1200px;"></div></div>
    </div>
    
    <div id="container" class="container-fluid">
    <div class="row flex-xl-nowrap">
    <div id="content">
        <table class="table table-striped table-hover" cellpadding="5" style="margin-left:34px; border-collapse:collapse; ">
            <thead style="background-color: #e6e6e6; align:center; text-align: center;">
                <tr >
                    <th scope="col" >Date</th>
                    <th scope="col" >Common Areas</th>
                    <th scope="col" >DI</th>
                    <th scope="col" >Consolidation</th>
                    <th scope="col" >Reporting</th>
                    <th scope="col" >Operational Planning</th>
                    <th scope="col" >Workforce Planning</th>
                    <!-- <th scope="col" >Revenue Planning</th> -->
                    <th scope="col" >EUB</th>
                    <!-- <th scope="col" >Total</th> -->
                </tr>
            </thead>
            <tbody>
                <?php 
                    $counter=0;
                    foreach($status as $s) : 
                        $counter++;
                ?>
                
                <tr>
                    <!-- <td align="center" scope="row" ><?php echo $s['ID']; ?></td> -->
                    <td align="center" ><?php if($s['Date'] > date("Y-m-d")){echo date("Y-m-d");} else{echo $s['Date'];} ?></td>
                    <td align="center" ><?php echo $s['CommonAreas']; ?></td>
                    <td align="center" ><?php echo $s['DI']; ?></td>
                    <td align="center" ><?php echo $s['Consolidation']; ?></td>
                    <td align="center" ><?php echo $s['Reporting']; ?></td>
                    <td align="center" ><?php echo $s['OperationalPlanning']; ?></td>
                    <td align="center" ><?php echo $s['WorkforcePlanning']; ?></td>
                    <!-- <td align="center" ><?php echo $s['RevenuePlanning']; ?></td> -->
                    <td align="center" ><?php echo $s['EUB']; ?></td>
                    <!-- <td align="center" ><?php echo $s['Total']; ?></td> -->
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