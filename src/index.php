<?php require_once("connection.php"); ?>
<?php
session_name('inSystem');
session_start();
?>
<?php
if (isset($_SESSION["session_username"])) {
    // вывод "Session is set"; // в целях проверки
    header("Location: mainpage.php");
}
if (isset($_POST["submit_login"])) {
    $isNotEmpty = (!empty($_POST['email']) && !empty($_POST['password']));
    if ($isNotEmpty) {
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $password_hash = hash('sha256', $password);
        $query = $mysqli->query("SELECT * FROM usertbl WHERE email='" . $email . "' AND password='" . $password_hash . "'");
        $numrows = mysqli_num_rows($query);
        if ($numrows != 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                $dbemail = $row['email'];
                $dbpassword = $row['password'];
            }
            if ($email == $dbemail && $password_hash == $dbpassword) {
                // старое место расположения
                $_SESSION['session_username'] = $email;
                /* Перенаправление браузера */
                header("Location: mainpage.php");
            }
        } else {
            //  $message = "Invalid username or password!";
            echo  "Invalid username or password!";
        }
    } else {
        $message = "All fields are required!";
    }
}
?>
<html lang="en">
    <head>
        <title>Авторизация</title>
        <link rel="stylesheet" href="protected/style.css">
    </head>
    <body>
        <form id="login" method="POST">
            <h1>Форма входа</h1>
            <fieldset id="inputs">
                <input id="email" name="email" type="text" placeholder="Адрес почты" autofocus required>
                <input id="password" type="password" name="password" placeholder="Пароль" required>
            </fieldset>
            <fieldset id="actions">
                <input type="submit" id="submit_login" name="submit_login" value="ВОЙТИ">
                <a href="registration.php">Регистрация</a>
            </fieldset>
        </form>
    </body>
</html>