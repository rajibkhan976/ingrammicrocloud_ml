<?php
/**
 * WP File Download
 *
 * @package WP File Download
 * @author Joomunited
 * @version 1.0
 */

use Joomunited\WPFramework\v1_0_0\Application;

//-- No direct access
defined( 'ABSPATH' ) || die();
$app = Application::getInstance('wpfd');
?>

<script type="text/x-handlebars-template" id="wpfd-template-ggd-box">
    {{#with file}}
        <a href="#" class="wpfd-close"></a>
        <div class="dropblock">
            <a class="downloadlink" href="<?php echo $app->getAjaxUrl(); ?>task=file.download&id={{ID}}">
            
                <div class="ext {{ext}}"><span class="txt">{{ext}}</div>
                <h2>{{post_title}}</h2>
                <div>{{description}}</div>
            </a>
            <div class="wpfd-extra">
                <?php if(wpfdBase::loadValue($this->params,'ggd_showversion',1)==1): ?>
                    {{#if version}}
                        <div class="file-version"><span><?php _e('Version','wpfd'); ?></span> {{version}}&nbsp;</div>
                    {{/if}}
                <?php endif; ?>
                <?php if(wpfdBase::loadValue($this->params,'ggd_showsize',1)==1): ?>
                    {{#if size}}
                        <div class="file-size"><span><?php _e('Size','wpfd'); ?></span> {{bytesToSize size}}</div>
                    {{/if}}
                    <?php endif; ?>
                <?php if(wpfdBase::loadValue($this->params,'ggd_showhits',1)==1): ?>
                    {{#if hits}}
                        <div class="file-hits"><span><?php _e('Hits','wpfd'); ?></span> {{hits}}</div>
                    {{/if}}
                <?php endif; ?>
                <?php if(wpfdBase::loadValue($this->params,'ggd_showdateadd',0)==1): ?>
                    {{#if created}}
                        <div class="file-dated"><span><?php _e('Date added','wpfd'); ?></span> {{created}}</div>
                    {{/if}}
                <?php endif; ?>
                <?php if(wpfdBase::loadValue($this->params,'ggd_showdatemodified',0)==1): ?>
                    {{#if modified}}
                        <div class="file-modified"><span><?php _e('Date modified','wpfd'); ?></span> {{modified}}</div>
                    {{/if}}
                <?php endif; ?>
                <?php if(wpfdBase::loadValue($this->params,'ggd_showdownload',1)==1): ?>
                    <?php
                    $bg_download = wpfdBase::loadValue($this->params,'ggd_bgdownloadlink','');
                    $color_download = wpfdBase::loadValue($this->params,'ggd_colordownloadlink','');
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
                    <div class="extra-downloadlink">
                        <a href="<?php echo $app->getAjaxUrl(); ?>task=file.download&id={{ID}}" <?php echo $download_style;?>><?php _e('Download','wpfd'); ?></a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    {{/with}}
</script>


<?php if(wpfdBase::loadValue($this->params,'ggd_showsubcategories',1)==1): ?>
<script type="text/x-handlebars-template" id="wpfd-template-ggd-categories">
<?php if(wpfdBase::loadValue($this->params,'ggd_showcategorytitle',1)==1): ?>
{{#with category}}
    <h2>{{name}}</h2>
{{/with}}
<?php endif; ?>
{{#with category}}
    {{#if parent}}
       
        <a class="catlink  wpfdcategory backcategory" href="#" data-idcat="{{parent}}">
                <div class="dropblock">
                    <div class="ext back"></div>
                </div>
                <div class="droptitle">
                   <?php _e('Back to','wpfd'); ?> {{parent_title}}
                </div>
        </a>
      
    {{/if}}
{{/with}}

{{#if categories}}
    {{#each categories}}
        <a class="wpfdcategory catlink" href="#" data-idcat="{{term_id}}">
            <div class="dropblock">
                <div class="ext"></div>
            </div>
            <div class="droptitle">
               {{name}}
            </div>
        </a>
    {{/each}}
{{/if}}
</script>
<?php endif; ?>

<script type="text/x-handlebars-template" id="wpfd-template-ggd-files">
{{#if files}}
    {{#each files}}
                <a class="dropfile-file-link" href="#" data-id="{{ID}}">
                    <div class="dropblock">
                        <div class="ext {{ext}}"><span class="txt">{{ext}}</div>
                    </div>
                    <div class="droptitle">
                        {{post_title}}
                    </div>
                </a>
        {{/each}}
</div>
{{/if}}
</script>
<?php if(!empty($this->category) ): ?>
<?php if(!empty($this->files) || !empty($this->categories)): ?>
<div class="wpfd-content wpfd-content-ggd wpfd-content-multi wpfd-files" data-category="<?php echo $this->category->term_id; ?>">
    <?php if(wpfdBase::loadValue($this->params,'ggd_showbreadcrumb',1)==1): ?>
    <ul class="breadcrumbs wpfd-breadcrumbs-ggd">
        <li class="active">
		<?php echo $this->category->name; ?> 
	</li>
    </ul>
    <?php endif; ?>
    
    <?php if(wpfdBase::loadValue($this->params,'ggd_showfoldertree',0)==1): ?>
    <div class="wpfd-foldertree-ggd">        
    </div>    
    <?php endif; ?>
        
    <div class="wpfd-container-ggd <?php if(wpfdBase::loadValue($this->params,'ggd_showfoldertree',0)==1) { echo " with_foldertree";}?>">
    <?php if(wpfdBase::loadValue($this->params,'ggd_showcategorytitle',1)==1): ?>
    <h2><?php echo $this->category->name; ?></h2>
    <?php endif; ?>
    
    <?php if(count($this->categories) && wpfdBase::loadValue($this->params,'ggd_showsubcategories',1)==1): ?>
        <?php foreach ($this->categories as $category): ?>
        <a class="wpfdcategory catlink" href="#" data-idcat="<?php echo $category->term_id; ?>">
            <div class="dropblock">
                <div class="ext"></div>
            </div>
            <div class="droptitle">
                <?php echo $category->name; ?>
            </div>
        </a>
        <?php  endforeach; ?>
    <?php endif; ?>
    <?php if(count($this->files)): ?>
        <?php foreach ($this->files as $file): ?>
            <a class="dropfile-file-link" href="#" data-id="<?php echo $file->ID ; ?>">
                <div class="dropblock">
                    <div class="ext <?php echo $file->ext ; ?>"><span class="txt"><?php echo $file->ext ; ?></div>
                </div>
                <div class="droptitle">
                    <?php echo $file->post_title ; ?>
                </div>
            </a>
        <?php endforeach; ?>
    <?php endif; ?>
    </div>
</div>
<?php endif; ?>
<?php endif; ?>