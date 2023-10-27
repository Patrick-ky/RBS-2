@extends('include.header')

@section('content')

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
        width: 120%;
        border-collapse: collapse;
    }

    table {
        border: 1px solid black;
        width: 120%;
        border-collapse: collapse;
    }

    th, td {
        border: 1px solid black;
        padding: 100px;
        text-align: center;
    }

    th {
        background-color: #333;
        color: white;
        font-size: 14px;
    }


</style>

<div class="container">
    <a href="/client_info"

    class="btn btn-success btn-sm btn-oblong pulsate" 
    style="background-color: #098309; color:
                            white; border: 2px solid 
                        #e7ece2;" >Back</a><br><br>
    <div class="row">
        <div class="col-md-12">
            <h2 style="color: black"><strong>Stall Owner Information:</strong></h2>
            <p><strong>Name:</strong> {{ $clientInfo->client->firstname }} {{ $clientInfo->client->middlename }} {{ $clientInfo->client->lastname }}</p>
            <p><strong>Contact Number:</strong> {{ $clientInfo->client->clients_number }}</p>
            <p><strong>Address:</strong> {{ $clientInfo->client->province }}, {{ $clientInfo->client->city }}
                on {{ $clientInfo->client->barangay }}, {{ $clientInfo->client->street }} of  {{ $clientInfo->client->purok }}</p>
        </div>
    </div>
</div>
<div class="slide-up-content">

<div class="container">
    <div class="col-md-12">
        <h2 style="color: black"><strong>Stall Owned:</strong></h2>
        <div>
            <table class="table table-bordered table-sm">
                <thead>
                    <tr class="table-primary"> 
                        <th class="text-center"><strong>Stall Number</strong></th>
                        <th class="text-center"><strong>Stall Category</strong></th>
                        <th class="text-center"><strong>Stall Code</strong></th>
                        <th class="text-center"><strong>Description</strong></th>
                        <th class="text-center"><strong>Rental Fee</strong></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientInfos as $client)
                        <tr>
                            <td>{{ $client->stallNumber->stall_number }}</td>
                            <td>{{ $client->stalltype->stall_name }}</td>
                            <td>{{ $client->stallNumber->nameforstallnumber }}</td>
                            <td>{{ $client->stallNumber->description }}</td>
                            <td>{{ $client->stalltype->price }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>
</div>
<div class="slide-up-content">
<div class="container">
    <h3 style="color: black"><strong>Citations under Stall: {{ $stall->nameforstallnumber }}</strong></h3>
    <div class="row">
        <div class="col-md-6">
        </div>
    </div>
    {{-- Add citation button or form --}}
    <div class="text-center">
        <a style="float: right" href="{{ route('client_info.report_citation_form', ['client_id' => $clientInfo->id, 'stall_number_id' => $stall->id]) }}" type="button" class="btn btn-danger  btn-sm mb-2">ADD CITATION</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr class="table-primary"> 
                <th class="text-center"><strong>Violation Name</strong></th>
                <th class="text-center"><strong>Penalty Price</strong></th>
                <th class="text-center"><strong>Date Acquired</strong></th>
            </tr>
        </thead>
        <tbody>
            @php
            $totalBalance = 0; // Initialize the total balance variable
            @endphp
            @foreach($citations as $citation)
            <tr class="table-primary"> 
                    <td>{{ $citation->violation->violation_name }}</td>
                    <td>₱ {{ $citation->violation->penalty_value }}</td>
                    <td>{{ \Carbon\Carbon::parse($citation->start_date)->format('F j, Y') }}</td>
                </tr>
                @php
                $totalBalance += $citation->violation->penalty_value; 
                @endphp
            @endforeach
            <tr class="borderless">
                <td><b>TOTAL:</b></td>
                <td>₱ {{$totalBalance}}.00</td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>

@endsection
