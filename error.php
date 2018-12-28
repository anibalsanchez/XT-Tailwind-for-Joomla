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

$context = [
    'errorcode' => isset($this->error) ? $this->error->getCode() : null,
    'error' => isset($this->error) ? $this->error->getMessage() : null,
    'debug' => '1' === $app->get('debug_lang', '0') || '1' === $app->get('debug', '0'),
    'backtrace' => $this->debug ? $this->renderBacktrace() : null,
];

// Reset used outline configuration.
unset($gantry['configuration']);

// Render the page.
echo $theme
    ->setLayout('_error', true)
    ->render('error.html.twig', $context);
