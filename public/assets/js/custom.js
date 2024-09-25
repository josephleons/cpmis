// datatable
$(document).ready(function() {
        $('#projectsTable').DataTable();
});

// print 
function printModalContent(modalId) {
        var modalContent = document.getElementById(modalId).cloneNode(true); // Clone to keep modal in DOM
        var printWindow = window.open('', '', 'height=600,width=800');
        printWindow.document.write('<html><head><title>Print Report</title>');
        // Add your CSS link here or inline styles
        printWindow.document.write('<style>');
        printWindow.document.write('body { font-family: Arial, sans-serif; }');
        printWindow.document.write('.modal-footer { display: none; }'); // Hides the modal footer in print view
        printWindow.document.write('</style>');
        printWindow.document.write('</head><body>');
        printWindow.document.write(modalContent.innerHTML);
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print();
        printWindow.onfocus=function(){ printWindow.close();} // Close the print window after printing
}