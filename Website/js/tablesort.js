// Add new record

var toggle = 0;

document.getElementById("account-profile-add-record-tr").addEventListener("click", () => {
    const toggler = document.getElementById("account-profile-add-record-tr");

    const addHeader = document.getElementById("account-profile-add-record-tr");
    const tBody = document.querySelector('.table-sortable').tBodies[1];

    if (toggle == 0) {
        toggle = 1;

        if (toggler.firstChild) {
            toggler.removeChild(toggler.firstChild);
        }

        const newText = document.createElement("i");
        newText.classList.toggle("fa");
        newText.classList.toggle("fa-minus");
        newText.style.color = "white";

        toggler.appendChild(newText);

        const row = tBody.insertRow(1);
        const tdTime = row.insertCell(0);
        const tdMoney = row.insertCell(1);
        const tdKills = row.insertCell(2);
        const tdConfirm = row.insertCell(3);

        const rowI = tBody.insertRow(2);
        const tdTimeI = rowI.insertCell(0);
        const tdMoneyI = rowI.insertCell(1);
        const tdKillsI = rowI.insertCell(2);
        const tdConfirmI = rowI.insertCell(3);

        row.classList.toggle("account-profile-add-record-tr-bg");
        rowI.classList.toggle("account-profile-add-record-tr-bg2");

        tdTime.colSpan = "2";
        tdTime.style.width = "30%";
        tdTime.innerHTML = "Time ";

        tdTimeI.colSpan = "2";
        tdTimeI.innerHTML = "<input class='account-profile-add-record-input' type='text' name='time' placeholder='hh:mm:ss:ms' required></input>";

        tdMoney.colSpan = "2";
        tdTime.style.width = "25%";
        tdMoney.innerHTML = "Money ";

        tdMoneyI.colSpan = "2";
        tdMoneyI.innerHTML = "<input class='account-profile-add-record-input' type='text' name='money' placeholder='5200' required></input>";

        tdKills.colSpan = "1";
        tdTime.style.width = "20%";
        tdKills.innerHTML = "Kills ";

        tdKillsI.colSpan = "1";
        tdKillsI.innerHTML = "<input class='account-profile-add-record-input' type='text' name='kills' placeholder='2500' required></input>";

        tdConfirm.colSpan = "1";
        tdTime.style.width = "15%";
        tdConfirm.innerHTML = "Confirm";

        tdConfirmI.colSpan = "1";
        tdConfirmI.innerHTML = "<input type='submit' name='add' value='Add' class='account-profile-add-record-button' required></input>";
    } else {
        toggle = 0;
        if (toggler.firstChild) {
            toggler.removeChild(toggler.firstChild);
        }
        var newText = document.createElement("i");
        newText.classList.toggle("fa");
        newText.classList.toggle("fa-plus");
        newText.style.color = "white";

        toggler.appendChild(newText);

        tBody.removeChild(tBody.childNodes[3]);
        tBody.removeChild(tBody.childNodes[3]);
    }
})

// --

// remove record

var currentDeletingTR = null;

function ConfirmDeleteRecord(){
    currentDeletingTR.remove(currentDeletingTR);
    if (currentDeletingTR.children[4].textContent == "Approved") {
        window.location.href = "http://aluno14738.damiaodegoes.pt/profile/removeRanking.php?time=" + currentDeletingTR.children[1].textContent + "&global=1";
    } else if(currentDeletingTR.children[4].textContent == "Waiting") {
        window.location.href = "http://aluno14738.damiaodegoes.pt/profile/removeRanking.php?time=" + currentDeletingTR.children[1].textContent + "&global=0";
    }
}

function deleteRecord(tdId) {
    const currentTr = document.getElementById(tdId).parentNode;
    $("#checkConfirmDeleteRecord").modal("show");
    currentDeletingTR = currentTr;
}
// --

// modal websites headers

function resetPageProfile(){
    window.location.href = "http://aluno14738.damiaodegoes.pt/profile/profile.php?page=profile";
}

function resetPageModLead(){
    window.location.href = "http://aluno14738.damiaodegoes.pt/profile/profile.php?page=modLeaderboard";
}

// --

// edit profile password and email

function activateChangePasswordModal(){
    $("#passwordChangeModal").modal("show");
}

function activateChangeEmailModal(){
    $("#emailChangeModal").modal("show");
}

// --

// modLeaderboard

$(document).ready(function() {
    $('#table-sortable-modLeaderboard').DataTable({
        "lengthMenu": [[5, 10], [5, 10]],
        "responsive": true,
        "language": {
            searchPlaceholder: "Insert name..",
            emptyTable: "No new requests pending",
            infoEmpty: "No new requests pending"
        },
        "order": [0, "asc"],
        "columnDefs":[
            {
                "targets": 4,
                "sortable": false
            },
            {
                "targets": [1, 2, 3],
                "searchable": false
            }
        ]
        
    });

    $('#table-sortable-leaderboard').DataTable({
        "lengthChange": false,
        "pageLength": 10,
        "columnDefs": [
            {
                "targets": 2,
                "sortable": false
            },
            {
                "targets": [0, 2, 3, 4],
                "searchable": false
            }
        ],
        "responsive": true,
        "language": {
            searchPlaceholder: "Insert name..",
            emptyTable: "No records available yet",
            infoEmpty: "No records available yet"
        },
        "order": [0, "asc"]
    })

    $('#table-sortable-personal').DataTable({
        "lengthChange": false,
        "pageLength": 5,
        "searching": false,
        "language": {
            emptyTable: "No records added yet",
            infoEmpty: "No records added yet"
        },
        "columnDefs":[
            {
                "targets": 5,
                "sortable": false
            }
        ]
    })
} );

// accept records

var modLeaderboardTR = null;

function acceptRecordGlobal(tdId){
    const currentTr = document.getElementById("recordMod" + tdId).parentNode;
    modLeaderboardTR = currentTr;
    $("#checkConfirmAcceptRecord").modal("show");
}

function ConfirmAcceptRecordGlobal(tdId){
    window.location.href = "http://aluno14738.damiaodegoes.pt/profile/acceptRanking.php?time=" + modLeaderboardTR.children[1].textContent + "&name=" + modLeaderboardTR.children[0].textContent;
}
// -- 

// reject records

function rejectRecordGlobal(tdId){
    const currentTr = document.getElementById("recordMod" + tdId).parentNode;
    modLeaderboardTR = currentTr;
    $("#checkConfirmRejectRecord").modal("show");
}

function ConfirmRejectRecordGlobal(tdId){
    window.location.href = "http://aluno14738.damiaodegoes.pt/profile/rejectRanking.php?time=" + modLeaderboardTR.children[1].textContent + "&name=" + modLeaderboardTR.children[0].textContent;
}

// --

// --