<?php 

/* Get access to database */
global $edmsdb;

?>

 <h3>Services in Progress</h3>
  <div class="table-responsive">
    <table class="table table-striped">
     <thead>
     	<tr>
            <th>Service ID</th>
            <th>Technician Name</th>
			<th>Advisor Name</th>
			<th>Customer Name</th>
			<th>Time Opened</th>
			<th></th>
		</tr>
      </thead>
	  <tbody>

	   </tbody>
<?php
/**
 * Select
 */
$query = $edmsdb->prepare('SELECT * FROM servicetickets WHERE date_closed IS NULL');
$query->execute();


/**
 * Loop through array of Parts table rows and echo out
 */
foreach( $query->fetchAll() as $currentServices )
{
?>

  <tr>
    <td><?php echo $currentServices["id"]; ?></td>
    <td><?php echo $currentServices["tech_id"]; ?></td>
    <td><?php echo $currentServices["advisor_id"]; ?></td>
    <td><?php echo $currentServices["customer_id"]; ?></td>
    <td><?php echo $currentServices["date_opened"]; ?></td>
	<td>
		<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal" data-id="<?php echo $currentServices["id"]; ?>">Close Service</button>
	</td>
  </tr>

<?php
}
?>
	</tbody>
</table>
<h3>Schedule a Repair or Service</h3>
			  <form role="schedule-service">
				  <table class="table">
					<tr>
						<td><span class="glyphicon glyphicon-cog"></span> Advisor Name:</td>
						<td>
							<select class="form-control">
								<option>Option 1</option>
								<option>Option 2</option>
								<option>Option 3</option>
								<option>Option 4</option>
								<option>Option 5</option>
							</select></td>
					</tr>
					<tr>
						<td><span class="glyphicon glyphicon-cog"></span> Technician Name:</td>
						<td>
							<select class="form-control">
								<option>Option 1</option>
								<option>Option 2</option>
								<option>Option 3</option>
								<option>Option 4</option>
								<option>Option 5</option>
							</select></td>
					</tr>
					<tr>
						<td><span class="glyphicon glyphicon-plus"></span> Reason:</td>
						<td>
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Example: 5">
							</div>
						</td>
					</tr>
					<tr>
						<td><span class="glyphicon glyphicon-usd"></span> VIN:</td>
						<td>
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Example: 56.99">
							</div>
						</td>
					</tr>
					<tr>
						<td></td>
						<td>
							<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-ok"></span> Schedule</button>
						</td>
					</tr>
				</table>
			  </form>
			
		    <h3>Search Repairs & Services</h3>
			 <h5>Only one of these fields is necessary</h5>
			  <form role="parts-order">
				  <table class="table">
					<tr>
						<td><span class="glyphicon glyphicon-cog"></span> Repair ID:</td>
						<td>
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Example: 1001">
							</div>
						</td>
					</tr>
					<tr>
						<td><span class="glyphicon glyphicon-cog"></span> Customer Name:</td>
						<td>
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Example: Joel Miller">
							</div>
						</td>
					</tr>
					<tr>
						<td><span class="glyphicon glyphicon-cog"></span> Technician Name:</td>
						<td>
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Example: David Lammee">
							</div>
						</td>
					</tr>
					<tr>
						<td><span class="glyphicon glyphicon-cog"></span> Advisor Name:</td>
						<td>
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Example: David Nguyen">
							</div>
						</td>
					</tr>
					<tr>
						<td><span class="glyphicon glyphicon-cog"></span> VIN Number:</td>
						<td>
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Example: LJCPCBLCX11000237">
							</div>
						</td>
					</tr>
					<tr>
						<td></td>
						<td>
							<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span> Find</button>
						</td>
					</tr>
				</table>
			  </form>
