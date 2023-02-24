<?php
include("side/help.php");
checkSession();
if (isset($_SESSION["logged"]) && $_SESSION["logged"] == true) {
    include("nav/navbarLogged.php");
} else {
    include("nav/navbar.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Horde - Homepage</title>
</head>

<body>
    <div class="index-center-bg text-center">
        <br>
        <div class="index-center-title-bg border-top border-bottom border-secondary">
            <h1 class="display1 index-center-title"><b>THE HORDE</b></h1>
            <hr class="index-center-title-hr">
            <h3 class="display3 index-center-title">Home</h3>
        </div>
        <div class="index-center-text-bg border-bottom border-left border-right rounded-bottom border-secondary mb-4">
            <p class="lead index-center-text mr-4 ml-4">A 2D SinglePlayer Arcade Game, survive the longest you can and share your records with us!</p>
        </div>
        <div class="embed-responsive index-center-video border rounded">
            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/GghMMVgGIOc" cotrols="0"></iframe>
        </div>
        <div class="index-center-sec-text-bg border-top border-bottom border-secondary mt-4">
            <p class="lead index-center-text mt-4 mr-4 ml-4">Pick-up your weapons and fight the horde of zombies that is coming for you. They are deadly and A LOT! Survive as long as you can and share your best scores with others. Download the game for free now!</p>
        </div>
    </div>

    <div class="loader-wrapper">
        <div class="loader-content-wrapper">
            <div class="loader-circle-wrapper">
                <span class="loader-circle"></span>
                <span class="loader-circle"></span>
                <span class="loader-circle"></span>
            </div>
            <div class="loader-text-wrapper">
                Loading...
            </div>
        </div>
    </div>

    <script>
        setTimeout(() => {
            $( document ).ready(function() {
                $(".loader-wrapper").fadeOut();
            });
        }, 1000);
    </script>

    <!-- ajax jquery --> <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- bootstrap --><script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>

</html>