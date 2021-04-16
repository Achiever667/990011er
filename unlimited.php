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
              class="nav-link dropdown-toggle nav-link-lg nav-link-user">  <img alt="image" src="assets/img/download.png"
                class="user-img-radious-style">  <span class="d-sm-none d-lg-inline-block"></span></a>
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
              <a href="invest.php" class="nav-link"><i data-feather="activity"></i><span>Invest</span></a>
            </li>
         
            <li class="dropdown">
              <a href="investmentp.php" class="menu-toggle nav-link has-dropdown"><i data-feather="bar-chart"></i><span>Investment Plans</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="basic.php">Basic</a></li>
                <li><a class="nav-link" href="standard.php">Standard</a></li>
                <li><a class="nav-link" href="unlimited.php">Unlimited</a></li>
                <li><a class="nav-link" href="investmentp.php">Referral Bonus</a></li>

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
      <div class="main-content">
        <section class="section">
        <h2 class="pd-4">Unlimited Package Investments</h2>
          <div class="row ">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content" id="Unlimited">
                          <h5 class="font-15"> Unlimited</h5>
                          <h2 class="mb-3 font-18 col-green"$>$5000</h2>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                        <p class="mb-0"><span class="col-green">10%</span> Increase per day for 5 days <span><a href="invest.php"><button class="form-control button col-purple">Buy Plan</button></a></span></p>
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
                        <div class="card-content" id="Unlimited">
                          <h5 class="font-15"> Unlimited</h5>
                          <h2 class="mb-3 font-18 col-green"$>$6000</h2>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                        <p class="mb-0"><span class="col-green">10%</span> Increase per day for 5 days <span><a href="invest.php"><button class="form-control button col-purple">Buy Plan</button></a></span></p>
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
                        <div class="card-content" id="Unlimited">
                          <h5 class="font-15"> Unlimited</h5>
                          <h2 class="mb-3 font-18 col-green"$>$7000</h2>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                        <p class="mb-0"><span class="col-green">10%</span> Increase per day for 5 days <span><a href="invest.php"><button class="form-control button col-purple">Buy Plan</button></a></span></p>
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
                        <div class="card-content" id="Unlimited">
                          <h5 class="font-15"> Unlimited</h5>
                          <h2 class="mb-3 font-18 col-green"$>$8000</h2>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                        <p class="mb-0"><span class="col-green">10%</span> Increase per day for 5 days <span><a href="invest.php"><button class="form-control button col-purple">Buy Plan</button></a></span></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row ">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content" id="Unlimited">
                          <h5 class="font-15"> Unlimited</h5>
                          <h2 class="mb-3 font-18 col-green"$>$9000</h2>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                        <p class="mb-0"><span class="col-green">10%</span> Increase per day for 5 days <span><a href="invest.php"><button class="form-control button col-purple">Buy Plan</button></a></span></p>
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
                        <div class="card-content" id="Unlimited">
                          <h5 class="font-15"> Unlimited</h5>
                          <h2 class="mb-3 font-18 col-green"$>$10,000</h2>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                        <p class="mb-0"><span class="col-green">10%</span> Increase per day for 5 days <span><a href="invest.php"><button class="form-control button col-purple">Buy Plan</button></a></span></p>
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
                        <div class="card-content" id="Unlimited">
                          <h5 class="font-15"> Unlimited</h5>
                          <h2 class="mb-3 font-18 col-green"$>$11,000</h2>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                        <p class="mb-0"><span class="col-green">10%</span> Increase per day for 5 days <span><a href="invest.php"><button class="form-control button col-purple">Buy Plan</button></a></span></p>
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
                        <div class="card-content" id="Unlimited">
                          <h5 class="font-15"> Unlimited</h5>
                          <h2 class="mb-3 font-18 col-green"$>$12,000</h2>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                        <p class="mb-0"><span class="col-green">10%</span> Increase per day for 5 days <span><a href="invest.php"><button class="form-control button col-purple">Buy Plan</button></a></span></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <p class="mb-0"> <span><a href="invest.php"><button class="form-group button col-purple">Other Amount</button></a></span></p>
<!-- Basic
https://commerce.coinbase.com/checkout/8b8607a3-ec4d-474d-ba2c-9c3d21929b75

<div>
  <a class="donate-with-crypto"
     href="https://commerce.coinbase.com/checkout/8b8607a3-ec4d-474d-ba2c-9c3d21929b75">
    Donate with Crypto
  </a>
  <script src="https://commerce.coinbase.com/v1/checkout.js?version=201807">
  </script>
</div>
 -->
          <!-- <i><a href="#" class="font-15"></a></i> -->
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