<?php

/*
 * @package     XT Tailwind for Joomla
 *
 * @author      Extly, CB. <team@extly.com>
 * @copyright   Copyright (c)2012-2022 Extly, CB. All rights reserved.
 * @license     https://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 *
 * @see         https://www.extly.com
 */

defined('_JEXEC') || exit;

if (!@include_once(JPATH_ROOT.'/libraries/xttailwind/vendor/autoload.php')) {
    return;
}

use Extly\Infrastructure\Service\Cms\Joomla\ScriptHelper;
use Extly\Infrastructure\Support\HtmlAsset\Asset\InlineScriptTag;
use Extly\Infrastructure\Support\HtmlAsset\Asset\LinkCriticalStylesheetTag;
use Extly\Infrastructure\Support\HtmlAsset\Asset\LinkStylesheetTag;
use Extly\Infrastructure\Support\HtmlAsset\Asset\ScriptTag;
use Extly\Infrastructure\Support\HtmlAsset\Repository as HtmlAssetRepository;
use Joomla\CMS\Factory as CMSFactory;
use Joomla\CMS\HTML\HTMLHelper as CMSHTMLHelper;
use Joomla\CMS\Uri\Uri as CMSUri;
use Joomla\CMS\Version as CMSVersion;

$app = CMSFactory::getApplication();
$config = $app->getConfig();
$document = $app->getDocument();
$menu = $app->getMenu();
$menuActive = $menu->getActive();

// The HtmlAssetRepository, where all extensions coordinate the scripts and styles
$htmlAssetRepository = HtmlAssetRepository::getInstance();

// Output as HTML5
$this->setHtml5(true);

// Getting params from template
$params = $app->getTemplate(true)->params;

// Detecting Active Variables
$option = $app->input->getCmd('option', '');
$view = $app->input->getCmd('view', '');
$layout = $app->input->getCmd('layout', '');
$task = $app->input->getCmd('task', '');
$itemid = $app->input->getCmd('Itemid', '');
$siteName = htmlspecialchars($app->get('sitename'), \ENT_QUOTES, 'UTF-8');
$mediaversion = (new CMSVersion())->getMediaVersion();

// Add template js - JavaScript to be deferred - Removed to Optimize
// $templateJsFile = CMSHTMLHelper::script('template.js', ['relative' => true, 'pathOnly' => true]);
// $templateJsFile = $templateJsFile.'?'.$mediaversion;
// $htmlAssetRepository->push(ScriptTag::create(ScriptHelper::addMediaVersion($templateJsFile)));

// Add template.css
$templateCssFile = CMSHTMLHelper::stylesheet('template.css', ['relative' => true, 'pathOnly' => true]);
$htmlAssetRepository->push(LinkCriticalStylesheetTag::create(ScriptHelper::addMediaVersion($templateCssFile)));

// Additional inline head scripts
$headScripts = $params->get('headScripts');

if (!empty($headScripts)) {
    $htmlAssetRepository->push(InlineScriptTag::create($headScripts));
}

$headData = $document->getHeadData();

// The template customization starts here

// Prism - Deferred Stylesheet
$prismCssFile = CMSHTMLHelper::stylesheet('prism.css', ['relative' => true, 'pathOnly' => true]);
$htmlAssetRepository->push(LinkStylesheetTag::create(ScriptHelper::addMediaVersion($prismCssFile)));

// Prism - Deferred JavaScript
$prismJsFile = CMSHTMLHelper::script('prism.js', ['relative' => true, 'pathOnly' => true]);
$htmlAssetRepository->push(ScriptTag::create(ScriptHelper::addMediaVersion($prismJsFile)));

$htmlAssetRepository->push(ScriptTag::create('https://buttons.github.io/buttons.js'));

$logoTitle = htmlspecialchars($params->get('logoTitle', '@Anibal_Sanchez'));
$siteDescription = htmlspecialchars($params->get('siteDescription'), \ENT_QUOTES, 'UTF-8');

?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">

<head>
  <meta http-equiv="Content-Type" content="<?php echo $headData['metaTags']['http-equiv']['content-type']; ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <base href="<?php echo CMSUri::current(); ?>">

  <jdoc:include type="XTHtmlAssets" />

  <!-- TODO: Support GA and the extra links -->
  <link rel="preconnect" href="https://buttons.github.io" crossorigin>
  <link rel="preconnect" href="https://www.google-analytics.com" crossorigin>
  <link rel="preconnect" href="https://www.googletagmanager.com" crossorigin>
</head>

<body class="site <?php echo $option
    .' view-'.$view
    .($layout ? ' layout-'.$layout : ' no-layout')
    .($task ? ' task-'.$task : ' no-task')
    .($itemid ? ' itemid-'.$itemid : '')
    .('rtl' === $this->direction ? ' rtl' : '');
?>">

  <!-- navigation-block -->
	<div class="navigation-block">
		<div class="w-full px-4 py-8 lg:px-0">
			<div class="container mx-auto">
				<div class="header">

          <!-- logo-block -->
          <div class="logo-element">
            <a href="<?php echo $this->baseurl; ?>/" target="_self"
                title="<?php echo $logoTitle; ?>" rel="home" class="font-bold text-white no-underline">
                <?php echo $logoTitle; ?>
            </a>
            <?php
                if (!empty($siteDescription)) {
                    echo '<p class="site-description">'.htmlspecialchars($siteDescription, \ENT_COMPAT, 'UTF-8').'</p>';
                }
            ?>
          </div>

          <!-- languages-block -->
          <div class="languages-element">
            <jdoc:include type="modules" name="language-switcher" style="xhtml"/>
          </div>

        </div>
      </div>
    </div>

  </div>

	<!-- main-container-block -->
	<div class="main-container-block">
		<div class="w-full px-4 py-8 lg:px-0">
			<div class="container mx-auto">
        <div class="flex flex-wrap sm:flex-nowrap">
          <div class="w-full sm:w-2/3 sm:pr-4">
            <!-- breadcrumbs-block -->
            <div class="breadcrumbs-block">
              <jdoc:include type="modules" name="mainbar-a" style="xhtml"/>
            </div>

            <!-- blog-block -->
            <div class="blog-block">
              <!-- Begin Content -->
              <jdoc:include type="message" />
              <jdoc:include type="component" />
              <!-- End Content -->
            </div>
          </div>

          <div class="aside-container">
            <!-- search-block -->
            <div class="search-block">
                <jdoc:include type="modules" name="search" style="xhtml"/>
            </div>

            <!-- aside-block -->
            <div class="aside-block">
              <jdoc:include type="modules" name="aside-a" style="xhtml"/>
            </div>
          </div>
        </div>
      </div>

      <!-- footer-element -->
      <div class="footer-element">
        <p>
          &copy; <?php echo date('Y'); ?> <a a href="<?php echo $this->baseurl; ?>/" target="_self"
            title="<?php echo $logoTitle; ?>"><?php echo $logoTitle; ?> - <?php echo $siteName; ?></a>
        </p>
      </div>
    </div>

  </div>

  <jdoc:include type="modules" name="analytics" style="none" />
  <jdoc:include type="modules" name="debug" style="none" />

  <jdoc:include type="XTHtmlAssetsBody"  name="body" style="none" />
</body>

</html>
