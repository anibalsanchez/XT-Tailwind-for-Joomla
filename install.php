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

defined('_JEXEC') or die;

class XT_TailwindInstallerScript
{
    public $requiredGantryVersion = '5.4.0';

    /**
     * @param string $type
     * @param object $parent
     *
     * @throws Exception
     *
     * @return bool
     */
    public function preflight($type, $parent)
    {
        if ('uninstall' === $type) {
            return true;
        }

        $manifest = $parent->getManifest();
        $name = JText::_($manifest->name);

        // Prevent installation if Gantry 5 isn't enabled or is too old for this template.
        try {
            if (!class_exists('Gantry5\Loader')) {
                throw new RuntimeException(sprintf('Please install Gantry 5 Framework before installing %s template!', $name));
            }

            Gantry5\Loader::setup();

            $gantry = Gantry\Framework\Gantry::instance();

            if (!method_exists($gantry, 'isCompatible') || !$gantry->isCompatible($this->requiredGantryVersion)) {
                throw new \RuntimeException(sprintf('Please upgrade Gantry 5 Framework to v%s (or later) before installing %s template!', strtoupper($this->requiredGantryVersion), $name));
            }
        } catch (Exception $e) {
            $app = JFactory::getApplication();
            $app->enqueueMessage(JText::sprintf($e->getMessage()), 'error');

            return false;
        }

        return true;
    }

    /**
     * @param string $type
     * @param object $parent
     *
     * @throws Exception
     */
    public function postflight($type, $parent)
    {
        $installer = new Gantry\Framework\ThemeInstaller($parent);
        $installer->initialize();

        // Install sample data on first install.
        if (in_array($type, ['install', 'discover_install'], true)) {
            try {
                $installer->installDefaults();

                echo $installer->render('install.html.twig');
            } catch (Exception $e) {
                $app = JFactory::getApplication();
                $app->enqueueMessage(JText::sprintf($e->getMessage()), 'error');
            }
        } else {
            echo $installer->render('update.html.twig');
        }

        $installer->finalize();
    }

    /**
     * Called by TemplateInstaller to customize post-installation.
     *
     * @param \Gantry\Framework\ThemeInstaller $installer
     */
    public function installDefaults(Gantry\Framework\ThemeInstaller $installer)
    {
        // Create default outlines etc.
        $installer->createDefaults();
    }

    /**
     * Called by TemplateInstaller to customize sample data creation.
     *
     * @param \Gantry\Framework\ThemeInstaller $installer
     */
    public function installSampleData(Gantry\Framework\ThemeInstaller $installer)
    {
        // Create sample data.
        $installer->createSampleData();
    }
}
