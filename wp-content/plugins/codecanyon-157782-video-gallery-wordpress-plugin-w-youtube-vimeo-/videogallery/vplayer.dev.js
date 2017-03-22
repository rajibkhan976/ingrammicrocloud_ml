
/*
 * Author: Digital Zoom Studio
 * Website: http://digitalzoomstudio.net/
 * Portfolio: http://codecanyon.net/user/ZoomIt/portfolio?ref=ZoomIt
 * This is not free software.
 * Video Gallery
 * Version: 8.42
 */

var vgsettings = {
    protocol: 'https'
    , vimeoprotocol: 'https'
};

var youtubeid_array = []; // -- an array to hold inited youtube videos
var dzsvp_players_arr = []; // -- an array to hold video players
var dzsvp_yt_iframe_settoload = false;
var _global_youtubeIframeAPIReady  = false;

//VIDEO GALLERY
(function($) {



    Math.easeIn = function(t, b, c, d) {

        return -c *(t/=d)*(t-2) + b;

    };



    $.fn.prependOnce = function(arg, argfind) {
        var _t = $(this) // It's your element


//        console.info(argfind);
        if(typeof(argfind) =='undefined'){
            var regex = new RegExp('class="(.*?)"');
            var auxarr = regex.exec(arg);


            if(typeof auxarr[1] !='undefined'){
                argfind = '.'+auxarr[1];
            }
        }



        // we compromise chaining for returning the success
        if(_t.children(argfind).length<1){
            _t.prepend(arg);
            return true;
        }else{
            return false;
        }
    };
    $.fn.appendOnce = function(arg, argfind) {
        var _t = $(this) // It's your element


        if(typeof(argfind) =='undefined'){
            var regex = new RegExp('class="(.*?)"');
            var auxarr = regex.exec(arg);


            if(typeof auxarr[1] !='undefined'){
                argfind = '.'+auxarr[1];
            }
        }
//        console.info(_t, _t.children(argfind).length, argfind);
        if(_t.children(argfind).length<1){
            _t.append(arg);
            return true;
        }else{
            return false;
        }
    };
    $.fn.vGallery = function(o) {

        var defaults = {
            totalWidth: ""
            ,totalHeight: ""
            ,totalHeightDifferenceOnParent: ""
            ,forceVideoWidth: ''
            ,forceVideoHeight: ''
            ,menuSpace: 0 //deprecated replaced by nav_space
            ,randomise: "off"
            ,autoplay: "off"
            ,autoplayNext: "on"
            ,playorder: "normal" // -- normal or reverse
            ,menu_position: 'right'
            ,menuitem_width: "200"
            ,menuitem_height: "71"
            ,menuitem_space: "0"
            ,nav_type: "thumbs"//thumbs or thumbsandarrows or scroller
            ,nav_space: '0'
            ,transition_type: "slideup"
            ,design_skin: 'skin_default'
            ,videoplayersettings: {}
            ,embedCode: ''
            ,shareCode: ''
            ,cueFirstVideo: 'on'
            ,design_navigationUseEasing: 'off'
            ,logo: ''
            ,logoLink: ''
            ,settings_mode: 'normal' ///===normal / wall / rotator / rotator3d
            ,settings_disableVideo: 'off' //disable the video area
            ,settings_enableHistory : 'off' // html5 history api for link type items
            ,settings_enableHistory_fornormalitems : 'off' // html5 history api for normal items
            ,settings_ajax_extraDivs : '' // extra divs to pull in the ajax request
            ,startItem:'default'
            ,settings_separation_mode: 'normal' // === normal ( no pagination ) or pages or scroll or button
            ,settings_separation_pages: []
            ,settings_separation_pages_number: '5' //=== the number of items per 'page'
            ,nav_type_outer_grid: 'four-per-row' // four-per-row
            ,settings_menu_overlay: 'off' // an overlay to appear over the menu
            ,search_field: 'off' // an overlay to appear over the menu
            ,search_field_con: null // an overlay to appear over the menu
            ,settings_trigger_resize: '0' // -- a force trigger resize every x ms
            ,modewall_bigwidth: '800' // -- the mode wall video ( when opened ) dimensions
            ,modewall_bigheight: '500'
            ,settings_secondCon: null
            ,settings_outerNav: null
            ,extra_class_slider_con: ''
        };



        if(typeof o =='undefined'){
            if(typeof $(this).attr('data-options')!='undefined' && $(this).attr('data-options')!=''){
                var aux = $(this).attr('data-options');
                aux = 'var aux_opts = ' + aux;
                eval(aux);
                o = aux_opts;
            }
        }

        o = $.extend(defaults, o);

        this.each(function() {

            var cthis = $(this);
            var thisId = $(this)[0].getAttribute('id')
                , classMain
                ;
            var nrChildren = 0;
            var _sliderMain
                , sliderCon
                , _navMain
                , _navCon
                , _adSpace
                , _mainNavigation
                , _searchField
                ;
            //gallery dimensions
            var videoWidth
                , videoHeight
                , totalWidth
                , totalHeight
                , navWidth = 0 // the _navCon width
                , navHeight = 0
                , ww
                , wh
                ;

            var inter_start_the_transition = null
                ,inter_mouse_move = null
                ;

            var nav_main_totalsize = 0 // the total size of the thumbs
                , nav_main_consize = 0 // the total size of the container
                , nav_page_size = 0 // the total size of a page of thumbs
                , nav_max_pages = 0 // max number of pages
                , nav_excess_thumbs = 0 // the total size of the last page of thumbs
                , nav_arrow_size = 40
                ;
            var thumbs_thumb_var = 0
                , thumbs_thumb_var_sec = 0
                , thumbs_total_var = 0
                , thumbs_total_var_sec = 0
                , thumbs_css_main = "top"
                ;
            var backgroundY;
            var used = new Array();
            var content = new Array();
            var currNr = -1
                , nextNr = -1
                , prevNr = -1
                , currPage = 0
                , last_arg = 0
                ;
            var currVideo;
            var arr_inlinecontents = [];

            var _rparent
                , _con
                , ccon
                , currScale = 1
                ,initial_h = -1
                ;
            var conw = 0;
            var conh = 0;

            var wpos = 0
                , hpos = 0
                , nav_max_pages = 0
                ,navMain_mousex = 0
                ,navMain_mousey = 0
                ;
            var lastIndex = 99;

            var busy_transition = false
                ,sw_transition_started = false
                ,busy_ajax = false
                ,loaded = false//===gallery loaded sw, when dimensions are set, will take a while if wall
                ;
            var firsttime = true;
            var embed_opened = false
                , share_opened = false
                , ad_playing = false
                , search_added = false
                ;


            var i = 0;

            var aux = 0
                , aux1 = 0
                ;

            var down_x = 0
                , up_x = 0;


            var menuitem_width = 0
                ,menuitem_height = 0
                ,menuitem_space = 0;

            var menu_position = 'right';

            var settings_separation_nr_pages = 0;
            var ind_ajaxPage = 0;




            var duration_viy = 20
                ;

            var target_viy = 0
                ;

            var begin_viy = 0
                ;

            var finish_viy = 0
                ;

            var change_viy = 0
                ;



            if(o.nav_type=='outer'){
                if(o.forceVideoHeight==''){
                    o.forceVideoHeight = '300';
                }
            }

//            console.info(o.menuitem_width);
            if(isNaN(parseInt(o.menuitem_width, 10))==false && String(o.menuitem_width).indexOf('%')==-1){
                o.menuitem_width = parseInt(o.menuitem_width, 10);
            }
//            console.info(o.menuitem_width);

            o.menuitem_height = parseInt(o.menuitem_height, 10);
            //o.menuitem_space = ;

            if(isNaN(Number(o.menuitem_space))==false){
                menuitem_space = Number(o.menuitem_space);
                //console.log('ceva');
            }

            if(o.startItem!='default'){
                o.startItem = parseInt(o.startItem, 10);
            }

            o.settings_separation_pages_number = parseInt(o.settings_separation_pages_number, 10);
            o.settings_trigger_resize = parseInt(o.settings_trigger_resize, 10);

            menu_position = o.menu_position;

            if(!isNaN(parseInt(o.forceVideoWidth,10))){
                o.forceVideoWidth = parseInt(o.forceVideoWidth,10);
            }
            if(!isNaN(parseInt(o.forceVideoHeight,10))){
                o.forceVideoHeight = parseInt(o.forceVideoHeight,10);
            }

            nrChildren = cthis.children().length;





            ccon = cthis.parent();
            _rparent = cthis.parent();




            //console.log($.fn.urlParam(window.location.href, 'dzsvgpage'));


            // ==== separation - PAGES
            var elimi = 0;
            //console.info(o.settings_separation_mode)
            if(o.settings_separation_mode=='pages'){
                //var dzsvg_page = $.fn.urlParam(window.location.href, 'dzsvgpage');
                var dzsvg_page = get_query_arg(window.location.href, 'dzsvgpage');
                //console.info(dzsvg_page, o.settings_separation_pages_number, nrChildren);

                if(typeof dzsvg_page== "undefined"){
                    dzsvg_page=1;
                }
                dzsvg_page = parseInt(dzsvg_page,10);


                if(dzsvg_page == 0 || isNaN(dzsvg_page)){
                    dzsvg_page = 1;
                }

                if(dzsvg_page > 0 && o.settings_separation_pages_number < nrChildren){
                    //console.log(cthis.children());
                    var aux;
                    if(o.settings_separation_pages_number * dzsvg_page <= nrChildren){
                        for(elimi = o.settings_separation_pages_number * dzsvg_page - 1; elimi >= o.settings_separation_pages_number * (dzsvg_page-1);elimi--){
                            cthis.children().eq(elimi).addClass('from-pagination-do-not-eliminate');
                        }
                    }else{
                        for(elimi = nrChildren - 1; elimi >= nrChildren - o.settings_separation_pages_number;elimi--){
                            cthis.children().eq(elimi).addClass('from-pagination-do-not-eliminate');
                        }
                    }

                    cthis.children().each(function(){
                        var _t = $(this);
                        if(!_t.hasClass('from-pagination-do-not-eliminate')){
                            _t.remove();
                        }
                    })

                    var str_pagination = '<div class="con-dzsvg-pagination">';
                    settings_separation_nr_pages = Math.ceil(nrChildren / o.settings_separation_pages_number);
                    //console.info(settings_separation_nr_pages)
                    nrChildren = cthis.children().length;

                    for(i=0;i<settings_separation_nr_pages;i++){
                        var str_active = '';
                        if((i+1)==dzsvg_page){
                            str_active = ' active';
                        }
                        str_pagination+='<a class="pagination-number '+str_active+'" href="'+add_query_arg(window.location.href, 'dzsvgpage', (i+1))+'">'+(i+1)+'</a>'
                    }

                    str_pagination+='</div>';
                    cthis.after(str_pagination);

                }
            }

            cthis.children().each(function(){
                var _t = $(this);

                //console.info(_t);

                if (_t.attr('data-type')=='youtube' && _t.attr('data-thumb')==undefined){
                    _t.attr('data-thumb', '//img.youtube.com/vi/' + _t.attr('data-src') + '/0.jpg');
                }

                if (_t.attr('data-previewimg') == undefined) {
                    if (_t.attr('data-thumb') != undefined){
                        _t.attr('data-previewimg', _t.attr('data-thumb'));
                    }

                    if (_t.attr('data-img') != undefined){
                        _t.attr('data-previewimg', _t.attr('data-img'));
                    }
                }
                if (_t.attr('data-src') == undefined) {

                    if (_t.attr('data-source') != undefined){
                        _t.attr('data-src', _t.attr('data-source'));
                    }
                }
                if(o.settings_mode=='wall'){

                    if (_t.find('.videoDescription').length == 0) {
                        if (_t.find('.menuDescription').length > 0) {
                            _t.append('<div class="videoDescription">'+_t.find('.menuDescription').html()+'</div>')
                        }
                    }
                }
            });

            if(o.settings_mode=='wall'){
                o.design_shadow = 'off';
                o.logo = '';

            }

            if(_rparent.hasClass("skin-laptop")){
                o.totalWidth = '62%';
                cthis.height(_rparent.height() * 0.686)
                o.totalHeightDifferenceOnParent = '-0.30';
            }


            //==some sanitizing of the videoWidth and videoHeight parameters








            if (o.totalWidth=='' || o.totalWidth == 0) {
                totalWidth = cthis.width();
            } else {
                totalWidth = o.totalWidth;
                cthis.css('width', totalWidth);
            }

            if (o.totalHeight=='' || o.totalHeight == 0) {
                totalHeight = cthis.height();
            } else {
                totalHeight = o.totalHeight;
            }
            //console.info(totalWidth);

            //=== some sanitizing
            if(isNaN(totalWidth)){
                totalWidth = 800;
            }

            if(isNaN(totalHeight)){
                totalHeight = 400;
            }
            //console.info(totalWidth);


            cthis.get(0).var_scale = 1;

            backgroundY = o.backgroundY;

            cthis.addClass('mode-' + o.settings_mode);
            cthis.addClass('nav-' + o.nav_type);

            if (typeof(cthis.attr('class')) == 'string') {
                mainClass = cthis.attr('class');
            } else {
                mainClass = cthis.get(0).className;
            }
            if (mainClass.indexOf('skin_') == -1) {
                cthis.addClass(o.design_skin);
            }

            if (o.videoplayersettings.design_skin == 'sameasgallery') {
                o.videoplayersettings.design_skin = o.design_skin;
            }






            for (i = 0; i < nrChildren; i++) {
                content[i] = $(this).children().eq(i);
                //sliderCon.append(content[i]);
                if (o.randomise == 'on'){
                    randomise(0, nrChildren);
                }else{
                    used[i] = i;
                }

            }


            if(o.search_field_con){
                _searchField = o.search_field_con;
                search_added=true;
            }

            var aux ='<div class="main-navigation"><div class="navMain"><div class="videogallery--navigation-container">';

            if(!search_added && o.search_field=='on'){

                aux+='<div class="dzsvg-search-field"><input type="text" placeholder="search..."/><svg class="search-icon" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="15px" height="15px" viewBox="230.042 230.042 15 15" enable-background="new 230.042 230.042 15 15" xml:space="preserve"> <g> <path fill="#898383" d="M244.708,243.077l-3.092-3.092c0.746-1.076,1.118-2.275,1.118-3.597c0-0.859-0.167-1.681-0.501-2.465 c-0.333-0.784-0.783-1.46-1.352-2.028s-1.244-1.019-2.027-1.352c-0.785-0.333-1.607-0.5-2.466-0.5s-1.681,0.167-2.465,0.5 s-1.46,0.784-2.028,1.352s-1.019,1.244-1.352,2.028s-0.5,1.606-0.5,2.465s0.167,1.681,0.5,2.465s0.784,1.46,1.352,2.028 s1.244,1.019,2.028,1.352c0.784,0.334,1.606,0.501,2.465,0.501c1.322,0,2.521-0.373,3.597-1.118l3.092,3.083 c0.217,0.229,0.486,0.343,0.811,0.343c0.312,0,0.584-0.114,0.812-0.343c0.228-0.228,0.342-0.499,0.342-0.812 C245.042,243.569,244.931,243.3,244.708,243.077z M239.241,239.241c-0.79,0.79-1.741,1.186-2.853,1.186s-2.062-0.396-2.853-1.186 c-0.79-0.791-1.186-1.741-1.186-2.853s0.396-2.063,1.186-2.853c0.79-0.791,1.741-1.186,2.853-1.186s2.062,0.396,2.853,1.186 s1.186,1.741,1.186,2.853S240.032,238.45,239.241,239.241z"/> </g> </svg> </div>';


            }else{
            }
            aux+='</div></div></div>';
            if( menu_position!='bottom' ){



                cthis.append(aux);
                cthis.append('<div class="sliderMain"><div class="sliderCon"></div></div>');


            }else{
                ////=== normal positioning -> video + navigation



                cthis.append('<div class="sliderMain"><div class="sliderCon"></div></div>');
                cthis.append(aux);

            }
            if(!search_added && o.search_field=='on') {
                _searchField = cthis.find('.dzsvg-search-field > input');
            }

            //console.info(cthis);
            cthis.append('<div class="gallery-buttons"></div>');
            cthis.append('<div class="videogallery--adSpace" style="display:none;"></div>');
            if (o.design_shadow == 'on') {
                cthis.prepend('<div class="shadow"></div>');
            }

            _sliderMain = cthis.find('.sliderMain');
            sliderCon = cthis.find('.sliderCon');
            _adSpace = cthis.find('.videogallery--adSpace').eq(0);
            _mainNavigation = cthis.find('.main-navigation');

            sliderCon.addClass(o.extra_class_slider_con);

            //console.info(cthis, sliderCon, o.extra_class_slider_con);

            if(o.settings_disableVideo=='on'){
                _sliderMain.remove();
                //cthis.children('.shadow').remove();

            }

            if (is_ie8()) {
                $('html').addClass('ie8-or-lower');
                cthis.addClass('ie8-or-lower');
                sliderCon.addClass('sliderCon-ie8');
            }
            if (can_translate()) {
                $('html').addClass('supports-translate');
            }

            _navMain = cthis.find('.navMain');
            _navCon = cthis.find('.videogallery--navigation-container').eq(0);


            if(o.design_navigationUseEasing=='on'){
//                _navCon.addClass('use-easing');
            }


            //console.info(nrChildren, cthis.children().length);
            if (o.settings_mode == 'normal') {
                for (i = 0; i < nrChildren; i++) {
                    var desc = cthis.children('.vplayer-tobe').eq(used[i]).find('.menuDescription').html();

                    //console.info(desc, used[i], cthis.children().eq(used[i]));
                    cthis.children('.vplayer-tobe').eq(used[i]).find('.menuDescription').remove();
                    if (desc == null) {
                        continue;
                    }

                    if(typeof cthis.children('.vplayer-tobe').eq(used[i]).attr('data-src')!='undefined'){
                        if(String(cthis.children('.vplayer-tobe').eq(used[i]).attr('data-src')).indexOf('youtube.com/watch')){

                            var dataSrc = cthis.children('.vplayer-tobe').eq(used[i]).attr('data-src');
                            var auxa = String(dataSrc).split('youtube.com/watch?v=');
//                            console.info(auxa);
                            if(auxa[1]){

                                dataSrc = auxa[1];
                                if(auxa[1].indexOf('&')>-1){
                                    var auxb = String(auxa[1]).split('&');
                                    dataSrc = auxb[0];
                                }

                                cthis.children('.vplayer-tobe').eq(used[i]).attr('data-src', dataSrc);
                            }
                        }
                    }
                    if (desc.indexOf('{ytthumb}') > -1) {
                        desc = desc.split("{ytthumb}").join('<img src="//img.youtube.com/vi/' + cthis.children('.vplayer-tobe').eq(used[i]).attr('data-src') + '/0.jpg" class="imgblock"/>');
                    }
                    if (desc.indexOf('{ytthumbimg}') > -1) {
                        desc = desc.split("{ytthumbimg}").join('//img.youtube.com/vi/' + cthis.children('.vplayer-tobe').eq(used[i]).attr('data-src') + '/0.jpg');
                    }



                    var aux = '<div class="navigationThumb"><div class="navigationThumb-content">';
                    if(o.settings_menu_overlay=='on'){
                        aux+='<div class="menuitem-overlay"></div>';
                    }
                    aux+=desc + '</div></div>';
                    _navCon.append(aux);
                }


                if(o.nav_type=='none'){
                    _mainNavigation.hide();
                }
            }
            if (o.settings_mode == 'rotator') {
                _navMain.append('<div class="rotator-btn-gotoNext"></div><div class="rotator-btn-gotoPrev"></div>');
                _navMain.append('<div class="descriptionsCon"></div>');
                _navMain.children('.rotator-btn-gotoNext').bind('click', gotoNext);
                _navMain.children('.rotator-btn-gotoPrev').bind('click', gotoPrev);
            }



            for (i = 0; i < nrChildren; i++) {
                sliderCon.append(content[used[i]]);
            }


            for (i = 0; i < nrChildren; i++) {
                var autoplaysw = 'off';
                if (i == 0 && o.autoplay == 'on'){
                    autoplaysw = 'on';
                }
            }

//            console.info(menu_position);


            _mainNavigation.addClass('menu-' + menu_position);

            if (o.nav_type == 'thumbsandarrows') {
                _mainNavigation.append('<div class="thumbs-arrow-left inactive"></div>');
                _mainNavigation.append('<div class="thumbs-arrow-right"></div>');


                //_navCon.addClass('static');
                _mainNavigation.find('.thumbs-arrow-left').bind('click', gotoPrevPage);
                _mainNavigation.find('.thumbs-arrow-right').bind('click', gotoNextPage);
            }


            if(o.search_field=='on'){
                //console.info(_searchField);
                _searchField.bind('keyup', change_search_field);
            }

            //(o.menuitem_width + o.menuitem_space) * nrChildren
            //console.info('ceva', is_ios());
            if (is_ios() || is_android()){
                _navMain.css('overflow', 'auto');
            };

            var hpos = 0;


            //console.info(totalWidth, videoWidth);

            if (o.settings_mode == 'rotator3d') {

                sliderCon.children().each(function() {
                    var _t = $(this);
                    _t.addClass('rotator3d-item');
                    _t.css({'width': videoWidth, 'height': videoHeight})
                    _t.append('<div class="previewImg" style="background-image:url(' + _t.attr('data-previewimg') + ');"></div>');
                    _t.children('.previewImg').bind('click', mod_rotator3d_clickPreviewImg);

                })
            }
            if (o.settings_mode == 'wall') {

                //jQuery('body').zoomBox();

                if (cthis.parent().hasClass('videogallery-con')) {
                    cthis.parent().css({'width': 'auto', 'height': 'auto'})
                }
                cthis.css({'width': 'auto', 'height': 'auto'});
                //return;
                sliderCon.children().each(function() {
                    //====each item
                    var _t = $(this);

                    _t.addClass('vgwall-item').addClass('clearfix');
                    _t.css({'width': o.menuitem_width, 'height': 'auto', 'position': 'relative', 'top': 'auto', 'left': 'auto'});
                    //console.log(totalWidth, totalHeight);
                    _t.attr('data-bigwidth', o.modewall_bigwidth);
                    _t.attr('data-bigheight', o.modewall_bigheight);




                    var desc = _t.find('.menuDescription').html();


                    if(desc){

                        if (desc.indexOf('{ytthumb}') > -1) {
                            desc = desc.split("{ytthumb}").join('<img src="//img.youtube.com/vi/' + _t.attr('data-src') + '/0.jpg" class="imgblock"/>');
                        }
                        if (desc.indexOf('{ytthumbimg}') > -1) {
                            desc = desc.split("{ytthumbimg}").join('//img.youtube.com/vi/' + _t.attr('data-src') + '/0.jpg');
                        }
                        _t.find('.menuDescription').html(desc);
                    }


                    _t.find('.menuDescription .imgblock').after(_t.children('.videoTitle').clone());


                    var str_menu_width = '';

                    if(String(o.menuitem_width).indexOf('%')>-1 || String(o.menuitem_width).indexOf('auto')>-1){
                        str_menu_width = ' width: '+ o.menuitem_width+';';
                    }else{
                        str_menu_width = ' width: '+ o.menuitem_width+'px;';
                    }

                    if (_t.attr('data-videoTitle') != undefined && _t.attr('data-videoTitle') != '') {
                        _t.prepend('<div class="videoTitle">' + _t.attr('data-videoTitle') + '</div>');
                    }
                    if (_t.attr('data-previewimg') != undefined) {
                        var aux2 = _t.attr('data-previewimg');

                        if (aux2 != undefined && aux2.indexOf('{ytthumbimg}') > -1) {
                            //console.log(_t.attr('data-src'));
                            aux2 = aux2.split("{ytthumbimg}").join('//img.youtube.com/vi/' + _t.attr('data-src') + '/0.jpg');
                        }


                        var aux7 = '';


                        if(String(o.menuitem_height)!=''){
                            aux7+='<div class="previewImg divimg" style="background-image:url(' + aux2 + '); width: 100%; ';
                            if(String(o.menuitem_height).indexOf('%')>-1 || String(o.menuitem_width).indexOf('auto')>-1){
                                aux7+=' height:'+o.menuitem_height+';';
                            }else{
                                aux7+=' height:'+o.menuitem_height+'px;';
                            }
                            aux7+='"></div>';
                        }else{
                            aux7+='<img class="previewImg" src="' + aux2 + '"';
                            aux7+= '/>';
                        }


                        _t.prepend(aux7);

                    }

                    //console.log(jQuery.fn.masonry);

                    _t.zoomBox();
                });



                setTimeout(function() {
                    if ($.fn.masonry != undefined) {
                        sliderCon.masonry({
                            columnWidth: 1
                            , containerStyle: {position: 'relative'}
                            , isFitWidth: false
                            ,isAnimated:true
                        });
                        cthis.parent().children('.preloader').fadeOut('slow');

                    } else {
                        alert('vplayer.js - warning: masonry not included')
                    }
                    setTimeout(handleResize, 1000);
                    loaded = true;
                }, 1500);
            }

            // --- go to video 0 <<<< the start of the gallery
            cthis.get(0).videoEnd = handleVideoEnd;
            cthis.get(0).turnFullscreen = turnFullscreen;
            cthis.get(0).external_handle_stopCurrVideo = handle_stopCurrVideo;
            cthis.get(0).api_gotoNext = gotoNext;
            cthis.get(0).api_gotoPrev = gotoPrev;
            cthis.get(0).api_gotoItem = gotoItem;
            cthis.get(0).api_responsive_ratio_resize_h = responsive_ratio_resize_h;


            if (o.logo != undefined && o.logo != '') {
                cthis.append('<img class="the-logo" src="' + o.logo + '"/>');
                if (o.logoLink != undefined && o.logoLink != '') {
                    cthis.children('.the-logo').css('cursor', 'pointer');
                    cthis.children('.the-logo').click(function() {
                        window.open(o.logoLink);
                    });
                }
            }
            var _gbuttons = cthis.children('.gallery-buttons');
            if (o.embedCode != '') {
                _gbuttons.append('<div class="embed-button"><div class="handle"></div><div class="contentbox" style="display:none;"><textarea class="thetext">' + o.embedCode + '</textarea></div></div>');
                _gbuttons.find('.embed-button .handle').click(click_embedhandle)
                _gbuttons.find('.embed-button .contentbox').css({
                    'right': 50
                })
            }
            if (o.shareCode != '') {
                _gbuttons.append('<div class="share-button"><div class="handle"></div><div class="contentbox" style="display:none;"><div class="thetext">' + o.shareCode + '</div></div></div>');
                _gbuttons.find('.share-button .handle').click(click_sharehandle)
                _gbuttons.find('.share-button .contentbox').css({
                    'right': 50
                })
            }


            if(o.nav_type=='outer'){
                _navCon.addClass(o.nav_type_outer_grid);
            }

            calculateDims();



            if (o.nav_type == 'scroller') {
                _navMain.addClass('scroller-con skin_apple');
                _navCon.addClass('inner');

                if ((menu_position == 'right' || menu_position == 'left') && nrChildren > 1) {
                    //console.log((o.menuitem_height + o.menuitem_space) * nrChildren);
                    _navCon.css({
                        'width' : menuitem_width
                    })
                }
                if ((menu_position == 'bottom' || menu_position == 'top') && nrChildren > 1) {
                    _navCon.css({
                        'height' : (menuitem_height)
                    })
                }

                _navMain.css({
                    'height' : '100%'
                })

                _navMain.scroller({
                    'enable_easing':'on'
                });
            }


            //====== NO FUNCTION HIER



            //console.log('hier');

            $(window).bind('resize', handleResize);
            handleResize();
            setTimeout(init_start,100);


            if(o.settings_trigger_resize>0){
                setInterval(calculateDims, o.settings_trigger_resize);
            };



            if(o.startItem=='default'){
                o.startItem=0;
                if(o.playorder=='reverse'){
                    o.startItem = nrChildren-1;
                }
            }
            // --- gotoItem
            if (o.settings_mode != 'wall') {

                loaded = true;
                //console.log(_navMain, sliderCon.children().eq(o.startItem).attr('data-type'));
                if(sliderCon.children().eq(o.startItem).attr('data-type')=='link'){
                    gotoItem(o.startItem, {donotopenlink: "on"});

                }else{
                    gotoItem(o.startItem);
                }
                if(o.nav_type=='scroller'){
                    var aux = parseInt(_navCon.children().eq(o.startItem).css('top'),10);
                    if(typeof _navMain.get(0).fn_scrolly_to != 'undefined'){
                        _navMain.get(0).fn_scrolly_to(aux);
                    }

                }
            }

            if(o.settings_separation_mode=='scroll'){
                $(window).bind('scroll', handle_scroll);
            }
            if(o.settings_separation_mode=='button'){
                cthis.append('<div class="btn_ajax_loadmore">Load More</div>');
                cthis.children('.btn_ajax_loadmore').bind('click', click_btn_ajax_loadmore);
            }

            cthis.get(0).api_handleResize = handleResize;
            cthis.get(0).api_gotoItem = gotoItem;
            cthis.get(0).api_handleResize_currVideo = handleResize_currVideo;
            cthis.get(0).api_currVideo_refresh_fsbutton = api_currVideo_refresh_fsbutton;
            cthis.get(0).api_video_ready = the_transition;



            function init_start(){

                if(o.settings_mode=='wall'){

                    setTimeout(init_showit,1500);

                }else{

                    init_showit();
                }

                if(o.nav_type=='thumbs' && o.design_navigationUseEasing=='on'){
                    handle_frame();
                }


                if(o.settings_secondCon){
                    var xpos = 0;
                    $(o.settings_secondCon).find('.item').each(function(){
                        var _t = $(this);
                        _t.css('left', xpos+'%');
                        xpos+=100;
                    })
                }

                //console.info(o.settings_outerNav);
                if(o.settings_outerNav){

                    var xpos = 0;
                    o.settings_outerNav.find('.videogallery--navigation-outer--bigblock').each(function(){
                        var _t = $(this);
                        _t.css('left', xpos+'%');
                        xpos+=100;
                    })
                }

                setInterval(tick, 1000);

                handleResize();

                //setTimeout(handleResize,1000);
            }
            function init_showit(){

                cthis.parent().children('.preloader').fadeOut('fast');
                cthis.parent().children('.css-preloader').fadeOut('fast');

                cthis.addClass('dzsvg-loaded');
            }
            function reinit(){
                //console.log(cthis.children('.vplayer-tobe').length);

                var len = cthis.children('.vplayer-tobe').length;


                if (o.settings_mode == 'normal') {
                    var initnavConlen = _navCon.children().length;
                    wpos = 0;
                    hpos =0 ;
                    for (i = 0; i < len; i++) {
                        var _c = cthis.children('.vplayer-tobe').eq(i);
                        var desc = _c.find('.menuDescription').html();
                        _c.find('.menuDescription').remove();
                        if (desc == null) {
                            continue;
                        }
                        if (desc.indexOf('{ytthumb}') > -1) {
                            desc = desc.split("{ytthumb}").join('<img src="//img.youtube.com/vi/' + cthis.children().eq(used[i]).attr('data-src') + '/0.jpg" class="imgblock"/>');
                        }
                        if (desc.indexOf('{ytthumbimg}') > -1) {
                            desc = desc.split("{ytthumbimg}").join('//img.youtube.com/vi/' + cthis.children().eq(used[i]).attr('data-src') + '/0.jpg');
                        }


                        _navCon.append('<div><div class="navigationThumb-content">' + desc + '</div></div>')
                        _navCon.children().eq(initnavConlen + i).addClass("navigationThumb");
                        _navCon.children().eq(initnavConlen + i).css({
                            'width': o.menuitem_width,
                            'height': o.menuitem_height
                        });

                        _navCon.children('.navigationThumb').eq(initnavConlen + i).click(handleButton);




                        if (o.nav_type == 'scroller') {

                        }

                        hpos += o.menuitem_height + menuitem_space;
                        wpos += o.menuitem_width + menuitem_space;
                    }

                }

                for (i = 0; i < len; i++) {
                    var _t = cthis.children('.vplayer-tobe').eq(0);
                    //console.log(_t)
                    sliderCon.append(_t);
                }




                if (o.settings_mode == 'wall') {

                    sliderCon.children().each(function() {
                        //====each item
                        var _t = $(this);



                        if (_t.find('.videoDescription').length == 0) {
                            if (_t.find('.menuDescription').length > 0) {
                                _t.append('<div class="videoDescription">'+_t.find('.menuDescription').html()+'</div>')
                            }
                        }


                        _t.addClass('vgwall-item').addClass('clearfix');
                        _t.css({'width': o.menuitem_width, 'height': 'auto', 'position': 'relative'});
                        //console.log(totalWidth, totalHeight);
                        _t.attr('data-bigwidth', o.modewall_bigwidth);
                        _t.attr('data-bigheight', o.modewall_bigheight);

                        if (_t.attr('data-videoTitle') != undefined && _t.attr('data-videoTitle') != '') {
                            _t.prependOnce('<div class="videoTitle">' + _t.attr('data-videoTitle') + '</div>', '.videoTitle');
                        }
                        if (_t.attr('data-previewimg') != undefined) {
                            var aux2 = _t.attr('data-previewimg');

                            if (aux2 != undefined && aux2.indexOf('{ytthumbimg}') > -1) {
                                //console.log(_t.attr('data-src'));
                                aux2 = aux2.split("{ytthumbimg}").join('//img.youtube.com/vi/' + _t.attr('data-src') + '/0.jpg');
                            }

                            _t.prependOnce('<img class="previewImg" style="" src="' + aux2 + '"/>', '.previewImg');

                        }

                        if (jQuery.fn.masonry != undefined) {

                            if(sliderCon.hasClass('masonry')){
                                sliderCon.masonry('reload');
                            }
                            cthis.parent().children('.preloader').fadeOut('slow');
                            setTimeout(handleResize, 1000);
                        }else{
                            alert('vplayer.js - warning: masonry not included')
                        }

                        _t.zoomBox();
                    });
                }


                nrChildren = sliderCon.children().length;
            }

            function gotoNextPage() {
                var tempPage = currPage;

                tempPage++;
                gotoPage(tempPage);

            }

            function gotoPrevPage() {
                if (currPage == 0)
                    return;

                currPage--;
                gotoPage(currPage);

            }

            function change_search_field(){
                var _t = $(this);

                //console.info(_t.val());

                _navCon.children().each(function(){
                    var _t2 = $(this);


                    //console.info(_t2.find('.navigationThumb-content').eq(0).html(),_t.val());
                    if(_t.val() == '' || String(String(_t2.find('.navigationThumb-content').eq(0).html()).toLowerCase()).indexOf(_t.val())>-1){
                        _t2.removeClass('inactive');
                    }else{

                        _t2.addClass('inactive');
                    }
                });

                handleResize();
            }

            function responsive_ratio_resize_h(arg){
//                return false;
//                videoHeight = arg;



                if(initial_h===-1){
                    initial_h=_sliderMain.height();
                }else{
//                    console.info(initial_h);
                }
//                console.info(menu_position);

                if(menu_position=='left'||menu_position=='right'){
                    totalHeight = arg;
                    cthis.height(arg);
                    _mainNavigation.height(arg);
//                    console.info(arg, cthis.height());
                }else{
                    cthis.css('height', 'auto');
//                    console.info(arg, cthis.height());
                }


                //console.info(initial_h);

                _sliderMain.height(arg);
//                console.info(arg, cthis.height());
            }
            function gotoPage(arg) {
                if (arg >= nav_max_pages || o.nav_type != 'thumbsandarrows')
                    return;
                thumbsSlider = _navCon;

                _mainNavigation.find('.thumbs-arrow-left').removeClass('inactive');
                _mainNavigation.find('.thumbs-arrow-right').removeClass('inactive');
                if (arg == 0) {
                    _mainNavigation.find('.thumbs-arrow-left').addClass('inactive');
                }
                if (arg == nav_max_pages - 1) {
                    _mainNavigation.find('.thumbs-arrow-right').addClass('inactive');
                }

                if (arg == nav_max_pages - 1) {

                    if (menu_position == "right" || menu_position == "left")
                        thumbsSlider.animate({
                            'top': (nav_page_size * -(nav_max_pages - 2)) - nav_excess_thumbs
                        }, {
                            duration: 400,
                            queue: false
                        });

                    if (menu_position == "bottom" || menu_position == "top")
                        thumbsSlider.animate({
                            'left': (nav_page_size * -(nav_max_pages - 2)) - nav_excess_thumbs
                        }, {
                            duration: 400,
                            queue: false
                        });

                } else {

                    if (menu_position == "right" || menu_position == "left")
                        thumbsSlider.animate({
                            'top': nav_page_size * -arg
                        }, {
                            duration: 400,
                            queue: false
                        });

                    if (menu_position == "bottom" || menu_position == "top")
                        thumbsSlider.animate({
                            'left': nav_page_size * -arg
                        }, {
                            duration: 400,
                            queue: false
                        });

                }

                currPage = arg;
            }

            function tick(){


            }
            function calculateDims(){


                totalWidth = cthis.outerWidth();


                if( String(cthis.get(0).style.height).indexOf('%')>-1){

                    totalHeight = cthis.height();
                }else{

                    if(cthis.data('init-height')){

                        totalHeight = cthis.data('init-height');
                    }else{

                        totalHeight = cthis.height();
                        cthis.data('init-height',totalHeight);
                    }
                }

//                console.log(cthis, totalWidth, 'cevaa', o.);

                if(o.totalHeightDifferenceOnParent!=''){
                    //console.info('ceva');
                    var aux = parseFloat(o.totalHeightDifferenceOnParent);
                    //console.log(aux);
                    var aux2 = 1 + aux;
                    //console.log(aux2);

                    totalHeight = aux2 * _rparent.outerHeight(false);
                    //console.info(totalHeight);
                }

//
//                if(cthis.attr('id')=='vg1'){
//                }


                //return;

//                console.info(cthis.height(), totalHeight);

                videoWidth = totalWidth;
                videoHeight = totalHeight;

//                console.info(videoHeight);

                menuitem_width = o.menuitem_width;
                menuitem_height = o.menuitem_height;

                if(isNaN(menuitem_height)){ menuitem_height = 0; }

//                console.info(videoHeight);


                //==ultra-responsive
                if (o.settings_disableVideo!='on'&& (o.menu_position == 'right' || o.menu_position == 'left') && nrChildren > 1) {
//                    console.info(menuitem_width, menuitem_space, totalWidth/2);
                    if(menuitem_width + menuitem_space > totalWidth/2){
                        //menuitem_width = totalWidth/2 - o.nav_space;
                        _sliderMain.css({
                            'left' : 0
                        })
                        _navCon.css({
                            'top' : 0
                            ,'left' : 0
                        })
                        menu_position = 'top';
                    }else{
                        _sliderMain.css({
                            'top' : 0
                        })
                        _navCon.css({
                            'left' : 0
                            ,'top' : 0
                        })
                        menu_position = o.menu_position;
                    }

                }

                _mainNavigation.removeClass('menu-top menu-bottom menu-right menu-left');
                _mainNavigation.addClass('menu-'+menu_position);

                if ((menu_position == 'right' || menu_position == 'left') && nrChildren > 1) {
                    videoWidth -= (menuitem_width + menuitem_space);
                }
                if ((menu_position == 'bottom' || menu_position == 'top') && nrChildren > 1 && cthis.get(0).style.height!='auto') {
                    //console.info(videoHeight);
                    videoHeight -= (menuitem_height + menuitem_space );

                    //console.info( menuitem_space, menuitem_height);
                    //console.info(menuitem_height, o.nav_space);
                }

//                console.info(o.forceVideoHeight);
                if(o.forceVideoHeight!=''){
                    videoHeight = o.forceVideoHeight;
                }

                if (o.settings_mode == 'rotator3d') {
                    videoWidth = totalWidth / 2;
                    videoHeight = totalHeight * 0.8;
                    menuitem_width = 0;
                    menuitem_height = 0;
                    menuitem_space = 0;
                    o.transition_type = 'rotator3d';
                }


                cthis.addClass('transition-'+ o.transition_type)



                // === if there is only one video we hide the nav
                if (nrChildren == 1) {
                    //totalWidth = videoWidth;
                    _mainNavigation.hide();
                }



                if(typeof(currVideo)!='undefined'){
                    /// === why ?
                    /*
                     currVideo.css({
                     'width': videoWidth
                     ,'height': videoHeight
                     })
                     */
                };

                hpos = 0;
                for (i = 0; i < nrChildren; i++) {
                    //if(is_ios())	break;

                    sliderCon.children().eq(i).css({
                    })
                    hpos += totalHeight;
                }

                if (o.settings_mode != 'wall') {
                    //console.info(videoHeight);
                    _sliderMain.css({
                        'width': videoWidth,
                        'height': videoHeight
                    })

                    if(menu_position=='left' || menu_position == 'right'){
                        _sliderMain.css('width','auto');
                    }
                }
                if (o.settings_mode == 'rotator3d') {
                    _sliderMain.css({
                        'width': totalWidth,
                        'height': totalHeight
                    })
                    sliderCon.children().css({
                        'width': videoWidth,
                        'height': videoHeight
                    })
                }
                if (menu_position == 'right') {
                    _mainNavigation.css({
                        'width': menuitem_width
                        ,'height': totalHeight
                        ,'position':'relative'
                        ,'margin-left' : o.nav_space
                        ,'margin-right' : 0
                        ,'margin-top' : 0
                        ,'margin-bottom' : 0
                    })
                }
                if (menu_position == 'left') {
                    _mainNavigation.css({
                        'width': menuitem_width,
                        'height': totalHeight,
                        'left': 0
                        ,'position':'relative'
                        ,'margin-left' : 0
                        ,'margin-right' : o.nav_space
                        ,'margin-top' : 0
                        ,'margin-bottom' : 0
                    })
                    _sliderMain.css({
//                        'left': menuitem_width + o.nav_space
                    })
                }
                if (menu_position == 'bottom') {
                    _mainNavigation.css({
                        'width': totalWidth,
                        'height': menuitem_height
                        ,'margin-left' : 0
                        ,'margin-right' : 0
                        ,'margin-top' : o.nav_space
                        ,'margin-bottom' : 0
                    })
                }
                if (menu_position == 'top') {
                    _mainNavigation.css({
                        'width': totalWidth,
                        'height': menuitem_height
                        ,'margin-left' : 0
                        ,'margin-right' : 0
                        ,'margin-top' : 0
                        ,'margin-bottom' : o.nav_space
                    })
                    _sliderMain.css({
                    })
                }




                //===calculate dims for navigation / mode-normal
                if (o.nav_type == 'thumbsandarrows') {

                    navWidth = (totalWidth - nav_arrow_size * 2);
                    navHeight = (totalHeight - nav_arrow_size * 2);




                    if (menu_position == 'bottom' || menu_position == 'top') {
                        thumbs_thumb_var = menuitem_width;
                        thumbs_thumb_var_sec = menuitem_height;
                        thumbs_total_var = totalWidth;
                        thumbs_total_var_sec = totalHeight;
                        thumbs_css_main = 'left';
                        _navMain.css({'left': nav_arrow_size, 'width': navWidth, 'height': '100%'});

                        var auxs = 0;
                        _navCon.children().each(function(){
                            var _t = $(this);
                            auxs+=_t.outerWidth();
                        })
                        _navCon.css('width', auxs);

                        _mainNavigation.children('.thumbs-arrow-left').css({'left': nav_arrow_size / 2});
                        _mainNavigation.children('.thumbs-arrow-right').css({'left': 'auto', 'left': navWidth + nav_arrow_size + nav_arrow_size / 2});
                        nav_main_consize = navWidth;
                    }
                    if (menu_position == 'left' || menu_position == 'right') {
                        thumbs_thumb_var = menuitem_height;
                        thumbs_thumb_var_sec = menuitem_width;
                        thumbs_total_var = totalHeight;
                        thumbs_total_var_sec = totalWidth;
                        thumbs_css_main = 'top';
//                        console.info(navHeight);
                        _navMain.css({'top': nav_arrow_size, 'height': navHeight, 'width': '100%'});
                        _mainNavigation.children('.thumbs-arrow-left').css({'top': nav_arrow_size / 2});
                        _mainNavigation.children('.thumbs-arrow-right').css({'top': 'auto', 'bottom': nav_arrow_size / 2 - 10});
                        nav_main_consize = navHeight;
                    }
                    nav_main_totalsize = nrChildren * thumbs_thumb_var + (nrChildren - 1) * menuitem_space;
                    aux1 = (((((thumbs_total_var - nav_arrow_size * 2) / (thumbs_thumb_var + menuitem_space)) * (thumbs_thumb_var + menuitem_space)))) - ((((parseInt((thumbs_total_var - nav_arrow_size * 2) / (thumbs_thumb_var + menuitem_space))) * (thumbs_thumb_var + menuitem_space))));

                    nav_page_size = thumbs_total_var - nav_arrow_size * 2 - aux1;
                    nav_max_pages = nav_main_totalsize / nav_page_size;
                    thumbs_per_page = Math.floor(nav_page_size / (thumbs_thumb_var + menuitem_space));
                    nav_max_pages = (Math.ceil(nav_max_pages));
                    nav_excess_thumbs = (nav_main_totalsize - (nav_max_pages - 1) * nav_page_size);



                    if (nav_main_totalsize < nav_main_consize) {
                        _mainNavigation.children('.thumbs-arrow-left').hide();
                        _mainNavigation.children('.thumbs-arrow-right').hide();
                    }



                }


                if(o.nav_type=='thumbs'){
                    if (menu_position == 'bottom' || menu_position == 'top') {
                        //console.log(_navCon.width())
                        navWidth = 0;
                        _navCon.children().each(function(){
                            var _t = $(this);
                            navWidth+=_t.outerWidth(true);
                        });



                        if(navWidth > totalWidth){
                            _navMain.unbind('mousemove', handleMouse);
                            _navMain.bind('mousemove', handleMouse);

                        }else{
                            _navCon.css({'left' : (totalWidth - navWidth) / 2})
                            _navMain.unbind('mousemove', handleMouse);

                        }
                    }
                    if (menu_position == 'left' || menu_position == 'right') {

                        //console.log(_navCon.width())
                        navHeight = 0;
                        navHeight = _navCon.height();

//                        console.info(navHeight);
                        if(navHeight > totalHeight){
                            _navMain.unbind('mousemove', handleMouse);
                            _navMain.bind('mousemove', handleMouse);

                        }else{
                            _navCon.css({'top' : (totalHeight - navHeight) / 2})
                            _navMain.unbind('mousemove', handleMouse);

                        }
                    }

                }
                //===END calculate dims for navigation / mode-normal


                if(o.nav_type=='outer'){
                    _mainNavigation.css({
                        'top':0,
                        'left':0,
                        'height':'auto'
                    });
                    _navMain.css({
                        //'height':'auto'
                    })
                    _sliderMain.css({
                        'top':0,
                        'left':0
                    })
                    cthis.css({
                        'height':'auto'
                    })
                    _navCon.children().css({
                        'top' : 0,
                        'left' : 0,
                        'width' : '',
                        'height' : ''
                    });

                    if(menu_position=='right'){
                        _sliderMain.css({
                            'overflow':'hidden'
                        })
                    }
                    if(menu_position=='left'){
                        _sliderMain.css({
                            'overflow':'hidden'
                        })
                    }
                }




                if (o.settings_mode == 'normal') {
                    hpos = 0;
                    wpos =0 ;

                    _navCon.children().unbind('click');
                    _navCon.children('.navigationThumb').bind('click', click_navCon_item);
                    _navCon.children('.navigationThumb').css({
                        'width': menuitem_width,
                        'height': menuitem_height
                    });
                }

                if(o.nav_type=='scroller'){

                    if(menu_position=='top' || menu_position=='bottom'){
                        navWidth = 0;
                        _navCon.children().each(function(){
                            var _t = $(this);
                            navWidth+=_t.outerWidth(true);
                        });
                        _navCon.width(navWidth);
                    }
                }


                if(o.settings_mode=='normal'){
                    if(menu_position=='right' || menu_position=='bottom' || menu_position=='left'){
                        cthis.find('.gallery-buttons').css({
                            'top':0
                        });
                        cthis.find('.the-logo').css({
                            'top':10
                        });
                    }
                    if(menu_position=='top' || menu_position=='bottom' || menu_position=='left'){
                        cthis.find('.gallery-buttons').css({
                            'right':0
                        });
                        cthis.find('.the-logo').css({
                            'right':50
                        });
                    }

                    //console.info(menu_position,  (Number(o.menuitem_width) + Number(o.nav_space)));

                    if (menu_position == 'right') {

                        _gbuttons.css({
                            'right': (Number(o.menuitem_width) + Number(o.nav_space)) + 'px'
                        });
                        if (cthis.find('.the-logo').length > 0) {
                            cthis.find('.the-logo').css({
                                'right': (Number(o.menuitem_width) + Number(o.nav_space) + 60) + 'px'
                            });
                        }
                    }
                    if (menu_position == 'top') {
                        _gbuttons.css({
                            'top': (Number(o.menuitem_height) + Number(o.nav_space)) + 'px'
                        });
                        if (cthis.find('.the-logo').length > 0) {
                            cthis.find('.the-logo').css({
                                'top': (Number(o.menuitem_height) + Number(o.nav_space) + 10) + 'px'
                                , 'right': (60) + 'px'
                            });
                        }
                    }
                }








                //====== calculateDims() END
            }
            function handleResize(e) {
                //ww = jQuery(this).width();
                //wh = jQuery(this).height();

                conw = _rparent.width();






                //console.log('ceva', ww, wh, conw, conh, totalWidth, totalHeight, (conw/totalWidth));
                //console.log(o.responsive_mode, totalWidth, totalHeight);
                calculateDims();


                if (o.settings_mode == 'wall') {
                }

                //alert(currVideo);
                if(typeof(currVideo)!="undefined"){
                    handleResize_currVideo();
                }

            }

            function handleResize_currVideo(){
                if(typeof(currVideo)!="undefined" && typeof(currVideo.get(0))!="undefined" && typeof(currVideo.get(0).api_handleResize)!="undefined"){
                    currVideo.get(0).api_handleResize();
                }
            }


            function api_currVideo_refresh_fsbutton(argcol){
                if(typeof(currVideo)!="undefined" && typeof(currVideo.get(0))!="undefined" && typeof(currVideo.get(0).api_currVideo_refresh_fsbutton)!="undefined"){
                    currVideo.get(0).api_currVideo_refresh_fsbutton(argcol);
                }
            }


            function randomise(arg, max) {
                arg = parseInt(Math.random() * max);
                var sw = 0;
                for (j = 0; j < used.length; j++) {
                    if (arg == used[j])
                        sw = 1;
                }
                if (sw == 1) {
                    randomise(0, max);
                    return;
                } else
                    used.push(arg);
                return arg;
            }

            var scroll_center = _navMain.outerHeight()/2;
            var scroll_interval = 10;
            var scroll_acceleration = 2;
            var easing_viewIndex = 0;

            function animate_menu_y(viewIndex){



                //console.info(finish_viy);

                if(is_ios()==false && is_android()==false){
                    if(o.design_navigationUseEasing!='on'){

                        if ($('html').hasClass('supports-translate')) {
                            _navCon.css({
                                '-webkit-transform': 'translate3d(0, '+finish_viy+'px, 0)'
                                ,'transform': 'translate3d(0, '+finish_viy+'px, 0)'
                            });
                        }else{
                            _navCon.css({
                                'top': finish_viy
                            });
                        }
                    }


                }
            }

            function handle_frame(){


                if(isNaN(target_viy)){
                    target_viy=0;
                }

                if(duration_viy===0){
                    requestAnimFrame(handle_frame);
                    return false;
                }

                begin_viy = target_viy;
                change_viy = finish_viy - begin_viy;


                target_viy = Number(Math.easeIn(1, begin_viy, change_viy, duration_viy).toFixed(4));;


                //console.info(finish_viy);
                if(is_ios()==false && is_android()==false){
                    _navCon.css({
                        'transform': 'translate3d(0,'+target_viy+'px,0)'
                    });
                }


                //console.info(_blackOverlay,target_bo);;

                requestAnimFrame(handle_frame);
            }

            function handleMouse(e) {
                //handle mouse for the _navCon element
                menuAnimationSw = true;
                var offsetBuffer = 70;
                navMain_mousey = (e.pageY - _navMain.offset().top)
                navMain_mousex = (e.pageX - _navMain.offset().left)
                var viewIndex = 0
                    , viewMaxH
                    ;
//                console.info(mouseX,mouseY, is_android())
                if (is_ios() == false && is_android() == false) {
                    if (menu_position == 'right' || menu_position == 'left') {
                        viewMaxH = (navHeight) - totalHeight;
                        finish_viy = (navMain_mousey / totalHeight) * -(viewMaxH + offsetBuffer * 2) + offsetBuffer;
                        //finish_viy = parseInt(viewIndex, 10);


                        //console.info(finish_viy);
                        if (finish_viy > 0)
                            finish_viy = 0;
                        if (finish_viy < -viewMaxH)
                            finish_viy = -viewMaxH;


                        if(o.design_navigationUseEasing=='on'){

                        }else{



                            animate_menu_y(viewIndex);
                        }



                    }
                    if (menu_position == 'bottom' || menu_position == 'top') {

                        viewMaxH = navWidth - totalWidth;
                        viewIndex = ((navMain_mousex / totalWidth) * -(viewMaxH + offsetBuffer * 2) + offsetBuffer) / currScale;
                        viewIndex = parseInt(viewIndex, 10);
                        if (viewIndex > 0)
                            viewIndex = 0;
                        if (viewIndex < -viewMaxH)
                            viewIndex = -viewMaxH;
                        var aux = {'-webkit-transform': ('translateX(' + viewIndex + 'px)'), '-moz-transform': ('translateX(' + viewIndex + 'px)')};
                        if ($('html').hasClass('supports-translate')) {
                            _navCon.css({
                            });
                        } else {
                        }
                        _navCon.css({
                            'left': viewIndex
                        });

                        //_navCon.animate({'left' : -((e.pageX-_navMain.offset().left)/totalWidth * (((o.menuitem_width + o.menuitem_space)*nrChildren) - totalWidth))	}, {queue:false, duration:100});
                    }

                }else{
//                    console.info('ceva');
                    return false;
                }

            }

            function click_navCon_item(e) {
                var _t = $(this);

                var cclass= '';

                if(_t.hasClass('navigationThumb')){
                    cclass='.navigationThumb';
                }

                gotoItem(_navCon.children(cclass).index(_t));

            }
            function hideSocialIcons() {

            }
            function showSocialIcons() {

            }

            function handle_scroll(){
                //console.log(loaded);
                if(loaded==false){
                    return;
                }

                var _t = $(this);//==window
                wh = $(window).height();
                //console.log(_t.scrollTop(), wh, cthis.offset().top, cthis.height(), ind_ajaxPage, o.settings_separation_pages, _t.scrollTop() + wh, (cthis.offset().top + cthis.height() - 10), (_t.scrollTop() + wh) > (cthis.offset().top + cthis.height() - 10), ind_ajaxPage, o.settings_separation_pages.length ) ;

                if(busy_ajax==true || ind_ajaxPage >= o.settings_separation_pages.length){
                    return;
                }



                if( (_t.scrollTop() + wh) > (cthis.offset().top + cthis.height() - 10) ){
                    //console.info('ALCEVA');
                    ajax_load_nextpage();
                }
            }
            function click_btn_ajax_loadmore(e){

                if(busy_ajax==true || ind_ajaxPage >= o.settings_separation_pages.length){
                    return;
                }
                ajax_load_nextpage();
            }

            function ajax_load_nextpage(){

                //console.log('ajax_load_nextpage');
                cthis.parent().children('.preloader').fadeIn('slow');

                $.ajax({
                    url : o.settings_separation_pages[ind_ajaxPage],
                    success: function(response) {
                        if(window.console !=undefined ){ console.log('Got this from the server: ' + response); }
                        setTimeout(function(){

                            cthis.append(response);
                            //setTimeout(reinit, 1000);
                            reinit();
                            setTimeout(function(){
                                busy_ajax = false ;
                                cthis.parent().children('.preloader').fadeOut('slow');
                                ind_ajaxPage++;


                                if(ind_ajaxPage >= o.settings_separation_pages.length){
                                    cthis.children('.btn_ajax_loadmore').fadeOut('slow');
                                }




                            }, 1000);
                        }, 1000);
                    },
                    error:function (xhr, ajaxOptions, thrownError){
                        if(window.console !=undefined ){ console.error('not found ' + ajaxOptions); }
                        ind_ajaxPage++;
                        cthis.parent().children('.preloader').fadeOut('slow');

                    }
                });

                busy_ajax = true ;
            }

            function gotoItem(arg, otherargs) {
//                console.log(sliderCon.children().eq(arg), currNr, arg, busy_transition);
//                console.log('gotoItem', currNr, arg, busy_transition);
                if (currNr == arg || busy_transition == true || ad_playing){
                    return false;
                }
                var transformed = false; //if the video is already transformed there is no need to wait




                var _c = sliderCon.children().eq(arg);
                currVideo = _c;
                var index = _c.parent().children().index(_c);

                if(_c.attr('data-type')=='link' && (otherargs==undefined || otherargs.donotopenlink==undefined || otherargs.donotopenlink!='on')){


                    //=====history API ajax cool stuff
                    if(o.settings_enableHistory=='on' && can_history_api()){
                        var stateObj = { foo: "bar" };
                        history.pushState(stateObj, "Gallery Video", _c.attr('data-src'));

                        //jQuery('.history-video-element').load(_c.attr('data-src') + ' .history-video-element');

                        $.ajax({
                            url : _c.attr('data-src'),
                            success: function(response) {
                                if(window.console !=undefined ){ console.info('Got this from the server: ' + response); }
                                setTimeout(function(){
                                    //console.log(jQuery(response).find('.history-video-element').eq(0).get(0).innerHTML);

                                    $('.history-video-element').eq(0).html(jQuery(response).find('.history-video-element').eq(0).html());


                                    $('.toexecute').each(function(){
                                        var _t = jQuery(this);
                                        if(_t.hasClass('executed')==false){
                                            eval(_t.text());
                                            _t.addClass('executed');
                                        }
                                    });


                                    if(o.settings_ajax_extraDivs!=''){
                                        var extradivs = String(o.settings_ajax_extraDivs).split(',');

                                        for(i=0;i<extradivs.length;i++){
                                            //console.log(extradivs[i], jQuery(response).find(extradivs[i]));
                                            $(extradivs[i]).eq(0).html(jQuery(response).find(extradivs[i]).eq(0).html());
                                        }
                                    }

                                    //console.log(jQuery(response)); console.log(jQuery('.toexecute'));
                                    //jQuery('.history-video-element').eq(0).get(0).innerHTML = jQuery(response).find('.history-video-element').eq(0).get(0).innerHTML;
                                    //eval(jQuery('.toexecute').text());
                                }, 100);
                            },
                            error:function (xhr, ajaxOptions, thrownError){
                                if(window.console !=undefined ){ console.error('not found ' + ajaxOptions); }
                                ind_ajaxPage++;
                                cthis.children('.preloader').fadeOut('slow');

                            }
                        });
                        /*
                         */

                    }else{
                        window.location = _c.attr('data-src');
                    }
//                    return;


                }


                if (currNr > -1) {
                    var _c2 = sliderCon.children().eq(currNr);
                    //console.log(_c2);

                    //---if on iPad or iPhone, we disable the video as it had runed in a iframe and it wont pause otherwise

                    //console.log(_c2.attr('data-type'))

                    if (_c2.attr('data-type') == 'inline' || (_c2.attr('data-type') == 'youtube' && o.videoplayersettings['settings_youtube_usecustomskin']!='on')){
                    }
                    //console.log(_c2, arr_inlinecontents);

                    //console.log(o.videoplayersettings);
                    if (o.settings_mode=='normal' && ( is_ios() || _c2.data('isflash') == 'on' || _c2.attr('data-type') == 'inline' || (_c2.attr('data-type') == 'youtube' && o.videoplayersettings['settings_youtube_usecustomskin']!='on')  || (_c2.attr('data-type') == 'youtube' && is_android() ) ) ) {
                        setTimeout(function() {
                            _c2.find('.video-description').remove();
                            arr_inlinecontents[currNr] = _c2.html();
                            _c2.html('');
                            _c2.removeClass('vplayer');
                            _c2.addClass('vplayer-tobe');

                        }, 1000);
                    }
                    ;
                }

                //console.info('adding ad',_c.attr('data-adsource'), _c.find('.adSource').length>0, is_ios(),o.videoplayersettings.settings_ios_usecustomskin=='on' );
                if ( (_c.attr('data-adsource') ||  _c.find('.adSource').length>0 ) && ( !is_ios() || o.videoplayersettings.settings_ios_usecustomskin=='on' )) {
                    //console.info('adding ad');
                    //advertisment
                    var aux = '<div class="vplayer-tobe"';

                    //data-source="video/test.m4v"
                    if (_c.attr('data-adsource') != undefined) {
                        aux += ' data-src="' + _c.attr('data-adsource') + '"';
                    }
                    if (_c.attr('data-adsource_ogg') != undefined) {
                        aux += ' data-sourceogg="' + _c.attr('data-adsource_ogg') + '"';
                    }
                    if (_c.attr('data-adtype') != undefined) {
                        aux += ' data-type="' + _c.attr('data-adtype') + '"';
                    }
                    if (_c.attr('data-adlink') != undefined) {
                        aux += ' data-adlink="' + _c.attr('data-adlink') + '"';
                    }
                    if (_c.attr('data-adtitle') != undefined) {
                        aux += ' data-videoTitle="' + _c.attr('data-adtitle') + '"';
                    }
                    if (_c.attr('data-adskip_delay') != undefined) {
                        aux += ' data-adskip_delay="' + _c.attr('data-adskip_delay') + '"';
                    }
                    aux += '>';


                    if (_c.attr('data-adtype') == 'inline') {

                        if(_c.find('.adSource').length>0){
                            aux+= _c.find('.adSource').eq(0).html();
                        }else{
                            aux+= _c.attr('data-adsource');
                        }
                    }

                    aux+='</div>';
                    _adSpace.show();
                    _adSpace.append(aux);
//                    console.info(aux);


                    var auxoptions = $.extend(true,{},o.videoplayersettings);;
                    auxoptions['videoWidth'] = totalWidth;
                    auxoptions['videoHeight'] = totalHeight;
                    auxoptions['is_ad'] = 'on';
                    auxoptions.autoplay='on';
                    auxoptions.settings_disableControls = 'on';
                    auxoptions.gallery_object = cthis;

                    ad_playing = true;
//                    console.info(auxoptions);

                    if(is_android()){
                        auxoptions['autoplay']='off';
                    }


                    _adSpace.children('.vplayer-tobe').vPlayer(auxoptions);

//                    console.info(_adSpace);
//                    return;
                }



                if (_c.hasClass('vplayer')) {
                    transformed = true;
                }
                if (_c.hasClass('vplayer-tobe')) {

                    //console.log(_c);
                    o.videoplayersettings['videoWidth'] = videoWidth;
                    o.videoplayersettings['videoHeight'] = '';

                    //console.log(videoWidth, videoHeight);
                    if (currNr == -1 && o.cueFirstVideo == 'off') {
                        o.videoplayersettings.cueVideo = 'off';
                    } else {
                        o.videoplayersettings.cueVideo = 'on';
                    }
                    if (currNr == -1) {
                        if (o.autoplay == 'on') {
                            o.videoplayersettings['autoplay'] = 'on';
                        } else {
                            o.videoplayersettings['autoplay'] = 'off';
                        }

                    }
                    //-- if it's not the first video
                    if (currNr > -1) {
                        if (o.autoplayNext == 'on') {
                            o.videoplayersettings['autoplay'] = 'on';
                            o.videoplayersettings['cueVideo'] = 'on';
                        } else {
                            o.videoplayersettings['autoplay'] = 'off';
                        }
                    }
                    if (ad_playing == true) {
                        o.videoplayersettings['autoplay'] = 'off';
                    }
                    o.videoplayersettings['settings_disableControls'] = 'off';


                    if (typeof(arr_inlinecontents[arg]) != 'undefined' && arr_inlinecontents[arg] != '') {
                        //console.log(arr_inlinecontents, arr_inlinecontents[arg]);
                        o.videoplayersettings.htmlContent = arr_inlinecontents[arg];
                    } else {
                        o.videoplayersettings.htmlContent = '';
                    }

                    o.videoplayersettings.gallery_object = cthis;

                    //console.log(o.videoplayersettings);
                    if(o.settings_disableVideo=='on'){
                    }else{
                        _c.vPlayer(o.videoplayersettings);

                    }
                }else{

                    if (o.autoplayNext == 'on') {
                        if(typeof _c.get(0)!='undefined' && typeof _c.get(0).externalPlayMovie!='undefined'){
                            _c.get(0).externalPlayMovie();
                        }

                    }
                }









                prevNr = arg - 1;
                if (prevNr < 0) {
                    prevNr = sliderCon.children().length - 1;
                }
                nextNr = arg + 1;
                if (nextNr > sliderCon.children().length - 1) {
                    nextNr = 0;
                }


                if (o.nav_type == 'thumbsandarrows') {

                }
                if (o.settings_mode == 'rotator3d') {
                    sliderCon.children().removeClass('nextItem').removeClass('prevItem');
                    sliderCon.children().eq(nextNr).addClass('nextItem');
                    sliderCon.children().eq(prevNr).addClass('prevItem');
                }
                if (o.settings_mode == 'rotator') {

                    if (currNr > -1) {

                    }
                    var _descCon = _navMain.children('.descriptionsCon');
                    _descCon.children('.currDesc').removeClass('currDesc').addClass('pastDesc');
                    _descCon.append('<div class="desc">' + _c.find('.menuDescription').html() + '</div>');
                    setTimeout(function() {
                        _descCon.children('.desc').addClass('currDesc');
                    }, 20)

                    //console.log(_c);
                }




//                console.info(currNr, transformed);

                last_arg = arg;
                if (currNr == -1 || transformed) {
                    the_transition();
                } else {
                    cthis.parent().children('.preloader').fadeIn('fast');
//                    the_transition();
                    inter_start_the_transition = setTimeout(the_transition, 1000, arg);
                }


                if(o.settings_secondCon){
//                    console.info($(o.settings_secondCon).find('.item').eq(arg).outerHeight(false));
                    $(o.settings_secondCon).find('.item').removeClass('active');
                    $(o.settings_secondCon).find('.item').eq(arg).addClass('active');
                    $(o.settings_secondCon).find('.dzsas-second-con--clip').css(
                        {
                            'height': $(o.settings_secondCon).find('.item').eq(arg).outerHeight(false)
                            ,'left' : -(arg*100)+'%'
                        }
                    );
                }
                if(o.settings_outerNav){
                    $(o.settings_outerNav).find('.videogallery--navigation-outer--block ').removeClass('active');
                    $(o.settings_outerNav).find('.videogallery--navigation-outer--block ').eq(arg).addClass('active');
                }

                if(cthis.hasClass('responsive-ratio-smooth')){
                    if(!_c.attr('data-responsive_ratio')){
                        responsive_ratio_resize_h(initial_h);
                    }else{
                        $(window).trigger('resize');
                    }
//                    responsive_ratio_resize_h(initial_h);
                }


                /*
                 if(is_ios()){
                 //	console.log(currNr, arg);

                 }else{
                 if(currNr>-1) {




                 }
                 */
                firsttime = false;
                busy_transition = true;

                return true;
            }



            function the_transition() {
                if(sw_transition_started){
                    return;
                }

                var arg = last_arg;


                var _c = sliderCon.children().eq(arg);

                sw_transition_started = true
                clearTimeout(inter_start_the_transition);
                cthis.parent().children('.preloader').fadeOut('fast');


                sliderCon.children().removeClass('currItem');
                if(currNr==-1){
                    _c.addClass('currItem');
                    _c.addClass('no-transition');
                    setTimeout(function(){
                        sliderCon.children().eq(currNr).removeClass('no-transition')
                    })
                }else{

                    if(currNr!=arg){

                        sliderCon.children().eq(currNr).addClass('transition-slideup-gotoTop')
                    }else{

                        sliderCon.children().eq(currNr).addClass('currItem');
                    }


                }

                setTimeout(setCurrVideoClass, 100);
                _navCon.children().removeClass('active');
                _navCon.children().eq(arg).addClass('active');

                if(o.nav_type=='thumbs'){

                    _navCon.children('.navigationThumb').removeClass('active');
                    _navCon.children('.navigationThumb').eq(arg).addClass('active');
                }


//                console.info(arg, _navCon.children().eq(arg));

                setTimeout(function(){
                    $('window').trigger('resize');
                    sliderCon.children().removeClass('transition-slideup-gotoTop');
                },1000);

                if (is_ios() && currNr > -1) {
                    if (sliderCon.children().eq(currNr).children().eq(0).length > 0 && sliderCon.children().eq(currNr).children().eq(0)[0] != undefined) {
                        if (sliderCon.children().eq(currNr).children().eq(0)[0].tagName == 'VIDEO') {
                            sliderCon.children().eq(currNr).children().eq(0).get(0).pause();
                        }
                    }
                }


                handle_stopCurrVideo();
                currNr = arg;

                setTimeout(function(){

                    busy_transition = false;
                    sw_transition_started = false;
                }, 400);
            } // end the_transition()

            function setCurrVideoClass(){
                currVideo.addClass('currItem');
            }
            function handle_stopCurrVideo() {
                if (!is_ios() && !is_ie8() && currNr > -1) {
                    if (sliderCon.children().eq(currNr).get(0) && sliderCon.children().eq(currNr).get(0).externalPauseMovie){
                        sliderCon.children().eq(currNr).get(0).externalPauseMovie();
                    }
                }
            }
            function click_embedhandle() {
                if (embed_opened == false) {
                    _gbuttons.find('.embed-button .contentbox').animate({
                        'right': 60
                    }, {queue: false, duration: 300});

                    _gbuttons.find('.embed-button .contentbox').fadeIn('fast');
                    embed_opened = true;
                } else {
                    _gbuttons.find('.embed-button .contentbox').animate({
                        'right': 50
                    }, {queue: false, duration: 300});

                    _gbuttons.find('.embed-button .contentbox').fadeOut('fast');
                    embed_opened = false;
                }
            }
            function click_sharehandle() {
                if (share_opened == false) {
                    _gbuttons.find('.share-button .contentbox').animate({
                        'right': 60
                    }, {queue: false, duration: 300});

                    _gbuttons.find('.share-button .contentbox').fadeIn('fast');
                    share_opened = true;
                } else {
                    _gbuttons.find('.share-button .contentbox').animate({
                        'right': 50
                    }, {queue: false, duration: 300});

                    _gbuttons.find('.share-button .contentbox').fadeOut('fast');
                    share_opened = false;
                }
            }
            function gotoPrev() {
                //console.log(cthis);

                if(o.playorder=='reverse'){
                    gotoNext();
                    return;
                }

                var tempNr = currNr - 1;
                if (tempNr < 0) {
                    tempNr = sliderCon.children().length - 1;
                }
                gotoItem(tempNr);


                if (o.nav_type == 'thumbsandarrows') {
                    if (Math.floor((tempNr) / thumbs_per_page) != currPage) {
                        gotoPage(Math.floor((tempNr) / thumbs_per_page))
                    }

                }

            }
            function gotoNext() {
                //console.log(cthis);

                if(o.playorder=='reverse'){
                    gotoPrev();
                    return;
                }

                var tempNr = currNr + 1;
                if (tempNr >= sliderCon.children().length) {
                    tempNr = 0;
                }
                gotoItem(tempNr);


                if (o.nav_type == 'thumbsandarrows') {
                    if (Math.floor((tempNr) / thumbs_per_page) != currPage) {
                        gotoPage(Math.floor((tempNr) / thumbs_per_page))
                    }


                }
            }
            function handleVideoEnd() {
//                console.info(ad_playing);
                if (ad_playing == true) {
                    _adSpace.children().animate({opacity: 0}, 300);
                    setTimeout(function() {
                        _adSpace.html('');
                        _adSpace.hide();
                    }, 400)
                    ad_playing = false;

//                    console.info(currVideo);
                    if(currVideo && typeof currVideo.get(0).externalPlayMovie!='undefined' && o.autoplayNext=='on'){
                        currVideo.get(0).externalPlayMovie();
                    }
                } else {
                    gotoNext();
                }


            }

            function turnFullscreen() {
                var _t = jQuery(this);
                //console.log(_t);
                return;
                _t.css({
                    'position': 'static'
                })
                _sliderMain.css({
                    'position': 'static'
                })
            }

            function mod_rotator3d_clickPreviewImg() {
                var _t = $(this);
                var ind = _t.parent().parent().children().index(_t.parent());
                //console.log(_t, ind);
                gotoItem(ind);
            }
            $.fn.turnNormalscreen = function() {
                $(this).css({
                    'position': 'relative'
                })
                _sliderMain.css({
                    'position': 'relative'
                })
                for (i = 0; i < nrChildren; i++) {
                    sliderCon.children().eq(i).css({
                        'position': 'absolute'
                    })
                }
            }
            $.fn.vGallery.gotoItem = function(arg) {
//                gotoItem(arg);
            }
            return this;

        }); // end each
    }
    window.dzsvg_init = function(selector, settings) {
        $(selector).vGallery(settings);
    };
    //==== deprecated
    window.zsvg_init = function(selector, settings) {
        $(selector).vGallery(settings);
    };

})(jQuery);



function vgcategories(arg){
    var carg = jQuery(arg);
    var currCatNr = -1;
    //console.log(carg);
    carg.find('.gallery-precon').each(function(){
        var _t = jQuery(this);
        //console.log(_t);
        _t.css({'display' : 'none'});
        carg.find('.the-categories-con').append('<span class="a-category">'+_t.attr('data-category')+'</span>')
    });

    carg.find('.the-categories-con').find('.a-category').eq(0).addClass('active');
    carg.find('.the-categories-con').find('.a-category').bind('click', click_category);
    function click_category(){
        var _t = jQuery(this);
        var ind = _t.parent().children('.a-category').index(_t);
        gotoCategory(ind);
        setTimeout(function(){
            jQuery(window).trigger('resize');
        },100);
    }
    gotoCategory(0);
    function gotoCategory(arg){
        if(currCatNr>-1 && carg.find('.gallery-precon').eq(currCatNr).find('.videogallery').eq(0).get(0)!=undefined && carg.find('.gallery-precon').eq(currCatNr).find('.videogallery').eq(0).get(0).external_handle_stopCurrVideo!=undefined ){
            carg.find('.gallery-precon').eq(currCatNr).find('.videogallery').eq(0).get(0).external_handle_stopCurrVideo();
        }
        carg.find('.the-categories-con').find('.a-category').removeClass('active');
        carg.find('.the-categories-con').find('.a-category').eq(arg).addClass('active');
        carg.find('.gallery-precon').css('display', 'none');
        carg.find('.gallery-precon').eq(arg).css('display', 'block');

        carg.children('.dzsas-second-con').hide();
        carg.children('.dzsas-second-con').eq(arg).show();

        currCatNr = arg;

        //console.log(carg.find('.gallery-precon').eq(arg).find('.videogallery').eq(0));
        if(typeof carg.find('.gallery-precon').eq(arg).find('.videogallery').eq(0).get(0) != 'undefined' && typeof carg.find('.gallery-precon').eq(arg).find('.videogallery').eq(0).get(0).api_handleResize != 'undefined'){
            carg.find('.gallery-precon').eq(arg).find('.videogallery').eq(0).get(0).api_handleResize();
            carg.find('.gallery-precon').eq(arg).find('.videogallery').eq(0).get(0).api_handleResize_currVideo();
        }
    }
}




//-------VIDEO PLAYER
var ytplayer;
(function($) {
    $.fn.vPlayer = function(o) {

        var defaults = {
            type: 'normal'
            ,autoplay: "off"
            ,videoWidth: 0
            ,videoHeight: 0
            ,controls_out_opacity: "0.9"
            ,controls_normal_opacity: "0.9"
            ,design_scrubbarWidth: 'default'
            ,gallery_object: null
            ,design_skin: 'skin_default'
            , design_background_offsetw: 0
            , settings_youtube_usecustomskin: 'on'
            , settings_ios_usecustomskin: 'on'
            , cueVideo: 'on'
            , settings_disableControls: 'off'
            , is_ad: 'off'
            , settings_hideControls: 'off'
            , ad_link: ''
            , settings_suggestedQuality: 'hd720'
            , design_enableProgScrubBox: 'default'
            , settings_enableTags: 'on'
            , settings_disableVideoArray: 'off'
            , settings_makeFunctional: false
            ,settings_video_overlay: "off" // == an overlay over the video that you can press for pause / unpause
            , htmlContent: ''
            , settings_swfPath: 'preview.swf'
            ,settings_disable_mouse_out:'off'
            , controls_fscanvas_bg: '#aaa'
            , controls_fscanvas_hover_bg: '#ddd'
            , fpc_background: ''
            , fpc_controls_background: ''
            , fpc_scrub_background: ''
            , fpc_scrub_buffer: ''
            , fpc_controls_color: ''
            , fpc_controls_hover_color: ''
            , fpc_controls_highlight_color: ''
            , fpc_thumbs_bg: ''
            , fpc_thumbs_active_bg: ''
            , fpc_thumbs_text_color: ''
            , google_analytics_send_play_event: 'off'
            ,rtmp_streamServer : '' // -- only for rtmp use ( advanced ) if you have a rtmp server
            ,playfrom : 'default' // play from a index , default means that this will be decided by the data-playfrom
            ,settings_subtitle_file : '' // -- set a subtitle file
            ,responsive_ratio : 'default' // -- set a responsive ratio height/ratio 0.5 means that the player height will resize to 0.5 of the gallery width
        }

        o = $.extend(defaults, o);

        /*
         * the way the plugin works is.
         * first the markup is analyzed
         * then the init function
         * then the init_readyVideo function
         *
         */
        this.each(function() {

            var cthis
                ,cid = ''
                ;
            var the_player_id = ''; // -- this is set only if the player actually has an id

            var controlsDiv;
            var videoWidth
                , videoHeight
                , totalWidth
                , totalHeight;
            var video;
            var aux = 0;
            var aux2 = 0;
            var is_fullscreen = 0;
            var inter_videoReadyState // interval to check for time
                ,inter_checkytadend // interval to check on when the youtube video ad has ended
                ,inter_removeFsControls // interval to remove fullscreen controls when no action is detected
                ;
            var lastVolume;
            var defaultVolume;
            var infoPosX;
            var infoPosY;
            var wasPlaying = false;
            var autoplay = "off";
            var fScreenControls
                , playcontrols
                , _volumeControls
                , info
                , infotext
                , scrubbar
                , scrubbarBg
                , _timetext
                , _btnhd
                , _adSkipCon = null
                , _controlsBackground = null
                , _muteControls = null
                ;
            var paused = true
                ,played = false
                ,google_analytics_sent_play_event = false
                ;
            var ie8paused = true;
            var totalDuration = 0;
            var time_curr = 0;
            var dataType = '';
            var dataFlash = '';
            var dataSrc = '';
            var dataVideoDesc = '';
            //responsive vars
            var conw
                , conh
                , newconh
                , _rparent
                , _vgparent
                , prefull_scale = 1
                , currScale = 1
                ;
            var ww
                , wh
                ;
            var yt_qualArray = []
                , yt_qualCurr
                , hasHD = false
                ;

            var arrTags = [];

            var bufferedLength = -1
                , bufferedWidthOffset = 0
                , volumeLength = 0
                , volumeWidthOffset = 0
                ;
            var time_counter_skipad = 0;
            var inter_time_counter_skipad = 0
                ,inter_check_yt_iframe_ready = 0
                ,inter_clear_playpause_mistake = 0
                ;


            var busy_playpause_mistake = false
                ;

            var _controls_fs_canvas;

            var vimeo_data, vimeo_url;


            var dzsvg_translate_youcanskipto = 'you can skip to video in ';
            var translate_skipad = 'Skip Ad';


            if(window.dzsvg_translate_youcanskipto!=undefined){ dzsvg_translate_youcanskipto = window.dzsvg_translate_youcanskipto;  }
            if(window.dzsvg_translate_skipad){ translate_skipad = window.dzsvg_translate_skipad; }

            cthis = $(this);


            if(typeof(cthis.attr('id'))!='undefined'){
                the_player_id = cthis.attr('id');
            }

            if(typeof cthis.attr('id')!='undefined' && cthis.attr('id')!=''){
                cid = cthis.attr('id');
            }else{
                cid = 'dzsvp'+parseInt(Math.random()*1000,10)
            }




            if (cthis.parent().parent().parent().hasClass('videogallery')) {
                _vgparent = cthis.parent().parent().parent();
            }


            //console.log(cthis, cthis.css('width'));

            autoplay = o.autoplay;


            //==some sanitizing of the videoWidth and videoHeight parameters



            o.controls_out_opacity = parseFloat(o.controls_out_opacity);
            o.controls_normal_opacity = parseFloat(o.controls_normal_opacity);


            if (o.videoWidth == 0) {
                videoWidth = cthis.width();
            } else {
                videoWidth = o.videoWidth;
            }

            if (o.videoHeight == 0) {
                videoHeight = cthis.height();
            } else {
                videoHeight = o.videoHeight;
            }
            if (o.autoplay == 'on') {

            }

            if(is_ios() || is_android()){
                autoplay = 'off';
                o.autoplay='off';
            }


            //console.info(cthis, o.responsive_ratio);

//            console.info(Number(o.playfrom));
            if(o.playfrom=='default'){
                if(typeof cthis.attr('data-playfrom')!='undefined' && cthis.attr('data-playfrom')!=''){
                    o.playfrom = cthis.attr('data-playfrom');
                }
            }
            if(isNaN(Number(o.playfrom))==false){
                o.playfrom = Number(o.playfrom);
            }

            if(o.is_ad=='on'){
//                console.info(cthis);
            }


            init();
            function init() {
                //console.info(o.type, o.design_skin);
                if (cthis.hasClass('vplayer-tobe')) {

                    //alert('ceva');
                    var _c = cthis;
                    _c.removeClass('vplayer-tobe');
                    _c.addClass('vplayer');

                    //console.log(autoplay, cthis);


                    if(_global_youtubeIframeAPIReady==false && dzsvp_yt_iframe_settoload==false){
                        var head= document.getElementsByTagName('head')[0];
                        var script= document.createElement('script');
                        script.type= 'text/javascript';
                        script.src= 'https://www.youtube.com/iframe_api';
                        head.appendChild(script);
                        dzsvp_yt_iframe_settoload=true;
                    }

                    if(o.settings_disableVideoArray!='on'){
                        dzsvp_players_arr.push(cthis);
                    }


                    if (typeof(cthis.attr('class')) == 'string') {
                        mainClass = cthis.attr('class');
                    } else {
                        mainClass = cthis.get(0).className;
                    }

                    if (mainClass.indexOf('skin_') == -1) {
                        cthis.addClass(o.design_skin);
                        mainClass += ' ' + o.design_skin;
                    }


                    //-setting skin specific vars
                    if (mainClass.indexOf('skin_aurora') > -1) {
                        o.design_skin = 'skin_aurora';
                        bufferedWidthOffset = -4;
                        volumeWidthOffset = -2;
                        if (o.design_enableProgScrubBox == 'default') {
                            o.design_enableProgScrubBox = 'on';
                        }
//                        console.info(o.design_scrubbarWidth);
                        if (o.design_scrubbarWidth == 'default') {
                            o.design_scrubbarWidth = -140;
                        }
                    }
                    if (mainClass.indexOf('skin_pro') > -1) {
                        o.design_skin = 'skin_pro';
                        bufferedWidthOffset = 0;
                        volumeWidthOffset = -2;
                        if (o.design_enableProgScrubBox == 'default') {
                            o.design_enableProgScrubBox = 'off';
                        }
                        if (o.design_scrubbarWidth == 'default') {
                            o.design_scrubbarWidth = 0;
                        }
                    }
                    if (mainClass.indexOf('skin_bigplay') > -1) {
                        o.design_skin = 'skin_bigplay';
                    }
                    if (mainClass.indexOf('skin_bluescrubtop') > -1) {
                        o.design_skin = 'skin_bluescrubtop';

                        if (o.design_scrubbarWidth == 'default') {
                            o.design_scrubbarWidth = 0;
                        }
                    }
                    if (mainClass.indexOf('skin_avanti') > -1) {
                        o.design_skin = 'skin_avanti';

                        if (o.design_scrubbarWidth == 'default') {
                            o.design_scrubbarWidth = -125;
                        }
                    }
                    if (mainClass.indexOf('skin_noskin') > -1) {
                        o.design_skin = 'skin_noskin';
                    }

//                    console.info(o.design_scrubbarWidth);
                    if (o.design_scrubbarWidth == 'default') {
                        o.design_scrubbarWidth = -201;
                    }



                    if (typeof _c.attr('data-src') == 'undefined' && typeof _c.attr('data-source') != 'undefined' && _c.attr('data-source') != '') {
                        _c.attr('data-src', _c.attr('data-source'));
                    }



                    if(typeof _c.attr('data-type')=='undefined' || _c.attr('data-type')==''){
                        if(typeof _c.attr('data-src')!='undefined'){
                            if(String(_c.attr('data-src')).indexOf('youtube.com/watch?')){
                                _c.attr('data-type','youtube');



                            }
                        }
                    }
//                    console.info(_c.attr('data-type'));

                    if (_c.attr('data-type') == 'youtube') {
                        o.type = 'youtube';
                    }
                    if (_c.attr('data-type') == 'vide') {
                        o.type = 'normal';
                    }
                    if (_c.attr('data-type') == 'vimeo') {
                        o.type = 'vimeo';
                    }
                    if (_c.attr('data-type') == 'image') {
                        o.type = 'image';
                    }
                    if (_c.attr('data-type') == 'audio') {
                        o.type = 'audio';
                    }
                    if (_c.attr('data-type') == 'inline') {
                        o.type = 'inline';
                    }
                    if (_c.attr('data-adlink') != undefined && _c.attr('data-adlink') != '') {
                        o.ad_link = _c.attr('data-adlink');
                        //console.log(o.ad_link);
                    }
                    _rparent = cthis.parent();

//                    console.info(cthis, o, o.settings_disableControls);

                    if (o.type == 'inline') {

                        //console.info(o);
                        if (o.htmlContent != '') {
                            cthis.html(o.htmlContent);
                        }

                        if (cthis.children().length > 0) {
                            var _cach = cthis.children().eq(0);
                            if (_cach.get(0) != undefined) {
                                if (_cach.get(0).nodeName == 'IFRAME') {
                                    _cach.attr('width', '100%');
                                    _cach.attr('height', '100%');
                                }
                            }
                        }
                    }


                    cthis.append('<div class="controls"></div>')
                    controlsDiv = cthis.find('.controls');
                    //console.log('ceva');



                    //console.log(videoWidth);
                    totalWidth = videoWidth;
                    totalHeight = videoHeight;

                    //console.log(cthis, videoWidth);
                    cthis.css({
                        //'width': videoWidth,
                        //'height': videoHeight
                    })

                    if(videoWidth=='100%'){

                    }

                    if (cthis.attr('data-videoTitle') != undefined && cthis.attr('data-videoTitle') != '') {
                        cthis.append('<div class="video-description"></div>')
                        cthis.children('.video-description').append('<div class="video-title">' + cthis.attr('data-videoTitle') + '</div>');
                        if (dataVideoDesc != '') {
                            cthis.children('.video-description').append('<div class="video-subdescription">' + dataVideoDesc + '</div>');
                        }
                        cthis.find('.video-subdescription').css('width', (0.7 * videoWidth));
                    }

                    if (cthis.css('position') != 'absolute' && cthis.css('position') != 'fixed') {
                        cthis.css('position', 'relative')
                    }

                    //console.log(o.type);
                    if (o.type != 'vimeo' && o.type != 'image' && o.type != 'inline') {
                        controlsDiv.append('<div class="background"></div><div class="playcontrols"></div><div class="scrubbar"></div><div class="timetext"><span class="curr-timetext"></span><span class="total-timetext"></span></div><div class="volumecontrols"></div><div class="fscreencontrols"></div>');

                        if(o.design_skin=='skin_avanti'){
                            controlsDiv.append('<div class="mutecontrols-con"><div class="btn-mute"></div><div class="btn-mute-hover"></div><div class="btn-unmute"></div><div class="btn-unmute-hover"></div></div>');

                            _muteControls = controlsDiv.find('.mutecontrols-con').eq(0);
                        }
                    }


                    _controlsBackground = controlsDiv.find('.background').eq(0);

                    if (o.type == 'image') {
                        cthis.attr('data-img', cthis.attr('data-src'));


                    }

                    if (typeof cthis.attr('data-img') != 'undefined' && cthis.attr('data-img')!='') {
                        cthis.prepend('<div class="cover-image"><div class="the-div-image" style="background-image:url(' + cthis.attr('data-img') + ');"/></div>');
                    }


                    if (o.type == 'image') {

                        cthis.addClass('dzsvp-loaded');


                        if (o.ad_link != '') {

                            var _c = cthis.children().eq(0);
                            _c.css({'cursor': 'pointer'})
                            _c.bind('click', function() {
                                if(cthis.find('.controls').eq(0).css('pointer-events')!='none'){

                                    window.open(o.ad_link);
                                }
                            })
                        }
                        setup_skipad();
                        return;
                    }


                    if (o.type == 'inline') {

                        if (o.settings_disableControls == 'on') {
                            if (o.ad_link != '') {

                                var _c = cthis.children().eq(0);
                                _c.css({'cursor': 'pointer'})
                                _c.bind('click', function() {
                                    window.open(o.ad_link);
                                })
                            }

                        }
                        cthis.find('.cover-image').bind('click',function(){
                            $(this).fadeOut('slow');
                        });
                        cthis.addClass('dzsvp-loaded');
                        setup_skipad();
                        return;
                    }
                    if (o.type == 'youtube') {
                        if (o.settings_disableControls == 'on') {
                            //===for youtube ads we force enable the custom skin because we need to know when the video ended
                            o.cueVideo = 'on';
                            o.settings_youtube_usecustomskin='on';
                        }


                        if (o.ad_link != '') {

                            if(cthis.parent().hasClass('videogallery--adSpace')){
                                cthis.parent().css({'cursor': 'pointer'});
                                cthis.parent().unbind('click');
//                                console.info(cthis.parent());
                                cthis.parent().bind('click', function() {
                                    if(cthis.find('.controls').eq(0).css('pointer-events')!='none') {
                                        window.open(o.ad_link);
                                    }
                                })
                            }

                        }
                    }
                    info = cthis.find('.info');
                    infotext = cthis.find('.infoText');

                    ////info



                    playcontrols = cthis.find('.playcontrols');
                    playcontrols.append('<div class="playSimple"></div><div class="playHover"></div><div class="pauseSimple"></div><div class="pauseHover"></div>');



                    scrubbar = cthis.find('.scrubbar');
                    scrubbar.append('<div class="scrub-bg"></div><div class="scrub-buffer"></div><div class="scrub"></div><div class="scrubBox"></div><div class="scrubBox-prog"></div>');

                    scrubbarBg = scrubbar.children('.scrub-bg');
//                    console.info(scrubbar, scrubbarBg);

                    _timetext = cthis.find('.timetext').eq(0);




                    _volumeControls = cthis.find('.volumecontrols');
                    _volumeControls.append('<div class="volumeicon"></div><div class="volume_static"></div><div class="volume_active"></div><div class="volume_cut"></div>');

                    fScreenControls = cthis.find('.fscreencontrols');
                    fScreenControls.append('<div class="full"></div><div class="fullHover"></div>');


                    if (o.design_skin == 'skin_pro' || o.design_skin == 'skin_bigplay') {
                        playcontrols.find('.pauseSimple').eq(0).append('<div class="pause-part-1"></div><div class="pause-part-2"></div>');
                        fScreenControls.find('.full').eq(0).append('<canvas width="15" height="15" class="fullscreen-button"></canvas>');


                        //console.log(fScreenControls.find('.full').eq(0));

                        _controls_fs_canvas=fScreenControls.find('.full').eq(0).find('canvas.fullscreen-button').eq(0)[0];
                        if( (!is_ie() || (is_ie() && version_ie()>8)) && _controls_fs_canvas!=undefined){
//                            console.info(o.controls_fscanvas_bg);
                            draw_fs_canvas(o.controls_fscanvas_bg);
                            $(_controls_fs_canvas).bind('mouseover', handleMouseover);
                            $(_controls_fs_canvas).bind('mouseout', handleMouseout);
                        }
                    }




                    if (_c.find('.videoDescription').length > 0) {
                        dataVideoDesc = _c.find('.videoDescription').html();
                        _c.find('.videoDescription').remove();
                    }

                    if (is_ie8() || o.type=='vimeo') {
                        o.cueVideo='on';
                    }


                    if(cthis.get(0)!=undefined){
                        //cthis.get(0).fn_change_mainColor = fn_change_mainColor; cthis.get(0).fn_change_mainColor('#aaa');
                        cthis.get(0).fn_change_color_highlight = fn_change_color_highlight; //cthis.get(0).fn_change_mainColor('#aaa');

                        cthis.get(0).api_handleResize = handleResize;

                        cthis.get(0).api_currVideo_refresh_fsbutton = draw_fs_canvas;
                        //console.log('ceva');
                    }



                    //console.log(cthis, o.cueVideo, o.type);

                    //===if cueVideo is not on then, init_readyControls on click
                    if (o.cueVideo != 'on') {

                        resizePlayer(videoWidth, videoHeight);
                        cthis.bind('click', init_readyControls);

                        cthis.addClass('dzsvp-loaded');
                    } else {
                        //console.log(o.type);
                        if(o.type=='youtube'){
                            inter_check_yt_iframe_ready = setInterval(check_if_yt_iframe_ready, 100);
                        }else{
                            init_readyControls();
                        }

                    }
                    if (o.settings_enableTags == 'on') {
                        setInterval(check_tags, 1000);
                    }



                    handleResize();
                }
            }

            function check_if_yt_iframe_ready(){

//                console.info(o.type);
                if( (window.YT && window.YT.Player ) || _global_youtubeIframeAPIReady){
                    init_readyControls();
                    clearInterval(inter_check_yt_iframe_ready);
                }
            }

            function setup_skipad(){
                //console.info('setup_skipad()');
                if (o.settings_disableControls == 'on') {
                    var skipad_timer = 0;

                    if(o.type=='image' || o.type=='inline'){
                        skipad_timer=0;
                    }
                    if(o.type=='normal' || o.type=='youtube'){
                        skipad_timer=1001;
                    }

                    cthis.appendOnce('<div class="skipad-con"></div>', '.skinad-con');
                    _adSkipCon = cthis.find('.skipad-con').eq(0);

                    if(typeof cthis.attr('data-adskip_delay')!='undefined'){
                        skipad_timer = Number(cthis.attr('data-adskip_delay')) ;
                    }
//                    console.info(skipad_timer);

//                    console.info(cthis, cthis.attr('data-adskip_delay'), skipad_timer);
                    time_counter_skipad = skipad_timer;
//                    console.info(cthis, time_counter_skipad);
                    if(skipad_timer!=1001){
                        setTimeout(function(){
//                            console.info(cthis.find('.skipad-con').eq(0))
                            time_counter_skipad=0;
                            _adSkipCon.html('<div class="skipad">'+translate_skipad+'</div>');
                            _adSkipCon.children('.skipad').bind('click', function() {
                                handleVideoEnd();
                            })
                        }, skipad_timer*1000);

                        if(skipad_timer>0){
                            inter_time_counter_skipad = setInterval(tick_counter_skipad, 1000);
                        }
                    }


                }
            }
            function tick_counter_skipad(){

//                console.info(cthis, time_counter_skipad);
                if(time_counter_skipad>0){
                    time_counter_skipad= time_counter_skipad-1;
                    if(_adSkipCon){
                        _adSkipCon.html(dzsvg_translate_youcanskipto + time_counter_skipad);
                    }

                }else{
                    clearInterval(inter_time_counter_skipad);
                }
            }
            function draw_fs_canvas(argcol){

//                console.info(o.design_skin, argcol);
                if(o.design_skin!='skin_pro'){
                    return;
                }
                var ctx=_controls_fs_canvas.getContext("2d");
                var ctx_w = _controls_fs_canvas.width;
                var ctx_h = _controls_fs_canvas.height;
                var ctx_pw = ctx_w/100;
                var ctx_ph = ctx_w/100;
                //console.log(ctx_pw, c.width);
                ctx.fillStyle= argcol;
                var borderw = 30;
                ctx.fillRect(25*ctx_pw,25*ctx_ph,50*ctx_pw,50*ctx_ph);
                ctx.beginPath();
                ctx.moveTo(0*ctx_pw,0*ctx_ph);
                ctx.lineTo(0*ctx_pw,borderw*ctx_ph);
                ctx.lineTo(borderw*ctx_pw,0*ctx_ph);
                ctx.fill();
                ctx.moveTo(0*ctx_pw,100*ctx_ph);
                ctx.lineTo(0*ctx_pw,(100-borderw)*ctx_ph);
                ctx.lineTo(borderw*ctx_pw,100*ctx_ph);
                ctx.fill();
                ctx.moveTo((100)*ctx_pw,(100)*ctx_ph);
                ctx.lineTo((100-borderw)*ctx_pw,(100)*ctx_ph);
                ctx.lineTo((100)*ctx_pw,(100-borderw)*ctx_ph);
                ctx.fill();
                ctx.moveTo((100)*ctx_pw,(0)*ctx_ph);
                ctx.lineTo((100-borderw)*ctx_pw,(0)*ctx_ph);
                ctx.lineTo((100)*ctx_pw,(borderw)*ctx_ph);
                ctx.fill();
            }
            function fn_change_color_highlight(arg){
                cthis.find('.scrub').eq(0).css({
                    'background' : arg
                })
                cthis.find('.volume_active').eq(0).css({
                    'background' : arg
                })
                cthis.find('.hdbutton-hover').eq(0).css({
                    'color' : arg
                })
            }
            function check_tags() {
                var roundTime = Number(time_curr);


                //console.log(arrTags.length);
                if (arrTags.length == 0) {
                    return;
                }

                arrTags.removeClass('active');
                arrTags.each(function() {
                    var _t = $(this);
                    //console.log(_t);
                    if (Number(_t.attr('data-starttime')) <= roundTime && Number(_t.attr('data-endtime')) >= roundTime) {
                        _t.addClass('active');
                    }
                })
                //jQuery('.dzstag[data-starttime=' + roundTime + ']').addClass('active');
            }
            function init_readyControls() {
                //if(window.console) { console.log('init_readyControls'); }
                var _c = cthis;
                _c.unbind();
                if (_c.attr('data-type') != undefined) {
                    dataType = _c.attr('data-type');
                }
                if (_c.attr('data-src') != undefined) {
                    dataSrc = _c.attr('data-src');
                } else {
                    if (_c.attr('data-sourcemp4') != undefined) {
                        dataSrc = _c.attr('data-sourcemp4');
                    }

                }
                if(_c.attr('data-type')=='youtube' && String(dataSrc).indexOf('youtube.com/watch?') > -1){
                    var auxa = String(dataSrc).split('youtube.com/watch?v=');
                    //console.info(auxa);
                    dataSrc = auxa[1];
                    if(auxa[1].indexOf('&')>-1){
                        var auxb = String(auxa[1]).split('&');
                        dataSrc = auxb[0];
                    }
                }

                if (_c.attr('data-sourceflash') != undefined) {
                    dataFlash = _c.attr('data-sourceflash');
                }

                //console.log(cthis.find('.preview'))



                if (_c.attr('data-sourceflash') == undefined) {
                    dataFlash = _c.attr('data-sourcemp4');
                    _c.attr('data-sourceflash', dataSrc);
                }

                if (o.type == 'audio' && _c.attr('data-sourcemp3') != undefined && _c.attr('data-sourceflash') == undefined) {
                    dataFlash = _c.attr('data-sourcemp3');
                }



                //===setup player colors

                var str_fpc_background = '';
                if(o.fpc_background!=''){
                    str_fpc_background = '&player_controls_background='+String(o.fpc_controls_background).substr(1);
                }

                var str_fpc_controls_background = '';
                if(o.fpc_controls_background!=''){
                    str_fpc_controls_background = '&player_controls_background='+String(o.fpc_controls_background).substr(1);
                }
                var str_fpc_scrub_background = '';
                if(o.fpc_scrub_background!=''){
                    str_fpc_scrub_background = '&player_scrub_background='+String(o.fpc_scrub_background).substr(1);
                }
                var str_fpc_scrub_buffer = '';
                if(o.fpc_scrub_buffer!=''){
                    str_fpc_scrub_buffer = '&player_scrub_buffer='+String(o.fpc_scrub_buffer).substr(1);
                }
                var str_fpc_controls_color = '';
                if(o.fpc_controls_color!=''){
                    str_fpc_controls_color = '&player_controls_color='+String(o.fpc_controls_color).substr(1);
                }
                var str_fpc_controls_hover_color = '';
                if(o.fpc_controls_hover_color!=''){
                    str_fpc_controls_hover_color = '&player_controls_hover_color='+String(o.fpc_controls_hover_color).substr(1);
                }
                var str_fpc_controls_highlight_color = '';
                if(o.fpc_controls_highlight_color!=''){
                    str_fpc_controls_highlight_color = '&player_controls_highlight_color='+String(o.fpc_controls_highlight_color).substr(1);
                }
                var str_fpc_thumbs_bg = '';
                if(o.fpc_thumbs_bg!=''){
                    str_fpc_thumbs_bg = '&player_thumbs_bg='+String(o.fpc_thumbs_bg).substr(1);
                }
                var str_fpc_thumbs_active_bg = '';
                if(o.fpc_thumbs_active_bg!=''){
                    str_fpc_thumbs_active_bg = '&player_thumbs_active_bg='+String(o.fpc_thumbs_active_bg).substr(1);
                }
                var str_fpc_thumbs_text_color = '';
                if(o.fpc_thumbs_text_color!=''){
                    str_fpc_thumbs_text_color = '&player_thumbs_text_color='+String(o.fpc_thumbs_text_color).substr(1);
                }


                //--------------ie8
                if (is_ie8()) {
                    _c.find('.controls').remove();
                    _c.addClass('vplayer-ie8');
                    //_c.html('<div class="vplayer"></div>')
                    if (o.type == 'normal') {
                        _c.prepend('<div><object type="application/x-shockwave-flash" data="'+o.settings_swfPath+'" width="' + videoWidth + '" height="' + videoHeight + '" id="flashcontent" style="visibility: visible;"><param name="movie" value="'+o.settings_swfPath+'"><param name="menu" value="false"><param name="allowScriptAccess" value="always"><param name="scale" value="noscale"><param name="allowFullScreen" value="true"><param name="wmode" value="opaque"><param name="flashvars" value="video='+dataFlash+str_fpc_background+ '"></object></div>');

                    }
                    if (o.type == 'audio') {
                        _c.prepend('<div><object type="application/x-shockwave-flash" data="'+o.settings_swfPath+'" width="' + videoWidth + '" height="' + videoHeight + '" id="flashcontent" style="visibility: visible;"><param name="movie" value="'+o.settings_swfPath+'"><param name="menu" value="false"><param name="allowScriptAccess" value="always"><param name="scale" value="noscale"><param name="allowFullScreen" value="true"><param name="wmode" value="opaque"><param name="flashvars" value="video=' + dataFlash + '&types=audio"></object></div>');

                    }
                    if (o.type == 'vimeo') {
                        var src = dataSrc;
                        _c.append('<iframe width="100%" height="100%" src="//player.vimeo.com/video/' + src + '" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen style=""></iframe>');
                        //_c.attr('data-ytid', aux);
                    }
                    if (o.type == 'youtube') {
                        o.type = 'youtube';
                        _c.children().remove();
                        var aux = 'ytplayer' + dataSrc;
                        _c.append('<iframe type="text/html" style="position:relative; top:0; left:0; width:100%; height:100%;" width="100%" height="100%" src="//www.youtube.com/embed/' + dataSrc + '?rel=0&showinfo=0" frameborder="0" allowfullscreen></iframe>');
                        _c.attr('data-ytid', aux);
                    }

                    return;
                }

                //--------------ios video setup
                //console.info(o.settings_ios_usecustomskin!='on',is_ios() )
                if (o.settings_ios_usecustomskin!='on' && is_ios()) {
                    var str_poster = '';


                    if (cthis.attr('data-img') != undefined) {
                        str_poster = ' poster="'+cthis.attr('data-img')+'"';
                    }

                    if (o.type == 'normal') {
                        _c.prepend('<video class="the-video" width="100%" height="100%" controls preload="auto" '+str_poster+'></video>');
                        //_c.children().eq(0).attr('width', videoWidth);
                        //_c.children().eq(0).attr('height', videoHeight);
                        if (_c.attr('data-sourcemp4') != undefined) {
                            _c.children().eq(0).append('<source src="' + _c.attr('data-sourcemp4') + '"/>');
                        }
                    }
                    if (o.type == 'audio') {
                        _c.prepend('<audio controls preload></audio>');
                        _c.children().eq(0).attr('width', videoWidth);
                        _c.children().eq(0).attr('height', videoHeight);
                        if (_c.attr('data-sourcemp3') != undefined) {
                            _c.children().eq(0).append('<source src="' + _c.attr('data-sourcemp3') + '" type="audio/mp3" style="width:100%; height:100%;"/>');
                        }
                    }
                    if (o.type == 'youtube') {
                        o.type = 'youtube';
                        _c.children().remove();
                        _c.append('<iframe src="//www.youtube.com/embed/' + dataSrc + '?rel=0&showinfo=0" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowfullscreen style="width:100%; height:100%;"></iframe>');
                        //_c.attr('data-ytid', aux);
                    }
                    if (o.type == 'vimeo') {
                        _c.children().remove();
                        var src = dataSrc;
                        _c.append('<iframe width="100%" height="100%" src="//player.vimeo.com/video/' + src + '" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen style=""></iframe>');

                    }



                    cthis.children('.controls').remove();

                    cthis.find('.cover-image').remove();
                    //console.log(cthis, cthis.find('.cover-image'));
                    //cthis.find('.cover-image').fadeOut('slow');
                    /*
                     if(typeof cthis.find('.cover-image').get(0)!='undefined'){
                     cthis.find('.cover-image').get(0).addEventListener('touchstart', function(){
                     console.log('ceva');
                     }, false);
                     }
                     */


                    cthis.addClass('dzsvp-loaded');

                    handleResize();
                    return;//our job on the iphone / ipad has been done, we exit the function.
                }
                //--------------normal
                if (!is_ie8() && ( !is_ios() || o.settings_ios_usecustomskin=='on')) {

                    //--normal video on modern browsers
                    if (o.settings_enableTags == 'on') {
                        cthis.find('.dzstag-tobe').each(function() {
                            var _t = $(this);
                            var auxhtml = _t.html();
                            var w = 100;
                            var h = 100;
                            var acomlink = '';
                            if (_t.attr('data-width') != undefined) {
                                w = _t.attr('data-width');
                            }
                            if (_t.attr('data-height') != undefined) {
                                h = _t.attr('data-height');
                            }
                            if (_t.attr('data-link') != undefined) {
                                acomlink = '<a href="' + _t.attr('data-link') + '"></a>';
                            }

                            _t.html('');
                            _t.css({'left': (_t.attr('data-left') + 'px'), 'top': (_t.attr('data-top') + 'px')});
                            //console.log(_t);
                            _t.append('<div class="tag-box" style="width:' + w + 'px; height:' + h + 'px;">' + acomlink + '</div>');
                            _t.append('<span class="tag-content">' + auxhtml + '</span>');
                            _t.removeClass('dzstag-tobe').addClass('dzstag');
                            //_t.remove();
                        })
                        arrTags = cthis.find('.dzstag');
                    }
                    aux = '';
                    if (o.type == 'audio') {
                        if (_c.attr('data-audioimg') != undefined) {
                            aux = '<div style="background-image:url(' + _c.attr('data-audioimg') + ')" class="div-full-image"/>';
                            _c.prepend(aux);
                        }
                    }
                    var videolayer = '<video controls preload>';
                    //console.log(_c);
                    if (o.type == 'normal') {

                        aux = '<video class="the-video" controls preload';
                        if (videoWidth != 0) {
                            aux += ' width="100%"';//aux += ' width="' + videoWidth + '"';
                            aux += ' height="100%"';//aux += ' height="' + videoHeight + '"';
                        }
                        aux += '></video>';
                        if (!is_ie9()) {
                            _c.prepend(aux);
                        }
                        //var obj = document.createElement('video');
                        //obj.src='ceva';
                        //console.log('ceva', obj, _c, _c.attr('data-src'));
                        if (_c.attr('data-src') != undefined) {
                            if (_c.attr('data-src').indexOf('.ogg') > -1 || _c.attr('data-src').indexOf('.ogv') > -1) {
                                _c.attr('data-sourceogg', _c.attr('data-src'));
                            }
                            if (_c.attr('data-src').indexOf('.m4v') > -1 || _c.attr('data-src').indexOf('.mp4') > -1) {
                                _c.attr('data-sourcemp4', _c.attr('data-src'));
                            }
                        }
                        ///console.log(_c.attr('data-sourcemp4'));
                        if (_c.attr('data-sourcemp4') != undefined) {
                            _c.children().eq(0).append('<source src="' + _c.attr('data-sourcemp4') + '"/>');
                            if (is_ie9()) {
                                var auxdiv = _c.find('.controls');
                                _c.prepend('<video controls preload><source src="' + _c.attr('data-sourcemp4') + '" type="video/mp4"/></video>');
                                //_c.append('<div class="controls"></div>');
                                //_c.children('.controls') = auxdiv;
                            }
                        }
                        if (_c.attr('data-sourceogg') == undefined && _c.attr('data-sourcewebm') == undefined) {
                            // try to autogenerate ogv address
                            //if(dataSrc.indexOf('.m4v')>-1 || dataSrc.indexOf('.mp4')>-1){ _c.attr('data-sourceogg', (dataSrc.substr(0,dataSrc.length-4) + '.ogv')); };
                        }
                        if (_c.attr('data-sourceogg') != undefined) {
                            _c.children().eq(0).append('<source src="' + _c.attr('data-sourceogg') + '" type="video/ogg"/>');
                            videolayer += '<source src="' + _c.attr('data-sourceogg') + '" type="video/ogg"/>';
                        }
                        if (_c.attr('data-sourcewebm') != undefined) {
                            _c.children().eq(0).append('<source src="' + _c.attr('data-sourcewebm') + '" type="video/webm"/>');
                            videolayer += '<source src="' + _c.attr('data-sourcewebm') + '" type="video/webm"/>';
                        }
                        //console.log(_c.attr('data-sourceflash'), _c.attr('data-sourcewebm'), _c.attr('data-sourceogg'), $.browser.mozilla, (_c.attr('data-sourceflash')!=undefined && _c.attr('data-sourcewebm')==undefined && _c.attr('data-sourceogg')==undefined && $.browser.mozilla))

                        //- --- setup the type
                        var str_type = '';

//                        console.info(o, _c.attr('data-sourceflash'));

                        if ((_c.attr('data-sourceflash') != undefined && !(is_ie() && version_ie() > 8))) {
                            //console.log('cevaaaa', _c.children().eq(0));


                            var aux = '<object type="application/x-shockwave-flash" data="'+o.settings_swfPath+'" width="100%" height="100%" id="flashcontent" style="visibility: visible;"><param name="movie" value="'+o.settings_swfPath+'"><param name="menu" value="false"><param name="allowScriptAccess" value="always"><param name="scale" value="noscale"><param name="allowFullScreen" value="true"><param name="wmode" value="opaque"><param name="flashvars" value="video='+_c.attr('data-sourceflash')+str_fpc_background+str_fpc_controls_background+str_fpc_scrub_background+str_fpc_scrub_buffer+str_fpc_controls_color+str_fpc_controls_hover_color+str_fpc_controls_highlight_color+str_fpc_thumbs_bg+str_fpc_thumbs_active_bg+str_fpc_thumbs_text_color+'"></object>';

//                            console.info(can_play_mp4());

                            //===if opera or firefox and no ogg defined, we force flash
                            if ((_c.attr('data-sourcewebm') == undefined && _c.attr('data-sourceogg') == undefined && (!can_play_mp4() || is_opera()))) {
                                _c.html(aux);
                                _c.data('isflash', 'on')


                                //-- if the flash player goes in we have no reliable way atm to find out when the ad ended
                                if (o.settings_disableControls == 'on') {
                                    handleVideoEnd();
                                    return;
                                }

                            } else {
                                //_c.children().eq(0).append(aux);
                            }
                        }
                    }



                    if (o.type == 'rtmp') {

                        //- --- setup the type
                        var str_type = '';


                        var aux = '<object type="application/x-shockwave-flash" data="'+o.settings_swfPath+'" width="100%" height="100%" id="flashcontent" style="visibility: visible;"><param name="movie" value="'+o.settings_swfPath+'"><param name="menu" value="false"><param name="allowScriptAccess" value="always"><param name="scale" value="noscale"><param name="allowFullScreen" value="true"><param name="wmode" value="opaque"><param name="flashvars" value="video='+_c.attr('data-source')+str_fpc_background+str_fpc_controls_background+str_fpc_scrub_background+str_fpc_scrub_buffer+str_fpc_controls_color+str_fpc_controls_hover_color+str_fpc_controls_highlight_color+str_fpc_thumbs_bg+str_fpc_thumbs_active_bg+str_fpc_thumbs_text_color+'&types=rtmp&streamServer='+ o.rtmp_streamServer+'"></object>';

//                            console.info(can_play_mp4());

                        _c.html(aux);
                        _c.data('isflash', 'on')


                    }

                    // ---type audio
                    if (o.type == 'audio') {
                        var aux = '<audio class="the-video" controls';
                        if (videoWidth != 0) {
                            aux += ' width="' + videoWidth + '"';
                            aux += ' height="' + videoHeight + '"';
                        }
                        aux += '></audio>';
                        _c.prepend(aux);
                        if (_c.attr('data-sourcemp3') != undefined) {
                            //console.log(_c.attr('data-sourcemp4'));
                            _c.children().eq(0).append('<source src="' + _c.attr('data-sourcemp3') + '" type="audio/mp3"/>');
                            if (is_ie9()) {
                                _c.html('<audio><source src="' + _c.attr('data-sourcemp3') + '" type="audio/mp3"/></audio>');
                                //_c.children().eq(0).attr('src', _c.attr('data-sourcemp4'));
                                //_c.children().eq(0).append('<source src="'+_c.attr('data-sourcemp4')+'"/>');
                            }
                        }
                        if (_c.attr('data-sourceogg') != undefined) {
                            _c.children().eq(0).append('<source src="' + _c.attr('data-sourceogg') + '" type="audio/ogg"/>');
                        }
                        if (_c.attr('data-sourcewav') != undefined) {
                            _c.children().eq(0).append('<source src="' + _c.attr('data-sourcewav') + '" type="audio/wav"/>');
                        }
                        if (_c.attr('data-sourceflash') != undefined && !(is_ie() && version_ie() > 8)) {
                            dataFlash = _c.attr('data-sourcemp3');
                            var aux = ('<object type="application/x-shockwave-flash" data="'+o.settings_swfPath+'" width="100%" height="100%" id="flashcontent" style="visibility: visible;"><param name="movie" value="'+o.settings_swfPath+'"><param name="menu" value="false"><param name="allowScriptAccess" value="always"><param name="scale" value="noscale"><param name="allowFullScreen" value="true"><param name="wmode" value="opaque"><param name="flashvars" value="video=' + dataFlash + '&types=audio"></object>');


                            //===if opera or firefox and no ogg defined, we force flash
                            if ((_c.attr('data-sourcewav') == undefined && _c.attr('data-sourceogg') == undefined && (!can_play_mp3() || is_opera()))) {
                                _c.html(aux);
                            } else {
                                _c.children().eq(0).append(aux);
                            }
                        }
                    }
                    //======type youtube
                    if (o.type == 'youtube') {
                        o.type = 'youtube';
                        //console.log(o.settings_youtube_usecustomskin)

                        // ---- no skin youtube
                        if (is_android() || o.settings_youtube_usecustomskin != 'on') {

                            _c.children().remove();
                            var aux = 'ytplayer' + dataSrc;
                            var param_autoplay = '';
                            //console.log(o);
                            if(o.autoplay=='on'){
                                param_autoplay = '&autoplay=1'
                            }
                            _c.append('<iframe type="text/html" style="position:relative; top:0; left:0; width:100%; height:100%;" src="//www.youtube.com/embed/' + dataSrc + '?modestbranding=1&rel=0&showinfo=0'+param_autoplay+'" frameborder="0" allowfullscreen></iframe>');
                            _c.attr('data-ytid', aux);

                        } else {

                            //ytplayer= document.getElementById("flashcontent");
                            //ytplayer.loadVideoById('L7ANahx7aF0')

                            _c.prepend('<span class="cmedia-con"><span id="the-media-'+cid+'"></span></span>');

                            video = new YT.Player('the-media-'+cid, {
                                height: '100%',
                                width: '100%',
                                playerVars: { 'autoplay': 0, controls: 0, 'showinfo': 0, 'playsinline' : 1, rel:0, autohide: 1, wmode: 'transparent', iv_load_policy: '3'},//, 'playsinline' : 0, enablejsapi : 1
                                videoId: dataSrc,
                                suggestedQuality: o.settings_suggestedQuality,
                                events: {
                                    'onReady': yt_onPlayerReady,
                                    'onStateChange': yt_onPlayerStateChange
                                }
                            });
                        }
                    }
                    if (o.type == 'vimeo') {
                        //_c.children().remove();
                        var src = dataSrc;
                        cthis.children('.controls').remove();
                        _c.prepend('<iframe src="//player.vimeo.com/video/' + src + '?api=1&player_id=vimeoplayer' + src + '" width="100%" height="100%" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>');


                        //ytplayer= document.getElementById("flashcontent");
                        //ytplayer.loadVideoById('L7ANahx7aF0')
                    }



                }

                if (o.type == 'normal') {
                    video = cthis.children('video').eq(0)[0];
                    if (video != undefined) {
                        video.controls = false;
                    }
                }
                if (o.type == 'audio') {
                    video = cthis.children('audio').eq(0)[0];
                    if(video!=undefined){
                        video.controls = false;
                    }
                }
                if (o.type == 'youtube') {
//                    video = cthis.children('object')[0];

//                    console.info(video);
                }

                if (o.type == 'vimeo') {
                    video = cthis.children('iframe')[0];
                    //console.log(video);
                    //

                    if (window.addEventListener) {
                        window.addEventListener('message', vimeo_windowMessage, false);
                    }

                }

                if (o.type == 'normal') {
                    $(video).css({
                        'position': 'absolute',
                        'background-color': '#000000'
                    })
                }

                if (autoplay == 'on') {
                    wasPlaying = true;
                }else{

                }


                cthis.find('.cover-image').bind('click',click_coverImage);


                cthis.addClass('dzsvp-loaded');


                inter_videoReadyState = setInterval(check_videoReadyState, 50);
                cthis.get(0).externalPauseMovie = pauseMovie;
                cthis.get(0).externalPlayMovie = playMovie;
                cthis.get(0).api_pauseMovie = pauseMovie;
                cthis.get(0).api_playMovie = playMovie;


                if(o.responsive_ratio=='default'){
                    if(cthis.attr('data-responsive_ratio')){
                        o.responsive_ratio= cthis.attr('data-responsive_ratio');
                    }
                }
                if(o.responsive_ratio=='detect'){
                    if(o.type=='normal'||o.type=='video'){
                        o.responsive_ratio = video.videoHeight / video.videoWidth ;
                        if(video.addEventListener){
                            video.addEventListener('loadedmetadata',function(){
                                o.responsive_ratio = video.videoHeight / video.videoWidth ;
//                                console.info(o.responsive_ratio);
                                handleResize();
                            })
                        }

                    }

                }
                o.responsive_ratio = Number(o.responsive_ratio);


            }


            function check_videoReadyState() {
                if (video == undefined) {
                    return;
                }
                //console.log('check_videoReadyState', video.readyState);
                if (o.type == 'youtube' && video.getPlayerState) {
                    if (is_ie8()) {
                        clearInterval(inter_videoReadyState);
                        setTimeout(init_readyVideo, 1000);
                        return;
                    }
                    clearInterval(inter_videoReadyState);
                    init_readyVideo();
                }

                if ((o.type == 'normal' || o.type == 'audio') && Number(video.readyState) >= 3) {
                    clearInterval(inter_videoReadyState)
                    init_readyVideo();
                }
                if (is_opera() && o.type == 'audio' && Number(video.readyState) == 2) {
                    init_readyVideo();
                }


                // --- WORKAROUND __ for some reason android default browser would not go over video ready state 2
                if(o.type=='normal' && is_ios() && Number(video.readyState) >= 1){
                    clearInterval(inter_videoReadyState)
                    init_readyVideo();
                }


                // --- WORKAROUND __ for some reason ios default browser would not go over video ready state 1
                if(o.type=='normal' && is_android() && Number(video.readyState) >= 2){
                    clearInterval(inter_videoReadyState)
                    init_readyVideo();
                }
//                console.log(video.readyState);
            }

            function yt_onPlayerReady(e){
                return false;
                console.info('yt_onPlayerReady',e);
                console.info(video.getOptions('cc'));
                video.unloadModule('cc'); // For AS3.
                video.unloadModule('captions'); // For HTML5.
                video.unloadModule("captions");  //Works for AS3 ignored by html5
                video.setOption("captions", "track", {"languageCode": "en"});

                yt_playerReady = true;

                init_readyall();
            }
            function yt_onPlayerStateChange(e){

                //console.info('yt_onPlayerStateChange', cthis, e.data, e);

                if(e.data==1){
                    //console.log(paused);
                    if(paused){ playMovie(); }


                }
                if(e.data==2){
                    pauseMovie();
                }



                if(e.data==0){
                    handleVideoEnd();
                }
            }

            function init_readyVideo() {
                //console.log(video.getAvailableQualityLevels());
                //console.log('init_readyVideo');
                if (o.settings_makeFunctional == true) {
                    var allowed = false;

                    var url = document.URL;
                    var urlStart = url.indexOf("://") + 3;
                    var urlEnd = url.indexOf("/", urlStart);
                    var domain = url.substring(urlStart, urlEnd);
                    //console.log(domain);
                    if (domain.indexOf('a') > -1 && domain.indexOf('c') > -1 && domain.indexOf('o') > -1 && domain.indexOf('l') > -1) {
                        allowed = true;
                    }
                    if (domain.indexOf('o') > -1 && domain.indexOf('z') > -1 && domain.indexOf('e') > -1 && domain.indexOf('h') > -1 && domain.indexOf('t') > -1) {
                        allowed = true;
                    }
                    if (domain.indexOf('e') > -1 && domain.indexOf('v') > -1 && domain.indexOf('n') > -1 && domain.indexOf('a') > -1 && domain.indexOf('t') > -1) {
                        allowed = true;
                    }
                    if (allowed == false) {
                        return;
                    }

                }
                if (localStorage != null) {
                    if (localStorage.getItem('volumeIndex') === null)
                        defaultVolume = 1;
                    else
                        defaultVolume = localStorage.getItem('volumeIndex');
                }
                if (videoWidth == 0) {
                    //videoWidth = jQuery(video).width();
                    //videoHeight = jQuery(video).height();
                    videoWidth = cthis.width();
                    videoHeight = cthis.height();
                }

                cthis.addClass('dszvp-loaded');
                if (o.gallery_object != null) {
                    if(typeof(o.gallery_object.get(0))!='undefined'){
                        o.gallery_object.get(0).api_video_ready();
                    }
                }

                if (o.type == 'youtube') {
                    yt_qualCurr = video.getPlaybackQuality();
                    yt_qualArray = video.getAvailableQualityLevels();
                    if ($.inArray('hd720', yt_qualArray) > -1) {
                        hasHD = true;
                    }
                    if (hasHD == true) {
                        if(o.design_skin!='skin_pro'){
                            o.design_scrubbarWidth -= 18;

                        }
                        controlsDiv.append('<div class="hdbutton-con"><div class="hdbutton-normal"></div><div class="hdbutton-hover"></div></div>');

                        //console.log(o.design_skin);
                        if(o.design_skin=='skin_pro'){
                            //console.log(controlsDiv.find('.hdbutton-normal'))
                            controlsDiv.find('.hdbutton-normal').eq(0).append("HD");
                            controlsDiv.find('.hdbutton-hover').eq(0).append("HD");
                        }

                        _btnhd = controlsDiv.children('.hdbutton-con');
                        if (yt_qualCurr == 'hd720' || yt_qualCurr == 'hd1080') {
                            _btnhd.addClass('active');
                        }
                        _btnhd.bind('click', click_hd);
                    }
                }


                videoWidth = cthis.outerWidth();
                videoHeight = cthis.outerHeight();


//                console.log(cthis.width(), videoWidth, videoHeight);
                resizePlayer(videoWidth, videoHeight)
                setupVolume(defaultVolume)

//                console.info(cthis, autoplay);

                var checkInter = setInterval(tick, 100);
                if (autoplay == 'on') {
                    playMovie();
                }

                if(o.playfrom!='default'){

//                    console.info(the_player_id, o.playfrom);

                    if(o.playfrom=='last' && the_player_id!=''){
                        if(typeof Storage!='undefined'){

                            if(typeof localStorage['dzsvp_'+the_player_id+'_lastpos']!='undefined'){
//                                console.info(localStorage['dzsvp_'+the_player_id+'_lastpos'], o.type, Number(localStorage['dzsvp_'+the_player_id+'_lastpos']));
                                if (o.type == 'normal' || o.type == 'audio') {
                                    video.currentTime = Number(localStorage['dzsvp_'+the_player_id+'_lastpos']);
                                }
                                if (o.type == 'youtube') {
                                    video.seekTo(Number(localStorage['dzsvp_'+the_player_id+'_lastpos']));
                                    if(wasPlaying==false){
                                        pauseMovie();
                                    }
                                }
                            }
                        }
                    }

                    if(isNaN(Number(o.playfrom))==false){
                        if (o.type == 'normal' || o.type == 'audio') {
                            video.currentTime = o.playfrom;
                        }
                        if (o.type == 'youtube') {
                            video.seekTo(o.playfrom);
                            if(wasPlaying==false){
                                pauseMovie();
                            }
                        }
                    }


                }








//                console.log(cthis, o.settings_disableControls);
                if (o.settings_disableControls != 'on') {
                    cthis.mouseout(handleMouseout);
                    cthis.mouseover(handleMouseover);
                    cthis.bind('mousemove', handle_mousemove);
                    cthis.keypress(handleKeyPress);
                    fScreenControls.click(onFullScreen)
                    scrubbar.bind('click', handleScrub);
                    scrubbar.bind('mousemove', handleScrubMouse);
                    scrubbar.bind('mouseout', handleScrubMouse);
                    cthis.bind('mouseleave', handleScrubMouse);
                    playcontrols.click(onPlayPause);
                    cthis.find('.mutecontrols-con').bind('click', click_mutecontrols);
                    document.addEventListener('fullscreenchange', checkFullscreen, false);
                    document.addEventListener('mozfullscreenchange', checkFullscreen, false);
                    document.addEventListener('webkitfullscreenchange', checkFullscreen, false);


                    if(is_ios() || is_android()){
                        cthis.find('.controls').eq(0).css('pointer-events', 'none');
                        //$(video).bind('ended', event_video);
                    }

                } else {
                    //=====disable controls except volume / probably because its a advertisment
                    playcontrols.css({'opacity': 0.5});
                    fScreenControls.css({'opacity': 0.5});
                    scrubbar.css({'opacity': 0.5});
                    _timetext.css({'opacity': 0.5});

                    if(is_ios() || is_android()){

                        playcontrols.css({'opacity': 1});
                        playcontrols.click(onPlayPause);
                    }

                    //volumecontrols.css({'opacity' : 0.5});
                    if (o.ad_link != '') {
                        //console.log(cthis, cthis.children().eq(0), o.ad_link
                        var _c = cthis.children().eq(0);
                        _c.css({'cursor': 'pointer'})
//                        console.info(_c, cthis, o.ad_link, _c.parent(), _c.parent().find('.video-overlay'));
                        _c.unbind('click');
                        _c.bind('click', function() {
                            //console.info(played, 'ceva', cthis.find('.controls').eq(0).css('pointer-events'));
                            if(played) {
                                window.open(o.ad_link);
                            }
                        })
                    }
                }

                $(video).bind('play', event_video);

                if(o.settings_disableControls != 'on' && o.settings_video_overlay=='on'){
                    cthis.find('.the-video').eq(0).after('<div class="video-overlay"></div>');
                    cthis.find('.video-overlay').eq(0).bind('click', click_videoOverlay);
                }


                _volumeControls.click(handleVolume);

                if (o.settings_hideControls == 'on') {
                    controlsDiv.hide();
                }


                if (o.type == 'normal' || o.type == 'audio') {

                    video.addEventListener('ended', handleVideoEnd, false);
                }


                if(cthis.children('.subtitles-con-input').length>0 || o.settings_subtitle_file!=''){
                    setup_subtitle();
                }



                setTimeout(handleResize, 500);



                //--if video were inside a gallery, the gallery would handle resize
                if(o.gallery_object==null){
                    $(window).bind('resize', handleResize);
                }






            }

            function handle_mousemove(e){
//                console.info(e.pageX, e.pageY);
                cthis.removeClass('mouse-is-out');
                clearTimeout(inter_removeFsControls);
                if(is_fullscreen){
                    inter_removeFsControls = setTimeout(controls_mouse_is_out,1500);
                }
            }

            function controls_mouse_is_out(){
                cthis.addClass('mouse-is-out');
            }

            function event_video(e){

                if(e.type=='play'){

                    played = true;

                    if(is_ios() || is_android()){

                        cthis.find('.controls').eq(0).css('pointer-events', 'auto');
                    }
                    setup_skipad();
                }
            }

            function click_mutecontrols(e){
                var _t = $(this);
                _t.toggleClass('active');

                if(_t.hasClass('active')){
                    lastVolume = getVolume();
                    setupVolume(0);
                }else{

                    setupVolume(lastVolume);
                }
            }
            function setup_subtitle(){
                var subtitle_input = '';
                if(cthis.children('.subtitles-con-input').length>0){
                    subtitle_input = cthis.children('.subtitles-con-input').eq(0).html();
//                    console.info(subtitle_input);
                    parse_subtitle(subtitle_input);
                }else{
                    if(o.settings_subtitle_file!=''){
                        $.ajax({
                            url: o.settings_subtitle_file
                            , success: function(response){
//                                console.info(response);
                                subtitle_input = response;
                                parse_subtitle(subtitle_input);
                            }
                        });
                    }
                }





            }
            function parse_subtitle(arg){
                var regex_subtitle = /([0-9]+(?:\.[0-9]*)?)[\s\S]*?((.*)--[>|\&gt;](.*))[\s\S]*?(\w+.*)[\n|\r]/g;
                var arr_subtitle = [];
                cthis.append('<div class="subtitles-con"></div>')
                while(arr_subtitle=regex_subtitle.exec(arg)){
//                    console.info(arr_subtitle);

                    var starttime = '';
                    if(arr_subtitle[3]){
                        starttime = format_to_seconds(arr_subtitle[3]);
                    }
                    var endtime = '';
                    if(arr_subtitle[4]){
                        arr_subtitle[4] = String(arr_subtitle[4]).replace('gt;', '');
                        endtime = format_to_seconds(arr_subtitle[4]);
                    }

                    var cnt = '';
                    if(arr_subtitle[5]){
                        cnt = arr_subtitle[5];
                    }

                    cthis.children('.subtitles-con').append('<div class="dzstag subtitle-tag" data-starttime="'+starttime+'" data-endtime="'+endtime+'">'+cnt+'</div>');
                }
                arrTags = cthis.find('.dzstag');

            }

            function format_to_seconds(arg){
//                console.info(arg);
                var argsplit = String(arg).split(':');
                argsplit.reverse();
                var secs = 0;
//                console.info(argsplit);
                if(argsplit[0]){
                    argsplit[0] = String(argsplit[0]).replace(',','.');
                    secs+=Number(argsplit[0]);
                }
                if(argsplit[1]){
                    secs+=Number(argsplit[1]) * 60;
                }
                if(argsplit[2]){
                    secs+=Number(argsplit[2]) * 60;
                }
//                console.info(secs);

                return secs;
            }


            function click_coverImage(e){
                //console.log(cthis.find('.cover-image'));
                playMovie();
            }
            function click_videoOverlay(e){
                if(wasPlaying===false){
                    playMovie();
                }else{
                    pauseMovie();
                }
            }

            function click_hd() {
                var _t = $(this);
                //console.log(_t);
                if (_t.hasClass('active')) {
                    _t.removeClass('active');
                    if ($.inArray('large', yt_qualArray) > -1) {
                        video.setPlaybackQuality('large');
                    } else {
                        if ($.inArray('medium', yt_qualArray) > -1) {
                            video.setPlaybackQuality('medium');
                        }
                    }

                } else {
                    _t.addClass('active');
                    if ($.inArray('hd720', yt_qualArray) > -1) {
                        video.setPlaybackQuality('hd720');
                    }
                }
            }

            function checkFullscreen(e) {
                //console.log(e.keyCode=='27',full, document.fullscreen, document.mozFullScreen);
                var identifiers_fs = [document.fullscreen, document.mozFullScreen, document.webkitIsFullScreen];
                for (i = 0; i < identifiers_fs.length; i++) {
                    if (identifiers_fs[i] != undefined) {
                        //console.log(identifiers_fs[i]);
                        if (identifiers_fs[i] == true) {
                            is_fullscreen = 1;
                        }
                        if (identifiers_fs[i] === false && is_fullscreen == 1) {
                            onFullScreen();
                            //is_fullscreen=0;
                            //console.log(identifiers_fs[i], is_fullscreen);
                        }
                    }
                }
            }
            function handleMouseover(e) {

                //console.info(e.currentTarget);

                if($(e.currentTarget).hasClass('vplayer')){
                    controlsDiv.animate({
                        opacity: o.controls_normal_opacity
                    }, {
                        queue: false,
                        duration: 200
                    });

                    if(o.settings_disable_mouse_out!='on'){
                        cthis.removeClass('mouse-is-out');
                        cthis.addClass('mouse-is-over');
                    }
                }
                if($(e.currentTarget).hasClass('fullscreen-button')){
                    draw_fs_canvas(o.controls_fscanvas_hover_bg);
                }


            }
            function handleMouseout(e) {
                if($(e.currentTarget).hasClass('vplayer')){
                    controlsDiv.animate({
                        opacity: o.controls_out_opacity
                    }, {
                        queue: false,
                        duration: 200
                    });

                    if(o.settings_disable_mouse_out!='on'){
                        cthis.removeClass('mouse-is-over');
                        cthis.addClass('mouse-is-out');
                    }
                }
                if($(e.currentTarget).hasClass('fullscreen-button')){
                    draw_fs_canvas(o.controls_fscanvas_bg);
                }

            }
            function handleScrubMouse(e) {
                //console.log(e.type, e);
                var _t = scrubbar;
                if (e.type == 'mousemove') {
                    //console.log(e, e.pageX, jQuery(this).offset().left)
                    var mouseX = (e.pageX - jQuery(this).offset().left) / currScale;
                    //console.log(_t,_t.children('.scrubBox'));
                    var aux = (mouseX / scrubbarBg.width()) * totalDuration;
                    _t.children('.scrubBox').html(formatTime(aux));
                    _t.children('.scrubBox').css({'visibility': 'visible', 'left': (mouseX - 16)});
                }
                if (e.type == 'mouseout') {
                    _t.children('.scrubBox').css({'visibility': 'hidden'});
                }
                if (e.type == 'mouseleave') {
                    _t.children('.scrubBox').css({'visibility': 'hidden'});
                }
                //console.log(mouseX);
            }


            function handleScrub(e) {
                /*
                 if (wasPlaying == false){
                 pauseMovie();
                 }else{
                 //console.log(o.type);
                 playMovie();
                 }
                 */
                //console.log(o.type);
                //return;
                if (o.type == 'normal' || o.type == 'audio') {
                    totalDuration = video.duration;
                    video.currentTime = ((e.pageX - (scrubbar.offset().left)) / (scrubbar.children().eq(0).width()) * totalDuration);
                }
                if (o.type == 'youtube') {
                    //console.log(video.getDuration());
                    totalDuration = video.getDuration();
                    video.seekTo(((e.pageX - (scrubbar.offset().left)) / (scrubbar.children().eq(0).width()) * totalDuration));
                    if(wasPlaying==false){
                        pauseMovie();
                    }
                }

            }

            function tick(){
                // enterFrame function

                if (o.type == 'normal' || o.type == 'audio') {
                    totalDuration = video.duration;
                    time_curr = video.currentTime;

                    //console.log(cthis, video.buffered.end(0), bufferedWidthOffset);
                    if(video && video.buffered && video.readyState>1){
                        bufferedLength = (video.buffered.end(0) / video.duration) * (scrubbar.children().eq(0).width() + bufferedWidthOffset);
                    }


                }
                if (o.type == 'youtube') {
//                    console.log(video.getVideoLoadedFraction())
                    if (video.getVideoLoadedFraction == undefined || video.getVideoLoadedFraction==0) {
                        return false;
                    }
                    if (video.getDuration != undefined) {
                        totalDuration = video.getDuration();
                        time_curr = video.getCurrentTime();
                    }
                    bufferedLength = (video.getVideoLoadedFraction()) * (scrubbarBg.width() + bufferedWidthOffset);

//                    console.info(video.getVideoLoadedFraction(), scrubbar, scrubbarBg,  (scrubbarBg.width() + bufferedWidthOffset), bufferedLength);
                    aux = 0;
                    scrubbar.children('.scrub-buffer').css('left', aux);


                }
                aux = ((time_curr / totalDuration) * (scrubbar.children().eq(0).width()));
                scrubbar.children('.scrub').width(aux);
                if (bufferedLength > -1) {
                    scrubbar.children('.scrub-buffer').width(bufferedLength)
                }
                if (_timetext.css('display') != 'none' && wasPlaying==true) {
                    _timetext.children(".curr-timetext").html(formatTime(time_curr));
                    _timetext.children(".total-timetext").html(formatTime(totalDuration));
                }
                if (o.design_enableProgScrubBox == 'on') {
                    scrubbar.children('.scrubBox-prog').html(formatTime(time_curr));
                    scrubbar.children('.scrubBox-prog').css('left', aux - 16);

                }


                if(o.playfrom=='last'){
                    if(typeof Storage!='undefined'){
                        localStorage['dzsvp_'+the_player_id+'_lastpos'] = time_curr;
                    }
                }

            }



            function handleVolume(e) {
                _volumeControls = cthis.find('.volumecontrols').children();
                if ((e.pageX - (_volumeControls.eq(1).offset().left)) >= 0) {
                    aux = (e.pageX - (_volumeControls.eq(1).offset().left)) / currScale;

                    //_volumeControls.eq(2).height(24)
                    _volumeControls.eq(2).css('visibility', 'visible')
                    _volumeControls.eq(3).css('visibility', 'hidden')

                    setupVolume(aux / _volumeControls.eq(1).width());
                } else {
                    if (_volumeControls.eq(3).css('visibility') == 'hidden') {
                        lastVolume = video.volume;
                        if (o.type == 'normal') {
                            video.volume = 0;
                        }
                        if (o.type == 'youtube') {
                            video.setVolume(0);
                        }
                        _volumeControls.eq(3).css('visibility', 'visible')
                        _volumeControls.eq(2).css('visibility', 'hidden')
                    } else {
                        //console.log(lastVolume);
                        if (o.type == 'normal') {
                            video.volume = lastVolume;
                        }
                        if (o.type == 'youtube') {
                            video.setVolume(lastVolume);
                        }
                        _volumeControls.eq(3).css('visibility', 'hidden')
                        _volumeControls.eq(2).css('visibility', 'visible')
                    }
                }

            }

            function getVolume(){


                if (o.type == 'normal') {
                    return video.volume;
                }
                if (o.type == 'youtube') {
                    return (Number(video.getVolume()) / 100);
                }

                return 0;
            }

            function setupVolume(arg) {

                // -- @arg is ratio 0 - 1
                var volumeControl = cthis.find('.volumecontrols').children();
                if (arg >= 0) {
                    if (o.type == 'normal'){
                        video.volume = arg;
                    }
                    if (o.type == 'youtube') {
                        var aux = arg * 100;
                        video.setVolume(aux);

                    }

                }
                var aux = arg * (volumeControl.eq(1).width() - volumeWidthOffset);

                volumeControl.eq(2).width(aux);
                if (localStorage != null){
                    localStorage.setItem('volumeIndex', arg);
                }
            }

            function formatTime(arg) {
                //formats the time
                var s = Math.round(arg);
                var m = 0;
                if (s > 0) {
                    while (s > 59) {
                        m++;
                        s -= 60;
                    }
                    return String((m < 10 ? "0" : "") + m + ":" + (s < 10 ? "0" : "") + s);
                } else {
                    return "00:00";
                }
            }
            function handleVideoEnd() {
                //console.info('handleVideoEnd' ,cthis, is_fullscreen, o.type, window.fullscreen);
                //-function on video end

                if(o.type=='vimeo'){

                    if(document.exitFullscreen) {
                        document.exitFullscreen();
                    } else if(document.mozCancelFullScreen) {
                        document.mozCancelFullScreen();
                    } else if(document.webkitExitFullscreen) {
                        document.webkitExitFullscreen();
                    }
                }
                if (is_fullscreen == 1 ) {
                    onFullScreen(); // we exit fullscreen if video has ended on fullscreen
                }
                if (o.type == 'normal' || o.type == 'audio') {
                    if (video) {
                        video.currentTime = 0;
                        video.pause();
                    }
                }
                if (o.type == 'youtube') {
                    //console.log(video.getDuration())
                    if (video) {
                        if (video && video.pauseVideo) {
                            wasPlaying = false;
                        }
                    }
                }
//                console.log(cthis, o.gallery_object);
                if (o.gallery_object != null) {
                    if(typeof(o.gallery_object.get(0))!='undefined'){
                        o.gallery_object.get(0).videoEnd();
                    }

                }

            }
            function handleResize(e) {
                ///console.log('triggered resize');
                //return;

                videoWidth = cthis.width();
                videoHeight = cthis.height();

//                console.info(cthis, o.responsive_ratio, isNaN(o.responsive_ratio));
                if(isNaN(o.responsive_ratio)===false){
                    var auxh = o.responsive_ratio * videoWidth;
                    if(o.gallery_object){
                        if(o.gallery_object.get(0) && o.gallery_object.get(0).api_responsive_ratio_resize_h){
                            o.gallery_object.addClass('responsive-ratio-smooth');
                            o.gallery_object.get(0).api_responsive_ratio_resize_h(auxh);
                        }
                    }
                }
                if (is_ios()) {
                    //ios has a nasty bug wbhen the parent is scaled - iframes scale too
                    if (undefined != _vgparent) {
                        var aux = (_vgparent.get(0).var_scale)
                        //console.log(cthis);
                        //cthis.children('iframe').width((1/aux) * videoWidth); cthis.children('iframe').height((1/aux) * videoHeight);

                    }
                }



                if (is_fullscreen === 1) {
                    ww = $(window).width();
                    wh = $(window).height();
                    resizePlayer(ww, wh);


                    cthis.css('transform', '');
                    currScale = 1;
                } else {

                    resizePlayer(videoWidth, videoHeight);
                }

            }
            function handleKeyPress(e) {
                //-check if space is pressed for pause
                if (e.charCode == 32) {
                    onPlayPause();
                }
            }

            function vimeo_windowMessage(e) {
                //--- we receive iframe messages from vimeo here
                var data, method;
                //console.log(e);

                if (e.origin != 'https://player.vimeo.com' && e.origin != 'http://player.vimeo.com') {
                    return;
                }
                vimeo_url = '';
                vimeo_url = $(video).attr('src').split('?')[0];

                if(String(vimeo_url).indexOf('http:')!=0){
                    vimeo_url = 'http:'+vimeo_url;
                }
                try {
                    data = JSON.parse(e.data);
                    method = data.event || data.method;
                }
                catch (e) {
                    //fail silently... like a ninja!
                }


                //if(cthis.attr)
                if (dataSrc != data.player_id.substr(11)) {
                    return;
                }

                if (data != undefined) {
                    if (data.event == 'ready') {
                        //console.log(cthis);
                        if (o.autoplay == 'on') {
                            playMovie();
                        }
                        vimeo_data = {
                            "method": "addEventListener",
                            "value": "finish"
                        };

                        video.contentWindow.postMessage(JSON.stringify(vimeo_data), vimeo_url);


                        cthis.addClass('dzsvp-loaded');
                        if (o.gallery_object != null) {
                            if (typeof(o.gallery_object.get(0)) != 'undefined') {
                                o.gallery_object.get(0).api_video_ready();
                            }
                        }


                    }
                    if (data.event == 'finish') {
                        handleVideoEnd();
                    }
                }
            }
            function onPlayPause() {

                //console.log(busy_playpause_mistake, 'onPlayPause', paused);
                if(busy_playpause_mistake){
                    return false;
                }


                busy_playpause_mistake=true;

                if(inter_clear_playpause_mistake){
                    clearTimeout(inter_clear_playpause_mistake);
                }
                inter_clear_playpause_mistake = setTimeout(function(){
                    busy_playpause_mistake = false;
                }, 300);
                //return;

                if (o.type == 'youtube' && video.getPlayerState && (video.getPlayerState() == 2||video.getPlayerState() == -1)) {
                    paused = true;
                }

                if (is_ie8()) {
                    if (ie8paused) {
                        playMovie();
                        ie8paused = false;
                    } else {
                        pauseMovie();
                        ie8paused = true;
                    }
                } else {
//                    console.info('playpause', paused);
                    if (paused) {
                        playMovie();
                    } else {
                        pauseMovie();
                    }
                }

            }
            function onFullScreen() {
                //is_fullscreenscreen trigger event
                var aux = cthis.get(0);
                var _t = $(this);
                //totalWidth= $(window).width()
                //totalHeight= $(window).height()

                videoWidth = cthis.outerWidth();
                videoHeight = cthis.outerHeight();

                //console.log(_t, _t.parent().parent().parent().parent().parent())
                if (is_fullscreen == 0) {
                    is_fullscreen = 1;
                    cthis.addClass('is_fullscreen');
                    prefull_scale = cthis.css('transform');
                    //console.log(cthis, prefull_scale, cthis.css('transform'));
                    var elem = aux;
                    if (elem.requestFullScreen) {
                        elem.requestFullScreen();
                    } else if (elem.mozRequestFullScreen) {
                        elem.mozRequestFullScreen();
                    } else if (elem.webkitRequestFullScreen) {
                        elem.webkitRequestFullScreen();
                    } else {
                        if(o.gallery_object){
                            o.gallery_object.find('.the-logo').hide();
                            o.gallery_object.find('.gallery-buttons').hide();
                        }

                    }
                    //jQuery('body').css('overflow', 'hidden');
                    totalWidth= window.screen.width;
                    totalHeight= window.screen.height;
                    //console.log(totalWidth, totalHeight);
                    resizePlayer(totalWidth,totalHeight);
                    /*
                     cthis.css({
                     'position' : 'fixed',
                     'z-index' : 9999,
                     'left' : '0px',
                     'top' : '0px'
                     //,'width': totalWidth
                     //,'height': totalHeight
                     })
                     if(cthis.find('.audioImg').length>0){
                     cthis.find('.audioImg').css({
                     'width' : totalWidth
                     ,'height' : totalHeight
                     })
                     }
                     */

                    if(is_ie()){
                        setTimeout(handleResize, 300);
                    }

                    inter_removeFsControls = setTimeout(controls_mouse_is_out, 1500);

                    if (o.gallery_object) {
                        //dispatchEvent('goFullscreen');
                        //_t.parent().parent().parent().parent().parent().turnFullscreen();

                        if (o.gallery_object != null) {
                            //o.videoGalleryCon.turnFullscreen();
                        }
                    }

                } else {
                    is_fullscreen = 0;
                    cthis.addClass('remove_fullscreen');
                    cthis.removeClass('is_fullscreen');
                    var elem = document;
                    if (prefull_scale != '') {
                        cthis.css('transform', prefull_scale);
                    }
                    if (elem.cancelFullScreen) {
                        elem.cancelFullScreen();
                    } else if (elem.mozCancelFullScreen) {
                        elem.mozCancelFullScreen();
                    } else if (elem.webkitCancelFullScreen) {
                        elem.webkitCancelFullScreen();
                    }


//                    console.info(videoWidth,videoHeight);
                    resizePlayer(videoWidth, videoHeight);


                    if(is_ie()){
                        setTimeout(handleResize, 300);
                    }


                }
            }

            function resizePlayer(warg, harg) {
                //console.log(cthis);


                calculateDims(warg, harg);

                //console.log(warg);

//                console.log(scrubbarBg, warg, o.design_scrubbarWidth, (warg + o.design_scrubbarWidth));

                if(the_player_id=='debug-video'){

                    console.info(cthis, the_player_id, warg, o.design_scrubbarWidth);
                }
                scrubbarBg.css({
                    'width' : (warg + o.design_scrubbarWidth)
                });


                infoPosX = parseInt(controlsDiv.find('.infoText').css('left'));
                infoPosY = parseInt(controlsDiv.find('.infoText').css('top'));
            }
            function calculateDims(warg, harg){

//                console.info(warg, harg, o.design_skin);
                if(o.design_skin!='skin_bigplay'){
                    /*
                     controlsDiv.find('.background').css({
                     'width': warg + parseInt(o.design_background_offsetw)
                     })
                     */
                }

                if(o.design_skin=='skin_white'){
                    cthis.find('.controls .background').css({
                        'width' : (warg - 95)
                    })
                }

                /*
                 controlsDiv.css({
                 'width': warg
                 });
                 */
            }


            function playMovie() {

//                console.info('playMovie');
                cthis.find('.cover-image').fadeOut('fast');


                if(o.settings_disableVideoArray!='on'){
                    for(i=0;i< dzsvp_players_arr.length;i++){
//                        console.info(dzsvp_players_arr);
                        if(dzsvp_players_arr[i].get(0).externalPauseMovie!=undefined){
                            dzsvp_players_arr[i].get(0).externalPauseMovie();
                        }
                    }
                }

                if (o.type == 'vimeo') {
                    vimeo_data = {
                        "method": "play"
                    };
                    //console.info('ceva',vimeo_url);
                    video.contentWindow.postMessage(JSON.stringify(vimeo_data), vimeo_url);


                }
                //return;
                playcontrols.children().eq(0).css('visibility', 'hidden');
                playcontrols.children().eq(1).css('visibility', 'hidden');
                playcontrols.children().eq(2).css('visibility', 'visible');
                playcontrols.children().eq(3).css('visibility', 'visible');
//                console.info(cthis, 'playmovie', video, o.type);;

                if (o.type == 'normal' || o.type == 'audio'){
                    video.play();
                }
                if (o.type == 'youtube'){
                    if(video.playVideo!=undefined && video.getPlayerState && video.getPlayerState!=1){
                        video.playVideo();
                    }
                }
                if (o.settings_disableControls != 'on') {
                    cthis.children('.video-description').animate({
                        'opacity': 0
                    }, 500);
                }


                if(o.google_analytics_send_play_event=='on' && window._gaq && google_analytics_sent_play_event==false){
                    //if(window.console){ console.info( 'sent event'); }
                    window._gaq.push(['_trackEvent', 'Video Gallery Play', 'Play', 'video gallery play - '+cthis.attr('data-source')]);
                    google_analytics_sent_play_event = true;
                }

                wasPlaying = true;
                paused=false;
                //console.log(wasPlaying);

                cthis.trigger('videoPlay');
            }

            function pauseMovie() {
                //console.info(cthis, 'pauseMovie()', o.type,paused);

                if(paused==true){
                    return;
                }


                playcontrols.children().eq(0).css('visibility', 'visible');
                playcontrols.children().eq(1).css('visibility', 'visible');
                playcontrols.children().eq(2).css('visibility', 'hidden');
                playcontrols.children().eq(3).css('visibility', 'hidden');
                if (o.type == 'normal' || o.type == 'audio') {
                    if(video!=undefined){
                        video.pause();
                    }else{
                        if(window.console != undefined){ console.info('warning: video undefined') };
                    }
                }
                if (o.type == 'youtube') {
                    if (video && video.pauseVideo) {
                        video.pauseVideo();
//                        console.info('pauseMovie',video, video.pauseVideo, paused);
                    }
                }
                if (o.type == 'vimeo') {
                    //if (/Opera/.test(navigator.userAgent)) {
                    //    return;
                    //}
                    vimeo_data = {
                        "method": "pause"
                    };

                    try {
                        video.contentWindow.postMessage(JSON.stringify(vimeo_data), vimeo_url);
                    } catch (err) {
                        if (window.console){ console.log(err); }
                    }
                    return;
                }


                cthis.children('.video-description').animate({
                    'opacity': 1
                }, 500);

                wasPlaying = false;
                paused=true;
            }
            //console.log(cthis);
            try {
                cthis.get(0).checkYoutubeState = function() {
                    if (o.type == 'youtube' && video.getPlayerState != undefined) {
                        //console.log("ceva", cthis, video.getPlayerState());
                        if (video.getPlayerState && video.getPlayerState() == 0) {
                            handleVideoEnd();
                        }
                    }
                }

            } catch (err) {
                if (window.console)
                    console.log(err);
            }
            /*
             window.checkYoutubeState=function(){
             // - we check if video youtube has ended so we can go to the next one

             }
             */

        }); // end each

    }


    window.dzsvp_init = function(selector, settings) {
//        console.info($(selector), settings);

        if(typeof settings!='undefined' && typeof settings.each!='undefined' && settings.each=='on'){
            $(selector).each(function(){
                $(this).vPlayer(settings);
            })
        }else{
            $(selector).vPlayer(settings);
        }

    };


})(jQuery);




if(typeof window.onYouTubePlayerReady=='function'){
    backup_onYouTubePlayerReady = window.onYouTubePlayerReady;
}
window.onYouTubePlayerReady = function onYouTubePlayerReady(playerId) {
    //alert('ytready')
    //alert(playerId)




//    console.info('ytready', playerId);

    var aux_objectid = playerId;
    var aux_videoid = playerId.substr(8);

//        console.info(youtubeid_array);

//        console.info(auxerid, document.getElementById(aux_objectid), aux_videoid);
    for(i=0;i<youtubeid_array.length;i++){
        if(youtubeid_array[i].id == aux_videoid){
            if(youtubeid_array[i].nrtimes>0){
                aux_objectid+='_clone'+youtubeid_array[i].nrtimes;
            }
        }
    }

//        console.info(aux_objectid, document.getElementById(aux_objectid))


    ytplayer = document.getElementById(aux_objectid);


    var _t = jQuery(ytplayer);
    if(_t.hasClass('treated')){
        return;
    }
    _t.addClass('treated');

    //console.log(ytplayer);
    ytplayer.addEventListener("onStateChange", "onytplayerStateChange");
    var aux2 = _t.attr('data-suggestedquality');
    //console.log(aux2);
    ytplayer.loadVideoById(aux_videoid, 0, aux2);
    ytplayer.pauseVideo();




};


window.requestAnimFrame = (function(){
    return  window.requestAnimationFrame       ||
        window.webkitRequestAnimationFrame ||
        window.mozRequestAnimationFrame    ||
        function( callback ){
            window.setTimeout(callback, 1000 / 60);
        };
})();


jQuery(document).ready(function($){
//    --- mega conflict with mediaelement.js, well workaround by treating untreated flash items

    var inter_check_treat = 0;

    clearTimeout(inter_check_treat);
    inter_check_treat = setTimeout(workaround_treatuntretreadItems, 2000);

    function workaround_treatuntretreadItems(){


        jQuery('.js-api-player:not(.treated)').each(function(){
            var _t = jQuery(this);
            var __t = _t.get(0);
//            console.info(_t, __t);

            var playerId = _t.attr('id');

            var aux = playerId.substr(8);
            var aux2 = _t.attr('data-suggestedquality');
            //console.log(aux2);

            if(typeof __t.loadVideoById !='undefined'){
                __t.loadVideoById(aux, 0, aux2);
                __t.pauseVideo();
            }else{

                inter_check_treat = setTimeout(workaround_treatuntretreadItems, 2000);
            }


        })

    }

    if(typeof window.onYouTubePlayerReady=='function' && typeof backup_onYouTubePlayerReady == 'undefined'){
        backup_onYouTubePlayerReady = window.onYouTubePlayerReady;
    }

    window.onYouTubePlayerReady = function onYouTubePlayerReady(playerId) {
        //alert('ytready')
        //alert(playerId)


        //console.info('ytready', playerId);

        var aux_objectid = playerId;
        var aux_videoid = playerId.substr(8);

//        console.info(youtubeid_array);

//        console.info(auxerid, document.getElementById(aux_objectid), aux_videoid);
        for(i=0;i<youtubeid_array.length;i++){
            if(youtubeid_array[i].id == aux_videoid){
                if(youtubeid_array[i].nrtimes>0){
                    aux_objectid+='_clone'+youtubeid_array[i].nrtimes;
                }
            }
        }

//        console.info(aux_objectid, document.getElementById(aux_objectid))


        ytplayer = document.getElementById(aux_objectid);


        var _t = jQuery(ytplayer);

        if(_t.hasClass('treated')){
            return;
        }
        _t.addClass('treated');

        //console.log(ytplayer);
        ytplayer.addEventListener("onStateChange", "onytplayerStateChange");
        var aux2 = _t.attr('data-suggestedquality');
//        console.log(aux2, ytplayer);
        ytplayer.loadVideoById(aux_videoid, 0, aux2);
        ytplayer.pauseVideo();

        if(typeof backup_onYouTubePlayerReady=='function'){
            backup_onYouTubePlayerReady(playerId);
        }

    };


    $('.videogallery--navigation-outer').each(function(){
        var _t = $(this);
        var _tar = $(_t.attr('data-vgtarget')).eq(0);
        var _clip =_t.find('.videogallery--navigation-outer--clip').eq(0);
        var _clipmover =_t.find('.videogallery--navigation-outer--clipmover').eq(0);

        var currPage = 0;
        var _block_active = _t.find('.videogallery--navigation-outer--bigblock.active').eq(0);
//        console.info(_tar);

        var _navOuterBullets = _t.find('.navigation-outer--bullet');
        var _navOuterBlocks = _t.find('.videogallery--navigation-outer--block');

        setTimeout(function(){
            _t.addClass('active');

            _clip.height(_block_active.height());
        },500)

        _navOuterBlocks.bind('click', function(){
            var _t2 = $(this);
            var ind = _navOuterBlocks.index(_t2);


//            console.info(ind);

            if(_tar.get(0) && _tar.get(0).api_gotoItem){
                if(_tar.get(0).api_gotoItem(ind)){
                }
            }
        });

        _navOuterBullets.bind('click',function(){
            var _t2 = $(this);
            var ind = _navOuterBullets.index(_t2);

            gotoPage(ind);

        })

        function gotoPage(arg){
            var auxl = -(Number(arg)*100) + '%';

            _navOuterBullets.removeClass('active');
            _navOuterBullets.eq(arg).addClass('active');

            _t.find('.videogallery--navigation-outer--bigblock.active').removeClass('active');
            _t.find('.videogallery--navigation-outer--bigblock').eq(arg).addClass('active');


            _clip.height(_t.find('.videogallery--navigation-outer--bigblock').eq(arg).height());

            _clipmover.css('left',auxl);

        }


    })
});


function onytplayerStateChange(newState) {
//    console.log(jQuery(ytplayer).parent().get(0), "Player's new state: " + newState, ytplayer.getAvailableQualityLevels());
    if(typeof(jQuery(ytplayer).parent().get(0))!='undefined'){
        try {
            jQuery(ytplayer).parent().get(0).checkYoutubeState();
        } catch (err) {
            if (window.console){
                console.log(err);
            }
        }
    }

    //console.log(newState);
    //window.checkYoutubeState();
    //- we send the on end event to the gallery if it has one
    newState = parseInt(newState, 10);
    if (newState == 0) {
        //console.log(jQuery(ytplayer))
        //jQuery(ytplayer).parent().get(0).handleVideoEnd();
    }

    window.onYouTubeIframeAPIReady = function() {
        dzsvp_yt_iframe_ready();
    }
}

function dzsvp_yt_iframe_ready(){

    _global_youtubeIframeAPIReady = true;
}

window.onYouTubeIframeAPIReady = function() {
    dzsvp_yt_iframe_ready();
}

function onYouTubeIframeAPIReady() {
}


function can_translate() {
    if (is_chrome() || is_safari()) {
        return true;
    }
    if (is_firefox() && version_firefox() > 10) {
        return true;
    }
    return false;
}

function can_history_api() {
    return !!(window.history && history.pushState);
}
function is_ios() {
    //return true;
    return ((navigator.platform.indexOf("iPhone") != -1) || (navigator.platform.indexOf("iPod") != -1) || (navigator.platform.indexOf("iPad") != -1)
    );
}

function is_android() {    //return true;
    var ua = navigator.userAgent.toLowerCase();    return (ua.indexOf("android") > -1);
}

function is_ie() {
    if (navigator.appVersion.indexOf("MSIE") != -1) {
        return true;    }; return false;
}
;
function is_firefox() {
    if (navigator.userAgent.indexOf("Firefox") != -1) {        return true;    };
    return false;
}
;
function is_opera() {
    if (navigator.userAgent.indexOf("Opera") != -1) {        return true;    };
    return false;
}
;
function is_chrome() {
    return navigator.userAgent.toLowerCase().indexOf('chrome') > -1;
}
;
function is_safari() {
    return navigator.userAgent.toLowerCase().indexOf('safari') > -1;
}
;
function version_ie() {
    return parseFloat(navigator.appVersion.split("MSIE")[1]);
}
;
function version_firefox() {
    if (/Firefox[\/\s](\d+\.\d+)/.test(navigator.userAgent)) {
        var aversion = new Number(RegExp.$1); return(aversion);
    }
    ;
}
;
function version_opera() {
    if (/Opera[\/\s](\d+\.\d+)/.test(navigator.userAgent)) {
        var aversion = new Number(RegExp.$1); return(aversion);
    }
    ;
}
;
function is_ie8() {
    if (is_ie() && version_ie() < 9) {  return true;  };
    return false;
}
function is_ie9() {
    if (is_ie() && version_ie() == 9) {
        return true;
    }
    return false;
}

function get_query_arg(purl, key){
    if(purl.indexOf(key+'=')>-1){
        //faconsole.log('testtt');
        var regexS = "[?&]"+key + "=.+";
        var regex = new RegExp(regexS);
        var regtest = regex.exec(purl);
        //console.info(regtest);

        if(regtest != null){
            var splitterS = regtest[0];
            if(splitterS.indexOf('&')>-1){
                var aux = splitterS.split('&');
                splitterS = aux[0];
            }
            //console.log(splitterS);
            var splitter = splitterS.split('=');
            //console.log(splitter[1]);
            //var tempNr = ;

            return splitter[1];

        }
        //$('.zoombox').eq
    }
}

function add_query_arg(purl, key,value){
    key = encodeURIComponent(key); value = encodeURIComponent(value);

    var s = purl;
    var pair = key+"="+value;

    var r = new RegExp("(&|\\?)"+key+"=[^\&]*");

    s = s.replace(r,"$1"+pair);
    //console.log(s, pair);
    if(s.indexOf(key + '=')>-1){


    }else{
        if(s.indexOf('?')>-1){
            s+='&'+pair;
        }else{
            s+='?'+pair;
        }
    }
    //if(!RegExp.$1) {s += (s.length>0 ? '&' : '?') + kvp;};


    //if value NaN we remove this field from the url
    if(value=='NaN'){
        var regex_attr = new RegExp('[\?|\&]'+key+'='+value);
        s=s.replace(regex_attr, '');
    }

    return s;
}

function can_play_mp3(){
    var a = document.createElement('audio');
    return !!(a.canPlayType && a.canPlayType('audio/mpeg;').replace(/no/, ''));
}
function can_play_mp4(){
    var a = document.createElement('video');
    return !!(a.canPlayType && a.canPlayType('video/mp4;').replace(/no/, ''));
}


//time, begin, change( f-b ), duration
function global_ease_in(t, b, c, d) {

    return -c *(t/=d)*(t-2) + b;

};

jQuery.fn.urlParam = function (arg, name) {
    var results = new RegExp('[\\?&]' + name + '=([^&#]*)').exec(arg);
    return (results !== null) ? results[1] : 0;
}