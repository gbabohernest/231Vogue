<?php

require_once appUtilities('dbCon.php');


$categories = [];

try {

    $categories = $db->query('SELECT * FROM categories  where is_active = 1 order by category_id')->get();

} catch (Exception $e) {

    echo "Error, Can't seems to find the data" . $e->getMessage();
}


return $categories;

