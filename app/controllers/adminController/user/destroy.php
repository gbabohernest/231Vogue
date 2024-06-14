<?php
require_once appUtilities('dbCon.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if ($_POST['id'] && is_numeric($_POST['id']) !== null) {
        try {
            $db->query('delete from users where user_id = :id', [
                'id' => $_POST['id']
            ]);

            header('Location: /dashboard/users');
            exit();

        } catch (Exception $e) {
            echo "Sorry, Unable to delete the record" . $e->getMessage();
        }
    }
}
