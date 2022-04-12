<div id="container" class="container-fluid">
<div class="col-12 app-content">
			<div id="content">
<br>
<form method="post" action="runtestsnew.php" enctype="multipart/form-data">
                    <div>
                        <label style="text-align:right; margin-left:8px;">App URL : </label>
                        <input type="text" value="" id="appurl" name="appurl" />
                        <label>(Ex: https://hyd-onebox39.haicpm.com/TenantApp)</label>
                    </div>
                    <br />
                    <div>
                        <label style="text-align:right; margin-left:8px;">Email(s) : </label>
                        <input type="text" value="" id="email" name="email" />
                        <label>(Comma separated for multiple email ids)</label>
                    </div>
                    <br />
					<div>
                        <label style="text-align:right; margin-left:8px;">Select Suite : </label>
                        <select id="suitetype" name="suitetype">
						  <option value="BVT">BVT</option>
						  <option value="ExtBVT">Extended BVT1</option>
						</select>
                    </div>
                    <br />
                    <div>
                        <label style="text-align:right; margin-left:8px;"><b>Prerequisites:</b></label>
                    </div>
                    <br />
                    <div>
                        <label style="text-align:right; margin-left:8px;"><b>1. Make sure BVT/ExtBVT tenants are copied......</b></label>
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