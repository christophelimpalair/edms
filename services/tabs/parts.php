<?php 

/* Get access to database */
global $edmsdb;

?>
 <h2 class="sub-header">Parts</h2>
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
 * Select
 */
$seven_days_ago = date('Y/m/d', strtotime('-7 days'));

$query = $edmsdb->prepare('SELECT * FROM parts WHERE ordered_date > :date');
$query->execute( array( ":date" => $seven_days_ago ) );

/**
 * Loop through array of Parts table rows and echo out
 */
foreach( $query->fetchAll() as $recentOrderedParts )
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

  <h3>Order Parts</h3>
	<form role="parts-order">
	 <table class="table">
	    <tr>
			<td> Part Name:</td>
			<td><span class="glyphicon glyphicon-cog"></span>
			    <select class="form-control">
					<option>Option 1</option>
					<option>Option 2</option>
					<option>Option 3</option>
					<option>Option 4</option>
					<option>Option 5</option>
				</select>
			</td>
		</tr>
		<tr>
			<td><span class="glyphicon glyphicon-plus"></span> Order Amount:</td>
			<td>
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Example: 5">
				</div>
			</td>
		</tr>
		<tr>
			<td><span class="glyphicon glyphicon-usd"></span> Inventory Cost Per Unit:</td>
			<td>
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Example: 56.99">
				</div>
			</td>
		</tr>
		<tr>
			<td><span class="glyphicon glyphicon-usd"></span> Retail Cost Per Unit:</td>
			<td>
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Example: 56.99">
				</div>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-save"></span> Order Parts</button>
			</td>
		</tr>
	 </table>
	</form>
			  
	<h3>Search Parts</h3>
	  <form role="parts-search">
		<table class="table">
	      <tr>
			<td>Part Name:</td>
			<td><span class="glyphicon glyphicon-cog"></span> 
				<select class="form-control">
					<option>Option 1</option>
					<option>Option 2</option>
					<option>Option 3</option>
					<option>Option 4</option>
					<option>Option 5</option>
				</select></td>
		  </tr>
		  <tr>
			<td></td>
			<td>
				<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span> Find</button>
			</td>
     	  </tr>
		</table>
	  </form>

