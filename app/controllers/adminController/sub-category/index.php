<?php


require_once appUtilities('dbCon.php');


try {
    $sub_categories = $db->query('select sc.sub_category_id, sc.sub_category_name, sc.description, sc.is_active,  c.category_name from sub_categories sc
join `231vogue_db`.categories c on c.category_id = sc.category_id order by  sc.category_id desc')->get();

//    dd($sub_categories);


} catch (Exception $e) {
    echo 'Error in getting the data' . $e->getMessage();
    die();
}


view('admin/sub-category/index.php', [
    'sub_categories' => $sub_categories,
]);