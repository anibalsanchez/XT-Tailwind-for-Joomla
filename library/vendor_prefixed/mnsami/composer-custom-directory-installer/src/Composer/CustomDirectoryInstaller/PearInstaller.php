<?php /* This file has been prefixed by <PHP-Prefixer> for "XT Tailwind CSS" */

namespace XTP_BUILD\Composer\CustomDirectoryInstaller;

use XTP_BUILD\Composer\Package\PackageInterface;
use XTP_BUILD\Composer\Installer\PearInstaller as BasePearInstaller;

class PearInstaller extends BasePearInstaller
{
  public function getInstallPath(PackageInterface $package)
  {
    $path = PackageUtils::getPackageInstallPath($package, $this->composer);

    if(!empty($path)) {
        return $path;
    }

    /*
     * In case, the user didn't provide a custom path
     * use the default one, by calling the parent::getInstallPath function
     */
    return parent::getInstallPath($package);
  }
}
