<?php 

/* Get access to database */
global $edmsdb;

?>
<p>
  <button type="button" class="btn btn-primary btn-lg menu" data-target="services_in_progress">In Progress</button>
  <button type="button" class="btn btn-primary btn-lg menu" data-target="schedule_service">Schedule</button>
  <button type="button" class="btn btn-primary btn-lg menu" data-target="search_service">Search</button>
</p>

<section id="services_in_progress" class="hidden">
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
</section>

<section id="schedule_service" class="hidden">
  <h3>Schedule a Repair or Service</h3>
	<form role="schedule-service" class="form_schedule_service">
	  <table class="table">
		<tr>
		  <td><span class="glyphicon glyphicon-cog"></span> Advisor Name:</td>
		  <td>
			<select class="form-control">
			<?php
			/**
			 * Select
			 */
			$query = $edmsdb->prepare('SELECT * FROM employee WHERE department = "advisor"');
			$query->execute();


			/**
			 * Loop through array of Parts table rows and echo out
			 */
			foreach( $query->fetchAll() as $advisor )
			{
			?>

			  <option class="schedule_service_advisor_id" value="<?php echo $advisor["id"];?>"><?php echo $advisor["fname"] . " " . $advisor["lname"]; ?></option>
			    
			<?php
			}
			?>
			</select>
		  </td>
		</tr>
		<tr>
		  <td><span class="glyphicon glyphicon-cog"></span> Technician Name:</td>
		  <td>
			<select class="form-control">
		    <?php
			/**
			 * Select
			 */
			$query = $edmsdb->prepare('SELECT * FROM employee WHERE department = "technician"');
			$query->execute();


			/**
			 * Loop through array of Parts table rows and echo out
			 */
			foreach( $query->fetchAll() as $technician )
			{
			?>

			  <option class="schedule_service_tech_id" value="<?php echo $technician["id"];?>"><?php echo $technician["fname"] . " " . $technician["lname"]; ?></option>
			    
			<?php
			}
			?>
			</select>
		  </td>
		</tr>
		<tr>
		  <td><span class="glyphicon glyphicon-plus"></span> Reason: <small>(limit: 100 characters)</small></td>
		  <td>
			<div class="form-group">
				<textarea class="form-control schedule_service_reason" rows="3" maxlength="100" placeholder="Enter reason(s) for service"></textarea>
			</div>
		  </td>
		</tr>
		<tr>
		  <td><span class="glyphicon glyphicon-usd"></span> VIN:</td>
		  <td>
			<div class="form-group">
				<input type="text" class="form-control schedule_service_vin" placeholder="Example: LJCPCBLCX11000237">
			</div>
		  </td>
		</tr>
		<tr>
		  <td></td>
		  <td>
			<button type="submit" class="btn btn-default" id="schedule_service_btn"><span class="glyphicon glyphicon-ok"></span> Schedule</button>
			<p class="error hidden"></p>
		  </td>
		</tr>
	 </table>
	</form>
</section>

<section id="search_service" class="hidden">		
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
</section>
