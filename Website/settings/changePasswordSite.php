<?php
include("../side/help.php");
include("../nav/navbar.php");
require_once("../sql/connection.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Horde - Password Reset</title>
</head>

<body>
    <div class="bg-image-blur"></div>
    <div class="scale-temp">
	<div class="text-center bg-text scale-temp">
		<br>
		<h1 class="display1">The Horde</h1>
		<h3 class="display3">Forgot Password</h3>
		<p class="display3 text-black" style="font-size: 20px">Insert the email bellow to reset your password!</p>
		<div class="d-flex justify-content-center center-middle">
			<form method="POST" action="#" enctype="multipart/formdata" id="reset1-form">
				<div class="form-row">
					<div class="col">
						<input type="email" class="form-control" id="resetEmail" name="resetEmail" placeholder="Email" required>
					</div>
				</div>
				<div class="submit-btn text-center my-3">
					<button type="submit" class="btn btn-primary rounded-pill text-tark px-5">Send</button>
				</div>
			</form><br>
		</div>
    </div>
    <?php 
        if(isset($_POST["resetEmail"])){
            $resetEmail = checkEmptyStr($_POST["resetEmail"]);
            
            $tempPwd = bin2hex(random_bytes(8));


            $checkEmailQuery = "SELECT * FROM players WHERE email = '". $resetEmail . "'";
            $checkEmail = mysqli_query($connection, $checkEmailQuery);
            if(mysqli_num_rows($checkEmail) === 1){
                $tempPwdQuery = "UPDATE players SET password ='". password_hash($tempPwd, PASSWORD_DEFAULT) ."' WHERE email = '". $resetEmail ."'";
                mysqli_query($connection, $tempPwdQuery);
            }

            $_SESSION["tempPwd"] = $tempPwd;
            $_SESSION["resetEmail"] = $resetEmail;

            header("Location: http://aluno14738.damiaodegoes.pt/email/send_pwdResetEmail.php");
        }

        if(isset($_SESSION["tempPwdSent"]) && $_SESSION["tempPwdSent"] == true){
            echo "<script>
            $(document).ready(function(){
                $('#confirmResetEmail').modal('show');
             });
            </script>";
            session_destroy();
        }else{
            echo "<script>
            $(document).ready(function(){
                $('#confirmResetEmail').modal('hide');
             });
            </script>";
        }
    ?>
    <!-- modal -->
    <div class="modal" id="confirmResetEmail" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Email Sent!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>If the email is valid then you will receive an email to proceed with the password reset.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>