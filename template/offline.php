<?php

/*
 * @package     XT Tailwind for Joomla
 *
 * @author      Extly, CB. <team@extly.com>
 * @copyright   Copyright (c)2019-2022 Extly, CB. All rights reserved.
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
$config = CMSFactory::getConfig();
$document = CMSFactory::getDocument();
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

/* The template customization starts here */

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
  <meta http-equiv="Content-Type" content="<?php echo $headData['metaTags']['http-equiv']; ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <base href="<?php echo CMSUri::current(); ?>">

  <jdoc:include type="XTHtmlAssets" />

  <!-- TODO: Support GA and the extra links -->
  <link rel="preconnect" href="https://api.github.com">
  <link rel="preconnect" href="https://www.google-analytics.com">
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

    <div class="header-background absolute h-32-lite w-full z-10">
      <svg class="fill-current text-black inline-block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 2560 420">
        <path d="M2140.000,240.000 L2560.000,240.000 L2560.000,300.000 L958.000,300.000 L215.000,300.000 L212.000,300.000 C195.432,300.000 182.000,286.568 182.000,270.000 C182.000,253.432 195.432,240.000 212.000,240.000 L215.000,240.000 L465.000,240.000 C481.569,240.000 495.000,226.568 495.000,210.000 C495.000,193.432 481.569,180.000 465.000,180.000 L0.000,180.000 L0.000,0.000 L406.000,0.000 L1501.000,0.000 L1930.000,0.000 C1946.569,0.000 1960.000,13.431 1960.000,30.000 C1960.000,46.569 1946.569,60.000 1930.000,60.000 L1533.000,60.000 C1516.431,60.000 1503.000,73.431 1503.000,90.000 C1503.000,106.569 1516.431,120.000 1533.000,120.000 L2560.000,120.000 L2560.000,60.000 L2560.000,60.000 L2560.000,180.000 L2140.000,180.000 C2123.431,180.000 2110.000,193.432 2110.000,210.000 C2110.000,226.568 2123.431,240.000 2140.000,240.000 ZM601.000,60.000 L406.000,60.000 L81.000,60.000 C64.431,60.000 51.000,73.431 51.000,90.000 C51.000,106.569 64.431,120.000 81.000,120.000 L601.000,120.000 C617.569,120.000 631.000,106.569 631.000,90.000 C631.000,73.431 617.569,60.000 601.000,60.000 ZM1138.000,120.000 L759.000,120.000 C742.431,120.000 729.000,133.431 729.000,150.000 C729.000,166.569 742.431,180.000 759.000,180.000 L1138.000,180.000 C1154.568,180.000 1168.000,166.569 1168.000,150.000 C1168.000,133.431 1154.568,120.000 1138.000,120.000 ZM1905.000,180.000 L1352.000,180.000 C1335.432,180.000 1322.000,193.432 1322.000,210.000 C1322.000,226.568 1335.432,240.000 1352.000,240.000 L1905.000,240.000 C1921.569,240.000 1935.000,226.568 1935.000,210.000 C1935.000,193.432 1921.569,180.000 1905.000,180.000 ZM0.267,300.000 L0.000,300.000 L0.000,240.000 L0.267,240.000 L0.267,300.000 ZM114.000,390.000 C114.000,406.569 100.569,420.000 84.000,420.000 L0.000,420.000 L0.000,360.000 L84.000,360.000 C100.569,360.000 114.000,373.431 114.000,390.000 ZM1400.000,360.000 L1568.000,360.000 C1584.568,360.000 1598.000,373.431 1598.000,390.000 C1598.000,406.569 1584.568,420.000 1568.000,420.000 L1400.000,420.000 C1383.431,420.000 1370.000,406.569 1370.000,390.000 C1370.000,373.431 1383.431,360.000 1400.000,360.000 ZM2338.000,360.000 L2376.000,360.000 C2392.569,360.000 2406.000,373.431 2406.000,390.000 C2406.000,406.569 2392.569,420.000 2376.000,420.000 L2338.000,420.000 C2321.431,420.000 2308.000,406.569 2308.000,390.000 C2308.000,373.431 2321.431,360.000 2338.000,360.000 Z"></path>
      </svg>
    </div>

    <div class="absolute z-40 w-full py-8 px-4 lg:px-0">
      <div class="container mx-auto">
        <div class="flex">

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

        </div>
      </div>
    </div>

  </div>

  <!-- main-container-block -->
  <div class="main-container-block">

    <div class="content-background absolute h-32-lite w-10/12 z-10 pt-32-lite">
      <svg class="fill-current text-oldlace inline-block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 2560 420">
        <path d="M2140.000,240.000 L2560.000,240.000 L2560.000,300.000 L958.000,300.000 L215.000,300.000 L212.000,300.000 C195.432,300.000 182.000,286.568 182.000,270.000 C182.000,253.432 195.432,240.000 212.000,240.000 L215.000,240.000 L465.000,240.000 C481.569,240.000 495.000,226.568 495.000,210.000 C495.000,193.432 481.569,180.000 465.000,180.000 L0.000,180.000 L0.000,0.000 L406.000,0.000 L1501.000,0.000 L1930.000,0.000 C1946.569,0.000 1960.000,13.431 1960.000,30.000 C1960.000,46.569 1946.569,60.000 1930.000,60.000 L1533.000,60.000 C1516.431,60.000 1503.000,73.431 1503.000,90.000 C1503.000,106.569 1516.431,120.000 1533.000,120.000 L2560.000,120.000 L2560.000,60.000 L2560.000,60.000 L2560.000,180.000 L2140.000,180.000 C2123.431,180.000 2110.000,193.432 2110.000,210.000 C2110.000,226.568 2123.431,240.000 2140.000,240.000 ZM601.000,60.000 L406.000,60.000 L81.000,60.000 C64.431,60.000 51.000,73.431 51.000,90.000 C51.000,106.569 64.431,120.000 81.000,120.000 L601.000,120.000 C617.569,120.000 631.000,106.569 631.000,90.000 C631.000,73.431 617.569,60.000 601.000,60.000 ZM1138.000,120.000 L759.000,120.000 C742.431,120.000 729.000,133.431 729.000,150.000 C729.000,166.569 742.431,180.000 759.000,180.000 L1138.000,180.000 C1154.568,180.000 1168.000,166.569 1168.000,150.000 C1168.000,133.431 1154.568,120.000 1138.000,120.000 ZM1905.000,180.000 L1352.000,180.000 C1335.432,180.000 1322.000,193.432 1322.000,210.000 C1322.000,226.568 1335.432,240.000 1352.000,240.000 L1905.000,240.000 C1921.569,240.000 1935.000,226.568 1935.000,210.000 C1935.000,193.432 1921.569,180.000 1905.000,180.000 ZM0.267,300.000 L0.000,300.000 L0.000,240.000 L0.267,240.000 L0.267,300.000 ZM114.000,390.000 C114.000,406.569 100.569,420.000 84.000,420.000 L0.000,420.000 L0.000,360.000 L84.000,360.000 C100.569,360.000 114.000,373.431 114.000,390.000 ZM1400.000,360.000 L1568.000,360.000 C1584.568,360.000 1598.000,373.431 1598.000,390.000 C1598.000,406.569 1584.568,420.000 1568.000,420.000 L1400.000,420.000 C1383.431,420.000 1370.000,406.569 1370.000,390.000 C1370.000,373.431 1383.431,360.000 1400.000,360.000 ZM2338.000,360.000 L2376.000,360.000 C2392.569,360.000 2406.000,373.431 2406.000,390.000 C2406.000,406.569 2392.569,420.000 2376.000,420.000 L2338.000,420.000 C2321.431,420.000 2308.000,406.569 2308.000,390.000 C2308.000,373.431 2321.431,360.000 2338.000,360.000 Z"></path>
      </svg>
    </div>

    <div class="absolute z-40 w-full top-32-lite py-8 px-4 lg:px-0">
      <div class="container mx-auto">
        <div class="flex flex-wrap sm:flex-nowrap">
          <div class="w-full">
            <!-- blog-block -->
            <div class="blog-block prose">

                <!-- Begin Content -->
				<?php if ($app->get('offline_image') && file_exists($app->get('offline_image'))) {
                ?>
					<img src="<?php echo $app->get('offline_image'); ?>" alt="<?php echo $sitename; ?>" />
				<?php
            } ?>
				<?php if ('1' === $app->get('display_offline_message', 1) && '' !== str_replace(' ', '', $app->get('offline_message'))) {
                ?>
					<h2><?php echo $app->get('offline_message'); ?></h2>
				<?php
            } elseif ('2' === $app->get('display_offline_message', 1)) {
                ?>
					<h2><?php echo JText::_('JOFFLINE_MESSAGE'); ?></h2>
				<?php
            } ?>
                <!-- End Content -->

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <jdoc:include type="modules" name="debug" style="none" />

  <jdoc:include type="XTHtmlAssetsBody"  name="body" style="none" />
</body>

</html>
