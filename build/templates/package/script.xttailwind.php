<?php

/*
 * @package     XT Tailwind for Joomla
 * @author      Extly, CB. <team@extly.com>
 * @copyright   Copyright (c)2012-2024 Extly, CB. All rights reserved.
 * @license     https://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 * @see         https://www.extly.com
 */

/**
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

// no direct access
defined('_JEXEC') || die();

class Pkg_[EXTENSION_CLASS_NAME]InstallerScript
{
    /**
     * The name of our package, e.g. pkg_example. Used for dependency tracking.
     *
     * @var string
     */
    protected $packageName = 'pkg_[EXTENSION_ALIAS]';

    /**
     * The minimum PHP version required to install this extension.
     *
     * @var string
     */
    protected $minimumPHPVersion = '7.4.0';

    /**
     * The minimum Joomla! version required to install this extension.
     *
     * @var string
     */
    protected $minimumJoomlaVersion = '3.8.0';

    /**
     * The maximum Joomla! version this extension can be installed on.
     *
     * @var string
     */
    protected $maximumJoomlaVersion = '4.99.99';

    /**
     * A list of extensions (modules, plugins) to enable after installation. Each item has four values, in this order:
     * type (plugin, module, ...), name (of the extension), client (0=site, 1=admin), group (for plugins).
     *
     * @var array
     */
    protected $extensionsToEnable = [
        // ['plugin', 'xxx', 1, '[EXTENSION_ALIAS]'],
    ];

    /**
     * =================================================================================================================
     * DO NOT EDIT BELOW THIS LINE
     * =================================================================================================================.
     *
     * @param mixed $type
     * @param mixed $parent
     */

    /**
     * Joomla! pre-flight event. This runs before Joomla! installs or updates the package. This is our last chance to
     * tell Joomla! if it should abort the installation.
     *
     * In here we'll try to install FOF. We have to do that before installing the component since it's using an
     * installation script extending FOF's InstallScript class. We can't use a <file> tag in the manifest to install FOF
     * since the FOF installation is expected to fail if a newer version of FOF is already installed on the site.
     *
     * @param string                    $type   Installation type (install, update, discover_install)
     * @param \JInstallerAdapterPackage $parent Parent object
     *
     * @return bool True to let the installation proceed, false to halt the installation
     */
    public function preflight($type, $parent)
    {
        // Check the minimum PHP version
        if (!version_compare(PHP_VERSION, $this->minimumPHPVersion, 'ge')) {
            $msg = sprintf('<p>You need PHP %s or later to install this package</p>', $this->minimumPHPVersion);
            JLog::add($msg, JLog::WARNING, 'jerror');

            return false;
        }

        // Check the minimum Joomla! version
        if (!version_compare(JVERSION, $this->minimumJoomlaVersion, 'ge')) {
            $msg = sprintf('<p>You need Joomla! %s or later to install this component</p>', $this->minimumJoomlaVersion);
            JLog::add($msg, JLog::WARNING, 'jerror');

            return false;
        }

        // Check the maximum Joomla! version
        if (!version_compare(JVERSION, $this->maximumJoomlaVersion, 'le')) {
            $msg = sprintf('<p>You need Joomla! %s or earlier to install this component</p>', $this->maximumJoomlaVersion);
            JLog::add($msg, JLog::WARNING, 'jerror');

            return false;
        }

        // if (!JComponentHelper::getComponent('com_sobipro', true)->enabled)
        // {
        //     $msg = '<b>SobiPro is not installed or enabled</b>. It is required to connect XT Search and Algolia to provide the Instant Search service.';

        //     if (version_compare(JVERSION, '3.0', 'gt'))
        //     {
        //         JLog::add($msg, JLog::WARNING, 'jerror');
        //     }
        //     else
        //     {
        //         JFactory::getApplication()->enqueueMessage($msg, 'warning');
        //     }

        //     return false;
        // }

        return true;
    }

    /**
     * Runs after install, update or discover_update. In other words, it executes after Joomla! has finished installing
     * or updating your component. This is the last chance you've got to perform any additional installations, clean-up,
     * database updates and similar housekeeping functions.
     *
     * @param string                      $type   install, update or discover_update
     * @param \JInstallerAdapterComponent $parent Parent object
     */
    public function postflight($type, $parent)
    {
        /**
         * Clean the cache after installing the package.
         *
         * See bug report https://github.com/joomla/joomla-cms/issues/16147
         */
        $conf = \JFactory::getConfig();
        $clearGroups = ['_system', 'com_modules', 'mod_menu', 'com_plugins', 'com_modules'];
        $cacheClients = [0, 1];

        foreach ($clearGroups as $clearGroup) {
            foreach ($cacheClients as $cacheClient) {
                try {
                    $options = [
                        'defaultgroup' => $clearGroup,
                        'cachebase' => ($cacheClient !== 0) ? JPATH_ADMINISTRATOR.'/cache' : $conf->get('cache_path', JPATH_SITE.'/cache'),
                    ];

                    /** @var JCache $cache */
                    $cache = \JCache::getInstance('callback', $options);
                    $cache->clean();
                } catch (Exception $exception) {
                    $options['result'] = false;
                }

                // Trigger the onContentCleanCache event.
                try {
                    JFactory::getApplication()->triggerEvent('onContentCleanCache', $options);
                } catch (Exception $e) {
                    // Suck it up
                }
            }
        }
    }

    /**
     * Tuns on installation (but not on upgrade). This happens in install and discover_install installation routes.
     *
     * @param \JInstallerAdapterPackage $parent Parent object
     *
     * @return bool
     */
    public function install($parent)
    {
        // Enable the extensions we need to install
        $this->enableExtensions();

        return true;
    }

    /**
     * Runs on uninstallation.
     *
     * @param \JInstallerAdapterPackage $parent Parent object
     *
     * @return bool
     */
    public function uninstall($parent)
    {
        return true;
    }

    /**
     * Enable modules and plugins after installing them.
     */
    private function enableExtensions()
    {
        $db = JFactory::getDbo();

        foreach ($this->extensionsToEnable as $extensionToEnable) {
            $this->enableExtension($extensionToEnable[0], $extensionToEnable[1], $extensionToEnable[2], $extensionToEnable[3]);
        }
    }

    /**
     * Enable an extension.
     *
     * @param string $type   the extension type
     * @param string $name   the name of the extension (the element field)
     * @param int    $client the application id (0: Joomla CMS site; 1: Joomla CMS administrator)
     * @param string $group  the extension group (for plugins)
     */
    private function enableExtension($type, $name, $client = 1, $group = null)
    {
        $db = JFactory::getDbo();

        $query = $db->getQuery(true)
            ->update('#__extensions')
            ->set($db->qn('enabled').' = '.$db->q(1))
            ->where('type = '.$db->quote($type))
            ->where('element = '.$db->quote($name));

        switch ($type) {
            case 'plugin':
                // Plugins have a folder but not a client
                $query->where('folder = '.$db->quote($group));

                break;
            case 'language':
            case 'module':
            case 'template':
                // Languages, modules and templates have a client but not a folder
                $client = JApplicationHelper::getClientInfo($client, true);
                $query->where('client_id = '.(int) $client->id);

                break;
            default:
            case 'library':
            case 'package':
            case 'component':
                // Components, packages and libraries don't have a folder or client.
                // Included for completeness.
                break;
        }

        $db->setQuery($query);

        try {
            $db->execute();
        } catch (\Exception $exception) {
        }
    }
}
