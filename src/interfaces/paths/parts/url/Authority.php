<?php

namespace Darling\PHPWebPaths\interfaces\paths\parts\url;

use Darling\PHPWebPaths\interfaces\paths\parts\url\Host;
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
interface Authority extends Stringable
{

    public function host(): Host;

    public function __toString(): string;

}

