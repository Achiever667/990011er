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
  <title><?php echo $fetch_info['name'] ?> | Home</title>
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
       <li class="dropdown"><h5>Hi, <span><?php echo $fetch_info['name'] ?></span></h5></li>
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
            <li class="menu-header"><?php echo $fetch_info['name'] ?> YOU ARE <?php echo $fetch_info['status'] ?></li>
            <li class="dropdown active">
              <a href="user-dashboard.php" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown ">
              <a href="investmentp.php" class="nav-link"><i data-feather="activity"></i><span>Invest</span></a>
            </li>
         <!-- https://commerce.coinbase.com/charges/W3922MVH -->
            <li class="dropdown">
              <a href="investmentp.php" class="menu-toggle nav-link has-dropdown"><i data-feather="bar-chart"></i><span>Investment Plans</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="basic.php">Basic</a></li>
                <li><a class="nav-link" href="standard.php">Standard</a></li>
                <li><a class="nav-link" href="unlimited.php">Unlimited</a></li>
              </ul>
            </li>
            <li class="dropdown ">
              <a href="uer-profile.php" class="nav-link"><i data-feather="maximize-2"></i><span>Profile</span></a>
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
      <style>
        .main-content ul li{
          display: inline-block;
          margin:0px 30px;
          font-size:12px;
        }
        .main-content ul{
          margin-left:auto;          
        }
        .main-content ul li h2{
          font-size:12px;
          
        }
        .main-content ul li small{
          font-size:12px;
          
        }
        .main-content h1{
          font-size:14px;
          margin:0px 30px;
        }
        .year{
          display:none;
        }
      </style>
      <div class="main-content">
        <section class="section">
          <div class="row ">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">Current Amount</h5>
                          <h2 class="mb-3 font-18">$ <?php echo $fetch_info['currentprice'] ?></h2>
                          <p class="mb-0"><span class="col-green">Date : <?php echo " " . date("Y-m-d"); ?></span></p>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="User-assests/img/banner/1.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15"> Current Invest</h5>
                          <h2 class="mb-3 font-18">$<?php 
                          if(!$fetch_info['investmentamount'] == 0){
                            echo (floor($fetch_info['investmentamount']))+ 100/5,2;
                            // echo $fetch_info['investmentamount']+= 100 / 6; 

                          }else{

                          }
                          ?></h2>
                          <p class="mb-0"><span class="col-green">Date : <?php echo " " . date("Y-m-d"); ?></span></p>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pd-3">
                        <div class="banner-img pd-3">
                          <img src="assets/img/coin counter.gif" width="200" height="140" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">Referral Balance</h5>
                          <h2 class="mb-3 font-18">$<?php echo $fetch_info['referralbonus'] ?></h2>
                          <p class="mb-0"><span class="col-green">Date : <?php echo " " . date("Y-m-d"); ?></span></p>

                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="User-assests/img/banner/3.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">Total Balance</h5>
                          <h2 class="mb-3 font-18">$<?php echo $fetch_info['totalbalance'] + $fetch_info['referralbonus'] + $fetch_info['currentprice'] +$fetch_info['investmentamount'] ?></h2>
                          <p class="mb-0"><span class="col-green">Date : <?php echo " " . date("Y-m-d"); ?></span></p>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="User-assests/img/banner/4.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
              <div class="card ">
                <div class="card-header">
                  <h4>Mining Machine</h4>
                  
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-12">
                      <img src="assets/img/minig machine.gif" alt="" style="width: 100%; height: 40vh;">
                  </div>
                </div>
              </div>
            </div>
            </div>
            </div>
          </div>
         
	<!--Start of Tawk.to Script-->
	<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/60771248067c2605c0c26977/1f38huruf';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
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