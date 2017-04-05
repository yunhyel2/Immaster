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
<link rel="stylesheet" type="text/css"  href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome/css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="css/app.css">

<!-- Link Swiper's CSS -->
<link rel="stylesheet" href="css/swiper.css">

<!--FONT-->
<link href="https://fonts.googleapis.com/css?family=Montserrat:500,600,700,800,900" rel="stylesheet">
<!--<link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Caveat+Brush|Permanent+Marker" rel="stylesheet">-->

<!-- Stylesheet
    ================================================== -->
<link rel="stylesheet" type="text/css"  href="css/style.css">
<!--<link href='http://fonts.googleapis.com/css?family=Lato:400,700,900,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800,600,300' rel='stylesheet' type='text/css'>-->
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

<style>
  
    .swiper-container {
        width: 100%;
        height: 100%;
        position: relative;
    }

    .swiper-slide {
        text-align: center;
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        background-size: cover;
        -o-background-size: cover;
    }

    .slide1 {
      background: url(img/main.png) no-repeat center center;
      background-size: cover; 
    }
    .slide2 {
      background: url(img/main_2.png) no-repeat center center; 
    }
    .slide3 {
      background: url(img/main_1.png) no-repeat center center; 
    }
    .slide4 {
      background: url(img/main_4.png) no-repeat center center; 
    }
    .slide5 {
      background: url(img/main_5.png) no-repeat center center; 
    }

    </style>
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    @include('layouts.app')
    <div id="boxes">
        <div id="login_lesson" class="window">
            <p class="close"><a href="#"><img src="./img/close.png" /></a></p>
            <h2>알려드립니다</h2>
            <p class="notice">레슨 등록을 위해서는 마스터 등록이 필요합니다. 아직 마스터로 등록하지 않았다면 마스터 등록하기로 이동해주세요.</p> 
            <input type="button" value="마스터 등록하기" onclick="location.href='http://naver.me/FZNHeX4U'" />
            <input type="button" value="레슨 등록하기" onclick="location.href='http://naver.me/FVhIhJNd'" />  
        </div>
        <div id="login_play" class="window">
            <p class="close"><a href="#"><img src="./img/close.png" /></a></p>
            <h2>알려드립니다</h2>
            <p class="notice">PLAY 등록을 위해서는 마스터 등록이 필요합니다. 아직 마스터로 등록하지 않았다면 마스터 등록하기로 이동해주세요.</p>
            <input type="button" value="마스터 등록하기" onclick="location.href='http://naver.me/FZNHeX4U'" />
            <input type="button" value="PLAY 등록하기" onclick="location.href='http://naver.me/xr1R1jr3'" />   
        </div>
    </div>
    <div id="mask"></div>
    <!-- Swiper -->
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide slide1"></div>
            <div class="swiper-slide slide2"></div>
            <div class="swiper-slide slide3"></div>
            <div class="swiper-slide slide4"></div>
            <div class="swiper-slide slide5"></div>
        </div>
        <div id="visual">
            <div class="intro-text">
            <p>151명의 마스터 &#183; 170개의 레슨 &#183; 16개의 PLAY</p>
            <h1 class="white">WORLD'S BEST</h1>
            <h1 class="orange">MASTER CONNECTING</h1>
            <h1 class="white">PLATFORM</h1>
            <a href="{{ url('/master-apply') }}" id="master_btn" class="btn btn-default">마스터 등록</a>
            <a id="lesson_btn" href="{{ url('lesson-apply') }}" class="btn btn-default">레슨 등록</a>
            <a id="play_btn"  href="{{ url('play-apply') }}" class="btn btn-default">PLAY 등록</a>
            </div>
        </div><!--비쥬얼텍스트-->
    </div>
    <!--스와이퍼컨테이너-->
    </div>
    <!-- About Section -->
    <div id="about" class="text-center">
        <div class="container">
            <div class="section-title text-center center">
            <h2>I'M MASTER</h2>
            <p class="info_22">아임마스터는 가장 진화된 재능공유 서비스 플랫폼입니다.</p>
            </div>
            <div class="row">
                <img src="img/app_logo.png" class="app_logo">
                <div class="icon_wrap">
                <div class="icon">
                <img src="img/reports.png">
                <p>레포츠</p>
                </div>
                <div class="icon">
                <img src="img/performance.png">
                <p>공연</p>
                </div>
                <div class="icon">
                <img src="img/tech.png">
                <p>테크</p>
                </div>
                <div class="icon">
                <img src="img/art.png">
                <p>아트</p>
                </div>
                <div class="icon">
                <img src="img/design.png">
                <p>디자인</p>
                </div>
                <div class="icon">
                <img src="img/cooking.png">
                <p>쿠킹</p>
                </div>
                <div class="icon">
                <img src="img/kids.png">
                <p>맘/키즈</p>
                </div>
                <div class="icon">
                <img src="img/coaching.png">
                <p>코칭</p>
                </div>
                </div>
                <p class="info_20">200여개 분야의 마스터와 함께합니다.<br />아임마스터를 통해 쉽고 편리하게 원하는 마스터를 찾으세요.</p>
                <p class="text-center"><a class="btn btn_down" href="#">DOWNLOAD APP</a></p>
            </div>
            </div>
        </div>
    </div>
    <!-- Swiper -->
    <div class="swiper-container" id="swiper_second">
        <div class="swiper-wrapper">
            <div class="swiper-slide slide6">
              <div id="master" class="text-center">
                <div class="container wrap">
                  <div class="section-title center">
                    <h2>MASTER</h2>
                  </div>
                  <div class="row">
                    <div class="img"><img src="img/master.png" /></div>
                    <p>마스터에 관한 모든 궁금증을 해결하세요!</p>
                    <p>프로필 소개, 참가자 후기, 평점, 사진 및 영상을 통해 마스터에 대해 알아볼 수 있습니다.</p>
                    <p>마스터가 진행중인 레슨도 함께 살펴보세요.</p>
                  </div>
                </div>
              </div>
            </div>

            <div class="swiper-slide slide7">
              <div id="lesson" class="text-center">
                <div class="container wrap">
                  <div class="section-title text-center center">
                    <h2>LESSON</h2>
                  </div>
                  <div class="row">
                    <div class="img"><img src="img/lesson.png" /></div>
                    <p>레포츠, 테크, 뮤직, 뷰티, 쿠킹, 리빙, 외국어까지 상상할 수 있는 모든 레슨을 담았습니다!</p>
                    <p>레슨 커리큘럼과 일정, 위치, 비용 등을 고려해 내게 딱 맞는 레슨을 신청하세요.</p>
                  </div>
                </div>
              </div>
            </div>

            <div class="swiper-slide slide8">
              <div id="play" class="text-center">
                <div class="container wrap">
                  <div class="section-title center">
                    <h2>PLAY</h2>
                  </div>
                  <div class="row">
                    <div class="img"><img src="img/play.png" /></div>
                    <p>마스터라고 수업만 하란 법 있나요?</p>
                    <p>각종 파티부터 서바이벌 게임까지 다양한 PLAY를 즐겨보세요!</p>
                  </div>
                </div>
              </div>
            </div>

            <div class="swiper-slide slide9">
              <div id="direct" class="text-center">
                <div class="container wrap">
                  <div class="section-title center">
                    <h2>DIRECT</h2>
                  </div>
                  <div class="row">
                    <div class="img"><img src="img/direct.png" /></div>
                    <p>나에게 맞는 레슨이 없다면 마스터에게 직접 레슨을 요청하는 '다이렉트 신청'을 누르세요.</p>
                    <p>새로운 레슨을 제안할 수 있습니다.</p>
                  </div>
                </div>
              </div>
            </div>

            <div class="swiper-slide slide10">
              <div id="inquire" class="text-center">
                <div class="container wrap">
                  <div class="section-title center">
                    <h2>INQUIRY</h2>
                  </div>
                  <div class="row">
                    <div class="img"><img src="img/inquiry.png" /></div>
                    <p>분야, 일정, 장소, 희망횟수 그리고 비용까지 원하는 조건만 제시하세요.</p>
                    <p>조건에 최적화된 마스터가 응답합니다.</p>
                  </div>
                </div>
              </div>
            </div>

            <div class="swiper-slide slide11">
              <div id="review" class="text-center">
                <div class="container wrap">
                  <div class="section-title center">
                    <h2>REVIEW</h2>
                  </div>
                  <div class="row">
                    <div class="img"><img src="img/review.png" /></div>
                    <p>이전 레슨 참가자가 남긴 생생한 리뷰와 별점을 참고하세요!</p>
                    <p>포토 리뷰로 더 생동감있는 후기를 확인할 수 있습니다.</p>
                  </div>
                </div>
              </div>
            </div>

        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
      
    </div>
    <!--스와이퍼컨테이너-->
    <div id="footer" >
        <div class="container text-center">
            <div class="fnav">
                <img src="img/logo_03.png">
                <div class="fnav_sub">
                    <p>회사명</p>
                    <p>이메일주소</p>
                    <p>전화번호</p>
                    <p>SNS</p>
                </div>
                <div class="fnav_sub_1">
                    <p>플랫폼스토리</p>
                    <p>immaster@platformstory.com</p>
                    <p>+82 2 3407 6202</p>
                    <p><a href="https://www.facebook.com/immaster.pro/">페이스북</a></p>
                </div>
                <div class="fnav_sub_2">
                <a href="#" onclick="javascript:onPopKBAuthMark();return false;" class="escrow">
                    KB 에스크로 이체 판매자 확인정보
                </a>	
                <a href="operating.html" class="text">서비스 이용약관	및 개인정보 취급방침</a>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="js/jquery.1.11.1.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script> 
    <script type="text/javascript" src="js/swiper.js"></script>
    <script type="text/javascript" src="js/jquery.model.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <!-- Initialize Swiper -->
    <script>
    var swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        paginationClickable: true,
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: 6000,
        autoplayDisableOnInteraction: false
    });
    </script>

    <!-- KB에스크로 이체 인증마크 적용 시작 -->
    <script>
    function onPopKBAuthMark()
    {
    window.open('','KB_AUTHMARK','height=604, width=648, status=yes, toolbar=no, menubar=no, location=no');
    document.KB_AUTHMARK_FORM.action='https://okbfex.kbstar.com/quics';
    document.KB_AUTHMARK_FORM.target='KB_AUTHMARK';
    document.KB_AUTHMARK_FORM.submit();
    }
    </script>

    <form name="KB_AUTHMARK_FORM" method="get">
    <input type="hidden" name="page" value="C021590"/>
    <input type="hidden" name="cc" value="b034066:b035526"/>
    <input type="hidden" name="mHValue" value='e07016e6d8c99e1e1a2cd56ac47a21af201702201356139'/>
    </form>
    <!-- KB에스크로이체 인증마크 적용 종료 -->

</body>
</html>