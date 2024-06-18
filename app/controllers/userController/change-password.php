<?php

require_once appUtilities('dbCon.php');
require_once appUtilities('getUser.php');

$user = handleRequest('GET', 'getUser', $_SESSION, $db);

if ($user) {
    view('user/change-password.view.php', [
        'user' => $user
    ]);
}
