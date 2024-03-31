function createAttachment(attachmentData) {
    $.ajax({
        url: "url_to_your_attachment_api_endpoint",
        type: "POST",
        contentType: "application/json",
        data: JSON.stringify(attachmentData),
        success: function(response) {
            console.log("Attachment created successfully:", response);
        },
        error: function(xhr, status, error) {
            console.error("Error creating attachment:", error);
        }
    });
}

function createCrime(crimeData) {
    $.ajax({
        url: "url_to_your_crime_api_endpoint",
        type: "POST",
        contentType: "application/json",
        data: JSON.stringify(crimeData),
        success: function(response) {
            console.log("Crime created successfully:", response);
        },
        error: function(xhr, status, error) {
            console.error("Error creating crime:", error);
        }
    });
}

function createMissingPerson(missingPersonData) {
    $.ajax({
        url: "url_to_your_missing_person_api_endpoint",
        type: "POST",
        contentType: "application/json",
        data: JSON.stringify(missingPersonData),
        success: function(response) {
            console.log("Missing person created successfully:", response);
        },
        error: function(xhr, status, error) {
            console.error("Error creating missing person:", error);
        }
    });
}

function createReport(reportData) {
    $.ajax({
        url: "url_to_your_report_api_endpoint",
        type: "POST",
        contentType: "application/json",
        data: JSON.stringify(reportData),
        success: function(response) {
            console.log("Report created successfully:", response);
        },
        error: function(xhr, status, error) {
            console.error("Error creating report:", error);
        }
    });
}

function createUser(userData) {
    $.ajax({
        url: "url_to_your_user_api_endpoint",
        type: "POST",
        contentType: "application/json",
        data: JSON.stringify(userData),
        success: function(response) {
            console.log("User created successfully:", response);
        },
        error: function(xhr, status, error) {
            console.error("Error creating user:", error);
        }
    });
}

function createWantedPerson(wantedPersonData) {
    $.ajax({
        url: "url_to_your_wanted_person_api_endpoint",
        type: "POST",
        contentType: "application/json",
        data: JSON.stringify(wantedPersonData),
        success: function(response) {
            console.log("Wanted person created successfully:", response);
            
        },
        error: function(xhr, status, error) {
            console.error("Error creating wanted person:", error);
        }
    });
}

