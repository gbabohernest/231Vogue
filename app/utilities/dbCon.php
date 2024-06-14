<?php

use Core\Database;
$config = require base_path('config.php');

$db = new Database($config['database'], [
    'password' => DB_PASSWORD,
]);


return $db;