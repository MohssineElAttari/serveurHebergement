<?php
// Image uploading folder.
$target_dir = "uploads/images";

// if (getimagesize($target_dir.$name) !== false) {
//     // display image
// }

// if (file_exists($target_dir.$name)) {
//     echo "The file exists";
// } else {
//     echo "The file does not exist";
// }

// Receiving image tag sent from application.
// $img_tag = $_POST["image_tag"];
if (!file_exists($target_dir)) {
    mkdir($target_dir, 0777, true);
}
$ext = explode("/",$_POST["imageName"])[1];
// $ext = pathinfo($name, PATHINFO_EXTENSION); //get EXTENSION
// Generating random image name each time so image name will not be same .
$target_dir = $target_dir . "/" . rand() . "_" . time() . "." . $ext;
// $ext = pathinfo($filename, PATHINFO_EXTENSION);
//$path = "http:\/\/192.168.91.2\/serveurHebergement\/api\/hebergement\/uploads\/images\/13296_1573225316.png";
// $path = dirname(__FILE__);

// Receiving image sent from Application	
if (move_uploaded_file($_FILES['image']['tmp_name'], $target_dir)) {

    $MESSAGE = "Image Uploaded Successfully.  " . $target_dir;

    // Printing response message on screen after successfully inserting the image .	
    echo json_encode($MESSAGE);
} else {

    $MESSAGE = "Image Uploaded Not Successfully.";

    // Printing response message on screen after successfully inserting the image .	
    echo json_encode($MESSAGE);
}
