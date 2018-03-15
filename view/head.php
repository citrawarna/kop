 <?php
    include_once "proses/config.php";
    cek_login();
    //untuk title dinamis
    if($link == $url.'dashboard.php'){
      $title =  "Dashboard"; 
    } else if($link == $url.'staff.php'){
      $title = "Staff";
    } else if($link == $url.'anggota.php'){
      $title = "Anggota";
    } else if($link == $url.'peminjaman.php'){
      $title = "Peminjaman";
    } else if($link == $url.'angsuran.php'){
      $title = "Angsuran";
    }

  ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/kop2.jpg">

    <title> <?= $title ?> - Koperasi Error Logic</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark sticky-top bg-success flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Koperasi Error Logic</a>
      
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="proses/logout.php">Sign out</a>
        </li>
      </ul>
    </nav>