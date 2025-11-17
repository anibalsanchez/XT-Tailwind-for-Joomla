<?php
/* This file has been prefixed by <PHP-Prefixer> for "XT Tailwind CSS" */

/*
 * @package     Extly Infrastructure Support
 *
 * @author      Extly, CB. <team@extly.com>
 * @copyright   Copyright (c)2012-2025 Extly, CB. All rights reserved.
 * @license     https://www.opensource.org/licenses/mit-license.html  MIT License
 *
 * @see         https://www.extly.com
 */

namespace XTP_BUILD\Extly\Infrastructure\Service\Cms\Contracts;

use XTP_BUILD\MyCLabs\Enum\Enum;

interface CmsServiceInterface
{
    public function boot(\ArrayAccess $arrayAccess);

    public function getName();

    public function getConnectionHost();

    public function getConnectionDatabase();

    public function getConnectionUsername();

    public function getConnectionPassword();

    public function getConnectionPrefix();

    public function translate($value, $default = null);

    public function translateOrTitleize($value, $default = null);

    public function getSetting($key, $default = null);

    // public function getContentManager(Enum $contentType);

    public function getUser($id = null);

    public function getRouter();

    public function getSitename();

    public function getTemporaryFolderPath();

    public function getTemporaryFilename($filename, $ext);

    public function isTemporaryFile($file);

    public function releaseTemporaryFile($file);

    public function getRootFolderPath();

    public function getCacheFolderPath();

    public function getLogFolderPath();

    public function isLocalUrl($url);

    public function convertLocalUrlToFile($url);

    public function getPageLimit();

    public function getWebserviceSecretKey();

    public function getApiToken();

    public function translateLogLevel($cmsLogLevel);

    public function getTimezone();

    public function isMultilingualSite();

    public function getSefCodes();

    public function isAdmin();

    public function getRootUri();

    public function isMultisite();

    public function getMultisiteCodes();

    public function getCurrentMultisiteCode();
}
