<?php

namespace Darling\PHPWebPaths\interfaces\paths\parts\url;

use \Darling\PHPTextTypes\interfaces\strings\Name;
use \Stringable;

/**
 * A TopLevelDomainName is part of a Url.
 *
 * A TopLevelDomainName must begin with a lowercase alphanumeric
 * character, and may consist of lowercase alphanumeric characters
 * (a-z) and (0-9), hyphens (-), and periods (.).
 *
 * For example:
 *
 *     https://sub.example.com:8080/path?query#fragment
 *                         \_/
 *                          |
 *                         Top
 *                        Level
 *                        Domain
 *                         Name
 *
 *
 */
interface TopLevelDomainName extends Stringable
{

    public function name(): Name;

    public function __toString(): string;

}

