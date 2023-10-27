@extends('include.header')

@section('content')
<div class="container">
    <a href="/client_info"

class="btn btn-success btn-oblong pulsate" 
style="background-color: #098309; color:
                    white; border: 2px solid 
                #e7ece2;" >Back to Home</a><br><br>
<div class="container">
    <h3 style="color: rgb(192, 247, 167)"><strong>Citations under Stall: {{ $stall->nameforstallnumber }}</strong></h3>
    <div class="row">
        <div class="col-md-6">
            
        </div>
    </div>
    <div class="text-center">
        <a class="btn btn-danger float-right" href="{{ route('client_info.report_citation_form', ['client_id' => $clientInfo->id, 'stall_number_id' => $stall->id]) }}" type="button" class="btn btn-danger">ADD CITATION</a>
    </div>


   
    <table class="table table-bordered table-sm">
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
            <tr>
                
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








<script src="{{ asset('js/script.js') }}"></script>
@endsection