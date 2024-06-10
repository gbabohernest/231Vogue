<?php

use Core\Validator;


/**
 * Validate Category data.
 * @param array $data
 * @return array
 */
function validateCategoryData(array $data): array
{
    $errors = [];
    if (!Validator::string($data['name'], 3, 20)) {

        $errors['category_name'] = 'Name must be at least 3 chars and not more than 20 chars';
    }


    if (!Validator::string($data['description'], 10, 100)) {
        $errors ['description'] = 'A category description is required, not less than 10 letter or more than 40 letters';
    }

    if (!Validator::string($data['status'])) {
        $errors ['status'] = 'A status is required';
    }

    return $errors;
}