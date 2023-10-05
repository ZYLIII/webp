<?php
session_start();
require 'tools.php';

$error = '';
if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if(validate_user($username, $password)) {
        $_SESSION['user'] = $username;
    } else {
        $error = "Incorrect password";
    }
}

if(isset($_POST['logout'])) {
    session_destroy();
    header("Location: administration.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://titan.csit.rmit.edu.au/~s3958095/wp/a2/styles.css" />
    <script src="https://titan.csit.rmit.edu.au/~s3958095/wp/a2/scripts.js" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <title>Russel Street Medical</title>
</head>
<body>
<body>
    <!-- Header (Logo and Navigation bar) -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <a class="navbar-brand" href="#">
                <img src="./imgs/logo.png" alt="Russel Street Medical Logo" width="170">
            </a>
            <a class="navbar-brand" href="index.php">Russel Street Medical</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#aboutUs">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#whoWeAre">Who We Are</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#serviceArea">Service Area</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="booking.php">Book Online</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="administration.php">Login/Register</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <?php if(!isset($_SESSION['user'])): ?>
<div class="container">
    <h2 class="my-4">Admin Login</h2>
    <form action="administration.php" method="post" class="mb-4">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary" name="login">Login</button>
        <?php if($error): ?>
            <p class="text-danger"><?= $error ?></p>
        <?php endif; ?>
    </form>
</div>

        <?php if($error): ?>
            <p><?= $error ?></p>
        <?php endif; ?>
    <?php else: ?>
        <p>Welcome <?= $_SESSION['user'] ?>!</p>
        <form method="POST" action="administration.php">
            <input type="submit" name="logout" value="Logout">
        </form>
        <?php

$filename = 'appointments.txt';
if (file_exists($filename) && is_readable($filename)) {
    $handle = fopen($filename, 'r');
    if ($handle) {
        echo "<table class='table'>
                <thead>
                    <tr>
                        <th scope='col'>Patient ID</th>
                        <th scope='col'>Appointment Date</th>
                        <th scope='col'>Time Slot</th>
                        <th scope='col'>Type</th>
                        <th scope='col'>Booking Time</th>
                    </tr>
                </thead>
                <tbody>";
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            echo "<tr>
                    <td>{$data[0]}</td>
                    <td>{$data[1]}</td>
                    <td>{$data[2]}</td>
                    <td>{$data[3]}</td>
                    <td>{$data[4]}</td>
                  </tr>";
        }
        echo "</tbody></table>";
        fclose($handle);
    } else {
        echo "Error: Unable to open $filename.";
    }
} else {
    echo "Error: Unable to read $filename.";
}


?>

    <?php endif; ?>
</body>
</html>
