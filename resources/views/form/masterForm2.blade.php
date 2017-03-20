@extends('layouts.mainNav')

@section('content')
    <div class="page form">
        <h1 class="hidden">마스터로 등록하기</h1>
        <nav class="form-navi">
            <ul>
                <li class="active"><a href="#">기본정보</a></li>
                <li><a href="#">마스터소개</a></li>
                <li><a href="#">등록하기</a></li>
            </ul>
        </nav>
        <form class="validate master-form" name="master-form" method="POST" action="{{ url('/master-agree') }}">
            {{ csrf_field() }}
            <h2>개인신상</h2>
            <div class="group">
                <div class="form-group join">
                    <label for="email">이메일(아이디)<span class="required">*</span></label>
                    <input type="text" id="email" name="email01"/><span style="margin:0 3px;">@</span><input type="text"/>
                </div>
                <div class="form-group join">
                    <label for="name">이름<span class="required">*</span></label>
                    <input type="text" id="name" name="name"/>
                </div>
                <div class="form-group join">
                    <label for="phone">휴대전화<span class="required">*</span></label>
                    <input type="text" id="phone" name="phone" placeholder="- 없이 입력해주세요."/>
                </div>
                <div class="form-group join">
                    <label for="birth">생년월일</label>
                    <script language="javascript"> 
                        var today = new Date(); 
                        var toyear = parseInt(today.getYear()); 
                        var start = toyear - 5 
                        var end = toyear - 70; 

                        document.write("<font size=2><select name=birth1>"); 
                        document.write("<option value='' selected>Year"); 
                        for (i=start;i>=end;i--) document.write("<option>"+i); 
                        document.write("</select>  "); 

                        document.write("<select name=birth2>"); 
                        document.write("<option value='' selected>Month"); 
                        for (i=1;i<=12;i++) document.write("<option>"+i); 
                        document.write("</select>  "); 

                        document.write("<select name=birth3>"); 
                        document.write("<option value='' selected>Date"); 
                        for (i=1;i<=31;i++) document.write("<option>"+i); 
                        document.write("</select>  </font>"); 
                    </script> 
                </div>
                <div class="form-group join">
                    <label for="gender">성별<span class="required">*</span></label>
                    <input type="radio" id="male" name="gender" value="남"/>
                    <label for="male">남</label>
                    <input type="radio" id="female" name="gender" value="여"/>
                    <label for="female">여</label>
                </div>
            </div>
            <h2>카테고리</h2>
            <div class="group">
                <div class="form-group join category">
                    <label for="category">카테고리분류<span class="required">*</span></label>
                    <select id="category" name="category">
                        <option value="1">리빙/공예</option>
                        <option value="2">뷰티/헬스</option>
                        <option value="3">레포츠</option>
                        <option value="4">맘/키즈</option>
                        <option value="5">푸드</option>
                        <option value="6">뮤직/엔터</option>
                        <option value="7">테크</option>
                        <option value="8">아트/디자인</option>
                        <option value="9">외국어</option>
                        <option value="10">상담/코칭</option>
                        <option value="11">파티</option>
                        <option value="12">여행</option>
                        <option value="13">봉사</option>
                        <option value="14">연예</option>
                    </select>
                    <input type="text" name="category-detail" placeholder="구체적인 레슨 주제를 입력해주세요."/>
                    <span class="example">예시) 디퓨저, 디제잉, 포토샵, 중국어회화</span>
                </div>
                <div class="add-remove">
                    <p class="notice">추가 버튼을 누르면 복수의 카테고리 정보를 입력할 수 있습니다.(최대 3개)</p>
                    <button class="add">추가</button>
                    <button class="del">삭제</button>
                </div>
            </div>
            <h2>장소 및 일정</h2>
            <div class="group">
                <div class="form-group join">
                    <label for="location">주 활동 장소<span class="required">*</span></label>
                    <select id="Address_D" name="location">
                        <option value=''>선택하세요</option> 
                        <option value='서울특별시'>서울특별시</option> 
                        <option value='광주광역시'>광주광역시</option> 
                        <option value='대구광역시'>대구광역시</option> 
                        <option value='대전광역시'>대전광역시</option> 
                        <option value='부산광역시'>부산광역시</option> 
                        <option value='울산광역시'>울산광역시</option> 
                        <option value='인천광역시'>인천광역시</option> 
                        <option value='세종특별자치시'>세종특별자치시</option> 
                        <option value='강원도'>강원도</option> 
                        <option value='경기도'>경기도</option> 
                        <option value='경상남도'>경상남도</option> 
                        <option value='경상북도'>경상북도</option> 
                        <option value='전라남도'>전라남도</option> 
                        <option value='전라북도'>전라북도</option> 
                        <option value='제주특별자치도'>제주특별자치도</option> 
                        <option value='충청남도'>충청남도</option> 
                        <option value='충청북도'>충청북도</option> 
                    </select>
                    <select id="Address_S"> 
                        <option value="">선택하세요</option> 
                    </select> 
                    <script type="text/javascript"> 
                        $(document).ready(function(){ 
                            $('#Address_D').change(function(){ 
                                jQuery.ajax({ 
                                    type:"POST", 
                                    url:"/plugin/joso.php", 
                                    data:"Name="+$(this).val(), 
                                    success:function(msg){ 
                                    $('#Address_S').html(msg); 
                                    }, error:function(){

                                    }
                                }); 
                            }); 
                        }); 
                    </script> 
                    <span class="example">(레슨 진행 장소)</span>
                </div>
                <div class="add-remove">
                    <p class="notice">추가 버튼을 누르면 복수의 활동장소 정보를 입력할 수 있습니다.(최대 3개)</p>
                    <button class="add">추가</button>
                    <button class="del">삭제</button>
                </div>
            </div>
            <h2>Career</h2>
            <div class="group">
                <div class="form-group join career">
                    <label for="career">경력사항</label>
                    <textarea id="career" name="career" maxlength="500">
                    </textarea>
                    <span class="length">최대 500자</span>
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