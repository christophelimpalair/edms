<?php 

/* Get access to database */
global $edmsdb;

// Check which tab to load
  if ( isset($_GET["t"]) ) {

    switch( $_GET["t"] ) {
      case "recent":
          $tab = "recent";
          break;
      case "order":
          $tab = "order";
          break;
      case "search":
          $tab = "search";
          break;
    }

  } else {
  	echo "URL is not properly set";
  	return;
  }
?>

<p>
  <a href="?p=parts&t=recent"><button type="button" class="btn btn-primary btn-lg menu <?php if ( $tab === "recent" ) echo 'active'; ?>">Recently Ordered</button></a>
  <a href="?p=parts&t=order"><button type="button" class="btn btn-primary btn-lg menu <?php if ( $tab === "order" ) echo 'active'; ?>">Order</button></a>
  <a href="?p=parts&t=search"><button type="button" class="btn btn-primary btn-lg menu <?php if ( $tab === "search" ) echo 'active'; ?>">Search</button></a>
</p>

<?php if ( $tab === "recent" ) : ?>
<section id="parts_recently_ordered">
  <h3>Parts Recently Ordered</h3> <small>(Orders still on the way)</small>
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
 * Select parts still in transit
 * Inventory amount = 0 and ordered amount is > 0
 */
$query = $edmsdb->prepare('SELECT * FROM parts WHERE ordered_amt > 0 AND stock_amt < 1');
$query->execute();

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
		<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal" data-id="<?php echo $recentOrderedParts["id"]; ?>">Received Order</button>
	</td>
    </tr>

<?php
}

?>

	</tbody>
  </table>
</section>
<?php endif; ?>

<?php if ( $tab === "order" ) : ?>
<section id="order_parts">
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
<?php endif; ?>

<?php if ( $tab === "search" ) : ?>
<section id="search_parts" class="form_search_parts">	  
	<h3>Search Parts</h3>
	  <form role="parts-search">
		<table class="table">
	      <tr>
			<td><span class="glyphicon glyphicon-cog"></span> Part Name:</td>
			<td>
				<select class="form-control select_part">
					<option value="all">Search all</option>
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
				<button type="submit" class="btn btn-default" id="search_parts_btn"><span class="glyphicon glyphicon-search"></span> Find</button>
				<p class="error hidden"></p>
			</td>
     	  </tr>
		</table>
	  </form>
</section>
<?php endif; ?>