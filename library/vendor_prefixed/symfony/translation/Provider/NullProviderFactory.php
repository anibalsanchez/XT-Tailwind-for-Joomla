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

namespace XTP_BUILD\Symfony\Component\Translation\Provider;

use XTP_BUILD\Symfony\Component\Translation\Exception\UnsupportedSchemeException;

/**
 * @author Mathieu Santostefano <msantostefano@protonmail.com>
 */
final class NullProviderFactory extends AbstractProviderFactory
{
    public function create(Dsn $dsn): ProviderInterface
    {
        if ('null' === $dsn->getScheme()) {
            return new NullProvider();
        }

        throw new UnsupportedSchemeException($dsn, 'null', $this->getSupportedSchemes());
    }

    protected function getSupportedSchemes(): array
    {
        return ['null'];
    }
}
