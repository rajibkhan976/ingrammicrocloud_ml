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
    var sourcefiles   = $("#wpfd-template-tree-files").html();
    var sourcecategories   = $("#wpfd-template-tree-categories").html();
    var sourcefile   = $("#wpfd-template-tree-box").html();
    
    Handlebars.registerHelper('bytesToSize', function(bytes) {
        return bytesToSize(bytes);
    });
    
    treeInitClickFile();
    
    $('.wpfd-content-tree a.catlink').unbind('click.cat').bind('click.cat',function(e){       
        e.preventDefault();
        tree_load($(this).parents('.wpfd-content-tree').data('category'),$(this).data('idcat'),$(this));
    });
    
    function treeInitClickFile(){
        $('.wpfd-content-tree .dropfile-file-link').unbind('click').click(function(e){
            e.preventDefault();
            fileid = $(this).data('id')
            $.ajax({
                url: wpfdTreeTheme.ajaxurl+"action=wpfd&task=file.display&view=file&id="+fileid,
                dataType : "json"
            }).done(function(file) {
                var template = Handlebars.compile(sourcefile);
                var html = template(file);
                box = $("#tree-wpfd-box");
                if(box.length===0){
                    $('body').append('<div id="tree-wpfd-box" style="display: hidden;"></div>');
                    box = $("#tree-wpfd-box");
                }
                box.empty();
                box.prepend(html);
                box.click(function(e){
                    if($(e.target).is('#tree-wpfd-box')){
                            box.hide();
                        }
                    $('#tree-wpfd-box').unbind('click.box').bind('click.box',function(e){
                        if($(e.target).is('#tree-wpfd-box')){
                            box.hide();
                        }
                    });
                });
                $('#tree-wpfd-box .wpfd-close').click(function(){box.hide();});

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
    function tree_load(sourcecat,category,elem){



        ul = elem.parent().children('ul');
        if(ul.length>0){
            //close cat
            ul.slideUp(500,null,function(){
                $(this).remove();
                elem.parent().removeClass('open');
                elem.parent().removeClass('wpfd-loading');
            });
            
            return;
        } else {
            elem.parent().addClass('wpfd-loading');
        }
        if($(elem).hasClass('clicked')) {
            return;
        }
        $(elem).addClass('clicked');
        //Get categories
        $.ajax({
            url: wpfdTreeTheme.ajaxurl+"action=wpfd&task=categories.display&view=categories&id="+category,
            dataType : "json"
        }).done(function(categories) {
            var template = Handlebars.compile(sourcecategories);
            var html = template(categories);
            if(categories.categories.length>0){
                elem.parents('li').append('<ul style="display:none;">'+html+'</ul>');
                $(".wpfd-content-tree[data-category="+sourcecat+"] a.catlink").unbind('click.cat').bind('click.cat',function(e){
                    e.preventDefault();
                    tree_load($(this).parents('.wpfd-content-tree').data('category'),$(this).data('idcat'),$(this));
                    treeInitClickFile();
                });    
            }
            
            //Get files
            $.ajax({
                url: wpfdTreeTheme.ajaxurl+"action=wpfd&task=files.display&view=files&id="+category,
                dataType : "json"
            }).done(function(content) {
                var template = Handlebars.compile(sourcefiles);
                var html = template(content);
                if(elem.parent().children('ul').length==0){
                    elem.parent().append('<ul style="display:none;">'+html+'</ul>');
                }else{
                    elem.parent().children('ul').append(html);
                }
                
                treeInitClickFile();                
                elem.parent().children('ul').slideDown(500,null,function(){
                    elem.parent().addClass('open');
                    elem.parent().removeClass('wpfd-loading');
                });
            });
           
            $(elem).removeClass('clicked');

        });
        
    }    
});