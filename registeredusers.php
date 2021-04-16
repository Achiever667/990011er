<?php require_once "controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM usertable WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if($status == "verified"){
            if($code != 0){
                header('Location: reset-code.php');
            }
        }else{
            header('Location: user-otp.php');
        }
    }
}else{
    header('Location: login-user.php');
}
?>




<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Admin | Home</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="User-assests/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="User-assests/css/style.css">
  <link rel="stylesheet" href="User-assests/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="User-assests/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='user-User-assests/img/favicon.ico' />
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
            <li>
              <form class="form-inline mr-auto">
                <div class="search-element">
                  <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="200">
                  <button class="btn" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </form>
            </li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
       <li class="dropdown"><h5>Hi, <span>Admin</span></h5></li>
          <li class="dropdown"><a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="User-assests/img/user.png"
                class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title"><?php echo $fetch_info['name'] ?></div>
              <a href="profile.html" class="dropdown-item has-icon"> <i class="far
										fa-user"></i> Profile
              </a> <a href="timeline.html" class="dropdown-item has-icon"> <i class="fas fa-bolt"></i>
                Activities
              </a> <a href="#" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>
                Settings
              </a>
              <div class="dropdown-divider"></div>
              <a href="logout-user.php" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html"> <img alt="image" src="User-assests/img/connext_logo.png" class="header-logo" /> <span
                class="logo-name">Connext</span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Admin</li>
            <li class="dropdown active">
              <a href="user-dashboard.php" class="nav-link"><i data-feather="monitor"></i><span>Admin Dashboard</span></a>
            </li>
            <li class="dropdown ">
              <a href="registeredusers" class="nav-link"><i data-feather="activity"></i><span>Total Registered Users</span></a>
            </li>
         
            <li class="dropdown">
              <a href="transaction.php" class="menu-toggle nav-link has-dropdown"><i data-feather="bar-chart"></i><span>Profile</span></a>
            </li>
            <li class="dropdown ">
              <a href="transaction.php" class="nav-link"><i data-feather="maximize-2"></i><span>User Details</span></a>
            </li>
            <li class="dropdown ">
              <a href="withdrawal.php" class="nav-link"><i data-feather="trending-down"></i><span>Withdrawal</span></a>
            </li>
            <li class="dropdown">
              <a href="logout-user.php" class="menu"><i data-feather="log-out"></i><span>Logout</span></a>
                
            </li>
          </ul>
        </aside>
      </div>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="row text-center ">
            <div class="col-xl-5 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">User Details</span></h5>
                        </div>
                      </div>
                      <!-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                        <p class="mb-0"><span class="col-green"><button class="form-control button col-purple" onclick="myFunction()">Copy</button></span></p>
                        </div>
                      </div> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div>
            <section class="section">
  <!-- <p name="status"></p>
  <p name="status_code"></p> -->

<!-- DataTales Example -->
            <style>
            .section tr{
                display: flex;
                /* flex-direction:space-around; */
                width:100%;
                margin:30px 70px;
                font-weight:bolder;
                color:purple;
                border-left:1px solid #aaddee;
                padding:5px;


            }.section th, td{
              width:100px;
              padding:10px;

            }
            .section ul{
                width:100%;
                /* overflow-x: scroll; */

            }
            @media only screen and (max-width: 800px) {
              .section tr{
                display: flex;
                /* flex-direction:space-around; */
                width:100%;
                margin:10px;
                font-weight:bolder;
                color:purple;
                border-left:1px solid #aaddee;
                padding:5px;

            }
            .section th, td{
              width:100px;
              padding:5px;

            }
            
            }

            </style>
             <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Admin Profile</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
       
                <table class="table table-bordered" id="dataTable" width="90%" cellspacing="0">
                    <thead>
                        <tr>
                            <th> ID </th>
                            <th> Wallet Address </th>
                            <th>Name </th>
                            <th>Email </th>
                            <th>Status</th>
                            <th>Current Amount</th>
                            <th>Investment Amount</th>
                            <th>Referral Balance</th>
                            <th>Total Amount</th>
                            <th>EDIT</th>
                            <th>DELETE</th>
                        </tr>
                    
      <?php

$query = "SELECT * from usertable"; 
// $query = "SELECT * FROM register";
$query_run = mysqli_query($con, $query);

                        if(mysqli_num_rows($query_run) > 0)        
                        {
                            while($row = mysqli_fetch_assoc($query_run))
                            {
                        ?>
                            <tr>
                                <td><?php  echo $row['id']; ?></td>
                                <td><?php  echo $row['waddress']; ?></td>
                                <td><?php  echo $row['name']; ?></td>
                                <td><?php  echo $row['email']; ?></td>
                                <td><?php  echo $row['status']; ?></td>
                                <td><?php  echo $row['investmentamount']; ?></td>
                                <td><?php  echo $row['currentprice']; ?></td>
                                <td><?php  echo $row['referralbonus']; ?></td>
                                <td><?php  echo $row['totalbalance']; ?></td>

                                <td>
                                    <form action="adminedit.php" method="post">
                                        <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="registeredusers.php" method="post">
                                        <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                                    </form>
                                </td>
                            </tr>
                        <?php
                            } 
                        }
                        else {
                            echo "No Record Found";
                        }
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>
<script>

// var edit = document.getElementById('edit').addEventListener('click', go);
// function go(){
// console.log('hi')
// }
</script>
         
         <!-- copy and pest -->
         <script>

         </script>

  <!-- General JS Scripts -->
  <script src="User-assests/js/app.min.js"></script>
  <!-- JS Libraies -->
  <script src="User-assests/bundles/apexcharts/apexcharts.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="User-assests/js/page/index.js"></script>
  <!-- Template JS File -->
  <script src="User-assests/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="User-assests/js/custom.js"></script>
</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->
</html>