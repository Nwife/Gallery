<?php

if(isset($_POST['submit'])){
  $newFileName = $_POST['filename'];
  if(empty($_POST['filename'])){
    $newFileName = "Gallery";
  }else{
    $newFilename = strtolower(str_replace(" ", "-", $newFileName)); //you know what str_replace does
  }

  $imageTitle = $_POST['filetitle'];
  $imageDesc = $_POST['filedesc'];


  $file = $_FILES['file']; //we us the files super global to gather info about the file

  //print_r($file);

  $fileName = $file['name'];
  $fileType = $file['type'];
  $fileTempName = $file['tmp_name'];
  $fileError = $file['error'];
  $fileSize = $file['size'];


  $fileExt = explode(".", $fileName);
  $fileActualExt = strtolower(end($fileExt)); //the end functon extracts the last element from the explode array

  $allowed = array("jpg", "jpeg", "png");

  if(in_array($fileActualExt, $allowed)){
    if($fileError === 0){
      if($fileSize < 2000000){
        $imageFullName = $newFileName . "." . uniqid("", true) . "." . $fileActualExt;
        $fileDestination = "../img/gallery/" . $imageFullName;

        include_once "dbh.inc.php";
        //error handlers for the form
        if(empty($imageTitle) || empty($imageDesc)){
          header("../gallery.php?upload=empty");
          exit();
        }else{
          $sql = "SELECT * FROM picture;";
          $stmt = mysqli_stmt_init($conn);
          if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "SQL statement failed";
          }else{
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $rowCount = mysqli_num_rows($result);
            $setImageOrder = $rowCount+ 1;

            $sql = "INSERT INTO picture (titleGallery, descGallery, imgFullNameGallery, orderGallery) VALUES (?, ?, ?, ?);";

            if(!mysqli_stmt_prepare($stmt, $sql)){
              echo "SQL statement failed";
            }else{
              mysqli_stmt_bind_param($stmt, "ssss", $imageTitle, $imageDesc, $imageFullName, $setImageOrder);
              mysqli_stmt_execute($stmt);
            }
            //now we can upload the mage to our local server
            move_uploaded_file($fileTempName, $fileDestination);

            header("Location: ../gallery.php?upload=success");

            
            
          }
        }
      }else{
        echo 'File size is too big!';
        exit();
      }
    }else{
      echo 'You had an error!';
      exit();
    }
  }else{
    echo 'You need to upload a proper file type!';
    exit();
  }



    
}else{
    header("Location: ../gallery.php");
    exit();
}