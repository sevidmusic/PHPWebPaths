<?php

namespace Darling\PHPWebPaths\interfaces\paths\parts\url;

use \Darling\PHPTextTypes\interfaces\strings\Name;
use \Stringable;

/**
 * A SubDomainName is part of a Url.
 *
 * A SubDomainName may consist of alphanumeric characters (a-z),
 * hyphens (-), and periods (.).
 *
 * For example:
 *
 *     https://sub.example.com:8080/path?query#fragment
 *             \_/
 *              |
 *           Sub-Domain
 */
interface SubDomainName extends Stringable
{

    public function name(): Name;

    public function __toString(): string;

}

