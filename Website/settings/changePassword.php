<?php
include("../side/help.php");
checkSession();
if(isset($_SESSION["logged"]) && $_SESSION["logged"] == true){
    include("../nav/navbarLogged.php");
}else{
    include("../nav/navbar.php");
}
require_once("../sql/connection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Horde - CPassword</title>
</head>

<body>
    <?php
    session_start();

    $password = checkEmptyStr($_POST["newPassword"]);
    $passwordC = checkEmptyStr($_POST["newPasswordC"]);
    $username = $_SESSION["username"];

    $queryLogin = "SELECT * FROM players WHERE username = '".$username."'";
    $checkResultsLogin = mysqli_query($connection, $queryLogin);
    if(mysqli_num_rows($checkResultsLogin) === 1){
        $row = mysqli_fetch_assoc($checkResultsLogin);
        if($password == $passwordC){
            $password = password_hash($password, PASSWORD_DEFAULT);
            $queryChange = "UPDATE players SET password ='". $password ."' WHERE username = '". $username ."'";
            $changePasswordQuerry = mysqli_query($connection, $queryChange);
            header("Location: http://aluno14738.damiaodegoes.pt/email/send_pwdChangedEmail.php");
            return;
        }else{
            header("Location: http://aluno14738.damiaodegoes.pt/profile/profile.php?page=security&pwdC=0");
        }
    }

    ?>
</body>

</html>