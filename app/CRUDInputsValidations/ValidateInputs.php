<?php

namespace app\CRUDInputsValidations;


use Core\Validator;
use Exception;

/**
 * Validate the various forms for Admin CRUDInputsValidations Operations
 */
class ValidateInputs
{

    public static function validateCategoryInputs(array $data): array
    {
        $errors = [];

        self::validateStringLength($data['name'], 3, 20, 'category_name', 'Name must be at least 3 chars and not more than 20 characters', $errors);
        self::validateStringLength($data['description'], 10, 100, 'description', 'A category description is required, not less than 10 letters or more than 100 characters', $errors);
        self::validatePresence($data['status'], 'status', 'A status is required', $errors);

        return $errors;
    }

    public static function validateProductData(array $errors): array
    {
        self::validateStringLength($_POST['name'], 3, 20, 'product_name', 'Name must be at least 3 chars and not more than 20 characters', $errors);
        self::validatePresence($_POST['category'], 'category', 'Must select a sub-category', $errors);
        self::validatePresence($_POST['price'], 'price', 'A price is required', $errors);
        self::validateStringLength($_POST['description'], 10, 50, 'description', 'A description is required, not less then 10 or more than 50 characters', $errors);
        self::validatePresence($_POST['status'], 'status', 'A status is required', $errors);

        return $errors;

    }


    public static function convertStatusToBool($key): int
    {
        return $key === 'active' ? 1 : 0;
    }

    /**
     * @throws Exception
     */
    public static function validateImgUpload(array $data): string
    {

        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];

        if (!in_array($data['type'], $allowed_types)) {
            throw new Exception('Sorry, File format Not supported');
        }

        $upload_dir = 'uploads/';

        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        $file_extension = pathinfo($data['name'], PATHINFO_EXTENSION);
        $file_path = $upload_dir . uniqid() . '.' . $file_extension;

        if (!move_uploaded_file($data['tmp_name'], $file_path)) {
            throw new Exception('Failed to move uploaded file');
        }

        return $file_path;
    }

    public static function validateSubCatInputs(array $data): array
    {
        $errors = [];

        self::validateStringLength($data['name'], 3, 20, 'sub_category_name', 'Name must be at least 3 chars and not more than 20 characters', $errors);
        self::validateStringLength($data['description'], 10, 100, 'description', 'A description is required, not less than 10 or more than 100 characters', $errors);
        self::validatePresence($data['status'], 'status', 'A status is required', $errors);
        self::validatePresence($data['category'], 'category', 'A category is required', $errors);

        return $errors;
    }


    public static function validateCreateUserInputs(array $data): array
    {
        $errors = [];

        self::validateStringLength($data['first_name'], 3, 20, 'first_name', 'Name is required, not less then 5 or more than 20 characters', $errors);
        self::validateStringLength($data['last_name'], 3, 30, 'last_name', 'Name is required, not less then 5 or more than 30 characters', $errors);
        self::validateEmail($data['email'], $errors);
        self::validatePassword($data['password'], $errors);

        return $errors;
    }

    public static function validateUserSession(array $data): array {
        $errors = [];

        self::validateEmail($data['email'], $errors);
        self::validatePassword($data['password'], $errors);

        return $errors;
    }

    private static function validateStringLength(string $string, int $min, int $max, string $field, string $message, array &$errors): void
    {
        if (!Validator::string($string, $min, $max)) {
            $errors [$field] = $message;
        }
    }

    private static function validatePresence(string $string, string $field, string $message, array &$errors): void
    {
        if (!Validator::string($string)) {
            $errors[$field] = $message;
        }
    }


    private static function validateEmail(string $email, array &$errors): void
    {
        if (!Validator::email($email)) {
            $errors['email'] = 'Please enter a valid email';
        }
    }


    private static function validatePassword(string $password, array &$errors): void
    {
        if (!Validator::password_validate($password, 5, 255)) {
            $errors['password'] = 'Please enter a valid password, must contain a number';
        }
    }

}