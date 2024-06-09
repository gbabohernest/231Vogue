<?php

use Core\Database;
use Core\Validator;


$config = require base_path('config.php');
$db = new Database($config['database'], [
    'password' => DB_PASSWORD
]);

$errors = [];
$selected_category = '';

/**
 * Validate product data.
 * @param array $errors
 * @return array
 */
function validateProductData(array $errors): array
{
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
    return $errors;
}

/**
 * Handle file upload
 * @param mixed $image
 * @return string
 * @throws Exception
 */
function handleFileUpload(mixed $image): string
{
    $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];

    if (!in_array($image['type'], $allowed_types)) {
        throw new Exception('Sorry, File format Not supported');
    }

    $upload_dir = 'uploads/';
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $file_extension = pathinfo($image['name'], PATHINFO_EXTENSION);
    $file_path = $upload_dir . uniqid() . '.' . $file_extension;

    if (!move_uploaded_file($image['tmp_name'], $file_path)) {
        throw new Exception('Failed to move uploaded file');
    }
    return $file_path;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//    dd($_FILES);

    $selected_category = $_POST['category'];

    /**
     * Validate product data.
     *
     * @param array $data
     * @return array
     */

    $errors = validateProductData($errors);


    if (!empty($errors)) {
        return view('admin/product/create.view.php', [
            'errors' => $errors,
            'selected_category' => $selected_category,
        ]);
    }


    if (!empty($selected_category) && is_numeric($selected_category)) {

        $status = $_POST['status'];
        $status_value = ($status === 'active') ? 1 : 0;

        $image = $_FILES['image'];

        try {

            $file_path = handleFileUpload($image);

        } catch (Exception $e) {

            echo "Error Uploading the file" . $e->getMessage();
        }


        try {
            $db->query('INSERT INTO products(product_name, price, description, sub_category_id, status, image_path) Values(
                          :name, :price, :desc,:sub_category_id, :status, :image_path)', [
                'name' => $_POST['name'],
                'price' => $_POST['price'],
                'desc' => $_POST['description'],
                'sub_category_id' => $selected_category,
                'status' => $status_value,
                'image_path' => $file_path
            ]);


            echo "<script>alert('Data was inserted successfully!!!')</script>";

            header('location: /dashboard/products');

            exit();

        } catch (Exception $e) {
            echo "<script>alert('Error, something went wrong!!!!')</script>" . $e->getMessage();
        }

    }

}