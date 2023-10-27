@extends('include.header')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" >



<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Stall Type</h4>
                </div>

                <div class="card-body">
                    {{-- Display a form to edit the stall type here --}}
                    <form method="POST" action="{{ route('stall-types.update', $stalltype->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="stall_name">Stall Name</label>
                            <input type="text" class="form-control" name="stall_name" id="stall_name" value="{{ $stalltype->stall_name }}" required>
                        </div>

                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" class="form-control" name="price" id="price" value="{{ $stalltype->price }}" required>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary ">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
