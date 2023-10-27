@extends('include.header')
@section('content')
<link rel="stylesheet" type="text/css" href="your-styles.css" media="print">

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
   animation: slide-up 0.5s ease-in-out; /* Adjust the duration and timing function as needed */
 }


 @media print {
    #printButton, #searchInput {
        display: none !important;
    }
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

</style>


@if(session('success'))
<div id="successMessage" class="alert alert-success">
    {{ session('success') }}
</div>
@endif

    <div class="container">
        <div class="container mt-5">
            <div class="col-md-6">
                <div id="printButtonsContainer">
                <a id="printButton" href="/home" class="btn btn-success btn-sm btn-oblong pulsate mb-2"  style="background-color: #098309; color: rgb(255, 255, 255); border: 2px solid #ffffff;">Back to Home</a></div>
            </div>
            <h3 ><strong>Records</strong></h3>
            <!-- Add a search bar -->
            <input type="text" id="searchInput" placeholder="Search">
            <div class="slide-up-content">
            <table class="table table-bordered table-hover ">
                <button id="printButton" class="btn btn-success mb-2 mr-2 mt-2 ml-auto" onclick="printReport()"><i class="bi bi-printer"></i>Print</button>
                <div id="printButtonsContainer">
                <form method="post" action="{{ route('start-scheduled-sms') }}">
                    @csrf
                    <button id="printButton" class="btn btn-success btn-sm btn-oblong pulsate mb-2" style="background-color: #098309; color: rgb(255, 255, 255); border: 2px solid #ffffff; float:right">
                        <i class="bi bi-envelope"></i>  Start Scheduled SMS
                    </button>
                </form></div>
    
                <thead class="table-light">
                    <tr class="table-primary"> 
                        <th>Stall Holder Name</th>
                        <th>Contact Number</th>
                        <th>Stall Code</th>
                        <th>Rental fee</th>
                        <th>Violations</th>
                        <th>Due Date</th>
                        <th style="text-center"> Total</th>
                        {{-- <th>Action</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @php
                    $currentStallOwner = null; // para makita kinsay stall holder
                    $totalFees = []; // Store total fees for each stall holder
                    @endphp
                    @foreach($clientinfos as $clientinfo)
                        <tr>
                            <td>{{ $clientinfo->client->firstname }} {{ $clientinfo->client->lastname }}</td>
                            <td>{{ $clientinfo->client->clients_number }}</td>
                            <td>{{ $clientinfo->stallNumber->nameforstallnumber }}</td>
                            <td>₱{{ $clientinfo->stallType->price }}</td>
                            <td>
                                @php
                                $violationTotal = 0;
                                $violationsList = [];
                                @endphp
                                @if ($clientinfo->stallType->citations->isNotEmpty())
                                    @foreach($clientinfo->stallType->citations as $citation)
                                        @if ($citation->violation)
                                            <li>{{ $citation->violation->violation_name }} (Price:{{ $citation->violation->penalty_value }})</li>
                                            @php
                                            $violationTotal += $citation->violation->penalty_value;
                                            $violationsList[] = $citation->violation->penalty_value;
                                            @endphp
                                        @endif
                                    @endforeach
                                @else
                                    No Violations
                                @endif
                                @php
                                $totalFee = $clientinfo->stallType->price + $violationTotal;
                                @endphp
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($clientinfo->start_date)->format('m/d/Y') }} - {{ \Carbon\Carbon::parse($clientinfo->due_date)->format('m/d/Y') }}
                            </td>
                            <td>
                                ₱{{ $totalFee }}
                            </td>
                            {{-- <td>
    
                                <button id="printButton" class="btn btn-success btn-sm mb-2 mr-2 mt-2 ml-auto" onclick="printReport()">Print Records</button>   
                            </td> --}}
                        </tr>
                        @if ($currentStallOwner !== $clientinfo->stallNumber->nameforstallnumber)
                            @php
                            $currentStallOwner = $clientinfo->stallNumber->nameforstallnumber;
                            // Store the total fee for the current stall holder
                            $totalFees[$currentStallOwner] = $totalFee;
                            @endphp
                        @endif
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>


<script>
    $(document).ready(function () {
        $("#searchInput").on("input", function () {
            var searchValue = $(this).val().toLowerCase();
            $("tbody tr").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(searchValue) > -1);
            });
        });
    });

  
        function printReport() {

            document.getElementById('printButton').style.display = 'none';

      
            window.print();

            document.getElementById('printButton').style.display = 'block';
        }
                $(document).ready(function () {
            var table = $('#billingTable').DataTable({  
                "pagingType": "full_numbers",
                "lengthMenu": [10, 25, 50, 100],
                "language": {
                    "lengthMenu": "Show MENU entries",
                    "info": "Showing START to END of TOTAL entries",
                },
                "order": [],
            });

            $('#billingTable_length select').change(function () { 
                table.page.len($(this).val()).draw();
            });
        });



   
</script>
@endsection