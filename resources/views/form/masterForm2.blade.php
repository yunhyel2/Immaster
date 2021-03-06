@extends('layouts.mainNav')

@section('content')
    <div class="shadow"></div>
    <div class="page form">
        <h1 class="hidden">마스터로 등록하기</h1>
        <nav class="form-navi">
            <ul>
                <li class="active" name="one-step">기본정보</li>
                <li name="two-step">마스터소개</li>
                <li name="final-step">등록하기</li>
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
                        <label for="location" name="location-label">주 활동 장소<span class="required">*</span></label>
                        <select name="location[]" class="required">
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
                        <select name="location2[]" class="required"> 
                            <option value="">선택하세요</option> 
                        </select> 
                        <script type="text/javascript"> 
                            $(document).ready(function(){ 
                                $('select[name="location[]"]').change(function(){ 
                                    $this = $(this);
                                    jQuery.ajax({ 
                                        type:"POST", 
                                        url:"/plugin/joso.php", 
                                        data:"Name="+$(this).val(), 
                                        success:function(msg){ 
                                            $this.next().html(msg); 
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
                        <label for="date" name="date-label">요일 및 시간<span class="required">*</span></label>
                        <select id="date" name="master-date[]" class="required">
                            <option value=''>선택하세요</option> 
                            <option value='월요일'>월요일</option> 
                            <option value='화요일'>화요일</option> 
                            <option value='수요일'>수요일</option> 
                            <option value='목요일'>목요일</option> 
                            <option value='금요일'>금요일</option> 
                            <option value='토요일'>토요일</option> 
                            <option value='일요일'>일요일</option> 
                        </select>
                        <select name="master-date2[]" class="required"> 
                            <option value="">선택하세요</option>
                            <option value='오전'>오전</option>
                            <option value='오후'>오후</option>  
                        </select> 
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
                        <input type="text" id="intro" name="intro" maxlength="30" placeholder="마스터님을 한 줄로 표현해주세요." class="required long"/>
                        <span>최대 30자</span>
                    </div>
                    <div class="form-group join career">
                        <label for="detail-intro">자기소개<span class="required">*</span></label>
                        <textarea id="detail-intro" name="detail-intro" maxlength="500" placeholder="마스터가 된 과정, 포부, 나만의 개성과 노하우 등을 자유롭게 적어주세요." class="required"/></textarea>
                        <a class="example" href="#">예시 보기</a>
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
                        <input type="file" id="bankbook" name="bankbook" class="required" required/>
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
                    <a href="#" class="btn prev" name="one-step">이전 단계</a>
                    <input type="submit" class="btn next" value="다음 단계" name="two-step"/>
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
                    <div class="form-group join career">
                        <label for="category">카테고리분류<span class="required">*</span></label>
                        <span name="category[]" class="result"></span>
                        <span name="category-detail[]" class="result"></span>
                    </div>
                </div>
                <h2>장소 및 일정</h2>
                <div class="group">
                    <div class="form-group join">
                        <label for="location">주 활동 장소<span class="required">*</span></label>
                        <span name="location[]" class="result"></span>
                        <span name="location2[]" class="result"></span>
                    </div>
                    <div class="form-group join">
                        <label for="date">요일 및 시간<span class="required">*</span></label>
                        <span name="master-date[]" class="result"></span>
                        <span name="master-date2[]" class="result"></span>
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
                        <span class="result">블로그 : </span><span name="sns1" class="result"></span><span><br/></span>
                        <span class="result">페이스북 : </span><span name="sns2" class="result"></span><span><br/></span>
                        <span class="result">인스타 : </span><span name="sns3" class="result"></span><span><br/></span>
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
                    <a href="#" class="btn prev" name="two-step">이전 단계</a>
                    <input type="submit" class="btn next" value="등록"/>
                    <a href="#" onClick="history.back()" class="btn">취소</a>
                </div>
            </div>
        </form>
        <div id="modal">
            <h1>[카테고리] 외국어 / 영어회화</h1>
            <p>안녕하세요! 영어회화 강사 Chris입니다.</p>
            <p>미국LA에서 15년 유학생활을 마치고 2년 전에 한국에 돌아왔어요.<br/>본격적으로 영어를 가르친 지 1년이 조금 넘었구요, 본업은 평범한 회사원이랍니다.</p>
            <p>저도 회사생활을 하면서 느끼는 것이지만 요즘은 기본 이상의 비즈니스 수준 대화를 위한 영어회화가 필수인 곳들이 수두룩하죠. 취업, 교환학생, 유학을 위해 꼭 해야 하지만 나보다 잘 하는 사람을 보면 '해서 뭐하나 어차피 쟤보단 못할 텐데'싶은 영어!<br/>저 Chris가 돌파구가 되어 드릴게요!</p>
            <p>미드와 영화에서 자주 쓰이는 회화 표현들, 책으로는 배울 수 없는 실생활 문장들, TED 등의 연설연상에서 추출한 발표에 쓰이는 표현과 문장들을 활용한 수업으로 단기간에 회화 실력을 쑥 올릴 수 있습니다!</p>
            <p>영어에 대한 기본기가 없다고 망설일 필요 없어요. 가장 중요한 건 자신감(정말로요)!<br/>Chris와 함께 영어 회화 스트레스 없이 배워봅시다!</p>
            <a id="close" href="#">[닫기]</a>
        </div>
    </div>
    <script type="text/javascript" src="/jquery.validation.1.15.0/jquery.validate.js"></script>
    <script type="text/javascript" src="/jquery.validation.1.15.0/messages_ko.min.js"></script>
    <script type="text/javascript" src="/jquery.validation.1.15.0/additional-methods.js"></script>
    <script type="text/javascript" src="/js/script.js"></script>
@endsection