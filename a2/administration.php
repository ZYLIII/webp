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
        $error = "Incorrect credentials";
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
    <title>Administration Page</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
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
if(isset($_SESSION['user'])){
    $appointments = json_decode(file_get_contents('appointments.txt'), true);
    echo "<table class='table'>
            <thead>
                <tr>
                    <th scope='col'>Patient Name</th>
                    <th scope='col'>Appointment Date</th>
                </tr>
            </thead>
            <tbody>";
    foreach($appointments as $appointment){
        $formattedDate = date("l, jS F Y", strtotime($appointment['date']));
        echo "<tr>
                <td>{$appointment['patient']}</td>
                <td>{$formattedDate}</td>
              </tr>";
    }
    echo "</tbody></table>";
}
?>

    <?php endif; ?>
</body>
</html>
