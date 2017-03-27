//Validation
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
                        $formData = $('form.validate').serializeArray();
                        console.log($formData);
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
                                }else if( data.name.indexOf('[]') != -1 ){
                                    if( data.name == 'category[]' ){
                                        $('div#final-step span[name="'+data.name+'"]').parent().append('<span class="result">'+data.value+'</span><span class="result"> > </span>');
                                    }else{
                                        $('div#final-step span[name="'+data.name+'"]').parent().append('<span class="result"> '+data.value+'</span>');
                                        if( data.name == 'category-detail[]' ){
                                            $('div#final-step span[name="'+data.name+'"]').parent().append('<span class="result"><br/></span>');
                                        }else if( data.name.indexOf('hour') != -1 ){
                                            $('div#final-step span[name="'+data.name+'"]').parent().append('<span class="result"> 시 </span>');
                                        }else if( data.name.indexOf('minute') != -1 ){
                                            if( data.name.indexOf('start') != -1 ){
                                                $('div#final-step span[name="'+data.name+'"]').parent().append('<span class="result"> 분 ~ </span>');
                                            }else if( data.name.indexOf('end') != -1 ){
                                                $('div#final-step span[name="'+data.name+'"]').parent().append('<span class="result"> 분 , </span>');
                                            }else{
                                                $('div#final-step span[name="'+data.name+'"]').parent().append('<span class="result"> 분 </span>');
                                            }
                                        }else{
                                            $('div#final-step span[name="'+data.name+'"]').parent().append('<span class="result"> / </span>');
                                        }
                                    }
                                }else{
                                    $('div#final-step span[name="'+data.name+'"]').html(data.value);
                                }
                            }
                        });
                    }
                }
            };
        }, 
        errorClass: 'error',
        errorElement: 'span',
        errorPlacement: function(error, element) {
            error.insertAfter( element.closest('div.form-group').children(':last-child') );
        }
    });

//Form
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
    $('a.prev').on('click', function(e){
        $name = $(this).attr('name');
        $('div#'+$name).removeClass('hidden').next().addClass('hidden');
        $('li[name="'+$name+'"]').addClass('active').next().removeClass('active');
    });
    $('a.add:not(.date)').on('click', function(e){
        e.preventDefault();
        $content = $(this).parents('div.add-remove').prev('.form-group').html();
        $name = $(this).parents('div.add-remove').prev('.form-group').find('label').attr('name');
        $count = document.getElementsByName($name).length;
        if( $count < 3 ){
            if( $(this).parents('div.add-remove').prev('.form-group').hasClass('category') ){
                $(this).parents('div.add-remove').prev('.form-group').after('<div class="form-group join category" style="clear:both;">'+$content+'</div>');
            }else{
                $(this).parents('div.add-remove').prev('.form-group').after('<div class="form-group join" style="clear:both;">'+$content+'</div>');
            };
        };
    });
    $('a.del').on('click', function(e){
        e.preventDefault();
        $name = $(this).parents('div.add-remove').prev('.form-group').find('label').attr('name');
        if( document.getElementsByName($name).length > 1 ){
            $(this).parents('div.add-remove').prev('.form-group').remove();
        };
    });

//Date-add
    $('a.add.date').on('click', function(e){
        e.preventDefault();
        if( $(this).hasClass('oneday') ){
            $content = $('div#oneday-form').html();
            $name = $('div#oneday-form').find('label').attr('name');
        }else{
            $content = $('div#regular-form').html();
            $name = $('div#regular-form').find('label').attr('name');
            $tot_count = document.getElementsByName('regular-count').length;
            $reg_count = $('div#regular-form span[name="regular-count"]').length;
        };
        $count = document.getElementsByName($name).length;
        if( $count < 3 ){
            if( $(this).hasClass('oneday') ){
                $newId = 'oneday-picker' + ( $count+1 );
                $content = $content.replace( /oneday-picker1/g , $newId ).replace( /1\[]/g, ($count+1)+'[]' );
                $(this).parents('div.add-remove').prev('.form-group').after('<div class="form-group join category date" style="clear:both;">'+$content+'</div>');
            }else{
                for($i=1;$i<=$reg_count;$i++){
                    $newId = 'regular-picker' + ( $tot_count+$i );
                    $content = $content.replace( new RegExp('regular-picker'+$i ,'gi') , $newId ).replace( /1\[]/g, ($count+1)+'[]' );
                };
                $(this).parents('div.add-remove').prev('.form-group').after('<div class="form-group join category date" style="clear:both;height:'+60*$reg_count+'px">'+$content+'</div>');
            }
        };
    });
//Edit-plan
    $('a.edit-plan').on('click', function(e){
        e.preventDefault();
        $count = $('input[name="howmany_total"]').val();
        if( $count == '' ){
            alert('입력해주세요!');
        }else{
            $('div.date:not(#oneday-form):not(#regular-form)').remove();
            $('div#regular-form span.add-items').remove();
            $org_content = $('div#regular-form').find('span[name="regular-count"]').eq(0).html();
            for($i=1;$i<$count;$i++){
                $newId = 'regular-picker' + ( $i+1 );
                $content = $org_content.replace( /regular-picker1/g , $newId );
                $('div#regular-form').append('<span name="regular-count" class="add-items" style="clear:both;">'+$content+'</span>');
                $('div#regular-form').find('span:last-child strong').remove();
            }
            $('div.date:not(#oneday-form)').animate({
                height : 60*$count
            });
        };
    });

//MODAL
    $('a.example').on('click', function(e){
        e.preventDefault();
        $('div#modal').show();
        $('div.shadow').show();
        $('a#close').focus();
    });
    $('div.shadow, a#close').on('click', function(e){
        e.preventDefault();
        $('div#modal').hide();
        $('div.shadow').hide();
        $('a.example').focus();
    });
//DatePicker
    $target ='';
    for($i=1;$i<=24;$i++){
        $target = $target + ', #regular-picker' + $i;
    };
    $(document).on('click', '#oneday-picker1, #oneday-picker2, #oneday-picker3'+$target , function () {
        $(this).removeClass('hasDatepicker').datepicker({
            dateFormat: 'yy-mm-dd',
            prevText: '이전 달',
            nextText: '다음 달',
            monthNames: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
            monthNamesShort: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
            dayNames: ['일','월','화','수','목','금','토'],
            dayNamesShort: ['일','월','화','수','목','금','토'],
            dayNamesMin: ['일','월','화','수','목','금','토'],
            showMonthAfterYear: true,
            changeMonth: true,
            changeYear: true,
            yearSuffix: '년',
            minDate: 14,
            maxDate: 56
        });
    });
