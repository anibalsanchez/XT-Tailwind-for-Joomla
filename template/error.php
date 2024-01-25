<?php

/*
 * @package     XT Tailwind for Joomla
 *
 * @author      Extly, CB. <team@extly.com>
 * @copyright   Copyright (c)2012-2024 Extly, CB. All rights reserved.
 * @license     https://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 *
 * @see         https://www.extly.com
 */

defined('_JEXEC') || exit;

// Sentry: Application Monitoring and Error Tracking Software
// To integrate "XT Sentry for Joomla" - https://github.com/anibalsanchez/XT-Sentry-for-Joomla
if (@include_once(JPATH_SITE.'/cli/sentry.php')) {
    if ($this->error instanceof \Throwable && function_exists('\Sentry\captureException')) {
        \Sentry\captureException($this->error);
    }
}

if (!@include_once(JPATH_ROOT.'/libraries/xttailwind/vendor/autoload.php')) {
    return;
}

use Extly\Infrastructure\Service\Cms\Joomla\ScriptHelper;
use Extly\Infrastructure\Support\HtmlAsset\Asset\InlineScriptTag;
use Extly\Infrastructure\Support\HtmlAsset\Asset\LinkCriticalStylesheetTag;
use Extly\Infrastructure\Support\HtmlAsset\Asset\ScriptTag;
use Extly\Infrastructure\Support\HtmlAsset\HtmlAssetTagsBuilder;
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
// $htmlAssetRepository->push(new ScriptTag(ScriptHelper::addMediaVersion($templateJsFile)));

// Add template.css
$templateCssFile = CMSHTMLHelper::stylesheet('template.css', ['relative' => true, 'pathOnly' => true]);
$htmlAssetRepository->push(new LinkCriticalStylesheetTag(ScriptHelper::addMediaVersion($templateCssFile)));

// Additional inline head scripts
$headScripts = $params->get('headScripts');

if (!empty($headScripts)) {
    $htmlAssetRepository->push(new InlineScriptTag($headScripts));
}

$headData = $document->getHeadData();
$siteDescription = htmlspecialchars($params->get('siteDescription'), \ENT_QUOTES, 'UTF-8');

/* The template customization starts here */

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
  <?php
    echo (new HtmlAssetTagsBuilder())->generate(HtmlAssetRepository::GLOBAL_POSITION_HEAD);
?>
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

        </div>
      </div>
    </div>

  </div>

	<!-- main-container-block -->
	<div class="main-container-block">
		<div class="w-full px-4 py-8 lg:px-0">
			<div class="container mx-auto">
        <div class="flex flex-wrap sm:flex-nowrap">
          <div class="w-full">
            <!-- blog-block -->
            <div class="blog-block">
              <!-- Begin Content -->
                <h1 class="page-header"><?php echo JText::_('JERROR_LAYOUT_PAGE_NOT_FOUND'); ?></h1>

                <p><strong><?php echo JText::_('JERROR_LAYOUT_ERROR_HAS_OCCURRED_WHILE_PROCESSING_YOUR_REQUEST'); ?></strong></p>
                <p><?php echo JText::_('JERROR_LAYOUT_NOT_ABLE_TO_VISIT'); ?></p>
                <ul>
                    <li><?php echo JText::_('JERROR_LAYOUT_AN_OUT_OF_DATE_BOOKMARK_FAVOURITE'); ?></li>
                    <li><?php echo JText::_('JERROR_LAYOUT_MIS_TYPED_ADDRESS'); ?></li>
                    <li><?php echo JText::_('JERROR_LAYOUT_SEARCH_ENGINE_OUT_OF_DATE_LISTING'); ?></li>
                    <li><?php echo JText::_('JERROR_LAYOUT_YOU_HAVE_NO_ACCESS_TO_THIS_PAGE'); ?></li>
                </ul>

                <p><?php echo JText::_('JERROR_LAYOUT_PLEASE_CONTACT_THE_SYSTEM_ADMINISTRATOR'); ?></p>
                <blockquote>
                    <span class="label label-inverse"><?php echo $this->error->getCode(); ?></span> <?php echo htmlspecialchars($this->error->getMessage(), \ENT_QUOTES, 'UTF-8'); ?>
                        <?php if ($this->debug) {
                            ?>
                            <br/><?php echo htmlspecialchars($this->error->getFile(), \ENT_QUOTES, 'UTF-8'); ?>:<?php echo $this->error->getLine(); ?>
                        <?php
                        } ?>
                </blockquote>

                <?php if ($this->debug) {
                    ?>
                        <div>
                            <?php echo $this->renderBacktrace(); ?>
                            <?php // Check if there are more Exceptions and render their data as well?>
                            <?php if ($this->error->getPrevious()) {
                                ?>
                                <?php $loop = true; ?>
                                <?php // Reference $this->_error here and in the loop as setError() assigns errors to this property and we need this for the backtrace to work correctly?>
                                <?php // Make the first assignment to setError() outside the loop so the loop does not skip Exceptions?>
                                <?php $this->setError($this->_error->getPrevious()); ?>
                                <?php while (true === $loop) {
                                    ?>
                                    <p><strong><?php echo JText::_('JERROR_LAYOUT_PREVIOUS_ERROR'); ?></strong></p>
                                    <p>
                                        <?php echo htmlspecialchars($this->_error->getMessage(), \ENT_QUOTES, 'UTF-8'); ?>
                                        <br/><?php echo htmlspecialchars($this->_error->getFile(), \ENT_QUOTES, 'UTF-8'); ?>:<?php echo $this->_error->getLine(); ?>
                                    </p>
                                    <?php echo $this->renderBacktrace(); ?>
                                    <?php $loop = $this->setError($this->_error->getPrevious()); ?>
                                <?php
                                } ?>
                                <?php // Reset the main error object to the base error?>
                                <?php $this->setError($this->error); ?>
                            <?php
                            } ?>
                        </div>
                    <?php
                } ?>

                <!-- End Content -->
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

  <jdoc:include type="modules" name="debug" style="none" />
</body>

</html>
