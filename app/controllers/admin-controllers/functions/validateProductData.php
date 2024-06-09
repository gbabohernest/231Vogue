<?php

use Core\Validator;


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