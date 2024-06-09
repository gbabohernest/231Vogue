<?php

use Core\Database;

$config = require base_path('config.php');


$db = new Database($config['database'], [
    'password' => DB_PASSWORD
]);


try {
    $sub_categories = $db->query('select  sub_category_id, sub_category_name from sub_categories where is_active = 1')->get();
//    dd($sub_categories);

} catch (Exception $e) {

    echo 'Error getting the data ' . $e->getMessage();
}

return $sub_categories;