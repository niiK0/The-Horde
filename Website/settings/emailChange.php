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
    <title>The Horde - CEmail</title>
</head>

<body>
    <?php

    $email = checkEmptyStr($_POST["newEmail"]);
    $emailC = checkEmptyStr($_POST["newEmailC"]);
    $username = $_SESSION["username"];

    $queryLogin = "SELECT * FROM players WHERE username = '".$username."'";
    $checkResultsLogin = mysqli_query($connection, $queryLogin);
    if(mysqli_num_rows($checkResultsLogin) === 1){
        if($email == $emailC){
            // check for email first
            $checkEmails = "SELECT * FROM players WHERE email = '". $email . "' AND username != '". $username . "'";
            $checkEmailsResults = mysqli_query($connection, $checkEmails);
            if(mysqli_num_rows($checkEmailsResults) > 0){
                header("Location: http://aluno14738.damiaodegoes.pt/profile/profile.php?page=security&emC=0");
            }else{
                $queryChange = "UPDATE players SET email ='". $email ."' WHERE username = '". $username ."'";
                $changeEmailQuerry = mysqli_query($connection, $queryChange);
                header("Location: http://aluno14738.damiaodegoes.pt/email/send_emailChangedEmail.php");
            }
            return;
        }else{
            header("Location: http://aluno14738.damiaodegoes.pt/profile/profile.php?page=security&emC=0");
        }
    }

    ?>
</body>

</html>