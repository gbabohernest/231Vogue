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


/* customer account requests -> logged in customers */
$router->get('/customer/account/index', 'app/controllers/userController/index.php');
$router->get('/customer/account/', 'app/controllers/userController/index.php');
$router->get('/account', 'app/controllers/userController/account-management.php');
$router->get('/basic-details/show', 'app/controllers/userController/show.php');
$router->get('/basic-details/edit', 'app/controllers/userController/edit-basic-details.php');
$router->get('/email/show', 'app/controllers/userController/show-email.php');
$router->get('/email/edit', 'app/controllers/userController/edit-email.php');
$router->patch('/email/edit', 'app/controllers/userController/update-email.php');
$router->patch('/basic-details', 'app/controllers/userController/update.php');

/***********************************************************************************************/
/***********************************************************************************************/

/* ACCESSIBLE ONLY BY ADMIN USERS */


$router->get('/dashboard', 'app/controllers/adminController/index.php');


//products
$router->get('/dashboard/products', 'app/controllers/adminController/product/index.php');
$router->get('/product/create', 'app/controllers/adminController/product/create.php');

$router->get('/product/edit', 'app/controllers/adminController/product/edit.php');

$router->post('/product', 'app/controllers/adminController/product/store.php');
$router->patch('/product', 'app/controllers/adminController/product/update.php');
$router->delete('/product', 'app/controllers/adminController/product/destroy.php');


//categories
$router->get('/dashboard/categories', 'app/controllers/adminController/category/index.php');
$router->get('/category/create', 'app/controllers/adminController/category/create.php');
$router->get('/category/edit', 'app/controllers/adminController/category/edit.php');

$router->post('/category', 'app/controllers/adminController/category/store.php');
$router->delete('/category', 'app/controllers/adminController/category/destroy.php');
$router->patch('/category', 'app/controllers/adminController/category/update.php');


//users
$router->get('/dashboard/users', 'app/controllers/adminController/user/index.php');
$router->get('/user/create', 'app/controllers/adminController/user/create.php');
$router->get('/user/edit', 'app/controllers/adminController/user/edit.php');

$router->delete('/user', 'app/controllers/adminController/user/destroy.php');
$router->post('/user', 'app/controllers/adminController/user/store.php');
$router->patch('/user', 'app/controllers/adminController/user/update.php');


//sub-categories
$router->get('/dashboard/sub-categories', 'app/controllers/adminController/sub-category/index.php');
$router->get('/sub_category/create', 'app/controllers/adminController/sub-category/create.php');
$router->get('/sub_category/edit', 'app/controllers/adminController/sub-category/edit.php');

$router->delete('/sub_category', 'app/controllers/adminController/sub-category/destroy.php');
$router->post('/sub_category', 'app/controllers/adminController/sub-category/store.php');
$router->patch('/sub_category', 'app/controllers/adminController/sub-category/update.php');

/*logs out admin users*/
$router->delete('/dashboard/destroy', 'app/controllers/adminController/destroy.php');


/***********************************************************************************************/
/***********************************************************************************************/
