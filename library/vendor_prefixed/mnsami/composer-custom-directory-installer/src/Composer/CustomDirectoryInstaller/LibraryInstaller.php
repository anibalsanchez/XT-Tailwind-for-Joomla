<?php /* This file has been prefixed by <PHP-Prefixer> for "XT Tailwind CSS" */

namespace XTP_BUILD\Composer\CustomDirectoryInstaller;

use XTP_BUILD\Composer\Composer;
use XTP_BUILD\Composer\Package\PackageInterface;
use XTP_BUILD\Composer\Installer\LibraryInstaller as BaseLibraryInstaller;

class LibraryInstaller extends BaseLibraryInstaller
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
