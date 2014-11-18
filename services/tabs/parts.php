<?php 

/* Get access to database */
global $edmsdb;

?>

<p>
  <button type="button" class="btn btn-primary btn-lg menu" data-target="parts_recently_ordered">Recently Ordered</button>
  <button type="button" class="btn btn-primary btn-lg menu" data-target="order_parts">Order</button>
  <button type="button" class="btn btn-primary btn-lg menu" data-target="search_parts">Search</button>
</p>

<section id="parts_recently_ordered" class="hidden">
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
 * Select parts ordered within the last 7 days
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
</section>

<section id="order_parts" class="hidden">
  <h3>Order Parts</h3>
	<form role="parts-order" class="form_parts_order">
	 <table class="table">
	    <tr>
			<td><span class="glyphicon glyphicon-cog"></span>Part Name:</td>
			<td>
				<div class="form-group">
					<input type="text" class="form-control part_name" placeholder="Example: Wheel Bearing">
				</div>
			</td>
		</tr>
		<tr>
			<td><span class="glyphicon glyphicon-plus"></span> Part Number:</td>
			<td>
				<div class="form-group">
					<input type="text" class="form-control part_number" placeholder="Example: NCV10142">
				</div>
			</td>
		</tr>
		<tr>
			<td><span class="glyphicon glyphicon-plus"></span> Order Amount:</td>
			<td>
				<div class="form-group">
					<input type="text" class="form-control order_amount" placeholder="Example: 5">
				</div>
			</td>
		</tr>
		<tr>
			<td><span class="glyphicon glyphicon-usd"></span> Inventory Cost Per Unit:</td>
			<td>
				<div class="form-group">
					<input type="text" class="form-control inventory_cost" placeholder="Example: 56.99">
				</div>
			</td>
		</tr>
		<tr>
			<td><span class="glyphicon glyphicon-usd"></span> Retail Cost Per Unit:</td>
			<td>
				<div class="form-group">
					<input type="text" class="form-control retail_cost" placeholder="Example: 56.99">
				</div>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<button type="submit" class="btn btn-default" id="order_parts_btn"><span class="glyphicon glyphicon-save"></span> Order Parts</button>
				<p class="error hidden"></p>
			</td>
			<td></td>
		</tr>
	 </table>
	</form>
</section>
		
<section id="search_parts" class="hidden">	  
	<h3>Search Parts</h3>
	  <form role="parts-search">
		<table class="table">
	      <tr>
			<td><span class="glyphicon glyphicon-cog"></span> Part Name:</td>
			<td>
				<select class="form-control">
					<?php
			    	/**
 					* Select available parts
 					*/
			    	$query = $edmsdb->prepare("SELECT id, part_name FROM parts");
			    	$query->execute();
			    	/**
					 * Loop through parts for drop-down select menu. Value = ID, Option = Name 
					 */
			    	foreach ( $query->fetchAll() as $parts ) { ?>
					<option value="<?php echo $parts["id"];?>"><?php echo $parts["part_name"]; ?></option>
				<?php } ?>
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
</section>
