<?php
/**
 * WP File Download
 *
 * @package WP File Download
 * @author Joomunited
 * @version 1.0.3
 */

use Joomunited\WPFramework\v1_0_0\Application;

//-- No direct access
defined( 'ABSPATH' ) || die();

$app = Application::getInstance('wpfd');
?>
<script type="text/x-handlebars-template" id="wpfd-template-table">
    <?php if(wpfdBase::loadValue($this->params,'table_showsubcategories',1)==1): ?>
    {{#with category}}
        {{#if parent}}
            <tr class="nohide">
                <td colspan="100" class="essential">
                <?php _e('Back to','wpfd'); ?> : 
                <a class="wpfdcategory catlink" href="#" data-idcat="{{parent}}">
                    {{parent_title}}
                </a>
                </td>
            </tr>
        {{/if}}
    {{/with}}
    
    {{#if categories}}
        {{#each categories}}
                <tr class="nohide">
                    <td colspan="100">
                    <?php _e('Sub-category','wpfd'); ?> :
                    <a class="wpfdcategory catlink" href="#" data-idcat="{{term_id}}">
                        {{name}}
                    </a>
                    </td>
                </tr>
        {{/each}}
    {{/if}}
    <?php endif; ?>
    
    <?php if(wpfdBase::loadValue($this->params,'table_showcategorytitle',1)==1): ?>
    {{#with category}}
        <tr><td colspan="100"><h2>{{name}}</h2></td></tr>
    {{/with}}
    <?php endif; ?>

    {{#if files}}
        {{#each files}}                
            <tr>
                <td class="extcol"><span class="ext {{ext}}"></span></td>

                <?php if(wpfdBase::loadValue($this->params,'table_showtitle',1)==1): ?>
                <td>
                    <a href="<?php echo $app->getAjaxUrl(); ?>task=file.download&id={{ID}}">{{post_title}}</a>
                </td>
                <?php endif; ?>

                <?php if(wpfdBase::loadValue($this->params,'table_showversion',1)==1): ?>
                    <td>
                        {{version}}
                    </td>
                <?php endif; ?>

                <?php if(wpfdBase::loadValue($this->params,'table_showdownload',1)==1): ?>
                    <?php
                    $bg_download = wpfdBase::loadValue($this->params,'table_bgdownloadlink','');
                    $color_download = wpfdBase::loadValue($this->params,'table_colordownloadlink','');
                    $download_style = '';
                    if ($bg_download != '' ) {
                        $download_style .= 'background-color:'.$bg_download.';';
                    }
                    if ($color_download != '') {
                        $download_style .= 'color:'.$color_download.';';
                    }
                    if ($download_style != '') {
                        $download_style = 'style="'.$download_style.'"';
                    }
                    ?>
                    <td>
                        <a class="downloadlink" href="<?php echo $app->getAjaxUrl(); ?>task=file.download&id={{ID}}" <?php echo $download_style;?>><?php _e('Download','wpfd'); ?></a>
                    </td>
                <?php endif; ?>

                <?php if(wpfdBase::loadValue($this->params,'table_showdescription',1)==1): ?>
                    <td>
                        {{description}}
                    </td>
                <?php endif; ?>

                <?php if(wpfdBase::loadValue($this->params,'table_showsize',1)==1): ?>
                    <td>
                        {{bytesToSize size}}
                    </td>
                <?php endif; ?>

                <?php if(wpfdBase::loadValue($this->params,'table_showhits',1)==1): ?>
                    <td>
                        {{hits}}
                    </td>
                <?php endif; ?>

                <?php if(wpfdBase::loadValue($this->params,'table_showdateadd',0)==1): ?>
                    <td>
                        {{created}}
                    </td>
                <?php endif; ?>

                <?php if(wpfdBase::loadValue($this->params,'table_showdatemodified',0)==1): ?>
                    <td>
                        {{modified}}
                    </td>
                <?php endif; ?>
            </tr>
        {{/each}}
    {{/if}}
        
    
</script>
<?php if(!empty($this->category) ): ?>
<?php if(!empty($this->files) || !empty($this->categories)): ?>
<div class="wpfd-content wpfd-content-table wpfd-content-multi wpfd-files <?php echo $this->wpfdclass; ?>" data-category="<?php echo $this->category->term_id; ?>">
  <?php if(wpfdBase::loadValue($this->params,'table_showbreadcrumb',1)==1): ?>
    <ul class="breadcrumbs wpfd-breadcrumbs-table">
        <li class="active">
		<?php echo $this->category->name; ?> 
	</li>
    </ul>
    <?php endif; ?>
    
    <?php if(wpfdBase::loadValue($this->params,'table_showfoldertree',0)==1): ?>
    <div class="wpfd-foldertree-table">        
    </div>
    <div class="wpfd-container-table">
    <?php endif; ?>
   
 
<table class="<?php echo $this->tableclass; ?> mediaTable">
    <?php if(count($this->files)): ?>
        <thead>
            <tr>
                <th>#</th>
                <?php if(wpfdBase::loadValue($this->params,'table_showtitle',1)==1): ?>
                <th class="essential persist">
                    <?php _e('Title','wpfd'); ?>
                </th>
                <?php endif; ?>

                <?php if(wpfdBase::loadValue($this->params,'table_showversion',1)==1): ?>
                    <th class="optional">
                       <?php _e('Version','wpfd'); ?>
                    </th>
                <?php endif; ?>

                <?php if(wpfdBase::loadValue($this->params,'table_showdownload',1)==1): ?>
                    <th class="essential">
                        <?php _e('Download','wpfd'); ?>
                    </th>
                <?php endif; ?>

                <?php if(wpfdBase::loadValue($this->params,'table_showdescription',1)==1): ?>
                    <th class="optional">
                        <?php _e('Description','wpfd'); ?>
                    </th>
                <?php endif; ?>

                <?php if(wpfdBase::loadValue($this->params,'table_showsize',1)==1): ?>
                    <th class="optional">
                        <?php _e('Size','wpfd'); ?>
                    </th>
                <?php endif; ?>

                <?php if(wpfdBase::loadValue($this->params,'table_showhits',1)==1): ?>
                    <th class="optional">
                        <?php _e('Hits','wpfd'); ?>
                    </th>
                <?php endif; ?>

                <?php if(wpfdBase::loadValue($this->params,'table_showdateadd',0)==1): ?>
                    <th class="optional">
                        <?php _e('Date added','wpfd'); ?>
                    </th>
                <?php endif; ?>

                <?php if(wpfdBase::loadValue($this->params,'table_showdatemodified',0)==1): ?>
                    <th class="optional">
                        <?php _e('Date modified','wpfd'); ?>
                    </th>
                <?php endif; ?>
            </tr>
        </thead>
        
        <tbody>
            
            <?php if(wpfdBase::loadValue($this->params,'table_showcategorytitle',1)==1): ?>
            <tr ><td colspan="100" ><h2><?php echo $this->category->name; ?></h2></td></tr>
            <?php endif; ?>
            
            <?php if(count($this->categories) && wpfdBase::loadValue($this->params,'table_showsubcategories',1)==1): ?>
                <?php foreach ($this->categories as $category): ?>
                <tr class="nohide" >
                    <td colspan="100" class="essential">
                        <?php _e('Sub-category','wpfd'); ?> :
                    <a class="wpfdcategory catlink" href="#" data-idcat="<?php echo $category->term_id; ?>">
                        <?php echo $category->name; ?>
                    </a>
                    </td>
                </tr>
                <?php  endforeach; ?>
            <?php endif; ?>
        
            <?php foreach ($this->files as $file): ?>
            <tr>
                <td class="extcol"><a href="<?php echo $app->getAjaxUrl(); ?>task=file.download&id=<?php echo $file->ID ; ?>"><span class="ext <?php echo $file->ext ; ?>"></span></a></td>
                
                <?php if(wpfdBase::loadValue($this->params,'table_showtitle',1)==1): ?>
                <td>
                    <a href="<?php echo $app->getAjaxUrl(); ?>task=file.download&id=<?php echo $file->ID ; ?>"><?php echo $file->post_title ; ?></a>
                </td>
                <?php endif; ?>

                <?php if(wpfdBase::loadValue($this->params,'table_showversion',1)==1): ?>
                    <td>
                        <?php echo $file->version; ?>
                    </td>
                <?php endif; ?>

                <?php if(wpfdBase::loadValue($this->params,'table_showdownload',1)==1): ?>
                    <?php
                    $bg_download = wpfdBase::loadValue($this->params,'table_bgdownloadlink','');
                    $color_download = wpfdBase::loadValue($this->params,'table_colordownloadlink','');
                    $download_style = '';
                    if ($bg_download != '' ) {
                        $download_style .= 'background-color:'.$bg_download.';';
                    }
                    if ($color_download != '') {
                        $download_style .= 'color:'.$color_download.';';
                    }
                    if ($download_style != '') {
                        $download_style = 'style="'.$download_style.'"';
                    }
                    ?>
                    <td>
                        <a class="downloadlink" href="<?php echo $app->getAjaxUrl(); ?>task=file.download&id=<?php echo $file->ID ; ?>" <?php echo $download_style;?>><?php _e('Download','wpfd'); ?></a>
                    </td>
                <?php endif; ?>

                <?php if(wpfdBase::loadValue($this->params,'table_showdescription',1)==1): ?>
                    <td>
                        <?php echo $file->post_excerpt ; ?>
                    </td>
                <?php endif; ?>

                <?php if(wpfdBase::loadValue($this->params,'table_showsize',1)==1): ?>
                    <td>
                        <?php echo wpfdHelperFile::bytesToSize($file->size); ?>
                    </td>
                <?php endif; ?>

                <?php if(wpfdBase::loadValue($this->params,'table_showhits',1)==1): ?>
                    <td>
                        <?php echo $file->hits; ?>
                    </td>
                <?php endif; ?>

                <?php if(wpfdBase::loadValue($this->params,'table_showdateadd',0)==1): ?>
                    <td>
                        <?php echo $file->created; ?>
                    </td>
                <?php endif; ?>

                <?php if(wpfdBase::loadValue($this->params,'table_showdatemodified',0)==1): ?>
                    <td>
                        <?php echo $file->modified; ?>
                    </td>
                <?php endif; ?>
            </tr>
            <?php endforeach; ?>
        </tbody>
    <?php endif; ?>        
</table>
    <?php if(wpfdBase::loadValue($this->params,'table_showfoldertree',0)==1): ?>      
    </div>    
    <?php endif; ?>        
</div>
<?php endif; ?>
<?php endif; ?>