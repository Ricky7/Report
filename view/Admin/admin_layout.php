<?php
    include "../../inc/session.php";
    include "../../inc/koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Page</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" type="text/css" href="../../public/stylesheets/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="../../public/stylesheets/old_bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../public/stylesheets/custom.css">
</head>
<body>
<div id="wrapper">
    <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">Binary admin</a> 
        </div>
            <div style="color: white; padding: 15px 50px 5px 50px; float: right;font-size: 16px;"> 
                <?php if (isset($_SESSION['username'])):?>
                    <?php echo 'Hello!'; ?> <?php echo $_SESSION['username'];?>
                <?php endif;?>
                <a href="../Default/logout.php" class="btn btn-danger square-btn-adjust">Logout</a> 
            </div>
    </nav>   
       <!-- /. NAV TOP  -->
    <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">
                <li class="text-center">
                    <img src="../../public/images/find_user.png" class="user-image img-responsive"/>
                </li>
            
                
                <li>
                    <a href="#"><i class="fa fa-dashboard fa-2x"></i> Dashboard</a>
                </li>
                <li>
                    <a href="data_user.php"><i class="fa fa-desktop fa-2x"></i> Data User</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-qrcode fa-2x"></i> Tabs & Panels</a>
                </li>
                <li>
                    <a  ref="#"><i class="fa fa-bar-chart-o fa-2x"></i> Morris Charts</a>
                </li>   
                <li>
                    <a href="#"><i class="fa fa-table fa-2x"></i> Table Examples</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-edit fa-2x"></i> Forms </a>
                </li>               
                
                                   
                <li>
                    <a href="#"><i class="fa fa-sitemap fa-2x"></i> Multi-Level Dropdown<span class="fa arrow fa-2x"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="#">Second Level Link</a>
                        </li>
                        <li>
                            <a href="#">Second Level Link</a>
                        </li>
                        <li>
                            <a href="#">Second Level Link<span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li>
                                    <a href="#">Third Level Link</a>
                                </li>
                                <li>
                                    <a href="#">Third Level Link</a>
                                </li>
                                <li>
                                    <a href="#">Third Level Link</a>
                                </li>

                            </ul>
                           
                        </li>
                    </ul>
                  </li>  
                <li>
                    <a  href="#"><i class="fa fa-square-o fa-2x"></i> Blank Page</a>
                </li>   
            </ul>
           
        </div>
        
    </nav>  
    <!-- /. NAV SIDE  -->
    
</div>
<!-- /. WRAPPER  -->
<script type="text/javascript" src="../../public/javascripts/jquery-1.10.2.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script type="text/javascript" src="../../public/javascripts/jquery.metisMenu.js"></script>
    
    <script type="text/javascript" src="../../public/javascripts/oldbootstrap.min.js"></script>

    <script type="text/javascript" src="../../public/javascripts/custom.js"></script>
   
</body>
</html>