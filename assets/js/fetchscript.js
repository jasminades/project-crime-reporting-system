getWanted = () => {
  $.get("assets/json/wanted.json", (data) => {
    let output = "";
    data.forEach((person) => {
      output += `
        <div class="row">
          <div class="col-md-8">
            <!-- Wanted Person -->
            <div class="card mb-4">
              <div class="card-body">
                <h5 class="card-title">${person.Name} ${person.Surname}</h5>
                <p class="card-text">Criminal ID: ${person['Criminal ID']}</p>
                <p class="card-text">Crime: ${person.Crime}</p>
                <p class="card-text">Date Reported: ${person['Date Reported']}</p>
                <p class="card-text">Last Seen: ${person['Last Seen']}</p>
              </div>
            </div>
          </div>
        </div>
      `;
    });
    $("#wanted-container").html(output);
  });
};




getUsers = () => {
  $.get("users.json", (data) => {
    let output = "";
    data.forEach((user) => {
      output += `
        <div class="row">
          <div class="col-md-8">
            <!-- User -->
            <div class="card mb-4">
              <div class="card-body">
                <h5 class="card-title">${user.Name} ${user.Surname}</h5>
                <p class="card-text">User ID: ${user["User ID"]}</p>
                <p class="card-text">Username: ${user.Username}</p>
                <p class="card-text">Email: ${user.Email}</p>
              </div>
            </div>
          </div>
        </div>
      `;
    });
    $("#users-container").html(output);
  });
};



getReports = () => {
  $.get("assets/json/reports.json", (data) => {
    let output = "";
    data.forEach((report) => {
      output += `
        <div class="row">
          <div class="col-md-8">
            <!-- Report -->
            <div class="card mb-4">
              <div class="card-body">
                <h5 class="card-title">${report.Title}</h5>
                <p class="card-text">Report ID: ${report["Report ID"]}</p>
                <p class="card-text">User ID: ${report["User ID"]}</p>
                <p class="card-text">Description: ${report.Description}</p>
                <p class="card-text">Date: ${report.Date}</p>
              </div>
            </div>
          </div>
        </div>
      `;
    });
    $("#reports-container").html(output);
  });
};






getCrimes = () => {
  $.get("assets/json/crimes.json", (data) => {
    let output = "";
    data.forEach((crime) => {
      output += `
        <div class="row">
          <div class="col-md-8">
            <!-- Crime -->
            <div class="card mb-4">
              <div class="card-body">
                <h5 class="card-title">${crime.Title}</h5>
                <p class="card-text">Crime ID: ${crime["Crime ID"]}</p>
                <p class="card-text">User ID: ${crime["User ID"]}</p>
                <p class="card-text">Description: ${crime.Description}</p>
                <p class="card-text">Location: ${crime.Location}</p>
                <p class="card-text">Date: ${crime.Date}</p>
              </div>
            </div>
          </div>
        </div>
      `;
    });
    $("#crimes-container").html(output);
  });
};




getAttachments = () => {
  $.get("attachments.json", (data) => {
    let output = "";
    data.forEach((attachment) => {
      output += `
        <div class="row">
          <div class="col-md-8">
            <!-- Attachment -->
            <div class="card mb-4">
              <div class="card-body">
                <p class="card-text">Attachment ID: ${attachment["Attachment ID"]}</p>
                <p class="card-text">Crime ID: ${attachment["Crime ID"]}</p>
                <p class="card-text">Report ID: ${attachment["Report ID"]}</p>
                <p class="card-text">User ID: ${attachment["User ID"]}</p>
              </div>
            </div>
          </div>
        </div>
      `;
    });
    $("#attachments-container").html(output);
  });
};




getMissingPersons = () => {
  $.get("assets/json/missing.json", (data) => {
    let output = "";
    data.forEach((person) => {
      output += `
        <div class="row">
          <div class="col-md-8">
            <!-- Missing Person -->
            <div class="card mb-4">
              <div class="card-body">
                <h5 class="card-title">${person["Missing Person Name"]} ${person["Missing Person Surname"]}</h5>
                <p class="card-text">Missing Person ID: ${person["Missing Person ID"]}</p>
                <p class="card-text">Date of Disappearance: ${person["Date of disappearance"]}</p>
                <p class="card-text">Description: ${person["Description"]}</p>
                <p class="card-text">Date Reported: ${person["Date Reported"]}</p>
              </div>
            </div>
          </div>
        </div>
      `;
    });
    $("#missing-container").html(output);
  });
};
