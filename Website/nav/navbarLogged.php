<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://aluno14738.damiaodegoes.pt/css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="icon" href="http://aluno14738.damiaodegoes.pt/img/logo.ico">
</head>

<body>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a href="http://aluno14738.damiaodegoes.pt/index.php" class="navbar-brand">The Horde</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenuDrop" aria-controls="navbarMenuDrop" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMenuDrop">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="http://aluno14738.damiaodegoes.pt/index.php" class="nav-link text-center"><i class="fas fa-home"></i><br>Home</a>
                </li>
                <li class="nav-item">
                    <a href="http://aluno14738.damiaodegoes.pt/download.php" class="nav-link text-center"><i class="fas fa-download"></i><br>Download</a>
                </li>
                <li class="nav-item">
                    <a href="#" id="showConfirmLogout" class="nav-link text-center"><i class="fas fa-sign-out-alt"></i><br>Logout</a>
                </li>
                <li class="nav-item account-navbar">
                    <a href="http://aluno14738.damiaodegoes.pt/profile/profile.php?page=profile" class="nav-link text-center"><i class="fas fa-user"></i><br>Account</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- modal -->
    <div class="modal" id="checkConfirmLogout" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Logout Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to log out?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-primary" id="confirmLogout">Yes</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="http://aluno14738.damiaodegoes.pt/js/main.js"></script>
</body>

</html>