// Import the report service class
const ReportService = require('./rest/services/reportService.class');

// Initialize the report service
const reportService = new ReportService();

// Function to add a report
function addReport(reportData) {
    reportService.add_report(reportData);
}

// Function to get all reports
function getAllReports() {
    return reportService.get_all_reports();
}

// Function to delete a report by ID
function deleteReportById(id) {
    if (!id) {
        throw new Error('ID is missing');
    }
    return reportService.delete_report(id);
}

// Export functions
module.exports = {
    addReport,
    getAllReports,
    deleteReportById
};
