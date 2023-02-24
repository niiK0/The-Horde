<?php
include("../side/help.php");
require("../sql/connection.php");
session_start();

//Vars to php
$username = $_POST["username"];
$password = $_POST["password"];
$confirmPassword = $_POST["confirmPassword"];
$email = $_POST["email"];
$dob = $_POST["dob"];
$referral = $_POST["referral"];

$error = array();

//Verify info
$username = checkEmptyStr($username);
if (empty($username)) {
    $error[] = "You forgot to enter your name.";
}

$password = checkEmptyStr($password);
if (empty($password)) {
    $error[] = "You forgot to enter your password.";
}

$confirmPassword = checkEmptyStr($confirmPassword);
if (empty($confirmPassword)) {
    $error[] = "You forgot to enter your password confirmation.";
}

$email = checkEmptyEmail($email);
if (empty($email)) {
    $error[] = "You forgot to enter your email.";
}

$dob = checkEmptyStr($dob);
if (empty($dob)) {
    $error[] = "You forgot to enter your dob.";
}

$referral = checkEmptyStr($referral);

//Errors

if (empty($error)) {
    $_SESSION["email"] = $email;

    //SQL code
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    //Checking first
    $queryDB = "SELECT * FROM players WHERE username = '" . $username . "' OR email = '" . $email . "'";
    $checkResults = mysqli_query($connection, $queryDB);
    if (mysqli_num_rows($checkResults) > 0) {
        header("Location:register.php?errorCheck=true");
    } else {
        //Insert into SQL
        $query = "INSERT INTO players (username, password, email, pGroup, dob) VALUES (?, ?, ?, ?, ?)";

        $init = mysqli_stmt_init($connection);
        mysqli_stmt_prepare($init, $query);

        $bGroup = 'user';

        mysqli_stmt_bind_param($init, 'sssss', $username, $hashed_password, $email, $bGroup, $dob);

        mysqli_stmt_execute($init);

        if (mysqli_stmt_affected_rows($init) == 1) {
            // GET COUNTRY COUNT

            $queryGetCountryCount = 'SELECT count FROM countries WHERE country = "' . $_POST['country'] . '"';
            $getCountryCount = mysqli_query($connection, $queryGetCountryCount);

            if (mysqli_num_rows($getCountryCount) === 1) {
                $countRow = mysqli_fetch_assoc($getCountryCount);
                $newCount = $countRow["count"] + 1;

                $queryCountries = "UPDATE countries SET countries.count = ".$newCount." WHERE country = '" . $_POST['country'] . "'";
                $updateCountries = mysqli_query($connection, $queryCountries);

                // weird check cuz not working?
                if (isset($_SESSION["email"])) {
                    header("Location: ../email/send_email.php");
                } else {
                    header("Location: register.php?error=1");
                }
            } else {
                header("Location: register.php?error=1");
            }

            // --
        } else {
            header("Location: register.php?error=1");
        }
    }
} else {
    //Show Error
    session_destroy();
    header("Location: register.php?error=1");
}
