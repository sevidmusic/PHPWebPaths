<?php

namespace Darling\PHPWebPaths\interfaces\paths\parts\url;

use \Darling\PHPTextTypes\interfaces\strings\Text;
use \Stringable;

/**
 * A Query is a part of a Url.
 *
 * For example:
 *
 *     https://sub.example.com:8080/path?query#fragment
 *                                       \___/
 *                                         |
 *                                       Query
 * A Query's string value is determined by the assigned Text
 * instance, which can be obtained via the text() method.
 *
 * A Query's Text will consist of a sequence of characters that
 * begins with an alphanumeric character and is followed by any
 * combination of letters [a-z], digits [0-9], periods (.),
 * slashes (/), percents (%), underscores (_), hyphens (-),
 * equals (=), opening brackets ([), or closing brackets ([).
 *
 * A Query must abide by the url authority specification described
 * in section 3.2 of RFC 3986:
 *
 * @see https://datatracker.ietf.org/doc/html/rfc3986#section-3.2
 *
 * The Query's string value can be obtained via the __toString()
 * method.
 *
 */
interface Query extends Stringable
{
    public function __toString(): string;

    public function text(): Text;

}

