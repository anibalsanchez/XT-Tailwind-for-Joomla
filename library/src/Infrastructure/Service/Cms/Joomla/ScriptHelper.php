<?php

/*
 * @package     XT Tailwind for Joomla
 *
 * @author      Extly, CB. <team@extly.com>
 * @copyright   Copyright (c)2012-2025 Extly, CB. All rights reserved.
 * @license     https://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 *
 * @see         https://www.extly.com
 */

namespace Extly\Infrastructure\Service\Cms\Joomla;

use Extly\Infrastructure\Support\HtmlAsset\Asset\InlineScriptTag;
use Extly\Infrastructure\Support\HtmlAsset\Asset\InlineStyleTag;
use Extly\Infrastructure\Support\HtmlAsset\Asset\LinkCriticalStylesheetTag;
use Extly\Infrastructure\Support\HtmlAsset\Asset\LinkDeferStylesheetTag;
use Extly\Infrastructure\Support\HtmlAsset\Asset\LinkStylesheetByScript;
use Extly\Infrastructure\Support\HtmlAsset\Asset\ScriptTag;
use Extly\Infrastructure\Support\HtmlAsset\HtmlAssetTagsBuilder;
use Extly\Infrastructure\Support\HtmlAsset\Repository as HtmlAssetRepository;
use Extly\Infrastructure\Support\UrlTools\Helper as UrlHelper;
use Joomla\CMS\Factory as CMSFactory;
use Joomla\CMS\HTML\HTMLHelper as CMSHTMLHelper;
use Joomla\CMS\Uri\Uri as CMSUri;
use Joomla\CMS\Version as CMSVersion;

final class ScriptHelper
{
    public const CLIENT_FRONTEND = 1;

    public const CLIENT_ADMINISTRATOR = 0;

    public static function addScriptDeclaration($script)
    {
        $document = self::getHtmlDocument();

        if (!$document) {
            return;
        }

        $document->addScriptDeclaration($script);

        // Alternative XT Html Asset Tags Builder
        $inlineScriptTag = new InlineScriptTag($script);
        HtmlAssetRepository::getInstance()->push($inlineScriptTag);
    }

    public static function addStyleDeclaration($style)
    {
        $document = self::getHtmlDocument();

        if (!$document) {
            return;
        }

        $document->addStyleDeclaration($style);

        // Alternative XT Html Asset Tags Builder
        $inlineStyleTag = new InlineStyleTag($style);
        HtmlAssetRepository::getInstance()->push($inlineStyleTag);
    }

    /**
     * addDeferredExtensionScript.
     *
     * Example: ScriptHelper::addDeferredExtensionScript('lib_xtdir4alg/app/autocomplete.min.js');
     *
     * @param string $extensionScript Param
     * @param mixed  $attribs         Html Attributes
     */
    public static function addDeferredExtensionScript($extensionScript, $options = [], $attribs = [])
    {
        $uriWithMediaVersion = self::addClient(
            self::addMediaVersion(
                self::resolveExtensionScriptUri($extensionScript, $options)
            ),
            $options
        );
        self::addScriptToDocument($uriWithMediaVersion, $options, $attribs);

        // Alternative XT Html Asset Tags Builder
        $scriptTag = new ScriptTag($uriWithMediaVersion, $attribs);
        HtmlAssetRepository::getInstance()->push($scriptTag);
    }

    public static function addDeferredExtensionStylesheet($extensionRelativeScript, $options = [], $attribs = [])
    {
        $uriWithMediaVersion = self::addClient(
            self::addMediaVersion(
                self::resolveExtensionStylesheetUri($extensionRelativeScript, $options)
            ),
            $options
        );

        return self::addDeferredStylesheet($uriWithMediaVersion, $options, $attribs);
    }

    /**
     * addDeferredScript.
     *
     * Example: ScriptHelper::addDeferredScript('https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js');
     *
     * @param string $extensionScriptUri Param
     * @param mixed  $attribs            Html Attributes
     */
    public static function addDeferredScript($extensionScriptUri, $options = [], $attribs = [])
    {
        $document = self::getHtmlDocument();

        if (!$document) {
            return;
        }

        $defaultOptions = ['version' => 'auto'];
        $options = array_merge($defaultOptions, $options);

        $defaultAttribs = ['defer' => true];
        $attribs = array_merge($defaultAttribs, $attribs);

        $document->addScript($extensionScriptUri, $options, $attribs);

        // Alternative XT Html Asset Tags Builder
        $scriptTag = new ScriptTag($extensionScriptUri, $attribs);
        HtmlAssetRepository::getInstance()->push($scriptTag);
    }

    /**
     * addDeferredStylesheet.
     *
     * Example:
     * ScriptHelper::addDeferredStylesheet('https://cdn.jsdelivr.net/npm/...instantsearch.min.css');
     *
     * @param string $stylesheetUri Param
     */
    public static function addDeferredStylesheet($stylesheetUri, $options = [], $attribs = [])
    {
        $document = self::getHtmlDocument();

        if (!$document) {
            return;
        }

        $script = LinkStylesheetByScript::renderScript($stylesheetUri);
        $document->addScriptDeclaration($script);

        $linkCriticalStylesheetTag = new LinkCriticalStylesheetTag($stylesheetUri);
        $noScriptTag = (new HtmlAssetTagsBuilder())->buildNoScriptTag($linkCriticalStylesheetTag);
        $document->addCustomTag($noScriptTag);

        // Alternative XT Html Asset Tags Builder
        $linkDeferStylesheetTag = new LinkDeferStylesheetTag($stylesheetUri, $attribs);
        HtmlAssetRepository::getInstance()->push($linkDeferStylesheetTag);
    }

    /**
     * addInlineScript (Extension).
     *
     * Example: ScriptHelper::addInlineScript('lib_xtdir4alg/app/autocomplete.min.js');
     */
    public static function addInlineExtensionScript($extensionRelativeScript, $options = [], $attribs = [])
    {
        $document = self::getHtmlDocument();

        if (!$document) {
            return null;
        }

        $uri = self::resolveExtensionScriptUri($extensionRelativeScript, $options);
        $filePath = JPATH_ROOT.'/'.$uri;

        // The Uri can be mapped to a directory (subfolders?)
        if (file_exists($filePath)) {
            $scriptDeclaration = file_get_contents($filePath);

            $document->addScriptDeclaration($scriptDeclaration);

            // Alternative XT Html Asset Tags Builder
            $inlineScriptTag = new InlineScriptTag($scriptDeclaration);
            HtmlAssetRepository::getInstance()->push($inlineScriptTag);

            return true;
        }

        return self::addDeferredExtensionScript($extensionRelativeScript, $options, $attribs);
    }

    /**
     * addInlineStylesheet.
     *
     * Example: ScriptHelper::addInlineStylesheet('mod_xtdir4alg_autocomplete/xtdir4alg_autocomplete.min.css');
     */
    public static function addInlineExtensionStylesheet($extensionRelativeStylesheet, $options = [], $attribs = [])
    {
        $document = self::getHtmlDocument();

        if (!$document) {
            return null;
        }

        $uri = self::resolveExtensionStylesheetUri($extensionRelativeStylesheet, $options);
        $filePath = JPATH_ROOT.'/'.$uri;

        // The Uri can be mapped to a directory (subfolders?)
        if (file_exists($filePath)) {
            $styleDeclaration = file_get_contents($filePath);

            $document->addStyleDeclaration($styleDeclaration);

            // Alternative XT Html Asset Tags Builder
            $inlineStyleTag = new InlineStyleTag($styleDeclaration);
            HtmlAssetRepository::getInstance()->push($inlineStyleTag);

            return true;
        }

        // Fallback
        return self::addDeferredExtensionStylesheet($extensionRelativeStylesheet, $options, $attribs);
    }

    public static function addMediaVersion($uri)
    {
        $mediaversion = (new CMSVersion())->getMediaVersion();

        if (false !== strpos($uri, '?')) {
            return $uri.'&'.$mediaversion;
        }

        return $uri.'?'.$mediaversion;
    }

    public static function addClient($uriRelative, $options = [])
    {
        if (preg_match('/^https?:\/\//', $uriRelative)) {
            return $uriRelative;
        }

        if (!self::hasClient($options)) {
            $options['client'] = self::CLIENT_FRONTEND;
        }

        $uriBase = CMSUri::base();

        if (self::CLIENT_FRONTEND === $options['client']) {
            $uriBase = CMSUri::root();
        }

        return (new UrlHelper())->combine($uriBase, $uriRelative);
    }

    // Alias addInlineExtensionScript
    public static function addInlineScript($extensionRelativeScript, $options = [])
    {
        return self::addInlineExtensionScript($extensionRelativeScript, $options);
    }

    // Alias addInlineExtensionStylesheet
    public static function addInlineStylesheet($extensionRelativeStylesheet, $options = [])
    {
        return self::addInlineExtensionStylesheet($extensionRelativeStylesheet, $options);
    }

    // Alias addDeferredStylesheet
    public static function addStylesheet($url)
    {
        return self::addDeferredStylesheet($url);
    }

    // Alias addScriptVersion + version auto
    public static function addScript($url, $options = [], $attribs = [])
    {
        if (\is_array($options) && !isset($options['version'])) {
            $options['version'] = 'auto';
        }

        return self::addScriptVersion($url, $options, $attribs);
    }

    // Alias addDeferredScript + options string
    public static function addScriptVersion($url, $options = [], $attribs = [])
    {
        if (\is_string($options) &&
            false === strpos($url, '?') &&
            'text/javascript' !== $options) {
            $url = $url.'?'.$options;
            $options = [];
        }

        if (!\is_array($attribs)) {
            $attribs = [];
        }

        return self::addDeferredScript($url, $options, $attribs);
    }

    /**
     * addDeferredStyle.
     *
     * @deprecated
     */
    public static function addDeferredStyle($stylesheetUri, $options = [], $attribs = [])
    {
        return self::addDeferredStylesheet($stylesheetUri, $options = [], $attribs = []);
    }

    private static function hasClient($options)
    {
        return \is_array($options) && isset($options['client']);
    }

    private static function resolveExtensionStylesheetUri($extensionRelativeStylesheet, $options = [])
    {
        $defaultOptions = ['relative' => true, 'pathOnly' => true];
        $options = array_merge($defaultOptions, $options);

        $uri = CMSHTMLHelper::stylesheet($extensionRelativeStylesheet, $options);

        return ltrim($uri, '/');
    }

    private static function resolveExtensionScriptUri($extensionRelativeScript, $options = [])
    {
        $defaultOptions = ['relative' => true, 'pathOnly' => true];
        $options = array_merge($defaultOptions, $options);

        $uri = CMSHTMLHelper::script(
            $extensionRelativeScript,
            $options
        );

        return ltrim($uri, '/');
    }

    private static function addScriptToDocument($scriptUri, $options = [], $attribs = [])
    {
        $document = self::getHtmlDocument();

        if (!$document) {
            return;
        }

        // Pasted from libraries/src/HTML/HTMLHelper.php, 730
        // $options = [];

        // If inclusion is required

        // If there is already a version hash in the script reference (by using deprecated MD5SUM).
        if ($pos = false !== strpos($scriptUri, '?')) {
            $options['version'] = substr($scriptUri, $pos + 1);
        }

        if (!isset($options['version'])) {
            $options['version'] = 'auto';
        }

        $document->addScript($scriptUri, $options, $attribs);
    }

    private static function getHtmlDocument()
    {
        $document = CMSFactory::getDocument();

        if ('html' === $document->getType()) {
            return $document;
        }

        return null;
    }
}
