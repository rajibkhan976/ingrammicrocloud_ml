function dzsvg_receiver(arg){
    var aux = '';
    var bigaux = '';
    //console.log(arg);
    if(window.console) { console.info(arg); };

    //console.log(jQuery('#dzspb-pagebuilder-con'), jQuery('#dzspb-pagebuilder-con').css);
    if(jQuery('#dzspb-pagebuilder-con').length > 0 && jQuery('#dzspb-pagebuilder-con').eq(0).css('display')=='block' && typeof top.dzspb_lastfocused!='undefined'){
        jQuery(top.dzspb_lastfocused).val(arg);
        jQuery(top.dzspb_lastfocused).trigger('change');
    }else{


        console.info(window.mceeditor_sel, ' --- ', window.htmleditor_sel,jQuery('#wp-content-wrap').hasClass('tmce-active'));
        if(jQuery('#wp-content-wrap').hasClass('tmce-active') && window.tinyMCE.activeEditor!=null && jQuery('#content_parent').css('display')!='none'){

            if(window.mceeditor_sel!='notset'){
                if(typeof window.tinyMCE!='undefined'){
                    if(typeof window.tinyMCE.activeEditor!='undefined') {
                        window.tinyMCE.activeEditor.selection.moveToBookmark(window.tinymce_cursor);
                    }


                    if(typeof window.tinyMCE.execInstanceCommand!='undefined') {
                        window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, arg);
                    }else{

                        if(window.tinyMCE.get('content') && window.tinyMCE.get('content').execCommand) {
                            window.tinyMCE.get('content').execCommand('mceInsertContent', false, arg);
                        }else{

                            window.tinyMCE.execCommand('mceReplaceContent',false, arg);
                        }
                    }
                }


            }else{

                window.tinyMCE.execCommand('mceReplaceContent',false, arg);
            }
        }else{
            aux = jQuery("#content").val();
            //console.log('here -->'+arg+'<-- ',aux);
            bigaux = aux+arg;
            //console.log('here -->'+arg+'<-- ',bigaux,'here -->'+window.htmleditor_sel+'<-- ');
            if(window.htmleditor_sel){
                bigaux = aux.replace(window.htmleditor_sel,arg);
            }
            //console.log('here -->'+arg+'<-- ',bigaux);
            jQuery("#content").val( bigaux );
        }
    }
    //console.log(bigaux);
    jQuery.fn.zoomBox.close();
}