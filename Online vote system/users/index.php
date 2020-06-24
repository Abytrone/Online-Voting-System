<?php 
  	session_start();
  	if(isset($_SESSION['staff'])){
    	header('Location:voters.php');
  	}
?>
<?php include 'includes/header.php'; ?> 
  <div class="" style="width:100%;">
 <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <img class="img-profile " style="width: 3em;margin-left: 10em;" src="../images/aites.png">
          <div class="topbar-divider d-none d-sm-block"></div>
          <span class="mr-2 d-none d-lg-inline text-gray-600">AITES Online Voting System</span>
          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Sign In as</span>
                <img class="img-profile rounded-circle" src="../images/profile.jpg">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="../admin/index.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Admin 
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- NAVBAR -->
        <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-xl-3 col-lg-6 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
              <div class="col-lg-12">
                <div class="" style="padding: 3em;">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Staff!</h1>
                  </div>
                  <form class="user" action="login.php" method="POST">
                    <div class="form-group">
                      <input type="text" name="username" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Username">
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                    </div>
                    <button type="submit" class="col-xs-4 btn btn-success" name="login"><i class="fa fa-sign-in"></i> Sign In</button>
                    <hr>
                  </form>
                  <div class="text-center">
                   <!-- <span>Some description!</span>-->
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
          <!-- Footer -->
      <footer class="sticky-footer bg-gray">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; ABY-TECH <?php echo date('Y'); ?></span>
          </div>
        </div>
      </footer>
    <?php
      if(isset($_SESSION['error'])){
        echo "
          <div class='callout callout-danger text-center mt20'>
            <p>".$_SESSION['error']."</p> 
          </div>
        ";
        unset($_SESSION['error']);
      }
    ?>
<?php include 'includes/scripts.php' ?>
  </div>
    </div>
  </div>
</body>
</html>