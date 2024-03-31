function getUsers() {
    $.ajax({
        url: "url_to_your_user_api_endpoint",
        type: "GET",
        success: function(response) {
            console.log("Users retrieved successfully:", response);
        },
        error: function(xhr, status, error) {
            console.error("Error retrieving users:", error);
        }
    });
}

function getCrimes() {
    $.ajax({
        url: "url_to_your_crime_api_endpoint",
        type: "GET",
        success: function(response) {
            console.log("Crimes retrieved successfully:", response);
        },
        error: function(xhr, status, error) {
            console.error("Error retrieving crimes:", error);
        }
    });
}

function getMissingPersons() {
    $.ajax({
        url: "url_to_your_missing_person_api_endpoint",
        type: "GET",
        success: function(response) {
            console.log("Missing persons retrieved successfully:", response);
        },
        error: function(xhr, status, error) {
            console.error("Error retrieving missing persons:", error);
        }
    });
}

function getReports() {
    $.ajax({
        url: "url_to_your_report_api_endpoint",
        type: "GET",
        success: function(response) {
            console.log("Reports retrieved successfully:", response);
        },
        error: function(xhr, status, error) {
            console.error("Error retrieving reports:", error);
        }
    });
}

function getWantedPersons() {
    $.ajax({
        url: "url_to_your_wanted_person_api_endpoint",
        type: "GET",
        success: function(response) {
            console.log("Wanted persons retrieved successfully:", response);
        },
        error: function(xhr, status, error) {
            console.error("Error retrieving wanted persons:", error);
        }
    });
}

getUsers();
getCrimes();
getMissingPersons();
getReports();
getWantedPersons();
