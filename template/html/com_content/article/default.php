<?php

/*
 * @package     XT Tailwind for Joomla
 *
 * @author      Extly, CB. <team@extly.com>
 * @copyright   Copyright (c)2012-2023 Extly, CB. All rights reserved.
 * @license     https://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 *
 * @see         https://www.extly.com
 */

defined('_JEXEC') || exit;

ob_start();
require JPATH_ROOT.'/components/com_content/tmpl/article/default.php';
$item = ob_get_contents();
ob_end_clean();

echo str_replace('class="com-content-article', 'class="prose com-content-article', $item);
