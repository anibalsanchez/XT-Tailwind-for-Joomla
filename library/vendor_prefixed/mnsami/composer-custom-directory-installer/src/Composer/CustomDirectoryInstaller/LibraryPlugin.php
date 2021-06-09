<?php /* This file has been prefixed by <PHP-Prefixer> for "XT Tailwind CSS" */

namespace XTP_BUILD\Composer\CustomDirectoryInstaller;

use XTP_BUILD\Composer\Composer;
use XTP_BUILD\Composer\IO\IOInterface;
use XTP_BUILD\Composer\Plugin\PluginInterface;

class LibraryPlugin implements PluginInterface
{
  private $installer;

  public function activate (Composer $composer, IOInterface $io)
  {
    $this->installer = new LibraryInstaller($io, $composer);
    $composer->getInstallationManager()->addInstaller($this->installer);
  }

  public function deactivate(Composer $composer, IOInterface $io)
  {
    $composer->getInstallationManager()->removeInstaller($this->installer);
  }

  public function uninstall(Composer $composer, IOInterface $io)
  {
  }
}
