<?php


/**
 * Handle file upload
 * @param mixed $image
 * @return string
 * @throws Exception
 */
function handleFileUpload(mixed $image): string
{
    $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];

    if (!in_array($image['type'], $allowed_types)) {
        throw new Exception('Sorry, File format Not supported');
    }

    $upload_dir = 'uploads/';
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $file_extension = pathinfo($image['name'], PATHINFO_EXTENSION);
    $file_path = $upload_dir . uniqid() . '.' . $file_extension;

    if (!move_uploaded_file($image['tmp_name'], $file_path)) {
        throw new Exception('Failed to move uploaded file');
    }
    return $file_path;
}
