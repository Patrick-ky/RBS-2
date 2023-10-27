@extends('include.header')

@section('content')
<style>
    .button-container {
        text-align: center;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('client_info.store') }}" method="POST">
        @csrf
        <div class="mb-2">
            <label for="client_id" class="form-label">Select Stall Holder</label>
            <select class="form-control" id="client_id" name="client_id" required>
                <option value="" disabled selected>Select Holder</option>
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
    
        <div class="button-container d-flex justify-content-center">
            <button type="submit" class="btn btn-primary" style="margin-right: 10px;">Save</button>
            <a href="/client_info" class="btn btn-danger">Cancel</a>
        </div>
        
    </form>
   
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    $('#stall_type_id').on('change', function () {
        var stallTypeId = $(this).val(); // Kuhaa ang napili na stall type ID
        var $stallNumberSelect = $('#stall_number_id');

        // hatag AJAX request pang fetch available stall numbers
        $.ajax({
            url: '/get-available-stalls/' + stallTypeId, 
            method: 'GET',
            success: function (data) {
                $stallNumberSelect.empty(); 
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

