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

<div class="wpfd-content wpfd-content-tree-single wpfd-files" data-file="<?php echo $this->file->ID; ?>">
    <div class="dropblock">
        <?php if(!empty($this->file)): ?>
            <?php if(wpfdBase::loadValue($this->params,'tree_showtitle',1)==1): ?>
            <a class="downloadlink" href="<?php echo $app->getAjaxUrl(); ?>task=file.download&id=<?php echo $this->file->ID ; ?>">
                <h2><?php echo $this->file->title ; ?></h2>
            </a>
            <?php endif; ?>
            <div class="ext <?php echo $this->file->ext ; ?>"><span class="txt"><?php echo $this->file->ext ; ?></div>
            <div class="wpfd-extra">
                <?php if(wpfdBase::loadValue($this->params,'tree_showdescription',1)==1): ?>
                    <?php if ($this->file->description) : ?>
                        <div><span><?php _e('Description','wpfd'); ?> : </span> <?php echo $this->file->description ; ?>&nbsp;</div>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if(wpfdBase::loadValue($this->params,'tree_showversion',1)==1): ?>
                    <?php if ($this->file->version) : ?>
                        <div><span><?php _e('Version','wpfd'); ?> : </span> <?php echo $this->file->version ; ?>&nbsp;</div>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if(wpfdBase::loadValue($this->params,'tree_showsize',1)==1): ?>
                        <?php if ($this->file->size) : ?>
                            <div><span><?php _e('Size'); ?> : </span> <?php echo wpfdHelperFile::bytesToSize($this->file->size) ; ?></div>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php if(wpfdBase::loadValue($this->params,'tree_showhits',1)==1): ?>
                    <?php if ($this->file->hits) : ?>
                        <div><span><?php _e('Hits','wpfd'); ?> : </span> <?php echo $this->file->hits ; ?></div>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if(wpfdBase::loadValue($this->params,'tree_showdateadd',1)==1): ?>
                    <?php if ($this->file->created) : ?>
                        <div><span><?php _e('Date added','wpfd'); ?> : </span> <?php echo $this->file->created ; ?></div>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if(wpfdBase::loadValue($this->params,'tree_showdatemodified',1)==1): ?>
                    <?php if ($this->file->modified) : ?>
                        <div><span><?php _e('Date modified','wpfd'); ?> : </span> <?php echo $this->file->modified ; ?></div>
                    <?php endif; ?>
                <?php endif; ?>
                    <div class="extra-downloadlink">
                        <a class="downloadlink" href="<?php echo $app->getAjaxUrl(); ?>task=file.download&id=<?php echo $this->file->ID ; ?>"><?php _e('Download'); ?></a>
                    </div>
            </div>
            <?php endif; ?>
        </div>
</div>
