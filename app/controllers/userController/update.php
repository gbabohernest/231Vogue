<?php

use app\CRUDInputsValidations\ValidateInputs;

require_once appUtilities('dbCon.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $errors = [];
    $errors = ValidateInputs::validateCustomerProfileBasicDetailsEdit($_POST);


    if (!empty($errors)) {
        return view('user/basic-details-edit.view.php', [
            'errors' => $errors
        ]);
    }

    $user_id = ($_SESSION['user']['user_id'] ?? false);


    try {
        $db->query("UPDATE users set first_name = :first_name, last_name = :last_name where user_id = :user_id", [
            'first_name' => $_POST['first_name'],
            'last_name' => $_POST['last_name'],
            'user_id' => $user_id
        ]);

        header('Location: /basic-details/show');
        exit();

    } catch (Exception $e) {
        echo "Error, Failed to perform UPDATE" . $e->getMessage();
    }
}