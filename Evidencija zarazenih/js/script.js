window.onload = function () {
    getPatientTable(0);
}

function getPatientTable(country) {
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if(this.readyState === 4 && this.status === 200) {
            let tableDiv = document.getElementById("patientTable");
            tableDiv.innerHTML = this.responseText;
        }
    }

    xhr.open("GET", "/patientTable.php?country="+country);
    xhr.send();
}

function selectionChanged(e) {
    getPatientTable(e.value);
}

function resetForm() {
    var firstname = document.getElementById("firstname");
    firstname.value = "";

    var lastname = document.getElementById("lastname");
    lastname.value = "";

    var birthdate = document.getElementById("birthdate");
    birthdate.value = "";

    var country = document.getElementById("country");
    country.selectedIndex=0;
}

function newPatient() {
    window.location.href="newPatient.php";
}

function validateForm() {
    var first_name = document.getElementById("firstname");
    var last_name = document.getElementById("lastname");
    var birth_date = document.getElementById("birthdate");
    var country = document.getElementById("country");
    var isInfected = document.getElementById("isInfected");
    var notInfected = document.getElementById("notInfected");

    if(firstname.value === "" || lastname.value === "" || birthdate.value === "" ||
        country.selectedIndex < 0 || (isInfected.checked === false && notInfected.checked === false)) {
        alert("All fields are required");
        return false;
    }
}

