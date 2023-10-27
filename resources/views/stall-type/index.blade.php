{{-- the view :
@extends('include.header')

@section('billing.record')

@if(session('success'))
<div id="successMessage" class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="container">
    <div class="container mt-5">
        <a
        href="/home"
      
        class="btn btn-success btn-oblong pulsate" 
        style="background-color: #098309; color:
                                 white; border: 2px solid 
                              #e7ece2;" >Back to Home</a><br><br>
    <div class="col-md-6">
        <h2 style="color: rgb(159, 248, 118)"><strong>Records</strong></h2>
    </div><br><br>
    <table class="table table-bordered">

        <form method="post" action="{{ route('start-scheduled-sms') }}">
            @csrf
            <button class="btn btn-success btn-oblong pulsate" style="background-color: #098309; color: white; border: 2px solid #e7ece2; float:right">
                Start Scheduled SMS
            </button>
        </form><br><br>
        
        <thead>
            <tr>
                <th class="text-center"><strong>Stall Holder Name</strong></th>
                <th class="text-center"><strong>Contact Number</strong></th>
                <th class="text-center"><strong>Stall Code</strong></th>
                <th class="text-center"><strong>Monthly Rent</strong></th>
                <th class="text-center"><strong>Violations</strong></th>
                <th class="text-center"><strong>Due Date</strong></th>
                <th class="text-center"><strong>Overall Balance</strong></th>

            </tr>
        </thead>
        <tbody>
            @php
            $currentStallOwner = null; // para makita kinsay stall holder
            $totalFee = 0;
            @endphp
            @foreach($clientinfos as $clientinfo)
                <tr>
                    <td class="text-center">{{ $clientinfo->client->firstname }} {{ $clientinfo->client->lastname }}</td>
                    <td class="text-center">{{ $clientinfo->client->clients_number}}</td>
                    <td class="text-center">{{ $clientinfo->stallNumber->nameforstallnumber }}</td>
                    <td class="text-center">{{ $clientinfo->stallType->price }}</td>
                    <td class="text-center">
                        @php
                        $violationTotal = 0;
                        @endphp
                        @if ($clientinfo->stallType->citations->isNotEmpty())
                            @foreach($clientinfo->stallType->citations as $citation)
                                @if ($citation->violation)
                                    <li>{{ $citation->violation->violation_name }} (Price:{{ $citation->violation->penalty_value }})</li>
                                @endif
                            @endforeach
                        @else
                            No Violations
                        @endif
                        @php
                        $totalFee += $clientinfo->stallType->price + $citation->violation->penalty_value;
                        @endphp
                    </td>

                   
                    <td class="text-center">
                           {{ $clientinfo->due_date }} 
                    </td>
                    <td class="text-center">
                        ₱{{ $totalFee }}
                    </td>
                </tr>
                @if ($currentStallOwner !== $clientinfo->stallNumber->nameforstallnumber)
                    @php
                    $currentStallOwner = $clientinfo->stallNumber->nameforstallnumber;
                    $totalFee = 0;
                    @endphp
                @endif
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection


the controller :
public function records()
{

    $clientinfos = ClientInfo::with(['client', 'stallType', 'stallNumber'])->get();

    foreach ($clientinfos as $clientinfo) {
        $clientinfo->load(['stallType.citations' => function ($query) use ($clientinfo) {
            $query->where('stall_number_id', $clientinfo->stallNumber->id);
        }]);
    }

    return view('billings.record', compact('clientinfos'));
}






i want to change the function except for the send sms button :


-Can you segregate the  --}}