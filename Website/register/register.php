<?php
include("../side/help.php");
checkSession();
if (isset($_SESSION["logged"]) && $_SESSION["logged"] == true) {
    include("../nav/navbarLogged.php");
} else {
    include("../nav/navbar.php");
}
require_once("../sql/connection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Horde - Register</title>
</head>

<body>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        require('processRegister.php');
    }

    if (isset($_GET["errorCheck"])) {
        $errorCheck = $_GET["errorCheck"];

        if ($errorCheck == true) {
            echo '<script type="text/javascript">
                    jQuery(function($){
                        $("#checkError").text("Name or Email already exists.");
                    })
                </script>';
        }
    }
    ?>
    <!-- <main class="register-main"> -->
        <div class="register-center-bg text-center border-left border-right">
            <br>
            <div class="register-center-title-bg border-top border-bottom border-secondary">
                <h1 class="display1 register-center-title"><b>THE HORDE</b></h1>
                <hr class="register-center-title-hr">
                <h3 class="display3 register-center-title">Register</h3>
            </div>
            <div class="register-center-text-bg border-bottom border-left border-right rounded-bottom border-secondary">
                <p class="display3 text-black register-center-text mt-2">Register to enjoy aditional features and start playing!<br>
                    <span>Already registered? Proceed to <a href="../login/login.php">login</a>!</span>
                </p>
            </div>
            <div class="d-flex justify-content-center text-left border-secondary register-center-input-bg">
                <form method="POST" action="processRegister.php" enctype="multipart/formdata" id="reg-form">
                    <div class="form-row" style="position: relative;">
                        <div class="register-center-input-vl"></div>
                        <div class="col">
                            <small id="checkError" class="text-danger"></small>
                            <div class="register-center-input-title">
                                *Username:
                            </div>
                            <input type="text" class="form-control" id="username" name="username" placeholder="* Username" required>
                        </div>
                    </div>
                    <div class="form-row my-4">
                        <div class="register-center-input-vl"></div>
                        <div class="col">
                            <div class="register-center-input-title">
                                *E-mail:
                            </div>
                            <input type="email" class="form-control" id="email" name="email" placeholder="* E-mail" required>
                        </div>
                    </div>
                    <div class="form-row my-4">
                        <div class="register-center-input-vl"></div>
                        <div class="col">
                            <small id="passwordError" class="text-danger"></small>
                            <div class="register-center-input-title">
                                *Password:
                            </div>
                            <input type="password" class="form-control" id="password" name="password" placeholder="* Password" required>
                        </div>
                    </div>
                    <div class="form-row my-4">
                        <div class="register-center-input-vl"></div>
                        <div class="col">
                            <div class="register-center-input-title">
                                *Confirm Password:
                            </div>
                            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="* Confirm Password" required>
                            <small id="passwordConfirmError" class="text-danger"></small>
                        </div>
                    </div>
                    <div class="form-row my-4">
                        <div class="register-center-input-vl"></div>
                        <div class="col">
                            <div class="register-center-input-title">
                                *Date of Birth:
                            </div>
                            <input type="date" class="form-control text-center" id="dob" name="dob" max="2004-12-31" required>
                        </div>
                    </div>
                    <div class="form-row my-4">
                        <!-- <div class="register-center-input-vl"></div> -->
                        <div class="col">
                            <div class="register-center-input-title">
                                *Country:
                            </div>
                            <select name="country">
                                <?php
                                $getDBCountriesQuery = 'SELECT country FROM countries';
                                $getDBCountries = mysqli_query($connection, $getDBCountriesQuery);
                                if(mysqli_num_rows($getDBCountries) > 0){
                                    foreach($getDBCountries as $country){
                                        echo '<option value="'. $country["country"] .'">'. $country["country"] .'</option>';
                                    }
                                }else{
                                    header("Location: http://aluno14738.damiaodegoes.pt/errorpage.php");
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row my-4">
                        <div class="register-center-input-vl"></div>
                        <div class="col">
                            <div class="register-center-input-title">
                                Referral ID:
                            </div>
                            <input type="text" class="form-control" id="referral" name="referral" placeholder="Referral ID">
                        </div>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="checkbox" name="politics" class="form-check-input" required>
                        <label for="politics" class="form-check-label register-center-text">I agree with the <a href="termsncons.php">terms, conditions and policy</a> (*)</label>
                    </div>
                    <div class="submit-btn text-center my-3">
                        <button type="submit" class="btn btn-primary rounded-pill text-tark px-5">Register</button>
                    </div>
                </form>
            </div>
        </div>
    <!-- </main> -->

    <!-- modal handler -->
    <?php
    if (isset($_GET["error"])) {
        if ($_GET["error"] == false) {
            echo "<script>
            $(document).ready(function(){
                $('#successRegisterModal').modal('show');
             });
            </script>";
        } else {
            echo "<script>
            $(document).ready(function(){
                $('#errorRegisterModal').modal('show');
             });
            </script>";
        }
    } else {
        echo "<script>
        $(document).ready(function(){
            $('#successRegisterModal').modal('hide');
            $('#errorRegisterModal').modal('hide');
         });
        </script>";
    }
    ?>
    <!-- -- -->

    <!-- error modal -->

    <div class="modal" id="errorRegisterModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Problem Ocurred!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>There was an error while trying to register you!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="resetPageRegister()">Confirm</button>
                </div>
            </div>
        </div>
    </div>

    <!-- -- -->

    <!-- success modal -->

    <div class="modal" id="successRegisterModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Success!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>You have successfully registered!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="resetPageRegister()">Confirm</button>
                </div>
            </div>
        </div>
    </div>

    <!-- -- -->

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