     <!-- Sidebar -->
     <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Aites <sub>VS</sup></div>
  </a>
  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
    <a class="nav-link" href="index.php">
      <img class="img-profile " style="width: 3em;height: 3em;" src="../images/tatu1.png">
      <span>Dashboard</span></a>
  </li>
  <!-- Divider -->
  <hr class="sidebar-divider">
  <!-- Heading -->
  <div class="sidebar-heading">
    Tools
  </div>
  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-fw fa-users"></i>
      <span>Manage</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">MANAGE:</h6>
              <a class="collapse-item" href="voters.php">Voters</a>
              <a class="collapse-item" href="candidates.php">Candidates</a>
              <a class="collapse-item" href="positions.php">Positions</a>
              <a class="collapse-item" href="staff.php">Staff</a>
      </div>
    </div>
  </li>
  <!--
  <li class="nav-item">
    <a class="nav-link" href="votes.php">
      <i class="fas fa-fw fa-chart-area"></i>
      <span>Votes</span></a>
  </li>
  -->
  <!-- Nav Item - Utilities Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
      <i class="fas fa-fw fa-wrench"></i>
      <span>Settings</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">SETTINGS:</h6>
              <a class="collapse-item" href="ballot.php">Ballot Positions</a>
              <a class="collapse-item" href="privilages.php">User Privilages</a>
              <a class="collapse-item" href="#config" data-toggle="modal">Election Title</a>
              <a class="collapse-item" href="userslog.php">Voters Log</a>
              <a class="collapse-item" href="matricNumbers.php">Matric Numbers</a>
      </div>
    </div>
  </li>
  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">
  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div> 
  </ul>
  <!-- End of Sidebar -->
      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
    <div id="content">
    <?php include 'nav.php'; ?>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>
    <?php include 'config_modal.php'; ?>