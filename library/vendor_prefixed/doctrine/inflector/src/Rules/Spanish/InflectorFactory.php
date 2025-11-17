<?php /* This file has been prefixed by <PHP-Prefixer> for "XT Tailwind CSS" */

declare(strict_types=1);

namespace XTP_BUILD\Doctrine\Inflector\Rules\Spanish;

use XTP_BUILD\Doctrine\Inflector\GenericLanguageInflectorFactory;
use XTP_BUILD\Doctrine\Inflector\Rules\Ruleset;

final class InflectorFactory extends GenericLanguageInflectorFactory
{
    protected function getSingularRuleset(): Ruleset
    {
        return Rules::getSingularRuleset();
    }

    protected function getPluralRuleset(): Ruleset
    {
        return Rules::getPluralRuleset();
    }
}
