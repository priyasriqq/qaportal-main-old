<div id="container" class="container-fluid">
	<div class="row flex-xl-nowrap">
		<div class="col-12 app-content">
        <div id="content">
				<table class="table table-striped table-hover" cellpadding="5" style="border-collapse:collapse;">
    <thead style="background-color: #e6e6e6;">
    <tr >
        <th scope="col" >ID</th>
        <th scope="col" >Date</th>
        <th scope="col" >Common Areas</th>
        <th scope="col" >DI</th>
        <th scope="col" >Consolidation</th>
        <th scope="col" >Reporting</th>
        <th scope="col" >Operational Planning</th>
        <th scope="col" >Workforce Planning</th>
        <th scope="col" >Revenue Planning</th>
        <th scope="col" >EUB</th>
    </tr>
</thead>
<tbody>

<?php foreach($status as $s) : ?>
<tr>
    <td scope="row" ><?php echo $s['ID']; ?></td>
    <td ><?php echo $s['Date']; ?></td>
    <td ><?php echo $s['CommonAreas']; ?></td>
    <td ><?php echo $s['DI']; ?></td>
    <td ><?php echo $s['Consolidation']; ?></td>
    <td ><?php echo $s['Reporting']; ?></td>
    <td ><?php echo $s['OperationalPlanning']; ?></td>
    <td ><?php echo $s['WorkforcePlanning']; ?></td>
    <td ><?php echo $s['RevenuePlanning']; ?></td>
    <td ><?php echo $s['EUB']; ?></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
            </div>
		</div>
	</div>
</div>