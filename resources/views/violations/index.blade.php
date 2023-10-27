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
 /* Maaply ang animation na ma slide up ang content */
 .slide-up-content {
   animation: slide-up 0.5s ease-in-out; /* Adjust the duration and timing function as needed */
 }
   table {
       border: 1px solid black;
       width: 100%; /* Use full width */
       border-collapse: collapse; /* isagol ang adjacent borders */
   }

   th, td {
       border: 1px solid black;
       padding: 8px; /* Dungag og padding para sa spacing */
       text-align: center; /* Center-align content */
   }
</style>
<div class="slide-up-content">
<div class="container col-md-12">
    <a
    href="/home"
  
    class="btn btn-success btn-sm btn-oblong pulsate" 
    style="background-color: #098309; color:
                             white; border: 2px solid 
                          #e7ece2;" >Back to Home</a><br><br>
    <div class="row">
        <div class="col-md-12">
            <h2><strong>Violations</strong></h2>

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
            <table class="table table-bordered table-sm table-hover">
                <thead>
                    <tr class="table-primary"> 
                        <th class="text-center">Violation Name</th>
                        <th class="text-center">Penalty</th>
                      
                    </tr>
                </thead>
                <tbody>
                    @foreach($violations as $violation)
                    <tr>
                        <td class="text-center">{{ $violation->violation_name }}</td>
                        <td class="text-center">₱{{ $violation->penalty_value }}</td>
    
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <br>

        </div>
    </div>
</div>
@endsection
@endauth

{{-- INSERT INTO violations(violation_name,penalty_value)
    VALUES
('No Bussiness Permit', 600),
('No Market Clearance', 300),
('Illegal Display', 300) --}}

