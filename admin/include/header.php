<?php 
    session_start();
    if( empty($_SESSION["email"]) ){
        header("Location: ./login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Hanzala Mudasar Kashif">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title> Employee Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="../resorce/css/style.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <style> 
     .hidden {
         display: none;
     }
    .additional-css{
 background-color: #EEF7FF !important;
    }
    .additional-2{
        background-color: #CDE8E5 !important;

    }
   li{
    background-color: #CDE8E5 !important;
   }
    </style>

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

     





    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        <!-- ***********************************-->
        <div class="nav-header additional-css">

             <div class="brand-logo">
                <a >
                    
                    <span class="brand-title">
                   
                    </span>
                </a>
            </div> 
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header additional-2 ">    
            <div class="header-content clearfix">
                
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
               <div class="text-center">
                <h2 class="pt-3 color-#4D869C"> Employee Management System </h2>
                 </div>
                
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar additional-2">           
            <div class="nk-nav-scroll">
                <ul class="metismenu additional-2" id="menu">
                   <br> <br>       
                    <li>
                        <a href="./dashboard.php"  >
                            <i class="icon-home menu-icon"></i><span class="nav-text">Dashboard</span>
                        </a>
                    </li>

                    <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="fa-regular fa-building"></i><span class="nav-text">Department</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="./add-department.php"> <i class="icon-plus menu-icon"></i><span class="nav-text">Add Department</span></a></li>
                            <li><a href="./manage-department.php"> <i class="fa fa-tasks menu-icon"></i><span class="nav-text">Manage Department</span></a></li>
                            <!-- <li><a href="./"> <i class="fa fa-bar-chart menu-icon"></i><span class="nav-text">Salary Table</span></a></li> -->

                        </ul>
                    </li>
                    <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="fa-solid fa-users menu-icon"></i><span class="nav-text">Employee</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="./add-employee.php"> <i class="icon-plus menu-icon"></i><span class="nav-text">Add Employee & Salary</span></a></li>
                            <li><a href="./manage-employee.php"> <i class="fa fa-tasks menu-icon"></i><span class="nav-text">Manage Employee & Salary</span></a></li>
                            <!-- <li><a href="./"> <i class="fa fa-bar-chart menu-icon"></i><span class="nav-text">Salary Table</span></a></li> -->

                        </ul>
                    </li>

                    <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-address-card-o menu-icon"></i><span class="nav-text">Admin</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="./add-admin.php"> <i class="icon-plus menu-icon"></i><span class="nav-text">Add Admin</span></a></li>
                            <li><a href="./manage-admin.php"> <i class="fa fa-tasks menu-icon"></i><span class="nav-text">Manage Admins</span></a></li>
                        </ul>
                    </li>
                    
                    <li>
                        <a href="./manage-leave.php" >
                            <i class="fa fa-tasks menu-icon"></i><span class="nav-text">Manage Employee Leave</span>
                        </a>
                    </li>

                    <li>
                        <a href="./manage-resignation.php" >
                            <i class="fa fa-tasks menu-icon"></i><span class="nav-text">Manage Resignation</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="./logout.php" >
                            <i class="icon-logout menu-icon"></i><span class="nav-text">Logout</span>
                        </a>
                    </li>
                    <li>
                        <a href="./profile.php"  >
                            <!-- <img src="https://icon-library.net//images/icon-profile/icon-profile-20.jpg" width="14"> -->
                            <i class="fa fa-user menu-icon"></i><span class="nav-text"> Profile</span>
                        </a>
                    </li>                 
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body additional-css">



        <div class="modal fade" id="showModal" data-backdrop="static" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div id="modalHead" class="modal-header">
                    <button id="modal_cross_btn" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span  aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <p id="addMsg" class="text-center font-weight-bold"></p>
                </div>
                <div class="modal-footer ">
                    <div class="mx-auto">
                        <a type="button" id="linkBtn" href="#" class="btn btn-primary" >Add Expense For the Day</a>
                        <a type="button" id="closeBtn" href="#" data-dismiss="modal" class="btn btn-primary">Close</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
            
            <!-- row -->

            <div class="container-fluid">

            