<?php
include("../side/help.php");
require("../sql/connection.php");
session_start();

//Vars to php
$time = $_GET["time"];
$global = $_GET["global"];

//Errors
if($global == 1){
    $queryDB = 'SELECT * FROM rankings WHERE player = "' . $_SESSION["pId"] . '" AND rankings.time = "' . $time . '"';
    $query = 'DELETE FROM rankings WHERE rankings.time = "' . $time . '"';
}else{
    $queryDB = 'SELECT * FROM requesting_rankings WHERE player = "' . $_SESSION["pId"] . '" AND requesting_rankings.time = "' . $time . '"';
    $query = 'DELETE FROM requesting_rankings WHERE requesting_rankings.time = "' . $time . '"';
}

$checkResults = mysqli_query($connection, $queryDB);

if (mysqli_num_rows($checkResults) > 0) {
    //Insert into SQL

    $init = mysqli_stmt_init($connection);
    mysqli_stmt_prepare($init, $query);

    mysqli_stmt_execute($init);

    if (mysqli_stmt_affected_rows($init) == 1) {
        header("Location: profile.php?page=profile");
    } else {
        header("Location: profile.php?page=profile");
    }
} else {
    header("Location: profile.php?page=profile");
}
