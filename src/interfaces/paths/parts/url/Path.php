<?php

namespace Darling\PHPWebPaths\interfaces\paths\parts\url;

use \Darling\PHPTextTypes\interfaces\collections\SafeTextCollection;
use \Stringable;

/**
 * An Path is a part of a Url.
 *
 * For example:
 *
 *     https://sub.example.com:8080/path?query#fragment
 *                                  \__/
 *                                   |
 *                                  Path
 *
 *
 * A Path's value will be a string that consists of a sequence of
 * characters that begins with an alphanumeric character and is
 * followed by any combination of letters [a-z], digits [0-9],
 * periods (.), slashes (/), underscores (_), or hyphens (-).
 *
 * An Path will abide by the url authority specification
 * described in section 3.2 of RFC 3986:
 *
 * @see https://datatracker.ietf.org/doc/html/rfc3986#section-3.2
 *
 * A Path is made up of a collection of SafeText strings that
 * are concatenated together by using a DIRECTORY_SEPARATOR.
 *
 * The complete Path can be obtained via the __toString() method.
 *
 * The collection of SafeText strings can be obtained via the
 * safeTextCollection() method.
 *
 */
interface Path extends Stringable
{

    public function safeTextCollection(): SafeTextCollection;


    public function __toString(): string;

}

