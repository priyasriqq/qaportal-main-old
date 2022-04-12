<?php ini_set('display_errors', 1);
$this->load->view('includes/header');?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Execution Tests</h1>
  </div> -->

  <div class="row">
    <!-- Basic Card Example -->
     <div class="card shadow mb-6 col-7 offset-2 pr-0 pl-0">
         <div class="card-header py-4">
             <h6 class="m-0 font-weight-bold text-gray-800">Test Execution</h6>
         </div>
         <div class="card-body">
           <form role="form" id="runExecution" method="post" action="execution">
             <?php $this->load->view('execution/fields'); ?>
              <button type="submit"class="btn btn-primary btn-icon-split float-right">
                  <span class="icon text-white-50">
                      <i class="fas fa-arrow-right"></i>
                  </span>
                  <span class="text">Next</span>

              </button>
          </form>

          <!-- Modal starts here-->

          <div class="modal fade" id="executionModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <form role="form"  method="post" action="execution/run">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Confirm Test Execution?</h5>
                          <button class="close" type="button" data-dismiss="modal" aria-label="Close" onclick="cancelClick()">
                              <span aria-hidden="true">×</span>
                          </button>
                      </div>
                      <div class="modal-body">

                          <fieldset disabled>

                            <div class="form-group row">
                                 <label class="col-sm-3 col-form-label">Project</label>
                                 <select class="form-control col-sm-9" name="project" value="<?php echo $this->input->post('project'); ?>">
                                    <option value="" <?php echo in_array($this->input->post('project'), [NULL, ""])  ? 'selected' : '';?>>--- Select ---</option>
                                     <option value="Revlon UK" <?php echo $this->input->post('project') === 'Revlon UK' ? 'selected' : ''?>>Revlon UK</option>
                                     <option value="Revlon US" <?php echo $this->input->post('project') === 'Revlon US' ? 'selected' : ''?>>Revlon US</option>
                                     <option value="Hot Tools" <?php echo $this->input->post('project') === 'Hot Tools' ? 'selected' : ''?>>Hot Tools</option>
                                 </select>
                             </div>
                             <div class="form-group row">
                                  <label class="col-sm-3 col-form-label">Environment</label>
                                  <select class="form-control col-sm-9" name="environment" value="<?php echo $this->input->post('environment')?>">
                                    <option value="" <?php echo in_array($this->input->post('environment'), [NULL, ""])  ? 'selected' : '';?>>--- Select ---</option>
                                      <option value="Staging" <?php echo $this->input->post('environment') === 'Staging' ? "selected" : ''?>>Staging</option>
                                      <option value="Development" <?php echo $this->input->post('environment') === 'Development' ? "selected" : ''?>>Development</option>
                                      <option value="Production" <?php echo $this->input->post('environment') === 'Production' ? "selected" : ''?>>Production</option>
                                  </select>
                              </div>

                              <div class="form-group row">
                                   <label class="col-sm-3 col-form-label">Testing Type</label>
                                   <select class="form-control col-sm-9" name="testingTYpe" value="<?php echo $this->input->post('testingTYpe')?>">
                                    <option value="" <?php echo in_array($this->input->post('testingTYpe'), [NULL, ""])  ? 'selected' : '';?>>--- Select ---</option>
                                      <option value="Demo testing" <?php echo $this->input->post('testingTYpe') === 'Demo testing' ? "selected" : ''?>>Demo testing</option>
                                      <option value="Build smoke testing" <?php echo $this->input->post('testingTYpe') === 'Build smoke testing' ? "selected" : ''?>>Build smoke testing</option>
                                      <option value="System regression testing" <?php echo $this->input->post('testingTYpe') === 'System regression testing' ? "selected" : ''?>>System regression testing</option>
                                      <option value="System integration testing" <?php echo $this->input->post('testingTYpe') === 'System integration testing' ? "selected" : ''?>>System integration testing</option>
                                  </select>
                               </div>


                               <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Device Type</label>
                                    <div class="col-sm-9">
                                      <input type="radio" name="device" value="web" <?php echo $this->input->post('device') === 'web' ? "checked" : "";?> id="webRadio"/>
                                      <label for="webRadio">Web</label>
                                      <input type="radio" name="device" value="mobile" <?php echo $this->input->post('device') === 'mobile' ? "checked" : "";?> id="mobRadio" />
                                      <label for="mobRadio">Mobile</label>
                                  </div>
                                </div>
                                <?php if($this->input->post('device') === 'web') {?>
                                <div class="form-group row" >
                                     <label class="col-sm-3 col-form-label">Browsers</label>
                                     <select class="form-control col-sm-9" name="browsers" value="<?php echo $this->input->post('browsers')?>">
                                        <option value="" <?php echo in_array($this->input->post('browsers'), [NULL, ""])  ? 'selected' : '';?>>--- Select ---</option>
                                        <option value="Chrome"  <?php echo $this->input->post('browsers') === 'Chrome' ? "selected" : ''?>>Chrome</option>
                                        <option value="Firefox"  <?php echo $this->input->post('browsers') === 'Firefox' ? "selected" : ''?>>Firefox</option>
                                        <option value="Safari"  <?php echo $this->input->post('browsers') === 'Safari' ? "selected" : ''?>>Safari</option>
                                    </select>
                                 </div>
                               <?php  } ?>

                              <?php if($this->input->post('device') === 'mobile') {?>
                                 <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Devices</label>
                                      <select class="form-control col-sm-9" name="devices" value="<?php echo $this->input->post('devices')?>">
                                        <option value="" <?php echo in_array($this->input->post('devices'), [NULL, ""])  ? 'selected' : '';?>>--- Select ---</option>
                                          <option value="iPhone" <?php echo $this->input->post('devices') === 'iPhone' ? "selected" : ''?>>iPhone</option>
                                          <option value="Android"  <?php echo $this->input->post('devices') === 'Android' ? "selected" : ''?>>Android</option>
                                          <option value="iPad"  <?php echo $this->input->post('devices') === 'iPad' ? "selected" : ''?>>iPad</option>
                                      </select>
                                  </div>
                                <?php } ?>

                                <div class="form-group row" id="testcases_block1">
                                    <label class="col-sm-3 col-form-label">No of Test Cases</label>
                                    <input class="form-control col-sm-9" type="text" name="testcases" value="<?php echo $this->input->post('testcases')?>" readonly/>
                                </div>


                                  <div class="form-group row">
                                       <label class="col-sm-3 col-form-label">Hosting Machine</label>
                                       <select class="form-control col-sm-9" name="machine" value="<?php echo $this->input->post('machine')?>">
                                          <option value="" <?php echo in_array($this->input->post('machine'), [NULL, ""])  ? 'selected' : '';?>>--- Select ---</option>
                                          <option value="EP-FAUTOMAT"  <?php echo $this->input->post('machine') === 'EP-FAUTOMAT' ? "selected" : ''?>>EP-FAUTOMAT</option>
                                      </select>
                                   </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Emails</label>
                                    <input class="form-control col-sm-9" type="text" name="emails" value="<?php echo $this->input->post('emails')?> "/>
                                </div>


                            </fieldset>

                      </div>
                      <div class="modal-footer">
                          <button class="btn btn-secondary" type="button" data-dismiss="modal" onclick="cancelClick()">Cancel</button>
                          <input type="submit" class="btn btn-primary" type="button"  value="Run" onclick="return handleConfirmSubmit()"/>
                      </div>
                    </form>
                  </div>
              </div>
          </div>

          <!-- Modal ends here -->

         </div>
     </div>
  </div>
</div>

<?php $this->load->view('includes/footer'); ?>
