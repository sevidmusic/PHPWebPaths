# PHP Web Paths

The PHPWebPaths library provides classes for working with web paths.

# Overview

- [Installation](#installation)
- [Url](#darlingphpwebpathsinterfaceswebpathsurl)
- [Domain](#darlingphpwebpathsinterfaceswebpathspartsurldomain)
- [Scheme](#darlingphpwebpathsenumerationsscheme)
- [Authority](#darlingphpwebpathsinterfacespathspartsurlauthority)
- [Host](#darlingphpwebpathsinterfacespathspartsurlhost)
- [SubDomainName](#darlingphpwebpathsinterfacespathspartsurlsubdomainname)
- [DomainName](#darlingphpwebpathsinterfacespathspartsurldomainname)
- [TopLevelDomainName](#darlingphpwebpathsinterfacespathspartsurltopleveldomainname)
- [Port](#darlingphpwebpathsinterfacespathspartsurlport)
- [Path](#darlingphpwebpathsinterfacespathspartsurlpath)
- [Query](#darlingphpwebpathsinterfacespathspartsurlquery)
- [Fragment](#darlingphpwebpathsinterfacespathspartsurlfragment)
- [Route](#darlingroadymoduleutilitiesinterfaceswebpathsroute)
- [Moduleconfiguration](#darlingroadymoduleutilitiesinterfacesconfigurationmoduleconfiguration)

# Installation

```
composer require darling/php-web-paths
```

### \Darling\PHPWebPaths\interfaces\web\paths\Url

```
<?php

namespace \Darling\PHPWebPaths\interfaces\web\paths;

use \Stringable;

/**
 * A Url points to an online resource.
 *
 * A Url consists of the following parts:
 *
 * - Domain:
 *   -> Scheme
 *   -> Authority:
 *      --> Host:
 *          ---> SubDomainName
 *          ---> DomainName
 *          ---> TopLevelDomainName
 *      --> Port
 * - Path
 * - Query
 * - Fragment
 *
 * For example, the following Url's anatomy is:
 *
 *     https://sub.example.com:8080/path?query#fragment
 *     \___/   \_/ \_____/ \_/ \__/ \__/ \___/ \______/
 *       |      |     |     |   |    |     |      |
 *     Scheme  Sub  Domain Top Port path query  fragment
 *     |      Domain Name Level   ||
 *     |      |Name       Domain  ||
 *     |      |\_____________/    ||
 *     |      |       |           ||
 *     |      |      Host         ||
 *     |       \__________________/|
 *     |               |           |
 *     |           authority       |
 *      \_________________________/
 *                   |
 *                Domain
 *
 * The Url in the previous example consists of the following parts:
 *
 * Domain      https://sub.example.com:8080
 *
 * Scheme      https
 *
 * Authority   sub.example.com:8080
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
 * Path        path
 *
 * Query       query
 *
 * Fragment    fragment
 *
 * The complete Url can be obtained via the __toString() method.
 *
 * Note: The design of this interface is based on the example Url
 * provided in section 3 of RFC 3986:
 *
 *     foo://example.com:8042/over/there?name=ferret#nose
 *     \_/   \______________/\_________/ \_________/ \__/
 *      |           |            |            |        |
 *   scheme     authority       path        query   fragment
 *      |   _____________________|__
 *     / \ /                        \
 *     urn:example:animal:ferret:nose
 *
 * @see https://datatracker.ietf.org/doc/html/rfc3986#section-3
 *
 */
interface Url extends Stringable
{

    public function authority(): Authority;
    public function domain(): Domain;
    public function domainName(): DomainName;
    public function fragment(): ?Fragment;
    public function host(): Host;
    public function path(): ?Path;
    public function port(): ?Port;
    public function query(): ?Query;
    public function scheme(): Scheme;
    public function subDomainName(): ?SubDomainName
    public function topLevelDomainName(): ?TopLevelDomainName

}

```

### \Darling\PHPWebPaths\interfaces\web\paths\parts\url\Domain

```
<?php

namespace \Darling\PHPWebPaths\interfaces\web\paths;

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

    public function authority(): Authority;
    public function domainName(): DomainName;
    public function host(): Host;
    public function port(): ?Port;
    public function subDomainName(): ?SubDomainName
    public function topLevelDomainName(): ?TopLevelDomainName

}

```

### \Darling\PHPWebPaths\enumerations\Scheme

```
<?php

namespace \Darling\PHPWebPaths\enumerations;

use \Stringable;

/**
 * A Scheme is part of a Url.
 *
 * For example:
 *
 *     https://sub.example.com:8080/path?query#fragment
 *     \___/
 *       |
 *     Scheme
 *
 * The Scheme enum defines the url schemes that are supported by the
 * PHPWebPaths library.
 *
 * A Scheme's value will be a lowercase string that consists of
 * a sequence of characters that begins with a letter and is followed
 * by any combination of letters [a-z], digits [0-9], pluses (+),
 * periods (.), or hyphens (-).
 *
 * All defined Schemes will abide by the url scheme specification
 * described in section 3.1 of RFC 3986:
 *
 * @see https://datatracker.ietf.org/doc/html/rfc3986#section-3.1
 *
 * Initially, only the http, and https url schemes will be supported.
 *
 * If they are really needed other url schemes may be added in the
 * future as long as they abide by RFC 3986.
 *
 * The value property can be used to access the string value of
 * a Scheme.
 *
 * For example:
 *
 * $scheme = Scheme::Https;
 *
 * echo $scheme->value;
 *
 * // example output:
 * https
 *
 */
enum Scheme: string
{

    case Http = 'http';
    case Https = 'https';

}


```

### \Darling\PHPWebPaths\interfaces\paths\parts\url\Authority

```
<?php

namespace \Darling\PHPWebPaths\interfaces\paths\parts\url;

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
    public function __toString(): string;
    public function domainName(): DomainName;
    public function subDomainName(): ?SubDomainName
    public function topLevelDomainName(): ?TopLevelDomainName
}

```

### \Darling\PHPWebPaths\interfaces\paths\parts\url\Host

```
<?php

namespace \Darling\PHPWebPaths\interfaces\paths\parts\url;

use \Stringable;

/**
 * A Host is a part of a Url.
 *
 * For example:
 *
 *     https://sub.example.com:8080/path?query#fragment
 *             \_/ \_____/ \_/
 *              |     |     |
 *             Sub  Domain Top
 *            Domain Name Level
 *             Name       Domain
 *             \_____________/
 *                    |
 *                   Host
 *
 * A Host will consist of a DomainName, and may also consist of a
 * TopLevelDomainName, and a SubDomainName.
 *
 * A Host may exclude the TopLevelDomainName and SubDomainName but it
 * must not exclude a DomainName.
 *
 * A Host's value will be a lowercase string that consists of
 * a sequence of characters that begins with an alphanumeric
 * character and is followed by any combination of letters [a-z],
 * digits [0-9], periods (.), or hyphens (-).
 *
 * A Host will abide by the url authority specification described in
 * section 3.2.2 of RFC 3986:
 *
 * @see https://datatracker.ietf.org/doc/html/rfc3986#section-3.2.2
 *
 * The complete Host can be obtained via the __toString() method.
 *
 */
interface Host extends Stringable
{

    public function __toString(): string;
    public function domainName(): DomainName;
    public function subDomainName(): ?SubDomainName
    public function topLevelDomainName(): ?TopLevelDomainName
}

```

### \Darling\PHPWebPaths\interfaces\paths\parts\url\Port

```
<?php

namespace \Darling\PHPWebPaths\interfaces\paths\parts\url;

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
 * A Port's value will be a numeric string that is a maximum of
 * 4 characters in length.
 *
 * A Port will abide by the url authority specification described in
 * section 3.2.3 of RFC 3986:
 *
 * @see https://datatracker.ietf.org/doc/html/rfc3986#section-3.2.3
 *
 * The complete Port can be obtained via the __toString() method.
 *
 */
interface Port extends Stringable
{
    public function __toString(): string;
}

```

### \Darling\PhpWebPaths\interfaces\paths\parts\url\SubDomainName;

```
<?php

namespace \Darling\PHPWebPaths\interfaces\paths\parts\url;

use \Darling\PHPTextTypes\interfaces\strings\Name;

/**
 * A SubDomainName is part of a Url.
 *
 * For example:
 *
 *     https://sub.example.com:8080/path?query#fragment
 *                             \__/
 *                              |
 *                             Port
 */
interface SubDomainName
{
    public function __toString(): string;

    public function name(): Name;

}

```

### \Darling\PhpWebPaths\interfaces\paths\parts\url\DomainName;

```
<?php

namespace \Darling\PHPWebPaths\interfaces\paths\parts\url;

use \Darling\PHPTextTypes\interfaces\strings\Name;

/**
 * A DomainName is part of a Url.
 *
 * For example:
 *
 *     https://sub.example.com:8080/path?query#fragment
 *                 \_____/
 *                    |
 *                  Domain
 *                   Name
 *
 */
interface DomainName
{
    public function __toString(): string;

    public function name(): Name;

}

```

### \Darling\PhpWebPaths\interfaces\paths\parts\url\TopLevelDomainName;

```
<?php

namespace \Darling\PHPWebPaths\interfaces\paths\parts\url;

use \Darling\PHPTextTypes\interfaces\strings\Name;

/**
 * A TopLevelDomainName is part of a Url.
 *
 * For example:
 *
 *     https://sub.example.com:8080/path?query#fragment
 *                         \_/
 *                          |
 *                         Top
 *                        Domain
 *                         Name
 *
 */
interface TopLevelDomainName
{
    public function __toString(): string;

    public function name(): Name;

}

```

### \Darling\PHPWebPaths\interfaces\paths\parts\url\Path

```
<?php

namespace \Darling\PHPWebPaths\interfaces\paths\parts\url;

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
 * The complete Path can be obtained via the __toString() method.
 *
 */
interface Path extends Stringable
{
    public function __toString(): string;
}

```

### \Darling\PHPWebPaths\interfaces\paths\parts\url\Query

```
<?php

namespace \Darling\PHPWebPaths\interfaces\paths\parts\url;

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
 *
 * A Query's value will be a string that consists of a sequence
 * of characters that begins with an alphanumeric character and
 * is followed by any combination of letters [a-z], digits [0-9],
 * periods (.), slashes (/), percents (%), underscores (_),
 * hyphens (-), equals (=), opening brackets ([), or
 * closing brackets ([).
 *
 * An Query will abide by the url authority specification
 * described in section 3.2 of RFC 3986:
 *
 * @see https://datatracker.ietf.org/doc/html/rfc3986#section-3.2
 *
 * The complete Query can be obtained via the __toString() method.
 *
 */
interface Query extends Stringable
{
    public function __toString(): string;
}

```

### \Darling\PHPWebPaths\interfaces\paths\parts\url\Fragment

```
<?php

namespace \Darling\PHPWebPaths\interfaces\paths\parts\url;

use \Stringable;

/**
 * An Fragment is a part of a Url.
 *
 * For example:
 *
 *     https://sub.example.com:8080/path?query#fragment
 *                                             \______/
 *                                                |
 *                                             Fragment
 *
 * A Fragment's value will be a string that consists of a sequence
 * of characters that begins with an alphanumeric character and
 * is followed by any combination of letters [a-z], digits [0-9],
 * periods (.), percents (%), underscores (_), hyphens (-),
 * or equals (=).
 *
 * An Fragment will abide by the url authority specification
 * described in section 3.2 of RFC 3986:
 *
 * @see https://datatracker.ietf.org/doc/html/rfc3986#section-3.2
 *
 * The complete Fragment can be obtained via the __toString() method.
 *
 */
interface Fragment extends Stringable
{
    public function __toString(): string;
}

```

### \Darling\RoadyModuleUtilities\interfaces\web\paths\Route

For example:

```
<?php

namespace \Darling\PHPWebPaths\interfaces\routes;

use \Darling\PHPWebPaths\interfaces\web\paths\parts\url\Path;
use \Darling\PHPWebPaths\interfaces\web\paths\parts\url\Query;
use \Darling\PHPTextTypes\interfaces\strings\Position;

/**
 * A Route defines the relationship between one or more requests for
 * a resource and a relative path to a resource.
 *
 * A Route also defines a Position that can be used to sort
 * the Route relative to other Routes.
 *
 */
interface Route
{

    public function position(): Position;
    public function requestNames(): NameCollection;
    public function relativePathToResource(): Path;

}

```

