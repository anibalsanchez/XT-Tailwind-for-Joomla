<?php /* This file has been prefixed by <PHP-Prefixer> for "XT Tailwind CSS" */

namespace XTP_BUILD\Composer\CustomDirectoryInstaller;

use XTP_BUILD\Composer\Composer;
use XTP_BUILD\Composer\IO\IOInterface;
use XTP_BUILD\Composer\Plugin\PluginInterface;

class PearPlugin implements PluginInterface
{
  public function activate (Composer $composer, IOInterface $io)
  {
    if (!class_exists('XTP_BUILD\Composer\Composer\Installer\PearInstaller')) {
      return;
    }
    $installer = new PearInstaller($io, $composer);
    $composer->getInstallationManager()->addInstaller($installer);
  }

  public function deactivate(Composer $composer, IOInterface $io)
  {
  }

  public function uninstall(Composer $composer, IOInterface $io)
  {
  }
}
