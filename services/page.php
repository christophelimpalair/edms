<?php
include_once '../header.php';
?>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active" data-target="tech_report"><a href="#">Reports</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li data-target="tech_parts"><a href="#" >Parts</a></li>
            <li data-target="tech_services"><a href="#" >Repairs & Services</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main " id="tech_report">
          <h2 class="sub-header">Reports</h2>
          <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 placeholder">
              <img data-src="holder.js/200x200/auto/sky/text:Click to View" class="img-responsive" alt="Generic placeholder thumbnail" data-target="report_parts">
              <h4>Parts Report</h4>
              <span class="text-muted">View parts ordered and used</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img data-src="holder.js/200x200/auto/vine/text:Click to View" class="img-responsive" alt="Generic placeholder thumbnail" data-target="report_services">
              <h4>Repairs & Services Report</h4>
              <span class="text-muted">View details for repairs and services</span>
            </div>
          </div>
		<?php

			/* Load Parts Report */
           get_template_part( 'tabs' , 'parts-report' );
           /* Load Service Report */
		   get_template_part( 'tabs' , 'services-report' ); 

		?>
              
        </div>
		
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 hidden" id="tech_parts">
		  <h2 class="sub-header">Parts</h2>
		   
        <?php 
        	/* Load Recently Ordered Parts */
        	get_template_part('tabs', 'parts'); 

        ?>
              

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
							</select></td>
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
		</div>
		
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 hidden" id="tech_services">
		  <h2 class="sub-header">Repairs & Services</h2>
		  
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
                <tr>
                  <td>1,001</td>
                  <td>Lorem</td>
                  <td>ipsum</td>
                  <td>dolor</td>
                  <td>sit</td>
				  <td>
					<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">Close Service</button>
				  </td>
                </tr>
                <tr>
                  <td>1,002</td>
                  <td>amet</td>
                  <td>consectetur</td>
                  <td>adipiscing</td>
                  <td>elit</td>
				  <td>
					<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">Close Service</button>
				  </td>
                </tr>
                <tr>
                  <td>1,003</td>
                  <td>Integer</td>
                  <td>nec</td>
                  <td>odio</td>
                  <td>Praesent</td>
				  <td>
					<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">Close Service</button>
				  </td>
                </tr>
                <tr>
                  <td>1,003</td>
                  <td>libero</td>
                  <td>Sed</td>
                  <td>cursus</td>
                  <td>ante</td>
				  <td>
					<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">Close Service</button>
				  </td>
                </tr>
              </tbody>
            </table>
          </div>
		  
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
			  
		</div>
		
      </div>
    </div>
	
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?php
include_once '../footer.php';
?>
