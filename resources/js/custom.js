// public/js/custom.js (or your preferred location for JavaScript files)

$(document).ready(function () {
    $('#stalltype_id').on('change', function () {
        var selectedStallTypeId = $(this).val();
        var stallNumberSelect = $('#stall_number');

        // Make an AJAX request to get stall numbers for the selected stall type
        $.ajax({
            type: 'GET',
            url: '{{ route("getStallNumbers") }}',
            data: { stall_type_id: selectedStallTypeId },
            dataType: 'json',
            success: function (data) {
                // Clear the existing options
                stallNumberSelect.empty();

                // Add the new options based on the AJAX response
                $.each(data, function (index, stallNumber) {
                    stallNumberSelect.append($('<option>', {
                        value: stallNumber.id,
                        text: stallNumber.stall_number
                    }));
                });
            }
        });
    });
});


