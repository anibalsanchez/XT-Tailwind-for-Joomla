<?php

/*
 * @package     XT Tailwind
 *
 * @author      Extly, CB. <team@extly.com>
 * @copyright   Copyright (c)2007-2018 Extly, CB. All rights reserved.
 * @license     https://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 *
 * @see         https://www.extly.com
 */

defined('_JEXEC') or die;

// Bootstrap Gantry framework or fail gracefully (inside included file).
$gantry = include __DIR__.'/includes/gantry.php';

/** @var \Gantry\Framework\Theme $theme */
$theme = $gantry['theme'];

ob_start();
include JPATH_THEMES.'/system/offline.php';
$html = ob_get_clean();
$start = strpos($html, '<body>') + 6;
$end = strpos($html, '</body>', $start);

$context = [
    'message' => substr($html, $start, $end - $start),
];

// Reset used outline configuration.
unset($gantry['configuration']);

// Render the page.
echo $theme
    ->setLayout('_offline', true)
    ->render('offline.html.twig', $context);
