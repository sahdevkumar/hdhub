<?php
require "../require/config.php"; ?>
<?php


///Define arry for null input box   
array('q480p', 'q720p', 'q1080p','q4k');
array('quality');


if((isset($_POST['upload']))){
    array('q480p', 'q720p', 'q1080p','q4k');
$name           = $_POST['name'];
$date           = $_POST['date'];
$title          = $_POST['title'];
$imdb_rating    = $_POST['imdb_rating'];
$genare         = $_POST['genare'];
$stars          = $_POST['stars'];
$diractor       = $_POST['diractor'];
$language       = $_POST['language'];
$subtitle       = $_POST['subtitle'];
$duration       = $_POST['duration'];
$feedback       = $_POST['feedback'];
$disqus         = $_POST['disqus'];
$poster         = $_POST['poster'];
$watch_link     = $_POST['watch'];
$teaser_link    = $_POST['teaser'];
$description    = $_POST['description'];
$storyline      = $_POST['storyline'];
$review         = $_POST['review'];
$categories = isset($_POST["categories"]) ? implode(",", $_POST["categories"]) : "";



$uploading = "INSERT INTO movile_data (name, date, title, imdb_rating, genare,stars,diractor,language,subtitle,duration,
                                                feedback,disqus,poster,watch_link,teaser_link,description,storyline,review,categories)
    
            VALUES    ('$name', '$date', '$title', '$imdb_rating', '$genare','$stars','$diractor','$language','$subtitle',
            '$duration','$feedback','$disqus','$poster','$watch_link','$teaser_link','$description','$storyline','$review','$categories')";

$run               = mysqli_query($con,$uploading);
$movie_data_id     = mysqli_insert_id($con);

if($run)  echo "First Data Inserted Your id is :".$movie_data_id;

 //for categories arry
 if(!empty($_POST["categories"])){


    foreach($_POST["categories"] as $categories){
                
            $insert =  "INSERT INTO categories (movie_data_id,categories) VALUES ('$movie_data_id','$categories')";

            $run = mysqli_query($con,$insert);        
    }
 }else echo "<br>Cheked categories box <br>";
//for categories insert end 

//for quality Sample 
if(!empty($_POST["vsample"])){    
    
    foreach($_POST["vsample"] as $screenshot_url){
                    
            $insert =  "INSERT INTO screenshot( movie_data_id, screenshot_url) VALUES('$movie_data_id','$screenshot_url')";
    
            $run = mysqli_query($con,$insert);
    
        if ($run){
            echo "<br>quality Sample  Stage Oky";
            }
        }
    }

//for quality insert  
if(!empty($_POST["quality"])){    

    foreach($_POST["quality"] as $quality){
                
        $insert =  "INSERT INTO quality (movie_data_id,quality_type) VALUES ('$movie_data_id','$quality')";

        $run = mysqli_query($con,$insert);

    if ($run){
        echo "<br>Third  Stage Oky";
        }
    }
}
//for Download Link insert 
if(!empty($_POST["quality"])){ 
    $qualitys = $_POST['quality'];
    $download_inputs = $_POST['download_input'];
    

    // Loop through the input arrays and insert into the database
    for ($i = 0; $i < count($qualitys); $i++) {
        $quality = $con->real_escape_string($qualitys[$i]);
        $download_input = $con->real_escape_string($download_inputs[$i]);
        

        // SQL query to insert data into the database
        $sql = "INSERT INTO download_link (movie_data_id,d_url,d_btn) VALUES ('$movie_data_id','$download_input','$quality')";

        if ($con->query($sql) !== TRUE) {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    }

    echo "Data inserted successfully!";

    header("Location:index.php?msg=error"); 

    } echo "<br>Select Quelty First";
    header("Location:index.php?msg=Uploded"); 
}
?>