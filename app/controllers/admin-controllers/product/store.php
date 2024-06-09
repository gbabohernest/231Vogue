<?php


use Core\Database;
use Core\Validator;


$config = require base_path('config.php');
$db = new Database($config['database'], [
    'password' => DB_PASSWORD
]);

$errors = [];
$selected_category = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//    dd($_POST);

    $selected_category = $_POST['category'];

    if (!Validator::string($_POST['name'], 3, 20)) {

        $errors['product_name'] = 'Name must be at least 3 chars and not more than 20 chars';
    }

    if (!Validator::string($_POST['category'], 1)) {
        $errors ['category'] = 'Must select a sub-category';
    }

    if (!Validator::string($_POST['price'], 1)) {
        $errors ['price'] = 'A price is Required';
    }

    if (!Validator::string($_POST['description'], 10, 30)) {
        $errors ['description'] = 'A product description is required, not less than 10 letter or more than 30 letters';
    }

    if (!Validator::string($_POST['status'])) {
        $errors ['status'] = 'A status is required';
    }


    if (!empty($errors)) {
        return view('admin/product/create.view.php', [
            'errors' => $errors,
            'selected_category' => $selected_category,
        ]);
    }


    if (!empty($selected_category) && is_numeric($selected_category)) {

        $status = $_POST['status'];
        $status_value = ($status === 'active') ? 1 : 0;

        try {
            $db->query('INSERT INTO products(product_name, price, description, image, sub_category_id, status) Values(
                          :name, :price, :desc, :image, :sub_category_id, :status)', [
                'name' => $_POST['name'],
                'price' => $_POST['price'],
                'desc' => $_POST['description'],
                'image' => $_POST['image'],
                'sub_category_id' => $selected_category,
                'status' => $status_value,
            ]);


            echo "<script>alert('Data was inserted successfully!!!')</script>";
            header('location: /dashboard/products');
            exit();

        } catch (Exception $e) {
            echo "<script>alert('Error, something went wrong!!!!')</script>" . $e->getMessage();
        }

    }


}



