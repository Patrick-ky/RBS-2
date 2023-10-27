@extends('include.header')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1 class="text-center">Add Lot Number for: {{ $stallType->stall_name }}</h1>
                </div>
                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif

                    {{-- Display a form to add a new lot number here --}}
                    <form method="POST" action="{{ route('stall-types.stallnumbers.store') }}">
                        @csrf
                        <input type="hidden" name="stall_type_id" value="{{ $stallType->id }}">
                        <div class="mb-3">
                            <label for="stall_number">Stall Number:</label>
                            <input type="text" name="stall_number" id="stall_number" required>
                        </div>
                        <div class="mb-3">
                            <label for="nameforstallnumber">Name for Stall Number:</label>
                            <input type="text" name="nameforstallnumber" id="nameforstallnumber" required>
                        </div>
                        <div class="mb-3">
                            <label for="description">Description:</label>
                            <input type="text" name="description" id="description" required>
                        </div>  
                        <div class="d-flex justify-content-between align-items-center">
                            <button type="submit" class="btn btn-primary">Add</button>
                            <a href="{{ route('stall-types.stallnumbers.view', $stallType->id) }}" class="btn btn-secondary">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
