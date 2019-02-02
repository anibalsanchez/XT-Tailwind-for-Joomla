<?php

/*
 * @package     XT Tailwind for Joomla
 *
 * @author      Extly, CB. <team@extly.com>
 * @copyright   Copyright (c)2007-2019 Extly, CB. All rights reserved.
 * @license     https://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 *
 * @see         https://www.extly.com
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory as CMSFactory;
use Joomla\CMS\Uri\Uri as CMSUri;

?>
<?php if ($headerText) : ?>
	<div class="pretext"><p><?php echo $headerText; ?></p></div>
<?php endif; ?>

<ul class="flex items-center mt-0 ml-6 pl-6 list-reset <?php echo $moduleclass_sfx; ?>" dir="<?php echo CMSFactory::getLanguage()->isRtl() ? 'rtl' : 'ltr'; ?>">
<?php
  foreach ($list as $language) {
    require 'link.php';
  }
?>
</ul>

<?php if ($footerText) : ?>
	<div class="posttext"><p><?php echo $footerText; ?></p></div>
<?php endif; ?>
