<?php
//STATICS
define("DB_NAME", "aluno14738");
define("DB_USER", "aluno14738");
define("DB_PASSWORD", "Malai14738");
define("DB_HOST", "localhost");

define("MYSQL_CONN_ERROR", "Unable to connect to database.");
mysqli_report(MYSQLI_REPORT_STRICT);

try {
    $connection = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
} catch (Exception $e) {
    header("Location: http://aluno14738.damiaodegoes.pt/errorpage.php");
}