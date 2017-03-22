<?php
/**
 * WP File Download
 *
 * @package WP File Download
 * @author Joomunited
 * @version 1.0
 */

// No direct access.
defined( 'ABSPATH' ) || die();

$items_thead = array(
    'ext' => __('#','wpfd'),
    'title' => __('Title','wpfd'),
    'size' => __('File size','wpfd'),
    'created_time' => __('Date added','wpfd'),
    'modified_time' => __('Date modified','wpfd'),
    'version' => __('Version','wpfd'),
    'hits' => __('Hits','wpfd'),
    'actions' => __('Actions','wpfd')
);
?>

<table class="restable">
    <thead>
    <tr>
        <?php
        foreach ($items_thead as $thead_key => $thead_text) {
            $icon = '';
            if ($thead_key === $this->ordering) {
                $icon = '<span class="dashicons dashicons-arrow-' . ($this->orderingdir === 'asc' ? 'up' : 'down') . '"></span>';
            }
            ?>
            <th class="<?php echo $thead_text; ?>">
                <?php if ($thead_key == 'actions') { ?>
                    <?php echo $thead_text; ?>
                <?php } else { ?>
                    <a href="#" class="<?php echo($this->ordering === $thead_key ? 'currentOrderingCol' : ''); ?>"
                       data-ordering="<?php echo $thead_key; ?>"
                       data-direction="<?php echo $this->orderingdir; ?>"><?php echo $thead_text; ?><?php echo $icon; ?></a>
                <?php } ?>
            </th>
        <?php } ?>
    </tr>
    </thead>
    <tbody >
    <?php foreach ($this->files as $file): ?>
        <tr class="file" data-id-file="<?php echo $file->ID; ?>">
            <td class="ext <?php echo $file->ext; ?>"><span class="txt"><?php echo $file->ext; ?></span></td>
            <td class="title"><?php echo $file->post_title; ?></td>
            <td class="size"><?php echo wpfdHelperFiles::bytesToSize($file->size); ?></td>
            <td class="created"><?php echo mysql2date(wpfdBase::loadValue($this->params, 'date_format', get_option('date_format')), $file->post_date); ?></td>
            <td class="modified"><?php echo mysql2date(wpfdBase::loadValue($this->params, 'date_format', get_option('date_format')), $file->post_modified); ?></td>
            <td class="version"><?php echo $file->version; ?></td>
            <td class="hits"><?php echo $file->hits.' '.__('hits','wpfd'); ?></td>
            <td class="actions"><a class="trash"><i class="icon-trash"></i></a></td>
        </tr>
    <?php endforeach; ?>

    </tbody>

</table>