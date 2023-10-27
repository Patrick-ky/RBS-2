<!DOCTYPE html>
<html lang="en">
<head class="wallpaper">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Rental and Billing System</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .bg{
            background-color: #098309;
        }

        .wallpaper{
            background-color: #daf3c6;
        }

        /* Pang dungag ug light green font sa navbar */
        .navbar-title {
            color: rgb(198, 235, 198);
        }
        /* Padakoon ang size sa logo */
        .navbar-logo img {
            background-color: #098309;
            width: 85px;
            height: auto;
        }
        /* bawasan height sa navbar */
        .navbar {
            background-color:color: rgb(0, 95, 0);
            min-height:  45px;

        }
        /* Style for title and subtitle */
        .navbar-content {
            background-color: #098309;
            display: flex;
            align-items: center;
        }
        .navbar-title {
            background-color: #098309;
            font-size: 20px;
            margin-right: 10px;
        }
        .navbar-subtitle {
            background-color: #098309;
            font-size: 14px;
        }
    </style>
</head>
<body class="wallpaper">
<nav class="navbar navbar-expand-lg bg">
    <div class="navbar container-fluid">
        <a class="navbar-brand" href="https://gensantos.gov.ph">
            <div class="navbar-content">
                <div class="navbar-logo">
                    <img src="{{ URL('images\logo-lgu.png') }}" alt="Logo">
                </div>
                <span class="navbar-title"><b> <strong>  LGU GENERAL SANTOS CITY |</strong></b></span>
                <span class="navbar-title">Rental and Billing with SMS Notification</span>
            </div>
        </a>
    </div>
</nav>
<div class="content wallpaper">
    @yield('login')
    @yield('registration')
</div>
</body>
</html>
