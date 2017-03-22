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
   
    var table_topCat = $(".wpfd-content-table").data('category');
    var table_cParents = {};
    var table_tree = $('.wpfd-foldertree-table');
    table_cParents[table_topCat] = {parent:0,term_id: table_topCat,name: $(".wpfd-content-table[data-category="+table_topCat+"] h2").text()};
    $(".wpfd-content-table[data-category="+table_topCat+"] .wpfdcategory.catlink").each(function(index ){ 
        var tempidCat = $(this).data('idcat');
        table_cParents[tempidCat]= {parent:table_topCat,term_id:tempidCat,name: $(this).text()};
    });
    //load media tables
    $('.wpfd-content .mediaTable').mediaTable();
    
    var tpltable_source   = $("#wpfd-template-table").html();
    
    Handlebars.registerHelper('bytesToSize', function(bytes) {
        return bytesToSize(bytes);
    });
    
    function table_initClick(){
        $('.wpfd-content-table .catlink').click(function(e){
            e.preventDefault();
            table_load($(this).parents('.wpfd-content-table').data('category'),$(this).data('idcat'));
        });
    }
    
    table_initClick();
    
    function table_load(sourcecat,category){
        $(".wpfd-content-multi[data-category="+sourcecat+"] table tbody").empty();        
        //Get categories
        $.ajax({
            url: wpfdTableTheme.ajaxurl+"action=wpfd&task=categories.display&view=categories&id="+category,
            dataType : "json"
        }).done(function(categories) {

            if (table_tree.length) {

                table_tree.find('li').removeClass('selected');
                table_tree.find('i.md').removeClass('md-folder-open').addClass("md-folder");

                table_tree.jaofiletree('open', category);

                var el = table_tree.find('a[data-file="'+category+'"]').parent();
                el.find(' > i.md').removeClass("md-folder").addClass("md-folder-open");

                if (!el.hasClass('selected') ) {
                    el.addClass('selected');
                }

            }

            //Get files
            $.ajax({
                url: wpfdTableTheme.ajaxurl+"action=wpfd&task=files.display&view=files&id="+category,
                dataType : "json"
            }).done(function(content) {
                $.extend(content,categories); 
                var template_table = Handlebars.compile(tpltable_source);
                var html = template_table(content);
                $(".wpfd-content-multi[data-category="+sourcecat+"] table tbody").append(html);
                $(".wpfd-content-multi[data-category="+sourcecat+"] table tbody").trigger('change');
                $(".wpfd-content-multi[data-category="+sourcecat+"] .mediaTableMenu").find('input').trigger('change');
                
                for(i=0;i< categories.categories.length;i++) {
                    table_cParents[categories.categories[i].term_id]= categories.categories[i];
                }
              
                table_breadcrum(category);
            
                table_initClick();
            });
        });
    }
    
    function table_breadcrum(catid) {
        links = [];
        current_Cat = table_cParents[catid];
        links.unshift(current_Cat);

        if (current_Cat.parent !=  0) {
            while(table_cParents[current_Cat.parent]) {
                current_Cat = table_cParents[current_Cat.parent];
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
        $(".wpfd-content-table[data-category="+table_topCat+"] .wpfd-breadcrumbs-table").html(html);              
        
    }

    if (table_tree.length) {
        table_tree.jaofiletree({
            script  : wpfdTableTheme.ajaxurl+'?action=wpfd&task=categories.getSubs',
            usecheckboxes : false,
            root: table_topCat,
            showroot : table_cParents[table_topCat].name,
            onclick: function(elem,file){

                if (table_topCat != file) {

                    $(elem).parents('.directory').each(function() {
                        var $this = $(this);
                        var category = $this.find(' > a');
                        var parent = $this.find('.icon-open-close');
                        if (parent.length > 0) {
                            if (typeof table_cParents[category.data('file')] =='undefined') {
                                table_cParents[category.data('file')] = {parent: parent.data('parent_id'),term_id:category.data('file'),name: category.text()};
                            }
                        }
                    });

                }

                table_load(table_topCat,file);
            }
        });
    }

});