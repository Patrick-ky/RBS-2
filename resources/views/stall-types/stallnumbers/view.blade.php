<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

@extends('include.header')
@section('content')

<style>
    table {
        border: 1px solid black;
        width: 100%; /* Use full width */
        border-collapse: collapse; /* Merge adjacent borders */
    }

    th, td {
        border: 1px solid black;
        padding: 8px; /* Add some padding for better spacing */
        text-align: center; /* Center-align content */
    }
</style>

<div class="container">
    <a href="/stall-types"

    class="btn btn-success btn-sm btn-oblong pulsate" 
    style="background-color: #098309; color:
                            white; border: 2px solid 
                        #e7ece2;" >Back</a><br><br>
    <div class="row">
        <div class="col-md-12">
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

            <h2><strong>Stalls on : {{ $stallType->stall_name }}</h2>

            @if(count($stallNumbers) > 0) <!-- Check if there are any stall numbers -->
                <table id="stallNumbersTable" class="table table-bordered table-sm table-hover">
                    <thead class="table-light">
                        <tr class="table-primary"> 
                            <th class="text-center"><strong>Stall Number</strong></th>
                            <th class="text-center"><strong>Stall Code</strong></th>
                            <th class="text-center"><strong>Description</strong></th> <!-- Added this line -->
                            <th class="text-center"><strong>Status</strong></th>
        
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($stallNumbers as $stallNumber)
                        <tr>
                            <td>{{$stallNumber->stall_number}}</td>
                            <td>{{ $stallNumber->nameforstallnumber }}</td>
                            <td>{{ $stallNumber->description }}</td> <!-- Added this line -->
                            <td>{{ $stallNumber->status }}</td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
            <br><br>
                <p>"No Stall Numbers Recorded"</p> <!-- Display this message when no stall numbers are available -->
            <br><br>
            @endif

            <!-- Add the "Add Stall Number" button outside the foreach loop -->

            <!-- Add the "Back" button that redirects to the previous page -->
            
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




            </div>
        </div>
    </div>
</div>
@endsection


    