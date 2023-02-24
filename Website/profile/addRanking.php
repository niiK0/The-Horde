<?php
include("../side/help.php");
require("../sql/connection.php");
session_start();

//Vars to php
$time = $_POST["time"];
$money = $_POST["money"];
$kills = $_POST["kills"];

$error = array();

//Verify info
$time = checkEmptyStr($time);
if (empty($time)) {
    $error[] = "You forgot to enter the time.";
}

$money = checkEmptyStr($money);
if (empty($money)) {
    $error[] = "You forgot to enter the money.";
}

$kills = checkEmptyStr($kills);
if (empty($kills)) {
    $error[] = "You forgot to enter the kills.";
}

//Errors

if (empty($error)) {
    //Checking first
    $addRankingQuery = 'SELECT * FROM requesting_rankings WHERE player = "'. $_SESSION["pId"] .'" AND requesting_rankings.time = "' . $time . '"';
    $addRanking = mysqli_query($connection, $addRankingQuery);
    if (mysqli_num_rows($addRanking) > 0) {
        header("Location: profile.php?page=profile&recordAlreadyExists=1");
    } else {
        //Insert into SQL
        $insertRankingQuery = "INSERT INTO requesting_rankings (time, money, kills, player) VALUES (?, ?, ?, ?)";

        $init = mysqli_stmt_init($connection);
        mysqli_stmt_prepare($init, $insertRankingQuery);

        mysqli_stmt_bind_param($init, 'ssss', $time, $money, $kills, $_SESSION["pId"]);

        mysqli_stmt_execute($init);

        if (mysqli_stmt_affected_rows($init) == 1) {
            header("Location: profile.php?page=profile&recordAlreadyExists=0");
        } else {
            header("Location: profile.php?page=profile&problemOccured=1");
        }
    }
} else {
    //Show Error
    header("Location: profile.php?page=profile&problemOccured=1");
}
