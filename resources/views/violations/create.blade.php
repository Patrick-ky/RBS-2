@auth
@extends('include.header')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h4 class="text-dark"><b>Create Violation</b></h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('violation.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="violation_name" class="form-label"><b>Violation</b></label>
                            <input type="text" name="violation_name" class="form-control" placeholder="Enter Violation">
                        </div>
                        <div class="mb-3">
                            <label for="penalty_value" class="form-label"><b>Penalty Value</b></label>
                            <input type="number" name="penalty_value" class="form-control" placeholder="Enter Penalty Value">
                        </div>
                        <div class="mb-3 text-center">  
                            <button type="submit" class="btn btn-primary mr-3">Save</button>
                            <span class="or-text">OR</span>
                            <a href="/violations" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@endauth
