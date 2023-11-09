<?php

namespace Darling\PHPWebPaths\interfaces\paths\parts\url;

use Darling\PHPWebPaths\interfaces\paths\parts\url\Host;
use Darling\PHPWebPaths\interfaces\paths\parts\url\Port;
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

    public function port(): ?Port;

    public function __toString(): string;

}

