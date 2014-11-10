<?php 

/* Get access to database */
global $edmsdb;

?>

<h3>Parts Recently Ordered</h3> <small>(Ordered in the last 7 days)</small>
  <table class="table table-striped">
	<thead>
	  <tr>
    	<th>Part Name</th>
		<th>Stock Amount</th>
		<th>Ordered Amount</th>
		<th></th>
	  </tr>
	</thead>
	<tbody>

<?php

/**
 * Loop through array of Parts table rows and echo out
 */
foreach( $edmsdb->recentOrderedParts() as $recentOrderedParts )
{
?>

  <tr>
    <td><?php echo $recentOrderedParts["part_name"]; ?></td>
    <td><?php echo $recentOrderedParts["stock_amt"]; ?></td>
    <td><?php echo $recentOrderedParts["ordered_amt"]; ?></td>
	<td>
		<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal" data-id="<?php echo $recentOrderedParts["id"]; ?>">More Details</button>
	</td>
    </tr>

<?php
}

?>

	</tbody>
  </table>