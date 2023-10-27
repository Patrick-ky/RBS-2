@auth
@extends('include.header')
@section('content')


<div class="container">
    <div class="row justify-content-center align-items-center"> <!-- Center the form horizontally and vertically -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Edit Violation</h4>

                    <form action="{{ route('violation.update', $violation->id ) }}" method="POST" style="max-width: 500px; margin: 0 auto;">
                        @csrf
                        @method('put')

                        <div class="mb-3">
                            <label class="form-label">Violation</label>
                            <input type="text" name="violation_name" class="form-control" placeholder="Enter Violation" value="{{ $violation->violation_name }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Penalty Value</label>
                            <input type="number" name="penalty_value" class="form-control" placeholder="Enter Penalty Value" value="{{ $violation->penalty_value }}">
                        </div>
                        <div class="mb-3 text-center"> <!-- Center-align the buttons -->
                            <button type="submit" class="btn btn-primary mr-3">Save</button>
                            <span class="or-text">OR</span>
                            <button type="button" class="btn btn-secondary" onclick="window.location.href='/violations'">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@endauth
