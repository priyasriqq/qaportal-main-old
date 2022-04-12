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
                           <h6 class="m-0 font-weight-bold text-dark">Audit Report</h6>
                       </div>
                       <div class="card-body">
                         <div><label class="col-sm-2 col-form-label float-left">Refresh rate</label>

                         <select class="form-control col-sm-3" name="refresh" id="refresh" onchange="setPageRefresh(this.value)">
                           <option value="">--- Select ---</option>
                            <option value="30">Default</option>
                             <option value="Never" >Never</option>
                             <option value="10" >10 sec</option>
                             <option value="20" >20 sec</option>

                        </select>
                      </div>

                           <div class="table-responsive">
                               <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                   <thead>
                                       <tr style="background-color: #e2e2e2;border:1px solid #b6b6b6">
                                           <th>Project</th>
                                           <th>Environment</th>
                                           <th>Testing Type</th>
                                           <th>Browser</th>
                                           <th>Scheduled AT</th>                                           
                                           <th>Job Status</th>
                                           <th>Execution Status</th>
                                           <th>Machine</th>
                                           <th>Triggered By</th>
                                           <th>Emails</th>
                                       </tr>
                                   </thead>
                                   <tbody>
                                     <?php for($i=0; $i< sizeof($records); $i++) {?>
                                       <tr>
                                           <td><?php echo $records[$i]["Project"]; ?></td>
                                           <td><?php echo $records[$i]["Environment"]; ?></td>
                                           <td><?php echo $records[$i]["TestingType"]; ?></td>
                                           <td><?php echo $records[$i]["Browser"]; ?></td>
                                           <td><?php echo $records[$i]["ScheduledAt"]; ?></td>
                                           <td><?php echo $records[$i]["JobStatus"]; ?></td>
                                           <td><?php echo $records[$i]["ExecutionStatus"]; ?></td>
                                           <td><?php echo $records[$i]["Machine"]; ?></td>
                                           <td><?php echo $records[$i]["TriggeredBy"]; ?></td>
                                           <td><?php echo $records[$i]["Emails"]; ?></td>
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
