

<div id="container" class="container-fluid">
</br></br></br>
        <form method="post" action="<?php echo site_url();?>/ViewAudit">
            <center>
            <b> Audit Type:</b>
            
                <select name="auditType" >
                <?php foreach($aTypes as $aType) : ?>
                    <option value="<?= $aType['AuditType']; ?>"><?= $aType['AuditType']; ?></option>
                <?php endforeach; ?>
                </select>
            &nbsp;&nbsp;&nbsp;
            
            <b>User:</b> <input type="text" name="username" value="<?php if(isset($_POST['username'])){echo $_POST['username']; }else {echo $_SESSION['user'];}?>" >
            
            &nbsp;&nbsp;&nbsp;
            
            <b>From:</b> <input type="date" name="from" value="<?= date("Y-m-d");?>">
            &nbsp;&nbsp;&nbsp;
            
            <b>To:</b> <input type="date" name="to" value="<?= date("Y-m-d");?>">
            &nbsp;&nbsp;&nbsp;
            
            <input type="submit">
            </center>
        </form>
<!-- <?php print_r($audits);?> -->
</br> </br>
 <div class="row flex-xl-nowrap">
	<div class="col-12 app-content">
     <div id="content">
		
        <table class="table table-striped table-hover" cellpadding="5" style="border-collapse:collapse;">
            <thead style="background-color: #e6e6e6; text-align: center;">
                <tr >
                    <th scope="col" >ID</th>
                    <th scope="col" >User</th>
                    <th scope="col" >Audit Type</th>
                    <th scope="col" >Activity</th>
                    <th scope="col" >Machine IP</th>
                    <th scope="col" >Activity Time</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach($audits as $audit) : ?>
                <tr>
                    <td scope="row" align="center"><?php echo $audit['ID']; ?></td>
                    <td align="center" ><?php echo $audit['User']; ?></td>
                    <td align="center" ><?php echo $audit['AuditType']; ?></td>
                    <td align="center" ><?php echo $audit['Activity']; ?></td>
                    <td align="center" ><?php echo $audit['MachineIP']; ?></td>
                    <td align="center" ><?php echo $audit['ActivityTime']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
     </div>
	</div>
</div>
</div> 
