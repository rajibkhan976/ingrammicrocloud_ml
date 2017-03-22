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
                <?php if(wpfdBase::loadValue($this->params,'ggd_showdateadd',1)==1): ?>
                    {{#if created}}
                        <div class="file-dated"><span><?php _e('Date added','wpfd'); ?></span> {{created}}</div>
                    {{/if}}
                <?php endif; ?>
                <?php if(wpfdBase::loadValue($this->params,'ggd_showdatemodified',1)==1): ?>
                    {{#if modified}}
                        <div class="file-modified"><span><?php _e('Date modified','wpfd'); ?></span> {{modified}}</div>
                    {{/if}}
                <?php endif; ?>
                <?php if(wpfdBase::loadValue($this->params,'ggd_showdownload',1)==1): ?>
                    <div class="extra-downloadlink">
                        <a href="<?php echo $app->getAjaxUrl(); ?>task=file.download&id={{ID}}"><?php _e('Download','wpfd'); ?></a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    {{/with}}
</script>


<div class="wpfd-content wpfd-content-ggd-single wpfd-files" data-file="<?php echo $this->file->ID; ?>">
    <?php if(!empty($this->file)): ?>
            <a class="dropfile-file-link" href="#" data-id="<?php echo $this->file->ID ; ?>">
                <div class="dropblock">
                    <div class="ext <?php echo $this->file->ext ; ?>"><span class="txt"><?php echo $this->file->ext ; ?></div>
                </div>
                <div class="droptitle">
                    <?php echo $this->file->title ; ?>
                </div>
            </a>
    <?php endif; ?>
</div>