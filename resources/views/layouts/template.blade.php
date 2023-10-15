<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="author" content="">

    <title>Slot Booking</title>

    <!-- Custom fonts for this template-->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this page -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    
                </div>
                <i class="fa fa-smiley"></i>
                <div class="sidebar-brand-text mx-3">Admin</div>
                   <!--  -->
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            
            <li class="nav-item">
                <a class="nav-link" href="{{route('welcome')}}">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('slots')}}">
                    <i class="fa fa-book"></i>
                    <span>Available Slots</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('booking')}}">
                    <i class="fa fa-calendar"></i>
                    <span>Book Slots</span></a>
            </li>         
           

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
               <div class="container">

@yield('content')
</div>
</div>
     </div>
     </div>  
     </div>
     </body>         <!-- End of Topbar -->
<style type="text/css">
  .bg-gradient-primary {
    background-color: #4e73df;
    background-image: linear-gradient(
180deg
,#9400D3 10%,blue 100%);
    background-size: cover;
}

  .card{
    margin-top: 7%;
  }
</style>
<div class="container-fluid">
