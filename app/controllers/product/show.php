<?php

$product_id = $_GET['product_id'];

$product = require_once appUtilities('findProduct.php');
$categories = require_once appUtilities('getCategories.php');
$sub_categories = require_once appUtilities('getSubCategories.php');


view('partials/head.php');

view('partials/nav.php', [
    'categories' => $categories,
    'sub_categories' => $sub_categories,
]);


view('product/show.view.php', [

    'product' => $product
]);

view('partials/footer.php');
