
<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link <?php if($link == $url.'dashboard.php'){echo "active"; } ?>" href="dashboard.php">
              <span data-feather="home"></span>
              Dashboard <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if($link == $url.'staff.php'){echo "active"; } ?>" href="staff.php">
              <span data-feather="user"></span>
              Staff
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if($link == $url.'anggota.php'){echo "active"; } ?>" href="anggota.php">
              <span data-feather="users"></span>
              Anggota
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if($link == $url.'peminjaman.php'){echo "active"; } ?>" href="peminjaman.php">
              <span data-feather="dollar-sign"></span>
              Peminjaman
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if($link == $url.'angsuran.php'){echo "active"; } ?>" href="angsuran.php">
              <span data-feather="check-circle"></span>
              Angsuran
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
     


