<?php

use app\CRUDInputsValidations\ValidateInputs;

require_once appUtilities('dbCon.php');

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $is_admin = $_POST['is_admin'] == 'user' || $_POST['is_admin'] == 'admin';
    $is_admin = ($_POST['is_admin'] == 'admin') ? 1 : 0;


    $errors = ValidateInputs::validateCreateUserInputs($_POST);


    if (!empty($errors)) {

        return view('admin/user/create.view.php', [
            'errors' => $errors,
        ]);
    }


    try {

        $user = $db->query('SELECT * FROM users where email = :email', [
            'email' => $_POST['email']
        ])->find();

        if ($user) {
            echo "<script> alert('user already exists')</script>";
            exit();

        } else {

            $hashed_password = password_hash($_POST["password"], PASSWORD_DEFAULT);

            try {
                $db->query('INSERT INTO users(first_name, last_name, email, password, is_admin) VALUES (:first_name, :last_name, :email, :password, :is_admin)', [

                    'first_name' => $_POST['first_name'],
                    'last_name' => $_POST['last_name'],
                    'email' => $_POST['email'],
                    'password' => $hashed_password,
                    'is_admin' => $is_admin

                ]);

                header('location: /dashboard/users');
                exit();


            } catch (PDOException $e) {
                echo 'Sorry, there was an on our part!! Try again' . $e->getMessage();
            }

        }

    } catch (Exception $e) {
        echo "Error, Failed to perform operation!!" . $e->getMessage();
    }

}
