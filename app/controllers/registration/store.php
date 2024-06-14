<?php

use app\CRUDInputsValidations\ValidateInputs;

require_once appUtilities('dbCon.php');


$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $errors = ValidateInputs::validateCreateUserInputs($_POST);

    if (!empty($errors)) {

        return view('registration/register.view.php', [
            'errors' => $errors
        ]);
    }

    // check if the user exists already in db

    $user = $db->query('SELECT * FROM users where email = :email', [
        'email' => $_POST['email']
    ])->find();

    if ($user) {

        header('location: /login');
        exit();

    } else {

        $hashed_password = password_hash($_POST["password"], PASSWORD_DEFAULT);

        try {
            $db->query('INSERT INTO users(first_name, last_name, email, password) VALUES (:first_name, :last_name, :email, :password)', [

                'first_name' => $_POST['first_name'],
                'last_name' => $_POST['last_name'],
                'email' => $_POST['email'],
                'password' => $hashed_password

            ]);

            header('location: /login');
            exit();

        } catch (PDOException $e) {
            echo 'Sorry, there was an on our part!! Try again' . $e->getMessage();
        }

    }

}