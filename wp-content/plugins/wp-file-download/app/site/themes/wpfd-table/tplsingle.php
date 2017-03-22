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

<?php if(!empty($this->file)): ?>
        <a class="dropfile-file-link wpfd-content-single" href="<?php echo $app->getAjaxUrl(); ?>task=file.download&id=<?php echo $this->file->ID; ?>" data-id="<?php echo $this->file->ID ; ?>" title="<?php echo $this->file->description ; ?>">
            <span class="droptitle">
                <b><?php echo $this->file->title ; ?></b>
            </span>
            <br/>
            <span class="dropinfos">
                <?php if(wpfdBase::loadValue($this->params,'table_showsize',1)==1): ?>
                    <b><?php _e('Size'); ?> : </b><?php echo wpfdHelperFile::bytesToSize($this->file->size) ; ?> &nbsp;
                <?php endif; ?>
                    <b><?php _e('Format'); ?> : </b><?php echo strtoupper($this->file->ext); ?>
            </span>
        </a>
<?php endif; ?>