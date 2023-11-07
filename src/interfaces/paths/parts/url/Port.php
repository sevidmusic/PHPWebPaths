<?php

namespace Darling\PHPWebPaths\interfaces\paths\parts\url;

use \Stringable;

/**
 * A Port is a part of a Url.
 *
 * For example:
 *
 *     https://sub.example.com:8080/path?query#fragment
 *                             \__/
 *                              |
 *                             Port
 *
 * A Port's will be a assigned a number between 1 and 48556.
 *
 * A Port will abide by the url authority specification described in
 * section 3.2.3 of RFC 3986:
 *
 * @see https://datatracker.ietf.org/doc/html/rfc3986#section-3.2.3
 *
 * The Port number can be obtained as an int via the number() method,
 * or as a string via the __toString() method.
 *
 */
interface Port extends Stringable
{

    /**
     * Return the port number as an integer.
     *
     * @return int
     *
     */
    public function number(): int;

    /**
     * Return the port number as a string.
     *
     * @return string
     *
     */
    public function __toString(): string;

}

