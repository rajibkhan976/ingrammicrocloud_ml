var coll_buffer=0;
var func_output='';
jQuery(document).ready(function($){
       
	setTimeout(reskin_select, 10);
    $('#insert_tests').bind('click', click_insert_tests);


    $('select[name=dzsvg_selectdb]').bind('change', change_selectdb);
       
});
function change_selectdb(e){
    var _t = jQuery(this);

    console.info(_t.val());



    jQuery('#save-ajax-loading').css('opacity', '1');
    var mainarray = _t.val();
    var data = {
        action: 'dzsvg_get_db_gals',
        postdata: mainarray
    };
    jQuery('.saveconfirmer').html('Options saved.');
    jQuery('.saveconfirmer').fadeIn('fast').delay(2000).fadeOut('fast');
    jQuery.post(ajaxurl, data, function(response) {
        if(window.console !=undefined ){  console.log('Got this from the server: ' + response); }
        jQuery('#save-ajax-loading').css('opacity', '0');

        var aux = '';
        var auxa = response.split(';');
        for(i=0;i<auxa.length;i++){
            aux+='<option>'+auxa[i]+'</option>'
        }
        $('select[name=dzsvg_selectid]').html(aux);
        $('select[name=dzsvg_selectid]').trigger('change');

    });

    return false;

}


function tinymce_add_content(arg){
	//console.log(arg);
    if(typeof(top.dzsvg_receiver)=='function'){
        top.dzsvg_receiver(arg);
    }
}

      function click_insert_tests(){
      //console.log(jQuery('#mainsettings').serialize()); 
        prepare_fout();
          tinymce_add_content(fout);
          return false;
      }

      function prepare_fout(){
          var $ = jQuery.noConflict();
          fout='';
        fout+='[dzs_videogallery';
        var _c,
        _c2
        ;
        /*
        _c = $('input[name=settings_width]');
        if(_c.val()!=''){
            fout+=' width=' + _c.val() + '';
        }
        _c = $('input[name=settings_height]');
        if(_c.val()!=''){
            fout+=' height=' + _c.val() + '';
        }
        */
        _c = $('select[name=dzsvg_selectid]');
        if(_c.val()!='' && _c.val()!='main'){
            fout+=' id="' + _c.val() + '"';
        }


          _c = $('select[name=dzsvg_selectdb]');
          if(_c.val()!=''){
              fout+=' db="' + _c.val() + '"';
          }

          if($('select[name=dzsvg_settings_separation_mode]').val()!='normal'){
              _c = $('select[name=dzsvg_settings_separation_mode]');
              if(_c.val()!=''){
                  fout+=' settings_separation_mode="' + _c.val() + '"';
              }
              _c = $('input[name=dzsvg_settings_separation_pages_number]');
              if(_c.val()!=''){
                  fout+=' settings_separation_pages_number="' + _c.val() + '"';
              }
          }
        
        fout+=']';
      }

function sc_toggle_change(){
          var $ = jQuery.noConflict();
       	//var $t = $(this);

       		var type = 'toggle';
       		var params = '?type=' + type;
       	for(i=0;i<$('.sc-toggle').length;i++){
       		var $cach = $('.sc-toggle').eq(i);
       		var val = $cach.val();
       		if($cach.hasClass('color'))
       		val = val.substr(1);
       		params+='&opt' + (i+1) + '=' + val;
       	}
       // console.log(params);
       		$('.sc-toggle-frame').attr('src' , window.theme_url + 'tinymce/preview.php' + params);

       }
      function sc_boxes_change(){
       	//var $t = $(this);

       		var type = 'box';
       		var params = '?type=' + type;
       	for(i=0;i<$('.sc-box').length;i++){
       		var $cach = $('.sc-box').eq(i);
       		var val = $cach.val();
       		params+='&opt' + (i+1) + '=' + val;
       	}
        //console.log(params);
       		$('.sc-box-frame').attr('src' , window.theme_url + 'tinymce/preview.php' + params);

       }
       
       
       
function reskin_select(){
	for(i=0;i<jQuery('select').length;i++){
		var _cache = jQuery('select').eq(i);
		//console.log(_cache.parent().attr('class'));
		
		if(_cache.hasClass('styleme')==false || _cache.parent().hasClass('select_wrapper') || _cache.parent().hasClass('select-wrapper')){
		continue;
		}
		var sel = (_cache.find(':selected'));
		_cache.wrap('<div class="select-wrapper"></div>')
		_cache.parent().prepend('<span>' + sel.text() + '</span>')
	}
	//jQuery('.select-wrapper select').unbind();
    jQuery('.select-wrapper select').unbind('change',change_select);
    jQuery('.select-wrapper select').bind('change',change_select);
}

function change_select(){
	var selval = (jQuery(this).find(':selected').text());
	jQuery(this).parent().children('span').text(selval);
}