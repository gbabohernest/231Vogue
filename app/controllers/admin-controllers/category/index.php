<?php

require_once  appUtilities('dbCon.php');


try {
    $categories = $db->query('SELECT * FROM categories ORDER BY category_id desc ')->get();
} catch (Exception $e) {
    echo 'Error in getting the result', $e->getMessage();
}


view('admin/category/index.php', [
    'categories' => $categories,
]);
