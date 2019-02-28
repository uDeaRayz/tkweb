<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>@yield('title')</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/alarm-clock.png') }}" />

    <link href="https://fonts.googleapis.com/css?family=Athiti" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('css/sidebar.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <style>
        html,
        body {
            font-family: 'Athiti', sans-serif;
            background-color: white;
        }
    </style>
</head>

<body>

    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <a href="{{ url('/home') }}" class=" btn article"
                    style="width:200px; font-size:20px; font-weight:700;">Dash board</a>
            </div>

            <ul class="list-unstyled components">
                <li class="li">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fas fa-users"></i> บุคลากร
                    </a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li class="ul">
                            <a href="{{ url('/admin') }}">ผู้ดูแลระบบ</a>
                        </li>
                        <li class="ul">
                            <a href="{{ url('/staff') }}">พนักงาน</a>
                        </li>
                        <li class="ul">
                            <a href="{{ url('/trainee') }}">นักศึกษาฝึกงาน</a>
                        </li>
                        <li class="ul">
                            <a href="{{ url('/position') }}">ตำแหน่ง</a>
                        </li>
                    </ul>
                </li>
                <li class="li">
                    <a href="{{ url('/attendance') }}"><i class="fas fa-clock"></i> บันทึกเวลาทำงาน</a>
                </li>
                <li class="li">
                    <a href="{{ url('/work') }}"><i class="fas fa-map-marked-alt"></i> บันทึกการทำงานนอกพื้นที่</a>
                </li>
                <li class="li">
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fas fa-calendar-day"></i> บันทึกการลา
                        @if ($data > 0)
                        <span class="badge badge-warning">
                            {{ $data }}
                        </span>
                        @endif
                    </a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li class="ul">
                            <a href="{{ url('/dayoff') }}">รออนุมัติ</a>
                        </li>
                        <li class="ul">
                            <a href="{{ url('/allow') }}">ผ่านอนุมัติ</a>
                        </li>
                        <li class="ul">
                            <a href="{{ url('/notallow') }}">ไม่ผ่านอนุมัติ</a>
                        </li>
                        <li class="ul">
                            <a href="{{ url('/dayoff-type') }}">ประเภทการลา</a>
                        </li>
                        <li class="ul">
                            <a href="{{ url('/resson') }}">เหตุผลการไม่อนุมัติ</a>
                        </li>
                    </ul>
                </li>
                <li class="li">
                    <a href="#ReportSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fas fa-poll"></i> รายงาน
                    </a>
                    <ul class="collapse list-unstyled" id="ReportSubmenu">
                        <li class="ul">
                            <a href="{{ url('/report-staff') }}">บุคลากร</a>
                        </li>
                        <li class="ul">
                            <a href="{{ url('/report-attendance') }}">บันทึกเวลาทำงาน</a>
                        </li>
                        <li class="ul">
                            <a href="{{ url('/report-work') }}">บันทึกการทำงานนอกพื้นที่</a>
                        </li>
                        <li class="ul">
                            <a href="{{ url('/report-dayoff') }}">บันทึกการลา</a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>

        <!-- Page Content Holder -->
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#00695c;">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="navbar-btn " style="background-color:#00695c ;">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item ">

                            </li>
                            <li class="nav-item text-white">
                                <a class="nav-link text-white user">
                                    <i class="fas fa-user-circle"></i>
                                    @if(Auth::user()->prename == 1) {{ __('นาย') }}@endif
                                    @if(Auth::user()->prename == 2) {{ __('นาง') }}@endif
                                    @if(Auth::user()->prename == 3) {{ __('นางสาว') }}@endif
                                    {{ Auth::user()->fname }} {{ Auth::user()->lname }}
                                </a>
                            </li>
                            <li>
                                <h2 class="text-white">|</h2>
                            </li>
                            <li>
                                <a class="nav-link text-white user" href=""
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="container-fulid">
                <div class="container subtitle">
                    @yield('subtitle')
                </div>

                <div class="container">
                    @yield('content')
                </div>
            </div>

        </div>
    </div>

    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
        });
    </script>
    @yield('script')

</body>

@yield('modal')

</html>