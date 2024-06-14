<?php

 require_once appUtilities('dbCon.php');

try {
    $users = $db->query('select * from users order by user_id desc ')->get();
//    dd ($users);

} catch (Exception $e) {
    echo 'Error in getting the data' . $e->getMessage();
}


view('admin/user/index.php', [
    'users' => $users,
]);