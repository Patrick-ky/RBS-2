<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.4.2-web/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('sb-admin-2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        .container {
            text-align: center;
        }

        .form-group {
            display: inline-block;
            text-align: left;
            margin-right: 20px; /* Add some spacing between the two input fields */
        }

        .form-label {
            display: block;
            margin-bottom: 5px;
        }

        .form-control {
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
    

    <link href="{{ asset('css/your-custom-styles.css') }}" rel="stylesheet">
</head>

<body>
    <div class="content">

        @yield('stall-number.index')
        @yield('stall-number.create')
        @yield('clients.addclients')
        @yield('clients.edit')

    </div>

    <!-- Bootstrap core JavaScript-->


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!-- Include your custom scripts here -->
    <script src="{{ asset('js/datepicker.js') }}"></script>

</body>

</html>
