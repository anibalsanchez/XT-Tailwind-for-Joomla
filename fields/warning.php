<?php

/*
 * @package     XT Tailwind
 *
 * @author      Extly, CB. <team@extly.com>
 * @copyright   Copyright (c)2007-2018 Extly, CB. All rights reserved.
 * @license     https://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 *
 * @see         https://www.extly.com
 */

class JFormFieldWarning extends JFormField
{
    protected $type = 'Warning';

    protected function getInput()
    {
        $app = JFactory::getApplication();
        if ($app->isAdmin()) {
            $app->enqueueMessage(JText::_('GANTRY5_THEME_INSTALL_GANTRY'), 'error');
        } else {
            $app->enqueueMessage(JText::_('GANTRY5_THEME_FRONTEND_SETTINGS_DISABLED'), 'warning');
        }
    }
}
