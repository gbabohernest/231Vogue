<?php

use app\CRUDInputsValidations\ValidateInputs;

require_once appUtilities('dbCon.php');

$errors = [];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

//    dd($_POST);

    $errors = ValidateInputs::validateCreateUserInputs($_POST);

    if (!empty($errors)) {

        $_SESSION['form_data'] = $_POST;

        return view('admin/user/edit.view.php', [

            'errors' => $errors
        ]);
    }

    $is_admin = $_POST['is_admin'] == 'user' || $_POST['is_admin'] == 'admin';
    $is_admin = ($_POST['is_admin'] == 'admin') ? 1 : 0;

    $user_id = $_POST['id'];


    try {

        $db->query("UPDATE users SET first_name = :first_name, last_name = :last_name, email= :email, password = :password, is_admin = :is_admin  WHERE user_id = :user_id", [

            'first_name' => $_POST['first_name'],
            'last_name' => $_POST['last_name'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'is_admin' => $is_admin,
            'user_id' => $user_id
        ]);


        echo "<script>alert('Data was inserted successfully!!!')</script>";

        header('location: /dashboard/users');
        exit();
    } catch (Exception $e) {
        echo "<script>alert('Error, something went wrong, DATA NOT UPDATED !!!!')</script>" . $e->getMessage();
    }

}
