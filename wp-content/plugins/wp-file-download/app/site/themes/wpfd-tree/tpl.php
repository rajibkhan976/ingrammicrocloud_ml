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


<script type="text/x-handlebars-template" id="wpfd-template-tree-box">
    {{#with file}}
        <div class="dropblock">
            <a href="javascript:void(null)" class="wpfd-close"></a>
            <?php if(wpfdBase::loadValue($this->params,'tree_showtitle',1)==1): ?>
            <a class="downloadlink" href="<?php echo $app->getAjaxUrl(); ?>task=file.download&id={{ID}}">
                <h2>{{post_title}}</h2>
            </a>
            <?php endif; ?>
            <div class="ext {{ext}}"><span class="txt">{{ext}}</div>
            <div class="wpfd-extra">
                <?php if(wpfdBase::loadValue($this->params,'tree_showdescription',1)==1): ?>
                    {{#if description}}
                        <div class="file-desc"><span><?php _e('Description','wpfd'); ?> : </span> {{description}}&nbsp;</div>
                    {{/if}}
                <?php endif; ?>
                <?php if(wpfdBase::loadValue($this->params,'tree_showversion',1)==1): ?>
                    {{#if version}}
                        <div class="file-version"><span><?php _e('Version','wpfd'); ?> : </span> {{version}}&nbsp;</div>
                    {{/if}}
                <?php endif; ?>
                <?php if(wpfdBase::loadValue($this->params,'tree_showsize',1)==1): ?>
                    {{#if size}}
                        <div class="file-size"><span><?php _e('Size','wpfd'); ?> : </span> {{bytesToSize size}}</div>
                    {{/if}}
                    <?php endif; ?>
                <?php if(wpfdBase::loadValue($this->params,'tree_showhits',1)==1): ?>
                    {{#if hits}}
                        <div class="file-hits"><span><?php _e('Hits','wpfd'); ?> : </span> {{hits}}</div>
                    {{/if}}
                <?php endif; ?>
                <?php if(wpfdBase::loadValue($this->params,'tree_showdateadd',1)==1): ?>
                    {{#if created}}
                        <div class="file-dated"><span><?php _e('Date added','wpfd'); ?> : </span> {{created}}</div>
                    {{/if}}
                <?php endif; ?>
                <?php if(wpfdBase::loadValue($this->params,'tree_showdatemodified',1)==1): ?>
                    {{#if modified}}
                        <div class="file-modified"><span><?php _e('Date modified','wpfd'); ?> : </span> {{modified}}</div>
                    {{/if}}
                <?php endif; ?>                   
            </div>
            <?php
            $bg_download = wpfdBase::loadValue($this->params,'tree_bgdownloadlink','');
            $color_download = wpfdBase::loadValue($this->params,'tree_colordownloadlink','');
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
        </div>
    {{/with}}
</script>


<?php if(wpfdBase::loadValue($this->params,'tree_showsubcategories',1)==1): ?>
<script type="text/x-handlebars-template" id="wpfd-template-tree-categories">
{{#if categories}}
    {{#each categories}}
        <li class="catlink">
            <a class="wpfdcategory catlink" href="#" data-idcat="{{term_id}}">
                    {{name}}
            </a>
        </li>
    {{/each}}
{{/if}}
</script>
<?php endif; ?>

<script type="text/x-handlebars-template" id="wpfd-template-tree-files">
{{#if files}}
    {{#each files}}
        <li class="ext {{ext}}">
            <a class="dropfile-file-link" href="#" data-id="{{ID}}">
                    {{post_title}}
            </a>
        </li>
        {{/each}}
</div>
{{/if}}
</script>
<?php if($this->category!==null):?>
    <?php if(!empty($this->files) || !empty($this->categories)): ?>
    <div class="wpfd-content wpfd-content-tree wpfd-content-multi wpfd-files" data-category="<?php echo $this->category->term_id; ?>">
        <?php if(wpfdBase::loadValue($this->params,'tree_showcategorytitle',1)==1): ?>
        <h2><?php echo $this->category->name; ?></h2>
        <?php endif; ?>

        <ul>
            <?php if(count($this->categories) && wpfdBase::loadValue($this->params,'tree_showsubcategories',1)==1): ?>
                <?php foreach ($this->categories as $category): ?>
                <li class="catlink">
                    <a class="wpfdcategory catlink" href="#" data-idcat="<?php echo $category->term_id; ?>">
                            <?php echo $category->name; ?>
                    </a>
                </li>
                <?php  endforeach; ?>
            <?php endif; ?>
            <?php if(count($this->files)): ?>
                <?php foreach ($this->files as $file): ?>
                <li class="ext <?php echo $file->ext ; ?>">
                    <a class="dropfile-file-link" href="#" data-id="<?php echo $file->ID ; ?>">
                            <?php echo $file->post_title ; ?>
                    </a>
                </li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>
    </div>
    <?php endif; ?>
<?php endif; ?>