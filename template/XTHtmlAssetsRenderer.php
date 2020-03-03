<?php

/*
 * @package     XT Tailwind for Joomla
 * @author      Extly, CB. <team@extly.com>
 * @copyright   Copyright (c)2012-2020 Extly, CB. All rights reserved.
 * @license     https://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 * @see         https://www.extly.com
 */

namespace Joomla\CMS\Document\Renderer\Html;

defined('JPATH_PLATFORM') or die;

use Extly\Infrastructure\Support\HtmlAsset\HtmlAssetTagsBuilder;
use Extly\Infrastructure\Support\HtmlAsset\Repository;

/**
 * HTML document renderer for the document `<head>` element.
 */
class XTHtmlAssetsRenderer extends HeadRenderer
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
        $document = $this->_doc;

        // Nothing loaded by default
        $document->_styleSheets = [];
        $document->_style = [];
        $document->_scripts = [];
        $document->_script = [];

        // My Script and Styles
        $headScript = HtmlAssetTagsBuilder::create()->generate(Repository::GLOBAL_POSITION_HEAD);

        return parent::render($head, $params, $content).$headScript;
    }
}
