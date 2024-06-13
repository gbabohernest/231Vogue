<?php

require_once  appUtilities('dbCon.php');



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//    dd($_POST);

    if ($_POST['id'] && is_numeric($_POST['id']) !== null) {
        try {
            $db->query('delete from categories where category_id = :id', [
                'id' => $_POST['id']
            ]);

            header('Location: /dashboard/categories');
            exit();

        } catch (Exception $e) {
            echo "Sorry, Unable to delete the record" . $e->getMessage();
        }
    }
}

