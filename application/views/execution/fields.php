<div class="form-group row">
     <label class="col-sm-3 col-form-label">Project</label>
          <select class="form-control col-sm-9" name="project" value="<?php echo $this->input->post('project'); ?>" onchange="getTestCasesReport()">
            <option value="" <?php echo in_array($this->input->post('project'), [NULL, ""])  ? 'selected' : '';?>>--- Select ---</option>
              <option value="Revlon UK" <?php echo $this->input->post('project') === 'Revlon UK' ? 'selected' : ''?>>Revlon UK</option>
              <option value="Revlon US" <?php echo $this->input->post('project') === 'Revlon US' ? 'selected' : ''?>>Revlon US</option>
              <option value="Hot Tools" <?php echo $this->input->post('project') === 'Hot Tools' ? 'selected' : ''?>>Hot Tools</option>
         </select>
     <input type="hidden"  name="confirm" value="true"/>
 </div>
 <div class="form-group row">
      <label class="col-sm-3 col-form-label">Environment</label>
      <select class="form-control col-sm-9" name="environment" value="<?php echo $this->input->post('environment')?>" onchange="getTestCasesReport()">
        <option value="" <?php echo in_array($this->input->post('environment'), [NULL, ""])  ? 'selected' : '';?>>--- Select ---</option>
          <option value="Staging" <?php echo $this->input->post('environment') === 'Staging' ? "selected" : ''?>>Staging</option>
          <option value="Production" <?php echo $this->input->post('environment') === 'Production' ? "selected" : ''?>>Production</option>
      </select>
  </div>

  <div class="form-group row">
       <label class="col-sm-3 col-form-label">Testing Type</label>
       <select class="form-control col-sm-9" name="testingTYpe" value="<?php echo $this->input->post('testingTYpe')?>"  onchange="getTestCasesReport()">
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
          <input type="radio" name="device" value="web" <?php echo in_array($this->input->post('device'), ["web", "", null])  ? 'checked' : '';?> id="webRadio"/>
          <label for="webRadio">Web</label>
          <input type="radio" name="device" value="mobile" <?php echo $this->input->post('device') === 'mobile' ? "checked" : "";?> id="mobRadio" />
          <label for="mobRadio">Mobile</label>
      </div>
    </div>

    <div class="form-group row" id="web">
         <label class="col-sm-3 col-form-label">Browsers</label>
         <select class="form-control col-sm-9" name="browsers" value="<?php echo $this->input->post('browsers')?>" >
            <option value="" <?php echo in_array($this->input->post('browsers'), [NULL, ""])  ? 'selected' : '';?>>--- Select ---</option>
             <option value="Chrome"  <?php echo $this->input->post('browsers') === 'Chrome' ? "selected" : ''?>>Chrome</option>
             <option value="Firefox"  <?php echo $this->input->post('browsers') === 'Firefox' ? "selected" : ''?>>Firefox</option>
             <option value="Safari"  <?php echo $this->input->post('browsers') === 'Safari' ? "selected" : ''?>>Safari</option>
         </select>
     </div>

     <div class="form-group row" id="mobile">
          <label class="col-sm-3 col-form-label">Devices</label>
          <select class="form-control col-sm-9" name="devices" value="<?php echo $this->input->post('devices')?>" >
                                        <option value="" <?php echo in_array($this->input->post('devices'), [NULL, ""])  ? 'selected' : '';?>>--- Select ---</option>
                                          <option value="iPhone" <?php echo $this->input->post('devices') === 'iPhone' ? "selected" : ''?>>iPhone</option>
                                          <option value="Android"  <?php echo $this->input->post('devices') === 'Android' ? "selected" : ''?>>Android</option>
                                          <option value="iPad"  <?php echo $this->input->post('devices') === 'iPad' ? "selected" : ''?>>iPad</option>
                                      </select>
      </div>

      <div class="form-group row" id="testcases_block">
          <label class="col-sm-3 col-form-label">No of Test Cases</label>
          <input class="form-control col-sm-5" type="text" name="testcases" value="<?php echo $this->input->post('testcases')?>" readonly/>
          <a style="margin-top: 7px;margin-left: 25px" href="void(0)" data-toggle="modal" data-target="#detailedTestCases">Detailed List</a>

           <!-- Detailed Tests Modal-->
    <div class="modal fade" id="detailedTestCases" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detailed Tests</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                <table class="table table-bordered" id="dataTable3" width="100%" cellspacing="0">
                                   <thead>
                                       <tr style="background-color: #e2e2e2;border:1px solid #b6b6b6">
                                           <th style="width:150px;">Test Case Id</th>
                                           <th style="width:250px;">Test Script Name</th>
                                           <th style="width:1000px;">Description</th>
                                       </tr>
                                   </thead>

                                   <tbody>
                                   
                                   


                                   </tbody>
                               </table>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    
                </div>
            </div>
        </div>
</div>

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
        <em class="help-block float-right col-sm-6 text-italic">(Enter comma separated values)</em>
    </div>
