$(document).ready(function (e) {

    // logout
    $('#checkConfirmLogout').modal('hide');

    $('#showConfirmLogout').click(function () {
        $('#checkConfirmLogout').modal('show');
    })

    $('#confirmLogout').click(function () {
        window.location = "http://aluno14738.damiaodegoes.pt/logout/logout.php";
    })

    // --

    $("#reg-form").submit(function (event) {
        let $password = $("#password");
        let $confirm = $("#confirmPassword");
        let $error = $("#passwordConfirmError");

        if ($password.val() == $confirm.val()) {
            return true;
        } else {
            $error.text("Passwords don't match!");
            event.preventDefault();
        }
    })
})

// reset pages

function resetPageRegister(){
    window.location.href = "http://aluno14738.damiaodegoes.pt/register/register.php";
}

function resetPageLogin(){
    window.location.href = "http://aluno14738.damiaodegoes.pt/login/login.php";
}

// --