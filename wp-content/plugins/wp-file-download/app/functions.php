<?php
/**
 * WP File Download
 *
 * @package WP File Download
 * @author Joomunited
 * @version 1.0
 */


/**
 * Sort items by property
 * @param a $items array of object
 * @param $key
 * @param $property
 * @param bool|false $reverse
 * @return array sorted items
 */
function wpfd_sort_by_property($items, $key = '', $property, $reverse = false) {

    $sorted = array();
    $items_bk = $items;
    foreach ($items as $item)
    {
        $sorted[$item->$key] = $item->$property;
        $items_bk[$item->$key] = $item;
    }

    if ($reverse) arsort($sorted); else asort($sorted);
    $results = array();

    foreach ($sorted as $key2 => $value)
    {
        $results[] = $items_bk[$key2];
    }
    return $results;

}

function wpfd_getext($file)
{
    $dot = strrpos($file, '.') + 1;

    return substr($file, $dot);
}