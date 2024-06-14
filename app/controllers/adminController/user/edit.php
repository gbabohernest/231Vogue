<?php

require_once  appUtilities('dbCon.php');


if ($_GET['user_id'] && is_numeric($_GET['user_id']) !== null) {

    $user_id = $_GET['user_id'];

    $user = $db->query("SELECT * FROM users WHERE user_id = :user_id", [
        'user_id' => $user_id
    ])->find();

//    dd ($user);

}



view('admin/user/edit.view.php', [
    'user' => $user

]);