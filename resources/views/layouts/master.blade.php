<!DOCTYPE html>
    <html dir="rtl">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
            <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Assistant" rel="stylesheet">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
            <link href="{!! asset('css/index.css') !!}" media="all" rel="stylesheet" type="text/css" />
            <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Varela+Round" rel="stylesheet">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            @yield('page-style')
            <title>MTAcoffee</title>
        </head>

    <body>
        <!-- Navigation -->
        <a  class="menu-toggle rounded" id="display-side-menu" href="#">
            <i class="fa fa-bars"></i>
        </a>
        <nav   id="sidebar-wrapper" >
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
                <li class="sidebar-nav-item">
                    <a class="js-scroll-trigger" href="{{ route('report.view.all') }}">צפייה בכל הדיווחים</a>
                </li>
            </ul>
        </nav>

        <header class="master-head" id="page-top">
            <span>
                <a href="{{route('home')}}" title="Home Page"><i class="fas fa-home back-to-home"></i></a>
            </span>
            <div class="round-div"></div>
            <div class="container text-center my-auto">
                <a href="{{route('home')}}" title="Home Page" style="text-decoration: none"><h3 id="navtext">חזק, על בסיס אמון</h3></a>
            </div>
            <div class="overlay"></div>
        </header>

        <main>
            <div class="container content text-right">
                <br>
                @yield('content')
                <br>
                <br>
            </div>
        </main>


        <footer class="footer">
            <div class="row">
                <div class="col copyright">
                    <p>Made by MTA-Coffee Team &copy; 2018</p>
                </div>
            </div>
        </footer>

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded js-scroll-trigger" href="#page-top">
            <i class="fa fa-angle-up"></i>
        </a>

        <!-- jQuery, Popper.js, Bootstrap JS -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.compatibility.js"></script>

        <!-- Index JavaScript -->
        <script type="text/javascript" src="{!! asset('js/index.js') !!}"></script>
        <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
        @yield('page-scripts')
        @include('sweet::alert')

        <script>
            var OneSignal = window.OneSignal || [];
            OneSignal.push(function() {
                OneSignal.init({
                    appId: "3a5c67a0-1c84-41ee-946f-5a8509e90a78",
                });
            });
        </script>
        <script>
            $("#display-side-menu").click(function() {
                var x = $("#displayChange");
                if (x.css("display") === "none") {
                    x.fadeIn(400);
                } else {
                    x.fadeOut(400);
                }
            });
        </script>
    </body>
</html>