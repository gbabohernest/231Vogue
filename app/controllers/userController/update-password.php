<?php

use app\CRUDInputsValidations\ValidateInputs;


require_once appUtilities('dbCon.php');
require_once appUtilities('getUser.php');


$user = handleRequest('POST', 'getUser', $_SESSION, $db);

$errors = [];

$errors = ValidateInputs::validateCustomerPassword($_POST);

if (!empty($errors)) {
    return view('user/change-password.view.php', [
        'errors' => $errors,
        'user' => $user
    ]);
}


if ($user) {

    if (password_verify($_POST['current_password'], $user['password'])) {

        $hashed_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

        $db->query("UPDATE users SET password = :new_password WHERE user_id = :id", [
            'new_password' => $hashed_password,
            'id' => $user['user_id']
        ]);

        header('location: /account');
        exit();
    }
}
