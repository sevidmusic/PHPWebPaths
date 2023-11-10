<?php

namespace Darling\PHPWebPaths\interfaces\paths;

use \Darling\PHPWebPaths\interfaces\paths\Domain;
use \Darling\PHPWebPaths\interfaces\paths\parts\url\Fragment;
use \Darling\PHPWebPaths\interfaces\paths\parts\url\Path;
use \Darling\PHPWebPaths\interfaces\paths\parts\url\Query;
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
interface Url extends Stringable
{

    public function domain(): Domain;

    public function path(): ?Path;

    public function query(): ?Query;

    public function fragment(): ?Fragment;

    public function __toString(): string;
}

