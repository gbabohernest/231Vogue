<?php



$router->get('/', 'app/controllers/index.php');
$router->get('/show', 'app/controllers/product/show.php');

/* REGISTRATION ENDPOINTS*/
$router->get('/register', 'app/controllers/registration/create.php');
$router->post('/register', 'app/controllers/registration/store.php');


/*Log in session accessible only by guest users */
$router->get('/login', 'app/controllers/session/create.php');
$router->post('/session', 'app/controllers/session/store.php');


/*Log out session, accessible only by logged-in users*/
$router->delete('/session', 'app/controllers/session/destroy.php');


/***********************************************************************************************/
/***********************************************************************************************/

/* ACCESSIBLE ONLY BY ADMIN USERS */


$router->get('/dashboard', 'app/controllers/admin-controllers/index.php');


//products
$router->get('/dashboard/products', 'app/controllers/admin-controllers/product/index.php');
$router->get('/product/create', 'app/controllers/admin-controllers/product/create.php');

$router->get('/product/edit', 'app/controllers/admin-controllers/product/edit.php');

$router->post('/product', 'app/controllers/admin-controllers/product/store.php');
$router->patch('/product', 'app/controllers/admin-controllers/product/update.php');
$router->delete('/product', 'app/controllers/admin-controllers/product/destroy.php');




//categories
$router->get('/dashboard/categories', 'app/controllers/admin-controllers/category/index.php');
$router->get('/category/create', 'app/controllers/admin-controllers/category/create.php');
$router->get('/category/edit', 'app/controllers/admin-controllers/category/edit.php');

$router->post('/category', 'app/controllers/admin-controllers/category/store.php');
$router->delete('/category', 'app/controllers/admin-controllers/category/destroy.php');
$router->patch('/category', 'app/controllers/admin-controllers/category/update.php');




//users
$router->get('/dashboard/users', 'app/controllers/admin-controllers/user/index.php');
$router->get('/user/create', 'app/controllers/admin-controllers/user/create.php');
$router->get('/user/edit', 'app/controllers/admin-controllers/user/edit.php');

$router->delete('/user', 'app/controllers/admin-controllers/user/destroy.php');
$router->post('/user', 'app/controllers/admin-controllers/user/store.php');
$router->patch('/user', 'app/controllers/admin-controllers/user/update.php');


//sub-categories
$router->get('/dashboard/sub-categories', 'app/controllers/admin-controllers/sub-category/index.php');
$router->get('/sub_category/create', 'app/controllers/admin-controllers/sub-category/create.php');
$router->get('/sub_category/edit', 'app/controllers/admin-controllers/sub-category/edit.php');

$router->delete('/sub_category', 'app/controllers/admin-controllers/sub-category/destroy.php');
$router->post('/sub_category', 'app/controllers/admin-controllers/sub-category/store.php');
$router->patch('/sub_category', 'app/controllers/admin-controllers/sub-category/update.php');

/*logs out admin users*/
$router->delete('/dashboard/destroy', 'app/controllers/admin-controllers/destroy.php');



