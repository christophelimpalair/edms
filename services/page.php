<?php
include_once '../header.php';

// Reset at every page load
$page = null;

/* Page controls */
if ( isset($_GET["p"]) && $_GET["p"] === "reports" ) : 

  // Load Reports page
  $page = "reports";

elseif ( isset($_GET["p"]) && $_GET["p"] === "parts" ) :
  // Load Parts page
  $page = "parts";

elseif ( isset($_GET["p"]) && $_GET["p"] === "services" ) : 

  // Load services page
  $page = "services";

else :
  // URL not properly set
?>

  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main " id="nothing_to_show">
    <?php echo "Nothing to show at this URL"; ?>
  </div>

<?php

endif; 

?>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="<?php if ( $page === "reports" ) echo 'active'; ?>" data-target="tech_report"><a href="?p=reports">Reports</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li class="<?php if ( $page === "parts" ) echo 'active'; ?>" data-target="tech_parts"><a href="?p=parts&t=recent" >Parts</a></li>
            <li class="<?php if ( $page === "services" ) echo 'active'; ?>" data-target="tech_services"><a href="?p=services&t=progress" >Repairs & Services</a></li>
          </ul>
        </div>
        
        <?php if ( $page === "reports" ) : ?>
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
        <?php endif; ?>

    <?php if ( $page === "parts" ) : ?>    
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2" id="tech_parts">
     <h2 class="sub-header">Parts</h2>
      
      <?php 
      /* Load Parts Tab */
      get_template_part('parts', 'tabs'); 
      ?>
    </div>
    <?php endif; ?>
  
    <?php if ( $page === "services" ) : ?>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2" id="tech_services">
     <h2 class="sub-header">Repairs & Services</h2>
      
      <?php
      /* Load Services Tab */
      get_template_part('services', 'tabs' ); 
      ?>              
    </div>
    <?php endif; ?>

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
