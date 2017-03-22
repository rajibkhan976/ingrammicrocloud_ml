/**
 * WP File Download
 *
 * @package WP File Download
 * @author Joomunited
 * @version 1.0
 */

jQuery(document).ready(function($) {
    var sourcefiles   = $("#wpfd-template-files").html();
    var sourcecategories   = $("#wpfd-template-categories").html();
    var topCat = $(".wpfd-content-default").data('category');
    var tree = $('.wpfd-foldertree-default');
    var cParents = {};
    cParents[topCat] = {parent:0,term_id: topCat,name: $(".wpfd-content-default h2").text()};

    $(".wpfd-content-default .wpfdcategory.catlink").each(function(index ){
        var tempidCat = $(this).data('idcat');
        cParents[tempidCat]= {parent:topCat,term_id:tempidCat,name: $(this).text()};
    });

    function default_initClick(){
        $('.wpfd-content-default .catlink').click(function(e){
            e.preventDefault();
            default_load($(this).data('idcat'))
        });
    }
    default_initClick();
    
    function default_load(category){
        $(".wpfd-container-default").empty();        
        //Get categories
        $.ajax({
            url: wpfdparams.ajaxurl+"?action=wpfd&task=categories.display&view=categories&id="+category,
            dataType : "json"
        }).done(function(categories) {
            var template = Handlebars.compile(sourcecategories);
            var html = template(categories);
            $(".wpfd-container-default").prepend(html);
           
            for(i=0;i< categories.categories.length;i++) {
                cParents[categories.categories[i].term_id]= categories.categories[i];
            }

            default_breadcrum(category);
            default_initClick();

            if (tree.length) {

                tree.find('li').removeClass('selected');
                tree.find('i.md').removeClass('md-folder-open').addClass("md-folder");

                tree.jaofiletree('open', category);

                var el = tree.find('a[data-file="'+category+'"]').parent();
                el.find(' > i.md').removeClass("md-folder").addClass("md-folder-open");

                if (!el.hasClass('selected') ) {
                    el.addClass('selected');
                }

            }

        });
        
        //Get files
        $.ajax({
            url: wpfdparams.ajaxurl+"?action=wpfd&task=files.display&view=files&id="+category,
            dataType : "json"
        }).done(function(content) {
            var template = Handlebars.compile(sourcefiles);
            var html = template(content);
            $(".wpfd-container-default").append(html);
        });

    }

    function default_breadcrum(catid) {
        var links = [];
        current_Cat = cParents[catid];

        links.unshift(current_Cat);

        if (current_Cat.parent !=  0) {
            while(cParents[current_Cat.parent]) {
                current_Cat = cParents[current_Cat.parent];
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
        $(".wpfd-breadcrumbs-default").html(html);
    }

    if (tree.length) {

        tree.jaofiletree({
            script  : wpfdparams.ajaxurl+'?action=wpfd&task=categories.getSubs',
            usecheckboxes : false,
            root: topCat,
            showroot : cParents[topCat].name,
            onclick: function(elem,file){

                if (topCat != file) {

                    $(elem).parents('.directory').each(function() {
                        var $this = $(this);
                        var category = $this.find(' > a');
                        var parent = $this.find('.icon-open-close');
                        if (parent.length > 0) {
                            if (typeof cParents[category.data('file')] =='undefined') {
                                cParents[category.data('file')] = {parent: parent.data('parent_id'),term_id:category.data('file'),name: category.text()};
                            }
                        }
                    });

                }

                default_load(file);
            }
        });

    }

});