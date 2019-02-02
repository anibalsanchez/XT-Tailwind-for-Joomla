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

$liClass = $language->active ? 'lang-active' : '';

?>
<li class=<?php echo $liClass; ?>>
    <a href="<?php echo htmlspecialchars_decode(htmlspecialchars($language->link, ENT_QUOTES, 'UTF-8'), ENT_NOQUOTES); ?>">
    <?php if ($params->get('image', 1)) : ?>
        <?php if ($language->image) : ?>
            <?php echo JHtml::_('image', 'mod_languages/' . $language->image . '.gif', $language->title_native, array(
            'title' => $language->title_native,
            'class' => 'px-2 py-2',
            ), true); ?>
        <?php else : ?>
            <span class="label"><?php echo strtoupper($language->sef); ?></span>
        <?php endif; ?>
    <?php else : ?>
        <?php echo $params->get('full_name', 1) ? $language->title_native : strtoupper($language->sef); ?>
    <?php endif; ?>
    </a>
</li>