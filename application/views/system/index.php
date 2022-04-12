<?php $this->load->view('includes/header');?>


<!-- Begin Page Content -->
               <div class="container-fluid">

                   <!-- Page Heading -->
                   <!-- <h1 class="h3 mb-2 text-gray-800">Audit Reports</h1> -->
                   <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                       For more information about DataTables, please visit the <a target="_blank"
                           href="https://datatables.net">official DataTables documentation</a>.</p> -->

                   <!-- DataTales Example -->
                   <?php
                  //var_dump( $this->session->flashdata('run_response'));

                   ?>
                   <div class="card shadow mb-4">
                       <div class="card-header py-3">
                           <h6 class="m-0 font-weight-bold text-dark">System Health</h6>
                       </div>
                       <div class="card-body">


                           <div class="table-responsive">
                             <p id="date_filter">
        <span id="date-label-from" class="date-label">From: </span><input class="date_range_filter date" type="text" id="datepicker_from" />

    </p>

                             <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                                 <thead>
                                     <tr style="background-color: #002147;border:1px solid #002147;color:#FFFFFF">
                                         <th  style="color:#FFFFFF; text-align: center; vertical-align:middle;" rowspan="2">Project</th>
                                         <th  style="color:#FFFFFF; text-align: center; vertical-align:middle;"  rowspan="2">CRON Job</th>
                                         <th  style="color:#FFFFFF; text-align: center; vertical-align:middle;"  rowspan="2">Order Export Job</th>
                                         <th  style="color:#FFFFFF; text-align: center; vertical-align:middle;"  rowspan="2">Order Import Job</th>
                                         <th  style="color:#FFFFFF; text-align: center; vertical-align:middle;"  rowspan="2">Index Management</th>
                                         <th  style="color:#FFFFFF; text-align: center; vertical-align:middle;"  rowspan="2">Order Tracking Status</th>
                                         <th style="color:#FFFFFF; text-align: center; vertical-align:middle;"  colspan="2" valign="center">
                                           Google Insight Score
                                         </th>

                                     </tr>
                                     <tr style="background-color: #002147;border:1px solid #002147;color:#FFFFFF">
                                         <th style="color:#FFFFFF; text-align: center; vertical-align:middle;" >Web</th>
                                         <th style="color:#FFFFFF; text-align: center; vertical-align:middle;" >Mobile</th>
                                     </tr>

                                 </thead>

                                 <tbody>
                                   <?php for($i=0; $i< sizeof($records); $i++) {?>
                                     <tr>
                                         <td style="text-align: center; vertical-align:middle;"><?php echo $records[$i]["Project"]; ?></td>
                                         <td style="color:#FFFFFF; text-align: center; vertical-align:middle;" class="<?php echo $records[$i]['Cronjob'] === 'Failed' ?  'bg-danger': 'bg-success' ?>"><?php echo $records[$i]["Cronjob"]; ?></td>
                                         <td style="color:#FFFFFF; text-align: center; vertical-align:middle;" class="<?php echo $records[$i]['OrderExport'] === 'Failed' ?  'bg-danger': 'bg-success' ?>"><?php echo $records[$i]["OrderExport"]; ?></td>
                                         <td style="color:#FFFFFF; text-align: center; vertical-align:middle;" class="<?php echo $records[$i]['OrderImport'] === 'Failed' ?  'bg-danger': 'bg-success' ?>"><?php echo $records[$i]["OrderImport"]; ?></td>
                                         <td style="color:#FFFFFF; text-align: center; vertical-align:middle;" class="<?php echo $records[$i]['IndexManagement'] === 'Failed' ?  'bg-danger': 'bg-success' ?>"><?php echo $records[$i]["IndexManagement"]; ?> </td/>

                                         <td style="color:#FFFFFF; text-align: center; vertical-align:middle;" class="<?php echo $records[$i]['OrderTrackingStatus'] === 'Failed' ?  'bg-danger': 'bg-success' ?>"><?php echo $records[$i]["OrderTrackingStatus"]; ?><br>Previous: <?php echo $records[$i]["PreviousOrders"];?><br>Current: <?php echo $records[$i]["CurrentOrders"];?></td>
                                         <td style="text-align: center; vertical-align:middle;"><?php echo $records[$i]["InsightScoreWeb"]; ?></td>
                                         <td style="text-align: center; vertical-align:middle;"><?php echo $records[$i]["InsightScoreMobile"]; ?></td>
                                     </tr>
                                   <?php } ?>



                                 </tbody>
                             </table>

                           </div>
                       </div>
                   </div>

               </div>
               <!-- /.container-fluid -->



<?php $this->load->view('includes/footer'); ?>
