<div id="container" class="container-fluid">
<div class="col-12 app-content">
			<div id="content">
<br>
<form method="post" action="runtestsnew.php" enctype="multipart/form-data">
<div>
                        <label style="text-align:right; margin-left:8px;">Project : </label>
                        <select id="suitetype" name="suitetype">
						  <option value="BVT">Revlon UK</option>
						  <option value="BVT">Revlon US</option>
                          <option value="BVT">Hydroflask</option>
                          <option value="BVT">OXO</option>
                          <option value="BVT">Braun</option>
                          <option value="BVT">DryBar</option>
						</select>
                    </div>
                    <br />
                    <div>
                        <label style="text-align:right; margin-left:8px;">Environment : </label>
                        <select id="suitetype" name="suitetype">
						  <option value="BVT">Staging</option>
						  <option value="BVT">Production</option>
                          <option value="BVT">Development</option>
						</select>
                    </div>
                    <br />
					<div>
                        <label style="text-align:right; margin-left:8px;">Testing Type : </label>
                        <select id="suitetype" name="suitetype">
						  <option value="BVT">Mobile</option>
						  <option value="BVT">Web</option>
						</select>
                    </div>
                    <br />
                    <div>
                        <label style="text-align:right; margin-left:8px;">Browser : </label>
                        <select id="suitetype" name="suitetype">
						  <option value="BVT">Chrome</option>
						  <option value="BVT">Firefox</option>
                          <option value="BVT">Safari</option>
						  <option value="BVT">iPhone X</option>
                          <option value="BVT">iPad</option>
						</select>
                    </div>
                    <br />
                    <div>
                        <label style="text-align:right; margin-left:8px;">App URL : </label>
                        <input type="text" value="" id="appurl" name="appurl" />
                        <label>(Ex: https://hyd-onebox39.haicpm.com/TenantApp)</label>
                    </div>
                    <div>
                        <label style="text-align:right; margin-left:8px;"><b>Prerequisites:</b></label>
                    </div>
                    <br />
                    <div>
                        <label style="text-align:right; margin-left:8px;"><b>1. Make sure BVT/ExtBVT tenants are copied.</b></label>
                    </div>
                    <div>
                        <label style="text-align:right; margin-left:8px;"><b>2. Execution environment is deployed with current major release code base.</b></label>
                    </div>
                    <br />
					<div>
                        <label style="text-align:right; margin-left:8px;"><b>Note: OKTA will not be part of BVT as we are not configuring it for OneBox Environments.</b></label>
                    </div>
                    <br />
                    <div>                        
                         <button type="submit" name="submit" value="Submit" ">Submit</button>
                    </div>
                    <br /> 
                  
                </form>
            </div>
        </div>
</div>