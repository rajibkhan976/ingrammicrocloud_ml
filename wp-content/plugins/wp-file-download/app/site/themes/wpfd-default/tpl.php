<?php
/**
 * WP File Download
 *
 * @package WP File Download
 * @author Joomunited
 * @version 1.0
 */

use Joomunited\WPFramework\v1_0_0\Factory;
use Joomunited\WPFramework\v1_0_0\Application;
//-- No direct access
defined( 'ABSPATH' ) || die();
$app = Application::getInstance('wpfd');
?>
<?php if(wpfdBase::loadValue($this->params,'showsubcategories',1)==1): ?>
<script type="text/x-handlebars-template" id="wpfd-template-categories">
<?php if(wpfdBase::loadValue($this->params,'showcategorytitle',1)==1): ?>
{{#with category}}
    <h2>{{name}}</h2>
{{/with}}
<?php endif; ?>

{{#if categories}}
    {{#each categories}}
        <a class="catlink wpfdcategory" href="#" data-idcat="{{term_id}}"><?php if (wpfdBase::loadValue($this->params,'showfoldertree',0) == 1) {echo '<i class="md md-folder"></i>';} ?> {{name}}</a>
    {{/each}}
{{/if}}
{{#with category}}
    {{#if parent}}
    <a class="catlink wpfdcategory backcategory" href="#" data-idcat="{{parent}}"><?php _e('Back to','wpfd'); ?> {{parent_title}}</a>
    {{/if}}
{{/with}}

</script>
<?php endif; ?>

<script type="text/x-handlebars-template" id="wpfd-template-files">
{{#if files}}
    {{#each files}}
                <div class="file" style="<?php echo $this->style; ?>">
                    <div class="ext {{ext}}"><span class="txt">{{ext}}</div>
                    <div class="filecontent">
                        <?php if(wpfdBase::loadValue($this->params,'showdownload',1)==1): ?>
                            <?php
                            $bg_download = wpfdBase::loadValue($this->params,'bgdownloadlink','');
                            $color_download = wpfdBase::loadValue($this->params,'colordownloadlink','');
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

                        <a class="downloadlink" href="<?php echo $app->getAjaxUrl(); ?>task=file.download&id={{ID}}" <?php echo $download_style;?>><?php _e('Download','wpfd'); ?></a>
                        <?php endif; ?>
                        <?php if(wpfdBase::loadValue($this->params,'showtitle',1)==1): ?>
                        <h3><a href="<?php echo $app->getAjaxUrl(); ?>task=file.download&id={{ID}}">{{post_title}}</a></h3>
                        <?php endif; ?>
                        <div class="file-desc">{{description}}</div>
                        <?php if(wpfdBase::loadValue($this->params,'showversion',1)==1): ?>
                            {{#if version}}
                            <div class="file-version"><span><?php _e('Version :','wpfd'); ?></span> {{version}}&nbsp;</div>
                            {{/if}}
                        <?php endif; ?>
                        <?php if(wpfdBase::loadValue($this->params,'showsize',1)==1): ?>
                            <div class="file-size"><span><?php _e('Size :','wpfd'); ?></span> {{size}}</div>
                        <?php endif; ?>
                        <?php if(wpfdBase::loadValue($this->params,'showhits',1)==1): ?>
                            <div class="file-hits"><span><?php _e('Hits :','wpfd'); ?></span> {{hits}}</div>
                        <?php endif; ?>
                        <?php if(wpfdBase::loadValue($this->params,'showdateadd',0)==1): ?>
                            <div class="file-dated"><span><?php _e('Date added :','wpfd'); ?></span> {{created}}</div>
                        <?php endif; ?>
                        <?php if(wpfdBase::loadValue($this->params,'showdatemodified',0)==1): ?>
                            <div class="file-modifed"><span><?php _e('Date modified :','wpfd'); ?></span> {{modified}}</div>
                        <?php endif; ?>
                    </div>
                </div>
        {{/each}}
</div>
{{/if}}
</script>
<?php if(!empty($this->category) ): ?>
<?php if(!empty($this->files) || !empty($this->categories)): ?>

<div class="wpfd-content wpfd-content-default wpfd-content-multi wpfd-files" data-category="<?php echo $this->category->term_id; ?>">    
     <?php if(wpfdBase::loadValue($this->params,'showbreadcrumb',1)==1): ?>
    <ul class="breadcrumbs wpfd-breadcrumbs-default">
        <li class="active">
		<?php echo $this->category->name; ?> 
	</li>
    </ul>
 <?php endif; ?>
    
    <?php if(wpfdBase::loadValue($this->params,'showfoldertree',0)==1): ?>
    <div class="wpfd-foldertree-default">
        
    </div>
    <?php endif; ?>
    
    <div class="wpfd-container-default <?php if(wpfdBase::loadValue($this->params,'showfoldertree',0)==1) { echo " with_foldertree";}?>">
    <?php if(wpfdBase::loadValue($this->params,'showcategorytitle',1)==1): ?>
    <h2><?php echo $this->category->name; ?></h2>
    <?php endif; ?>
    
    <?php if(count($this->categories) && wpfdBase::loadValue($this->params,'showsubcategories',1)==1): ?>
        <?php foreach ($this->categories as $category): ?>
            <a class="wpfdcategory catlink" href="#" data-idcat="<?php echo $category->term_id; ?>"><?php if (wpfdBase::loadValue($this->params,'showfoldertree',0) == 1) {echo '<i class="md md-folder"></i>';} ?> <?php echo $category->name; ?></a>
        <?php  endforeach; ?>
    <?php endif; ?>
    <?php if(count($this->files)): ?>
        <?php foreach ($this->files as $file): ?>
            <div class="file" style="<?php echo $this->style; ?>">
                <div class="ext <?php echo $file->ext ; ?>"><span class="txt"><?php echo $file->ext ; ?></div>
                <div class="filecontent">
                    <?php if(wpfdBase::loadValue($this->params,'showdownload',1)==1): ?>
                        <?php
                            $bg_download = wpfdBase::loadValue($this->params,'bgdownloadlink','');
                            $color_download = wpfdBase::loadValue($this->params,'colordownloadlink','');
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
                    <a class="downloadlink" href="<?php echo $app->getAjaxUrl(); ?>task=file.download&id=<?php echo $file->ID ; ?>" <?php echo $download_style;?>><?php _e('Download','wpfd'); ?></a>
                    <?php endif; ?>
                    <?php if(wpfdBase::loadValue($this->params,'showtitle',1)==1): ?>
                    <h3><a href="<?php echo $app->getAjaxUrl(); ?>task=file.download&id=<?php echo $file->ID ; ?>"><?php echo $file->post_title ; ?></a></h3>
                    <?php endif; ?>
                    <div class="file-desc"><?php echo $file->description ; ?></div>
                    <?php if(wpfdBase::loadValue($this->params,'showversion',1)==1 && trim($file->version!='')): ?>
                        <div class="file-version"><span><?php _e('Version :','wpfd'); ?></span> <?php echo $file->version; ?>&nbsp;</div>
                    <?php endif; ?>
                    <?php if(wpfdBase::loadValue($this->params,'showsize',1)==1): ?>
                        <div class="file-size"><span><?php _e('Size :','wpfd'); ?></span> <?php echo wpfdHelperFile::bytesToSize($file->size); ?></div>
                    <?php endif; ?>
                    <?php if(wpfdBase::loadValue($this->params,'showhits',1)==1): ?>
                        <div class="file-hits"><span><?php _e('Hits :','wpfd'); ?></span> <?php echo $file->hits; ?></div>
                    <?php endif; ?>
                    <?php if(wpfdBase::loadValue($this->params,'showdateadd',0)==1): ?>
                        <div class="file-dated"><span><?php _e('Date added :','wpfd'); ?></span> <?php echo $file->created; ?></div>
                    <?php endif; ?>
                    <?php if(wpfdBase::loadValue($this->params,'showdatemodified',0)==1): ?>
                        <div class="file-modified"><span><?php _e('Date modified :','wpfd'); ?></span> <?php echo $file->modified; ?></div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
    </div>
</div>
<?php endif; ?>
<?php endif; ?>