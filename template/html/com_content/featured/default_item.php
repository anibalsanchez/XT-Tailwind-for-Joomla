<?php
/* This file has been prefixed by <PHP-Prefixer> for "XT Tailwind CSS" */

/*
 * @package     XT Tailwind for Joomla
 *
 * @author      Extly, CB. <team@extly.com>
 * @copyright   Copyright (c)2012-2024 Extly, CB. All rights reserved.
 * @license     https://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 *
 * @see         https://www.extly.com
 */

defined('_JEXEC') || exit;

ob_start();
require JPATH_ROOT.'/components/com_content/tmpl/featured/default_item.php';
$item = ob_get_contents();
ob_end_clean();

echo str_replace('<div class="item-content">', '<div class="prose item-content">', $item);
