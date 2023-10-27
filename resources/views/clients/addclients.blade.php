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

 /* Maaply ang animation na ma slide up ang content*/
 .slide-up-content {
   animation: slide-up 0.5s ease-in-out; /* Adjust the duration and timing function as needed */
 }
   table {
       border: 1px solid black;
       width: 100%; /* Use full width */
       border-collapse: collapse; /* Merge adjacent borders */
   }

   th, td {
       border: 1px solid black;
       padding: 2px; /* Add some padding for better spacing */
       text-align: center; /* Center-align content */
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
<a
href="/clients"

class="btn btn-success btn-sm" 
style="background-color: #048304; color:
                         white; border: 2px solid 
                      #e7ece2;" >Back</a></div>
                      
<div class="container ml-5">
<h2 ><strong>Stall Holder Registration</strong></h2>
</div>
<div class="slide-up-content">
    
<div class="container md-4">
    <div class="card">
        <div class="card-body">

        
    <div class="container">
        <form action="{{ route('clientstore') }}" method="POST" class="mx-auto">
            @csrf
           <h4> <label class="form-label text-center" ><strong>Personal Information:</strong></label></h4>
            <!-- First Name -->
            <div class="row">
            <div class="row mb-3">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="firstname" class="form-label text-dark"><strong>First Name</strong></label>
                        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name" required>
                    </div>
                </div>
            

            <!-- Middle Name -->
            
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="middlename" class="form-label text-dark"><strong>Middle Name</strong></label>
                        <input type="text" class="form-control" id="middlename" name="middlename" placeholder="Middle Name" required>
                    </div>
                </div>
            

            <!-- Last Name -->
          
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="lastname" class="form-label text-dark"><strong>Last Name</strong></label>
                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name" required>
                    </div>
                </div>
            </div>

            
            <!-- Birthdate -->
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="birthdate" class="form-label text-dark"><strong>Birthdate</strong></label>
                        <input type="date" class="form-control" id="birthdate" name="birthdate" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="clients_number" class="form-label text-dark"><strong>Contact Number</strong></label>
                        <input type="text" class="form-control" id="clients_number" name="clients_number" required maxlength="13" required value="+63">
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="gender" class="form-label text-dark "><strong>Gender</strong></label>
                        <select class="form-control" id="gender" name="gender" required>
                            <option value="" disabled selected>Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                </div>
            </div>
            <!-- Address -->



    <div class="row">
        <label class="form-label text-capitalize"><strong>Address:</strong></label>
        <div class="row mb-3">
            <!-- Block -->
            <!-- Block -->
<div class="col-md-3">
    <div class="mb-3">
        <label for="block" class="form-label text-dark"><strong>Block</strong>(optional)</label>
        <select class="form-select" id="block" name="block" >
            <option value="" disabled selected>Select Block</option>
            <!-- Option values for Block -->
            @for ($i = 1; $i <= 30; $i++)
                <option value="block {{ $i }}">Block {{ $i }}</option>
            @endfor
        </select>
    </div>
</div>
<!-- Lot -->
<div class="col-md-3">
    <div class="mb-3">
        <label for="lot" class="form-label text-dark"><strong>Lot</strong>(optional)</label>
        <select class="form-select" id="lot" name="lot" >
            <option value="" disabled selected>Select Lot</option>
            <!-- Option values for Lot -->
            @for ($i = 1; $i <= 49; $i++)
                <option value="lot {{ $i }}">Lot {{ $i }}</option>
            @endfor
        </select>
    </div>
</div>

            <!-- Purok -->
            <div class="col-md-3">
                <div class="mb-3">
                    <label for="purok" class="form-label text-dark"><strong>Purok</strong></label>
                    <input type="text" class="form-control" id="purok" name="purok" required>
                </div>
            </div>
      
        <!-- Street -->
        
            <div class="col-md-3">
                <label for="street" class="form-label text-dark"><strong>Street</strong></label>
                <input type="text" class="form-control" id="street" name="street" required>
            </div>
        </div>
    </div>
        <div class="row">
            <!-- Barangay -->
            <div class="col-md-6">
                <div class="mb-3">
    <label for="barangay" class="form-label text-dark"><strong>Barangay</strong></label>
    <select class="form-select" id="barangay" name="barangay" required>
        <option value="" disabled selected>Select Barangay</option>
        <option value="Apopong">Apopong</option>
        <option value="Baluan">Baluan</option>
        <option value="Batomelong">Batomelong</option>
        <option value="Bula">Bula</option>
        <option value="Buayan">Buayan</option>
        <option value="Calumpang">Calumpang</option>
        <option value="City Heights">City Heights</option>
        <option value="Conel">Conel</option>
        <option value="Dadiangas East">Dadiangas East</option>
        <option value="Dadiangas North">Dadiangas North</option>
        <option value="Dadiangas South">Dadiangas South</option>
        <option value="Dadiangas West">Dadiangas West</option>
        <option value="Fatima">Fatima</option>
        <option value="Katangawan">Katangawan</option>
        <option value="Labangal">Labangal</option>
        <option value="Lagao">Lagao</option>
        <option value="Ligaya">Ligaya</option>
        <option value="Mabuhay">Mabuhay</option>
        <option value="Olympog">Olympog</option>
        <option value="San Isidro">San Isidro</option>
        <option value="San Jose">San Jose</option>
        <option value="Siguel">Siguel</option>
        <option value="Sinawal">Sinawal</option>
        <option value="Tambler">Tambler</option>
        <option value="Tinagacan">Tinagacan</option>
        <option value="Upper Labay">Upper Labay</option>
    </select>
</div>
</div>
            <!-- City -->
            <div class="col-md-6">
                <label for="city" class="form-label text-dark"><strong>City</strong></label>
                <input type="text" class="form-control" id="city" name="city" value="General Santos City" required>
            </div>
        </div>
        <!-- Province -->
        <div class="row">
            <div class="col-md-6">
                <label for="province" class="form-label text-dark"><strong>Province</strong></label>
                <input type="text" class="form-control" id="province" name="province" value="South Cotabato" required>
            </div>
        </div>
    </div>





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


