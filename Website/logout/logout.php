<?php
    session_start();
    $_SESSION["logged"] = false;
    $_SESSION["username"] = "";
    session_destroy();
    header("Location:http://aluno14738.damiaodegoes.pt/index.php");
