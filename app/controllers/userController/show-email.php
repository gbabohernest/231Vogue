<?php

require_once appUtilities('dbCon.php');
require_once appUtilities('getUser.php');

$user = handleRequest('GET', 'getUser', $_SESSION, $db);

if ($user) {
    view('user/email-show.view.php', [
        'user' => $user
    ]);
}



