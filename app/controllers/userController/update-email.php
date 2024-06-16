<?php

use app\CRUDInputsValidations\ValidateInputs;

require_once appUtilities('dbCon.php');
require_once appUtilities('getUser.php');
$user = getUser($_SESSION, $db);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $errors = [];

    $errors = ValidateInputs::validateCustomerEmail($_POST);

    if (!empty($errors)) {
        return view('user/email-edit.view.php', [
            'errors' => $errors,
            'user' => $user
        ]);
    }

    $user_id = ($_SESSION['user']['user_id'] ?: false);
    try {
        $db->query('UPDATE users set email=:email where user_id=:user_id', [
            'email' => $_POST['email'],
            'user_id' => $user_id
        ]);

        header('Location: /email/show');
    } catch (Exception $e) {
        echo "Error, Failed to Update record" . $e->getMessage();
    }
}