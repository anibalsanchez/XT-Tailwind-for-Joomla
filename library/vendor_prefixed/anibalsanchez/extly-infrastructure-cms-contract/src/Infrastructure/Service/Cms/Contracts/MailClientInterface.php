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

interface MailClientInterface
{
    public function setSubject($subject);

    public function setFrom($from);

    public function setTo($to);

    public function setBody($body);

    public function send();

    public function getNotificationsTo();

    public function getNotificationsFrom();
}
