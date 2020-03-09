<?php

include_once '../../services/HebergementService.php';
include_once '../../classes/Hebergement.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    inscription();
}

// header('Content-type: application/json');
//$input = file_get_contents('php://input');
//$listHebergement = json_decode($input);
//    foreach ($listHebergement as $hebergement) {
//
//        $codeHebergement = $hebergement->codeHebergement;
//        $nom = $hebergement->nom;
//        $paye = $hebergement->paye;
//        $ville = $hebergement->ville;
//        $adress = $hebergement->adress;
//        $adressMap = $hebergement->adressMap;
//        $responsable = $hebergement->responsable;
//        $description = $hebergement->description;
//        $logo = $hebergement->logo;
//        $telephon = $hebergement->telephon;
//        $email = $hebergement->email;
//        $password = $hebergement->password;
//
//        $hebergementService->inscription(new Hebergement($codeHebergement, $nom, $paye, $ville, $adress, $adressMap, $responsable, $description, $logo, $telephon, $email, $password));
//        //echo $date_hebergement.' '.$matiere_id.' '.$stagiaire_id.' '.$nbre_heure;
//    }

function upload()
{
    // $_FILES = json_decode(file_get_contents("php://input"), true);
    // Image uploading folder.
    $target_dir = "uploads/images";

    // Receiving image tag sent from application.
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    $ext = explode("/", $_POST["imageName"])[1];
    // $ext = pathinfo($name, PATHINFO_EXTENSION); //get EXTENSION
    // Generating random image name each time so image name will not be same .
    $target_dir = $target_dir . "/" . rand() . "_" . time() . "." . $ext;
    // $ext = pathinfo($filename, PATHINFO_EXTENSION);
    // $path = dirname(__FILE__);

    $path = $target_dir;
    // Receiving image sent from Application	
    try {
        // if (move_uploaded_file($_FILES['image']['tmp_name'], $target_dir)) {
        //     // $file = basename($path);         // $file is set to "index.php"
        //     $MESSAGE = "Image Uploaded Successfully.  ";

        //     // Printing response message on screen after successfully inserting the image .	
        //     echo json_encode($MESSAGE);
        // } else {

        //     $MESSAGE = "Image Uploaded Not Successfully.";
        //     // Printing response message on screen after successfully inserting the image .	
        //     echo json_encode($MESSAGE);
        // }
        file_put_contents('./' . $target_dir, base64_decode($_POST['image']));
        // echo json_encode("OKI");
        return $target_dir;
    } catch (Exception $x) {
        echo json_encode($x->getMessage()."================>yes");
        return '';
    }
}

function inscription()
{
    //$_POST = json_decode(file_get_contents("php://input"), true);
    $token = bin2hex(random_bytes(64));
    $codeHebergement = substr($token,0,13);
    $nom = $_POST['nom'];
    $paye = $_POST['paye'];
    $ville = $_POST['ville'];
    $adress = $_POST['adress'];
    $adressMap = $_POST['adressMap'];
    $responsable = $_POST['responsable'];
    $description = $_POST['description'];
    $logo = upload();
    $telephon = $_POST['telephon'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // echo json_encode([
    //     'imputs' => $_POST,
    //     'logo' => $logo
    // ]);


    $hebergementService = new HebergementService();

    echo json_encode($hebergementService->inscription(new Hebergement($codeHebergement, $nom, $paye, $ville, $adress, $adressMap, $responsable, $description, $logo, $telephon, $email, $password)));
        echo 'message de serveur : ' . '\' ca marche le nom est : ' . $codeHebergement . ' \'';

}
