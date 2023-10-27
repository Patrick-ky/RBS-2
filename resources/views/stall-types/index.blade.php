<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

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

    .slide-up-content {
        animation: slide-up 0.5s ease-in-out;
    }
    table {
        border: 1px solid black;
        width: 100%; /* Use full width */
        border-collapse: collapse; /* Merge adjacent borders */
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="/home"

                class="btn btn-success btn-sm btn-oblong pulsate" 
                style="background-color: #098309; color:
                                        white; border: 2px solid 
                                    #e7ece2;" >Back to Home</a>
            <h1 style="color: black"><strong>Market Stalls</strong></h1>

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
            <div class="slide-up-content">
    
            @if(count($stalltypes) > 0) <!-- Check if there are any stalltypes -->
                <table class="table table-bordered table-sm table-hover">
                    <thead class="table-light">
                        <tr class="table-primary">     
                            <th class="text-center"> Market Stall Name</th>
                            <th class="text-center">Rental Fee</th>
                            <th class="text-center">Stall Number</th> 
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($stalltypes as $stalltype)
                        <tr>
                            <td class="text-center">{{ $stalltype->stall_name }}</td>
                            <td class="text-center">₱{{ $stalltype->price }}</td>
                            <td class="text-center"> 
                                <a href="{{ route('stall-types.stallnumbers.view', ['stallType' => $stalltype->id]) }}" class="btn btn-success"><i class="fas fa-eye"></i></a>
                            </td> 
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
            <br><br>
                <p>"No Stalls Recorded"</p> 
                <br><br>
            @endif


            <br>
            @auth
            @endauth
        </div>
    </div></div></div>
</div>
@endsection
@endauth
{{-- INSERT INTO stall_types (stall_name, price)
VALUES
('Sari Sari Store', 600.00),
('Refreshment', 300.00),
('Fruits', 400.00),
('Dry Goods', 700.00),
('Green Table', 550.00),
('Vegetable', 750.00),
('Carenderia', 850.00),
('Central Peripheral', 900.00),
('Cultural Minorities', 950.00),
('Native Products', 980.00); --}}