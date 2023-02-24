<?php
include("../side/help.php");
checkSession();
if (isset($_SESSION["logged"]) && $_SESSION["logged"] == true) {
    include("../nav/navbarLogged.php");
} else {
    include("../nav/navbar.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Horde - Login</title>
</head>

<body>
    <!-- <main class="login-main"> -->
        <div class="login-center-bg text-center border-left border-right">
            <br>
            <div class="login-center-title-bg border-top border-bottom border-secondary">
                <h1 class="display1 login-center-title"><b>THE HORDE</b></h1>
                <hr class="login-center-title-hr">
                <h3 class="display3 login-center-title">Login</h3>
            </div>
            <div class="login-center-text-bg border-bottom border-left border-right rounded-bottom border-secondary">
                <p class="display3 text-black login-center-text mt-2">Welcome back!<br>
                    <span>Don't have an account? Proceed to <a href="../register/register.php">register</a>!</span>
                </p>
            </div>
            <div class="justify-content-center text-left login-center-input-bg border rounded border-secondary">
                <div class="login-center-form">
                    <form method="POST" action="processLogin.php" enctype="multipart/formdata" id="log-form">
                        <div class="form-row">
                            <div class="login-center-input-vl"></div>
                            <div class="col">
                                <div class="login-center-input-title">
                                    Username:
                                </div>
                                <small id="checkErrorLogin" class="text-danger"></small>
                                <input type="text" class="form-control" id="usernameLogin" name="usernameLogin" placeholder="Username" required>
                            </div>
                        </div>
                        <div class="form-row my-3">
                            <div class="login-center-input-vl"></div>
                            <div class="col">
                                <div class="login-center-input-title">
                                    Password:
                                </div>
                                <input type="password" class="form-control" id="passwordLogin" name="passwordLogin" placeholder="Password" required>
                            </div>
                        </div>
                        <div class="submit-btn text-center my-3">
                            <button type="submit" class="btn btn-primary rounded-pill text-tark px-5">Login</button>
                        </div>
                    </form>
                </div>
                <div style="height: 100%; width: 100%;" class="text-center">
                    <p class="display3 text-black reset-password-msg">
                        <span>Forgot your password? Proceed to <a href="http://aluno14738.damiaodegoes.pt/settings/changePasswordSite.php">reset password</a>!</span>
                    </p>
                </div>
            </div>
        </div>

    <!-- modal handler -->
    <?php
    if (isset($_GET["wrongAccount"])) {
        if ($_GET["wrongAccount"] == true) {
            echo "<script>
            $(document).ready(function(){
                $('#wrongAccountError').modal('show');
            });
            </script>";
        } else {
            echo "<script>
            $(document).ready(function(){
                $('#wrongAccountError').modal('hide');
            });
            </script>";
        }
    } else {
        echo "<script>
        $(document).ready(function(){
            $('#wrongAccountError').modal('hide');
        });
        </script>";
    }
    ?>
    <!-- -- -->

        <div class="modal" id="wrongAccountError" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Problem Ocurred!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Check your username and password and try again!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="resetPageLogin()">Confirm</button>
                </div>
            </div>
        </div>

    <!-- </main> -->

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