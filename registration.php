<?php
include_once 'class.user.php';

$felh = new User(); // Checking for user logged in or not

if (isset($_REQUEST['submit'])) {
    extract($_REQUEST);
    $register = $felh->reg_felhasznalo(
        $vNev,
        $kNev,
        $nev,
        $szulDatum,
        $jelszo,
        $email
    );
    if ($register) {
        // sikeres regisztráció
        echo 'Sikeres regisztráció <a href="login.php">Kattints ide!</a> a belépéshez';
    } else {
        // sikertelen regisztráció
        echo 'Sikertelen regisztráció. Email vagy felhasználónév már létezik. Próbáld újra!';
    }
}
?>

<!DOCTYPE html>
<html lang="hu-HU">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regisztráció</title>

    <style>
        #container {
            width: 400px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div id="container">
        <h1>Regisztráció</h1>
        <form action="" method="post" name="reg">
            <label>Vezetéknév:</label>
            <input type="text" name="vNev" required="" /><br><br> <!-- name="adatbázis adattag"-->
            <label>Keresztnév:</label>
            <input type="text" name="kNev" required="" /><br><br>
            <label>Felhasználói név:</label>
            <input type="text" name="nev" required="" /><br><br>
            <label>Születési dátum:</label>
            <input type="date" name="szulDatum" required="" /><br><br>
            <label>Jelszó:</label>
            <input type="password" name="jelszo" required="" /><br><br>
            <label>Email cím:</label>
            <input type="email" name="email" required="" /><br><br>
            <input type="submit" name="submit" value="Regisztráció" /><br><br>
            <a href="login.php">Belépéshez kattints ide</a>
        </form>
    </div>
    <script src="delete.js"></script>
</body>

</html>