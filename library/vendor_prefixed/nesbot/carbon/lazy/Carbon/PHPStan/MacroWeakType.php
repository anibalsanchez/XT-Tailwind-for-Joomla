<?php
/* This file has been prefixed by <PHP-Prefixer> for "XT Tailwind CSS" */

declare(strict_types=1);

/**
 * This file is part of the Carbon package.
 *
 * (c) Brian Nesbitt <brian@nesbot.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace XTP_BUILD\Carbon\PHPStan;

if (!class_exists(LazyMacro::class, false)) {
    abstract class LazyMacro extends AbstractReflectionMacro
    {
        /**
         * {@inheritdoc}
         *
         * @return string|false
         */
        public function getFileName()
        {
            $file = $this->reflectionFunction->getFileName();

            return (($file ? realpath($file) : null) ?: $file) ?: null;
        }

        /**
         * {@inheritdoc}
         *
         * @return int|false
         */
        public function getStartLine()
        {
            return $this->reflectionFunction->getStartLine();
        }

        /**
         * {@inheritdoc}
         *
         * @return int|false
         */
        public function getEndLine()
        {
            return $this->reflectionFunction->getEndLine();
        }
    }
}
