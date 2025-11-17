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

interface PluginInterface
{
    public function triggerAfterCreation($item);

    public function triggerReadPolling($afterDate);

    public function triggerAfterUpdate($item);

    public function triggerAfterRemoval($item);

    public function loadUnit(PlugableInterface $plugable);

    public function getExtendedData(PlugableInterface $plugable);

    public function getFieldValue($refId, $fieldName);

    public function getNamedObject($objectName, $id);

    public function onAfterSave($method, $context, $content, $isNew);
}
