<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

function userIsLoggedIn() {
    return isset($_SESSION['user']);
}

function adminIsLoggedIn() {
    return isset($_SESSION['admin']);
}

function writeToCSV($filename, $data) {
    $file = fopen($filename, 'a');
    fputcsv($file, $data);
    fclose($file);
}

function readFromCSV($filename) {
    $rows = [];
    if (($handle = fopen($filename, "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $rows[] = $data;
        }
        fclose($handle);
    }
    return $rows;
}

function validate_user($username, $password) {
    $valid_users = array(
        'Stephen' => 'Drs123!',
        'Abigale' => 'Dra456!',
        'Kiyoko' => 'Nki789!'
    );
    
    return isset($valid_users[$username]) && $valid_users[$username] === $password;
}

?>