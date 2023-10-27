@auth

@extends('include.header')
@section('content')
<style>
    @keyframes slide-up {
        0% {
            transform: translateY(35%);
            opacity: 0;
        }
        100% {
            transform: translateY(0);
            opacity: 1;
        }
    }

    /* Apply the animation to slide up the content */
    .slide-up-content {
        animation: slide-up 0.5s ease-in-out;
    }

    table {
        border: 1px solid black;
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        border: 1px solid black;
        padding: 2px;
        text-align: center;
    }
</style>

@if(session('success'))
<div id="successMessage" class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div id="errorMessage" class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

<div class="container ml-5">
    <a href="/clients" class="btn btn-success btn-sm" style="background-color: #048304; color: white; border: 2px solid #e7ece2;">Back</a>
</div>

<div class="container ml-5">
    <h2><strong>Edit Stall Holder's Information</strong></h2>
</div>

<div class="slide-up-content">
    <div class="container md-4">
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <form action="{{ route('updateClient', ['id' => $client->id]) }}" method="POST" class="mx-auto">
                        @csrf
                        <h4><label class="form-label text-center"><strong>Personal Information:</strong></label></h4>
                        
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="firstname" class="form-label text-dark"><strong>First Name</strong></label>
                                    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name" required value="{{ $client->firstname }}">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="middlename" class="form-label text-dark"><strong>Middle Name</strong></label>
                                    <input type="text" class="form-control" id="middlename" name="middlename" placeholder="Middle Name" required value="{{ $client->middlename }}">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="lastname" class="form-label text-dark"><strong>Last Name</strong></label>
                                    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name" required value="{{ $client->lastname }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="birthdate" class="form-label text-dark"><strong>Birthdate</strong></label>
                                    <input type="date" class="form-control" id="birthdate" name="birthdate" required value="{{ $client->birthdate }}">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="clients_number" class="form-label text-dark"><strong>Contact Number</strong></label>
                                    <input type="text" class="form-control" id="clients_number" name="clients_number" required maxlength="13" value="+63" value="{{ $client->clients_number }}">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="gender" class="form-label text-dark"><strong>Gender</strong></label>
                                    <select class="form-control" id="gender" name="gender" required>
                                        <option value="" disabled>Select Gender</option>
                                        <option value="Male" {{ $client->gender === 'Male' ? 'selected' : '' }}>Male</option>
                                        <option value="Female" {{ $client->gender === 'Female' ? 'selected' : '' }}>Female</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <label class="form-label text-capitalize"><strong>Address:</strong></label>

                        <div class="row mb-3">
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="block" class="form-label text-dark"><strong>Block</strong>(optional)</label>
                                    <select class="form-select" id="block" name="block">
                                        <option value="" disabled>Select Block</option>
                                        <!-- Option values for Block -->
                                        @for ($i = 1; $i <= 30; $i++)
                                            <option value="block {{ $i }}" {{ $client->block === 'block ' . $i ? 'selected' : '' }}>Block {{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="lot" class="form-label text-dark"><strong>Lot</strong>(optional)</label>
                                    <select class="form-select" id="lot" name="lot">
                                        <option value="" disabled>Select Lot</option>
                                        <!-- Option values for Lot -->
                                        @for ($i = 1; $i <= 49; $i++)
                                            <option value="lot {{ $i }}" {{ $client->lot === 'lot ' . $i ? 'selected' : '' }}>Lot {{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="purok" class="form-label text-dark"><strong>Purok</strong></label>
                                    <input type="text" class="form-control" id="purok" name="purok" required value="{{ $client->purok }}">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="street" class="form-label text-dark"><strong>Street</strong></label>
                                <input type="text" class="form-control" id="street" name="street" required value="{{ $client->street }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="barangay" class="form-label text-dark"><strong>Barangay</strong></label>
                                    <select class="form-select" id="barangay" name="barangay" required>
                                        <option value="" disabled>Select Barangay</option>
                                        <option value="Apopong" {{ $client->barangay === 'Apopong' ? 'selected' : '' }}>Apopong</option>
                                        <!-- Add more barangays here -->
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="city" class="form-label text-dark"><strong>City</strong></label>
                                <input type="text" class="form-control" id="city" name="city" value="General Santos City" required value="{{ $client->city }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="province" class="form-label text-dark"><strong>Province</strong></label>
                                <input type="text" class="form-control" id="province" name="province" value="South Cotabato" required value="{{ $client->province }}">
                            </div>
                        </div>

                        <div class="d-flex justify-content-center align-items-center">
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Function to fade out a message element
    function fadeOut(element, duration) {
        element.style.opacity = 1;
        (function fade() {
            if ((element.style.opacity -= 0.1) < 0) {
                element.style.display = "none";
            } else {
                requestAnimationFrame(fade);
            }
        })();
    }

    // Find success and error message elements by their IDs
    const successMessage = document.getElementById('successMessage');
    const errorMessage = document.getElementById('errorMessage');

    // Check if the messages exist and then fade them out
    if (successMessage) {
        setTimeout(function () {
            fadeOut(successMessage, 500); // 500ms (0.5 seconds) fade out duration
        }, 5000); // 5000ms (5 seconds) delay before starting the fade out
    }

    if (errorMessage) {
        setTimeout(function () {
            fadeOut(errorMessage, 500);
        }, 5000);
    }
</script>

@endsection
    
@endauth