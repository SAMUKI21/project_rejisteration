<?php
include_once 'Database.php';

session_start();
	if (!isset($_SESSION['login_typepro']))
	{
		echo'<script> alert ("Access Denied!!!");</script>';
		header('Location: index.php');
		print 'lll';
	}
	print 'fff';
	require_once ("Database.php");
	require_once ("phpfncs/Funcs.php");
	$db =new DBOperations();
	$fncs= new FRMOperations();


if(isset($_POST['btn-save']))
{
 // variables for input data
 
 $pt_short_des = $_POST['pt_short_des'];
 $pt_description = $_POST['pt_description'];
 

 // variables for input data

 // sql query for inserting data into database
 $sql_query = "INSERT INTO pr_project_types(pt_short_des,pt_description) VALUES('$pt_short_des','$pt_description')";
 // sql query for inserting data into database
 
 // sql query execution function
 if(mysql_query($sql_query))
 {
  ?>
  <script type="text/javascript">
  alert('Data Inserted Successfully ');
  window.location.href='ProjectTypesView.php';
  </script>
  <?php
 }
 else
 {
  ?>
  <script type="text/javascript">
  alert('error occured while inserting your data');
  </script>
  <?php
 }
 // sql query execution function
}
?>


<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
<!-- HEAD SECTION -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PMS</title>
<!--GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <!--BOOTSTRAP MAIN STYLES -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!--FONTAWESOME MAIN STYLE -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <!--CUSTOM STYLE -->
    <link href="assets/css/style.css" rel="stylesheet" />
<meta name="keywords" content="Wooden Blog Template, HTML, CSS" />
<meta name="description" content="Wooden Blog Template, HTML CSS layout available for free of charge" />
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="jquerycssmenu.css" />

<!--[if lte IE 7]>
<style type="text/css">
html .jquerycssmenu{height: 1%;} /*Holly Hack for IE7 and below*/
</style>
<![endif]-->
<script language="JavaScript">
function previous()
{
history.back();
}
</script>
<script type="text/javascript" src="js/jquery.min.1.2.6.js"></script>
<script type="text/javascript" src="js/jquerycssmenu.js"></script>
<script type="text/javascript" src="js/jquery.min.1.3.2.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
  var currentPosition = 0;
  var slideWidth = 750;
  var slides = $('.slide');
  var numberOfSlides = slides.length;

  // Remove scrollbar in JS
  $('#slidesContainer').css('overflow', 'hidden');

  // Wrap all .slides with #slideInner div
  slides
    .wrapAll('<div id="slideInner"></div>')
    // Float left to display horizontally, readjust .slides width
	.css({
      'float' : 'left',
      'width' : slideWidth
    });

  // Set #slideInner width equal to total width of all slides
  $('#slideInner').css('width', slideWidth * numberOfSlides);

  // Insert controls in the DOM
  $('#slideshow')
    .prepend('<span class="control" id="leftControl">Clicking moves left</span>')
    .append('<span class="control" id="rightControl">Clicking moves right</span>');

  // Hide left arrow control on first load
  manageControls(currentPosition);

  // Create event listeners for .controls clicks
  $('.control')
    .bind('click', function(){
    // Determine new position
	currentPosition = ($(this).attr('id')=='rightControl') ? currentPosition+1 : currentPosition-1;
    
	// Hide / show controls
    manageControls(currentPosition);
    // Move slideInner using margin-left
    $('#slideInner').animate({
      'marginLeft' : slideWidth*(-currentPosition)
    });
  });

  // manageControls: Hides and Shows controls depending on currentPosition
  function manageControls(position){
    // Hide left arrow if position is first slide
	if(position==0){ $('#leftControl').hide() } else{ $('#leftControl').show() }
	// Hide right arrow if position is last slide
    if(position==numberOfSlides-1){ $('#rightControl').hide() } else{ $('#rightControl').show() }
  }	
});
</script>



</head>
<body>
<?php $fncs->HeaddernMenu($_SESSION['login_typepro']);?>
    		
					<div class="widget-content padding">
					
					 <?php
    if ($_SESSION['login_typepro']=="A")
	{?>
						<form class="form-horizontal" role="form" method="post">
						 
						  <div class="box box-success">
	 <div align="center" class="box-header with-border">
              <h3 class="box-title">Add Project Types</h3>
            </div>
						 
						
						  <div class="form-group">
							<label for="input-text" class="control-label col-md-3 col-sm-3 col-xs-12">Project Type Code</label>
							<div class="col-xs-3">
							  <input type="text" class="form-control" id="pt_short_des" name="pt_short_des" placeholder="project Type Code" required>
							</div>
						  </div>
						  
						  <div class="form-group">
							<label for="input-text" class="control-label col-md-3 col-sm-3 col-xs-12">Description</label>
							<div class="col-xs-3">
							  <input type="text" class="form-control" id="pt_description" name="pt_description" placeholder="description" required>
							</div>
						  </div>
						  
						  
						  <div class="form-group">
                        <div align="center" class="col-xs-8">
						  <button type="submit" name="btn-save" class="btn btn-primary">Submit</button>
                          <button  class="btn btn-success"  onClick="previous()">Cancel</button>
                   

                        </div>
                      </div>
					
					


<?php
	}
  else
  {
  ?>
  <table align="center" border="0" style="vertical-align:middle">
  <tr>
  <th>
  <h1>you don't have permission to access</h1>
  </th>
  </tr>
  </table>
  <?php
  }
  ?>						 
						</form>
						
						
						
						</div>
					</div>
					
				
    
   	 
      
      
      
      
    
   
<div id="templatemo_footer_wrapper">

    	<div id="templatemo_footer">
        
        	
            
            <div align="center">
                 Copyright © 2048 <a href="#">Arthur C clarke Institute of Modern Technologies</a> | 
                 
            </div>
            
    	</div> <!-- end of templatemo_footer -->
    
	<div class="cleaner"></div>
</div> <!-- end of templatemo_footer_wrapper -->


</body>

<!-- CORE JQUERY LIBRARY -->
    <script src="assets/js/jquery.js"></script>
    <!-- CORE BOOTSTRAP LIBRARY -->
    <script src="assets/js/bootstrap.min.js"></script>
</html>