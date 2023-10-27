$(document).ready(function () {
    // Initialize datepickers
    $('.datepicker').datepicker({
        dateFormat: 'yy-mm-dd', // Set the desired date format
        minDate: 0, // Allow selecting today and future dates
        showOtherMonths: true,
        selectOtherMonths: true,
    });
});
