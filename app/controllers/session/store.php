<?php


use app\CRUDInputsValidations\ValidateInputs;

require_once appUtilities('dbCon.php');


$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $errors = ValidateInputs::validateUserSession($_POST);


    if (!empty($errors)) {
        return view('session/create.view.php', [
            'errors' => $errors
        ]);
    }

    // check if the email is in our system

    $user = $db->query('SELECT * FROM users WHERE  email = :email', [
        'email' => $_POST['email']
    ])->find();

    if ($user) {

        if (password_verify($_POST['password'], $user['password'])) {

            logUserIn($user);

            header('location: /');
            exit();
        }
    }


    return view('session/create.view.php', [
        'errors' => [
            'fail-login' => 'Sorry, No account matching your credentials',
        ]
    ]);

}