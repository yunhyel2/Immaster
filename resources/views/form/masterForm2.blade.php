@extends('layouts.mainNav')

@section('content')
    <div class="page form">
        <h1 class="hidden">마스터로 등록하기</h1>
        <nav class="form-navi">
            <ul>
                <li class="active" name="one-step"><a href="#">기본정보</a></li>
                <li name="two-step"><a href="#">마스터소개</a></li>
                <li name="final-step"><a href="#">등록하기</a></li>
            </ul>
        </nav>
        <form class="validate" name="master-form" method="POST" action="{{ url('/master-store') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <!--- 1STEP -->
            <div id="one-step">
                <h2>개인신상</h2>
                <div class="group">
                    <div class="form-group join">
                        <label for="email">이메일(아이디)<span class="required">*</span></label>
                        <input type="text" id="email" name="email01" class="required"/><span style="margin:0 3px;">@</span><input type="text" name="email02" class="required" placeholder="example.com"/>
                    </div>
                    <div class="form-group join">
                        <label for="name">이름<span class="required">*</span></label>
                        <input type="text" id="name" name="master_name" class="required"/>
                    </div>
                    <div class="form-group join">
                        <label for="phone">휴대전화<span class="required">*</span></label>
                        <input type="text" id="phone" name="phone" placeholder="- 없이 입력해주세요." class="required"/>
                    </div>
                    <div class="form-group join">
                        <label for="birth">생년월일</label>
                        <script language="javascript"> 
                            var today = new Date(); 
                            var toyear = parseInt(today.getFullYear()); 
                            var start = toyear 
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
                        <input type="radio" id="male" name="gender" value="남" class="required"/>
                        <label for="male">남</label>
                        <input type="radio" id="female" name="gender" value="여" class="required"/>
                        <label for="female">여</label>
                    </div>
                </div>
                <h2>카테고리</h2>
                <div class="group">
                    <div class="form-group join category">
                        <label for="category">카테고리분류<span class="required">*</span></label>
                        <select id="category" name="category" class="required">
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
                        <input type="text" name="category-detail" class="required" placeholder="구체적인 레슨 주제를 입력해주세요."/>
                        <span class="example">예시) 디퓨저, 디제잉, 포토샵, 중국어회화</span>
                    </div>
                    <div class="add-remove">
                        <p class="notice">추가 버튼을 누르면 복수의 카테고리 정보를 입력할 수 있습니다. (최대 3개)</p>
                        <div class="add-del">
                            <a class="add" href="#"><i class="fa fa-plus" aria-hidden="true"></i>추가</a>
                            <a class="del" href="#"><i class="fa fa-minus" aria-hidden="true"></i>삭제</a>
                        </div>
                    </div>
                </div>
                <h2>장소 및 일정</h2>
                <div class="group">
                    <div class="form-group join">
                        <label for="location">주 활동 장소<span class="required">*</span></label>
                        <select id="Address_D" name="location" class="required">
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
                        <select id="Address_S" name="location2" class="required"> 
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
                        <p class="notice">추가 버튼을 누르면 복수의 활동장소 정보를 입력할 수 있습니다. (최대 3개)</p>
                        <div class="add-del">
                            <a class="add" href="#"><i class="fa fa-plus" aria-hidden="true"></i>추가</a>
                            <a class="del" href="#"><i class="fa fa-minus" aria-hidden="true"></i>삭제</a>
                        </div>
                    </div>
                    <div class="form-group join">
                        <label for="date">요일 및 시간<span class="required">*</span></label>
                        <select id="date" name="date" class="required">
                            <option value=''>선택하세요</option> 
                            <option value='월요일'>월요일</option> 
                            <option value='화요일'>화요일</option> 
                            <option value='수요일'>수요일</option> 
                            <option value='목요일'>목요일</option> 
                            <option value='금요일'>금요일</option> 
                            <option value='토요일'>토요일</option> 
                            <option value='일요일'>일요일</option> 
                        </select>
                        <select name="date2" class="required"> 
                            <option value="">선택하세요</option>
                            <option value='오전'>오전</option>
                            <option value='오후'>오후</option>  
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
                        <span class="example">선호하는 일정을 선택해주세요</span>
                    </div>
                    <div class="add-remove">
                        <p class="notice">추가 버튼을 누르면 복수의 활동장소 정보를 입력할 수 있습니다. (최대 3개)</p>
                        <div class="add-del">
                            <a class="add" href="#"><i class="fa fa-plus" aria-hidden="true"></i>추가</a>
                            <a class="del" href="#"><i class="fa fa-minus" aria-hidden="true"></i>삭제</a>
                        </div>
                    </div>
                </div>
                <h2>Career</h2>
                <div class="group">
                    <div class="form-group join career">
                        <label for="career">경력사항</label>
                        <textarea id="career" name="career" maxlength="500" placeholder="업무 경력, 수상 내역, 출간 도서, 관련 자격증 등 마스터임을 보여줄 수 있는 경력 사항을 간략하게 적어주세요."></textarea>
                        <span class="length">최대 500자</span>
                    </div>
                </div>
                <div class="form-group button">
                    <input type="submit" class="btn next" value="다음 단계" name="one-step"/>
                    <a class="btn"/>취소</a>
                </div>
            </div>
            <!--- 2STEP -->
            <div id="two-step" class="hidden">
                <h2>자기소개</h2>
                <div class="group">
                    <div class="form-group join">
                        <label for="intro">한줄 소개<span class="required">*</span></label>
                        <input type="text" id="intro" name="intro" maxlength="30" placeholder="마스터님을 한 줄로 표현해주세요." class="required"/>
                        <span>최대 30자</span>
                    </div>
                    <div class="form-group join career">
                        <label for="detail-intro">자기소개<span class="required">*</span></label>
                        <textarea id="detail-intro" name="detail-intro" maxlength="500" placeholder="마스터가 된 과정, 포부, 나만의 개성과 노하우 등을 자유롭게 적어주세요." class="required"/></textarea>
                        <span class="length">최대 500자</span>
                    </div>
                    <div class="form-group join career">
                        <label for="sns">SNS주소</label>
                        <input type="text" id="sns" class="sns" name="sns1" placeholder="블로그주소"/>
                        <input type="text" name="sns2" class="sns" placeholder="www.facebook.com/"/>
                        <input type="text" name="sns3" class="sns" placeholder="www.instagram.com/"/>
                        <input type="text" name="sns4" class="sns" placeholder="카카오스토리"/>
                    </div>
                </div>
                <h2>제출 서류</h2>
                <p class="notice warning">* 유의사항<br/>사업자 등록을 하지 않은 경우, 마스터 승인 60일 내로 사업자 등록 및 통신판매업 신고(면제 제외)를 완료한 후 서류 사본을 아임마스터로 제출해야 합니다. 서류 미제출시 마스터 승인이 자동으로 취소됩니다.<br/><a href="mailto:immaster@platformstory.com">제출처 : immaster@platformstory.com</a></p>
                <div class="group">
                    <div class="form-group join">
                        <label>사업자등록증</label>
                        <input type="radio" id="business_docu_no" name="business_docu" value="0" checked>
                        <label for="business_docu_no">미등록</label>
                        <input type="radio" id="business_docu_ok" name="business_docu" value="1">
                        <label for="business_docu_ok">등록</label>
                        <span class="file business"><i class="fa fa-paperclip" aria-hidden="true"></i>첨부</span>
                        <input type="file" id="business_docu" name="business_docu"/>
                    </div>
                    <div class="form-group join">
                        <label>통신판매업신고증</label>
                        <input type="radio" id="sales_docu_no" name="sales_docu" value="0" checked>
                        <label for="sales_docu_no">미등록</label>
                        <input type="radio" id="sales_docu_ok" name="sales_docu" value="1">
                        <label for="sales_docu_ok">등록</label>
                        <input type="radio" id="sales_docu_notneed" name="sales_docu" value="">
                        <label for="sales_docu_notneed">면제</label>
                        <span class="file"><i class="fa fa-paperclip" aria-hidden="true"></i>첨부</span>
                        <input type="file" id="sales_docu" name="sales_docu"/>
                    </div>
                    <div class="form-group join">
                        <label>통장사본<span class="required">*</span></label>
                        <span class="file"><i class="fa fa-paperclip" aria-hidden="true"></i>첨부</span>
                        <input type="file" id="bankbook" name="bankbook" class="required"/>
                    </div>
                </div>
                <h2>갤러리</h2>
                <div class="group">
                    <div class="form-group join">
                        <label>프로필 사진<span class="required">*</span></label>
                        <span class="file"><i class="fa fa-paperclip" aria-hidden="true"></i>첨부</span>
                        <input type="file" id="profile" name="profile" class="required"/>
                    </div>
                    <div class="form-group join">
                        <label>추가 이미지</label>
                        <span class="file"><i class="fa fa-paperclip" aria-hidden="true"></i>첨부</span>
                        <input type="file" id="image" name="image"/>
                        <span class="example">예시) 작품 사진, 레슨 사진</span>
                    </div>
                </div>
                <div class="form-group button">
                    <input type="submit" class="btn next" value="다음 단계" name="two-step"/>
                    <a class="btn"/>임시저장</a>
                </div>
            
            </div>
            <!--- 3STEP -->
            <div class="hidden" id="final-step">
                <h2>개인신상</h2>
                <div class="group">
                    <div class="form-group join">
                        <label for="email">이메일(아이디)<span class="required">*</span></label>
                        <span name="email01" class="result"></span><span class="result">@</span><span name="email02" class="result"></span>
                    </div>
                    <div class="form-group join">
                        <label for="name">이름<span class="required">*</span></label>
                        <span name="master_name" class="result"></span>
                    </div>
                    <div class="form-group join">
                        <label for="phone">휴대전화<span class="required">*</span></label>
                        <span name="phone" class="result"></span>
                    </div>
                    <div class="form-group join">
                        <label for="birth">생년월일</label>
                        <span name="birth1" class="result"></span><span class="result">년</span>
                        <span name="birth2" class="result"></span><span class="result">월</span>
                        <span name="birth3" class="result"></span><span class="result">일</span>
                    </div>
                    <div class="form-group join">
                        <label for="gender">성별<span class="required">*</span></label>
                        <span name="gender" class="result"></span><span class="result">성</span>
                    </div>
                </div>
                <h2>카테고리</h2>
                <div class="group">
                    <div class="form-group join category">
                        <label for="category">카테고리분류<span class="required">*</span></label>
                        <span name="category" class="result"></span>
                        <span class="result"> > </span>
                        <span name="category-detail" class="result"></span>
                    </div>
                </div>
                <h2>장소 및 일정</h2>
                <div class="group">
                    <div class="form-group join">
                        <label for="location">주 활동 장소<span class="required">*</span></label>
                        <span name="location" class="result"></span>
                        <span name="location2" class="result"></span>
                    </div>
                    <div class="form-group join">
                        <label for="date">요일 및 시간<span class="required">*</span></label>
                        <span name="date" class="result"></span>
                        <span name="date2" class="result"></span>
                    </div>
                </div>
                <h2>Career</h2>
                <div class="group">
                    <div class="form-group join career">
                        <label for="career">경력사항</label>
                        <span name="career" class="result"></span>
                    </div>
                </div>
                <h2>자기소개</h2>
                <div class="group">
                    <div class="form-group join">
                        <label for="intro">한줄 소개<span class="required">*</span></label>
                        <span name="intro" class="result"></span>
                    </div>
                    <div class="form-group join career">
                        <label for="detail-intro">자기소개<span class="required">*</span></label>
                        <span name="detail-intro" class="result"></span>
                    </div>
                    <div class="form-group join career">
                        <label for="sns">SNS주소</label>
                        <span class="result">블로그 : </span><span name="sns1" class="result"><br/></span>
                        <span class="result">페이스북 : </span><span name="sns2" class="result"><br/></span>
                        <span class="result">인스타 : </span><span name="sns3" class="result"><br/></span>
                        <span class="result">카카오스토리 : </span><span name="sns4" class="result"></span>
                    </div>
                </div>
                <h2>제출 서류</h2>
                <p class="notice warning">* 유의사항<br/>사업자 등록을 하지 않은 경우, 마스터 승인 60일 내로 사업자 등록 및 통신판매업 신고(면제 제외)를 완료한 후 서류 사본을 아임마스터로 제출해야 합니다. 서류 미제출시 마스터 승인이 자동으로 취소됩니다.<br/><a href="mailto:immaster@platformstory.com">제출처 : immaster@platformstory.com</a></p>
                <div class="group">
                    <div class="form-group join">
                        <label>사업자등록증</label>
                        <span name="business_docu" class="result"></span>
                    </div>
                    <div class="form-group join">
                        <label>통신판매업신고증</label>
                        <span name="sales_docu" class="result"></span>
                    </div>
                    <div class="form-group join">
                        <label>통장사본<span class="required">*</span></label>
                        <span name="bankbook" class="result"></span>
                    </div>
                </div>
                <h2>갤러리</h2>
                <div class="group">
                    <div class="form-group join">
                        <label>프로필 사진<span class="required">*</span></label>
                        <span name="profile" class="result"></span>
                    </div>
                    <div class="form-group join">
                        <label>추가 이미지</label>
                        <span name="image" class="result"></span>
                    </div>
                </div>
                <div class="form-group button">
                    <input type="submit" class="btn next" value="등록"/>
                    <a href="#" onClick="history.back()" class="btn">취소</a>
                </div>
            </div>
        </form>
    </div>
    <script type="text/javascript" src="/jquery.validation.1.15.0/jquery.validate.js"></script>
    <script type="text/javascript" src="/jquery.validation.1.15.0/messages_ko.min.js"></script>
    <script type="text/javascript" src="/jquery.validation.1.15.0/additional-methods.js"></script>
    <script>
        jQuery.validator.setDefaults({
            debug: true,
            success: "valid"
        });
        $('form.validate').validate({
            submitHandler: function(form) {
                // do other things for a valid form
                if( $('nav.form-navi').find('li[name="final-step"]').hasClass('active') ){
                    if( confirm('등록하시겠습니까?') ){
                        form.submit();
                    };
                }else{
                    if( confirm('다음 단계로 넘어가시겠습니까?') ){
                        if( $('nav.form-navi').find('li[name="one-step"]').hasClass('active') ){
                            $('div#two-step').removeClass('hidden').siblings('div').addClass('hidden');
                            $('nav.form-navi').find('li').removeClass('active');
                            $('nav.form-navi').find('li[name="one-step"]').next().addClass('active');
                        }else{
                            $('div#final-step').removeClass('hidden').siblings('div').addClass('hidden');
                            $('nav.form-navi').find('li').removeClass('active');
                            $('nav.form-navi').find('li[name="two-step"]').next().addClass('active');
                            
                            //FinalCheck
                            $formData = $('form[name="master-form"]').serializeArray();
                            $.each( $formData, function(i, data){
                                if( i == 0 ){
                                }else{
                                    if( data.name == 'business_docu' || data.name == 'sales_docu'){
                                        //등록.미등록.면제
                                        if( data.value == '0' ){
                                            $('div#final-step span[name="'+data.name+'"]').html('미등록');
                                        }else if( data.value == '1' ){
                                            $('div#final-step span[name="'+data.name+'"]').html('등록');
                                        }else{
                                            $('div#final-step span[name="'+data.name+'"]').html('면제');
                                        }
                                    }else{
                                        $('div#final-step span[name="'+data.name+'"]').html(data.value);
                                    }
                                }
                            });
                        }
                    }
                };
            }, errorPlacement: function(error, element) {
                error.appendTo( element.parent("td").next("td") );
            }
        });
        function finalCheck($target){
            $name = $('[name="'+$target+'"]').parents('div.group').parent().attr('id');
            var data = $('div#'+$name+' [name="'+$target+'"]').val();
            $('div#final-step span[name="'+$target+'"]').html(data);
        };
        $('nav.form-navi li a').on('click', function(e){
            e.preventDefault();
            $name = $(this).parent().attr('name');
            $(this).parent().addClass('active').siblings().removeClass('active');
            $('div#'+$name).removeClass('hidden').siblings('div').addClass('hidden');;
        });
        $('span.file').on('click', function(){
            $(this).parent().find('input[type="file"]').click();
        });
        $('input[type="file"]').on('change', function(){
            $name = $(this).attr('name');
            var fileValue = $(this).val().split('\\');
            var fileNameFull = fileValue[fileValue.length-1];
            if( fileNameFull.length > 30 ){
                fileName = fileNameFull.substring(0,30) + '...';
            }else{
                fileName = fileNameFull;
            }
            if( !$(this).prev().hasClass('fileName') ){
                $(this).before('<span class="fileName" style="font-size:11px;color:#555;"></span>');
            };
            $(this).prev('span.fileName').html('파일명 : '+fileName);
            $('div#final-step').find('span[name="'+$name+'"]').html('파일명 : '+fileName);
        });
    </script>
@endsection