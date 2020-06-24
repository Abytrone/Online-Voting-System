  <div id="content" style="width:100%;">
 <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <img class="logo" src="images/aites.png">
          <div class="topbar-divider d-none d-sm-block"></div>
          <span class="mr-2 d-none d-lg-inline text-gray-600">AITES | Voting System</span>
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
               <?php echo $voter['firstname'].' '.$voter['lastname']; ?>
                </span>
                <img class="img-profile rounded-circle" src="<?php echo (!empty($voter['photo'])) ? 'images/'.$voter['photo'] : 'images/profile.jpg' ?>">
              </a>
            </li>
            <div class="topbar-divider d-none d-sm-block"></div>
            <li classs="nav-item">
              <form class="nav-link mt-2" action="logout.php" method="POST"> 
                <button type="submit" name="logout_btn" class="btn btn-primary"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>Logout</button>
              </form>
            </li>
          </ul>
        </nav>
        <!-- End of Topbar -->
<?php include 'includes/ballot_modal.php'; ?>