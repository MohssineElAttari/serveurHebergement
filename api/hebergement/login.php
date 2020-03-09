<?php

include_once '../../services/HebergementService.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    login();
}

function login() {
    $_POST = json_decode(file_get_contents("php://input"), true);
    // Check whether username or password is set from mobile	
    // Innitialize Variable
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';


    $hebergementService = new HebergementService();
    // send result back to android

    echo json_encode($hebergementService->login($email, $password));
}
