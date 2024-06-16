<?php

function getUser(array $data, $db): array
{

    if (!isset($data['user']['user_id'])) {

        header('Location: /login');
        exit();
    }

    $user_id = $data['user']['user_id'];
    $user = [];

    try {
        $user = $db->query('SELECT first_name, last_name, email, password from users where user_id = :user_id', [
            'user_id' => $user_id
        ])->find();
    } catch (Exception $e) {
        echo "Error, Failed to handle request" . $e->getMessage();
    }

    return $user;

}
