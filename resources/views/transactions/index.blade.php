@extends('include.header')

@include('include.header')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h1 class="text-center">Client Records</h1>

                    <div class="text-center"> <!-- Center-align the form -->
                        <form action="" method="POST" style="max-width: 500px; margin: 0 auto;">
                            @csrf
                            @method('post')

                            <!-- Display client information in the description -->
                            @if(session('client_data'))
                            <div class="mb-3">
                                <div class="transaction-description">
                                    Client {{ session('client_data')['firstname'] }} successfully added to own {{ session('client_data')['stalltype_name'] }} with a monthly payment of {{ session('client_data')['amount'] }} on stall number {{ session('client_data')['stall_number'] }}
                                </div>
                            </div>
                            @endif

                            <!-- Add your transaction form fields here (if needed) -->

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
