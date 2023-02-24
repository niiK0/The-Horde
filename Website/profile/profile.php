<?php
include("../side/help.php");
checkSession();
if (isset($_SESSION["logged"]) && $_SESSION["logged"] == true) {
    include("../nav/navbarLogged.php");
} else {
    include("../nav/navbar.php");
}
require("../sql/connection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.23/r-2.2.7/sc-2.0.3/sb-1.0.1/sp-1.2.2/datatables.min.css" />
    <title>The Horde - Account</title>
</head>

<body>
    <?php
    if (isset($_SESSION["logged"]) && $_SESSION["logged"] == true) {
    ?>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar -->
            <div class="bg-light border-right" id="sidebar-wrapper" style="height: 100%; width:20%;">
                <div style="box-shadow: 0px 0px 20px 2px black; width:100%; height: 100%;">
                    <div class="sidebar-heading text-center sidebar-heading-custom">Welcome <span style="color: green;"><?php echo $_SESSION["username"] ?></span> !<br>Here is the settings menu!</div>
                    <div class="list-group list-group-flush">
                        <a href="?page=profile" class="list-group-item list-group-item-action bg-light">Profile</a>
                        <a href="?page=leaderboard" class="list-group-item list-group-item-action bg-light">Leaderboard</a>
                        <?php
                        if ($_SESSION["userGroup"] != "user") {
                            echo '<a href="?page=modLeaderboard" class="list-group-item list-group-item-action bg-light">Moderate Leaderboard</a>';
                            echo '<a href="?page=modStatistics" class="list-group-item list-group-item-action bg-light">Moderate Statistics</a>';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <!-- /#sidebar-wrapper -->

            <div id="page-content-wrapper">
                <div class="settings-content text-center" id="profile">
                    <h2 class="display2">Profile</h2>
                    <hr><br>
                    <?php
                    //GET MAIN DB INFO
                    $queryGetInfo = "SELECT * FROM players WHERE username = '" . $_SESSION['username'] . "'";
                    $checkResults = mysqli_query($connection, $queryGetInfo);
                    if (mysqli_num_rows($checkResults) === 1) {
                        $row = mysqli_fetch_assoc($checkResults);
                        $_SESSION["pId"] = $row["id"];
						$_SESSION["email"] = $row["email"];
                    ?>
                        <div class="container-sm account-profile-info">
                            <table class="table text-center">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</i></th>
                                        <th scope="col">Password</i></th>
                                        <th scope="col">Date of Birth</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="bg-light">
                                        <td><?php echo $row["id"] ?></td>
                                        <td><?php echo $row["username"] ?></td>
                                        <td><?php echo $row["email"] ?> <i class="fas fa-edit account-profile-edit-icon" onclick="activateChangeEmailModal()"></td>
                                        <td>********** <i class="fas fa-edit account-profile-edit-icon" onclick="activateChangePasswordModal()"></td>
                                        <td><?php echo $row["dob"] ?></td>
                                    </tr>
                                    <tr>
                                </tbody>
                            </table>
                        </div>
                    <?php
                    } else {
                        echo "<script>alert('An error has occured!')</script>";
                        header("Location:../logout/logout.php");
                    }
                    ?>
                    <div class="container-sm">
                        <h2 class="display3">Personal Leaderboard</h2>
                        <hr width="50%">
                        <form method="POST" action="http://aluno14738.damiaodegoes.pt/profile/addRanking.php">
                            <table id="table-sortable-personal" class="table table-sortable text-center">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Place</th>
                                        <th scope="col">Time</th>
                                        <th scope="col">Money</th>
                                        <th scope="col">Kills</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Manage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    //GET RANKINGS DB INFO
                                    $queryGetRankingInfo = "SELECT * FROM rankings WHERE player = " . $row['id'];
                                    $checkRankingResults = mysqli_query($connection, $queryGetRankingInfo);
                                    $idIntPersonal = 0;
                                    if (mysqli_num_rows($checkRankingResults) >= 1) {
                                        foreach ($checkRankingResults as $pRankings) {
                                            echo '<tr class="bg-light">';
                                            echo '<td scope="col">' . $pRankings["place"] . '</td>';
                                            echo '<td scope="col">' . $pRankings["time"] . '</td>';
                                            echo '<td scope="col">' . $pRankings["money"] . '</td>';
                                            echo '<td scope="col">' . $pRankings["kills"] . '</td>';
                                            echo '<td scope="col">Approved</td>';
                                            echo '<td id="record' . $idIntPersonal . '" class="account-profie-delete-record" scope="col" onclick="deleteRecord(this.id)"> Delete</td>';
                                            echo '</tr>';
                                            $idIntPersonal++;
                                        }
                                    }

                                    //GET RANKINGS DB INFO
                                    $queryGetManageRankingInfo = "SELECT * FROM requesting_rankings WHERE player = " . $row['id'];
                                    $checkManageRankingResults = mysqli_query($connection, $queryGetManageRankingInfo);
                                    if (mysqli_num_rows($checkManageRankingResults) >= 1) {
                                        foreach ($checkManageRankingResults as $mRankings) {
                                            echo '<tr class="bg-light">';
                                            echo '<td scope="col">?</td>';
                                            echo '<td scope="col">' . $mRankings["time"] . '</td>';
                                            echo '<td scope="col">' . $mRankings["money"] . '</td>';
                                            echo '<td scope="col">' . $mRankings["kills"] . '</td>';
                                            echo '<td scope="col">' . ucfirst($mRankings["manage"]) . '</td>';
                                            echo '<td id="record' . $idIntPersonal . '" class="account-profie-delete-record" scope="col" onclick="deleteRecord(this.id)"> Delete</td>';
                                            echo '</tr>';
                                            $idIntPersonal++;
                                        }
                                    }
                                    ?>
                                </tbody>
                                <tbody>
                                    <tr class="bg-dark">
                                        <td colspan="5" scope="col" style="text-align: right; color: rgba(255,255,255); font-weight: 500;">Add personal record</td>
                                        <td scope="col"><button type="button" class="account-profile-add-record" id="account-profile-add-record-tr"><i class="fa fa-plus" aria-hidden="true" style="color: white;"></i></button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
                <div class="settings-content" id="leaderboard">
                    <!-- order global leaderboard -->
                    <?php
                    $getGlobalRankingsQuery = "SELECT * FROM rankings ORDER BY rankings.time DESC";
                    $getGlobalRankings = mysqli_query($connection, $getGlobalRankingsQuery);
                    $orderGlobalId = 1;
                    if (mysqli_num_rows($getGlobalRankings) > 0) {
                        foreach ($getGlobalRankings as $pRankings) {
                            $updateGlobalRankingsQuery = 'UPDATE rankings SET place = ' . $orderGlobalId . ' WHERE player = "' . $pRankings["player"] . '" AND time = "' . $pRankings["time"] . '"';
                            $updateGlobalRankings = mysqli_query($connection, $updateGlobalRankingsQuery);
                            $orderGlobalId++;
                        }
                    }
                    ?>
                    <!-- -- -->
                    <h2 class="display2">Leaderboard</h2>
                    <hr><br>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <table id="table-sortable-leaderboard" class="table table-sortable-leaderboard text-center">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th width="15%">Place</th>
                                            <th width="30%">Name</th>
                                            <th width="15%">Time</th>
                                            <th width="25%">Money</th>
                                            <th width="15%">Kills</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        //GET RANKINGS DB INFO
                                        $queryGetRankingInfo = "SELECT rankings.place, rankings.time, rankings.money, rankings.kills, players.username FROM rankings RIGHT JOIN players ON players.id = rankings.player WHERE rankings.place != '' ORDER BY rankings.place DESC";
                                        $checkRankingResults = mysqli_query($connection, $queryGetRankingInfo);
                                        if (mysqli_num_rows($checkRankingResults) >= 1) {
                                            foreach ($checkRankingResults as $pRankings) {
                                                echo '<tr class="bg-light">';
                                                echo '<td scope="col">' . $pRankings["place"] . '</td>';
                                                echo '<td scope="col">' . $pRankings["username"] . '</td>';
                                                echo '<td scope="col">' . $pRankings["time"] . '</td>';
                                                echo '<td scope="col">' . $pRankings["money"] . '</td>';
                                                echo '<td scope="col">' . $pRankings["kills"] . '</td>';
                                                echo '</tr>';
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="settings-content" id="modLeaderboard">
                    <h2 class="display2 text-center">Moderate Leaderboard</h2>
                    <hr><br>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <table id="table-sortable-modLeaderboard" class="table table-sortable-leaderboard text-center" style="width:100%">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th style="width: 25%">Name</th>
                                            <th style="width: 20%">Time</th>
                                            <th style="width: 15%">Money</th>
                                            <th style="width: 15%">Kills</th>
                                            <th style="width: 25%">Manage</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // GET RANKINGS DB INFO
                                        $queryGetManageRankingInfo = "SELECT players.username, requesting_rankings.time, requesting_rankings.money, requesting_rankings.kills FROM requesting_rankings RIGHT JOIN players ON players.id = requesting_rankings.player WHERE requesting_rankings.time != '' ORDER BY requesting_rankings.id";
                                        $checkManageRankingResults = mysqli_query($connection, $queryGetManageRankingInfo);
                                        $idIntModLead = 0;
                                        if (mysqli_num_rows($checkManageRankingResults) >= 1) {
                                            foreach ($checkManageRankingResults as $pRankings) {
                                                echo '<tr class="bg-light">';
                                                echo '<td>' . $pRankings["username"] . '</td>';
                                                echo '<td>' . $pRankings["time"] . '</td>';
                                                echo '<td>' . $pRankings["money"] . '</td>';
                                                echo '<td>' . $pRankings["kills"] . '</td>';
                                                echo '<td id="recordMod' . $idIntModLead . '"><span class="account-modLeaderboard-accept-text mr-5" onclick="acceptRecordGlobal(' . $idIntModLead . ')">Accept</span><span class="account-modLeaderboard-delete-text" onclick="rejectRecordGlobal(' . $idIntModLead . ')">Delete</span></td>';
                                                echo '</tr>';
                                                $idIntModLead++;
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="settings-content text-center" id="modStatistics">
                    <h2 class="display2">Moderate Statistics</h2>
                    <hr><br>
                    <!-- map chart -->
                    <html>

                    <head>
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script type="text/javascript">
                            google.charts.load('current', {
                                'packages': ['geochart'],
                                'mapsApiKey': 'AIzaSyCKRntbrsVuXxN7W18byhfTKedpif-8B34'
                            });
                            google.charts.setOnLoadCallback(drawRegionsMap);

                            function drawRegionsMap() {
                                var data = google.visualization.arrayToDataTable([
                                    ['Country', 'Popularity'],
                                    <?php
                                    // GET COUNTRY COUNT

                                    $queryGetCountryCount = 'SELECT * FROM countries';
                                    $getCountryCount = mysqli_query($connection, $queryGetCountryCount);

                                    if (mysqli_num_rows($getCountryCount) > 0) {
                                        foreach ($getCountryCount as $countryNcount) {
                                            echo "['" . $countryNcount['country'] . "', " . $countryNcount['count'] . "],";
                                        }
                                    }
                                    ?>["Uruguai", "0"]
                                ]);

                                var options = {
                                    backgroundColor: "#E4E4E4",
                                    colorAxis: {
                                        colors: ['#FDFF7E', '#B00000']
                                    }
                                };

                                var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

                                chart.draw(data, options);
                            }
                        </script>
                    </head>

                    <body>
                        <div class="regions_div" id="regions_div"></div>
                    </body>

                    </html>
                    <!-- -- -->

                    <div class="container" style="margin-top: 5em">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table">
                                    <thead class="table-dark">
                                        <th>Regirested Users</th>
                                    </thead>
                                    <tbody class="table-light">
                                        <?php
                                        // GET REGISTERED USERS DB INFO
                                        $queryGetRegisteredUsers = "SELECT COUNT(id) FROM players";
                                        $getRegisteredUsers = mysqli_query($connection, $queryGetRegisteredUsers);
                                        if (mysqli_num_rows($getRegisteredUsers) > 0) {
                                            $countRegistered = mysqli_fetch_assoc($getRegisteredUsers);
                                            echo "<td>". $countRegistered["COUNT(id)"] ."</td>";
                                        }else{
                                            echo "<td>Error Occured.</td>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    } else {
        header("Location:http://aluno14738.damiaodegoes.pt/index.php");
    }
    ?>
    </div>

    <!-- PAGE MANIPULATE -->

    <?php
    switch ($_GET["page"]) {
        case 'profile':
            echo '<script>
            $(document).ready(function(){
                $("#profile").css("animation", "test 0.5s");
                $("#profile").css("opacity", 1);
                $("#profile").css("display", "block");
                $("#leaderboard").css("display", "none");
                $("#leaderboard").css("opacity", 0);
                $("#modLeaderboard").css("display", "none");
                $("#modLeaderboard").css("opacity", 0);
                $("#modStatistics").css("display", "none");
                $("#modStatistics").css("opacity", 0);
             });
            </script>';
            break;

        case 'leaderboard':
            echo '<script>
            $(document).ready(function(){
                $("#leaderboard").css("display", "block");
                $("#leaderboard").css("animation", "test 0.5s");
                $("#leaderboard").css("opacity", 1);
                $("#profile").css("display", "none");
                $("#profile").css("opacity", 0);
                $("#modLeaderboard").css("display", "none");
                $("#modLeaderboard").css("opacity", 0);
                $("#modStatistics").css("display", "none");
                $("#modStatistics").css("opacity", 0);
            });
            </script>';
            break;

        case "modLeaderboard":
            echo '<script>
            $(document).ready(function(){
                $("#modLeaderboard").css("display", "block");
                $("#modLeaderboard").css("animation", "test 0.5s");
                $("#modLeaderboard").css("opacity", 1);
                $("#profile").css("display", "none");
                $("#profile").css("opacity", 0);
                $("#leaderboard").css("display", "none");
                $("#leaderboard").css("opacity", 0);
                $("#modStatistics").css("display", "none");
                $("#modStatistics").css("opacity", 0);
            });
            </script>';
            break;

        case "modStatistics":
            echo '<script>
            $(document).ready(function(){
                $("#modStatistics").css("display", "block");
                $("#modStatistics").css("animation", "test 0.5s");
                $("#modStatistics").css("opacity", 1);
                $("#profile").css("display", "none");
                $("#profile").css("opacity", 0);
                $("#leaderboard").css("display", "none");
                $("#leaderboard").css("opacity", 0);
                $("#modLeaderboard").css("display", "none");
                $("#modLeaderboard").css("opacity", 0);
            });
            </script>';
            break;
    }
    ?>

    <!-- general error -->

    <?php
    if (isset($_GET["problemOccured"])) {
        if ($_GET["problemOccured"] == true) {
            echo "<script>
            $(document).ready(function(){
                $('#checkGeneralError').modal('show');
             });
            </script>";
        }
    } else {
        echo "<script>
        $(document).ready(function(){
            $('#checkGeneralError').modal('hide');
         });
        </script>";
    }
    ?>
    <!-- -- -->

    <!-- settings-change-password -->
    <?php
    if (isset($_GET["pwdC"])) {
        if ($_GET["pwdC"] == true) {
            echo "<script>
            $(document).ready(function(){
                $('#changePasswordSucc').modal('show');
                $('#changePasswordError').modal('hide');
             });
            </script>";
        } else {
            echo "<script>
            $(document).ready(function(){
                $('#changePasswordSucc').modal('hide');
                $('#changePasswordError').modal('show');
             });
            </script>";
        }
    } else {
        echo "<script>
        $(document).ready(function(){
            $('#changePasswordSucc').modal('hide');
            $('#changePasswordError').modal('hide');
         });
        </script>";
    }
    ?>
    <!-- -- -->

    <!-- settings-change-email -->
    <?php
    if (isset($_GET["emC"])) {
        if ($_GET["emC"] == true) {
            echo "<script>
            $(document).ready(function(){
                $('#changeEmailSucc').modal('show');
             });
            </script>";
        } else {
            echo "<script>
            $(document).ready(function(){
                $('#changeEmailError').modal('show');
             });
            </script>";
        }
    } else {
        echo "<script>
        $(document).ready(function(){
            $('#changeEmailSucc').modal('hide');
            $('#changeEmailError').modal('hide');
         });
        </script>";
    }
    ?>
    <!-- -- -->

    <!-- record-already-exists -->
    <?php
    if (isset($_GET["recordAlreadyExists"])) {
        if ($_GET["recordAlreadyExists"] == false) {
            echo "<script>
            $(document).ready(function(){
                $('#checkRecordAdded').modal('show');
             });
            </script>";
        } else {
            echo "<script>
            $(document).ready(function(){
                $('#checkRecordAlreadyExists').modal('show');
             });
            </script>";
        }
    } else {
        echo "<script>
        $(document).ready(function(){
            $('#checkRecordAdded').modal('hide');
            $('#checkRecordAlreadyExists').modal('hide');
         });
        </script>";
    }
    ?>
    <!-- -- -->

    <!-- accept-record -->
    <?php
    if (isset($_GET["acceptError"])) {
        if ($_GET["acceptError"] == false) {
            echo "<script>
            $(document).ready(function(){
                $('#acceptRecordSuccessfull').modal('show');
             });
            </script>";
        } else {
            echo "<script>
            $(document).ready(function(){
                $('#acceptRecordError').modal('show');
             });
            </script>";
        }
    } else {
        echo "<script>
        $(document).ready(function(){
            $('#acceptRecordSuccessfull').modal('hide');
            $('#acceptRecordError').modal('hide');
         });
        </script>";
    }
    ?>
    <!-- -- -->

    <!-- reject-record -->
    <?php
    if (isset($_GET["rejectError"])) {
        if ($_GET["rejectError"] == false) {
            echo "<script>
            $(document).ready(function(){
                $('#rejectRecordSuccessfull').modal('show');
             });
            </script>";
        } else {
            echo "<script>
            $(document).ready(function(){
                $('#rejectRecordError').modal('show');
             });
            </script>";
        }
    } else {
        echo "<script>
        $(document).ready(function(){
            $('#rejectRecordSuccessfull').modal('hide');
            $('#rejectRecordError').modal('hide');
         });
        </script>";
    }
    ?>
    <!-- -- -->

    <!-- general error modal -->

    <div class="modal" id="checkGeneralError" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Problem Ocurred!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>An unexpected error occured.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Confirm</button>
                </div>
            </div>
        </div>
    </div>

    <!-- -- -->

    <!-- pwd modals -->
    <!-- succ -->
    <div class="modal" id="changePasswordSucc" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Password Changed!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>You have successfully changed your password!.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="resetPageProfile()">Confirm</button>
                </div>
            </div>
        </div>
    </div>

    <!-- error -->
    <div class="modal" id="changePasswordError" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Problem Ocurred!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>There was an error while changing your password, try again!.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="resetPageProfile()">Confirm</button>
                </div>
            </div>
        </div>
    </div>
    <!-- -- -->

    <!-- email modals -->

    <!-- succ -->
    <div class="modal" id="changeEmailSucc" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Email Changed!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>You have successfully changed your email!.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="resetPageProfile()">Confirm</button>
                </div>
            </div>
        </div>
    </div>

    <!-- error -->
    <div class="modal" id="changeEmailError" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Problem Ocurred!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>There was an error while changing your email, try again!.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="resetPageProfile()">Confirm</button>
                </div>
            </div>
        </div>
    </div>
    <!-- -- -->


    <!-- record modal -->

    <!-- added suc -->

    <div class="modal" id="checkRecordAdded" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Record Added!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>You have successfully added the record.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="resetPageProfile()">Confirm</button>
                </div>
            </div>
        </div>
    </div>

    <!-- -- -->

    <!-- already exists -->

    <div class="modal" id="checkRecordAlreadyExists" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Problem Ocurred!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>A record with this timing already exists!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="resetPageProfile()">Confirm</button>
                </div>
            </div>
        </div>
    </div>

    <!-- -- -->

    <!-- delete record modal -->

    <div class="modal" id="checkConfirmDeleteRecord" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Are you sure?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this record?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-primary" id="confirmDeleteRecord" onclick="ConfirmDeleteRecord()">Yes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- --  -->

    <!-- change password -->

    <div class="modal" id="passwordChangeModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Change Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="setting-temp-form" method="POST" action="http://aluno14738.damiaodegoes.pt/settings/changePassword.php">
                    <div class="modal-body">
                        <p class="display3 text-black-50 text-center">To change your password please insert a new one below and confirm it.</p>
                        <div class="row">
                            <div class="col-md-4">
                                <p style="text-align: right;">New Password: </p>
                                <p style="text-align: right;">Confirm Password: </p>
                            </div>
                            <div class="col-md-8">
                                <input style="float: right;" class="settings-temp-form-input mb-2" type="password" name="newPassword" placeholder="New Password"><br>
                                <input style="float: right;" class="settings-temp-form-input" type="password" name="newPasswordC" placeholder="Confirm Password">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- -- -->

    <!-- change email -->

    <div class="modal" id="emailChangeModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Change Email</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="setting-temp-form" method="POST" action="http://aluno14738.damiaodegoes.pt/settings/emailChange.php">
                    <div class="modal-body">
                        <p class="display3 text-black-50 text-center">To change your email please insert a new one below and confirm it.</p>
                        <div class="row">
                            <div class="col-md-4">
                                <p style="text-align: right;">New Email: </p>
                                <p style="text-align: right;">Confirm Email: </p>
                            </div>
                            <div class="col-md-8">
                                <input style="float: right;" class="settings-temp-form-input mb-2" type="email" name="newEmail" placeholder="New Email"><br>
                                <input style="float: right;" class="settings-temp-form-input" type="email" name="newEmailC" placeholder="Confirm New Email">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Change Email</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- -- -->

    <!-- accept record modal -->

    <div class="modal" id="checkConfirmAcceptRecord" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Are you sure?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to accept this record?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-primary" id="confirmAcceptRecord" onclick="ConfirmAcceptRecordGlobal()">Yes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- successfull -->
    <div class="modal" id="acceptRecordSuccessfull" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Success!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>You have successfully accepted this record!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="resetPageModLead()">Confirm</button>
                </div>
            </div>
        </div>
    </div>

    <!-- error -->
    <div class="modal" id="acceptRecordError" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Problem Ocurred!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>There was a problem on accepting this record!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="resetPageModLead()">Confirm</button>
                </div>
            </div>
        </div>
    </div>

    <!-- --  -->

    <!-- reject record modal -->

    <div class="modal" id="checkConfirmRejectRecord" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Are you sure?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to reject this record?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-primary" id="confirmRejectRecord" onclick="ConfirmRejectRecordGlobal()">Yes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- successfull -->
    <div class="modal" id="rejectRecordSuccessfull" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Success!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>You have successfully rejected this record!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="resetPageModLead()">Confirm</button>
                </div>
            </div>
        </div>
    </div>

    <!-- error -->
    <div class="modal" id="rejectRecordError" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Problem Ocurred!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>There was a problem on rejecting this record!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="resetPageModLead()">Confirm</button>
                </div>
            </div>
        </div>
    </div>

    <!-- --  -->

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
        }, 500);
    </script>

    <!-- ajax jquery --> <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- bootstrap --><script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <!-- tables below --><script src="http://aluno14738.damiaodegoes.pt/js/tablesort.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.23/r-2.2.7/sc-2.0.3/sb-1.0.1/sp-1.2.2/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap.min.js"></script>

</body>

</html>