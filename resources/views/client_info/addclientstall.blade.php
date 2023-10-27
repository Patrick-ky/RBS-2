@extends('include.header')
@section('content')

<form action="{{ route('client_info.store') }}" method="POST">
    @csrf
    <div class="mb-2">
        <label for="client_id" class="form-label">Select Client</label>
        <select class="form-control" id="client_id" name="client_id" required>
            <option value="" disabled selected>Select Client</option>
            @foreach ($clients as $client)
                <option value="{{ $client->id }}">
                    {{ $client->firstname }} {{ $client->lastname }} {{ $client->middlename }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="stall_type_id" class="form-label">Stall Type</label>
        <select class="form-control" id="stall_type_id" name="stall_type_id" required>
            <option value="" disabled selected>Select Stall Type</option>
            @foreach ($stalltypes as $stalltype)
                <option value="{{ $stalltype->id }}" data-price="{{ $stalltype->price }}">
                    {{ $stalltype->stall_name }}---Monthly:(₱{{ $stalltype->price }})
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="ownerMonthly" class="form-label"> Set Monthly Rent for Stall Owner</label>
        <input type="text" class="form-control" id="ownerMonthly" name="ownerMonthly" placeholder="Insert Monthly Rent Based on Selected Stall Type" required>
    </div>

    <div class="mb-2">
        <label for="stall_number_id" class="form-label">Stall Number</label>
        <select class="form-control" id="stall_number_id" name="stall_number_id" required>
            <option value="" disabled selected>Select Stall Number</option>
        </select>
    </div>

    <div class="form-group">
        <label for="start_date" class="form-label">Start Date</label>
        <input type="date" class="form-control" id="start_date" name="start_date" required>
    </div>

    <div class="mb-2">
        <label for="due_date" class="form-label">Due Date</label>
        <input type="date" class="form-control" id="due_date" name="due_date" required>
    </div><br>

    <button type="submit" class="btn btn-primary">Add Client Info</button>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    $('#stall_type_id').on('change', function () {
        var stallTypeId = $(this).val(); // Kuhaa ang napili na stall type ID
        var $stallNumberSelect = $('#stall_number_id');

        // mangayo ug AJAX request para ma fetch ang available stall numbers
        $.ajax({
            url: '/get-available-stalls/' + stallTypeId, // Ilisan sabay sa route
            method: 'GET',
            success: function (data) {
                $stallNumberSelect.empty(); // Clear the select options
                $stallNumberSelect.append($('<option>', {value: '', text: 'Select Stall Number'}));

                $.each(data, function (key, value) {
                    $stallNumberSelect.append($('<option>', {value: key, text: value}));
                });
            },
            error: function (xhr, status, error) {
                console.error('Error fetching available stalls:', error);
            }
        });
    });
});
</script>
@endsection