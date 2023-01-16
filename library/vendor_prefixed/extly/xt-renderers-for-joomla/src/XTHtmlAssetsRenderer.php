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
use XTP_BUILD\Illuminate\Support\Collection;
use Joomla\CMS\Document\Renderer\Html\HeadRenderer;

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
        $allowedScriptsAndStylesheets = new Collection(
            preg_split(
                '/[\s,]+/',
                $document->params->get('allowedScriptsAndStylesheets')
            )
        );

        // Nothing loaded by default
        $document->_styleSheets = $this->filter(
            new Collection($document->_styleSheets),
            $allowedScriptsAndStylesheets
        );
        $document->_style = $this->filter(
            new Collection($document->_style),
            $allowedScriptsAndStylesheets
        );
        $document->_scripts = $this->filter(
            new Collection($document->_scripts),
            $allowedScriptsAndStylesheets
        );
        $document->_script = $this->filter(
            new Collection($document->_script),
            $allowedScriptsAndStylesheets
        );
        $document->_custom = $this->filter(
            new Collection($document->_custom),
            $allowedScriptsAndStylesheets
        );

        // My Script and Styles
        $headScript = (new HtmlAssetTagsBuilder())->generate(Repository::GLOBAL_POSITION_HEAD);

        return parent::render($head, $params, $content).$headScript;
    }

    private function filter(Collection $items, Collection $allowedScriptsAndStylesheets)
    {
        return $items->filter(function ($item, $key) use ($allowedScriptsAndStylesheets) {
            $matched = $allowedScriptsAndStylesheets->first(function ($keyword) use ($item, $key) {
                if ('*' === $keyword) {
                    return true;
                }

                // Test File Key
                if (false !== strpos($key, $keyword)) {
                    return true;
                }

                // Test Item
                if (\is_string($item) && false !== strpos($item, $keyword)) {
                    return true;
                }

                // Test Type
                if (\is_array($item) && isset($item['type']) && false !== strpos($item['type'], $keyword)) {
                    return true;
                }

                return false;
            });

            return null !== $matched;
        })->toArray();
    }
}
