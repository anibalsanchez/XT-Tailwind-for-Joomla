<?php

/*
 * @package     Extly Infrastructure Support
 *
 * @author      Extly, CB. <team@extly.com>
 * @copyright   Copyright (c)2012-2025 Extly, CB. All rights reserved.
 * @license     https://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 *
 * @see         https://www.extly.com
 */

namespace Joomla\CMS\Document\Renderer\Html;

\defined('JPATH_PLATFORM') || exit;

use Joomla\CMS\Document\Renderer\Html\HeadRenderer;
use XTP_BUILD\Extly\Infrastructure\Support\HtmlAsset\HtmlAssetTagsBuilder;
use XTP_BUILD\Extly\Infrastructure\Support\HtmlAsset\Repository;

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
        $allowedScriptsAndStylesheets = preg_split(
            '/[\s,]+/',
            $document->params->get('allowedScriptsAndStylesheets')
        );

        // Nothing loaded by default
        $document->_styleSheets = $this->filter(
            $document->_styleSheets,
            $allowedScriptsAndStylesheets
        );
        $document->_style = $this->filter(
            $document->_style,
            $allowedScriptsAndStylesheets
        );
        $document->_scripts = $this->filter(
            $document->_scripts,
            $allowedScriptsAndStylesheets
        );
        $document->_script = $this->filter(
            $document->_script,
            $allowedScriptsAndStylesheets
        );
        $document->_custom = $this->filter(
            $document->_custom,
            $allowedScriptsAndStylesheets
        );

        // My Script and Styles
        $headScript = (new HtmlAssetTagsBuilder())->generate(Repository::GLOBAL_POSITION_HEAD);

        return parent::render($head, $params, $content).$headScript;
    }

    private function filter(array $items, array $allowedScriptsAndStylesheets)
    {
        return array_filter($items, function ($item, $key) use ($allowedScriptsAndStylesheets) {
            foreach ($allowedScriptsAndStylesheets as $keyword) {
                if ('*' === $keyword) {
                    return true;
                }

                // Test File Key
                if (str_contains($key, (string) $keyword)) {
                    return true;
                }

                // Test Item
                if (\is_string($item) && str_contains($item, (string) $keyword)) {
                    return true;
                }

                // Test Type
                if (\is_array($item) && isset($item['type']) && str_contains($item['type'], (string) $keyword)) {
                    return true;
                }
            }

            return false;
        }, ARRAY_FILTER_USE_BOTH);
    }
}
