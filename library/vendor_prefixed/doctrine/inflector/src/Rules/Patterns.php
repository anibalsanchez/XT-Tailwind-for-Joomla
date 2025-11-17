<?php /* This file has been prefixed by <PHP-Prefixer> for "XT Tailwind CSS" */

declare(strict_types=1);

namespace XTP_BUILD\Doctrine\Inflector\Rules;

use function array_map;
use function implode;
use function preg_match;

class Patterns
{
    /** @var string */
    private $regex;

    public function __construct(Pattern ...$patterns)
    {
        $patterns = array_map(static function (Pattern $pattern): string {
            return $pattern->getPattern();
        }, $patterns);

        $this->regex = '/^(?:' . implode('|', $patterns) . ')$/i';
    }

    public function matches(string $word): bool
    {
        return preg_match($this->regex, $word, $regs) === 1;
    }
}
