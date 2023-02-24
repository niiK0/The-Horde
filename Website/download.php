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
    <title>The Horde - Download</title>
</head>

<body>
    <!-- <main class="download-main"> -->
        <div class="download-center-bg text-center border-left border-right">
            <br>
            <div class="download-center-title-bg border-top border-bottom border-secondary">
                <h1 class="display1 download-center-title"><b>THE HORDE</b></h1>
                <hr class="download-center-title-hr">
                <h3 class="display3 download-center-title">Download</h3>
            </div>
            <div class="download-center-text-bg border-bottom border-left border-right rounded-bottom border-secondary mb-4">
                <p class="lead download-center-text">Download the game from here! Choose any of the options below!</p>
            </div>
            <p class="lead download-center-text-mobile">Log-in using a computer to access the download page!</p>
            <div class="download-center-downloads-bg border rounded">
                <div id="download-not-logged" style="height: 100%; width: 100%; display:none;">
                    <?php
                    if (isset($_SESSION["logged"]) && $_SESSION["logged"] == true) {
                    ?>
                        <script>
                            window.onload = function() {
                                document.getElementById("download-not-logged").style.display = "none";
                                document.getElementById("download-logged").style.display = "block";
                            }
                        </script>
                    <?php
                    } else {
                    ?>
                        <script>
                            window.onload = function() {
                                document.getElementById("download-logged").style.display = "none";
                                document.getElementById("download-not-logged").style.display = "block";
                            }
                        </script>
                        <p class="download-center-not-logged-text">Please <a href="http://aluno14738.damiaodegoes.pt/login/login.php">login</a>/<a href="http://aluno14738.damiaodegoes.pt/register/register.php">register</a> to download the game!</p>
                    <?php
                    }
                    ?>
                </div>
                <div id="download-logged" style="height: 100%; width: 100%; display:none;">
                    <div class="container download-center-downloads-title-bg border-bottom border-secondary" style="padding: 0px !important;">
                        <div class="row h-100" style="margin: 0px !important;">
                            <div class="my-auto col-sm-6 border-right">
                                <p class="download-center-downloads-title-text">Downloads</p>
                                <hr class="download-center-downloads-title-hr">
                            </div>
                            <div id="downloads-center-availability-title" class="my-auto col-sm-6">
                                <p class="download-center-downloads-title-text">Availability</p>
                                <hr class="download-center-downloads-title-hr">
                            </div>
                        </div>
                    </div>
                    <div class="download-center-downloads-subtitle-bg">
                        <div class="download-center-downloads-subtitle-content-bg">
                            <p class="download-center-downloads-subtitle-content-text">Here you can download the game, currently being made for Windows users with no intention for other platforms.</p>
                        </div>
                    </div>
                    <div class="container download-center-downloads-content-bg" style="padding: 0px !important;">
                        <div class="row" style="margin: 0px !important;">
                            <div class="col-sm-6 border-right border-bottom border-top border-secondary mt-4" style="height: 3rem;">
                                <p class="download-center-downloads-content-text" style="color: red;">Mega.nz</p>
                            </div>
                            <div class="col-sm-6 border-bottom border-bottom border-top border-secondary mt-4" style="height: 3rem;">
                                <p class="download-center-downloads-content-text-availability-yes"><i class="fas fa-check"></i> <a href="https://mega.nz/file/jHZkSBpR#LtA3YzajswPWI5td4v_85a_k8ddjTP_UuBHJZHHa5yE" target="_blank" style="color: green">Download</a> </p>
                            </div>

                            <div class="w-100"></div>

                            <div class="col-sm-6 border-right border-bottom border-secondary" style="height: 3rem;">
                                <p class="download-center-downloads-content-text" style="color: green;">uTorrent</p>
                            </div>
                            <div class="col-sm-6 border-bottom border-secondary" style="height: 3rem;">
                                <p class="download-center-downloads-content-text-availability"><i class="fas fa-times"></i> Not available</p>
                            </div>

                            <div class="w-100"></div>


                            <div class="col-sm-6 border-right border-bottom border-secondary" style="height: 3rem;">
                                <p class="download-center-downloads-content-text" style="color: orange;">Drive</p>
                            </div>
                            <div class="col-sm-6 border-bottom border-secondary" style="height: 3rem;">
                                <p class="download-center-downloads-content-text-availability-yes"><i class="fas fa-check"></i> <a href="https://drive.google.com/file/d/1fXJsA41O49NLiLUwAdCe04_157KcZB-F/view?usp=sharing" target="_blank" style="color: green">Download</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="download-center-downloads-disclaimer-bg border-top border-secondary">
                        <div style="height: 100%; left: 10%; position: absolute; text-align: left !important;">
                            <p class="download-center-downloads-disclaimer-text">AntiVirus Check: <a href="https://www.virustotal.com/gui/url/3826edd18b3fa47722d8a94d70b429a0204a8c6b877c0a955927f877bd463c67/detection" target="_blank">https://www.virustotal.com/</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- </main> -->
    <script type="text/javascript">
        function maintenance() {
            alert("Game in development! Come back Later!");
        }
    </script>

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