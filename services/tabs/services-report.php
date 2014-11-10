<?php 

/* Get access to database */
global $edmsdb;

?>

<div class="table-responsive reports hidden" id="report_services">
 <h2 class="sub-header">Repairs & Services</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Service ID</th>
        <th>Technician</th>
        <th>Advisor</th>
        <th>Customer</th>
        <th>Date Opened</th>
        <th>Date Closed</th>
      </tr>
    </thead>
    <tbody>

<?php

/**
 * Loop through array of ServiceTickets table rows and echo out
 */
foreach( $edmsdb->getServiceReport() as $serviceReport )
{
?>

  <tr>
    <td><?php echo $serviceReport["id"]; ?></td>
    <td><?php echo $serviceReport["tech_id"]; ?></td>
    <td><?php echo $serviceReport["advisor_id"]; ?></td>
    <td><?php echo $serviceReport["customer_id"]; ?></td>
    <td><?php echo $serviceReport["date_opened"]; ?></td>
    <td><?php echo $serviceReport["date_closed"]; ?></td>
	<td>
		<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal" data-id="<?php echo $serviceReport["id"]; ?>">More Details</button>
	</td>
  </tr>

<?php

}

?>

    </tbody>
  </table>
</div>
