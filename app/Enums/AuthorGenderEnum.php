<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
// php artisan make:enum UserRole

final class AuthorGenderEnum extends Enum
{
    public const male = 0;
    public const female = 1;
}
