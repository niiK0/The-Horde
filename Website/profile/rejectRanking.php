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
    $getUserQuery = 'SELECT players.id FROM players WHERE players.username = "' . $name . '"'; //GET PLAYER ID
    $getUser = mysqli_query($connection, $getUserQuery);
    if (mysqli_num_rows($getUser) === 1) {
        $userRow = mysqli_fetch_assoc($getUser); //FETCH PLAYER DATA
        $getRecordDataQuery = 'DELETE FROM requesting_rankings WHERE player = "' . $userRow["id"] . '" AND requesting_rankings.time = "' . $time . '"';
        $getRecordData = mysqli_query($connection, $getRecordDataQuery);
        if (mysqli_affected_rows($getRecordData) === 1) {
                header("Location: http://aluno14738.damiaodegoes.pt/profile/profile.php?page=modLeaderboard&rejectError=0");
        } else {
            header("Location: http://aluno14738.damiaodegoes.pt/profile/profile.php?page=modLeaderboard&rejectError=0");
        }
    } else {
        header("Location: http://aluno14738.damiaodegoes.pt/profile/profile.php?page=modLeaderboard&rejectError=0");
    }
} else {
    //Show Error
    header("Location: http://aluno14738.damiaodegoes.pt/profile/profile.php?page=modLeaderboard&rejectError=1");
}