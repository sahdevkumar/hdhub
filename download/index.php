<?php require '../require/header.php' ?>
<?php
if (isset($_GET['id'])) {
    $movie_data_id = $_GET['id'];
    //Movie data
    $sql = "SELECT * FROM movile_data WHERE  $movie_data_id = id ";

    $run = mysqli_query($con, $sql) or die(mysqli_error($con));

    $movie = mysqli_fetch_array($run);

    $name           = $movie["name"];
    $date           = $movie["date"];
    $title          = $movie["title"];
    $imdb_rating    = $movie["imdb_rating"];
    $genare         = $movie["genare"];
    $stars          = $movie["stars"];
    $diractor       = $movie["diractor"];
    $language       = $movie["language"];
    $subtitle       = $movie["subtitle"];
    $duration       = $movie["duration"];
    $feedback       = $movie["feedback"];
    $disqus         = $movie["disqus"];
    $poster         = $movie["poster"];
    $watch_link     = $movie["watch_link"];
    $teaser_link    = $movie["teaser_link"];
    $description    = $movie["description"];
    $storyline      = $movie["storyline"];
    $review         = $movie["review"];
    $country = "India";
    $language ="Hindi";

?>
    <div class="container bg-dark  p-0  ">
        <div class="title d-flex  justify-content-between ">
            <div class="d-flex col p-1 ps-0">
                <div class="ps-3 pe-3 ">
                    <div class="name  ">
                        <i class="fa-solid fa-clapperboard pe-2"></i>
                        <?php echo $title; ?>
                    </div>
                </div>
            </div>
            <div class="d-flex d-none d-md-block pt-2 p-2  col-md-3">
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
        <div class="d-flex bg-black bg-opacity-25">
            <ul class="navbar d-flex justify-content-start gap-2 row-gap-0  p-1 m-0 " type="none">
                <li class="p-1 ">
                    <?php if (!empty($date)) {
                        echo '<span class="pe-2"><i class="fa-solid fa-calendar-day  me-1"></i>' . $date . '</span>';
                    } ?>
                </li>
                <li class=" p-1 ">
                    <?php if (!empty($duration)) {
                        echo '<span class="pe-3"><i class="fa-solid fa-clock  me-1"></i>' . $duration . '</span>';
                    } ?>
                </li>
                <?php
                $show = "SELECT * FROM categories WHERE  $movie_data_id = movie_data_id ";

                $run  = mysqli_query($con, $show) or die(mysqli_error($con));

                if (mysqli_num_rows($run) > 0) {

                    while ($profile = mysqli_fetch_assoc($run)) {

                        echo '<li class="p-1 br-1 "><a  href="/category?id=' . $profile['id'] . '">
                                <i class="fa-solid fa-folder-closed me-2"> </i>' . $profile['categories'] . "</a></li>";
                    }
                } ?>
            </ul>
        </div>
    </div>

    <!-----POSTER VIDEO SAMPE-->
    <div class="container bg-dark bg-opacity-50  ">
        <div class="d-grid d-md-flex  row-gap-1">
            <div class="col-md-3 p-2 p-md-0 ">
                <img class="img-wh-100" src="<?php echo $poster; ?>" alt="">
            </div>
            <div class="col-md-9 d-none trailer d-md-block p-2 p-md-0 ps-md-2">

                <iframe loading="lazy" src="<?php echo $teaser_link; ?>" width="100%" height="100%" frameborder="0" allowfullscreen="allowfullscreen" data-mce-fragment="1"></iframe>

            </div>
        </div>
    </div>
    <div class="container bg-dark bg-opacity-50 pb-2 ">
        <!-----ALL INFO LIKE STORY,STARS,Director,Writers-->
        <div class="d-md-flex justify-content-between   ">
            <div class="d-grid col-md-8 pe-sm-0 pe-md-3 row-gap-2 align-content-start">
                <div class="d-grid  ps-2  col-11  mt-sm-1  mb-sm-1 mt-md-3 justify-content-sm-start justify-content-md-start gap-md-3">
                    <div class="row row-gap-2 gap-2 ps-2 text-nowrap">
                        <?php
                        $show = "SELECT * FROM categories WHERE  $movie_data_id = movie_data_id ";

                        $run  = mysqli_query($con, $show) or die(mysqli_error($con));

                        if (mysqli_num_rows($run) > 0) {

                            while ($profile = mysqli_fetch_assoc($run)) {


                                echo '<a href="/category?id=' . $profile['id'] . ' "class="col btn  btn-outline-info">' . $profile['categories'] . "</a>";
                            }
                        }
                        ?>
                    </div>
                </div>
                <!----Php Code for Check data if not empty show Element---->
                <?php include "../require/chek.php";?>
                <div class=" p-2 br-3 <?php echo $mode_about; ?> bg-opacity-10 bg-info">
                    <p><?php echo $about; ?></p>
                </div>
                <div class="p-2 br-3 <?php echo $mode_storyline; ?>   bg-opacity-10 bg-info">
                    <h5>Storyline</h5>
                    <p><?php echo $storyline; ?></p>
                </div>
                <div class="p-2 br-3 <?php echo $mode_review; ?> bg-opacity-10 bg-info review">
                    <h5>Review </h5>
                    <p><?php echo $review; ?></p>
                </div>
                <div class="text-primary br-2 <?php echo $mode_director; ?> bg-opacity-10 p-2 bg-info">
                    <span class="text-white me-2">Director :</span><?php echo $diractor; ?> 
                </div>
                <div class="text-primary br-2 <?php echo $mode_stars; ?> bg-opacity-10 p-2 bg-info">
                    <span class="text-white me-2">Stars :</span><?php echo $stars; ?> 
                </div>
                <div class="text-primary br-2 <?php echo $mode_writers; ?> bg-opacity-10 p-2 bg-info">
                    <span class="text-white me-2">Writers :</span><?php echo $writers; ?> 
                </div>
                <div class="text-primary br-2 <?php echo $mode_release_date; ?> bg-opacity-10 p-2 bg-info">
                    <span class="text-white me-2">Release date:</span> <?php echo $release_date; ?> 
                </div>
                <!---Country of origin--->
                <div class="text-primary br-2 <?php echo $mode_country; ?> bg-opacity-10 p-2 bg-info">
                        <span class="text-white me-2">Country of origin:</span><?php echo $country; ?> 
                </div>           
                <div class="text-primary br-2 <?php echo $mode_language; ?> bg-opacity-10 p-2 bg-info">
                    <span class="text-white me-2">Language:</span><?php echo $language; ?> 
                </div>
                <div class="text-primary br-2 <?php echo $mode_duration; ?> bg-opacity-10 p-2 bg-info">
                    <span class="text-white br-2 me-2">Runtime :</span><?php echo $duration; ?> 
                </div>
                <div class="p-2 bg-opacity-10 br-3 <?php echo $mode_comments; ?> bg-info ">
                    <h5>Comment Section </h5>
                    <?php echo $comments; ?> 

                </div>


            </div>
            <div class="row col-md text-nowrap row-gap-2 align-content-start text-center  pt-3  ">
                <!---Side Box Start -->
                <div class="col bg-info p-2"><!---download btn section -->
                    <span class="text-white">Download Link </span>
                </div>
                <!---Ramdon Download Btn-->
                <?php
                $show = "SELECT * FROM download_link WHERE  $movie_data_id = movie_data_id ";

                $run  = mysqli_query($con, $show) or die(mysqli_error($con));

                if (mysqli_num_rows($run) > 0) {

                    while ($profile = mysqli_fetch_assoc($run)) {

                        echo '<div><a href="' . $profile['d_url'] . '" class="btn btn-warning w-auto ps-5 pe-5 pe-md-3 ps-md-3 pe-xl-5 ps-xl-5 mt-2">
                          Download ' . $profile['d_btn'] . "</a></div>";
                    }
                } ?>


                <!---Tagline Section section -->
                <div class="bg-info p-1 pt-2 ">
                    <h6>Screenshot</h6>
                </div>
                <div class="sample d-grid row-gap-2">
                    <?php
                        $show = "SELECT * FROM screenshot WHERE  $movie_data_id = movie_data_id ";

                        $run  = mysqli_query($con, $show) or die(mysqli_error($con));

                        if (mysqli_num_rows($run) > 0) {

                        while ($sample = mysqli_fetch_assoc($run)) {
                            echo '<img class="img-wh-100" src="' . $sample['screenshot_url'] . '" alt="Screenshot">';
                        }}
                    ?>
                </div>
                <!-----Movie Trailer Element show on screen 'sm' ------->
                <div class="pt-2 pb-1 bg-info d-md-none ">
                    <h6 class="">Movie Trailer</h6>
                </div>
                <div class="sample d-grid d-md-none  ">
                    <iframe loading="lazy" src="<?php echo $teaser_link; ?>" width="100%" height="100%" frameborder="0" allowfullscreen="allowfullscreen" data-mce-fragment="1"></iframe>

                </div>

                <!---keyberd Section section -->
                <div class="pt-2 pb-1 bg-info ">
                    <h6 class="">Shortcut</h6>
                </div>
                <div class="d-grid  ">
                    <div class="row row-gap-2 gap-2 p-2 text-nowrap">
                        <a href="" class="col btn  btn-outline-info">Action Hindi </a>
                        <a href="" class="col btn  btn-outline-info">Crime</a>
                        <a href="" class="col btn  btn-outline-warning">Action</a>
                        <a href="" class="col btn  btn-outline-success">Crime</a>
                        <a href="" class="col btn  btn-outline-light">Darama</a>
                        <a href="" class="col btn  btn-outline-info">Action</a>
                        <a href="" class="col btn  btn-outline-info">Crime Darama</a>
                        <a href="" class="col btn  btn-outline-info">Darama </a>
                        <a href="" class="col btn  btn-outline-info">Action</a>
                        <a href="" class="col btn  btn-outline-info">Crime</a>
                        <a href="" class="col btn  btn-outline-info">Darama Darama</a>
                        <a href="" class="col btn  btn-outline-info">Action Hindi </a>
                        <a href="" class="col btn  btn-outline-info">Crime</a>
                        <a href="" class="col btn  btn-outline-warning">Action</a>
                        <a href="" class="col btn  btn-outline-success">Crime</a>
                        <a href="" class="col btn  btn-outline-light">Darama</a>
                        <a href="" class="col btn  btn-outline-info">Action</a>
                        <a href="" class="col btn  btn-outline-info">Crime Darama</a>
                        <a href="" class="col btn  btn-outline-info">Darama </a>
                        <a href="" class="col btn  btn-outline-info">Action</a>
                        <a href="" class="col btn  btn-outline-info">Crime</a>
                        <a href="" class="col btn  btn-outline-info">Darama Darama</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
}
//}
//}

?>
<?php require '../require/footer.php' ?>