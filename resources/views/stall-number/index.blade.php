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
        animation: slide-up 0.5s ease-in-out; /* Adjust the duration and timing function as needed */
    }
    
    table {
        border: 1px solid black;
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        border: 1px solid black;
        padding: 8px;
        text-align: center;
    }

    .pagination a.active {
        background-color: #4CAF50;
        color: white;
    }

    .pagination a:hover:not(.active) {
        background-color: #ddd;
    }
</style>

<div class="container">
    <a href="/home" class="btn btn-success btn-sm btn-oblong pulsate" style="background-color: #098309; color: white; border: 2px solid #e7ece2;">Back to Home</a>
    <div class="row">
        <div class="flex justify-between"">
            <h1 style="color: black"><strong>Stalls</strong></h1>
            <div class="slide-up-content">
               
                            <p style="color: black"><strong>Available Stalls:</strong> {{ $availableStallsCount }}</p>
                            <p style="color: black"><strong>Occupied Stalls:</strong> {{ $occupiedStallsCount }}</p>
                        
                    
                </div>
                

                <table class="table table-bordered table-sm table-hover">
                    <thead>
                        <tr class="table-success"> 
                            <th>Stall Number</th>
                            <th>Stall Code</th>
                            <th>Description</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($stallNumbers as $stallNumber)
                            <tr>
                                <td>{{ $stallNumber->stall_number }}</td>
                                <td>{{ $stallNumber->nameforstallnumber }}</td>
                                <td>{{ $stallNumber->description }}</td>
                                <td>{{ $stallNumber->status }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pagination">
                {{ $stallNumbers->links() }}
            </div>            
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#stallNumbersTable').DataTable({
            "paging": true, // Enable pagination
            "pageLength": 10, // Set the number of entries per page
            "lengthChange": false, // Disable changing the number of entries per page
        });
    });
    </script>
@endsection
