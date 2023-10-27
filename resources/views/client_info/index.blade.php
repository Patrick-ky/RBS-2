
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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

    .slide-up-content {
        animation: slide-up 0.5s ease-in-out;
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

    .btn-success {
        background-color: #098309;
        color: white;
        border: 2px solid #e7ece2;
    }

    .btn-success:hover {
        background-color: #0a940b;
    }

    .alert {
        padding: 10px;
        margin-bottom: 15px;
    }

    .alert-success {
        background-color: #4CAF50;
        color: white;
    }

    .alert-danger {
        background-color: #f44336;
        color: white;
    }
</style>

<body>
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
    <div class="container">
        <a href="/home" class="btn btn-success btn-sm " style="background-color: #098309; color: white; border: 2px solid #e7ece2;">Back to Home</a><br><br>
        <h2 style="color: black"><strong>Stall Holders Profile</strong></h2>
        <div class="col-md-12" style=" margin-buttom:10px;">
            <a href="{{ route('client_info.add') }}"  style=" float: right; " class=" btn btn-success mb-2"><i class="bi bi-person-plus mb-2"></i>Add</a>
        </div>

        <div class="container">
            <div class="slide-up-content">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr class="table-primary"> 
                            <th class="text-center">Stall Holder</th>
                            <th class="text-center">Stall Category</th>
                            <th class="text-center">Citations</th> <!-- Added column for citations -->
                            <th class="text-center">Stall Code</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($clientInfos as $clientInfo)
                        <tr>
                            <td>{{ $clientInfo->client->firstname }} {{ $clientInfo->client->middlename }} {{ $clientInfo->client->lastname }}</td>
                            <td>{{ $clientInfo->stallType->stall_name }}</td>
                            <td>
                                @if ($citationCounts[$clientInfo->client->firstname . ' ' . $clientInfo->client->middlename . ' ' . $clientInfo->client->lastname] > 0)
                                    {{ $citationCounts[$clientInfo->client->firstname . ' ' . $clientInfo->client->middlename . ' ' . $clientInfo->client->lastname] }}
                                @else
                                    None
                                @endif
                            </td>
                            <td>{{ $clientInfo->stallNumber->nameforstallnumber }}</td>
                            <td>
                                <a href="{{ route('client_info.violationbilling', ['id' => $clientInfo->id]) }}" class="btn btn-success"><i class="fas fa-eye"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
@endsection
