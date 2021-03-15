<?php
    $_SESSION['username'] = 'Admin';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<, initial-scale=1.0">
    <link rel="stylesheet" href="styling.css">
    <title></title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="#"><img src="img/icon.png" alt="logo"></a> </li> 
                <li><a href="index.php"><b>NWIFE |</b></a></li>
                <li><a href="#">PORTFOLIO</a></li>
                <li><a href="#">ABOUT ME</a></li>
                <li><a href="#">CONTACT</a></li>
            </ul>
        </nav>

        <main>
            <section class='gallery-links'>
                <div class='wrapper'>
                    <h2>Gallery</h2>

                    <div class='gallery-container'>
                    <?php
                    include_once 'includes/dbh.inc.php';

                    $sql = "SELECT * FROM picture ORDER BY orderGallery DESC;";
                    $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt, $sql)){
                      echo "SQL statement failed";
                    }else{
                      mysqli_stmt_execute($stmt);
                      $result = mysqli_stmt_get_result($stmt);

                      while($row = mysqli_fetch_assoc($result)){
                        echo '<a href="#">
                          <div style="background-image: url(img/gallery/'.$row["imgFullNameGallery"].'); "></div>
                          <h3>'.$row["titleGallery"].'</h3>
                          <p>'.$row["descGallery"].'</p>
                          </a>';
                      }
                    }
                     
                    ?>
                    </div>


                    <?php
                     if(isset($_SESSION['username'])){
                      echo '<div class="gallery-upload">
                       <p><b>UPLOAD</b></p>
                      <form action="includes/gallery-upload.inc.php" method="post" enctype="multipart/form-data">
                        <input type="text" name="filename" placeholder="File name..."><br>
                        <input type="text" name="filetitle" placeholder="File title..."><br>
                        <input type="text" name="filedesc" placeholder="Image description..."><br>
                        <input type="file" name="file"><br>
                        <button type="submit" name="submit">UPLOAD</button>
                      </form>
                      </div>';
                    }

                    ?>

                </div>
            </section>
        </main>  
    </header>
</body>
</html>

