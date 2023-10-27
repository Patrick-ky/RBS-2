<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

@extends('include.header')
@include('include.session')
{{-- @section('title', 'Clients') --}}
@section('content')
@auth
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

    .slide-up-content {
        animation: slide-up 0.5s ease-in-out;
    }
    table {
        border: 1px solid black;
        width: 100%;
        margin: 0 auto; /* Mabutan sa tunga ang table */
    }

    th, td {
        border: 1px solid black;
        padding: 10px; /* I adjust ang padding para sa spacing */
        text-align: center;
    }

    th {
        background-color: #333;
        color: white;
        font-size: 14px; /* dagko na font para sa header*/
    }

    .actions-header {
        width: 160px; /*ma dagko ang width para sa action na header*/
    }

    .action-buttons {
        display: flex;
        justify-content: space-between;
    }

    .action-buttons a {
        display: inline-block; /* Masure na ang mga button kay nagtapad */
        margin-right: 10px; /* Adjust ang margin para sa spacing */
    }
    
</style>
<div >
    <div class="slide-up-content">
        <div class="container" style="width: 100%;">
        <a
        href="/home"
      
        class="btn btn-success btn-sm btn-oblong pulsate mt-2" 
        style="background-color: #098309; color:
                                 white; border: 2px solid 
                              #e7ece2;" >Back to Home</a><br><br>
      <div class="row">
          <body>
              <div class="row">
                <div class="col-md-6">
                    <h2 style="color: black"><strong>Stall Holder Profile</strong></h2>
                </div>
                <div class="col-md-12" style=" margin-buttom:10px;">
                    <a href="{{ route('clients.addclients') }}"  style="background-color: #098309; color:
                    white; border: 2px solid 
                 #e7ece2;
                 float:right" class=" btn btn-success mb-2"><i class="bi bi-person-plus mb-2"></i>Add</a>
                </div>
                {{-- <div class="col-md-6 text-md-right">
                    <a
                            href="{{ route('clients.addclients') }}"
                          
                            class="btn btn-success btn-sm btn-oblong pulsate" 
                            style="background-color: #098309; color:
                                                     white; border: 2px solid 
                                                  #e7ece2;
                                                  float:right" >Add</a>
                </div> --}}
            </div>
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
              
              @if(count($clients) > 0) <!-- Macheck ig naay mga clients -->
                  <table class="table table-bordered table-sm table-hover">
                    <thead class="table-light">
                        <tr class="table-primary">
                            <th class="text-center">Full Name</th>
                            <th class="text-center">Birthdate</th>
                            <th class="text-center">Age</th>
                            <th class="text-center">Gender</th>
                            <th class="text-center">Contact Number</th>
                            
                            <th class="text-center">Address</th>
                            <th class="text-center">City</th>
                            <th class="text-center actions-header">Actions</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($clients as $client)
                            <tr>
                                <td>{{ $client->firstname }} {{ $client->middlename }} {{ $client->lastname }}</td>
                                <td>{{ $client->birthdate }}</td>
                                <td>{{ $client->age }}</td>     
                                <td>{{ $client->gender }}</td>
                                <td>{{ $client->clients_number }}</td>
                               
                                <td>{{ $client->purok}} {{ $client->street }} {{ $client->barangay }}</td>
                                <td>{{ $client->city }} of {{ $client->province }}</td>
                               
                                <td class="actions-header">
                                    <div >
                                        <a href="{{ route('clients.editclient', ['id' => $client->id]) }}" class="btn btn-success" data-toggle="modal" data-target="#editModal">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        {{-- deletefunctionlangsuah --}}
                                        <form action="{{ route('deleteClient', ['id' => $client->id]) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this?')"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>              
                  </table>
              @else
                  <p>No Stall holders recorded</p> <!-- Ipakita ni kung walay clients nga n -->
              @endif
              
              <br><br>
              <br>
          </body>
          <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="addModalLabel">Stall Owner Registration</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="addModalContent">
                    </div>
                </div>
            </div>
        </div>
          <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="editModalLabel">Edit Stall Owner Information</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="editModalContent">
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('js/script.js') }}"></script>
          </html>
    
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

@endauth
@endsection
