<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>eBajak | Dashboard</title>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">


<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

<link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

<link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">

<link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">

<link rel="stylesheet" href="dist/css/adminlte.min.css?v=3.2.0">

<link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

<link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">

<link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">


<script nonce="e0a479ae-8039-4b4a-a221-8b97b1894d38">
(function(w, d) {
! function(a, b, c, d) {
a[c] = a[c] || {};
a[c].executed = [];
a.zaraz = {
deferred: [],
listeners: []
};
a.zaraz.q = [];
a.zaraz._f = function(e) {
return function() {
                var f = Array.prototype.slice.call(arguments);
                a.zaraz.q.push({
                                m: e,
                                a: f
                })
}
};
for (const g of ["track", "set", "debug"]) a.zaraz[g] = a.zaraz._f(g);
a.zaraz.init = () => {
var h = b.getElementsByTagName(d)[0],
                i = b.createElement(d),
                j = b.getElementsByTagName("title")[0];
j && (a[c].t = b.getElementsByTagName("title")[0].text);
a[c].x = Math.random();
a[c].w = a.screen.width;
a[c].h = a.screen.height;
a[c].j = a.innerHeight;
a[c].e = a.innerWidth;
a[c].l = a.location.href;
a[c].r = b.referrer;
a[c].k = a.screen.colorDepth;
a[c].n = b.characterSet;
a[c].o = (new Date).getTimezoneOffset();
if (a.dataLayer)
                for (const n of Object.entries(Object.entries(dataLayer).reduce(((o, p) => ({
                                                ...o[1],
                                                ...p[1]
                                })), {}))) zaraz.set(n[0], n[1], {
                                scope: "page"
                });
a[c].q = [];
for (; a.zaraz.q.length;) {
                const q = a.zaraz.q.shift();
                a[c].q.push(q)
}
i.defer = !0;
for (const r of [localStorage, sessionStorage]) Object.keys(r || {}).filter((t => t.startsWith(
                "_zaraz_"))).forEach((s => {
                try {
                                a[c]["z_" + s.slice(7)] = JSON.parse(r.getItem(s))
                } catch {
                                a[c]["z_" + s.slice(7)] = r.getItem(s)
                }
}));
i.referrerPolicy = "origin";
i.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(a[c])));
h.parentNode.insertBefore(i, h)
};
["complete", "interactive"].includes(b.readyState) ? zaraz.init() : a.addEventListener("DOMContentLoaded",
zaraz.init)
}(w, d, "zarazData", "script");
})(window, document);
</script>
</head>


<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<div id="preloader" class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
</div>

<nav class="main-header navbar navbar-expand navbar-white navbar-light">

<ul class="navbar-nav">
<li class="nav-item">
<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
</li>
</ul>
<ul class="navbar-nav ml-auto">
<li class="nav-item dropdown">
<a class="nav-link" data-toggle="dropdown" href="#">
<i class="far fa-bell"></i>
<span class="badge badge-warning navbar-badge">15</span>
</a>
<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
<span class="dropdown-item dropdown-header">15 Notifications</span>
<div class="dropdown-divider"></div>
<a href="#" class="dropdown-item">
<i class="fas fa-envelope mr-2"></i> 4 new messages
<span class="float-right text-muted text-sm">3 mins</span>
</a>
<div class="dropdown-divider"></div>
<a href="#" class="dropdown-item">
<i class="fas fa-users mr-2"></i> 8 friend requests
<span class="float-right text-muted text-sm">12 hours</span>
</a>
<div class="dropdown-divider"></div>
<a href="#" class="dropdown-item">
<i class="fas fa-file mr-2"></i> 3 new reports
<span class="float-right text-muted text-sm">2 days</span>
</a>
<div class="dropdown-divider"></div>
<a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
</div>
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="logoutDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ Auth::user()->name }}
    </a>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="logoutDropdown">
        <form id="logout-form" method="POST" action="{{ route('logout') }}">
            @csrf
            <a href="#" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
        </form>
    </div>
</li>

</li>
</nav>


<aside class="main-sidebar sidebar-dark-primary elevation-2">


<div class="sidebar">

<div class="user-panel mt-3 pb-3 mb-3 d-flex">

<div class="image">
    <svg class="flex" viewBox="0 0 120 120" xmlns="http://www.w3.org/2000/svg" xmlns:bx="https://boxy-svg.com" alt="Logo" width="40" height="40">
        <g transform="matrix(1, 0, 0, 1, -219.201312, -71.125489)">
            <ellipse style="stroke: rgb(0, 0, 0); fill: rgb(101, 7, 0);" cx="279.205" cy="131.086" rx="55.621" ry="56.704"/>
            <ellipse style="stroke: rgb(0, 0, 0); fill: rgb(255, 255, 255);" cx="278.948" cy="131.526" rx="47.815" ry="47.707"/>
            <ellipse style="stroke: rgb(0, 0, 0); fill: rgb(253, 67, 13);" cx="280.046" cy="105.242" rx="8.458" ry="8.178"/>
            <polyline style="stroke: rgb(0, 0, 0); fill: rgb(255, 255, 255);" points="265.663 85.555 295.878 77.143 299.992 78.657 290.5 85.387"/>
            <g transform="matrix(1, 0, 0, 1, -130.017715, -16.129066)">
            <g transform="matrix(1, 0, 0, 1, 18.272963, 3.025813)">
            <path style="stroke: rgb(0, 0, 0); fill: rgb(15, 146, 4);" d="M 392.588 148.965 C 392.588 148.847 392.588 148.611 392.61533333333335 144.60766666666666 C 392.6426666666667 140.60433333333333 392.69733333333335 132.83366666666666 397.465 128.68933333333334 C 402.2326666666667 124.545 411.71333333333337 124.027 416.8373333333334 122.56716666666667 C 421.96133333333336 121.10733333333333 422.72866666666664 118.70566666666667 423.0026666666667 121.36666666666667 C 423.27666666666664 124.02766666666666 423.05733333333336 131.75133333333335 418.8376666666666 136.1075 C 414.618 140.46366666666665 406.39799999999997 141.4523333333333 401.35633333333334 143.05366666666666 C 396.31466666666665 144.655 394.45133333333337 146.869 393.51966666666675 147.976 C 392.588 149.083 392.588 149.083 392.588 149.083 C 392.588 149.083 392.588 149.083 392.588 148.965" transform="matrix(-1, 0, 0, -1, 815.670451, 269.253286)" bx:d="M 392.588 149.083 U 392.588 148.375 U 392.752 125.063 U 421.194 123.509 U 423.496 116.304 U 422.838 139.475 U 398.178 142.441 U 392.588 149.083 U 392.588 149.083 Z 1@b68055d4"/>
            <path style="stroke: rgb(0, 0, 0); fill: rgb(15, 146, 4);" d="M 392.88999999999993 176.67516666666666 C 392.89000000000004 176.55733333333333 392.89000000000004 176.3216666666667 392.9173333333333 172.31833333333336 C 392.9446666666666 168.31500000000003 392.99933333333337 160.544 397.767 156.3995 C 402.5346666666666 152.255 412.0153333333333 151.737 417.13933333333335 150.27716666666666 C 422.2633333333333 148.81733333333332 423.0306666666667 146.41566666666668 423.30466666666666 149.07666666666668 C 423.5786666666666 151.73766666666668 423.3593333333333 159.46133333333333 419.1396666666667 163.81783333333334 C 414.92 168.17433333333335 406.7 169.16366666666667 401.6583333333333 170.76500000000001 C 396.6166666666666 172.3663333333333 394.75333333333333 174.57966666666667 393.82166666666666 175.68633333333332 C 392.89000000000004 176.793 392.89000000000004 176.793 392.88999999999993 176.793 C 392.89000000000004 176.793 392.89000000000004 176.793 392.88999999999993 176.67516666666666" transform="matrix(-1, 0, 0, -1, 816.27445, 324.673301)" bx:d="M 392.89 176.793 U 392.89 176.086 U 393.054 152.773 U 421.496 151.219 U 423.798 144.014 U 423.14 167.185 U 398.48 170.153 U 392.89 176.793 U 392.89 176.793 Z 1@55b36eff"/>
            </g>
            <g transform="matrix(-1, 0, 0, 1, 800.843445, 3.025802)">
            <path style="stroke: rgb(0, 0, 0); fill: rgb(15, 146, 4);" d="M 392.588 148.965 C 392.588 148.847 392.588 148.611 392.61533333333335 144.60766666666666 C 392.6426666666667 140.60433333333333 392.69733333333335 132.83366666666666 397.465 128.68933333333334 C 402.2326666666667 124.545 411.71333333333337 124.027 416.8373333333334 122.56716666666667 C 421.96133333333336 121.10733333333333 422.72866666666664 118.70566666666667 423.0026666666667 121.36666666666667 C 423.27666666666664 124.02766666666666 423.05733333333336 131.75133333333335 418.8376666666666 136.1075 C 414.618 140.46366666666665 406.39799999999997 141.4523333333333 401.35633333333334 143.05366666666666 C 396.31466666666665 144.655 394.45133333333337 146.869 393.51966666666675 147.976 C 392.588 149.083 392.588 149.083 392.588 149.083 C 392.588 149.083 392.588 149.083 392.588 148.965" transform="matrix(-1, 0, 0, -1, 815.670451, 269.253286)" bx:d="M 392.588 149.083 U 392.588 148.375 U 392.752 125.063 U 421.194 123.509 U 423.496 116.304 U 422.838 139.475 U 398.178 142.441 U 392.588 149.083 U 392.588 149.083 Z 1@b68055d4"/>
            <path style="stroke: rgb(0, 0, 0); fill: rgb(15, 146, 4);" d="M 392.88999999999993 176.67516666666666 C 392.89000000000004 176.55733333333333 392.89000000000004 176.3216666666667 392.9173333333333 172.31833333333336 C 392.9446666666666 168.31500000000003 392.99933333333337 160.544 397.767 156.3995 C 402.5346666666666 152.255 412.0153333333333 151.737 417.13933333333335 150.27716666666666 C 422.2633333333333 148.81733333333332 423.0306666666667 146.41566666666668 423.30466666666666 149.07666666666668 C 423.5786666666666 151.73766666666668 423.3593333333333 159.46133333333333 419.1396666666667 163.81783333333334 C 414.92 168.17433333333335 406.7 169.16366666666667 401.6583333333333 170.76500000000001 C 396.6166666666666 172.3663333333333 394.75333333333333 174.57966666666667 393.82166666666666 175.68633333333332 C 392.89000000000004 176.793 392.89000000000004 176.793 392.88999999999993 176.793 C 392.89000000000004 176.793 392.89000000000004 176.793 392.88999999999993 176.67516666666666" transform="matrix(-1, 0, 0, -1, 816.27445, 324.673301)" bx:d="M 392.89 176.793 U 392.89 176.086 U 393.054 152.773 U 421.496 151.219 U 423.798 144.014 U 423.14 167.185 U 398.48 170.153 U 392.89 176.793 U 392.89 176.793 Z 1@55b36eff"/>
            </g>
            </g>
        </g>
    </svg>
</div>
<div class="info">
<a href="{{route('home')}}">eBajak</a>
</div>
</div>


<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fa-regular fa-user"></i>
                <p>
                    Pendaftaran
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('create') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Daftar Petani</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('semakdaftar') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Semak Daftar</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fa-regular fa-user"></i>
                <p>
                    Tuntutan
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    {{-- <a href="{{ route('ptundaf') }}" class="nav-link"> --}}
                        <i class="far fa-circle nav-icon"></i>
                        <p>Daftar Tuntutan</p>
                    </a>
                </li>
                <li class="nav-item">
                    {{-- <a href="{{ route('ptunsemak') }}" class="nav-link"> --}}
                        <i class="far fa-circle nav-icon"></i>
                        <p>Semak Tuntutan</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                    Carian
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    {{-- <a href="{{ route('carian') }}" class="nav-link"> --}}
                        <i class="far fa-circle nav-icon"></i>
                        <p>Carian Status</p>
                    </a>
                </li>
                    <li class="nav-item">
                        {{-- <a href="{{ route('carian') }}" class="nav-link"> --}}
                            <i class="far fa-circle nav-icon"></i>
                            <p>Carian Laporan</p>
                        </a>
                    </li>
            </ul>
        </li>
    </ul>
</nav>
</aside>


<main class="py-4" style="margin-left: 30px;margin-right: 30px;">
    @yield('navigation')
</main>



    <footer class="main-footer"><b>Dibangunkan &amp; Hakcipta Terpelihara</b><strong> © 2020 <a href="http://www.jpkn.sabah.gov.my">JPKN</a>.</strong>

<div class="float-right d-none d-sm-inline-block">
<b>Versi</b> 1.0
</div>
</footer>

<aside class="control-sidebar control-sidebar-dark">

</aside>

</div>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    var preloader = document.getElementById("preloader");
    preloader.style.display = "none";
  });
</script>

<script src="plugins/jquery/jquery.min.js"></script>

<script src="plugins/jquery-ui/jquery-ui.min.js"></script>

<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="plugins/chart.js/Chart.min.js"></script>

<script src="plugins/sparklines/sparkline.js"></script>

<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>

<script src="plugins/jquery-knob/jquery.knob.min.js"></script>

<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>

<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<script src="plugins/summernote/summernote-bs4.min.js"></script>

<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<script src="dist/js/adminlte.js?v=3.2.0"></script>

<script src="dist/js/pages/dashboard.js"></script>
</body>
</html>
