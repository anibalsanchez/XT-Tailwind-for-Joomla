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

$raw = 'raw' === JFactory::getApplication()->input->getString('type');

// Reset used outline configuration.
unset($gantry['configuration']);

// Render the component.
echo $theme
    ->setLayout('_body_only', true)
    ->render($raw ? 'raw.html.twig' : 'component.html.twig');
