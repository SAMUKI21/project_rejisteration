<?php
session_start();
if (!isset($_SESSION['login_typepro'])) {
    echo '<script> alert ("Access Denied!!!");</script>';
    header('Location: index.php');
    print 'kkk';
}

?>

<html>

<head>
    <link rel="shortcut icon" href="images/logo.ico" type="image/x-icon" />
    <title>PMS</title>
    <?php
    require_once("Database.php");
    require_once("phpfncs/Funcs.php");
    $db = new DBOperations();
    $fncs = new FRMOperations();
    // delete condition

    if (isset($_GET['delete_id'])) {
        if ($_SESSION['login_typepro'] == "A") {
            $sql_query = "DELETE FROM stores_code WHERE id=" . $_GET['delete_id'];
            // && $_SESSION['login_typepro']=="A";
            mysql_query($sql_query);
            //header("Location: $_SERVER[PHP_SELF]");

            // sql query execution function
            if (mysql_query($sql_query)) {
    ?>
                <script type="text/javascript">
                    alert('Data Deleted Successfully ');
                    window.location.href = 'Stores_CodeView.php';
                </script>
            <?php
            } else {
            ?>
                <script type="text/javascript">
                    alert('error occured');
                </script>
            <?php
            }
        } //end login type
        else {
            ?>
            <script type="text/javascript">
                alert('You are not administrator');
            </script>
    <?php
        }
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
                    currentPosition = ($(this).attr('id') == 'rightControl') ? currentPosition + 1 : currentPosition - 1;

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

        function edt_id(id) {
            if (confirm('Sure to edit ?')) {
                window.location.href = 'Stores_Code_Edit.php?edit_id=' + id;
            }
        }

        function delete_id(id) {
            if (confirm('Sure to Delete ?')) {
                window.location.href = 'Stores_CodeView.php?delete_id=' + id;
            }
        }
    </script>
</head>

<body>

    <?php $fncs->HeaddernMenu($_SESSION['login_typepro']); ?>
    <div id="wrapp">



        <?php
        if ($_SESSION['login_typepro'] == "A") { ?>
            <table id="wrapped" align="center" cellspacing="3" cellpadding="5" border="3">

                <div align="center" id="browse_app">
                    <a class="btn btn-large btn-danger" href="Stores_Code_Add.php">Add Stores Code</a>
                </div>
                <tr>
                    <th align="center" width="200px">
                        <h3>Stores Code </h3>
                    </th>
                    <th align="center" width="200px">
                        <h3>Division</h3>
                    </th>
                    <th align="center" width="200px" colspan="2">
                        <h3>Operations</h3>
                    </th>
                </tr>
                <?php
                $sql_query = "SELECT * FROM stores_code";
                $result_set = mysql_query($sql_query);
                while ($row = mysql_fetch_row($result_set)) {
                ?>
                    <tr align="center" style="padding-left: 5px;padding-bottom:3px; font size=" 1000%;"" width="200px">
                        <td align="center" style="padding-left: 5px;padding-bottom:3px; font size=" 1000%;"" align="center"><?php echo $row[1]; ?></td>
                        <td align="center" style="padding-left: 5px;padding-bottom:3px; font size=" 1000%;"" align="center"><?php echo $row[2]; ?></td>
                        <td align="center"><a href="javascript:edt_id('<?php echo $row[0]; ?>')"><img src="edit.png" align="EDIT" width="30px" height="30px" /></a></td>
                        <td align="center"><a href="javascript:delete_id('<?php echo $row[0]; ?>')"><img src="delete2.png" align="DELETE" width="30px" height="30px" /></a></td>
                    </tr>
                <?php
                }
                ?>
            </table>
        <?php
        } else {
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
                Copyright © 2017 <a href="#">Arthur C clarke Institute for Modern Technologies</a> |
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