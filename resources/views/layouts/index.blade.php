<!DOCTYPE html>
<html dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Assistant" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <link href="{!! asset('css/index.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <title>MTAcoffee</title>
</head>

<body>
<!-- Navigation -->
<a class="menu-toggle rounded" href="#">
    <i class="fa fa-bars"></i>
</a>
<nav id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <li class="sidebar-brand">
            <a class="js-scroll-trigger" href="{{ route('home') }}">קפה אמון</a>
        </li>
        <li class="sidebar-nav-item">
            <a class="js-scroll-trigger" href="{{ route('home') }}">חזור לדף הבית</a>
        </li>
        <li class="sidebar-nav-item">
            <a class="js-scroll-trigger" href="{{ route('pay') }}">שלם על קפה</a>
        </li>
        <li class="sidebar-nav-item">
            <a class="js-scroll-trigger" href="{{ route('payforcard') }}">הטען כרטיס</a>
        </li>
        <li class="sidebar-nav-item">
            <a class="js-scroll-trigger" href="{{ route('reports.create') }}">דיווח על תקלה</a>
        </li>
        <li class="sidebar-nav-item">
            <a class="js-scroll-trigger" href="{{ route('station') }}">עדכון משמרות</a>
        </li>
    </ul>
</nav>

<header class="master-head" id="page-top">
    <div class="notification-bar">
    </div>
    <div class="container text-center my-auto" style="padding-bottom: 25px;">
        @if(Auth::user())
            <section>
                <h1 class="d-inline">{{ Auth::user()->first_name. ' ' .Auth::user()->last_name }}</h1>
                <br>
                <?php $level = Auth::user()->getLevel() ?>
            </section>
            <br>
            <div>
            @if($level == '11')
                <i class="fas fa-trophy user-level"></i>
            @else
            @for($i=1; $i<10-$level; $i++)
                <i class="fas fa-coffee user-grey"></i>
            @endfor
            @for($i=0; $i<$level; $i++)
                <i class="fas fa-coffee user-level"></i>
            @endfor
            @endif
            <h3>נקודות:&nbsp;{{ Auth::user()->points }}</h3>
            </div>
        @else
            <h1>קפה אמון</h1>
            <h3>חזק, על בסיס אמון</h3>
        @endif
    </div>
    <div class="overlay"></div>
    <div class="round-div"></div>
</header>

<main class="func-buttons" style="position: relative;top: 50px;">
    <div class="container">
        @yield('content')
    </div>
</main>

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded js-scroll-trigger" href="#page-top">
    <i class="fa fa-angle-up"></i>
</a>

<!-- jQuery, Popper.js, Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.compatibility.js"></script>
<!-- Index JavaScript -->
<script type="text/javascript" src="{!! asset('js/index.js') !!}"></script>
<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>

<script>
    var OneSignal = window.OneSignal || [];
    OneSignal.push(function() {
        OneSignal.init({
            appId: "3a5c67a0-1c84-41ee-946f-5a8509e90a78",
        });
    });
</script>
@include('sweet::alert')
</body>
</html>