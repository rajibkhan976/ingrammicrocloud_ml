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
defined('ABSPATH') || die();
$app = Application::getInstance('wpfd');
?>
<?php if (!empty($this->file)): ?>
    <?php
    $bg_color = wpfdBase::loadValue($this->file_params, 'singlebg', '#444444');
    $hover_color = wpfdBase::loadValue($this->file_params, 'singlehover', '#888888');
    $font_color = wpfdBase::loadValue($this->file_params, 'singlefontcolor', '#ffffff');

    ?>
    <style>
        <?php if ($bg_color != '') {?>
        .wpfd-single-file a.wpfd-file-link {
            background-color:<?php echo $bg_color;?> !important;
        }
        <?php } ?>
        <?php if ($font_color != '') {?>
        .wpfd-single-file a.wpfd-file-link {
            color:<?php echo $font_color;?> !important;
        }
        <?php } ?>
        <?php if ($hover_color != '') { ?>
        .wpfd-single-file a.wpfd-file-link:hover {
            background-color:<?php echo $hover_color;?> !important;
        }
        <?php } ?>
    </style>

    <div class="wpfd-content wpfd-file wpfd-single-file" data-file="<?php echo $this->file->ID; ?>">

        <a class="wpfd-file-link"
           href="<?php echo $app->getAjaxUrl(); ?>task=file.download&id=<?php echo $this->file->ID; ?>"
           data-id="<?php echo $this->file->ID; ?>" title="<?php echo $this->file->description; ?>">
            <span class="droptitle"><?php echo $this->file->title; ?></span><br/>
                <span class="dropinfos"> 
                      <?php if (wpfdBase::loadValue($this->params, 'showsize', 1) == 1): ?>
                          <b><?php _e('Size'); ?> : </b><?php echo wpfdHelperFile::bytesToSize($this->file->size); ?>
                      <?php endif; ?>
                    <b><?php _e('Format'); ?> : </b><?php echo strtoupper($this->file->ext); ?>
                    </span>
        </a>
    </div>
<?php endif; ?>
