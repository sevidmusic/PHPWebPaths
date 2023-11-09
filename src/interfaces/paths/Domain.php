<?php

namespace Darling\PHPWebPaths\interfaces\paths;

use \Darling\PHPWebPaths\enumerations\paths\parts\url\Scheme;
use \Darling\PHPWebPaths\interfaces\paths\parts\url\Authority;
use \Stringable;

/**
 * Description of this interface.
 *
 * @example
 *
 * ```
 *
 * ```
 */
interface Domain extends Stringable
{

    public function __toString(): string;

    public function scheme(): Scheme;

    public function authority(): Authority;

}

