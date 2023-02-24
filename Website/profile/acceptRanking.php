<?php
include("../side/help.php");
require("../sql/connection.php");
session_start();

//Vars to php
$time = $_GET["time"];
$name = $_GET["name"];

$error = array();

//Verify info
$time = checkEmptyStr($time);
if (empty($time)) {
    $error[] = "You forgot to enter the time.";
}

$money = checkEmptyStr($name);
if (empty($name)) {
    $error[] = "You forgot to enter the name.";
}

if (empty($error)) {
    $getUserQuery = 'SELECT players.id FROM players WHERE players.username = "' . $name . '"';
    $getUser = mysqli_query($connection, $getUserQuery);
    if (mysqli_num_rows($getUser) === 1) {
        $userRow = mysqli_fetch_assoc($getUser);
        $getRecordDataQuery = 'SELECT * FROM requesting_rankings WHERE player = "' . $userRow["id"] . '" AND requesting_rankings.time = "' . $time . '"';
        $getRecordData = mysqli_query($connection, $getRecordDataQuery);
        if (mysqli_num_rows($getRecordData) === 1) {
            $recordData = mysqli_fetch_assoc($getRecordData);

            // TRANSACTION
            mysqli_query($connection, "START TRANSACTION");

            $insertRankingQuery = 'INSERT INTO rankings(time, money, kills, player) VALUES ("' . $time . '", "' . $recordData["money"] . '", "' . $recordData["kills"] . '", "' . $userRow["id"] . '")';
            $insertRanking = mysqli_query($connection, $insertRankingQuery);

            $removeRankingQuery = 'DELETE FROM requesting_rankings WHERE player = "' . $userRow["id"] . '" AND requesting_rankings.time = "' . $time . '"';
            $removeRanking = mysqli_query($connection, $removeRankingQuery);
            if($insertRanking && $removeRanking){
                mysqli_query($connection, "COMMIT");
                header("Location: http://aluno14738.damiaodegoes.pt/profile/profile.php?page=modLeaderboard&acceptError=0");
            } else{
                mysqli_query($connection, "ROLLBACK");
                header("Location: http://aluno14738.damiaodegoes.pt/profile/profile.php?page=modLeaderboard&acceptError=1");
            }

            // --
        } else {
            echo "<script>alert('An error has occured, please try again.')</script>";
        }
    } else {
        echo "<script>alert('An error has occured, please try again.')</script>";
    }
} else {
    //Show Error
    header("Location: http://aluno14738.damiaodegoes.pt/profile/profile.php?page=modLeaderboard&acceptError=1");
}
