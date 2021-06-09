<?php
/* This file has been prefixed by <PHP-Prefixer> for "XT Tailwind CSS" */

/*
 * @package     Extly Infrastructure Support
 *
 * @author      Extly, CB. <team@extly.com>
 * @copyright   Copyright (c)2012-2020 Extly, CB. All rights reserved.
 * @license     http://www.opensource.org/licenses/mit-license.html  MIT License
 *
 * @see         https://www.extly.com
 */

namespace XTP_BUILD\Extly\Infrastructure\Support\HtmlAsset;

use XTP_BUILD\Extly\Infrastructure\Creator\CreatorTrait;
use XTP_BUILD\Extly\Infrastructure\Creator\SingletonTrait;
use XTP_BUILD\Extly\Infrastructure\Support\HtmlAsset\Asset\HtmlAssetTagInterface;

final class Repository
{
    use CreatorTrait;
    use SingletonTrait;

    const HTML_POSITION = 'position';
    const HTML_PRIORITY = 'priority';

    const GLOBAL_POSITION_HEAD = 'head';
    const GLOBAL_POSITION_BODY = 'bottom';

    private $assetTagCollection;

    public function __construct()
    {
        $this->assetCollection = AssetCollection::make();
    }

    public function push(HtmlAssetTagInterface $htmlAsset)
    {
        $this->assetCollection->push($htmlAsset);

        return $this;
    }

    public function getAssetTagsByPosition($positionName)
    {
        return $this->assetCollection
            ->filter(function (HtmlAssetTagInterface $item) use ($positionName) {
                return $item->getPosition() === $positionName;
            })
            ->sortBy(function (HtmlAssetTagInterface $item) {
                return $item->getPriority();
            });
    }

    public function getNoScriptContentTags()
    {
        return $this->assetCollection->map(function (HtmlAssetTagInterface $item) {
            return $item->getNoScriptContentTag();
        })->filter();
    }
}
