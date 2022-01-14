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

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;

$item = $displayData['data'];
$display = $item->text;
$app = Factory::getApplication();
$icon = null;
$pageLinkClass = null;

defined('ICON_ANGLE_DOUBLE_RIGHT') || define('ICON_ANGLE_DOUBLE_RIGHT', '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="m224.3 273-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34zm192-34-136-136c-9.4-9.4-24.6-9.4-33.9 0l-22.6 22.6c-9.4 9.4-9.4 24.6 0 33.9l96.4 96.4-96.4 96.4c-9.4 9.4-9.4 24.6 0 33.9l22.6 22.6c9.4 9.4 24.6 9.4 33.9 0l136-136c9.4-9.2 9.4-24.4 0-33.8z"/></svg>');
defined('ICON_ANGLE_DOUBLE_LEFT') || define('ICON_ANGLE_DOUBLE_LEFT', '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="m223.7 239 136-136c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9L319.9 256l96.4 96.4c9.4 9.4 9.4 24.6 0 33.9L393.7 409c-9.4 9.4-24.6 9.4-33.9 0l-136-136c-9.5-9.4-9.5-24.6-.1-34zm-192 34 136 136c9.4 9.4 24.6 9.4 33.9 0l22.6-22.6c9.4-9.4 9.4-24.6 0-33.9L127.9 256l96.4-96.4c9.4-9.4 9.4-24.6 0-33.9L201.7 103c-9.4-9.4-24.6-9.4-33.9 0l-136 136c-9.5 9.4-9.5 24.6-.1 34z"/></svg>');
defined('ICON_ANGLE_RIGHT') || define('ICON_ANGLE_RIGHT', '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512"><path d="m224.3 273-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34z"/></svg>');
defined('ICON_ANGLE_LEFT') || define('ICON_ANGLE_LEFT', '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512"><path d="m31.7 239 136-136c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9L127.9 256l96.4 96.4c9.4 9.4 9.4 24.6 0 33.9L201.7 409c-9.4 9.4-24.6 9.4-33.9 0l-136-136c-9.5-9.4-9.5-24.6-.1-34z"/></svg>');

switch ((string) $item->text) {
    // Check for "Start" item
    case Text::_('JLIB_HTML_START') :
        $pageLinkClass = 'page-item-start';
        $icon = $app->getLanguage()->isRtl() ? 'icon-angle-double-right' : 'icon-angle-double-left';
        $iconSvg = $app->getLanguage()->isRtl() ? ICON_ANGLE_DOUBLE_RIGHT : ICON_ANGLE_DOUBLE_LEFT;
        $aria = Text::sprintf('JLIB_HTML_GOTO_POSITION', strtolower($item->text));
        break;

    // Check for "Prev" item
    case $item->text === Text::_('JPREV') :
        $pageLinkClass = 'page-item-prev';
        $item->text = Text::_('JPREVIOUS');
        $icon = $app->getLanguage()->isRtl() ? 'icon-angle-right' : 'icon-angle-left';
        $iconSvg = $app->getLanguage()->isRtl() ? ICON_ANGLE_RIGHT : ICON_ANGLE_LEFT;
        $aria = Text::sprintf('JLIB_HTML_GOTO_POSITION', strtolower($item->text));
        break;

    // Check for "Next" item
    case Text::_('JNEXT') :
        $pageLinkClass = 'page-item-next';
        $icon = $app->getLanguage()->isRtl() ? 'icon-angle-left' : 'icon-angle-right';
        $iconSvg = $app->getLanguage()->isRtl() ? ICON_ANGLE_LEFT : ICON_ANGLE_RIGHT;
        $aria = Text::sprintf('JLIB_HTML_GOTO_POSITION', strtolower($item->text));
        break;

    // Check for "End" item
    case Text::_('JLIB_HTML_END') :
        $pageLinkClass = 'page-item-end';
        $icon = $app->getLanguage()->isRtl() ? 'icon-angle-double-left' : 'icon-angle-double-right';
        $iconSvg = $app->getLanguage()->isRtl() ? ICON_ANGLE_DOUBLE_LEFT : ICON_ANGLE_DOUBLE_RIGHT;
        $aria = Text::sprintf('JLIB_HTML_GOTO_POSITION', strtolower($item->text));
        break;

    default:
        $pageLinkClass = 'page-item-goto-page';
        $aria = Text::sprintf('JLIB_HTML_GOTO_PAGE', strtolower($item->text));
        break;
}

if (null !== $icon) {
    $display = '<span class="'.$icon.'" aria-hidden="true">'.$iconSvg.'</span>';
}

if ($displayData['active']) {
    if ($item->base > 0) {
        $limit = 'limitstart.value='.$item->base;
    } else {
        $limit = 'limitstart.value=0';
    }

    $class = 'active';

    if ($app->isClient('administrator')) {
        $link = 'href="#" onclick="document.adminForm.'.$item->prefix.$limit.'; Joomla.submitform();return false;"';
    } elseif ($app->isClient('site')) {
        $link = 'href="'.$item->link.'"';
    }
} else {
    $class = (property_exists($item, 'active') && $item->active) ? 'active' : 'disabled';
}

?>
<?php if ($displayData['active']) { ?>
	<li class="page-item <?php echo $pageLinkClass; ?>">
		<a aria-label="<?php echo $aria; ?>" <?php echo $link; ?> class="page-link">
			<?php echo $display; ?>
		</a>
	</li>
<?php } elseif (isset($item->active) && $item->active) { ?>
	<?php $aria = Text::sprintf('JLIB_HTML_PAGE_CURRENT', strtolower($item->text)); ?>
	<li class="<?php echo $class; ?> page-item <?php echo $pageLinkClass; ?>">
		<span aria-current="true" aria-label="<?php echo $aria; ?>" class="page-link"><?php echo $display; ?></span>
	</li>
<?php } else { ?>
	<li class="<?php echo $class; ?> page-item <?php echo $pageLinkClass; ?>">
		<span class="page-link" aria-hidden="true"><?php echo $display; ?></span>
	</li>
<?php } ?>
