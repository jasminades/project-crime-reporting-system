function deleteUser(userId) {
    $.ajax({
        url: "url_to_your_user_api_endpoint/" + userId,
        type: "DELETE",
        success: function(response) {
            console.log("User deleted successfully");
        },
        error: function(xhr, status, error) {
            console.error("Error deleting user:", error);
        }
    });
}

function deleteCrime(crimeId) {
    $.ajax({
        url: "url_to_your_crime_api_endpoint/" + crimeId,
        type: "DELETE",
        success: function(response) {
            console.log("Crime deleted successfully");
        },
        error: function(xhr, status, error) {
            console.error("Error deleting crime:", error);
        }
    });
}

function deleteMissingPerson(personId) {
    $.ajax({
        url: "url_to_your_missing_person_api_endpoint/" + personId,
        type: "DELETE",
        success: function(response) {
            console.log("Missing person deleted successfully");
        },
        error: function(xhr, status, error) {
            console.error("Error deleting missing person:", error);
        }
    });
}

function deleteReport(reportId) {
    $.ajax({
        url: "url_to_your_report_api_endpoint/" + reportId,
        type: "DELETE",
        success: function(response) {
            console.log("Report deleted successfully");
        },
        error: function(xhr, status, error) {
            console.error("Error deleting report:", error);
        }
    });
}

function deleteWantedPerson(personId) {
    $.ajax({
        url: "url_to_your_wanted_person_api_endpoint/" + personId,
        type: "DELETE",
        success: function(response) {
            console.log("Wanted person deleted successfully");
        },
        error: function(xhr, status, error) {
            console.error("Error deleting wanted person:", error);
        }
    });
}

deleteUser(110);
deleteCrime(8);
deleteMissingPerson(609);
deleteReport(210);
deleteWantedPerson(509);
