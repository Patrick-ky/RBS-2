<div class="modal fade" id="alertModal" tabindex="-1" role="dialog" aria-labelledby="alertModalLabel" aria-hidden="true">
    <div class="modal-dialog">
            <div class="modal-body">
                <!-- Alert message content will be inserted here -->
        </div>
    </div>
</div>
@if(session('success'))
    <script>
        $(document).ready(function() {
            // Show the success modal
            $('#alertModal .modal-body').addClass('alert alert-success').text('{{ session('success') }}');
            $('#alertModal').modal('show');

            // Automatically hide the modal after 3 seconds
            setTimeout(function() {
                $('#alertModal').modal('hide');
            }, 3000); // 3000 milliseconds = 3 seconds
        });
    </script>
@endif

    <script>
        $(document).ready(function() {
            @if(session('error'))
            // Show the error modal
            $('#alertModal .modal-body').addClass('alert alert-danger').text('{{ session('error') }}');
            $('#alertModal').modal('show');

            // Automatically hide the modal after 3 seconds
            setTimeout(function() {
                $('#alertModal').modal('hide');
            }, 3000); // 3000 milliseconds = 3 seconds
            
            @endif
        });
    </script>