



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 <!--Haeder--->
 <?php require ("../require/header.php"); ?>
<!--Haeder End--> 

<!---Main Content admin ------------->
<div class="container-fluid">
    <div class="row min-vh-100 justify-content-center">




      <div class="col-6 mb-3 mt-3  ">

        <div class="entry-form text-white  p-4">
          <h5>Movie Uploading</h5>
          <form class="needs-validation" action="process.php" method="post" enctype="multipart/form-data" novalidate>
            <div class="row ">
              <!------Chek box end--> 
            <div class="col-12">
                  <label class="mb-2 bb" for="validationTooltip05">Categories</label><br>
                  <?php
                         $show = "SELECT * FROM categories ";

                         $run  = mysqli_query($con,$show) or die (mysqli_error($con));

                      if(mysqli_num_rows($run) > 0) {

                          while($profile = mysqli_fetch_assoc($run)){ ?>

                  <div class="form-check form-check-inline form-ckek-sm">
                    <input class="form-check-input form-check-inpu-sm " name="categories[]" type="checkbox" id="inlineCheckbox1" value="<?php echo $profile['id']; ?>">
                    <label class="form-check-label" for="inlineCheckbox1"><?php echo $profile['categories']; ?></label>
                  </div> 
                  <?php
                    } 
                    }
                  ?>             
                </div>        
          
                   
              <!------Chek box end-->
              <div class="col-4 mb-2">
                <label for="validationTooltip05">Name</label>
                <input type="text" name="name" value="" id="name" class="form-control form-control-sm form-control form-control-sm-sm " id="validationTooltip05" placeholder="Name " required>
              </div>
              <div class="col-4 mb-2">
                <label for="validationTooltip05">Date</label>
                <input type="date" name="date" value="" id="date" class="form-control form-control-sm" id="validationTooltip05" placeholder="Name" required >
              </div>
              <div class="col-4 mb-2">
                <label for="validationTooltip05">Title</label>
                <input type="text" name="title" value="" id="title" class="form-control form-control-sm" id="validationTooltip05" placeholder="Title " required>
              </div>
              <div class="col-4 mb-2">
                <label for="validationTooltip05">IMDB Rating</label>
                <input type="text" name="imdb_rating" value="" id="imdb_rating" class="form-control form-control-sm" id="validationTooltip05" placeholder="IMDB Rating " required>
              </div>
              <div class="col-4 mb-2">
                <label for="validationTooltip05">Genare</label>
                <input type="text" name="genare" value="" id="genare" class="form-control form-control-sm" id="validationTooltip05" placeholder=" " required>
              </div>
              <div class="col-4 mb-2">
                <label for="validationTooltip05">Stars</label>
                <input type="text" name="stars" value="" id="stars" class="form-control form-control-sm" id="validationTooltip05" placeholder=" " required>
              </div>
              <div class="col-4 mb-2">
                <label for="validationTooltip05">Diractor</label>
                <input type="text" name="diractor" value="" id="diractor" class="form-control form-control-sm" id="validationTooltip05" placeholder=" " required>
              </div>
              <div class="col-4 mb-2">
                <label for="validationTooltip05">Language</label>
                <input type="text" name="language" value="" id="language" class="form-control form-control-sm" id="validationTooltip05" placeholder=" " required>
              </div>
              <div class="col-4 mb-2">
                <label for="validationTooltip05">Subtitle</label>
                <input type="text" name="subtitle" value="" id="subtitle" class="form-control form-control-sm" id="validationTooltip05" placeholder=" " required>
              </div>
              <div class="col-4 mb-2">
                <label for="validationTooltip05">Duration</label>
                <input type="text" name="duration" value="" id="duration" class="form-control form-control-sm" id="validationTooltip05" placeholder=" " required>
              </div>
              <div class="col-4 mb-2">
                <label for="validationTooltip05">Feedback</label>
                <input type="text" name="feedback" value="" id="feedback" class="form-control form-control-sm" id="validationTooltip05" placeholder=" " required>
              </div>
              <div class="col-4 mb-2">
                <label for="validationTooltip05">Disqus</label>
                <input type="text" name="disqus" value="" id="disqus" class="form-control form-control-sm" id="validationTooltip05" placeholder=" " required>
              </div>


              <div class="mb-2">
                <label for="validationTextarea">Description </label>
                <textarea name="description" class="form-control form-control-sm is-invalid" id="validationTextarea" placeholder="Description." required></textarea>
              </div>
              <div class="mb-2">
                <label for="validationTextarea">Storyline </label>
                <textarea name="storyline" class="form-control form-control-sm is-invalid" id="validationTextarea" placeholder="Storyline........." required></textarea>
              </div>
              <div class="mb-2">
                <label for="validationTextarea">Review </label>
                <textarea name="review" class="form-control form-control-sm is-invalid" id="validationTextarea" placeholder="Review........." required></textarea>
              </div>

              <div class="col-4 mb-2">
                <label for="validationTooltip05">Poster URL</label>
                <input type="text" name="poster" value="" id="poster_url" class="form-control form-control-sm" id="validationTooltip05" placeholder=" " required>
              </div>

              <div class="col-4 mb-2">
                <label for="validationTooltip05">Watch URL</label>
                <input type="text" name="watch" value="" id="watch_url" class="form-control form-control-sm" id="validationTooltip05" placeholder=" " required>
              </div>
              <div class="col-4 mb-2">
                <label for="validationTooltip05">Teaser URL</label>
                <input type="text" name="teaser" value="" id="teaser_url" class="form-control form-control-sm" id="validationTooltip05" placeholder=" " required>
              </div>
              <!--Dynamic input add or remove for screecshoot-->
              <div class="col-12 mb-2">
                <label for="validationTooltip05">Screenshot URL</label>
                <div class="d-flex justify-content-between" >
                <div class="col-10">
                    <div class="row d-flex column-gap-0  justify-content-start" id="ssinputfields">
                      <div class="col-3" id="row">
                        <input type="text" name="vsample[]" value="" id="add" class="form-control form-control-sm">
                      </div>
                    </div>
                  </div>
                  <div class="col-2">
                    <button type="button" id="ssinputadd" class="btn btn-sm btn-success ms-3"><i class="fa fa-plus"></i></button>
                    <button type="button" id="ssremove" class="btn btn-sm btn-danger btn_remove  ms-3 "><i class="fa-solid fa-trash-can"></i></button>
                  </div>
                </div>
              </div>
              <!--Dynamic input add or remove for Download-->
              <div class="col-12 mb-2">
                <label for="validationTooltip05">Downlaod URL</label>
                <div class="col-12 ">                
                <div class="form-check form-check-inline">
                  <input class="form-check-input" name="quality[]" type="checkbox" id="q480p" value="480P">
                  <label class="form-check-label" >480P</label>
                </div>
                <div class="form-check form-check-inline ">
                  <input class="form-check-input" name="quality[]" type="checkbox" id="q720p"  value="720P">
                  <label class="form-check-label" >720P</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" name="quality[]" type="checkbox" id="q1080p" value="1080P">
                  <label class="form-check-label" for="inlineCheckbox1">1080P</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" name="quality[]" type="checkbox" id="q4k" value="4K">
                  <label class="form-check-label" >4K</label>
                </div>

              </div>
                <div class="d-flex justify-content-between ">
                  <div class="col">
                    <div class="row d-flex column-gap-0  justify-content-start" id="durl-feild">
                      <!---Auto Genrate download url  input Here --->
                    </div>
                  </div>                

                </div>
              </div>
            </div>
            <input class="btn btn-primary" name="upload" type="submit"></input>
          </form>
        </div>
      </div>
    </div><!---Row-->
  </div> <!---Container-->



 <!--Footer--->
 <?php require ("../require/footer.php"); ?>
<!--Footer End-->  
</body>
</html>