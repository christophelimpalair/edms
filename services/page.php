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
        get_template_part( 'parts-report' , 'tabs' );
        /* Load Service Report */
        get_template_part( 'services-report' , 'tabs' ); 
        ?>  
        </div>

		
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 hidden" id="tech_parts">
     <h2 class="sub-header">Parts</h2>
      
      <?php 
      /* Load Parts Tab */
      get_template_part('parts', 'tabs'); 
      ?>
    </div>

		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 hidden" id="tech_services">
     <h2 class="sub-header">Repairs & Services</h2>
      
      <?php
      /* Load Services Tab */
      get_template_part('services', 'tabs' ); 
      ?>              
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
        <!-- Info goes here -->...
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
