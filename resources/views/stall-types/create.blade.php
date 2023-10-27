@extends('include.header')
@section('content')

@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Create Market Stall Type</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('stall-types.store') }}" method="POST" >
                        @csrf
                        <div class="mb-3">
                            <label for="stall_name" class="form-label">Market Stall Name</label>
                            <input type="text" class="form-control" id="stall_name" name="stall_name" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" class="form-control" id="price" name="price" required>
                        </div>
                        
                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-primary mr-2">Create</button>
                            <span class="or-text">OR</span>
                            <button type="button" class="btn btn-secondary" onclick="window.location.href='/stall-types'">Cancel</button>
                        </div>

                <style>

.or-text {
    display: inline-block;
    margin: 0 1%; /* Adjust the margin as needed */
    
}
                    </style>
                        

                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
