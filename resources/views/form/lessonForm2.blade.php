@extends('layouts.mainNav')

@section('content')
    <div class="shadow"></div>
    <div class="page form">
        <h1 class="hidden">레슨 등록하기</h1>
        <nav class="form-navi">
            <ul>
                <li class="active" name="one-step">기본정보</li>
                <li name="two-step">레슨소개</li>
                <li name="final-step">등록하기</li>
            </ul>
        </nav>
        <form class="validate" name="lesson-form" method="POST" action="{{ url('/lesson-store') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <!--- 1STEP -->
            <div id="one-step">
                <h2>카테고리</h2>
                <div class="group">
                    <div class="form-group join category">
                        <label for="category" name="category-label">카테고리분류<span class="required">*</span></label>
                        <select id="category" name="category[]" class="required">
                            <option value="리빙/공예">리빙/공예</option>
                            <option value="뷰티/헬스">뷰티/헬스</option>
                            <option value="레포츠">레포츠</option>
                            <option value="맘/키즈">맘/키즈</option>
                            <option value="푸드">푸드</option>
                            <option value="뮤직/엔터">뮤직/엔터</option>
                            <option value="테크">테크</option>
                            <option value="아트/디자인">아트/디자인</option>
                            <option value="외국어">외국어</option>
                            <option value="상담/코칭">상담/코칭</option>
                            <option value="파티">파티</option>
                            <option value="여행">여행</option>
                            <option value="봉사">봉사</option>
                            <option value="연예">연예</option>
                        </select>
                        <input type="text" name="category-detail[]" class="required detail" placeholder="구체적인 레슨 주제를 입력해주세요."/>
                        <span class="example">예시) 디퓨저, 디제잉, 포토샵, 중국어회화</span>
                    </div>
                </div>
                <h2>기본정보</h2>
                <p class="notice warning">※ 유의사항<br/>레슨 시작일은 등록일(오늘)을 기준으로 최소 2주 후 ~ 최대 8주 후 이내로만 설정 가능합니다.<br/>레슨 참가자 모집을 위한 시간 확보 및 레슨 일정 변경 또는 취소율을 낮추기 위함이니 반드시 지켜주세요.</p>
                <div class="group">
                    <input type="hidden" name="master_email" value="{{ $email }}" readonly/>
                    <input type="hidden" name="master_name" value="{{ $name }}" readonly/>
                    <div class="form-group join category">
                        <label for="location">장소<span class="required">*</span></label>
                        <input type="text" id="sample6_postcode" name="postcode" placeholder="우편번호" readonly class="required">
                        <input type="button" name="btn" onclick="sample6_execDaumPostcode()" value="주소 검색"><br>
                        <input type="text" name="location" id="sample6_address" placeholder="주소" class="required detail">
                    </div>
                    <div class="form-group join">
                        <label for="class">클래스 구분<span class="required">*</span></label>
                        <input type="radio" id="oneday" name="class" value="원데이" class="required" checked="checked"/>
                        <label for="oneday">원데이</label>
                        <input type="radio" id="regular" name="class" value="정규" class="required"/>
                        <label for="regular">정규</label>
                        <span class="detail">주 <input type="text" name="howmany_week" class="small required digits regular-active" disabled/> 회 / 총 <input type="text" name="howmany_total" class="small regular-active required digits" disabled/> 회</span>
                        <a class="edit-plan btn hidden">일정편집</a>
                    </div>
                    <script>
                        $('input#regular').click(function(){
                            $('input.regular-active').removeAttr('disabled');
                            $('a.edit-plan').removeClass('hidden');
                            $('div#oneday-form').addClass('hidden').next().removeClass('hidden');
                            $('a.add.date').removeClass('oneday').addClass('regular');
                            $('div.date:not(#oneday-form):not(#regular-form)').remove();
                            $('div#oneday-form').children('input, select').attr('disabled', 'disabled');
                            $('div#regular-form').children('input, select').removeAttr('disabled');
                        });
                        $('input#oneday').click(function(){
                            $('input.regular-active').attr('disabled', 'disabled').removeClass('error');
                            $(this).parent().find('span.error').remove();
                            $('a.edit-plan').addClass('hidden');
                            $('div#regular-form').addClass('hidden').prev().removeClass('hidden');
                            $('a.add.date').removeClass('regular').addClass('oneday');
                            $('div.date:not(#oneday-form):not(#regular-form)').remove();
                            $('div#regular-form').children('input, select').attr('disabled', 'disabled');
                            $('div#oneday-form').children('input, select').removeAttr('disabled');
                        });
                    </script>
                    <div class="form-group join category date" id="oneday-form">
                        <label for="date1[]" name="oneday-label">일정<span class="required">*</span></label>
                        <strong class="label">날짜</strong>
                        <input type="text" id="oneday-picker1" name="date1[]" class="required" readonly>
                        <label for="oneday-picker1" class="btn"><i class="fa fa-calendar" aria-hidden="true"></i></label>
                        <strong class="label">시작시간</strong>
                        <select name="start-hour1[]" class="required">
                            <option disabled selected value>시</option>
                            @for($i=0;$i<24;$i++)
                                <option value="{{$i}}">{{ $i . '시' }}</option>
                            @endfor
                        </select>
                        <select name="start-minute1[]" class="required">
                            <option disabled selected value>분</option>
                            @for($i=0;$i<=11;$i++)
                                <option value="{{$i}}">{{ $i*5 . '분' }}</option>
                            @endfor
                        </select>
                        <span>　~　</span>
                        <strong class="label">종료시간</strong>
                        <select name="end-hour1[]" class="required">
                            <option disabled selected value>시</option>
                            @for($i=0;$i<24;$i++)
                                <option value="{{$i}}">{{ $i . '시' }}</option>
                            @endfor
                        </select>
                        <select name="end-minute1[]" class="required">
                            <option disabled selected value>분</option>
                            @for($i=0;$i<=11;$i++)
                                <option value="{{$i}}">{{ $i*5 . '분' }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="form-group join category date hidden" id="regular-form">
                        <label for="date1[]" name="regular-label">일정<span class="required">*</span></label>
                        <span name="regular-count" style="clear:both;">
                            <strong class="label">날짜</strong>
                            <input type="text" id="regular-picker1" name="date1[]" class="required" readonly>
                            <label for="regular-picker1" class="btn"><i class="fa fa-calendar" aria-hidden="true"></i></label>
                            <strong class="label">시작시간</strong>
                            <select name="start-hour1[]" class="required">
                                <option value disabled selected>시</option>
                                @for($i=0;$i<24;$i++)
                                    <option value="{{$i}}">{{ $i . '시' }}</option>
                                @endfor
                            </select>
                            <select name="start-minute1[]" class="required">
                                <option value disabled selected>분</option>
                                @for($i=0;$i<=11;$i++)
                                    <option value="{{$i}}">{{ $i*5 . '분' }}</option>
                                @endfor
                            </select>
                            <span>　~　</span>
                            <strong class="label">종료시간</strong>
                            <select name="end-hour1[]" class="required">
                                <option value disabled selected>시</option>
                                @for($i=0;$i<24;$i++)
                                    <option value="{{$i}}">{{ $i . '시' }}</option>
                                @endfor
                            </select>
                            <select name="end-minute1[]" class="required">
                                <option value disabled selected>분</option>
                                @for($i=0;$i<=11;$i++)
                                    <option value="{{$i}}">{{ $i*5 . '분' }}</option>
                                @endfor
                            </select>
                        </span>
                    </div>
                    <div class="add-remove">
                        <p class="notice">동일한 커리큘럼의 레슨은 최대 3개까지 등록 가능합니다.</p>
                        <div class="add-del">
                            <a class="add date oneday" href="#"><i class="fa fa-plus" aria-hidden="true"></i>추가</a>
                            <a class="del date" href="#"><i class="fa fa-minus" aria-hidden="true"></i>삭제</a>
                        </div>
                    </div>
                    <div class="form-group join">
                        <label for="howmany">인원<span class="required">*</span></label>
                        <input type="radio" id="one-to-one" name="howmany" value="1:1" class="required"/>
                        <label for="one-to-one">1:1</label>
                        <input type="radio" id="group" name="howmany" value="그룹" class="required"/>
                        <label for="group">그룹</label>
                        <span class="detail">최소 <input type="text" name="howmany_min" class="small required digits group-active" disabled/> 명 ~ 최대 <input type="text" name="howmany_max" class="small required digits group-active" disabled/> 명</span>
                    </div>
                    <div class="form-group join">
                        <label for="cost">비용<span class="required">*</span></label>
                        <input type="text" id="cost" name="cost" placeholder="숫자만 입력하세요" class="required digits"/>
                        <span style="color:#aaa">원</span>
                    </div>
                    <script>
                        $('input#group').click(function(){
                            $('input.group-active').removeAttr('disabled');
                        });
                        $('input#one-to-one').click(function(){
                            $('input.group-active').attr('disabled', 'disabled');
                        });
                    </script>
                </div>
                <div class="form-group button">
                    <input type="submit" class="btn next" value="다음 단계" name="one-step"/>
                    <a class="btn"/>취소</a>
                </div>
            </div>
            <!--- 2STEP -->
            <div id="two-step" class="hidden">
                <h2>레슨 소개</h2>
                <div class="group">
                    <div class="form-group join">
                        <label for="lesson-name">레슨명<span class="required">*</span></label>
                        <input type="text" id="lesson-name" name="lesson-name" maxlength="20" placeholder="레슨 이름은 최대 20자를 넘을 수 없습니다." class="required long"/>
                        <span class="example">예시) 운빨NO! 제대로 배우는 볼링</span>
                    </div>
                    <div class="form-group join career">
                        <label for="lesson-intro">레슨 소개<span class="required">*</span></label>
                        <textarea id="lesson-intro" name="lesson-intro" maxlength="700" placeholder="레슨 진행 과정, 이런 사람에게 추천 등 레슨에 대해 자유롭게 소개해주세요. 상세할수록 수강생 모집에 도움이 됩니다." class="required"></textarea>
                        <a class="example" href="#">예시 보기</a>
                        <span class="length">최대 700자</span>
                    </div>
                    <div class="form-group join career">
                        <label for="lesson-goal">목표<span class="required">*</span></label>
                        <textarea id="lesson-goal" name="lesson-goal" maxlength="700" placeholder="레슨을 통해 무엇을 배울 수 있는 지 입력해주세요." class="required"></textarea>
                    </div>
                    <div class="form-group join career">
                        <label for="curriculum">커리큘럼<span class="required">*</span></label>
                        <textarea id="curriculum" name="curriculum" maxlength="700" placeholder="레슨 과정별 소요시간 또는 주차별 과정을 입력해주세요." class="required"></textarea>
                    </div>
                    <div class="form-group join">
                        <label for="required">수강요건</label>
                        <input type="text" id="required" name="required" maxlength="20" placeholder="레슨 수강을 위해 수강생이 갖춰야할 요건을 입력해주세요." class="very-long"/>
                    </div>
                    <div class="form-group join">
                        <label for="lesson-ready">준비물</label>
                        <input type="text" id="lesson-ready" name="lesson-ready" maxlength="20" class="very-long"/>
                    </div>
                    <div class="form-group join category">
                        <label for="lesson-etc[]">포함사항</label>
                        <input type="checkbox" id="rental" name="lesson-etc[]" value="장비대여"/>
                        <label for="rental">장비대여</label>
                        <input type="checkbox" id="parking" name="lesson-etc[]" value="주차지원"/>
                        <label for="parking">주차 지원</label>
                        <input type="checkbox" id="fittingroom" name="lesson-etc[]" value="탈의실완비"/>
                        <label for="fittingroom">탈의실 완비</label>
                        <input type="checkbox" id="showerroom" name="lesson-etc[]" value="샤워실완비"/>
                        <label for="showerroom">샤워실 완비</label>
                        <input type="checkbox" id="car" name="lesson-etc[]" value="차량지원"/>
                        <label for="car">차량지원</label>
                        <input type="text" id="lesson-etc" name="lesson-etc[]" class="detail very-long" placeholder="기타 포함사항이 있다면 적어주세요."/>
                    </div>
                    <div class="form-group join career">
                        <label for="lesson-tag">태그<span class="required">*</span></label>
                        <input type="text" id="lesson-tag" name="inputTag" class="very-long" placeholder="#레슨 주제_자동_태그"/>
                        <textarea class="tag_result required" name="lesson-tag" readonly></textarea>
                        <span class="tag_result"></span>
                    </div>
                </div>
                <h2>갤러리</h2>
                <p class="notice warning">※ 저화질, 왜곡된 사진, 또는 저작권에 문제가 있는 이미지 파일은 올리지 않도록 주의해주세요.</p>
                <div class="group">
                    <div class="form-group join">
                        <label>이미지 파일<span class="required">*</span></label>
                        <span class="file"><i class="fa fa-paperclip" aria-hidden="true"></i>첨부</span>
                        <input type="file" id="images" name="images[]" class="required" multiple/>
                        <span class="detail">최대 20장</span>
                    </div>
                </div>
                <div class="form-group button">
                    <a href="#" class="btn prev" name="one-step">이전 단계</a>
                    <input type="submit" class="btn next" value="다음 단계" name="two-step"/>
                </div>
            
            </div>
            <!--- 3STEP -->
            <div class="hidden" id="final-step">
                <h2>카테고리</h2>
                <div class="group">
                    <div class="form-group join category">
                        <label for="category" name="category-label">카테고리분류<span class="required">*</span></label>
                        <span name="category[]" class="result"></span>
                        <span name="category-detail[]" class="result"></span>
                    </div>
                </div>
                <h2>기본정보</h2>
                <div class="group">
                    <div class="form-group join category">
                        <label for="location">장소<span class="required">*</span></label>
                        <span name="location" class="result"></span>
                    </div>
                    <div class="form-group join">
                        <label for="class">클래스 구분<span class="required">*</span></label>
                        <span name="class" class="result"></span>
                        <span class="result"> : 주 </span><span name="howmany_week"></span><span class="result"> 회 / 총 </span><span name="howmany_total"></span><span class="result"> 회</span>
                    </div>
                    <div class="form-group join career" name="oneday">
                        <label for="date">일정<span class="required">*</span></label>
                        <span name="date1[]" class="result"></span>
                        <span name="start-hour1[]" class="result"></span>
                        <span name="start-minute1[]" class="result"></span>
                        <span name="end-hour1[]" class="result"></span>
                        <span name="end-minute1[]" class="result"></span>
                        <span name="date2[]" class="result"></span>
                        <span name="start-hour2[]" class="result"></span>
                        <span name="start-minute2[]" class="result"></span>
                        <span name="end-hour2[]" class="result"></span>
                        <span name="end-minute2[]" class="result"></span>
                        <span name="date3[]" class="result"></span>
                        <span name="start-hour3[]" class="result"></span>
                        <span name="start-minute3[]" class="result"></span>
                        <span name="end-hour3[]" class="result"></span>
                        <span name="end-minute3[]" class="result"></span>
                    </div>
                    <div class="form-group join">
                        <label for="howmany">인원<span class="required">*</span></label>
                        <span name="howmany" class="result"></span>
                        <span class="result">최소 </span><span name="howmany_min" class="result"/></span><span class="result"> 명 ~ 최대 </span><span name="howmany_max" class="result"> 명</span>
                    </div>
                    <div class="form-group join">
                        <label for="cost">비용<span class="required">*</span></label>
                        <span name="cost" class="result"></span><span class="result">원</span>
                    </div>
                </div>
                <h2>레슨 소개</h2>
                <div class="group">
                    <div class="form-group join">
                        <label for="lesson-name">레슨명<span class="required">*</span></label>
                        <span name="lesson-name" class="result"></span>
                    </div>
                    <div class="form-group join career">
                        <label for="lesson-intro">레슨 소개<span class="required">*</span></label>
                        <span name="lesson-intro" class="result"></span>
                    </div>
                    <div class="form-group join career">
                        <label for="lesson-goal">목표<span class="required">*</span></label>
                        <span name="lesson-goal" class="result"></span>
                    </div>
                    <div class="form-group join career">
                        <label for="curriculum">커리큘럼<span class="required">*</span></label>
                        <span name="curriculum" class="result"></span>
                    </div>
                    <div class="form-group join">
                        <label for="required">수강요건</label>
                        <span name="requires" class="result"></span>
                    </div>
                    <div class="form-group join">
                        <label for="lesson-ready">준비물</label>
                        <span name="lesson-ready" class="result"></span>
                    </div>
                    <div class="form-group join category">
                        <label for="lesson-etc[]">포함사항</label>
                        <span name="lesson-etc[]" class="result"></span>
                    </div>
                    <div class="form-group join category">
                        <label for="lesson-tag">태그<span class="required">*</span></label>
                        <span name="lesson-tag" class="result"></span>
                    </div>
                </div>
                <h2>갤러리</h2>
                <div class="group">
                    <div class="form-group join">
                        <label>이미지 파일<span class="required">*</span></label>
                        <span name="images[]" class="result"></span>
                    </div>
                </div>
                <div class="form-group button">
                    <a href="#" class="btn prev" name="two-step">이전 단계</a>
                    <input type="submit" class="btn next" value="등록"/>
                    <a href="#" onClick="history.back()" class="btn">취소</a>
                </div>
            </div>
        </form>
        <div id="modal">
            <h1>[카테고리] 뮤직엔터 / 피아노</h1>
            <p>초보자를 위한 피아노 레슨입니다.</p>
            <p>초보자 분들도 쉽게 피아노를 배울 수 있게 이론과 실습을 위주로 수업을 진행하고 있어요.</p>
            <p>피아노에 대한 실력을 기름과 동시에 흥미도 느낄 수 있게끔 쉽지만 귀에 익은 곡들을 먼저 실습할 계획입니다. 이론 또한 최대한 쉽게 가르쳐 드리고 피아노를 배우시는 목적에 맞춰 진도를 나가기 때문에 부담스럽지 않으실 거예요!</p>
            <p>성인들도 새로운 악기를 배우는데 전혀 문제 없다는 거, 해보시면 아실 거예요!</p>
            <a id="close" href="#">[닫기]</a>
        </div>
    </div>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <script type="text/javascript" src="/jquery.validation.1.15.0/jquery.validate.js"></script>
    <script type="text/javascript" src="/jquery.validation.1.15.0/messages_ko.min.js"></script>
    <script type="text/javascript" src="/jquery.validation.1.15.0/additional-methods.js"></script>
    <script type="text/javascript" src="/js/script.js"></script>
    <script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
    <!---주소검색-->
    <script>
        function sample6_execDaumPostcode() {
            new daum.Postcode({
                oncomplete: function(data) {
                    // 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.

                    // 각 주소의 노출 규칙에 따라 주소를 조합한다.
                    // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
                    var fullAddr = ''; // 최종 주소 변수
                    var extraAddr = ''; // 조합형 주소 변수

                    // 사용자가 선택한 주소 타입에 따라 해당 주소 값을 가져온다.
                    if (data.userSelectedType === 'R') { // 사용자가 도로명 주소를 선택했을 경우
                        fullAddr = data.roadAddress;

                    } else { // 사용자가 지번 주소를 선택했을 경우(J)
                        fullAddr = data.jibunAddress;
                    }

                    // 사용자가 선택한 주소가 도로명 타입일때 조합한다.
                    if(data.userSelectedType === 'R'){
                        //법정동명이 있을 경우 추가한다.
                        if(data.bname !== ''){
                            extraAddr += data.bname;
                        }
                        // 건물명이 있을 경우 추가한다.
                        if(data.buildingName !== ''){
                            extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
                        }
                        // 조합형주소의 유무에 따라 양쪽에 괄호를 추가하여 최종 주소를 만든다.
                        fullAddr += (extraAddr !== '' ? ' ('+ extraAddr +')' : '');
                    }

                    // 우편번호와 주소 정보를 해당 필드에 넣는다.
                    document.getElementById('sample6_postcode').value = data.zonecode; //5자리 새우편번호 사용
                    document.getElementById('sample6_address').value = fullAddr;

                    // 커서를 상세주소 필드로 이동한다.
                    if( $('#sample6_postcode').hasClass('error') ){
                        $('#sample6_postcode, #sample6_address').removeClass('error').addClass('valid');
                    };
                    document.getElementById('sample6_address').focus();
                    $('#sample6_postcode').parent().children('span.error').html('').addClass('valid');
                }
            }).open();
        }
    </script>
@endsection