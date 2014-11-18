<?php 

/* Get access to database */
global $edmsdb;

?>

<div class="table-responsive reports hidden" id="report_parts">
  <h2 class="sub-header">Parts</h2>
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
$query = $edmsdb->prepare('SELECT * FROM parts');
$query->execute();
/**
 * Loop through array of Parts table rows and echo
 */
foreach( $query->fetchAll() as $partsReport ) {
?>

   <tr>
    <td><?php echo $partsReport["part_name"]; ?></td>
    <td><?php echo $partsReport["stock_amt"]; ?></td>
    <td><?php echo $partsReport["ordered_amt"]; ?></td>
	<td>
		<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal" data-id="<?php echo $partsReport["id"]; ?>">Order Received</button>
	</td>
  </tr>

<?php
}

?>

	  </tbody>
	</table>
</div>