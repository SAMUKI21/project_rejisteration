<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>PMS</title>
    <?php
include_once 'Database.php';
session_start();
	if (!isset($_SESSION['login_typepro']))
	{
		echo'<script> alert ("Access Denied!!!");</script>';
		header('Location: index.php');
	}
	require_once ("Database.php");
	require_once ("phpfncs/Funcs.php");
	$db =new DBOperations();
	$fncs= new FRMOperations();
$user = $_SESSION['login_unpro'];
//print $user;
//$sql_queryd="select DivisionCode from emp_details_tbl where EmpNo=$user";
// delete condition
if(isset($_GET['delete_id']))
{
 $sql_query="DELETE FROM pr_projects WHERE serial_no=".$_GET['delete_id'];
 // mysql_query($sql_query);
 //header("Location: $_SERVER[PHP_SELF]");
 // sql query execution function
 //if(mysql_query($sql_query))
 //{
  ?>
    <script type="text/javascript">
    //alert('Data Deleted Successfully ');
    //window.location.href='ProjectView.php';
    </script>
    <?php
 //}
// else
 //{
  ?>

    <script type="text/javascript">
    //alert('error occured');
    </script>    <?php
 //}
 // sql query execution function
}
// delete condition
?>
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
    <script type="text/javascript" src="js/jquery.min.1.2.6.js"></script>
    <script type="text/javascript" src="js/jquerycssmenu.js"></script>
    <script type="text/javascript" src="js/jquery.min.1.3.2.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
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
                'float': 'left',
                'width': slideWidth
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
            .bind('click', function() {
                // Determine new position
                currentPosition = ($(this).attr('id') == 'rightControl') ? currentPosition + 1 :
                    currentPosition - 1;
                // Hide / show controls
                manageControls(currentPosition);
                // Move slideInner using margin-left
                $('#slideInner').animate({
                    'marginLeft': slideWidth * (-currentPosition)
                });
            });
        // manageControls: Hides and Shows controls depending on currentPosition
        function manageControls(position) {
            // Hide left arrow if position is first slide
            if (position == 0) {
                $('#leftControl').hide()
            } else {
                $('#leftControl').show()
            }
            // Hide right arrow if position is last slide
            if (position == numberOfSlides - 1) {
                $('#rightControl').hide()
            } else {
                $('#rightControl').show()
            }
        }
    });

    function edt_id(id, status) {
        // if(confirm('Sure to Denined ?'+status))
        // {
        //    if($row[6]=="y"){
        //  window.location.href='ProjectsEdit.php?edit_id='+id; 
        //  }
        //  else{
        //    window.location.href='projectEditDN.php?edit_id='+id; 
        //  }
        // }
        alert(status);
        if (status == 1) {
            if (confirm('Sure to Edit ?')) {
                window.location.href = 'projectEditDN.php?edit_id=' + id;
            }
        } else if (status == 2) {
            if (confirm('Sure to Edit ?')) {
                window.location.href = 'ProjectsEdit.php?edit_id=' + id;
            }
        } else if (status == 4) {
            if (confirm('Sure to Extend ?')) {
                window.location.href = 'ProjectsExtend.php?extend_id=' + id;
            }
        } else if (status == 3) {
            var val = confirm('Sure to Edit ?');
            if (val == true) {
                window.location.href = 'projectEditDN.php?edit_id=' + id;
            }
        }else if (status == 5) {
            if (confirm('Sure to Edit ?')) {
                window.location.href = 'changep_code.php?edit_id=' + id;
            }
        } 

    }

	 function extend_id(id) {
        if (confirm('Sure to Extend ?')) {
            window.location.href = 'ProjectsExtend.php?extend_id=' + id;
        }
    }	
		
		
    function delete_id(id) {
        if (confirm('Sure to Delete ?')) {
            window.location.href = 'ProjectView.php?delete_id=' + id;
        }
    }
		
		 function cancel_id(id) {
        if (confirm('Sure to Cancel ?')) {
            window.location.href = 'ProjectView.php?delete_id=' + id;
        }
    }
    function close_id(id)
{
  if(confirm('Sure to close the project ?'))
 {
  window.location.href='p_close_form.php?close_id='+id;
 }
}
    </script>
<style>
    .cart { width: 100%; }

.hasTooltip span {
    display: none;
    color: #000;
    text-decoration: none;
    padding: 3px;
}

.hasTooltip:hover span {
    display: block;
    position: absolute;
    background-color: Grey; /* Green */
  border: none;
  color: white;
  padding: 7px 15px;
  text-align: center;
  text-decoration: none;
  font-size: 16px;
  border: 1px solid black;
    margin: 2px 10px;

    
}
    </style>
    
</head>

<body>
    <?php $fncs->HeaddernMenu($_SESSION['login_typepro']);?>
    <div class="widget-content padding">
        <?php
    if ($_SESSION['login_typepro']=="A"||$_SESSION['login_typepro']=="E")
	{?>
        <table id="wrapped" align="center" cellspacing="3" cellpadding="5" border="3" wid>
             <tr>
               <td align="center" colspan="13">
                <a style="align-content:center" class="btn btn-large btn-danger" href="Projects.php">Add Projects</a>
            </td>
<!--
                <div align="right" id="browse_app" style="width=100%">
                   
                </div>
-->
            </tr>
            <tr>
            <th style="align-content:center" width="300px">
                <h3>Project Name</h3>
            </th>
            <th align="center" style="min-width: 110px">
                <h3>Action Plan Code</h3>
            </th>
            <th align="center" style="min-width: 150px ">
                <h3>Project Type</h3>
            </th>
            <th align="center" width="200px">
                <h3>Client Name</h3>
            </th>
            <th style="align-content:center" width="200px">
                <h3>Project Code</h3>
            </th>
            <th align="center" width="300px">
                <h3>Capital Expenditure<br>
			(Rs. '000)</h3>
            </th>
            <th align="center" width="300px">
                <h3>Recurrent Expenditure<br>
				(Rs. '000)</h3>
            </th>
            <th align="center" width="300px">
                <h3>Expected Income<br>
		(Rs. '000)</h3>
            </th>
            <th align="center" width="100px">
                <h3>Project Status</h3>
            </th>
            <th align="center" width="200px" colspan="4">
                <h3>Operations</h3>
            </th>
            </tr>
            <?php

          if($user =='administrator' || $user =='70'){
			  $sql_query="SELECT a.serial_no,a.pname,a.apcode,a.ptype,a.cname,a.code,a.confirm,a.capital,a.recurrent,a.expected_income,a.p_close_user,p_close FROM pr_projects as a,division_tbl as b,pr_project_types as c WHERE a.div_code=b.DivisionCode && a.pt_code=c.pt_code order by a.code desc"; 
              $result_set=mysql_query($sql_query);
 //echo '<script> alert("tttttt")</script>';
        }
        else{ 
 //$sql_query="SELECT DISTINCT a.serial_no,a.pname,a.apcode,a.ptype,a.cname,a.code,a.confirm,a.capital,a.recurrent,a.expected_income,a.p_close_user FROM pr_projects as a,division_tbl as b,pr_project_types as c, emp_details_tbl d WHERE a.div_code=b.DivisionCode && b.DivisionCode = d.DivisionCode && a.pt_code=c.pt_code && (b.hod=$user||d.EmpNo=$user) order by a.year desc";
 $sql_query="SELECT DISTINCT a.serial_no,a.pname,a.apcode,a.ptype,a.cname,a.code,a.confirm,a.capital,a.recurrent,a.expected_income,a.p_close_user,p_close FROM pr_projects as a,division_tbl as b,pr_project_types as c, emp_details_tbl d WHERE  a.user=$user order by a.year desc";

 $result_set=mysql_query($sql_query);
             }
 while($row=mysql_fetch_row($result_set))
 {
  ?>
            <tr width="350px">
                <td height="120px" align="center"><?php echo $row[1]; ?></td>
                <td align="center"><?php echo substr($row[5], 0, 4); echo ' - ' . $row[2]; ?></td>
                <td align="center"><?php echo $row[3]; ?></td>
                <td align="center"><?php echo $row[4]; ?></td>     
               <td  align="center"> 
                <a class="hasTooltip" style=" font-size: 15px;color:white;"href="javascript:edt_id('<?php echo $row[0]; ?>','<?php echo '5'; ?>')"><?php echo $row[5]; ?>
                <span>Change Code</span>   
            </a></td>
                <td align="center"><?php echo $row[7]; ?></td>
                <td align="center"><?php echo $row[8]; ?></td>
                 <td align="center"><?php echo $row[9]; ?></td>
                <?php if($row[6]=="n" & $row[11] == "n")
  { ?>
                <td align="center">Not Confirmed</td>
                <td align="center"><a href="javascript:edt_id('<?php echo $row[0]; ?>','<?php echo '1'; ?>')"><img
                            src="edit.png" align="EDIT" width="30px" height="30px" /></a></td>
                <td align="center"><img
                            src="extend.png" align="EDIT" width="30px" height="30px" /></a></td>
                <td align="center"><a href="javascript:delete_id('<?php echo $row[0]; ?>')"><img src="delete2.png"
                            align="DELETE" width="30px" height="30px" /></a></td>
                            <td align="center"><a href="javascript:close_id('<?php echo $row[0]; ?>')"><img src="close.png" align="DELETE" width="30px" height="30px" /></a></td>
        
                <?php    } ?>

              
                <?php if($row[6]=="y" & $row[11] == "n")
  { ?>
                <td align="center">Confirmed</td>
                <td align="center"><img
                            src="edit.png" align="EDIT" width="30px" height="30px" /></a></td>
                <td align="center"><a href="javascript:extend_id('<?php echo $row[0]; ?>')"><img
                            src="extend.png" align="EDIT" width="30px" height="30px" /></a></td>
                <td align="center"><img src="delete2.png"
                            align="DELETE" width="30px" height="30px" /></a></td>

                            <?php if($row[10]=="n")
  { ?>      
                            <td align="center"><a href="javascript:close_id('<?php echo $row[0]; ?>')"><img src="close.png" align="DELETE" width="30px" height="30px" /></a></td>
                            <?php  } else{ ?>
                                <td align="center"><img src="close.png" align="DELETE" width="30px" height="30px" /></a></td>

                <?php } } ?>
                <?php if($row[6]=="d" & $row[11] == "n") { 
            $value=$db->Exe_Qry("SELECT reason FROM pr_deny_projects WHERE p_code='$row[5]' ");
            $myrow=$db->Next_Record($value);
 ?>
                <td align="center">
                    <A HREF="http://www.yourdomain.com/" TITLE="<?php echo $myrow['reason'] ?>" style="color:white">
                        <font size="3">Denied
                    </A></td>
                </font>
                <td align="center"><a href="javascript:edt_id('<?php echo $row[0]; ?>','<?php echo '3'; ?>')"><img
                            src="edit.png" align="EDIT" width="30px" height="30px" /></a></td>
                <td align="center"><img
                            src="extend.png" align="EDIT" width="30px" height="30px" /></a></td>
                <td align="center"><a href="javascript:delete_id('<?php echo $row[0]; ?>')"><img src="delete2.png"
                            align="DELETE" width="30px" height="30px" /></a></td>
                            <td align="center"><a href="javascript:close_id('<?php echo $row[0]; ?>')"><img src="close.png" align="DELETE" width="30px" height="30px" /></a></td>
        
                <?php    }  ?>
                <?php if( $row[11] == "y") { ?>
                    <td align="center">Closed</td>

                    <td align="center"><img
                            src="edit.png" align="EDIT" width="30px" height="30px" /></a></td>
                <td align="center"><img
                            src="extend.png" align="EDIT" width="30px" height="30px" /></a></td>
                <td align="center"><img src="delete2.png"
                            align="DELETE" width="30px" height="30px" /></a></td>
                <td align="center"><img src="close.png" align="DELETE" width="30px" height="30px" /></a></td>

                    <?php } ?>

            </tr>
            <?php
 }
 
 ?>
        </table>
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
    </div>
    </div>
    </div> <!-- templatemo_content -->
    </div> <!-- end of templatemo_content_wrapper -->
    <div id="templatemo_footer_wrapper">
        <div id="templatemo_footer">
            <div align="center">
                Copyright ╪╕┘╪▓╪╕┘┘&curren;╪╕┘╪▓╪╕&curren;╪شظـزظــظ&curren;ء┬ظـزظ&ucirc;&ocirc;ظـزظــ&ucirc;ظ&curren;ء┘ْ 2048 <a href="#">Arthur C clarke Institute of Modern Technologies</a> |
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