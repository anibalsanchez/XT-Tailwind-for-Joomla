<?php
/* This file has been prefixed by <PHP-Prefixer> for "XT Tailwind CSS" */

/*
 * @package     Extly Infrastructure Support
 *
 * @author      Extly, CB. <team@extly.com>
 * @copyright   Copyright (c)2012-2022 Extly, CB. All rights reserved.
 * @license     https://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 *
 * @see         https://www.extly.com
 */

namespace XTP_BUILD\Extly\CMS\Document\Renderer\Html;

\defined('JPATH_PLATFORM') || exit;

use XTP_BUILD\Extly\Infrastructure\Support\HtmlAsset\HtmlAssetTagsBuilder;
use XTP_BUILD\Extly\Infrastructure\Support\HtmlAsset\Repository;
use Joomla\CMS\Document\Renderer\Html\HeadRenderer;

/**
 * HTML document renderer for the document `<head>` element.
 */
class XTHtmlAssetsBodyRenderer extends HeadRenderer
{
    /**
     * Renders the document head and returns the results as a string.
     *
     * @param string $head    (unused)
     * @param array  $params  Associative array of values
     * @param string $content The script
     *
     * @return string The output of the script
     */
    public function render($head, $params = [], $content = null)
    {
        return (new HtmlAssetTagsBuilder())->generate(Repository::GLOBAL_POSITION_BODY);
    }
}