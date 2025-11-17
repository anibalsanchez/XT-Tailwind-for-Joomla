<?php /* This file has been prefixed by <PHP-Prefixer> for "XT Tailwind CSS" */

declare(strict_types=1);

namespace XTP_BUILD\Doctrine\Inflector;

use XTP_BUILD\Doctrine\Inflector\Rules\English;
use XTP_BUILD\Doctrine\Inflector\Rules\Esperanto;
use XTP_BUILD\Doctrine\Inflector\Rules\French;
use XTP_BUILD\Doctrine\Inflector\Rules\Italian;
use XTP_BUILD\Doctrine\Inflector\Rules\NorwegianBokmal;
use XTP_BUILD\Doctrine\Inflector\Rules\Portuguese;
use XTP_BUILD\Doctrine\Inflector\Rules\Spanish;
use XTP_BUILD\Doctrine\Inflector\Rules\Turkish;
use InvalidArgumentException;

use function sprintf;

final class InflectorFactory
{
    public static function create(): LanguageInflectorFactory
    {
        return self::createForLanguage(Language::ENGLISH);
    }

    public static function createForLanguage(string $language): LanguageInflectorFactory
    {
        switch ($language) {
            case Language::ENGLISH:
                return new English\InflectorFactory();

            case Language::ESPERANTO:
                return new Esperanto\InflectorFactory();

            case Language::FRENCH:
                return new French\InflectorFactory();

            case Language::ITALIAN:
                return new Italian\InflectorFactory();

            case Language::NORWEGIAN_BOKMAL:
                return new NorwegianBokmal\InflectorFactory();

            case Language::PORTUGUESE:
                return new Portuguese\InflectorFactory();

            case Language::SPANISH:
                return new Spanish\InflectorFactory();

            case Language::TURKISH:
                return new Turkish\InflectorFactory();

            default:
                throw new InvalidArgumentException(sprintf(
                    'Language "%s" is not supported.',
                    $language
                ));
        }
    }
}
