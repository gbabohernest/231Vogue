<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database'], [
    'password' => DB_PASSWORD
]);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if ($_POST['id'] && is_numeric($_POST['id']) !== null) {
        try {
            $db->query('delete from products where product_id = :id', [
                'id' => $_POST['id']
            ]);

            header('Location: /dashboard/products');
            exit();

        } catch (Exception $e) {
            echo "Sorry, Unable to delete the record" . $e->getMessage();
        }
    }
}
