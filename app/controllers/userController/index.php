<?php

require appUtilities('dbCon.php');
require_once appUtilities('getUser.php');

$categories = require_once appUtilities('getCategories.php');
$sub_categories = require_once appUtilities('getSubCategories.php');

$user = handleRequest('GET', 'getUser', $_SESSION, $db);


if ($user) {

    view('partials/head.php');


    view('partials/nav.php', [
        'categories' => $categories,
        'sub_categories' => $sub_categories
    ]);

    view('user/index.view.php', [
        'user' => $user
    ]);

    view('partials/footer.php');
}

