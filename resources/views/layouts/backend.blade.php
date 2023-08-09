<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Income Expense Tracker - @yield('title')</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <style>
        * {
            padding: 0;
            margin: 0;
        }

        .sideBar {
            width: 15%;
            min-height: 100vh;
        }

        .main-content {
            width: 85%;
        }

        .navbar .navbar-brand {
            font-size: 20px;
            font-weight: 700;
        }

        .navbar-nav .nav-item .nav-link {
            font-size: 16px;
            font-weight: 600;
        }

        .nav .nav-item .nav-link {
            color: white;
            font-size: 15px;
            font-weight: 600;
        }

        .nav .nav-item .nav-link.active {
            background-color: green;
            color: white;
        }

        @media only screen and (max-width: 992px) {
            .sideBar {
                width: 0;
                min-height: 0;
            }

            .main-content {
                width: 100%;
            }
        }
        @media only screen and (max-width: 768px) {
            .sideBar {
                width: 100%;
                min-height: auto;
            }

            .main-content {
                width: 100%;
            }
        }

        .main-content h2 {
            font-size: 35px;
            font-weight: 700;
        }

        .main-content h4 span {
            font-size: 25px;
            font-weight: 700;
        }

        .main-content h4 span span {
            font-size: 20px;
            font-weight: 700;
        }

        .modal-dialog .modal-content .modal-header h1 span {
            font-size: 20px;
            font-weight: 700;
        }

        .modal-dialog .modal-content .modal-header button i {
            font-size: 20px;
            font-weight: 700;
        }

        .expense_pagination .pagination {
            --bs-pagination-color: crimson;
            --bs-pagination-hover-color: var(--bs-link-hover-color);
            --bs-pagination-active-color: #fff;
            --bs-pagination-active-bg: crimson;
            --bs-pagination-active-border-color: crimson;
            --bs-pagination-disabled-color: gray;
        }
        .income_pagination .pagination {
            --bs-pagination-color: rgb(51, 204, 255);
            --bs-pagination-hover-color: var(--bs-link-hover-color);
            --bs-pagination-active-color: #fff;
            --bs-pagination-active-bg: rgb(51, 204, 255);
            --bs-pagination-active-border-color: rgb(51, 204, 255);
            --bs-pagination-disabled-color: gray;
        }
        .dashboard .icon img {
            width: 80px;
        }
        .dashboard .icon i {
            font-size: 40px;
        }
    </style>
</head>

<body>
    @include('partials.navbar')
    <main class="d-md-flex">
        <div class="sideBar bg-info d-lg-block d-none">
            @include('partials.sidebar')
        </div>
        <div class="main-content">
            @yield('content')
        </div>
    </main>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
