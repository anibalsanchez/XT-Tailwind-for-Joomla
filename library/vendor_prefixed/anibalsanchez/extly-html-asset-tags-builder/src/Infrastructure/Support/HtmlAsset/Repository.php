<?php
/* This file has been prefixed by <PHP-Prefixer> for "XT Tailwind CSS" */

/*
 * @package     Extly Infrastructure Support
 *
 * @author      Extly, CB. <team@extly.com>
 * @copyright   Copyright (c)2012-2024 Extly, CB. All rights reserved.
 * @license     https://www.opensource.org/licenses/mit-license.html  MIT License
 *
 * @see         https://www.extly.com
 */

namespace XTP_BUILD\Extly\Infrastructure\Support\HtmlAsset;

use XTP_BUILD\Extly\Infrastructure\Support\HtmlAsset\Asset\HtmlAssetTagInterface;
use XTP_BUILD\Illuminate\Support\Collection;

final class Repository
{
    public const HTML_POSITION = 'position';

    public const HTML_PRIORITY = 'priority';

    public const GLOBAL_POSITION_HEAD = 'head';

    public const GLOBAL_POSITION_BODY = 'bottom';

    private $assetTagCollection;

    private static $repositoryInstance;

    public function __construct()
    {
        $this->assetTagCollection = Collection::make();
    }

    public static function getInstance()
    {
        if (self::$repositoryInstance) {
            return self::$repositoryInstance;
        }

        self::$repositoryInstance = new self();

        return self::$repositoryInstance;
    }

    public function push(HtmlAssetTagInterface $htmlAssetTag)
    {
        $this->assetTagCollection->push($htmlAssetTag);

        return $this;
    }

    public function getAssetTagsByPosition($positionName)
    {
        return $this->assetTagCollection
            ->filter(fn(HtmlAssetTagInterface $htmlAssetTag) => $htmlAssetTag->getPosition() === $positionName)
            ->sortBy(fn(HtmlAssetTagInterface $htmlAssetTag) => $htmlAssetTag->getPriority());
    }

    public function getNoScriptContentTags()
    {
        return $this->assetTagCollection->map(fn(HtmlAssetTagInterface $htmlAssetTag) => $htmlAssetTag->getNoScriptContentTag())->filter();
    }
}
