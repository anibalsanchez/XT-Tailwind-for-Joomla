<?php /* This file has been prefixed by <PHP-Prefixer> for "XT Tailwind CSS" */

namespace XTP_BUILD\Carbon\Doctrine;

use XTP_BUILD\Carbon\Carbon;
use Doctrine\DBAL\Types\VarDateTimeType;

class DateTimeType extends VarDateTimeType implements CarbonDoctrineType
{
    /** @use CarbonTypeConverter<Carbon> */
    use CarbonTypeConverter;
}
