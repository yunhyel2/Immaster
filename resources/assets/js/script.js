
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
                                        if( data.name == 'date2[]' || data.name == 'location2[]' ){
                                            $('div#final-step span[name="'+data.name+'"]').parent().append('<span class="result"> / </span>');
                                        }else if( data.name == 'category-detail[]' ){
                                            $('div#final-step span[name="'+data.name+'"]').parent().append('<span class="result"><br/></span>');
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
        }, errorPlacement: function(error, element) {
            error.appendTo( element.parent("td").next("td") );
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
    $('a.add').on('click', function(e){
        e.preventDefault();
        $content = $(this).parents('div.add-remove').prev('.form-group').html();
        $name = $(this).parents('div.add-remove').prev('.form-group').find('label').attr('name');
        if( document.getElementsByName($name).length < 3 ){
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
    $('a.prev').on('click', function(e){
        $name = $(this).attr('name');
        $('div#'+$name).removeClass('hidden').next().addClass('hidden');
        $('li[name="'+$name+'"]').addClass('active').next().removeClass('active');
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
