<?php

include("checkuser.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title> F M S </title>
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
            FMS </a>
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
                            <h5 class="card-title"> <?php echo $_SESSION['name']; ?></h5>
                        </div>

                    </div>
                </li>


                <li class="nav-item  " href="./depthome.php">
                    <a class="nav-link">
                        <i class="material-icons">dashboard</i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item ">
                    <a class="nav-link" href="./deptstatuscomplain.php?status=">
                        <i class="material-icons">list_alt</i>
                        <p>View Complains</p>
                    </a>
                </li>

                <li class="nav-item active">
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


        <?php
        if (isset($_GET['id'])) {

            $id = $_GET['id'];
            $dp = $_GET['dept'];
            $query = mysqli_query($con, "SELECT * FROM cancelcomplain WHERE id='$id' and Departmentname='$dp'");
            $fetch = mysqli_fetch_array($query);
            $building = $fetch['building'];
            $location = $fetch['location'];
            $description = $fetch['description'];
            $upload_img = $fetch['complainimg'];
            $cname = $fetch['complainant'];
            $cmail = $fetch['complainantmail'];
            $dtym = $fetch['complaindate'];
            $cstatus = $fetch['status'];
            $usercontactnum = $fetch['contactnum'];
            $ogid = $fetch['complain_id'];

            if ($cstatus == 'In-Progress' || $cstatus == 'In-Progress#') {
                $status_remark = "(Time Require: " . $fetch['time_constraint'] . " Days)";
            } else if ($cstatus == 'Resolved' || $cstatus == 'Resolved#') {
                $status_remark = "(Total Cost: " . $fetch['cost'] . " Rs)";
            } else {
                $status_remark = "";
            }
        }
        if (empty($upload_img)) {
            $upload = "";
        } else {

            /*$upload="
            <div class='form-group'>
            <a class='btn btn-primary' target='_blank' href='" .$upload_img."'>View Document</a>
            </div>";*/

            $upload = '<div class="col-lg-4 col-md-6 col-sm-6">

                <div class="card card-stats">
                <br>
                <div class="card-header card-header-warning card-header-icon">
                  
                  <p class="card-category text-left text-primary">Uploaded Document :</p>
                  
                </div>
                <div class="card-footer" style="margin-top:0px;">
                  <div class="stats">
                    <a class="btn btn-primary"  target="_blank" href="' . $upload_img . '">View Document</a>
                   
                  </h4>
                  </div>
                </div>
              </div>

                </div>';
        }


        ?>


        <div class="content">
            <div class="container-fluid">
                <div class="row" id="complain">


                    <div class="col-md-8 offset-md-2">
                        <div class="card" id="dept_card">
                            <div class="card-header card-header-primary" style="margin:0;">
                                <h4 class="card-title" id="complain_card">Complain Id : <?php echo $ogid; ?></h4>
                                <!--
                                <p class="card-category">Complain By '.$cname.'</p>
                                <p class="card-category">Mail id : '.$cmail.'</p>
                                <p class="card-category">Date Time : '.$dtym.'</p>
                                -->
                            </div>
                            <div class="card-body">


                                <div class="row">

                                    <div class="col-lg-4 col-md-6 col-sm-6">

                                        <div class="card card-stats">
                                            <br>
                                            <div class="card-header card-header-warning card-header-icon">

                                                <p class="card-category text-left text-primary">Complain By :</p>

                                            </div>
                                            <div class="card-footer" style="margin-top: 0px;">
                                                <div class="stats" style="word-break: break-word">
                                                    <h4 class="card-title" style="font-weight:400"><?php echo $cname; ?>

                                                    </h4>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-lg-4 col-md-6 col-sm-6">

                                        <div class="card card-stats">
                                            <br>
                                            <div class="card-header card-header-warning card-header-icon">

                                                <p class="card-category text-left text-primary">Mail id :</p>

                                            </div>
                                            <div class="card-footer" style="margin-top: 0px;">
                                                <div class="stats" style="word-break: break-word">
                                                    <h4 class="card-title"
                                                        style="font-weight:400 "><?php echo $cmail; ?>

                                                    </h4>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-lg-4 col-md-6 col-sm-6">

                                        <div class="card card-stats">
                                            <br>
                                            <div class="card-header card-header-warning card-header-icon">

                                                <p class="card-category text-left text-primary">Date Time :</p>

                                            </div>
                                            <div class="card-footer" style="margin-top: 0px;">
                                                <div class="stats" style="word-break: break-word">
                                                    <h4 class="card-title" style="font-weight:400"><?php echo $dtym; ?>

                                                    </h4>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>


                                <div class="row">

                                    <div class="col-lg-4 col-md-6 col-sm-6">

                                        <div class="card card-stats">
                                            <br>
                                            <div class="card-header card-header-warning card-header-icon">

                                                <p class="card-category text-left text-primary">Building :</p>

                                            </div>
                                            <div class="card-footer" style="margin-top: 0px;">
                                                <div class="stats" style="word-break: break-word">
                                                    <h4 class="card-title"
                                                        style="font-weight:400"><?php echo $building; ?>

                                                    </h4>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-lg-4 col-md-6 col-sm-6">

                                        <div class="card card-stats">
                                            <br>
                                            <div class="card-header card-header-warning card-header-icon">

                                                <p class="card-category text-left text-primary">Location :</p>

                                            </div>
                                            <div class="card-footer" style="margin-top: 0px;">
                                                <div class="stats" style="word-break: break-word">
                                                    <h4 class="card-title"
                                                        style="font-weight:400"><?php echo $location; ?>

                                                    </h4>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">

                                        <div class="card card-stats">
                                            <br>
                                            <div class="card-header card-header-warning card-header-icon">

                                                <p class="card-category text-left text-primary">Contact Number :</p>

                                            </div>
                                            <div class="card-footer" style="margin-top: 0px;">
                                                <div class="stats" style="word-break: break-word">
                                                    <h4 class="card-title"
                                                        style="font-weight:400">
                                                        <?php echo $usercontactnum ?>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php echo $upload ?>
                                </div>


                                <!--
                                 <form action="" enctype="multipart/form-data" method="POST">
                                 <input type="hidden" id="cid" value="'.$id.'"  >
                                 <div class="form-group" id="building_input" style="">
                                             <h6><u><b>Current Status</b></u></h6>
                                   <input type="text" class="form-control " value="'.$cstatus.'"  disabled>

                                           </div>
                                           <div class="form-group" id="building_input" style="">
                                             <h6><u><b>Building</b></u></h6>
                                   <input type="text" class="form-control " value="'.$building.'" id="Building" disabled>
                                           </div>
                                           <div class="form-group" >
                                             <h6><u><b>location</b></u></h6>
                                   <input type="text" class="form-control"  value="'.$location.'" id="location"  disabled>
                                           </div>

                                           -->

                                <div class="form-group">

                                    <p class="card-category text-left text-primary" style="font-size:18px">Description
                                        :</p>
                                    <textarea class="form-control" name="complain_body" rows="5" id="complain_message"
                                              style="border: 1px solid #cacaca;
    padding: 10px;cursor: auto; " disabled><?php
                                        echo $description;
                                        ?></textarea>


                                </div>
                                <!--

                                                         // echo $upload;

                                                          $date=date("m-d-Y");


                                                          $parts = explode('-', $date);
                                                          $date=$parts[2]. '-' . $parts[0] . '-' . $parts[1]  ;


                                                          echo '-->


                                <div class="clearfix"></div>
                                <!-- </form>-->
                            </div>
                        </div>
                    </div>


                </div>
            </div>


            <?php
            include("footer.php");
            ?>
        </div>
    </div>

    <!--   Core JS Files   -->
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

    <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>

    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="assets/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script>

    <?php


    if (isset($_POST['reg_complain'])) {

        if (isset($_COOKIE['status'])) {
            $status = $_COOKIE['status'];
        } else {
            $status = "Pending";
        }

        $timer = $_POST['timer'];
        $cost = $_POST['cost'];

//$sql7="UPDATE complain SET status='".$status."' , time_constraint=".$timer." ,cost=".$cost." WHERE id=".$id.";";
//echo $sql7;
        $query = mysqli_query($con, "UPDATE complain SET status='$status#' , time_constraint='$timer' , cost='$cost' WHERE id='$id'");


        header("Location:admindashboard.php");

    }


    ?>

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


        $(document).ready(function () {
            // Javascript method's body can be found in assets/js/demos.js
            md.initDashboardPageCharts();

        });
    </script>


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


        });


    </script>