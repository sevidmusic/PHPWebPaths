<?php

namespace Darling\PHPWebPaths\interfaces\paths;

use \Darling\PHPWebPaths\enumerations\paths\parts\url\Scheme;
use \Darling\PHPWebPaths\interfaces\paths\parts\url\Authority;
use \Stringable;

/**
 * A domain is a natural language identifier for a specific TCP/IP
 * resource.
 *
 * A Domain consists of Scheme, and an Authority.
 *
 * For example, the following Domain:
 *
 *     https://sub.example.com:8080
 *     \___/   \_/ \_____/ \_/ \__/
 *       |      |     |     |   |
 *     Scheme  Sub  Domain Top Port|
 *     |      Domain Name Level   ||
 *     |      |Name       Domain  ||
 *     |      |\_____________/    ||
 *     |      |       |           ||
 *     |      |      Host         ||
 *     |       \_________________/ |
 *     |               |           |
 *     |           Authority       |
 *      \_________________________/
 *                   |
 *                Domain
 *
 * Consists of the following parts:
 *
 * Scheme      https
 *
 * Authority
 *
 *     Host sub.example.com
 *
 *         SubDomainName         sub
 *
 *         DomainName            example
 *
 *         TopLevelDomainName    com
 *
 *     Port    8080
 *
 * The complete Domain can be obtained via the __toString() method.
 *
 */
interface Domain extends Stringable
{

    public function __toString(): string;

    public function scheme(): Scheme;

    public function authority(): Authority;

}

