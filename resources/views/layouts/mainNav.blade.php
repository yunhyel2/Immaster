<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>아임마스터</title>
<meta name="description" content="">
<meta name="author" content="">

<!-- Favicons
    ================================================== -->
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">


<!--미리보기 이미지-->
<meta property="og:image" content="img/logo.png"/>

<!-- Bootstrap -->
<link rel="stylesheet" type="text/css"  href="/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/css/font-awesome/css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="{{ url('/css/app.css') }}">
<!--FONT-->
<link href="https://fonts.googleapis.com/css?family=Montserrat:500,600,700,800,900" rel="stylesheet">
<!--<link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Caveat+Brush|Permanent+Marker" rel="stylesheet">-->

<!-- Stylesheet
    ================================================== -->
<!--<link href='http://fonts.googleapis.com/css?family=Lato:400,700,900,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800,600,300' rel='stylesheet' type='text/css'>-->
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
    window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
    ]) !!};
</script>
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top" class="{{ Request::segment(1) == 'join' ? 'form' : '' }}">
    <nav class="navbar navbar-default navbar-static-top" style="{{ Request::segment(1) != null ? 'background:url(\'/img/main.png\') no-repeat;background-size:cover;' : '' }}">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img class="logo" src="{{ url('/img/logo_01.png') }}" alt="아임마스터" style="{{ !Request::segment(1) ? '' : 'width:100px;height:auto;' }}">
                </a>
            </div>
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <ul class="nav navbar-nav navbar-right {{ Request::segment(1) == 'join' ? 'hidden' : '' }}">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ route('login') }}">마스터로 로그인</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        로그아웃
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <div id="app">
    @yield('content')
    </div>
    <div id="footer">
        <div class="logo-wrap">
            <a href="{{ url('/') }}" class="logo">
                <img src="/img/logo_03.png" alt="아임마스터"/>
            </a>
        </div>
        <ul>
            <li><span>회사명</span>플랫폼스토리</li>
            <li><span>이메일주소</span><a href="mailto:immaster@platformstory.com">immaster@platformstory.com</a></li>
            <li><span>전화번호</span>+82 2 3407 6202</li>
            <li><span>SNS</span>페이스북</li>
        </ul>
        <p>KB 에스크로 이체 판매자 확인정보 서비스 이용약관 및 개인정보 취급방침</p>
    </div>
</body>
</html>