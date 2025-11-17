<?php /* This file has been prefixed by <PHP-Prefixer> for "XT Tailwind CSS" */

declare(strict_types=1);

namespace XTP_BUILD\Doctrine\Inflector\Rules\Italian;

use XTP_BUILD\Doctrine\Inflector\Rules\Pattern;

final class Uninflected
{
    /** @return iterable<Pattern> */
    public static function getSingular(): iterable
    {
        yield from self::getDefault();
    }

    /** @return iterable<Pattern> */
    public static function getPlural(): iterable
    {
        yield from self::getDefault();
    }

    /** @return iterable<Pattern> */
    private static function getDefault(): iterable
    {
        // Invariable words (same form in singular and plural)
        $invariables = [
            'alpaca',
            'auto',
            'bar',
            'blu',
            'boia',
            'boomerang',
            'brindisi',
            'campus',
            'computer',
            'crisi',
            'crocevia',
            'dopocena',
            'film',
            'foto',
            'fuchsia',
            'gnu',
            'gorilla',
            'gru',
            'iguana',
            'kamikaze',
            'karaoke',
            'koala',
            'lama',
            'menu',
            'metropoli',
            'moto',
            'opossum',
            'panda',
            'quiz',
            'radio',
            're',
            'scacciapensieri',
            'serie',
            'smartphone',
            'sosia',
            'sottoscala',
            'specie',
            'sport',
            'tablet',
            'taxi',
            'vaglia',
            'virtù',
            'virus',
            'yogurt',
            'foto',
            'fuchsia',
        ];

        foreach ($invariables as $word) {
            yield new Pattern($word);
        }
    }
}
