<?php require("config.php"); ?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
  <link rel="stylesheet" href="/assist/css/style.css">
  <title>HD HUB</title>

</head>

<body class="bg-black text-white">
  <nav class="navbar py-0 bg-dark bg-opacity-25  main-navbar navbar-expand-lg">
    <div class="container-fluid ">
      <div class=" py-2">
       <a class="navbar-brand  mx-0 mx-xl-1 py-3" href="http://localhost/index.php">
          <img class="" height="40px"  src="http://localhost/assist/img/Logo.png" alt="hdhub4u-logo">
       </a>
      </div>
     <div class="d-flex">
        <div class="col    d-lg-none search-bar">
          <form class="d-flex" action="http://localhost/search/" method="post">
            <input class="form-control me-2" name="search" id="search" type="text" placeholder="Search" required>
            <button name="searchbtn" class="nav-search btn btn-dark " type="submit"><i class="fa fa-magnifying-glass"></i></button>
          </form>
        </div>
        <button class="navbar-toggler bg-dark  py-0 ms-1" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fa-solid text-white  fa-bars"></i>
        </button>
        </button>
      </div>

      <div class="navbar-collapse  nav-item ms-xl-5  " id="navbarSupportedContent">
        <ul class="navbar-nav text-nowrap  menu main-nav ms-auto me-auto mb-2 mb-lg-0">
          <li class="nav-item ">
            <a class="nav-link" href="#">Disclaimer</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Join HD Hub</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Movie Request </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">How To Downlaod</a>
          </li>
          <li class="nav-item object-fit: cover; ">
            <a class="nav-link" href="#">Join Telegram Chinnel</a>
          </li>
        </ul>
        <div class="col-xl-3 d-none d-lg-block search-bar">
          <form class="d-flex" action="http://localhost/search/" method="post">
            <input class="form-control me-2" name="search" id="search" type="text" placeholder="Search" required>
            <button name="searchbtn" class="nav-search d-none d-xl-block btn btn-dark " type="submit"><i class="fa fa-magnifying-glass"></i></button>
          </form>
        </div>
      </div>
    </div>
  </nav>
  <!---Latest Releases Slider-->
  <div class="container-fluid bg-info p-0">
    <ul class="p-0 m-0 owl-carousel owl-theme  ">
      <?php
      $show = "SELECT id,poster,title FROM movile_data ORDER BY id DESC LIMIT 20 ";

      $run  = mysqli_query($con, $show) or die(mysqli_error($con));

      if (mysqli_num_rows($run) > 0) {

        while ($movies = mysqli_fetch_assoc($run)) { ?>

          <li class="sld-card bg-dark">
            <a href="/download?id=<?php echo $movies['id']; ?>">
              <img src="<?php echo $movies['poster']; ?>" alt="<?php echo $movies['title']; ?>">
            </a>
          </li>
      <?php
        }
      } else echo "No Movie Found";
      ?>
    </ul>
    <!---Latest Releases Slider End-->
    <!---Category,Tagline,Language,Quelty Buttun -->
    <ul class="navbar justify-content-center gap-2 bg-black m-0" type="none">
      <?php
      $show = "SELECT id,categories FROM categories ";

      $run  = mysqli_query($con, $show) or die(mysqli_error($con));

      if (mysqli_num_rows($run) > 0) {

        while ($cat = mysqli_fetch_assoc($run)) { ?>

          <li class="nav-item btn btn-primary mb-1">
            <a class="nav-link" href="/category?id=<?php echo $cat['id']; ?>">
              <?php echo $cat['categories']; ?>
            </a>
          </li>
      <?php
        }
      } else echo "No Movie Found";
      ?>
    </ul>
    <!---Category,Tagline,Language,Quelty Buttun End -->
  </div>