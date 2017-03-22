/** 
 * Wpfd
 * 
 * We developed this code with our hearts and passion.
 * We hope you found it useful, easy to understand and to customize.
 * Otherwise, please feel free to contact us at contact@joomunited.com *
 * @package WP File Download
 * @copyright Copyright (C) 2013 JoomUnited (http://www.joomunited.com). All rights reserved.
 * @copyright Copyright (C) 2013 Damien Barrère (http://www.crac-design.com). All rights reserved.
 * @license GNU General Public License version 2 or later; http://www.gnu.org/licenses/gpl-2.0.html
 */

jQuery(document).ready(function($) {
    var sourcefiles   = $("#wpfd-template-ggd-files").html();
    var sourcecategories   = $("#wpfd-template-ggd-categories").html();
    var sourcefile   = $("#wpfd-template-ggd-box").html();
    
    var ggd_topCat = $(".wpfd-content-ggd").data('category');
    var ggd_cParents = {};
    var ggd_tree = $('.wpfd-foldertree-ggd');
    ggd_cParents[ggd_topCat] = {parent:0,term_id: ggd_topCat,name: $(".wpfd-content-ggd[data-category="+ggd_topCat+"] h2").text()};
    $(".wpfd-content-ggd[data-category="+ggd_topCat+"] .wpfdcategory.catlink").each(function(index ){ 
        var tempidCat = $(this).data('idcat');
        ggd_cParents[tempidCat]= {parent:ggd_topCat,term_id:tempidCat,name: $(this).text()};
    });
    
    Handlebars.registerHelper('bytesToSize', function(bytes) {
        return bytesToSize(bytes);
    });
    
    initClickFile();
    
    function ggd_initClick(){
        $('.wpfd-content-ggd .catlink').unbind('click').click(function(e){
            e.preventDefault();
            load($(this).parents('.wpfd-content-ggd').data('category'),$(this).data('idcat'));
        });
    }
    ggd_initClick();
    
    function initClickFile(){
        $('.wpfd-content .dropfile-file-link').unbind('click').click(function(e){
            e.preventDefault();
            fileid = $(this).data('id')
            $.ajax({
                url: wpfdGgdTheme.ajaxurl+"action=wpfd&task=file.display&view=file&id="+fileid,
                dataType : "json"
            }).done(function(file) {
                var template = Handlebars.compile(sourcefile);
                var html = template(file);
                box = $("#wpfd-box");
                if(box.length===0){
                    $('body').append('<div id="wpfd-box" style="display: hidden;"></div>');
                    box = $("#wpfd-box");
                }
                box.empty();
                box.prepend(html);
                box.click(function(e){
                    if($(e.target).is('#wpfd-box')){
                        box.hide();
                    }
                    $('#wpfd-box').unbind('click.box').bind('click.box',function(e){
                        if($(e.target).is('#wpfd-box')){
                            box.hide();
                        }
                    });
                });
                $('#wpfd-box .wpfd-close').click(function(){box.hide();});

                box.show();

                dropblock = box.find('.dropblock');
                if($(window).width() < 400){
                    dropblock.css('margin-top','0');
                    dropblock.css('margin-left','0');
                    dropblock.css('top','0');
                    dropblock.css('left','0');
                    dropblock.height($(window).height()-parseInt(dropblock.css('padding-top'),10)-parseInt(dropblock.css('padding-bottom'),10));
                    dropblock.width($(window).width()-parseInt(dropblock.css('padding-left'),10)-parseInt(dropblock.css('padding-right'),10));
                }else{
                    dropblock.css('margin-top',(-(dropblock.height()/2)-20)+'px');
                    dropblock.css('margin-left',(-(dropblock.width()/2)-20)+'px');
                    dropblock.css('height','');
                    dropblock.css('width','');
                    dropblock.css('top','');
                    dropblock.css('left','');
                }
            });
        });
    }
    function load(sourcecat,category){
        $(".wpfd-content-ggd[data-category="+sourcecat+"] .wpfd-container-ggd").empty();
       
        //Get categories
        $.ajax({
            url: wpfdGgdTheme.ajaxurl+"action=wpfd&task=categories.display&view=categories&id="+category,
            dataType : "json"
        }).done(function(categories) {
            var template = Handlebars.compile(sourcecategories);
            var html = template(categories);
            $(".wpfd-content-ggd[data-category="+sourcecat+"] .wpfd-container-ggd").prepend(html);        
            
            for(i=0;i< categories.categories.length;i++) {
                ggd_cParents[categories.categories[i].term_id]= categories.categories[i];
            }

            ggd_breadcrum(category);

            if (ggd_tree.length) {

                ggd_tree.find('li').removeClass('selected');
                ggd_tree.find('i.md').removeClass('md-folder-open').addClass("md-folder");

                ggd_tree.jaofiletree('open', category);

                var el = ggd_tree.find('a[data-file="'+category+'"]').parent();
                el.find(' > i.md').removeClass("md-folder").addClass("md-folder-open");

                if (!el.hasClass('selected') ) {
                    el.addClass('selected');
                }

            }

        });
        
        //Get files
        $.ajax({
            url: wpfdGgdTheme.ajaxurl+"action=wpfd&task=files.display&view=files&id="+category,
            dataType : "json"
        }).done(function(content) {
            var template = Handlebars.compile(sourcefiles);
            var html = template(content);
            $(".wpfd-content-ggd[data-category="+sourcecat+"] .wpfd-container-ggd").append(html);
            initClickFile();
        });

    }    
    
    function ggd_breadcrum(catid) {
        links = [];
        current_Cat = ggd_cParents[catid];
        links.unshift(current_Cat);
        if (current_Cat.parent !=  0) {
            while(ggd_cParents[current_Cat.parent]) {
                current_Cat = ggd_cParents[current_Cat.parent];
                links.unshift(current_Cat);
            };
        }

        html = '';
        for(i=0;i<links.length;i++) {
            if(i< links.length-1) {
                html += '<li><a class="catlink" data-idcat="'+links[i].term_id+'" href="javascript:void(0)">'+links[i].name+'</a><span class="divider"> &gt; </span></li>';
            }else {
                html += '<li><span>'+links[i].name+'</span></li>';
            }
        }
        $(".wpfd-content-ggd[data-category="+ggd_topCat+"] .wpfd-breadcrumbs-ggd").html(html);
        
        $(".wpfd-content-ggd[data-category="+ggd_topCat+"] .catlink").click(function(e){
            e.preventDefault();
            load(ggd_topCat,$(this).data('idcat'));
            initClickFile();
        });
        
    }

    if (ggd_tree.length) {
        ggd_tree.jaofiletree({
            script  : wpfdGgdTheme.ajaxurl+'?action=wpfd&task=categories.getSubs',
            usecheckboxes : false,
            root: ggd_topCat,
            showroot : ggd_cParents[ggd_topCat].name,
            onclick: function(elem,file){

                if (ggd_topCat != file) {

                    $(elem).parents('.directory').each(function() {
                        var $this = $(this);
                        var category = $this.find(' > a');
                        var parent = $this.find('.icon-open-close');
                        if (parent.length > 0) {
                            if (typeof ggd_cParents[category.data('file')] =='undefined') {
                                ggd_cParents[category.data('file')] = {parent: parent.data('parent_id'),term_id:category.data('file'),name: category.text()};
                            }
                        }
                    });

                }

                load(ggd_topCat,file);
            }
        });

    }

});