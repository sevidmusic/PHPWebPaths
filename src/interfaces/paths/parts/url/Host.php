<?php

namespace Darling\PHPWebPaths\interfaces\paths\parts\url;

use \Darling\PHPWebPaths\interfaces\paths\parts\url\DomainName;
use \Darling\PHPWebPaths\interfaces\paths\parts\url\SubDomainName;
use \Darling\PHPWebPaths\interfaces\paths\parts\url\TopLevelDomainName;
use \Stringable;

/**
 * A Host is part of a Url.
 *
 * A Host may consist of alphanumeric characters (a-z),
 * hyphens (-), and periods (.).
 *
 * For example:
 *
 *     https://sub.example.com:8080/path?query#fragment
 *             \_/
 *              |
 *           Sub-Domain
 */
interface Host extends Stringable
{

    public function __toString(): string;

    public function subDomainName(): SubDomainName;
    public function domainName(): DomainName;
    public function topLevelDomainName(): TopLevelDomainName;

}

