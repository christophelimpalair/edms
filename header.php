<?php
require_once 'init.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
	
	<title><?php get_name(); ?></title>

    <!-- Bootstrap core CSS -->
    <link href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/edms/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/edms/css/custom.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body id="<?php echo page_id(); ?>">

  <?php 

    /* Get Private Nav Bar */
    if ( page_id() != "index" )
      get_navbar();

  ?>