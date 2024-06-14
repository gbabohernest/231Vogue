<?php

require appUtilities('dbCon.php');

$categories = require_once appUtilities('getCategories.php');
$sub_categories = require_once appUtilities('getSubCategories.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    if (!isset($_SESSION['user']['user_id'])) {

        header('Location: /');
        exit();
    }

    $user_id = $_SESSION['user']['user_id'];
    $user = [];

    try {
        $user = $db->query('SELECT * FROM users where user_id = :user_id', [
            'user_id' => $user_id
        ])->find();

    } catch (Exception $e) {
        echo 'Sorry, Failed to process your request' . $e->getMessage();
    }
}


view('partials/head.php');


view('partials/nav.php', [
    'categories' => $categories,
    'sub_categories' => $sub_categories
]);

view('user/index.view.php', [
    'user' => $user
]);

view('partials/footer.php');