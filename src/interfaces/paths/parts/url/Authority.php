<?php

namespace Darling\PHPWebPaths\interfaces\paths\parts\url;

use Darling\PHPWebPaths\interfaces\paths\parts\url\Host;
use Darling\PHPWebPaths\interfaces\paths\parts\url\Port;
use \Stringable;

/**
 * An Authority is a part of a Url.
 *
 * For example:
 *
 *     https://sub.example.com:8080/path?query#fragment
 *             \_/ \_____/ \_/ \__/
 *              |     |     |   |
 *             Sub  Domain Top Port
 *            Domain Name Level   |
 *            |Name       Domain  |
 *            |\_____________/    |
 *            |       |           |
 *            |      Host         |
 *             \__________________/
 *                     |
 *                 authority
 *
 * An Authority consists of a Host and a Port.
 *
 * An Authority will abide by the url authority specification
 * described in section 3.2 of RFC 3986:
 *
 * @see https://datatracker.ietf.org/doc/html/rfc3986#section-3.2
 *
 * The complete Authority can be obtained via the __toString() method.
 *
 */
interface Authority extends Stringable
{

    public function host(): Host;

    public function port(): ?Port;

    public function __toString(): string;

}

