<?php
/* This file has been prefixed by <PHP-Prefixer> for "XT Tailwind CSS" */

/*
 * @package     Extly Infrastructure Support
 *
 * @author      Extly, CB. <team@extly.com>
 * @copyright   Copyright (c)2012-2022 Extly, CB. All rights reserved.
 * @license     https://www.opensource.org/licenses/mit-license.html  MIT License
 *
 * @see         https://www.extly.com
 */

namespace XTP_BUILD\Extly\Infrastructure\Support\HtmlAsset\Asset;

use XTP_BUILD\Illuminate\Support\Collection;

interface HtmlAssetTagInterface
{
    public function getPosition(): string;

    public function getPriority(): int;

    public function getTag(): string;

    public function getInnerHtml(): string;

    public function getAttributes(): Collection;

    public function getNoScriptContentTag();
}
