<?php include 'require/header.php'; ?>
<?php //include 'index.process.php';
?>



<!---Main Content------------->

<div class="container bg-info bg-opacity-10  mt-2 pb-2 ">
  <div class="row content-title bg-dark justify-content-between p-2 ">
    <div class="col-6  p-1 ">
      <span class="main-title">Latest Releases</span>
    </div>
    <div class="col-xl-3 col-sm-4 p-0 Category-box">
      <Select class="form-select" id="categorySelect" onchange="changePage()">
        <option value="">Select Category</option>
        <?php
        $show = "SELECT * FROM categories ";

        $run  = mysqli_query($con, $show) or die(mysqli_error($con));

        if (mysqli_num_rows($run) > 0) {

          while ($profile = mysqli_fetch_assoc($run)) {


            echo '<option value="' . $profile['id'] . '">' . $profile['categories'] . "</option>";
          }
        }
        ?>

      </Select>
    </div>
  </div>

  <!---Poster--->

  <div class="row mt-3 p-0 content-box justify-content-start ">
    <?php
    $limit = 10; // Number of records to show per page
    $page = isset($_GET['page']) ? $_GET['page'] : 1; // Current page

    $start = ($page - 1) * $limit;

    $sql = "SELECT * FROM movile_data LIMIT $start, $limit";
    $result = $con->query($sql);
    while ($movies = mysqli_fetch_assoc($result)) { ?>
      <?php $id = $movies['id']; ?>
      <div class="col-md-4 col-sm-6 col-xl-3 p-card mb-2">
        <a href="download?id=<?php echo $movies['id']; ?>">
          <div class="box bg-dark">
            <div class="card-img">
              <img src="<?php echo $movies['poster']; ?>" alt="">
            </div>
            <p class="movie-name  ms-2 mb-2 "><?php echo $movies['title']; ?></p>
          </div>
        </a>
      </div>
    <?php  }  ?>

  </div>
  <div class="container mb-3 mt-3 ">
    <nav aria-label="Page navigation">
      <ul class="pagination">
        <?php
        $sql = "SELECT COUNT(*) AS total FROM movile_data";
        $result = $con->query($sql);
        $row = $result->fetch_assoc();
        $total_pages = ceil($row["total"] / $limit);
        if ($page > 1) :
        ?>
          <li class="page-item">
            <a class="page-link" href="?page=<?php echo $page - 1; ?>" aria-label="Previous">
              <span aria-hidden="true">&laquo; </span>
            </a>
          </li>
        <?php endif;

        for ($i = 1; $i <= $total_pages; $i++) :
        ?>

          <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
            <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
          </li>
        <?php endfor; ?>
        <?php if ($page < $total_pages) : ?>
          <li class="page-item">
            <a class="page-link" href="?page=<?php echo $page + 1; ?>" aria-label="Next">
              <span aria-hidden="true"> &raquo;</span>
            </a>
          </li>
        <?php endif; ?>
      </ul>
    </nav>
  </div>


</div>

<?php include 'require/footer.php'; ?>