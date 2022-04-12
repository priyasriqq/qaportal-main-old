<div id="container" class="container-fluid">
<div class="col-12 app-content">
			<div id="content">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<br>
<form method="post" action="runtestsnew.php" enctype="multipart/form-data">
  
   
        <table class =" table  table-striped  table-hover"  cellpadding="5" style="border-collapse:collapse;">
        <thead style="background-color: #e6e6e6; text-align: center;">
        <tr>
        <th >Execute Tests</th>
        <th >System Health&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
        <th >Audit Report&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
        </tr>
        </thead><tbody>
        <tr>
        <td></td>
        <td></td>
        </tr>
        <tr>
        <td></td>
        <td></td>
        </tr>
        <tr>
        <td></td>
        <td></td>
        </tr>
        <tr>
        <td></td>
        <td></td>
        </tr>
        <tr>
        <td><div>
                        <label style="text-align:right; margin-left:8px;">Project : </label>
                        
                    </div></td>&nbsp;
        <td><select id="suitetype" name="suitetype">
						  <option value="BVT">Revlon UK</option>
						  <option value="BVT">Revlon US</option>
                          <option value="BVT">Hydroflask</option>
                          <option value="BVT">OXO</option>
                          <option value="BVT">Braun</option>
                          <option value="BVT">DryBar</option>
						</select></td>
      
        </tr>
        <tr>
        <td><div>
        <label style="text-align:right; margin-left:8px;">Environment : </label>
                        
                    </div></td>&nbsp;
        <td>                    <div>
                      
                        <select id="suitetype" name="suitetype">
						  <option value="BVT">Staging</option>
						  <option value="BVT">Production</option>
                          <option value="BVT">Development</option>
						</select>
                    </div></td>
      
        </tr>
        <tr>
        <td><div>
        <label style="text-align:right; margin-left:8px;">Testing Type : </label>
                        
                    </div></td>&nbsp;
        <td>                    <div>
                      
        <select id="suitetype" name="suitetype">
						  <option value="BVT">Web</option>
						  <option value="BVT">Mobile</option>
						</select>
                    </div></td>
      
        </tr>
        <tr>
        <td><div>
        <label style="text-align:right; margin-left:8px;">Browser : </label>
                        
                    </div></td>&nbsp;
        <td>                    <div>
                      
        <select id="suitetype" name="suitetype">
						  <option value="BVT">Chrome</option>
						  <option value="BVT">Firefox</option>
                          <option value="BVT">Safari</option>
						  <option value="BVT">iPhone X</option>
                          <option value="BVT">iPad</option>
						</select>
                    </div></td>
      
        </tr>
        <tr>
        <td><div>
        <label style="text-align:right; margin-left:8px;">Schedule/Run Now : </label>
                        
                    </div></td>&nbsp;
        <td>                    <div>
        <input type="text" value="02-23-2021 09:00PM" id="appurl" name="appurl" ><i class="fa fa-calendar"></input>
                    </div></td>
      
        </tr>
        <tr>
        <td><div>
        <label style="text-align:right; margin-left:8px;">Emails (Comma separated) : </label>
                        
                    </div></td>&nbsp;
        <td>                    <div>
        <input type="text" value="" id="appurl" name="appurl" />
                    </div></td>
      
        </tr>
        <tr>
        <td><div>
        
                        
                    </div></td>&nbsp;
        <td>    <div>                        
                         <button type="submit" name="submit" value="Submit" ">Run</button>
                    </div></td>
      
        </tr>
        </tbody><br>
                  
                </form>
            </div>
        </div>
</div>