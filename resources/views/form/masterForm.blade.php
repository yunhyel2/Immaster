@extends('layouts.mainNav')

@section('content')
    <div class="page form">
        <h1>마스터 등록</h1>
        <form class="validate master-form" name="master-form" method="POST" action="{{ url('/master-agree') }}">
            {{ csrf_field() }}
            <div class="form-group tot_agree">
                <input type="radio" id="totalAgree">
                <label for="totalAgree">전체동의</label>
            </div>
            <div class="form-group agree">
                <h2>아임마스터 이용약관 (필수)</h2>
                <span class="right">
                    <input type="radio" id="agree1_ok" name="agree1">
                    <label for="agree1_ok">아임마스터 이용약관에 동의합니다</label>
                    <input type="radio" id="agree1_no" name="agree1" class="disagree">
                    <label for="agree1_no">동의안함</label>
                </span>
                <div class="box">
                    @include('document.document1')
                </div>
            </div>
            <div class="form-group agree">
                <h2>마스터 등록약관 (필수)</h2>
                <span class="right">
                    <input type="radio" id="agree2_ok" name="agree2">
                    <label for="agree2_ok">마스터 등록약관에 동의합니다</label>
                    <input type="radio" id="agree2_no" name="agree2" class="disagree">
                    <label for="agree2_no">동의안함</label>
                </span>
                <div class="box">
                    @include('document.document2')
                </div>
            </div>
            <div class="form-group agree">
                <h2>개인정보 취급방침 (필수)</h2>
                <span class="right">
                    <input type="radio" id="agree3_ok" name="agree3">
                    <label for="agree3_ok">개인정보 취급방침에 동의합니다</label>
                    <input type="radio" id="agree3_no" name="agree3" class="disagree">
                    <label for="agree3_no">동의안함</label>
                </span>
                <div class="box">
                    @include('document.document3')
                </div>
            </div>
            <div class="form-group button">
                <input type="submit" class="btn" disabled value="다음 단계"/>
                <input type="cancel" class="btn" value="취소"/>
            </div>
        </form>
    </div>
    <script>
        $('input#totalAgree').on('click', function(){
            document.getElementById('agree1_ok').checked = true;
            document.getElementById('agree2_ok').checked = true;
            document.getElementById('agree3_ok').checked = true;
        });
        $('input[type="radio"]').on('click', function(){
            if( $('#agree1_ok').is(':checked') == true && $('#agree2_ok').is(':checked') == true && $('#agree3_ok').is(':checked') == true ){
                $('input[type="submit"]').removeAttr('disabled').addClass('next');
            }else{
                $('input[type="submit"]').attr('disabled', 'disabled').removeClass('next');
            }
        });
        $('input[type="submit"]').on('click', function(e){
            e.preventDefault();
            if( confirm('다음 단계로 넘어가시겠습니까?') ){
                $(this).parent().parent().submit();
            }
        });
    </script>
@endsection