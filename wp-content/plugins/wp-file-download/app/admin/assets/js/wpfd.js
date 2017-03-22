/**
 * WP File Download
 *
 * @package WP File Download
 * @author Joomunited
 * @version 1.0
 */

jQuery(document).ready(function($) {
    if(typeof(Wpfd)=='undefined'){
        Wpfd ={};
        Wpfd.maxfilesize = 300;
    }

    _ = function(text){
        if(typeof(l10n)!=='undefined'){
            return l10n[text];
        }
        return text;
    };

    /**
     * Left side panel show/hide
     */
    $('#df-panel-toggle').toggle(
        function (e) {
            e.preventDefault();
            $('#mycategories').animate({"margin-left":'-23%'}, 300, function() {
                $('#pwrapper').animate({'width':"99%", 'margin-left':'10px'},200);
                $('#df-panel-toggle span').css({'right':'-14px'}).removeClass('icon-circle-arrow-left').addClass('icon-circle-arrow-right');
            });
        },
        function(e){
            e.preventDefault();
            $('#pwrapper').animate({'width':"76%",'margin-left':'0'},200, function() {
                $('#mycategories').animate({"margin-left":0},300, function() {
                    $('#df-panel-toggle span').css({'right':'0px'}).removeClass('icon-circle-arrow-right').addClass('icon-circle-arrow-left');
                });
            });
        }
    );

    /**
     * Init sortable files 
     * Save order after each sort
     */
    $('#preview').sortable({ 
        placeholder: 'highlight file',
        revert: 300,
        distance: 15,
        items: ".file",
        helper : 'clone',
        update : function(){
            var json='';
            $.each($('#preview .file'),function(i,val){
                if(json!==''){
                    json+=',';
                }
                json+='"'+i+'":'+$(val).data('id-file');
            });
            json = '{'+json+'}';
            $.ajax({
                url     :   ajaxurl+"task=files.reorder&order="+json,
                type    :   "POST"
            });
        },
        /** Prevent firefox bug positionnement **/
        start: function (event, ui) {
            var userAgent = navigator.userAgent.toLowerCase();
            if( ui.helper !== "undefined" && userAgent.match(/firefox/) ){
                ui.helper.css('position','absolute').css('margin-top', $(window).scrollTop() );
            }
        },
        beforeStop: function (event, ui) {
            var userAgent = navigator.userAgent.toLowerCase();
            if( ui.offset !== "undefined" && userAgent.match(/firefox/) ){
                ui.helper.css('margin-top', 0);
            }
        }
    });
    $('#preview').disableSelection();
    
    /* init menu actions */
    initMenu();
    /*Color field*/
    initColor();
    /* Load category */
    updatepreview();

    /* Load nestable */
    $('.nested').nestable({maxDepth:8}).on('change', function(event, e){       
        var data = $('.nested').nestable('serialize');                       
        $.ajax({
            url     :   ajaxurl+"task=category.changeOrder",
            type    :   "POST",
            dataType : 'json', 
            data    : { dto: data } 
        }).done(function(data){
            result = jQuery.parseJSON(data);
            if(result.response===true){

            }else{
                bootbox.alert(result.response);
            }
        });
    });

    /* Init version dropbox */
    initDropboxVersion($('#fileversion'));
    $('#upload_button_version').on('click',function(){
        $('#upload_input_version').trigger('click');
        return false;
    });

    function showCategory(){
        $('.fileblock').fadeOut(function(){$('.categoryblock').fadeIn();});
        $('#insertfile').fadeOut(function(){$('#insertcategory').fadeIn();});
        
    }

    function showFile(e){
//        $('#singleimage').attr('src',$(e).attr('src'));
        $('.categoryblock').fadeOut(function(){$('.fileblock').fadeIn();});
        $('#insertcategory').fadeOut(function(){$('#insertfile').fadeIn();});
    }

    
    /**
     * Reload a category preview
     * @param id_category
     * @param id_file
     */
    function updatepreview(id_category,id_file, $ordering, $ordering_dir){
        if(typeof(id_category)==="undefined" || id_category===null){
            id_category = $('#categorieslist li.active').data('id-category');
            $('input[name=id_category]').val(id_category);
        }
        if($("#wpreview").length == 0) return;
        loading('#wpreview');

        var url = ajaxurl+"view=files&format=raw&id_category="+id_category;
        if ($ordering != null) {
            url += '&orderCol=' + $ordering;
        }

        if($ordering_dir==='asc'){
            url += '&orderDir=desc';
        }else if($ordering_dir==='desc'){
            url += url + '&orderDir=asc';
        }

        $.ajax({
            url     :   url,
            type    :   "POST"
        }).done(function(data){

            $('#preview').html($(data));

            if (wpfd_permissions.can_edit_category) {
                $('<div id="dropbox"><span class="message">'+_('Drop files here to upload', 'Drop files here to upload')+'.<i> '+_('Or use the button below', 'Or use the button below')+'</i></span><input class="hide" type="file" id="upload_input" multiple=""><a href="" id="upload_button" class="button button-primary button-big">'+_('Select files', 'Select files')+'</a></div><div class="clr"></div>').appendTo('#preview');
            }

            $('#preview .restable').restable({
                type : 'hideCols',
                priority : {0:'persistent' , 1:3, 2:'persistent'},
                hideColsDefault : [4,5]
            });

            $('#preview').sortable('refresh');

            initDeleteBtn();

            /** Init ordering **/
            $('#preview .restable thead a').click(function(e){
                e.preventDefault();
                updatepreview(null,null,$(this).data('ordering'),$(this).data('direction'));

                if($(this).data('direction')==='asc'){
                    direction = 'desc';
                }else{
                    direction = 'asc';
                }

                $('#ordering option[value="'+$(this).data('ordering')+'"]').attr('selected','selected').parent().css({'background-color':'#ACFFCD'});
                $('#orderingdir option[value="'+direction+'"]').attr('selected','selected').parent().css({'background-color':'#ACFFCD'});
            });

//            initEditBtn();
            initUploadBtn();

            initFiles();
            
            
            $('#wpreview').unbind();
            initDropbox($('#wpreview'));
//            theme = $('input[name=theme]').val();

            if(typeof(id_file)!=="undefined"){
                $('#preview .file[data-id-file='+id_file+']').trigger('click');
            }else{
                showCategory();
                if(typeof($ordering)==='undefined'){
                    loadGalleryParams();
                }
            }
            rloading('#wpreview');
        });
        initEditBtn();
        initDeleteBtn();
      
    }

    function initDeleteBtn(){
        $('.actions .trash').unbind('click').click(function(e){
                    that = this;
                    bootbox.confirm(_('Are you sure', 'Are you sure')+'?',function(result){
                        if(result===true){
                            //Delete file
                            id_file = $(that).parents('.file').data('id-file');
                            $.ajax({
                                url     :   ajaxurl+"task=file.delete&id_file="+id_file,
                                type    :   "POST"
                            }).done(function(data){
                                response = jQuery.parseJSON(data);
                                if(response.response===true){
                                    $(that).parents('.file').fadeOut(500, function() {$(this).remove();});
                                }
                            });
                        }
                    }); 
                    return false;
                });
    }
    
    
    function initFiles(){
//        if(gcaninsert===true){
            $(document).unbind('click.window').bind('click.window',function(e){
                if($(e.target).is('#rightcol') || $(e.target).parents('#rightcol').length>0){
                    return;
                }
                $('#preview .file').removeClass('selected');
                showCategory();
            });        

            $('#preview .file').unbind('click').click(function(e){

                $('#preview .file').removeClass('selected');
                if (!$(this).hasClass('selected')) {
                    $(this).addClass('selected');
                    loadFileParams();
                    showFile();
                } else {
                    showCategory();
                }

                e.stopPropagation();
            });
//        }
    }
    
    /**
     * Init the file edit btn
     */
    function initEditBtn(){
        $('.wbtn a.edit').unbind('click').click(function(e){  
            that = this;
            id_file = $(that).parents('.wimg').find('img.img').data('id-file');
            $.ajax({
                url     :   ajaxurl+"view=file&format=raw&id="+id_file,
                type    :   "POST"
            }).done(function(data){
                bootbox.dialog(data,[{'label':_('Save', 'Save'),'class':'btn-success','callback':function(){
                    var p = '';
                    $('#file-form .wpfdinput').each(function(index){
                        p = p + $(this).attr('name')+ '=' + $(this).attr('value') + '&';
                    });
                    $.ajax({
                            url     :   $('#file-form').attr('action'),
                            type    :   'POST',
                            data    :   p
                    }).done(function(data){
//                        console.log(data);
                    });
                }},{'label':_('Cancel', 'Cancel'),'class':'btn-warning'}],{header:_('Image parameters', 'Image parameters')});
//                result = jQuery.parseJSON(data);
//                if(result==true){
//                    $(that).parents('.wimg').fadeOut(500, function() {$(this).remove();})
//                }
            });
            return false;
        });
    }

    function loadGalleryParams(){
        id_category = $('input[name=id_category]').val();
        loading('#rightcol');
        $.ajax({
            url     :   ajaxurl+"task=category.edit&layout=form&id="+id_category
        }).done(function(data){
            $('#galleryparams').html(data);
//            rloading($('.wpfdparams'));

            $('#galleryparams .wpfdparams #visibility').change(function(){
                if($(this).val()==0){
                    $('#galleryparams .wpfdparams #visibilitywrap').hide();
                    $('#galleryparams .wpfdparams #visibilitywrap input').attr('checked',false);
                }else{
                    $('#galleryparams .wpfdparams #visibilitywrap').show();
                }
            }).trigger('change');

            $('#wpfd-theme').change(function(){
                changeTheme();
            });
            initColor();

            $('#galleryparams .wpfdparams button[type="submit"]').click(function(e){
                e.preventDefault();
                id_category = $('input[name=id_category]').val();
                $.ajax({
                    url     :   ajaxurl+"task=category.saveparams&id="+id_category,
                    type    :   "POST",
                    data    :   $('#category_params').serialize()
                }).done(function(data){
                    console.log(data);
                    result = jQuery.parseJSON(data);
                    if(result.response===true){
                        updatepreview();
                        loadGalleryParams();
                    }else{
                        bootbox.alert(result.response);
                    }
                    loadGalleryParams();
                });                
                return false;
            });
            rloading('#rightcol');
        });
    }

    function saveTemp() {
        id_category = $('input[name=id_category]').val();
        $.ajax({
            url     :   ajaxurl+"task=category.saveparams&id="+id_category,
            type    :   "POST",
            data    :   $('#category_params').serialize()
        }).done(function(data){
        });
    }

    function changeTheme() {
        theme = $('#wpfd-theme').val();
        id_category = $('input[name=id_category]').val(); console.log(theme,id_category);
       
        $.ajax({
            url     :   ajaxurl+"task=category.edit&layout=form&theme="+theme+"&onlyTheme=1&id="+id_category
        }).done(function(data){
             $('#category-theme-params').html(data);
            initColor();
        })
        
    }
    
    function loadFileParams(){
        id_file = jQuery('.file.selected').data('id-file');
        loading('#rightcol');
        $.ajax({
            url     :   ajaxurl+"task=file.display&id="+id_file
        }).done(function(data){
            $('#fileparams').html(data);
            $('#fileparams .wpfdparams button[type="submit"]').click(function(e){
                e.preventDefault();
                id_file = jQuery('.file.selected').data('id-file');
                $.ajax({
                    url     :   ajaxurl+"task=file.save&id="+id_file,
                    type    :   "POST",
                    data    :   $('#fileparams .wpfdparams textarea, #fileparams .wpfdparams input')
                }).done(function(data){
                    result = jQuery.parseJSON(data);
                    if(result.response===true){
                        loadFileParams();
                    }else{
                        bootbox.alert(result.response);
                    }
                    loadFileParams();
                    updatepreview(null,id_file);
                });                
                return false;
            });
            rloading('#rightcol');
        });
    }


    function initUploadBtn(){
        $('#upload_button').on('click',function(){
            $('#upload_input').trigger('click');
            return false;
        });
    }

    /**
     * Click on new category btn
     */
    $('#newcategory').on('click',function(){
        if (!wpfd_permissions.can_create_category) {
            bootbox.alert(wpfd_permissions.translate.wpfd_create_category);
            return false;
        }
        $.ajax({
            url     :   ajaxurl+"task=category.addCategory",
            type    : 'POST',
            data    :   $('#categoryToken').attr('name') + '=1'
        }).done(function(data){
            result = jQuery.parseJSON(data);
            if(result.response===true){
                link = ''+
                        '<li class="dd-item dd3-item" data-id-category="'+result.datas.id_category+'">'+
                            '<div class="dd-handle dd3-handle"></div>'+
                            '<div class="dd-content dd3-content">';
                                if (wpfd_permissions.can_edit_category) {
                                    link +=  '<a class="edit"><i class="icon-edit"></i></a>';
                                }
                                if (wpfd_permissions.can_delete_category) {
                                    link +=  '<a class="trash"><i class="icon-trash"></i></a>';
                                }

                                link += '<a href="" class="t">'+
                                    '<span class="title">'+result.datas.name + '</span>' +
                                '</a>'+
                            '</div>';
                $(link).appendTo('#categorieslist');
                initMenu();
                $('#mycategories #categorieslist li[data-id-category='+result.datas.id_category+'] .dd-content').click();
                $('#insertcategory').show();
                setTimeout(saveTemp, 300);
            }else{
                bootbox.alert(result.response);
            }
        });
        return false;
    });


    /**
     * Init the dropbox 
     **/    
    function initDropbox(dropbox){
        dropbox.filedrop({
                paramname:'pic',
                fallback_id:'upload_input',
                maxfiles: 30,
                maxfilesize:  Wpfd.maxfilesize,
                queuefiles: 2,
                data: {
                    id_category : function(){
                        return $('input[name=id_category]').val(); 
                    }
                },
                url: ajaxurl+'task=files.upload',

                uploadFinished:function(i,file,response){
                    if(response.response===true){
                        $.data(file).addClass('done');
//                        $.data(file).find('img').attr('src', response.datas.thumbnail);
                        $.data(file).find('img').data('id-file', response.datas.id_file);
                    }else{
                        bootbox.alert(response.response);
                        $.data(file).remove();
                    }
                },

                error: function(err, file) {
                        switch(err) {
                                case 'BrowserNotSupported':
                                        bootbox.alert(_('Your browser does not support HTML5 file uploads', 'Your browser does not support HTML5 file uploads!'));
                                        break;
                                case 'TooManyFiles':
                                        bootbox.alert(_('Too many files','Too many files')+'!');
                                        break;
                                case 'FileTooLarge':
                                        bootbox.alert(file.name+' '+_('is too large', 'is too large')+'!');
                                        break;
                                default:
                                        break;
                        }
                },

                // Called before each upload is started
                beforeEach: function(file){
                    if (!wpfd_permissions.can_edit_category) {
                        bootbox.alert(wpfd_permissions.translate.wpfd_edit_category);
                        return false;
                    }
//                        if(!file.type.match(/^image\//)){
//                                bootbox.alert(_('Only images are allowed','Only images are allowed')+'!');
//                                return false;
//                        }
                },

                uploadStarted:function(i, file, len){
                        var preview = $('<div class="file uploadplaceholder">'+
                                            '<span class="uploaded"></span>'+
                                            '<div class="progress progress-striped active">'+
                                                '<div class="bar"></div>'+
                                            '</div>'+
                                        '</div>');

                        var reader = new FileReader();

//                        image.width = '100%';
//                        image.height = '100%';

//                        reader.onload = function(e){
//
//                                // e.target.result holds the DataURL which
//                                // can be used as a source of the image:
//
//                                image.attr('src',e.target.result);
//                        };

                        // Reading the file as a DataURL. When finished,
                        // this will trigger the onload function above:
                        reader.readAsDataURL(file);

                    $('#preview .restable').after(preview);
//                        $('#dropbox').before(preview);

                        // Associating a preview container
                        // with the file, using jQuery's $.data():

                        $.data(file,preview);
                },

                progressUpdated: function(i, file, progress) {
                        $.data(file).find('.progress .bar').width(progress+'%');
                },
                
                afterAll: function(){
                    $('#preview .progress').delay(300).fadeIn(300).hide(300, function(){
                      $(this).remove();
                    });
                    $('#preview .uploaded').delay(300).fadeIn(300).hide(300, function(){
                      $(this).remove();
                    });
                    $('#preview .file').delay(1200).show(1200,function(){
                        $(this).removeClass('done placeholder');
                    });
                    updatepreview();        
//                    initDeleteBtn();
//                    initEditBtn();

                },
                rename : function(name){
                    ext = name.substr(name.lastIndexOf('.'),name.lenght);
                    name = name.substr(0, name.lastIndexOf('.'));
                    var pattern_accent = new Array("é", "è", "ê", "ë", "ç", "à", "â", "ä", "î", "ï", "ù", "ô", "ó", "ö"); 
                    var pattern_replace_accent = new Array("e", "e", "e", "e", "c", "a", "a", "a", "i", "i", "u", "o", "o", "o");
                    name = preg_replace (pattern_accent, pattern_replace_accent,name);
                    
                    name = name.replace(/\s+/gi, '-');
                    name = name.replace(/[^a-zA-Z0-9\-]/gi, '');                    
                    return name+ext;
                }
        });
    }

    if (_('close_categories') == '1') {
        $('.nested').nestable('collapseAll');
    }

    if(typeof(window.parent.tinyMCE)!=='undefined'){

        var content = window.parent.tinyMCE.activeEditor.selection.getContent();
        var file = content.match('<img.*data\-file="([0-9a-zA-Z_]+)".*?>');
        var category = content.match('<img.*data\-category="([0-9]+)".*?>');
        var file_category = content.match('<img.*data\-category="([0-9]+)".*?>');
        if(file!==null && file_category!==null){
            $('#categorieslist li').removeClass('active');
            $('#categorieslist li[data-id-category="'+file_category[1]+'"]').addClass('active');
            $('input[name=id_category]').val(file_category[1]);
            updatepreview(file_category[1],file[1]);

        }else if(category!==null){
            $('#categorieslist li').removeClass('active');
            $('#categorieslist li[data-id-category="'+category[1]+'"]').addClass('active');
            $('input[name=id_category]').val(category[1]);
            updatepreview(category[1]);
            loadGalleryParams();
        }else{
            updatepreview();
            loadGalleryParams();
        }
    }

    /**
     * Init the dropbox 
     **/    
    function initDropboxVersion(dropbox){
        dropbox.filedrop({
                paramname:'pic',
                fallback_id:'upload_input_version',
                maxfiles: 1,
                maxfilesize:  Wpfd.maxfilesize,
                queuefiles: 1,
                data: {
                    id_file : function(){
                        return $('.file.selected').data('id-file');
                    }
                },
                url: ajaxurl+'task=files.version',

                uploadFinished:function(i,file,response){
                    console.log(response);
                    if(response.response===true){
                    
                    }else{
                        bootbox.alert(response.response);
//                        $.data(file).remove();
                        $('#dropbox_version .progress').addClass('hide');
                        $('#dropbox_version .upload').removeClass('hide');
                    }
                },

                error: function(err, file) {
                        switch(err) {
                                case 'BrowserNotSupported':
                                        bootbox.alert(_('Your browser does not support HTML5 file uploads', 'Your browser does not support HTML5 file uploads!'));
                                        break;
                                case 'TooManyFiles':
                                        bootbox.alert(_('Too many files','Too many files')+'!');
                                        break;
                                case 'FileTooLarge':
                                        bootbox.alert(file.name+' '+_('is too large', 'is too large')+'!');
                                        break;
                                default:
                                        break;
                        }
                },

                // Called before each upload is started
                beforeEach: function(file){
//                        if(!file.type.match(/^image\//)){
//                                bootbox.alert(_('Only images are allowed','Only images are allowed')+'!');
//                                return false;
//                        }
                },

                uploadStarted:function(i, file, len){
//                        var preview = $('<div class="file well uploadplaceholder">'+
//                                            '<span class="uploaded"></span>'+
//                                            '<div class="progress progress-striped active">'+
//                                                '<div class="bar"></div>'+
//                                            '</div>'+
//                                        '</div>');

//                        var reader = new FileReader();

                        // Reading the file as a DataURL. When finished,
                        // this will trigger the onload function above:
//                        reader.readAsDataURL(file);

//                        preview.appendTo('#preview .table');
//                        $('#dropbox').before(preview);

                        // Associating a preview container
                        // with the file, using jQuery's $.data():
                        $('#dropbox_version .upload').addClass('hide');
                        $('#dropbox_version .progress').removeClass('hide');
//                        $.data(file,preview);
                },

                progressUpdated: function(i, file, progress) {
                        $('#dropbox_version .progress .bar').width(progress+'%');
                },
                
                afterAll: function(){
//                    $('#preview .progress').delay(300).fadeIn(300).hide(300, function(){
//                      $(this).remove();
//                    });
//                    $('#preview .uploaded').delay(300).fadeIn(300).hide(300, function(){
//                      $(this).remove();
//                    });
//                    $('#preview .file').delay(1200).show(1200,function(){
//                        $(this).removeClass('done placeholder');
//                    });
                        $('#dropbox_version .progress').addClass('hide');
                        $('#dropbox_version .upload').removeClass('hide');
                        id_file = $('.file.selected').data('id-file');
                        updatepreview(null,id_file);
//                    initDeleteBtn();
//                    initEditBtn();

                },
                rename : function(name){
                    ext = name.substr(name.lastIndexOf('.'),name.lenght);
                    name = name.substr(0, name.lastIndexOf('.'));
                    var pattern_accent = new Array("é", "è", "ê", "ë", "ç", "à", "â", "ä", "î", "ï", "ù", "ô", "ó", "ö"); 
                    var pattern_replace_accent = new Array("e", "e", "e", "e", "c", "a", "a", "a", "i", "i", "u", "o", "o", "o");
                    name = preg_replace (pattern_accent, pattern_replace_accent,name);
                    
                    name = name.replace(/\s+/gi, '-');
                    name = name.replace(/[^a-zA-Z0-9\-]/gi, '');                    
                    return name+ext;
                }
        });
    }

    
        /* Title edition */
    function initMenu(){
        /**
        * Click on delete category btn
        */
       $('#categorieslist .dd-content .trash').unbind('click').on('click',function(){
           id_category = $(this).closest('li').data('id-category');
           bootbox.confirm(_('Do you want to delete &quot;','Do you really want to delete "')+$(this).parent().find('.title').text()+'"?', function(result) {
               if(result===true){
                   $.ajax({
                       url     :   ajaxurl+"task=category.delete&id_category="+id_category,
                       type    :   'POST',
                       data    :   $('#categoryToken').attr('name') + '=1'
                   }).done(function(data){
                       result = jQuery.parseJSON(data);
                       if(result.response===true){
                           $('#mycategories #categorieslist li[data-id-category='+id_category+']').remove();
                           $('#preview').contents().remove();
                           first = $('#mycategories #categorieslist li .dd-content').first();
                           if(first.length>0){
                               first.click();
                           }else{
                               $('#insertcategory').hide();
                           }
                       }else{
                           bootbox.alert(result.response);
                       }
                   });
               }
           });
           return false;
       });
       
        /* Set the active category on menu click */
        $('#categorieslist .dd-content').unbind('click').click(function(e){
            id_category = $(this).parent().data('id-category');
            $('input[name=id_category]').val(id_category);
            updatepreview(id_category);
            $('#categorieslist li').removeClass('active');
            $(this).parent().addClass('active');
            return false;
        });
        
        $('#categorieslist .dd-content a.edit').unbind().click(function(e){

            if (!wpfd_permissions.can_edit_category) {
                bootbox.alert(wpfd_permissions.translate.wpfd_edit_category);
                return false;
            }

            e.stopPropagation();
            $this = this;
            link = $(this).parent().find('a span.title');
            oldTitle = link.text();
            $(link).attr('contentEditable',true);
            $(link).addClass('editable');
            $(link).selectText();

            $('#categorieslist a span.editable').bind('click.mm',hstop);  //let's click on the editable object
            $(link).bind('keypress.mm',hpress); //let's press enter to validate new title'
            $('*').not($(link)).bind('click.mm',houtside);

            function unbindall(){
                $('#categorieslist a span').unbind('click.mm',hstop);  //let's click on the editable object
                $(link).unbind('keypress.mm',hpress); //let's press enter to validate new title'
                $('*').not($(link)).unbind('click.mm',houtside);
            }

            //Validation       
            function hstop(event){
                event.stopPropagation();
                return false;
            }

            //Press enter
            function hpress(e){
                if ( e.which == 13 ) {
                    e.preventDefault();
                    unbindall();
                    updateTitle($(link).text());
                    $(link).removeAttr('contentEditable');
                    $(link).removeClass('editable');
                }
            }

            //click outside
            function houtside(e){
                unbindall();
                updateTitle($(link).text());
                $(link).removeAttr('contentEditable');
                $(link).removeClass('editable');
            }


            function updateTitle(title){
                id_category = $(link).parents('li').data('id-category');
                if(title!==''){
                    $.ajax({
                        url     :   ajaxurl+"task=category.setTitle&id_category="+id_category+'&title='+title,
                        type    :   "POST"
                    }).done(function(data){
                        result = jQuery.parseJSON(data);
                        if(result.response===true){
                            return true;
                        }
                        $(link).text(oldTitle);
                        return false;
                    });
                }else{
                    $(link).text(oldTitle);
                    return false;
                }

            }
        });
    }

    if (typeof l10n != 'undefined' && l10n.show_file_import) {

        $('#wpfd-jao').wpfd_jaofiletree({
            script: ajaxurl + "task=category.listdir",
            usecheckboxes: 'files',
            showroot: '/'
        });

        $('#importFilesBtn').click(function (e) {

            e.preventDefault();
            id_category = $('input[name=id_category]').val();
            var files = '';
            $($('#wpfd-jao').wpfd_jaofiletree('getchecked')).each(function () {
                files += '&files[]=' + this.file;
            });
            if (files === '') {
                return;
            }
            loading('#wpreview');
            $.ajax({
                url: ajaxurl + "task=files.import&" + $('#categoryToken').attr('name') + "=1&id_category=" + id_category,
                type: 'GET',
                data: files
            }).done(function (data) {
                result = jQuery.parseJSON(data);
                if (result.response === true) {
                    bootbox.alert(result.datas.nb + ' files imported');
                    updatepreview(id_category);
                }
            });

        });

        $('#selectAllImportFiles').click(function (e) {

            e.preventDefault();
            $('#filesimport input[type="checkbox"]').attr('checked', true);

        });
        $('#unselectAllImportFiles').click(function (e) {

            e.preventDefault();
            $('#filesimport input[type="checkbox"]').attr('checked', false);

        });
    }

    function initColor() {
        $('.wp-color-field').wpColorPicker({width: 180});
    }
    
    function loading(e){
        $(e).addClass('dploadingcontainer');
        $(e).append('<div class="dploading"></div>');
    }
    function rloading(e){
        $(e).removeClass('dploadingcontainer');
        $(e).find('div.dploading').remove();
    }
});

/**
* Insert the current category into a content editor
*/
function insertCategory(){
    id_category = jQuery('input[name=id_category]').val();
    code = '<img src="'+dir+'/app/admin/assets/images/t.gif"'+
                'data-wpfdcategory="'+id_category+'"'+
                'style="background: url('+dir+'/app/admin/assets/images/folder_download.png) no-repeat scroll center center #D6D6D6;'+
                'border: 2px dashed #888888;'+
                'height: 200px;'+
                'border-radius: 10px;'+
                'width: 99%;" data-category="'+id_category+'" />';
    window.parent.tinyMCE.execCommand('mceInsertContent',false,code);
    jQuery("#lean_overlay",window.parent.document).fadeOut(300);
    jQuery('#wpfdmodal',window.parent.document).fadeOut(300);
    return false;
}

/**
* Insert the current file into a content editor
*/
function insertFile(){
    id_file = jQuery('.file.selected').data('id-file');
    id_category = jQuery('input[name=id_category]').val();
    code = '<img src="'+dir+'/app/admin/assets/images/t.gif"'+
                'data-file="'+id_file+'"'+
                'data-wpfdfile="'+id_file+'"'+
                'data-category="'+id_category+'"'+
                'style="background: url('+dir+'/app/admin/assets/images/file_download.png) no-repeat scroll center center #D6D6D6;'+
                'border: 2px dashed #888888;'+
                'height: 100px;'+
                'border-radius: 10px;'+
                'width: 99%;" />';
    window.parent.tinyMCE.execCommand('mceInsertContent',false,code);   
    jQuery("#lean_overlay",window.parent.document).fadeOut(300);
    jQuery('#wpfdmodal',window.parent.document).fadeOut(300);
    return false;
}

//From http://jquery-howto.blogspot.fr/2009/09/get-url-parameters-values-with-jquery.html
function getUrlVars()
{
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
}

function getUrlVar(v){
    if(typeof(getUrlVars()[v])!=="undefined"){
        return getUrlVars()[v];
    }
    return null;
}

function preg_replace (array_pattern, array_pattern_replace, my_string) {var new_string = String (my_string);for (i=0; i<array_pattern.length; i++) {var reg_exp= RegExp(array_pattern[i], "gi");var val_to_replace = array_pattern_replace[i];new_string = new_string.replace (reg_exp, val_to_replace);}return new_string;}

//https://gist.github.com/ncr/399624
jQuery.fn.single_double_click = function(single_click_callback, double_click_callback, timeout) {
  return this.each(function(){
    var clicks = 0, self = this;
    jQuery(this).click(function(event){
      clicks++;
      if (clicks == 1) {
        setTimeout(function(){
          if(clicks == 1) {
            single_click_callback.call(self, event);
          } else {
            double_click_callback.call(self, event);
          }
          clicks = 0;
        }, timeout || 300);
      }
    });
  });
}