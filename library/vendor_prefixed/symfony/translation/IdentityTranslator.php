<?php
/* This file has been prefixed by <PHP-Prefixer> for "XT Tailwind CSS" */

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace XTP_BUILD\Symfony\Component\Translation;

use XTP_BUILD\Symfony\Contracts\Translation\LocaleAwareInterface;
use XTP_BUILD\Symfony\Contracts\Translation\TranslatorInterface;
use XTP_BUILD\Symfony\Contracts\Translation\TranslatorTrait;

/**
 * IdentityTranslator does not translate anything.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class IdentityTranslator implements TranslatorInterface, LocaleAwareInterface
{
    use TranslatorTrait;
}
