<?php

require_once appUtilities('dbCon.php');


$sub_categories = [];


try {

    $sub_categories = $db->query('SELECT * FROM sub_categories WHERE is_active = 1')->get();

} catch (Exception $e) {

    echo "Error, Can't seems to find the data" . $e->getMessage();
}


return $sub_categories;