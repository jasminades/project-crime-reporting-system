function updateUser(userId, userData) {
    $.ajax({
        url: "url_to_your_user_api_endpoint/" + userId,
        type: "PUT",
        contentType: "application/json",
        data: JSON.stringify(userData),
        success: function(response) {
            console.log("User updated successfully:", response);
        },
        error: function(xhr, status, error) {
            console.error("Error updating user:", error);
        }
    });
}

function updateCrime(crimeId, crimeData) {
    $.ajax({
        url: "url_to_your_crime_api_endpoint/" + crimeId,
        type: "PUT",
        contentType: "application/json",
        data: JSON.stringify(crimeData),
        success: function(response) {
            console.log("Crime updated successfully:", response);
        },
        error: function(xhr, status, error) {
            console.error("Error updating crime:", error);
        }
    });
}

function updateMissingPerson(personId, personData) {
    $.ajax({
        url: "url_to_your_missing_person_api_endpoint/" + personId,
        type: "PUT",
        contentType: "application/json",
        data: JSON.stringify(personData),
        success: function(response) {
            console.log("Missing person updated successfully:", response);
        },
        error: function(xhr, status, error) {
            console.error("Error updating missing person:", error);
        }
    });
}

function updateReport(reportId, reportData) {
    $.ajax({
        url: "url_to_your_report_api_endpoint/" + reportId,
        type: "PUT",
        contentType: "application/json",
        data: JSON.stringify(reportData),
        success: function(response) {
            console.log("Report updated successfully:", response);
        },
        error: function(xhr, status, error) {
            console.error("Error updating report:", error);
        }
    });
}

function updateWantedPerson(personId, personData) {
    $.ajax({
        url: "url_to_your_wanted_person_api_endpoint/" + personId,
        type: "PUT",
        contentType: "application/json",
        data: JSON.stringify(personData),
        success: function(response) {
            console.log("Wanted person updated successfully:", response);
        },
        error: function(xhr, status, error) {
            console.error("Error updating wanted person:", error);
        }
    });
}

updateUser(110, { Name: "New Name", Surname: "New Surname" });
updateCrime(8, { Description: "Updated description" });
updateMissingPerson(609, { Description: "Updated description" });
updateReport(210, { Title: "Updated title" });
updateWantedPerson(509, { Crime: "Updated crime" });
