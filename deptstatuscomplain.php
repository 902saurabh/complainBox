<?php

include("checkuser.php");
//dashboard of department
//$mysqli = new mysqli("localhost", "root", "", "complainbox");


$uname = $_SESSION["name"];
$totcomp = 0;//mysqli_num_rows(mysqli_query($con, "SELECT * FROM complain WHERE Departmentname like'%" . $uname . "%'"));

$sqlt = "SELECT name from user WHERE email like '%" . $_SESSION['email'] . "%'";
$result1 = mysqli_query($con, $sqlt);
while ($row1 = mysqli_fetch_array($result1)) {
    $sql = "SELECT * FROM complain WHERE Departmentname like '%" . $row1['name'] . "%'";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $totcomp += 1;
    }
}

$totpendingcomp = 0; //mysqli_num_rows(mysqli_query($con, "SELECT * FROM complain WHERE (status='Pending' OR status='Pending#' ) AND Departmentname like'%" . $uname . "%'"));

$sqlt = "SELECT name from user WHERE email like '%" . $_SESSION['email'] . "%'";
$result1 = mysqli_query($con, $sqlt);
while ($row1 = mysqli_fetch_array($result1)) {
    $sql = "SELECT * FROM complain WHERE (status='Pending' OR status='Pending#' ) AND Departmentname like '%" . $row1['name'] . "%'";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $totpendingcomp += 1;
    }
}


$totsolvedcomp = 0; //mysqli_num_rows(mysqli_query($con, "SELECT * FROM complain WHERE  (status='Resolved' OR status='Resolved#' ) AND Departmentname like'%" . $uname . "%'"));
$sqlt = "SELECT name from user WHERE email like '%" . $_SESSION['email'] . "%'";
$result1 = mysqli_query($con, $sqlt);
while ($row1 = mysqli_fetch_array($result1)) {
    $sql = "SELECT * FROM complain WHERE (status='Resolved' OR status='Resolved#' ) AND Departmentname like '%" . $row1['name'] . "%'";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $totsolvedcomp += 1;
    }
}

$totinprogresscomp = 0; //mysqli_num_rows(mysqli_query($con, "SELECT * FROM complain WHERE (status='In-Progress' OR status='In-Progress#' ) AND Departmentname like'%" . $uname . "%'"));
$sqlt = "SELECT name from user WHERE email like '%" . $_SESSION['email'] . "%'";
$result1 = mysqli_query($con, $sqlt);
while ($row1 = mysqli_fetch_array($result1)) {
    $sql = "SELECT * FROM complain WHERE (status='In-Progress' OR status='In-Progress#' ) AND Departmentname like '%" . $row1['name'] . "%'";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $totinprogresscomp += 1;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>Complain | Complain Box </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
          name='viewport'/>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet"/>
</head>

<body class="">
<div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="assets/img/sidebar.jpg">
        <!--
          Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

          Tip 2: you can also add an image using data-image tag
      -->
        <div class="logo">
            <a href="#" class="simple-text logo-normal">
                Complain Box
            </a>
        </div>


        <div class="sidebar-wrapper">
            <ul class="nav">

                <li class="nav-item">
                    <br/>
                    <div class="card-profile">
                        <div class="card-avatar">
                            <img class="img" src="<?php echo $_SESSION['imgurl']; ?>"/>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">    <?php echo $_SESSION['name']; ?></h5>
                        </div>

                    </div>
                </li>


                <li class="nav-item  ">
                    <a class="nav-link" href="./depthome.php">
                        <i class="material-icons">dashboard</i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item active ">
                    <a class="nav-link" href="./deptstatuscomplain.php?status=">
                        <i class="material-icons">list_alt</i>
                        <p>View Complains</p>
                    </a>
                </li>

                <li class="nav-item ">
                    <a class="nav-link" href="./depthcancel.php">
                        <i class="material-icons">cancel_presentation</i>
                        <p>Cancel Complains</p>
                    </a>
                </li>

                <li class="nav-item ">
                    <a class="nav-link" href="./deptforward.php">
                        <i class="material-icons">forward</i>
                        <p>Forwad Complains</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="./deptdocomplain.php">
                        <i class="material-icons">post_add</i>
                        <p>Do Complain</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./deptmycomplain.php?status=">
                        <i class="material-icons">view_list</i>
                        <p>My Complains</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="./deptreport.php">
                        <i class="material-icons">content_paste</i>
                        <p>Report</p>
                    </a>
                </li>

                <li class="nav-item ">
                    <a class="nav-link" href="./logout.php">
                        <i class="material-icons">arrow_back</i>
                        <p>Logout</p>
                    </a>
                </li>


            </ul>
        </div>
    </div>
    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <a class="navbar-brand" href="#"><b>Complains</b></a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                </button>

            </div>
        </nav>
        <!-- End Navbar -->


        <?php
        if (!isset($_GET['id'])) {

            echo '
      <div class="content" id="complainDetail">
        <div class="container-fluid">
         		<div class="row">
		  <div class="col-md-12">
              <div class="card card-plain">
                <div class="card-header card-header-primary">
                  <h4 class="card-title mt-0"><b>Complains Status</b></h4>
                </div>
                </div>
                </div>
</div>            
			<br/>
		         <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-primary card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">format_list_bulleted</i>
                  </div>
                  <p class="card-category">Complains</p>
                  <h3 class="card-title">' . $totcomp . '
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
				  
                    <i class="material-icons">content_paste</i><a href="./deptstatuscomplain.php?status=">View Details</a>

                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-clock-o"></i>

                  </div>
                  <p class="card-category">Pending</p>
                  <h3 class="card-title">' . $totpendingcomp . '</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">error_outline</i><a href="./deptstatuscomplain.php?status=Pending">View Details</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
				  <i class="fa fa-refresh"></i>
                  </div>
                  <p class="card-category">In Progress</p>
                  <h3 class="card-title">' . $totinprogresscomp . '</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">refresh</i><a href="./deptstatuscomplain.php?status=In-Progress">View Details</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
					<i class="fa fa-check-square-o"></i>

                  </div>
                  <p class="card-category">Solved</p>
                  <h3 class="card-title">' . $totsolvedcomp . '</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">check</i><a href="./deptstatuscomplain.php?status=Solved">View Details</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
	<br/>																
          <div class="row">
			
				<div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary" style="margin:0;">
                  <h4 class="card-title ">' . $_GET["status"] . ' Complains</h4>
                  <p class="card-category">  </p>
                </div>';


            echo '   <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-primary">
                        <th>ID</th>               
                        <th>Area of Work</th>               
						<th>Detail</th>
						<th>Date Time</th>                        
						<th>Severity</th>
						<th>Status</th>                    
					<!--	<th>Complainant</th>  
						<th>Mail</th>-->
						<th>View</th>
                    </thead> <tbody>';

            $sql = "SELECT * FROM complain WHERE Departmentname like '%" . $_SESSION['name'] . "%' AND status like '%" . $_GET['status'] . "%' ORDER BY id DESC";


            $sqlt = "SELECT name from user WHERE email like '%" . $_SESSION['email'] . "%'";
            $result1 = mysqli_query($con, $sqlt);
            $deptnamearr = array();
            while ($row1 = mysqli_fetch_array($result1)) {
                $deptnamearr[] = $row1['name'];
            }


            //SELECT * FROM complain WHERE Departmentname='Carpentry' OR Departmentname='Networking' ORDER BY id DESC
            $sql = "SELECT * FROM complain WHERE 
			( Departmentname like '%" . $deptnamearr[0] . "%' AND status like '%" . $_GET['status'] . "%' ) ";
            $arrlength = count($deptnamearr);

            for ($x = 1; $x < $arrlength; $x++) {
                $sql = $sql . "OR ( Departmentname like '%" . $deptnamearr[$x] . "%' AND status like '%" . $_GET['status'] . "%' )  ";
            }
            if ($_GET['status'] != 'Pending') {
                $sql = $sql . " ORDER BY id DESC";
            } else {
                $sql = $sql . "ORDER BY id ";
            }
            $result = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_array($result)) {
                //Creates a loop to dipslay all complain
                if ($row['priority'] == 'High') {
                    echo '<tr style="background-color:rgba(255, 0, 0, 0.2)">';
                } else {
                    echo '<tr>';
                }
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['Departmentname'] . "</td>";
                if (strlen($row['description']) > 50) {
                    echo "<td >" . substr($row['description'], 0, 50) . " ...</td>";
                } else {
                    $tmpd = $row['description'];
                    $tmplen = 54 - strlen($row['description']);

                    echo "<td >" . $tmpd . str_repeat('&nbsp;', $tmplen);
                    "</td>";
                }
                echo "<td>" . $row['complaindate'] . "</td>";
                echo "<td>" . $row['priority'] . "</td>";

                echo "<td class='";
                if ($row['status'] == 'Pending' || $row['status'] == 'Pending#') {
                    echo 'text-danger';
                } else if ($row['status'] == 'In-Progress' || $row['status'] == 'In-Progress#') {
                    echo 'text-warning';
                } else if ($row['status'] == 'Resolved' || $row['status'] == 'Resolved#') {
                    echo 'text-success';
                }
                echo "'  style='    font-weight: 500;'>" . $row['status'] . "</td>";
                //echo "<td>".$row['complainant']."</td>";
                //echo "<td>".$row['complainantmail']."</td>";
                echo '<td><button type="button" class="btn btn-primary" name="' . $row['id'] . '" onclick="takeAction(event)">Take Action</button></td>';

            }


            echo '</tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
     </div>
	 
      </div>';

            include("footer.php");
            echo '  </div>';

        }
        ?>
        <!----     action form   ---->


        <!----end of complain-->


    </div>


    <script src="assets/js/core/jquery.min.js"></script>
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap-material-design.min.js"></script>
    <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!-- Plugin for the momentJs  -->
    <script src="assets/js/plugins/moment.min.js"></script>
    <!--  Plugin for Sweet Alert -->
    <script src="assets/js/plugins/sweetalert2.js"></script>
    <!-- Forms Validations Plugin -->
    <script src="assets/js/plugins/jquery.validate.min.js"></script>
    <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
    <script src="assets/js/plugins/jquery.bootstrap-wizard.js"></script>
    <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
    <script src="assets/js/plugins/bootstrap-selectpicker.js"></script>
    <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
    <script src="assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
    <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
    <script src="assets/js/plugins/jquery.dataTables.min.js"></script>
    <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
    <script src="assets/js/plugins/bootstrap-tagsinput.js"></script>
    <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
    <script src="assets/js/plugins/jasny-bootstrap.min.js"></script>
    <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
    <script src="assets/js/plugins/fullcalendar.min.js"></script>
    <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
    <script src="assets/js/plugins/jquery-jvectormap.js"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="assets/js/plugins/nouislider.min.js"></script>
    <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
    <!-- Library for adding dinamically elements -->
    <script src="assets/js/plugins/arrive.min.js"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chartist JS -->
    <script src="assets/js/plugins/chartist.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="assets/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script>
    <!-- Material Dashboard DEMO methods, don't include it in your project! -->
    <script src="assets/demo/demo.js"></script>


    <script>
        /*  $("li").click(function(){
            alert("j");
            var val=$(this).text();
            $("#dropdownMenuLink").text("STATUS: "+$(this).text());
            $.ajax(function(){
              type:"POST",
              url:"status_update.php",
              data:"status="+val+"&id=<?php //echo $_GET['id']?>"
    }).done(function(){
      window.open("depthome.php?id="+<?php //echo $_GET['id']?>,"_self");
    });



    });
  */

    </script>


    <script>

        function doSomething(a) {
            var x = document.getElementById("testing");
            var y = document.getElementById("test");
            //if (x.style.display === "none") {
            y.innerHTML = a;
            //x.style.display = "block";
            console.log(a);
            // alert('Form submitted!'+a);
            return false;
        }

        $(document).ready(function () {
            $().ready(function () {
                $sidebar = $('.sidebar');

                $sidebar_img_container = $sidebar.find('.sidebar-background');

                $full_page = $('.full-page');

                $sidebar_responsive = $('body > .navbar-collapse');

                window_width = $(window).width();

                fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

                if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
                    if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
                        $('.fixed-plugin .dropdown').addClass('open');
                    }

                }

                $('.fixed-plugin a').click(function (event) {
                    // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
                    if ($(this).hasClass('switch-trigger')) {
                        if (event.stopPropagation) {
                            event.stopPropagation();
                        } else if (window.event) {
                            window.event.cancelBubble = true;
                        }
                    }
                });

                $('.fixed-plugin .active-color span').click(function () {
                    $full_page_background = $('.full-page-background');

                    $(this).siblings().removeClass('active');
                    $(this).addClass('active');

                    var new_color = $(this).data('color');

                    if ($sidebar.length != 0) {
                        $sidebar.attr('data-color', new_color);
                    }

                    if ($full_page.length != 0) {
                        $full_page.attr('filter-color', new_color);
                    }

                    if ($sidebar_responsive.length != 0) {
                        $sidebar_responsive.attr('data-color', new_color);
                    }
                });

                $('.fixed-plugin .background-color .badge').click(function () {
                    $(this).siblings().removeClass('active');
                    $(this).addClass('active');

                    var new_color = $(this).data('background-color');

                    if ($sidebar.length != 0) {
                        $sidebar.attr('data-background-color', new_color);
                    }
                });

                $('.fixed-plugin .img-holder').click(function () {
                    $full_page_background = $('.full-page-background');

                    $(this).parent('li').siblings().removeClass('active');
                    $(this).parent('li').addClass('active');


                    var new_image = $(this).find("img").attr('src');

                    if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                        $sidebar_img_container.fadeOut('fast', function () {
                            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                            $sidebar_img_container.fadeIn('fast');
                        });
                    }

                    if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                        var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                        $full_page_background.fadeOut('fast', function () {
                            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                            $full_page_background.fadeIn('fast');
                        });
                    }

                    if ($('.switch-sidebar-image input:checked').length == 0) {
                        var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
                        var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                        $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                        $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                    }

                    if ($sidebar_responsive.length != 0) {
                        $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
                    }
                });

                $('.switch-sidebar-image input').change(function () {
                    $full_page_background = $('.full-page-background');

                    $input = $(this);

                    if ($input.is(':checked')) {
                        if ($sidebar_img_container.length != 0) {
                            $sidebar_img_container.fadeIn('fast');
                            $sidebar.attr('data-image', '#');
                        }

                        if ($full_page_background.length != 0) {
                            $full_page_background.fadeIn('fast');
                            $full_page.attr('data-image', '#');
                        }

                        background_image = true;
                    } else {
                        if ($sidebar_img_container.length != 0) {
                            $sidebar.removeAttr('data-image');
                            $sidebar_img_container.fadeOut('fast');
                        }

                        if ($full_page_background.length != 0) {
                            $full_page.removeAttr('data-image', '#');
                            $full_page_background.fadeOut('fast');
                        }

                        background_image = false;
                    }
                });

                $('.switch-sidebar-mini input').change(function () {
                    $body = $('body');

                    $input = $(this);

                    if (md.misc.sidebar_mini_active == true) {
                        $('body').removeClass('sidebar-mini');
                        md.misc.sidebar_mini_active = false;

                        $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

                    } else {

                        $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

                        setTimeout(function () {
                            $('body').addClass('sidebar-mini');

                            md.misc.sidebar_mini_active = true;
                        }, 300);
                    }

                    // we simulate the window Resize so the charts will get updated in realtime.
                    var simulateWindowResize = setInterval(function () {
                        window.dispatchEvent(new Event('resize'));
                    }, 180);

                    // we stop the simulation of Window Resize after the animations are completed
                    setTimeout(function () {
                        clearInterval(simulateWindowResize);
                    }, 1000);

                });
            });
        });
    </script>

    <?php


    ?>


    <script>

        function takeAction(event) {

            // var building = document.getElementById('building');
            // var location = document.getElementById('location');
            // var msg = document.getElementById('complain_message');
            var id = event.target.name;

            window.open("depthome.php?id=" + id, "_self");


        }


        $(document).ready(function () {
            // Javascript method's body can be found in assets/js/demos.js
            md.initDashboardPageCharts();

        });
    </script>


    <?php

    if (isset($_POST['forward_admin'])) {

        if (isset($_COOKIE['status'])) {
            $status = $_COOKIE['status'];
        } else {
            $status = "Pending";
        }

        $query = mysqli_query($con, "UPDATE complain SET status='$status#' WHERE id='$id'");


        $remark = $_POST['remark'];
        $sql7 = "INSERT INTO admincomplain (`ogid`, `remark`) values ($id,'" . $remark . "')";
//echo $sql7;
        $query = mysqli_query($con, $sql7);

        $query = mysqli_query($con, "SELECT email from user WHERE usertype='admin'");
        $row = mysqli_fetch_array($query);
        $mail_to = $row['email'];

        echo '<script>
                
		        $.ajax({              
                url:"complain_submit_ajax.php",
                type:"POST",
               
                data:"id=' . $id . '&mail_to=' . $mail_to . '",
                cache:false,

              
            }).done(function(data){
                console.log(data);
                window.location.href = "depthome.php";

            }).fail(function() { 
                alert( "Login with Somaiya mail" );
            });

            </script>';
        header("Location: depthome.php");
    }


    ?>


    <script>

        $("li").click(function () {

            var val = $(this).text();
            $("#dropdownMenuLink").text($(this).text());

            document.cookie = "status=" + $(this).text();

            if ($(this).text() == 'In-Progress') {
                $('#expense').hide();
                $("#start").show();
            } else if ($(this).text() == 'Resolved') {
                $("#start").hide();
                $('#expense').show();
            } else {
                $('#expense').hide();
                $("#start").show();
            }
            /* $.ajax({
               type: "POST",
               url: "status_update.php",
               data:"status="+val+"&id=<?php //echo $_GET['id']?>"
    }).done(function(){
      window.open("depthome.php","_self");
    });

*/

        });

        function viewDetails() {

            var id = event.target.name;
            window.open("admin_view.php?id=" + id, "_self");
            // window.location.href = "./admin_action.php";
        }

        function takeAction(event) {

            // var building = document.getElementById('building');
            // var location = document.getElementById('location');
            // var msg = document.getElementById('complain_message');
            var id = event.target.name;

            window.open("depthome.php?id=" + id, "_self");


        }


    </script>


</body>

</html>
