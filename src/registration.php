<?php require_once("connection.php"); ?>
<?php
if (isset($_POST["submit_reg"])) {
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $password_hash = hash('sha256', $password);
        $result = $mysqli->query("SELECT * FROM usertbl WHERE email='" . $email . "'");
        $numrows = mysqli_num_rows($result);
        if ($numrows == 0) {
            $sql = "INSERT INTO usertbl (email, password) VALUES ('$email', '$password_hash')";
            $result = $mysqli->query($sql);
            if ($result) {
                $message = "Account Successfully Created";
                // go to page, when acc created
                header("Location: index.php");
            } else {
                $message = "Failed to insert data information!";
                // error to database
            }
        } else {
            $message = "That username already exists! Please try another one!";
            // say to user, that email already exists
        }
    } else {
        $message = "All fields are required!";
    }
}
?>
<?php if (!empty($message)) {
echo "<p class='error'>' . 'MESSAGE: '. $message . '</p>";
} ?>
<html lang="en">
    <head>
        <title>Регистрация</title>
        <link rel="stylesheet" href="protected/style.css">
    </head>
    <body>
        <form id="registration" method="POST">
            <h1>Форма регистрации</h1>
            <fieldset id="inputs">
                <input id="email" name="email" type="email" placeholder="Адрес почты" autofocus required>
                <input id="password" name="password" type="password" placeholder="Пароль" required>
            </fieldset>
            <fieldset id="actions_reg">
                <input type="submit" id="submit_reg" name="submit_reg" value="Зарегистрироваться">
                <a href="index.php">Войти</a>
            </fieldset>
        </form>
    </body>
</html>