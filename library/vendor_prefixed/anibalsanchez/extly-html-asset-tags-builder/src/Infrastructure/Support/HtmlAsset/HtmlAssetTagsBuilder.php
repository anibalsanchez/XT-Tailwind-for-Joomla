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
use XTP_BUILD\Extly\Infrastructure\Support\HtmlAsset\HTML\Element;
use XTP_BUILD\Illuminate\Support\Collection;

final class HtmlAssetTagsBuilder
{
    private $repository;

    public function __construct(Repository $htmlAssetRepository = null)
    {
        if (!$htmlAssetRepository instanceof \XTP_BUILD\Extly\Infrastructure\Support\HtmlAsset\Repository) {
            $this->repository = Repository::getInstance();

            return;
        }

        $this->repository = $htmlAssetRepository;
    }

    public function generate($positionName)
    {
        $noScriptContentTags = new Collection();
        $assetTags = $this->repository->getAssetTagsByPosition($positionName);

        if (Repository::GLOBAL_POSITION_HEAD === $positionName) {
            $noScriptContentTags = $this->repository->getNoScriptContentTags();
        }

        $renderedAssetTags = $this->build($assetTags);

        if ($noScriptContentTags->isEmpty()) {
            return $renderedAssetTags;
        }

        $renderedNoScriptContentTags = $this->buildNoScriptTags($noScriptContentTags);

        return $renderedAssetTags.$renderedNoScriptContentTags;
    }

    public function buildTag(HtmlAssetTagInterface $htmlAssetTag): string
    {
        return (string) (new Element(
            $htmlAssetTag->getTag(),
            $htmlAssetTag->getInnerHTML(),
            $htmlAssetTag->getAttributes()
                ->forget(Repository::HTML_POSITION)
                ->forget(Repository::HTML_PRIORITY)
                ->toArray()
        ));
    }

    public function buildNoScriptTag(HtmlAssetTagInterface $htmlAssetTag): string
    {
        $renderedNoScriptContentTag = $this->buildTag($htmlAssetTag);

        return (string) (new Element(
            'noscript',
            $renderedNoScriptContentTag
        ));
    }

    private function build(Collection $assetTags): string
    {
        $buffer = $assetTags->map(fn(HtmlAssetTagInterface $htmlAssetTag) => $this->buildTag($htmlAssetTag));

        return implode('', $buffer->toArray());
    }

    private function buildNoScriptTags(Collection $assetTags)
    {
        $buffer = $assetTags->map(fn(HtmlAssetTagInterface $htmlAssetTag) => $this->buildNoScriptTag($htmlAssetTag));

        return implode('', $buffer->toArray());
    }
}
