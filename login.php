<?php
    session_start();
    include_once 'class.user.php';
    $felh = new User();
    if (isset($_REQUEST['submit'])) {
        extract($_REQUEST);
        $login = $felh->bejelentkezes($emailVagyNev, $jelszo);
        if ($login) {
        // sikeres regisztráció
            header("location:home.php");
        } else {
             // sikertelen
            echo 'Hibás felhasználónév vagy jelszó';
        }
    }
?>
<!DOCTYPE html>
<html lang="hu-HU">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bejelentkezés</title>
        
        <style>
            #container{width:400px; margin: 0 auto;}
        </style>

        <script type="text/javascript" language="javascript">
                function submitlogin() {
                    var form = document.login;
                    if(form.emailVagyNev.value == ""){
                        alert( "Üres név vagy email cím." );
                        return false;
                    }
                    else if(form.jelszo.value == ""){
                        alert( "Üres jelszó." );
                        return false;
                    }
                }
        </script>
    </head>
    <body>
        <div id="container">
            <h1>Bejelentkezés</h1>
            <form action="" method="post" name="login">
                <label>Név vagy Email:</label>
                <input type="text" name="emailVagyNev" required="" /><br><br>
                <label>Jelszó:</label>
                <input type="password" name="jelszo" required="" /><br><br>
                <input onclick="return(submitlogin());" type="submit" name="submit" value="Küldés" /><br><br>
                <a href="registration.php">Regisztráció</a>
            </form>
        </div>
    </body>
</html>
