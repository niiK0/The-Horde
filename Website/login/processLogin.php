<?php
include("../side/help.php");
checkSession();
if (isset($_SESSION["logged"]) && $_SESSION["logged"] == true) {
    include("../nav/navbarLogged.php");
} else {
    include("../nav/navbar.php");
}
require_once("../sql/connection.php");

session_start();

$username = checkEmptyStr($_POST["usernameLogin"]);
$password = checkEmptyStr($_POST["passwordLogin"]);

$queryLogin = "SELECT * FROM players WHERE username = '" . $username . "'";
$checkResultsLogin = mysqli_query($connection, $queryLogin);
if (mysqli_num_rows($checkResultsLogin) === 1) {
    $row = mysqli_fetch_assoc($checkResultsLogin);
    if (password_verify($password, $row['password'])) {
        $_SESSION["logged"] = true;
        $_SESSION["userGroup"] = $row['pGroup'];
        $_SESSION["username"] = $_POST["usernameLogin"];
        header("Location:http://aluno14738.damiaodegoes.pt/index.php");
        return;
    } else {
        session_destroy();
        header("Location:http://aluno14738.damiaodegoes.pt/login/login.php");
    }
} else {
    session_destroy();
    header("Location:http://aluno14738.damiaodegoes.pt/login/login.php?wrongAccount=true");
}

