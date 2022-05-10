<?php
session_start();
include_once 'class.user.php';

$felh = new User();
$felhAzon = $_SESSION['felhAzon'];

if (!$felh->get_session()) {
    header("location:login.php");
}

if (isset($_GET['q'])) {
    $felh->kijelentkezes();
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="hu-HU">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regisztráció</title>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        h1 {
            font-family: 'Georgia', Times New Roman, Times, serif;
        }
    </style>
</head>

<body>
    <div id="container">
        <div id="header"><a href="home.php?q=logout">LOGOUT</a></div>
        <div id="main-body">
            <h1>Hello <?php $felh->get_nev($felhAzon); ?>!</h1>
        </div>
        <div id="footer"></div>
    </div>
</body>

</html>