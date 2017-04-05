@extends('layouts.mainNav')

@section('content')
    <div class="page form">
        <div class="complete">
            @if( Request::segment(1) == 'master-complete' )
                <h1 class="title">마스터 등록이 완료되었습니다.</h1>
            @elseif( Request::segment(1) == 'lesson-complete' )
                <h1 class="title">레슨 등록이 완료되었습니다.</h1>
            @else
                <h1 class="title">PLAY 등록이 완료되었습니다.</h1>
            @endif
            <p>승인 결과는 신청 접수 후 7영업일 이내에 전화와 이메일로 받아보실 수 있습니다.</p>
            <div class="service">
                <p>관련 문의 사항은 아래 담당자에게 문의해주세요.</p>
                <p><b>Customer Service</b></p>
                <p>Phone : 02-3407-6202</p>
                <p>Email : immaster@platformstory.com</p>
                <p>Kakao : @아임마스터</p>
            </div>
            <a class="btn" href="{{ url('/') }}">홈으로 가기</a>
        </div>
    </div>
@endsection