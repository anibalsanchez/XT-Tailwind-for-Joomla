<?php /* This file has been prefixed by <PHP-Prefixer> for "XT Tailwind CSS" */

declare(strict_types=1);

namespace XTP_BUILD\Doctrine\Inflector\Rules\Esperanto;

use XTP_BUILD\Doctrine\Inflector\Rules\Pattern;
use XTP_BUILD\Doctrine\Inflector\Rules\Substitution;
use XTP_BUILD\Doctrine\Inflector\Rules\Transformation;
use XTP_BUILD\Doctrine\Inflector\Rules\Word;

class Inflectible
{
    /** @return Transformation[] */
    public static function getSingular(): iterable
    {
        yield new Transformation(new Pattern('oj$'), 'o');
    }

    /** @return Transformation[] */
    public static function getPlural(): iterable
    {
        yield new Transformation(new Pattern('o$'), 'oj');
    }

    /** @return Substitution[] */
    public static function getIrregular(): iterable
    {
        yield new Substitution(new Word(''), new Word(''));
    }
}
