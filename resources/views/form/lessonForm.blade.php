@extends('layouts.mainNav')

@section('content')
    <div class="page form mastercheck">
        @if( Request::segment(1) == 'lesson-join' )
        <h1>레슨 등록</h1>
        @else
        <h1>PLAY 등록</h1>
        @endif
        <form method="POST" name="master-check" action="{{ url('master-check') }}">
        {{ csrf_field() }}
            <p><strong>마스터 등록 당시 입력한 이메일과 이름을 입력하세요.</strong></p>
            <div class="mastercheck">
                <input type="hidden" name="status" value="{{ Request::segment(1) == 'lesson-join' ? 'lesson' : 'play' }}" readonly>
                <div class="form-group">
                    <label for="email">이메일(아이디)</label>
                    <input type="email" id="email" name="email" class="required email" placeholder="aaaa@example.com"/>
                </div>
                <div class="form-group">
                    <label for="name">이름</label>
                    <input type="text" id="name" name="name" class="required" placeholder="홍길동"/>
                </div>
                <div class="button">
                    <input type="submit" class="confirm" value="확인" disabled/>
                </div>
                <script>
                    $('div.mastercheck input:not([type="submit"])').on('keypress', function(){
                        if( $('input[name="email"]').val() != '' && $('input[name="name"]').val() != '' ){
                            $('input[type="submit"]').removeAttr('disabled');
                        }
                    });
                </script>
            </div>
            <div>
                <p>
                    <span>아직 마스터로 등록하지 않으셨다면 지금 바로 등록하세요.</span>
                    <a href="{{ url('/master-join') }}" class="masterJoinBtn">마스터 등록하기</a>
                </p>
            </div>
        </form>
    </div>
@endsection