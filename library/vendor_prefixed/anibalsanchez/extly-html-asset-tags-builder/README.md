# HTML Asset Tags Builder

## Description

Beyond the JDocument, the Asset Tags Builder manages the generation of script and style tags for an Html Document.

`composer require anibalsanchez/extly-html-asset-tags-builder`

## Usage

### Create your Asset Tags Repository

```php
require_once JPATH_ROOT.'/libraries/my-library/vendor/autoload.php';

use Extly\Infrastructure\Support\HtmlAsset\Repository as HtmlAssetRepository;

// Create the repository, where all tags are defined and stored before the rendering
$htmlAssetRepository = HtmlAssetRepository::getInstance();
```

### Including scripts and styles

The tags builder has the following predefined ways to include these scripts and styles:

- InlineScriptTag
- InlineStyleTag
- LinkCriticalStylesheetTag
- LinkPreloadStylesheetTag
- LinkDeferStylesheetTag
- ScriptTag

For instance, `ScriptTag` defers the script and the `LinkDeferStylesheetTag` loads the stylesheet with a script at the end of the body.

Sample code:

```php
use Extly\Infrastructure\Support\HtmlAsset\Asset\InlineScriptTag;
use Extly\Infrastructure\Support\HtmlAsset\Asset\LinkCriticalStylesheetTag;
use Extly\Infrastructure\Support\HtmlAsset\Asset\LinkDeferStylesheetTag;
use Extly\Infrastructure\Support\HtmlAsset\Asset\ScriptTag;

// Add template js
$templateJsFile = CMSHTMLHelper::script('template.js', ['relative' => true, 'pathOnly' => true]);
$templateJsFile = $templateJsFile.'?'.(new JVersion)->getMediaVersion();
$htmlAssetRepository->push(ScriptTag::create($templateJsFile));

// Add Stylesheets
$templateCssFile = CMSHTMLHelper::stylesheet('template.css', ['relative' => true, 'pathOnly' => true]);
$templateCssFile = $templateCssFile.'?'.(new JVersion)->getMediaVersion();
$htmlAssetRepository->push(LinkCriticalStylesheetTag::create($templateCssFile));

// Additional inline head scripts
$headScripts = $this->params->get('headScripts');

if (!empty($headScripts)) {
    $htmlAssetRepository->push(InlineScriptTag::create($headScripts));
}

// FontAwesome at the end of the body
$linkStylesheetTag = LinkDeferStylesheetTag::create('https://use.fontawesome.com/releases/v5.6.3/css/all.css');
$htmlAssetRepository->push($linkStylesheetTag);
```

### Head and Body Renderers for Joomla

These classes help to define the proper renderers for the head and body scripts. In the template, they are called in this way:

Statement to generate the scripts and styles for the document head:

```php
<jdoc:include type="xthtmlassets" />
```

Statement to generate the scriptsat the bottom of the document body:

```php
<jdoc:include type="xthtmlassets" />
```

#### Head Renderer

```php
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
```

#### Body Renderer

```php
namespace Joomla\CMS\Document\Renderer\Html;

defined('JPATH_PLATFORM') or die;

use Extly\Infrastructure\Support\HtmlAsset\HtmlAssetTagsBuilder;
use Extly\Infrastructure\Support\HtmlAsset\Repository;

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
        return HtmlAssetTagsBuilder::create()->generate(Repository::GLOBAL_POSITION_BODY);
    }
}
```

## Acknowledgements

- Inspired by PrestaShop `JavascriptManager`
- [JAB18 - Let’s build a Joomla PWA PWS website](https://www.youtube.com/watch?v=Hg_ATQEl9_U&list=PLE_ZsP4SqZpynn-n0q1G8iUaeGYaqVF4k)

## License

The MIT License (MIT)
